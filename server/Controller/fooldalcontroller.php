<?php
namespace Server\Controller;
use Server\View\FooldalView;
use Server\Model\FooldalModel;
class FooldalController{
    public static function Main(){

        $aru=FooldalModel::lekerdezAru();
        FooldalView::ShowAru($aru);
    }
}
?>