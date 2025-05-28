<?php
define('SERVER_ROOT', $_SERVER['DOCUMENT_ROOT'].'/Szakdolgozat/');
define('SITE_ROOT', 'http://localhost/Szakdolgozat/');
/*use Server\Model\Aruoop;

$ar=new aruoop(1,"kug",3,"lgjg");
echo $ar->__toString();*/
$indexFajl=SERVER_ROOT."client/index.php";
$requestFajl=SERVER_ROOT."server/request.php"; 

if (file_exists($indexFajl)) {
    include_once($indexFajl);
}else{
    print("<br>Felhasznaloi home nem talalhato! ");
}

/*
a client index.php nal kell meghivni pl az alap alkotoreszeket, pl menu resz, lablec, 
es kozepre rakni a ker oldal tartalmat, maskepp a request.php mindig felulre rakja a 
view tartalmat es a menu lentebb lesz.
*/
?>