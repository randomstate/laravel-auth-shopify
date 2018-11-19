<?php


namespace RandomState\LaravelAuth\Strategies\Shopify;


use Illuminate\Support\ServiceProvider;

class ShopifyStrategyServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'laravel-auth-shopify');

        $this->publishes([
            __DIR__.'/views' => resource_path('views/vendor/laravel-auth-shopify'),
        ]);
    }
}