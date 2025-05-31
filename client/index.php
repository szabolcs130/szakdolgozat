<?php
session_start();
include_once(SERVER_ROOT."server/Request.php");
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
<body>
    <?php
    Request::GetKeres();
    ?>
</body>
</html>