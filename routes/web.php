<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/administrator/logout', 'AdminController@logout');
Route::post('/administrator/login', 'AdminController@logging_in');



Route::get('/login', 'AdminController@login')->name('login');
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

// Auth Admin
Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/administrator', 'AdminController@index');
    // ------------------------------------------------------------------------------//

    Route::get('/administrator/item', 'AdminController@item')->name('item');
    // ------------------------------------------------------------------------------//
    Route::get('/administrator/item/edit/{id}', 'AdminController@viewitem')->name('viewitem');
    Route::post('/administrator/item/edit', 'AdminController@updateitem')->name('updateitem');
    // ------------------------------------------------------------------------------//
    Route::get('/administrator/item/images/{id}', 'AdminController@itemimage')->name('imageitem');
    // ------------------------------------------------------------------------------//
    Route::get('/administrator/item/hapus/{id}', 'AdminController@hapusitem')->name('hapusitem');
    // ------------------------------------------------------------------------------//
    Route::get('/administrator/item/add', 'AdminController@additem')->name('additem');
    Route::post('/administrator/item/add', 'AdminController@addingitem')->name('addingitem');

    Route::get('/administrator/transaction', 'AdminController@transaction');
    
    Route::get('/administrator/admin', 'AdminController@admin');
    
});
