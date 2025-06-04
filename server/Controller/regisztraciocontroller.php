<?php
namespace Server\Controller;
use Server\View\RegisztracioView;
use Server\Model\BejelentkezesModel;
class RegisztracioController{
    public static function Main(){
        RegisztracioView::ShowRegisztracio();
    }
    public static function EllenorizRegisztracio(){
        if (isset($_POST["username"]) && isset($_POST["p"]) && isset($_POST["email"])) {//!isset($_SESSION["username"]) && 
            $username=$_POST["username"];
            $email=$_POST["email"];
            $password=$_POST["p"];
            $user=BejelentkezesModel::GetSzemelyByName($username);
            if ($user){
                RegisztracioView::SikertelenRegisztracio();
            }else{
                if (BejelentkezesModel::hozzaadSzemely($username,$email,$password,"1__")!=-1) {
                    RegisztracioView::SikeresRegisztracio();
                }else{
                    RegisztracioView::SikeresRegisztracio();
                }
            }
        }
    }
}
?>