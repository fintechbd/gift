<?php

namespace Fintech\Gift;

use Fintech\Core\Traits\Packages\RegisterPackageTrait;
use Fintech\Gift\Commands\InstallCommand;
use Fintech\Gift\Providers\RepositoryServiceProvider;
use Illuminate\Support\ServiceProvider;

class GiftServiceProvider extends ServiceProvider
{
    use RegisterPackageTrait;

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->packageCode = 'gift';

        $this->mergeConfigFrom(
            __DIR__.'/../config/gift.php', 'fintech.gift'
        );

        $this->app->register(RepositoryServiceProvider::class);
    }

    /**
     * Bootstrap any package services.
     */
    public function boot(): void
    {
        $this->injectOnConfig();

        $this->publishes([
            __DIR__.'/../config/gift.php' => config_path('fintech/gift.php'),
        ]);

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->loadTranslationsFrom(__DIR__.'/../lang', 'gift');

        $this->publishes([
            __DIR__.'/../lang' => $this->app->langPath('vendor/gift'),
        ]);

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'gift');

        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/gift'),
        ]);

        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }
    }
}
