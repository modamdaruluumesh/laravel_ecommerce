<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Get APP_URL from .env
        $appUrl = config('app.url');

        if ($appUrl) {
            // Remove any trailing slash just in case
            $appUrl = rtrim($appUrl, '/');

            // Force Laravel to use this as the root URL
            URL::forceRootUrl($appUrl);

            // If it’s https, make sure scheme is forced
            if (str_starts_with($appUrl, 'https://')) {
                URL::forceScheme('https');
            }
        }
    }
}
