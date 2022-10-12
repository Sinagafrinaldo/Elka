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

 

Route::prefix('admin')->group(function(){
    Route::get('/',[App\Http\Controllers\Admin\Auth\LoginController::class,'loginForm']);
    Route::get('/login',[App\Http\Controllers\Admin\Auth\LoginController::class,'loginForm'])->name('admin.login');
    Route::post('/login',[App\Http\Controllers\Admin\Auth\LoginController::class,'login'])->name('admin.login');
    Route::get('/home',[App\Http\Controllers\Admin\HomeController::class,'index'])->name('admin.home');
    Route::get('/logout',[App\Http\Controllers\Admin\Auth\LoginController::class,'logout'])->name('admin.logout');
    Route::get('/inventory',[App\Http\Controllers\Admin\HomeController::class,'inventory'])->name('admin.inventory');
     Route::get('/laporan',[App\Http\Controllers\Admin\HomeController::class,'laporan'])->name('admin.laporan');
 
    Route::get('/kadaluarsa',[App\Http\Controllers\Admin\HomeController::class,'kadaluarsa'])->name('admin.kadaluarsa');
 
});
