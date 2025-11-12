<?php
namespace Server\Controller;
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
use Server\View\TermekView;
use Server\View\VelemenyView;
use Server\Model\TermekekModel;
use Server\Model\KosarModel;
use Server\Model\FizetesEredmenyModel;
use Server\Model\VelemenyModel;
use Server\MeghivasEllenorzo;
class TermekController{
    public static function Main($aruId){
        $aru=TermekekModel::lekerdezAruById($aruId);
        $kosarban=KosarModel::getAruById($aruId);
        if ($aru) {
            TermekView::ShowAru($aru,$kosarban);
            if (isset($_SESSION['userId']) && FizetesEredmenyModel::GetMegvasaroltAruE($aruId,$_SESSION['userId'])) {
                VelemenyView::ShowVelemenyIras($aruId);
            }
            VelemenyView::ShowVelemeny(VelemenyModel::lekerdezVelemenyByAruId($aruId));
            MeghivasEllenorzo::SetCssFajl("Velemeny");
            MeghivasEllenorzo::SetJsFajl("Velemeny");
            return 1;
        }
        return 0;
    }
}
?>