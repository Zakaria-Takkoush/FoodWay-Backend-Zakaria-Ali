<?php

include("connection.php");

$rev_text = $_POST["rev_text"];
$user_id = $_POST["user_id"];
$resto_id = $_POST["resto_id"];
$status = 0; //Declined by Default

$query = $mysqli->prepare("INSERT INTO reviews (rev_text, user_id, resto_id, status) VALUES (?, ?, ?, ?)");
$query->bind_param("siii", $rev_text, $user_id, $resto_id, $status);
$query->execute();

$response = [];
$response["success"] = true;

echo json_encode($response);

?>