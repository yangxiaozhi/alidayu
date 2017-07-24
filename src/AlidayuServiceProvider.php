<?php

namespace Lelite\Alidayu;

use Illuminate\Support\ServiceProvider;
use Lelite\Alidayu\Contracts\Sms as SmsContract;

class AlidayuServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
              __DIR__ . '/resources/config/alidayu.php' => config_path('/alidayu.php')
            ], 'alidayu');
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(SmsContract::class, function () {
            return new Sms;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [SmsContract::class];
    }
}
