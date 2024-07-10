<?php

namespace BadWordFilter;

use Illuminate\Support\ServiceProvider;

class BadWordFilterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Merge the package configuration file with the application's copy.
        $this->mergeConfigFrom(
            __DIR__ . '/../config/badwordfilter.php', 'badwordfilter'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish the configuration file.
        $this->publishes([
            __DIR__ . '/../config/badwordfilter.php' => config_path('badwordfilter.php'),
        ]);

        $this->app['router']->aliasMiddleware('badwordfilter', \BadWordFilter\Http\Middleware\BadWordFilter::class);
    }
}
