@extends('admin.admin_layout')
@section('admin_content')
	<div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Add Coupon
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-coupon')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Coupon Name</label>
                                    <input type="text" name="coupon_name" class="form-control" id="exampleInputEmail1">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày bắt đầu</label>
                                    <input type="text" name="coupon_date_start" id="datepicker3" class="form-control" id="exampleInputEmail1">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày kết thúc</label>
                                    <input type="text" name="coupon_date_end" id="datepicker4" class="form-control" id="exampleInputEmail1">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Coupon Code</label>
                                    <input type="text" name="coupon_code" class="form-control" id="exampleInputEmail1">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Amount</label>
                                    <input type="text" name="coupon_time" class="form-control" id="exampleInputEmail1">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Discount</label>
                                    <input type="text" name="coupon_discount" class="form-control" id="exampleInputEmail1">
                                </div>


                                <button type="submit" name="add_coupon" class="btn btn-info">Add</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
        </div>
        </div>
@endsection
