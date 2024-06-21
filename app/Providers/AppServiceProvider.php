<?php

namespace App\Providers;
use Braintree\Gateway;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->singleton(Gateway::class, function ($app) {
            return new Gateway(
                [
                    'environment' => 'sandbox',
                    'merchantId' => 'bwnn9kyq5hwt8cct',
                    'publicKey' => '9t3kgbk9mqtw6d2t',
                    'privateKey' => '816f66eb13cb9c6dc4b13cde07a282f1'
                ]
            );
        });

       
    }
}
