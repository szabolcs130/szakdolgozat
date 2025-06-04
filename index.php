<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["rang"])) {
    $_SESSION["rang"]=0;
//echo "masodik rang:".$_SESSION["rang"]."<br>";

}else{
//echo "Elso rang:".$_SESSION["rang"]."<br>";

}

define('SERVER_ROOT', $_SERVER['DOCUMENT_ROOT'].'/Szakdolgozat/');
define('SITE_ROOT', 'http://localhost/Szakdolgozat/');
$indexFajl=SERVER_ROOT."client/index.php";
$requestFajl=SERVER_ROOT."server/request.php"; 
if (file_exists($indexFajl)) {
    include_once($indexFajl);
}else{
    print("<br>Felhasznaloi home nem talalhato! ");
}
?>