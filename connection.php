<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

$host = "127.0.0.1";
$db_user = "root";
$db_pass = null;
$db_name = "foodwaydb";

$mysqli = new mysqli($host, $db_user, $db_pass, $db_name);

?>