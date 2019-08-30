<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Cart;
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
        view()->composer('*', function ($view) 
        {
            $carheadercount =  Cart::getContent()->count();
            // dd($carheadercount);
            //...with this variable
            $view->with('carheadercount', $carheadercount );  
            
            $cartsum = Cart::getTotal();
           $view->with('cartsum', $cartsum);
        });
    }

  
}
