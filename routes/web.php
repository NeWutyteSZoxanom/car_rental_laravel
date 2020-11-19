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



Route::get('/', 'StoreController@index')->name('index');

Route::group(['middleware'=>'auth'], function(){
	Route::get('/bookcar/{id}', 'StoreController@bookcar')->name('bookcar');	
});



Route::group(['middleware'=>'admin','prefix'=>'admin'], function(){
	Route::get('/cars', 'CarsController@index')->name('createcars');
	Route::post('/add', 'CarsController@store')->name('addcar');
	Route::get('/cars/delete/{id}', 'CarsController@destroy')->name('cardestroy');
	Route::get('/cars/edit/{id}', 'CarsController@edit')->name('caredit');
	Route::post('/cars/update/{id}', 'CarsController@update')->name('carupdate');
	Route::get('/car_types', 'CarTypesController@index')->name('vid');
	Route::post('/car_types/store', 'CarTypesController@store')->name('store');
	Route::get('/car_types/destroy/{id}', 'CarTypesController@destroy')->name('destroy');
});

Route::post('/booking/store', 'BookingsController@store')->name('bookcreate');




Auth::routes();


