<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use PulkitJalan\Google\Client as GoogleClient;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton('google', function () {
            $config = config('google'); // Carga la configuración desde config/google.php
            return new GoogleClient($config);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->circular()
                ->locales(['es', 'en'])
                ->displayLocale('es'); 
        });
    }
}
