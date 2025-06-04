<?php
namespace Server\Model;
    use Server\Model\csatlakozas;

class BejelentkezesModel{
  //
    public static function Connection() {
        return csatlakozas::GetConnection();
    }
    public static function GetSzemely(){
        try {
            $db = self::Connection();
            $sql = "SELECT * FROM szemely";
            $sth = $db->prepare($sql);
            $sth->execute();
            $eredmeny = $sth->fetchAll(\PDO::FETCH_ASSOC);
            return $eredmeny;
        }catch (\PDOException $e) {
            return -1;
        }
    }
    public static function GetSzemelyByName($nev){
        try {
            $db = self::Connection();
            $sql = "SELECT * FROM szemely WHERE nev_szemely=:nevSzemely";
            $sth = $db->prepare($sql);
            $sth->execute(array(':nevSzemely'=> $nev));
            $eredmeny = $sth->fetchAll(\PDO::FETCH_ASSOC);
            return $eredmeny;
        }catch (\PDOException $e) {
            return -1;
        }
    }
    public static function hozzaadSzemely($nev,$email,$jelszo,$rang){
        try{
            $db = self::Connection();
            $sql = "INSERT INTO `szemely` (`nev_szemely`, `email`, `jelszo`,`rang`) VALUES (:nev_szemely, :email, :jelszo,:rang)";
            $sth = $db->prepare($sql);
            $sth->execute(array(":nev_szemely"=>$nev,":email"=>$email,":jelszo"=>password_hash($jelszo, PASSWORD_DEFAULT),":rang"=>$rang));
            if ($sth->rowCount()) {
                return 1;
            }else{
                return -1;
            }
        } catch (PDOException $e) {
            return -1;
        }
    }
}
?>