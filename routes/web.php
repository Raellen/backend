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

//＊＊ Route的優先順序是從上往下看



Route::get('/', "Frontcontroller@index"); //首頁

Route::get('/news', "Frontcontroller@news"); //新聞頁

Route::get('/news_info/{something_News_id}', "Frontcontroller@news_info"); //新聞內頁

Route::get('/contact_us', "Frontcontroller@contact_us"); //

Route::get('/product', "Frontcontroller@product");

Route::get('/product_info/{product_id}', "Frontcontroller@product_info");



Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');

// Route::post('/profile', 'Frontcontroller@profile');

Route::prefix('admin')->middleware(['auth'])->group(function () {

    Route::post('/ajax_upload_img', 'AdminController@ajax_upload_img');
    Route::post('/ajax_delete_img', 'AdminController@ajax_delete_img');


    Route::get('news', 'NewsController@index');
    Route::get('news/create', 'NewsController@create');
    Route::post('news/store', 'NewsController@store');
    Route::get('news/edit/{news_id}', 'NewsController@edit');
    Route::post('news/update/{news_id}', 'NewsController@update');
    Route::get('news/destroy/{news_id}', 'NewsController@destroy');

    //後台商品管理
    Route::get('product', 'ProductsController@index');
    Route::get('product/create', 'ProductsController@create');
    Route::post('product/store', 'ProductsController@store');
    Route::get('product/edit/{news_id}', 'ProductsController@edit');
    Route::post('product/update/{news_id}', 'ProductsController@update');
    Route::get('product/destroy/{news_id}', 'ProductsController@destroy');

    Route::resource('product_type', 'ProductTypeController');
});
