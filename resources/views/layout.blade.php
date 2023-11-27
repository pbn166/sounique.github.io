<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!---------Seo--------->
    <meta name="description" content="{{$meta_desc}}">
    <meta name="keywords" content="{{$meta_keywords}}"/>
    <meta name="robots" content="INDEX,FOLLOW"/>
    <link  rel="canonical" href="{{$url_canonical}}" />
    <meta name="author" content="">

    <link rel="icon" href="{{asset('public/frontend/images/logo-mail.png')}}" type="image/gif" sizes="32x32">

    <meta name="csrf-token" content="{{csrf_token()}}">

    <title>{{$meta_title}}</title>
     <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">

    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/sweetalert.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/lightgallery.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/lightslider.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettify.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/vlite.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/owl.carousel.min.css')}}" rel="stylesheet">
     <link href="{{asset('public/frontend/css/owl.theme.default.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- css e-shop -->
    <!-- Bootstrap -->
    <link href="{{asset('public/frontend/cssnew/css/bootstrap.css')}}" rel="stylesheet">
    <!-- Magnific Popup -->
    <link href="{{asset('public/frontend/cssnew/css/magnific-popup.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('public/frontend/cssnew/css/font-awesome.css')}}" rel="stylesheet">
    <!-- Fancybox -->
    <link href="{{asset('public/frontend/cssnew/css/jquery.fancybox.min.css')}}" rel="stylesheet">
    <!-- Themify Icons -->
    <link href="{{asset('public/frontend/cssnew/css/themify-icons.css')}}" rel="stylesheet">
    <!-- Nice Select CSS -->
    <link href="{{asset('public/frontend/cssnew/css/niceselect.css')}}" rel="stylesheet">
    <!-- Flex Slider CSS -->
    <link href="{{asset('public/frontend/cssnew/css/flex-slider.min.css')}}" rel="stylesheet">
    <!-- Owl Carousel -->
    <link href="{{asset('public/frontend/cssnew/css/owl-carousel.css')}}" rel="stylesheet">
    <!-- Slicknav -->
    <link href="{{asset('public/frontend/cssnew/css/slicknav.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/cssnew/css/reset.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/cssnew/style.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/cssnew/css/responsive.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

<!-- Bootstrap JavaScript (requires jQuery) -->
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->


     <!------------Share fb------------------>
    <meta property="og:url"                content="{{$url_canonical}}" />
    <meta property="og:type"               content="articles" />
    <meta property="og:title"              content="{{$meta_title}}" />
    <meta property="og:site_name" content="{{$meta_title}}"/>
    <meta property="og:description"        content="{{$meta_desc}}" />
    <meta property="og:image"              content="{{$share_image}}" />
    <!--//-------Seo--------->
</head><!--/head-->

