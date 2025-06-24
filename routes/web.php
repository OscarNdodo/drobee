<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;

Route::view("/", 'welcome')->name("welcome");
Route::get('/start', [FileController::class, 'create'])->name('home');
Route::post('/files', [FileController::class, 'store'])->name('files.store');
Route::get('/files/{token}', [FileController::class, 'show'])->name('files.show');
Route::get('/files/download/{token}', [FileController::class, 'download'])->name('files.download');
Route::get('/file/{token}/download', [FileController::class, 'downloadFile'])->name('download');