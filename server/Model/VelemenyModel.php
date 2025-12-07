<?php
namespace Server\Model;
    use Server\Model\Csatlakozas;

class VelemenyModel{
  
    public static function Connection() {
        return Csatlakozas::GetConnection();
    }
    public static function lekerdezVelemeny(){
        try {
            $db = self::Connection();
            $sql = "SELECT * FROM velemeny";
            $sth = $db->prepare($sql);
            $sth->execute();
            $eredmeny = $sth->fetchAll(\PDO::FETCH_ASSOC);
            return $eredmeny;
        }catch (\PDOException $e) {
            return 0;
        }
    }
    public static function lekerdezVelemenyByAruId($aru){
        try {
            $db = self::Connection();
            $sql = "SELECT id_szemely,id_velemeny,nev_szemely,velemenyszoveg FROM velemenyek LEFT JOIN szemely ON velemenyek.idf_szemely=id_szemely WHERE idf_aru=:idfAru";
            $sth = $db->prepare($sql);
            $sth->execute(array(':idfAru'=> $aru));
            $eredmeny = $sth->fetchAll(\PDO::FETCH_ASSOC);
            return $eredmeny;
        }catch (\PDOException $e) {
            return 0;
        }
    }
    public static function lekerdezVelemenyByAruIdSajat($aru,$userId){
        try {
            $db = self::Connection();
            $sql = "SELECT id_szemely,id_velemeny,nev_szemely,velemenyszoveg FROM velemenyek LEFT JOIN szemely ON velemenyek.idf_szemely=id_szemely WHERE idf_aru=:idfAru AND idf_szemely=:idf_szemely LIMIT 1";
            $sth = $db->prepare($sql);
            $sth->execute(array(':idfAru'=> $aru,':idf_szemely'=>$userId));
            $eredmeny = $sth->fetchAll(\PDO::FETCH_ASSOC);
            return $eredmeny;
        }catch (\PDOException $e) {
            return 0;
        }
    }
    /*public static function lekerdezVelemenyByAruIdSajatOsszes($aru,$userId){
        try {
            $db = self::Connection();
            $sql = "SELECT COUNT(*) AS osszes FROM velemenyek LEFT JOIN szemely ON velemenyek.idf_szemely=id_szemely WHERE idf_aru=:idfAru AND idf_szemely=:idf_szemely";
            $sth = $db->prepare($sql);
            $sth->execute(array(':idfAru'=> $aru,':idf_szemely'=>$userId));
            $eredmeny = $sth->fetchAll(\PDO::FETCH_ASSOC);
            return $eredmeny;
        }catch (\PDOException $e) {
            return 0;
        }
    }*/
    public static function lekerdezVelemenyByAruIdNemSajat($aru,$userId,$oldalSzam=null){
        try {
            $db = self::Connection();
            $sql = "SELECT id_szemely,id_velemeny,nev_szemely,velemenyszoveg FROM velemenyek LEFT JOIN szemely ON velemenyek.idf_szemely=id_szemely WHERE idf_aru=:idfAru";
            if ($userId!=null) {
                $sql.=" AND idf_szemely <> :idf_szemely";
            }
            if ($oldalSzam!=null) {
                $sql.=" LIMIT 10 OFFSET :oldalSzam";
            }else{
                $sql.=" LIMIT 10 OFFSET 0";
            }
            $sth = $db->prepare($sql);
            $sth->bindValue(':idfAru',$aru);
            if ($userId!=null) {
                $sth->bindValue(':idf_szemely',$userId);
            }
            if ($oldalSzam!=null) {
                $sth->bindValue(':oldalSzam',(int)$oldalSzam,\PDO::PARAM_INT);
            }
            $sth->execute();
            $eredmeny = $sth->fetchAll(\PDO::FETCH_ASSOC);
            return $eredmeny;
        }catch (\PDOException $e) {
            return 0;
        }
    }
    public static function lekerdezVelemenyByAruIdNemSajatOsszes($aru,$userId){
        try {
            $db = self::Connection();
            $sql = "SELECT COUNT(*) AS osszes FROM velemenyek LEFT JOIN szemely ON velemenyek.idf_szemely=id_szemely WHERE idf_aru=:idfAru";
            if ($userId!=null) {
                $sql.=" AND idf_szemely <> :idf_szemely";
            }
            $sth = $db->prepare($sql);
            $sth->bindValue(':idfAru',$aru);
            if ($userId!=null) {
                $sth->bindValue(':idf_szemely',$userId);
            }
            $sth->execute();
            $eredmeny = $sth->fetchAll(\PDO::FETCH_ASSOC);
            return $eredmeny;
        }catch (\PDOException $e) {
            return 0;
        }
    }
    public static function hozzaadVelemeny($szemely,$aruIdf,$velemenyszoveg){
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
    }
    public static function VelemenyTorol($aruId,$idf_szemely,$velemenyId){
        try{
            $db = self::Connection();
            $sql = "DELETE FROM  `velemenyek` WHERE id_velemeny=:id_velemeny AND idf_szemely=:idf_szemely AND idf_aru=:idf_aru";
            $sth = $db->prepare($sql);
            $sth->execute(array(":id_velemeny"=>$velemenyId,"idf_szemely"=>$idf_szemely,':idf_aru'=>$aruId));
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