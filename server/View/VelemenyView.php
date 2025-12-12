<?php
namespace Server\View;
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
class VelemenyView{
      public static function ShowVelemeny(){
        echo '<div id="velemenyekTarolo">';
        echo "<div id='sajatVelemeny'>";
        echo '</div>';
        echo "<div id='masVelemeny'>";
        echo '<p>Mások vélemenye:</p>';
        echo '</div>';
        echo '<div id="lapozo">';
        echo '<li id="elozo">Előző</li>';
        echo '<select id="oldalValaszto"></select>';
        echo '<li id="kovetkezo">Következő</li>';
        echo '</div>';
        echo '</div>';
    }
    public static function ShowVelemenyIras($aruId){
        echo '<div id="velemenyIrasaTarolo">';
        echo '<form id="VelemenyForm" method="post" action="?oldal=Velemeny/VelemenyBekuld">';
        echo '<h3>Vélemény írása: </h3><br>';
        echo '<input type="hidden" name="aruId" value="'.$aruId.'">';
        echo '<div class="ErrorDiv">';        
        echo '<br><textarea id="velemenyInput" minlength="2" maxlength="254" wrap="off" name="velemenyInput" placeholder="Véleményed:" required></textarea>';
        echo '<p id="errorVelemenyP"></p>';
        echo '</div>';
        echo '<br><button id="velemenyBekuld" type="submit">Beküld</button>';
        echo '</form>';
        echo '</div>';
    }
}
?>