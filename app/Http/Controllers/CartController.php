<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Cart as Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use App\Models\Coupon;

session_start();

class CartController extends Controller
{

    public function show_cart()
    {
        return view('pages.cart.show_cart');
    }

    public function add_cart_ajax(Request $request)
    {
        $data = $request->all();
        $session_id = substr(md5(microtime()), rand(0, 26), 5);
        $cart = Session::get('cart');
        if ($cart == true) {
            $is_avaiable = 0;
            foreach ($cart as $key => $val) {
                if ($val['product_id'] == $data['cart_product_id'] && $val['attr_id'] == $data['cart_attr_id']) {
                    $is_avaiable++;
                }
            }

            if ($is_avaiable == 0) {
                $cart[] = array(
                    'session_id' => $session_id,
                    'product_name' => $data['cart_product_name'],
                    'product_id' => $data['cart_product_id'],
                    'attr_id' => $data['cart_attr_id'],
                    'product_image' => $data['cart_product_image'],
                    'product_qty' => $data['cart_product_qty'],
                    'product_price' => $data['cart_product_price'],
                );
                Session::put('cart', $cart);
            }
        } else {
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'attr_id' => $data['cart_attr_id'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],
            );
            Session::put('cart', $cart);
        }
        Session::save();
    }

    public function delete_product($session_id)
    {
        $cart = Session::get('cart');
        if ($cart == true) {
            foreach ($cart as $key => $value) {
                if ($value['session_id'] == $session_id) {
                    unset($cart[$key]);
                }
            }
            Session::put('cart', $cart);
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function update_cart(Request $request)
    {
        $data = $request->all();
        $cart = Session::get('cart');
        if ($cart == true) {
            foreach ($data['cart_qty'] as $key => $qty) {
                foreach ($cart as $session => $val) {
                    if ($val['session_id'] == $key) {
                        $cart[$session]['product_qty'] = $qty;
                    }
                }
            }
            Session::put('cart', $cart);
        }
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $coupon = Coupon::where('coupon_code', $data['coupon'])->where('coupon_status',0)
        ->where('coupon_date_start','<=',$today)->where('coupon_date_end','>=',$today)->first();
        if ($coupon) {
            $count_coupon = $coupon->count();
            if ($count_coupon) {
                $coupon_session = Session::get('coupon');
                if ($coupon_session == true) {
                    $is_avaiable = 0;
                    if ($is_avaiable == 0) {
                        $cou[] = array(
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_time' => $coupon->coupon_time,
                            'coupon_discount' => $coupon->coupon_discount,
                        );
                        Session::put('coupon', $cou);
                    }
                } else {
                    $cou[] = array(
                        'coupon_code' => $coupon->coupon_code,
                        'coupon_time' => $coupon->coupon_time,
                        'coupon_discount' => $coupon->coupon_discount,
                    );
                    Session::put('coupon', $cou);
                }
                Session::save();
                DB::table('tbl_coupon')->where('coupon_id',$coupon->coupon_id)->update(['coupon_time'=>$coupon->coupon_time-1]);
                return redirect()->back();
            }
        } else {
            Session::forget('coupon');
            return redirect()->back();
        }
    }
}
