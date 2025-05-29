<?php
namespace Server;
use Server\Model\MenuModel;
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
            foreach ( MenuModel::GetMenu() as $ertek) {
                if (htmlspecialchars($_GET["oldal"])==$ertek["nev_menu"]) {
                    $controller='Server\\Controller\\'.$ertek["nev_menu"].'Controller';
                    if (class_exists($controller) && method_exists($controller,"main")) {
                        self::SetCssFajl($ertek["nev_menu"]);
                        self::SetJsFajl($ertek["nev_menu"]);
                        $controller::main();
                    }else{
                        echo "A kert tartalom nem elerheto!";
                        //logolni, ha osztaly vagy metodus nem elerheto!!
                    }
                    break;
                }
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