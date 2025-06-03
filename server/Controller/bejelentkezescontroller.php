<?php
namespace Server\Controller;
use Server\View\BejelentkezesView;
use Server\Model\BejelentkezesModel;
class BejelentkezesController{
    public static function Main(){
        BejelentkezesView::ShowBejelentkezes();
    }
    public static function EllenorizBejelentkezes(){
        if (isset($_POST["username"]) && isset($_POST["p"])) {
            $username=$_POST["username"];
            $password=$_POST["p"];
            //echo $_POST["username"]."<br>";
            //echo $_POST["p"]."<br>";
            $user=BejelentkezesModel::GetSzemelyByName($username);
            if ($user && $user[0]['rang']==$password){//password_verify($user[0]['jelszo'],$password)) {
                BejelentkezesView::SikeresBejelentkezes($user[0]["nev_szemely"]);
            }else{
                BejelentkezesView::SikertelenBejelentkezes();
            }
            //var_dump($user);
        }
    }
}
?>