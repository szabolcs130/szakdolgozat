<?php
namespace Server\View;
class FiokView{
    public static function ShowFiok($fiok){
        if (is_array($fiok)) {
            echo '<div id="fiokAdat">';
            foreach ($fiok as $f) {
                echo $f["nev_szemely"]." ".$f["email"];
            }
            echo '</div>';
        }else{
            return 0;
        } 
    }
}
?>