@extends('/layout')

@section('title', 'Products in '.$category->title)



@section('content')

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
      <h3 class="box-title">Products in "{{ $category->title }}"</h3>
    </div><!-- /.box-header -->

    <div class="box-body table-responsive">
        <a href="{{ route('product.create') }}">
          <button class="btn btn-success pull-right">Create a new product</button>
        </a>

      <table class="table table-bordered table-striped">

        <thead>
            <tr>
              <th>Title</th>
              <th>Color</th>
              <th>Price</th>
              <th>Discount</th>
              <th>Featured</th>
              <th>Image</th>
              <th>Actions</th>
            </tr>
            </thead>
        <tbody>

            @forelse ($category->products as $product)
            <tr>
                <td>{{ $product->title }}</td>
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
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">No products in this category yet.</td>
            </tr>
            @endforelse
        </tbody>
      </table>
    </div><!-- /.box-body -->
  </div><!-- /.box -->



@endsection
