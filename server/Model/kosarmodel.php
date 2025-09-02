<?php
namespace Server\Model;
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
class KosarModel{
    public static function getKosar(){
        return $_SESSION['kosar'];
    }
    public static function hozzaadAru($id,$nev,$ar,$me){//esetleg ha mar raktunk bele ugyan olyat, akkor ne egyet hanem novelje a szamat
        //controllerbe vizsgaljuk, hogy tenylegesen letezik e a kapott termek es minden adata megfelelo!!!
        if (is_numeric($me)) {
            if ($me>0) {
                $_SESSION['kosar'][$id]= [
                    'nev' => $nev,
                    'ar' => $ar,
                    'me' => ($me)
                ];
            }else{
                self::torolAru($id);
            }
        }
    }
    public static function torolAru($id){
        if(isset($_SESSION['kosar'][$id])){
            unset($_SESSION['kosar'][$id]);
        }
    }
    public static function getAruById($id){
        if (is_numeric($id)) {
            foreach ($_SESSION['kosar'] as $key => $value) {
                if ($key==$id) {
                    $aru=$_SESSION["kosar"][$id];
                    return $aru;
                }
            }
        }
        return 0;
    }
    public static function getOsszAr(){
        $osszAr=0;
        foreach ($_SESSION['kosar'] as $key => $value) {
            $osszAr+=$value["ar"]*$value["me"];
        }
        return $osszAr;
    }
}
?>