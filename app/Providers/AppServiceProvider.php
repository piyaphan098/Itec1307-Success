<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Braintree_Configuration::environment(env('BT_ENVIRONMENT'));
        \Braintree_Configuration::merchantId(env('BT_MERCHANT_ID'));
        \Braintree_Configuration::publicKey(env('BT_PUBLIC_KEY'));
        \Braintree_Configuration::privateKey(env('BT_PRIVATE_KEY'));

    }
}
