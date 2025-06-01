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
            }else{
                return -1;
            }
        });
    }
    public static function GetKeres(){
        self::MeghivMVCMetodus(self::MVCFajlEsMetodusLetezikE("Menu","Main","Controller"),true);
        $oldal=$_GET["oldal"] ?? "Fooldal";
            $menu=self::MeghivMVCMetodus(self::MVCFajlEsMetodusLetezikE("Menu","GetMenu","Model"),false);
            if ($menu!=-1) {
                foreach ($menu as $ertek) {
                    if (htmlspecialchars($oldal)==$ertek["nev_menu"]) {
                        self::MeghivMVCMetodus(self::MVCFajlEsMetodusLetezikE($ertek["nev_menu"],"Main","Controller"),true);
                        break;
                    }
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
    public static function MeghivMVCMetodus($array,$include){
        if ($array!=-1 && $include) {
            self::SetCssFajl($array[2]);
            self::SetJsFajl($array[2]);
            call_user_func([$array[0],$array[1]]);
        }else if($array!=-1){
            return call_user_func([$array[0],$array[1]]);
        }
        return -1;
    }
}
?>