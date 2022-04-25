<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class ProductDetails extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('Admin')->send();
        }
    }

    public function add_product_details(){
        $this->AuthLogin();
        $attr_product = DB::table('tbl_attr')->orderBy('attr_id','desc')->get();
        $product = DB::table('tbl_product')->orderBy('product_id','desc')->get();
        return view('admin.product_details.add_product_details')
        ->with('attr_product',$attr_product)->with('product',$product);
    }

    public function save_product_details(Request $request){
        $this->AuthLogin();
        $data = array();

        $data['product_id']=$request->product_name;
        $data['attr_id']=$request->product_memory;
        $data['product_price']=$request->product_price;
        $data['product_attr_status']=$request->product_attr_status;

        DB::table('tbl_product_attr')->insert($data);
        return Redirect::to('list-product-details');
    }

    public function list_product_details(){
        $this->AuthLogin();
        $list_product_details = DB::table('tbl_product_attr')
        ->join('tbl_product','tbl_product.product_id','=','tbl_product_attr.product_id')
        ->join('tbl_attr','tbl_attr.attr_id','=','tbl_product_attr.attr_id')->get();
        $manager_product_details = view('admin.product_details.list_product_details')->with('list_product_details',$list_product_details);
        return view('admin.admin_layout')->with('admin.product_details.list_product_details',$manager_product_details);
    }

    public function edit_product_details($product_id, $attr_id){
        $this->AuthLogin();
        $attr_product = DB::table('tbl_attr')->where('attr_id',$attr_id)->limit(1)->get();
        $product = DB::table('tbl_product')->where('product_id',$product_id)->limit(1)->get();

        $edit_product_details = DB::table('tbl_product_attr')->where('product_id',$product_id)->where('attr_id',$attr_id)->get();
        $manager_product_details = view('admin.product_details.edit_product_details')
        ->with('edit_product_details',$edit_product_details)
        ->with('attr_product',$attr_product)->with('product',$product);

        return view('admin.admin_layout')->with('admin.product_details.edit_product_details',$manager_product_details);
    }

    public function delete_product_details($product_id,$attr_id){
        $this->AuthLogin();
        DB::table('tbl_product_attr')->where('product_id',$product_id)->where('attr_id',$attr_id)->delete();
        return Redirect::to('list-product-details');
    }

    public function update_product_details(Request $request ,$product_id, $attr_id){
        $this->AuthLogin();
        $data = array();

        $data['product_id']=$request->product_name;
        $data['attr_id']=$request->product_memory;
        $data['product_price']=$request->product_price;

        DB::table('tbl_product_attr')->where('product_id',$product_id)
        ->where('attr_id',$attr_id)->update($data);
        return Redirect::to('list-product-details');
    }

    public function unactive_product_attr($product_id, $attr_id){
        $this->AuthLogin();
        DB::table('tbl_product_attr')->where('product_id',$product_id)->where('attr_id',$attr_id)
        ->update(['product_attr_status'=>1]);
        return Redirect::to('list-product-details');
    }

    public function active_product_attr($product_id, $attr_id){
        $this->AuthLogin();
        DB::table('tbl_product_attr')->where('product_id',$product_id)->where('attr_id',$attr_id)
        ->update(['product_attr_status'=>0]);
        return Redirect::to('list-product-details');
    }

}
