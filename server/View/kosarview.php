<?php
namespace Server\View;
class KosarView{
    public static function ShowKosar($kosar,$osszAr,$szallitasiCimVanE){
        if ($kosar!="ures") {
            echo '<h1>Kosár</h1>';
            echo '<div id="aruk">';
            echo '<div id="tablazatTarolo">';
            echo '<div id="aruTablazat">';
            echo '<table id="tablazat">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Név:</th>';
            echo '<th>Ár</th>';
            echo '<th>Mennyiség</th>';
            echo '<th>Gomb</th>';
            echo '<th>Raktárban</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            foreach ($kosar as $key => $value) {
                echo '<tr>';
                echo '<form class="mennyisegValtoztatForm" method="POST" action="?oldal=Kosar/MennyisegValtoztat">';
                echo '<input type="hidden" name="aruId" value='.$key.'>';
                echo '<td><a href="?oldal=Termek/Main/'.$key.'">'.$value["nev"].'</a></td>';
                echo '<td>'.$value["ar"].'</td>';
                echo '<td><input class="kosarMennyiseg" type="number" id="me" name="me" min="0" max="'.$value['maxMe'].'" value="'.$value["me"].'"></td>';
                echo '<td><button class="kosarBekuldGomb" type="submit">Valtoztat</button></td>';
                echo '<td>'.$value['maxMe'].'</td>'; 
                echo '</form>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
            echo '</div>';
            echo '<div id="vegosszeg">Összesen: '.$osszAr.' Forint</div>';
            if ($szallitasiCimVanE) {
                echo '<li id="fizetesMegnyomLi"><a id="fizetesMegnyomA" href="?oldal=Fizetes/Main">Fizetes</a></li';
            }else{
                echo '<h4>Fizetéshez szükséges megadni a szállítási adatokat!</h4>';
                echo '<li id="ShowSzallitasicimFormLi"><a id="ShowSzallitasicimFormA" href="?oldal=Fiok/ShowSzallitasicimForm">Szállítási adatok megadása</a></li';
            }
            echo '</div>';
           }else{
            echo "<div><h1>Kosár üres<h1</div>";
        }
        
    }
}
?>