<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\Promocode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{

    public function addToCart(Request $request)
    {
        $item = [
            'id' => $request->input('id'),
            'size' => $request->input('size'),
            'sizeId' => $request->input('sizeId'),
            'quantity' => $request->input('num-product'),
            'title' => $request->input('product'),
            'image' => $request->input('imagepath'),
            'price' => $request->input('price'),
        ];

        $cart = json_decode(Cookie::get('shopping_cart', '[]'), true);

        $found = false;
        foreach ($cart as &$i) {
            if ($i['id'] == $item['id'] && $i['size'] == $item['size']) {
                $i['quantity'] += $item['quantity']; // Update quantity
                $found = true;
                break;
            }
        }


        if (!$found) {
            $cart[] = $item;
        }
        $cookie = Cookie::make('shopping_cart', json_encode($cart), 60 * 24); // 1 day

        return response()->json(['message' => 'Item added to cart', 'cart' => $cart])->cookie($cookie);
    }

    public function getCart(Request $request)
    {

        $cart = json_decode(Cookie::get('shopping_cart', '[]'));

        return view('pacex.shoping-cart', ['cart' => $cart]);
        // $cart = json_decode(Cookie::get('shopping_cart', '[]'), true);
        // return response()->json($cart);
    }
    public function deleteFromCart(Request $request)
    {


        $itemId = $request->input('id');
        $cart = json_decode($request->cookie('shopping_cart', '[]'), true);

        foreach ($cart as $key => $item) {

            if ($item['id'] . $item['sizeId'] == $itemId) {

                unset($cart[$key]);

                break;
            }
        }

        $cart = array_values($cart); // Re-index the array

        return back()->cookie('shopping_cart', json_encode($cart), 60);
    }

    public function promocode(Request $request)
    {
        $request->validate(
            [
                'promocode' => 'required|string',
            ],
            [

                'promocode.required' => 'You did not enter a promocode',

            ]
        );
        $promocodes = Promocode::all();
        $code = $request->input('promocode');
        $promo = $promocodes->where('status', 1)->where('title', $code)->first();
        if ($promo) {
            // Promocode exists, return it as a response
            return response()->json([
                'success' => true,
                'promocode' => $promo->title,
                'value' => $promo->value,
                'percentage' => $promo->percentage
            ]);
        } else {
            // Promocode doesn't exist, return an error response
            return response()->json([
                'success' => false,
                'error' => 'Promocode not found.'
            ], 404);
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCartRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
