<?php
namespace Server\Controller;
use Server\View\FooldalView;
use Server\Model\FooldalModel;
class FooldalController{
    public static function Main(){
        if (FooldalView::Main()!=0) {
            return 1;
        } 
        return 0;
    }
}
?>