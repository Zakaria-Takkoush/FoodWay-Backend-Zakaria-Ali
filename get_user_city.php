<?php

include("connection.php");

if(isset($_POST["id"])){
    $user_id = $_POST["id"];
}

$query = $mysqli->prepare("SELECT cities.city_name FROM cities,users WHERE users.city_id = cities.city_id and users.user_id = ?");
//$query = $mysqli->prepare("SELECT city_name FROM cities INNER JOIN users ON users.city_id=cities.city_id WHERE user_id=?");
$query->bind_param("i",$user_id);
$query->execute();

$array = $query->get_result();

$response = [];
while($city = $array->fetch_assoc()){
    $response[] = $city;
} 

$response["success"] = 'Sucess!';  

$json = json_encode($response);
echo $json;

?>