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
            header('Location: ?oldal=Bejelentkezes/Main/1');
            exit();
        }else{
            KijelentkezesView::SikertelenKijelentkezes();
            return 1;
        }
        return 1;
    }
}
?>