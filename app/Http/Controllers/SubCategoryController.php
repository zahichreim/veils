<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubCategoryController extends Controller
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
    public function create(Category $category)
    {
        return view('subcategory.create', ['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Category $category)
    {

        $subcategory = $request->validate([
            'title' => ['required', 'max:255'],
            'sub_title' => ['required', 'max:255'],
            'image' => ['required', 'file', 'max:3000', 'mimes:png,jpg,webp']
        ]);

        $path = null;
        if ($request->hasFile('image')) {

            $path = Storage::disk('public')->put('subcategories_image', $request->image);
        }

        $exists = $category->subcategories()->where('title', $subcategory['title'])->exists();
        if ($exists) {
            return back()->withErrors(['title' => 'This subcategory already exists for this category']);
        }


        $category->subcategories()->create([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'image' => $path
        ]);

        return redirect(route('category.show', $category->id))->with('success', 'Your sub category was CREATED');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category, SubCategory $subcategory)
    {
        return view('subcategory.edit', ['subcategory' => $subcategory, 'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category, SubCategory $subcategory)
    {
        $r = $request->validate([
            'title' => ['required', 'max:255'],
            'sub_title' => ['required', 'max:255'],
            'image' => ['file', 'max:3000', 'mimes:png,jpg,webp']
        ]);

        $path = $subcategory->image;
        if ($request->hasFile('image')) {

            Storage::disk('public')->delete($subcategory->image);
            $path = Storage::disk('public')->put('subcategories_image', $request->image);
        }

        $exists = $category->subcategories()->where('title', $r['title'])->exists();
        if ($exists && $r['title'] != $subcategory->title) {
            return back()->withErrors(['title' => 'This subcategory already exists for this category']);
        }


        $subcategory->update([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'image' => $path
        ]);

        return redirect(route('category.show', $category->id))->with('success', 'Your sub category was UPDATED');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category, SubCategory $subcategory)
    {

        if ($subcategory->image) {
            Storage::disk('public')->delete($subcategory->image);
        }
        $subcategory->delete();

        return redirect(route('category.show', $category->id))->with('delete', 'SubCategory "' . $subcategory->title . '" Was DELETED!!!');
    }
}
