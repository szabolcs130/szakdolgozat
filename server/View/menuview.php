<?php
namespace Server\View;
class MenuView{

    public static function ShowMenu($menu){
        echo '<nav id="menuk">';
        echo '<ul id="menuUl">';
        foreach ($menu as $ertek) {
            ?>
                <li class="menuLi"><a class="menuA" href="?oldal=<?php echo $ertek['nev_menu'];?>"><?php echo $ertek['nev_menu'];?></a></li>
            <?php  
        }
        echo '</ul>';
        echo '</nav>';
    }
}
?>