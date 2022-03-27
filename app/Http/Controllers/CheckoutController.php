<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class CheckoutController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('Admin')->send();
        }
    }

    public function checkout(){
        return view('pages.checkout.show_checkout');
    }

    public function save_checkout(Request $request){
        $data = array();
        $data['shipping_name']=$request->shipping_name;
        $data['shipping_phone']=$request->shipping_phone;
        $data['shipping_address']=$request->shipping_address;
        $data['shipping_email']=$request->shipping_email;
        $data['shipping_notes']=$request->shipping_notes;

        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);
        Session::put('shipping_id',$shipping_id);

        //insert payment method
        $data1 = array();
        $data1['payment_method'] = $request->payment_option;
        $data1['payment_status'] = 0;
        $payment_id = DB::table('tbl_payment')->insertGetId($data1);

        //insert order
        $subtotal =0;
        $discount = 0;
        foreach(Session::get('cart') as $key => $cart){
            $subtotal = $cart['product_price']*$cart['product_qty'];
        }

        foreach(Session::get('coupon') as $key => $cou){
            $discount = ($cou['coupon_discount']*$subtotal)/100;
        }
        $order_data = array();
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_subtotal'] = $subtotal;
        $order_data['order_discount']= $discount;
        $order_data['order_total']= $subtotal - $discount;
        $order_data['order_status'] = 0;
        $order_id = DB::table('tbl_order')->insertGetId($order_data);

        //insert order detail

        foreach($content = Session::get('cart') as $key => $v_content){
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $v_content['product_id'];
            $order_d_data['product_name'] = $v_content['product_name'];
            $order_d_data['product_price'] = $v_content['product_price'];
            $order_d_data['product_sales_quantity'] = $v_content['product_qty'];
            $result = DB::table('tbl_order_details')->insert($order_d_data);
        }

        if($data1['payment_method']=='Chuyển khoản'){
            return Redirect::to('/Home');
        }elseif($data1['payment_method']=='Tiền mặt'){
            return view('pages.checkout.handcash');
        }

    }

    public function manager_order(){
        $this->AuthLogin();
        $all_order = DB::table('tbl_order')->join('tbl_shipping','tbl_shipping.shipping_id','=','tbl_order.shipping_id')
        ->select('tbl_order.*','tbl_shipping.shipping_name')->get();
        $manager_order = view('admin.manager_order')->with('all_order',$all_order);
        return view('admin.admin_layout')->with('admin.manager_order',$manager_order);
    }

    public function view_order($orderId){

        $this->AuthLogin();
        $order_2 = DB::table('tbl_order')
        ->join('tbl_shipping','tbl_shipping.shipping_id','=','tbl_order.shipping_id')
        ->select('tbl_order.*','tbl_shipping.*')->first();

        $order_by_Id = DB::table('tbl_order')
        ->join('tbl_order_details','tbl_order_details.order_id','=','tbl_order.order_id')
        ->select('tbl_order.*','tbl_order_details.*')
        ->where('tbl_order.order_id',$orderId)->get();
        $manager_order_by_Id = view('admin.view_order')->with('order_by_Id',$order_by_Id)->with('order_2',$order_2);
        return view('admin.admin_layout')->with('admin.view_order',$manager_order_by_Id);
    }

    public function delete_order($order_id){
        $this->AuthLogin();
        DB::table('tbl_order')->where('order_id',$order_id)->delete();
        DB::table('tbl_order_details')->join('tbl_order','tbl_order.order_id','=','tbl_order_details.order_id')
        ->where('tbl_order_details.order_id',$order_id)->delete();
        return Redirect::to('manager-order');
    }
}
