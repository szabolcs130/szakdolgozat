<?php
namespace Server\View;
class AdminView{
    public static function Main(){
        echo '<div id="kontener">';
        echo '<nav id="kismenuk">';
        echo '<ul id="menuUl">';
        echo '<li id="adminFooldal" class="menuLi"><a class="menuA" href="#">Admin Fooldal</a></li>';//?oldal=Admin/Fooldal
        echo '<li id="adminTermek" class="menuLi"><a class="menuA" href="#">Termek lista</a></li>';//?oldal=Apitermekek/Main
        echo '<li id="admintermekUj" class="menuLi"><a class="menuA" href="#">Termek uj</a></li>';//?oldal=Admin/TermekUj
        echo '</ul>';
        echo '</nav>';
        echo '</div>';
        echo '<div id="adminTartalom">';
        echo '<h1>Udv az admin oldalon!</h1>';
        echo '</div>';
        echo '</div>';
    }
    /*public static function ShowAruCRUD($aru){
      foreach ($aru as $ertek) {
            echo '<div class="aru">';
                echo '<div class="aru_nev">'.$ertek['nev_aru'].'</div>';
                echo '<div class="aru_ar">'.$ertek['ar'].'</div>';
                echo '<div class="aru_leiras">'.$ertek['leiras'].'</div>';
                echo '<li><a href="?oldal=Termek/Main/'.$ertek['id_aru'].'">Megnéz</a></li>';
            echo '</div>';
       }
    }*/
}
?>