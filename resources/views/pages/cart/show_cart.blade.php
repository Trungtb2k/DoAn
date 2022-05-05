@extends('layout')
@section('content')
<main class="main">
        	<div class="page-header text-center" style="background-image: url(public/frontend/images/page-header-bg.jpg)">
        		<div class="container">
        			<h1 class="page-title">Giỏ hàng<span>Cửa hàng</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('/Home')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{URL::to('/shop')}}">Sản phẩm</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="cart">
	                <div class="container">
                    <form action="{{url('/update-cart')}}" method="POST">
                            {{csrf_field()}}
	                	<div class="row">
	                		<div class="col-lg-9">
	                			<table class="table table-cart table-mobile">
									<thead>
										<tr>
											<th>Sản phẩm</th>
                                            <th>Bộ nhớ</th>
											<th>Giá</th>
											<th>Số lượng</th>
											<th>Thành tiền</th>
											<th></th>
										</tr>
									</thead>

									<tbody>
                                    @php
                                        $total = 0;
                                        $cart1 = Session::get('cart');
                                        $cou1 = Session::get('coupon');
                                        if($cart1 == false){
                                            $cart1 = [];
                                        }
                                        if($cou1 == false){
                                            $cou1 = [];
                                        }
                                    @endphp
                                    @foreach($cart1 as $key => $cart)
                                        @php
                                                $subtotal = ($cart['product_price'] * (int)$cart['product_qty']);
                                                $total+=$subtotal;
                                        @endphp
										<tr>
											<td class="product-col">
												<div class="product">
													<figure class="product-media">
														<a href="#">
															<img src="{{asset('public/upload/product/'.$cart['product_image'])}}" alt="{{$cart['product_name']}}">
														</a>
													</figure>

													<h3 class="product-title">
														<a href="{{URL::to('/product-details/'.$cart['product_id'].'/'.$cart['attr_id'])}}">{{$cart['product_name']}}</a>
													</h3><!-- End .product-title -->
												</div><!-- End .product -->
											</td>
                                            <?php

                                                $mysqli = new mysqli('localhost','root','','molla');
                                                $memory = "select attr_name from tbl_attr where attr_id = ".$cart['attr_id'];
                                                $result = $mysqli->query($memory);
                                                $row = $result->fetch_assoc();
                                            ?>
                                            <td>{{$row['attr_name']}}</td>
											<td class="price-col">{{number_format($cart['product_price'])}}đ</td>
											<td class="quantity-col">
                                                <div class="cart-product-quantity">
                                                    <input type="number" class="form-control" value="{{$cart['product_qty']}}" name="cart_qty[{{$cart['session_id']}}]">
                                                </div><!-- End .cart-product-quantity -->
                                            </td>
											<td class="total-col">{{number_format($subtotal)}}đ</td>
											<td class="remove-col"><button class="btn-remove"><a class="icon-close" href="{{url('/del-product/'.$cart['session_id'])}}"></a></button></td>
										</tr>
                                        @endforeach
									</tbody>
								</table><!-- End .table table-wishlist -->

	                			<div class="cart-bottom">
			            			<div class="cart-discount">
			            				<form>
			            					<div class="input-group">
				        						<input type="text" name="coupon" class="form-control" placeholder="Mã giảm giá">
			        						</div><!-- End .input-group -->
			            				</form>
			            			</div><!-- End .cart-discount -->
                                    <input type="submit" value="Cập nhật" name="update_qty" class="btn btn-outline-dark-2">
		            			</div><!-- End .cart-bottom -->
	                		</div><!-- End .col-lg-9 -->

	                		<aside class="col-lg-3">
	                			<div class="summary summary-cart">
	                				<h3 class="summary-title">Giỏ hàng</h3><!-- End .summary-title -->

	                				<table class="table table-summary">
	                					<tbody>
	                						<tr class="summary-subtotal">
	                							<td>Tổng tiền:</td>
	                							<td>{{number_format($total)}}đ</td>
	                						</tr><!-- End .summary-subtotal -->

                                            <tr class="summary-subtotal">
	                							<td>Giảm giá:</td>
                                                @php
                                                    $discount = 0;
                                                @endphp
                                                @if($cou1)
                                                    @foreach($cou1 as $key => $cou)
                                                        @php
                                                        $discount = ($total * $cou['coupon_discount']/100);
                                                        @endphp
                                                    @endforeach
                                                @endif
                                                <td>{{number_format($discount)}}đ</td>
	                						</tr><!-- End .summary-subtotal -->

	                						<tr class="summary-total">
	                							<td>Thành tiền:</td>
	                							<td>{{number_format($total-$discount)}}đ</td>
	                						</tr><!-- End .summary-total -->
	                					</tbody>
	                				</table><!-- End .table table-summary -->

	                				<a href="{{URL::to('/checkout')}}" class="btn btn-outline-primary-2 btn-order btn-block">Thanh toán</a>
	                			</div><!-- End .summary -->

		            			<a href="{{URL::to('/')}}" class="btn btn-outline-dark-2 btn-block mb-3"><span>Tiếp tục mua sắm</span><i class="icon-refresh"></i></a>
	                		</aside><!-- End .col-lg-3 -->

	                	</div><!-- End .row -->
                    </form>
	                </div><!-- End .container -->

                </div><!-- End .cart -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
@endsection
