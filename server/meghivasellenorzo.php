<?php
namespace Server;
class MeghivasEllenorzo{
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
            <script type="module" src="./client/js/<?php echo $fajl;?>.js?v=1"></script>
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
        /*if ($array && $include==true) {//oldalhivasra
            self::SetCssFajl($array[2]);
            self::SetJsFajl($array[2]);
                echo "NINCS PARAMETER";
            return call_user_func([$array[0],$array[1]]);
        }else if($array && $include==false){//olyat hivunk meg, amitol varunk adatot
            if (is_numeric($param)) {
                echo "PARAMETER";
                return call_user_func([$array[0],$array[1]],$param);
            }else{
                echo "NINCS PARAMETER";
                return call_user_func([$array[0],$array[1]]);
            }
        }else{
            return 0;
        }*/
        if ($array) {
            if ($include==true) {
                self::SetCssFajl($array[2]);
                self::SetJsFajl($array[2]);
            }
            $rm=new \ReflectionMethod($array[0],$array[1]);
            if ($param!=null && count($param)>=$rm->getNumberOfRequiredParameters()) {
                return call_user_func([$array[0],$array[1]],$param[0]);
            }/*else{
                return 0;
            }*/
            return call_user_func([$array[0],$array[1]]);
        }
        return 0;
    }
}
?>