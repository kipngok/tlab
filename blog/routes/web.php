<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
// Route::get('/', 'HomeController@index')->name('home');
Route::resource('/product','ProductController');
Route::resource('/company','CompanyController');
Route::resource('/category','CategoryController');
Route::resource('/income','IncomeController');
Route::resource('/user','UserController');
Route::get('/generateRandomString','CodeController@generateRandomString');
Route::get('/notification','IncomeController@notification');
Route::get('/code/{product_id}/{product}/','CodeController@filtered');
Route::resource('/code','CodeController');
Route::resource('/inactive','InactiveproductcodesController');
Route::resource('/active','ActiveproductcodesController');
// /Route::get('/generateRandomString','CodeController@promoteSave');

// Route::get('/student/{school_id}/{class}/{subscription}','StudentController@filtered');
Route::get('/product/{category_id}','ProductController@filtered');
// Route::get('/product/{category_id}','ProductController@filtered');

Route::get('/file-exports','UserController@fileExport')->name('fileExport');
Route::get('/file-exporta', 'ActiveproductcodesController@fileExport');
Route::get('/file-exportin','InactiveproductcodesController@fileExport');
Route::get('/file-exportinc','IncomeController@fileExport')->name('fileExport');
