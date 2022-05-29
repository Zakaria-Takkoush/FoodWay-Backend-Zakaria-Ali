<?php

include("connection.php");

$query = $mysqli->prepare("SELECT * from reviews");
$query->execute();
$array = $query->get_result();

$response = [];
while($review = $array->fetch_assoc()){
    $response[] = $review;
} 

$json = json_encode($response);
echo $json;

?>