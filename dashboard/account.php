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

function getUserIP()
{
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}


$user_ip = getUserIP();


if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];
    $bitcoin = $_POST['bitcoin'];
    $ethereum = $_POST['ethereum'];
    $password = $_POST['password'];
    
    
    
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

</head>

<body class="loginarea">
<div class="wrapper-account">
  <div class="headerContainer" style="background-color: black;">
  
    <div class="headerInner">
      <div class="hdRight">
        <div class="mainNavRight">
          <div class="navbar">
            <div class="navbar-inner" >
            <img style="display: flex; justify-content: center;" src="../images/smartlogo.png">
        
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
    <li><a href="customer.php">My Account</a></li><li><a href="account.php">Edit Account</a></li><li><a href="deposit.php">Deposit</a></li><li><a href="deposit_history.php">Deposits List</a></li><li><a href="withdraw.php">Withdraw</a></li><li><a href="withdraw_history.php">Withdrawal list</a></li><li><a href="referals.php">Referrals</a></li><li><a href="logout.php">Logout</a></li>
  </ul>
</div>
<div class="member-container">
<div class="account_top">
  <div class="user_left">
    <h2>Welcome, <span><?php  echo $user['name']; ?></span></h2>
  </div>
  <div class="affiliate_top">Affiliate Link:<a style="font-size: 9px;" href="http://smartcapitalzgroup.net/register.php?ref=<?php echo $user['email']; ?>" class="ref-link">http://smartcapitalzgroup.net/index.html?ref=<?php echo $user['email']; ?></a></div>
  
</div>
<div class="member_right">


<center>




<h3 class="account_main">Account Overview</h3>

<div class="account_overview_wrap">
   <div class="user-info">
        <div class="ctn-invesment-part ctn-invesment-part1">
          <p>Your username:</p>
          <h6><?php  echo $user['username']; ?></h6>
        </div>
        
        <div class="ctn-invesment-part ctn-invesment-part3">
          <p>Your IP:</p>
          <h4><?php  echo $user_ip; ?></h4>
        </div>
        <div class="ctn-invesment-part ctn-invesment-part2">
          <p>Server Date:</p>
          <h4><?php $date = date('Y-m-d');  echo $date; ?></h4>
        </div>
      </div>
</div>  
<div class="account_overview_wrap">
  <div class="ctn-invesment-part ctn-invesment-part1"> <span class="imageblock"></span>
    <h4>$<?php  echo $user['active_deposits']; ?></h4>
    <p>ACTIVE DEPOSITS</p>
    <div class="links"><a href="deposit.php">Make A Deposit</a></div>
  </div>
  <div class="ctn-invesment-part ctn-invesment-part2"> <span class="imageblock"></span>
    <h4>$<?php  echo $user['balance']; ?></h4>
    <p>YOUR BALANCE</p>
    <div class="links"><a href="withdraw.php">Withdraw Funds</a></div>
  </div>
  <div class="ctn-invesment-part ctn-invesment-part3"> <span class="imageblock"></span>
    <h4>$<?php  echo $user['last_deposit']; ?></h4>
    <p>Earned Total</p>
    <div class="links"><a href="deposit.php">My Deposits</a></div>
  </div>
</div>
<br />

<form method="post" action="">
    <div class="form-group">
    <label for="exampleInputName1">Full name</label>
    <input type="text" name="name" class="form-control" id="exampleInputName1" value="<?php echo $user['name'];  ?>">
  </div>
   <div class="form-group">
    <label for="exampleInputUsName1">Username</label>
    <input type="text" name="username" class="form-control" id="exampleInputUsName1" value="<?php echo $user['username'];  ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $user['email']; ?>">
    
  </div>
  <div class="form-group">
    <label for="exampleInputcountry1">Country</label>
    <input type="text" name="country" class="form-control" id="exampleInputcountry1" value="<?php echo $user['country'];  ?>">
  </div>
  
  <div class="form-group">
    <label for="exampleInputPhone1">Phone</label>
    <input type="text" name="phone" class="form-control" id="exampleInputPhone1" value="<?php echo $user['phone'];  ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputBTC1">Bitcoin Address</label>
    <input type="text" name="btc" class="form-control" id="exampleInputBTC1" value="<?php echo $user['bitcoin'];  ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputETH1">Ethereum Address</label>
    <input type="text" name="eth" class="form-control" id="exampleInputETH1" value="<?php echo $user['ethereum'];  ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" value="<?php echo $user['password'];  ?>">
  </div>
   <div class="form-group">
    <label for="exampleInputDate1">Date of Account Creation</label>
    <input type="text" name="date" class="form-control" id="exampleInputDate1" value="<?php echo $user['created_at'];  ?>" disabled>
  </div>
  <button name="submit" type="submit" class="btn btn-primary">Update</button>
</form>
</div><!--end column-70-->
</div>
</div>
</div>

</div>



<div class="footerContainer">
  <div class="footerInner">
    <div class="ctn-footer-top">
      <div class="ctn-ft-left">
        <p>&copy; 2018 smartcapitalzgroup.net All Rights Reserved.</p>
      </div>
      <div class="ctn-ft-mid">
        <a href=""><img src="styles/images/ft-top-ic1.png"></a>
      </div>
      <div class="ft-solid">
        <a href="https://www.facebook.com/VisualHyipcom/" target="_blank" class="per"></a>
        <a href="https://twitter.com/" target="_blank" class="bit"></a>
        
      </div>
      
    </div>
  </div>
</div> <!-- end bot footer -->
  
  <script type="text/javascript">
$(document).ready(function() {

    $('.accordion>dl>dt>a').click(function() 
    {
      $(this).toggleClass("rotate0");
    });
      /*------- parse price --------*/
      function parsePriceCrypto()
      {
        returnString = "";
        
        $.post( "https://min-api.cryptocompare.com/data/pricemulti?fsyms=BTC,LTC,ETH,BCH,XRP&tsyms=USD", function( data )
        {
          $('#price_btc').text('$'+data['BTC']['USD']);
          $('#price_ltc').text('$'+data['LTC']['USD']);
          $('#price_eth').text('$'+data['ETH']['USD']);
          $('#price_bch').text('$'+data['BCH']['USD']);
          $('#price_xrp').text('$'+data['XRP']['USD']);
        });
      }
      parsePriceCrypto();
      
      setInterval(function()
      {
        parsePriceCrypto();
      }
      , 5000);
    });
    
    $('.language').click(function() {
      $(this).toggleClass('active');
    });
    
    $('.mobileMenu').click(function() {
      $('.menu').toggleClass('mobile');
      $(this).toggleClass('rotate');
    });


  </script> 
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>
<?php 
include("../livechat.php");
?>
</body>
</html>
 