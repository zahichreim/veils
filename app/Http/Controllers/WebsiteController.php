<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Faqs;
use App\Models\Order;
use App\Models\Product;
use App\Models\Settings;
use App\Models\Slider;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class WebsiteController extends Controller
{
    public function index()
    {
        $cart = json_decode(Cookie::get('shopping_cart', '[]'));
        $sliders = Slider::all();
        $products = Product::where('is_featured', 'like', 1)->with('productinfo')->with('images')->get();
        return view('pacex.index', ['sliders' => $sliders, 'products' => $products, 'cart' => $cart]);
    }

    public function productDetails($id)
    {

        $product = Product::find($id);

        return view('pacex.product_details', ['product' => $product]);
    }

    // public function products(Request $request)
    // {
    //     $perPage = 4;
    //     $loadedCount = $request->input('loaded_count', 0);

    //     $query = $request->input('search');
    //     if ($query) {
    //         $products = Product::where('title', 'LIKE', "%$query%")
    //             ->orWhere('description', 'LIKE', "%$query%")
    //             ->take($loadedCount + $perPage)->get();
    //     } else {
    //         $products = product::orderBy('created_at', 'desc')->take($loadedCount + $perPage)->get();
    //     }
    //     $newLoadedCount = $loadedCount + $perPage;

    //     return view('pacex.products', [
    //         'products' => $products,
    //         'newLoadedCount' => $newLoadedCount,
    //         'perPage' => $perPage,

    //     ]);
    // }


    public function category($title)
    {

        $category = Category::where('title', $title)->with('subcategories')->get();


        return view('pacex.category', ['category' => $category]);
    }

    public function subCategory($categoryTitle, $subCategoryTitle)
    {

        $category = Category::where('title', $categoryTitle)->with('subcategories')->get();
        return view('pacex.category', ['category' => $category, 'subCategoryTitle' => $subCategoryTitle]);
    }

    public function aboutus()
    {

        $setting = Settings::where('key', 'aboutus')->first();
        return view('pacex.about-us', ['setting' => $setting]);
    }
    public function contactus()
    {
        $setting = Settings::where('key', 'contactus')->first();
        return view('pacex.contact-us', ['setting' => $setting]);
    }
    public function FAQs()
    {

        $faqs = Faqs::all();
        return view('pacex.FAQs', ['faqs' => $faqs]);
    }
    public function trackorder()
    {
        $setting = Settings::where('key', 'contactus')->first();
        return view('pacex.track-order', ['setting' => $setting]);
    }
    public function orderstatus(Request $request)
    {
        $request->validate([
            'order_nb' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    $prefix = 'pacex-';
                    if (!str_starts_with($value, $prefix)) {
                        $fail("The Order Number must start with '{$prefix}'.");
                    }
                },
            ],
        ]);

        $setting = Settings::where('key', 'contactus')->first();
        $order = Order::where('id', Str::after($request->input('order_nb'), 'pacex-'))->get();
        if ($order->isEmpty()) {
            return view('pacex.track-order', ['error' => 'ORDER NOT FOUND', 'setting' => $setting]);
        } else {
            return view('pacex.track-order', ['order_status' => $order[0]->status, 'setting' => $setting]);
        }
    }
}
