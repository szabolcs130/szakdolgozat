<?php
namespace Server\Controller;
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
use Server\Model\KosarModel;
use Server\Model\TermekekModel;
use Server\Model\ErtekEllenorzesModel;
use Server\Model\SzallitasicimModel;
use Server\View\KosarView;
class KosarController{
    public static function Main(){
        if (isset($_SESSION["username"])) {
            $kosar=KosarModel::getKosar();
            $osszAr=KosarModel::getOsszAr();
            if ($kosar!==[]) {
                $szallitasicim=SzallitasicimModel::lekerdezSzallitasicimBySzemelyId($_SESSION['userId']);
                $szallitasiCimVanE=true;
                if(is_array($szallitasicim) && empty($szallitasicim)){
                    $szallitasiCimVanE=false;
                }
                KosarView::ShowKosar($kosar,$osszAr,$szallitasiCimVanE);
                return 1;
            }else{
                KosarView::ShowKosar("ures",0);
                return 1;  
            }
        }
        return 1;
    }
    public static function MennyisegValtoztat(){ 
        if (isset($_SESSION["username"]) && isset($_POST["aruId"]) && isset($_POST["me"])) {
            $id=ErtekEllenorzesModel::Szam($_POST["aruId"],0,99999999);
            if ($id===false) {
                return 0;
            }
            $me=ErtekEllenorzesModel::Szam($_POST["me"],0,99999999);
            if ($me===false) {
                return 0;
            }
            $aru=TermekekModel::lekerdezAruById($id);
           
            if (is_array($aru) && !empty($aru)) {//$aru!=0 && $aru!==[]
                KosarModel::hozzaadAru($aru[0]['id_aru'],$aru[0]['nev_aru'],$aru[0]['ar'],$me,$aru[0]['mennyiseg']);
                self::Main();
                return 1;
            }
        }
        return 0;
    }
}
?>