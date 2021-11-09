<?php

Route::redirect('/', '/login');
Route::redirect('/home', '/admin');
Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');
    
    // Category
    Route::delete('category/destroy', 'CategoryController@massDestroy')->name('category.massDestroy');
    Route::resource('category', 'CategoryController');
    
    // Brand
    Route::delete('brand/destroy', 'BrandController@massDestroy')->name('brand.massDestroy');
    Route::resource('brand', 'BrandController');
    
    // Color
    Route::delete('color/destroy', 'ColorController@massDestroy')->name('color.massDestroy');
    Route::resource('color', 'ColorController');
    
    // Size
    Route::delete('size/destroy', 'SizeController@massDestroy')->name('size.massDestroy');
    Route::resource('size', 'SizeController');
    
    // Series
    Route::delete('series/destroy', 'SeriesController@massDestroy')->name('series.massDestroy');
    Route::resource('series', 'SeriesController');
    
    // Series
    Route::delete('accessories/destroy', 'AccessoriesController@massDestroy')->name('accessories.massDestroy');
    Route::resource('accessories', 'AccessoriesController');

});
