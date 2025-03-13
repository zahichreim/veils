@extends('/layout')
@section('header')
   <a href="{{ route('product.show',$product->id) }}">
    <i class="fa fa-long-arrow-left"></i> <span>Back to all Informations</span>
    
    </a> 
@endsection
@section('title', 'Create a new Information')


@section('content')

<div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Create a new information for {{ $product->title }}</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{ route('product.info.store',$product) }}" method="POST">

            @csrf


            <div class="box-body">
            <div class="form-group @error('size_id') form-group has-error @enderror">
              <label for="size_id">Choose a size: </label>
              <select class="form-control select2" name="size_id" id="size_id">
                <option value=""></option>
                @foreach ($sizes as $size)
                    <option value="{{ $size->id }}" @if(old('size_id')==$size->id) selected @endif>{{ $size->title }}</option>
                    
                @endforeach
                
               
              </select>


              @error('size_id')
                <p class="text-red">{{$message}}</p>
              @enderror

            </div>


            

     
            <div class="form-group @error('quantity') form-group has-error @enderror">
              <label for="quantity">Quantity</label>
              <input type="number" name="quantity" value="{{ old('quantity') }}" class="form-control" id="quantity" placeholder="Enter the quantity">
            
              @error('quantity')
                <p class="text-red">{{$message}}</p>
              @enderror

            </div>

            

          </div><!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Create</button>
          </div>
        </form>
      </div><!-- /.box -->

      

    

      
    </div><!--/.col (left) -->

  </div>   <!-- /.row -->
    
@endsection