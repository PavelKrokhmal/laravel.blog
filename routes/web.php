<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;

Route::get('/', 'App\Http\Controllers\PostController@index')->name('home');
Route::get('/article/{slug}', 'App\Http\Controllers\PostController@show')->name('posts.single');
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('categories.single');

Route::group(['prefix'=>'admin', 'namespace'=>'App\Http\Controllers\Admin', 'middleware'=>'admin'], function () {
    Route::get('/', 'MainController@index')->name('admin.index');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/tags', 'TagController');
    Route::resource('/posts', 'PostController');
});

Route::group(['middleware'=>'guest'], function () {
    Route::get('/register', 'App\Http\Controllers\UserController@create')->name('register.create');
    Route::post('/register', 'App\Http\Controllers\UserController@store')->name('register.store');
    Route::get('/login', 'App\Http\Controllers\UserController@loginForm')->name('login.create');
    Route::post('/login', 'App\Http\Controllers\UserController@login')->name('login');
});


Route::get('/logout', 'App\Http\Controllers\UserController@logout')
    ->name('logout')->middleware('auth');
