<?php
namespace Server\View;
class BejelentkezesView{
//
    public static function ShowBejelentkezes($uzenet=null){
      $html="";
      if (isset($_SESSION['uzenet'])) {
        $html.='<h3>'.$_SESSION['uzenet'].'</h3>';
        unset($_SESSION['uzenet']);
      }
      if ($uzenet!=null) {
        $html.='<h3>Sikeres Kijelentkezés</h3>';
      }
      $html.= '<div id="bejelentkezesFormTarolo">'.
                '<form id="bejelentkezesForm" method="post" action="?oldal=Bejelentkezes/EllenorizBejelentkezes">'.
                  '<div class="ErrorDiv">'.
                  '<br><label for="email">E-mail cím:</label>'.
                  '<input type="text" name="email" id="email" autocomplete="off" autofocus placeholder="Email">'.
                  '<p id="errorEmailP"></p>'.
                  '</div>'.
                  '<div class="ErrorDiv">'.
                  '<br><label for="p">Jelszó: </label>'.
                  '<input type="password" name="p" id="p" autocomplete="off" placeholder="Jelszo">'.
                  '<p id="errorPasswordP"></p>'.
                  '</div>'.
                  '<button id="bejelentkezesBekuldGomb" type="submit">Bejelentkezés</button>'.
                '</form>'.
              '</div>';
      echo $html; 
    }
    public static function SikertelenBejelentkezes(){
      echo "<h1>Sikertelen bejelentkezes!</h1>";
    }
}
?>