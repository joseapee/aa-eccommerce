		
        <!-- Layout Begin -->
<?= $this->extend('layouts/frontLayout') ?>

<?= $this->section('content') ?>	
		<main>
			<!-- Page Banner -->
			<div class="page-banner container-fluid no-padding">
				<!-- Container -->
				<div class="container">
					<div class="banner-content">
						<h3>Register</h3>
						<!-- <p>our vision is to be Earth's most customer centric company</p> -->
					</div>
					<ol class="breadcrumb">
						<li><a href="index.html" title="Home">Home</a></li>							
						<li class="active">Register</li>
					</ol>
				</div><!-- Container /- -->
			</div><!-- Page Banner /- -->
			<!-- Checkout -->
			<div class="container-fluid no-left-padding no-right-padding woocommerce-checkout">
				<!-- Container -->
				<div class="container">

					<!-- Login -->
					<div class="col-md-12 col-sm-12 col-xs-12 login-block">
						<div class="login-check">
							<h3>Your Contact Email</h3>
							<div class="col-md-7 col-sm-6 col-xs-6 login-form">
								<form>
									<div class="form-group">
										<input class="form-control" placeholder="Email *" type="text">
									</div>
									<div class="form-group">
										<input class="form-control" placeholder="Password *" type="text">
									</div>
									<input value="SIGN IN" type="submit">
									<a href="#" title="Forgot Password?">Forgot Password?</a>
								</form>
							</div>
							<div class="col-md-5 col-sm-6 col-xs-6 check-details">								
								<div class="check-detail">
									<h5>Create An Account</h5>
									<input name="payment" type="radio">
									<label>Register and checkout together</label>
								</div>
								<div class="check-detail">
									<h5>Guest Checkout</h5>
									<input name="payment" type="radio">
									<label>Checkout without registering</label>
								</div>
								<div class="check-detail">
									<a href="#" title="continue" class="continue">Continue</a>
								</div>
							</div>
						</div>
					</div>
					<!-- Login /- -->


				</div><!-- Container /- -->
			</div><!-- Checkout /- -->
			
		</main>


	<?= $this->endSection() ?>