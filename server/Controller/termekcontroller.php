<?php
namespace Server\Controller;
use Server\View\TermekView;
use Server\Model\TermekekModel;
class TermekController{
    public static function Main($aruId){
        $aru=TermekekModel::lekerdezAruById($aruId);
        if ($aru) {
            TermekView::ShowAru($aru);
            return 1;
        }
        return 0;
    }
}
?>