@extends('admin.admin_layout')
@section('admin_content')
	<div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Add Category Product
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-category-product')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Category Name</label>
                                    <input type="text" name="product_category_name" class="form-control" id="exampleInputEmail1">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Description</label>
                                    <textarea style="resize: none" rows="5" type="text" name="product_category_desc" class="form-control" id="exampleInputPassword1"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Image</label>
                                    <input type="file" name="product_category_image" class="form-control" id="exampleInputEmail1">
                                </div>

                                <div class="form-group">
                                <label for="exampleInputPassword1">Status</label>
                                    <select name="product_category_status" class="form-control input-sm-m-bot15">
                                        <option value="0">Hide</option>
                                        <option value="1">Show</option>
                                    </select>
                                </div>

                                <button type="submit" name="add_category_product" class="btn btn-info">Add</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
        </div>
        </div>
@endsection
