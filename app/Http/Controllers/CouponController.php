<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

use App\Models\Coupon;

class CouponController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('Admin')->send();
        }
    }

    public function add_coupon()
    {
        $this->AuthLogin();
        return view('admin.coupon.add_coupon');
    }

    public function save_coupon(Request $request)
    {
        $data = $request->all();

        $coupon = new Coupon();
        $coupon->coupon_name = $data['coupon_name'];
        $coupon->coupon_code = $data['coupon_code'];
        $coupon->coupon_date_start = $data['coupon_date_start'];
        $coupon->coupon_date_end = $data['coupon_date_end'];
        $coupon->coupon_time = $data['coupon_time'];
        $coupon->coupon_discount = $data['coupon_discount'];
        $coupon->coupon_status = 0;
        $coupon->save();

        return Redirect::to('list-coupon');
    }

    public function list_coupon()
    {
        $this->AuthLogin();
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $coupon = Coupon::orderBy('coupon_id', 'desc')->get();
        return view('admin.coupon.list_coupon')->with(compact('coupon','today'));
    }

    public function delete_coupon($coupon_id)
    {
        $this->AuthLogin();
        DB::table('tbl_coupon')->where('coupon_id', $coupon_id)->delete();
        return Redirect::to('list-coupon');
    }

    public function active_coupon($coupon_id){
        $this->AuthLogin();
        DB::table('tbl_coupon')->where('coupon_id',$coupon_id)->update(['coupon_status'=>0]);
        return Redirect::to('list-coupon');
    }

    public function unactive_coupon($coupon_id){
        $this->AuthLogin();
        DB::table('tbl_coupon')->where('coupon_id',$coupon_id)->update(['coupon_status'=>1]);
        return Redirect::to('list-coupon');
    }

}
