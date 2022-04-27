@extends('admin.admin_layout')
@section('admin_content')
<section id="main-content">
	<section class="wrapper">
	<div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật bài viết
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-post/'.$post->post_id)}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên bài viết</label>
                                    <input type="text" name="post_title" value="{{$post->post_title}}" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slug</label>
                                    <input type="text" name="post_slug" value="{{$post->post_slug}}" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Meta từ khóa</label>
                                    <input type="text" name="post_meta_keyword" value="{{$post->post_meta_keyword}}" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Meta nội dung</label>
                                    <input type="text" name="post_meta_desc" value="{{$post->post_meta_desc}}" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tóm tắt bài viết</label>
                                    <textarea style="resize: none" rows="5" type="text" name="post_desc" class="form-control" id="ckeditor1">{{$post->post_desc}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung bài viết</label>
                                    <textarea style="resize: none" rows="5" type="text" name="post_content" class="form-control" id="ckeditor2">{{$post->post_content}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hình ảnh bài viết</label>
                                    <input type="file" name="post_image" class="form-control" id="exampleInputEmail1">
                                    <img src="{{asset('public/upload/post/'.$post->post_image)}}" height="100px" width="100px">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục bài viết</label>
                                    <select name="category_post_id" class="form-control input-sm-m-bot15">
                                    @foreach($cate_post as $key => $cate)

                                        @if($post->category_post_id==$cate->category_post_id)
                                            <option selected value="{{($cate->category_post_id)}}">{{($cate->category_post_name)}}</option>
                                        @else
                                            <option value="{{($cate->category_post_id)}}">{{($cate->category_post_name)}}</option>
                                        @endif
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name="post_status" class="form-control input-sm-m-bot15">
                                        @if($post->post_status==0)
                                            <option selected value="0">Hiển thị</option>
                                            <option value="1">Ẩn</option>
                                        @else
                                            <option value="0">Hiển thị</option>
                                            <option selected value="1">Ẩn</option>
                                        @endif
                                    </select>
                                </div>
                                <button type="submit" name="update_post" class="btn btn-info">Cập nhật</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
        </div>
        </div>
</section>
@endsection
