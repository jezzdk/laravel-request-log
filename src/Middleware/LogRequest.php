<?php

namespace Jezzdk\LaravelRequestLog\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Jezzdk\LaravelRequestLog\Jobs\LogRequest as LogRequestJob;

class LogRequest
{
    public function handle(Request $request, Closure $next)
    {
        if (config('request-log.enabled') !== true) {
            return $next($request);
        }

        /** @var $response Response */
        $response = $next($request);

        dispatch(new LogRequestJob([
            'method' => $request->method(),
            'url' => $request->path(),
            'duration' => (microtime(true) - LARAVEL_START) * 1000,
            'status_code' => $response->status(),
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'referer' => null,
            'content_length' => strlen($request->getContent()),
            'created_at' => now(),
            'updated_at' => now(),
        ]));

        return $response;
    }
}
