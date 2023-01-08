<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\SkemaController;
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

// Peserta
Route::get('/', [App\Http\Controllers\PesertaController::class, 'index'])->name('home');
Route::get('/peserta/create', [App\Http\Controllers\PesertaController::class,'create'])->name('peserta.create');
Route::post('/daftar', [App\Http\Controllers\PesertaController::class,'store']);
Route::post('/peserta/{id}', [App\Http\Controllers\PesertaController::class,'destroy']);
Route::get('/peserta/{id}/edit', [App\Http\Controllers\PesertaController::class,'edit'])->name('peserta.edit');
Route::patch('/peserta/{id}', [App\Http\Controllers\PesertaController::class,'update'])->name('peserta.update');
Route::get('/search', [App\Http\Controllers\PesertaController::class, 'search'])->name('home');

// Sertifikasi
Route::get('/sertifikasi', [App\Http\Controllers\SkemaController::class, 'index'])->name('sertifikasi.index');
Route::get('/sertifikasi/tambah', [App\Http\Controllers\SkemaController::class, 'create'])->name('sertifikasi.create');
Route::post('/sertifikasi/tambah', [App\Http\Controllers\SkemaController::class, 'store'])->name('sertifikasi.store');
Route::get('/sertifikasi/edit/{kd_skema}', [App\Http\Controllers\SkemaController::class, 'edit'])->name('sertifikasi.edit');
Route::patch('/sertifikasi/edit/{kd_skema}', [App\Http\Controllers\SkemaController::class, 'update'])->name('sertifikasi.update');
Route::post('/sertifikasi/hapus/{kd_skema}', [App\Http\Controllers\SkemaController::class,'destroy']);
