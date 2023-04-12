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

Route::get('/', 'IndexController@index')->name('index');
Route::post('/', 'IndexController@contact');

Route::prefix('admin')->group(function () {
    Route::get('login', function () {
        return view('auth/login'); // blade.php
    });
    Route::post('login', 'Auth\LoginController@adminLogin')->name('admin.login');
    Route::match(['get', 'post'], 'logout', 'Auth\LoginController@adminLogout')->name('admin.logout');
    Route::get('/', 'Auth\AdminController@index')->name('admin.index');
    Route::get('contact', 'Auth\AdminController@contact')->name('admin.contact');
    Route::get('contact/{id}', 'Auth\AdminController@contactDetail')->name('admin.contact_detail');
    Route::prefix('information')->group(function () {
        Route::get('/', 'Auth\AdminController@information');
        Route::get('edit/{id}', 'Auth\AdminController@informationEdit');
        Route::post('edit/{id}', 'Auth\AdminController@informationEditExec');
        Route::get('register', 'Auth\AdminController@informationRegister');
        Route::post('register', 'Auth\AdminController@informationRegisterExec');
        Route::get('delete/{id}', 'Auth\AdminController@informationDelete');
    });
    Route::get('item', 'Auth\AdminController@item');
    Route::get('item/register', 'Auth\AdminController@itemRegister');
    Route::prefix('blog')->group(function () {
        Route::get('/', 'Auth\AdminController@blog');
        Route::get('detail/{id}', 'Auth\AdminController@blogDetail');
        Route::get('edit/{id}', 'Auth\AdminController@blogEdit');
        Route::post('edit/{id}', 'Auth\AdminController@blogEditExec');
        Route::get('register', 'Auth\AdminController@blogRegister');
        Route::post('register', 'Auth\AdminController@blogRegisterExec');
    });
});
