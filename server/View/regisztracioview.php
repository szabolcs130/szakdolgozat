<?php
namespace Server\View;
class RegisztracioView{
//
    public static function ShowRegisztracio(){
      $html="";
      $html.= '<div id="regisztracioForm">'.
                '<form method="post" action="?oldal=Regisztracio/EllenorizRegisztracio">'.
                  '<input type="text" name="username" placeholder="Felhasznalonev"><br><br>'.
                  '<input type="text" name="email" placeholder="Email"><br><br>'.
                  '<input type="password" name="p" placeholder="Jelszo"><br><br>'.
                  '<button type="submit">Regisztracio</button>'.
                '</form>'.
              '</div>';
      echo $html; 
    }
    public static function SikeresRegisztracio(){
      echo "<h1>Sikeres regisztracio!</h1>";
    }
    public static function SikertelenRegisztracio(){
      echo "<h1>Sikertelen regisztracio!</h1>";
    }
}
?>