<body>

    <header class="header shop" id="header" ><!--header-->
    <!-- Topbar -->
		<div class="topbar">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-12 col-12">
						<!-- Top Left -->
						<div class="top-left">
							<ul class="list-main">
								<li><i class="ti-headphone-alt"></i>+84 798003703</li>
								<li><i class="ti-email"></i>support@sounique.com</li>
							</ul>
						</div>
						<!--/ End Top Left -->
					</div>
					<div class="col-lg-8 col-md-12 col-12">
						<!-- Top Right -->
						<div class="right-content">
							<ul class="list-main">
								<li><i class="ti-location-pin"></i> Ninh Kiều, Cần Thơ</li>
								<li><i class="ti-alarm-clock"></i> 8AM-9PM</li>


                                <?php
                                $customer_id = Session::get('customer_id');
                                if($customer_id!=NULL){
                                    ?>
								<li><i class="ti-user"></i> <a href="{{URL::to('/dang-nhap')}}">Tài khoản:</a></li>
                                {{Session::get('customer_name')}}

                                <?php
                                }else{
                                   ?>
                                   <li><a href="{{URL::to('/dang-nhap')}}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                                   <?php
                               }
                               ?>

								<li><i class="ti-power-off"></i><a href="{{URL::to('/logout-checkout')}}">Đăng xuất</a></li>
							</ul>
						</div>
						<!-- End Top Right -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Topbar -->

        <!-- header_top -->
        <div class="middle-inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-12">
						<!-- Logo -->
						<div class="logo">
							<a href="{{URL::to('/trang-chu')}}"><img src="./public/uploads/logo/1.png" alt="logo" ></a>
						</div>
						<!--/ End Logo -->
						<!-- Search Form -->
						<div class="search-top">
							<div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
							<!-- Search Form -->
							<div class="search-top">
								<form class="search-form">
									<input type="text" placeholder="Search here..." name="search">
									<button value="search" type="submit"><i class="ti-search"></i></button>
								</form>
							</div>
							<!--/ End Search Form -->
						</div>
						<!--/ End Search Form -->
						<div class="mobile-nav"></div>
					</div>
					<div class="col-lg-8 col-md-7 col-12">
						<div class="search-bar-top">
							<div class="search-bar">

								<form action="{{URL::to('/tim-kiem')}}" autocomplete="off" method="POST">
                                {{csrf_field()}}
                                    <input type="text"name="keywords_submit" id="keywords" class="form-control" placeholder="Search Products Here....." >
									<div id="search_ajax" class="smart-search-wrapper"></div>
                                    <button  type="submit" name="search_items" class="btnn"><i class="ti-search"></i></button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-3 col-12">
						<div class="right-bar">
							<!-- Search Form -->
							<div class="sinlge-bar">
								<a href="{{URL::to('/yeu-thich')}}" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
							</div>
							<div class="sinlge-bar">
								<a href="{{URL::to('history')}}" class="single-icon"><i  class="fa fa-history"  aria-hidden="true"></i></a>
							</div>
							<div class="sinlge-bar shopping">
								<a href="{{url('gio-hang')}}" class="single-icon"><i class="ti-bag"></i> <span class="show-cart"></span>   <div class="clearfix"></div></a>
								<!-- Shopping Item -->

								<div class="shopping-item">
									<div class="dropdown-cart-header">
										<span>2 Items</span>
										<a href="#">View Cart</a>
									</div>
									<ul class="giohang-hover">
										<li class="cart-hover">
											<a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
											<a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70" alt="#"></a>
											<h4><a href="#">Woman Ring</a></h4>
											<p class="quantity">1x - <span class="amount">$99.00</span></p>
										</li>
										<li class="cart-hover">
											<a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
											<a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70" alt="#"></a>
											<h4><a href="#">Woman Necklace</a></h4>
											<p class="quantity">1x - <span class="amount">$35.00</span></p>
										</li>
									</ul>
									<div class="bottom">
										<div class="total">
											<span>Total</span>
											<span class="total-amount">$134.00</span>
										</div>
                                         <?php
                                            $customer_id = Session::get('customer_id');
                                            $shipping_id = Session::get('shipping_id');
                                            if($customer_id!=NULL && $shipping_id==NULL){
                                            ?>
										<a href="{{URL::to('/checkout')}}" class="btn animate">Thanh toán</a>
                                        <?php
                                            }elseif($customer_id!=NULL && $shipping_id!=NULL){
                                            ?>
                                            <a href="{{URL::to('/payment')}}" class="btn animate"> Thanh toán</a>
                                            <?php
                                            }else{
                                            ?>
                                            <a href="{{URL::to('/dang-nhap')}}"class="btn animate"> Thanh toán</a>
                                            <?php
                                            }
                                ?>
									</div>
								</div>
								<!--/ End Shopping Item -->
                                <!-- @php
                                    $customer_id = Session::get('customer_id');
                                    if($customer_id!=NULL)
                                    {
                                    @endphp -->
                                        <!-- <a href="{{URL::to('history')}}" class="fa fa-bell"> </a> -->
                                   <!-- @php
                                    }
                                   @endphp -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Header Inner -->
		<!-- Header Inner -->
		<div class="header-inner">
			<div class="container">
				<div class="cat-nav-head">
					<div class="row">
						<div class="col-lg-3">
							<div class="all-category">
								<h3 class="cat-heading">
                                    <!-- <i class="fa fa-bars" aria-hidden="true"></i> -->
                                SOUNIQUE</h3>
								<!-- <ul role="menu" class="main-category">
                                @foreach($category as $key => $cate)
                                        @if($cate->category_parent==0)
									<li><a href="{{URL::to('/danh-muc/'.$cate->slug_category_product)}}">{{$cate->category_name}}<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                    @foreach($category as $key => $cate_sub)
                                     @if($cate_sub->category_parent==$cate->category_id)
                                    <ul class="sub-category">

											<li><a href="{{URL::to('/danh-muc/'.$cate_sub->slug_category_product)}}">{{$cate_sub->category_name}}</a></li>

										</ul>
                                        @endif
                                         @endforeach
									</li>
                                    @endif
                                    @endforeach

								</ul> -->
							</div>
						</div>
						<div class="col-lg-9 col-12">
							<div class="menu-area">
								<!-- Main Menu -->
								<nav class="navbar navbar-expand-lg" id="navbar">
									<div class="navbar-collapse">
										<div class="nav-inner">
											<ul class="nav main-menu menu navbar-nav">
													<li class="active"><a href="{{URL::to('/trang-chu')}}">Trang chủ</a></li>
                                                    <li><a href="{{URL::to('/danh-muc/')}}">Danh mục<i class="ti-angle-down"></i></a>
                                                        <ul class="dropdown">
                                                             @foreach($category as $key => $cate)
                                                            @if($cate->category_parent==0)
                                                                <li><a href="{{URL::to('/danh-muc/'.$cate->slug_category_product)}}">{{$cate->category_name}}<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                                                @foreach($category as $key => $cate_sub)
                                                                @if($cate_sub->category_parent==$cate->category_id)
                                                                <ul class="sub-category">
                                                                    <li><a href="{{URL::to('/danh-muc/'.$cate_sub->slug_category_product)}}">{{$cate_sub->category_name}}</a></li>
                                                                </ul>
                                                                    @endif
                                                                    @endforeach
                                                                </li>
                                                            @endif
                                                            @endforeach

                                                        </ul>
													</li>
													<li><a href="#">Sản phẩm</a></li>

													<!-- <li><a href="#">Tin tức</a></li> -->

													<li><a href="#">Tin tức<i class="ti-angle-down"></i><span class="new">New</span></a>
														<ul class="dropdown">
                                                        @foreach($category_post as $key => $danhmucbaiviet)
															<!-- <li><a href="shop-grid.html">Shop Grid</a></li> -->
															<li><a href="{{URL::to('/danh-muc-bai-viet/'.$danhmucbaiviet->cate_post_slug)}}">{{$danhmucbaiviet->cate_post_name}}</a>
                                                            @endforeach
															<!-- <li><a href="checkout.html">Checkout</a></li> -->
														</ul>
													</li>
													<!-- <li><a href="#">Pages</a></li> -->

													<
													<li><a href="{{URL::to('/lien-he')}}">Liên hệ</a></li>
												</ul>
										</div>
									</div>
								</nav>
								<!--/ End Main Menu -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Header Inner -->




    </header><!--/header-->













    <!-------------------Slider Section------------------------->
    @yield('slider')

    <!-- Single banner -->
    @yield('banner')
	<!-- Start Product Area -->

	<!-- End Product Area -->

	<!-- Start Midium Banner  -->

	<!-- End Midium Banner -->
    <!-------------------Slider Attribute------------------------->
    <!-- @yield('attribute') -->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 padding-right">

                   @yield('content_category')
                   @yield('content_brand')
                    @yield('content_cart')
                    @yield('content_checkout')
                </div>

                @yield('sidebar')

                <div class="col-sm-9 padding-right">

                   @yield('content')

                </div>
                 <style type="text/css">
                    h3.doitac {
                            text-align: center;
                            font-size: 20px;
                            text-transform: uppercase;
                            margin: 20px;
                            font-weight: bold;
                        }
                    h4.doitac_name {
                            text-align: center;
                            font-size: 13px;
                        }
                        .item img {
                            height: 100px;
                        }
                        button.owl-prev {
                            font-size: 45px !important;

                        }
                        button.owl-next {
                            font-size: 45px !important;

                        }
                 </style>
              {{--   <div class="col-md-12">
                    <h3 class="doitac">Đối tác của chúng tôi</h3>
                    <div class="owl-carousel owl-theme">
                        @foreach($icons_doitac as $key => $doitac)
                        <div class="item" style="padding-left:0 !important; ">
                            <a target="_blank" href="{{$doitac->link}}"><p><img width="100%" src="{{asset('public/uploads/icons/'.$doitac->image)}}"></p>
                            <h4 class="doitac_name">{{$doitac->name}}</h4></a>
                        </div>
                        @endforeach
                    </div>
                </div> --}}

            </div>
        </div>
    </section>

    <!-- Start Footer Area -->
	<footer class="footer">
		<!-- Footer Top -->
		<div class="footer-top section">
			<div class="container">
				<div class="row">
                @foreach($contact_footer as $key => $logo)
					<div class="col-lg-5 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer about">
							<div class="logo">
								<a href="index.html"><img src="{{asset('/public/uploads/contact/'.$logo->info_logo)}}"></a>
							</div>
							<p class="text">{{$logo->slogan_logo}}.</p>
							<p class="call">Got Question? Call us 24/7<span><a href="tel:123456789">0798003703</a></span></p>
						</div>
                        @endforeach
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-2 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer links">
							<h4> Thông tin</h4>
							<ul>
								<li><a href="#">About Us</a></li>
								<li><a href="#">Faq</a></li>
								<li><a href="#">Terms & Conditions</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Help</a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-2 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer links">
							<h4>Dịch vụ chúng tôi</h4>
							<ul>
                            @foreach($post_footer as $key => $post_foot)
								<li><a href="{{url('/bai-viet/'.$post_foot->post_slug)}}">{{$post_foot->post_title}}</a></li>

                                @endforeach
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer social">
							<h4>Địa chỉ</h4>
							<!-- Single Widget -->

							<div class="contact">
                            @foreach($contact_footer as $key => $contact_foo)
                            <ul>

									<li>{!!$contact_foo->info_contact!!}</li>
									<!-- <li>012 United Kingdom.</li>
									<li>info@eshop.com</li>
									<li>+032 3456 7890</li> -->
								</ul>

							</div>
							<!-- End Single Widget -->
							<ul>
								<li><a href="#"><i class="ti-facebook"></i></a></li>
								<li><a href="#"><i class="ti-twitter"></i></a></li>
								<li><a href="#"><i class="ti-flickr"></i></a></li>
								<li><a href="#"><i class="ti-instagram"></i></a></li>
							</ul>
						</div>
						<!-- End Single Widget --> @endforeach
					</div>
				</div>
			</div>
		</div>
		<!-- End Footer Top -->
		<div class="copyright">
			<div class="container">
				<div class="inner">
					<div class="row">
						<div class="col-lg-6 col-12">
							<div class="left">
								<p>Copyright © 2020 <a href="souniquestore.com" target="_blank"></a>  -  All Rights Reserved.</p>
							</div>
						</div>
						<div class="col-lg-6 col-12">
							<div class="right">
								<img src="images/payments.png" alt="#">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- /End Footer Area -->

