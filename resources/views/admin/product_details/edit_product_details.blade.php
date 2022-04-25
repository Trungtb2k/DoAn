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
                            Update Product Details
                        </header>
                        <div class="panel-body">
                            @foreach($edit_product_details as $key => $value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-product-details/'.$value->product_id.'/'.$value->attr_id)}}" method="post">
                                {{csrf_field()}}

                                @foreach($product as $key => $value1)
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Name</label>
                                        <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" value="{{($value1->product_name)}}" disabled>
                                    </div>
                                @endforeach

                                @foreach($attr_product as $key => $value2)
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Memory</label>
                                        <input type="text" name="product_memory" class="form-control" id="exampleInputEmail1" value="{{($value2->attr_name)}}" disabled>
                                    </div>
                                @endforeach

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Price</label>
                                    <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" value="{{($value->product_price)}}">
                                </div>

                                <button type="submit" name="update_product_details" class="btn btn-info">Update</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
        </div>
        </div>
</section>
@endsection
