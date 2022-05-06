@extends('layout')
@section('content')
<main class="main">
        	<div class="page-header text-center" style="background-image: url(public/frontend/images/page-header-bg.jpg)">
        		<div class="container">
        			<h1 class="page-title">Thanh toán<span>Cửa hàng</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('/Home')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{URL::to('/shop')}}">Sản phẩm</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Thanh toán</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="checkout">
	                <div class="container">
            			<div class="checkout-discount">
            				<form action="#">
        						<input type="text" class="form-control" required id="checkout-discount-input">
            					<label for="checkout-discount-input" class="text-truncate">Mã giảm giá? <span><a href="{{URL::to('/show-cart')}}">Hãy nhập tại đây</a></span></label>
            				</form>
            			</div><!-- End .checkout-discount -->
            			<form action="{{URL::to('save-checkout')}}" method="POST">
                        {{csrf_field()}}
		                	<div class="row">
		                		<div class="col-lg-9">
		                			<h2 class="checkout-title">Chi tiết người nhận</h2><!-- End .checkout-title -->
		                				<div class="row">
		                					<div class="col-sm-6">
		                						<label>Họ và tên *</label>
		                						<input type="text" name="shipping_name" class="form-control" required>
		                					</div><!-- End .col-sm-6 -->

		                					<div class="col-sm-6">
		                						<label>Số điện thoại *</label>
		                						<input type="text" name="shipping_phone" class="form-control" required>
		                					</div><!-- End .col-sm-6 -->
		                				</div><!-- End .row -->


	            						<label>Địa chỉ *</label>
	            						<input type="text" name="shipping_address" class="form-control" required>

	                					<label>Email *</label>
	        							<input type="email" name="shipping_email" class="form-control" required>
	                					<label>Yêu cầu khác (không bắt buộc)</label>
	        							<textarea class="form-control" name="shipping_notes" cols="30" rows="4" placeholder="Ghi chú về đơn đặt hàng của bạn, ví dụ: lưu ý đặc biệt để giao hàng"></textarea>
		                		</div><!-- End .col-lg-9 -->
		                		<aside class="col-lg-3">
		                			<div class="summary">
		                				<h3 class="summary-title">Đơn hàng của bạn</h3><!-- End .summary-title -->

		                				<table class="table table-summary">
		                					<thead>
		                						<tr>
		                							<th>Sản phẩm</th>
		                							<th>Giá</th>
		                						</tr>
		                					</thead>

		                					<tbody>
                                            @php
                                                $total = 0;
                                                $discount = 0;
                                            @endphp
                                            @foreach(Session::get('cart') as $key => $cart)
                                                @php
                                                    $subtotal = $cart['product_price']*$cart['product_qty'];
                                                    $total+=$subtotal;
                                                @endphp
		                						<tr>
		                							<td>{{$cart['product_name']}}</a></td>
		                							<td>{{number_format($cart['product_price']*$cart['product_qty'])}}đ</td>
		                						</tr>
                                                @endforeach
		                						<tr class="summary-subtotal">
		                							<td>Tổng tiền:</td>
		                							<td>{{number_format($total)}}đ</td>
		                						</tr><!-- End .summary-subtotal -->
                                                <tr>
		                							<td>Giảm giá:</td>
                                                    @if(Session::get('coupon'))
                                                        @foreach(Session::get('coupon') as $key => $cou)
                                                        @php
                                                        $discount = ($total * $cou['coupon_discount']/100);
                                                        @endphp
                                                        @endforeach
                                                    @endif
                                                    <td>{{number_format($discount)}}đ</td>
		                						</tr>
		                						<tr>
		                							<td>Phí vận chuyển:</td>
		                							<td>Miễn phí</td>
		                						</tr>
		                						<tr class="summary-total">
		                							<td>Thành tiền:</td>
		                							<td>{{number_format($total-$discount)}}đ</td>
		                						</tr><!-- End .summary-total -->
		                					</tbody>

		                				</table><!-- End .table table-summary -->

                                        <form method="POST" action="{{URL::to('/save-checkout')}}">
		                				<div class="accordion-summary" id="accordion-payment">
                                            <p style="font-size: 15px;">Phương thức thanh toán: </p>
										    <div class="card">
										        <div class="card-header" id="heading-1">
										            <h2 class="card-title">
                                                    <input type="checkbox" style="margin-top: 5px;" class="collapsed" value="Chuyển khoản" name="payment_option" checked>
                                                        Chuyển khoản trực tiếp
										            </h2>
										        </div><!-- End .card-header -->
										    </div><!-- End .card -->

										    <div class="card">
										        <div class="card-header" id="heading-2">
										            <h2 class="card-title">
                                                    <input type="checkbox" style="margin-top: 5px;" class="collapsed" value="Thanh toán khi nhận hàng" name="payment_option">
										                Thanh toán khi nhận hàng
										            </h2>
										        </div><!-- End .card-header -->
										    </div><!-- End .card -->

										    <div class="card">
										        <div class="card-header" id="heading-4">
										            <h2 class="card-title">
                                                    <input type="checkbox" style="margin-top: 5px;" class="collapsed" value="VNPay" name="payment_option">
										                VNPay
										            </h2>
										        </div><!-- End .card-header -->
										    </div><!-- End .card -->
										</div><!-- End .accordion -->
                                        </form>

		                				<button type="submit" name="redirect" class="btn btn-outline-primary-2 btn-order btn-block">
		                					<span class="btn-text">Đặt hàng</span>
		                					<span class="btn-hover-text">Tiến hành thanh toán</span>
		                				</button>
		                			</div><!-- End .summary -->
		                		</aside><!-- End .col-lg-3 -->
		                	</div><!-- End .row -->
            			</form>
	                </div><!-- End .container -->
                </div><!-- End .checkout -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
@endsection
