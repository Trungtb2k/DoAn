<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class CategoryProduct extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('Admin')->send();
        }
    }

    public function add_category_product(){
        $this->AuthLogin();
        return view('admin.add_category_product');
    }

    public function list_category_product(){
        $this->AuthLogin();
        $list_category_product = DB::table('tbl_category_product')->get();
        $manager_category_product = view('admin.list_category_product')->with('list_category_product',$list_category_product);
        return view('admin.admin_layout')->with('admin.list_category_product',$manager_category_product);
    }

    public function save_category_product(Request $request){
        $this->AuthLogin();
        $data = array();

        $data['category_name']=$request->product_category_name;
        $data['category_desc']=$request->product_category_desc;
        $data['category_status']=$request->product_category_status;

        $get_image = $request->file('product_category_image');
        print_r($get_image);
        if($get_image){
            $get_name_image = $get_image->getClientOriginalExtension();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_name_image;
            $get_image->move('public/upload/category',$new_image);
            $data['category_image'] = $new_image;
            DB::table('tbl_category_product')->insert($data);
            return Redirect::to('/list-category-product');
        }

        $data['category_image'] = '';
        DB::table('tbl_category_product')->insert($data);
        return Redirect::to('list-category-product');
    }

    public function unactive_category_product($category_product_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>1]);
        return Redirect::to('list-category-product');
    }

    public function active_category_product($category_product_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>0]);
        return Redirect::to('list-category-product');
    }

    public function edit_category_product($category_product_id){
        $this->AuthLogin();
        $edit_category_product = DB::table('tbl_category_product')->where('category_id',$category_product_id)->get();
        $manager_category_product = view('admin.edit_category_product')->with('edit_category_product',$edit_category_product);
        return view('admin.admin_layout')->with('admin.edit_category_product',$manager_category_product);
    }

    public function update_category_product(Request $request ,$category_product_id){
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->product_category_name;
        $data['category_desc'] = $request->product_category_desc;

        $get_image = $request-> file('product_category_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalExtension();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_name_image;
            $get_image->move('public/Upload/category',$new_image);
            $data['category_image'] = $new_image;
            DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
            return Redirect::to('/list-category-product');
        }
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
        return Redirect::to('list-category-product');
    }

    public function delete_category_product($category_product_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();
        return Redirect::to('list-category-product');
    }
    //End Admin Page

    public function show_shop(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        $list_product = DB::table('tbl_product')->where('product_status',0)->orderBy('product_desc','desc')->get();

        return view('pages.category.show_category')->with('category',$cate_product)
        ->with('brand',$brand_product)->with('list_product',$list_product);
    }

    public function show_category_details($category_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        $category_by_id = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        ->where('tbl_product.category_id',$category_id)->get();
        $category_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id',$category_id)->limit(1)->get();

        return view('pages.category.show_category_details')->with('category',$cate_product)
        ->with('brand',$brand_product)->with('category_by_id',$category_by_id)->with('category_name',$category_name);
    }

    public function show_brand_details($brand_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        $brand_by_id = DB::table('tbl_product')->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')
        ->where('tbl_product.brand_id',$brand_id)->get();
        $brand_name = DB::table('tbl_brand')->where('tbl_brand.brand_id',$brand_id)->limit(1)->get();


        return view('pages.brand.show_brand_details')->with('category',$cate_product)
        ->with('brand',$brand_product)->with('brand_by_id',$brand_by_id)->with('brand_name',$brand_name);
    }

    public function show_64GB(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        $product_64GB = DB::table('tbl_product')->where('product_memory',64)->get() ;

        return view('pages.memory.show_64GB')->with('category',$cate_product)
        ->with('brand',$brand_product)->with('product_64GB',$product_64GB);
    }

    public function show_128GB(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        $product_64GB = DB::table('tbl_product')->where('product_memory',128)->get() ;

        return view('pages.memory.show_64GB')->with('category',$cate_product)
        ->with('brand',$brand_product)->with('product_64GB',$product_64GB);
    }

    public function show_256GB(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        $product_64GB = DB::table('tbl_product')->where('product_memory',256)->get() ;

        return view('pages.memory.show_64GB')->with('category',$cate_product)
        ->with('brand',$brand_product)->with('product_64GB',$product_64GB);
    }
}
