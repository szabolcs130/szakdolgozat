<?php
namespace Server\Controller;
use Server\View\RegisztracioView;
use Server\Model\BejelentkezesModel;
use Server\Model\ErtekEllenorzesModel;
class RegisztracioController{
    public static function Main(){
        RegisztracioView::ShowRegisztracio();
        return 1;
    }
    public static function EllenorizRegisztracio(){
        if (!isset($_SESSION["username"]) && isset($_POST["username"]) && isset($_POST["p"]) && isset($_POST["email"])) {//!isset($_SESSION["username"]) && 
            $username=ErtekEllenorzesModel::Szoveg($_POST["username"],5,20,"/^[A-Za-z0-9]+$/");
            if ($username===false) {
                return 0;
            }
            $email=ErtekEllenorzesModel::Szoveg($_POST["email"],1,254,"/^[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,3}$/");
            if ($email===false) {
                return 0;
            }
            $password=ErtekEllenorzesModel::Szoveg($_POST["p"],12,64,"/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[^A-Za-z0-9]).{12,64}$/");
            if ($password===false) {
                return 0;
            }
            $user=BejelentkezesModel::GetSzemelyByEmail($email);
            if (is_array($user) && empty($user)){//$user!=0 && !$user
                if (BejelentkezesModel::hozzaadSzemely($username,$email,$password,1)!=0) {
                    $_SESSION["uzenet"]="Sikeres regisztracio!";
                    header('Location: ?oldal=Bejelentkezes');
                    exit();
                }
            }
            RegisztracioView::SikertelenRegisztracio();
            self::Main();
            return 1;
        }
        return 0;
    }
}
?>