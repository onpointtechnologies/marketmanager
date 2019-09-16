<?php
require_once './config/config.php';

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>North County Farmers Markets</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/logo.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: BizPage
    Theme URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">

        <!-- Uncomment below if you prefer to use an image logo -->
      <a href="#intro"><img src="img/logo.png" alt="" title="" /></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#intro">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#featured-services">Markets</a></li>
          <li><a href="./vendorapp.html">Vendor Application</a></li>
          <li><a href="#contact">Contact Us</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active">
            <div class="carousel-background"><img src="img/ncfma.png" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>We are North County Farmers Markets</h2>
                <p>Based out of north San Luis Onispo County, we curate 4 markets a week. </p>
                <a href="#featured-services" class="btn-get-started scrollto">Get Started</a>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="img/atascadero.png" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Everything you need at our markets</h2>
                <p>We strive to have most of your weekly ingredients so you can do your shopping in one place!</p>
                <a href="#featured-services" class="btn-get-started scrollto">Get Started</a>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="img/gracious.png" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Check out our Vendors</h2>
                <p>Want some more information on our vendors before you come to the market? No problem! Check them out!</p>
                <a href="#featured-services" class="btn-get-started scrollto">Get Started</a>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      Featured Services Section
    ============================-->
    <section id="featured-services">
      <div class="container">
        <br>
        <div class="row">

          <div class="col-lg-3 box">
            <img src="img/mapat.png" alt="" class="img-circle" width="225" height="225">
            <h4 class="title"><a href="">Atascadero</a></h4>
            <p class="description">Wednesdays 3-6pm</p>
          </div>

          <div class="col-lg-3 box box-bg">
            <img src="img/baywoodmap.jpeg" alt="" class="img-circle" width="225" height="225">
            <h4 class="title"><a href="">Baywood</a></h4>
            <p class="description">Mondays 2-4:30pm</p>
          </div>

          <div class="col-lg-3 box">
            <img src="img/pasomap.jpeg" alt="" class="img-circle" width="225" height="225">
            <h4 class="title"><a href="">Paso Robles</a></h4>
            <p class="description">Tuesdays 3-6pm</p>
          </div>

          <div class="col-lg-3 box">
            <img src="img/templetonmap.jpeg" alt="" class="img-circle" width="225" height="225">
            <h4 class="title"><a href="">Templeton</a></h4>
            <p class="description">Saturdays 9-12:30pm</p>
          </div>

        </div>
      </div>
    </section><!-- #featured-services -->

    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
      <div class="container">

        <div class="row about-cols">

              <div class="ccol-md-6 wow fadeInUp">
                <iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2FNorthCountyFarmersMarketsCa%2Fvideos%2F1104040879662435%2F&amp;show_text=0&amp;width=auto" width="560" height="315" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowtransparency="true" allowfullscreen="true"></iframe>
              </div>
              <div class="col-md-6 wow fadeInUp">
                <h1>What Can I Find at North County Farmers Markets?</h1>
                <p>Shop for the best ingredients each week at one of the four North County Farmers Markets.

                  Get a wider variety of fruits and vegetables with an assortment of colors, textures, and flavors not found in the supermarket.
                  Know where it comes from: Talk to the farmer who actually grew it, picked it, and brought it to you! </p>
              </div>
              <br>
          </div>

      </div>
    </section><!-- #about -->




    <section id="about">
      <div class="container">

        <header class="section-header">
          <h3>Cal Fresh</h3>
          <p>CalFresh Benefits and North County Farmers Markets Token Program help stretch your food dollars and make it easy for you to get fresh, healthy, local food for you and your family.</p>
        </header>

        <div class="row about-cols">

          <div class="col-md-4 wow fadeInUp">
            <div class="about-col">
              <div class="img">
                <img src="img/calfresh1.jpeg" alt="" class="img-fluid">
              </div>
              <h2 class="title"><a href="#">Swipe Your Debit Card for Tokens</a></h2>
              <br>
            </div>
          </div>

          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
            <div class="about-col">
              <div class="img">
                <img src="img/calfresh2.jpeg" alt="" class="img-fluid">
              </div>
              <h2 class="title"><a href="#">Use Your EBT Card for Market Tokens</a></h2>
              <br>
            </div>
          </div>

          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
            <div class="about-col">
              <div class="img">
                <img src="img/calfresh3.jpeg" alt="" class="img-fluid">
              </div>
              <h2 class="title"><a href="#">Shop For Food</a></h2>
              <br><br>
            </div>
          </div>
        </div>

      </div>
    </section><!-- #about -->



    <!--==========================
      Call To Action Section
    ============================-->
    <section id="call-to-action" class="wow fadeIn">
      <div class="row">
        <!-- SnapWidget -->
          <div class="col-md-2">
          </div>
            <div class="col-md-8">
              <center><h3>The Feed!</h3></center>
              <script src="https://snapwidget.com/js/snapwidget.js"></script>
              <iframe src="https://snapwidget.com/embed/571471" class="snapwidget-widget" allowTransparency="true" frameborder="0"
              scrolling="no" style="border:none; overflow:hidden; width:100%; "></iframe>
            </div>
          <div class="col-md-2">
          </div>
      </div>
    </section><!-- #call-to-action -->

    <!--==========================
      Skills Section
    ============================-->


    <!--==========================
      Facts Section
    ============================-->


    <!--==========================
      Team Section
    ============================-->
    <section id="team">
      <div class="container">
        <div class="section-header wow fadeInUp">
          <h3>Team</h3>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6 wow fadeInUp">
            <div class="member">
              <img src="img/team-1.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Walter White</h4>
                  <span>Chief Executive Officer</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="member">
              <img src="img/team-2.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Sarah Jhonson</h4>
                  <span>Product Manager</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
            <div class="member">
              <img src="img/team-3.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>William Anderson</h4>
                  <span>CTO</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
            <div class="member">
              <img src="img/team-4.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Amanda Jepson</h4>
                  <span>Accountant</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #team -->

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="section-bg wow fadeInUp">
      <div class="container">

        <div class="section-header">
          <h3>Contact Us</h3>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Address</h3>
              <address>5 Cities Area, SLO County, CA, USA</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:+18057481109">+1 805 748 1109</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:robyn@northcountyfarmersmarkets.com">Email Us</a></p>
            </div>
          </div>

        </div>

        <div class="form">
          <div id="sendmessage">Your message has been sent. Thank you!</div>
          <div id="errormessage"></div>
          <form action="" method="post" role="form" class="contactForm">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div>
    </section><!-- #contact -->

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-1 col-md-2 footer-newsletter">
          </div>

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>North County Farmers Markets</h3>
            <p></p>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              5 Cities Area, SLO County, CA, USA <br>
              <strong>Phone:</strong> +1 805 748 1109<br>
              <strong>Email:</strong> robyn@northcountyfarmersmarkets.com<br>
            </p>

            <div class="social-links">
              <a href="https://www.facebook.com/NorthCountyFarmersMarketsCa/" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="https://www.instagram.com/northcountyfarmersmarkets/" class="instagram"><i class="fa fa-instagram"></i></a>
            </div>

          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Shop for the best ingredients each week at one of the four North County Farmers Markets.

Get a wider variety of fruits and vegetables with an assortment of colors, textures, and flavors not found in the supermarket.
Know where it comes from: Talk to the farmer who actually grew it, picked it, and brought it to you!</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit"  value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>North County Farmers Markets</strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
