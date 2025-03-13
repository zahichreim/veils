@extends('layout')
@section('header')
   <a href="{{ route('category.index') }}">
    <i class="fa fa-long-arrow-left"></i> <span>Back to all Categories</span>
    
    </a> 
@endsection
@section('title', 'Update '. $category->title.' category')
@section('content')

<div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Update <b>{{ $category->title }}</b> category</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{ route('category.update',$category->id) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

          <div class="box-body">
            <div class="form-group @error('title') form-group has-error @enderror">
              <label for="title">Title</label>
              <input type="text" name="title" class="form-control" id="title" value="{{ $category->title }}">
            
              @error('title')
                <p class="text-red">{{$message}}</p>
              @enderror
            </div>

            <div class="form-group @error('sub_title') form-group has-error @enderror">
              <label for="sub_title">Sub Title</label>
              <input type="text" name="sub_title" value="{{ $category->sub_title }}" class="form-control" id="sub_title" placeholder="Enter a sub title">
            
              @error('sub_title')
                <p class="text-red">{{$message}}</p>
              @enderror
            </div>

            <div class="form-group">
              <label for="image">Choose a new Image</label>
              <input type="file" name="image" class="form-control" id="image" onchange="previewImages()">
              

              @error('image')
                <p class="text-red">{{$message}}</p>
              @enderror
              <p class="help-block">The existing image:</p>
              <img src="{{ asset('storage/'.$category->image) }}" width="200" height="100" alt="">

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
              text.innerText = 'The new Image Preview:';
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