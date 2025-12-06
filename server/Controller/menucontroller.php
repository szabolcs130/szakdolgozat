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
        if (is_array($menu) && !empty($menu)) {
            MenuView::ShowMenu($menu);
            return 1;
        }
        return 0;
    }
}
?>