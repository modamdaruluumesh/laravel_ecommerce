<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RemovePortFromUrl
{
    public function handle(Request $request, Closure $next)
    {
        // Forcefully override the host without the port
        $host = preg_replace('/:\d+$/', '', $request->getHttpHost());

        $request->headers->set('Host', $host);

        // Also tell Laravel the root URL
        app('url')->forceRootUrl(config('app.url'));

        if (str_starts_with(config('app.url'), 'https://')) {
            app('url')->forceScheme('https');
        }

        return $next($request);
    }
}
