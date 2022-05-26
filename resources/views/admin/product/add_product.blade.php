@extends('admin.admin_layout')
@section('admin_content')
	<div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Add Product
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng sản phẩm</label>
                                    <input type="text" data-validation="number" name="product_quantity" class="form-control" id="exampleInputEmail1" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả</label>
                                    <textarea style="resize: none;" rows="5" name="product_desc" class="form-control" id="ckeditor1" required></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung</label>
                                    <textarea style="resize: none;" rows="5" name="product_content" class="form-control" id="ckeditor" required></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Cấu hình sản phẩm</label>
                                    <textarea style="resize: none;" rows="5" name="product_configuration" class="form-control" id="ckeditor2" required></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hình ảnh</label>
                                    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                                </div>

                                <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                    <select name="product_cate" class="form-control input-sm-m-bot15">
                                    @foreach($cate_product as $key => $cate)
                                        <option value="{{($cate->category_id)}}">{{($cate->category_name)}}</option>
                                    @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleInputPassword1">Thương hiệu</label>
                                    <select name="product_brand" class="form-control input-sm-m-bot15">
                                    @foreach($brand_product as $key => $brand)
                                        <option value="{{($brand->brand_id)}}">{{($brand->brand_name)}}</option>
                                    @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleInputPassword1">Trạng thái</label>
                                    <select name="product_status" class="form-control input-sm-m-bot15">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiện</option>
                                    </select>
                                </div>
                                <button type="submit" name="add_product" class="btn btn-info">Thêm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
        </div>
        </div>

@endsection
