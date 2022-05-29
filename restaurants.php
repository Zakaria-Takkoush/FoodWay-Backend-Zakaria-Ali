<?php

include("connection.php");

$query = $mysqli->prepare("SELECT * from restaurants");
$query->execute();
$array = $query->get_result();

$response = [];
while($resto = $array->fetch_assoc()){
    $response[] = $resto;
} 

$json = json_encode($response);
echo $json;

?>