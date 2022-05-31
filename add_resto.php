<?php

include("connection.php");

if(isset($_POST["resto_name"])){
    $resto_name = $_POST["resto_name"];
} else {
    die("Missing Values!");
}

if(isset($_POST["phone_number"])){
    $phone_number = $_POST["phone_number"];
} else {
    die("Missing Values!");
}

if(isset($_POST["description"])){
    $desc = $_POST["description"];
} else {
    die("Missing Values!");
}

if(isset($_POST["cat_id"])){
    $cat = $_POST["cat_id"];
} else {
    die("Missing Values!");
}

if(isset($_POST["city_id"])){
    $city = $_POST["city_id"];
} else {
    die("Missing Values!");
}

$image = $_POST["image"];

$query = $mysqli->prepare("INSERT INTO restaurants(resto_name, phone_number, description, image, cat_id, city_id) VALUES (?, ?, ?, ?, ?, ?)");
$query->bind_param("ssssii", $resto_name, $phone_number, $desc, $image, $cat, $city);
$query->execute();

$response = [];
$response["success"] = true;

echo json_encode($response);

?>