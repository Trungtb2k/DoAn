@extends('admin.admin_layout')
@section('admin_content')
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách mã giảm giá
    </div>

    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
              </label>
            </th>
            <th>Tên mã giảm giá</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày hết hạn</th>
            <th>Mã giảm giá</th>
            <th>Số lượng</th>
            <th>Số giảm</th>
            <th>Tình trạng</th>
            <th>Hết hạn</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($coupon as $key => $cou)
          <tr>
            <td><label class="i-checks m-b-none"><i></i></label></td>
            <td>{{$cou->coupon_name}}</td>
            <td>{{$cou->coupon_date_start}}</td>
            <td>{{$cou->coupon_date_end}}</td>
            <td>{{$cou->coupon_code}}</td>
            <td>{{$cou->coupon_time}}</td>
            <td>{{$cou->coupon_discount}}%</td>
            <td><span class="text-ellipsis">
            <?php
                if($cou->coupon_status==0){
                   ?>
                <a href="{{URL::to('/unactive-coupon/'.$cou->coupon_id)}}"><span>Có hiệu lực</span></a>
                <?php
                }else{
                ?>
                <a href="{{URL::to('/active-coupon/'.$cou->coupon_id)}}"><span>Hết hiệu lực</span></a>
                <?php
                }
                ?>
            </span></td>
            <td>
                <?php
                    if($cou->coupon_date_end>$today){
                        ?>
                        <span>Còn hạn</span>
                    <?php
                   }else{
                    ?>
                        <span>Hết hạn</span>
                        <?php
                    }
                ?>
            </td>
            <td>
                <a href="{{URL::to('/delete-coupon/'.$cou->coupon_id)}}" class="active" ui-toggle-class="">
                  <i class="fa fa-times text-danger text"></i>
                </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>
</div>
@endsection
