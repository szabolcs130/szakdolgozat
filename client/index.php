<?php
include_once(__DIR__."/../Server/Request.php");
//include_once('./server/Request.php');
use Server\Request;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Szakdolgozat</title>
</head>
<body>
    <div id="indexKontener">
    <?php
    Request::GetKeres();
    ?>
    </div>
</body>
</html>