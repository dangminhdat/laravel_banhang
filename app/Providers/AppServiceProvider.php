<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ProductType;
use Session;
use App\Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer("layouts.header",function($view){
            $loaisp = ProductType::all();
            $view->with("loaisp",$loaisp);
        });

        view()->composer(["layouts.header","pages.dathang"],function($view){
            if(Session::has('cart'))
            {
                $oldcart = Session::get('cart');
                $cart = new Cart($oldcart);
                $view->with(['cart'=>$cart,"product_cart"=>$cart->items,"totalPrice"=>$cart->totalPrice,"totalQty"=>$cart->totalQty]);
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
