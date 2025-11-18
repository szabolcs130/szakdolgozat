<?php
namespace Server\Model;
    use Server\Model\Csatlakozas;

class AruModel{
  
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
    public static function AruTorol($aruId){
        try{
            $db = self::Connection();
            $sql = "DELETE FROM  `aru` WHERE id_aru=:id_aru";
            $sth = $db->prepare($sql);
            $sth->execute(array(":id_aru"=>$aruId));
            if ($sth->rowCount()) {
                return 1;
            }
            return 0;
        } catch (\PDOException $e) {
            return 0;
        }
    }

    /*
    try{
            $db = self::Connection();
            $sql = "INSERT INTO `velemenyek` (`idf_szemely`, `idf_aru` ,`velemenyszoveg`) VALUES (:idf_szemely , :idf_aru , :velemenyszoveg)";
            $sth = $db->prepare($sql);
            $sth->execute(array(":idf_szemely"=>$szemely,":idf_aru"=>$aruIdf,":velemenyszoveg"=>$velemenyszoveg));
            if ($sth->rowCount()) {
                return 1;
            }
            return 0;
        } catch (\PDOException $e) {
            return 0;
        }
    */
}
?>