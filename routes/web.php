<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('{id}/edit', [PostController::class, 'edit'])->name('edit');
Route::get('show/{id}', [PostController::class, 'show'])->name('show');
Route::post('{id}', [PostController::class, 'update'])->name('update');
Route::delete('{id}', [PostController::class, 'destroy'])->name('destroy');
Route::resource('/', PostController::class);
