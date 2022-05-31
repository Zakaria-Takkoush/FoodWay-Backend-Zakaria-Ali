<?php

include("connection.php");

$rating = $_POST['rating'];
$user_id = $_POST["user_id"];
$resto_id = $_POST["resto_id"];

$query = $mysqli->prepare("Select * from ratings where user_id = ? and resto_id = ?");
$query->bind_param("ii",$user_id ,$resto_id);
$query->execute();

$result = $query->get_result();

$num_rows = $result->num_rows;

if($num_rows != 0)
{
    echo "You have already rated this restaurant";
    exit();
}
$query = $mysqli->prepare("INSERT INTO ratings(rating, user_id, resto_id) VALUES (?, ?, ?)");
$query->bind_param("iii",$rating ,$user_id ,$resto_id);
$query->execute();  

$response = [];
$response["success"] = true;

echo json_encode($response);

?>