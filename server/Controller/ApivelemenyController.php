<?php
namespace Server\Controller;
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
use Server\Model\VelemenyModel;
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
            $userId=$_SESSION['userId'] ?? null; //ellenorizni hogy valamelyik nulla e ha igen akkor nem hivja meg
            $oldalSzam=$_GET["oldalSzam"] ?? null;
            $velemeny=VelemenyModel::lekerdezVelemenyByAruIdNemSajat($aruId,$userId,$oldalSzam);
            if ($velemeny) {
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
            if ($velemeny) {
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
            if ($velemeny) {
                echo json_encode($velemeny);
                exit;
            }
        }
        echo json_encode([]);
        exit;
    }
    /*public static function VelemenyTorol(){
        header('Content-Type: application/json; charset=utf-8');
        ob_clean(); 
        $aruId=$_SESSION['parameter'] ?? null;
        if (is_numeric($aruId)) {
            $userId=$_SESSION['userId'] ?? null;
            $velemenyId=$_GET['idVelemeny'] ?? null;
            if ($velemenyId!=null) {
                $velemeny=VelemenyModel::VelemenyTorol($aruId,$userId,$velemenyId);
                exit;
            }
            
        }
        echo json_encode([]);
        exit;
    }*/
}
?>