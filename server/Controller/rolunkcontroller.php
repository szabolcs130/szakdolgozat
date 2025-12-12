<?php
namespace Server\Controller;
use Server\View\RolunkView;
class RolunkController{
    public static function Main(){
        RolunkView::Main();
        return 1;
    }
}
?>