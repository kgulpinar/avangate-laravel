<?php
namespace Avangate\AvangatePayLaravel;

use Illuminate\Support\ServiceProvider;

class AvangatePayServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->publishes([
            __DIR__ . '/../config/config.php' => config_path('avangatepay.php')
        ]);
    }
    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
      
        $this->mergeConfigFrom(
            __DIR__ . '/../config/config.php', 'avangate'
        );
      
        $this->app->bind('avangate-laravel', function () {
            return new AvangatePayLaravel();
        });
    }
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['avangate-laravel'];
    }
}