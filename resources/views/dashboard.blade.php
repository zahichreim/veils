@extends('layout')

@section('title', 'Dashboard')

@section('content')

<!-- ===== Quick actions ===== -->
<div class="row" style="margin-bottom: 12px;">
    <div class="col-xs-12">
        <a href="{{ route('order.create') }}" class="btn btn-primary btn-lg">
            <i class="fa fa-plus-circle"></i> Create Order (Instagram / manual)
        </a>
    </div>
</div>

<!-- ===== Headline KPIs ===== -->
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
            <div class="inner">
                <h3>$ {{ number_format($totalSales, 2) }}</h3>
                <p>Total Sales</p>
            </div>
            <div class="icon"><i class="fa fa-line-chart"></i></div>
            <span class="small-box-footer">This month: $ {{ number_format($salesThisMonth, 2) }}</span>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
            <div class="inner">
                <h3>$ {{ number_format($totalExpenses, 2) }}</h3>
                <p>Total Expenses</p>
            </div>
            <div class="icon"><i class="fa fa-money"></i></div>
            <a href="{{ route('expense.index') }}" class="small-box-footer">Manage expenses <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box {{ $netProfit >= 0 ? 'bg-aqua' : 'bg-yellow' }}">
            <div class="inner">
                <h3>$ {{ number_format($netProfit, 2) }}</h3>
                <p>Net (Sales &minus; Expenses)</p>
            </div>
            <div class="icon"><i class="fa fa-balance-scale"></i></div>
            <span class="small-box-footer">Expenses this month: $ {{ number_format($expensesThisMonth, 2) }}</span>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-blue">
            <div class="inner">
                <h3>{{ $ordersCount }}</h3>
                <p>Total Orders</p>
            </div>
            <div class="icon"><i class="fa fa-shopping-cart"></i></div>
            <a href="{{ route('order.index') }}" class="small-box-footer">View orders <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>

<!-- ===== Secondary counts ===== -->
<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-clock-o"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">In Progress</span>
                <span class="info-box-number">{{ $statusCounts['in-progress'] }}</span>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-truck"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">In Delivery</span>
                <span class="info-box-number">{{ $statusCounts['in-delivery'] }}</span>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-check"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Delivered</span>
                <span class="info-box-number">{{ $statusCounts['delivered'] }}</span>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-envelope"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Unreplied Messages</span>
                <span class="info-box-number">{{ $unrepliedMessages }}</span>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- ===== Revenue vs Expenses chart ===== -->
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Sales vs Expenses (last 6 months)</h3>
            </div>
            <div class="box-body">
                <canvas id="salesExpensesChart" height="120"></canvas>
            </div>
        </div>
    </div>

    <!-- ===== Catalogue snapshot ===== -->
    <div class="col-md-4">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Catalogue</h3>
            </div>
            <div class="box-body">
                <ul class="list-group">
                    <li class="list-group-item">Products <span class="badge bg-light-blue">{{ $productsCount }}</span></li>
                    <li class="list-group-item">Categories <span class="badge bg-light-blue">{{ $categoriesCount }}</span></li>
                </ul>
            </div>
        </div>

        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Expenses by category</h3>
            </div>
            <div class="box-body no-padding">
                <table class="table table-striped">
                    <tbody>
                        @forelse ($expensesByCategory as $row)
                            <tr>
                                <td>{{ $row->category ?: 'Uncategorized' }}</td>
                                <td class="text-right">$ {{ number_format($row->total, 2) }}</td>
                            </tr>
                        @empty
                            <tr><td class="text-center">No expenses logged yet.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- ===== Recent orders ===== -->
    <div class="col-md-8">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Recent Orders</h3>
                <div class="box-tools pull-right">
                    <a href="{{ route('order.index') }}" class="btn btn-box-tool">View all</a>
                </div>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>Customer</th>
                            <th>Phone</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                        @forelse ($recentOrders as $order)
                            <tr>
                                <td>{{ $order->full_name }}</td>
                                <td>{{ $order->phone_nb }}</td>
                                <td>$ {{ number_format($order->total_amount, 2) }}</td>
                                <td>
                                    @php
                                        $labels = ['in-progress' => 'label-warning', 'in-delivery' => 'label-info', 'delivered' => 'label-success'];
                                    @endphp
                                    <span class="label {{ $labels[$order->status] ?? 'label-default' }}">{{ $order->status }}</span>
                                </td>
                                <td>{{ $order->created_at->format('d M, Y') }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="text-center">No orders yet.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- ===== Top products ===== -->
    <div class="col-md-4">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Top Selling Products</h3>
            </div>
            <div class="box-body no-padding">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>Product</th>
                            <th class="text-right">Sold</th>
                        </tr>
                        @forelse ($topProducts as $tp)
                            <tr>
                                <td>{{ $tp['title'] }}</td>
                                <td class="text-right">{{ $tp['qty'] }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="2" class="text-center">No sales yet.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('salesExpensesChart');
        if (!ctx || typeof Chart === 'undefined') return;

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($months),
                datasets: [
                    {
                        label: 'Sales',
                        data: @json($revenueSeries),
                        backgroundColor: 'rgba(0, 166, 90, 0.7)',
                        borderColor: 'rgba(0, 166, 90, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Expenses',
                        data: @json($expenseSeries),
                        backgroundColor: 'rgba(221, 75, 57, 0.7)',
                        borderColor: 'rgba(221, 75, 57, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                scales: {
                    y: { beginAtZero: true, ticks: { callback: function (v) { return '$' + v; } } }
                }
            }
        });
    });
</script>

@endsection
