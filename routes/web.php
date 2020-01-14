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

Route::redirect('/', 'blog');


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('blog', 'Web\PageController@blog')->name('blog');

Route::get('blog/{slug}', 'Web\PageController@post')->name('post');
Route::get('category/{slug}', 'Web\PageController@category')->name('category');
Route::get('tag/{slug}', 'Web\PageController@tag')->name('tag');
Route::get('user/{id}', 'Web\PageController@user')->name('user');
Route::put('tweets/update/{tweet}', 'Admin\TweetController@update')->name('tweets.update');


// admin
Route::resource('tags', 'Admin\TagController');
Route::resource('categories', 'Admin\CategoryController');
Route::resource('posts', 'Admin\PostController');
//Route::resource('tweets', 'Admin\TweetController');