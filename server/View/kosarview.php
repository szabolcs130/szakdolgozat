<?php
namespace Server\View;
class KosarView{
    public static function ShowKosar($kosar,$osszAr){
        if ($kosar!="ures") {
            echo '<div id="aruk">';
            foreach ($kosar as $key => $value) {
                echo '<form method="POST" action="?oldal=Kosar/MennyisegValtoztat">';
                echo '<input type="hidden" name="aruId" value='.$key.'>';
                echo $value["nev"]." ".$value["ar"]." ";
                echo '<input type="number" id="me" name="me" min="0" value="'.$value["me"].'">';
                echo '<button type="submit">Valtoztat</button>';  
                echo '</form>';
            }
            echo '<div>Összesen: '.$osszAr.' Forint</div>';
            echo '<li><a href="?oldal=Fizetes/Main">Fizetes</a></li';
            echo '</div>';
           }else{
            echo "Kosar tartalma ures";
        }
        
    }
}
?>