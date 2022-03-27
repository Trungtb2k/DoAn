@extends('admin.admin_layout')
@section('admin_content')
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      List Category Product
    </div>

    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
              </label>
            </th>
            <th>Product Category Name</th>
            <th>Image</th>
            <th>Display</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($list_category_product as $key => $cate_pro)
          <tr>
            <td><label class="i-checks m-b-none"><i></i></label></td>
            <td>{{$cate_pro->category_name}}</td>
            <td><img src="public/upload/category/{{$cate_pro->category_image}}" height="100" width="100"></td>
            <td><span class="text-ellipsis">
            <?php
                if($cate_pro->category_status==0){
                   ?>
                <a href="{{URL::to('/unactive-category-product/'.$cate_pro->category_id)}}"><span>Hide</span></a>
                <?php
                }else{
                ?>
                <a href="{{URL::to('/active-category-product/'.$cate_pro->category_id)}}"><span>Show</span></a>
                <?php
                }
                ?>
            </span></td>
            <td>
                <a href="{{URL::to('/edit-category-product/'.$cate_pro->category_id)}}" class="active" ui-toggle-class="">
                  <i class="fa fa-pencil text-success text-active"></i>
                </a>
                <a href="{{URL::to('/delete-category-product/'.$cate_pro->category_id)}}" class="active" ui-toggle-class="">
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
