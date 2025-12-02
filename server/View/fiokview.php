<?php
namespace Server\View;
class FiokView{
    public static function ShowFiok($fiok){
        if (isset($_SESSION['uzenet'])) {
            echo '<h3>'.$_SESSION['uzenet'].'</h3>';
            unset($_SESSION['uzenet']);
        }
        if (is_array($fiok)) {
            echo '<div id="fiokAdat">';
            foreach ($fiok as $f) {
                echo $f["nev_szemely"]." ".$f["email"];
            }
            echo '</div>';
            return 1;
        }else{
            return 0;
        } 
    }
}
?>