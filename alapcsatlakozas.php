<?php
class csatlakozas{
    private $host;
    private $dbname;
    private $charset;
    private $alma;
    private $korte;
    private $szilva;
    private $db;
    public $eredmeny;
    private $eleresiAdatokJok;
    public function __construct($host = "localhost",$dbname = "szakdolgozatproba",$charset = "utf8",$alma = "root",$korte = "",$szilva = 'SET NAMES utf8 COLLATE utf8_hungarian_ci') {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->charset = $charset;
        $this->alma = $alma;
        $this->korte = $korte;
        $this->szilva = $szilva;
        $this->eredmeny=array();
        $this->eleresiAdatokJok=false;
        try {
            $this->db = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset={$this->charset}", "{$this->alma}", "{$this->korte}"); 
            $this->db->query("{$this->szilva}"); 
            $this->eleresiAdatokJok=true;
            fajl::muveletKiir("Adatbazis muvelet: alap eleresi adatok sikeres");
        } catch (PDOException $e) {
            fajl::hibaKiir("Adatbazis eleres hiba: alap eleresi adatok--> ".$e->getMessage());
        }
    }
}
?>