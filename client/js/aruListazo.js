export function Listazo(aruk) {
    aruk.forEach(element => {
        console.log(element.id_aru);
    });
}

/*
echo '<div id="aruk">';
       foreach ($aru as $ertek) {
            echo '<div class="aru">';
                echo '<div class="aru_nev">'.$ertek['nev_aru'].'</div>';
                echo '<div class="aru_ar">'.$ertek['ar'].'</div>';
                echo '<div class="aru_leiras">'.$ertek['leiras'].'</div>';
                echo '<li><a href="?oldal=Termek/Main/'.$ertek['id_aru'].'">Megnéz</a></li>';
            echo '</div>';
       }
       echo '</div>';
*/