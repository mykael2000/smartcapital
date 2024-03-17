<?php
session_start();
require('includes/connect.php');

if(!isset($_SESSION['email'])){
    header('location:login.php');
}
$shopid = $_GET['id'];
$sql = "DELETE FROM deposit WHERE id = '$shopid'";
$query = mysqli_query($con,$sql);
header("location:table.php");


?>