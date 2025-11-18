<?php
namespace Server\Controller;
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
use Server\View\AdminView;
use Server\Model\AdminModel;
use Server\Model\AruModel;
class AdminController{
    public static function Main(){
        AdminView::Main();
        //AdminView::ShowAruCRUD(AruModel::lekerdezAru());
        return 1;
    }
    public static function AruTorol($id){
        AruModel::AruTorol($id);
        return 1;
    }
}
?>