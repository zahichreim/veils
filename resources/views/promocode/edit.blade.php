@extends('/layout')
@section('header')
   <a href="{{ route('promocode.index') }}">
    <i class="fa fa-long-arrow-left"></i> <span>Back to all Promocodes</span>
    
    </a> 
@endsection
@section('title', 'Update '. $promocode->title.' promocode')
@section('content')

<div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Update <b>{{ $promocode->title }}</b> promocode</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{ route('promocode.update',$promocode->id) }}" method="POST">

            @csrf
            @method('PUT')

          <div class="box-body">
            <div class="form-group @error('title') form-group has-error @enderror">
              <label for="title">Title</label>
              <input type="text" name="title" class="form-control" id="title" value="{{ $promocode->title }}">
            
              @error('title')
                <p class="text-red">{{$message}}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="value">Value</label>
              <input type="text" name="value" value="{{ $promocode->value }}" class="form-control" id="value" placeholder="Enter the value">

              @error('value')
                <p class="text-red">{{$message}}</p>
              @enderror

            </div>
            <div class="form-group @error('percentage') form-group has-error @enderror">
              <label for="percentage">Percentage</label>
              <input type="text" name="percentage" value="{{ $promocode->percentage }}" class="form-control" id="percentage" placeholder="Enter the percentage">

              @error('percentage')
                <p class="text-red">{{$message}}</p>
              @enderror

            </div>

            <div class="form-group">
              @if ($promocode->status==1)
                <input type="checkbox" id="inactive" name="status" value="0">
                <label for="inactive"> Inactive</label>
              @else
                <input type="checkbox" id="inactive" name="status" value="1">
                <label for="inactive"> Active</label>
              @endif
              
              </div>
          </div><!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div><!-- /.box -->

      

    

      
    </div><!--/.col (left) -->

  </div>   <!-- /.row -->
  <script>
    // Select the input fields
    const value = document.getElementById("value");
    const percentage = document.getElementById("percentage");
    
    // Function to handle the mutual disabling
    function toggleDisable() {
        if (value.value.trim() !== "") {
            percentage.disabled = true;
        } else {
            percentage.disabled = false;
        }
    
        if (percentage.value.trim() !== "") {
            value.disabled = true;
        } else {
            value.disabled = false;
        }
    }
    toggleDisable();
    
    // Add event listeners to both input fields
    value.addEventListener("input", toggleDisable);
    percentage.addEventListener("input", toggleDisable);
    
        </script>
@endsection