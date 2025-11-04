<?php
namespace Server\Model;
    use Server\Model\Csatlakozas;

class TermekekModel{
  
    public static function Connection() {
        return Csatlakozas::GetConnection();
    }
    public static function lekerdezAru(){
        try {
            $db = self::Connection();
            $sql = "SELECT * FROM aru";
            $sth = $db->prepare($sql);
            $sth->execute();
            $eredmeny = $sth->fetchAll(\PDO::FETCH_ASSOC);
            return $eredmeny;
        }catch (\PDOException $e) {
            return 0;
        }
    }
    public static function lekerdezAruById($aru){
        try {
            $db = self::Connection();
            $sql = "SELECT * FROM aru WHERE id_aru=:idAru";
            $sth = $db->prepare($sql);
            $sth->execute(array(':idAru'=> $aru));
            $eredmeny = $sth->fetchAll(\PDO::FETCH_ASSOC);
            return $eredmeny;
        }catch (\PDOException $e) {
            return 0;
        }
    }
}
?>