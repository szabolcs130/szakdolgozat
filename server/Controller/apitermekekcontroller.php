<?php
namespace Server\Controller;
use Server\Model\AruModel;
use Server\Model\ErtekEllenorzesModel;
class ApitermekekController{
    public static function Main(){
        header('Content-Type: application/json; charset=utf-8');
        ob_clean(); 
            $aru=AruModel::lekerdezAru();
            if (is_array($aru) && !empty($aru)){
            echo json_encode($aru);
            exit;
            }
        echo json_encode([]);
        exit;
    }
    public static function AruOsszSor(){
        header('Content-Type: application/json; charset=utf-8');
        ob_clean(); 
        $aru=AruModel::lekerdezAruOsszSor();
        if (is_array($aru) && !empty($aru)) {
            echo json_encode($aru);
            exit;
        }
        echo json_encode([]);
        exit;
    }
    public static function lekerdezAruSzures(){
        header('Content-Type: application/json; charset=utf-8');
        ob_clean(); 
            $oldalSzam=null;
            if (isset($_GET['oldalSzam'])) {
                $oldalSzam=ErtekEllenorzesModel::Szam($_GET['oldalSzam'],0,99999999);
                if ($oldalSzam===false) {
                    $oldalSzam=0;
                }    
            }
            $nev=null;
            if (isset($_GET['nev'])) {
                $nev=ErtekEllenorzesModel::Szoveg($_GET["nev"],1,254,"/^[A-Za-z0-9]+$/");
                if ($nev===false) {
                    $nev=null;
                }
            }
            $minAr=null;
            if (isset($_GET['minAr'])) {
                $minAr=ErtekEllenorzesModel::Szam($_GET["minAr"],0,99999999);
                if ($minAr===false) {
                    $minAr=null;
                }
            }
            $maxAr=null;
            if (isset($_GET['maxAr'])) {
                $maxAr=ErtekEllenorzesModel::Szam($_GET["maxAr"],0,99999999);
                if ($maxAr===false) {
                    $maxAr=null;
                }
            }
            $osszesDarab=null;
            if (isset($_GET['osszesDarab'])) {
                $osszesDarab=$_GET['osszesDarab'];
                if ($osszesDarab!=true) {
                    $osszesDarab=null;
                }
            }
                $aru=AruModel::lekerdezAruSzures($oldalSzam,$osszesDarab,$nev,$minAr,$maxAr);
                if (is_array($aru) && !empty($aru)) {
                    echo json_encode($aru);
                    exit;
                }
        echo json_encode([]);
        exit;
    }
    public static function lekerdezAruMaxAr(){
        header('Content-Type: application/json; charset=utf-8');
        ob_clean(); 
        $aru=AruModel::lekerdezAruMaxAr();
        if (is_array($aru) && !empty($aru)) {
            echo json_encode($aru);
            exit;
        }
        echo json_encode([]);
        exit;
    }
    public static function lekerdezAruById(){
        header('Content-Type: application/json; charset=utf-8');
        ob_clean();
        $aruId=null;
        if (isset($_GET["aruId"])){
            $aruId=ErtekEllenorzesModel::Szam($_GET["aruId"],0,99999999);
            if ($aruId!==false) {
                $aru=AruModel::lekerdezAruById($aruId);
                if (is_array($aru) && !empty($aru)) {
                    echo json_encode($aru);
                    exit;
                }
            }
        }
        echo json_encode([]);
        exit;
    }
}
?>