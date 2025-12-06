<?php
namespace Server\Model;
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
class KosarModel{
    public static function getKosar(){
        return $_SESSION['kosar'];
    }
    public static function hozzaadAru($id,$nev,$ar,$me){
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
    public static function torolAru($id){
        if(isset($_SESSION['kosar'][$id])){
            unset($_SESSION['kosar'][$id]);
        }
    }
    public static function getAruById($id){
        if (isset($_SESSION['kosar'][$id]) && is_numeric($id)) {
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
    public static function Urit(){
        if (isset($_SESSION['kosar'])) {
            $_SESSION['kosar']=[];
        }
    }
}
?>