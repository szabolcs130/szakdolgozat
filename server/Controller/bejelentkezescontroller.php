<?php
namespace Server\Controller;
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
use Server\View\BejelentkezesView;
use Server\Model\BejelentkezesModel;
class BejelentkezesController{
    public static function Main(){
        BejelentkezesView::ShowBejelentkezes();
        return 1;
    }
    public static function EllenorizBejelentkezes(){
        if (!isset($_SESSION["username"]) && isset($_POST["username"]) && isset($_POST["p"])) {
            $username=$_POST["username"];
            $password=$_POST["p"];
            $user=BejelentkezesModel::GetSzemelyByName($username);
            if ($user && isset($user[0]['jelszo']) && password_verify($password,$user[0]['jelszo'])){
                BejelentkezesView::SikeresBejelentkezes($user[0]["nev_szemely"]);
                $_SESSION["username"]=$user[0]["nev_szemely"];
                $_SESSION["rang"]=$user[0]["rang"];
                header('Location: ?oldal=Fooldal');
                exit();
            }
            BejelentkezesView::SikertelenBejelentkezes();
            self::Main();
            return 1;
        }
        return 0;
    }
}
?>