<?php

include("connection.php");

$resto_name = $_POST["resto_name"];
$phone_number = $_POST["phone_number"];
$desc = $_POST["description"];
$image = $_POST["image"];
$cat = $_POST["cat_id"];
$city = $_POST["city_id"];


$query = $mysqli->prepare("INSERT INTO restaurants(resto_name, phone_number, description, image, cat_id, city_id) VALUES (?, ?, ?, ?, ?, ?)");
$query->bind_param("ssssii", $resto_name, $phone_number, $desc, $image, $cat, $city);
$query->execute();

$response = [];
$response["success"] = true;

echo json_encode($response);

?>