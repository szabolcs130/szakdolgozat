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
        if (isset($_SERVER['REQUEST_URI'])) {
          if (is_dir("http://localhost/Szakdolgozat/server/")) {
            echo $_SERVER['REQUEST_URI']." <br>";
          }
            
        }
        if (isset($_GET["oldal"])) {
            
            switch (htmlspecialchars($_GET["oldal"])) {
                case 'fooldal':
                    Controller\FooldalController::main();
                    break;
                case 'rolunk':
                    Controller\RolunkController::main();
                    break;
                default:
                    
                    break;
            }
        }
        return null;
    }
}
?>