<!-- JavaScripts -->
<!-- <script src="{{asset('public/frontend/cssnew/js/jquery.min.js')}}"></script>
<script src="{{asset('public/frontend/cssnew/js/jquery-migrate-3.0.0.js')}}"></script>
 <script src="{{asset('public/frontend/cssnew/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('public/frontend/cssnew/js/popper.min.js')}}"></script>
<script src="{{asset('public/frontend/cssnew/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/frontend/cssnew/js/colors.js')}}"></script>
<script src="{{asset('public/frontend/cssnew/js/slicknav.min.js')}}"></script>
<script src="{{asset('public/frontend/cssnew/js/owl-carousel.js')}}"></script>
<script src="{{asset('public/frontend/cssnew/js/magnific-popup.js')}}"></script>
<script src="{{asset('public/frontend/cssnew/js/waypoints.min.js')}}"></script>
<script src="{{asset('public/frontend/cssnew/js/finalcountdown.min.js')}}"></script>
<script src="{{asset('public/frontend/cssnew/js/nicesellect.js')}}"></script>
<script src="{{asset('public/frontend/cssnew/js/flex-slider.js')}}"></script>
<script src="{{asset('public/frontend/cssnew/js/scrollup.js')}}"></script>
<script src="{{asset('public/frontend/cssnew/js/onepage-nav.min.js')}}"></script>
<script src="{{asset('public/frontend/cssnew/js/easing.js')}}"></script>
<script src="{{asset('public/frontend/cssnew/js/active.js')}}"></script> -->



