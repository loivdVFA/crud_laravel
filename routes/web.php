<?php

use App\Http\Controllers\PostController;
use App\Http\Middleware\CheckCountry;
use App\Http\Middleware\First;
use App\Http\Middleware\TerminatingMiddleware;
use Illuminate\Support\Facades\Route;

use function Pest\Laravel\get;

Route::get('{id}/edit', [PostController::class, 'edit'])->name('edit');
Route::get('show/{id}', [PostController::class, 'show'])->name('show');
Route::post('{id}', [PostController::class, 'update'])->name('update');
Route::delete('{db}', [PostController::class, 'destroy'])->name('destroy');
Route::get('trashed',[PostController::class,'trashed'])->name('trashed');
Route::resource('/', PostController::class);
Route::get('/',[PostController::class,'index'])->middleware([First::class, TerminatingMiddleware::class]);

// Route::middleware([CheckCountry::class])->group(function () {
//     Route::get('/',[PostController::class,'index'])->withoutMiddleware([CheckCountry::class]);
// });
// Route::middleware(['abc'])->group(function () {
//     Route::get('/',[PostController::class,'index']);
// });