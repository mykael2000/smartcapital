<?php

include("connection.php");
session_start();
ob_start();
if(!isset($_SESSION['email'])){
   header('location: ../login.php');
   
};
$email = $_SESSION['email'];
$sql = "SELECT * FROM users WHERE email = '$email'";
$query = mysqli_query($con, $sql);
$user = mysqli_fetch_assoc($query);


$id = $user['id'];
$t=time();
$last_login = date("Y-m-d",$t);
$lastsql = "UPDATE users set last_login = '$last_login' WHERE id = $id";
$lastquery = mysqli_query($con, $lastsql); 


session_destroy();
header("location: ../login.php");


?>