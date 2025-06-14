<?php
namespace Server;
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
use Server\Model\MenuModel;
use Server\Controller\MenuController;
class Request{
    public static function AutoLoader(){
        spl_autoload_register(function ($osztaly){
            $osztaly=strtolower($osztaly);
            $osztaly=str_replace("\\","/",$osztaly);
            if (file_exists($osztaly.".php")) {
                require_once($osztaly.".php");
            }
        });
    }
    public static function GetKeres(){
        if (self::MeghivMVCMetodus(self::MVCFajlEsMetodusLetezikE("Menu","Main","Controller"),false,true)==0) {
            self::ErrorFajlMeghiv();
        }
        $talaltKeres=false;
        $oldal=$_GET["oldal"] ?? "Fooldal";
            if ($oldal=="Bejelentkezes/auth") {//echo "bejelentkezes benyomva ".$_SESSION["rang"]."<br>";
                self::MeghivMVCMetodus(self::MVCFajlEsMetodusLetezikE("Bejelentkezes","EllenorizBejelentkezes","Controller"),false,false);
                $oldal=str_replace("/auth","",$oldal);
            }
            if ($oldal=="Regisztracio/log") {
                self::MeghivMVCMetodus(self::MVCFajlEsMetodusLetezikE("Regisztracio","EllenorizRegisztracio","Controller"),false,false);
                $oldal=str_replace("/log","",$oldal);
            }
            $menu=self::MeghivMVCMetodus(self::MVCFajlEsMetodusLetezikE("Menu","GetMenuByRang","Model"),$_SESSION["rang"],false);
            if ($menu!=0) {
                foreach ($menu as $ertek) {
                    if (htmlspecialchars($oldal)==$ertek["nev_menu"]) {
                        if(self::MeghivMVCMetodus(self::MVCFajlEsMetodusLetezikE($ertek["nev_menu"],"Main","Controller"),false,true)==0){
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
                self::ErrorFajlMeghiv();
            }
    }
    public static function SetCssFajl($fajl){ 
        if (file_exists(__DIR__.'/../client/css/'.$fajl.'.css')) {
            ?>
                <link rel="stylesheet" href="./client/css/<?php echo $fajl;?>.css?v=1">
            <?php 
        }
    }
    public static function SetJsFajl($fajl){
        if (file_exists(__DIR__.'/../client/js/'.$fajl.'.js')) {
            ?>
            <script src="./client/js/<?php echo $fajl;?>.js?v=1"></script>
        <?php
        }
    }
    public static function ErrorFajlMeghiv(){
        header('Location: ./client/error/error.php');
        exit();
    }
    public static function MVCFajlEsMetodusLetezikE($nev,$metodus,$mvcTipus){
        $fajlEleres='Server\\'.$mvcTipus.'\\'.$nev.''.$mvcTipus;
        if (class_exists($fajlEleres) && method_exists($fajlEleres,$metodus)) {
           return [$fajlEleres,$metodus,$nev];
        }
       return 0;
    }
    public static function MeghivMVCMetodus($array,$param,$include){//meghivja a metodust, de elotte MVCFajlEsMetodusLetezikE fv -vel ellenorizzuk leteznek e, amikkel dolgozni akarunk
        if ($array && $include==true) {//oldalhivasra
            self::SetCssFajl($array[2]);
            self::SetJsFajl($array[2]);
            return call_user_func([$array[0],$array[1]]);
        }else if($array && $include==false){//olyat hivunk meg, amitol varunk adatot
            if (is_numeric($param)) {
                return call_user_func([$array[0],$array[1]],$param);
            }else{
                return call_user_func([$array[0],$array[1]]);
            }
        }else{
            return 0;
        }
    }
}
?>