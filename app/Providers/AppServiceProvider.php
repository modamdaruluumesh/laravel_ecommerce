<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (env('CODESPACES') && env('CODESPACE_NAME') && env('GITHUB_CODESPACES_PORT_FORWARDING_DOMAIN')) {
            $codespaceUrl = 'https://' . env('CODESPACE_NAME') . '-8000.' . env('GITHUB_CODESPACES_PORT_FORWARDING_DOMAIN');
            URL::forceRootUrl($codespaceUrl);
            URL::forceScheme('https');
        }
    }
}
