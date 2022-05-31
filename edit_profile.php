<?php

include("connection.php");

if(isset($_POST["user_id"])){
    $user_id = $_POST["user_id"];
} 

if(isset($_POST["first_name"])){
    $f_name = $_POST["first_name"];
} else {
    die("Missing First Name!");
}

if(isset($_POST["last_name"])){
    $l_name = $_POST["last_name"];
} else {
    die("Missing Last Name!");
}

if(isset($_POST["email"])){
    $email = $_POST["email"];
} else {
    die("Missing email!");
}

if(isset($_POST["password"])){
    $password = hash("sha256", $_POST["password"]);
} else {
    die("Missing password!");
}

// if(isset($_POST["phone_number"])){
//     $phone_number = $_POST["phone_number"];
// } else {
//     die("Missing Phone Number!");
// }

if(isset($_POST["gender"])){
    $gender = $_POST["gender"];
} else {
    die("Missing Gender!");
}

if(isset($_POST["city_id"])){
    $city = $_POST["city_id"];
} else {
    die("Missing City!");
}


// $is_admin = 0;

$query = $mysqli->prepare("UPDATE `users` SET `first_name`= ?,`last_name`= ?,`gender`= ?,
`email`= ?,`password`= ?, `city_id` = ? WHERE `user_id` = ?");
$query->bind_param("ississi",$user_id, $f_name ,$l_name,$gender,$email,$password,$city);
$query->execute();

$response = [];
$response["success"] = true;                

echo json_encode($response);

?>