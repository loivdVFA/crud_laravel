<?php

use App\Http\Middleware\CheckCountry;
use App\Http\Middleware\First;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
        //$middleware->append(First::class);
        // $middleware->use([
        //     CheckCountry::class
        // ]);
        // $middleware->appendToGroup('group_middleware', [First::class]);
        // $middleware->appendToGroup('abc', [
        //     First::class,
        // ]);
        // dd($middleware);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
