<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'ItemController@index');

Route::get('/contact', function(){
    return view('contact');
});

Route::get('/about', function(){
    return view('about');
});

Route::get('/item/{id}', 'ItemController@show');


