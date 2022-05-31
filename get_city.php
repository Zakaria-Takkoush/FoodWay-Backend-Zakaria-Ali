<?php

include("connection.php");

/*$city_id = $_POST["city_id"];*/

$query = $mysqli->prepare("SELECT city_name from cities /*where city_id = ?*/");
/*$query->bind_param("i",$city_id);*/
$query->execute();

$array = $query->get_result();

$response = [];
while($city = $array->fetch_assoc()){
    $response[] = $city;
} 

$json = json_encode($response);
echo $json;

?>