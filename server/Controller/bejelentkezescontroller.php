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
    }
    public static function EllenorizBejelentkezes(){
        if (isset($_POST["username"]) && isset($_POST["p"])) {//!isset($_SESSION["username"]) && 
            $username=$_POST["username"];
            $password=$_POST["p"];
            $user=BejelentkezesModel::GetSzemelyByName($username);
            if ($user && password_verify($password,$user[0]['jelszo'])){
                BejelentkezesView::SikeresBejelentkezes($user[0]["nev_szemely"]);
                $_SESSION["username"]=$user[0]["nev_szemely"];
                $_SESSION["rang"]=$user[0]["rang"];
                //echo __DIR__;
               // header('Location: ./client/index.php');
            }else{
                BejelentkezesView::SikertelenBejelentkezes();
            }
        }
    }
}
?>