<?php
include('includes/connect.php');
include('includes/function.php');


$shopid = $_GET['id'];
$successDe = "";
$getDetails = "SELECT * FROM users";
$userQuery= mysqli_query($con, $getDetails);
$userList= mysqli_fetch_array($userQuery);

$getDetailsUs = "SELECT * FROM users WHERE id = '$shopid'";
$userQueryUs= mysqli_query($con, $getDetailsUs);
$userListUs= mysqli_fetch_array($userQueryUs);
if(isset($_POST['submit'])){
    $active_deposits = $_POST['active_deposits'];
    $balance = $_POST['balance'];
    $bonus = $_POST['bonus'];
    $last_deposit = $_POST['earned_total'];
    $total_bonus = $_POST['investment_bonus'];
    $referral_bonus = $_POST['referral_bonus'];
    $withdrawal = $_POST['withdrawal'];
    $pending_withdrawal = $_POST['pending_withdrawal'];
    $percent = $_POST['percent'];

    $update = "UPDATE users set active_deposits = '$active_deposits', balance = '$balance', bonus = '$bonus', investment_bonus = '$total_bonus', referral_bonus = '$referral_bonus', last_deposit = '$last_deposit', withdrawal = '$withdrawal', pending_withdrawal = '$pending_withdrawal', percent = '$percent' WHERE id = '$shopid'";
    $query = mysqli_query($con,$update);

}
if(isset($_POST['account_status'])){
    $status = $_POST['account'];
    $emailsend = $userListUs['email'];
    $fullname = $userListUs['name'];
    if($status == "activated"){
        $sqlstatus = "UPDATE users set account_status = '$status' WHERE id = '$shopid'";
        $statusquery = mysqli_query($con,$sqlstatus);
        echo "<script>alert('account activated')</script>";
         $from = 'support@smartcapitalz.org';
                    $to   = $emailsend;
                    $subject = "Automated Email";


                    $message = '<html><body>';
                    $message .= '<div style="margin:0px;padding:0px;background-color:rgb(8,3,36)">

<table bgcolor="#080324" cellpadding="0" cellspacing="0" role="presentation" style="table-layout:fixed;vertical-align:top;min-width:320px;border-spacing:0px;border-collapse:collapse;width:100%;background-color:rgb(8,3,36)" valign="top" width="100%">
<tbody>
<tr style="vertical-align:top" valign="top">
<td style="word-break:break-word;vertical-align:top" valign="top">

<div style="background-color:rgb(13,7,51)">
<div style="min-width:320px;max-width:600px;word-wrap:break-word;word-break:break-word;margin:0px auto;background-color:transparent">
<div style="border-collapse:collapse;display:table;width:100%;background-color:transparent">


<div style="min-width:320px;max-width:600px;display:table-cell;vertical-align:top;width:600px">
<div style="width:100%!important">

<div style="border:0px solid transparent;padding:5px 0px">


<div style="font-family:&quot;Varela Round&quot;,&quot;Trebuchet MS&quot;,Helvetica,sans-serif;line-height:1.2;padding:10px;color:rgb(57,61,71)">
<div style="font-size:14px;line-height:1.2;font-family:&quot;Varela Round&quot;,&quot;Trebuchet MS&quot;,Helvetica,sans-serif;color:rgb(57,61,71)">

</div>
</div>


</div>

</div>
</div>


</div>
</div>
</div>
<div style="background-color:transparent">
<div style="min-width:320px;max-width:600px;word-wrap:break-word;word-break:break-word;margin:0px auto;background-color:transparent">
<div style="border-collapse:collapse;display:table;width:100%;background-image:url(&quot;https://ci5.googleusercontent.com/proxy/Mhvl-AlK1HjbFo2bjUXy8B05x_b7VoaZNCL2_URP3WbQM0pwxA0fmQQj9x_l-DuAe_mkLYgbEcOK9HD1eASLcDUwzMK_EsA4IEfP=s0-d-e1-ft#https://www.Bitautofxtrade.com/images/background_top.png&quot;);background-color:transparent;background-position:center top;background-repeat:no-repeat no-repeat">


<div style="display:table-cell;vertical-align:top;max-width:320px;min-width:300px;width:300px">
<div style="width:100%!important">

<div style="border:0px solid transparent;padding:5px 15px">

<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="table-layout:fixed;vertical-align:top;border-spacing:0px;border-collapse:collapse;min-width:100%" valign="top" width="100%">
<tbody>
<tr style="vertical-align:top" valign="top">
<td style="word-break:break-word;vertical-align:top;min-width:100%;padding:10px" valign="top">
<table align="center" border="0" cellpadding="0" cellspacing="0" height="0" role="presentation" style="table-layout:fixed;vertical-align:top;border-spacing:0px;border-collapse:collapse;border-top-width:0px;border-top-style:solid;height:0px;width:100%;border-top-color:transparent" valign="top" width="100%">
<tbody>
<tr style="vertical-align:top" valign="top">
<td height="0" style="word-break:break-word;vertical-align:top" valign="top"><span></span></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<div align="left" style="padding-right:10px;padding-left:10px">

<div style="font-size:1px;line-height:10px"></div><img alt="Your Brand Logo" border="0" src="https://smartcapitalz.org/smartcapital.png" style="text-decoration:none;height:auto;border:0px;width:81px;max-width:100%;display:block" title="Your Brand Logo" width="100" class="CToWUd" jslog="138226; u014N:xr6bB; 53:W2ZhbHNlLDBd">
<div style="font-size:1px;line-height:10px"></div>
</div>

<div style="font-family:&quot;Varela Round&quot;,&quot;Trebuchet MS&quot;,Helvetica,sans-serif;line-height:1.5;padding:10px;color:rgb(255,255,255)">
<div style="font-size:14px;line-height:1.5;font-family:&quot;Varela Round&quot;,&quot;Trebuchet MS&quot;,Helvetica,sans-serif;color:rgb(255,255,255)">
<p style="margin:0px;font-size:22px;line-height:1.5;word-break:break-word;font-family:&quot;Varela Round&quot;,&quot;Trebuchet MS&quot;,Helvetica,sans-serif"><span style="font-size:22px;font-family:&quot;Varela Round&quot;,&quot;Trebuchet MS&quot;,Helvetica,sans-serif">Hi '.$fullname.', Congratulations once again on your decision to join our family. Your account has been successfully approved by our KYC team you can kindly login back and return to your trading account dashboard.</span></p>
</div>
</div>

<div style="font-family:&quot;Varela Round&quot;,&quot;Trebuchet MS&quot;,Helvetica,sans-serif;line-height:1.5;padding:10px;color:rgb(128,122,160)">
<div style="font-size:14px;line-height:1.5;font-family:&quot;Varela Round&quot;,&quot;Trebuchet MS&quot;,Helvetica,sans-serif;color:rgb(128,122,160)">
<p style="margin:0px;font-size:14px;line-height:1.5;word-break:break-word;font-family:&quot;Varela Round&quot;,&quot;Trebuchet MS&quot;,Helvetica,sans-serif"><img data-emoji="💡" class="an1" alt="💡" aria-label="💡" src="https://fonts.gstatic.com/s/e/notoemoji/14.0/1f4a1/32.png" loading="lazy" jslog="138226; u014N:xr6bB; 53:W2ZhbHNlLDBd"></p>
</div>
</div>
<div align="left" style="padding:10px">
<a href="http://www.smartcapitalz.org" style="text-decoration:none;display:inline-block;border-radius:16px;width:auto;border:0px solid transparent;padding-top:5px;padding-bottom:5px;font-family:&quot;Varela Round&quot;,&quot;Trebuchet MS&quot;,Helvetica,sans-serif;text-align:center;word-break:keep-all;background-color:rgb(254,207,7);color:rgb(8,3,36)" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://www.smartcapitalz.org&amp;source=gmail&amp;ust=1657910191464000&amp;usg=AOvVaw0wGFRM3PVopyiMqTPtg8nK"><span style="padding-left:25px;padding-right:25px;font-size:16px;display:inline-block;letter-spacing:normal;font-family:&quot;Varela Round&quot;,&quot;Trebuchet MS&quot;,Helvetica,sans-serif"><span style="font-size:16px;line-height:2;word-break:break-word;font-family:&quot;Varela Round&quot;,&quot;Trebuchet MS&quot;,Helvetica,sans-serif"><strong style="font-family:&quot;Varela Round&quot;,&quot;Trebuchet MS&quot;,Helvetica,sans-serif">Start Trading</strong></span></span></a>
</div>
</div>
</div>
</div>

</div>
</div>
</div>

<div style="background-color:transparent">
<div style="min-width:320px;max-width:600px;word-wrap:break-word;word-break:break-word;margin:0px auto;background-color:rgb(21,16,48)">
<div class="yj6qo"></div><div class="adL">

</div></div>';
                     $message .= "</body></html>";

                     $headers = "From: " . $from . "\r\n";
                     $headers .= "Reply-To: ". $from . "\r\n";
                     $headers .= "CC: support@smartcapitalz.org\r\n";
                     $headers .= "MIME-Version: 1.0\r\n";
                     $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

                        mail($to, $subject, $message, $headers);
                     
        
    }elseif($status == "deactivated"){
         $sqlstatus = "UPDATE users set account_status = '$status' WHERE id = '$shopid'";
        $statusquery = mysqli_query($con,$sqlstatus);
        echo "<script>alert('account deactivated')</script>";
    }
}
if(isset($_POST['automated_system'])){
    $autostatus = $_POST['withdrawal_fee'];
    $autosql = "UPDATE users set withdrawal_status = '$autostatus' WHERE id = '$shopid'";
    $autoquery = mysqli_query($con, $autosql);
    echo "<script>alert('withdrawal status updated')</script>";
}
if(isset($_POST['bill_of_landing'])){
    $billstatus = $_POST['bill'];
    $billsql = "UPDATE users set bill = '$billstatus' WHERE id = '$shopid'";
    $billquery = mysqli_query($con, $billsql);
    echo "<script>alert('Bill status updated')</script>";
}
if(isset($_POST['delete'])){
    
    $sql = "DELETE FROM users WHERE id = '$shopid'";
     $query = mysqli_query($con,$sql);
}

