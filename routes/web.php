<?php

use Illuminate\Support\Facades\Route;

// Route Umum
Route::get('/', 'ItemController@index');
Route::get('/kontak', function () {
    return view('contact');
});
Route::get('/tentang', function () {
    return view('about');
});
Route::get('/cek-pembelian', 'PenggunaController@cekpembelian');
Route::post('/cek-pembelian', 'PenggunaController@cekpembeliancari');
Route::get('/search', 'PenggunaController@search');
Route::get('/cara-pemesanan', function () {
    return view('carapemesanan');
});
// Route Item
Route::get('/item/{id}', 'ItemController@show');
Route::post('/beli', 'PenggunaController@submitkeranjang');
// Route Keranjang
Route::get('/keranjang', 'PenggunaController@keranjang');
Route::post('/transaction', 'PenggunaController@transaction');
Route::get('/deletekeranjang/{id}', 'PenggunaController@hapuskeranjang');
Route::post('/proseskeranjang', 'PenggunaController@proseskeranjang');
// Route Checkout
Route::get('/checkout', 'PenggunaController@checkout');


// Route Admin
Route::get('/administrator/login', 'AdminController@login')->name('login');

// Auth Admin

Route::get('/administrator', 'AdminController@index');

Route::get('/administrator/item', 'AdminController@item');

Route::get('/administrator/transaction', 'AdminController@transaction');
