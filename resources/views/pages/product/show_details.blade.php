@extends('layout')
@section('content')

<main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('/Home')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{URL::to('/shop')}}">Sản phẩm</a></li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                @foreach($product_details as $key => $value)
                    <div class="product-details-top mb-2">
                        <div class="row">
                            <div class="col-md-6">
                                <ul id="imageGallery">
                                    @foreach($gallery as  $key => $gal)
                                    <li data-thumb="{{URL::to('/public/upload/gallery/'.$gal->gallery_image)}}" data-src="{{URL::to('/public/upload/gallery/'.$gal->gallery_image)}}" >
                                        <img style="width:75%;margin-left:100px;" alt="{{$gal->gallery_name}}" id="product-zoom" src="{{URL::to('/public/upload/gallery/'.$gal->gallery_image)}}"/>
                                    </li>
                                  @endforeach
                                </ul>
                            </div><!-- End .col-md-6 -->

                            <div class="col-md-6">
                                <div class="product-details product-details-centered">
                                <form>
                                    {{csrf_field()}}
                                        <input type="hidden" value="{{$value->product_id}}" class="cart_product_id_{{$value->product_id}}">
                                        <input type="hidden" value="{{$value->attr_id}}" class="cart_attr_id_{{$value->product_id}}">
                                        <input type="hidden" value="{{$value->product_name}}" class="cart_product_name_{{$value->product_id}}">
                                        <input type="hidden" value="{{$value->product_image}}" class="cart_product_image_{{$value->product_id}}">
                                        <input type="hidden" value="{{$value->product_price}}" class="cart_product_price_{{$value->product_id}}">

                                    <h1 class="product-title">{{($value->product_name)}}</h1><!-- End .product-title -->

                                    <div class="ratings-container">
                                        @php
                                            $percent = 0;
                                            $count = 0;
                                            $star = 0;
                                        @endphp
                                        @foreach($rate as $key => $rat)
                                            @php
                                                $count += 1;
                                                $star += ($rat->star);
                                                $percent = $star*100/($count*5);
                                            @endphp
                                        @endforeach
                                        <div class="ratings">
                                                <div class="ratings-val" style="width: <?=$percent?>%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <a class="ratings-text" href="#product-review-link" id="review-link">( {{$count}} Đánh giá )</a>
                                    </div><!-- End .rating-container -->

                                    <div class="product-price">
                                        {{number_format($value->product_price)}}đ
                                    </div><!-- End .product-price -->

                                    <div class="product-content">
                                        <p>{!!$value->product_content!!}</p>
                                    </div><!-- End .product-content -->


                                        <div class="details-filter-row details-row-size">
                                        @foreach($attr_name as $key => $value1)
                                        {{csrf_field()}}
                                        <?php
                                            if($value->attr_id == $value1->attr_id){
                                        ?>
                                            <a href="{{URL::to('/product-details/'.$value1->product_id.'/'.$value1->attr_id)}}" type="button" style="font-size: 14px;margin-left:10px;margin-top:10px;" data-id_product="{{$value1->attr_id}}" class="btn btn-outline-dark active">{{$value1->attr_name}}</a>
                                        <?php
                                            }else{
                                        ?>
                                            <a href="{{URL::to('/product-details/'.$value1->product_id.'/'.$value1->attr_id)}}" type="button" style="font-size: 14px;margin-left:10px;margin-top:10px;" data-id_product="{{$value1->attr_id}}" class="btn btn-outline-dark">{{$value1->attr_name}}</a>
                                        <?php
                                            }
                                        ?>
                                        @endforeach
                                        </div><!-- End .details-filter-row -->


                                    <div class="product-details-action">
                                        <div class="details-action-col">
                                            <div class="product-details-quantity">
                                                <input type="number" name="qty" id="qty" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
                                            </div><!-- End .product-details-quantity -->
                                            <a type="button" data-id_product="{{$value->product_id}}" class="btn-product btn-cart add-to-cart" name="add-to-cart"><span>Thêm vào giỏ hàng</span></a>
                                        </div><!-- End .details-action-col -->

                                        <div class="details-action-wrapper">
                                            <a href="#" class="btn-product btn-wishlist" title="Wishlist"><span>Yêu thích</span></a>
                                            <a href="#" class="btn-product btn-compare" title="Compare"><span>So sánh</span></a>
                                        </div><!-- End .details-action-wrapper -->
                                    </div><!-- End .product-details-action -->

                                    <div class="product-details-footer">
                                        <div class="product-cat">
                                            <span>Danh mục sản phẩm:</span>
                                            @foreach($category as $key => $value)
                                                <a href="{{URL::to('/category-product/'.$value->category_id)}}">{{($value->category_name)}}</a>,
                                            @endforeach
                                            @foreach($brand as $key => $value1)
                                                <a href="{{URL::to('/brand/'.$value1->brand_id)}}">{{($value1->brand_name)}}</a>
                                            @endforeach

                                        </div><!-- End .product-cat -->

                                        <div class="social-icons social-icons-sm">
                                            <span class="social-label">Chia sẻ:</span>
                                            <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                            <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                            <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                            <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                        </div>
                                    </div><!-- End .product-details-footer -->
                                </form>
                                </div><!-- End .product-details -->
                            </div><!-- End .col-md-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .product-details-top -->

                    <div class="product-details-tab">
                        <ul class="nav nav-pills justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab" aria-controls="product-info-tab" aria-selected="false">Cấu hình</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab" aria-selected="false">Thông tin sản phẩm</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Đánh giá</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
                                <div class="product-desc-content">
                                    <p>{!!$value->product_config!!}</p>
                                </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel" aria-labelledby="product-info-link">
                                <div class="product-desc-content content hideContent">
                                    <p>{!!$value->product_desc!!}</p>
                                </div><!-- End .product-desc-content -->
                                <div class="show-more">
                                    <button type="button" class="btn btn-warning">Xem thêm</button>
                                </div>

                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                                <div class="reviews">
                                <div id="comment_show"></div>

                                <div class="reply" style="margin-top: 20px;">
                                <div class="heading">
                                    <h3 class="title">Đánh giá và nhận xét sản phẩm</h3><!-- End .title -->
                                    <p class="title-desc">Bạn cảm thấy sản phẩm như thế nào?</p>
                                </div><!-- End .heading -->


                                <form action="#" style="margin-top: -35px;">
                                    @csrf
                                    <div class="rate" style="margin-bottom: 15px;">
                                        <input type="radio" id="star5" name="rate" value="5" />
                                        <label for="star5" title="text">5 stars</label>
                                        <input type="radio" id="star4" name="rate" value="4" />
                                        <label for="star4" title="text">4 stars</label>
                                        <input type="radio" id="star3" name="rate" value="3" />
                                        <label for="star3" title="text">3 stars</label>
                                        <input type="radio" id="star2" name="rate" value="2" />
                                        <label for="star2" title="text">2 stars</label>
                                        <input type="radio" id="star1" name="rate" value="1" />
                                        <label for="star1" title="text">1 star</label>
                                    </div>

                                    <input type="hidden" name="comment_product_id" class="comment_product_id" value="{{$value->product_id}}">
                                    <label for="reply-message" class="sr-only">Xin mời chia sẻ một số cảm nhận về sản phẩm</label>
                                    <textarea name="reply-message" id="reply-message" cols="30" rows="4" class="form-control comment" required placeholder="Xin mời chia sẻ một số cảm nhận về sản phẩm *"></textarea>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="reply-name" class="sr-only">Họ và tên</label>
                                            <input type="text" class="form-control comment_name" id="reply-name" name="reply-name" required placeholder="Họ và tên *">
                                        </div><!-- End .col-md-6 -->

                                        <div class="col-md-6">
                                            <label for="reply-email" class="sr-only">Số điện thoại</label>
                                            <input type="text" class="form-control comment_phone" id="reply-email" name="reply-email" pattern="([0]\d{9,})" required placeholder="Số điện thoại *">
                                        </div><!-- End .col-md-6 -->
                                    </div><!-- End .row -->

                                    <button type="submit" class="btn btn-outline-primary-2 send-comment">
                                        <span>GỬI ĐÁNH GIÁ</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </form>
                    </div><!-- End .reply -->

                                </div><!-- End .reviews -->
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .product-details-tab -->
                @endforeach
                    <h2 class="title text-center mb-4">Các sản phẩm liên quan</h2><!-- End .title text-center -->
                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                        data-owl-options='{
                            "nav": false,
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
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

                        @foreach($related as $key => $value)
                            <div class="product product-7 text-center">
                                <figure class="product-media">
                                    <a href="{{URL::to('/product-details/'.$value->product_id)}}">
                                        <img src="{{URL::to('/public/upload/product/'.$value->product_image)}}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                        <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                    </div><!-- End .product-action-vertical -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <h3 class="product-title"><a href="product.html">{{($value->product_name)}}</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        {{number_format($value->product_price)}}đ
                                    </div><!-- End .product-price -->

                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        @endforeach
                        </div><!-- End .owl-carousel -->


                    </div><!-- End .owl-carousel -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
@endsection
