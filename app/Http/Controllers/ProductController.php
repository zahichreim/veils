<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\ProductInfo;
use App\Models\Size;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = 5;

        if ($request->ajax()) {
            $products = Product::with('subcategory')->orderBy('created_at', 'desc')->paginate($perPage);
            $pagination = $products->links('pagination::bootstrap-5')->render();

            return response()->json([
                'data' => $products->items(),
                'pagination' => $pagination,
                'total' => $products->total(),
            ]);
        }

        $products = Product::orderBy('created_at', 'desc')->with('subcategory')->paginate($perPage);
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $sc = SubCategory::all();
        return view('product.create', ['subcategories' => $sc]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $r = $request->validate([
            'title' => ['required', 'max:255'],
            'description' => ['required'],
            'color' => ['required'],
            'price' => ['required', 'numeric'],
            'discount' => ['required', 'numeric', 'max:100'],
            'sub_category_id' => ['required', 'exists:sub_categories,id'],
            'is_featured' => [],
            'main_image' => ['required', 'file', 'max:3000', 'mimes:png,jpg,webp'],
            'additional_information' => ['required'],
        ]);

        $path1 = null;
        if ($request->hasFile('main_image')) {

            $path1 = Storage::disk('public')->put('products_main_images', $request->main_image);
        }

        unset($r['main_image']);

        $product = Product::create(['main_image' => $path1] + $r);

        $uploadedImages = json_decode($request->uploaded_images, true);
        if (is_array($uploadedImages)) {
            foreach ($uploadedImages as $image) {

                $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $image));

                $imageName = time() . '_' . uniqid() . '.png'; // Use the correct extension based on the image type

                // Save the image to storage
                $path = 'products_images/' . $imageName;
                Storage::disk('public')->put($path, $imageData);

                $product->images()->create(['path' => $path]);
            }
        }


        return redirect(route('product.index'))->with('success', 'Your product was CREATED');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $sc = SubCategory::all();
        $product = Product::with('images')->findOrFail($product->id);


        foreach ($product->images as $image) {
            $path = public_path('storage/' . $image->path);
            $image->path = base64_encode(file_get_contents($path));
            $image->path = 'data:image/png;base64,' . $image->path;
        }

        return view('product.edit', ['product' => $product, 'subcategories' => $sc]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $r = $request->validate([
            'title' => ['required', 'max:255'],
            'description' => ['required'],
            'color' => ['required'],
            'price' => ['required', 'numeric'],
            'discount' => ['required', 'numeric', 'max:100'],
            'sub_category_id' => ['required', 'exists:sub_categories,id'],
            'is_featured' => [],
            'main_image' => ['file', 'max:3000', 'mimes:png,jpg,webp'],
            'additional_information' => ['required'],



        ]);

        $path1 = $product->main_image;
        if ($request->hasFile('main_image')) {

            Storage::disk('public')->delete($product->main_image);
            $path1 = Storage::disk('public')->put('products_main_images', $request->main_image);
        }

        foreach ($product->images as $i) {
            Storage::disk('public')->delete($i->path);
            $i->delete();
        }



        $uploadedImages = json_decode($request->uploaded_images, true);
        if (is_array($uploadedImages)) {
            foreach ($uploadedImages as $image) {

                $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $image));

                $imageName = time() . '_' . uniqid() . '.png'; // Use the correct extension based on the image type

                // Save the image to storage
                $path = 'products_images/' . $imageName;
                Storage::disk('public')->put($path, $imageData);

                $product->images()->create(['path' => $path]);
            }
        }

        unset($r['main_image']);

        $product->update(['main_image' => $path1] + $r);





        return redirect(route('product.index'))->with('success', 'Your product was UPDATED');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {

        foreach ($product->images as $i) {
            Storage::disk('public')->delete($i->path);
            $i->delete();
        }
        if ($product->main_image) {
            Storage::disk('public')->delete($product->main_image);
        }

        foreach ($product->productinfo as $info) {
            $info->delete();
        }

        $product->delete();

        return redirect(route('product.index'))->with('delete', 'product "' . $product->title . '" Was DELETED!!!');
    }

    public function search(Request $request)
    {
        $query = $request->get('query', '');
        $perPage = 5; // Number of results per page, adjust as needed

        $products = Product::where('title', 'like', '%' . $query . '%')->orWhere('description', 'like', '%' . $query . '%')->with('subcategory')
            ->paginate($perPage)
            ->appends(['query' => $query]); // Preserve the query string

        // Prepare pagination links
        $pagination = $products->links('pagination::bootstrap-5')->render();

        return response()->json([
            'data' => $products->items(),
            'pagination' => $pagination,
            'total' => $products->total(),
        ]);
    }
}
