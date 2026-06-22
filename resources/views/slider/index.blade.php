@extends('/layout')

@section('title', 'List Of Sliders')



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
      <h3 class="box-title">Sliders</h3>
    </div><!-- /.box-header -->

    <div class="box-body table-responsive">
        <a href="{{ route('slider.create') }}">
          <button class="btn btn-success pull-right">Create a new slider</button>
        </a>
  

      <table id="example1" class="table table-bordered table-striped">
        
        <thead>
            <tr>
              <th>Title</th>
              <th>Sub Title</th>
              <th>Image</th>
              <th>URL</th>
              <th>Button Text</th>
              <th>Actions</th>
            </tr>
            </thead>
        <tbody>
    
            @foreach ($sliders as $c)
            <tr>
                <td>{{ $c->title }}</td>
                <td>{{ $c->sub_title }}</td>
                <td>


                    <img src="{{ asset('storage/'.$c->image) }}" width="200" height="100" alt="">

                  
                </td>
                <td>{{ $c->url }}</td>
                <td>{{ $c->button_text }}</td>
                <td>
                  <a href="{{ route('slider.edit',$c->id) }}">
                    <button class="btn btn-success">Update</button>
                  </a>
                  <form id="delete-form-{{ $c->id }}" action="{{ route('slider.destroy',$c) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger" onclick="confirmDelete('{{ $c->id }}')">Delete slider</button>
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
          text: "This action will permanently delete the slider.",
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
                  'Your slider is safe 🙂',
                  'info'
              )
          }
      });
  }




      </script>





<div id="pagination">
  {!! $sliders->links('pagination::bootstrap-5') !!}
</div>

      {{-- <div class="row">
        <div class="dataTables_paginate paging_bootstrap pull-right">{{ $sliders->links('pagination::bootstrap-5') }}</div>
        
      </div> --}}
    </div><!-- /.box-body -->
  </div><!-- /.box -->
  


@endsection
