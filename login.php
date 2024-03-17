<?php

include("dashboard/connection.php");
ob_start();
session_start();
$signed = "";


    
    $email = $_POST['email'];
   
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $query = mysqli_query($con, $sql);

    if($query->num_rows > 0){
        $row = mysqli_fetch_assoc($query);
        $_SESSION['email'] = $row['email'];
        
        $fetch = mysqli_fetch_assoc($query);
        if(empty($fetch['kyc'])){
             header("location: dashboard/verify-kyc.php");
  
        }else{
             header("location: dashboard/customer.php");
  
        }
       
    }else{

       echo "<script> alert('whoops! Email or Password is incorrect')</script>";

        header("refresh: 1; url=login.html");
    }
   
  

