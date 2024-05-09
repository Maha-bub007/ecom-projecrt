<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\Facades\View;
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
        View::composer('*',function($cart){
            $cart->with('cartcount',Cart::where('ip_address',request()->ip())->count());
            $cart->with('cartshow',Cart::where('ip_address',request()->ip())->get());
        });
    }
}
