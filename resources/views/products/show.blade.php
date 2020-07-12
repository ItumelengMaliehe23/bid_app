<!DOCTYPE html>
<html lang="en">
<head>
<title>{{$product->product_name}}</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="../styles/product_styles.css">
<link rel="stylesheet" type="text/css" href="../styles/product_responsive.css">

</head>

<body>

<div class="super_container">
	
	<!-- Header -->
	
	<header class="header">

		<!-- Top Bar -->

		<div class="top_bar">
			<div class="container">
				<div class="row">
					<div class="col d-flex flex-row">
						<div class="top_bar_contact_item"><div class="top_bar_icon"></div></div>
						<div class="top_bar_contact_item"><div class="top_bar_icon"></div></div>
						<div class="top_bar_content ml-auto">
							<div class="top_bar_menu">
								<ul class="standard_dropdown top_bar_dropdown">
								
								</ul>
							</div>
							@guest
							<div class="top_bar_user">
								@if (Route::has('register'))
								<div class="user_icon"><img src="images/user.svg" alt=""></div>
								<div><a href="{{ route('register') }}">Register</a></div>
								@endif
								<div><a href="{{ route('login') }}">Sign in</a></div>
							</div>
							@else
							<div class="top_bar_user">
								<div class="user_icon"><img src="images/user.svg" alt=""></div>
								<div><a href="/home">{{ Auth::user()->name }}</a></div>
								<div><a href="{{ route('logout') }}"
									onclick="event.preventDefault();
												  document.getElementById('logout-form').submit();">Logout</a></div>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
							</div>

							@endguest
						</div>
					</div>
				</div>
			</div>		
		</div>

		<!-- Header Main -->

		<div class="header_main">
			<div class="container">
				<div class="row">

					<!-- Logo -->
					<div class="col-lg-2 col-sm-3 col-3 order-1">
						<div class="logo_container">
							<div class="logo"><a href="/">GadgetBoy</a></div>
						</div>
					</div>

					<!-- Search -->
					<div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
						<div class="header_search">
							<div class="header_search_content">
								<div class="header_search_form_container">
									<form action="#" class="header_search_form clearfix">
										<input type="search" name="search" required="required" class="header_search_input" placeholder="Search for product">

										<button type="submit"  class="header_search_button trans_300" value="Submit"><img src="images/search.png" alt=""></button>
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- Wishlist -->
					<div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
						<div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
			

							<!-- Cart -->
							<div class="cart">
								<div class="cart_container d-flex flex-row align-items-center justify-content-end">
									@guest

									@else
									<div class="cart_icon">
										<img src="../images/cart.png" alt="">
										@php $count = 0; $price = 0; @endphp
										@foreach($carts as $cart)
										@php $count = $count + 1; @endphp
										@php $price = $price + $cart->total_price @endphp
										
										@endforeach
										<div class="cart_count"><span>@php echo $count; @endphp</span></div>
									</div>
									<div class="cart_content">
										<div class="cart_text"><a href="/cart">Cart</a></div>
										<div class="cart_price">P@php echo $price; @endphp</div>
									</div>
									@endguest
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Main Navigation -->

		<nav class="main_nav">
			<div class="container">
				<div class="row">
					<div class="col">
						
						<div class="main_nav_content d-flex flex-row">

							<!-- Categories Menu -->

						

							<!-- Main Nav Menu -->

							<div class="main_nav_menu ml-auto">
								<ul class="standard_dropdown main_nav_dropdown">
									<li><a href="/">Home<i class="fas fa-chevron-down"></i></a></li>
									<li><a href="blog.html">Blog<i class="fas fa-chevron-down"></i></a></li>
									<li><a href="contact.html">Contact<i class="fas fa-chevron-down"></i></a></li>
								</ul>
							</div>

							<!-- Menu Trigger -->

							<div class="menu_trigger_container ml-auto">
								<div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
									<div class="menu_burger">
										<div class="menu_trigger_text">menu</div>
										<div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</nav>
		
		<!-- Menu -->

		<div class="page_menu">
			<div class="container">
				<div class="row">
					<div class="col">
						
						<div class="page_menu_content">
							
							<div class="page_menu_search">
								<form action="#">
									<input type="search" required="required" class="page_menu_search_input" placeholder="Search for products...">
								</form>
							</div>
							<ul class="page_menu_nav">
								<li class="page_menu_item">
									<a href="/">Home<i class="fa fa-angle-down"></i></a>
								</li>
								<li class="page_menu_item"><a href="blog.html">blog<i class="fa fa-angle-down"></i></a></li>
								<li class="page_menu_item"><a href="contact.html">contact<i class="fa fa-angle-down"></i></a></li>
							</ul>
							
							<div class="menu_contact">
								<div class="menu_contact_item"><div class="menu_contact_icon"><img src="images/phone_white.png" alt=""></div>+38 068 005 3570</div>
								<div class="menu_contact_item"><div class="menu_contact_icon"><img src="images/mail_white.png" alt=""></div><a href="mailto:fastsales@gmail.com">fastsales@gmail.com</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</header>

	<!-- Single Product -->

	<div class="single_product">
		<div class="container">
			<div class="row">

				<!-- Images -->
				<div class="col-lg-2 order-lg-1 order-2">
					<ul class="image_list">
						<li data-image="../storage/product_imgs/{{$product->product_img_1}}"><img src="../storage/product_imgs/{{$product->product_img_1}}" alt=""></li>
						<li data-image="../storage/product_imgs/{{$product->product_img_1}}"><img src="../storage/product_imgs/{{$product->product_img_2}}" alt=""></li>

					</ul>
				</div>

				<!-- Selected Image -->
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="image_selected"><img src="/storage/product_imgs/{{$product->product_img_1}}" alt=""></div>
				</div>

				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description">
						<div class="product_category">{{$product->product_category}}</div>
						<div class="product_name">{{$product->product_name}}</div>
						<div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
						<div class="product_text"><p>{!!$product->product_disc!!}</p></div>
						<div class="order_info d-flex flex-row">
							<form action="#">
								<div class="clearfix" style="z-index: 1000;">

									<!-- Product Quantity -->
									<div class="product_quantity clearfix">
										<span>Quantity: </span>
										<input id="quantity_input" type="text" pattern="[0-9]*" value="1">
										<div class="quantity_buttons">
											<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
											<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
										</div>
									</div>

									<!-- Product Color -->
									<ul class="product_color">
										<li>
											<span>Color: </span>
											<div class="color_mark_container"><div id="selected_color" class="color_mark"></div></div>
											<div class="color_dropdown_button"><i class="fas fa-chevron-down"></i></div>

											<ul class="color_list">
												<li><div class="color_mark" style="background: #999999;"></div></li>
												<li><div class="color_mark" style="background: #b19c83;"></div></li>
												<li><div class="color_mark" style="background: #000000;"></div></li>
											</ul>
										</li>
									</ul>

								</div>

								<div class="product_price">BWP{{$product->product_price}}</div>
								<div class="button_container">
							
									
									<div class="product_fav"><i class="fas fa-heart"></i></div>
								</div>
								</form>
								@guest
									<a href="/login" class="button cart_button">Add to Cart</a>
								@else
								{!! Form::open(['action' => 'CartController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
								<input type="hidden" name="product_id" value="{{$product->id}}">
								<input type="hidden" name="product_name" value="{{$product->product_name}}">
								<input type="hidden" name="quantity" value="1">
								
								<input type="hidden" name="total_price" value="{{$product->product_price}}">
								<button type="submit" class="button cart_button">Add to Cart</button>
								
    							{!! Form::close() !!}
								@endguest

							


						</div>
					</div>
				</div>

			</div>
		</div>
	</div>







	<!-- Copyright -->

	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
						<div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> </a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</div>
						<div class="logos ml-sm-auto">
							<ul class="logos_list">
							
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../styles/bootstrap4/popper.js"></script>
<script src="../styles/bootstrap4/bootstrap.min.js"></script>
<script src="../plugins/greensock/TweenMax.min.js"></script>
<script src="../plugins/greensock/TimelineMax.min.js"></script>
<script src="../plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="../plugins/greensock/animation.gsap.min.js"></script>
<script src="../plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="../plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="../plugins/easing/easing.js"></script>
<script src="../js/product_custom.js"></script>
</body>

</html>