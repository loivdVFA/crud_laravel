<?php

use App\Http\Controllers\PostController;
use App\Http\Middleware\First;
use App\Http\Middleware\TerminatingMiddleware;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('{id}/edit', [PostController::class, 'edit'])->name('edit');
Route::get('show/{id}', [PostController::class, 'show'])->name('show');
Route::post('{id}', [PostController::class, 'update'])->name('update');
Route::delete('{db}', [PostController::class, 'destroy'])->name('destroy');
Route::get('trashed',[PostController::class,'trashed'])->name('trashed');
Route::resource('/', PostController::class);
Route::get('/',[PostController::class,'index'])->name('index');
Route::get('comp',function(){
    $posts = Post::all();
    return View('comp',compact(['posts']));
});
Route::get('get-session',function(Request $request){
    $session = $request->session()->get('_token');
    dd($session);
});

Route::get('send-mail', function () {
    Mail::raw('hello test mail', function($message){
        $message->to('loivd001@gmail.com')->subject('Test mail');
    });
    dd('success');
});

// Route::middleware([CheckCountry::class])->group(function () {
//     Route::get('/',[PostController::class,'index'])->withoutMiddleware([CheckCountry::class]);
// });
// Route::middleware(['abc'])->group(function () {
//     Route::get('/',[PostController::class,'index']);
// });