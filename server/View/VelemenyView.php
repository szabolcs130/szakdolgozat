<?php
namespace Server\View;
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
class VelemenyView{
      public static function ShowVelemeny($aruVelemenyek){
        //var_dump($aruVelemenyek);
        //echo $aruVelemenyek[0]['id_szemely'];
        echo '<div id="velemenyekTarolo">';
        echo "<br>Velemenyek:<br><br>";
        foreach ($aruVelemenyek as $ertek) {
            echo "<div class='velemenyegy'>";
            if ($ertek['id_szemely']==$_SESSION['userId']) {
                echo '<form id="velemenyForm" method="post" action="?oldal=Velemeny/VelemenyTorles">';
                echo '<input type="hidden" name="vId" value="'.$ertek['id_velemeny'].'">';
            }
            echo '<div class="szemely">'."Felhasznalo: ".$ertek['nev_szemely']." ".'</div>';
            echo '<div class="velemenyszoveg">'."Velemenye: ".$ertek['velemenyszoveg']." ".'</div>';
            if ($ertek['id_szemely']==$_SESSION['userId']) {
                echo '<button type="submit">Torles</button>';
                echo '</form>';
            }
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