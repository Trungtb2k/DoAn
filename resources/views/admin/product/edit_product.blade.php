@extends('admin.admin_layout')
@section('admin_content')
	<div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Update Product
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                @foreach($edit_product as $key => $pro)
                                <form role="form" action="{{URL::to('/update-product/'.$pro->product_id)}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" value="{{($pro->product_name)}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng</label>
                                    <input type="text" name="product_quantity" class="form-control" id="exampleInputEmail1" value="{{($pro->product_quantity)}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả</label>
                                    <textarea style="resize: none" rows="5" type="text" name="product_desc" class="form-control" id="ckeditor1">{{($pro->product_desc)}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung</label>
                                    <textarea style="resize: none" rows="5" type="text" name="product_content" class="form-control" id="ckeditor">{{($pro->product_content)}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Cấu hình sản phẩm</label>
                                    <textarea style="resize: none" rows="5" type="text" name="product_configuration" class="form-control" id="ckeditor2">{{($pro->product_config)}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hình ảnh</label>
                                    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                                    <img src="{{URL::to('public/upload/product/'.$pro->product_image)}}" height="100px" width="100px">
                                </div>

                                <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                    <select name="product_cate" class="form-control input-sm-m-bot15">
                                    @foreach($cate_product as $key => $cate)
                                        @if($cate->category_id==$pro->category_id)
                                            <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                        @else
                                            <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                        @endif
                                    @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleInputPassword1">Thương hiệu</label>
                                    <select name="product_brand" class="form-control input-sm-m-bot15">
                                    @foreach($brand_product as $key => $brand)
                                        @if($brand->brand_id==$pro->brand_id)
                                            <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                        @else
                                            <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                        @endif
                                    @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleInputPassword1">Trạng thái</label>
                                    <select name="product_status" class="form-control input-sm-m-bot15">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiển thị</option>
                                    </select>
                                </div>
                                <button type="submit" name="update_product" class="btn btn-info">Cập nhật</button>
                            </form>
                            @endforeach
                            </div>

                        </div>
                    </section>

            </div>
        </div>
        </div>
@endsection
