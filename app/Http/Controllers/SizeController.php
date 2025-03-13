<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Http\Requests\StoreSizeRequest;
use App\Http\Requests\UpdateSizeRequest;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sizes = Size::orderBy('created_at', 'desc')->paginate(5);
        return view('size.index', compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('size.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $r = $request->validate([
            'title' => ['required', 'max:255'],

        ]);



        Size::create($r);

        return redirect(route('size.index'))->with('success', 'Your size was CREATED');
    }

    /**
     * Display the specified resource.
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Size $size)
    {
        return view('size.edit', ['size' => $size]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Size $size)
    {
        $r = $request->validate([
            'title' => ['required', 'max:255'],

        ]);



        $size->update($r);

        return redirect(route('size.index'))->with('success', 'Your size was UPDATED');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size $size)
    {
        $size->delete();

        return redirect(route('size.index'))->with('delete', 'size "' . $size->title . '" Was DELETED!!!');
    }
}
