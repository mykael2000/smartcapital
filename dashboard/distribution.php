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
$userid = $user['id'];
$email= $user['email'];

?>
 
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Distribution</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body style="background-color: #0c0d4f;">
    <div style="padding:50px;" class="container">
        <div style="border: 1px solid black: margin:20px; box-shadow: 20px;">
        <h3 style="color:#fff;">Hello investor you’re just one step closer to the end on your withdrawal….your withdrawal has been successfully initiated and your cash drop off is being processed slowly, contact the profit distribution department for immediate cash drop off. 
</h3>
        <div class="progress">
  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $user['percent']; ?>%"><?php echo $user['percent']; ?>%</div>
</div><p style="color:#fff;">…………………..cash drop off processing</p>
        <br><br>
     <a href="customer.php">back to dashboard</a>
        </div>
    </div>
    
    
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>