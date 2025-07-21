<?php
namespace Server\Controller;
use Server\Model\FooldalModel;
class ApiTermekekController{
    public static function Main(){
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
   
}
?>