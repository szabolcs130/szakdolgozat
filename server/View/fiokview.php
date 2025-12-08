<?php
namespace Server\View;
class FiokView{
    public static function ShowFiok($fiok){
        if (isset($_SESSION['uzenet'])) {
            echo '<h3>'.$_SESSION['uzenet'].'</h3>';
            unset($_SESSION['uzenet']);
        }
        echo '<div id="fiokAdat">';
        foreach ($fiok as $f) {
            echo $f["nev_szemely"]." ".$f["email"];
        }
        echo '</div>';
        echo '<div id="tablazatTarolo"></div>';
        echo '<div id="lapozo">';
        echo '<li id="elozo">Elöző</li>';
        echo '<select id="oldalValaszto"></select>';
        echo '<li id="kovetkezo">Következő</li>';
        echo '</div>';
        return 1;
    }
}
?>