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

Route::get('/', 'User\HomeController@index');
Route::get('post/{post}','User\PostController@post')->name('post');

Route::resource('admin/post','Admin\PostController');
Route::resource('admin/user','Admin\UserController');
Route::resource('admin/tag','Admin\TagController');
Route::resource('admin/category','Admin\CategoryController');
Route::get('admin-login','Admin\Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('admin-login','Admin\Auth\LoginController@login');

// Route::get('post', function () {
//     return view('post');
// })->name('post');

// Route::get('admin/admin', function () {
//     return view('admin.admin');
// })->name('post');

// Route::get('admin/post', function () {
//     return view('admin.post.post');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
