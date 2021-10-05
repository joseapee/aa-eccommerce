        <!-- Layout Begin -->
<?= $this->extend('layouts/frontLayout') ?>

<?= $this->section('content') ?>	

		<main>
			<!-- Page Banner -->
			<div class="page-banner container-fluid no-padding">
				<!-- Container -->
				<div class="container">
					<div class="banner-content">
						<h3><?= $page_title ?></h3>
						<!-- <p>our vision is to be Earth's most customer centric company</p> -->
					</div>
					<ol class="breadcrumb">
						<li><a href="/" title="Home">Home</a></li>							
						<li class="active">Product</li>
					</ol>
				</div><!-- Container /- -->
			</div><!-- Page Banner /- -->
			
			<!-- Shop Single -->
			<div class="shop-single container-fluid no-padding">
				<!-- Container -->
				<div class="container">
					<div class="product-views">
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="carousel-item">
								<?php $cnt = 1; 
								foreach ($product['images'] as $image): ?>
									
								<div class="item">
									<img data-id="<?= $image['image'] ?>" id="image-<?= $cnt ?>" src="/uploads/products/thumbs/thumb_<?= $image['image'] ?>" alt="<?= $product['name'] ?>" />
								</div>
								
								<?php $cnt++; endforeach ?>
							</div>
						</div>
						<!-- Entry Summary -->
						<div class="col-md-6 col-sm-6 col-xs-12 entry-summary">
							<h3 id="product_name" class="product_title"><?= $product['name'] ?></h3>
							<div class="product-rating">
								<div class="star-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
								</div>
								<!-- <a href="#review-link" class="review-link">20 reviews</a> -->
							</div>
							<p class="stock in-stock">
								<span>Availablity:</span>
								 <?php if ($product['stock_status'] == 1 && $product['product_type'] == 'ready-wear'): ?>
								 	In stock
								 <?php elseif($product['stock_status'] == 1 && $product['product_type'] == 'pre-order'): ?>
								 	pre order
								 <?php elseif($product['stock_status'] == 0): ?>
								 	out of stock
								 <?php endif ?>
							</p>

							<div>
								<p><?= $product['description'] ?></p>
							</div>
							<span id="product_price" class="price">
								<!-- <del>$850</del>  -->
								<?= $controller->defaultCurrency($product['price']) ?></span>
							<form id="add_to_cart" method="POST">
								<div class="product-attribute">
									
									<div class="select">
										<select name="size">
											<option value="">Size *</option>
											<?php foreach ($product['sizes'] as $size): ?>
												<option value="<?= $size['size'] ?>" >
													<?= $size['size'] ?>
												</option>
											<?php endforeach ?>
										</select>
									</div>

								<?php if (!empty($product['colors'])): ?>
									<div class="select">
										<select name="color">
											<option value="">Color *</option>
											<?php foreach ($product['colors'] as $color): ?>
												<option value="<?= $color['color'] ?>" >
													<?= $color['color'] ?>
												</option>
											<?php endforeach ?>
										</select>
									</div>

								<?php endif ?>

								</div>
								<div class="product-quantity" data-title="Quantity">
									<input type="button" value="-" class="qtyminus btn" data-field="quantity">
									<input type="text" name="quantity" value="1" class="qty btn">
									<input type="button" value="+" class="qtyplus btn" data-field="quantity">
								</div>
								<input id="product_id" type="hidden" name="product_id" value="<?= $product['id'] ?>">
								<button data-id ="<?= $product['id'] ?>" title="Add To Cart" class="add_to_cart">Add To Cart</button>
							</form>
							<div class="product_meta">
								<span class="posted_in">
									<a href="#"><i class="fa fa-heart"></i></a>
									<a href="#"><i class="fa fa-retweet"></i></a>
									<a href="#"><i class="fa fa-envelope-o"></i></a>
								</span>
								<!-- <ul class="social">
									<li><a href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#" title="Twitter"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
									<li><a href="#" title="Tumblr"><i class="fa fa-tumblr"></i></a></li>
									<li><a href="#" title="Vimeo"><i class="fa fa-vimeo"></i></a></li>
								</ul> -->
							</div>
						</div> 
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12 description">
						<h5>Description about this product</h5>
						<p><?= $product['description'] ?></p>
					</div>
					<!-- Product Section -->
					<div class="product-section container-fluid no-padding">
						<!-- Section Header -->
						<div class="section-header">
							<h3>Related Products</h3>
							<!-- <p>our vision is to be Earth's most customer centric company</p> -->
							<img src="images/section-seprator.png" alt="section-seprator" />
						</div><!-- Section Header /- -->
						<!-- Products -->
						<ul class="products">
							<!-- Product -->
							<?php foreach ($similar_products as $similar): ?>
								
							<li class="product">
								<a href="#">
									<img src="/uploads/products/thumbs/thumb_<?= $similar['image'] ?>" alt="Product" />
									<h5><?= strtoupper($similar['name']) ?></h5>
									<span class="price">
										<!-- <del>$200</del> -->
										<?= $controller->defaultCurrency($similar['price']) ?>
									</span>
								</a>
								<div class="wishlist-box">
									<!-- <a href="#"><i class="fa fa-arrows-alt"></i></a>
									<a href="#"><i class="fa fa-heart-o"></i></a>
									<a href="#"><i class="fa fa-search"></i></a> -->
								</div>
								<!-- <a href="#" class="addto-cart" title="Add To Cart">Add To Cart</a> -->
							</li>

							<?php endforeach ?>
							<!-- Product /- -->
							
						</ul><!-- Products /- -->
					</div><!-- Product Section /- -->

					<nav class="ow-pagination">
						<ul class="pager">
							<li class="number"><a href="#">4</a></li>
							<li class="load-more"><a href="#">Load More</a></li>
							<li class="previous"><a href="#"><i class="fa fa-angle-right"></i></a></li>
							<li class="next"><a href="#"><i class="fa fa-angle-left"></i></a></li>
						</ul>
					</nav>

				</div><!-- Container /- -->
			</div><!-- Shop Single /- -->
		</main>

	<?= $this->endSection() ?>