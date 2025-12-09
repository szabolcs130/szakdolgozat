<?php
namespace Server\Model;
    use Server\Model\Csatlakozas;

class SzallitasicimModel{
    public static function Connection() {
        return Csatlakozas::GetConnection();
    }
    public static function lekerdezSzallitasicimBySzemelyId($idf_szemely){
        try {
            $db = self::Connection();
            $sql = "SELECT * FROM szallitasicim WHERE idf_szemely=:idf_szemely";
            $sth = $db->prepare($sql);
            $sth->execute(array(":idf_szemely"=>$idf_szemely));
            $eredmeny = $sth->fetchAll(\PDO::FETCH_ASSOC);
            return $eredmeny;
        }catch (\PDOException $e) {
            return 0;
        }
    }
    public static function hozzaadSzallitasicim($idf_szemely,$iranyitoszam,$varos,$utca,$hazszam,$emelet,$ajto){
        try{
            $db = self::Connection();
            $sql = "INSERT INTO `szallitasicim` (`idf_szemely`, `iranyitoszam`, `varos`, `utca`, `hazszam`, `emelet`, `ajto`) VALUES (:idf_szemely, :iranyitoszam, :varos, :utca, :hazszam, :emelet, :ajto)";
            $sth = $db->prepare($sql);
            $sth->execute(array(":idf_szemely"=>$idf_szemely, ":iranyitoszam"=>$iranyitoszam, ":varos"=>$varos,  ":utca"=>$utca, ":hazszam"=>$hazszam, ":emelet"=>$emelet, ":ajto"=>$ajto));
            if ($sth->rowCount()) {
                return 1;
            }
            return 0;
        } catch (\PDOException $e) {
            return 0;
        }
    }
    public static function szallitasicimSzerkeszt($idf_szemely,$iranyitoszam,$varos,$utca,$hazszam,$emelet,$ajto){
        try{
            $db = self::Connection();
            $sql = "UPDATE `szallitasicim` SET iranyitoszam = :iranyitoszam, varos = :varos, utca = :utca, hazszam = :hazszam, emelet = :emelet, ajto = :ajto WHERE idf_szemely = :idf_szemely";
            $sth = $db->prepare($sql);
            $sth->execute(array(":idf_szemely"=>$idf_szemely, ":iranyitoszam"=>$iranyitoszam, ":varos"=>$varos, ":utca"=>$utca, ":hazszam"=>$hazszam, ":emelet"=>$emelet, ":ajto"=>$ajto));
            if ($sth->rowCount()) {
                return 1;
            }
            return 0;
        } catch (\PDOException $e) {
            return 0;
        }
    }
    public static function SzallitasicimTorol($id_szallitasicim){
        try{
            $db = self::Connection();
            $sql = "DELETE FROM  `szallitasicim` WHERE id_szallitasicim=:id_szallitasicim";
            $sth = $db->prepare($sql);
            $sth->execute(array(":id_szallitasicim"=>$id_szallitasicim));
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