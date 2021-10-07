	<!DOCTYPE html>
<html lang="en" class=""><!--<![endif]-->
<head>
	<meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

	<title><?php strtoupper($page_title) ?> | Aisha Abubakar Fashion Hub</title>

	<!-- Standard Favicon -->
	<link rel="icon" type="image/x-icon" href="/frontend/images/favicon.ico" />
	
	<!-- For iPhone 4 Retina display: -->
	<link rel="apple-touch-icon-precomposed" href="/frontend/images//apple-touch-icon-114x114-precomposed.png">
	
	<!-- For iPad: -->
	<link rel="apple-touch-icon-precomposed" href="/frontend/images//apple-touch-icon-72x72-precomposed.png">
	
	<!-- For iPhone: -->
	<link rel="apple-touch-icon-precomposed" href="/frontend/images//apple-touch-icon-57x57-precomposed.png">	
	
	<!-- Library - Google Font Familys -->
	<link href="https://fonts.googleapis.com/css?family=Arizonia|Crimson+Text:400,400i,600,600i,700,700i|Lato:100,100i,300,300i,400,400i,700,700i,900,900i|Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="/frontend/revolution/css/settings.css">
 
	<!-- RS5.0 Layers and Navigation Styles -->
	<link rel="stylesheet" type="text/css" href="/frontend/revolution/css/layers.css">
	<link rel="stylesheet" type="text/css" href="/frontend/revolution/css/navigation.css">
	
	<!-- Library - Bootstrap v3.3.5 -->
    <link rel="stylesheet" type="text/css" href="/frontend/libraries/lib.css">
	
	<!-- Custom - Common CSS -->
	<link rel="stylesheet" type="text/css" href="/frontend/css/plugins.css">			
	<link rel="stylesheet" type="text/css" href="/frontend/css/navigation-menu.css">
	<link rel="stylesheet" type="text/css" href="/frontend/css/shortcode.css">
	<link rel="stylesheet" type="text/css" href="/frontend/css/style.css">
	<link rel="stylesheet" type="text/css" href="/frontend/css/custom.css">

	<!-- plugins -->
	<link rel="stylesheet" type="text/css" href="/plugins/sweetalert2/sweetalert2.min.css">
	
	<!-- fontawesome -->
	<script src="https://kit.fontawesome.com/8ed168bb40.js" crossorigin="anonymous"></script>

	<!--[if lt IE 9]>
		<script src="js/html5/respond.min.js"></script>
    <![endif]-->
	
</head>

