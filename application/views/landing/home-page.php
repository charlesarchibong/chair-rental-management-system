	<!DOCTYPE html>
	<html lang="zxx" class="no-js">

	<head>
		<?php $this->load->view('landing/fragments/head-codes'); ?>
		<link type="css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" />
		<style>
			.header-right {
				background-color: rgba(32, 46, 69, 0.4);
				border: 1px solid #4b5263;
				padding: 18px;
			}


			.banner-area {
				background: url(<?= base_url('assets/landing/img/header-bg-4.jpg') ?>) center;
				background-size: cover;
			}

			.carousel-item {
				height: 100vh;
				min-height: 350px;
				background: no-repeat center center scroll;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
			}

			.chair-bg {
				background-color: rgba(32, 46, 69, 0.4);
				border: 1px solid #4b5263;
			}
		</style>
	</head>

	<body>
		<?php $this->load->view('landing/fragments/header'); ?>
		<?php $this->load->view('landing/fragments/banner'); ?>
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


		<!-- Start home-about Area -->
		<section class="home-about-area" id="about">
			<div class="container-fluid">
				<div class="row justify-content-center align-items-center">
					<div class="col-lg-6 no-padding home-about-left">
						<img class="img-fluid" src="<?= base_url('assets/landing/img/about-img.jpg') ?>" alt="">
					</div>
					<div class="col-lg-6 no-padding home-about-right">
						<h1>our one-stop shop for Events and Party Rentals in Calabar covering Nigeria.</h1>
						<p>
							<span>We are here to listen from you deliver exellence</span>
						</p>
						<p>
							Your event needs to be perfect, you can count on Naphtali Events and Party Rental for your party and event rental in Nigeria. With several years experience and the largest product selection, we will bring your dream event to life.
						</p>
					</div>
				</div>
			</div>
		</section>
		<!-- End home-about Area -->


		<?php $this->load->view('landing/fragments/footer'); ?>
		<?php $this->load->view('landing/fragments/script'); ?>
		<script>
			$(function() {

				<?php if ($this->session->flashdata('error')) : ?>
					$(window).on('load', function() {
						$('#customerLogin').modal('show');
					});
				<?php endif; ?>
				<?php if ($this->session->flashdata('registererror')) : ?>
					$(window).on('load', function() {
						$('#customerRegister').modal('show');
					});
				<?php endif; ?>
			});
		</script>

	</body>

	</html>