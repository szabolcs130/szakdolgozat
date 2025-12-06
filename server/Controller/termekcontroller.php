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
use Server\Model\ErtekEllenorzesModel;
use Server\MeghivasEllenorzo;
class TermekController{
    public static function Main($aruId){
        $aruId=ErtekEllenorzesModel::Szam($aruId,0,99999999);
        if ($aruId===false) {
            return 0;
        }
        $aru=TermekekModel::lekerdezAruById($aruId);
        $kosarban=KosarModel::getAruById($aruId);
        if (is_array($aru) && !empty($aru)) {
            TermekView::ShowAru($aru,$kosarban);
            $megVasaroltE=FizetesEredmenyModel::GetMegvasaroltAruE($aruId,$_SESSION['userId']);
            if (isset($_SESSION['userId']) && is_array($megVasaroltE) && !empty($megVasaroltE)) {
                VelemenyView::ShowVelemenyIras($aruId);
            }
            VelemenyView::ShowVelemeny();//VelemenyModel::lekerdezVelemenyByAruId($aruId)
            MeghivasEllenorzo::SetCssFajl("Velemeny");
            MeghivasEllenorzo::SetJsFajl("Velemeny");
            return 1;
        }
        return 0;
    }
}
?>