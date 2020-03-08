<?php

use Illuminate\Support\Facades\{Route, Auth};

Route::view('/', 'welcome');

Auth::routes(['register' => false]);

Route::get('/home', 'PostController@index')->name('home');

Route::resource('posts', 'PostController')->except(['show', 'index']);
