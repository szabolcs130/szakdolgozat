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
    public static function lekerdezAruMaxAr(){
        try {
            $db = self::Connection();
            $sql = "SELECT MAX(ar) AS max FROM aru";
            $sth = $db->prepare($sql);
            $sth->execute();
            $eredmeny = $sth->fetchAll(\PDO::FETCH_ASSOC);
            return $eredmeny;
        }catch (\PDOException $e) {
            return 0;
        }
    }
    public static function lekerdezAruOsszSor(){
        try {
            $db = self::Connection();
            $sql = "SELECT COUNT(*) AS osszes FROM aru";
            $sth = $db->prepare($sql);
            $sth->execute();
            $eredmeny = $sth->fetchAll(\PDO::FETCH_ASSOC);
            return $eredmeny;
        }catch (\PDOException $e) {
            return 0;
        }
    }
    public static function lekerdezAruById($id){
        try {
            $db = self::Connection();
            $sql = "SELECT * FROM aru WHERE id_aru=:id_aru";
            $sth = $db->prepare($sql);
            $sth->execute(array(":id_aru"=>$id));
            $eredmeny = $sth->fetchAll(\PDO::FETCH_ASSOC);
            return $eredmeny;
        }catch (\PDOException $e) {
            return 0;
        }
    }
    public static function lekerdezAruByNev($nev){
        try {
            $db = self::Connection();
            $sql = "SELECT * FROM aru WHERE nev_aru=:nev_aru";
            $sth = $db->prepare($sql);
            $sth->execute(array(":nev_aru"=>$nev));
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
    public static function AruSzerkeszt($id,$nev,$ar,$leiras,$mennyiseg,$kep){
        try{
            $db = self::Connection();
            $sql = "UPDATE `aru` SET nev_aru = :nev_aru, ar = :ar, leiras = :leiras, mennyiseg = :mennyiseg, kep = :kep WHERE id_aru = :id_aru";
            $sth = $db->prepare($sql);
            $sth->execute(array(":id_aru"=>$id, ":nev_aru"=>$nev, ":ar"=>$ar, ":leiras"=>$leiras, ":mennyiseg"=>$mennyiseg, ":kep"=>$kep));
            if ($sth->rowCount()) {
                return 1;
            }
            return 0;
        } catch (\PDOException $e) {
            return 0;
        }
    }
    public static function AruSzerkesztMennyiseg($id,$mennyiseg){
        try{
            $db = self::Connection();
            $sql = "UPDATE `aru` SET mennyiseg = mennyiseg - :mennyiseg WHERE id_aru = :id_aru";
            $sth = $db->prepare($sql);
            $sth->execute(array(":mennyiseg"=>$mennyiseg,":id_aru"=>$id));
            if ($sth->rowCount()) {
                return 1;
            }
            return 0;
        } catch (\PDOException $e) {
            return 0;
        }
    }
        public static function hozzaadAru($nev,$ar,$leiras,$mennyiseg,$kep){
        try{
            $db = self::Connection();
            $sql = "INSERT INTO `aru` (`nev_aru`, `ar`,`leiras`,`mennyiseg`,`kep`) VALUES (:nev_aru, :ar, :leiras, :mennyiseg, :kep)";
            $sth = $db->prepare($sql);
            $sth->execute(array(":nev_aru"=>$nev,":ar"=>$ar,":leiras"=>$leiras,":mennyiseg"=>$mennyiseg,":kep"=>$kep));
            if ($sth->rowCount()) {
                return 1;
            }
            return 0;
        } catch (\PDOException $e) {
            return 0;
        }
    }
    public static function lekerdezAruSzures($oldalSzam=null,$osszesDarab=null,$nev=null,$minAr=null,$maxAr=null){
        try {
            $db = self::Connection();
            $sql =$osszesDarab==null ? "SELECT * FROM aru" : "SELECT COUNT(*) AS osszes FROM aru";
            if (!empty($nev)) {
                $sql.=" WHERE lower(nev_aru) LIKE :nev";
                if (!empty($minAr)) {
                    $sql.=" AND ar>=:minAr";
                }
                if (!empty($maxAr)) {
                    $sql.=" AND ar<=:maxAr";
                }
            }
            if (!$osszesDarab) {
                $sql.=" LIMIT 10 OFFSET :oldalSzam";
            }
            
            $sth = $db->prepare($sql);
            if (!empty($nev)) {
                $sth->bindValue(':nev','%'.strtolower($nev).'%');
                if (!empty($minAr)) {
                $sth->bindValue(':minAr',$minAr);
                }
                if (!empty($maxAr)) {
                $sth->bindValue(':maxAr',$maxAr);
                }
            }
            if (!$osszesDarab) {
                $sth->bindValue(':oldalSzam',(int)$oldalSzam,\PDO::PARAM_INT);
            }
            $sth->execute();
            $eredmeny = $sth->fetchAll(\PDO::FETCH_ASSOC);
            return $eredmeny;
        }catch (\PDOException $e) {
            return 0;
        }
    }

}
?>