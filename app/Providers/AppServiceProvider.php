<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Settings;
use Illuminate\Support\Facades\Cookie;
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
        // Share a variable with all views
        $logo = Settings::where('key', 'logo')->first();
        if($logo) {
            $logo = $logo->image;
        }
        $categories = Category::all();
        $get_in_touch = Settings::where('key', 'get_in_touch')->first();
        $join_us = Settings::where('key', 'join_us')->first();
        View::composer('*', function ($view) {
            $cart = json_decode(Cookie::get('shopping_cart', '[]'));
            $view->with('cart', $cart);
        });

        View::share('categories', $categories);
        View::share('logo', $logo);
        View::share('get_in_touch', $get_in_touch);
        View::share('join_us', $join_us);
    }
}
