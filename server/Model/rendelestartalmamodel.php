<?php
namespace Server\Model;
    use Server\Model\Csatlakozas;

class RendelesTartalmaModel{
    public static function Connection() {
        return Csatlakozas::GetConnection();
    }
    public static function hozzaadRendelesTartalma($rendeles,$aruIdf,$me,$egysegar){
        try{
            $db = self::Connection();
            $sql = "INSERT INTO `rendelestartalma` (`idf_rendeles`, `idf_aru` ,`me` ,`egysegar`) VALUES (:idf_rendeles , :idf_aru , :me , :egysegar)";
            $sth = $db->prepare($sql);
            $sth->execute(array(":idf_rendeles"=>$rendeles,":idf_aru"=>$aruIdf,":me"=>$me,":egysegar"=>$egysegar));
            if ($sth->rowCount()) {
                return 1;
            }
            return 0;
        } catch (\PDOException $e) {
            return 0;
        }
    }
}
?>