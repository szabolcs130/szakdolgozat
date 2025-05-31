<?php
session_start();
include_once(SERVER_ROOT."server/Request.php");
use Server\Request;
use Server\Controller\MenuController;
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
    MenuController::Main();
    Request::GetKeres();
    ?>
</body>
</html>