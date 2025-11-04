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
$indexFajl=__DIR__."/Client/index.php";
if (file_exists($indexFajl)) {
    include_once($indexFajl);
}else{
    print("<br>Felhasznaloi home nem talalhato! ");
}
?>