<?php

include("connection.php");

$name = $_POST['name'];
$phone = $_POST["phone"];
$description = $_POST["description"];
$image = $_POST["image"];
$cat_id = $_POST["cat_id"];
$city_id= $_POST["city_id"];

$resto_id = $_POST["id"];

$query = $mysqli->prepare("UPDATE `restaurants` SET `resto_name`= ?,`phone_number`= ?,`description`= ?,
`image`= ?,`cat_id`= ?,`city_id`= ? WHERE `resto_id` = ?");
$query->bind_param("sissiii",$name ,$phone,$description,$image,$cat_id,$city_id,$resto_id);
$query->execute();

$response = [];
$response["success"] = true;                

echo json_encode($response);

?>