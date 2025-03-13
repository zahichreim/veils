@extends('/layout')
@section('header')
   <a href="{{ route('order.index') }}">
    <i class="fa fa-long-arrow-left"></i> <span>Back to all Orders</span>
    
    </a> 
@endsection

@section('title', $order->id."'s Details")



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
<div class="box">
    <div class="box-header">
      <h3 class="box-title">List of Details</h3>
    </div><!-- /.box-header -->

    <div class="box-body">
 
  
        <input type="text" class="form-control" style="width:50%" id="search" placeholder="Search...">

      <table id="example1" class="table table-bordered table-striped">
        
        <thead>
            <tr>
              <th>Product</th>

              <th>Size</th>
              <th>Quantity</th>
              <th>Total Amount</th>
            </tr>
            </thead>
        <tbody>
            
            @foreach ($order->orderdetails as $details)
            <tr>
                <td>{{ $details->products->title }}</td>

                <td>{{ $details->sizes->title }}</td>
                <td>{{ $details->quantity }}</td>
                <td>$ {{ $details->total_amount }}</td>

            </tr>
            @endforeach
        </tbody>
      </table>
      <!-- SweetAlert2 JS -->
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
      <script>

function confirmDelete(id) {

      Swal.fire({
          title: 'Are you sure?',
          text: "This action will permanently delete the orderdetails.",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'No, cancel'
      }).then((result) => {
          if (result.isConfirmed) {
              // Submit the form with the specified ID
              document.getElementById('delete-form-' + id).submit();
          } else if (result.dismiss === Swal.DismissReason.cancel) {
              Swal.fire(
                  'Cancelled',
                  'Your orderdetails is safe 🙂',
                  'details'
              )
          }
      });
  }




      </script>


<script>
 
</script>


{{-- <div id="pagination">
  {!! $orders->links('pagination::bootstrap-5') !!}
</div> --}}

      {{-- <div class="row">
        <div class="dataTables_paginate paging_bootstrap pull-right">{{ $orders->links('pagination::bootstrap-5') }}</div>
        
      </div> --}}
    </div><!-- /.box-body -->
  </div><!-- /.box -->
  


@endsection