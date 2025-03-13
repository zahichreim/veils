@extends('/layout')
@section('header')
   <a href="{{ route('slider.index') }}">
    <i class="fa fa-long-arrow-left"></i> <span>Back to all Sliders</span>
    
    </a> 
@endsection
@section('title', 'Create a new Slider')



@section('content')

<div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Create a new slider</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

          <div class="box-body">

            <div class="form-group @error('title') form-group has-error @enderror">
              <label for="title">Title</label>
              <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="title" placeholder="Enter a title">
            
              @error('title')
                <p class="text-red">{{$message}}</p>
              @enderror
            </div>

              <div class="form-group @error('sub_title') form-group has-error @enderror">
                <label for="sub_title">Sub Title</label>
                <input type="text" name="sub_title" value="{{ old('sub_title') }}" class="form-control" id="sub_title" placeholder="Enter a sub title">
              
                @error('sub_title')
                  <p class="text-red">{{$message}}</p>
                @enderror
              </div>


              <div class="form-group @error('url') form-group has-error @enderror">
                <label for="url">URL</label>
                <input type="text" name="url" value="{{ old('url') }}" class="form-control" id="url" placeholder="Enter a url">
              
                @error('url')
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