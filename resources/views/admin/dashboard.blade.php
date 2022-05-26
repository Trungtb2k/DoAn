@extends('admin.admin_layout')
@section('admin_content')
<div class="container-fluid">
    <style type="text/css">
        p.title_thongke{
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }

    </style>
    <div class="row">
    <p class="title_thongke">Thống kê doanh số</p>
    <form action="#" autocomplete="off" style="margin-left: 15%;">
    @csrf
        <div class="col-md-3" style="margin-right: 50px;">
            <p>Từ ngày: <input type="text" id="datepicker" class="form-control"></p>
            <button type="submit" class="btn btn-primary btn-sm btn_dashboard_filter" value="Lọc kết quả">
                <span>Lọc kết quả</span>
            </p>
        </div>
        <div class="col-md-3" style="margin-right: 50px;">
            <p>Đến ngày: <input type="text" id="datepicker2" class="form-control"></p>
        </div>

        <div class="col-md-3">
            <p>
                Lọc theo:
                <select class="dashboard-filter form-control">
                    <option>---Chọn---</option>
                    <option value="7ngay">7 ngày qua</option>
                    <option value="thangtruoc">Tháng trước</option>
                    <option value="365ngayqua">Năm trước</option>
                </select>
            </p>
        </div>
    </form>
    <div class="col-md-12">
        <div id="myfirstchart" style="height: 250px;"></div>
    </div>
</div>

@endsection
