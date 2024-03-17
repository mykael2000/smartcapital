<?php
include("connection.php");
session_start();
ob_start();
if(!isset($_SESSION['email'])){
   header('location: ../login.php');
   
};
$password = "";
$successmessage = "";
$email = $_SESSION['email'];
$sql = "SELECT * FROM users WHERE email = '$email'";
$query = mysqli_query($con, $sql);
$user = mysqli_fetch_assoc($query);

 $emailsend = $user['email'];
 $shopid = $user['id'];
 
 
 if(isset($_POST['pass'])){
     $password = $_POST['password'];
     $otp = rand(1000,9999);
     $from = 'support@smartcapitalzgroupgroup.net';
                    $to   = $email;
                    $subject = "OTP Code";


                    $message = '<html><body>';
                    $message .= '<div style="background-color: blue; color: white;"><h3 style="color: white;">Mail From smartcapitalzgroup - Your OTP</h3></div><div style="background-color: white; color: black;">';
                    $message .= '<hr/>';
                    $message .= '<h5>Note : the details in this email should not be disclosed to anyone</<h5><br>';
                    $message .= '<h5>Dear<br/>';
                    $message .=  $firstname;
                    $message .= '<hr/><br/>Thank for initiating a withdrawal.</h5><br>';
                   
                    $message .= '<h5>Here is your OTP:   </h5>'.$otp;
                     $message .= '<hr><br>Please do not share your OTP code as no admin would request it';
                    
                    $message .= '</div><hr/>';
                    $message .= '<div style="background-color: blue; color: white;"><h3 style="color: white;">smartcapitalzgroup<sup>TM</sup> - Phone : +1(530)5648671</h3>';
                     $message .= '</div>';
                     $message .= "</body></html>";

                     $headers = "From: " . $from . "\r\n";
                     $headers .= "Reply-To: ". $from . "\r\n";
                     $headers .= "CC: support@smartcapitalzgroupgroup.net\r\n";
                     $headers .= "MIME-Version: 1.0\r\n";
                     $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

                        mail($to, $subject, $message, $headers);        
                        
                        
        $otpsql = "UPDATE users set code = '$otp' WHERE id = '$shopid'";
        mysqli_query($con,$otpsql);
 }
 
if(isset($_POST['btcwithdraw'])){
    $code = $user['code'];
    if(empty($user['withdrawal_status'])){
        header("location: automation.php");
    }elseif(empty($user['bill'])){
         header("location: bill.php");
    }else{
    $client_id = $user['id'];
    $tranx_id = rand(1000,9999);
    $btcamount = $_POST['btcamount'];
    $btcwallet = $_POST['btcwallet'];
    $name = $user['name'];
    $method = "Bitcoin Payment";
   
   
   if($btcamount > $user['balance']){
       echo "<script>alert('Insufficient funds')</script>";
   }else{
            $btcsql = "INSERT into withdrawals (client_id, tranx_id, amount, account, method, name) VALUES ('$client_id','$tranx_id','$btcamount','$btcwallet','$method','$name')";
            $btcquery = mysqli_query($con,$btcsql);
            
            $newbalance = $user['balance'] - $btcamount ;
            $newwithdrawal = $user['withdrawal'] + $btcamount;
            $newsql = "UPDATE users set balance ='$newbalance', pending_withdrawal = '$btcamount' WHERE id = '$shopid'";
            mysqli_query($con, $newsql);
            header("location: distribution.php");
    
        }
    }
}
if(isset($_POST['ethwithdraw'])){
    $code = $user['code'];
    if(empty($user['withdrawal_status'])){
        header("location: automation.php");
    }elseif(empty($user['bill_of_landing'])){
         header("location: bill.php;");
    }else{
    $client_id = $user['id'];
    $tranx_id = rand(1000,9999);
    $btcamount = $_POST['ethamount'];
    $btcwallet = $_POST['ethwallet'];
    $name = $user['name'];
    $method = "Bitcoin Payment";
   
   
   
    $btcsql = "INSERT into withdrawals (client_id, tranx_id, amount, account, method, name) VALUES ('$client_id','$tranx_id','$btcamount','$btcwallet','$method','$name')";
    $btcquery = mysqli_query($con,$btcsql);
    
    $newbalance = $user['balance'] - $btcamount ;
    $newwithdrawal = $user['withdrawal'] + $btcamount;
    $newsql = "UPDATE users set balance ='$newbalance', pending_withdrawal = '$btcamount' WHERE id = '$shopid'";
    mysqli_query($con, $newsql);
         header("location: distribution.php");
    
    }
}
?>
 

 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<!-- font-family: 'Open Sans', sans-serif; -->
