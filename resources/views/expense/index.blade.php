@extends('/layout')

@section('title', 'Expenses')

@section('content')

<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

@if (session('success'))
    <div class="callout callout-success">
        <p>{{ session('success') }}</p>
    </div>
@endif

@if (session('delete'))
    <div class="callout callout-danger">
        <p>{{ session('delete') }}</p>
    </div>
@endif

<div class="row">
    <div class="col-md-6">
        <div class="small-box bg-red">
            <div class="inner">
                <h3>$ {{ number_format($totalAll, 2) }}</h3>
                <p>Total Expenses (all time)</p>
            </div>
            <div class="icon"><i class="fa fa-money"></i></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>$ {{ number_format($totalThisMonth, 2) }}</h3>
                <p>Expenses this month</p>
            </div>
            <div class="icon"><i class="fa fa-calendar"></i></div>
        </div>
    </div>
</div>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Expenses</h3>
    </div><!-- /.box-header -->

    <div class="box-body">
        <a href="{{ route('expense.create') }}">
            <button class="btn btn-success pull-right">Log a new expense</button>
        </a>

        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Amount</th>
                    <th>Note</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($expenses as $expense)
                    <tr>
                        <td>{{ $expense->spent_at->format('d M, Y') }}</td>
                        <td>{{ $expense->title }}</td>
                        <td>{{ $expense->category ?: 'N / A' }}</td>
                        <td>$ {{ number_format($expense->amount, 2) }}</td>
                        <td>{{ $expense->note }}</td>
                        <td>
                            <a href="{{ route('expense.edit', $expense->id) }}">
                                <button class="btn btn-success">Update</button>
                            </a>
                            <form id="delete-form-{{ $expense->id }}" action="{{ route('expense.destroy', $expense) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger" onclick="confirmDelete('{{ $expense->id }}')">Delete expense</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No expenses logged yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- SweetAlert2 JS -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function confirmDelete(id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "This action will permanently delete the expense.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + id).submit();
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire('Cancelled', 'Your expense is safe 🙂', 'info');
                    }
                });
            }
        </script>

        <div id="pagination">
            {!! $expenses->links('pagination::bootstrap-5') !!}
        </div>
    </div><!-- /.box-body -->
</div><!-- /.box -->

@endsection
