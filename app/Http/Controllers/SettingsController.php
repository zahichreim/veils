<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use App\Http\Requests\StoreSettingsRequest;
use App\Http\Requests\UpdateSettingsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Settings::all();
        return view('settings.index', ['settings' => $settings]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('settings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'key' => ['required', 'max:255'],
            'value' => ['required'],
            'description' => ['required', 'max:255'],
            'image' => ['file', 'max:3000', 'mimes:png,jpg,webp']
        ]);

        $path = null;
        if ($request->hasFile('image')) {

            $path = Storage::disk('public')->put('settings_image', $request->image);
        }

        Settings::create([
            'key' => $request->key,
            'value' => $request->value,
            'description' => $request->description,
            'image' => $path
        ]);

        return redirect(route('settings.index'))->with('success', 'Your Settings was CREATED');
    }

    /**
     * Display the specified resource.
     */
    public function show(Settings $settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Settings $setting)
    {
        return view('settings.edit', ['setting' => $setting]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Settings $setting)
    {
        $request->validate([

            'value' => ['required'],

            'image' => ['file', 'max:3000', 'mimes:png,jpg,webp']
        ]);

        $path = $setting->image;
        if ($request->hasFile('image')) {
            if ($path) {
                Storage::disk('public')->delete($setting->image);
            }

            $path = Storage::disk('public')->put('settings_image', $request->image);
        }

        $setting->update([

            'value' => $request->value,

            'image' => $path
        ]);

        return redirect(route('settings.index'))->with('success', 'Your Settings was UPDATED');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Settings $settings)
    {
        //
    }
}
