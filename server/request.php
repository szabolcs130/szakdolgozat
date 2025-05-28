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
       /* if (isset($_SERVER['REQUEST_URI'])) {
          if (is_dir("http://localhost/Szakdolgozat/server/")) {
            echo $_SERVER['REQUEST_URI']." <br>";
          }
            
        }*/
        if (isset($_GET["oldal"])) {
            
            switch (htmlspecialchars($_GET["oldal"])) {
                case 'fooldal':
                    self::SetCssFajl("fooldal");
                    self::SetJsFajl("fooldal");
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
    public static function SetCssFajl($fajl){ ?>
                <link rel="stylesheet" href="./client/css/<?php echo $fajl;?>.css?v=1">
        <?php
    }
    public static function SetJsFajl($fajl){ ?>
            <script src="./client/js/<?php echo $fajl;?>.js?v=1"></script>
        <?php
    }

}
?>