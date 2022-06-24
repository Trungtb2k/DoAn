<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product;

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
            $new_image = $name_image.rand(0,99999).'.'.$get_name_image;
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
            $new_image = $name_image.rand(0,99999).'.'.$get_name_image;
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
        $attr_name = DB::table('tbl_attr')->orderBy('attr_id','asc')->limit(6)->get();
        $list_product = DB::table('tbl_product')->where('product_status',0)
        ->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
        ->where('tbl_product_attr.product_attr_status',0)->where('tbl_product.product_quantity','>','0')->orderBy('tbl_product.product_id','desc')->paginate(12);

        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by=='kytu_za'){
                $list_product = DB::table('tbl_product')->where('product_status',0)
                ->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
                ->where('tbl_product_attr.product_attr_status',0)->where('tbl_product.product_quantity','>','0')->orderBy('product_name','desc')->paginate(12);
            }elseif($sort_by=='kytu_az'){
                $list_product =  DB::table('tbl_product')->where('product_status',0)
                ->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
                ->where('tbl_product_attr.product_attr_status',0)->where('tbl_product.product_quantity','>','0')->orderBy('product_name','asc')->paginate(12);
            }elseif($sort_by=='tang_dan'){
                $list_product = DB::table('tbl_product')
                ->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
                ->where('tbl_product_attr.product_attr_status',0)->where('tbl_product.product_quantity','>','0')->orderBy('product_price','asc')->paginate(12);
            }elseif($sort_by=='giam_dan'){
                $list_product = DB::table('tbl_product')->where('product_status',0)
                ->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
                ->where('tbl_product_attr.product_attr_status',0)->where('tbl_product.product_quantity','>','0')->orderBy('product_price','desc')->paginate(12);
            }
        }

        return view('pages.category.show_category')->with('category',$cate_product)
        ->with('brand',$brand_product)->with('list_product',$list_product)
        ->with('attr_name',$attr_name);
    }

    public function show_category_details($category_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        $attr_name = DB::table('tbl_attr')->orderBy('attr_id','asc')->limit(6)->get();
        $category_by_id = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        ->where('tbl_product.category_id',$category_id)->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
        ->where('tbl_product_attr.product_attr_status',0)->where('tbl_product.product_quantity','>','0')->paginate(12);
        $category_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id',$category_id)->limit(1)->get();

        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by=='kytu_za'){
                $category_by_id =  DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
                ->where('tbl_product.category_id',$category_id)->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
                ->where('tbl_product_attr.product_attr_status',0)->where('tbl_product.product_quantity','>','0')->orderBy('product_name','desc')->paginate(12);
            }elseif($sort_by=='kytu_az'){
                $category_by_id =  DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
                ->where('tbl_product.category_id',$category_id)->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
                ->where('tbl_product_attr.product_attr_status',0)->where('tbl_product.product_quantity','>','0')->orderBy('product_name','asc')->paginate(12);
            }elseif($sort_by=='tang_dan'){
                $category_by_id =   DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
                ->where('tbl_product.category_id',$category_id)->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
                ->where('tbl_product_attr.product_attr_status',0)->where('tbl_product.product_quantity','>','0')->orderBy('product_price','asc')->paginate(12);
            }elseif($sort_by=='giam_dan'){
                $category_by_id =  DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
                ->where('tbl_product.category_id',$category_id)->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
                ->where('tbl_product_attr.product_attr_status',0)->where('tbl_product.product_quantity','>','0')->orderBy('product_price','desc')->paginate(12);
            }
        }

        return view('pages.category.show_category_details')->with('category',$cate_product)
        ->with('brand',$brand_product)->with('category_by_id',$category_by_id)
        ->with('category_name',$category_name)->with('attr_name',$attr_name);
    }

    public function show_brand_details($brand_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        $attr_name = DB::table('tbl_attr')->orderBy('attr_id','asc')->limit(6)->get();
        $brand_by_id = DB::table('tbl_product')->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')
        ->where('tbl_product.brand_id',$brand_id)->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
        ->where('tbl_product_attr.product_attr_status',0)->where('tbl_product.product_quantity','>','0')->paginate(12);
        $brand_name = DB::table('tbl_brand')->where('tbl_brand.brand_id',$brand_id)->limit(1)->get();

        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by=='kytu_za'){
                $brand_by_id = DB::table('tbl_product')->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')
                ->where('tbl_product.brand_id',$brand_id)->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
                ->where('tbl_product_attr.product_attr_status',0)->where('tbl_product.product_quantity','>','0')->orderBy('product_name','desc')->paginate(12);
            }elseif($sort_by=='kytu_az'){
                $brand_by_id =  DB::table('tbl_product')->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')
                ->where('tbl_product.brand_id',$brand_id)->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
                ->where('tbl_product_attr.product_attr_status',0)->where('tbl_product.product_quantity','>','0')->orderBy('product_name','asc')->paginate(12);
            }elseif($sort_by=='tang_dan'){
                $brand_by_id = DB::table('tbl_product')->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')
                ->where('tbl_product.brand_id',$brand_id)->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
                ->where('tbl_product_attr.product_attr_status',0)->where('tbl_product.product_quantity','>','0')->orderBy('product_price','asc')->paginate(12);
            }elseif($sort_by=='giam_dan'){
                $brand_by_id =DB::table('tbl_product')->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')
                ->where('tbl_product.brand_id',$brand_id)->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
                ->where('tbl_product_attr.product_attr_status',0)->where('tbl_product.product_quantity','>','0')->orderBy('product_price','desc')->paginate(12);
            }
        }

        return view('pages.brand.show_brand_details')->with('category',$cate_product)
        ->with('brand',$brand_product)->with('brand_by_id',$brand_by_id)
        ->with('brand_name',$brand_name)->with('attr_name',$attr_name);
    }

    public function show_memory_details($attr_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        $attr_name = DB::table('tbl_attr')->orderBy('attr_id','asc')->limit(6)->get();
        $product= DB::table('tbl_product')->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
        ->where('attr_id',$attr_id)->where('tbl_product.product_quantity','>','0')->paginate(12);

        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by=='kytu_za'){
                $product= DB::table('tbl_product')->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
                ->where('attr_id',$attr_id)->where('tbl_product.product_quantity','>','0')->orderBy('product_name','desc')->paginate(12);
            }elseif($sort_by=='kytu_az'){
                $product= DB::table('tbl_product')->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
                ->where('attr_id',$attr_id)->where('tbl_product.product_quantity','>','0')->orderBy('product_name','asc')->paginate(12);
            }elseif($sort_by=='tang_dan'){
                $product= DB::table('tbl_product')->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
                ->where('attr_id',$attr_id)->where('tbl_product.product_quantity','>','0')->orderBy('product_price','asc')->paginate(12);
            }elseif($sort_by=='giam_dan'){
                $product= DB::table('tbl_product')->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
                ->where('attr_id',$attr_id)->where('tbl_product.product_quantity','>','0')->orderBy('product_price','desc')->paginate(12);
            }
        }

        return view('pages.memory.show_memory_details')->with('category',$cate_product)
        ->with('brand',$brand_product)->with('product',$product)->with('attr_name',$attr_name);
    }

    //Filter Price

    public function duoi_2_trieu(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        $attr_name = DB::table('tbl_attr')->orderBy('attr_id','asc')->limit(6)->get();
        $product= DB::table('tbl_product')->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
        ->where('tbl_product_attr.product_attr_status',0)->whereBetween('product_price',[0,2000000])
        ->where('tbl_product.product_quantity','>','0')->paginate(12);

        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by=='kytu_za'){
                $product= DB::table('tbl_product')->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
                ->where('tbl_product_attr.product_attr_status',0)->whereBetween('product_price',[0,2000000])->where('tbl_product.product_quantity','>','0')->orderBy('product_name','desc')->paginate(12);
            }elseif($sort_by=='kytu_az'){
                $product= DB::table('tbl_product')->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
                ->where('tbl_product_attr.product_attr_status',0)->whereBetween('product_price',[0,2000000])->where('tbl_product.product_quantity','>','0')->orderBy('product_name','asc')->paginate(12);
            }elseif($sort_by=='tang_dan'){
                $product= DB::table('tbl_product')->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
                ->where('tbl_product_attr.product_attr_status',0)->whereBetween('product_price',[0,2000000])->where('tbl_product.product_quantity','>','0')->orderBy('product_price','asc')->paginate(12);
            }elseif($sort_by=='giam_dan'){
                $product= DB::table('tbl_product')->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
                ->where('tbl_product_attr.product_attr_status',0)->whereBetween('product_price',[0,2000000])->where('tbl_product.product_quantity','>','0')->orderBy('product_price','desc')->paginate(12);
            }
        }

        return view('pages.price.filter_price')->with('category',$cate_product)
        ->with('brand',$brand_product)->with('product',$product)->with('attr_name',$attr_name);
    }

    public function tu_2_4_trieu(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        $attr_name = DB::table('tbl_attr')->orderBy('attr_id','asc')->limit(6)->get();
        $product= DB::table('tbl_product')->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
        ->where('tbl_product_attr.product_attr_status',0)->whereBetween('product_price',[2000000,4000000])
        ->where('tbl_product.product_quantity','>','0')->paginate(12);

        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by=='kytu_za'){
                $product= DB::table('tbl_product')->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
                ->where('tbl_product_attr.product_attr_status',0)->whereBetween('product_price',[2000000,4000000])->where('tbl_product.product_quantity','>','0')->orderBy('product_name','desc')->paginate(12);
            }elseif($sort_by=='kytu_az'){
                $product= DB::table('tbl_product')->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
                ->where('tbl_product_attr.product_attr_status',0)->whereBetween('product_price',[2000000,4000000])->where('tbl_product.product_quantity','>','0')->orderBy('product_name','asc')->paginate(12);
            }elseif($sort_by=='tang_dan'){
                $product= DB::table('tbl_product')->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
                ->where('tbl_product_attr.product_attr_status',0)->whereBetween('product_price',[2000000,4000000])->where('tbl_product.product_quantity','>','0')->orderBy('product_price','asc')->paginate(12);
            }elseif($sort_by=='giam_dan'){
                $product= DB::table('tbl_product')->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
                ->where('tbl_product_attr.product_attr_status',0)->whereBetween('product_price',[2000000,4000000])->where('tbl_product.product_quantity','>','0')->orderBy('product_price','desc')->paginate(12);
            }
        }

        return view('pages.price.filter_price')->with('category',$cate_product)
        ->with('brand',$brand_product)->with('product',$product)->with('attr_name',$attr_name);
    }

    public function tu_4_7_trieu(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        $attr_name = DB::table('tbl_attr')->orderBy('attr_id','asc')->limit(6)->get();
        $product= DB::table('tbl_product')->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
        ->where('tbl_product_attr.product_attr_status',0)->whereBetween('product_price',[4000000,7000000])
        ->where('tbl_product.product_quantity','>','0')->paginate(12);

        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by=='kytu_za'){
                $product= DB::table('tbl_product')->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
                ->where('tbl_product_attr.product_attr_status',0)->whereBetween('product_price',[4000000,7000000])->where('tbl_product.product_quantity','>','0')->orderBy('product_name','desc')->paginate(12);
            }elseif($sort_by=='kytu_az'){
                $product= DB::table('tbl_product')->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
                ->where('tbl_product_attr.product_attr_status',0)->whereBetween('product_price',[4000000,7000000])->where('tbl_product.product_quantity','>','0')->orderBy('product_name','asc')->paginate(12);
            }elseif($sort_by=='tang_dan'){
                $product= DB::table('tbl_product')->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
                ->where('tbl_product_attr.product_attr_status',0)->whereBetween('product_price',[4000000,7000000])->where('tbl_product.product_quantity','>','0')->orderBy('product_price','asc')->paginate(12);
            }elseif($sort_by=='giam_dan'){
                $product= DB::table('tbl_product')->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
                ->where('tbl_product_attr.product_attr_status',0)->whereBetween('product_price',[4000000,7000000])->where('tbl_product.product_quantity','>','0')->orderBy('product_price','desc')->paginate(12);
            }
        }

        return view('pages.price.filter_price')->with('category',$cate_product)
        ->with('brand',$brand_product)->with('product',$product)->with('attr_name',$attr_name);
    }

    public function tu_7_13_trieu(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        $attr_name = DB::table('tbl_attr')->orderBy('attr_id','asc')->limit(6)->get();
        $product= DB::table('tbl_product')->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
        ->where('tbl_product_attr.product_attr_status',0)->whereBetween('product_price',[7000000,13000000])->where('tbl_product.product_quantity','>','0')->paginate(12);

        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by=='kytu_za'){
                $product= DB::table('tbl_product')->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
                ->where('tbl_product_attr.product_attr_status',0)->whereBetween('product_price',[7000000,13000000])->where('tbl_product.product_quantity','>','0')->orderBy('product_name','desc')->paginate(12);
            }elseif($sort_by=='kytu_az'){
                $product= DB::table('tbl_product')->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
                ->where('tbl_product_attr.product_attr_status',0)->whereBetween('product_price',[7000000,13000000])->where('tbl_product.product_quantity','>','0')->orderBy('product_name','asc')->paginate(12);
            }elseif($sort_by=='tang_dan'){
                $product= DB::table('tbl_product')->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
                ->where('tbl_product_attr.product_attr_status',0)->whereBetween('product_price',[7000000,13000000])->where('tbl_product.product_quantity','>','0')->orderBy('product_price','asc')->paginate(12);
            }elseif($sort_by=='giam_dan'){
                $product= DB::table('tbl_product')->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
                ->where('tbl_product_attr.product_attr_status',0)->whereBetween('product_price',[7000000,13000000])->where('tbl_product.product_quantity','>','0')->orderBy('product_price','desc')->paginate(12);
            }
        }

        return view('pages.price.filter_price')->with('category',$cate_product)
        ->with('brand',$brand_product)->with('product',$product)->with('attr_name',$attr_name);
    }

    public function tu_13_20_trieu(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        $attr_name = DB::table('tbl_attr')->orderBy('attr_id','asc')->limit(6)->get();
        $product= DB::table('tbl_product')->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
        ->where('tbl_product_attr.product_attr_status',0)->whereBetween('product_price',[13000000,20000000])
        ->where('tbl_product.product_quantity','>','0')->paginate(12);

        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by=='kytu_za'){
                $product= DB::table('tbl_product')->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
                ->where('tbl_product_attr.product_attr_status',0)->whereBetween('product_price',[13000000,20000000])->where('tbl_product.product_quantity','>','0')->orderBy('product_name','desc')->paginate(12);
            }elseif($sort_by=='kytu_az'){
                $product= DB::table('tbl_product')->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
                ->where('tbl_product_attr.product_attr_status',0)->whereBetween('product_price',[13000000,20000000])->where('tbl_product.product_quantity','>','0')->orderBy('product_name','asc')->paginate(12);
            }elseif($sort_by=='tang_dan'){
                $product= DB::table('tbl_product')->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
                ->where('tbl_product_attr.product_attr_status',0)->whereBetween('product_price',[13000000,20000000])->where('tbl_product.product_quantity','>','0')->orderBy('product_price','asc')->paginate(12);
            }elseif($sort_by=='giam_dan'){
                $product= DB::table('tbl_product')->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
                ->where('tbl_product_attr.product_attr_status',0)->whereBetween('product_price',[13000000,20000000])->where('tbl_product.product_quantity','>','0')->orderBy('product_price','desc')->paginate(12);
            }
        }

        return view('pages.price.filter_price')->with('category',$cate_product)
        ->with('brand',$brand_product)->with('product',$product)->with('attr_name',$attr_name);
    }

    public function tren_20_trieu(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        $attr_name = DB::table('tbl_attr')->orderBy('attr_id','asc')->limit(6)->get();
        $product= DB::table('tbl_product')->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
        ->where('tbl_product_attr.product_attr_status',0)->where('product_price','>',20000000)
        ->where('tbl_product.product_quantity','>','0')->paginate(12);

        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by=='kytu_za'){
                $product= DB::table('tbl_product')->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
                ->where('tbl_product_attr.product_attr_status',0)->where('product_price','>',20000000)->where('tbl_product.product_quantity','>','0')->orderBy('product_name','desc')->paginate(12);
            }elseif($sort_by=='kytu_az'){
                $product= DB::table('tbl_product')->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
                ->where('tbl_product_attr.product_attr_status',0)->where('product_price','>',20000000)->where('tbl_product.product_quantity','>','0')->orderBy('product_name','asc')->paginate(12);
            }elseif($sort_by=='tang_dan'){
                $product= DB::table('tbl_product')->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
                ->where('tbl_product_attr.product_attr_status',0)->where('product_price','>',20000000)->where('tbl_product.product_quantity','>','0')->orderBy('product_price','asc')->paginate(12);
            }elseif($sort_by=='giam_dan'){
                $product= DB::table('tbl_product')->join('tbl_product_attr','tbl_product_attr.product_id','=','tbl_product.product_id')
                ->where('tbl_product_attr.product_attr_status',0)->where('product_price','>',20000000)->where('tbl_product.product_quantity','>','0')->orderBy('product_price','desc')->paginate(12);
            }
        }

        return view('pages.price.filter_price')->with('category',$cate_product)
        ->with('brand',$brand_product)->with('product',$product)->with('attr_name',$attr_name);
    }

}
