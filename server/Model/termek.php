<?php
require_once("aruoop.php");

$alma=new aru(1,"alma",100,"Nagy szemu alma");
$korte=new aru(2,"korte",200,"birsKorte");
$eper=new aru(3,"eper",300,"Piros");
$tomb=[];

$tomb[]=$alma;
$tomb[]=$korte;
$tomb[]=$eper;

foreach ($tomb as $value) {
   echo $value->getNev();
}

?>