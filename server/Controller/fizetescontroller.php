<?php
namespace Server\Controller;
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
use Server\View\FizetesView;
use Server\Model\FizetesModel;
use Server\Model\KosarModel;
class FizetesController{
    
    public static function Main(){
        FizetesView::ShowFizetes();
        return 1;
    }
    public static function FizetesKeres(){
        $endpoint=$_GET["oldal"];// echo "elso ".$e."<br>";
        $endpoint=str_replace("Fizetes/FizetesKeres","",$endpoint);//echo "masodik ".$e."<br>";
        if ($endpoint === '/') { 
            try {
                $response = [
                    "message" => "Server is running"
                ];
                header('Content-Type: application/json');ob_clean();
                echo json_encode($response);exit;
            } catch (Exception $e) {
                echo json_encode(['error' => $e->getMessage()]);
                http_response_code(500);exit;
            }
        }
         if ($endpoint === '/api/orders') {
            //$data = json_decode(file_get_contents('php://input'), true);
            //$cart = $data['cart'];
            header('Content-Type: application/json');ob_clean();
            try {
                $orderResponse = FizetesModel::createOrder();//$cart);
                echo json_encode($orderResponse['jsonResponse']);exit;
            } catch (Exception $e) {
                echo json_encode(['error' => $e->getMessage()]);
                http_response_code(500);exit;
            }
        }
          if (str_ends_with($endpoint, '/capture')) { 
            $urlSegments = explode('/', $endpoint);
            end($urlSegments); // Will set the pointer to the end of array
            $orderID = prev($urlSegments);
            header('Content-Type: application/json');ob_clean();
            try {
                $captureResponse = FizetesModel::captureOrder($orderID);
                $order=$captureResponse['jsonResponse'];
                $orderStatus=$order->getStatus();
                $h=fopen("a.txt","w");
                fwrite($h,$orderStatus);
                
                //adatbazisba ir
                foreach (KosarModel::getKosar() as $key => $value) {
                fwrite($h,$key." ");
                fwrite($h,$value["nev"]." ");
                fwrite($h,($value["ar"]*$value["me"])." Forint");
                }
                fclose($h);ob_clean();
                //echo "ALMA ".$orderStatus; //ha netan sikeres a tranzakcio

                KosarModel::Urit();

                echo json_encode($captureResponse['jsonResponse']);exit;
            } catch (Exception $e) {
                echo json_encode(['error' => $e->getMessage()]);
                http_response_code(500);
                exit;
            }
                return 1;
            }
        return 1;
    }
}
?>