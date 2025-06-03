<?php
namespace Server\Model;
    use Server\Model\csatlakozas;

class BejelentkezesModel{
  
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
}
?>