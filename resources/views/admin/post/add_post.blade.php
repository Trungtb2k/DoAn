@extends('admin.admin_layout')
@section('admin_content')
	<div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm bài viết
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-post')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên bài viết</label>
                                    <input type="text" name="post_title" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slug</label>
                                    <input type="text" name="post_slug" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Meta từ khóa</label>
                                    <input type="text" name="post_meta_keyword" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Meta nội dung</label>
                                    <input type="text" name="post_meta_desc" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tóm tắt bài viết</label>
                                    <textarea style="resize: none" rows="5" type="text" name="post_desc" class="form-control" id="ckeditor1"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung bài viết</label>
                                    <textarea style="resize: none" rows="5" type="text" name="post_content" class="form-control" id="ckeditor2"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hình ảnh bài viết</label>
                                    <input type="file" name="post_image" class="form-control" id="exampleInputEmail1" required>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục bài viết</label>
                                    <select name="category_post_id" class="form-control input-sm-m-bot15">
                                    @foreach($category_post as $key => $cate)
                                        <option value="{{($cate->category_post_id)}}">{{($cate->category_post_name)}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name="post_status" class="form-control input-sm-m-bot15">
                                        <option value="0">Hiển thị</option>
                                        <option value="1">Ẩn</option>
                                    </select>
                                </div>
                                <button type="submit" name="add_post" class="btn btn-info">Thêm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
        </div>
        </div>

@endsection
