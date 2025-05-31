<?php
namespace Server;
use Server\Model\MenuModel;
use Server\Controller\MenuController;
class Request{
    public static function AutoLoader(){
        spl_autoload_register(function ($osztaly){
            $osztaly=strtolower($osztaly);
            $osztaly=str_replace("\\","/",$osztaly);
            if (file_exists($osztaly.".php")) {
                require_once($osztaly.".php");
            }else{
                //header('Location: ./client/error/error.php');
                //logolni:nem elerheto a kert fajl!!!;
                /* 
                    Megjegyzes: lehet jobb megoldas egybol itt az error.phpra menni, minthogy egyessevel ellenorizni elerheto-e vagy sem.
                */
            }
        });
    }
    public static function GetKeres(){
        $menuMukodik=self::MenuBetolt();
        if (isset($_GET["oldal"])) {
            if (class_exists('Server\Model\MenuModel') && is_array($menu=MenuModel::GetMenu())) {
                foreach ( $menu as $ertek) {
                    if (htmlspecialchars($_GET["oldal"])==$ertek["nev_menu"]) {
                        //$controller='Server\\Controller\\'.$ertek["nev_menu"].'Controller';
                        $controller=self::ControllerNevMegad($ertek["nev_menu"]);
                        if (class_exists($controller) && method_exists($controller,"main")) {
                            self::SetCssFajl($ertek["nev_menu"]);
                            self::SetJsFajl($ertek["nev_menu"]);
                            $controller::main();
                        }else{
                            echo "<h1>A kert tartalom nem elerheto!</h1>";
                            //logolni:kert osztaly vagy metodus nem elerheto!!!
                        }
                        break;
                    }
                }
            }else{
                self::ErrorFajlMeghiv();
               //Menu nem elerheto!
            }
        }else{
            if (is_array(MenuModel::GetMenu()) && isset(MenuModel::GetMenu()[0]["nev_menu"])) {//Elso fooldal legyen!!
                //$controller='Server\\Controller\\'.MenuModel::GetMenu()[0]["nev_menu"].'Controller';
                $controller=self::ControllerNevMegad(MenuModel::GetMenu()[0]["nev_menu"]);
                if (class_exists($controller) && method_exists($controller,"main")) {
                    self::SetCssFajl(MenuModel::GetMenu()[0]["nev_menu"]);
                    self::SetJsFajl(MenuModel::GetMenu()[0]["nev_menu"]);
                    $controller::main();
                }
            }
        }
        return null;
    }
    public static function SetCssFajl($fajl){ 
        if (file_exists('./client/css/'.$fajl.'.css')) {
            ?>
                <link rel="stylesheet" href="./client/css/<?php echo $fajl;?>.css?v=1">
            <?php 
        }else{
            //logolni:kert css nem elerheto!!!
        }
    }
    public static function SetJsFajl($fajl){
        if (file_exists('./client/js/'.$fajl.'.js')) {
            ?>
            <script src="./client/js/<?php echo $fajl;?>.js?v=1"></script>
        <?php
        }else{
            //logolni:kert js nem elerheto!!!
        }
    }
    public static function MenuBetolt(){
                //$controller='Server\\Controller\\'.MenuModel::GetMenu()[0]["nev_menu"].'Controller';
        if (class_exists(self::ControllerNevMegad("Menu")) && method_exists(self::ControllerNevMegad("Menu"),"main")) {
            if (is_numeric(MenuController::Main())) {
                self::ErrorFajlMeghiv();
            }
            self::SetCssFajl("menu");
            return 1;
        }    
        
    }
    public static function ErrorFajlMeghiv(){
        header('Location: ./client/error/error.php');
        exit();
    }
    public static function ControllerNevMegad($nev){
        return 'Server\\Controller\\'.$nev.'Controller';
        
    }
}
?>