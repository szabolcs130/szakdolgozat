<?php
namespace Server\Model;
class ErtekEllenorzesModel{
    public static function Szoveg($szoveg,$min,$max,$patternSzoveg){
        $szoveg=trim($szoveg);
        $szovegHossz=mb_strlen($szoveg,'UTF-8');
        if($szovegHossz<$min || $szovegHossz>$max || !preg_match($patternSzoveg,$szoveg)) {
            return false;
        }else{
            return $szoveg;
        }
        return false;
    }
    public static function Szam($szam,$min,$max){
        if (filter_var($szam,FILTER_VALIDATE_INT)===false || $szam<$min || $szam>$max) {
            return false;
        }else{
            return $szam;
        }
        return false;
    }
}

?>