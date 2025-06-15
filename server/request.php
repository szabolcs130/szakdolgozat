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
        $meghiv=0;
        $darabol=explode("/",($_GET["oldal"] ?? "Fooldal"));
        $oldal= array_shift($darabol);
        $metodus="Main";
        if (count($darabol)>=1) {
            $metodus=array_shift($darabol);
        }
        $menu=MeghivasEllenorzo::MeghivMVCMetodus(MeghivasEllenorzo::MVCFajlEsMetodusLetezikE("Menu","GetMenuByRang","Model"),$_SESSION["rang"],false);
        if ($menu!=0) {
            foreach ($menu as $ertek) {
                if (htmlspecialchars($oldal)==$ertek["nev_menu"]) {
                    $meghiv=MeghivasEllenorzo::MeghivMVCMetodus(MeghivasEllenorzo::MVCFajlEsMetodusLetezikE($ertek["nev_menu"],$metodus,"Controller"),false,true);
                    break;
                }
            }
            if ($meghiv==0){
                echo "<h1>Kert tartalom nem elerheto!</h1>";
            }
        }else{
            MeghivasEllenorzo::ErrorFajlMeghiv();
        }
    }
    
}
?>