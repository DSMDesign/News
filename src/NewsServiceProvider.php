<?php

namespace Southcoastweb\News;

use Illuminate\Support\ServiceProvider;

class NewsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/Views', 'News');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // require __DIR__.'/routes/web.php';
        $this->app->make('Southcoastweb\News\Controllers\NewsController');
    }
}
