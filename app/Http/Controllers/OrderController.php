<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Product;
use App\Models\ProductInfo;
use App\Models\Promocode;
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
     * Show the admin form for manually creating an order (e.g. Instagram orders).
     */
    public function create()
    {
        $productInfos = ProductInfo::with('product', 'size')
            ->where('quantity', '>', 0)
            ->get()
            ->filter(fn($pi) => $pi->product)   // skip orphaned rows
            ->values();

        return view('order.create', compact('productInfos'));
    }

    /**
     * Persist a manually-created (admin) order.
     */
    public function adminStore(Request $request)
    {
        $data = $request->validate([
            'full_name' => ['required', 'max:255'],
            'phone_nb' => ['required', 'numeric'],
            'district' => ['required', 'max:255'],
            'city' => ['required', 'max:255'],
            'address' => ['required', 'max:255'],
            'address_description' => ['nullable', 'max:255'],
            'promocode' => ['nullable', 'string'],
            'product_info_id' => ['required', 'array', 'min:1'],
            'product_info_id.*' => ['required', 'exists:product_infos,id'],
            'quantity' => ['required', 'array'],
            'quantity.*' => ['required', 'integer', 'min:1'],
        ]);

        // Build the line items and check stock.
        $lines = [];
        $subtotal = 0;
        $errors = [];
        foreach ($data['product_info_id'] as $idx => $piId) {
            $qty = (int) ($data['quantity'][$idx] ?? 0);
            $pi = ProductInfo::with('product', 'size')->find($piId);

            if (!$pi || !$pi->product) {
                $errors[] = 'One of the selected products no longer exists.';
                continue;
            }
            if ($qty > $pi->quantity) {
                $errors[] = 'Not enough stock for "' . $pi->product->title . ' - ' . optional($pi->size)->title . '". Only ' . $pi->quantity . ' available.';
                continue;
            }

            $unit = $pi->product->price - $pi->product->price * ($pi->product->discount ?? 0) / 100;
            $lineTotal = $unit * $qty;
            $subtotal += $lineTotal;

            $lines[] = [
                'info' => $pi,
                'product_id' => $pi->product->id,
                'size_id' => $pi->size_id,
                'quantity' => $qty,
                'total_amount' => $lineTotal,
            ];
        }

        if (!empty($errors)) {
            return back()->withErrors($errors)->withInput();
        }

        // Apply an optional promocode (same rules as the storefront).
        $total = $subtotal;
        $appliedPromo = null;
        if (!empty($data['promocode'])) {
            $promo = Promocode::where('status', 1)->where('title', $data['promocode'])->first();
            if (!$promo) {
                return back()->withErrors(['promocode' => 'Promocode not found or inactive.'])->withInput();
            }
            if ($promo->value > 0) {
                $total = max(0, $subtotal - $promo->value);
            } elseif ($promo->percentage > 0) {
                $total = $subtotal - $subtotal * $promo->percentage / 100;
            }
            $appliedPromo = $promo->title;
        }

        $order = Order::create([
            'full_name' => $data['full_name'],
            'phone_nb' => $data['phone_nb'],
            'district' => $data['district'],
            'city' => $data['city'],
            'address' => $data['address'],
            'address_description' => $data['address_description'] ?? '',
            'total_amount' => round($total, 2),
            'status' => 'in-progress',
            'promocode' => $appliedPromo,
        ]);

        foreach ($lines as $line) {
            $order->orderdetails()->create([
                'product_id' => $line['product_id'],
                'size_id' => $line['size_id'],
                'quantity' => $line['quantity'],
                'total_amount' => round($line['total_amount'], 2),
            ]);

            $line['info']->update([
                'quantity' => $line['info']->quantity - $line['quantity'],
            ]);
        }

        return redirect(route('order.index'))->with('success', 'Order for "' . $order->full_name . '" was created.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $r = $request->validate([
            'full_name' => ['required', 'max:255'],
            'phone_nb' => ['required', 'numeric'],
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

        return back()->with('success', 'Thank you for your order! We have received it and you will receive your order soon.');
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
