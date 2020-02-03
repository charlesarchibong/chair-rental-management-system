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
							Contact Us
						</h1>
						<p class="text-white link-nav"><a href="<?= base_url(); ?>">Home </a> <span class="lnr lnr-arrow-right"></span> <a href="contact.html"> Contact Us</a></p>
					</div>
				</div>
			</div>
		</section>
		<!-- End banner Area -->

		<!-- Start contact-page Area -->
		<section class="contact-page-area section-gap">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 d-flex flex-column address-wrap">
						<div class="single-contact-address d-flex flex-row">
							<div class="icon">
								<span class="lnr lnr-home"></span>
							</div>
							<div class="contact-details">
								<h5>Cross River University of Technology</h5>
								<p>Ekpo Abasi, Calabar South, Cross River State</p>
							</div>
						</div>
						<div class="single-contact-address d-flex flex-row">
							<div class="icon">
								<span class="lnr lnr-phone-handset"></span>
							</div>
							<div class="contact-details">
								<h5>+234 (0)8161513832</h5>
								<p>Mon to Fri 9am to 6 pm</p>
							</div>
						</div>
						<div class="single-contact-address d-flex flex-row">
							<div class="icon">
								<span class="lnr lnr-envelope"></span>
							</div>
							<div class="contact-details">
								<h5>support@rental.zealtech.com.ng</h5>
								<p>Send us your query anytime!</p>
							</div>
						</div>
					</div>
					<!-- <div class="col-lg-8">
						<form class="form-area " id="myForm" action="mail.php" method="post" class="contact-form text-right">
							<div class="row">
								<div class="col-lg-6 form-group">
									<input name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="text">

									<input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" required="" type="email">

									<input name="subject" placeholder="Enter your subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your subject'" class="common-input mb-20 form-control" required="" type="text">
									<div class="mt-20 alert-msg" style="text-align: left;"></div>
								</div>
								<div class="col-lg-6 form-group">
									<textarea class="common-textarea form-control" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
									<button class="primary-btn mt-20 text-white" style="float: right;">Send Message</button>

								</div>
							</div>
						</form>
					</div> -->
				</div>
			</div>
		</section>
		<!-- End contact-page Area -->
		<?php $this->load->view('landing/fragments/footer'); ?>
		<?php $this->load->view('landing/fragments/script'); ?>
	</body>

	</html>