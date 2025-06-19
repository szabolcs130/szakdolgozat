<?php
namespace Server\View;
class MenuView{

    public static function ShowMenu($menu){
        if (is_array($menu)) {
            echo '<nav id="menuk">';
            echo '<ul id="menuUl">';
            foreach ($menu as $ertek) {
                ?>
                    <li class="menuLi"><a class="menuA" href="?oldal=<?php echo $ertek['nev_menu'];?>/Main"><?php echo $ertek['nev_menu'];?></a></li>
                <?php  
            }
            echo '</ul>';
            echo '</nav>';
            return 1;
        }
        return 0;
        //Menu nem elerheto, hiba uzenetet kaptunk
    }
}
?>