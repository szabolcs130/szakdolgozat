<?php
namespace Server\View;
class BejelentkezesView{
//
    public static function ShowBejelentkezes(){
      $html="";
      $html.='<form method="post" action="?oldal=Bejelentkezes/auth">'.
                '<input type="text" name="username" placeholder="Felhasznalonev"><br>'.
                '<input type="password" name="p" placeholder="Jelszo"><br>'.
                '<button type="submit">Bejelentkezes</button><br>'.
             '</form>';
      echo $html; 
    }
    public static function SikeresBejelentkezes($nev){
      echo "<h1>Sikeres bejelentkezes!".$nev."</h1>";
    }
    public static function SikertelenBejelentkezes(){
      echo "<h1>Sikertelen bejelentkezes!</h1>";
    }
}
?>