<?php
require_once './config/config.php';

 ?>

	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/logo.png">
		<!-- Author Meta -->
		<meta name="author" content="Arkitu - Market Manager">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Market Manager</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/main.css">
		</head>
		<body>

			  <header id="header" id="home">
			    <div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="index.html"><img src="img/logoMM.png" width: "20px" height: "20px" alt="" title="" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="#home">Home</a></li>
				          <li><a href="#feature">Features</a></li>
				          <li><a href="#price">Price</a></li>
                  <li class="#"><a href="#">Contact</a></li>
				          <li><a class="ticker-btn" href="sign-in.php">Login</a></li>
				          <li class="menu-has-children"><a class="ticker-btn" href="#">Sign Up</a>
		              <ul>
		                <li><a href="registerFarmer.php">Farmer Registration</a></li>
		                <li><a href="registerWholesaler.php">Wholesaler Registration</a></li>
		              </ul>
		            </li>
				        </ul>
				      </nav><!-- #nav-menu-container -->
			    	</div>
			    </div>
			  </header><!-- #header -->

			<!-- start banner Area -->
			<section class="banner-area relative" id="home">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row fullscreen d-flex align-items-center justify-content-center">
						<div class="banner-content col-lg-8">
							<h1 class="text-white">
								Simplify the end of market check out process.
							</h1>
							<p class="pt-20 pb-20 text-white">
								No more having to hand write receipts when checking out vendors at the end of a market. Have everything in one place
							</p>
						</div>
					</div>
				</div>
			</section>
			<!-- End banner Area -->

			<!-- Start feature Area -->
			<section class="feature-area pb-100" id="service">
				<div class="container">
					<div class="row mockup-container">
						<img class="mx-auto d-block img-fluid" src="img/laptopMM.png" alt="">
					</div>
					<div class="row d-flex justify-content-center">
						<div class="menu-content pt-100 pb-60 col-lg-10">
							<div class="title text-center">
								<h1 class="mb-10">Features that matter</h1>
								<p>Designed with the market managers in mind.</p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4">
							<div class="single-feature">
								<span class="lnr lnr-thumbs-up"></span>
								<h4>
									Working Together
								</h4>
								<p>
									We spent months working with market managers to build something that doesn't just look nice, but works well too!
								</p>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-feature">
								<span class="lnr lnr-checkmark-circle"></span>
								<h4>
									Be Organized
								</h4>
								<p>
									Checkout your vendors fast and easy with us. From as simple as printing a receipt for a flat market fee, to calculating percentages with 'market money'.
								</p>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-feature">
								<span class="lnr lnr-chart-bars"></span>
								<h4>
									Reporting
								</h4>
								<p>
									Don't worry about those quarterly state reports, view and format data at the click of a button.
								</p>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End feature Area -->

			<!-- Start about Area -->
			<!-- <section class="about-area section-gap">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-10">
							<div class="title text-center">
								<h1 class="mb-10">Grab-and-Go!</h1>
								<p>Grab your tablet and start checking out vendors</p>
							</div>
						</div>
					</div>
					<div class="row align-items-center">
						<div class="col-lg-6 about-left">
							<h6></h6>
							<h1>
								One-time setup fee includes <br>
								a tablet and reciept printer
							</h1>
							<p>
								<span>
									You can use your own device if you are just emailing receipts.
								</span>
							</p>
							<p>
								For a one-time setup fee of $600, you will receive a tablet and mobile receipt printer that are ready to go out of the box.
							</p>
							<a class="primary-btn" href="sign-up.php">Get Started now</a>
						</div>
						<div class="col-lg-6 about-right">
								<div class="single-carusel item">
									<img class="img-fluid" src="img/tablet.png" alt="">
								</div>

						</div>
					</div>
				</div>
			</section> -->
			<!-- End about Area -->

			<!-- Start service Area -->
			<section class="service-area section-gap" id="feature">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-10">
							<div class="title text-center">
								<h1 class="mb-10">Features That make us Unique</h1>
								<p>We have done our homework. </p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 secvice-left">
							<div class="single-service d-flex flex-row pb-30">
								<div class="icon">
									<h1>01</h1>
								</div>
								<div class="desc">
									<h4>Market Research (literally)</h4>
									<p>
										We have been working with market managers and vendors to ensure the smoothest checkout process EVER at the end of a market. Whether you want to print a receipt, email a receipt to the vendor, or just save the entry, Market Manager will take care of it!
									</p>
								</div>
							</div>
							<div class="single-service d-flex flex-row pb-30">
								<div class="icon">
									<h1>03</h1>
								</div>
								<div class="desc">
									<h4>Reporting</h4>
									<p>
                    We also understanding that reporting is a pain, thats why we took care of it. View past market stats and generate quarterly state reports in a matter of minutes!
                    </p>
								</div>
							</div>
						</div>
						<div class="col-lg-6 secvice-right">
							<div class="single-service d-flex flex-row pb-30">
								<div class="icon">
									<h1>02</h1>
								</div>
								<div class="desc">
									<h4>User Interface</h4>
									<p>
                    Market Checkout is designed to be fully customizable to each of your markets. It doesn't matter if you have just EBT, just ATM, a flat fee, a percentage fee or a combination, we accommodate those in the checkout process.
                  </p>
								</div>
							</div>
							<div class="single-service d-flex flex-row pb-30">
								<div class="icon">
									<h1>04</h1>
								</div>
								<div class="desc">
									<h4>Mobile Optimized</h4>
									<p>
                    Market manager is designed to be used on a computer, phone, or tablet.
                    </p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End service Area -->


			<!-- Start callto-action Area -->
			<section class="callto-action-area relative section-gap">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content col-lg-9">
							<div class="title text-center">
								<h1 class="mb-10 text-white">Impressed with our features?</h1>
								<p class="text-white">Contact us to schedule a demo!</p>
								<a class="primary-btn" href="mailto:cam@arkitu.co">Request a Demo!</a>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End calto-action Area -->

			<!-- Start price Area -->
			<!-- <section class="price-area section-gap" id="price">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Choose the best pricing for you</h1>
							</div>
						</div>
					</div>
					<div class="row">
            <div class="col-lg-2">
            </div>
						<div class="col-lg-4">
							<div class="single-price no-padding">
								<div class="price-top">
									<h4>Basic </h4>
								</div>
								<ul class="lists">
									<li>1$ per vendor, per checkout</li>
									<li>Online pay for vendors that checkout</li>
                  <li></li>
                  <li></li>
                  <br><br><br><br><br>
								</ul>
								<div class="price-bottom">
									<div class="price-wrap d-flex flex-row justify-content-center">
										<span class="price">$</span><h1> 1 </h1><span class="time">Per Vendor<br> Per Checkout</span>
									</div>
									<a class="primary-btn" href="mailto:cam@arkitu.co?subject=Basic">Get Started</a>
								</div>

							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-price no-padding">
								<div class="price-top">
									<h4>Custom</h4>
								</div>
								<ul class="lists">
									<li>1$ per vendor, per checkout (on big markets)</li>
									<li>Have smaller markets where you are not sure if its worth it?</li>
									<li>Contac us for our custom pricing!</li>
									<li>We want to work with you!</li>
								</ul>
								<div class="price-bottom">
									<div class="price-wrap d-flex flex-row justify-content-center">
										<span class="price">$</span><h1> 1 </h1><span class="time">Per Vendor <br> Per Checkout</span>
									</div>
									<a class="primary-btn" href="mailto:cam@arkitu.co?subject=Custom">Get Started</a>
								</div>
							</div>
						</div>
            <div class="col-lg-2">
            </div>
					</div>
				</div>
			</section> -->
			<!-- End price Area -->

			<!-- Start testimonial Area -->
			<!-- <section class="testimonial-area relative section-gap" id="testimonial">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Testimonial from our Clients</h1>
								<p>Who are in extremely love with eco friendly system.</p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="active-testimonial">
							<div class="single-testimonial item d-flex flex-row">
								<div class="thumb">
									<img class="img-fluid" src="img/t1.png" alt="">
								</div>
								<div class="desc">
									<p>
										Market Checkout has made the process of checking out my market so seemless and streamlined!
									</p>
									<h4 mt-30>Mark Alviro Wiens</h4>
									<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>
									</div>
								</div>
							</div>
							<div class="single-testimonial item d-flex flex-row">
								<div class="thumb">
									<img class="img-fluid" src="img/t2.png" alt="">
								</div>
								<div class="desc">
									<p>
										It is so nice to be able to generate reports with the click of a button
									</p>
									<h4 mt-30>Mark Alviro Wiens</h4>
									<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End testimonial Area -->


			<!-- start footer Area -->
			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-5 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>About Us</h6>
								<p>
									We love farmers and technology and thought their must be an easier way to combine them, so we built Market Manager!
								</p>
								<p class="footer-text">
									<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Market Manager &copy 2018
								</p>
							</div>
						</div>
					</div>
				</div>
			</footer>
			<!-- End footer Area -->

			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
			<script src="js/superfish.min.js"></script>
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>
			<script src="js/owl.carousel.min.js"></script>
			<script src="js/jquery.nice-select.min.js"></script>
			<script src="js/main.js"></script>
		</body>
	</html>
