@extends('admin.admin_layout')
@section('admin_content')
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      List Brand Product
    </div>

    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
              </label>
            </th>
            <th>Brand Name</th>
            <th>Display</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($list_brand_product as $key => $brand_pro)
          <tr>
            <td><label class="i-checks m-b-none"><i></i></label></td>
            <td>{{$brand_pro->brand_name}}</td>
            <td><span class="text-ellipsis">
            <?php
                if($brand_pro->brand_status==0){
                   ?>
                <a href="{{URL::to('/unactive-brand-product/'.$brand_pro->brand_id)}}"><span>Hide</span></a>
                <?php
                }else{
                ?>
                <a href="{{URL::to('/active-brand-product/'.$brand_pro->brand_id)}}"><span>Show</span></a>
                <?php
                }
                ?>
            </span></td>
            <td>
                <a href="{{URL::to('/edit-brand-product/'.$brand_pro->brand_id)}}" class="active" ui-toggle-class="">
                  <i class="fa fa-pencil text-success text-active"></i>
                </a>
                <a href="{{URL::to('/delete-brand-product/'.$brand_pro->brand_id)}}" class="active" ui-toggle-class="">
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
