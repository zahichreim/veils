<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Product;
use App\Models\ProductInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::orderBy('phone_nb', 'asc')->paginate(5);
        return view('order.index', compact('orders'));
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
    public function store(Request $request)
    {

        $r = $request->validate([
            'first_name' => ['required', 'max:255'],
            'last_name' => ['required', 'max:255'],
            'phone_nb' => ['required', 'numeric'],
            'phone_nb2' => ['required', 'numeric'],
            'email' => ['required', 'max:255', 'email'],
            'province' => ['required'],
            'district' => ['required'],
            'city' => ['required', 'max:255'],
            'address' => ['required', 'max:255'],
            'address_description' => ['required'],
            'total_amount' => [],
            'promocode' => [],


        ]);

        $cart = json_decode(Cookie::get('shopping_cart', '[]'));
        $productsInfo = collect([]);
        $lowQunatityProducts = [];
        $errorArray = [];
        $i = 0;
        foreach ($cart as $c) {
            $productsInfo->push(ProductInfo::where('product_id', $c->id)->where('size_id', $c->sizeId)->get());
            $lowQunatityProducts[] = ProductInfo::where('product_id', $c->id)->where('size_id', $c->sizeId)->get()[0];
            if ($c->quantity > ProductInfo::where('product_id', $c->id)->where('size_id', $c->sizeId)->get()[0]['quantity']) {

                $errorArray[] = ['Not Enough Stock Quantity For "' . $c->title . ' - ' . $c->size . '" Only ' . $lowQunatityProducts[$i]['quantity'] . ' Available'];
            }
            $i++;
        }

        if (!empty($errorArray)) {
            return back()->with('a', $errorArray)->withInput();
        }

        $i = 0;

        $order = Order::create($r);
        foreach ($cart as $c) {
            $order->orderdetails()->create([
                'product_id' => $c->id,
                'size_id' => $c->sizeId,
                'quantity' => $c->quantity,
                'total_amount' => $c->quantity * $c->price
            ]);
        }

        foreach ($productsInfo as $info) {


            $info[0]->update([
                'quantity' => $info[0]->quantity - $cart[$i++]->quantity
            ]);
        }
        Cookie::queue(Cookie::forget('shopping_cart'));

        return back()->with('success', 'Your order was Placed');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('order.show', ['order' => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $r = $request->validate([
            'status' => ['required']
        ]);
        $o = $order->status;
        $order->update($r);

        return back()->with('success', 'Order "' . $order->id . '"  Status Was Updated from "' . $o . '" to "' . $order->status . '"');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        foreach ($order->orderdetails as $details) {
            $details->delete();
        }
        $order->delete();

        return redirect(route('order.index'))->with('delete', 'Order "' . $order->id . '" Was DELETED!!!');
    }
}