<script src="{{asset('public/frontend/js/jquery.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>


    <script src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/lightgallery-all.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/lightslider.js')}}"></script>
    <script src="{{asset('public/frontend/js/prettify.js')}}"></script>
    <script src="{{asset('public/frontend/js/vlite.js')}}"></script>
    <script src="{{asset('public/frontend/js/simple.money.format.js')}}"></script>
    <script src="{{asset('public/frontend/js/owl.carousel.js')}}"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://sp.zalo.me/plugins/sdk.js"></script>

    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <!-- <script type="text/javascript">
                // JavaScript để thêm hoặc xóa class "sticky" cho header khi người dùng cuộn trang
        window.onscroll = function() {stickyHeader()};

        var header = document.getElementById("myHeader");
        var sticky = header.offsetTop;

        function stickyHeader() {
            if (window.pageYOffset > sticky) {
                header.classList.add("sticky");
            } else {
                header.classList.remove("sticky");
            }
    }
    </script> -->



    <script type="text/javascript">
        function Huydonhang(id){
            var order_code = id;
            var lydo = $('.lydohuydon').val();

            var _token = $('input[name="_token"]').val();

            $.ajax({
                url:'{{url('/huy-don-hang')}}',
                method:"POST",

                data:{order_code:order_code, lydo:lydo, _token:_token},
                success:function(data){
                    alert('Hủy đơn hàng thành công');
                    location.reload();
                }

            });
        }
    </script>
    <script type="text/javascript">
        load_more_product();

        cart_session();
        function cart_session(){
             $.ajax({
                    url:'{{url('/cart-session')}}',
                    method:"GET",
                    success:function(data){
                        $('#cart_session').html(data);
                    }

                });
        }
        htmlLoaded();

        function htmlLoaded() {

        $(window).load(function() {

               var id = [];

                $(".cart_id").each(function() {
                    id.push($(this).val());
                    //alert(id);

                });

                for(var i = 0; i<id.length; i++){

                    $('.home_cart_'+id[i]).hide();
                    $('.rm_home_cart_'+id[i]).show();

                }

            });
        }

        function load_more_product(id = ''){
            $.ajax({
                url:'{{url('/load-more-product')}}',
                method:"POST",

                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                data:{id:id},
                success:function(data){
                    $('#load_more_button').remove();

                    $('#all_product').append(data);

                    var id = [];

                    $(".cart_id").each(function() {
                        id.push($(this).val());
                        //alert(id);

                    });

                    for(var i = 0; i<id.length; i++){

                        $('.home_cart_'+id[i]).hide();
                        $('.rm_home_cart_'+id[i]).show();

                    }


                }

            });
        }
        $(document).on('click','#load_more_button',function(){
            var id = $(this).data('id');
            $('#load_more_button').html('<b>Loading...</b>');
            load_more_product(id);


        })

    </script>
    <script type="text/javascript">
        // When the user scrolls the page, execute myFunction
        window.onscroll = function() {
            sticky_navbar()
        };

        // Get the navbar
        var navbar = document.getElementById("navbar");

        // Get the offset position of the navbar
        var sticky = navbar.offsetTop;

        // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
        function sticky_navbar() {
          if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
          } else {
            navbar.classList.remove("sticky");
          }
        }
    </script>
    <script type="text/javascript">
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            dots:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        })
    </script>
    <script>
        var usd = document.getElementById("vnd_to_usd").value;
      paypal.Button.render({

        // Configure environment
        env: 'sandbox',

        client: {
          sandbox: 'AXrZz-zLToqfMr-uQpcv3efjJ03lkeRJZf1XkivTFGTvF1Ul7qBf6fZNauuByqW9jtni0wrygLUE8gkQ',
          production: 'demo_production_client_id'
        },
        // Customize button (optional)
        locale: 'en_US',
        style: {
          size: 'small',
          color: 'gold',
          shape: 'pill',
        },

        // Enable Pay Now checkout flow (optional)
        commit: true,

        // Set up a payment
        payment: function(data, actions) {
          return actions.payment.create({
            transactions: [{
              amount: {
                total: `${usd}`,
                currency: 'USD'
              }
            }]
          });
        },
        // Execute the payment
        onAuthorize: function(data, actions) {
          return actions.payment.execute().then(function() {
            // Show a confirmation message to the buyer
            window.alert('Cảm ơn bạn đã mua hàng của chúng tôi!');
          });
        }
      }, '#paypal-button');

    </script>
    <div id="fb-root"></div>

	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0&appId=2339123679735877&autoLogAppEvents=1"></script>

		<!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v9.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="100332251915013"
	  theme_color="#0A7CFF"
	  logged_in_greeting="Chào bạn,shop có thể giúp gì được cho bạn?"
	  logged_out_greeting="Chào bạn,shop có thể giúp gì được cho bạn?">
      </div>
	<script type="text/javascript">
        $(document).ready(function(){

           $( "#slider-range" ).slider({
              orientation: "horizontal",
              range: true,

              min:{{$min_price_range}},
              max:{{$max_price_range}},

              steps:10000,
              values: [ {{$min_price}}, {{$max_price}} ],

              slide: function( event, ui ) {
                $( "#amount_start" ).val(ui.values[ 0 ]).simpleMoneyFormat();
                $( "#amount_end" ).val(ui.values[ 1 ]).simpleMoneyFormat();


                $( "#start_price" ).val(ui.values[ 0 ]);
                $( "#end_price" ).val(ui.values[ 1 ]);

              }

            });

            $( "#amount_start" ).val($( "#slider-range" ).slider("values",0)).simpleMoneyFormat();
            $( "#amount_end" ).val($( "#slider-range" ).slider("values",1)).simpleMoneyFormat();

        });
</script>
<script type="text/javascript">
        $(document).ready(function(){

            $('#sort').on('change',function(){

                var url = $(this).val();
                // alert(url);
                  if (url) {
                      window.location = url;
                  }
                return false;
            });

        });
