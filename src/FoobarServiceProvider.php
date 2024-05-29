<?php

declare(strict_types=1);

namespace Ilyes512\Foobar;

use Illuminate\Support\ServiceProvider;

class FoobarServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/foobar.php', 'foobar');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            return;
        }

        $this->publishes([
            __DIR__ . '/../config/foobar.php' => $this->app->configPath('foobar.php'),
        ], 'foobar-config');
    }
}
