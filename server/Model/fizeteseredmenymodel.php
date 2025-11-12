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
    /*
    
    */
}
?>