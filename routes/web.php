<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;

Route::get('/', [FileController::class, 'create'])->name('home');
Route::post('/files', [FileController::class, 'store'])->name('files.store');
Route::get('/files/{token}', [FileController::class, 'show'])->name('files.show');
Route::get('/files/{token}/download', [FileController::class, 'download'])->name('files.download');