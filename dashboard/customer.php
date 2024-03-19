<?php
include "connection.php";
session_start();
ob_start();
if (!isset($_SESSION['email'])) {
    header('location: ../login.php');

}

$email = $_SESSION['email'];
$sql = "SELECT * FROM users WHERE email = '$email'";
$query = mysqli_query($con, $sql);
$user = mysqli_fetch_assoc($query);
if ($user['account_status'] !== "activated") {
    header('location: review.php');

}
function getUserIP()
{
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
        $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote = $_SERVER['REMOTE_ADDR'];

    if (filter_var($client, FILTER_VALIDATE_IP)) {
        $ip = $client;
    } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
        $ip = $forward;
    } else {
        $ip = $remote;
    }

    return $ip;
}

$user_ip = getUserIP();

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

<body class="loginarea" style="backgrond-color: #371552;">
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

<div style="backgrond-color: #371552;" class="inside_inner_account">
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
  <div class="affiliate_top">Affiliate Link:<input style="font-size: 9px;" class="ref-link" value="http://smartcapitalztradingpip.com/register.php?ref=<?php echo $user['email']; ?>"></div>

</div>
<div class="member_right">


<center>
<?php if (empty($user['kyc'])) {?>

<div><span class="alert alert-danger">you're yet to start your kyc verification, please click <a href="verify-kyc.php">here</a> to do so</span></div>
<?php }?>

<h3 class="account_main">Account Overview</h3>

<div class="account_overview_wrap">
   <div class="user-info">
        <div class="ctn-invesment-part ctn-invesment-part1">
          <p>Your username:</p>
          <h6><?php echo $user['username']; ?></h6>
        </div>
        <div class="ctn-invesment-part ctn-invesment-part3">
          <p>Your IP:</p>
          <h4><?php echo $user_ip; ?></h4>
        </div>
        <div class="ctn-invesment-part ctn-invesment-part2">
          <p>Server Date:</p>
          <h4><?php $date = date('Y-m-d');
echo $date;?></h4>
        </div>

      </div>
</div>
<div class="account_overview_wrap">
  <div class="ctn-invesment-part ctn-invesment-part1"> <span class="imageblock"></span>
    <h4>$<?php echo $user['active_deposits']; ?></h4>
    <p>ACTIVE DEPOSITS</p>
    <div class="links"><a href="deposit.php">Make A Deposit</a></div>
  </div>
  <div class="ctn-invesment-part ctn-invesment-part2"> <span class="imageblock"></span>
    <h4>$<?php echo $user['balance']; ?></h4>
    <p>YOUR BALANCE</p>
    <div class="links"><a href="withdraw.php">Withdraw Funds</a></div>
  </div>
  <div class="ctn-invesment-part ctn-invesment-part3"> <span class="imageblock"></span>
    <h4>$<?php echo $user['last_deposit']; ?></h4>
    <p>Earned Total</p>
    <div class="links"><a href="deposit.php">My Deposits</a></div>
  </div>
</div>
<br />
<h3 class="account_main">Your Deposits/Withdrawals</h3>
<div class="account_stat">
  <div class="contentLeft">
    <div class="ctn-inves-row invers-part5">
      <p>$<?php echo $user['bonus']; ?></p>
      <h1>Investment Bonus</h1>
    </div>

    <div class="ctn-inves-row invers-part6">
      <p>$<?php echo $user['investment_bonus']; ?></p>
      <h1>Total Bonus</h1>
    </div>
    <div class="ctn-inves-row invers-part7">
      <p>$<?php echo $user['referral_bonus']; ?></p>
      <h1>Referral Bonus</h1>
    </div>
    <div class="ctn-inves-row invers-part9">
      <p>$<?php echo $user['withdrawal']; ?></p>
      <h1>Total Withdrawal</h1>
    </div>
    <div class="ctn-inves-row invers-part10">
      <p>$<?php echo $user['pending_withdrawal']; ?></p>
      <h1>Pending Withdrawal</h1>
    </div>
  </div>
</div>

</div><!--end column-70-->
</div>
</div>
</div>

</div>

    <div class="clearfix"></div>


<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div id="tradingview_f933e"></div>
  <div class="tradingview-widget-copyright"><a href="#" rel="noopener" target="_blank"><span class="blue-text"></span> </a></div>
  <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
  <script type="text/javascript">
  new TradingView.widget(
  {
  "width": 850,
  "height": 500,
  "symbol": "BITFINEX:BTCUSD",
  "interval": "1",
  "timezone": "Etc/UTC",
  "theme": "Dark",
  "style": "9",
  "locale": "en",
  "toolbar_bg": "#f1f3f6",
  "enable_publishing": false,
  "hide_side_toolbar": false,
  "allow_symbol_change": true,
  "calendar": true,
  "studies": [
    "BB@tv-basicstudies"
  ],
  "container_id": "tradingview_f933e"
}
  );
  </script>
</div>
<!-- TradingView Widget END -->
<br><br>
<div style="display:flex; justify-content:center;">
<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>

  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-forex-cross-rates.js" async>
  {
  "width": 850,
  "height": 400,
  "currencies": [
    "EUR",
    "USD",
    "JPY",
    "GBP",
    "CHF",
    "AUD",
    "CAD",
    "NZD",
    "CNY"
  ],
  "isTransparent": false,
  "colorTheme": "dark",
  "locale": "en"
}
  </script>
</div>
</div>
<!-- TradingView Widget END -->
<br><br>
<div style="display:flex; justify-content:center;">
<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>

  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
  {
  "interval": "1m",
  "width": 850,
  "isTransparent": false,
  "height": 550,
  "symbol": "NASDAQ:AAPL",
  "showIntervalTabs": true,
  "locale": "en",
  "colorTheme": "dark"
}
  </script>
</div>
<!-- TradingView Widget END -->

</div>
<div class="contentBotContainer">
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
        <p>&copy; 2018 smartcapitalz.org All Rights Reserved.</p>
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
include "../livechat.php";
?>
<!-- WhatsHelp.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "+12136492095",
            text: "Hello, how may we help you? Just send us a message now to get assistance.",
            abid:"+12136492095",// WhatsApp number

            call_to_action: "Message us", // Call to action
            position: "left", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /WhatsHelp.io widget --></body>
</html>
