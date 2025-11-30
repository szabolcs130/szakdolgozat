<?php
namespace Server\View;
class BejelentkezesView{
//
    public static function ShowBejelentkezes(){
      $html="";
      $html.= '<div id="bejelentkezesForm">'.
                '<form method="post" action="?oldal=Bejelentkezes/EllenorizBejelentkezes">'.
                  '<input type="text" name="email" placeholder="Email"><br><br>'.
                  '<input type="password" name="p" placeholder="Jelszo"><br><br>'.
                  '<button type="submit">Bejelentkezes</button>'.
                '</form>'.
              '</div>';
      echo $html; 
    }
    public static function SikeresBejelentkezes($nev){
      echo "<h1>Sikeres bejelentkezes, ".$nev."!</h1>";
    }
    public static function SikertelenBejelentkezes(){
      echo "<h1>Sikertelen bejelentkezes!</h1>";
    }
}
?>