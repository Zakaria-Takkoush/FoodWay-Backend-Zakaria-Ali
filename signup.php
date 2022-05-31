<?php

include("connection.php");

if(isset($_POST["first_name"])){
    $f_name = $_POST["first_name"];
} else {
    die("Missing Values!");
}

if(isset($_POST["last_name"])){
    $l_name = $_POST["last_name"];
} else {
    die("Missing Values!");
}

if(isset($_POST["email"])){
    $email = $_POST["email"];
} else {
    die("Missing Values!");
}

if(isset($_POST["password"])){
    $password = hash("sha256", $_POST["password"]);
} else {
    die("Missing Values!");
}

if(isset($_POST["phone_number"])){
    $phone_number = $_POST["phone_number"];
} else {
    die("Missing Values!");
}

if(isset($_POST["gender"])){
    $gender = $_POST["gender"];
} else {
    die("Missing Values!");
}

if(isset($_POST["city_id"])){
    $city = $_POST["city_id"];
} else {
    die("Missing Values!");
}


$image = $_POST["image_url"];

$is_admin = 0;


$query = $mysqli->prepare("INSERT INTO users(first_name, last_name, gender, email, password, phone_number, image, city_id, is_admin) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$query->bind_param("ssissssii", $f_name, $l_name, $gender, $email, $password, $phone_number , $image, $city, $is_admin);
$query->execute();

$response = [];
$response["status"] = "Account Created!";

echo json_encode($response);

?>