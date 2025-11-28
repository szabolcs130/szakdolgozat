<?php
namespace Server\Controller;
use Server\View\VelemenyView;
use Server\Model\VelemenyModel;
class VelemenyController{
    public static function VelemenyBekuld(){
        if (isset($_SESSION["username"]) && isset($_POST["velemenyInput"]) && isset($_POST["aruId"])) {
            if (is_numeric($_POST["aruId"])){
                if (VelemenyModel::hozzaadVelemeny($_SESSION["userId"],$_POST["aruId"],$_POST["velemenyInput"])!=0) {
                    if (isset($_SESSION['keres'])) {
                        header('Location: '.$_SESSION['keres']);
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
        if (isset($_SESSION["username"]) && isset($_POST["vId"])) {
            $vId=$_POST["vId"];
            if (is_numeric($_POST["vId"])) {
                if (VelemenyModel::VelemenyTorol($vId,$_SESSION["userId"])!=0) {
                    if (isset($_SESSION['keres'])) {
                        header('Location: '.$_SESSION['keres']);
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