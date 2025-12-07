<?php
namespace Server\View;
class FooldalView{

    public static function Main(){
        echo '<div id="szuroTarolo">';
        echo '</div>';
        echo '<div id="aruk"></div>';
        echo '<div id="lapozo">';
        echo '<li id="elozo">Elöző</li>';
        echo '<select id="oldalValaszto"></select>';
        echo '<li id="kovetkezo">Következő</li>';
        echo '</div>';
        return 1;
    }
}
?>