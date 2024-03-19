<?php

include "dashboard/connection.php";
ob_start();
session_start();
if (!empty($_GET['ref'])) {
    $ref = $_GET['ref'];
} else {
    $ref = "";
}
$one = rand(0, 9);
$two = rand(0, 9);
$three = rand(0, 9);
$four = rand(0, 9);
$code = $one . $two . $three . $four;
$_SESSION['code'] = $code;
if (isset($_POST['submit'])) {
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
    $emailcheck = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($con, $emailcheck);
    if (mysqli_num_rows($result)) {

        echo "<script>alert('email already exists')</script>";

    } elseif ($password !== $cpassword) {
        echo "<script>alert('passwords do not match')</script>";

    } elseif ($_SESSION['code'] !== $_POST['code']) {
        echo $_SESSION['code'] . " " . $_POST['code'];
    } else {
        $sql = "INSERT into users (name, username, email, country, bitcoin, ethereum, phone, referral, question, answer, password, ssn) VALUES ('$fullname','$username','$email','$country','$bitcoin','$ethereum','$phone','$ref','$question','$answer','$password','$ssn')";
        $query = mysqli_query($con, $sql);

        $from = 'support@smartcapitalztradingpip.com';
        $to = $email;
        $subject = "You Have Succesfully Registered At smartcapitalztradingpip.com - The Journey Begins";

        $message = '<html><body>';
        $message .= '<div style="background-color: blue; color: white;"><h3 style="color: white;">Mail From smartcapitalzgroup - Thanks for Signing Up</h3></div><div style="background-color: white; color: black;">';
        $message .= '<hr/>';
        $message .= '<h5>Note : the details in this email should not be disclosed to anyone</<h5><br>';
        $message .= '<h5>Dear<br/>';
        $message .= $firstname;
        $message .= '<hr/><br/>Thanks  For Signing Up at smartcapitalzgroup the most convinient way to invest in crypto and much more.., we look forward to making your financial goals come true and offering a long term of service to you.</h5>';

        $message .= '<h5>Regarding  What To Do Next Please Login To Your Account <br/><ul><li>And Send Your Valid Identity Documents To support@smartcapitalztradingpip.com To Fully Verify Your Account</li><li>Fund Your Account To Fully Activate Your Account</ul></h5>';
        $message .= '<h5>You Will Be Contacted With More Information By The Admins<br/>Note : This Is An Automated Email</h5>';
        $message .= '<a href="http://smartcapitalztradingpip.com/login.php"><h4 style="color: blue;">Verify your account<h4></a>';
        $message .= '</div><hr/>';
        $message .= '<div style="background-color: blue; color: white;"><h3 style="color: white;">smartcapitalztradingpip.com<sup>TM</sup> - Phone : +17868293117</h3>';
        $message .= '</div>';
        $message .= "</body></html>";

        $headers = "From: " . $from . "\r\n";
        $headers .= "Reply-To: " . $from . "\r\n";
        $headers .= "CC: support@smartcapitalztradingpip.com\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        mail($to, $subject, $message, $headers);
        echo '<div class="alert alert-success">
                        You Are Successfully Registered  Please Check Your Mailbox For Further Instructions!
                </div>';
        echo "<script>alert('registration successful')</script>";
        header("refresh: 1; url=login.html?log=yes");
    }
}

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Mirrored from smartcapitalzgroup.com/register by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Aug 2022 22:21:19 GMT -->
    <!-- Added by HTTrack -->
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="With smartcapitalzgroup your money works for you!">
    <meta name="keywords"
        content="smartcapitalzgroup, smartcapitalztradingpip.com, ethereum invesment, bitcoin investment, stock investment, smartcapitalztradingpip.com">
    <link href="images/smartcapitalz.png" rel="icon">
    <title>smartcapitalztradingpip.com Investment | Login</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/ruang-admin.min.css" rel="stylesheet">
<style>
    .custom-recaptcha {
    text-align: center;
    background-color: #f4f4f4;
    border: 2px solid #007bff;
    border-radius: 8px;
    padding: 10px;
    margin-top: 10px;
  }

  .number-box {
    display: inline-block;
    font-size: 36px;
    font-weight: bold;
    border: 2px solid #ccc;
    border-radius: 8px;
    padding: 10px 20px;
    margin: 10px;
    width: 70px;
  }

  .line {
    display: block;
    width: 100%;
    height: 2px;
    background-color: #ccc;
    margin: 10px 0;
  }

         #notification {
    position: fixed;
    top: 20px;
    right: 20px;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border-radius: 8px;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
    display: none;
  }
