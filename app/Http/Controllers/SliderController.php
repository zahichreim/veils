<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = 5;


        $sliders = Slider::orderBy('created_at', 'desc')->paginate($perPage);
        return view('slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['nullable', 'max:255'],
            'sub_title' => ['nullable', 'max:255'],
            'url' => ['nullable', 'max:255'],
            'image' => ['required', 'file', 'max:3000', 'mimes:png,jpg,webp']
        ]);

        $path = null;
        if ($request->hasFile('image')) {

            $path = Storage::disk('public')->put('sliders_images', $request->image);
        }

        Slider::create([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'url' => $request->url,
            'image' => $path
        ]);

        return redirect(route('slider.index'))->with('success', 'Your slider was CREATED');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('slider.edit', ['slider' => $slider]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {

        $request->validate([
            'title' => ['nullable', 'max:255'],
            'sub_title' => ['nullable', 'max:255'],
            'url' => ['nullable', 'max:255'],
            'image' => ['file', 'max:3000', 'mimes:png,jpg,webp']
        ]);

        $path = $slider->image;
        if ($request->hasFile('image')) {

            Storage::disk('public')->delete($slider->image);
            $path = Storage::disk('public')->put('sliders_images', $request->image);
        }

        $slider->update([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'url' => $request->url,
            'image' => $path
        ]);

        return redirect(route('slider.index'))->with('success', 'Your slider was UPDATED');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        if ($slider->image) {
            Storage::disk('public')->delete($slider->image);
        }
        $slider->delete();

        return redirect(route('slider.index'))->with('delete', 'slider "' . $slider->title . '" Was DELETED!!!');
    }
}
