<?php
namespace Server\Controller;
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
use Server\View\FiokView;
use Server\Model\BejelentkezesModel;
use Server\Model\ErtekEllenorzesModel;
use Server\Model\SzallitasicimModel;
class FiokController{
    public static function Main(){
        if (isset($_SESSION["userId"])) {
            $meghiv=BejelentkezesModel::GetSzemelyById($_SESSION["userId"]);
            if (is_array($meghiv) && !empty($meghiv)){
               if (FiokView::ShowFiok($meghiv)!=0) {
                    return 1;
               }
            }
        }
        return 0;
    }
    public static function SzallitasicimHozzaad(){
        if (isset($_SESSION['userId'])){
            $szallitasicim=SzallitasicimModel::lekerdezSzallitasicimBySzemelyId($_SESSION['userId']);
            if(is_array($szallitasicim) && empty($szallitasicim)){
                if (isset($_POST['iranyitoszam']) && isset($_POST['varos']) && isset($_POST['utca']) && isset($_POST['hazszam']) && isset($_POST['emelet']) && isset($_POST['ajto'])) {
                    $iranyitoszam=ErtekEllenorzesModel::Szam($_POST['iranyitoszam'],999,10000);
                    if ($iranyitoszam===false) {
                        return 0;
                    }
                    $varos=ErtekEllenorzesModel::Szoveg($_POST['varos'],3,50,"/^[A-Za-záéíóöőúüűÁÉÍÓÖŐÚÜŰ][A-Za-záéíóöőúüűÁÉÍÓÖŐÚÜŰ \-]+$/");
                    if ($varos===false) {
                        return 0;
                    }
                    $utca=ErtekEllenorzesModel::Szoveg($_POST['utca'],2,100,"/^[A-Za-záéíóöőúüűÁÉÍÓÖŐÚÜŰ0-9][A-Za-záéíóöőúüűÁÉÍÓÖŐÚÜŰ0-9 \-\.]+$/");
                    if ($utca===false) {
                        return 0;
                    }
                    $hazszam=ErtekEllenorzesModel::Szoveg($_POST['hazszam'],1,10,"/^[0-9][\-\/A-Za-z0-9]{0,9}$/");
                    if ($hazszam===false) {
                        return 0;
                    }
                    $emelet=$_POST['ajto'];
                    if(!empty($emelet)) {
                        $emelet=ErtekEllenorzesModel::Szam($_POST['emelet'],0,41,"/^[1-9][0-9]{0,3}$/");
                        if ($emelet===false) {
                            return 0;
                        }
                    }else{
                        $emelet=-100;
                    }

                    $ajto=$_POST['ajto'];
                    if(!empty($ajto)) {
                        $ajto=ErtekEllenorzesModel::Szoveg($_POST['ajto'],1,4,"/^[0-9A-Za-z]{1,4}$/");
                        if ($ajto===false) {
                            return 0;
                        }
                    }
                    SzallitasicimModel::hozzaadSzallitasicim($_SESSION['userId'],$iranyitoszam,$varos,$utca,$hazszam,$emelet,$ajto);
                    return 1;
                }
            }
        }
        return 0;
    }
    public static function ShowSzallitasicimForm(){
        if (isset($_SESSION['userId'])) {
            $szallitasicim=SzallitasicimModel::lekerdezSzallitasicimBySzemelyId($_SESSION['userId']);
            if(is_array($szallitasicim) && empty($szallitasicim)){
                FiokView::ShowSzallitasiCimForm(null);
                return 1;
            }else{
                FiokView::ShowSzallitasiCimForm($szallitasicim);
                return 1;
            }
        }
        return 0;
    }
}
?>