<body data-offset="200" data-spy="scroll" data-target=".ow-navigation">
	<div class="main-container">
		<!-- Loader -->
		<div id="site-loader" class="load-complete">
			<div class="loader">
				<div class="loader-inner ball-clip-rotate">
					<div></div>
				</div>
			</div>
		</div><!-- Loader /- -->

		<!-- Header -->
		<header class="header-section container-fluid no-padding">
			<!-- Top Header -->
			<div class="top-header container-fluid no-padding">
				<!-- Container -->
				<div class="container">
					<div class="col-md-7 col-sm-7 col-xs-7 dropdown-bar">
						<!-- <h5>Welcome To Aisha Abubarka</h5>
						<div class="language-dropdown dropdown">
							<button aria-expanded="true" aria-haspopup="true" data-toggle="dropdown" title="languages" id="language" type="button" class="btn dropdown-toggle">English <span class="caret"></span></button>
							<ul class="dropdown-menu no-padding">
								<li><a title="Danish" href="#">Danish</a></li>
								<li><a title="German" href="#">German</a></li>
								<li><a title="French" href="#">French</a></li>
							</ul>
						</div> -->
						<div class="language-dropdown dropdown">
							<button aria-expanded="true" aria-haspopup="true" data-toggle="dropdown" title="<?= $default_currency['name'] ?>" id="currency" type="button" class="btn dropdown-toggle">
								<?= $default_currency['code']." ".$default_currency['symbol'] ?><span class="caret"></span>
							</button>
							<ul class="dropdown-menu no-padding">
								<?php foreach ($currencies as $currency): ?>
									<?php if ($currency['code'] !== $default_currency['code']): ?>
										<li><a title="<?= $currency['name'] ?>" href="/currency/<?= $currency['code'] ?>"><?= $currency['code']." ".$currency['symbol'] ?></a></li>
									<?php endif ?>
									
								<?php endforeach ?>
							</ul>
						</div>
					</div>

					<!-- Social -->
					<div class="col-md-5 col-sm-5 col-xs-5 header-social"> 
						<ul>
							<li><a href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#" title="Twitter"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="#" title="Tumblr"><i class="fa fa-tumblr"></i></a></li>
							<li><a href="#" title="Vimeo"><i class="fa fa-vimeo"></i></a></li>
							<li><a href="#" title="Pinterest"><i class="fa fa-pinterest-p"></i></a></li>
						</ul>
					</div>

				</div><!-- Container /- -->
			</div><!-- Top Header /- -->
			
			<!-- Menu Block -->
			<div class="container-fluid no-padding menu-block">
				<!-- Container -->
				<div class="container">
					<!-- nav -->
					<nav class="navbar navbar-default ow-navigation">
						<div class="navbar-header">
							<button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a href="/" class="navbar-brand">Aisha <span>Abu-Bakr</span></a>
						</div>
						<!-- Menu Icon -->
						<div class="menu-icon">
							<div class="search">	
								<a href="#" id="search" title="Search"><i class="icon icon-Search"></i></a>
							</div>
							<ul class="cart">
								<li>
									<a aria-expanded="true" aria-haspopup="true" data-toggle="dropdown" id="cart" class="btn dropdown-toggle" title="Add To Cart" href="#">
										<i class="icon icon-ShoppingCart"></i>
										<small id="increamentCart">
											<?= $cart_quantity ?>
										</small>
									</a>
									<ul id="cart-list" class="dropdown-menu no-padding">
										<li class="button">
											<a href="/cart" title="View Cart">View Cart</a>
											<a href="/checkout" title="Check Out">Check out</a>
										</li>
										<!-- cart item -->
										<?php if (isset($_SESSION['cart'])): ?>
											<?php foreach ($_SESSION['cart'] as $key => $cart): ?>

												<li id="item-<?= $key ?>" class="mini_cart_item">
													<a class="remove_cart_item" data-id="<?= $key ?>" title="Remove this item" href="#">&#215;</a>
													<a href="#" class="shop-thumbnail">
														<img alt="<?= $cart['name'] ?>" class="attachment-shop_thumbnail" src="/uploads/products/thumbs/thumb_<?= $cart['image'] ?>"><?= $cart['name'] ?>
													</a>
													<span class="quantity"><?= $cart['quantity'] ?> &#215; <span class="amount"><?= $cart['price'] ?></span></span>
												</li>
										
											<?php endforeach ?>

										<?php endif ?>
										
									</ul>
								</li>

								<!-- <li>
									<a href="#" title="Like">
										<i class="icon icon-Heart"></i>
									</a>
								</li> -->
							</ul>

							<ul class="cart" style="padding-left: 0px!important;">
								<li>
									<a href="#" title="User">
										<i class="icon icon-User"></i>
									</a>
								</li>

								<ul class="dropdown-menu no-padding account-dropdown" style="padding: 10px 5px 10px 5px !important">

									<li class="button">
									<?php if (isset($_SESSION["logged_in"])): ?>
										<a href="/logout" title="View Cart">LOGOUT</a>
									<?php else: ?>
										<a href="/signin" title="View Cart">LOGIN</a>
										<a href="/register" title="Check Out">REGISTER</a>
									<?php endif ?>
										
									</li>

									<!-- <li class="mini_cart_item">
										<a href="#" class="shop-thumbnail">
											My Account
										</a>
									</li>

									<li class="mini_cart_item">
										<a href="#" class="shop-thumbnail">
											My Orders
										</a>
									</li> -->
									
								</ul>

							</ul>

						</div><!-- Menu Icon /- -->
						<div class="navbar-collapse collapse navbar-right" id="navbar">
							<ul class="nav navbar-nav">
								<li class="active dropdown">
									<a href="/" title="Home" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">Home</a>
								</li>
								<li class="dropdown">
									<a href="#" title="Home" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">Categories </a>
									<i class="ddl-switch fa fa-angle-down"></i>
									<ul class="dropdown-menu">
									<?php foreach ($header_categories as $category): ?>				
										<li><a href="/category/<?= $category['id'] ?>" title="Cart"><?= strtoupper($category['name']) ?></a></li>
									<?php endforeach ?>				
									</ul>
								</li>
								<li><a href="/products" title="Products">Products</a></li>


								<!-- <li><a href="about" title="About Us">About Us</a></li>
								<li><a href="contact-us" title="Contact Us">Contact Us</a></li> -->
							</ul>
						</div><!--/.nav-collapse -->
					</nav><!-- nav /- -->
					<!-- Search Box -->
					<div class="search-box">
						<span><i class="icon_close"></i></span>
						<form><input type="text" class="form-control" placeholder="Enter a keyword and press enter..." /></form>
					</div><!-- Search Box /- -->
				</div><!-- Container /- -->
			</div><!-- Menu Block /- -->
		</header><!-- Header /- -->