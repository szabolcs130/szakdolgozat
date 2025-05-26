<?php
session_start();
/*require_once("csatlakozas.php");
require_once("szemely.php");
require_once("tablazat.php");

$csat=new csatlakozas();
$szabi=new Szemely(1,"szabi","szabi@gmail.com","alma","__1");
$_SESSION['acc']=serialize($szabi);*/
/*$lekerdez=$csat->lekerdezMenu();
if ($lekerdez!=-1) {
    foreach ($lekerdez as $key => $value) {
        echo $value;
     }
}else{
    echo "ures";
}
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <li><a href="?oldal=fooldal">home</a></li>
    <li><a href="?oldal=rolunk">about</a></li>
    <li><a href="?oldal=webshop">webshop</a></li>
    <div style="width: 80%;display: flex; flex-direction: colum;">
    <?php
 /*   $lekerdez=$csat->lekerdezMenu();
    if ($lekerdez!=-1) {
        foreach ($lekerdez as $key => $value) {
            echo $value;
        }
    }else{
        echo "ures";
    }*/
    ?>
    <a href="api.php">Masik oldal</a>
    </div>
</body>
</html>