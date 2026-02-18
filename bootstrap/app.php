<?php

use App\Http\Middleware\DelayRequest;
use App\Http\Middleware\VerificarIPs;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
        'verificar.ip' => VerificarIPs::class,

        'delay.game' => DelayRequest::class,
            ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
<<<<<<< HEAD
    })->create();
=======
    })->create();
>>>>>>> bafffe825d326e44ec8a0f02b2d3f28b15529d20
