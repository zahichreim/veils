<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Expense;
use App\Models\Message;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // ---- Headline KPIs ----
        $totalSales = (float) Order::sum('total_amount');
        $totalExpenses = (float) Expense::sum('amount');
        $netProfit = $totalSales - $totalExpenses;
        $ordersCount = Order::count();

        // ---- Order status breakdown ----
        $statusCounts = [
            'in-progress' => Order::where('status', 'in-progress')->count(),
            'in-delivery' => Order::where('status', 'in-delivery')->count(),
            'delivered'   => Order::where('status', 'delivered')->count(),
        ];

        // ---- Catalogue / activity counts ----
        $productsCount = Product::count();
        $categoriesCount = Category::count();
        $unrepliedMessages = Message::where('is_replied', false)->count();

        // ---- This month vs all time ----
        $salesThisMonth = (float) Order::whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)->sum('total_amount');
        $expensesThisMonth = (float) Expense::whereYear('spent_at', now()->year)
            ->whereMonth('spent_at', now()->month)->sum('amount');

        // ---- Last 6 months: revenue vs expenses (for the chart) ----
        $months = [];
        $revenueSeries = [];
        $expenseSeries = [];
        for ($i = 5; $i >= 0; $i--) {
            $start = Carbon::now()->startOfMonth()->subMonths($i);
            $end = (clone $start)->endOfMonth();
            $months[] = $start->format('M Y');
            $revenueSeries[] = round((float) Order::whereBetween('created_at', [$start, $end])->sum('total_amount'), 2);
            $expenseSeries[] = round((float) Expense::whereBetween('spent_at', [$start->toDateString(), $end->toDateString()])->sum('amount'), 2);
        }

        // ---- Recent orders ----
        $recentOrders = Order::latest()->take(8)->get();

        // ---- Top selling products (by quantity) ----
        $topProducts = OrderDetails::select('product_id', DB::raw('SUM(quantity) as qty'), DB::raw('SUM(total_amount) as revenue'))
            ->groupBy('product_id')
            ->orderByDesc('qty')
            ->take(5)
            ->get()
            ->map(function ($row) {
                $product = Product::find($row->product_id);
                return [
                    'title' => $product->title ?? 'Deleted product',
                    'qty' => (int) $row->qty,
                    'revenue' => (float) $row->revenue,
                ];
            });

        // ---- Expenses by category ----
        $expensesByCategory = Expense::select('category', DB::raw('SUM(amount) as total'))
            ->groupBy('category')
            ->orderByDesc('total')
            ->get();

        return view('dashboard', compact(
            'totalSales',
            'totalExpenses',
            'netProfit',
            'ordersCount',
            'statusCounts',
            'productsCount',
            'categoriesCount',
            'unrepliedMessages',
            'salesThisMonth',
            'expensesThisMonth',
            'months',
            'revenueSeries',
            'expenseSeries',
            'recentOrders',
            'topProducts',
            'expensesByCategory'
        ));
    }
}
