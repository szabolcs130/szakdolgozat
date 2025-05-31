<?php
namespace Server\Controller;
use Server\View\MenuView;
use Server\Model\MenuModel;
class MenuController{
    public static function Main(){
        $menu=MenuModel::GetMenu();
        if($menu==-1){
            return -1;
        }
        if ($menu!=-1) {
            if (MenuView::ShowMenu($menu)==-1) {
                return -1;
            }
        }
    }
}
?>