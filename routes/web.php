<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::post('logout', [HomeController::class, 'logout'])->name('logout');

Route::get('auth/google', [GoogleController::class, 'googlepage']);

Route::get('auth/google/callback', [GoogleController::class, 'googlecallback']);


Route::get('auth/facebook', [GoogleController::class, 'facebookpage']);

Route::get('auth/facebook/callback', [GoogleController::class, 'facebookcallback']);

Route::get('redirect', [HomeController::class, 'redirect']);


Route::get('/view_catagory', [AdminController::class, 'view_catagory']);

Route::post('/add_catagory', [AdminController::class, 'add_catagory']);

Route::get('/delete_catagory/{id}', [AdminController::class, 'delete_catagory']);

Route::get('/view_product', [AdminController::class, 'view_product']);

Route::post('/add_product', [AdminController::class, 'add_product']);

Route::get('/show_product', [AdminController::class, 'show_product']);

Route::get('delete_productss/{id}', [AdminController::class, 'delete_productss']);

Route::get('/update_product/{id}', [AdminController::class, 'update_product']);

Route::post('update_product_confirm/{id}', [AdminController::class, 'update_product_confirm']);

Route::get('detials/{id}', [AdminController::class, 'detials']);

Route::get('product_details/{id}', [HomeController::class, 'product_details']);

Route::get('product_details_first/{id}', [HomeController::class, 'product_details_first']);


Route::get('/featured_product', [AdminController::class, 'featured_product']);

Route::post('/add_featured_product', [AdminController::class, 'add_featured_product']);

Route::get('/show_featured_product', [AdminController::class, 'show_featured_product']);

Route::get('featured_detials/{id}', [AdminController::class, 'featured_detials']);

Route::get('featured_delete_product/{id}', [AdminController::class, 'featured_delete_product']);

Route::get('/featured_update_product/{id}', [AdminController::class, 'featured_update_product']);

Route::post('update_featured_product_confirm/{id}', [AdminController::class, 'update_featured_product_confirm']);

Route::post('add_cart/{id}', [HomeController::class, 'add_cart']);

Route::get('show_cart', [HomeController::class, 'show_cart']);

Route::get('delete_product/{id}', [HomeController::class, 'delete_product']);

Route::get('cash_order/{totalprice}', [HomeController::class, 'cash_order']);

Route::get('cash_order_order/{userid}/{totalprice}', [HomeController::class, 'cash_order_order']);


Route::get('stripe/{totalprice}', [HomeController::class, 'stripe']);

Route::post('stripe/{totalprice}', [HomeController::class, 'stripePost'])
->name('stripe.post');

Route::get('shop', [HomeController::class, 'shop']);

Route::get('adressupdate/{id}', [HomeController::class, 'adressupdate']);

Route::get('address_update/{id}', [HomeController::class, 'address_update']);

Route::get('orderdetials', [HomeController::class, 'orderdetials']);




Route::get('orders', [AdminController::class, 'orders']);

Route::get('delete_order/{id}', [AdminController::class, 'delete_order']);

Route::get('delivered/{id}', [AdminController::class, 'delivered']);

Route::get('print_pdf/{id}', [AdminController::class, 'print_pdf']);

Route::get('search', [AdminController::class, 'search']);

Route::get('order_cencel/{id}', [HomeController::class, 'order_cencel']);

Route::get('blog', [HomeController::class, 'blog']);

Route::get('about', [HomeController::class, 'about']);


Route::get('contact', [HomeController::class, 'contact']);

Route::get('incress_quantity/{id}', [HomeController::class, 'incress_quantity']);

Route::get('dec_quantity/{id}', [HomeController::class, 'dec_quantity']);



Route::get('/blog_upload', [AdminController::class, 'blog_upload']);

Route::post('add_blog_update', [AdminController::class, 'add_blog_update']);

Route::get('show_blog', [AdminController::class, 'show_blog']);

Route::get('blog_delete/{id}', [AdminController::class, 'blog_delete']);

Route::get('product_search', [HomeController::class, 'product_search']);

Route::post('update_msg', [HomeController::class, 'update_msg']);

Route::get('contect_messages', [AdminController::class, 'contect_messages']);

Route::get('message_delete/{id}', [AdminController::class, 'message_delete']);

Route::get('sms', [HomeController::class, 'sms']);

Route::post('sms', [HomeController::class, 'smssend']);

Route::get('/mobile_verification/{id}', [HomeController::class, 'otpsend']);

Route::get('/mobile_verification_order/{id}/{totalprice}', [HomeController::class, 'otpsend_order']);



Route::get('Verify_num_save/{id}', [HomeController::class, 'Verify_num_save']);



Route::get('email_newsletter', [HomeController::class, 'email_newsletter']);

Route::get('show_newslatter', [AdminController::class, 'show_newslatter']);

Route::get('newslatter_delete/{id}', [AdminController::class, 'newslatter_delete']);





















