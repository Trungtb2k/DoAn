@extends('admin.admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      List Order
    </div>
    <div class="row w3-res-tb">

    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">

            </th>
            <th>Shipping Name</th>
            <th>Subtotal</th>
            <th>Discount</th>
            <th>Total</th>
            <th>Status</th>
            <th>Display</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($all_order as $key => $order)
          <tr>
            <td></td>
            <td>{{$order->shipping_name}}</td>
            <td>{{number_format($order->order_subtotal)}} đ</td>
            <td>{{number_format($order->order_discount)}} đ</td>
            <td>{{number_format($order->order_total)}} đ</td>
            <td>{{$order->order_status}}</td>
            <td>
              <a href="{{URL::to('/view-order/'.$order->order_id)}}" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có muốn xóa ?')" href="{{URL::to('/delete-order/'.$order->order_id)}}" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">

        </div>
      </div>
    </footer>
  </div>
</div>
@endsection
