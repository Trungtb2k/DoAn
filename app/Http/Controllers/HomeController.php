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

        $list_product = DB::table('tbl_product')->where('product_status',0)
        ->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
        ->where('tbl_product_attr.product_attr_status',0)->orderBy('tbl_product.product_sold')->limit(6)->get();

        $list_product1 = DB::table('tbl_product')->where('product_status',0)
        ->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
        ->where('tbl_product_attr.product_attr_status',0)->limit(8)->get();

        $post = DB::table('tbl_post')->orderBy('post_id','desc')->limit(3)->get();

        return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product)
        ->with('brand1',$brand_product)->with('list_product',$list_product)
        ->with('list_product1',$list_product1)->with('post',$post);
    }

    public function search(Request $request){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->limit(3)->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        $attr_name = DB::table('tbl_attr')->get();
        $keyword = $request->keywords;

        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keyword.'%')
        ->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
        ->where('tbl_product_attr.product_attr_status',0)->limit(6)->get();

        return view('pages.product.search')->with('category',$cate_product)->with('attr_name',$attr_name)
        ->with('brand',$brand_product)->with('search_product',$search_product);
    }

    public function wishlist(){
        return view('pages.wishlist');
    }
}
