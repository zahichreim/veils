<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // CategoryController.php

    public function index(Request $request)
    {
        $perPage = 5;

        if ($request->ajax()) {
            $categories = Category::orderBy('created_at', 'desc')->paginate($perPage);

            $pagination = $categories->links('pagination::bootstrap-5')->render();

            return response()->json([
                'data' => $categories->items(),
                'pagination' => $pagination,
                'total' => $categories->total(),
            ]);
        }

        $categories = Category::orderBy('created_at', 'desc')->paginate($perPage);
        return view('category.index', compact('categories'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => ['required', 'max:255'],
            'sub_title' => ['required', 'max:255'],
            'image' => ['required', 'file', 'max:3000', 'mimes:png,jpg,webp']
        ]);

        $path = null;
        if ($request->hasFile('image')) {

            $path = Storage::disk('public')->put('categories_image', $request->image);
        }

        Category::create([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'image' => $path
        ]);

        return redirect(route('category.index'))->with('success', 'Your category was CREATED');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $category->load('products');
        return view('category.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title' => ['required', 'max:255'],
            'sub_title' => ['required', 'max:255'],
            'image' => ['file', 'max:3000', 'mimes:png,jpg,webp']
        ]);

        $path = $category->image;
        if ($request->hasFile('image')) {

            Storage::disk('public')->delete($category->image);
            $path = Storage::disk('public')->put('categories_image', $request->image);
        }

        $category->update([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'image' => $path
        ]);

        return redirect(route('category.index'))->with('success', 'Your category was UPDATED');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }
        $category->delete();

        return redirect(route('category.index'))->with('delete', 'category "' . $category->title . '" Was DELETED!!!');
    }

    // CategoryController.php

    public function search(Request $request)
    {
        $query = $request->get('query', '');
        $perPage = 5; // Number of results per page, adjust as needed

        $categories = Category::where('title', 'like', '%' . $query . '%')
            ->paginate($perPage)
            ->appends(['query' => $query]); // Preserve the query string

        // Prepare pagination links
        $pagination = $categories->links('pagination::bootstrap-5')->render();

        return response()->json([
            'data' => $categories->items(),
            'pagination' => $pagination,
            'total' => $categories->total(),
        ]);
    }
}
