<?php
namespace Server\Model;
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
class KosarModel{
    public static function getKosar(){
        return $_SESSION['kosar'];
    }
    public static function hozzaadAru($id,$nev,$ar){//esetleg ha mar raktunk bele ugyan olyat, akkor ne egyet hanem novelje a szamat
        //controllerbe vizsgaljuk, hogy tenylegesen letezik e a kapott termek es minden adata megfelelo!!!
        $_SESSION['kosar'][$id]= [
            'nev' => $nev,
            'ar' => $ar
            //kesobb a mennyiseg is szerepeljen!!
        ];
    }
    public static function torolAru($id){
        if(isset($_SESSION['kosar'][$id])){
            unset($_SESSION['kosar'][$id]);
        }
    }
}
?>