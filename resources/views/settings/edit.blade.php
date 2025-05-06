@extends('/layout')
@section('header')
   <a href="{{ route('settings.index') }}">
    <i class="fa fa-long-arrow-left"></i> <span>Back to all Settings</span>
    
    </a> 
@endsection
@section('title', 'Update a setting')

@section('content')

  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Update <b>{{ $setting->key }}</b> Settings</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{ route('settings.update',$setting->id) }}" method="POST" enctype="multipart/form-data" >

            @csrf
            @method('PUT')

            <div class="box-body">
              <div class="form-group @error('value') has-error @enderror">
              <label for="value">Value</label>
              <textarea name="value" value="" class="form-control" id="editor2" placeholder="Enter additional information">{{ $setting->value }}</textarea>

              @error('value')
                <p class="text-red">{{$message}}</p>
              @enderror

              </div>

            <div class="form-group">
              <label for="image">Choose a new Image</label>
              <input type="file" name="image" id="image" class="form-control" onchange="previewImages()">
              <p class="help-block">The existing image:</p>
              <img src="{{ asset('storage/'.$setting->image) }}" width="200" height="100" alt="">

              <br><br>
              <div class="image-preview" id="imagePreview"></div>
              
              @error('image')
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