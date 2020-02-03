	<!DOCTYPE html>
	<html lang="zxx" class="no-js">

	<head>
		<?php $this->load->view('landing/fragments/head-codes'); ?>
	</head>

	<body>

		<?php $this->load->view('landing/fragments/header'); ?>
		<!-- start banner Area -->
		<section class="banner-area relative" id="home">
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row d-flex align-items-center justify-content-center">
					<div class="about-content col-lg-12">
						<h1 class="text-white">
							About Us
						</h1>
						<p class="text-white link-nav"><a href="<?= base_url(); ?>">Home </a> <span class="lnr lnr-arrow-right"></span> <a href="about.html"> About Us</a></p>
					</div>
				</div>
			</div>
		</section>
		<!-- End banner Area -->
		<section class="feature-area section-gap" id="service">
			<div class="container">
				<div class="row d-flex justify-content-center">
					<div class="col-md-8 pb-40 header-text">
						<h1>What Services we offer to our clients</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4 col-md-6">
						<div class="single-feature">
							<h4><span class="lnr lnr-rocket"></span>Fee Delivery</h4>
							<p>
								Your one-stop shop for Events and Party Rentals in Calabar covering Nigeria.
							</p>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="single-feature">
							<h4><span class="lnr lnr-diamond"></span>Tables</h4>
							<p>
								Table for Two, or 500. Our inventory consists of rectangular, round, high top tables in an array of sizes to create the look you desire.
							</p>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="single-feature">
							<h4><span class="lnr lnr-diamond"></span>Seating</h4>
							<p>
								Please be seated!! Our Selection of chairs starts at the basic folding chair to stylish chivari chair to create a unique event environment.
							</p>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="single-feature">
							<h4><span class="lnr lnr-diamond"></span>Linen & Chair Covers</h4>
							<p>
								From simple to elegant to Introduce that WOW factor to your event we have you covered.
							</p>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="single-feature">
							<h4><span class="lnr lnr-diamond"></span>TABLEWARE</h4>
							<p>
								Simple and beautiful tabletop presentations are achievable with dinnerware, flatware, and glassware from Ali Rentals
							</p>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="single-feature">
							<h4><span class="lnr lnr-diamond"></span>Tent</h4>
							<p>
								Our tents including the new and very popular marquee tent will leave a lasting impression of your event.
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End feature Area -->



		<?php $this->load->view('landing/fragments/footer'); ?>
		<?php $this->load->view('landing/fragments/script'); ?>
	</body>

	</html>