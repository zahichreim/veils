@extends('/layout')
@section('header')
    <a href="{{ route('order.index') }}">
        <i class="fa fa-long-arrow-left"></i> <span>Back to all Orders</span>
    </a>
@endsection
@section('title', 'Create a new Order')

@section('content')

@if ($errors->any())
    <div class="callout callout-danger">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

@if ($productInfos->isEmpty())
    <div class="callout callout-warning">
        <p>No products are in stock yet. Add products and stock (sizes) before creating an order.</p>
    </div>
@endif

<form role="form" action="{{ route('order.admin-store') }}" method="POST" id="admin-order-form">
    @csrf

    <div class="row">
        <!-- ===== Customer details ===== -->
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Customer details</h3>
                </div>
                <div class="box-body">
                    <div class="form-group @error('full_name') has-error @enderror">
                        <label for="full_name">Full Name</label>
                        <input type="text" name="full_name" value="{{ old('full_name') }}" class="form-control" id="full_name" placeholder="Customer full name">
                    </div>

                    <div class="form-group @error('phone_nb') has-error @enderror">
                        <label for="phone_nb">Phone Number</label>
                        <input type="text" name="phone_nb" value="{{ old('phone_nb') }}" class="form-control" id="phone_nb" placeholder="e.g. 70123456">
                    </div>

                    <div class="form-group @error('district') has-error @enderror">
                        <label for="district">District</label>
                        <input type="text" name="district" value="{{ old('district') }}" class="form-control" id="district" placeholder="District">
                    </div>

                    <div class="form-group @error('city') has-error @enderror">
                        <label for="city">City</label>
                        <input type="text" name="city" value="{{ old('city') }}" class="form-control" id="city" placeholder="City">
                    </div>

                    <div class="form-group @error('address') has-error @enderror">
                        <label for="address">Address</label>
                        <input type="text" name="address" value="{{ old('address') }}" class="form-control" id="address" placeholder="Street / building">
                    </div>

                    <div class="form-group @error('address_description') has-error @enderror">
                        <label for="address_description">Address Description (optional)</label>
                        <textarea name="address_description" class="form-control" id="address_description" rows="2" placeholder="Landmark, floor, notes">{{ old('address_description') }}</textarea>
                    </div>

                    <div class="form-group @error('promocode') has-error @enderror">
                        <label for="promocode">Promocode (optional)</label>
                        <input type="text" name="promocode" value="{{ old('promocode') }}" class="form-control" id="promocode" placeholder="Apply a promocode">
                    </div>
                </div>
            </div>
        </div>

        <!-- ===== Order items ===== -->
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Order items</h3>
                </div>
                <div class="box-body">
                    <div id="items-container">
                        <!-- rows injected by JS -->
                    </div>

                    <button type="button" class="btn btn-default" id="add-item">
                        <i class="fa fa-plus"></i> Add item
                    </button>

                    <div class="pull-right" style="font-size:18px;">
                        <strong>Subtotal: $ <span id="subtotal">0.00</span></strong>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary btn-block">Create Order</button>
                    <p class="help-block">Stock is reduced automatically. A promocode (if valid) is applied to the total.</p>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Row template -->
<template id="item-row-template">
    <div class="item-row" style="margin-bottom:10px; padding-bottom:10px; border-bottom:1px solid #f0f0f0;">
        <div class="row">
            <div class="col-xs-8">
                <select name="product_info_id[]" class="form-control item-product">
                    <option value="">-- choose product / size --</option>
                    @foreach ($productInfos as $pi)
                        <option value="{{ $pi->id }}"
                            data-price="{{ round($pi->product->price - $pi->product->price * ($pi->product->discount ?? 0) / 100, 2) }}"
                            data-stock="{{ $pi->quantity }}">
                            {{ $pi->product->title }} — {{ optional($pi->size)->title }}
                            (${{ number_format($pi->product->price - $pi->product->price * ($pi->product->discount ?? 0) / 100, 2) }}, stock {{ $pi->quantity }})
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-xs-3">
                <input type="number" name="quantity[]" min="1" value="1" class="form-control item-qty">
            </div>
            <div class="col-xs-1" style="padding-left:0;">
                <button type="button" class="btn btn-danger remove-item"><i class="fa fa-trash"></i></button>
            </div>
        </div>
        <div class="text-muted text-right" style="padding-right:15px;">Line: $ <span class="line-total">0.00</span></div>
    </div>
</template>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var container = document.getElementById('items-container');
        var template = document.getElementById('item-row-template');

        function addRow() {
            var clone = template.content.cloneNode(true);
            container.appendChild(clone);
            recalc();
        }

        function recalc() {
            var subtotal = 0;
            container.querySelectorAll('.item-row').forEach(function (row) {
                var select = row.querySelector('.item-product');
                var qty = parseInt(row.querySelector('.item-qty').value) || 0;
                var opt = select.options[select.selectedIndex];
                var price = opt ? parseFloat(opt.getAttribute('data-price')) || 0 : 0;
                var stock = opt ? parseInt(opt.getAttribute('data-stock')) || 0 : 0;
                var qtyInput = row.querySelector('.item-qty');

                // clamp to stock
                if (opt && opt.value && qty > stock) {
                    qty = stock;
                    qtyInput.value = stock;
                }
                var line = price * qty;
                row.querySelector('.line-total').textContent = line.toFixed(2);
                subtotal += line;
            });
            document.getElementById('subtotal').textContent = subtotal.toFixed(2);
        }

        container.addEventListener('change', recalc);
        container.addEventListener('input', recalc);
        container.addEventListener('click', function (e) {
            if (e.target.closest('.remove-item')) {
                var rows = container.querySelectorAll('.item-row');
                if (rows.length > 1) {
                    e.target.closest('.item-row').remove();
                } else {
                    // reset the single remaining row instead of removing it
                    var row = e.target.closest('.item-row');
                    row.querySelector('.item-product').value = '';
                    row.querySelector('.item-qty').value = 1;
                }
                recalc();
            }
        });

        document.getElementById('add-item').addEventListener('click', addRow);

        // strip empty rows before submit so validation doesn't choke
        document.getElementById('admin-order-form').addEventListener('submit', function (e) {
            container.querySelectorAll('.item-row').forEach(function (row) {
                if (!row.querySelector('.item-product').value) {
                    row.remove();
                }
            });
            if (!container.querySelector('.item-row')) {
                e.preventDefault();
                alert('Please add at least one product to the order.');
                addRow();
            }
        });

        // start with one row
        addRow();
    });
</script>

@endsection
