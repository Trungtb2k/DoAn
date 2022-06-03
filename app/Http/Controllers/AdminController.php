<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\Statistic;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('Admin')->send();
        }
    }

    public function index(){
       return view('admin.admin_login');
    }

    public function show_dashboard(){
        $this->AuthLogin();
        return view('admin.dashboard');
    }

    public function dashboard(Request $request){
        $admin_email = $request->admin_email;
        $admin_password = $request->admin_password;

        $result = DB::table('tbl_admin')->where('admin_email',$admin_email)
        ->where('admin_password',$admin_password)->first();
        if($result){
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/Admin');
        }

    }

    public function logout(){
        $this->AuthLogin();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/Admin');
    }

    public function day_orders(Request $request){
        $data = $request->all();
        $sub60days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(60)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $get = DB::table('tbl_statistical')->whereBetween('order_date',[$sub60days,$now])->orderBy('order_date','ASC')->get();

        foreach($get as $key => $val){
            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit'=> $val->profit,
                'quantity'=>$val->quantity
            );
        }
        echo $data = json_encode($chart_data);
    }

    public function sevenday_orders(Request $request){
        $data = $request->all();
        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $get = DB::table('tbl_statistical')->whereBetween('order_date',[$sub7days,$now])->orderBy('order_date','ASC')->get();

        foreach($get as $key => $val){
            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit'=> $val->profit,
                'quantity'=>$val->quantity
            );
        }
        echo $data = json_encode($chart_data);
    }

    public function year_orders(Request $request){
        $data = $request->all();
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $get = DB::table('tbl_statistical')->whereBetween('order_date',[$sub365days,$now])->orderBy('order_date','ASC')->get();

        foreach($get as $key => $val){
            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit'=> $val->profit,
                'quantity'=>$val->quantity
            );
        }
        echo $data = json_encode($chart_data);
    }

    public function month_orders(Request $request){
        $data = $request->all();
        $sub30days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(30)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $get = DB::table('tbl_statistical')->whereBetween('order_date',[$sub30days,$now])->orderBy('order_date','ASC')->get();

        foreach($get as $key => $val){
            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit'=> $val->profit,
                'quantity'=>$val->quantity
            );
        }
        echo $data = json_encode($chart_data);
    }
}
