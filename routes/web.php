<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembelianController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/profile', [HomeController::class, 'profile']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/faq', [HomeController::class, 'faq']);
Route::resource('/produk', ProductController::class);
Route::resource('/barang', BarangController::class);
Route::resource('/pemasok', PemasokController::class);
Route::resource('/pelanggan', PelangganController::class);
Route::resource('/pembelian', PembelianController::class);
