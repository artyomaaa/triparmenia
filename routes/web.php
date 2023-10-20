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


use Illuminate\Support\Facades\Route;

Route::get('/', 'SiteController@index');

Route::get('/partners', 'SiteController@partners');

Route::get('/register-user', 'AuthController@reg_user_view');

Route::post('/register-account', 'AuthController@register_account');

Route::get('/verificate/{token}', 'AuthController@verificate')->name('verificate');

route::get('/check-password','AuthController@check_password');

route::post('/check-email','AuthController@check_email');

route::get('/check/{token}','AuthController@check')->name('check');

route::post('/reset-password','AuthController@reset_password');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/login', 'AuthController@login');


Route::get('/my-account', 'AuthController@my_account');

Route::get('/logout', 'AuthController@logout');

Route::get('/services', 'SiteController@service')->name('service');

Route::post('/services_add', 'SiteController@services_add');

Route::post('service/image', 'SiteController@services_images');

Route::get('/change', 'SiteController@change')->name('change');

Route::post('/change/{id}', 'SiteController@change_service')->name('change_service');

Route::get('/destroy/{id}', 'SiteController@destroy')->name('destroy');

Route::get('delete/{id}', 'SiteController@delete');

Route::get('/driver-page', 'SiteController@driver_page')->name('driver');

Route::get('/about-driver/{id}', 'SiteController@about_driver');

Route::get('/abort', 'SiteController@abort');


Route::match(['get', 'post'], '/login-admin', 'Admin\AdminController@login_admin')->name('login_admin');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {

    Route::get('/dashboard', 'Admin\AdminController@dashboard');

    Route::get('/logout', 'Admin\AdminController@logout')->name('logout');

    Route::resource('/user', 'Admin\UserController');
    Route::resource('/role', 'Admin\RoleController');
});
Route::post('/comment','CommentController@comment');

Route::get('/replay/{id}','CommentController@replay');
