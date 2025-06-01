<?php
namespace Server;
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
        if (self::MeghivMVCMetodus(self::MVCFajlEsMetodusLetezikE("Menu","Main","Controller"),true)==-1) {
            self::ErrorFajlMeghiv();
        }
        $talaltKeres=false;
        $oldal=$_GET["oldal"] ?? "Fooldal";
            $menu=self::MeghivMVCMetodus(self::MVCFajlEsMetodusLetezikE("Menu","GetMenu","Model"),false);
            if ($menu!=-1) {
                foreach ($menu as $ertek) {
                    if (htmlspecialchars($oldal)==$ertek["nev_menu"]) {
                        if(self::MeghivMVCMetodus(self::MVCFajlEsMetodusLetezikE($ertek["nev_menu"],"Main","Controller"),true)==-1){
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
        if (file_exists('./client/css/'.$fajl.'.css')) {
            ?>
                <link rel="stylesheet" href="./client/css/<?php echo $fajl;?>.css?v=1">
            <?php 
        }
    }
    public static function SetJsFajl($fajl){
        if (file_exists('./client/js/'.$fajl.'.js')) {
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
       return -1;
    }
    public static function MeghivMVCMetodus($array,$include){//meghivja a metodust, de elotte MVCFajlEsMetodusLetezikE fv -vel ellenorizzuk leteznek e, amikkel dolgozni akarunk
        if ($array!=-1 && $include==true) {//oldalhivasra
            self::SetCssFajl($array[2]);
            self::SetJsFajl($array[2]);
            call_user_func([$array[0],$array[1]]);
        }else if($array!=-1 && $include==false){//olyat hivunk meg, amitol varunk adatot
            return call_user_func([$array[0],$array[1]]);
        }else{
        return -1;
        }
    }
}
?>