<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FrontProductListController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Auth::routes();



Route::middleware(['isAdmin','auth'])->group(function () {
     
   Route::get('/admin',function(){
    return view('admin.admin_home');
})->name('admin_home');
  
Route::resources([
    'category'   =>CategoryController::class,
    'subCategory'=>SubCategoryController::class,
    'product'    =>ProductController::class,
]);

Route::get('/admin/subCategory/find/{cat_id}',[App\Http\Controllers\SubCategoryController::class, 'parentSubCate'])->name('category_ajax');

Route::get('/admin/users/all',[App\Http\Controllers\UserController::class,'index'])->name('users_all');

Route::get('/admin/users/{id}/delete',[App\Http\Controllers\UserController::class,'deleteUser'])->name('deleteUser');

Route::get('/admin/order/{order_id}/delete',[App\Http\Controllers\OrderController::class,'deleteOrder'])->name('order_delete');

Route::get('/admin/users/orders/',[App\Http\Controllers\OrderController::class,'userOrders'])->name('user_orders');

Route::get('/admin/order/{user_id}/{order_id}',[App\Http\Controllers\OrderController::class,'Order'])->name('order_view');
Route::get('/admin/users/onorder/{order_user_id}',[App\Http\Controllers\UserController::class,'userOrdersAdmin'])->name('user_orders_admin');

Route::get('/admin/users/approve/{order_id}',[App\Http\Controllers\OrderController::class,'approveOrder'])->name('approve_order');


});


// front product list controller

Route::get('/',[App\Http\Controllers\FrontProductListController::class,'index'])->name('main');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/cart/{product}',[App\Http\Controllers\CartController::class,'addToCart'])->name('add_to_cart');

Route::get('/products/{name}',[App\Http\Controllers\FrontProductListController::class,'allProductByCate'])->name('cate_slug');
Route::get('/cart',[App\Http\Controllers\CartController::class,'showCart'])->name('cart');
Route::post('/cart/update/{product}',[App\Http\Controllers\CartController::class,'updateCart'])->name('cart_update');

Route::post('/cart/remove/',[App\Http\Controllers\CartController::class,'deleteCartProduct'])->name('cart_remove');

Route::get('/product/view/{id}',[App\Http\Controllers\FrontProductListController::class,'showProductPage'])->name('product_show');
Route::get('/checkout/{amount}',[App\Http\Controllers\CartController::class,'checkout'])->name('checkout')->middleware('auth');

Route::post('/charge',[App\Http\Controllers\CartController::class,'charge'])->name('charge');

Route::get('/orders',[App\Http\Controllers\CartController::class,'order'])->name('order')->middleware('auth');


Route::get('all/products',[App\Http\Controllers\FrontProductListController::class,'moreProducts'])->name('more_products');

Route::get('slider',[App\Http\Controllers\SliderController::class,'create'])->name('slider');
Route::post('slider/save',[App\Http\Controllers\SliderController::class,'save'])->name('slider.store');

Route::delete('slider/{id}',[App\Http\Controllers\SliderController::class,'destroy'])->name('slider.destroy');


