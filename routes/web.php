<?php

use App\Post;
use Illuminate\Support\Facades\{Route, Auth};

Route::view('/', 'welcome');

Auth::routes();

Route::get('/home', 'PostController@index')->name('home');

Route::resource('posts', 'PostController')->except(['show', 'index']);
