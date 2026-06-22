<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = Expense::orderBy('spent_at', 'desc')->paginate(10);
        $totalAll = Expense::sum('amount');
        $totalThisMonth = Expense::whereYear('spent_at', now()->year)
            ->whereMonth('spent_at', now()->month)
            ->sum('amount');

        return view('expense.index', compact('expenses', 'totalAll', 'totalThisMonth'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('expense.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $r = $request->validate([
            'title' => ['required', 'max:255'],
            'category' => ['nullable', 'max:255'],
            'amount' => ['required', 'numeric', 'min:0'],
            'spent_at' => ['required', 'date'],
            'note' => ['nullable'],
        ]);

        Expense::create($r);

        return redirect(route('expense.index'))->with('success', 'Your expense was CREATED');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        return view('expense.edit', ['expense' => $expense]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense)
    {
        $r = $request->validate([
            'title' => ['required', 'max:255'],
            'category' => ['nullable', 'max:255'],
            'amount' => ['required', 'numeric', 'min:0'],
            'spent_at' => ['required', 'date'],
            'note' => ['nullable'],
        ]);

        $expense->update($r);

        return redirect(route('expense.index'))->with('success', 'Your expense was UPDATED');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();

        return redirect(route('expense.index'))->with('delete', 'expense "' . $expense->title . '" Was DELETED!!!');
    }
}
