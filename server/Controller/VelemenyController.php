<?php
namespace Server\Controller;
use Server\View\VelemenyView;
use Server\Model\VelemenyModel;
class VelemenyController{
    public static function VelemenyBekuld(){
        if (isset($_SESSION["username"]) && isset($_POST["velemenyInput"]) && isset($_POST["aruId"])) {
            if (is_numeric($_POST["aruId"])){
                if (VelemenyModel::hozzaadVelemeny($_SESSION["userId"],$_POST["aruId"],$_POST["velemenyInput"])!=0) {
                    header('Location: ?oldal=Fooldal');
                    exit();
                }
            }
            return 1;
        }
        return 0;
    }
}
?>