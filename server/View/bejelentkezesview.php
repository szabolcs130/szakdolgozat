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
        $html.='<h3>Sikeres Kijelentkezes</h3>';
      }
      $html.= '<div id="bejelentkezesForm">'.
                '<form method="post" action="?oldal=Bejelentkezes/EllenorizBejelentkezes">'.
                  '<div class="ErrorDiv">'.
                  '<input type="text" name="email" id="email" placeholder="Email"><br><br>'.
                  '<p id="errorEmailP"></p>'.
                  '</div>'.
                  '<div class="ErrorDiv">'.
                  '<input type="password" name="p" id="p" placeholder="Jelszo"><br><br>'.
                  '<p id="errorPasswordP"></p>'.
                  '</div>'.
                  '<button id="bejelentkezesBekuldGomb" type="submit">Bejelentkezes</button>'.
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