</script>
<script type="text/javascript">
    function delete_compare(id){

             if(localStorage.getItem('compare')!=null){

                 var data = JSON.parse(localStorage.getItem('compare'));

                 var index = data.findIndex(item => item.id === id);

                 data.splice(index, 1);

                localStorage.setItem('compare', JSON.stringify(data));
                //remove element by id
                document.getElementById("row_compare"+id).remove();

        }
    }
   sosanh();

    function sosanh(){


         if(localStorage.getItem('compare')!=null){

             var data = JSON.parse(localStorage.getItem('compare'));


             for(i=0;i<data.length;i++){

                var name = data[i].name;
                var price = data[i].price;
                var image = data[i].image;
                var url = data[i].url;
                var id = data[i].id;

                 $('#row_compare').find('tbody').append(`
                                                         <tr id="row_compare`+id+`">
                                                            <td>`+name+`</td>
                                                            <td>`+price+`</td>
                                                            <td><img width="200px" src="`+image+`"></td>
                                                            <td></td>
                                                            <td><a href="`+url+`">Xem sản phẩm</a></td>
                                                            <td><a style="cursor:pointer" onclick="delete_compare(`+id+`)">Xóa so sánh</a></td>
                                                          </tr>


                `);
            }

        }

    }


    function add_compare(product_id){

        // document.getElementById('title-compare').innerText = 'Chỉ cho phép so sánh tối đa 4 sản phẩm';

        var id = product_id;

        var name = document.getElementById('wishlist_productname'+id).value;
        // var content = document.getElementById('wishlist_productcontent'+id).value;
        var price = document.getElementById('wishlist_productprice'+id).value;
        var image = document.getElementById('wishlist_productimage'+id).src;
        var url = document.getElementById('wishlist_producturl'+id).href;

        var newItem = {
            'url':url,
            'id' :id,
            'name': name,
            'price': price,
            'image': image
            // 'content':content
        }

        if(localStorage.getItem('compare')==null){
           localStorage.setItem('compare', '[]');
        }

        var old_data = JSON.parse(localStorage.getItem('compare'));

        var matches = $.grep(old_data, function(obj){
            return obj.id == id;
        })

        if(matches.length){

        }else{
            if(old_data.length<=3){

                old_data.push(newItem);

                $('#row_compare').find('tbody').append(`
                                                         <tr id="row_compare`+id+`">
                                                            <td>`+newItem.name+`</td>
                                                            <td>`+newItem.price+`</td>
                                                            <td><img width="200px" src="`+newItem.image+`"></td>
                                                            <td></td>
                                                            <td><a href="`+url+`">Xem sản phẩm</a></td>
                                                            <td><a style="cursor:pointer" onclick="delete_compare(`+id+`)">Xóa so sánh</a></td>
                                                          </tr>


                `);
            }


        }

        localStorage.setItem('compare', JSON.stringify(old_data));
        $('#sosanh').modal();


    }
</script>
<script type="text/javascript">

    function viewed(){


         if(localStorage.getItem('viewed')!=null){

             var data = JSON.parse(localStorage.getItem('viewed'));

             data.reverse();

             document.getElementById('row_viewed').style.overflow = 'scroll';
             document.getElementById('row_viewed').style.height = '500px';

             for(i=0;i<data.length;i++){

                var name = data[i].name;
                var price = data[i].price;
                var image = data[i].image;
                var url = data[i].url;

                $('#row_viewed').append('<div class="row" style="margin:10px 0"><div class="col-md-4"><img width="100%" src="'+image+'"></div><div class="col-md-8 info_wishlist"><p>'+name+'</p><p style="color:#FE980F">'+price+'</p><a href="'+url+'">Xem ngay</a></div>');
            }

        }

    }
    viewed();
    product_viewed();
    function product_viewed(){

        var id_product = $('#product_viewed_id').val();
        if(id_product != undefined){
            var id = id_product;
            var name = document.getElementById('viewed_productname'+id).value;
            var url = document.getElementById('viewed_producturl'+id).value;
            var price = document.getElementById('viewed_productprice'+id).value;
            var image = document.getElementById('viewed_productimage'+id).value;


            var newItem = {
                'url':url,
                'id' :id,
                'name': name,
                'price': price,
                'image': image
            }

            if(localStorage.getItem('viewed')==null){
               localStorage.setItem('viewed', '[]');
            }

            var old_data = JSON.parse(localStorage.getItem('viewed'));

            var matches = $.grep(old_data, function(obj){
                return obj.id == id;
            })

            if(matches.length){


            }else{

                old_data.push(newItem);

               $('#row_viewed').append('<div class="row" style="margin:10px 0"><div class="col-md-4"><img width="100%" src="'+newItem.image+'"></div><div class="col-md-8 info_wishlist"><p>'+newItem.name+'</p><p style="color:#FE980F">'+newItem.price+'</p><a href="'+newItem.url+'">Đặt hàng</a></div>');

            }

            localStorage.setItem('viewed', JSON.stringify(old_data));
        }





   }
</script>
<script type="text/javascript">

     function view(){


         if(localStorage.getItem('data')!=null){

             var data = JSON.parse(localStorage.getItem('data'));

             data.reverse();

             document.getElementById('row_wishlist').style.overflow = 'scroll';
             document.getElementById('row_wishlist').style.height = '500px';

             for(i=0;i<data.length;i++){

                var name = data[i].name;
                var price = data[i].price;
                var image = data[i].image;
                var url = data[i].url;

                $('#row_wishlist').append('<div class="row" style="margin:10px 0"><div class="col-md-4"><img width="100%" src="'+image+'"></div><div class="col-md-8 info_wishlist"><p>'+name+'</p><p style="color:#FE980F">'+price+'</p><a href="'+url+'">Đặt hàng</a></div>');
            }

        }

    }

    view();


   function add_wistlist(clicked_id){

        var id = clicked_id;
        var name = document.getElementById('wishlist_productname'+id).value;
        var price = document.getElementById('wishlist_productprice'+id).value;
        var image = document.getElementById('wishlist_productimage'+id).src;
        var url = document.getElementById('wishlist_producturl'+id).href;

        var newItem = {
            'url':url,
            'id' :id,
            'name': name,
            'price': price,
            'image': image
        }

        if(localStorage.getItem('data')==null){
           localStorage.setItem('data', '[]');
        }

        var old_data = JSON.parse(localStorage.getItem('data'));

        var matches = $.grep(old_data, function(obj){
            return obj.id == id;
        })

        if(matches.length){
            alert('Sản phẩm bạn đã yêu thích,nên không thể thêm');

        }else{

            old_data.push(newItem);

           $('#row_wishlist').append('<div class="row" style="margin:10px 0"><div class="col-md-4"><img width="100%" src="'+newItem.image+'"></div><div class="col-md-8 info_wishlist"><p>'+newItem.name+'</p><p style="color:#FE980F">'+newItem.price+'</p><a href="'+newItem.url+'">Đặt hàng</a></div>');

        }

        localStorage.setItem('data', JSON.stringify(old_data));


   }
