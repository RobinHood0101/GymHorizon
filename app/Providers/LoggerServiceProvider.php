<?php

namespace App\Providers;

use App\Services\Logger;
use Illuminate\Support\ServiceProvider;

class LoggerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(Logger::class, function () {
            return new Logger();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

    }
}
