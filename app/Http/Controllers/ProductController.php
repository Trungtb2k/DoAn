<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Gallery;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('admin.dashboard');
        }else{
            return Redirect::to('Admin')->send();
        }
    }

    public function add_product(){
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->orderBy('brand_id','desc')->get();

        return view('admin.add_product')->with('cate_product',$cate_product)->with('brand_product',$brand_product);
    }

    public function list_product(){
        $this->AuthLogin();
        $list_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')->get();
        $manager_product = view('admin.list_product')->with('list_product',$list_product);
        return view('admin.admin_layout')->with('admin.list_product',$manager_product);
    }

    public function save_product(Request $request){
        $this->AuthLogin();
        $data = array();
        $data1 = $request->product_name.' '.$request->product_memory.'GB';
        $data['product_name']=$data1;
        $data['product_price']=$request->product_price;
        $data['product_content']=$request->product_content;
        $data['product_desc']=$request->product_desc;
        $data['product_config']=$request->product_configuration;
        $data['product_memory']=$request->product_memory;
        $data['product_status']=$request->product_status;
        $data['category_id']=$request->product_cate;
        $data['brand_id']=$request->product_brand;

        $get_image = $request->file('product_image');
        $path = 'public/upload/product/';
        $path_gallery = 'public/upload/gallery/';
        if($get_image){
            $get_name_image = $get_image->getClientOriginalExtension();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_name_image;
            $get_image->move($path,$new_image);
            File::copy($path.$new_image,$path_gallery.$new_image);
            $data['product_image'] = $new_image;

        }
        $pro_id = DB::table('tbl_product')->insertGetId($data);
        $gallery = new Gallery();
        $gallery->gallery_image = $new_image;
        $gallery->gallery_name = $new_image;
        $gallery->product_id = $pro_id;
        $gallery->save();

        return Redirect::to('/list-product');

    }

    public function unactive_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
        return Redirect::to('list-product');
    }

    public function active_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
        return Redirect::to('list-product');
    }

    public function edit_product($product_id){
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->orderBy('brand_id','desc')->get();

        $edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();
        $manager_product = view('admin.edit_product')->with('edit_product',$edit_product)
        ->with('cate_product',$cate_product)->with('brand_product',$brand_product);

        return view('admin.admin_layout')->with('admin.edit_product',$manager_product);
    }

    public function update_product(Request $request ,$product_id){
        $this->AuthLogin();
        $data = array();
        $data1 = $request->product_name.' '.$request->product_memory.'GB';
        $data['product_name']=$data1;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['product_config']=$request->product_configuration;
        $data['product_memory'] = $request->product_memory;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;
        $get_image = $request-> file('product_image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalExtension();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_name_image;
            $get_image->move('public/Upload/Product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->where('product_id',$product_id)->update($data);
            return Redirect::to('/list-product');
        }
        DB::table('tbl_product')->where('product_id',$product_id)->update($data);
        return Redirect::to('/list-product');
    }

    public function delete_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->delete();
        return Redirect::to('list-product');
    }

    //End Admin

    public function product_details($product_id){

        $cate_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->where('tbl_product.product_id',$product_id)->get();

        $brand_product = DB::table('tbl_product')->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_product.product_id',$product_id)->get();

        $details_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_product.product_id',$product_id)->get();

        foreach($details_product as $key => $value){
            $category_id = $value -> category_id;
            $product_id = $value->product_id;
        }

        $gallery = Gallery::where('product_id',$product_id)->get();

        $related_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->where('tbl_category_product.category_id',$category_id)->whereNotIn('tbl_product.product_id',[$product_id])->limit(4)->get();


        return view('pages.product.show_details')->with('category',$cate_product)
        ->with('brand',$brand_product)->with('product_details',$details_product)
        ->with('related',$related_product)->with('gallery',$gallery);
    }
}
