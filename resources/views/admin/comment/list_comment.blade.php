@extends('admin.admin_layout')
@section('admin_content')
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê bình luận
    </div>

    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
              </label>
            </th>
            <th>Tên người gửi</th>
            <th>Bình luận</th>
            <th>Sản phẩm</th>
            <th>Sao</th>
            <th>Trạng thái</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($list_comment as $key => $cmt)
          <tr>
            <td><label class="i-checks m-b-none"><i></i></label></td>
            <td>{{$cmt->comment_name}}</td>
            <td>{{$cmt->comment}}</td>
            <td>{{$cmt->comment_product_id}}</td>
            <td>{{$cmt->star}}</td>
            <td><span class="text-ellipsis">
            <?php
                if($cmt->comment_status==0){
                   ?>
                <a href="{{URL::to('/unactive-comment/'.$cmt->comment_id)}}"><span>Duyệt</span></a>
                <?php
                }else{
                ?>
                <a href="{{URL::to('/active-comment/'.$cmt->comment_id)}}"><span>Bỏ duyệt</span></a>
                <?php
                }
                ?>
            </span></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>
</div>
@endsection
