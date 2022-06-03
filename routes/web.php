<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ProductDetails;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//FrontEnd
Route::get('/',[HomeController::class,'index']);
Route::get('/Home',[HomeController::class,'index']);
Route::get('/404',[HomeController::class,'error_page']);
Route::post('/search',[HomeController::class,'search']);
Route::get('/about',[HomeController::class,'about']);
Route::get('/contact',[HomeController::class,'contact']);

//BackEnd
Route::get('/Admin',[AdminController::class,'index']);
Route::get('/dashboard',[AdminController::class,'show_dashboard']);
Route::post('/admin-dashboard',[AdminController::class,'dashboard']);
Route::get('/admin-logout',[AdminController::class,'logout']);

//Category Product
Route::get('/add-category-product',[CategoryProduct::class,'add_category_product']);
Route::get('/edit-category-product/{category_product_id}',[CategoryProduct::class,'edit_category_product']);
Route::get('/delete-category-product/{category_product_id}',[CategoryProduct::class,'delete_category_product']);
Route::get('/list-category-product',[CategoryProduct::class,'list_category_product']);
Route::post('/save-category-product',[CategoryProduct::class,'save_category_product']);
Route::post('/update-category-product/{category_product_id}', [CategoryProduct::class,'update_category_product']);

Route::get('/unactive-category-product/{category_product_id}', [CategoryProduct::class,'unactive_category_product']);
Route::get('/active-category-product/{category_product_id}', [CategoryProduct::class,'active_category_product']);

//Brand
Route::get('/add-brand-product',[BrandProduct::class,'add_brand_product']);
Route::get('/edit-brand-product/{brand_product_id}',[BrandProduct::class,'edit_brand_product']);
Route::get('/delete-brand-product/{brand_product_id}',[BrandProduct::class,'delete_brand_product']);
Route::get('/list-brand-product',[BrandProduct::class,'list_brand_product']);
Route::post('/save-brand-product',[BrandProduct::class,'save_brand_product']);
Route::post('/update-brand-product/{brand_product_id}', [BrandProduct::class,'update_brand_product']);

Route::get('/unactive-brand-product/{brand_product_id}', [BrandProduct::class,'unactive_brand_product']);
Route::get('/active-brand-product/{brand_product_id}', [BrandProduct::class,'active_brand_product']);

//Product
Route::get('/add-product',[ProductController::class,'add_product']);
Route::get('/edit-product/{product_id}',[ProductController::class,'edit_product']);
Route::get('/delete-product/{product_id}',[ProductController::class,'delete_product']);
Route::get('/list-product',[ProductController::class,'list_product']);
Route::post('/save-product',[ProductController::class,'save_product']);
Route::post('/update-product/{product_id}', [ProductController::class,'update_product']);

Route::get('/unactive-product/{product_id}', [ProductController::class,'unactive_product']);
Route::get('/active-product/{product_id}', [ProductController::class,'active_product']);

Route::get('/product-details/{product_id}/{attr_id}', [ProductController::class,'product_details']);

Route::post('/load-comment',[ProductController::class,'load_comment']);
Route::post('/send-comment',[ProductController::class,'send_comment']);
Route::get('/list-comment', [ProductController::class,'list_comment']);
Route::get('/unactive-comment/{comment_id}', [ProductController::class,'unactive_comment']);
Route::get('/active-comment/{comment_id}', [ProductController::class,'active_comment']);

//Product Details
Route::get('/add-product-details',[ProductDetails::class,'add_product_details']);
Route::get('/list-product-details',[ProductDetails::class,'list_product_details']);
Route::post('/save-product-details',[ProductDetails::class,'save_product_details']);
Route::get('/edit-product-details/{product_id}/{attr_id}',[ProductDetails::class,'edit_product_details']);
Route::get('/delete-product-details/{product_id}/{attr_id}',[ProductDetails::class,'delete_product_details']);
Route::post('/update-product-details/{product_id}/{attr_id}', [ProductDetails::class,'update_product_details']);

