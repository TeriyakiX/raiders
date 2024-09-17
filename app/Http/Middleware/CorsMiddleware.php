<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CorsMiddleware
{
    public function handle($request, Closure $next)
    {
        // Обработка preflight запроса (OPTIONS)
        if ($request->getMethod() === "OPTIONS") {
            $response = response('', 200);
            $response->header('Access-Control-Allow-Origin', 'https://raiders-front.ru');
            $response->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE');
            $response->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
            $response->header('Access-Control-Allow-Credentials', 'true');
            return $response;
        }

        // Обработка остальных запросов
        $response = $next($request);
        $response->header('Access-Control-Allow-Origin', 'https://raiders-front.ru');
        $response->header('Access-Control-Allow-Credentials', 'true');

        return $response;
    }
}
