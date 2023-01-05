<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\stokController;

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

Route::get('/', [dashboardController::class, 'index'])->name('login');
Route::get('/logout', [dashboardController::class, 'logout']);
Route::post('/login', [dashboardController::class, 'login']);
Route::get('/dashboard', [dashboardController::class, 'dashboard'])->middleware('auth');
Route::resource('/stok', stokController::class)->middleware('auth');
Route::get('/barang-masuk', [stokController::class, 'barangMasuk'])->middleware('auth');
Route::get('/barang-keluar', [stokController::class, 'barangKeluar'])->middleware('auth');
Route::post('/barang-keluar', [stokController::class, 'prosesBarangKeluar'])->middleware('auth');
Route::get('/ajax/{str}', [stokController::class, 'ajax']);
Route::get('/download', [stokController::class, 'download']);