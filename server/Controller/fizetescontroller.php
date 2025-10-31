<?php
namespace Server\Controller;
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
use Server\View\FizetesView;
use Server\Model\FizetesModel;
use Server\Model\KosarModel;
use Server\Model\RendelesModel;
use Server\Model\FizetesEredmenyModel;
use Server\Model\RendelesTartalmaModel;
class FizetesController{
    
    public static function Main(){
        if (KosarModel::getOsszAr()>0) {
            FizetesView::ShowFizetes();
            return 1;
        }
        return 0;
    }
    public static function FizetesKeres(){
        if (KosarModel::getOsszAr()>0) {
            $endpoint=$_GET["oldal"];
            $endpoint=str_replace("Fizetes/FizetesKeres","",$endpoint);
            if ($endpoint === '/') { 
                try {
                    $response = [
                        "message" => "Server is running"
                    ];
                    header('Content-Type: application/json');ob_clean();
                    echo json_encode($response);exit;
                } catch (Exception $e) {
                    echo json_encode(['error' => "Server not running"]);
                    http_response_code(500);exit;
                }
            }
            if ($endpoint === '/api/orders') {
                header('Content-Type: application/json');ob_clean();
                try {
                    $orderResponse = FizetesModel::createOrder();
                    if (is_object($orderResponse['jsonResponse'])) {
                        echo json_encode(
                            ['id'=>$orderResponse['jsonResponse']->getId(),
                            'status'=>$orderResponse['jsonResponse']->getStatus()]
                        );
                    }else{
                        echo json_encode(['issue'=>$orderResponse['jsonResponse']['details'][0]->issue ?? null,
                                'description'=>$orderResponse['jsonResponse']['details'][0]->description ?? null,
                                'debug_id'=>$orderResponse['jsonResponse']['debug_id'] ?? null]);
                    }
                    exit;
                } catch (Exception $e) {
                    echo json_encode(['error' => "Fizetes keszites hiba!"]);
                    http_response_code(500);exit;
                }
            }
            if (str_ends_with($endpoint, '/capture')) { 
                $urlSegments = explode('/', $endpoint);
                end($urlSegments);
                $orderID = prev($urlSegments);
                header('Content-Type: application/json');ob_clean();
                try {
                    $captureResponse = FizetesModel::captureOrder($orderID);
                    if (is_object($order=$captureResponse['jsonResponse'])) {
                        $orderStatus=$order->getId();
                        $h=fopen("a.txt","w");
                        fwrite($h,$orderStatus);
                        
                        //adatbazisba ir

                        RendelesModel::hozzaadRendeles(1);
                        RendelesTartalmaModel::hozzaadRendelesTartalma(1,1,1,1);
                        FizetesEredmenyModel::hozzaadFizetesEredmeny(1,100,100,"ok");
                        /*foreach (KosarModel::getKosar() as $key => $value) {
                        fwrite($h,$key." ");
                        fwrite($h,$value["nev"]." ");
                        fwrite($h,($value["ar"]*$value["me"])." Forint");
                        }
                        fclose($h);ob_clean();*/
                        //echo "ALMA ".$orderStatus; //ha netan sikeres a tranzakcio

                        KosarModel::Urit();

                        echo json_encode([

                            'id'=>$captureResponse['jsonResponse']->getId(),
                            'status'=>$captureResponse['jsonResponse']->getStatus(),
                            'captureid' => $captureResponse['jsonResponse']->getPurchaseUnits()[0]
                                                                        ->getPayments()
                                                                        ->getCaptures()[0]
                                                                        ->getId(),
                            'purchase_units'=>$captureResponse['jsonResponse']->getPurchaseUnits()[0]
                                                                        ]);
                        exit;
                    }else{
                        echo json_encode(['issue'=>$captureResponse['jsonResponse']['details'][0]->issue ?? null,
                                'description'=>$captureResponse['jsonResponse']['details'][0]->description ?? null,
                                'debug_id'=>$captureResponse['jsonResponse']['debug_id'] ?? null]);exit;
                    }
                    
                } catch (Exception $e) {
                    echo json_encode(['error' => "Fizetes jovahagyas hiba!"]);
                    http_response_code(500);
                    exit;
                }
                    return 1;
                }
            //return 1;
        }
    }
}
?>