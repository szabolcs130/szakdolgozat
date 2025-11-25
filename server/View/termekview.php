<?php
namespace Server\View;
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
class TermekView{
    public static function ShowAru($aru,$kosarban){
       echo '<div id="aruk">';
       echo '<form id="termekForm">';
       foreach ($aru as $ertek) {
            echo '<div id="aru">';
            echo '<input type="hidden" name="aruId" id="aruId" value='.$ertek["id_aru"].'>';
            echo '<div id="aru_nev">'.$ertek['nev_aru'].'</div>';
            echo '<div id="aru_kep"></div>';
            echo '<div id="aru_ar">'.$ertek['ar'].' Forint</div>';
            echo '<div id="aru_leiras">'.$ertek['leiras'].'</div>';
            if (isset($_SESSION["username"])) {
                if ($kosarban) {
                    echo '<div>'.$ertek['mennyiseg']>0 ? "Raktaron: ".$ertek['mennyiseg']."db" : "Elfogyott".'</div>';
                    echo '<div id="kosarDiv"><label for="me">Kosarban: </label>';
                    echo '<input type="number" id="me" name="me" min="1"  value="'.$kosarban["me"].'">';
                    echo '<button id="elkuldGomb" type="submit">Valtoztat</button></div>';
                }else{
                    echo '<div>'.$ertek['mennyiseg']>0 ? "Raktaron: ".$ertek['mennyiseg']."db" : "Elfogyott".'</div>';
                    echo '<div id="kosarDiv"><input type="number" id="me" name="me" min="1" value="1">';
                    echo '<button id="elkuldGomb" type="submit">Kosarba</button></div>';
                }
            }else{
                echo "<p>Kosar hasznalathoz bejelentkezeshez szukseges!</p>";
            }
            
            echo '</div>';//aru
       }
       echo '</form>';
       echo '</div>';//aruk
    }
    public static function TermekNemTalalhato(){
        echo "<h1>A keresett termek nem talalhato!</h1>";
    }
    
}
?>