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
                            Add Product
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Name</label>
                                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Description</label>
                                    <textarea style="resize: none;" rows="5" name="product_desc" class="form-control" id="ckeditor1"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Product Content</label>
                                    <textarea style="resize: none;" rows="5" name="product_content" class="form-control" id="ckeditor"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Product Configuration</label>
                                    <textarea style="resize: none;" rows="5" name="product_configuration" class="form-control" id="ckeditor2"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Image</label>
                                    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Price</label>
                                    <input type="text" name="product_price" class="form-control" id="exampleInputEmail1">
                                </div>

                                <div class="form-group">
                                <label for="exampleInputPassword1">Memory</label>
                                    <select name="product_memory" class="form-control input-sm-m-bot15">
                                        <option value="64">64</option>
                                        <option value="128">128</option>
                                        <option value="256">256</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleInputPassword1">Product Category</label>
                                    <select name="product_cate" class="form-control input-sm-m-bot15">
                                    @foreach($cate_product as $key => $cate)
                                        <option value="{{($cate->category_id)}}">{{($cate->category_name)}}</option>
                                    @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleInputPassword1">Brand</label>
                                    <select name="product_brand" class="form-control input-sm-m-bot15">
                                    @foreach($brand_product as $key => $brand)
                                        <option value="{{($brand->brand_id)}}">{{($brand->brand_name)}}</option>
                                    @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleInputPassword1">Status</label>
                                    <select name="product_status" class="form-control input-sm-m-bot15">
                                        <option value="0">Hide</option>
                                        <option value="1">Show</option>
                                    </select>
                                </div>
                                <button type="submit" name="add_product" class="btn btn-info">Add</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
        </div>
        </div>
</section>
@endsection
