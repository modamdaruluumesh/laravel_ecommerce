<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Config;

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
        $codespaceUrl = 'https://fictional-train-x5qv4x654jr4f679-8000.app.github.dev';
        Config::set('app.url', $codespaceUrl);
        URL::forceRootUrl($codespaceUrl);

        // Force HTTPS
        URL::forceScheme('https');
    }
}
