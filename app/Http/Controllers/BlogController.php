<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Post;
use App\Models\CatePost;
use App\Models\Gallery;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    //BackEnd
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('Admin')->send();
        }
    }

    public function add_post(){
        $this->AuthLogin();
        $category_post = CatePost::orderBy('category_post_id','desc')->get();
        return view('admin.post.add_post')->with(compact('category_post'));
    }

    public function save_post(Request $request){
        $this->AuthLogin();
        $data = $request->all();
        $post = new Post();
        $post->post_title = $data['post_title'];
        $post->post_slug = $data['post_slug'];
        $post->post_meta_keyword = $data['post_meta_keyword'];
        $post->post_meta_desc = $data['post_meta_desc'];
        $post->post_desc = $data['post_desc'];
        $post->post_content = $data['post_content'];
        $post->category_post_id = $data['category_post_id'];
        $post->post_status = $data['post_status'];
        $post->created_date = Carbon::now('Asia/Ho_Chi_Minh')->format('m/d/y');

        $get_image = $request->file('post_image');
        $get_name_image = $get_image->getClientOriginalExtension();
        $name_image = current(explode('.',$get_name_image));

        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();

        $get_image->move('public/upload/post',$new_image);

        $post->post_image = $new_image;
        $post->save();

        return Redirect::to('/list-post');
    }

    public function delete_post($post_id){
        $this->AuthLogin();
        $post = Post::find($post_id);
        $post_image = $post->post_image;
        unlink('public/upload/post/'.$post_image);
        $post->delete();
        return redirect()->back();
    }

    public function list_post(){
        $this->AuthLogin();
        $all_post = Post::with('cate_post')->orderBy('post_id')->paginate(4);
        return view('admin.post.list_post')->with(compact('all_post',$all_post));
    }

    public function edit_post($post_id){
        $post = Post::find($post_id);
        $cate_post = CatePost::orderBy('category_post_id','desc')->get();
        return view('admin.post.edit_post')->with(compact('post','cate_post'));
    }

    public function update_post(Request $request,$post_id){
        $this->AuthLogin();
        $data = $request->all();
        $post = Post::find($post_id);
        $post->post_title = $data['post_title'];
        $post->post_slug = $data['post_slug'];
        $post->post_meta_keyword = $data['post_meta_keyword'];
        $post->post_meta_desc = $data['post_meta_desc'];
        $post->post_desc = $data['post_desc'];
        $post->post_content = $data['post_content'];
        $post->category_post_id = $data['category_post_id'];
        $post->post_status = $data['post_status'];

        $get_image = $request->file('post_image');
        if($get_image){
            $post_old_image = $post->post_image;
            unlink('public/upload/post/'.$post_old_image);
            $get_name_image = $get_image->getClientOriginalExtension();
            $name_image = current(explode('.',$get_name_image));

            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();

            $get_image->move('public/upload/post',$new_image);

            $post->post_image = $new_image;
        }
        $post->save();
        return Redirect::to('/list-post');
    }

    //FrontEnd
    public function show_blog(){
        $category_post = DB::table('tbl_category_post')->where('category_post_status','0')->get();
        $post = DB::table('tbl_post')->orderBy('post_id','desc')->paginate(6);
        return view('pages.blog.show_blog')->with('category_post',$category_post)->with('post',$post);
    }

    public function category_post_slug($category_post_slug){
        $category_post = DB::table('tbl_category_post')->where('category_post_status','0')->get();
        $post = DB::table('tbl_post')->join('tbl_category_post','tbl_category_post.category_post_id','=','tbl_post.category_post_id')
        ->where('tbl_category_post.category_post_slug',$category_post_slug)->get();
        return view('pages.blog.show_category_post')->with('category_post',$category_post)->with('post',$post);
    }

    public function blog_details($post_slug){
        $post =DB::table('tbl_post')->join('tbl_category_post','tbl_category_post.category_post_id','=','tbl_post.category_post_id')
        ->where('post_status',0)->where('post_slug',$post_slug)->get();

        $post_id =DB::table('tbl_post')->join('tbl_category_post','tbl_category_post.category_post_id','=','tbl_post.category_post_id')
        ->where('post_status',0)->where('post_slug',$post_slug)->value('post_id');

        $abc = Post::where('post_id',$post_id)->first();
        $abc->post_views=$abc->post_views+1;
        $abc->save();

        $category_post_id =DB::table('tbl_post')->where('post_status',0)->where('post_slug',$post_slug)->value('category_post_id');

        $post_release = DB::table('tbl_post')->join('tbl_category_post','tbl_category_post.category_post_id','=','tbl_post.category_post_id')
        ->where('tbl_post.category_post_id',$category_post_id)->whereNotIn('tbl_post.post_slug',[$post_slug])->limit(3)->get();

        $category_post = DB::table('tbl_category_post')->where('category_post_status','0')->get();
        return view('pages.blog.show_details_blog')->with(compact('post','category_post','post_release'));
    }
}
