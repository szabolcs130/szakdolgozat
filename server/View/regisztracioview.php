<?php
namespace Server\View;
class RegisztracioView{
//
    public static function ShowRegisztracio(){
      $html="";
      $html.= '<div id="regisztracioForm">'.
                '<form method="post" action="?oldal=Regisztracio/EllenorizRegisztracio">'.
                  '<div class="ErrorDiv">'.
                  '<input type="text" name="username" id="username" placeholder="Felhasznalonev"><br><br>'.
                  '<p id="errorUsernameP"></p>'.
                  '</div>'.
                  '<div class="ErrorDiv">'.
                  '<input type="text" name="email" id="email" placeholder="Email"><br><br>'.
                  '<p id="errorEmailP"></p>'.
                  '</div>'.
                  '<div class="ErrorDiv">'.
                  '<input type="password" name="p" id="p" placeholder="Jelszo"><br><br>'.
                  '<p id="errorPasswordP"></p>'.
                  '</div>'.
                  '<button id="regisztracioBekuldGomb" type="submit">Regisztracio</button>'.
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