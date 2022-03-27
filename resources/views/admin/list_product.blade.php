@extends('admin.admin_layout')
@section('admin_content')
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      List Product
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
            <th>Product Gallery</th>
            <th>Product Price</th>
            <th>Product Image</th>
            <th>Product Category</th>
            <th>Brand</th>
            <th>Display</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($list_product as $key => $pro)
          <tr>
            <td><label class="i-checks m-b-none"><i></i></label></td>
            <td>{{$pro->product_name}}</td>
            <td><a href="{{url('/add-gallery/'.$pro->product_id)}}">Add product gallery</td>
            <td>{{number_format($pro->product_price)}}đ</td>
            <td><img src="public/upload/product/{{$pro->product_image}}" height="100" width="100"></td>
            <td>{{$pro->category_name}}</td>
            <td>{{$pro->brand_name}}</td>
            <td><span class="text-ellipsis">
            <?php
                if($pro->product_status==0){
                   ?>
                <a href="{{URL::to('/unactive-product/'.$pro->brand_id)}}"><span>Hide</span></a>
                <?php
                }else{
                ?>
                <a href="{{URL::to('/active-product/'.$pro->brand_id)}}"><span>Show</span></a>
                <?php
                }
                ?>
            </span></td>
            <td>
                <a href="{{URL::to('/edit-product/'.$pro->product_id)}}" class="active" ui-toggle-class="">
                  <i class="fa fa-pencil text-success text-active"></i>
                </a>
                <a href="{{URL::to('/delete-product/'.$pro->product_id)}}" class="active" ui-toggle-class="">
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
