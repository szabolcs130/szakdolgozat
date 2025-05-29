<?php
namespace Server\Model;
    use Server\Model\csatlakozas;

class MenuModel{
  
    public static function Connection() {
        return csatlakozas::GetConnection();
    }
    public static function lekerdezMenu(){
        try {
            $db = self::Connection();
            $sql = "SELECT * FROM menu";
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