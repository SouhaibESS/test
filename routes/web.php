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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@createPost')->name('post.create');
Route::get('/post/{post}', 'HomeController@editPost')->name('post.edit');
Route::put('/post/{post}', 'HomeController@updatePost')->name('post.update');
Route::delete('/post/{post}', 'HomeController@deletePost')->name('post.delete');
