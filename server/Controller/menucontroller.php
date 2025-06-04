<?php
namespace Server\Controller;
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
use Server\View\MenuView;
use Server\Model\MenuModel;
class MenuController{
    public static function Main(){
        if (isset($_SESSION["rang"])) {
            $menu=MenuModel::GetMenuByRang($_SESSION["rang"]);
        }else{
            $menu=MenuModel::GetMenuByRang(0);
        }
        if ($menu!=-1) {
            if (MenuView::ShowMenu($menu)==-1) {
                return -1;
            }
        }else{
            return -1;
        }
    }
}
?>