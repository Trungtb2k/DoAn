@extends('layout')
@section('content')
<main class="main">
            <div class="intro-section bg-lighter pt-5 pb-6">
                <div class="container">
                    <div class="row">
                    <div class="col-lg-8">
                            <div class="intro-slider-container slider-container-ratio slider-container-1 mb-2 mb-lg-0">
                                <div class="intro-slider intro-slider-1 owl-carousel owl-simple owl-light owl-nav-inside" data-toggle="owl" data-owl-options='{
                                        "nav": false,
                                        "responsive": {
                                            "768": {
                                                "nav": true
                                            }
                                        }
                                    }'>
                                    <div class="intro-slide">
                                        <figure class="slide-image">
                                            <picture>
                                                <source media="(max-width: 480px)" srcset="{{('public/frontend/images/slide-1-480w.jpg')}}">
                                                <img src="{{('public/frontend/images/slide-1.jpg')}}" alt="Image Desc">
                                            </picture>
                                        </figure><!-- End .slide-image -->

                                        <div class="intro-content">
                                            <h3 class="intro-subtitle text-black-50">Daily Deals</h3><!-- End .h3 intro-subtitle -->
                                            <h1 class="intro-title text-dark">AirPods<br>Earphones</h1><!-- End .intro-title -->

                                            <a href="category.html" class="btn btn-outline-dark">
                                                <span style="color: black">Xem ngay</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </a>
                                        </div><!-- End .intro-content -->
                                    </div><!-- End .intro-slide -->

                                    <div class="intro-slide">
                                        <figure class="slide-image">
                                            <picture>
                                                <source media="(max-width: 480px)" srcset="{{('public/frontend/images/slide-2-480w.jpg')}}">
                                                <img src="{{('public/frontend/images/slide-2.jpg')}}" alt="Image Desc">
                                            </picture>
                                        </figure><!-- End .slide-image -->

                                        <div class="intro-content">
                                            <h3 class="intro-subtitle text-black-50">Deals and Promotions</h3><!-- End .h3 intro-subtitle -->
                                            <h1 class="intro-title text-dark">Echo Dot<br>3rd Gen</h1><!-- End .intro-title -->

                                            <a href="category.html" class="btn btn-outline-dark">
                                                <span style="color: black">Xem ngay</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </a>
                                        </div><!-- End .intro-content -->
                                    </div><!-- End .intro-slide -->

                                </div><!-- End .intro-slider owl-carousel owl-simple -->

                                <span class="slider-loader"></span><!-- End .slider-loader -->
                            </div><!-- End .intro-slider-container -->
                        </div><!-- End .col-lg-8 -->
                        <div class="col-lg-4">
                            <div class="intro-banners">
                                <div class="row row-sm">
                                    <div class="col-md-6 col-lg-12">
                                        <div class="banner banner-display mb-3">
                                            <a href="#">
                                                <img src="{{('public/frontend/images/banner-1.jpg')}}" alt="Banner">
                                            </a>

                                            <div class="banner-content">
                                                <h4 class="banner-subtitle text-black"><a href="#">Featured</a></h4><!-- End .banner-subtitle -->
                                                <h3 class="banner-title text-black"><a href="#">Apple Watch 4<br>Our Hottest Deals</a></h3><!-- End .banner-title -->
                                                <a href="#" class="btn btn-outline-dark banner-link">Xem ngay<i class="icon-long-arrow-right"></i></a>
                                            </div><!-- End .banner-content -->
                                        </div><!-- End .banner -->
                                    </div><!-- End .col-md-6 col-lg-12 -->

                                    <div class="col-md-6 col-lg-12">
                                        <div class="banner banner-display mb-2">
                                            <a href="#">
                                                <img src="{{('public/frontend/images/banner-2.jpg')}}" alt="Banner">
                                            </a>

                                            <div class="banner-content">
                                                <h4 class="banner-subtitle text-black"><a href="#">Top Product</a></h4><!-- End .banner-subtitle -->
                                                <h3 class="banner-title text-black"><a href="#">Edifier<br>Stereo Bluetooth</a></h3><!-- End .banner-title -->
                                                <a href="#" class="btn btn-outline-dark banner-link">Xem ngay<i class="icon-long-arrow-right"></i></a>
                                            </div><!-- End .banner-content -->
                                        </div><!-- End .banner -->
                                    </div><!-- End .col-md-6 col-lg-12 -->

                                    <div class="col-md-6 col-lg-12">
                                        <div class="banner banner-display mt-1">
                                            <a href="#">
                                                <img src="{{('public/frontend/images/banner-3.jpg')}}" alt="Banner">
                                            </a>

                                            <div class="banner-content">
                                                <h4 class="banner-subtitle text-black"><a href="#">Clearance</a></h4><!-- End .banner-subtitle -->
                                                <h3 class="banner-title text-black"><a href="#">GoPro - Fusion 360<br>Save $70</a></h3><!-- End .banner-title -->
                                                <a href="#" class="btn btn-outline-dark banner-link">Xem ngay<i class="icon-long-arrow-right"></i></a>
                                            </div><!-- End .banner-content -->
                                        </div><!-- End .banner -->
                                    </div><!-- End .col-md-6 col-lg-12 -->

                                </div><!-- End .row row-sm -->
                            </div><!-- End .intro-banners -->
                        </div><!-- End .col-lg-4 -->
                    </div><!-- End .row -->

                    <div class="mb-6"></div><!-- End .mb-6 -->

                    <div class="owl-carousel owl-simple" data-toggle="owl"
                        data-owl-options='{
                            "nav": false,
                            "dots": false,
                            "margin": 30,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":2
                                },
                                "420": {
                                    "items":3
                                },
                                "600": {
                                    "items":4
                                },
                                "900": {
                                    "items":5
                                },
                                "1024": {
                                    "items":6
                                }
                            }
                        }'>
                        <a href="#" class="brand">
                            <img src="{{('public/frontend/images/1.png')}}" alt="Brand Name">
                        </a>

                        <a href="#" class="brand">
                            <img src="{{('public/frontend/images/2.png')}}" alt="Brand Name">
                        </a>

                        <a href="#" class="brand">
                            <img src="{{('public/frontend/images/3.png')}}" alt="Brand Name">
                        </a>

                        <a href="#" class="brand">
                            <img src="{{('public/frontend/images/4.png')}}" alt="Brand Name">
                        </a>

                        <a href="#" class="brand">
                            <img src="{{('public/frontend/images/5.png')}}" alt="Brand Name">
                        </a>

                        <a href="#" class="brand">
                            <img src="{{('public/frontend/images/6.png')}}" alt="Brand Name">
                        </a>
                    </div><!-- End .owl-carousel -->
                </div><!-- End .container -->
            </div><!-- End .bg-lighter -->

            <div class="mb-6"></div><!-- End .mb-6 -->

            <div class="container">
                <div class="heading heading-center mb-3">
                    <h2 class="title-lg">S???n ph???m n???i b???t</h2><!-- End .title -->

                    <ul class="nav nav-pills justify-content-center" role="tablist">
                       @foreach($brand as $key => $brand)
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('/brand/'.$brand->brand_id)}}" role="tab" aria-controls="trendy-all-tab" aria-selected="true">{{($brand->brand_name)}}</a>
                            </li>
                       @endforeach
                    </ul>
                </div><!-- End .heading -->

                <div class="tab-content tab-content-carousel">
                    <div class="tab-pane p-0 fade show active" id="trendy-all-tab" role="tabpanel" aria-labelledby="trendy-all-link">
                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                            data-owl-options='{
                                "nav": false,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":4,
                                        "nav": true,
                                        "dots": false
                                    }
                                }
                            }'>
                            @foreach($list_product as $key => $value)
                            <div class="product product-11 text-center">
                            <form>
                            {{csrf_field()}}
                                <input type="hidden" value="{{$value->product_id}}" class="cart_product_id_{{$value->product_id}}">
                                <input type="hidden" value="{{$value->product_name}}" class="cart_product_name_{{$value->product_id}}">
                                <input type="hidden" value="{{$value->product_image}}" class="cart_product_image_{{$value->product_id}}">
                                <input type="hidden" value="{{$value->product_price}}" class="cart_product_price_{{$value->product_id}}">
                                <input type="hidden" value="1" class="cart_product_qty_{{$value->product_id}}">
                                <figure class="product-media">
                                    <a href="{{URL::to('/product-details/'.$value->product_id)}}">
                                        <img src="public/upload/product/{{$value->product_image}}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist"><span>add to wishlist</span></a>
                                    </div><!-- End .product-action-vertical -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <h3 class="product-title"><a href="product.html">{{($value->product_name)}}</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        {{number_format($value->product_price)}}??
                                    </div><!-- End .product-price -->
                                </div><!-- End .product-body -->
                                <div class="product-action">
                                    <a type="button" data-id_product="{{$value->product_id}}" class="btn-product btn-cart add-to-cart" name="add-to-cart"><span>Th??m v??o gi??? h??ng</span></a>
                                </div><!-- End .product-action -->
                            </form>
                            </div><!-- End .product -->
                            @endforeach

                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->


                </div><!-- End .tab-content -->
            </div><!-- End .container -->

    		<div class="container categories pt-6">
        		<h2 class="title-lg text-center mb-4">Danh m???c s???n ph???m</h2><!-- End .title-lg text-center -->
                    <div class="row">
                        @foreach($category as $key => $cate)
                            <div class="col-6 col-lg-4">
                                <div class="banner banner-display banner-link-anim">
                                    <a href="#">
                                        <img src="public/upload/category/{{$cate->category_image}}" alt="Banner" style="width: 376px;height: 260px;">
                                    </a>
                                    <div class="banner-content banner-content-center">
                                        <h3 class="banner-title size-guide text-white bg-dark">{{($cate->category_name)}}</h3><!-- End .banner-title -->
                                        <a href="{{URL::to('/shop')}}" class="btn btn-outline-white banner-link">Xem ngay<i class="icon-long-arrow-right"></i></a>
                                    </div><!-- End .banner-content -->
                                </div><!-- End .banner -->
                            </div><!-- End .col-sm-6 col-lg-3 -->
                        @endforeach
                    </div><!-- End .row -->
    		</div><!-- End .container -->

            <div class="mb-5"></div><!-- End .mb-6 -->

            <div class="container">
                <div class="heading heading-center mb-6">
                    <h2 class="title">S???n ph???m m???i</h2><!-- End .title -->

                    <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                        @foreach($brand1 as $key => $brand1)
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('/brand/'.$brand1->brand_id)}}" role="tab" aria-controls="trendy-all-tab" aria-selected="true">{{($brand1->brand_name)}}</a>
                            </li>
                       @endforeach
                    </ul>
                </div   ><!-- End .heading -->

                <div class="tab-content">
                    <div class="tab-pane p-0 fade show active" id="top-all-tab" role="tabpanel" aria-labelledby="top-all-link">
                        <div class="products">
                            <div class="row justify-content-center">
                                @foreach($list_product1 as $key => $list)
                                    <div class="col-6 col-md-4 col-lg-3">
                                        <div class="product product-11 mt-v3 text-center">
                                        <form>
                                        {{csrf_field()}}
                                            <input type="hidden" value="{{$value->product_id}}" class="cart_product_id_{{$value->product_id}}">
                                            <input type="hidden" value="{{$value->product_name}}" class="cart_product_name_{{$value->product_id}}">
                                            <input type="hidden" value="{{$value->product_image}}" class="cart_product_image_{{$value->product_id}}">
                                            <input type="hidden" value="{{$value->product_price}}" class="cart_product_price_{{$value->product_id}}">
                                            <input type="hidden" value="1" class="cart_product_qty_{{$value->product_id}}">
                                            <figure class="product-media">
                                                <a href="{{URL::to('/product-details/'.$list->product_id)}}">
                                                    <img src="public/upload/product/{{$list->product_image}}" alt="Product image" class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#" class="btn-product-icon btn-wishlist "><span>add to wishlist</span></a>
                                                </div><!-- End .product-action-vertical -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <h3 class="product-title"><a href="product.html">{{($list->product_name)}}</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    {{number_format($list->product_price)}}??
                                                </div><!-- End .product-price -->
                                            </div><!-- End .product-body -->
                                            <div class="product-action">
                                                <a type="button" data-id_product="{{$value->product_id}}" class="btn-product btn-cart add-to-cart" name="add-to-cart"><span>Th??m v??o gi??? h??ng</span></a>
                                            </div><!-- End .product-action -->
                                        </form>
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                                @endforeach
                            </div><!-- End .row -->
                        </div><!-- End .products -->
                    </div><!-- .End .tab-pane -->

                </div><!-- End .tab-content -->
                <div class="more-container text-center">
                    <a href="#" class="btn btn-outline-darker btn-more"><span>Xem th??m</span><i class="icon-long-arrow-down"></i></a>
                </div><!-- End .more-container -->
            </div><!-- End .container -->

            <div class="container">
                <hr>
            	<div class="row justify-content-center">
                    <div class="col-lg-4 col-sm-6">
                        <div class="icon-box icon-box-card text-center">
                            <span class="icon-box-icon">
                                <i class="icon-rocket"></i>
                            </span>
                            <div class="icon-box-content">
                                <h3 class="icon-box-title">Thanh to??n v?? giao h??ng</h3><!-- End .icon-box-title -->
                                <p>Mi???n ph?? cho c??c ????n h??ng tr??n 2.000.000 vn??</p>
                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-lg-4 col-sm-6 -->

                    <div class="col-lg-4 col-sm-6">
                        <div class="icon-box icon-box-card text-center">
                            <span class="icon-box-icon">
                                <i class="icon-rotate-left"></i>
                            </span>
                            <div class="icon-box-content">
                                <h3 class="icon-box-title">Ho??n tr???</h3><!-- End .icon-box-title -->
                                <p>Mi???n ph?? 100% ph?? ho??n tr???</p>
                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-lg-4 col-sm-6 -->

                    <div class="col-lg-4 col-sm-6">
                        <div class="icon-box icon-box-card text-center">
                            <span class="icon-box-icon">
                                <i class="icon-life-ring"></i>
                            </span>
                            <div class="icon-box-content">
                                <h3 class="icon-box-title">H??? tr???</h3><!-- End .icon-box-title -->
                                <p>Lu??n ph???n h???i 24/7</p>
                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-lg-4 col-sm-6 -->
                </div><!-- End .row -->

                <div class="mb-2"></div><!-- End .mb-2 -->
            </div><!-- End .container -->
            <div class="blog-posts pt-7 pb-7" style="background-color: #fafafa;">
                <div class="container">
                   <h2 class="title-lg text-center mb-3 mb-md-4">Blog</h2><!-- End .title-lg text-center -->

                    <div class="owl-carousel owl-simple carousel-with-shadow" data-toggle="owl"
                        data-owl-options='{
                            "nav": false,
                            "dots": true,
                            "items": 3,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "600": {
                                    "items":2
                                },
                                "992": {
                                    "items":3
                                }
                            }
                        }'>
                        <article class="entry entry-display">
                            <figure class="entry-media">
                                <a href="single.html">
                                    <img src="{{('public/frontend/images/post-1.jpg')}}" alt="image desc">
                                </a>
                            </figure><!-- End .entry-media -->

                            <div class="entry-body pb-4 text-center">
                                <div class="entry-meta">
                                    <a href="#">Nov 22, 2018</a>, 0 Comments
                                </div><!-- End .entry-meta -->

                                <h3 class="entry-title">
                                    <a href="single.html">Sed adipiscing ornare.</a>
                                </h3><!-- End .entry-title -->

                                <div class="entry-content">
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit.<br>Pelletesque aliquet nibh necurna. </p>
                                    <a href="single.html" class="read-more">Read More</a>
                                </div><!-- End .entry-content -->
                            </div><!-- End .entry-body -->
                        </article><!-- End .entry -->

                    </div><!-- End .owl-carousel -->
                </div><!-- container -->

                <div class="more-container text-center mb-0 mt-3">
                    <a href="blog.html" class="btn btn-outline-darker btn-more"><span>Xem th??m</span><i class="icon-long-arrow-right"></i></a>
                </div><!-- End .more-container -->
            </div>
            <div class="cta cta-display bg-image pt-4 pb-4" style="background-image: url(public/frontend/images/bg-6.jpg);">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-9 col-xl-8">
                            <div class="row no-gutters flex-column flex-sm-row align-items-sm-center">
                                <div class="col">
                                    <h3 class="cta-title text-white">Gi???m gi?? 10% cho kh??ch h??ng l???n ?????u mua h??ng</h3><!-- End .cta-title -->
                                    <p class="cta-desc text-white">Molla - ??i???n tho???i, laptop, tablet, ph??? ki???n ch??nh h??ng</p><!-- End .cta-desc -->
                                </div><!-- End .col -->
                            </div><!-- End .row no-gutters -->
                        </div><!-- End .col-md-10 col-lg-9 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .cta -->
        </main><!-- End .main -->
@endsection
