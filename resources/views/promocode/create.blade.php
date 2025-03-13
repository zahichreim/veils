@extends('/layout')
@section('header')
   <a href="{{ route('promocode.index') }}">
    <i class="fa fa-long-arrow-left"></i> <span>Back to all Promocodes</span>
    
    </a> 
@endsection
@section('title', 'Create a new Promocode')


@section('content')

<div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Create a new promocode</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{ route('promocode.store') }}" method="POST">

            @csrf

          <div class="box-body">
            <div class="form-group @error('title') form-group has-error @enderror">
              <label for="title">Title</label>
              <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="title" placeholder="Enter a title">
            
              @error('title')
                <p class="text-red">{{$message}}</p>
              @enderror
            </div>
            <div class="form-group @error('value') form-group has-error @enderror">
              <label for="value">Value</label>
              <input type="number" step="0.01" name="value" value="{{ old('value') }}" class="form-control" id="value" placeholder="Enter the value">

              @error('value')
                <p class="text-red">{{$message}}</p>
              @enderror

            </div>
            <div class="form-group @error('percentage') form-group has-error @enderror">
              <label for="percentage">Percentage</label>
              <input type="number" step="0.01" name="percentage" value="{{ old('value') }}" class="form-control" id="percentage" placeholder="Enter the percentage">

              @error('percentage')
                <p class="text-red">{{$message}}</p>
              @enderror

            </div>

            <div class="form-group">
            <input type="checkbox" id="inactive" name="status" value="0">
            <label for="inactive"> Inactive</label>
            <p class="help-block" style="display:inline;"> (By Default the status is Active)</p>
            </div>
            

          </div><!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Create</button>
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

// Add event listeners to both input fields
value.addEventListener("input", toggleDisable);
percentage.addEventListener("input", toggleDisable);

    </script>
@endsection