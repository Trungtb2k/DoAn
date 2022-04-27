@extends('admin.admin_layout')
@section('admin_content')
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê bài viết
    </div>

    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
              </label>
            </th>
            <th>Tên bài viết</th>
            <th>Slug</th>
            <th>Mô tả</th>
            <th>Hình ảnh</th>
            <th>Danh mục</th>
            <th>Hiển thị</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($all_post as $key => $post)
          <tr>
            <td><label class="i-checks m-b-none"><i></i></label></td>
            <td>{{$post->post_title}}</td>
            <td>{{$post->post_slug}}</td>
            <td>{{$post->post_desc}}</td>
            <td><img src="{{asset('public/upload/post/'.$post->post_image)}}" height="100" width="100"></td>
            <td>{{$post->cate_post->category_post_name}}</td>
            <td><span class="text-ellipsis">
            <?php
                if($post->postduct_status==0){
                   ?>
                <a href="{{URL::to('/unactive-post/'.$post->post_id)}}"><span>Hiển thị</span></a>
                <?php
                }else{
                ?>
                <a href="{{URL::to('/active-post/'.$post->post_id)}}"><span>Ẩn</span></a>
                <?php
                }
                ?>
            </span></td>
            <td>
                <a href="{{URL::to('/edit-post/'.$post->post_id)}}" class="active" ui-toggle-class="">
                  <i class="fa fa-pencil text-success text-active"></i>
                </a>
                <a href="{{URL::to('/delete-post/'.$post->post_id)}}" class="active" ui-toggle-class="">
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
