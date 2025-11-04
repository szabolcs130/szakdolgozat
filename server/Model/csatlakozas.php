<?php
namespace Server\Model;
/*
require_once "szemely.php";
require_once "aruoop.php";
require_once "menu.php";
require_once "tablazat.php";
require_once "fajlkezeles.php";
*/
//FONTOS!!! FETCH CLASS NEM hivja neg az osztaly konstruktorat, igy a statikus tombok nem toltodnek fel!!! csak az osztalyok tagvaltozoi, mig egy peldany nem lesz vagy valami hasonlo megfogalmazas
class Csatlakozas{
    
   /* private $host;
    private $dbname;
    private $charset;
    private $alma;
    private $korte;
    private $szilva;
    private $db;
    //public $eredmeny;
    private $eleresiAdatokJok;
    public function __construct($host = "localhost",$dbname = "szakdolgozatproba",$charset = "utf8",$alma = "root",$korte = "",$szilva = 'SET NAMES utf8 COLLATE utf8_hungarian_ci') {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->charset = $charset;
        $this->alma = $alma;
        $this->korte = $korte;
        $this->szilva = $szilva;
        //$this->eredmeny=array();
        $this->eleresiAdatokJok=false;
        try {
            $this->db = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset={$this->charset}", "{$this->alma}", "{$this->korte}"); 
            $this->db->query("{$this->szilva}"); 
            $this->eleresiAdatokJok=true;
            fajl::muveletKiir("Adatbazis muvelet: alap eleresi adatok sikeres");
        } catch (PDOException $e) {
            fajl::hibaKiir("Adatbazis eleres hiba: alap eleresi adatok--> ".$e->getMessage());
        }
    }*/
    public static function GetConnection(){
      try {
            //$conn = new \PDO('mysql:host=localhost;dbname=szakdolgozatprob;charset=utf8','szakdolgozatprob','Proba20SzakDolgozat25ParaDicsom()?');

            $conn = new \PDO('mysql:host=localhost;dbname=szakdolgozatproba;charset=utf8','root','');
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $conn->exec("SET NAMES utf8 COLLATE utf8_hungarian_ci");
          //  fajl::muveletKiir("Adatbazis muvelet: alap eleresi adatok sikeres");
            return $conn;
        } catch (\PDOException $e) {
           // fajl::hibaKiir("Adatbazis eleres hiba: alap eleresi adatok--> ".$e->getMessage());
           return -1;
        }
    }
   /*
    public static function lekerdezAru(){
        if ($this->eleresiAdatokJok) {
            try {
                $sql = "select * from aru";
                $sth = $this->db->prepare($sql);
                $sth->execute();
                $eredmeny = $sth->fetchAll(PDO::FETCH_CLASS, "aru");//csak egy darab : fetch(PDO::FETCH_ASSOC);
                if ($sth->rowCount()) {
                    fajl::muveletKiir("Adatbazis muvelet: aru tablaban lekerdezes sikeres");
                    return $eredmeny;
                }else{
                    fajl::muveletKiir("Adatbazis muvelet: aru tablaban lekerdezes sikertelen");
                    return -1;
                }    
            } catch (PDOException $e) {
                 fajl::hibaKiir("Adatbazis eleres hiba: aru tabla lekerdezese--> ".$e->getMessage());
                return -1;
            }
        }
    }
    public static function lekerdezSzemely(){
        if ($this->eleresiAdatokJok) {
            try {
                $sql = "select * from szemely";
                $sth = $this->db->prepare($sql);
                $sth->execute();
                $eredmeny = $sth->fetchAll(PDO::FETCH_CLASS, "szemely");//csak egy darab : fetch(PDO::FETCH_ASSOC);
                if ($sth->rowCount()) {
                    fajl::muveletKiir("Adatbazis muvelet: szemely tablaban lekerdezes sikeres");
                    return $eredmeny;
                }else{
                    fajl::muveletKiir("Adatbazis muvelet: szemely tablaban lekerdezes sikertelen");
                    return -1;
                }
            } catch (PDOException $e) {
                 fajl::hibaKiir("Adatbazis eleres hiba: szemely tabla lekerdezese--> ".$e->getMessage());
                return -1;
            }
        }
    }
    public static function lekerdezMenu(){
        if ($this->eleresiAdatokJok) {
            try {
                $sql = "select * from menu";
                $sth = $this->db->prepare($sql);
                $sth->execute();
                $eredmeny = $sth->fetchAll(PDO::FETCH_CLASS, "menu");//csak egy darab : fetch(PDO::FETCH_ASSOC);
                if ($sth->rowCount()) {
                    $menu = [];
                    foreach ($eredmeny as $value) {
                        $menu[] = new menu($value->getId(), $value->getNev(), $value->getRang());
                    }
                    fajl::muveletKiir("Adatbazis muvelet: menu tablaban lekerdezes sikeres");
                    return $menu;
                }else{
                    fajl::muveletKiir("Adatbazis muvelet: menu tablaban lekerdezes sikertelen");
                    return -1;
                }
            } catch (PDOException $e) {
                fajl::hibaKiir("Adatbazis eleres hiba: menu tabla lekerdezese--> ".$e->getMessage());
                return -1;
            }
        }
    }
    
    public static function torolAru($id){
        if($this->eleresiAdatokJok){        
            try{
                $sql = "DELETE FROM `aru` WHERE id_aru=:id_aru";
                $sth = $this->db->prepare($sql);
                $sth->execute(array(":id_aru"=>$id));
                if ($sth->rowCount()) {
                    fajl::muveletKiir("Adatbazis muvelet: aru tablaban torles sikeres. aru id: ".$id);
                    return 1;
                }else{
                    fajl::muveletKiir("Adatbazis muvelet: aru tablaban torles sikertelen. aru id: ".$id);
                    return -1;
                }
            } catch (PDOException $e) {
                fajl::hibaKiir("Adatbazis eleres hiba: Aru tablaban torles sikertelen--> ".$e->getMessage());
                return -1;
            }
        }
    }
    public static function torolSzemely($id){
        if($this->eleresiAdatokJok){        
            try{
                $sql = "DELETE FROM `szemely` WHERE id_szemely=:id_szemely";
                $sth = $this->db->prepare($sql);
                $sth->execute(array(":id_szemely"=>$id));
                if ($sth->rowCount()) {
                    fajl::muveletKiir("Adatbazis muvelet: szemely tablaban torles sikeres. szemely id: ".$id);
                    return 1;
                }else{
                    fajl::muveletKiir("Adatbazis muvelet: szemely tablaban torles sikertelen. szemely id: ".$id);
                    return -1;
                }
            } catch (PDOException $e) {
                 fajl::hibaKiir("Adatbazis eleres hiba: szemely tablaban torles sikertelen--> ".$e->getMessage());
                return -1;
            }
        }
    }
    public static function torolMenu($id){
        if($this->eleresiAdatokJok){        
            try{
                $sql = "DELETE FROM `menu` WHERE id_menu=:id_menu";
                $sth = $this->db->prepare($sql);
                $sth->execute(array(":id_menu"=>$id));
                if ($sth->rowCount()) {
                    fajl::muveletKiir("Adatbazis muvelet: menu tablaban torles sikeres. menu id: ".$id);
                    return 1;
                }else{
                    fajl::muveletKiir("Adatbazis muvelet: menu tablaban torles sikertelen. menu id: ".$id);
                    return -1;
                }
            } catch (PDOException $e) {
                 fajl::hibaKiir("Adatbazis eleres hiba: menu tablaban torles sikertelen--> ".$e->getMessage());
                return -1;
            }
        }
    }
    public static function hozzaadAru($nev,$ar,$leiras){
        if($this->eleresiAdatokJok){        
            try{
                $sql = "INSERT INTO `aru` (`nev_aru`, `ar`, `leiras`) VALUES (:nev_aru, :ar, :leiras)";
                $sth = $this->db->prepare($sql);
                $sth->execute(array(":nev_aru"=>$nev,":ar"=>$ar,":leiras"=>$leiras));
                if ($sth->rowCount()) {
                    fajl::muveletKiir("Adatbazis muvelet: aru tablaban beszuras sikeres. aru nev: ".$nev." ".$ar." ".$leiras);
                    return 1;
                }else{
                    fajl::muveletKiir("Adatbazis muvelet: aru tablaban beszuras sikertelen. aru nev: ".$nev." ".$ar." ".$leiras);
                    return -1;
                }
            } catch (PDOException $e) {
                 fajl::hibaKiir("Adatbazis eleres hiba: Aru tablaba beszuras sikertelen--> ".$e->getMessage());
                return -1;
            }
        }
    }
    public static function hozzaadSzemely($nev,$email,$jelszo,$rang){
        if($this->eleresiAdatokJok){        
            try{
                $sql = "INSERT INTO `szemely` (`nev_szemely`, `email`, `jelszo`,`rang`) VALUES (:nev_szemely, :email, :jelszo,:rang)";
                $sth = $this->db->prepare($sql);
                $sth->execute(array(":nev_szemely"=>$nev,":email"=>$email,":jelszo"=>password_hash($jelszo, PASSWORD_DEFAULT),":rang"=>$rang));
                if ($sth->rowCount()) {
                    fajl::muveletKiir("Adatbazis muvelet: szemely tablaban beszuras sikeres. szemely nev: ".$nev." ".$email." ".$rang);
                    return 1;
                }else{
                    fajl::muveletKiir("Adatbazis muvelet: szemely tablaban beszuras sikertelen. szemely nev: ".$nev." ".$email." ".$rang);
                    return -1;
                }
            } catch (PDOException $e) {
                 fajl::hibaKiir("Adatbazis eleres hiba: Szemely tablaba beszuras sikertelen--> ".$e->getMessage());
                return -1;
            }
        }
    }
    public static function hozzaadMenu($nev,$rang){
        if($this->eleresiAdatokJok){        
            try{
                $sql = "INSERT INTO `menu` (`nev_menu`, `rang`) VALUES (:nev_menu, :rang)";
                $sth = $this->db->prepare($sql);
                $sth->execute(array(":nev_menu"=>$nev,":rang"=>$rang));
                if ($sth->rowCount()) {
                    fajl::muveletKiir("Adatbazis muvelet: menu tablaban beszuras sikeres. menu nev: ".$nev." ".$rang);
                    return 1;
                }else{
                    fajl::muveletKiir("Adatbazis muvelet: menu tablaban beszuras sikertelen. menu nev: ".$nev." ".$rang);
                    return -1;
                }
            } catch (PDOException $e) {
                 fajl::hibaKiir("Adatbazis eleres hiba: menu tablaba beszuras sikertelen--> ".$e->getMessage());
                return -1;
            }
        }
    }
    public static function szerkesztAru($id,$nev,$ar,$leiras){
        if($this->eleresiAdatokJok){        
            try{
                $sql = "UPDATE `aru` SET `nev_aru`=:nev_aru,`ar`=:ar,`leiras`=:leiras WHERE id_aru=:id_aru";
                $sth = $this->db->prepare($sql);
                $sth->execute(array(":id_aru"=>$id,":nev_aru"=>$nev,":ar"=>$ar,":leiras"=>$leiras));
                if ($sth->rowCount()) {
                    fajl::muveletKiir("Adatbazis muvelet: aru tablaban szerkesztes sikeres. aru id: ".$id." ".$nev." ".$ar." ".$leiras);
                    return 1;
                }else{
                    fajl::muveletKiir("Adatbazis muvelet: aru tablaban szerkesztes sikertelen. aru id: ".$id." ".$nev." ".$ar." ".$leiras);
                    return -1;
                }
            } catch (PDOException $e) {
                 fajl::hibaKiir("Adatbazis eleres hiba: Aru tablaba szerkesztes sikertelen--> ".$e->getMessage());
                return -1;
            }
        }
    }
    public static function szerkesztSzemely($id,$nev,$email,$jelszo,$rang){
        if($this->eleresiAdatokJok){        
            try{
                $sql = "UPDATE `szemely` SET `nev_szemely`=:nev_szemely,`email`=:email,`jelszo`=:jelszo,`rang`=:rang WHERE id_szemely=:id_szemely";
                $sth = $this->db->prepare($sql);
                $sth->execute(array("id_szemely"=>$id,":nev_szemely"=>$nev,":email"=>$email,":jelszo"=>password_hash($jelszo, PASSWORD_DEFAULT),":rang"=>$rang));
                if ($sth->rowCount()) {
                    fajl::muveletKiir("Adatbazis muvelet: szemely tablaban szerkesztes sikeres. szemely id: ".$id." ".$nev." ".$email." ".$rang);
                    return 1;
                }else{
                    fajl::muveletKiir("Adatbazis muvelet: szemely tablaban szerkesztes sikertelen. szemely id: ".$id." ".$nev." ".$email." ".$rang);
                    return -1;
                }
            } catch (PDOException $e) {
                 fajl::hibaKiir("Adatbazis eleres hiba: szemely tablaba szerkesztes sikertelen--> ".$e->getMessage());
                return -1;
            }
        }
    }
    public static function szerkesztMenu($id,$nev,$rang){
        if($this->eleresiAdatokJok){        
            try{
                $sql = "UPDATE `menu` SET `nev_menu`=:nev_menu,`rang`=:rang WHERE id_menu=:id_menu";
                $sth = $this->db->prepare($sql);
                $sth->execute(array("id_menu"=>$id,":nev_menu"=>$nev,":rang"=>$rang));
                if ($sth->rowCount()) {
                    fajl::muveletKiir("Adatbazis muvelet: menu tablaban szerkesztes sikeres. menu id: ".$id." ".$nev." ".$rang);
                    return 1;
                }else{
                    fajl::muveletKiir("Adatbazis muvelet: menu tablaban szerkesztes sikertelen. menu id: ".$id." ".$nev." ".$rang);
                    return -1;
                }
            } catch (PDOException $e) {
                fajl::hibaKiir("Adatbazis eleres hiba: menu tablaba szerkesztes sikertelen--> ".$e->getMessage());
                return -1;
            }
        }
    }*/
}

?>