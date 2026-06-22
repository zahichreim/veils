@extends('/layout')

@section('title', 'List Of Orders')



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
      <h3 class="box-title">Orders</h3>
    </div><!-- /.box-header -->

    <div class="box-body table-responsive">

        <a href="{{ route('order.create') }}">
          <button class="btn btn-success pull-right">Create a new order</button>
        </a>

        <input type="text" class="form-control" style="width:50%" id="search" placeholder="Search...">

      <table id="example1" class="table table-bordered table-striped">
        
        <thead>
            <tr>
              <th>Full Name</th>
              <th>Phone Number</th>
              <th>District</th>
              <th>City</th>
              <th>Address</th>
              <th>Address Description</th>
              <th>Total Amount</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
            </thead>
        <tbody>
    
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->full_name }}</td>
                <td>{{ $order->phone_nb }}</td>
                <td>{{ $order->district }}</td>
                <td>{{ $order->city }}</td>
                <td>{{ $order->address }}</td>
                <td>{{ $order->address_description }}</td>
                <td>$ {{ $order->total_amount }}</td>
                <td>{{ $order->status }}</td>
                <td>
                  <form action="{{ route('order.update',$order) }}" method="POST">
                    @csrf
                    @method('PUT')
                
                <div class="form-group">
                <select name="status" class="form-control">
                  <option></option>
                  @switch($order->status)
                    @case('in-progress')
                      <option value="in-delivery">In Delivery</option>
                      <option value="delivered">Delivered</option>
                    @break

                    @case('in-delivery')
                      <option value="in-progress">In Progress</option>
                      <option value="delivered">Delivered</option>
                    @break

                    @case('delivered')
                      <option value="in-progress">In Progress</option>
                      <option value="in-delivery">In Delivery</option>
                    @break
                      
                    @default
                      <option value="in-progress">In Progress</option>
                      <option value="in-delivery">In Delivery</option>
                      <option value="delivered">Delivered</option>
                  @endswitch

                  
                  
                </select>
                <button type="submit" class="btn btn-block btn-success">Change Status</button>
                </div>
                </form>
                  <a href="{{ route('order.show',$order->id) }}">
                    <button class="btn btn-primary">View Order Details</button>
                  </a>
                  <form id="delete-form-{{ $order->id }}" action="{{ route('order.destroy',$order) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger" onclick="confirmDelete('{{ $order->id }}')">Delete order</button>
                  </form>
                  
                </td>
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
          text: "This action will permanently delete the orders.",
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
                  'Your orders is safe 🙂',
                  'info'
              )
          }
      });
  }




      </script>


<script>
 
</script>




      <div class="row">
        <div class="dataTables_paginate paging_bootstrap pull-right">{{ $orders->links('pagination::bootstrap-5') }}</div>
        
      </div>
    </div><!-- /.box-body -->
  </div><!-- /.box -->
  


@endsection