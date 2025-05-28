<?php
namespace Server\View;
class FooldalView{

    public static function ShowAru($aru){
       echo '<div id="aruk">';
       foreach ($aru as $ertek) {
            echo '<div class="aru">';
                echo '<div class="aru_nev">'.$ertek['nev_aru'].'</div>';
                echo '<div class="aru_ar">'.$ertek['ar'].'</div>';
                echo '<div class="aru_leiras">'.$ertek['leiras'].'</div>';
            echo '</div>';
       }
       echo '</div>';
    }
}
?>