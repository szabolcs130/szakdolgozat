<?php
namespace Server\Controller;
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
use Server\View\FiokView;
use Server\Model\BejelentkezesModel;
class FiokController{
    public static function Main(){
        if (isset($_SESSION["userId"])) {
            $meghiv=BejelentkezesModel::GetSzemelyById($_SESSION["userId"]);
            if (is_array($meghiv) && !empty($meghiv)){
               if (FiokView::ShowFiok($meghiv)!=0) {
                    return 1;
               }
            }
        }
        return 0;
    }
}
?>