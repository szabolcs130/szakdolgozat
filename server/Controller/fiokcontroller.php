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
            $meghiv=BejelentkezesModel::GetSzemelyById($_SESSION["userId"]);//
            if ($meghiv){
               $meghiv=FiokView::ShowFiok($meghiv);
               if ($meghiv) {
                    return 1;
               }
            }
        }
        return 0;
    }
    
}
?>