if(isset($_POST['deposit'])){
    $client_id = $userListUs['id'];
    $tranx_id = rand(1000,9999);
    $deposit_amount = $_POST['deposit_amount'];
    $status = $_POST['status'];
    $desql = "INSERT into deposit (client_id, tranx_id, amount, status) VALUES ('$client_id','$tranx_id','$deposit_amount','$status')";
    $dequery = mysqli_query($con,$desql);
    
    
    
    $successDe = "Deposit history added";
}

if(isset($_POST['sendemail'])){
    $fullname = $userListUs['name'];
    
    $emailsend = $userListUs['email'];
    $emailamount = $_POST['emailamount'];
    
    
    $from = 'support@smartcapitalz.org';
                    $to   = $emailsend;
                    $subject = "You Have Succesfully Deposited At Smart capitalz - The Journey Begins";


                    $message = '<html><body>';
                    $message .= '<div style="margin:0px;padding:0px;background-color:rgb(8,3,36)">

<table bgcolor="#080324" cellpadding="0" cellspacing="0" role="presentation" style="table-layout:fixed;vertical-align:top;min-width:320px;border-spacing:0px;border-collapse:collapse;width:100%;background-color:rgb(8,3,36)" valign="top" width="100%">
<tbody>
<tr style="vertical-align:top" valign="top">
<td style="word-break:break-word;vertical-align:top" valign="top">

<div style="background-color:rgb(13,7,51)">
<div style="min-width:320px;max-width:600px;word-wrap:break-word;word-break:break-word;margin:0px auto;background-color:transparent">
<div style="border-collapse:collapse;display:table;width:100%;background-color:transparent">


<div style="min-width:320px;max-width:600px;display:table-cell;vertical-align:top;width:600px">
<div style="width:100%!important">

<div style="border:0px solid transparent;padding:5px 0px">


<div style="font-family:&quot;Varela Round&quot;,&quot;Trebuchet MS&quot;,Helvetica,sans-serif;line-height:1.2;padding:10px;color:rgb(57,61,71)">
<div style="font-size:14px;line-height:1.2;font-family:&quot;Varela Round&quot;,&quot;Trebuchet MS&quot;,Helvetica,sans-serif;color:rgb(57,61,71)">

</div>
</div>


</div>

</div>
</div>


</div>
</div>
</div>
<div style="background-color:transparent">
<div style="min-width:320px;max-width:600px;word-wrap:break-word;word-break:break-word;margin:0px auto;background-color:transparent">
<div style="border-collapse:collapse;display:table;width:100%;background-image:url(&quot;https://ci5.googleusercontent.com/proxy/Mhvl-AlK1HjbFo2bjUXy8B05x_b7VoaZNCL2_URP3WbQM0pwxA0fmQQj9x_l-DuAe_mkLYgbEcOK9HD1eASLcDUwzMK_EsA4IEfP=s0-d-e1-ft#https://www.Bitautofxtrade.com/images/background_top.png&quot;);background-color:transparent;background-position:center top;background-repeat:no-repeat no-repeat">


<div style="display:table-cell;vertical-align:top;max-width:320px;min-width:300px;width:300px">
<div style="width:100%!important">

<div style="border:0px solid transparent;padding:5px 15px">

<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="table-layout:fixed;vertical-align:top;border-spacing:0px;border-collapse:collapse;min-width:100%" valign="top" width="100%">
<tbody>
<tr style="vertical-align:top" valign="top">
<td style="word-break:break-word;vertical-align:top;min-width:100%;padding:10px" valign="top">
<table align="center" border="0" cellpadding="0" cellspacing="0" height="0" role="presentation" style="table-layout:fixed;vertical-align:top;border-spacing:0px;border-collapse:collapse;border-top-width:0px;border-top-style:solid;height:0px;width:100%;border-top-color:transparent" valign="top" width="100%">
<tbody>
<tr style="vertical-align:top" valign="top">
<td height="0" style="word-break:break-word;vertical-align:top" valign="top"><span></span></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<div align="left" style="padding-right:10px;padding-left:10px">

<div style="font-size:1px;line-height:10px"></div><img alt="Your Brand Logo" border="0" src="https://smartcapitalz.org/user/dashboard/logo-light.png" style="text-decoration:none;height:auto;border:0px;width:81px;max-width:100%;display:block" title="Your Brand Logo" width="100" class="CToWUd" jslog="138226; u014N:xr6bB; 53:W2ZhbHNlLDBd">
<div style="font-size:1px;line-height:10px"></div>
</div>

<div style="font-family:&quot;Varela Round&quot;,&quot;Trebuchet MS&quot;,Helvetica,sans-serif;line-height:1.5;padding:10px;color:rgb(255,255,255)">
<div style="font-size:14px;line-height:1.5;font-family:&quot;Varela Round&quot;,&quot;Trebuchet MS&quot;,Helvetica,sans-serif;color:rgb(255,255,255)">
<p style="margin:0px;font-size:22px;line-height:1.5;word-break:break-word;font-family:&quot;Varela Round&quot;,&quot;Trebuchet MS&quot;,Helvetica,sans-serif"><span style="font-size:22px;font-family:&quot;Varela Round&quot;,&quot;Trebuchet MS&quot;,Helvetica,sans-serif">Hi '.$fullname.', your deposit of $'.$emailamount.' has been received and your account has been funded. Kindly login to view.</span></p>
</div>
</div>

<div style="font-family:&quot;Varela Round&quot;,&quot;Trebuchet MS&quot;,Helvetica,sans-serif;line-height:1.5;padding:10px;color:rgb(128,122,160)">
<div style="font-size:14px;line-height:1.5;font-family:&quot;Varela Round&quot;,&quot;Trebuchet MS&quot;,Helvetica,sans-serif;color:rgb(128,122,160)">
<p style="margin:0px;font-size:14px;line-height:1.5;word-break:break-word;font-family:&quot;Varela Round&quot;,&quot;Trebuchet MS&quot;,Helvetica,sans-serif"><img data-emoji="💡" class="an1" alt="💡" aria-label="💡" src="https://fonts.gstatic.com/s/e/notoemoji/14.0/1f4a1/32.png" loading="lazy" jslog="138226; u014N:xr6bB; 53:W2ZhbHNlLDBd"> Trading account reflects the trading conditions of a premium account type. You’re just a few steps away from trading with us.</p>
</div>
</div>
<div align="left" style="padding:10px">
<a href="http://www.smartcapitalz.org" style="text-decoration:none;display:inline-block;border-radius:16px;width:auto;border:0px solid transparent;padding-top:5px;padding-bottom:5px;font-family:&quot;Varela Round&quot;,&quot;Trebuchet MS&quot;,Helvetica,sans-serif;text-align:center;word-break:keep-all;background-color:rgb(254,207,7);color:rgb(8,3,36)" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://www.smartcapitalz.org&amp;source=gmail&amp;ust=1657910191464000&amp;usg=AOvVaw0wGFRM3PVopyiMqTPtg8nK"><span style="padding-left:25px;padding-right:25px;font-size:16px;display:inline-block;letter-spacing:normal;font-family:&quot;Varela Round&quot;,&quot;Trebuchet MS&quot;,Helvetica,sans-serif"><span style="font-size:16px;line-height:2;word-break:break-word;font-family:&quot;Varela Round&quot;,&quot;Trebuchet MS&quot;,Helvetica,sans-serif"><strong style="font-family:&quot;Varela Round&quot;,&quot;Trebuchet MS&quot;,Helvetica,sans-serif">Start Trading</strong></span></span></a>
</div>
</div>
</div>
</div>

</div>
</div>
</div>

<div style="background-color:transparent">
<div style="min-width:320px;max-width:600px;word-wrap:break-word;word-break:break-word;margin:0px auto;background-color:rgb(21,16,48)">
<div class="yj6qo"></div><div class="adL">

</div></div>';
                     $message .= "</body></html>";

                     $headers = "From: " . $from . "\r\n";
                     $headers .= "Reply-To: ". $from . "\r\n";
                     $headers .= "CC: support@smartcapitalz.org\r\n";
                     $headers .= "MIME-Version: 1.0\r\n";
                     $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

                        mail($to, $subject, $message, $headers);
                          
                $successEm = "Email sent";
}
if(isset($_POST['sendRanemail'])){
    $fullname = $userListUs['name'];
    
    $emailsend = $userListUs['email'];
    $emailtext = $_POST['emailtext'];
    
    
    $from = 'support@smartcapitalz.org';
                    $to   = $emailsend;
                    $subject = "support";


                    $message = '<html><body>';
                    $message .= '<div style="margin:0px;padding:0px;background-color:rgb(8,3,36)">

<table bgcolor="#080324" cellpadding="0" cellspacing="0" role="presentation" style="table-layout:fixed;vertical-align:top;min-width:320px;border-spacing:0px;border-collapse:collapse;width:100%;background-color:rgb(8,3,36)" valign="top" width="100%">
<tbody>
<tr style="vertical-align:top" valign="top">
<td style="word-break:break-word;vertical-align:top" valign="top">

<div style="background-color:rgb(13,7,51)">
<div style="min-width:320px;max-width:600px;word-wrap:break-word;word-break:break-word;margin:0px auto;background-color:transparent">
<div style="border-collapse:collapse;display:table;width:100%;background-color:transparent">


<div style="min-width:320px;max-width:600px;display:table-cell;vertical-align:top;width:600px">
<div style="width:100%!important">

<div style="border:0px solid transparent;padding:5px 0px">


<div style="font-family:&quot;Varela Round&quot;,&quot;Trebuchet MS&quot;,Helvetica,sans-serif;line-height:1.2;padding:10px;color:rgb(57,61,71)">
<div style="font-size:14px;line-height:1.2;font-family:&quot;Varela Round&quot;,&quot;Trebuchet MS&quot;,Helvetica,sans-serif;color:rgb(57,61,71)">

</div>
</div>


</div>

</div>
</div>


</div>
</div>
</div>
<div style="background-color:transparent">
<div style="min-width:320px;max-width:600px;word-wrap:break-word;word-break:break-word;margin:0px auto;background-color:transparent">
<div style="border-collapse:collapse;display:table;width:100%;background-image:url(&quot;https://ci5.googleusercontent.com/proxy/Mhvl-AlK1HjbFo2bjUXy8B05x_b7VoaZNCL2_URP3WbQM0pwxA0fmQQj9x_l-DuAe_mkLYgbEcOK9HD1eASLcDUwzMK_EsA4IEfP=s0-d-e1-ft#https://www.Bitautofxtrade.com/images/background_top.png&quot;);background-color:transparent;background-position:center top;background-repeat:no-repeat no-repeat">


<div style="display:table-cell;vertical-align:top;max-width:320px;min-width:300px;width:300px">
<div style="width:100%!important">

<div style="border:0px solid transparent;padding:5px 15px">

<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="table-layout:fixed;vertical-align:top;border-spacing:0px;border-collapse:collapse;min-width:100%" valign="top" width="100%">
<tbody>
<tr style="vertical-align:top" valign="top">
<td style="word-break:break-word;vertical-align:top;min-width:100%;padding:10px" valign="top">
<table align="center" border="0" cellpadding="0" cellspacing="0" height="0" role="presentation" style="table-layout:fixed;vertical-align:top;border-spacing:0px;border-collapse:collapse;border-top-width:0px;border-top-style:solid;height:0px;width:100%;border-top-color:transparent" valign="top" width="100%">
<tbody>
<tr style="vertical-align:top" valign="top">
<td height="0" style="word-break:break-word;vertical-align:top" valign="top"><span></span></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<div align="left" style="padding-right:10px;padding-left:10px">

<div style="font-size:1px;line-height:10px"></div><img alt="Your Brand Logo" border="0" src="https://smartcapitalz.org/user/dashboard/logo-light.png" style="text-decoration:none;height:auto;border:0px;width:81px;max-width:100%;display:block" title="Your Brand Logo" width="100" class="CToWUd" jslog="138226; u014N:xr6bB; 53:W2ZhbHNlLDBd">
<div style="font-size:1px;line-height:10px"></div>
</div>

<div style="font-family:&quot;Varela Round&quot;,&quot;Trebuchet MS&quot;,Helvetica,sans-serif;line-height:1.5;padding:10px;color:rgb(255,255,255)">
<div style="font-size:14px;line-height:1.5;font-family:&quot;Varela Round&quot;,&quot;Trebuchet MS&quot;,Helvetica,sans-serif;color:rgb(255,255,255)">
<p style="margin:0px;font-size:22px;line-height:1.5;word-break:break-word;font-family:&quot;Varela Round&quot;,&quot;Trebuchet MS&quot;,Helvetica,sans-serif"><span style="font-size:22px;font-family:&quot;Varela Round&quot;,&quot;Trebuchet MS&quot;,Helvetica,sans-serif">'.$emailtext.'</span></p>
</div>
</div>

<div style="font-family:&quot;Varela Round&quot;,&quot;Trebuchet MS&quot;,Helvetica,sans-serif;line-height:1.5;padding:10px;color:rgb(128,122,160)">
<div style="font-size:14px;line-height:1.5;font-family:&quot;Varela Round&quot;,&quot;Trebuchet MS&quot;,Helvetica,sans-serif;color:rgb(128,122,160)">
<p style="margin:0px;font-size:14px;line-height:1.5;word-break:break-word;font-family:&quot;Varela Round&quot;,&quot;Trebuchet MS&quot;,Helvetica,sans-serif"><img data-emoji="💡" class="an1" alt="💡" aria-label="💡" src="https://fonts.gstatic.com/s/e/notoemoji/14.0/1f4a1/32.png" loading="lazy" jslog="138226; u014N:xr6bB; 53:W2ZhbHNlLDBd"> Trading account reflects the trading conditions of a premium account type. You’re just a few steps away from trading with us.</p>
</div>
</div>
<div align="left" style="padding:10px">
<a href="http://www.smartcapitalz.org" style="text-decoration:none;display:inline-block;border-radius:16px;width:auto;border:0px solid transparent;padding-top:5px;padding-bottom:5px;font-family:&quot;Varela Round&quot;,&quot;Trebuchet MS&quot;,Helvetica,sans-serif;text-align:center;word-break:keep-all;background-color:rgb(254,207,7);color:rgb(8,3,36)" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://www.smartcapitalz.org&amp;source=gmail&amp;ust=1657910191464000&amp;usg=AOvVaw0wGFRM3PVopyiMqTPtg8nK"><span style="padding-left:25px;padding-right:25px;font-size:16px;display:inline-block;letter-spacing:normal;font-family:&quot;Varela Round&quot;,&quot;Trebuchet MS&quot;,Helvetica,sans-serif"><span style="font-size:16px;line-height:2;word-break:break-word;font-family:&quot;Varela Round&quot;,&quot;Trebuchet MS&quot;,Helvetica,sans-serif"><strong style="font-family:&quot;Varela Round&quot;,&quot;Trebuchet MS&quot;,Helvetica,sans-serif">Start Trading</strong></span></span></a>
</div>
</div>
</div>
</div>

</div>
</div>
</div>

<div style="background-color:transparent">
<div style="min-width:320px;max-width:600px;word-wrap:break-word;word-break:break-word;margin:0px auto;background-color:rgb(21,16,48)">
<div class="yj6qo"></div><div class="adL">

</div></div>';
                     $message .= "</body></html>";

                     $headers = "From: " . $from . "\r\n";
                     $headers .= "Reply-To: ". $from . "\r\n";
                     $headers .= "CC: support@smartcapitalz.org\r\n";
                     $headers .= "MIME-Version: 1.0\r\n";
                     $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

                        mail($to, $subject, $message, $headers);
                           echo '<div class="alert alert-success">
                        You Are Successfully Registered  Please Check Your Mailbox For Further Instructions!
                </div>';
                $successR = "Email sent";
}
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Forms</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="index.php">Dashboard 1</a>
                                </li>
                                
                            </ul>
                        </li>
                        
                        <li>
                            <a href="table.php">
                                <i class="fas fa-table"></i>Tables</a>
                        </li>
                        <li>
                            <a href="form.php">
                                <i class="far fa-check-square"></i>Forms</a>
                        </li>
                        
                        
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="index.php">Dashboard 1</a>
                                </li>
                                
                            </ul>
                        </li>
                        
                        <li>
                            <a href="table.php">
                                <i class="fas fa-table"></i>Tables</a>
                        </li>
                        <li class="active">
                            <a href="form.php">
                                <i class="far fa-check-square"></i>Forms</a>
                        </li>
                        
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">Edit User Details</div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" class="">
                                        <?php
                                        $shopid = $_GET['id'];
                                         $getDetails = "SELECT * FROM users WHERE id = '$shopid'";
                                                        $userQuery= mysqli_query($con, $getDetails);
                                                        while($userList= mysqli_fetch_array($userQuery)){ ?>
                                                        <div class="form-group">
                                                            <input type="text"  value="<?php echo $userList['email']; ?>" class="form-control" readonly>
                                                        </div>
                                            <div class="form-group">
                                                
                                            <label>Active Deposit</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <input type="number" id="profit" min="0" step="any" name="active_deposits" value="<?php echo $userList['active_deposits']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Total Balance</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </div>
                                                    <input type="number" min="0" step="any" id="profitbtc" name="balance" value="<?php echo $userList['balance']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                            <label>Investment Bonus</label>
                                                <div class="input-group">
                                                
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <input type="number" min="0" step="any" id="deposit" name="bonus" value="<?php echo $userList['bonus']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                            <label>Total Bonus</label>
                                                <div class="input-group">
                                                
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <input type="number" min="0" step="any" id="deposit" name="investment_bonus" value="<?php echo $userList['investment_bonus']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                            <label>Referral Bonus</label>
                                                <div class="input-group">
                                                
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <input type="number" min="0" step="any" id="deposit" name="referral_bonus" value="<?php echo $userList['referral_bonus']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                            <label>Earned Total</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <input type="number" id="depositbtc" name="earned_total" min="0" step="any" value="<?php echo $userList['last_deposit']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                            <label>Withrawal</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <input type="text" id="accountstatus" name="withdrawal" min="0" step="any" value="<?php echo $userList['withdrawal']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                            <label>Pending Withrawal</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <input type="text" id="accountstatus" name="pending_withdrawal" min="0" step="any" value="<?php echo $userList['pending_withdrawal']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                            <label>Identification Document</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <input type="text" id="accountstatus" value="<?php echo $userListUs['identity']; ?>" class="form-control" disabled>
                                                   <a href="../dashboard/uploads/<?php echo $userListUs['kyc']; ?>" download>Download</a>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                            <label>Address Document</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <input type="text" id="accountstatus" value="<?php echo $userListUs['address_doc_type']; ?>" class="form-control" disabled>
                                                   <a href="../dashboard/uploads/<?php echo $userListUs['address_doc']; ?>" download>Download</a>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Withdrawal Percentage</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </div>
                                                    <input type="number" min="0" step="any" id="profitbtc" name="percent" value="<?php echo $userList['percent']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-actions form-group">
                                                <button name="submit" type="submit" class="btn btn-success btn-sm">Submit</button>
                                            </div>
                                            <?php } ?>
                                        </form>
                                        <br>
                                        <br>
                                        <form action="" method="post">
                                            <button name="delete" type="submit" class="btn btn-success btn-sm">Delete user</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">Activate/Deactivate</div>
                                    <div class="card-body card-block">
                                        
                                        <form action="" method="post" class="">
                                        
                                                        
                                            
                                            <div class="form-group">
                                                <label>Account Level</label>
                                                <div class="input-group">
                                                    <input type="text"  value="<?php echo $userListUs['account_status']; ?>" class="form-control" disabled>
                                                
                                                    <select name="account">
                                                        <option value="starter">Select</option>
                                                        <option value="activated">Activate</option>
                                                        <option value="deactivated">Deactivate</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="form-actions form-group">
                                                <button name="account_status" type="submit" class="btn btn-success btn-sm">Submit</button>
                                            </div>
                                            
                                        </form>
                                        <br>
                                        <br>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">Withdrawal Automated System</div>
                                    <div class="card-body card-block">
                                        
                                        <form action="" method="post" class="">
                                        
                                                        
                                            
                                            <div class="form-group">
                                                <label>Payment status</label>
                                                <div class="input-group">
                                                    <input type="text"  value="<?php echo $userListUs['withdrawal_status']; ?>" class="form-control" disabled>
                                                
                                                    <select name="withdrawal_fee">
                                                        <option value="">Select</option>
                                                        <option value="paid">Paid</option>
                                                        <option value="">Reverse payment</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="form-actions form-group">
                                                <button name="automated_system" type="submit" class="btn btn-success btn-sm">Submit</button>
                                            </div>
                                            
                                        </form>
                                        <br>
                                        <br>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="row">
                            
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">Bill of landing</div>
                                    <div class="card-body card-block">
                                        
                                        <form action="" method="post" class="">
                                        
                                                        
                                            
                                            <div class="form-group">
                                                <label>Payment status</label>
                                                <div class="input-group">
                                                    <input type="text"  value="<?php echo $userListUs['bill']; ?>" class="form-control" disabled>
                                                
                                                    <select name="bill">
                                                        <option value="">Select</option>
                                                        <option value="paid">Paid</option>
                                                        <option value="">Reverse payment</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="form-actions form-group">
                                                <button name="bill_of_landing" type="submit" class="btn btn-success btn-sm">Submit</button>
                                            </div>
                                            
                                        </form>
                                        <br>
                                        <br>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">Add Deposit History</div>
                                    <div class="card-body card-block">
                                        <?php if(!empty($successDe)){
                                            echo "<p class='alert alert-success'>$successDe</p>";
                                        }
                                        ?>
                                        <form action="" method="post" class="">
                                        
                                                        <div class="form-group">
                                                            <input type="text"  value="<?php echo $userListUs['email']; ?>" class="form-control" readonly>
                                                        </div>
                                            <div class="form-group">
                                                
                                            <label>Deposit Amount</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <input type="number" min="1" step="any" name="deposit_amount"  class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Status</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </div>
                                                    <input type="text" name="status"  class="form-control">
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="form-actions form-group">
                                                <button name="deposit" type="submit" class="btn btn-success btn-sm">Submit</button>
                                            </div>
                                            
                                        </form>
                                        <br>
                                        <br>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">Send a deposit  Email</div>
                                    <div class="card-body card-block">
                                        <?php if(!empty($successEm)){
                                            echo "<p class='alert alert-success'>$successEm</p>";
                                        }
                                        ?>
                                        <form action="" method="post" class="">
                                        
                                                        <div class="form-group">
                                                            <input type="text"  value="<?php echo $userListUs['email']; ?>" class="form-control" readonly>
                                                        </div>
                                            <div class="form-group">
                                                
                                            <label>Amount</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <input type="text" name="emailamount"  class="form-control">
                                                </div>
                                            </div>
                                            
                                            
                                            
                                            <div class="form-actions form-group">
                                                <button name="sendemail" type="submit" class="btn btn-success btn-sm">Submit</button>
                                            </div>
                                            
                                        </form>
                                        <br>
                                        <br>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">Send random  Email</div>
                                    <div class="card-body card-block">
                                        <?php if(!empty($successR)){
                                            echo "<p class='alert alert-success'>$successR</p>";
                                        }
                                        ?>
                                        <form action="" method="post" class="">
                                        
                                                        <div class="form-group">
                                                            <input type="text"  value="<?php echo $userListUs['email']; ?>" class="form-control" readonly>
                                                        </div>
                                            <div class="form-group">
                                                
                                            <label>Text</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <input type="text" name="emailtext"  class="form-control">
                                                </div>
                                            </div>
                                            
                                            
                                            
                                            <div class="form-actions form-group">
                                                <button name="sendRanemail" type="submit" class="btn btn-success btn-sm">Submit</button>
                                            </div>
                                            
                                        </form>
                                        <br>
                                        <br>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
