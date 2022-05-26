@extends('admin.admin_layout')
@section('admin_content')
	<div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Update Category Product
                        </header>
                        <div class="panel-body">
                            @foreach($edit_category_product as $key => $value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-category-product/'.$value->category_id)}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Category Name</label>
                                    <input type="text" value="{{$value->category_name}}" name="product_category_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Description</label>
                                    <textarea style="resize: none" rows="5" type="text" name="product_category_desc" class="form-control">{{$value->category_desc}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Image</label>
                                    <input type="file" name="product_category_image" class="form-control" id="exampleInputEmail1">
                                    <img src="{{URL::to('public/upload/category/'.$value->category_image)}}" height="100px" width="100px">
                                </div>
                                <button type="submit" name="update_category_product" class="btn btn-info">Update</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
        </div>
        </div>
@endsection
