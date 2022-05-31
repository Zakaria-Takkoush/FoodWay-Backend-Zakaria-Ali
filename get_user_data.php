<?php

include("connection.php");

$user_id= $_POST["user_id"];

$query = $mysqli->prepare("SELECT * from users WHERE user_id = ?");
$query->bind_param("i",$user_id);
$query->execute();

$array = $query->get_result();

$response = [];
while($user = $array->fetch_assoc()){
    $response[] = $user;
} 

$response["success"] = 'Data Collected';  

$json = json_encode($response);
echo $json;

?>