</script>
<script type="text/javascript">
    $(document).ready(function(){

            var cate_id = $('.tabs_pro').data('id');
            var _token = $('input[name="_token"]').val();
            //alert(cate_id);
            $.ajax({
                url:'{{url('/product-tabs')}}',
                method:"POST",
                data:{cate_id:cate_id,_token:_token},
                success:function(data){
                    $('#tabs_product').html(data);

                }

            });

        $('.tabs_pro').click(function(){

            var cate_id = $(this).data('id');
            // alert(cate_id);
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:'{{url('/product-tabs')}}',
                method:"POST",
                data:{cate_id:cate_id,_token:_token},

                success:function(data){
                    $('#tabs_product').html(data);
                }

            });

        });



    });
</script>

<script type="text/javascript">
    function remove_background(product_id)
     {
      for(var count = 1; count <= 5; count++)
      {
       $('#'+product_id+'-'+count).css('color', '#ccc');
      }
    }
    //hover chuột đánh giá sao
   $(document).on('mouseenter', '.rating', function(){
      var index = $(this).data("index");
      var product_id = $(this).data('product_id');
    // alert(index);
    // alert(product_id);
      remove_background(product_id);
      for(var count = 1; count<=index; count++)
      {
       $('#'+product_id+'-'+count).css('color', '#ffcc00');
      }
    });
   //nhả chuột ko đánh giá
   $(document).on('mouseleave', '.rating', function(){
      var index = $(this).data("index");
      var product_id = $(this).data('product_id');
      var rating = $(this).data("rating");
      remove_background(product_id);
      //alert(rating);
      for(var count = 1; count<=rating; count++)
      {
       $('#'+product_id+'-'+count).css('color', '#ffcc00');
      }
     });

    //click đánh giá sao
    $(document).on('click', '.rating', function(){
          var index = $(this).data("index");
          var product_id = $(this).data('product_id');
            var _token = $('input[name="_token"]').val();
          $.ajax({
           url:"{{url('insert-rating')}}",
           method:"POST",
           data:{index:index, product_id:product_id,_token:_token},
           success:function(data)
           {
            if(data == 'done')
            {
             alert("Bạn đã đánh giá "+index +" trên 5");
            }
            else
            {
             alert("Lỗi đánh giá");
            }
           }
    });

    });
</script>
<script type="text/javascript">
    $(document).ready(function(){

        load_comment();

        function load_comment(){
            var product_id = $('.comment_product_id').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
              url:"{{url('/load-comment')}}",
              method:"POST",
              data:{product_id:product_id, _token:_token},
              success:function(data){

                $('#comment_show').html(data);
              }
            });
        }
        $('.send-comment').click(function(){
            var product_id = $('.comment_product_id').val();
            var comment_name = $('.comment_name').val();
            var comment_content = $('.comment_content').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
              url:"{{url('/send-comment')}}",
              method:"POST",
              data:{product_id:product_id,comment_name:comment_name,comment_content:comment_content, _token:_token},
              success:function(data){

                $('#notify_comment').html('<span class="text text-success">Thêm bình luận thành công, bình luận đang chờ duyệt</span>');
                load_comment();
                $('#notify_comment').fadeOut(9000);
                $('.comment_name').val('');
                $('.comment_content').val('');
              }
            });
        });
    });
</script>
<script type="text/javascript">

    function XemNhanh(id){
        var product_id = id;
            var _token = $('input[name="_token"]').val();
            $.ajax({
            url:"{{url('/quickview')}}",
            method:"POST",
            dataType:"JSON",
            data:{product_id:product_id, _token:_token},
              success:function(data){
                // Rút gọn nội dung sản phẩm
            var shortDescription = data.product_desc.substring(0, 500); // Giả sử chỉ hiển thị 100 ký tự đầu tiên
            if (data.product_desc.length > 500) {
                shortDescription += '... <a href="#" class="read-more">Xem thêm</a>'; // Thêm link "Xem thêm" để mở rộng nội dung
            }

            // Hiển thị nội dung rút gọn trong phần tử có id là #product_quickview_desc
            $('#product_quickview_desc').html(shortDescription);

            // Lắng nghe sự kiện click vào link "Xem thêm" để mở rộng nội dung
            $('#product_quickview_desc').on('click', '.read-more', function (event) {
                event.preventDefault();
                $('#product_quickview_desc').html(data.product_desc); // Hiển thị nội dung đầy đủ khi click vào "Xem thêm"
            });
                $('#product_quickview_title').html(data.product_name);
                $('#product_quickview_id').html(data.product_id);
                $('#product_quickview_price').html(data.product_price);
                $('#product_quickview_image').html(data.product_image);
                $('#product_quickview_gallery').html(data.product_gallery);

                $('#product_quickview_content').html(data.product_content);
                $('#product_quickview_value').html(data.product_quickview_value);
                $('#product_quickview_button').html(data.product_button);
                $('#product_quickview_info').html(data.product_info);
              }
            });
            $(document).ready(function() {

        $('#imageGallery').lightSlider({

            gallery:true,
            item:1,
            loop:true,
            thumbItem:3,
            slideMargin:0,
            enableDrag: false,
            currentPagerPosition:'left',
            onSliderLoad: function(el) {
                el.lightGallery({
                    selector: '#imageGallery .lslide'
                });
            }

        });
      });
    }


</script>

<script type="text/javascript">

        $('.xemnhanh').click(function(){
            var product_id = $(this).data('id_product');
            var _token = $('input[name="_token"]').val();
            $.ajax({
            url:"{{url('/quickview')}}",
            method:"POST",
            dataType:"JSON",
            data:{product_id:product_id, _token:_token},
              success:function(data){
                $('#product_quickview_title').html(data.product_name);
                $('#product_quickview_id').html(data.product_id);
                $('#product_quickview_price').html(data.product_price);
                $('#product_quickview_image').html(data.product_image);

                $('#product_quickview_desc').html(data.product_desc);
                $('#product_quickview_content').html(data.product_content);
                $('#product_quickview_value').html(data.product_quickview_value);
                $('#product_quickview_button').html(data.product_button);
              }
            });
        });

