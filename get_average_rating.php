<?php

include("connection.php");

$resto_id= $_POST["id"];

$query = $mysqli->prepare("Select CAST(avg(rating) AS DECIMAL(10,2)) as average from ratings WHERE `resto_id` = ?");
$query->bind_param("i",$resto_id);
$query->execute();

$array = $query->get_result();

$response = [];
while($rating = $array->fetch_assoc()){
    $response[] = $rating;
} 

$response["success"] = 'Review Approved';                

echo json_encode($response);

?>