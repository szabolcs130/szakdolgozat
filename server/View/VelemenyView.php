<?php
namespace Server\View;
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
class VelemenyView{
      public static function ShowVelemeny($aruVelemenyek){
        echo '<div id="velemenyekTarolo">';
        echo "<br>Velemenyek:<br><br>";
        foreach ($aruVelemenyek as $ertek) {
            echo "<div class='velemenyegy'>";
                echo '<div class="szemely">'."Felhasznalo: ".$ertek['nev_szemely']." ".'</div>';
                echo '<div class="velemenyszoveg">'."Velemenye: ".$ertek['velemenyszoveg']." ".'</div>';
            echo "</div>";
       }
       echo '</div>';
    }
    public static function ShowVelemenyIras($aruId){
        echo '<div id="velemenyIrasaTarolo">';
        echo '<form id="VelemenyForm" method="post" action="?oldal=Velemeny/VelemenyBekuld">';
        echo '<br>Vélemény írása<br>';
        echo '<input type="hidden" name="aruId" value="'.$aruId.'">';
        echo '<br><textarea id="velemenyInput" name="velemenyInput" placeholder="Véleményed:" required></textarea>';
        echo '<br><button type="submit">Beküld</button>';
        echo '</form>';
        echo '</div>';
    }
}
?>