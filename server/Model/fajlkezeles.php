<?php
class Fajl{
    public static function hibaKiir($szoveg){ 
       //date("Y-m-d H:i:s")
       $fajl="hiba.txt";
       try {
            if (file_exists($fajl)) {
                $fajl = fopen("hiba.txt", "a");
            }else{
                $fajl = fopen("hiba.txt", "w");
            }
            fwrite($fajl,date("Y-m-d H:i:s")."-->Hiba: ".$szoveg."\n");
            fclose($fajl);
       } catch (\Exception $e) {
        echo "hiba leiras hiba".$e->getMessage();
       }
    }
    public static function muveletKiir($szoveg){ 
        //date("Y-m-d H:i:s")
        $fajl="muvelet.txt";
        try {
             if (file_exists($fajl)) {
                 $fajl = fopen($fajl, "a");
             }else{
                 $fajl = fopen($fajl, "w");
             }
             fwrite($fajl,date("Y-m-d H:i:s")."-->Muvelet: ".$szoveg."\n");
             fclose($fajl);
        } catch (\Exception $e) {
         echo "hiba leiras muvelet".$e->getMessage();
        }
     }
}
?>