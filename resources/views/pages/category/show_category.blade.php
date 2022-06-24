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
                                        <input type="hidden" id="wishlist_productprice{{$value->product_id}}" value="{{$value->product_price-($value->product_discount*$value->product_price/100)}}" class="cart_product_price_{{$value->product_id}}">
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
                                            <?php
                                            if ($value->product_discount == 0) {
                                            ?>
                                                <div class="product-price" style="color: #c96;">
                                                    {{number_format($value->product_price)}}đ
                                                </div><!-- End .product-price -->
                                            <?php
                                            } else {
                                            ?>
                                                <div class="product-pri" style="text-decoration-line:line-through;color: #a8afb7;">
                                                    {{number_format($value->product_price)}}đ
                                                </div><!-- End .product-price -->
                                                <div class="product-price" style="color: #c96;">
                                                    {{number_format($value->product_price -($value->product_discount*$value->product_price/100))}}đ
                                                </div><!-- End .product-price -->
                                            <?php
                                            }
                                            ?>
                                        </div><!-- End .product-body -->
                                    </form>
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                            @endforeach
                        </div><!-- End .row -->
                    </div><!-- End .products -->

                    <nav aria-label="Page navigation" style="justify-content: center;display: flex;">
                        {{ $list_product->links("pagination::bootstrap-4") }}
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
                                    Khoảng giá
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-4">
                                <div class="widget-body">
                                    <div class="filter-items">

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <a href="{{URL::to('/duoi-2-trieu')}}"><label>Dưới 2 triệu</label></a>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <a href="{{URL::to('/tu-2-4-trieu')}}"><label>Từ 2 - 4 triệu</label></a>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <a href="{{URL::to('/tu-4-7-trieu')}}"><label>Từ 4 - 7 triệu</label></a>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">

                                                <a href="{{URL::to('/tu-7-13-trieu')}}"><label>Từ 7 - 13 triệu</label></a>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">

                                                <a href="{{URL::to('/tu-13-20-trieu')}}"><label>Từ 13 - 20 triệu</label></a>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">

                                                <a href="{{URL::to('/tren-20-trieu')}}"><label>Trên 20 triệu</label></a>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                    </div><!-- End .filter-items -->
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
