<?php
namespace Server;
class Request{
    public static function AutoLoader(){
        spl_autoload_register(function ($osztaly){
            $osztaly=strtolower($osztaly);
            $osztaly=str_replace("\\","/",$osztaly);
            require_once($osztaly.".php");
        });
    }
    public static function GetKeres(){
        if (isset($_GET["oldal"])) {
            return htmlspecialchars($_GET["oldal"]);
        }
        return null;
    }
}
?>