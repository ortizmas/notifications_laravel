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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts', 'PostController');
Route::resource('comments', 'CommentController');
Route::put('notifications-all-read', 'NotificationController@markAllAsRead');
Route::put('notifications-read', 'NotificationController@markAsRead');
Route::get('notifications', 'NotificationController@notifications')->name('notifications');


Route::get('/clearCache', function(){
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');

    return '<h1>Caches limpados</h1>';
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
