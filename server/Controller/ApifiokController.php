<?php
namespace Server\Controller;
use Server\Model\FizetesEredmenyModel;
use Server\Model\ErtekEllenorzesModel;
class ApifiokController{
    public static function GetMegvasaroltak(){
        header('Content-Type: application/json; charset=utf-8');
        ob_clean();
        if (isset($_SESSION['userId'])) {
            $oldalSzam=null;
            if (isset($_GET['oldalSzam'])) {
                $oldalSzam=ErtekEllenorzesModel::Szam($_GET['oldalSzam'],0,99999999);
                if ($oldalSzam===false) {
                    $oldalSzam=null;
                }    
            }
            $megvasaroltak=FizetesEredmenyModel::GetMegvasaroltak($_SESSION['userId'],$oldalSzam);
            if (is_array($megvasaroltak) && !empty($megvasaroltak)){
                echo json_encode($megvasaroltak);
                exit;
            }
        }
        echo json_encode([]);
        exit;
    }
    public static function GetMegvasaroltakOsszes(){
        header('Content-Type: application/json; charset=utf-8');
        ob_clean();
        if (isset($_SESSION['userId'])) {
            $megvasaroltak=FizetesEredmenyModel::GetMegvasaroltakOsszes($_SESSION['userId']);
            if (is_array($megvasaroltak) && !empty($megvasaroltak)){
                echo json_encode($megvasaroltak);
                exit;
            }
        }
        echo json_encode([]);
        exit;
    }
}