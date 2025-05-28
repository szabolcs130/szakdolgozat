<?php
session_start();
include_once(SERVER_ROOT."server/Request.php");
use Server\Request;

Request::AutoLoader();
/*$url= __DIR__;
$url=str_replace("\\","/",$url);
echo $url."/css/fooldal.css";
if (file_exists($url)) {
    echo " letezik";
}
 <link rel="stylesheet" href="./client/css/fooldal.css?v=1"> */
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
    <?php
echo Request::GetKeres();

 /*   $lekerdez=$csat->lekerdezMenu();
    if ($lekerdez!=-1) {
        foreach ($lekerdez as $key => $value) {
            echo $value;
        }
    }else{
        echo "ures";
    }
    ./css/<?php echo "fooldal"; ?>.css    
    */
    ?>
 
</body>
</html>