</script>
<script type="text/javascript">
    $('#keywords').keyup(function(){
        var query = $(this).val();

          if(query != '')
            {
             var _token = $('input[name="_token"]').val();

             $.ajax({
              url:"{{url('/autocomplete-ajax')}}",
              method:"POST",
              data:{query:query, _token:_token},
              success:function(data){
               $('#search_ajax').fadeIn();
                $('#search_ajax').html(data);
              }
             });

            }else{

                $('#search_ajax').fadeOut();
            }
    });

    $(document).on('click', '.li_search_ajax', function(){
        $('#keywords').val($(this).text());
        $('#search_ajax').fadeOut();
    });
</script>

<script type="text/javascript">
     $(document).ready(function() {
        $('#imageGallery').lightSlider({

            gallery:true,
            item:1,
            loop:true,
            thumbItem:3,
            slideMargin:0,
            enableDrag: false,
            currentPagerPosition:'left',
            onSliderLoad: function(el) {
                el.lightGallery({
                    selector: '#imageGallery .lslide'
                });
            }

        });
      });
</script>
    <script type="text/javascript">

        $(document).on('click','.watch-video',function(){
            var video_id = $(this).attr('id');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:'{{url('/watch-video')}}',
                method:"POST",
                dataType:"JSON",
                data:{video_id:video_id,_token:_token},
                success:function(data){
                    $('#video_title').html(data.video_title);
                    $('#video_link').html(data.video_link);
                    $('#video_desc').html(data.video_desc);
                    var playerYT = new vlitejs({
                        selector: '#my_yt_video',
                        options: {
                          // auto play
                          autoplay: false,

                          // enable controls
                          controls: true,

                          // enables play/pause buttons
                          playPause: true,

                          // shows progress bar
                          progressBar: true,

                          // shows time
                          time: true,

                          // shows volume control
                          volume: true,

                          // shows fullscreen button
                          fullscreen: true,

                          // path to poster image
                          poster: null,

                          // shows play button
                          bigPlay: true,

                          // hide the control bar if the user is inactive
                          autoHide: false,

                          // keeps native controls for touch devices
                          nativeControlsForTouch: false
                        },
                        onReady: (player) => {
                          // callback function here
                        }
                    });

                }

            });
        });
    </script>

    <script type="text/javascript">

          $(document).ready(function(){
            $('.send_order').click(function(){
          var total_after = $('.total_after').val();
                swal({
                  title: "Xác nhận đơn hàng",
                  text: "Đơn hàng sẽ không được hoàn trả khi đặt,bạn có muốn đặt không?",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonClass: "btn-danger",
                  confirmButtonText: "Cảm ơn, Mua hàng",

                    cancelButtonText: "Đóng,chưa mua",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm){
                     if (isConfirm) {
                        var shipping_email = $('.shipping_email').val();
                        var shipping_name = $('.shipping_name').val();
                        var shipping_address = $('.shipping_address').val();
                        var shipping_phone = $('.shipping_phone').val();
                        var shipping_notes = $('.shipping_notes').val();
                        var shipping_method = $('.payment_select').val();

                        var order_fee = $('.order_fee').val();
                        var order_coupon = $('.order_coupon').val();
                        var _token = $('input[name="_token"]').val();

                        $.ajax({
                            url: '{{url('/confirm-order')}}',
                            method: 'POST',
                            data:{shipping_email:shipping_email,shipping_name:shipping_name,shipping_address:shipping_address,shipping_phone:shipping_phone,shipping_notes:shipping_notes,_token:_token,order_fee:order_fee,order_coupon:order_coupon,shipping_method:shipping_method},
                            success:function(){
                               swal("Đơn hàng", "Đơn hàng của bạn đã được gửi thành công", "success");
                            }
                        });

                        window.setTimeout(function(){
                             window.location.href = "{{url('/history')}}";
                        } ,3000);

                      } else {
                        swal("Đóng", "Đơn hàng chưa được gửi, làm ơn hoàn tất đơn hàng", "error");

                      }

                });


            });
        });


    </script>
    <script type="text/javascript">



        hover_cart();
        show_cart();

        function hover_cart(){
             $.ajax({
                    url:'{{url('/hover-cart')}}',
                    method:"GET",
                    success:function(data){
                        $('.giohang-hover').html(data);

                    }

                });
        }

            //show cart quantity
            function show_cart(){
                  $.ajax({
                    url:'{{url('/show-cart')}}',
                    method:"GET",
                    success:function(data){
                        $('.show-cart').html(data);

                    }

                });
            }

        function Deletecart(id){
            var id = id;
            // alert(id);
              $.ajax({
                    url:'{{url('/remove-item')}}',
                    method:"GET",
                    data:{id:id},
                    success:function(data){
                        alert('Xóa sản phẩm trong giỏ hàng thành công');

                        document.getElementsByClassName("home_cart_"+id)[0].style.display = "inline";
                        document.getElementsByClassName("rm_home_cart_"+id)[0].style.display = "none";

                        hover_cart();
                        show_cart();
                        cart_session();

                    }

                });
        }
        $(document).ready(function(){

            $('.add-to-cart').click(function(){

                var id = $(this).data('id_product');
               // alert(id);
                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_image = $('.cart_product_image_' + id).val();
                var cart_product_quantity = $('.cart_product_quantity_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var _token = $('input[name="_token"]').val();

                if(parseInt(cart_product_qty)>parseInt(cart_product_quantity)){
                    alert('Làm ơn đặt nhỏ hơn ' + cart_product_quantity);
                }else{

                    $.ajax({
                        url: '{{url('/add-cart-ajax')}}',
                        method: 'POST',
                        data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token,cart_product_quantity:cart_product_quantity},
                        success:function(){

                            swal({
                                    title: "Đã thêm sản phẩm vào giỏ hàng",
                                    text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                    showCancelButton: true,
                                    cancelButtonText: "Xem tiếp",
                                    confirmButtonClass: "btn-success",
                                    confirmButtonText: "Đi đến giỏ hàng",
                                    closeOnConfirm: false
                                },
                                function() {
                                    window.location.href = "{{url('/gio-hang')}}";
                                });

                          show_cart();
                          hover_cart();
                          cart_session();
                        }

                    });
                }


            });

        });
    </script>

    <script type="text/javascript">

        function show_quick_cart(){
             $.ajax({
                        url: '{{url('/show_quick_cart')}}',
                        method: 'GET',
                        success:function(data){
                           $('#show_quick_cart').html(data);
                            $('#quick-cart').modal();
                        }

                    });
        }

        function DeleteItemCart($session_id){
            var session_id = $session_id;
            var _token = $('input[name="_token"]').val();
            $.ajax({
                        url: '{{url('/del-product')}}' + '/' +session_id,
                        method: 'GET',
                        data:{_token:_token},

                        success:function(){

                            $('.show_quick_cart_alert').append('<p class="text text-success">Xóa sản phẩm trong giỏ hàng thành công.</p>');
                            setTimeout(function() {
                               $('.show_quick_cart_alert').fadeOut(1000);

                            }, 1000);


                            show_quick_cart();
                        }

                    });
        }

        $(document).on('input', '.cart_qty_update', function(){

            var quantity = $(this).val();
            var session_id = $(this).data('session_id');

            var _token = $('input[name="_token"]').val();
            // alert(quantity);
            // alert(session_id);
            $.ajax({
                        url: '{{url('/update-quick-cart')}}',
                        method: 'POST',
                        data:{quantity:quantity, session_id:session_id, _token:_token},

                        success:function(){
                            show_quick_cart();
                        }

                    });
        })

         function Addtocart($product_id){
                var id = $product_id;
                // alert(id);
                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_image = $('.cart_product_image_' + id).val();
                var cart_product_quantity = $('.cart_product_quantity_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var _token = $('input[name="_token"]').val();

                if(parseInt(cart_product_qty)>parseInt(cart_product_quantity)){
                    alert('Làm ơn đặt nhỏ hơn ' + cart_product_quantity);
                }else{

                    $.ajax({
                        url: '{{url('/add-cart-ajax')}}',
                        method: 'POST',
                        data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token,cart_product_quantity:cart_product_quantity},

                        success:function(){
                            show_quick_cart();
                            // swal({
                            //         title: "Đã thêm sản phẩm vào giỏ hàng",
                            //         text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                            //         showCancelButton: true,
                            //         cancelButtonText: "Xem tiếp",
                            //         confirmButtonClass: "btn-success",
                            //         confirmButtonText: "Đi đến giỏ hàng",
                            //         closeOnConfirm: false
                            //     },

                            //     function() {
                            //         window.location.href = "{{url('/gio-hang')}}";
                            //     });

                            //     document.getElementsByClassName("home_cart_"+id)[0].style.display = "none";
                            //     document.getElementsByClassName("rm_home_cart_"+id)[0].style.display = "inline";


                            //   show_cart();
                            //   hover_cart();
                            // cart_session();
                        }

                    });
                }
            }
    </script>
    <!--add to  cart quickview-->
     <script type="text/javascript">

            $(document).on('click','.add-to-cart-quickview',function(){

                var id = $(this).data('id_product');
                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_image = $('.cart_product_image_' + id).val();
                var cart_product_quantity = $('.cart_product_quantity_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var _token = $('input[name="_token"]').val();

                if(parseInt(cart_product_qty)>parseInt(cart_product_quantity)){
                    alert('Làm ơn đặt nhỏ hơn ' + cart_product_quantity);
                }else{

                    $.ajax({
                        url: '{{url('/add-cart-ajax')}}',
                        method: 'POST',
                        data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token,cart_product_quantity:cart_product_quantity},
                        beforeSend: function(){
                            $("#beforesend_quickview").html("<p class='text text-primary'>Đang thêm sản phẩm vào giỏ hàng</p>");
                        },
                        success:function(){
                            $("#beforesend_quickview").html("<p class='text text-success'>Sản phẩm đã thêm vào giỏ hàng</p>");


                        }

                    });
                }


            });
            $(document).on('click','.redirect-cart',function(){
                window.location.href = "{{url('/gio-hang')}}";
            });

    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';

            if(action=='city'){
                result = 'province';
            }else{
                result = 'wards';
            }
            $.ajax({
                url : '{{url('/select-delivery-home')}}',
                method: 'POST',
                data:{action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                   $('#'+result).html(data);
                }
            });
        });
        });

    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.calculate_delivery').click(function(){
                var matp = $('.city').val();
                var maqh = $('.province').val();
                var xaid = $('.wards').val();
                var _token = $('input[name="_token"]').val();
                if(matp == '' && maqh =='' && xaid ==''){
                    alert('Làm ơn chọn để tính phí vận chuyển');
                }else{
                    $.ajax({
                    url : '{{url('/calculate-fee')}}',
                    method: 'POST',
                    data:{matp:matp,maqh:maqh,xaid:xaid,_token:_token},
                    success:function(){
                       location.reload();
                    }
                    });
                }
        });
    });
    </script>
        <script>!(function () {
            localStorage.removeItem('chat_session')
            let e = document.createElement("script"),
                t = document.head || document.getElementsByTagName("head")[0];
            (e.src =
                "https://cdn.jsdelivr.net/npm/rasa-webchat@1.x.x/lib/index.js"),
                // Replace 1.x.x with the version that you want
                (e.async = !0),
                (e.onload = () => {
                    window.WebChat.default(
                        {
                            initPayload: '/greet',
                            customData: { language: "vi" },
                            socketUrl: "http://localhost:5005",
                            title: 'Riri',
                            subtitle: "Say 'hi' để bắt đầu"
                            // add other props here
                        },
                        null
                    );
                }),
                t.insertBefore(e, t.firstChild);
        })();
    </script>



</body>
</html>
