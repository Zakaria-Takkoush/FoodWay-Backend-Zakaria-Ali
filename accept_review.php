<?php

include("connection.php");

$status = 1; //Review Accepted

$query = $mysqli->prepare("UPDATE reviews SET status = ?");
$query->bind_param("i", $status);
$query->execute();

$response = [];
$response["success"] = true;

echo json_encode($response);

?>