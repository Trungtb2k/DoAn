<!DOCTYPE html>
<html lang="en">


<!-- molla/index.html  22 Nov 2019 09:55:32 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Molla - Điện thoại, laptop, tablet, phụ kiện chính hãng</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('public/frontend/images/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('public/frontend/images/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('public/frontend/images/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('public/frontend/images/site.html')}}">
    <link rel="mask-icon" href="{{asset('public/frontend/images/safari-pinned-tab.svg')}}" color="#666666">
    <link rel="shortcut icon" href="{{asset('public/frontend/images/favicon.ico')}}">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{{asset('public/frontend/images/browserconfig.xml')}}">
    <meta name="theme-color" content="#ffffff">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/magnific-popup.css')}}">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/test.css')}}">

    <link rel="stylesheet" href="{{asset('public/frontend/css/lightslider.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/lightgallery.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/prettify.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/test_showmore.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/sweetaleart.css')}}">
</head>

<body>
    <div class="page-wrapper">
        <header class="header">
            <div class="header-top">
                <div class="container">
                    <div class="header-left">
                        <div class="header-dropdown">
                            <a href="#">Usd</a>
                            <div class="header-menu">
                                <ul>
                                    <li><a href="#">VND</a></li>
                                    <li><a href="#">USD</a></li>
                                </ul>
                            </div><!-- End .header-menu -->
                        </div><!-- End .header-dropdown -->

                        <div class="header-dropdown">
                            <a href="#">Eng</a>
                            <div class="header-menu">
                                <ul>
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">Vietnamese</a></li>
                                </ul>
                            </div><!-- End .header-menu -->
                        </div><!-- End .header-dropdown -->
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <ul class="top-menu">
                            <li>
                                <a href="#">Links</a>
                                <ul>
                                    <li class="sansserif"><a href="tel:#"><i class="icon-phone"></i>Số điện thoại: +0123 456 789</a></li>
                                    <li><a href="{{URL::to('/wishlist')}}"><i class="icon-heart-o"></i>Danh sách yêu thích</a></li>
                                </ul>
                            </li>
                        </ul><!-- End .top-menu -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-top -->

            <div class="header-middle sticky-header">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>

                        <a href="index.html" class="logo">
                            <img src="{{asset('public/frontend/images/logo.png')}}" alt="Molla Logo" width="105" height="25">
                        </a>

                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li class="megamenu-container active">
                                    <a href="{{URL::to('/Home')}}">Trang chủ</a>
                                </li>
                                <li>
                                    <a href="{{URL::to('/shop')}}" class="">Sản phẩm</a>
                                </li>
                                <li>
                                    <a href="{{URL::to('/blog')}}" class="">Blog</a>
                                </li>
                                <li>
                                    <a href="about.html" class="">Về chúng tôi</a>

                                </li>
                                <li>
                                    <a href="contact.html" class="">Liên hệ</a>

                                </li>
                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <div class="header-search">
                            <a href="#" class="search-toggle" role="button" title="Search"><i class="icon-search"></i></a>
                            <form action="{{URL::to('/search')}}" method="post">
                                {{csrf_field()}}
                                <div class="header-search-wrapper">
                                    <label for="q" class="sr-only">Tìm kiếm</label>
                                    <input type="search" class="form-control" name="keywords" id="q" placeholder="Tìm kiếm..." required>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->

                        <div class="dropdown cart-dropdown">
                            <a href="{{URL::to('/show-cart')}}" class="dropdown-toggle" role="button" >
                                <i class="icon-shopping-cart"></i>
                            </a>

                        </div><!-- End .cart-dropdown -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->
        </header><!-- End .header -->

        @yield('content')


        <footer class="footer">
        	<div class="footer-middle">
	            <div class="container">
	            	<div class="row">
	            		<div class="col-sm-6 col-lg-3">
	            			<div class="widget widget-about">
	            				<img src="{{asset('public/frontend/images/logo-footer.png')}}" class="footer-logo" alt="Footer Logo" width="105" height="25">
	            				<p>Molla - Điện thoại, laptop, tablet, phụ kiện chính hãng</p>

	            				<div class="social-icons">
	            					<a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
	            					<a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
	            					<a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
	            					<a href="#" class="social-icon" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
	            					<a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
	            				</div><!-- End .soial-icons -->
	            			</div><!-- End .widget about-widget -->
	            		</div><!-- End .col-sm-6 col-lg-3 -->

	            		<div class="col-sm-6 col-lg-3">
	            			<div class="widget">
	            				<h4 class="widget-title">Liên kết</h4><!-- End .widget-title -->

	            				<ul class="widget-list">
	            					<li><a href="about.html">Về Molla</a></li>
	            					<li><a href="#">Câu hỏi thường gặp</a></li>
	            					<li><a href="contact.html">Liên hệ</a></li>
	            				</ul><!-- End .widget-list -->
	            			</div><!-- End .widget -->
	            		</div><!-- End .col-sm-6 col-lg-3 -->

	            		<div class="col-sm-6 col-lg-3">
	            			<div class="widget">
	            				<h4 class="widget-title">Dịch vụ khách hàng</h4><!-- End .widget-title -->

	            				<ul class="widget-list">
	            					<li><a href="#">Phương thức thanh toán</a></li>
	            					<li><a href="#">Hoàn trả</a></li>
	            					<li><a href="#">Các điều khoản và điều kiện</a></li>
	            					<li><a href="#">Chính sách bảo mật</a></li>
	            				</ul><!-- End .widget-list -->
	            			</div><!-- End .widget -->
	            		</div><!-- End .col-sm-6 col-lg-3 -->

	            		<div class="col-sm-6 col-lg-3">
	            			<div class="widget">
	            				<h4 class="widget-title">Tài khoản của tôi</h4><!-- End .widget-title -->

	            				<ul class="widget-list">
	            					<li><a href="cart.html">Giỏ hàng</a></li>
	            					<li><a href="#">Danh sách yêu thích</a></li>
	            					<li><a href="#">Theo dõi đơn hàng</a></li>
	            					<li><a href="#">Giúp đỡ</a></li>
	            				</ul><!-- End .widget-list -->
	            			</div><!-- End .widget -->
	            		</div><!-- End .col-sm-6 col-lg-3 -->
	            	</div><!-- End .row -->
	            </div><!-- End .container -->
	        </div><!-- End .footer-middle -->

	        <div class="footer-bottom">
	        	<div class="container">
	        		<p class="footer-copyright">Copyright © 2019 Molla Store. All Rights Reserved.</p><!-- End .footer-copyright -->
	        		<figure class="footer-payments">
	        			<img src="{{asset('public/frontend/images/payments.png')}}" alt="Payment methods" width="272" height="20">
	        		</figure><!-- End .footer-payments -->
	        	</div><!-- End .container -->
	        </div><!-- End .footer-bottom -->
        </footer><!-- End .footer -->
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-close"></i></span>

            <form action="#" method="get" class="mobile-search">
                <label for="mobile-search" class="sr-only">Search</label>
                <input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Search in..." required>
                <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
            </form>

            <nav class="mobile-nav">
                <ul class="mobile-menu">
                    <li class="active">
                        <a href="{{URL::to('/Home')}}">Home</a>
                    </li>
                    <li>
                        <a href="{{URL::to('/shop')}}">Shop</a>

                    </li>
                    <li>
                        <a href="blog.html">Blog</a>

                    </li>
                    <li>
                        <a href="about.html">About</a>
                    </li>
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
                </ul>
            </nav><!-- End .mobile-nav -->

            <div class="social-icons">
                <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->

    <!-- Plugins JS File -->
    <script src="{{asset('public/frontend/js/jquery.min.js')}}"></script>
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="{{asset('public/frontend/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.hoverIntent.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/superfish.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.elevateZoom.min.js')}}"></script>
    <!-- Main JS File -->
    <script src="{{asset('public/frontend/js/main.js')}}"></script>

    <script src="{{asset('public/frontend/js/lightslider.js')}}"></script>
    <script src="{{asset('public/frontend/js/lightgallery-all.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/prettify.js')}}"></script>
    <script src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#imageGallery').lightSlider({
                gallery:true,
                item:1,
                loop:true,
                thumbItem:5,
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
            $(".show-more button").on("click", function() {
                var $this = $(this);
                var $content = $this.parent().prev("div.content");
                var linkText = $this.text().toUpperCase();

                if(linkText === "XEM THÊM"){
                    linkText = "Ẩn bớt";
                    $content.switchClass("hideContent", "showContent", 400);
                } else {
                    linkText = "Xem thêm";
                    $content.switchClass("showContent", "hideContent", 400);
                };

                $this.text(linkText);
            });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $(".add-to-cart").click(function(){
                var id = $(this).data('id_product');
                var cart_product_id = $('.cart_product_id_'+id).val();
                var cart_product_name = $('.cart_product_name_'+id).val();
                var cart_attr_id = $('.cart_attr_id_'+id).val();
                var cart_product_image = $('.cart_product_image_'+id).val();
                var cart_product_price = $('.cart_product_price_'+id).val();
                //var cart_product_qty = $('.cart_product_qty_'+id).val();
                var cart_product_qty = document.getElementById("qty").value;
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{url('/add-cart-ajax')}}",
                    method:"POST",
                    data:{cart_product_id:cart_product_id,cart_attr_id:cart_attr_id,
                        cart_product_name:cart_product_name,cart_product_image:cart_product_image
                        ,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token},
                    success:function(data){
                        swal({
                                title: "Đã thêm sản phẩm vào giỏ hàng",
                                text: "Bạn có thể tiếp tục mua sắm hoặc tới giỏ hàng để thanh toán",
                                showCancelButton: true,
                                cancelButtonText: "Tiếp tục",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Đi đến giỏ hàng",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "{{url('/show-cart')}}";
                            });
                    }
                });
            });
        });
    </script>

    <script type="text/javascript">
        function view(){
            if(localStorage.getItem('data')!=null){
                var data = JSON.parse(localStorage.getItem('data'));
                for(i=0;i<data.length;i++){
                    var product_id = data[i].product_id;
                    var attr_id = data[i].attr_id;
                    var name = data[i].name;
                    var price = data[i].price;
                    var image = data[i].image;
                    var url = data[i].url;
                    var valueImage = data[i].valueImage;
                    $("#row_wishlist").append('<tr><td class="product-col"><div class="product"><input type="hidden" value="'+product_id+'" class="cart_product_id_'+product_id+'"><input type="hidden" id="wishlist_attrid'+product_id+'" value="'+attr_id+'" class="cart_attr_id_'+product_id+'"><input type="hidden" value="'+name+'" class="cart_product_name_'+product_id+'"><input type="hidden" value="'+valueImage+'" class="cart_product_image_'+product_id+'"><input type="hidden" value="'+price+'" class="cart_product_price_'+product_id+'"><input type="hidden" name="qty" id="qty" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required><input type="hidden" value="1" class="cart_product_qty_'+product_id+'"><figure class="product-media"><a href="'+url+'"><img src="'+image+'" alt="Product image"></a></figure><h3 class="product-title"><a href="'+url+'">'+name+'</a></h3><!-- End .product-title --></div><!-- End .product --></td><td class="price-col">'+Intl.NumberFormat().format(price)+'đ</td><td class="action-col"><button data-id_product="'+product_id+'" class="btn btn-block btn-outline-primary-2 add-to-cart"><i class="icon-cart-plus"></i>Thêm vào giỏ hàng</button></td><td class="remove-col"><button class="btn-remove"><i class="icon-close"></i></button></td></tr>');
                }
            }
        }
        view();
        function add_wishlist(clicked_id){
            var product_id = clicked_id;
            var attr_id = document.getElementById('wishlist_attrid'+product_id).value;
            var name = document.getElementById('wishlist_productname'+product_id).value;
            var price = document.getElementById('wishlist_productprice'+product_id).value;
            var image = document.getElementById('wishlist_productimage'+product_id).src;
            var url = document.getElementById('wishlist_producturl'+product_id).href;
            var valueImage = document.getElementById('wishlist_valueimage'+product_id).value;
            var newItem = {
                'url':url,
                'product_id':product_id,
                'attr_id':attr_id,
                'name':name,
                'price':price,
                'image':image,
                'valueImage':valueImage,
            }

            if(localStorage.getItem('data')==null){
                localStorage.setItem('data','[]');
            }

            var oldData = JSON.parse(localStorage.getItem('data'));

            var matches = $.grep(oldData,function(obj){
                return obj.product_id = product_id;
            });

            if(matches.length){
                alert('Đã tồn tại trong danh mục yêu thích');
            }else{
                oldData.push(newItem);
            }
            localStorage.setItem('data',JSON.stringify(oldData));
        }
    </script>

    <script type="text/javascript">
        $('.collapsed').on('change',function(){
            $('.collapsed').not(this).prop('checked',false);
        });
    </script>

        <!-- Sort -->
    <script type="text/javascript">
         $("#sort").on("change",function(){
             var url  = $(this).val();
             if(url){
                 window.location = url;
             }
             return false;
         });
    </script>

</body>


<!-- molla/index.html  22 Nov 2019 09:55:42 GMT -->
</html>
