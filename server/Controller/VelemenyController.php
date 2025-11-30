<?php
namespace Server\Controller;
use Server\View\VelemenyView;
use Server\Model\VelemenyModel;
class VelemenyController{
    public static function VelemenyBekuld(){
        if (isset($_SESSION["username"]) && isset($_POST["velemenyInput"]) && isset($_POST["aruId"])) {
            if (is_numeric($_POST["aruId"])){
                $velemenyVanE=VelemenyModel::lekerdezVelemenyByAruIdSajat($_POST["aruId"],$_SESSION['userId']);
                if (empty($velemenyVanE) && VelemenyModel::hozzaadVelemeny($_SESSION["userId"],$_POST["aruId"],$_POST["velemenyInput"])!=0) {
                    if (isset($_SESSION['teljeskeres'])) {
                        header('Location: '.$_SESSION['teljeskeres']);
                        exit();
                    }
                    header('Location: ?oldal=Fooldal');
                    exit();
                } 
            }
        }
        return 0;
    }
    public static function VelemenyTorles(){
        if (isset($_SESSION["username"]) && isset($_POST["idVelemeny"])) {
            $vId=$_POST["idVelemeny"];
            $aruId=$_SESSION['parameter'] ?? null;
            $userId=$_SESSION['userId'] ?? null;
            if (is_numeric($vId) && $aruId!=null && $aruId!=null) {
                if (VelemenyModel::VelemenyTorol($aruId,$userId,$vId)!=0) {
                    if (isset($_SESSION['teljeskeres'])) {
                        header('Location: '.$_SESSION['teljeskeres']);
                        exit();
                    }
                    header('Location: ?oldal=Fooldal');
                    exit();
                }
            }
        }
        return 0;
    }
}
?>