<?php
namespace Server\Controller;
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
use Server\Model\TermekekModel;
use Server\Model\ErtekEllenorzesModel;
class ApiadminController{
    public static function Kepek(){
        header('Content-Type: application/json; charset=utf-8');
        ob_clean();
        if ((isset($_SESSION["username"]) && $_SESSION['rang']==3)) {
            $lapozas=10;
            $oldalSzam=0;
            if (isset($_GET['oldalSzam'])) {
                $oldalSzam=ErtekEllenorzesModel::Szam($_GET['oldalSzam'],0,99999999);
                if ($oldalSzam===false) {
                    $oldalSzam=0;
                }    
            }
            $maxOldal=(int)$oldalSzam+$lapozas;
            $dir = __DIR__.'/../../Client/image/';
            $realdir=realpath($dir);
            $dirIt = new \DirectoryIterator($realdir);
            $i=0;
            if (isset($_GET['nev'])) {
                $nev=ErtekEllenorzesModel::Szoveg($_GET["nev"],1,254,"/^[A-Za-z0-9]+$/");
                if ($nev===false) {
                    $nev=null;
                }
            }
            $imgKuld=array();
            if ($nev==null) {
                foreach ($dirIt as $file) {
                    if (!$file->isFile()) continue;
                        if ($i>=$oldalSzam) {
                            if ($oldalSzam<$maxOldal) {
                            $name = $file->getFilename();
                                array_push($imgKuld,$name);
                                $oldalSzam++;
                            }else{
                                break;
                            }
                        }
                    $i++;
                }
            }else{
                foreach ($dirIt as $file) {
                    if (!$file->isFile()) continue;
                            $name = $file->getFilename();
                            if (str_contains(strtolower($name),strtolower($nev))) {
                                if ($i>=$oldalSzam) {
                                    if ($oldalSzam<$maxOldal) {
                                        array_push($imgKuld,$name);
                                        $oldalSzam++;
                                    }
                                }
                                $i++;
                            }
                }
            }
            echo json_encode($imgKuld);
            exit;
        }
        echo json_encode([]);
        exit;
    }
    public static function KepekOsszes(){
        header('Content-Type: application/json; charset=utf-8');
        ob_clean();
        if ((isset($_SESSION["username"]) && $_SESSION['rang']==3)) {
            $dir = __DIR__.'/../../Client/image/';
            $realdir=realpath($dir);
            $dirIt = new \DirectoryIterator($realdir);
            $i=0;
            $nev=null;
            if (isset($_GET['nev'])) {
                $nev=ErtekEllenorzesModel::Szoveg($_GET["nev"],1,254,"/^[A-Za-z0-9]+$/");
                if ($nev===false) {
                    $nev=null;
                }
            }
            $imgKuld[]=array();
            if ($nev==null) {
                foreach ($dirIt as $file) {
                    if (!$file->isFile()) continue;
                    $i++;
                }
            }else{
                foreach ($dirIt as $file) {
                    if (!$file->isFile()) continue;
                        $name = $file->getFilename();
                        if (str_contains(strtolower($name),strtolower($nev))) {
                            $i++;
                        }
                }
            }
            echo json_encode(array(array("osszes"=>$i)));
            exit;
        }
        echo json_encode([]);
        exit;
    }
}
?>