Route::get('/unactive-product-attr/{product_id}/{attr_id}', [ProductDetails::class,'unactive_product_attr']);
Route::get('/active-product-attr/{product_id}/{attr_id}', [ProductDetails::class,'active_product_attr']);

//Category product home
Route::get('/category-product/{category_id}', [CategoryProduct::class,'show_category_details']);
Route::get('/brand/{brand_id}', [CategoryProduct::class,'show_brand_details']);
Route::get('/shop', [CategoryProduct::class,'show_shop']);

//Memory
Route::get('/memory/{attr_id}', [CategoryProduct::class,'show_memory_details']);

//Gallery
Route::get('add-gallery/{product_id}', [GalleryController::class,'add_gallery']);
Route::post('select-gallery', [GalleryController::class,'select_gallery']);
Route::post('insert-gallery/{pro_id}', [GalleryController::class,'insert_gallery']);
Route::post('update-gallery-name', [GalleryController::class,'update_gallery_name']);
Route::post('delete-gallery', [GalleryController::class,'delete_gallery']);
Route::post('update-gallery', [GalleryController::class,'update_gallery']);

//Cart
Route::get('/show-cart', [CartController::class,'show_cart']);
Route::post('/add-cart-ajax', [CartController::class,'add_cart_ajax']);
Route::post('/update-cart', [CartController::class,'update_cart']);
Route::get('/del-product/{session_id}', [CartController::class,'delete_product']);

//Checkout
Route::get('/checkout', [CheckoutController::class,'checkout']);
Route::post('/save-checkout', [CheckoutController::class,'save_checkout']);

//Order
Route::get('/manager-order', [CheckoutController::class,'manager_order']);
Route::get('/view-order/{orderId}', [CheckoutController::class,'view_order']);
Route::get('/delete-order/{orderId}', [CheckoutController::class,'delete_order']);
Route::post('/update-order-qty', [CheckoutController::class,'update_order_qty']);

//Coupon
Route::get('/add-coupon', [CouponController::class,'add_coupon']);
Route::post('/save-coupon', [CouponController::class,'save_coupon']);
Route::get('/list-coupon', [CouponController::class,'list_coupon']);
Route::get('/delete-coupon/{coupon_id}', [CouponController::class,'delete_coupon']);

Route::get('/unactive-coupon/{coupon_id}', [CouponController::class,'unactive_coupon']);
Route::get('/active-coupon/{coupon_id}', [CouponController::class,'active_coupon']);

//Wishlist
Route::get('/wishlist', [HomeController::class,'wishlist']);

//Blog
Route::get('/add-post', [BlogController::class,'add_post']);
Route::post('/save-post', [BlogController::class,'save_post']);
Route::get('/list-post', [BlogController::class,'list_post']);
Route::get('/edit-post/{post_id}', [BlogController::class,'edit_post']);
Route::get('/delete-post/{post_id}', [BlogController::class,'delete_post']);
Route::post('/update-post/{post_id}', [BlogController::class,'update_post']);
Route::get('/blog', [BlogController::class,'show_blog']);
Route::get('/blog/{category_post_slug}', [BlogController::class,'category_post_slug']);
Route::get('/blog-details/{post_meta_desc}', [BlogController::class,'blog_details']);

//Filter Price
Route::get('/duoi-2-trieu', [CategoryProduct::class,'duoi_2_trieu']);
Route::get('/tu-2-4-trieu', [CategoryProduct::class,'tu_2_4_trieu']);
Route::get('/tu-4-7-trieu', [CategoryProduct::class,'tu_4_7_trieu']);
Route::get('/tu-7-13-trieu', [CategoryProduct::class,'tu_7_13_trieu']);
Route::get('/tu-13-20-trieu', [CategoryProduct::class,'tu_13_20_trieu']);
Route::get('/tren-20-trieu', [CategoryProduct::class,'tren_20_trieu']);


Route::post('/days-order',[AdminController::class,'day_orders']);
Route::post('/7days-order',[AdminController::class,'sevenday_orders']);
Route::post('/365days-order',[AdminController::class,'year_orders']);
Route::post('/30days-order',[AdminController::class,'month_orders']);

