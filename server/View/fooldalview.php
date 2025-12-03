<?php
namespace Server\View;
class FooldalView{

    public static function Main(){
       /*echo '<div id="aruk">';
       foreach ($aru as $ertek) {
            echo '<div class="aru">';
                echo '<div class="aru_nev">'.$ertek['nev_aru'].'</div>';
                echo '<div class="aru_ar">'.$ertek['ar'].'</div>';
                echo '<div class="aru_leiras">'.$ertek['leiras'].'</div>';
                echo '<li><a href="?oldal=Termek/Main/'.$ertek['id_aru'].'">Megnéz</a></li>';
            echo '</div>';
        }
        echo '</div>';*/
        echo '<div id="szuroTarolo">';
        echo '</div>';
        echo '<div id="aruk"></div>';
        echo '<div id="lapozo">';
        echo '<li id="elozo">Elöző</li>';
        echo '<select id="oldalValaszto"></select>';
        echo '<li id="kovetkezo">Következő</li>';
        echo '</div>';
        
        //echo '<details>';
        //echo '<summary><input type="range" step="10" min=0 max=10000>';
        //echo '</summary>';
        //echo '</details>';

    }
}
?>