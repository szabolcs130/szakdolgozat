<?php
namespace Server\Controller;
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
use Server\Model\VelemenyModel;
use Server\Model\ErtekEllenorzesModel;
class ApivelemenyController{
    public static function Main(){
        header('Content-Type: application/json; charset=utf-8');
        ob_clean(); 
        echo json_encode(["ok"=>"fut"]);
        exit;
    }
    public static function LekerdezVelemenyByAruNemSajat(){
        header('Content-Type: application/json; charset=utf-8');
        ob_clean(); 
        $aruId=$_SESSION['parameter'] ?? null;
        if (is_numeric($aruId)) {
            $userId=$_SESSION['userId'] ?? null;
            $oldalSzam=null;
            if (isset($_GET["oldalSzam"])) {
                $oldalSzam=ErtekEllenorzesModel::Szam($_GET['oldalSzam'],0,99999999);
                if ($oldalSzam===false) {
                    $oldalSzam=null;
                }    
            }
            $velemeny=VelemenyModel::lekerdezVelemenyByAruIdNemSajat($aruId,$userId,$oldalSzam);
            if (is_array($velemeny) && !empty($velemeny)) {
                echo json_encode($velemeny);
                exit;
            }
        }
        echo json_encode([]);
        exit;
    }
    public static function LekerdezVelemenyByAruNemSajatOsszes(){
        header('Content-Type: application/json; charset=utf-8');
        ob_clean(); 
        $aruId=$_SESSION['parameter'] ?? null;
        if (is_numeric($aruId)) {
            $userId=$_SESSION['userId'] ?? null;
            $velemeny=VelemenyModel::lekerdezVelemenyByAruIdNemSajatOsszes($aruId,$userId);
            if (is_array($velemeny) && !empty($velemeny)) {
                echo json_encode($velemeny);
                exit;
            }
        }
        echo json_encode([]);
        exit;
    }
    public static function LekerdezVelemenyByAruIdSajat(){
        header('Content-Type: application/json; charset=utf-8');
        ob_clean(); 
        $aruId=$_SESSION['parameter'] ?? null;
        if (is_numeric($aruId)) {
            $userId=$_SESSION['userId'] ?? null;
            $velemeny=VelemenyModel::lekerdezVelemenyByAruIdSajat($aruId,$userId);
            if (is_array($velemeny) && !empty($velemeny)) {
                echo json_encode($velemeny);
                exit;
            }
        }
        echo json_encode([]);
        exit;
    }
}
?>