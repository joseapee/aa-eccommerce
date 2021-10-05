
        <!-- Layout Begin -->
<?= $this->extend('layouts/frontLayout') ?>

<?= $this->section('content') ?>	
		<main>
			<!-- Page Banner -->
			<div class="page-banner container-fluid no-padding">
				<!-- Container -->
				<div class="container">
					<div class="banner-content">
						<h3>Checkout</h3>
						<!-- <p>our vision is to be Earth's most customer centric company</p> -->
					</div>
					<ol class="breadcrumb">
						<li><a href="index.html" title="Home">Home</a></li>							
						<li class="active">Checkout</li>
					</ol>
				</div><!-- Container /- -->
			</div><!-- Page Banner /- -->
			<!-- Checkout -->
			<div class="container-fluid no-left-padding no-right-padding woocommerce-checkout">
				<!-- Container -->
				<div class="container">

					<!-- Billing -->
					<div class="checkout-form">
						<!-- <form> -->

						<?php if (!empty($shipping_addresses)): ?>

							<div id="shipping-fields" class="col-md-6 col-sm-12 col-xs-12">
								<h2>BILLING/DELIVERY ADDRESS</h2>
								<div class="shipping-fields">

									<h3 class="bold">CHOOSE DELIVERY METHOD</h3>
									<div class="checkout-payment">
										<ul>
											<li>
												<input class="shipping-method radio-inline" name="shipping_method" value="pickup" checked="" type="radio">
												<label for="shipping_method" class="bold">Local Pick Up</label>
											</li>
											<li>
												<input class="shipping-method radio-inline" name="shipping_method" value="delivery" type="radio">
												<label for="shipping_method" class="bold">Delivery</label>
											</li>
										</ul>
									</div>


								<!-- default address -->

								<?php if (!empty($default_shipping)): ?>
									
									<div id="default-shipping" data-id="<?= $default_shipping['id'] ?>" class="checkout-order-table selectable shipping-address hidden">
										<table>
											<thead>
												<tr>
													<th>
														<button id="change-address" class="btn btn-info btn-sm">Change Address</button>
													</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
												<tr class="cart_item bold">
													<td class="product-name shipping-address"><?= $default_shipping['firstname']." ".$default_shipping['lastname'] ?>
														
													</td>
												</tr>
												<tr class="cart_item bold">
													<td class="product-name shipping-address">
														<?= $default_shipping['address_1'] ?>	
													</td>
												</tr>
												<tr class="cart_item bold">
													<td class="product-name shipping-address">
														<?= $default_shipping['state_name'] ?>	
													</td>
												</tr>
												<tr class="cart_item bold">
													<td class="product-name shipping-address">
														<?= $default_shipping['country_name'] ?>	
													</td>
												</tr>
												<tr class="cart_item bold">
													<td class="product-name shipping-address">
														<?= $default_shipping['postcode'] ?>	
													</td>
												</tr>
												<tr class="cart_item bold">
													<td class="product-name shipping-address">
														<?= $default_shipping['email'] ?>	
													</td>
												</tr>
												<tr class="cart_item bold">
													<td class="product-name shipping-address">
														<?= $default_shipping['phone'] ?>	
													</td>
												</tr>

											</tbody>
											
										</table>
									</div>
								<?php endif ?>

								<!-- default address -->


								<!-- Shipping addresses -->
								<?php foreach ($shipping_addresses as $address): ?>

									<div id="address-<?= $address['id'] ?>" data-id="<?= $address['id'] ?>" class="checkout-order-table selectable shipping-address shipping-list hidden">
										<table>
											<thead>
												<tr>
													<th>
														<button id="edit-<?= $address['id'] ?>" class="btn btn-info btn-sm">Edit Address</button>
													</th>
													<th>
														<input data-id="<?= $address['id'] ?>" class="form-control selected-address" type="radio" name="selected_address" 
														<?php if (isset($_SESSION['order']['selected_shipping']) && $_SESSION['order']['selected_shipping']  == $address['id']): ?> checked
														<?php endif ?>>
													</th>
												</tr>
											</thead>
											<tbody>
												<tr class="cart_item">
													<td class="product-name shipping-address"><?= $address['firstname']." ".$address['lastname'] ?>
														
													</td>
												</tr>
												<tr class="cart_item">
													<td class="product-name shipping-address">
														<?= $address['address_1'] ?>	
													</td>
												</tr>
												<tr class="cart_item">
													<td class="product-name shipping-address">
														<?= $address['state_name'] ?>	
													</td>
												</tr>
												<tr class="cart_item">
													<td class="product-name shipping-address">
														<?= $address['country_name'] ?>	
													</td>
												</tr>
												<tr class="cart_item">
													<td class="product-name shipping-address">
														<?= $address['postcode'] ?>	
													</td>
												</tr>
												<tr class="cart_item">
													<td class="product-name shipping-address">
														<?= $address['email'] ?>	
													</td>
												</tr>
												<tr class="cart_item">
													<td class="product-name shipping-address">
														<?= $address['phone'] ?>	
													</td>
												</tr>
											</tbody>
											
										</table>
									</div>
								
								<?php endforeach ?>

									<div id="add_new_address_block" class="place-order hidden">
										<input id="add-new-address" value="ADD NEW ADDRESS" type="button">
									</div>

								</div>
							</div>


							<!-- new shipping address form -->
							<div id="new-shipping-form" class="col-md-6 col-sm-12 col-xs-12 hidden">
									<h3> NEW BILLING/SHIPPING ADDRESS</h3>
									<form action="/add-new-shipping" method="POST">
										<div class="billing-field">
											
											<div class="col-md-6 form-group">
												<label>First name *</label>
												<input name="firstname" class="form-control" type="text" required="">
											</div>
											<div class="col-md-6 form-group">
												<label>Last name *</label>
												<input name="lastname" class="form-control" type="text" required="">
											</div>
											<div class="col-md-6 form-group">
												<label>Email Address *</label>
												<input name="email" class="form-control" type="email">
											</div>
											<div class="col-md-6 form-group">
												<label>Phone Number*</label>
												<input name="phone" class="form-control" type="text">
											</div>
											<div class="col-md-12 form-group">
												<label>Address 1 *</label>
												<input name="address_1" class="form-control" placeholder="Street Address" type="text">
											</div>
											<div class="col-md-12 form-group">
												<label>Address 2 (Optional)</label>
												<input name="address_2" class="form-control" placeholder="Apartment, suite, unit, etc..." type="text">
											</div>
											<div class="col-md-6 form-group">
												<label>Country *</label>
												<div class="select">
													<select id="country" name="country" class="form-control country" required="">

													<?php foreach ($countries as $country): ?>
														<option value="<?= $country['id'] ?>"><?= $country['name'] ?></option>
															
													<?php endforeach ?>

													</select>
												</div>
											</div>

											<div class="col-md-6 form-group">
												<label>State *</label>
												<div class="select">
													<select name="state" id="states" class="form-control" required="" disabled="">
													<option value="">---</option>

													</select>
												</div>
											</div>
											
											<div class="col-md-12 form-group">
												<label>Postal Code*</label>
												<input name="postcode" class="form-control" type="text" required="">
											</div>

											<div class="place-order">
												<input id="cancel-new-shipping" value="CANCEL" type="button">
												<input value="SAVE" type="submit">
											</div>

										</div>
									</form>

								</div>
							<!-- new shipping address form end -->

						<?php else: ?>

							<!-- new shipping address form -->
							<div class="col-md-6 col-sm-12 col-xs-12">
									<h3> NEW BILLING/SHIPPING ADDRESS</h3>
									<form action="/add-new-shipping" method="POST">
										<div class="billing-field">
											
											<div class="col-md-6 form-group">
												<label>First name *</label>
												<input name="firstname" class="form-control" type="text" required="">
											</div>
											<div class="col-md-6 form-group">
												<label>Last name *</label>
												<input name="lastname" class="form-control" type="text" required="">
											</div>
											<div class="col-md-6 form-group">
												<label>Email Address *</label>
												<input name="email" class="form-control" type="email">
											</div>
											<div class="col-md-6 form-group">
												<label>Phone Number*</label>
												<input name="phone" class="form-control" type="text">
											</div>
											<div class="col-md-12 form-group">
												<label>Address 1 *</label>
												<input name="address_1" class="form-control" placeholder="Street Address" type="text">
											</div>
											<div class="col-md-12 form-group">
												<label>Address 2 (Optional)</label>
												<input name="address_2" class="form-control" placeholder="Apartment, suite, unit, etc..." type="text">
											</div>
											<div class="col-md-6 form-group">
												<label>Country *</label>
												<div class="select">
													<select id="country" name="country" class="form-control country" required="">

													<?php foreach ($countries as $country): ?>
														<option value="<?= $country['id'] ?>"><?= $country['name'] ?></option>
															
													<?php endforeach ?>

													</select>
												</div>
											</div>

											<div class="col-md-6 form-group">
												<label>State *</label>
												<div class="select">
													<select name="state" id="states" class="form-control" required="" disabled="">
													<option value="">---</option>

													</select>
												</div>
											</div>
											
											<div class="col-md-12 form-group">
												<label>Postal Code*</label>
												<input name="postcode" class="form-control" type="text" required="">
											</div>

											<div class="place-order">
												<input value="SAVE" type="submit">
											</div>

										</div>
									</form>

									</div>
							<!-- new shipping address form end -->

						<?php endif ?>
							
							<div class="col-md-6 col-sm-12 col-xs-12 float-right">
								<h3>Your Order</h3>
								<div class="shipping-fields">
									<div class="checkout-order-table">
										<table>
											<thead>
												<tr>
													<th>Product</th>
													<th>Total</th>
												</tr>
											</thead>
											<tbody>
												<tr class="cart_item">
													<td class="product-name">MENS CASUAL SHOE</td>
													<td>$550.00</td>
												</tr>
												<tr class="cart-subtotal">
													<th>Sub Total</th>
													<td>$550.00</td>
												</tr>
											</tbody>
											<tfoot>
												<tr>
													<th>Shipping</th>
													<td>Free Shipping</td>
												</tr>
												<tr>
													<th>Total Order</th>
													<td>$550.00</td>
												</tr>
											</tfoot>
										</table>
									</div>
									<!-- <div class="checkout-payment">
										<ul>
											<li>
												<input value="Direct Bank Transfer" checked="" type="radio">
												<label>Direct Bank Transfer</label>
												<div class="payment_box">
													<p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order wont be shipped until the funds have cleared in our account.</p>
												</div>
											</li>
											<li>
												<input value="Paypal" type="radio">
												<label>Paypal <img src="images/paypal.jpg" alt="Paypal"></label>
											</li>
										</ul>
									</div> -->
									<div class="place-order">
										<input value="PLACE YOUR ORDER" type="submit">
									</div>
								</div>
							</div>
						<!-- </form> -->
					</div>
					<!-- Billing /- -->


				</div><!-- Container /- -->
			</div><!-- Checkout /- -->
			
		</main>

	<?= $this->endSection() ?>

	