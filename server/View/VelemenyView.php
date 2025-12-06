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
        echo '<p>Masok velemenye:</p>';
        echo '</div>';
        echo '<div id="lapozo">';
        echo '<li id="elozo">Elozo</li>';
        echo '<select id="oldalValaszto"></select>';
        echo '<li id="kovetkezo">Kovetkezo</li>';
        echo '</div>';
        echo '</div>';
    }
    public static function ShowVelemenyIras($aruId){
        echo '<div id="velemenyIrasaTarolo">';
        echo '<form id="VelemenyForm" method="post" action="?oldal=Velemeny/VelemenyBekuld">';
        echo '<h3>Vélemény írása: </h3><br>';
        echo '<input type="hidden" name="aruId" value="'.$aruId.'">';
        echo '<br><textarea id="velemenyInput" name="velemenyInput" placeholder="Véleményed:" required></textarea>';
        echo '<br><button type="submit">Beküld</button>';
        echo '</form>';
        echo '</div>';
    }
}
?>