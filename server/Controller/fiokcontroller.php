<?php
namespace Server\Controller;
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
use Server\View\FiokView;
use Server\Model\BejelentkezesModel;
class FiokController{
    public static function Main(){
        if (isset($_SESSION["username"])) {
            $meghiv=BejelentkezesModel::GetSzemelyByName($_SESSION["username"]);//
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