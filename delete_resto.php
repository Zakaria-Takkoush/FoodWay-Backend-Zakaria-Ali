<?php

include("connection.php");


$resto_id = $_POST["id"];

$query = $mysqli->prepare("DELETE from restaurants WHERE `resto_id` = ?");
$query->bind_param("i",$resto_id);
$query->execute();

$response = [];
$response["success"] = true;                

echo json_encode($response);

?>