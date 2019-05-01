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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('admin')->group(function (){
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/users', 'AdminController@showUser')->name('admin.user');
    Route::get('/category', 'CategoryController@viewCategory')->name('admin.category');
    Route::post('/category', 'CategoryController@addCategory')->name('admin.post');
    Route::Delete('/category/{id}', 'CategoryController@deleteCategory')->name('admin.delete');
// rout add avatar
    Route::post('/', 'AdminController@showAvatar')->name('admin.avatar');
});


Route::post('/users', 'HomeController@showAvatar')->name('user.avatar');

Route::resource('/post','PostController');

Route::post('/comment/{id}','CommentController@addComment')->name('comment');



Route::get('/category/{id}','CommentController@eachCategory')->name('category');











