@extends('/layout')

@section('title', 'List Of products')



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
      <h3 class="box-title">Products</h3>
    </div><!-- /.box-header -->

    <div class="box-body table-responsive">
        <a href="{{ route('product.create') }}">
          <button class="btn btn-success pull-right">Create a new product</button>
        </a>
  
        <input type="text" class="form-control" style="width:50%" id="search" placeholder="Search...">

      <table id="example1" class="table table-bordered table-striped">
        
        <thead>
            <tr>
              <th>Title</th>
              <th>Description</th>
              <th>Additional Information</th>
              <th>Category</th>

              <th>Color</th>
              <th>Price</th>
              <th>Discount</th>
              <th>Featured</th>
              <th>Image</th>
              <th>Actions</th>
            </tr>
            </thead>
        <tbody>
            
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->title }}</td>
                <td>{!! $product->description !!}</td>
                <td>{!! $product->additional_information !!}</td>
                <td>{{ $product->category->title }}</td>

                <td style="background-color: {{ $product->color }};">{{ $product->color }}</td>
                <td>$ {{ $product->price }}</td>
                <td>@if($product->discount>0) {{ $product->discount }}% @else N / A @endif</td>
                <td>@if($product->is_featured)Yes @else No @endif</td>
                <td>
                    <img src="{{ asset('storage/'.$product->main_image) }}" width="200" height="100" alt="">
                </td>

                <td>
                  <a href="{{ route('product.edit',$product->id) }}">
                    <button class="btn btn-success">Update</button>
                  </a>
                  <a href="{{ route('product.show',$product->id) }}">
                    <button class="btn btn-primary">View Product Informations</button>
                  </a>
                  <form id="delete-form-{{ $product->id }}" action="{{ route('product.destroy',$product) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger" onclick="confirmDelete('{{ $product->id }}')">Delete product</button>
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
            url: "{{ route('product.search') }}",
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
            url: "{{ route('product.index') }}",
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
            const showRoute = '{{ route('product.show', ':id') }}'.replace(':id', row.id);
            const editRoute = '{{ route('product.edit', ':id') }}'.replace(':id', row.id);
            const deleteRoute = '{{ route('product.destroy', ':id') }}'.replace(':id', row.id);
            const imgsrc= '{{ asset('storage') }}/'+row.main_image;

            if(row.is_featured) {
                row.is_featured='Yes';
            }
            else {
                row.is_featured='No';
            }
            if(row.discount==0)
            {
                row.discount='N / A';
            }
            else {
                row.discount=row.discount+'%';
            }
            
            tableBody.append(`
                <tr>
                    <td>${row.title}</td>
                    <td>${row.description}</td>
                    <td>${row.additional_information}</td>
                    <td>${row.category.title}</td>
                    <td style="background-color: ${row.color};">${row.color}</td>
                    <td>$ ${row.price}</td>
                    <td>
                        ${row.discount}
                    </td>
                    <td>${row.is_featured}</td>
                    <td>
                    <img src="${imgsrc}" width="200" height="100" alt="">
                    </td>
                    <td>
                        <a href="${editRoute}">
                            <button class="btn btn-success">Update</button>
                        </a>
                        <a href="${showRoute}">
                            <button class="btn btn-primary">View Product Informations</button>
                        </a>
                        <form id="delete-form-${row.id}" action="${deleteRoute}" method="POST" style="display:inline;">
                            <input type="hidden" name="_token" value="${csrfToken}">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="button" class="btn btn-danger" onclick="confirmDelete('${row.id}')">Delete product</button>
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
          text: "This action will permanently delete the product.",
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
                  'Your product is safe 🙂',
                  'info'
              )
          }
      });
  }




      </script>


<script>
 
</script>


<div id="pagination">
  {!! $products->links('pagination::bootstrap-5') !!}
</div>

      {{-- <div class="row">
        <div class="dataTables_paginate paging_bootstrap pull-right">{{ $products->links('pagination::bootstrap-5') }}</div>
        
      </div> --}}
    </div><!-- /.box-body -->
  </div><!-- /.box -->
  


@endsection