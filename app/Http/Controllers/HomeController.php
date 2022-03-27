<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->limit(3)->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();

        $list_product = DB::table('tbl_product')->where('product_status',0)->orderBy('product_desc','desc')->limit(6)->get();
        $list_product1 = DB::table('tbl_product')->where('product_status',0)->orderBy('product_desc','desc')->limit(8)->get();

        return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product)
        ->with('brand1',$brand_product)->with('list_product',$list_product)->with('list_product1',$list_product1);
    }
}
