<?php
namespace Server\Model;
    use Server\Model\Csatlakozas;

class MenuModel{
  
    public static function Connection() {
        return Csatlakozas::GetConnection();
    }
    public static function GetMenu(){
        try {
            $db = self::Connection();
            $sql = "SELECT * FROM menu";
            $sth = $db->prepare($sql);
            $sth->execute();
            $eredmeny = $sth->fetchAll(\PDO::FETCH_ASSOC);
            return $eredmeny;
        }catch (\PDOException $e) {
            return 0;
        }
    }
    public static function GetMenuByRang($rang){
        try {
            $db = self::Connection();
            if ($rang==0) {
                $sql = "SELECT * FROM menu WHERE rang<=:rang";
            }else{
                $sql = "SELECT * FROM `menu` where rang<=:rang && rang<> -1";
            }
            $sth = $db->prepare($sql);
            $sth->execute(array(':rang'=>$rang));
            $eredmeny = $sth->fetchAll(\PDO::FETCH_ASSOC);
            return $eredmeny;
        }catch (\PDOException $e) {
            return 0;
        }
    }
}
?>