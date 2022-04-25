@extends('admin.admin_layout')
@section('admin_content')
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      List Product Details
    </div>

    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
              </label>
            </th>
            <th>Product Name</th>
            <th>Product Memory</th>
            <th>Product Price</th>
            <th>Display</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($list_product_details as $key => $attr)
          <tr>
            <td><label class="i-checks m-b-none"><i></i></label></td>
            <td>{{$attr->product_name}}</td>
            <td>{{$attr->attr_name}}</td>
            <td>{{$attr->product_price}}</td>
            <td><span class="text-ellipsis">
            <?php
                if($attr->product_attr_status==0){
                   ?>
                <a href="{{URL::to('/unactive-product-attr/'.$attr->product_id.'/'.$attr->attr_id)}}"><span>Hide</span></a>
                <?php
                }else{
                ?>
                <a href="{{URL::to('/active-product-attr/'.$attr->product_id.'/'.$attr->attr_id)}}"><span>Show</span></a>
                <?php
                }
                ?>
            </span></td>
            <td>
                <a href="{{URL::to('/edit-product-details/'.$attr->product_id.'/'.$attr->attr_id)}}" class="active" ui-toggle-class="">
                  <i class="fa fa-pencil text-success text-active"></i>
                </a>
                <a href="{{URL::to('/delete-product-details/'.$attr->product_id.'/'.$attr->attr_id)}}" class="active" ui-toggle-class="">
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