</style>
</head>

<body class="bg-gradient-login" style="background:#151c2b;">
    <!-- Login Content -->
    <div class="container-login">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-10">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Register</h1>
                                    </div>
                                    <!-- Session Status -->

                                    <!-- Validation Errors -->
                                    <form class="user" method="POST" action="validate.php"
                                        enctype="multipart/form-data">
                                        <input type="hidden" name="_token"
                                            value="aYMaRbKcHix9B69TAmjzke3XKvh7oIILSts7wrOU">
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <input type="text" class="form-control" id="exampleInputFirstName"
                                                placeholder="Enter Full Name(Surname first)" name="name" value=""
                                                autofocus>
                                        </div>


                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" id="exampleInputEmail"
                                                aria-describedby="emailHelp" placeholder="Enter Email Address"
                                                name="email" value="">
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Country</label><br>
                                                    <select id="country" name="country" class="form-control">
                                                        <option value="">Select your Country</option>
                                                        <option value="Afganistan">Afghanistan</option>
                                                        <option value="Albania">Albania</option>
                                                        <option value="Algeria">Algeria</option>
                                                        <option value="American Samoa">American Samoa</option>
                                                        <option value="Andorra">Andorra</option>
                                                        <option value="Angola">Angola</option>
                                                        <option value="Anguilla">Anguilla</option>
                                                        <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                                        <option value="Argentina">Argentina</option>
                                                        <option value="Armenia">Armenia</option>
                                                        <option value="Aruba">Aruba</option>
                                                        <option value="Australia">Australia</option>
                                                        <option value="Austria">Austria</option>
                                                        <option value="Azerbaijan">Azerbaijan</option>
                                                        <option value="Bahamas">Bahamas</option>
                                                        <option value="Bahrain">Bahrain</option>
                                                        <option value="Bangladesh">Bangladesh</option>
                                                        <option value="Barbados">Barbados</option>
                                                        <option value="Belarus">Belarus</option>
                                                        <option value="Belgium">Belgium</option>
                                                        <option value="Belize">Belize</option>
                                                        <option value="Benin">Benin</option>
                                                        <option value="Bermuda">Bermuda</option>
                                                        <option value="Bhutan">Bhutan</option>
                                                        <option value="Bolivia">Bolivia</option>
                                                        <option value="Bonaire">Bonaire</option>
                                                        <option value="Bosnia & Herzegovina">Bosnia & Herzegovina
                                                        </option>
                                                        <option value="Botswana">Botswana</option>
                                                        <option value="Brazil">Brazil</option>
                                                        <option value="British Indian Ocean Ter">British Indian Ocean
                                                            Ter</option>
                                                        <option value="Brunei">Brunei</option>
                                                        <option value="Bulgaria">Bulgaria</option>
                                                        <option value="Burkina Faso">Burkina Faso</option>
                                                        <option value="Burundi">Burundi</option>
                                                        <option value="Cambodia">Cambodia</option>
                                                        <option value="Cameroon">Cameroon</option>
                                                        <option value="Canada">Canada</option>
                                                        <option value="Canary Islands">Canary Islands</option>
                                                        <option value="Cape Verde">Cape Verde</option>
                                                        <option value="Cayman Islands">Cayman Islands</option>
                                                        <option value="Central African Republic">Central African
                                                            Republic</option>
                                                        <option value="Chad">Chad</option>
                                                        <option value="Channel Islands">Channel Islands</option>
                                                        <option value="Chile">Chile</option>
                                                        <option value="China">China</option>
                                                        <option value="Christmas Island">Christmas Island</option>
                                                        <option value="Cocos Island">Cocos Island</option>
                                                        <option value="Colombia">Colombia</option>
                                                        <option value="Comoros">Comoros</option>
                                                        <option value="Congo">Congo</option>
                                                        <option value="Cook Islands">Cook Islands</option>
                                                        <option value="Costa Rica">Costa Rica</option>
                                                        <option value="Cote DIvoire">Cote DIvoire</option>
                                                        <option value="Croatia">Croatia</option>
                                                        <option value="Cuba">Cuba</option>
                                                        <option value="Curaco">Curacao</option>
                                                        <option value="Cyprus">Cyprus</option>
                                                        <option value="Czech Republic">Czech Republic</option>
                                                        <option value="Denmark">Denmark</option>
                                                        <option value="Djibouti">Djibouti</option>
                                                        <option value="Dominica">Dominica</option>
                                                        <option value="Dominican Republic">Dominican Republic</option>
                                                        <option value="East Timor">East Timor</option>
                                                        <option value="Ecuador">Ecuador</option>
                                                        <option value="Egypt">Egypt</option>
                                                        <option value="El Salvador">El Salvador</option>
                                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                        <option value="Eritrea">Eritrea</option>
                                                        <option value="Estonia">Estonia</option>
                                                        <option value="Ethiopia">Ethiopia</option>
                                                        <option value="Falkland Islands">Falkland Islands</option>
                                                        <option value="Faroe Islands">Faroe Islands</option>
                                                        <option value="Fiji">Fiji</option>
                                                        <option value="Finland">Finland</option>
                                                        <option value="France">France</option>
                                                        <option value="French Guiana">French Guiana</option>
                                                        <option value="French Polynesia">French Polynesia</option>
                                                        <option value="French Southern Ter">French Southern Ter</option>
                                                        <option value="Gabon">Gabon</option>
                                                        <option value="Gambia">Gambia</option>
                                                        <option value="Georgia">Georgia</option>
                                                        <option value="Germany">Germany</option>
                                                        <option value="Ghana">Ghana</option>
                                                        <option value="Gibraltar">Gibraltar</option>
                                                        <option value="Great Britain">Great Britain</option>
                                                        <option value="Greece">Greece</option>
                                                        <option value="Greenland">Greenland</option>
                                                        <option value="Grenada">Grenada</option>
                                                        <option value="Guadeloupe">Guadeloupe</option>
                                                        <option value="Guam">Guam</option>
                                                        <option value="Guatemala">Guatemala</option>
                                                        <option value="Guinea">Guinea</option>
                                                        <option value="Guyana">Guyana</option>
                                                        <option value="Haiti">Haiti</option>
                                                        <option value="Hawaii">Hawaii</option>
                                                        <option value="Honduras">Honduras</option>
                                                        <option value="Hong Kong">Hong Kong</option>
                                                        <option value="Hungary">Hungary</option>
                                                        <option value="Iceland">Iceland</option>
                                                        <option value="Indonesia">Indonesia</option>
                                                        <option value="India">India</option>
                                                        <option value="Iran">Iran</option>
                                                        <option value="Iraq">Iraq</option>
                                                        <option value="Ireland">Ireland</option>
                                                        <option value="Isle of Man">Isle of Man</option>
                                                        <option value="Israel">Israel</option>
                                                        <option value="Italy">Italy</option>
                                                        <option value="Jamaica">Jamaica</option>
                                                        <option value="Japan">Japan</option>
                                                        <option value="Jordan">Jordan</option>
                                                        <option value="Kazakhstan">Kazakhstan</option>
                                                        <option value="Kenya">Kenya</option>
                                                        <option value="Kiribati">Kiribati</option>
                                                        <option value="Korea North">Korea North</option>
                                                        <option value="Korea Sout">Korea South</option>
                                                        <option value="Kuwait">Kuwait</option>
                                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                        <option value="Laos">Laos</option>
                                                        <option value="Latvia">Latvia</option>
                                                        <option value="Lebanon">Lebanon</option>
                                                        <option value="Lesotho">Lesotho</option>
                                                        <option value="Liberia">Liberia</option>
                                                        <option value="Libya">Libya</option>
                                                        <option value="Liechtenstein">Liechtenstein</option>
                                                        <option value="Lithuania">Lithuania</option>
                                                        <option value="Luxembourg">Luxembourg</option>
                                                        <option value="Macau">Macau</option>
                                                        <option value="Macedonia">Macedonia</option>
                                                        <option value="Madagascar">Madagascar</option>
                                                        <option value="Malaysia">Malaysia</option>
                                                        <option value="Malawi">Malawi</option>
                                                        <option value="Maldives">Maldives</option>
                                                        <option value="Mali">Mali</option>
                                                        <option value="Malta">Malta</option>
                                                        <option value="Marshall Islands">Marshall Islands</option>
                                                        <option value="Martinique">Martinique</option>
                                                        <option value="Mauritania">Mauritania</option>
                                                        <option value="Mauritius">Mauritius</option>
                                                        <option value="Mayotte">Mayotte</option>
                                                        <option value="Mexico">Mexico</option>
                                                        <option value="Midway Islands">Midway Islands</option>
                                                        <option value="Moldova">Moldova</option>
                                                        <option value="Monaco">Monaco</option>
                                                        <option value="Mongolia">Mongolia</option>
                                                        <option value="Montserrat">Montserrat</option>
                                                        <option value="Morocco">Morocco</option>
                                                        <option value="Mozambique">Mozambique</option>
                                                        <option value="Myanmar">Myanmar</option>
                                                        <option value="Nambia">Nambia</option>
                                                        <option value="Nauru">Nauru</option>
                                                        <option value="Nepal">Nepal</option>
                                                        <option value="Netherland Antilles">Netherland Antilles</option>
                                                        <option value="Netherlands">Netherlands (Holland, Europe)
                                                        </option>
                                                        <option value="Nevis">Nevis</option>
                                                        <option value="New Caledonia">New Caledonia</option>
                                                        <option value="New Zealand">New Zealand</option>
                                                        <option value="Nicaragua">Nicaragua</option>
                                                        <option value="Niger">Niger</option>
                                                        <option value="Nigeria">Nigeria</option>
                                                        <option value="Niue">Niue</option>
                                                        <option value="Norfolk Island">Norfolk Island</option>
                                                        <option value="Norway">Norway</option>
                                                        <option value="Oman">Oman</option>
                                                        <option value="Pakistan">Pakistan</option>
                                                        <option value="Palau Island">Palau Island</option>
                                                        <option value="Palestine">Palestine</option>
                                                        <option value="Panama">Panama</option>
                                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                                        <option value="Paraguay">Paraguay</option>
                                                        <option value="Peru">Peru</option>
                                                        <option value="Phillipines">Philippines</option>
                                                        <option value="Pitcairn Island">Pitcairn Island</option>
                                                        <option value="Poland">Poland</option>
                                                        <option value="Portugal">Portugal</option>
                                                        <option value="Puerto Rico">Puerto Rico</option>
                                                        <option value="Qatar">Qatar</option>
                                                        <option value="Republic of Montenegro">Republic of Montenegro
                                                        </option>
                                                        <option value="Republic of Serbia">Republic of Serbia</option>
                                                        <option value="Reunion">Reunion</option>
                                                        <option value="Romania">Romania</option>
                                                        <option value="Russia">Russia</option>
                                                        <option value="Rwanda">Rwanda</option>
                                                        <option value="St Barthelemy">St Barthelemy</option>
                                                        <option value="St Eustatius">St Eustatius</option>
                                                        <option value="St Helena">St Helena</option>
                                                        <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                                        <option value="St Lucia">St Lucia</option>
                                                        <option value="St Maarten">St Maarten</option>
                                                        <option value="St Pierre & Miquelon">St Pierre & Miquelon
                                                        </option>
                                                        <option value="St Vincent & Grenadines">St Vincent & Grenadines
                                                        </option>
                                                        <option value="Saipan">Saipan</option>
                                                        <option value="Samoa">Samoa</option>
                                                        <option value="Samoa American">Samoa American</option>
                                                        <option value="San Marino">San Marino</option>
                                                        <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                                        <option value="Senegal">Senegal</option>
                                                        <option value="Seychelles">Seychelles</option>
                                                        <option value="Sierra Leone">Sierra Leone</option>
                                                        <option value="Singapore">Singapore</option>
                                                        <option value="Slovakia">Slovakia</option>
                                                        <option value="Slovenia">Slovenia</option>
                                                        <option value="Solomon Islands">Solomon Islands</option>
                                                        <option value="Somalia">Somalia</option>
                                                        <option value="South Africa">South Africa</option>
                                                        <option value="Spain">Spain</option>
                                                        <option value="Sri Lanka">Sri Lanka</option>
                                                        <option value="Sudan">Sudan</option>
                                                        <option value="Suriname">Suriname</option>
                                                        <option value="Swaziland">Swaziland</option>
                                                        <option value="Sweden">Sweden</option>
                                                        <option value="Switzerland">Switzerland</option>
                                                        <option value="Syria">Syria</option>
                                                        <option value="Tahiti">Tahiti</option>
                                                        <option value="Taiwan">Taiwan</option>
                                                        <option value="Tajikistan">Tajikistan</option>
                                                        <option value="Tanzania">Tanzania</option>
                                                        <option value="Thailand">Thailand</option>
                                                        <option value="Togo">Togo</option>
                                                        <option value="Tokelau">Tokelau</option>
                                                        <option value="Tonga">Tonga</option>
                                                        <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                                        <option value="Tunisia">Tunisia</option>
                                                        <option value="Turkey">Turkey</option>
                                                        <option value="Turkmenistan">Turkmenistan</option>
                                                        <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                                        <option value="Tuvalu">Tuvalu</option>
                                                        <option value="Uganda">Uganda</option>
                                                        <option value="United Kingdom">United Kingdom</option>
                                                        <option value="Ukraine">Ukraine</option>
                                                        <option value="United Arab Erimates">United Arab Emirates
                                                        </option>
                                                        <option value="United States of America">United States of
                                                            America</option>
                                                        <option value="Uraguay">Uruguay</option>
                                                        <option value="Uzbekistan">Uzbekistan</option>
                                                        <option value="Vanuatu">Vanuatu</option>
                                                        <option value="Vatican City State">Vatican City State</option>
                                                        <option value="Venezuela">Venezuela</option>
                                                        <option value="Vietnam">Vietnam</option>
                                                        <option value="Virgin Islands (Brit)">Virgin Islands (Brit)
                                                        </option>
                                                        <option value="Virgin Islands (USA)">Virgin Islands (USA)
                                                        </option>
                                                        <option value="Wake Island">Wake Island</option>
                                                        <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                                        <option value="Yemen">Yemen</option>
                                                        <option value="Zaire">Zaire</option>
                                                        <option value="Zambia">Zambia</option>
                                                        <option value="Zimbabwe">Zimbabwe</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail"
                                                        aria-describedby="emailHelp" placeholder="Enter phone"
                                                        name="phone" value="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Bitcoin Wallet Address(optional)</label>
                                            <input type="text" class="form-control" id="examplebitcoin"
                                                placeholder="Enter Your Bitcoin Wallet Address(optional)" name="bitcoin"
                                                value="">
                                        </div>


                                        <div class="form-group">
                                            <label>Ethereum Wallet Address(optional)</label>
                                            <input type="text" class="form-control" id="exampleeth"
                                                placeholder="Enter Your Ethereum Wallet Address(optional)"
                                                name="ethereumt" value="">
                                        </div>

                                        <div class="row">
                                            <div class=" col-md-12 ">
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="text" class="form-control" id="exampleInputusername"
                                                        placeholder="Enter Username" name="username" value="">
                                                </div>
                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class=" col-md-12 ">
                                                <div class="form-group">
                                                    <label>State Security Number (SSN/TIN/IBAN)</label>
                                                    <input type="text" class="form-control" id="ssn"
                                                        placeholder="Enter SSN/TIN/IBAN" name="ssn" value="">
                                                </div>
                                            </div>


                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Security Question</label><br>
                                                    <select id="securityQuestion" name="question" class="form-control">
                                                        <option value="">Select a question</option>
                                                        <option value="What is your Pet name?">What is your Pet name?
                                                        </option>
                                                        <option value="What is your hobby?">What is your hobby?</option>
                                                        <option value="What is the name of your last child?">What is the
                                                            name of your last child?</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Security Answer</label>
                                                    <input type="text" name="answer" placeholder="Enter Security Answer"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>




                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" name="password" class="form-control"
                                                        id="exampleInputPassword" placeholder="Enter password">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Confirm Password</label>
                                                    <input type="password" name="cpassword" class="form-control"
                                                        id="exampleInputPassword" placeholder="Confirm password">
                                                </div>
                                            </div>

                                        </div>


                                        <div class="form-group">
                                            <?php if (!empty($ref)) {?>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Referral</label>
                                                    <input type="text" name="referral" class="form-control"
                                                        id="exampleInputPaord" value="<?php echo $ref; ?>" readonly>
                                                </div>
                                            </div>
                                            <?php }?>
                                           <div class="custom-recaptcha">
                                            <p>Please verify by entering the numbers:</p>

                                            <div id="one" class="number-box"><?php echo $one; ?></div>
                                            <div id="two" class="number-box"><?php echo $two; ?></div>
                                            <div id="three" class="number-box"><?php echo $three; ?></div>
                                        <div id="four" class="number-box"><?php echo $four; ?></div>
                                            <div class="line"></div>
                                            <input type="text" name="code" maxlength="4" style="text-align: center; font-size: 24px; border: 1px solid #ccc; border-radius: 8px; padding: 10px;">
                                          </div>

                                            <button name="submit" type="submit" class="btn btn-block text-white"
                                                style="background:#151c2b;">Create Account</button>
                                        </div>

                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        Already have an account? <a class="font-weight-bold small" href="login.html"
                                            style="color:#151c2b;">Login!</a>
                                    </div>
                                    <!--<div class="text-right w-25">-->
                                    <!--    <a class="font-weight-bold small" href="/forgot-password" style="color:#151c2b;">Forgot password?</a>-->
                                    <!--  </div>-->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="notification"></div>
    <script>
  const names = [
    'Alice', 'Bob', 'Charlie', 'David', 'Eve', 'Frank', 'Grace', 'Helen', 'Isaac', 'Julia',
    'Kevin', 'Laura', 'Michael', 'Nancy', 'Oliver', 'Pamela', 'Quincy', 'Rachel', 'Samuel', 'Tina',
    'Ulysses', 'Victoria', 'Walter', 'Xena', 'Yasmine', 'Zachary', 'Anna', 'Benjamin', 'Catherine', 'Daniel',
    'Emily', 'Felix', 'Georgia', 'Henry', 'Isabella', 'Jack', 'Katherine', 'Liam', 'Mia', 'Noah',
    'Olivia', 'Peter', 'Quinn', 'Riley', 'Sophia', 'Thomas', 'Uma', 'Violet', 'William', 'Xander',
    'Yara', 'Zara', 'Ava', 'Bella', 'Chloe', 'Dylan', 'Ella', 'Fiona', 'Grace', 'Harper',
    'Isaiah', 'Jacob', 'Kylie', 'Luna', 'Mason', 'Nora', 'Oscar', 'Penelope', 'Quinn', 'Riley',
    'Stella', 'Theo', 'Uma', 'Violet', 'William', 'Xander', 'Yara', 'Zara'
  ];

  const amounts = [5245, 7126, 10921, 17685, 8238, 18469, 3965, 14852, 18237, 9326,
11954, 18545, 13902, 17413, 18008, 3057, 7589, 16883, 16579, 19213,
13936, 8887, 19544, 10255, 9685, 8806, 11157, 16083, 19309, 5761,
17118, 16992, 10719, 10460, 14581, 13027, 10590, 11123, 11452, 15827,
12925, 12968, 17400, 13905, 18497, 18512, 17363, 14998, 13471, 13069,
19442, 16818, 17334, 14282, 10474, 13610, 10987, 12264, 13206, 17459,
19961, 15018, 16876, 18861, 16563, 10140, 11859, 15191, 14227, 17081,
11936, 11063, 12240, 12356, 15691, 11258, 19615, 16738, 15412, 19359,
12592, 12197, 19249, 11662, 11098, 14492, 10242, 19490, 19244, 14004,
19022, 13725, 14167, 12284, 11232, 17605, 13184, 15819, 11277, 14286,
18875, 16064, 13909, 12885, 18698, 19366, 16053, 11598, 14302, 17376];

  function getRandomIndex(arr) {
    return Math.floor(Math.random() * arr.length);
  }

  function getRandomAmount() {
    return amounts[getRandomIndex(amounts)];
  }

  function showNotification() {
    const name = names[getRandomIndex(names)];
    const amount = getRandomAmount();

    const notification = document.getElementById('notification');
    notification.textContent = `${name} has just been credited $${amount} dollars some minutes ago.`;
    notification.style.display = 'block';

    setTimeout(() => {
      notification.style.display = 'none';
    }, 5000); // Hide notification after 5 seconds

    setTimeout(showNotification, 20000); // Show notification every 40 seconds
  }

  // Initial notification
  showNotification();
</script>
    <script type="text/javascript">
        var fontType = [ "Brush Script MT", "papyrus", "Calibri Light", "Ink Free", "Microsoft Himalaya", "MV Boli", "Segoe Script"];
var num;
numOne=Math.floor(Math.random()*7);
document.getElementById("one").style.fontFamily = fontType[numOne];

let numTwo=Math.floor(Math.random()*7);
document.getElementById("two").style.fontFamily = fontType[numTwo];

let numThree=Math.floor(Math.random()*7);
document.getElementById("three").style.fontFamily = fontType[numThree];

let numFour=Math.floor(Math.random()*7);
document.getElementById("four").style.fontFamily = fontType[numFour];
    </script>
    <!-- Login Content -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/ruang-admin.min.js"></script>
</body>


<!-- Mirrored from smartcapitalz.com/register by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Aug 2022 22:21:26 GMT -->

</html>