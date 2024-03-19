<?php
include "connection.php";
session_start();
ob_start();
if (!isset($_SESSION['email'])) {
    header('location: ../login.php');

}
;
$email = $_SESSION['email'];
$sql = "SELECT * FROM users WHERE email = '$email'";
$query = mysqli_query($con, $sql);
$user = mysqli_fetch_assoc($query);
$userid = $user['id'];
$email = $user['email'];
$status = "pending";
$tranx_id = rand(1000, 9999);
$depo = "INSERT into deposit (client_id,tranx_id,email,amount,status) VALUES ('$userid','$tranx_id','$email','','$status')";
mysqli_query($con, $depo);

?>












<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
<body class="loginarea" style="zoom: 1;">
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
    <h2>Welcome, <span><?php echo $user['name']; ?></span></h2>
  </div>
   <div class="affiliate_top">Affiliate Link:<a style="font-size: 9px;" href="http://smartcapitalztradingpip.com/register.php?ref=<?php echo $user['email']; ?>" class="ref-link">http://smartcapitalztradingpip.com/index.html?ref=<?php echo $user['email']; ?></a></div>

</div>
<div class="member_right">



<div style="position:relative; left:2%;">
<br><br><font color="white" size="5">
<!--    <marquee>bc1qy0cyjuhk3hxjj4lt4fgkhp2vaega0dnpw27wml-->
<!--</marquee>-->
</font><br><br><br><br>
<br><br><font color="black" size="5"><?php echo "deposit your funds to the bitcoin wallet address above:"; ?>

<br>

</div>
</div><!--end column-70-->
</div>
</div>
</div>

</div><div class="contentBotContainer">
  <div class="contentBotInner">
    <div class="ctn-top-solid">
      <h1>btc network </h1>
      <h2> wallets: </h2>
      <div class="solid-top">
      <a href="https://www.coinbase.com/" class="solidTop1"></a>
      <a href="https://blockchain.info/" class="solidTop2"></a>
      <a href="https://xapo.com/" class="solidTop3"></a>
      <a href="https://airbitz.co/" class="solidTop4"></a>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="ctn-bot-solid">
      <p>Market Cap: <span>$77829716960.00</span></p>
      <p>Hashrate: <span>7108353254.76</span></p>
      <p>Difficulty: <span>888171856257</span></p>
      <p>Total Blocks: <span>482882</span> </p>
      <p>Network Speed: <span>108.5 PH/s</span></p>
    </div>
  </div>
</div>


<div class="footerContainer">
  <div class="footerInner">
    <div class="ctn-footer-top">
      <div class="ctn-ft-left">
        <p>&copy; 2018 smartcapitalztradingpip.com All Rights Reserved.</p>
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
<?php
include "../livechat.php";
?>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

</body>
</html>