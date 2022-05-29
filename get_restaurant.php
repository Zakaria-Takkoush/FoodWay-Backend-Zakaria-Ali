<?php

include("connection.php");

$resto_id = $_POST["resto_id"];

$query = $mysqli->prepare("SELECT * from restaurants where resto_id = ?");
$query->bind_param("i",$resto_id);
$query->execute();

$array = $query->get_result();

$response = [];
while($resto = $array->fetch_assoc()){
    $response[] = $resto;
} 

$json = json_encode($response);
echo $json;

?>