<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Order;
use App\Models\Statistic;
use App\Models\Product;


class CheckoutController extends Controller
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

    public function checkout()
    {
        return view('pages.checkout.show_checkout');
    }

    public function save_checkout(Request $request)
    {
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_notes'] = $request->shipping_notes;

        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);
        Session::put('shipping_id', $shipping_id);

        //insert payment method
        $data1 = array();
        $data1['payment_method'] = $request->payment_option;
        $data1['payment_status'] = 0;
        $payment_id = DB::table('tbl_payment')->insertGetId($data1);

        //insert order
        $subtotal = 0;
        $discount = 0;
        foreach (Session::get('cart') as $key => $cart) {
            $subtotal += $cart['product_price'] * $cart['product_qty'];
        }

        $cp = Session::get('coupon');
        if ($cp == true) {
            foreach (Session::get('coupon') as $key => $cou) {
                $discount = ($cou['coupon_discount'] * $subtotal) / 100;
            }
        } else {
            $discount = 0;
        }

        $order_data = array();
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_subtotal'] = $subtotal;
        $order_data['order_discount'] = $discount;
        $order_data['order_total'] = $subtotal - $discount;
        $order_data['order_status'] = 0;
        $order_data['order_date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $order_id = DB::table('tbl_order')->insertGetId($order_data);

        //insert order detail

        foreach ($content = Session::get('cart') as $key => $v_content) {
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $v_content['product_id'];
            $order_d_data['attr_id'] = $v_content['attr_id'];
            $order_d_data['product_name'] = $v_content['product_name'];
            $order_d_data['product_price'] = $v_content['product_price'];
            $order_d_data['product_sales_quantity'] = $v_content['product_qty'];
            $result = DB::table('tbl_order_details')->insert($order_d_data);
        }
        $data[] = array("shipping_name" => $request->shipping_name, "shipping_phone" => $request->shipping_phone,
            "shipping_address" => $request->shipping_address, "shipping_notes" => $request->shipping_notes,
            "payment_method" => $request->payment_option);

        $data1[]= array("payment_method"=>$request->payment_option);

        if(Session::get('coupon')==true){
            foreach(Session::get('coupon') as $key => $cou1){
                $cou1[] = array(
                    'coupon_discount' => $cou1['coupon_discount']
                );
            }
        }else{
            $cou1[] = array('coupon_discount' => '0');
        }

        $to_email = $request->shipping_email;
        if(Session::get('cart')==true){
            foreach(Session::get('cart') as $key => $cart_mail){
                $cart_array[]= array(
                    'product_name' => $cart_mail['product_name'],
                    'product_price' => $cart_mail['product_price'],
                    'product_qty' => $cart_mail['product_qty']
                );
            }
        }

        Mail::send('pages.mail.mail_order', ['data'=>$data,'data1'=>$data1,'cart_array'=>$cart_array,'cou1'=>$cou1], function ($message) use ($to_email) {
            $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
            $tittle_mail = "Thông tin đơn đặt hàng ngày" . ' ' . $now;
            $message->to($to_email)->subject($tittle_mail);
            $message->from("buiductrung071020@gmail.com", "Molla");
        });

        Session::forget('coupon');
        Session::forget('cart');


        if ($data1['payment_method'] == 'Chuyển khoản') {
            return Redirect::to('/Home');
        }elseif ($data1['payment_method'] == 'Thanh toán khi nhận hàng') {
            return view('pages.checkout.handcash');
        }elseif($data1['payment_method'] == 'VNPay'){
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = "http://localhost:81/DoAn/";
            $vnp_TmnCode = "KRPRKJAJ";//Mã website tại VNPAY
            $vnp_HashSecret = "DNBLUUNEBSHZYRJIVEGBIFXIAXHAFVQE"; //Chuỗi bí mật

            $vnp_TxnRef = mt_rand(); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = 'Test VNPAY';
            $vnp_OrderType = 'billpayment';
            $vnp_Amount = ($subtotal - $discount) * 100;
            $vnp_Locale = 'vn';
            $vnp_BankCode = 'NCB';
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
            //Billing
            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef
            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                $inputData['vnp_Bill_State'] = $vnp_Bill_State;
            }

            //var_dump($inputData);
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            $returnData = array('code' => '00'
                , 'message' => 'success'
                , 'data' => $vnp_Url);
                if (isset($_POST['redirect'])) {
                    header('Location: ' . $vnp_Url);
                    die();
                } else {
                    echo json_encode($returnData);
                }
                //vui lòng tham khảo thêm tại code demo
            }
    }

    public function manager_order()
    {
        $this->AuthLogin();
        $all_order = DB::table('tbl_order')->join('tbl_shipping', 'tbl_shipping.shipping_id', '=', 'tbl_order.shipping_id')
            ->select('tbl_order.*', 'tbl_shipping.shipping_name')->get();
        $manager_order = view('admin.manager_order')->with('all_order', $all_order);
        return view('admin.admin_layout')->with('admin.manager_order', $manager_order);
    }

    public function view_order($orderId)
    {

        $this->AuthLogin();
        $order_2 = DB::table('tbl_shipping')
            ->join('tbl_order', 'tbl_order.shipping_id', '=', 'tbl_shipping.shipping_id')
            ->select('tbl_order.*', 'tbl_shipping.*')
            ->where('tbl_order.order_id', $orderId)->first();

        $order_by_Id = DB::table('tbl_order')
            ->join('tbl_order_details', 'tbl_order_details.order_id', '=', 'tbl_order.order_id')
            ->select('tbl_order.*', 'tbl_order_details.*')
            ->where('tbl_order.order_id', $orderId)->get();

        $order_by_Id1 = DB::table('tbl_order')
        ->join('tbl_order_details', 'tbl_order_details.order_id', '=', 'tbl_order.order_id')
        ->select('tbl_order.*', 'tbl_order_details.*')
        ->where('tbl_order.order_id', $orderId)->limit(1)->get();

        $manager_order_by_Id = view('admin.view_order')->with('order_by_Id', $order_by_Id)
        ->with('order_2', $order_2)->with('order_by_Id1', $order_by_Id1);

        return view('admin.admin_layout')->with('admin.view_order', $manager_order_by_Id);
    }

    public function delete_order($order_id)
    {
        $this->AuthLogin();
        DB::table('tbl_order')->where('order_id', $order_id)->delete();
        DB::table('tbl_order_details')->join('tbl_order', 'tbl_order.order_id', '=', 'tbl_order_details.order_id')
            ->where('tbl_order_details.order_id', $order_id)->delete();
        return Redirect::to('manager-order');
    }

    public function update_order_qty(Request $request){
        //update order status
        $data = $request->all();
        $order = Order::find($data['order_id']);
        $order->order_status = $data['order_status'];
        $order->save();

        //order date
        $order_date = $order->order_date;
        $statistic = Statistic::where('order_date',$order_date)->get();
        if($statistic){
            $statistic_count = $statistic->count();
        }else{
            $statistic_count = 0;
        }

        if($order->order_status==5){
            $total_order =0;
            $sales = 0;
            $profit = 0;
            $quantity = 0;
            $product_price = 0;
            foreach($data['order_product_id'] as $key=>$product_id){
                $product = Product::find($product_id);
                $product_quantity = $product->product_quantity;
                $product_sold = $product->product_sold;

                foreach($data['order_attr_id'] as $key3=>$attr_id){
                    if($key==$key3){
                        $attr=DB::table('tbl_product_attr')->where('product_id',$product_id)->where('attr_id',$attr_id)->first();
                        $product_price = $attr->product_price;
                    }

                }
                $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

                foreach($data['quantity'] as $key2=>$qty){
                    if($key==$key2){
                        $product_remain = $product_quantity-$qty;
                        $product->product_quantity=$product_remain;
                        $product->product_sold = $product_sold + $qty;
                        $product->save();

                        //update doanh thu
                        $quantity+=$qty;
                        $total_order+=1;
                        $sales+=$product_price*$qty;
                        $profit = $sales*0.1;
                    }
                }
            }
            if($statistic_count>0){
                $statistic_update = Statistic::where('order_date',$order_date)->first();
                $statistic_update->sales = $statistic_update->sales + $sales;
                $statistic_update->profit = $statistic_update->profit + $profit;
                $statistic_update->quantity = $statistic_update->quantity + $quantity;
                $statistic_update->total_order = $statistic_update->total_order + $total_order;
                $statistic_update->save();
            }else{
                $statistic_new = new Statistic();
                $statistic_new->order_date = $order_date;
                $statistic_new->sales = $sales;
                $statistic_new->profit = $profit;
                $statistic_new->quantity = $quantity;
                $statistic_new->total_order = $total_order;
                $statistic_new->save();

            }
        }
    }
}
