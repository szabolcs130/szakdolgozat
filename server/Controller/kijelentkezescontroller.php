<?php
namespace Server\Controller;
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
use Server\View\KijelentkezesView;
use Server\Model\KijelentkezesModel;
class KijelentkezesController{
    public static function Main(){
        if (isset($_SESSION["username"])) {
            session_unset();
            session_destroy();
            KijelentkezesView::SikeresKijelentkezes();
            header('Location: ?oldal=Fooldal');
            exit();
        }else{
            KijelentkezesView::SikertelenKijelentkezes();
        }
        return 1;
    }
}
?>