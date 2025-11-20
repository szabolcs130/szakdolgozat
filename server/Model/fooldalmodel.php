<?php
namespace Server\Model;
    use Server\Model\Csatlakozas;
class FooldalModel{
    /*public static function Connection() {
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
    }*/
}
?>