<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class SegundoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Log::debug('Passei pelo segundo middleware ANTES');

        $response = $next($request);

        Log::debug('Passei pelo segundo middleware DEPOIS');

        return $response;
    }
}
