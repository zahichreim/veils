<?php

namespace App\Http\Controllers;

use App\Models\Faqs;
use App\Http\Requests\StoreFaqsRequest;
use App\Http\Requests\UpdateFaqsRequest;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faqs::all();
        return view('faqs.index', ['faqs' => $faqs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $r = $request->validate([
            'question' => ['required', 'max:255'],
            'answer' => ['required'],

        ]);
        Faqs::create($r);

        return redirect(route('faqs.index'))->with('success', 'Your question was CREATED');
    }

    /**
     * Display the specified resource.
     */
    public function show(Faqs $faqs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faqs $faq)
    {
        return view('faqs.edit', ['faq' => $faq]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faqs $faq)
    {
        $r = $request->validate([
            'question' => ['required', 'max:255'],
            'answer' => ['required'],

        ]);
        $faq->update($r);

        return redirect(route('faqs.index'))->with('success', 'Your question was UPDATED');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faqs $faq)
    {
        $faq->delete();

        return redirect(route('faqs.index'))->with('delete', 'faqs "' . $faq->title . '" Was DELETED!!!');
    }
}
