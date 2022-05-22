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
            <input type="hidden" name="product_sales_quantity" value="{{$v_content->product_sales_quantity}}">
            <input type="hidden" name="order_product_id" class="order_product_id" value="{{$v_content->product_id}}">
            <td>{{number_format($v_content->product_price)}} đ</td>
            <td>{{number_format($v_content->product_price*$v_content->product_sales_quantity)}} đ</td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>

  </div>
  </div>
</div>

<br></br>

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Trạng thái đơn hàng
    </div>

    <div class="table-responsive">
    @foreach($order_by_Id1 as $key=>$status)
            @if($status->order_status==0)
                <form>
                    @csrf
                    <select class="form-control order_details">
                        <option id="{{$status->order_id}}" selected value="0">Đang xử lý</option>
                        <option id="{{$status->order_id}}" value="1">Đã được xử lý</option>
                        <option id="{{$status->order_id}}" value="2">Vận chuyển</option>
                        <option id="{{$status->order_id}}" value="3">Từ chối nhận</option>
                        <option id="{{$status->order_id}}" value="4">Hoàn lại</option>
                        <option id="{{$status->order_id}}" value="5">Hoàn thành</option>
                    </select>
                </form>
            @elseif($status->order_status==1)
                <form>
                    @csrf
                    <select class="form-control order_details">
                        <option id="{{$status->order_id}}" value="0">Đang xử lý</option>
                        <option id="{{$status->order_id}}" selected value="1">Đã được xử lý</option>
                        <option id="{{$status->order_id}}" value="2">Vận chuyển</option>
                        <option id="{{$status->order_id}}" value="3">Từ chối nhận</option>
                        <option id="{{$status->order_id}}" value="4">Hoàn lại</option>
                        <option id="{{$status->order_id}}" value="5">Hoàn thành</option>
                    </select>
                </form>
            @elseif($status->order_status==2)
                <form>
                    @csrf
                    <select class="form-control order_details">
                        <option id="{{$status->order_id}}" value="0">Đang xử lý</option>
                        <option id="{{$status->order_id}}" value="1">Đã được xử lý</option>
                        <option id="{{$status->order_id}}" selected value="2">Vận chuyển</option>
                        <option id="{{$status->order_id}}" value="3">Từ chối nhận</option>
                        <option id="{{$status->order_id}}" value="4">Hoàn lại</option>
                        <option id="{{$status->order_id}}" value="5">Hoàn thành</option>
                    </select>
                </form>
            @elseif($status->order_status==3)
                <form>
                    @csrf
                    <select class="form-control order_details">
                        <option id="{{$status->order_id}}" value="0">Đang xử lý</option>
                        <option id="{{$status->order_id}}" value="1">Đã được xử lý</option>
                        <option id="{{$status->order_id}}" selected value="2">Vận chuyển</option>
                        <option id="{{$status->order_id}}" value="3">Từ chối nhận</option>
                        <option id="{{$status->order_id}}" value="4">Hoàn lại</option>
                        <option id="{{$status->order_id}}" value="5">Hoàn thành</option>
                    </select>
                </form>
            @elseif($status->order_status==4)
                <form>
                    @csrf
                    <select class="form-control order_details">
                        <option id="{{$status->order_id}}" value="0">Đang xử lý</option>
                        <option id="{{$status->order_id}}" value="1">Đã được xử lý</option>
                        <option id="{{$status->order_id}}" value="2">Vận chuyển</option>
                        <option id="{{$status->order_id}}" value="3">Từ chối nhận</option>
                        <option id="{{$status->order_id}}" selected value="4">Hoàn lại</option>
                        <option id="{{$status->order_id}}" value="5">Hoàn thành</option>
                    </select>
                </form>
            @elseif($status->order_status==5)
                <form>
                    @csrf
                    <select class="form-control order_details">
                        <option id="{{$status->order_id}}" value="0">Đang xử lý</option>
                        <option id="{{$status->order_id}}" value="1">Đã được xử lý</option>
                        <option id="{{$status->order_id}}" value="2">Vận chuyển</option>
                        <option id="{{$status->order_id}}" value="3">Từ chối nhận</option>
                        <option id="{{$status->order_id}}" value="4">Hoàn lại</option>
                        <option id="{{$status->order_id}}" selected value="5">Hoàn thành</option>
                    </select>
                </form>
            @endif
        @endforeach
    </div>

@endsection
