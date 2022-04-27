@extends('layout')
@section('content')
<main class="main">
        	<div class="page-header text-center" style="background-image: url(public/frontend/images/slide-3.png)">
        		<div class="container">
        			<h1 class="page-title">Sản phẩm</h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('/Home')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{URL::to('/shop')}}">Sản phẩm</a></li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                	<div class="row">
                		<div class="col-lg-9">
                			<div class="toolbox">
                				<div class="toolbox-right">
                					<div class="toolbox-sort">
                						<label for="sortby">Sắp xếp:</label>
                                        <form>
                                            @csrf
                                            <div class="select-custom">
                                                <select name="sort" id="sort" class="form-control">
                                                    <option value="{{Request::url()}}?sort_by=none" selected="selected">Sắp xếp</option>
                                                    <option value="{{Request::url()}}?sort_by=tang_dan">Giá tăng dần</option>
                                                    <option value="{{Request::url()}}?sort_by=giam_dan">Giá giảm dần</option>
                                                    <option value="{{Request::url()}}?sort_by=kytu_az">Sắp xếp từ A đến Z</option>
                                                    <option value="{{Request::url()}}?sort_by=kytu_za">Sắp xếp từ Z đến A</option>
                                                </select>
                                            </div>
                                        </form>
                					</div><!-- End .toolbox-sort -->

                				</div><!-- End .toolbox-right -->
                			</div><!-- End .toolbox -->

                            <div class="products mb-3">
                                <div class="row justify-content-center">
                                    @foreach($list_product as $key => $value)
                                        <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                            <div class="product product-7 text-center">
                                                <form>
                                                {{csrf_field()}}
                                                <input type="hidden" value="{{$value->product_id}}" class="cart_product_id_{{$value->product_id}}">
                                                <input type="hidden" id="wishlist_attrid{{$value->product_id}}" value="{{$value->attr_id}}" class="cart_attr_id_{{$value->product_id}}">
                                                <input type="hidden" id="wishlist_productname{{$value->product_id}}" value="{{$value->product_name}}" class="cart_product_name_{{$value->product_id}}">
                                                <input type="hidden" id="wishlist_valueimage{{$value->product_id}}" value="{{$value->product_image}}" class="cart_product_image_{{$value->product_id}}">
                                                <input type="hidden" id="wishlist_productprice{{$value->product_id}}" value="{{$value->product_price}}" class="cart_product_price_{{$value->product_id}}">
                                                <input type="hidden" value="1" class="cart_product_qty_{{$value->product_id}}">
                                                <figure class="product-media">
                                                    <a id="wishlist_producturl{{$value->product_id}}" href="{{URL::to('/product-details/'.$value->product_id.'/'.$value->attr_id)}}">
                                                        <img id="wishlist_productimage{{$value->product_id}}" src="public/upload/product/{{$value->product_image}}" alt="Product image" class="product-image">
                                                    </a>

                                                    <div class="product-action-vertical">
                                                        <button class="btn-product-icon btn-wishlist" id="{{$value->product_id}}" onclick="add_wishlist(this.id);"><span>Yêu thích</span></button>
                                                        <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>So sánh</span></a>
                                                    </div><!-- End .product-action-vertical -->

                                                    <div class="product-action">
                                                        <a type="button" data-id_product="{{$value->product_id}}" class="btn-product btn-cart add-to-cart" name="add-to-cart"><span>Thêm vào giỏ hàng</span></a>
                                                    </div><!-- End .product-action -->
                                                </figure><!-- End .product-media -->

                                                <input type="hidden" name="qty" id="qty" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
                                                <div class="product-body">
                                                    <h3 class="product-title">{{($value->product_name)}}</h3><!-- End .product-title -->
                                                    <div class="product-price">
                                                        {{number_format($value->product_price)}}đ
                                                    </div><!-- End .product-price -->
                                                    <div class="ratings-container">
                                                        <div class="ratings">
                                                            <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                                                        </div><!-- End .ratings -->
                                                    </div><!-- End .rating-container -->
                                                </div><!-- End .product-body -->
                                                </form>
                                            </div><!-- End .product -->
                                        </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                                    @endforeach
                                </div><!-- End .row -->
                            </div><!-- End .products -->


                			<nav aria-label="Page navigation">
							    <ul class="pagination justify-content-center">
							        <li class="page-item disabled">
							            <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
							                <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
							            </a>
							        </li>
							        <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
							        <li class="page-item"><a class="page-link" href="#">2</a></li>
							        <li class="page-item"><a class="page-link" href="#">3</a></li>
							        <li class="page-item-total">of 6</li>
							        <li class="page-item">
							            <a class="page-link page-link-next" href="#" aria-label="Next">
							                Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
							            </a>
							        </li>
							    </ul>
							</nav>
                		</div><!-- End .col-lg-9 -->
                		<aside class="col-lg-3 order-lg-first">
                			<div class="sidebar sidebar-shop">
                				<div class="widget widget-clean">
                					<label>Bộ lọc:</label>
                					<a href="#" class="sidebar-filter-clear">Xóa tất cả</a>
                				</div><!-- End .widget widget-clean -->

                				<div class="widget widget-collapsible">
    								<h3 class="widget-title">
									    <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
									        Danh mục sản phẩm
									    </a>
									</h3><!-- End .widget-title -->

									<div class="collapse show" id="widget-1">
										<div class="widget-body">
											<div class="filter-items filter-items-count">
												<div class="filter-item">
                                                    @foreach($category as $key => $category)
                                                        <div class="custom-control custom-checkbox">
                                                            <a href="{{URL::to('/category-product/'.$category->category_id)}}"><label>{{($category->category_name)}}</label></a>
                                                        </div><!-- End .custom-checkbox -->
                                                    @endforeach
												</div><!-- End .filter-item -->
											</div><!-- End .filter-items -->
										</div><!-- End .widget-body -->
									</div><!-- End .collapse -->
        						</div><!-- End .widget -->

        						<div class="widget widget-collapsible">
    								<h3 class="widget-title">
									    <a data-toggle="collapse" href="#widget-2" role="button" aria-expanded="true" aria-controls="widget-2">
									        Bộ nhớ trong
									    </a>
									</h3><!-- End .widget-title -->

									<div class="collapse show" id="widget-2">
										<div class="widget-body">
											<div class="filter-items">
												<div class="filter-item">
                                                @foreach($attr_name as $key => $attr_name)
													<div class="custom-control custom-checkbox">
                                                        <a href="{{URL::to('/memory/'.$attr_name->attr_id)}}"><label>{{$attr_name->attr_name}}</label></a>
													</div><!-- End .custom-checkbox -->
                                                @endforeach
												</div><!-- End .filter-item -->
											</div><!-- End .filter-items -->
										</div><!-- End .widget-body -->
									</div><!-- End .collapse -->
        						</div><!-- End .widget -->

        						<div class="widget widget-collapsible">
    								<h3 class="widget-title">
									    <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true" aria-controls="widget-4">
									        Thương hiệu
									    </a>
									</h3><!-- End .widget-title -->

									<div class="collapse show" id="widget-4">
										<div class="widget-body">
											<div class="filter-items">
												<div class="filter-item">
                                                    @foreach($brand as $key => $brand)
                                                        <div class="custom-control custom-checkbox">
                                                            <a href="{{URL::to('/brand/'.$brand->brand_id)}}"><label>{{($brand->brand_name)}}</label></a>
                                                        </div><!-- End .custom-checkbox -->
                                                    @endforeach
												</div><!-- End .filter-item -->
											</div><!-- End .filter-items -->
										</div><!-- End .widget-body -->
									</div><!-- End .collapse -->
        						</div><!-- End .widget -->

        						<div class="widget widget-collapsible">
    								<h3 class="widget-title">
									    <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true" aria-controls="widget-5">
									        Giá
									    </a>
									</h3><!-- End .widget-title -->

									<div class="collapse show" id="widget-5">
										<div class="widget-body">
                                            <div class="filter-price">
                                                <div class="filter-price-text">
                                                    Khoảng giá:
                                                    <span id="filter-price-range">$0-$1000</span>
                                                </div><!-- End .filter-price-text -->

                                                <div id="price-slider"></div><!-- End #price-slider -->
                                            </div><!-- End .filter-price -->
										</div><!-- End .widget-body -->
									</div><!-- End .collapse -->
        						</div><!-- End .widget -->
                			</div><!-- End .sidebar sidebar-shop -->
                		</aside><!-- End .col-lg-3 -->
                	</div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
@endsection
