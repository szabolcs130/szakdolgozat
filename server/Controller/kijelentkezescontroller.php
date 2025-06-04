<?php
namespace Server\Controller;
use Server\View\KijelentkezesView;
use Server\Model\KijelentkezesModel;
class KijelentkezesController{
    public static function Main(){
        if (isset($_SESSION["username"])) {
            echo $_SESSION["username"];
            session_unset();
            session_destroy();
            KijelentkezesView::SikeresKijelentkezes();
        }else{
            KijelentkezesView::SikertelenKijelentkezes();
        }
        
    }
}
?>