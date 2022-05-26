@extends('admin.admin_layout')
@section('admin_content')
	<div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Update Brand Product
                        </header>
                        <div class="panel-body">
                            @foreach($edit_brand_product as $key => $value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-brand-product/'.$value->brand_id)}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Brand Name</label>
                                    <input type="text" value="{{$value->brand_name}}" name="brand_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Description</label>
                                    <textarea style="resize: none" rows="5" type="text" name="brand_desc" class="form-control">{{$value->brand_desc}}</textarea>
                                </div>
                                <button type="submit" name="update_brand_product" class="btn btn-info">Update</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
        </div>
        </div>
@endsection
