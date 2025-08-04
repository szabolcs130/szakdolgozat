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
        //KosarModel::hozzaadAru(1,"alma",100,"leirasa");
        //KosarModel::hozzaadAru(2,"korte",200,"leirasa2");
        //KosarModel::torolAru(1);
        $kosar=KosarModel::getKosar();
        if ($kosar!==[]) {
            KosarView::ShowKosar($kosar);
            return 1;
        }else{
            KosarView::ShowKosar("ures");
            return 1;  
        }
        return 0;
    }
    public static function Hozzaad(){
        if (isset($_SESSION["username"]) && isset($_POST["aruId"])) {
            if (is_numeric($id=$_POST["aruId"])) {
                $aru=TermekekModel::lekerdezAruById($id);
                KosarModel::hozzaadAru($aru[0]['id_aru'],$aru[0]['nev_aru'],$aru[0]['ar']);
                return 1;
            }
            
        } 
        return 0;
    }
}
?>