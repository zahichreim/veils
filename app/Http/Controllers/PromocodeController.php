<?php

namespace App\Http\Controllers;

use App\Models\Promocode;
use App\Http\Requests\StorePromocodeRequest;
use App\Http\Requests\UpdatePromocodeRequest;
use Illuminate\Http\Request;

class PromocodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = 5;

        if ($request->ajax()) {
            $promocodes = Promocode::orderBy('created_at', 'desc')->paginate($perPage);

            $pagination = $promocodes->links('pagination::bootstrap-5')->render();

            return response()->json([
                'data' => $promocodes->items(),
                'pagination' => $pagination,
                'total' => $promocodes->total(),
            ]);
        }

        $promocodes = Promocode::orderBy('created_at', 'desc')->paginate($perPage);
        return view('promocode.index', compact('promocodes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('promocode.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $r = $request->validate([
            'title' => ['required', 'max:255'],
            'value' => ['numeric'],
            'percentage' => ['numeric', 'max:100'],
            'status' => []
        ]);



        Promocode::create($r);

        return redirect(route('promocode.index'))->with('success', 'Your Promocode was CREATED');
    }

    /**
     * Display the specified resource.
     */
    public function show(Promocode $promocode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Promocode $promocode)
    {
        return view('promocode.edit', ['promocode' => $promocode]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Promocode $promocode)
    {
        $r = $request->validate([
            'title' => ['required', 'max:255'],
            'value' => ['numeric'],
            'percentage' => ['numeric', 'max:100'],
            'status' => []
        ]);



        $promocode->update($r);

        return redirect(route('promocode.index'))->with('success', 'Your Promocode was UPDATED');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promocode $promocode)
    {
        $promocode->delete();

        return redirect(route('promocode.index'))->with('delete', 'promocode "' . $promocode->title . '" Was DELETED!!!');
    }

    public function search(Request $request)
    {
        $query = $request->get('query', '');
        $perPage = 5; // Number of results per page, adjust as needed

        $promocodes = Promocode::where('title', 'like', '%' . $query . '%')
            ->paginate($perPage)
            ->appends(['query' => $query]); // Preserve the query string

        // Prepare pagination links
        $pagination = $promocodes->links('pagination::bootstrap-5')->render();

        return response()->json([
            'data' => $promocodes->items(),
            'pagination' => $pagination,
            'total' => $promocodes->total(),
        ]);
    }
}
