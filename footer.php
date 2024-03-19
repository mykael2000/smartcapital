<!-- info section -->
<section class="info_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="info_contact">
                    <div class="info_logo">
                        <img src="images/smartlogo.png" />
                    </div>
                    <h5>Contact Us</h5>
                    <!-- <div>
                <div class="img-box">
                  <img src="images/location.png" width="18px" alt="" />
                </div>
                <p>Page when looking at its layou</p>
              </div> -->
                    <div>
                        <div class="img-box">
                            <img src="images/phone.png" width="18px" alt="" />
                        </div>
                        <p>+12533289260</p>

                    </div>
                    <div>
                        <div class="img-box">
                            <img src="images/phone.png" width="18px" alt="" />
                        </div>
                        <p>+12135260632</p>
                    </div>
                    <div>
                        <div class="img-box">
                            <img src="images/envelope.png" width="18px" alt="" />
                        </div>
                        <p>support@smartcapitalztradingpip.com</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="info_links">
                    <h5>Useful Links</h5>
                    <ul>
                        <li>
                            <a href="faq.php">FAQ</a>
                        </li>
                        <li>
                            <a href="about.php">About us</a>
                        </li>
                        <li>
                            <a href="login.html">Sign in </a>
                        </li>
                        <li>
                            <a href="register.html">Register</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="info_form">
                    <h5>Newsletter</h5>
                    <form action="">
                        <input type="email" placeholder="Enter your email" />
                        <button>Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- end info_section -->

<!-- footer section -->
<section class="container-fluid footer_section">
    <p>
        &copy; 2019 All Rights Reserved By
        <a href="">Smartcapitalzgroup</a>
    </p>
</section>
<!-- footer section -->
<?php
include "livechat.php";
?>
<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
</script>
<!-- owl carousel script
    -->
<script type="text/javascript">
$(".owl-carousel").owlCarousel({
    loop: true,
    margin: 0,
    navText: [],
    center: true,
    autoplay: true,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1,
        },
        1000: {
            items: 3,
        },
    },
});
</script>
<!-- end owl carousel script -->
</body>

</html>