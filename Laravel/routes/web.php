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

use Illuminate\Support\Facades\Artisan;
use Illuminate\Console\Command;

Route::post('/', 'LandingController@index')->name('mainlanding');
Route::get('/', 'LandingController@index')->name('mainlanding');

Route::post('convert/{slug}', 'ConvertController@index')->name('mainconvert');
Route::get('convert/{slug}', 'ConvertController@index')->name('mainconvert');

//Route::post('test_register', 'LandingController@register')->name('test_register');
//Route::get('test_register', 'LandingController@register')->name('test_register');

Route::get('logout', 'Auth\LoginController@logout');
Route::post('logout', 'Auth\LoginController@logout');

Route::get('home', 'PostController@home')->name('home.index');

Route::get('news', 'PostController@index')->name('news.index');
Route::get('news/{slug}', 'PostController@details')->name('news.details');

Route::get('tools', 'HerramientaController@index')->name('herra.index');
Route::get('tools/{slug}', 'HerramientaController@details')->name('herra.details');

//Route::get('news-by-category/{slug}', 'PostController@postsByCategory')->name('news.by.category');
//Route::get('news-by-tag/{slug}', 'PostController@postsByTag')->name('news.by.tag');
//Route::get('news-by-user/{user_id}', 'PostController@postsByuser')->name('news.by.user');

Auth::routes();

Route::group(
  [
    'as' => 'admin.',
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => ['auth', 'admin']
  ],
  function () {
    Route::get('dashboard', 'AdminDashboardController@index')
      ->name('dashboard');
    Route::resource('tag', 'TagController');
    Route::resource('category', 'CategoryController');
    Route::resource('post', 'PostController');

    Route::resource('tool', 'ToolController');

    //Route::resource('subscriber', 'SubscriberController')->only(['index', 'destroy']);
    //Route::resource('comments', 'CommentController')->only(['index', 'destroy']);

    Route::get('settings', 'SettingsController@index')
      ->name('settings.index');
    Route::put('profile-update', 'SettingsController@updateProfile')
      ->name('profile.update');
    Route::put('password-update', 'SettingsController@updatePassword')
      ->name('password.update');
    Route::get('pending/post', 'PostController@pending')->name('post.pending');
    Route::put('post/{post}/approve}', 'PostController@approval')->name('post.approve');
  }
);
/*
Route::group(
  [
    'as' => 'user.',
    'prefix' => 'user',
    'namespace' => 'User',
    'middleware' => ['auth', 'user']
  ],
  function () {
    Route::get('dashboard', 'UserDashboardController@index')
      ->name('dashboard');
    Route::resource('post', 'PostController');
    //Route::resource('comments', 'CommentController')->only(['index', 'destroy']);

    Route::get('settings', 'SettingsController@index')
      ->name('settings.index');
    Route::put('profile-update', 'SettingsController@updateProfile')
      ->name('profile.update');
    Route::put('password-update', 'SettingsController@updatePassword')
      ->name('password.update');

  }
);
*/