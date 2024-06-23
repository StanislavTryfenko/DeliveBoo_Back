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
                    'merchantId' => '5bsr2b6jbnbyj5t5',
                    'publicKey' => '5wjv934kw4zk65yq',
                    'privateKey' => '728618d36d9fe5ac18d7133bb3845e43'
                ]
            );
        });

       
    }
}
