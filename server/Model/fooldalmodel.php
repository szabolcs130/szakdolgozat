<?php
namespace Server\Model;
    use Server\Model\csatlakozas;

class FooldalModel{
  
    public static function Connection() {
        return csatlakozas::GetConnection();
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
 /*  public static function lekerdezAru(){
       // if ($this->eleresiAdatokJok) {
            try {
                $sql = "select * from aru";
                $sth = $this->db->prepare($sql);
                $sth->execute();
                $eredmeny = $sth->fetchAll(PDO::FETCH_CLASS, "aru");//csak egy darab : fetch(PDO::FETCH_ASSOC);
                if ($sth->rowCount()) {
                  //  fajl::muveletKiir("Adatbazis muvelet: aru tablaban lekerdezes sikeres");
                    return $eredmeny;
                }else{
                  //  fajl::muveletKiir("Adatbazis muvelet: aru tablaban lekerdezes sikertelen");
                    return -1;
                }    
            } catch (PDOException $e) {
                // fajl::hibaKiir("Adatbazis eleres hiba: aru tabla lekerdezese--> ".$e->getMessage());
                return -1;
            }
       // }
    }*/

}
?>