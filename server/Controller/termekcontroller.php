<?php
namespace Server\Controller;
use Server\View\TermekView;
use Server\Model\TermekekModel;
use Server\Model\KosarModel;
class TermekController{
    public static function Main($aruId){
        $aru=TermekekModel::lekerdezAruById($aruId);
        $kosarban=KosarModel::getAruById($aruId);
        if ($aru) {
            TermekView::ShowAru($aru,$kosarban);
            return 1;
        }
        return 0;
    }
}
?>