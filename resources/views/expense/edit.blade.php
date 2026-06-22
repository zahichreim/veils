@extends('/layout')
@section('header')
    <a href="{{ route('expense.index') }}">
        <i class="fa fa-long-arrow-left"></i> <span>Back to all Expenses</span>
    </a>
@endsection
@section('title', 'Update '.$expense->title)

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Update <b>{{ $expense->title }}</b></h3>
            </div><!-- /.box-header -->
            <form role="form" action="{{ route('expense.update', $expense->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="box-body">
                    <div class="form-group @error('title') form-group has-error @enderror">
                        <label for="title">Title</label>
                        <input type="text" name="title" value="{{ old('title', $expense->title) }}" class="form-control" id="title">
                        @error('title')
                            <p class="text-red">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group @error('category') form-group has-error @enderror">
                        <label for="category">Category</label>
                        <input type="text" name="category" value="{{ old('category', $expense->category) }}" class="form-control" id="category" list="category-suggestions">
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
                        <input type="number" step="0.01" min="0" name="amount" value="{{ old('amount', $expense->amount) }}" class="form-control" id="amount">
                        @error('amount')
                            <p class="text-red">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group @error('spent_at') form-group has-error @enderror">
                        <label for="spent_at">Date</label>
                        <input type="date" name="spent_at" value="{{ old('spent_at', $expense->spent_at->toDateString()) }}" class="form-control" id="spent_at">
                        @error('spent_at')
                            <p class="text-red">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group @error('note') form-group has-error @enderror">
                        <label for="note">Note (optional)</label>
                        <textarea name="note" class="form-control" id="note" rows="3">{{ old('note', $expense->note) }}</textarea>
                        @error('note')
                            <p class="text-red">{{ $message }}</p>
                        @enderror
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update expense</button>
                </div>
            </form>
        </div><!-- /.box -->
    </div>
</div>

@endsection
