<?php

Route::get('/', 'IndexController@index')->name('index');

Route::get('/about', 'IndexController@about')->name('about');
Route::get('/order', 'IndexController@order')->name('order');
Route::get('/repair', 'IndexController@repair')->name('repair');
Route::get('/the-end', 'IndexController@theEnd')->name('the-end');
Route::get('/products', 'IndexController@products')->name('products');

Route::get('/pickup', 'IndexController@pickup')->name('pickup');
Route::get('/pickup/{id}', 'IndexController@pickupDetail')->name('pickup.detail');

Route::get('/contact', 'IndexController@contactPage')->name('contact');
Route::post('/contact', 'IndexController@contact')->name('contact.post');

// Legacy POST to / (backward compat)
Route::post('/', 'IndexController@contact');

Route::prefix('admin')->group(function () {
    Route::get('login', function () {
        return view('auth/login');
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
    Route::prefix('base-model')->group(function () {
        Route::get('/', 'Auth\AdminController@baseModel');
        Route::get('register', 'Auth\AdminController@baseModelRegister');
        Route::post('register', 'Auth\AdminController@baseModelRegisterExec');
        Route::get('edit/{id}', 'Auth\AdminController@baseModelEdit');
        Route::post('edit/{id}', 'Auth\AdminController@baseModelEditExec');
        Route::get('delete/{id}', 'Auth\AdminController@baseModelDelete');
    });
    Route::prefix('blog')->group(function () {
        Route::get('/', 'Auth\AdminController@blog');
        Route::get('detail/{id}', 'Auth\AdminController@blogDetail');
        Route::get('edit/{id}', 'Auth\AdminController@blogEdit');
        Route::post('edit/{id}', 'Auth\AdminController@blogEditExec');
        Route::get('register', 'Auth\AdminController@blogRegister');
        Route::post('register', 'Auth\AdminController@blogRegisterExec');
        Route::post('top-position', 'Auth\AdminController@blogTopPosition');
    });
});
