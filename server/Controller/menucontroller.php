<?php
namespace Server\Controller;
use Server\View\MenuView;
use Server\Model\MenuModel;
class MenuController{
    public static function Main(){

        $menu=MenuModel::lekerdezMenu();
        MenuView::ShowMenu($menu);
    }
}
?>