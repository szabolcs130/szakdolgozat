<?php
namespace Server\Controller;
use Server\View\VelemenyView;
use Server\Model\VelemenyModel;
use Server\Model\ErtekEllenorzesModel;
class VelemenyController{
    public static function VelemenyBekuld(){
        if (isset($_SESSION["username"]) && isset($_POST["velemenyInput"]) && isset($_POST["aruId"])) {
            $id=ErtekEllenorzesModel::Szam($_POST["aruId"],0,99999999);
            if ($id===false) {
                return 0;
            }
            $velemeny=ErtekEllenorzesModel::Szoveg($_POST["velemenyInput"],5,254,"/^[A-Za-z0-9áéíóöőúüűÁÉÍÓÖŐÚÜŰ .,!?;:]+$/");
            if ($velemeny===false) {
                return 0;
            }
            $velemenyVanE=VelemenyModel::lekerdezVelemenyByAruIdSajat($id,$_SESSION['userId']);
            if (is_array($velemenyVanE) && empty($velemenyVanE) && VelemenyModel::hozzaadVelemeny($_SESSION["userId"],$id,$velemeny)!=0) {
                if (isset($_SESSION['teljeskeres'])) {
                    header('Location: '.$_SESSION['teljeskeres']);
                    exit();
                }
                header('Location: ?oldal=Fooldal');
                exit();
            }
        }
        return 0;
    }
    public static function VelemenyTorles(){
        if (isset($_SESSION["username"]) && isset($_POST["idVelemeny"])) {
            $vId=ErtekEllenorzesModel::Szam($_POST["idVelemeny"],0,99999999);
            if ($vId===false) {
                return 0;
            }
            $aruId=$_SESSION['parameter'] ?? null;
            $userId=$_SESSION['userId'] ?? null;
            if (VelemenyModel::VelemenyTorol($aruId,$userId,$vId)!=0) {
                if (isset($_SESSION['teljeskeres'])) {
                    header('Location: '.$_SESSION['teljeskeres']);
                    exit();
                }
                header('Location: ?oldal=Fooldal');
                exit();
            }
        }
        return 0;
    }
}
?>