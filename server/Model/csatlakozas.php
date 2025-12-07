<?php
namespace Server\Model;
class Csatlakozas{
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
}

?>