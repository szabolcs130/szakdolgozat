<?php
namespace Server\Controller;
use Server\View\FiokView;
use Server\Model\BejelentkezesModel;
class FiokController{
    public static function Main(){
        if (isset($_SESSION["username"])) {
            FiokView::ShowFiok(BejelentkezesModel::GetSzemelyByName($_SESSION["username"]));
        }
        
    }
    
}
?>