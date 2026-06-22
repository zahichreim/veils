@extends('/layout')
@section('header')
    <a href="{{ route('expense.index') }}">
        <i class="fa fa-long-arrow-left"></i> <span>Back to all Expenses</span>
    </a>
@endsection
@section('title', 'Log a new Expense')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Log a new expense</h3>
            </div><!-- /.box-header -->
            <form role="form" action="{{ route('expense.store') }}" method="POST">
                @csrf
                <div class="box-body">
                    <div class="form-group @error('title') form-group has-error @enderror">
                        <label for="title">Title</label>
                        <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="title" placeholder="e.g. Fabric purchase, Instagram ads">
                        @error('title')
                            <p class="text-red">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group @error('category') form-group has-error @enderror">
                        <label for="category">Category</label>
                        <input type="text" name="category" value="{{ old('category') }}" class="form-control" id="category" list="category-suggestions" placeholder="e.g. Inventory">
                        <datalist id="category-suggestions">
                            <option value="Inventory">
                            <option value="Marketing">
                            <option value="Shipping">
                            <option value="Salaries">
                            <option value="Rent">
                            <option value="Utilities">
                            <option value="Packaging">
                            <option value="Other">
                        </datalist>
                        @error('category')
                            <p class="text-red">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group @error('amount') form-group has-error @enderror">
                        <label for="amount">Amount ($)</label>
                        <input type="number" step="0.01" min="0" name="amount" value="{{ old('amount') }}" class="form-control" id="amount" placeholder="Enter the amount">
                        @error('amount')
                            <p class="text-red">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group @error('spent_at') form-group has-error @enderror">
                        <label for="spent_at">Date</label>
                        <input type="date" name="spent_at" value="{{ old('spent_at', now()->toDateString()) }}" class="form-control" id="spent_at">
                        @error('spent_at')
                            <p class="text-red">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group @error('note') form-group has-error @enderror">
                        <label for="note">Note (optional)</label>
                        <textarea name="note" class="form-control" id="note" rows="3" placeholder="Any extra detail">{{ old('note') }}</textarea>
                        @error('note')
                            <p class="text-red">{{ $message }}</p>
                        @enderror
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Save expense</button>
                </div>
            </form>
        </div><!-- /.box -->
    </div>
</div>

@endsection
