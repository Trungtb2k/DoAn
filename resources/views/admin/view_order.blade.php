@extends('admin.admin_layout')
@section('admin_content')
<section id="main-content">
	<section class="wrapper">
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Thông tin vận chuyển
    </div>

    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên người mua</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
          </tr>
        </thead>
        <tbody>
          <tr>

            <td>{{$order_2->shipping_name}}</td>
            <td>{{$order_2->shipping_address}}</td>
            <td>{{$order_2->shipping_phone}}</td>

          </tr>
        </tbody>
      </table>
    </div>

  </div>
</div>

<br></br>

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê chi tiết đơn hàng
    </div>

    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>

            <th>Tên sản phẩm</th>
            <th>Bộ nhớ</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Thành tiền</th>

            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        @foreach($order_by_Id as $v_content)
          <tr>
            <td>{{$v_content->product_name}}</td>
            <?php

                $mysqli = new mysqli('localhost','root','','molla');
                $memory = "select attr_name from tbl_attr where attr_id = ".$v_content->attr_id;
                $result = $mysqli->query($memory);
                $row = $result->fetch_assoc();
            ?>
            <td>{{$row['attr_name']}}</td>
            <td>{{$v_content->product_sales_quantity}}</td>
            <td>{{number_format($v_content->product_price)}} đ</td>
            <td>{{number_format($v_content->product_price*$v_content->product_sales_quantity)}} đ</td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>

  </div>
</div>
@endsection
