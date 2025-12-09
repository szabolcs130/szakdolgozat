<?php
namespace Server\View;
class KosarView{
    public static function ShowKosar($kosar,$osszAr,$szallitasiCimVanE){
        if ($kosar!="ures") {
            echo '<div id="aruk">';
            foreach ($kosar as $key => $value) {
                echo '<form method="POST" action="?oldal=Kosar/MennyisegValtoztat">';
                echo '<input type="hidden" name="aruId" value='.$key.'>';
                echo '<a href="?oldal=Termek/Main/'.$key.'">'.$value["nev"].'</a> '.$value["ar"].' ';
                echo '<input class="kosarMennyiseg" type="number" id="me" name="me" min="0" max="'.$value['maxMe'].'" value="'.$value["me"].'">';
                echo '<button id="kosarBekuldGomb" type="submit">Valtoztat</button>';
                echo '<p>Raktárban: '.$value['maxMe'].'</p>'; 
                echo '</form>';
            }
            echo '<div>Összesen: '.$osszAr.' Forint</div>';
            if ($szallitasiCimVanE) {
                echo '<li><a id="fizetesMegnyom" href="?oldal=Fizetes/Main">Fizetes</a></li';
            }else{
                echo '<h4>Fizetéshez szükséges megadni a szállítási adatokat!</h4>';
                echo '<li><a href="?oldal=Fiok/ShowSzallitasicimForm">Szállítási adatok megadása</a></li';
            }
            echo '</div>';
           }else{
            echo "Kosar tartalma ures";
        }
        
    }
}
?>