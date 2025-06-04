<?php
namespace Server\View;
class KijelentkezesView{
    public static function SikeresKijelentkezes(){
      echo "<h1>Sikeres kijelentkezes!</h1>";
    }
    public static function SikertelenKijelentkezes(){
      echo "<h1>Sikertelen kijelentkezes vagy nem volt bejelentkezve!</h1>";
    }
}
?>