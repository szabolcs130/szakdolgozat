<?php
namespace Server\Controller;
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
use Server\View\AdminView;
use Server\Model\AdminModel;
use Server\Model\AruModel;
use Server\Model\ErtekEllenorzesModel;
class AdminController{
    public static function Main(){
        if (AdminView::Main()==0) {
            return 0;
        } 
        return 1;
    }
    public static function AruTorol($id){
        if ((isset($_SESSION["username"]) && $_SESSION['rang']==3)){
            $id=ErtekEllenorzesModel::Szam($id,0,99999999);
            if ($id===false) {
                return 0;
            }
            $uzenet='<h4 style="color: green">Áru törlése sikeres!</h4>';
            if(AruModel::AruTorol($id)==0){
                $uzenet='<h4 style="color: red">Áru törlése sikertelen!</h4>';
            }
            self::TermekKezeles($uzenet);
            return 1;
        }
        return 0;
    }
    public static function AruSzerkeszt(){
        if ((isset($_SESSION["username"]) && $_SESSION['rang']==3) && isset($_POST["idaru"]) && isset($_POST["nev"]) && isset($_POST["ar"]) && isset($_POST["leiras"]) && isset($_POST["mennyiseg"]) && isset($_POST["kep"])) {
            $id=ErtekEllenorzesModel::Szam($_POST["idaru"],0,99999999);
            if ($id===false) {
                return 0;
            }
            $ar=ErtekEllenorzesModel::Szam($_POST["ar"],0,99999999);
            if ($ar===false) {
                return 0;
            }
            $nev=ErtekEllenorzesModel::Szoveg($_POST["nev"],2,20,"/^[A-Za-z0-9áéíóöőúüűÁÉÍÓÖŐÚÜŰ ]+$/");
            if ($nev===false) {
                return 0;
            }
            
            $leiras=ErtekEllenorzesModel::Szoveg($_POST["leiras"],5,254,"/^[A-Za-z0-9áéíóöőúüűÁÉÍÓÖŐÚÜŰ .,!?;:]+$/");
            if ($leiras===false) {
                return 0;
            }
            $mennyiseg=ErtekEllenorzesModel::Szam($_POST["mennyiseg"],0,99999999);
            if ($mennyiseg===false) {
                return 0;
            }
            $kep=ErtekEllenorzesModel::Szoveg($_POST["kep"],1,254,"/^[A-Za-z0-9]+$/");
            if ($kep===false) {
                return 0;
            }
            $aru=Arumodel::lekerdezAruById($id);
            if (is_array($aru) && !empty($aru)){ 
                $uzenet='<h4 style="color: green">Áru szerkesztése sikeres!</h4>';
                if(AruModel::AruSzerkeszt($id,$nev,$ar,$leiras,$mennyiseg,$kep)==0){
                    $uzenet='<h4 style="color: red">Áru szerkesztése sikertelen!</h4>';
                }
                self::TermekKezeles($uzenet);
                return 1;
            }
        }
        return 0;
    }
    public static function TermekKezeles($uzenet=null){
        if ($uzenet!=null) {
            echo $uzenet;
        }
        self::Main();
        echo '<div id="tablazatTarolo"></div>';
        return 1;
    }
    public static function AruUj(){
        if ((isset($_SESSION["username"]) && $_SESSION['rang']==3) &&  isset($_POST["nev"]) && isset($_POST["ar"]) && isset($_POST["leiras"]) && isset($_POST["mennyiseg"]) && isset($_POST["kep"])) {//isset($_POST["idaru"]) &&
            $nev=ErtekEllenorzesModel::Szoveg($_POST["nev"],2,20,"/^[A-Za-z0-9áéíóöőúüűÁÉÍÓÖŐÚÜŰ ]+$/");
            if ($nev===false) {
                return 0;
            }
            if (!empty(AruModel::lekerdezAruByNev($nev))) {
                self::TermekKezeles('<h4 style="color: orange">Mar van ilyen nevű áru!</h4>');
                return 1;
            }
            $ar=ErtekEllenorzesModel::Szam($_POST["ar"],0,99999999);
            if ($ar===false) {
                return 0;
            }
            $leiras=ErtekEllenorzesModel::Szoveg($_POST["leiras"],5,254,"/^[A-Za-z0-9áéíóöőúüűÁÉÍÓÖŐÚÜŰ .,!?;:]+$/");
            if ($leiras===false) {
                return 0;
            }
            $mennyiseg=ErtekEllenorzesModel::Szam($_POST["mennyiseg"],0,99999999);
            if ($mennyiseg===false) {
                return 0;
            }
            $kep=ErtekEllenorzesModel::Szoveg($_POST["kep"],1,254,"/^[A-Za-z0-9]+$/");
            if ($kep===false) {
                return 0;
            }
            $uzenet='<h4 style="color: green">Áru hozzáadása sikeres!</h4>';
            if(AruModel::hozzaadAru($nev,$ar,$leiras,$mennyiseg,$kep)==0){
                $uzenet='<h4 style="color: red">Áru hozzáadása sikertelen!</h4>';
            }
            self::TermekKezeles($uzenet);
            return 1;
        }
        return 0;
    }
}
?>