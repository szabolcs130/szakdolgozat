<?php
namespace Server;
class Autoloader{
public static function Main(){
        spl_autoload_register(function ($osztaly){
            //$osztaly=strtolower($osztaly);
            $osztaly=str_replace("\\","/",$osztaly);
            if (file_exists($osztaly.".php")) {
                require_once($osztaly.".php");
            }
        });
    }
}

?>