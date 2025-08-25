<?php
namespace Server\View;
class KosarView{
    public static function ShowKosar($kosar){
        if ($kosar!="ures") {
            echo '<div id="aruk">';
            foreach ($kosar as $key => $value) {
                echo '<form method="POST" action="?oldal=Kosar/Torol">';
                echo '<input type="hidden" name="aruId" value='.$key.'>';
                echo $value["nev"]." ".$value["ar"]." ".$value["me"]."<br>";
                echo '<button type="submit">Torles</button>';    
                echo '</form>';

            }
            echo '</div>';
        }else{
            echo "Kosar tartalma ures";
        }
    }
}
?>