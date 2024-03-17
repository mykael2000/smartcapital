<?php

include("dashboard/connection.php");
ob_start();
session_start();
if(!empty($_GET['ref'])){
  $ref = $_GET['ref'];
}else{
  $ref = "";
}
$code = $_SESSION['code'];

    $fullname = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $bitcoin = $_POST['bitcoin'];
    $ethereum = $_POST['ethereum'];
    $phone = $_POST['phone'];
    $referral = $ref;
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $ssn = $_POST['ssn'];
    
    if(empty($username) || empty($email) || empty($password)){
     echo "Username, Email and Password fields must be filled......redirecting now";
    
     header("refresh: 2; url=register.php");
     exit();
 
}

    $emailcheck = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($con, $emailcheck);
    if(mysqli_num_rows($result)){
       
       echo "<script>alert('email already exists.......redirecting now')</script>";
       header("refresh: 2; url=register.php");
     exit();
      
    }elseif($password !== $cpassword){
       echo "<script>alert('passwords do not match .......redirecting now')</script>";
      header("refresh: 2; url=register.php");
     exit();
    }elseif($code !== $_POST['code']){
         echo "<script>alert('Human Verification failed, try again......redirecting now')</script>";
        header("refresh: 2; url=register.php");
     exit();
    }else{
    $sql = "INSERT into users (name, username, email, country, bitcoin, ethereum, phone, referral, question, answer, password, ssn) VALUES ('$fullname','$username','$email','$country','$bitcoin','$ethereum','$phone','$ref','$question','$answer','$password','$ssn')";
    $query = mysqli_query($con, $sql);





$from = 'support@smartcapitalzgroup.net';
                    $to   = $email;
                    $subject = "You Have Succesfully Registered At smartcapitalzgroup- The Journey Begins";


                    $message = '<html><body>';
                    $message .= '<div style="background-color: blue; color: white;"><h3 style="color: white;">Mail From smartcapitalzgroup- Thanks for Signing Up</h3></div><div style="background-color: white; color: black;">';
                    $message .= '<hr/>';
                    $message .= '<h5>Note : the details in this email should not be disclosed to anyone</<h5><br>';
                    $message .= '<h5>Dear<br/>';
                    $message .=  $firstname;
                    $message .= '<hr/><br/>Thanks  For Signing Up at smartcapitalzgroup the most convinient way to invest in crypto and much more.., we look forward to making your financial goals come true and offering a long term of service to you.</h5>';
                   
                    $message .= '<h5>Regarding  What To Do Next Please Login To Your Account <br/><ul><li>And Send Your Valid Identity Documents To support@smartcapitalzgroup.net To Fully Verify Your Account</li><li>Fund Your Account To Fully Activate Your Account</ul></h5>';
                     $message .= '<h5>You Will Be Contacted With More Information By The Admins<br/>Note : This Is An Automated Email</h5>';
                     $message .= '<a href="http://smartcapitalzgroup.net/login.php"><h4 style="color: blue;">Verify your account<h4></a>';
                    $message .= '</div><hr/>';
                    $message .= '<div style="background-color: blue; color: white;"><h3 style="color: white;">smartcapitalz<sup>TM</sup> - Phone : +17868293117</h3>';
                     $message .= '</div>';
                     $message .= "</body></html>";

                     $headers = "From: " . $from . "\r\n";
                     $headers .= "Reply-To: ". $from . "\r\n";
                     $headers .= "CC: support@smartcapitalzgroup.net\r\n";
                     $headers .= "MIME-Version: 1.0\r\n";
                     $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

                        mail($to, $subject, $message, $headers);                           echo '<div class="alert alert-success">
                        You Are Successfully Registered  Please Check Your Mailbox For Further Instructions!
                </div>';
    echo "<script>alert('registration successful')</script>";
    header("refresh: 1; url=login.html?log=yes");
    }