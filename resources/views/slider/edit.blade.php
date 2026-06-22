@extends('/layout')
@section('header')
   <a href="{{ route('slider.index') }}">
    <i class="fa fa-long-arrow-left"></i> <span>Back to all Sliders</span>
    
    </a> 
@endsection
@section('title', 'Update '. $slider->title. ' Slider')



@section('content')

<div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Update {{ $slider->title }} slider</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{ route('slider.update',$slider->id) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')
          <div class="box-body">

            <div class="form-group @error('title') form-group has-error @enderror">
              <label for="title">Title (optional)</label>
              <input type="text" name="title" value="{{ old('title', $slider->title) }}" class="form-control" id="title">
            
              @error('title')
                <p class="text-red">{{$message}}</p>
              @enderror
            </div>

              <div class="form-group @error('sub_title') form-group has-error @enderror">
                <label for="sub_title">Sub Title (optional)</label>
                <input type="text" name="sub_title" value="{{ old('sub_title', $slider->sub_title) }}" class="form-control" id="sub_title">
              
                @error('sub_title')
                  <p class="text-red">{{$message}}</p>
                @enderror
              </div>

              <div class="form-group @error('title_color') form-group has-error @enderror">
                <label for="title_color">Title Color</label>
                <input type="color" name="title_color" value="{{ old('title_color', $slider->title_color ?? '#222222') }}" class="form-control" id="title_color">

                @error('title_color')
                  <p class="text-red">{{$message}}</p>
                @enderror
              </div>

              <div class="form-group @error('sub_title_color') form-group has-error @enderror">
                <label for="sub_title_color">Sub Title Color</label>
                <input type="color" name="sub_title_color" value="{{ old('sub_title_color', $slider->sub_title_color ?? '#222222') }}" class="form-control" id="sub_title_color">

                @error('sub_title_color')
                  <p class="text-red">{{$message}}</p>
                @enderror
              </div>


              <div class="form-group @error('url') form-group has-error @enderror">
                <label for="url">URL (optional)</label>
                <input type="text" name="url" value="{{ old('url', $slider->url) }}" class="form-control" id="url">
              
                @error('url')
                  <p class="text-red">{{$message}}</p>
                @enderror
              </div>

              <div class="form-group @error('button_text') form-group has-error @enderror">
                <label for="button_text">Button Text (optional)</label>
                <input type="text" name="button_text" value="{{ old('button_text', $slider->button_text ?? 'Shop Now') }}" class="form-control" id="button_text">

                @error('button_text')
                  <p class="text-red">{{$message}}</p>
                @enderror
                <p class="help-block">Used only when a URL is present.</p>
              </div>

              <div class="form-group @error('button_text_color') form-group has-error @enderror">
                <label for="button_text_color">Button Text Color</label>
                <input type="color" name="button_text_color" value="{{ old('button_text_color', $slider->button_text_color ?? '#ffffff') }}" class="form-control" id="button_text_color">

                @error('button_text_color')
                  <p class="text-red">{{$message}}</p>
                @enderror
              </div>

              <div class="form-group @error('button_background_color') form-group has-error @enderror">
                <label for="button_background_color">Button Background Color</label>
                <input type="color" name="button_background_color" value="{{ old('button_background_color', $slider->button_background_color ?? '#717fe0') }}" class="form-control" id="button_background_color">

                @error('button_background_color')
                  <p class="text-red">{{$message}}</p>
                @enderror
              </div>

            <div class="form-group">
              <label for="image">Choose a New Image</label>
              <input type="file" name="image" id="image" class="form-control" onchange="previewImages()">

            

              
              <br>
              
              
              
              @error('image')
                <p class="text-red">{{$message}}</p>
              @enderror
              <p class="help-block">The existing image:</p>
              <img src="{{ asset('storage/'.$slider->image) }}" width="200" height="100" alt="">
              
              <br><br>
              <div class="image-preview" id="imagePreview"></div>
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
