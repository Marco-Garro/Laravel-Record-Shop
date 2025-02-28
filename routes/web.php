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

Route::middleware('admin')->group(function (){
    Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name('admin.index');
    Route::get('/admin/products', 'App\Http\Controllers\AdminController@products')->name('admin.products');
    Route::get('/admin/productDetail/{id}', 'App\Http\Controllers\AdminController@detailProduct')->name('admin.productDetail');
    Route::put('/admin/updateProduct/{id}', 'App\Http\Controllers\AdminController@updateProduct')->name('admin.updateProduct');
    Route::delete('/admin/deleteProduct/{id}', 'App\Http\Controllers\AdminController@deleteProduct')->name('admin.deleteProduct');
    Route::post('/admin/createProduct', 'App\Http\Controllers\AdminController@createProduct')->name('admin.createProduct');
});

Auth::routes();

