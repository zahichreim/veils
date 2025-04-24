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
        $logo = Settings::where('key', 'logo')->first()->image;
        $categories = Category::all();

        View::composer('*', function ($view) {
            $cart = json_decode(Cookie::get('shopping_cart', '[]'));
            $view->with('cart', $cart);
        });

        View::share('categories', $categories);
        View::share('logo', $logo);
    }
}
