<?php
namespace Server\Controller;
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
use Server\View\FizetesView;
use Server\Model\FizetesModel;
use Server\Model\KosarModel;
use Server\Model\AruModel;
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
                } catch (\Exception $e) {
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
                } catch (\Exception $e) {
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
                        RendelesModel::hozzaadRendeles($_SESSION["userId"],date('Y-m-d H:i:s'));
                        $fizetendoOsszeg=0;
                        $rendelesId=FizetesEredmenyModel::GetFizetetlenEredmeny($_SESSION["userId"])['id_rendeles'];
                        if ($rendelesId==null) {
                            echo json_encode(['error' => "Rendeles felvitele hiba!"]);
                            http_response_code(500);
                            exit; 
                        }
                        foreach (KosarModel::getKosar() as $key => $value) {
                            if (RendelesTartalmaModel::hozzaadRendelesTartalma($rendelesId,$key,$value["me"],$value["ar"])==0) {
                                echo json_encode(['error' => "Rendeles felvitele hiba!"]);
                                http_response_code(500);
                                exit; 
                            }
                            $fizetendoOsszeg+=$value["ar"]*$value["me"];
                        }
                        $datum=(new \DateTime($order->getPurchaseUnits()[0]->getPayments()->getCaptures()[0]->getCreateTime(), new \DateTimeZone('UTC')));
                        $datum->setTimezone(new \DateTimezone('Europe/Budapest'));
                        $datumKonvertalva=$datum->format('Y-m-d H:i:s');
                        if (FizetesEredmenyModel::hozzaadFizetesEredmeny($rendelesId,$datumKonvertalva,$fizetendoOsszeg,$order->getId(),$captureResponse['jsonResponse']->getStatus())==0) {
                            echo json_encode(['error' => "Fizetes felvitele hiba!"]);
                            http_response_code(500);
                            exit;
                        }
                        
                        foreach (KosarModel::getKosar() as $key => $value) {
                            Arumodel::AruSzerkesztMennyiseg($key,$value["me"]);
                        }

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
                    
                } catch (\Exception $e) {
                    echo json_encode(['error' => "Fizetes jovahagyas hiba!"]);
                    http_response_code(500);
                    exit;
                }
            }
        }
        return 0;
    }
}
?>