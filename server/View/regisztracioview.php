<?php
namespace Server\View;
class RegisztracioView{
//
    public static function ShowRegisztracio(){
      $html="";
      $html.= '<div id="regisztracioFormTarolo">'.
                '<form id="regisztracioForm" method="post" action="?oldal=Regisztracio/EllenorizRegisztracio">'.
                  '<div class="ErrorDiv">'.
                  '<br><label for="username">Felhasználó név:</label>'.
                  '<input type="text" name="username" id="username" autocomplete="off" autofocus placeholder="Felhasznalonev">'.
                  '<p id="errorUsernameP"></p>'.
                  '</div>'.
                  '<div class="ErrorDiv">'.
                  '<br><label for="email">E-mail cím:</label>'.
                  '<input type="text" name="email" id="email" autocomplete="off" placeholder="Email">'.
                  '<p id="errorEmailP"></p>'.
                  '</div>'.
                  '<div class="ErrorDiv">'.
                  '<br><label for="p">Jelszó:</label>'.
                  '<input type="password" name="p" id="p" autocomplete="off" placeholder="Jelszo">'.
                  '<p id="errorPasswordP"></p>'.
                  '</div>'.
                  '<button id="regisztracioBekuldGomb" type="submit">Regisztráció</button>'.
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