<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::group(["middleware" => "auth"], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::group(['prefix' => 'blogs'], function () {
        Route::get('/', 'BlogController@index')->name('blogs.index');
        Route::get('/create', 'BlogController@create')->name('blogs.create');
        Route::post('/create', 'BlogController@store')->name('blogs.store');
        Route::get('{id}/edit', 'BlogController@edit')->name('blogs.edit');
        Route::post('{id}/edit', 'BlogController@update')->name('blogs.update');
        Route::get('{id}/destroy', 'BlogController@destroy')->name('blogs.delete');
        Route::get('/search', 'BlogController@search')->name('blogs.search');
        Route::get('/{id}/show', 'BlogController@show')->name('blogs.show');
    });

    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', 'CategoryController@index')->name('categories.index');
        Route::get('/create', 'CategoryController@create')->name('categories.create');
        Route::post('/create', 'CategoryController@store')->name('categories.store');
        Route::get('/{id}/edit', 'CategoryController@edit')->name('categories.edit');
        Route::post('/{id}/edit', 'CategoryController@update')->name('categories.update');
    });
});

