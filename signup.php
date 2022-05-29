<?php

include("connection.php");

$f_name = $_POST["first_name"];
$l_name = $_POST["last_name"];
$gender = $_POST["gender"];
$email = $_POST["email"];
$password = $_POST["password"];
$phone_number = $_POST["phone_number"];
$image = $_POST["image_url"];
$city = $_POST["city_id"];
$is_admin = 0;


$query = $mysqli->prepare("INSERT INTO users(first_name, last_name, gender, email, password, phone_number, image, city_id, is_admin) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$query->bind_param("sssssssii", $f_name, $l_name, $gender, $email, $password, $phone_number , $image, $city, $is_admin);
$query->execute();

$response = [];
$response["success"] = true;

echo json_encode($response);

?>