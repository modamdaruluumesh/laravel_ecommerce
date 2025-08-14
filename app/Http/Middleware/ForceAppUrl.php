<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\URL;

class ForceAppUrl
{
    public function handle($request, Closure $next)
    {
        $appUrl = rtrim(config('app.url'), '/');

        if ($appUrl) {
            URL::forceRootUrl($appUrl);

            if (str_starts_with($appUrl, 'https://')) {
                URL::forceScheme('https');
            }
        }

        return $next($request);
    }
}
