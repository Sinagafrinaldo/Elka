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
    return view('user/homeUser', [
        "title" => "Home"
    ]);
});

Route::get('/cek-stok', function () {
    return view('user/cekStok', [
        "title" => "Cek Stok Obat"
    ]);
});

Route::get('/tentang-kami', function () {
    return view('user/tentangKami', [
        "title" => "Tentang Kami"
    ]);
});
