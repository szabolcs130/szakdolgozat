<?php
session_start();
require_once("szemely.php");
$szabi=unserialize($_SESSION["acc"]);
echo $szabi->Kiir();
?>