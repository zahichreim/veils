<?php

namespace App\Http\Controllers;

use App\Models\ProductInfo;
use App\Http\Requests\StoreProductInfoRequest;
use App\Http\Requests\UpdateProductInfoRequest;
use App\Models\Size;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductInfoController extends Controller
{
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
    public function create(Product $product)
    {
        $s = Size::all();
        return view('productinfo.create', ['sizes' => $s, 'product' => $product]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Product $product)
    {
        $product_info = $request->validate([

            'quantity' => ['required', 'numeric'],
            'size_id' => ['required', 'exists:sizes,id']


        ]);

        $exists = $product->productinfo()->where('size_id', $product_info['size_id'])->exists();
        if ($exists) {
            return back()->withErrors(['size_id' => 'This size already exists for this product']);
        }

        $product->productinfo()->create($product_info);
        return redirect(route('product.show', $product->id))->with('success', 'Your info was CREATED');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductInfo $productInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product, ProductInfo $info)
    {
        $s = Size::all();

        return view('productinfo.edit', ['info' => $info, 'sizes' => $s, 'product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product, ProductInfo $info)
    {
        $product_info = $request->validate([

            'quantity' => ['required', 'numeric'],
            'size_id' => ['required', 'exists:sizes,id']


        ]);

        $exists = $product->productinfo()->where('size_id', $product_info['size_id'])->exists();


        if ($exists && $product_info['size_id'] != $info->size->id) {
            return back()->withErrors(['size_id' => 'This size already exists for this product']);
        }

        $info->update($product_info);

        return redirect(route('product.show', $product->id))->with('success', 'Your product information was UPDATED');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, ProductInfo $info)
    {

        $info->delete();

        return redirect(route('product.show', $product->id))->with('delete', 'productinfo "' . $info->size->title . '" Was DELETED!!!');
    }
}
