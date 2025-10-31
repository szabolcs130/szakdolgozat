<?php
namespace Server\Model;
    use Server\Model\csatlakozas;

class FizetesEredmenyModel{
    public static function Connection() {
        return csatlakozas::GetConnection();
    }
    public static function hozzaadFizetesEredmeny($rendelesIdf,$osszeg,$kulsoFizetesId,$allapot){
        try{
            $db = self::Connection();
            $sql = "INSERT INTO `fizeteseredmeny` (`idf_rendeles`, `osszeg`, `id_kulsofizetes`, `allapot`) VALUES (:idf_rendeles, :osszeg, :id_kulsofizetes, :allapot)";
            $sth = $db->prepare($sql);
            $sth->execute(array(":idf_rendeles"=>$rendelesIdf, ":osszeg"=>$osszeg, ":id_kulsofizetes"=>$kulsoFizetesId, ":allapot"=>$allapot));
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