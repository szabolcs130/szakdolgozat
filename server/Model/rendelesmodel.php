<?php
namespace Server\Model;
    use Server\Model\csatlakozas;

class RendelesModel{
    public static function Connection() {
        return csatlakozas::GetConnection();
    }
    public static function hozzaadRendeles($szemely){
        try{
            $db = self::Connection();
            $sql = "INSERT INTO `rendeles` (`idf_szemely`) VALUES (:idf_szemely)";
            $sth = $db->prepare($sql);
            $sth->execute(array(":idf_szemely"=>$szemely));
            if ($sth->rowCount()) {
                return 1;
            }
            return 0;
        } catch (PDOException $e) {
            return 0;
        }
    }
}
?>