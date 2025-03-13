@extends('/layout')

@section('title', 'List Of '.$category->title.' Sub Categories')



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
      <h3 class="box-title">Sub Categories</h3>
    </div><!-- /.box-header -->

    <div class="box-body table-responsive">
        <a href="{{ route('category.subcategory.create',$category->id) }}">
          <button class="btn btn-success pull-right">Create a new sub category</button>
        </a>
  
        <input type="text" class="form-control" style="width:50%" id="search" placeholder="Search...">

      <table id="example1" class="table table-bordered table-striped">
        
        <thead>
            <tr>
              <th>Title</th>
              <th>Sub Title</th>
              <th>Image</th>
              <th>Actions</th>
            </tr>
            </thead>
        <tbody>
    
            @foreach ($category->subcategories as $subcategory)
            <tr>
                <td>{{ $subcategory->title }}</td>
                <td>{{ $subcategory->sub_title }}</td>
                <td>


                    <img src="{{ asset('storage/'.$subcategory->image) }}" width="200" height="100" alt="">

                  
                </td>
                <td>
                  <a href="{{ route('category.subcategory.edit',[$category,$subcategory]) }}">
                    <button class="btn btn-success">Update</button>
                  </a>
                  <form id="delete-form-{{ $subcategory->id }}" action="{{ route('category.subcategory.destroy',[$category,$subcategory]) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger" onclick="confirmDelete('{{ $subcategory->id }}')">Delete Sub Category</button>
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
          text: "This action will permanently delete the subcategory.",
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
                  'Your subcategory is safe 🙂',
                  'info'
              )
          }
      });
  }




      </script>


<script>
 
</script>


{{-- <div id="pagination">
  {!! $category->subcategories->links('pagination::bootstrap-5') !!}
</div> --}}

      {{-- <div class="row">
        <div class="dataTables_paginate paging_bootstrap pull-right">{{ $subcategories->links('pagination::bootstrap-5') }}</div>
        
      </div> --}}
    </div><!-- /.box-body -->
  </div><!-- /.box -->
  


@endsection