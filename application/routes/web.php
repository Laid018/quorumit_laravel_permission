<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------

*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    // products routes
    Route::get('products', 'ProductController@index')->name('products.index');
    Route::get('product', 'ProductController@create')->name('products.create');
    Route::post('product', 'ProductController@store')->name('products.store');
    Route::get('product/{id}/detail', 'ProductController@show')->name('products.show');
    Route::get('product/{id}/edit', 'ProductController@edit')->name('products.edit');
    Route::put('product/{id}', 'ProductController@update')->name('products.update');
    Route::delete('product/{id}', 'ProductController@destroy')->name('products.destroy');

    // users routes
    Route::get('users', 'UserController@index')->name('users.index');
    Route::get('user', 'UserController@create')->name('users.create');
    Route::post('user', 'UserController@store')->name('users.store');
    Route::get('user/{id}/detail', 'UserController@show')->name('users.show');
    Route::get('user/{id}/edit', 'UserController@edit')->name('users.edit');
    Route::put('user/{id}', 'UserController@update')->name('users.update');
    Route::delete('user/{id}', 'UserController@destroy')->name('users.destroy');

    // roles
    Route::get('roles', 'RolController@index')->name('roles.index');
    Route::get('rol', 'RolController@create')->name('roles.create');
    Route::post('rol', 'RolController@store')->name('roles.store');
    Route::get('rol/{id}/detail', 'RolController@show')->name('roles.show');
    Route::get('rol/{id}/edit', 'RolController@edit')->name('roles.edit');
    Route::put('rol/{id}', 'RolController@update')->name('roles.update');
    Route::delete('rol/{id}', 'RolController@destroy')->name('roles.destroy');

    // permissions
    Route::get('permissions', 'PermissionController@index')->name('permissions.index');
    Route::get('permission', 'PermissionController@create')->name('permissions.create');
    Route::post('permission', 'PermissionController@store')->name('permissions.store');
    Route::get('permission/{id}/detail', 'PermissionController@show')->name('permissions.show');
    Route::get('permission/{id}/edit', 'PermissionController@edit')->name('permissions.edit');
    Route::put('permission/{id}', 'PermissionController@update')->name('permissions.update');
    Route::delete('permission/{id}', 'PermissionController@destroy')->name('permissions.destroy');
});
