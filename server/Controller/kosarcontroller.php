<?php
namespace Server\Controller;
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
use Server\Model\KosarModel;
use Server\Model\TermekekModel;
use Server\View\KosarView;
class KosarController{
    public static function Main(){
        $kosar=KosarModel::getKosar();
        $osszAr=KosarModel::getOsszAr();
        if ($kosar!==[]) {
            KosarView::ShowKosar($kosar,$osszAr);
            return 1;
        }else{
            KosarView::ShowKosar("ures");
            return 1;  
        }
        return 1;
    }
    public static function MennyisegValtoztat(){ 
        //echo "termekekview php ha kosarba rakod ki kene irnia hogy kosarban van es utana a kosarba gomb felirata legyen valtoztat, marmint amit beirunk annyi mennyisegu termek lesz a kosarba";
        
        if (isset($_SESSION["username"]) && isset($_POST["aruId"]) && isset($_POST["me"])) {
            if (is_numeric($id=$_POST["aruId"]) && is_numeric($me=$_POST["me"])) {
                $aru=TermekekModel::lekerdezAruById($id);
                if ($aru!=0 && $aru!==[]) {
                    KosarModel::hozzaadAru($aru[0]['id_aru'],$aru[0]['nev_aru'],$aru[0]['ar'],$me);
                    self::Main();
                    return 1;
                }
            }
        }
        return 0;
    }
    /*public static function Szerkeszt(){
        $id=$_POST["aruId"];
        if (isset($id) && is_numeric($id)){
            KosarModel::torolAru($id);
            self::Main();
            return 1;
        }
        return 0;
    }*/
}
?>