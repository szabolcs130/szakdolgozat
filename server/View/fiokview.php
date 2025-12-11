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
            echo '<div id="sajatAdatok">';
            echo '<p>Saját adatok:</p>';
            echo '<div id="sajatAdatNev">';
            echo '<p id="sajatAdatNevP">Név: '.$f["nev_szemely"].'</p>';
            echo '</div>';
            echo '<div id="sajatAdatEmail">';
            echo '<p id="sajatAdatEmailP">Email: '.$f["email"].'</p>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
        echo '<div id="ShowSzallitasicimFormLi">';
        echo '<li id="ShowSzallitasicimFormLi"><a id="ShowSzallitasicimFormA" href="?oldal=Fiok/ShowSzallitasicimForm">Szállítási cím kezelő</a></li>';
        echo '</div>';
        echo '<div id="tablazatTarolo"></div>';
        echo '<div id="lapozo">';
        echo '<li id="elozo">Elöző</li>';
        echo '<select id="oldalValaszto"></select>';
        echo '<li id="kovetkezo">Következő</li>';
        echo '</div>';
        return 1;
    }
    public static function ShowSzallitasiCimTorles(){
        echo '<li><a id="szallitasiCimTorolA" href="?oldal=Fiok/SzallitasicimTorles">Szállítási cím törlése</a></li>';
    }
    public static function ShowSzallitasiCimForm($szallitas,$metodus){
        echo "<h1>Szállítási cím kezelő: </h1>";
        if ($szallitas!=null) {
            foreach ($szallitas as $key => $value) {
            echo '<div id="szallitasicimFormTarolo">';
            echo '<form id="szallitasicimForm" method="post" action="?oldal=Fiok/'.$metodus.'">';//SzallitasicimHozzaad
            echo '<div class="ErrorDiv">';
            echo '<label for="iranyitoszam">Iranyitószám:</label>';
            echo '<input type="number" name="iranyitoszam" id="iranyitoszam" value="'.$value['iranyitoszam'].'" autocomplete="off" autofocus placeholder="Iranyitószám">';
            echo '<p id="errorIranyitoSzamP"></p>';
            echo '</div>';
            echo '<div class="ErrorDiv">';
            echo '<label for="varos">Város:</label>';
            echo '<input type="text" name="varos" id="varos" value="'.$value['varos'].'" autocomplete="off" placeholder="Város">';
            echo '<p id="errorVarosP"></p>';
            echo '</div>';
            echo '<div class="ErrorDiv">';
            echo '<label for="utca">Utca:</label>';
            echo '<input type="text" name="utca" id="utca" value="'.$value['utca'].'" autocomplete="off" placeholder="Utca">';
            echo '<p id="errorUtcaP"></p>';
            echo '</div>';
            echo '<div class="ErrorDiv">';
            echo '<label for="hazszam">Házszám:</label>';
            echo '<input type="text" name="hazszam" id="hazszam" value="'.$value['hazszam'].'" autocomplete="off" placeholder="Házszám">';
            echo '<p id="errorHazSzamP"></p>';
            echo '</div>';
            echo '<div class="ErrorDiv">';
            echo '<label for="emelet">Emelet(Nem kötelező):</label>';
            echo '<input type="number" name="emelet" id="emelet" value="'.($value['emelet']!=-100 ? $value['emelet'] : "") .'" autocomplete="off" placeholder="Emelet">';
            echo '<p id="errorEmeletP"></p>';
            echo '</div>';
            echo '<div class="ErrorDiv">';
            echo '<label for="ajto">Ajtó(Nem kötelező):</label>';
            echo '<input type="text" name="ajto" id="ajto" value="'.($value['ajto']!=null ? $value['ajto'] : "") .'" autocomplete="off" placeholder="Ajtó">';
            echo '<p id="errorAjtoP"></p>';
            echo '</div>';
            echo '<button id="szallitasicimBekuldGomb" type="submit">Beküld</button>';
            echo '</form>';
            echo '</div>';
            self::ShowSzallitasiCimTorles();
            }
        }else{
            echo '<div id="szallitasicimFormTarolo">';
            echo '<form id="szallitasicimForm" method="post" action="?oldal=Fiok/'.$metodus.'">';//SzallitasicimHozzaad
            echo '<div class="ErrorDiv">';
            echo '<label for="iranyitoszam">Iranyitószám:</label>';
            echo '<input type="number" name="iranyitoszam" id="iranyitoszam" autocomplete="off" autofocus placeholder="Iranyitószám">';
            echo '<p id="errorIranyitoSzamP"></p>';
            echo '</div>';
            echo '<div class="ErrorDiv">';
            echo '<label for="varos">Város:</label>';
            echo '<input type="text" name="varos" id="varos" autocomplete="off" placeholder="Város">';
            echo '<p id="errorVarosP"></p>';
            echo '</div>';
            echo '<div class="ErrorDiv">';
            echo '<label for="utca">Utca:</label>';
            echo '<input type="text" name="utca" id="utca" autocomplete="off" placeholder="Utca">';
            echo '<p id="errorUtcaP"></p>';
            echo '</div>';
            echo '<div class="ErrorDiv">';
            echo '<label for="hazszam">Házszám:</label>';
            echo '<input type="text" name="hazszam" id="hazszam" autocomplete="off" placeholder="Házszám">';
            echo '<p id="errorHazSzamP"></p>';
            echo '</div>';
            echo '<div class="ErrorDiv">';
            echo '<label for="emelet">Emelet(Nem kötelező):</label>';
            echo '<input type="number" name="emelet" id="emelet" autocomplete="off" placeholder="Emelet">';
            echo '<p id="errorEmeletP"></p>';
            echo '</div>';
            echo '<div class="ErrorDiv">';
            echo '<label for="ajto">Ajtó(Nem kötelező):</label>';
            echo '<input type="text" name="ajto" id="ajto" autocomplete="off" placeholder="Ajtó">';
            echo '<p id="errorAjtoP"></p>';
            echo '</div>';
            echo '<button id="szallitasicimBekuldGomb" type="submit">Beküld</button>';
            echo '</form>';
            echo '</div>';
        }
    }
}
?>