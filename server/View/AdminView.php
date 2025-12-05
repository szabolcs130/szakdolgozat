<?php
namespace Server\View;
class AdminView{
    public static function Main(){
        echo '<div id="kontener">';
        echo '<nav id="kismenuk">';
        echo '<ul id="menuUl">';
        echo '<li id="adminFooldal" class="menuLi"><a class="menuA" href="?oldal=Admin/Main">Admin Fooldal</a></li>';//?oldal=Admin/Fooldal
        echo '<li id="adminTermek" class="menuLi"><a class="menuA" href="?oldal=Admin/TermekKezeles">Termek Kezeles</a></li>';//?oldal=Apitermekek/Main
        echo '</ul>';
        echo '</nav>';
        echo '<div id="adminTartalom">';
        echo '<h1>Üdv az admin oldalon!</h1>';
        echo '</div>';
        echo '</div>';
        return 1;
    }
}
?>