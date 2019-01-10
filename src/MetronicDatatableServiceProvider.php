<?php

namespace ThaiLe\MetronicDatatable;

use Illuminate\Support\ServiceProvider;

class MetronicDatatableServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__ . '/../resources/views' => resource_path('views/vendor/metronic-datatable')], 'views');
            $this->publishes([__DIR__ . '/config.php' => config_path('metronic-datatable.php')], 'config');
            $this->publishes([__DIR__ . '/../public' => public_path('admin/metronic-datatable')], 'public');
        }

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'metronic-datatable');
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'metronic-datatable');
        $this->mergeConfigFrom(__DIR__ . '/config.php', 'metronic-datatable');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
