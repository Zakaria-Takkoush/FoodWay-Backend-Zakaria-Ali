<?php

include("connection.php");

$review_id= $_POST["id"];
$status =1;

$query = $mysqli->prepare("UPDATE `reviews` SET `status`= ? WHERE `rev_id` = ?");
$query->bind_param("ii",$status,$review_id);
$query->execute();

$response = [];
$response["success"] = 'Review Approved';                

echo json_encode($response);

?>