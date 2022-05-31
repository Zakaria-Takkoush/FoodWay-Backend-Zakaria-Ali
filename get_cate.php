<?php

include("connection.php");

$resto_id = $_POST["resto_id"];

$query = $mysqli->prepare("SELECT cat_name FROM categories INNER JOIN restaurants ON restaurants.cat_id=categories.cat_id WHERE resto_id=?");
$query->bind_param("i",$resto_id);
$query->execute();

$array = $query->get_result();

$response = [];
while($city = $array->fetch_assoc()){
    $response[] = $city;
} 

$json = json_encode($response);
echo $json;



?>