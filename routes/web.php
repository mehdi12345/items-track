<?php

use Illuminate\Support\Facades\Auth;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/','positionController@index')->name('home');
Route::get('/client','clients@index');
Route::post('/idproduct','clients@productId');
Route::post('/positionStore','positionController@store');
Route::post('/positionStop','positionController@stop');
Route::post('/positionStart','positionController@start');
Route::get('/ProductStoped',function(){
    return view('ProductStoped');
});
Route::get('/map',function(){
    return view('map');
})->name('map');
Route::get('/Store',function(){
    return view('ProductStore');
})->name('store');
Route::post('/upload','productController@upload');

