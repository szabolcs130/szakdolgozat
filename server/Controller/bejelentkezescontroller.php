<?php
namespace Server\Controller;
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
use Server\View\BejelentkezesView;
use Server\Model\BejelentkezesModel;
use Server\Model\ErtekEllenorzesModel;
class BejelentkezesController{
    public static function Main($uzenet=null){
        $uzenet==ErtekEllenorzesModel::Szam($uzenet,0,99999999);
        if ($uzenet===false) {
            $uzenet=null;
        }
        BejelentkezesView::ShowBejelentkezes($uzenet);
        return 1;
    }
    public static function EllenorizBejelentkezes(){
        if (!isset($_SESSION["username"]) && isset($_POST["email"]) && isset($_POST["p"])) {
            $email=ErtekEllenorzesModel::Szoveg($_POST["email"],1,254,"/^[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,3}$/");
            if ($email===false) {
                BejelentkezesView::SikertelenBejelentkezes();
                self::Main();
                return 1;
            }
            $password=$_POST["p"];
            $password=ErtekEllenorzesModel::Szoveg($_POST["p"],12,64,"/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[^A-Za-z0-9]).{12,64}$/");
            if ($password===false) {
                BejelentkezesView::SikertelenBejelentkezes();
                self::Main();
                return 1;
            }
            $user=BejelentkezesModel::GetSzemelyByEmail($email);
            if (is_array($user) && !empty($user) && isset($user[0]['jelszo']) && password_verify($password,$user[0]['jelszo'])){
                $_SESSION["userId"]=$user[0]["id_szemely"];
                $_SESSION["username"]=$user[0]["nev_szemely"];
                $_SESSION["rang"]=$user[0]["rang"];
                $_SESSION["kosar"]=[];
                $_SESSION["uzenet"]="Sikeres bejelentkezes!";
                $_SESSION["lejar"]=time()+(60);
                header('Location: ?oldal=Fiok');
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