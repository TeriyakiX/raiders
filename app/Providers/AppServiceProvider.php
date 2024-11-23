<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * @OA\Info(
 *     title="Название твоего API",
 *     version="1.0.0",
 *     description="Описание твоего API. Здесь можно указать общую информацию.",
 *     @OA\Contact(
 *         email="support@yourdomain.com"
 *     )
 * )
 *
 * @OA\Server(
 *     url="http://127.0.0.1:8000/api",
 *     description="Основной сервер API"
 * )
 */

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        //
    }
}
