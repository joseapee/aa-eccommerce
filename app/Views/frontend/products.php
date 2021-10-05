        <!-- Layout Begin -->
<?= $this->extend('layouts/frontLayout') ?>

<?= $this->section('content') ?>	


<!-- Product Section -->
			<div id="product-section" class="product-section container-fluid no-padding">
				<!-- Container -->
				<div class="container">
					<div class="row">
						<!-- Section Header -->
						<div class="section-header">
							<h3><?= strtoupper($page_title) ?></h3>
							<p>Check out our collections</p>
							<img src="/frontend/images/section-seprator.png" alt="section-seprator" />
						</div><!-- Section Header /- -->
						<!-- <ul id="filters" class="products-categories no-left-padding">
							<li><a data-filter="*" class="active" href="#">All Products</a></li>
							<li><a data-filter=".design" href="#">jewellery</a></li>
							<li><a data-filter=".video" href="#">books</a></li>
							<li><a data-filter=".photography" href="#">watches</a></li>
							<li><a data-filter=".web" href="#">shoes</a></li>
							<li><a data-filter=".design" href="#">electronics</a></li>
							<li><a data-filter=".photography" href="#">mobiles</a></li>
							<li><a data-filter=".video" href="#">more<i class="fa fa-angle-down"></i></a></li>
						</ul> -->
						<div class="input-group">
							<input class="form-control" placeholder="Search You Wants" type="text">
							<span class="input-group-btn">
								<button class="btn btn-search" title="Search" type="button"><i class="icon icon-Search"></i></button>
							</span>
						</div>
						<!-- Products -->
						<ul class="products">
							
							<?php if (empty($products)): ?>
								
								<h2 class="text-center">No products available for this Category</h2>
							<?php else: ?>
							<?php foreach ($products as $product): ?>
								
							
							<!-- Product -->
							<li class="product design">
								<a href="/products/<?= $product['id'] ?>">
									<img src="/uploads/products/thumbs/thumb_<?= $product['image'] ?>" alt="<?= $product['name'] ?>" />
									<h5><?= strtoupper($product['name']) ?></h5>
									<span class="price">
										<!-- <del>$200</del> -->
										<?= $controller->defaultCurrency($product['price']) ?>
									</span>
								</a>
								<!-- <div class="wishlist-box">
									<a href="#"><i class="fa fa-arrows-alt"></i></a>
									<a href="#"><i class="fa fa-heart-o"></i></a>
									<a href="#"><i class="fa fa-search"></i></a>
								</div> -->
								<!-- <a href="#" data-id="" class="addto-cart" title="Add To Cart">Add To Cart</a> -->
							</li><!-- Product /- -->
							
						<?php endforeach ?>

						<?php endif ?>
							<!-- Product /- -->
							
							
						</ul><!-- Products /- -->
					</div><!-- Row /- -->

					<nav class="ow-pagination">
						<?= $pager->links() ?>
						<!-- <ul class="pager">
							<li class="number"><a href="#">4</a></li>
							<li class="load-more"><a href="#">Load More</a></li>
							<li class="previous"><a href="#"><i class="fa fa-angle-right"></i></a></li>
							<li class="next"><a href="#"><i class="fa fa-angle-left"></i></a></li>
						</ul> -->
					</nav>



				</div><!-- Container /- -->
			</div><!-- Product Section /- -->

			<!-- BEST SELLING -->
			<div id="selling" class="container-fluid no-left-padding no-right-padding woocommerce-selling">
				<!-- Container -->
				<div class="container">
					<!-- Section Header -->
					<div class="section-header">
						<h3>Best Selling</h3>
						<!-- <p> our vision is to be Earth's most customer centric company</p> -->
						<img src="/frontend/images/section-seprator.png" alt="section-seprator" />
					</div><!-- Section Header /- -->

					<?php foreach ($best_selling as $product): ?>

					<div class="col-md-4 col-sm-6 col-xs-6">
						<div  class="selling-box">
							<img style="height: 140px;" src="/uploads/products/thumbs/thumb_<?= $product['image'] ?>" alt="<?= $product['name'] ?>" />
							<div class="selling-content">
								<h6><a href="#">mens casual belts</a></h6>
								<span class="price">
									<!-- <del>$75</del>  -->
									<?= $controller->defaultCurrency($product['price']) ?></span>
								<div class="star-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
								</div>
							</div>
							<div class="icon-list">
								<a href="#"><i class="fa fa-arrows-alt"></i></a>
								<a href="#"><i class="fa fa-heart-o"></i></a>
							</div>
						</div>
					</div>

					<?php endforeach  ?>
					
					
				</div><!-- Container /- -->
			</div>	
			<!-- BEST SELLING -->

<?= $this->endSection() ?>