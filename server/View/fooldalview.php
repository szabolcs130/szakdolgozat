<?php
namespace Server\View;
class FooldalView{

    public static function ShowAru($aru){
       foreach ($aru as $ertek) {
        echo $ertek['id_aru'].' '.$ertek['nev_aru'];
       }
    }
}
?>