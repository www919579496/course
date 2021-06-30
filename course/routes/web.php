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

Route::get('/qr', function () {
    return view('simpleqrcode');
});
/*-----------------------------------------not USA pig cow---------------------------------*/
// static page
Route::get('/', 'StaticPagesController@home')->name('home');
Route::get('/help', 'StaticPagesController@help')->name('help');
Route::get('/about', 'StaticPagesController@about')->name('about');
// users
Route::get('/register','UsersController@register')->name('register');
Route::resource('users','UsersController');
// Session 
Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store')->name('login');
Route::delete('/logout', 'SessionsController@destroy')->name('logout');
//email activied
Route::get('register/confirm/{token}', 'UsersController@confirmEmail')->name('confirm_email');
//password reset
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');//显示重置密码的邮箱发送页面
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');//邮箱发送重设链接
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');//密码更新页面
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');//執行密碼更新操作
//tweet create and delete
Route::resource('statuses', 'StatusesController', ['only' => ['store', 'destroy']]);
/*-----------------------------------------not USA pig cow---------------------------------*/
Route::resource('product','ProductController');
Route::get('/search','StaticPagesController@search')->name('search');
//api 
Route::get('/apiget', function () {
    return file_get_contents('http://192.168.31.43:3000/?username=leandroisamotherfucker');
});
