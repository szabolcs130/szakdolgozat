<?php
namespace Server\Model;
    use Server\Model\Csatlakozas;
class RendelesModel{
    public static function Connection() {
        return Csatlakozas::GetConnection();
    }
    public static function hozzaadRendeles($szemely,$datum){
        try{
            $db = self::Connection();
            $sql = "INSERT INTO `rendeles` (`idf_szemely`, `datum`) VALUES (:idf_szemely , :datum)";
            $sth = $db->prepare($sql);
            $sth->execute(array(":idf_szemely"=>$szemely, ":datum"=>$datum));
            if ($sth->rowCount()) {
                return 1;
            }
            return 0;
        } catch (\PDOException $e) {
            return 0;
        }
    }
    public static function GetRendeles($szemely,$datum){
       try {
            $db = self::Connection();
            $sql = "SELECT * FROM rendeles WHERE idf_szemely=:idf_szemely && datum=:datum";
            $sth = $db->prepare($sql);
            $sth->execute(array(':idf_szemely'=>$szemely,":datum"=>$datum));
            $eredmeny = $sth->fetch(\PDO::FETCH_ASSOC);
            return $eredmeny;
        }catch (\PDOException $e) {
            return 0;
        }
    }
    public static function SzerkesztRendeles($id_rendeles,$rendelesallapot,$teljesitesdatuma){
       try {
            $db = self::Connection();
            $sql = "UPDATE `rendeles` SET rendelesallapot=:rendelesallapot,teljesitesdatuma=:teljesitesdatuma WHERE id_rendeles=:id_rendeles";
            $sth = $db->prepare($sql);
            $sth->execute(array(':id_rendeles'=>$id_rendeles,":rendelesallapot"=>$rendelesallapot, ":teljesitesdatuma"=>$teljesitesdatuma,));
            $eredmeny = $sth->fetch(\PDO::FETCH_ASSOC);
            if ($sth->rowCount()) {
                return 1;
            }
            return 0;
        }catch (\PDOException $e) {
            return 0;
        }
    }
    public static function GetRendelesAllapotEnum(){
       try {
            $db = self::Connection();
            $sql = "SHOW COLUMNS FROM rendeles LIKE 'rendelesallapot'";
            $sth = $db->prepare($sql);
            $sth->execute();
            $eredmeny = $sth->fetch(\PDO::FETCH_ASSOC);
            $enumAllapot=$eredmeny['Type'];
            preg_match("/^enum\('(.*)'\)$/", $enumAllapot, $csakEnum);
            $enumVegeredmeny=explode("','", $csakEnum[1]);
            return $enumVegeredmeny;
        }catch (\PDOException $e) {
            return 0;
        }
    }
}
?>