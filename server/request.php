<?php
namespace Server;
include_once(__DIR__."/Autoloader.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
use Server\Model\MenuModel;
use Server\Model\RendelesModel;
use Server\Controller\MenuController;
use Server\MeghivasEllenorzo;
use Server\AutoLoader;
class Request{
    public static function GetKeres(){
        AutoLoader::Main();
        $meghiv=0;
        $darabol=explode("/",($_GET["oldal"] ?? "Fooldal"));
        $oldal= $darabol[0];
        $metodus=$darabol[1] ?? "Main";
        $parameter=array($darabol[2] ?? null);
        if (strpos($darabol[0],'api') !==false) {
            //$adat = $darabol[0]."\n";
            //file_put_contents('log.txt', $adat, FILE_APPEND); 
            MeghivasEllenorzo::MeghivMVCMetodus(MeghivasEllenorzo::MVCFajlEsMetodusLetezikE($darabol[0],$metodus,"Controller"),$parameter=null,false);
        }
        if (MeghivasEllenorzo::MeghivMVCMetodus(MeghivasEllenorzo::MVCFajlEsMetodusLetezikE("Menu","Main","Controller"),$parameter,true)==0) {
            MeghivasEllenorzo::ErrorFajlMeghiv();
        }
        $menu=MeghivasEllenorzo::MeghivMVCMetodus(MeghivasEllenorzo::MVCFajlEsMetodusLetezikE("Menu","GetMenuByRang","Model"),$rang=array($_SESSION["rang"]),false);
        if ($menu!=0) {
            foreach ($menu as $ertek) {
                if (htmlspecialchars($oldal)==$ertek["nev_menu"]) {
                    $meghiv=MeghivasEllenorzo::MeghivMVCMetodus(MeghivasEllenorzo::MVCFajlEsMetodusLetezikE($ertek["nev_menu"],$metodus,"Controller"),$parameter,true);
                    $_SESSION["teljeskeres"]='?oldal='.$oldal.'/'.$metodus;
                    $_SESSION['oldal']=$oldal;
                    $_SESSION['metodus']=$metodus;
                    if (is_array($parameter) && isset($parameter[0])) {
                        $_SESSION["teljeskeres"].="/".$parameter[0];
                        $_SESSION['parameter']=$parameter[0];
                    }
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