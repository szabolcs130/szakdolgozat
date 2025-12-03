<?php
namespace Server\Controller;
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
use Server\Model\TermekekModel;
class ApiadminController{
    public static function Aruklekerdez(){
        header('Content-Type: application/json; charset=utf-8');
        ob_clean(); 
        $aru=FooldalModel::lekerdezAru();
        if ($aru) {
            echo json_encode($aru);
            exit;
        }
        echo json_encode([]);
        exit;
    }
    public static function Kepek(){
        header('Content-Type: application/json; charset=utf-8');
        ob_clean();
        if ((isset($_SESSION["username"]) && $_SESSION['rang']==3)) {
            $dir = __DIR__.'/../../Client/image/';
            $realdir=realpath($dir);
            if (is_dir($realdir)) {
                $img = glob($dir . "*.{png}", GLOB_BRACE);
                $imgNevek=[];
                foreach ($img as $i) {
                    $imgNevek[]=basename($i);
                    //echo '<img src="./Client/image/'.basename($i).'">';
                }
                echo json_encode($imgNevek);
                exit; 
            }
        }
        echo json_encode([]);
        exit;
    }
}
?>