<?php
include_once(__DIR__."/../server/Request.php");
//include_once('./server/Request.php');
use Server\Request;
Request::AutoLoader();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color:gray;">
    <?php
    Request::GetKeres();
    ?>
</body>
</html>