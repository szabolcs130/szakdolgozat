<?php
namespace Server\View;
class AdminView{
    public static function Main(){
        echo '<div id="kontener">';
        echo '<nav id="kismenuk">';
        echo '<ul id="menuUl">';
        echo '<li id="adminFooldal" class="menuLi"><a class="menuA" href="?oldal=Admin/Main">Admin Fooldal</a></li>';
        echo '<li id="adminTermek" class="menuLi"><a class="menuA" href="?oldal=Admin/TermekKezeles">Termek Kezeles</a></li>';
        echo '<li id="adminRendeles" class="menuLi"><a class="menuA" href="?oldal=Admin/RendelesKezel">Rendelés Kezeles</a></li>';
        echo '</ul>';
        echo '</nav>';
        echo '<div id="adminTartalom">';
        echo '<h1 id="udvozloH1">Üdv az admin oldalon!</h1>';
        echo '</div>';
        echo '</div>';
        return 1;
    }
}
?>