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
            if (isset($_SESSION['kosar'][$id])) {
               $regiMe=$_SESSION['kosar'][$id]['me'] ?? 0;
            }
            $_SESSION['kosar'][$id]= [
                'nev' => $nev,
                'ar' => $ar,
                'me' => ($regiMe+$me)
            ];
        }
    }
    public static function torolAru($id){
        if(isset($_SESSION['kosar'][$id])){
            unset($_SESSION['kosar'][$id]);
        }
    }
}
?>