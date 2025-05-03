@extends('/layout')
@section('header')
   <a href="{{ route('settings.index') }}">
    <i class="fa fa-long-arrow-left"></i> <span>Back to all Settings</span>
    
    </a> 
@endsection
@section('title', 'Create a new settings')


   
@section('content')

  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Create a new Settings</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data" >

            @csrf

          <div class="box-body">
            <div class="form-group @error('key') has-error @enderror">
              <label for="key">Key</label>
              <input type="text" name="key" value="{{ old('key') }}" class="form-control" id="key" placeholder="Enter a key">
            
              @error('key')
                <p class="text-red">{{$message}}</p>
              @enderror

            </div>

              <div class="form-group @error('value') has-error @enderror">
              <label for="value">Value</label>
              <textarea name="value" value="" class="form-control" id="editor1" placeholder="Enter additional information">{{ old('value') }}</textarea>

              @error('value')
                <p class="text-red">{{$message}}</p>
              @enderror

              </div>

            
            <div class="form-group @error('description') has-error @enderror">
              <label for="description">Description</label>
              <textarea name="description" class="form-control" id="editor2" placeholder="Enter the description">{{ old('description') }}</textarea>

              @error('description')
                <p class="text-red">{{$message}}</p>
              @enderror

            </div>

            

            <div class="form-group">
              <label for="image">Choose an Image</label>
              <input type="file" name="image" id="image" class="form-control" onchange="previewImages()">

              <br>
              <div class="image-preview" id="imagePreview"></div>
              
              @error('image')
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


 
 <script>
  function previewImages() {
      var preview = document.getElementById('imagePreview');
      preview.innerHTML = '';

      var text = document.createElement('p');
            text.innerText = 'Image Preview:';
            preview.appendChild(text);
      var files = document.getElementById('image').files;

      Array.from(files).forEach(function(file) {
          var reader = new FileReader();
          reader.onload = function(e) {
              var img = document.createElement('img');
              img.src = e.target.result;
              img.width=300;
              img.height=200;
              preview.appendChild(img);
          }
          reader.readAsDataURL(file);
      });
  }
 


</script>
  
  
    
@endsection