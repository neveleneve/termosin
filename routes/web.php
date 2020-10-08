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

Route::get('/keranjang', function(){
    return view('keranjang');
});

Route::get('/cek-pembelian', function(){
    return view('cekpembelian');
});

Route::get('/cara-pemesanan', function(){
    return view('carapemesanan');
});

Route::post('/beli', 'PenggunaController@submitdatabelanja');


