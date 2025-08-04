<?php
namespace Server\View;
class KosarView{
    public static function ShowKosar($kosar){
        if ($kosar!="ures") {
           foreach ($kosar as $key => $value) {
                echo $value["nev"]." ".$value["ar"]."<br>";
            }
        }else{
            echo "Kosar tartalma ures";
        }
    }
}
?>