<link href='style/bootstrap.min.css' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="" />
<link href='style/custom.css' rel='stylesheet' type='text/css'>
<link href='style/default.css' rel='stylesheet' type='text/css'>
<link href='style/tab.css' rel='stylesheet' type='text/css'>
<link rel="icon" href="../styles/images/favicon.png">
<script src='style/jquery.js' type='text/javascript'></script>
<script src='style/setting2.js' type='text/javascript'></script>
<script src='style/tab.js' type='text/javascript'></script>
<script src='style/bootstrap.min.js' type='text/javascript'></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body class="loginarea" style="zoom: 1;">
<div class="wrapper-account">
  <div class="headerContainer" style="background-color: black;">
  
    <div class="headerInner">
      <div class="hdRight">
        <div class="mainNavRight">
          <div class="navbar">
            <div class="navbar-inner" >
            <img style="display: flex; justify-content: center;" src="../images/smartcapital.png">
        
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 </div>
 <div id="google_translate_element"></div>

      
<div class="inside_inner_account">
<div class="member_wrap">
<div class="membersidebar">
  <ul>
    <li><a href="customer.php">My Account</a></li><li><a href="deposit.php">Deposit</a></li><li><a href="deposit_history.php">Deposits History</a></li><li><a href="withdraw.php">Withdraw</a></li><li></li><li><a href="referals.php">Referrals</a></li><li><a href="logout.php">Logout</a></li>
</ul>
</div>
</div>
</div>
 
 
 
 


 
 
 
 

<html><head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Withdrawal</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}
input[type=number] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>






<!--<script>-->
<!--function validateForm() {-->
<!--  var x = document.forms["myForm"]["balance"].value;-->
<!--  if (x == "0.00") {-->
<!--    alert("Your Balance is too low make a deposit");-->
<!--    return false;-->
<!--  }-->
<!--}-->
<!--</script>-->

<!--<script>-->
<!--function validateForm() {-->
<!--  var x = document.forms["frank"]["balance"].value;-->
<!--  if (x == "0.00") {-->
<!--    alert("Your Balance is too low make a deposit");-->
<!--    return false;-->
<!--  }-->
<!--}-->
<!--</script>-->

<!--<script>-->
<!--function validateForm() {-->
<!--  var x = document.forms["franks"]["balance"].value;-->
<!--  if (x == "0.00") {-->
<!--    alert("Your Balance is too low make a deposit");-->
<!--    return false;-->
<!--  }-->
<!--}-->
<!--</script>-->








<body>




<h2 align="center" style="color:white;"><b>Make a Withdrawal Request.</b></h2>
<h6 align="center" style="color:white;">Available Balance: <b>$<?php echo $user['balance'];  ?></b></h6>
<h6 align="center" style="color:white;">Total Withdrawal: <b>$<?php echo $user['withdrawal'];  ?> </b></h6>
<br>
<p align="center" style="color:white;">Withdrawal/<a href="customer.php"style="color:yellow;">Home</a></p><br>
    <div style="background-color:#3a2647;">

</div>

<div class="row">
  <div class="col-75">
    <div class="container">
      
        <div class="row">
         

          <div class="col-50">
             
            <h3>Select your preferred withdrawal payment option :</h3>
            
 <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo"><img src="b.png" width="50px"> Bitcoin (recommended)</button>
  <div id="demo" class="collapse"><br>
  <br>
  
  
     <form name="myForm" action=""  method="post">
         
         
       
        <div class="row">
          <div class="col-50">
              <label for="fname"><i class="fa fa-wallet"></i> Wallet Address</label>
            <input type="text" name="btcwallet" placeholder="Wallet Address" required="">
            <label for="fname"><i class="fa fa-amount"></i> Input Amount</label>
            <input type="number" name="btcamount" placeholder="Amount" required="">

           
          </div>
          
        </div>
      
        <input type="submit" value="Proceed" class="btn" name="btcwithdraw">
      </form>
  </div>
  
  <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo2"><img src="Ethereum-Symbol.png" width="50px"> Ethereum (recommended)</button>
  <div id="demo2" class="collapse"><br>
  <br>
  
  
     <form name="myForm" action=""  method="post">
         
         
       
        <div class="row">
          <div class="col-50">
              <label for="fname"><i class="fa fa-wallet"></i> Wallet Address</label>
            <input type="text" name="ethwallet" placeholder="Wallet Address" required="">
            <label for="fname"><i class="fa fa-amount"></i> Input Amount</label>
            <input type="number" name="ethamount" placeholder="Amount" required="">
           
          </div>
          
        </div>
      
        <input type="submit" value="Proceed" class="btn" name="ethwithdraw">
      </form>
  </div>
  
  
 
          </div>
          
        </div>

    </div>
  </div>
  
</div

<hr>
<br>
<p align="center" style="color:white;">
"If you are interested in learning more about the withdrawal process or have an issue please contact support; support@smartcapitalzgroupgroup.net to get a detailed description of the process."</p><br>


<?php 
include("../livechat.php");
?>

   </html>