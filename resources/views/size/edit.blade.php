@extends('/layout')
@section('header')
   <a href="{{ route('size.index') }}">
    <i class="fa fa-long-arrow-left"></i> <span>Back to all Sizes</span>
    
    </a> 
@endsection
@section('title', 'Update '. $size->title.' size')
@section('content')

<div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Update <b>{{ $size->title }}</b> size</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{ route('size.update',$size->id) }}" method="POST">

            @csrf
            @method('PUT')

          <div class="box-body">
            <div class="form-group @error('title') form-group has-error @enderror">
              <label for="title">Title</label>
              <input type="text" name="title" class="form-control" id="title" value="{{ $size->title }}">
            
              @error('title')
                <p class="text-red">{{$message}}</p>
              @enderror
            </div>
          </div><!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div><!-- /.box -->

      

    

      
    </div><!--/.col (left) -->

  </div>   <!-- /.row -->
    
@endsection