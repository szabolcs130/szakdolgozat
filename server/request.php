<?php
namespace Server;
include_once(__DIR__."/autoloader.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
use Server\Model\MenuModel;
use Server\Controller\MenuController;
use Server\MeghivasEllenorzo;
use Server\AutoLoader;
class Request{
    public static function GetKeres(){
        AutoLoader::Main();
        if (MeghivasEllenorzo::MeghivMVCMetodus(MeghivasEllenorzo::MVCFajlEsMetodusLetezikE("Menu","Main","Controller"),false,true)==0) {
            MeghivasEllenorzo::ErrorFajlMeghiv();
        }
        $talaltKeres=false;
        $oldal=$_GET["oldal"] ?? "Fooldal";
            if ($oldal=="Bejelentkezes/auth") {//echo "bejelentkezes benyomva ".$_SESSION["rang"]."<br>";
                MeghivasEllenorzo::MeghivMVCMetodus(MeghivasEllenorzo::MVCFajlEsMetodusLetezikE("Bejelentkezes","EllenorizBejelentkezes","Controller"),false,false);
                $oldal=str_replace("/auth","",$oldal);
            }
            if ($oldal=="Regisztracio/log") {
                MeghivasEllenorzo::MeghivMVCMetodus(MeghivasEllenorzo::MVCFajlEsMetodusLetezikE("Regisztracio","EllenorizRegisztracio","Controller"),false,false);
                $oldal=str_replace("/log","",$oldal);
            }
            $menu=MeghivasEllenorzo::MeghivMVCMetodus(MeghivasEllenorzo::MVCFajlEsMetodusLetezikE("Menu","GetMenuByRang","Model"),$_SESSION["rang"],false);
            if ($menu!=0) {
                foreach ($menu as $ertek) {
                    if (htmlspecialchars($oldal)==$ertek["nev_menu"]) {
                        if(MeghivasEllenorzo::MeghivMVCMetodus(MeghivasEllenorzo::MVCFajlEsMetodusLetezikE($ertek["nev_menu"],"Main","Controller"),false,true)==0){
                           echo "<h1>Kert tartalom nem elerheto!</h1>";
                        }
                        $talaltKeres=true;
                        break;
                    }
                }
                if ($talaltKeres==false) {
                    echo "<h1>Kert tartalom nem elerheto!</h1>";
                }
            }else{
                MeghivasEllenorzo::ErrorFajlMeghiv();
            }
    }
    
}
?>