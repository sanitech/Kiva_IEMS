<?php

require('../config/connection.php');

$connect = new dbConnect();

$db = $connect->dbConnection();




$password = md5( $_POST['password']);
$username = strtolower( trim($_POST['username']));
$dep='ICT';


if (empty($username) || empty($password)) {
    header('location:../dashboard/users.php?error=Failed required');
    exit();
}


$stm = $db->prepare("SELECT * FROM users WHERE username='$username'");
$stm->execute();

if ($stm->rowCount() > 0) {
    header('location:../dashboard/users.php?error=users already exists');
    exit();
}

$stm = $db->prepare("INSERT INTO users (dep, username, password) VALUES ('$dep','$username', '$password')");
if ($stm->execute()) {
    header('location:../dashboard/users.php?success=successfully created account');
}
