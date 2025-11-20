<?php
namespace Server\Controller;
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
use Server\View\AdminView;
use Server\Model\AdminModel;
use Server\Model\AruModel;
class AdminController{
    public static function Main(){
        AdminView::Main();
        return 1;
    }
    public static function AruTorol($id){
        AruModel::AruTorol($id);
        self::TermekKezeles();
        return 1;
    }
    public static function AruSzerkeszt(){
        if ((isset($_SESSION["username"]) && $_SESSION['rang']==3) && isset($_POST["idaru"]) && isset($_POST["nev"]) && isset($_POST["ar"]) && isset($_POST["leiras"])) {
        $id=$_POST["idaru"];
        $nev=$_POST["nev"];
        $ar=$_POST["ar"];
        $leiras=$_POST["leiras"];
        if (is_numeric($id)) {
            $aru=Arumodel::lekerdezAruById($id);
        }
        if (is_array($aru) && !empty($aru)){ 
            AruModel::AruSzerkeszt($id,$nev,$ar,$leiras);
            self::TermekKezeles();
            return 1;
            }
        }
        return 0;
    }
    public static function TermekKezeles(){
        self::Main();
        echo '<div id="tablazatTarolo"></div>';
        return 1;
    }
    public static function AruUj(){
        if ((isset($_SESSION["username"]) && $_SESSION['rang']==3) &&  isset($_POST["nev"]) && isset($_POST["ar"]) && isset($_POST["leiras"])) {//isset($_POST["idaru"]) &&
            $nev=$_POST["nev"];
            $ar=$_POST["ar"];
            $leiras=$_POST["leiras"];
            if (is_numeric($ar)) {
                AruModel::hozzaadAru($nev,$ar,$leiras);
                self::TermekKezeles();
                return 1;
            }
        }
        return 0;
    }
}
?>