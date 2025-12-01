<?php
namespace Server\Controller;
use Server\Model\AruModel;
class ApitermekekController{
    public static function Main(){//$szam
        header('Content-Type: application/json; charset=utf-8');
        ob_clean(); 
        //if (is_numeric($szam)) {
            $aru=AruModel::lekerdezAru();//$szam
            if ($aru) {
            echo json_encode($aru);
            exit;
            }
        //}
        echo json_encode([]);
        exit;
    }
    public static function AruOsszSor(){
        header('Content-Type: application/json; charset=utf-8');
        ob_clean(); 
        $aru=AruModel::lekerdezAruOsszSor();
        if ($aru) {
            echo json_encode($aru);
            exit;
        }
        echo json_encode([]);
        exit;
    }
    public static function lekerdezAruSzures(){
        header('Content-Type: application/json; charset=utf-8');
        ob_clean(); 
        //if (isset($_GET['oldalSzam'])) {
            //$oldalSzam=$_GET['oldalSzam'];
            //if (is_numeric($oldalSzam)) {
                $oldalSzam=$_GET['oldalSzam'] ?? null;
                $nev=$_GET['nev'] ?? null;
                $minAr=$_GET['minAr'] ?? null;
                $maxAr=$_GET['maxAr'] ?? null;
                $osszesDarab=isset($_GET['osszesDarab']) ? $_GET['osszesDarab'] : null;
                $aru=AruModel::lekerdezAruSzures($oldalSzam,$osszesDarab,$nev,$minAr,$maxAr);
                if ($aru) {
                    echo json_encode($aru);
                    exit;
                }
           // }
        //}
        echo json_encode([]);
        exit;
    }
    public static function lekerdezAruMaxAr(){
        header('Content-Type: application/json; charset=utf-8');
        ob_clean(); 
        $aru=AruModel::lekerdezAruMaxAr();
        if ($aru) {
            echo json_encode($aru);
            exit;
        }
        echo json_encode([]);
        exit;
    }
    public static function lekerdezAruById(){
        header('Content-Type: application/json; charset=utf-8');
        ob_clean(); 
        
        $aruId=$_GET['aruId'] ?? null;
        if ($aruId) {
            $aru=AruModel::lekerdezAruById($aruId);
            if ($aru) {
                echo json_encode($aru);
                exit;
            }
        }
        echo json_encode([]);
        exit;
    }
}
?>