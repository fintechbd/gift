<?php

namespace Fintech\Gift;

use Illuminate\Support\ServiceProvider;
use Fintech\Gift\Commands\InstallCommand;
use Fintech\Gift\Commands\GiftCommand;

class GiftServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/gift.php', 'fintech.gift'
        );

        $this->app->register(RouteServiceProvider::class);
        $this->app->register(RepositoryServiceProvider::class);
    }

    /**
     * Bootstrap any package services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/gift.php' => config_path('fintech/gift.php'),
        ]);

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->loadTranslationsFrom(__DIR__.'/../lang', 'gift');

        $this->publishes([
            __DIR__.'/../lang' => $this->app->langPath('vendor/gift'),
        ]);

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'gift');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/gift'),
        ]);

        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
                GiftCommand::class,
            ]);
        }
    }
}
