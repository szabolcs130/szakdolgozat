<?php
namespace Server\View;
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
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
            if (isset($_SESSION["username"])) {
                echo '<input type="number" id="me" name="me" min="1" max="90" value="1">';
                echo '<button id="elkuldGomb" type="submit">Kosarba</button>';    
            }else{
                echo "<p>Kosar hasznalathoz bejelentkezeshez szukseges!</p>";
            }
            
            echo '</div>';
       }
       echo '</div>';
    }
    public static function TermekNemTalalhato(){
        echo "<h1>A keresett termek nem talalhato!</h1>";
    }
}
?>