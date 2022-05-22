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
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Thư viện ảnh</th>
            <th>Hình ảnh</th>
            <th>Danh mục</th>
            <th>Thương hiệu</th>
            <th>Trạng thái</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($list_product as $key => $pro)
          <tr>
            <td><label class="i-checks m-b-none"><i></i></label></td>
            <td>{{$pro->product_name}}</td>
            <td>{{$pro->product_quantity}}</td>
            <td><a href="{{url('/add-gallery/'.$pro->product_id)}}">Thêm thư viện ảnh</td>
            <td><img src="public/upload/product/{{$pro->product_image}}" height="100" width="100"></td>
            <td>{{$pro->category_name}}</td>
            <td>{{$pro->brand_name}}</td>
            <td><span class="text-ellipsis">
            <?php
                if($pro->product_status==0){
                   ?>
                <a href="{{URL::to('/unactive-product/'.$pro->product_id)}}"><span>Ẩn</span></a>
                <?php
                }else{
                ?>
                <a href="{{URL::to('/active-product/'.$pro->product_id)}}"><span>Hiển thị</span></a>
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
