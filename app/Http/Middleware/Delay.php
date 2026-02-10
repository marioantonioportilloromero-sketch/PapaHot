<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class Delay
{

    private int $delayms = 100;

    public function handle(Request $request, Closure $next): Response
    {
        $key = 'game_request_lock';

        while (Cache::has($key)) {
            usleep(10000);
        }

        Cache::put($key, true, 2);

        usleep($this->delayms * 1000);

        $response = $next($request);

        Cache::forget($key);

        return $response;
    }
}
