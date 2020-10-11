<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'ItemController@index');

Route::get('/kontak', function(){
    return view('contact');
});

Route::get('/tentang', function(){
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

Route::get('/keranjang', 'PenggunaController@keranjang');

Route::get('/checkout', 'PenggunaController@checkout');

Route::post('/deletekeranjang', 'PenggunaController@hapuskeranjang');

Route::post('/beli', 'PenggunaController@submitkeranjang');


