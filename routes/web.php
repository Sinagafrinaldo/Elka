<?php

use App\Http\Controllers\UserController;
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

Route::get('/', [UserController::class, 'index']);
Route::get('/cek-stok', [UserController::class, 'cekstok']);
Route::get('/tentang-kami', [UserController::class, 'tentangkami']);
Route::get('/kategori-barang', [UserController::class, 'kategori_barang']);
Route::get('/cari', [UserController::class, 'cari']);
Route::get('/list-kategori/{slug}', [UserController::class, 'listKategori']);
Route::get('/detail/{slug}', [UserController::class, 'detail']); 
 
Route::prefix('admin')->group(function(){
    Route::get('/',[App\Http\Controllers\Admin\Auth\LoginController::class,'loginForm']);
    Route::get('/login',[App\Http\Controllers\Admin\Auth\LoginController::class,'loginForm'])->name('admin.login');
    Route::post('/login',[App\Http\Controllers\Admin\Auth\LoginController::class,'login'])->name('admin.login');
    Route::get('/home',[App\Http\Controllers\Admin\HomeController::class,'index'])->name('admin.home');
    Route::get('/logout',[App\Http\Controllers\Admin\Auth\LoginController::class,'logout'])->name('admin.logout');
    Route::get('/inventory',[App\Http\Controllers\Admin\HomeController::class,'inventory'])->name('admin.inventory');
    Route::get('/daftar-obat',[App\Http\Controllers\Admin\HomeController::class,'daftarObat'])->name('admin.daftarObat');
    Route::get('/input-transaksi',[App\Http\Controllers\Admin\HomeController::class,'inputTransaksi'])->name('admin.inputTransaksi');
    Route::get('/input-obat',[App\Http\Controllers\Admin\HomeController::class,'inputObat'])->name('admin.inputObat');
    Route::get('/laporan-barang-masuk',[App\Http\Controllers\Admin\HomeController::class,'laporan_barangmasuk'])->name('admin.laporan_barangmasuk');
    Route::get('/laporan-barang-sisa',[App\Http\Controllers\Admin\HomeController::class,'laporan_barangsisa'])->name('admin.laporan_barangsisa');
    Route::get('/laporan-penjualan',[App\Http\Controllers\Admin\HomeController::class,'laporan_penjualan'])->name('admin.laporan_penjualan');
    Route::get('/laporan-pemasukan',[App\Http\Controllers\Admin\HomeController::class,'laporan_pemasukan'])->name('admin.laporan_pemasukan');
    Route::get('/kadaluarsa',[App\Http\Controllers\Admin\HomeController::class,'kadaluarsa'])->name('admin.kadaluarsa');
    Route::get('/kategori',[App\Http\Controllers\Admin\HomeController::class,'kategori'])->name('admin.kategori');
    
    Route::post('/input-obat/store',[App\Http\Controllers\Admin\HomeController::class,'store']);
    Route::post('/input-kategori/store',[App\Http\Controllers\Admin\HomeController::class,'tambahKategori']);

    Route::post('/update-kategori',[App\Http\Controllers\Admin\HomeController::class,'updateKategori'])->name('admin.updateKategori');
    Route::post('/update-barang',[App\Http\Controllers\Admin\HomeController::class,'updateBarang'])->name('admin.updateBarang');
    
    Route::get('/detail-obat/{slug}',[App\Http\Controllers\Admin\HomeController::class,'detail'])->name('admin.detail');
    Route::get('/edit-barang/{slug}',[App\Http\Controllers\Admin\HomeController::class,'edit'])->name('admin.edit');

    Route::get('/tambah-kategori',[App\Http\Controllers\Admin\HomeController::class,'inputKategori'])->name('admin.inputKategori');
    Route::get('/edit-kategori/{slug}',[App\Http\Controllers\Admin\HomeController::class,'editKategori']);

    Route::get('/daftar-obat/cari',[App\Http\Controllers\Admin\HomeController::class,'search']);

    
    Route::get('/kategori/hapus-kategori/{id}',[App\Http\Controllers\Admin\HomeController::class,'hapusKategori']);
    Route::get('/daftar-obat/hapus-barang/{id}',[App\Http\Controllers\Admin\HomeController::class,'hapusBarang']);
});
