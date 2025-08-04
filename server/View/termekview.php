<?php
namespace Server\View;
class TermekView{
    public static function ShowAru($aru){
       echo '<div id="aruk">';
       echo '<form id="termekForm">';
       foreach ($aru as $ertek) {
            echo '<div id="aru">';
            echo '<input type="hidden" name="aruId" value='.$ertek["id_aru"].'>';
            echo '<div class="aru_nev">'.$ertek['nev_aru'].'</div>';
            echo '<div class="aru_ar">'.$ertek['ar'].'</div>';
            echo '<div class="aru_leiras">'.$ertek['leiras'].'</div>';
            echo '<button id="elkuldGomb" type="submit">Kosarba</button>';
            echo '</div>';
       }
       echo '</div>';
    }
    public static function TermekNemTalalhato(){
        echo "<h1>A keresett termek nem talalhato!</h1>";
    }
}
?>