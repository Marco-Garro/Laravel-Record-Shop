<?php

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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/about', 'App\Http\Controllers\HomeController@about')->name('home.about');
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('product.index');
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@detail')->name('product.detail');
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index');
Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name('cart.add');
Route::delete('/cart/remove/{id}', 'App\Http\Controllers\CartController@removeProduct')->name('cart.removeProduct');
Route::delete('/cart/empty', 'App\Http\Controllers\CartController@emptyCart')->name('cart.emptyCart');
Route::post('/cart/order', 'App\Http\Controllers\CartController@buy')->name('cart.buy');
Route::middleware('user')->group(function () {
    Route::get('/cart/orders', 'App\Http\Controllers\CartController@orders')->name('cart.orders');
});

Route::middleware('admin')->group(function (){
    Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name('admin.index');
    Route::get('/admin/products', 'App\Http\Controllers\AdminController@products')->name('admin.products');
    Route::get('/admin/productDetail/{id}', 'App\Http\Controllers\AdminController@detailProduct')->name('admin.productDetail');
    Route::put('/admin/updateProduct/{id}', 'App\Http\Controllers\AdminController@updateProduct')->name('admin.updateProduct');
    Route::delete('/admin/deleteProduct/{id}', 'App\Http\Controllers\AdminController@deleteProduct')->name('admin.deleteProduct');
    Route::post('/admin/createProduct', 'App\Http\Controllers\AdminController@createProduct')->name('admin.createProduct');
});

Auth::routes();

