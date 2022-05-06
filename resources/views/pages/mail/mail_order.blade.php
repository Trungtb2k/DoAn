<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Gửi Mail</title>
</head>

<body>
    <div class="container" style="border-radius: 12px; padding: 15px;">
        <div class="col-md-12">
            <p style="text-align: center;">Đây là email tự động. Quý khách không trả lời email này</p>
            <div class="row" style="padding: 15px;">
                <div class="col-md-6" style="text-align: center;font-weight: bold; font-size: 30px;">
                    <h4 style="margin: 0;">Molla</h4>
                    <h6 style="margin: 0;">Molla - Điện thoại, laptop, tablet, phụ kiện chính hãng</h6>
                </div>
                <div class="col-md-6 logo">
                    <p>Chào bạn, đây là thông tin đặt hàng của bạn:</p>
                </div>

                <div class="col-md-12">
                    <p>Họ và tên: <span>{{$data['shipping_name']}}</span></p>
                    <p>Số điện thoại: <span>{{$data['shipping_phone']}}</span></p>
                    <p>Địa chỉ: <span>{{$data['shipping_address']}}</span></p>
                    <p>Ghi chú: <span>{{$data['shipping_notes']}}</span></p>
                </div>

                <h4 style="text-transform: uppercase;">Sản phẩm đã đặt</h4>
                @php
                    $total = 0;
                    $index = 0;
                    $cart1 = Session::get('cart');
                    $cou1 = Session::get('coupon');
                @endphp
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart_array as $cart)
                        @php
                            $subtotal = ($cart['product_price'] * (int)$cart['product_qty']);
                            $total+=$subtotal;
                            $discount = 0;
                            $index+=1;
                        @endphp
                        <tr>
                            <th scope="row">{{$index}}</th>
                            <td>{{$cart['product_name']}}</td>
                            <td>{{$cart['product_price']}}</td>
                            <td>{{$cart['product_qty']}}</td>
                            <td>{{number_format($subtotal)}}đ</td>
                        </tr>
                        @endforeach
                        @if($cou1)
                           @foreach($cou1 as $cou)
                                @php
                                   $discount = ($total * $cou['coupon_discount']/100);
                                @endphp
                            @endforeach
                        @else
                            @php
                                $discount = 0;
                            @endphp
                        @endif
                    </tbody>
                </table>
                <table>
                        <tr>
                            <td>Phương thức thanh toán : {{$data1['payment_method']}}</td>
                        </tr>
                        <tr>
                            <td>Tổng tiền: {{number_format($total)}}đ</td>
                        </tr>
                        <tr>
                            <td>Giảm giá: {{number_format($discount)}}đ</td>
                        </tr>
                        <tr>
                            <td>Tổng tiền thanh toán: {{number_format($total-$discount)}}đ</td>
                        </tr>
                </table>
            </div>
        </div>
    </div>

</body>

</html>
