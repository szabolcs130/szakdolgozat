<?php
namespace Server\Controller;
use Server\View\MenuView;
use Server\Model\MenuModel;
class MenuController{
    public static function Main(){

        $menu=MenuModel::GetMenu();
        if ($menu!=-1) {
            MenuView::ShowMenu($menu);
        }else{
            MenuView::ShowMenu("Menu nem elerheto!");
        }
        
    }
}
?>