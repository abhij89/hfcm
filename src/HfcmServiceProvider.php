<?php

namespace Abhij89\Hfcm;

use Illuminate\Support\ServiceProvider;

class HfcmServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'hfcm');

        $this->app['router']->namespace('Abhij89\\Hfcm\\Controllers')
            ->middleware(['web'])
            ->group(function () {
                $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
            });

        if ($this->app->runningInConsole()) {
            $this->publishResources();
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/hfcm.php', 'hfcm');

        $this->app->bind('hfcm', function () {
            return new Hfcm();
        });
    }

    protected function publishResources()
    {
        $this->publishes([
            __DIR__ . '/../config/hfcm.php' => config_path('hfcm.php'),
        ], 'hfcm.config');

        $this->publishes([
            __DIR__ . '/../database/migrations/create_hfcm_table.php' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_hfcm_table.php'),
        ], 'hfcm.migrations');

        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/'),
        ], 'hfcm.views');
    }
}
