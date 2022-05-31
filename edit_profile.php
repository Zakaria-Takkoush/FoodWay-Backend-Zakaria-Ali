<?php

include("connection.php");

$f_name = $_POST["first_name"];
$l_name = $_POST["last_name"];
$gender = $_POST["gender"];
$email = $_POST["email"];
$password = hash("sha256", $_POST["password"]);
$phone_number = $_POST["phone_number"];
$image = $_POST["image_url"];
$city = $_POST["city_id"];

$user_id = $_POST["id"];

$query = $mysqli->prepare("UPDATE `users` SET `first_name`= ?,`last_name`= ?,`gender`= ?,
`email`= ?,`password`= ?,`image`= ?, `city_id` = ? WHERE `user_id` = ?");
$query->bind_param("ssisssi",$f_name ,$l_name,$gender,$email,$password,$phone_number,$image,$city);
$query->execute();

$response = [];
$response["success"] = true;                

echo json_encode($response);

?>