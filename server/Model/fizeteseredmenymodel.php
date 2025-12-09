<?php
namespace Server\Model;
    use Server\Model\Csatlakozas;

class FizetesEredmenyModel{
    public static function Connection() {
        return Csatlakozas::GetConnection();
    }
    public static function hozzaadFizetesEredmeny($rendelesIdf,$fizetesdatum,$osszeg,$kulsoFizetesId,$allapot){/*,$elsoKulsoFizetesId*/
        try{
            $db = self::Connection();
            $sql = "INSERT INTO `fizeteseredmeny` (`idf_rendeles`, `fizetesdatum`, `osszeg`,  `id_kulsofizetes`, `allapot`) VALUES (:idf_rendeles, :fizetesdatum, :osszeg, :id_kulsofizetes, :allapot)";//`id_elsokulsofizetes`,:id_elsokulsofizetes,
            $sth = $db->prepare($sql);
            $sth->execute(array(":idf_rendeles"=>$rendelesIdf, ":fizetesdatum"=>$fizetesdatum, ":osszeg"=>$osszeg,  ":id_kulsofizetes"=>$kulsoFizetesId, ":allapot"=>$allapot));//":id_elsokulsofizetes"=>$elsoKulsoFizetesId ,
            if ($sth->rowCount()) {
                return 1;
            }
            return 0;
        } catch (\PDOException $e) {
            return 0;
        }
    }
    //kifizetetlen(nincs inner join) vagy sikertelen(!=COMPLETED)
    public static function GetFizetetlenEredmeny($szemely){
        try {
            $db = self::Connection();
            $sql = "SELECT * FROM rendeles LEFT JOIN fizeteseredmeny ON rendeles.id_rendeles = fizeteseredmeny.idf_rendeles WHERE rendeles.idf_szemely = :idf_szemely AND (fizeteseredmeny.id_fizetes IS NULL OR fizeteseredmeny.allapot != 'COMPLETED')";
            $sth = $db->prepare($sql);
            $sth->execute(array(':idf_szemely'=>$szemely));
            $eredmeny = $sth->fetch(\PDO::FETCH_ASSOC);
            return $eredmeny;
        }catch (\PDOException $e) {
            return 0;
        }
    }
    public static function GetMegvasaroltAruE($aru,$szemely){
        try {
            $db = self::Connection();
            $sql = "SELECT * FROM fizeteseredmeny INNER JOIN rendeles ON fizeteseredmeny.idf_rendeles=rendeles.id_rendeles INNER JOIN rendelestartalma ON rendelestartalma.idf_rendeles=rendeles.id_rendeles WHERE (rendeles.idf_szemely=:idf_szemely AND rendelestartalma.idf_aru=:idf_aru) AND fizeteseredmeny.allapot='COMPLETED'";
            $sth = $db->prepare($sql);
            $sth->execute(array(':idf_szemely'=>$szemely, ':idf_aru'=>$aru));
            $eredmeny = $sth->fetch(\PDO::FETCH_ASSOC);
            return $eredmeny;
        }catch (\PDOException $e) {
            return 0;
        }
    }
    public static function GetMegvasaroltak($szemely,$oldalSzam=null){
        try {
            $db = self::Connection();
            $sql = "SELECT fizeteseredmeny.fizetesdatum,fizeteseredmeny.id_fizetes, aru.id_aru, aru.nev_aru, aru.ar, rendelestartalma.me , fizeteseredmeny.osszeg , fizeteseredmeny.allapot FROM fizeteseredmeny INNER JOIN rendeles ON fizeteseredmeny.idf_rendeles=rendeles.id_rendeles INNER JOIN rendelestartalma ON rendelestartalma.idf_rendeles=rendeles.id_rendeles INNER JOIN aru ON aru.id_aru=rendelestartalma.idf_aru WHERE fizeteseredmeny.allapot='COMPLETED' AND rendeles.idf_szemely=:idf_szemely ORDER BY fizeteseredmeny.fizetesdatum";
            if ($oldalSzam!=null) {
                $sql.=" LIMIT 10 OFFSET :oldalSzam";
            }else{
                $sql.=" LIMIT 10 OFFSET 0";
            }
            $sth = $db->prepare($sql);
            $sth->bindValue(':idf_szemely',$szemely);
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
    public static function GetMegvasaroltakOsszes($szemely){
        try {
            $db = self::Connection();
            $sql = "SELECT COUNT(*) AS osszes FROM fizeteseredmeny INNER JOIN rendeles ON fizeteseredmeny.idf_rendeles=rendeles.id_rendeles INNER JOIN rendelestartalma ON rendelestartalma.idf_rendeles=rendeles.id_rendeles INNER JOIN aru ON aru.id_aru=rendelestartalma.idf_aru WHERE fizeteseredmeny.allapot='COMPLETED' AND rendeles.idf_szemely=:idf_szemely ORDER BY fizeteseredmeny.fizetesdatum";
            $sth = $db->prepare($sql);
            $sth->execute(array(':idf_szemely'=>$szemely));
            $eredmeny = $sth->fetchAll(\PDO::FETCH_ASSOC);
            return $eredmeny;
        }catch (\PDOException $e) {
            return 0;
        }
    }
}
?>