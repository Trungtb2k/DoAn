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
                            Add Product Details
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-product-details')}}" method="post">
                                {{csrf_field()}}

                                <div class="form-group">
                                <label for="exampleInputPassword1">Product Name</label>
                                    <select name="product_name" class="form-control input-sm-m-bot15">
                                    @foreach($product as $key => $value)
                                        <option value="{{($value->product_id)}}">{{($value->product_name)}}</option>
                                    @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleInputPassword1">Memory</label>
                                    <select name="product_memory" class="form-control input-sm-m-bot15">
                                    @foreach($attr_product as $key => $attr)
                                        <option value="{{($attr->attr_id)}}">{{($attr->attr_name)}}</option>
                                    @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Product Price</label>
                                    <input type="text" name="product_price" class="form-control" id="exampleInputEmail1">
                                </div>

                                <div class="form-group">
                                <label for="exampleInputPassword1">Status</label>
                                    <select name="product_attr_status" class="form-control input-sm-m-bot15">
                                        <option value="0">Hide</option>
                                        <option value="1">Show</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                <button type="submit" name="add_product_details" class="btn btn-info">Add</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
        </div>
        </div>
</section>
@endsection
