<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class TerceiroMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $nome, $idade)
    {
        Log::debug("Parâmetro é {$nome} e idade é {$idade}");
        return $next($request);
    }
}
