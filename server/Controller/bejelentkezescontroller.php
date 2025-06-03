<?php
namespace Server\Controller;
use Server\View\BejelentkezesView;
use Server\Model\BejelentkezesModel;
class BejelentkezesController{
    public static function Main(){
        $szemely=BejelentkezesModel::GetSzemely();
        if($szemely==-1){
            return -1;
        }
        if ($szemely!=-1) {
            if (BejelentkezesView::ShowBejelentkezes($szemely)==-1) {
                return -1;
            }
        }
    }
}
?>