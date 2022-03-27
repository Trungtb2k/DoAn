@extends('admin.admin_layout')
@section('admin_content')
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      List Coupon
    </div>

    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
              </label>
            </th>
            <th>Coupon Name</th>
            <th>Coupon Code</th>
            <th>Coupon Time</th>
            <th>Coupon Discount</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($coupon as $key => $cou)
          <tr>
            <td><label class="i-checks m-b-none"><i></i></label></td>
            <td>{{$cou->coupon_name}}</td>
            <td>{{$cou->coupon_code}}</td>
            <td>{{$cou->coupon_time}}</td>
            <td>{{$cou->coupon_discount}}</td>
            <td>
                <a href="{{URL::to('/delete-coupon/'.$cou->coupon_id)}}" class="active" ui-toggle-class="">
                  <i class="fa fa-times text-danger text"></i>
                </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>
</div>
@endsection
