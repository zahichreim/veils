@extends('/layout')

@section('title', 'List Of Categories')



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
      <h3 class="box-title">Categories</h3>
    </div><!-- /.box-header -->

    <div class="box-body table-responsive">
        <a href="{{ route('category.create') }}">
          <button class="btn btn-success pull-right">Create a new category</button>
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
    
            @foreach ($categories as $c)
            <tr>
                <td>{{ $c->title }}</td>
                <td>{{ $c->sub_title }}</td>
                <td>
                    <img src="{{ asset('storage/'.$c->image) }}" width="200" height="100" alt="">
                </td>
                <td>
                  <a href="{{ route('category.edit',$c->id) }}">
                    <button class="btn btn-success">Update</button>
                  </a>
                  <a href="{{ route('category.show',$c->id) }}">
                    <button class="btn btn-primary">View Products</button>
                  </a>
                  <form id="delete-form-{{ $c->id }}" action="{{ route('category.destroy',$c) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger" onclick="confirmDelete('{{ $c->id }}')">Delete Category</button>
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
$(document).ready(function() {
    let delayTimer;
    let currentPage = 1;

    // Fetch initial data
    //fetchInitialData();

    // Handle search input
    $('#search').on('keyup', function() {
        clearTimeout(delayTimer);
        const query = $('#search').val();
        currentPage = 1; // Reset to first page

        if (query.length >= 3) {
            delayTimer = setTimeout(function() {
                fetchResults(query, currentPage);
            }, 300);
        } else if (query.length === 0) {
            fetchInitialData();
        }
    });

    // Handle pagination links
    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();
        currentPage = $(this).attr('href').split('page=')[1];
        const query = $('#search').val();

        if (query.length >= 3) {
            fetchResults(query, currentPage);
        } else {
            fetchInitialData(currentPage);
        }
    });

    function fetchResults(query, page) {
        $.ajax({
            url: "{{ route('category.search') }}",
            type: 'GET',
            dataType: 'json',
            data: { query: query, page: page },
            success: function(response) {
                populateTable(response.data);
                $('#pagination').html(response.pagination);
                $('#total').text(response.total + ' entries found');
            },
            error: function(xhr, status, error) {
                console.error('Error fetching search results:', error);
            }
        });
    }

    function fetchInitialData(page = 1) {
        $.ajax({
            url: "{{ route('category.index') }}",
            type: 'GET',
            dataType: 'json',
            data: { page: page },
            success: function(response) {
                populateTable(response.data);
                $('#pagination').html(response.pagination);
                $('#total').text('Total entries: ' + response.total);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching initial data:', error);
            }
        });
    }

    function populateTable(data) {
        const tableBody = $('#example1 tbody');
        tableBody.empty();
        const csrfToken = $('meta[name="csrf-token"]').attr('content');

        data.forEach(function(row) {
            const imageUrl = '{{ asset('storage') }}/' + row.image;
            const showRoute = '{{ route('category.show', ':id') }}'.replace(':id', row.id);
            const editRoute = '{{ route('category.edit', ':id') }}'.replace(':id', row.id);
            const deleteRoute = '{{ route('category.destroy', ':id') }}'.replace(':id', row.id);

            tableBody.append(`
                <tr>
                    <td>${row.title}</td>
                    <td>${row.sub_title}</td>
                    <td>
                        
                            <img src="${imageUrl}" width="200" height="100" alt="">

                    </td>
                    <td>
                        <a href="${editRoute}">
                            <button class="btn btn-success">Update</button>
                        </a>
                        <form id="delete-form-${row.id}" action="${deleteRoute}" method="POST" style="display:inline;">
                            <input type="hidden" name="_token" value="${csrfToken}">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="button" class="btn btn-danger" onclick="confirmDelete('${row.id}')">Delete Category</button>
                        </form>
                    </td>
                </tr>
            `);
        });
    }
});

function confirmDelete(id) {

      Swal.fire({
          title: 'Are you sure?',
          text: "This action will permanently delete the category.",
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
                  'Your category is safe 🙂',
                  'info'
              )
          }
      });
  }




      </script>


<script>
 
</script>


<div id="pagination">
  {!! $categories->links('pagination::bootstrap-5') !!}
</div>

      {{-- <div class="row">
        <div class="dataTables_paginate paging_bootstrap pull-right">{{ $categories->links('pagination::bootstrap-5') }}</div>
        
      </div> --}}
    </div><!-- /.box-body -->
  </div><!-- /.box -->
  


@endsection