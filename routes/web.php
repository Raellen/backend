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

Route::get('/',"Frontcontroller@index");

Route::get('/news',"Frontcontroller@news");

Route::get('/contact_us',"Frontcontroller@contact_us");

Route::get('/news_info/{something_News_id}',"Frontcontroller@news_info");


Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');

Route::post('/profile', 'Frontcontroller@profile');

Route::prefix('admin')->middleware(['auth'])->group(function(){

    Route::get('news','NewsController@index');
    Route::get('news/create','NewsController@create');
    Route::post('news/store','NewsController@store');
    Route::get('news/edit/{news_id}','NewsController@edit');
    Route::post('news/update/{news_id}','NewsController@update');
    Route::get('news/destroy/{news_id}','NewsController@destroy');
});

