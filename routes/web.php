<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KelulusanController;
use App\Http\Controllers\KesiswaanController;
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\PesertaDidikController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/berita', [BeritaController::class, 'index']);
Route::get('/berita/{id}', [BeritaController::class, 'detail']);

Route::get('/profil', [ProfilController::class, 'index']);

Route::get('/kelulusan', [KelulusanController::class, 'index']);
Route::post('/kelulusan/cetak', [KelulusanController::class, 'cetak']);

Route::get('/kesiswaan', [KesiswaanController::class, 'index']);

Route::get('/aspirasi', [AspirasiController::class, 'index']);
Route::post('/aspirasi', [AspirasiController::class, 'simpan']);

Route::get('/peserta-didik', [PesertaDidikController::class, 'index']);
Route::post('/peserta-didik', [PesertaDidikController::class, 'index']);

Route::get('/admin', [AdminController::class, 'index']);