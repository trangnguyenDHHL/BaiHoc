<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get(
    '/home',
     function () {
        $html="<h1>welcome to Ha Noi</h1>";
    return $html;
});
Route::get('/greeding', function () {
    return view('greeding',['name'=> 'James']);
});
Route::get('/Customer', 
'App\Http\Controllers\CustomerController@index');
Route::get('/getSupplier', 
'App\Http\Controllers\CustomerController@getSupplier');
Route::group(['prefix' =>'admin'],function(){



    Route::group(['prefix'=>'supplier'], function(){
        Route::get('/getSupplier','App\Http\Controllers\SupplierController@getSupplier')
        ->name('admin.product.getSupplier');


        Route::get('/getSupplierbyProvince','App\Http\Controllers\ProductController@getSupplierbyProvince')
        ->name('admin.product.getSupplierbyProvince');


       


        Route::get('/insertProduct','App\Http\Controllers\ProductController@forminsertProduct');
        Route::post('/insertProduct','App\Http\Controllers\ProductController@insertProduct');

    });
    Route::group(['prefix'=>'order'], function(){

    });
    Route::group(['prefix'=>'orderdetail'], function(){

    });
    Route::group(['prefix'=>'customer'], function(){
        Route::get('/getCustomer','App\Http\Controllers\CustomerController@getCustomers');

    });


    

});