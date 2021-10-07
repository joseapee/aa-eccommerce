	<?= $this->extend('layouts/frontLayout') ?>

	<?= $this->section('content') ?>

		<main>
			<!-- Page Banner -->
			<div class="page-banner container-fluid no-padding">
				<!-- Container -->
				<div class="container">
					<div class="banner-content">
						<h3>Cart</h3>
						<!-- <p>our vision is to be Earth's most customer centric company</p> -->
					</div>
					<ol class="breadcrumb">
						<li><a href="/" title="Home">Home</a></li>							
						<li class="active">Cart</li>
					</ol>
				</div><!-- Container /- -->
			</div><!-- Page Banner /- -->
			<!-- Cart -->
			<div class="woocommerce-cart container-fluid no-left-padding no-right-padding">
				<!-- Container -->
				<div class="container">
					<!-- Cart Table -->
					<div class="roq">
						<div class="col-md-8 col-sm-12 col-xs-12 cart-table">
							
						<?php if (!empty($cart)): ?>		
							
							<ul class="cart-list">

							<?php foreach ($cart as $index => $cart_item): ?>
								
								<li class="list-item">
										<div class="col-md-2 col-sm-2">	
											<img width="115" src="/uploads/products/thumbs/thumb_<?= $cart_item['image'] ?>">
										</div>
										<div class="col-md-10 col-sm-10 cart-description">
											<span class="price mb-2"><?= $cart_item['price'] ?></span> 
											<br>
											<a class="product-name" href="#"><?= strtoupper($cart_item['name']) ?></a>
											<h5>Black, 43</h5>
											<p>
												Qty <?= $cart_item['quantity'] ?> 
												<a class="remove-icon remove_item" href="#"><i class="far fa-trash-alt"></i></a>
											</p>
										</div>
									</li>

							<?php endforeach ?>
								
							</ul>
							
						</div><!-- Cart Table /- -->

						
						<div class="col-md-4 col-sm-6 col-xs-6 cart-collaterals">
							<div class="cart_totals">
								<h3>cart totals</h3>
								<table>
									<tr>
										<th>Subtotal</th>
										<td><?= $cart_total ?></td>
									</tr>
								</table>
								<div class="wc-proceed-to-checkout">		
									<a href="/checkout" class="checkout-button button alt wc-forward">Proceed to Checkout</a>
								</div>
							</div>
						</div>

					<?php else: ?>

						<div class="col-md-12 col-sm-12 col-xs-6 cart-collaterals">
							<div class="cart_totals">
								<h3>cart total</h3>
								<div class="wc-proceed-to-checkout">		
									<a href="/" class="checkout-button button alt wc-forward">Continue Shopping</a>
								</div>
							</div>
						</div>
					<?php endif ?>

					</div>	

				</div><!-- Container /- -->
			</div><!-- Cart /- -->	
		</main>

	<?= $this->endSection('content') ?>