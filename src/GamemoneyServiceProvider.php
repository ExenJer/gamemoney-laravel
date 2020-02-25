<?php


namespace ExenJer\GamemoneyLaravel;


use ExenJer\GamemoneyLaravel\Signature\Contracts\SignatureFactory;
use ExenJer\GamemoneyLaravel\Signature\Signature;
use Illuminate\Support\ServiceProvider;

final class GamemoneyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/gamemoney.php' => config_path('gamemoney.php')
        ], 'config');
    }

    /**
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/gamemoney.php',
            'gamemoney'
        );

        $this->registerDependencies();
    }

    /**
     * @return void
     */
    private function registerDependencies(): void
    {
        $this->app->singleton(SignatureFactory::class, Signature::class);
    }
}
