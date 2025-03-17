<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Services\Transistor;
use App\Services\PodcastParser;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Log;

class TerminatingMiddleware
{   
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        Log::info('Request received: ' . $request->url());
        return $next($request);
    }
    public function terminate(Request $request, $response)
    {
        // Logic sau khi phản hồi đã được gửi đến client
        Log::info('Request received ngu nhu bo: ' . $request->url());
    }
}
