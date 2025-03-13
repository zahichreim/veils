@extends('/layout')

@section('title', 'List Of Messages')



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
      <h3 class="box-title">Messages</h3>
    </div><!-- /.box-header -->

    <div class="box-body table-responsive">
    
  
        

      <table id="example1" class="table table-bordered table-striped">
        
        <thead>
            <tr>
              <th>Email</th>
              <th>Message</th>
              <th>Is Replied To</th>
              <th>Actions</th>
            </tr>
            </thead>
        <tbody>
    
            @foreach ($messages as $message)
            <tr>
                <td>{{ $message->email }}</td>
                <td>{{ $message->message }}</td>
                <td>@if($message->is_replied)Yes @else No @endif</td>
                <td>
                  @if(!$message->is_replied)
                  <form action="{{ route('message.update',$message) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('PUT')
                  <a href="{{ route('message.edit',$message->id) }}">
                    <button class="btn btn-success">Replied To</button>
                  </a>
                  </form>
                  @endif
                  <form id="delete-form-{{ $message->id }}" action="{{ route('message.destroy',$message) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger" onclick="confirmDelete('{{ $message->id }}')">Delete Message</button>
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
          text: "This action will permanently delete the message.",
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
                  'Your message is safe 🙂',
                  'info'
              )
          }
      });
  }




      </script>


<script>
 
</script>


<div id="pagination">
  {!! $messages->links('pagination::bootstrap-5') !!}
</div>

      {{-- <div class="row">
        <div class="dataTables_paginate paging_bootstrap pull-right">{{ $messages->links('pagination::bootstrap-5') }}</div>
        
      </div> --}}
    </div><!-- /.box-body -->
  </div><!-- /.box -->
  


@endsection