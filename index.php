<?php
session_start();
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