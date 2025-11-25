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
            echo '<div>'.$ertek['mennyiseg']<=0 ? "Elfogyott" : "Raktarban: ".$ertek['mennyiseg']."db".'</div>';
            if (isset($_SESSION["username"])) {
                if ($kosarban) {
                    if ($ertek['mennyiseg']>0) {
                        echo '<div id="kosarDiv">';
                        echo '<label for="me">Kosarban: </label>';
                        echo '<input type="number" id="me" name="me" min="1" value="'.$kosarban["me"].'">';
                        echo '<button id="elkuldGomb" type="submit">Kosarba</button>';
                        echo '</div>';
                    }
                }else{
                    if ($ertek['mennyiseg']>0) {
                        echo '<div id="kosarDiv">';
                        echo '<input type="number" id="me" name="me" min="1" value="1">';
                        echo '<button id="elkuldGomb" type="submit">Kosarba</button>';
                        echo '</div>';
                    }
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