<?php

namespace App\Http\Middleware;

use Closure;

class CorsMiddleware
{
    public function handle($request, Closure $next)
    {
        // Не устанавливаем заголовки CORS временно
        $response = $next($request);

        return $response;
    }
}
