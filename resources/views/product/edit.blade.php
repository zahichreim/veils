@extends('/layout')
@section('header')
   <a href="{{ route('product.index') }}">
    <i class="fa fa-long-arrow-left"></i> <span>Back to all Products</span>
    
    </a> 
@endsection
@section('title', 'Update '. $product->title.' product')
@section('content')

<div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Update <b>{{ $product->title }}</b> product</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

          <div class="box-body">
            <div class="form-group @error('title') form-group has-error @enderror">
              <label for="title">Title</label>
              <input type="text" name="title" class="form-control" id="title" value="{{ $product->title }}">
            
              @error('title')
                <p class="text-red">{{$message}}</p>
              @enderror
            </div>

            <div class="form-group @error('descrition') form-group has-error @enderror">
              <label for="description">Description</label>
              <textarea name="description" value="" class="form-control" id="editor1" placeholder="Enter the description">{{ $product->description }}</textarea>

              @error('description')
                <p class="text-red">{{$message}}</p>
              @enderror

            </div>

            <div class="form-group @error('additional_information') has-error @enderror">
              <label for="additional_information">Additional Infromation</label>
              <textarea name="additional_information" value="" class="form-control" id="editor2" placeholder="Enter additional information">{{ $product->additional_information }}</textarea>

              @error('additional_information')
                <p class="text-red">{{$message}}</p>
              @enderror

            </div>

            <div class="form-group @error('category_id') form-group has-error @enderror">
              <label for="category_id">Choose a category: </label>
              <select name="category_id" class="form-control select2" id="category_id">
                <option value="{{ $product->category->id }}">{{ $product->category->title }}</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
              </select>

              @error('category_id')
                <p class="text-red">{{$message}}</p>
              @enderror

            </div>

            

            <div class="form-group @error('color') form-group has-error @enderror">
              <label for="color">Choose a color: </label>
              <input type="color" name="color" value="{{ $product->color }}" class="" id="color">
            
              @error('color')
                <p class="text-red">{{$message}}</p>
              @enderror
              
              <div class="form-group @error('price') form-group has-error @enderror">
                <label for="price">Price</label>
                <input type="text" name="price" value="{{ $product->price }}" class="form-control" id="price" placeholder="Enter the price">
              
                @error('price')
                  <p class="text-red">{{$message}}</p>
                @enderror
  
              </div>

            <div class="form-group">
              <label for="discount">Discount</label>
              <input type="text" name="discount" value="{{ $product->discount }}" class="form-control" id="discount" placeholder="Enter the discount">

              @error('discount')
                <p class="text-red">{{$message}}</p>
              @enderror

            </div>

            <div class="form-group">
              <label for="main_image">Choose a new Main Image</label>
              <input type="file" name="main_image" id="main_image" class="form-control" onchange="previewImages()">

              <br>
              <div class="image-preview" id="imagePreview"></div>
              
              @error('main_image')
              <p class="text-red">{{$message}}</p>
              @enderror

              <p class="help-block">The existing image:</p>
              <img src="{{ asset('storage/'.$product->main_image) }}" width="200" height="100" alt="">

              <div class="form-group">
                @if ($product->is_featured==1)
                  <input type="checkbox" id="is_featured" name="is_featured" value="0">
                  <label for="is_featured"> Unfeature</label>
                @else
                  <input type="checkbox" id="is_featured" name="is_featured" value="1">
                  <label for="is_featured"> Feature</label>
                @endif
                
                </div>

            
          </div><!-- /.box-body -->
          <input type="hidden" name="uploaded_images" id="uploaded_images" value="[]">
          <div class="dropzone" id="product-form"></div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div><!-- /.box -->

      

    

      
    </div><!--/.col (left) -->

  </div>   <!-- /.row -->
    


  <script type="text/javascript">
    
    var uploadedFiles = [];
    Dropzone.options.productForm = {
        maxFilesize: 2, // MB
        acceptedFiles: ".jpeg,.jpg,.png,.gif,.webp",
        url: '#',

        autoProcessQueue: false,
        parallelUploads: 5,
        addRemoveLinks: true,
        dictRemoveFile: "Remove",
        init: function() {
            var myDropzone = this;
            
            myDropzone.on("addedfile", function (file) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    var base64String = event.target.result;
                    var fileName = file.name
                    uploadedFiles.push(base64String);
                    updateHiddenInput();
                };
                reader.readAsDataURL(file);

            });

            myDropzone.on("removedfile", function(file) {
              removeOneOccurrence(file.dataURL);
                    updateHiddenInput();
                
            });

            var files = {!! json_encode($product->images) !!}
            for (var i in files)
            {
              var file = {upload:{progress:100,total:18320,bytesSent:18320,filename:"cap1.PNG",chunked:false,totalChunkCount:1},status:"success",previewElement:{},previewTemplate:{},_removeLink:{},accepted:true,processing:true,xhr:{},dataURL:files[i].path};
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              file.previewElement.classList.remove('dz-file-preview')
              file.previewElement.classList.add('dz-image-preview')
              file.previewElement.classList.add('dz-processing')
              var imgTag = file.previewElement.querySelector("img");
              if(imgTag) 
              {
                    imgTag.src =files[i].path;
                    imgTag.style.objectFit = 'contain';
                    imgTag.style.width = '100%';
                    imgTag.style.height = '100%';
              }
              uploadedFiles.push(files[i].path);
              updateHiddenInput();
            }

            function updateHiddenInput() {
                document.getElementById('uploaded_images').value = JSON.stringify(uploadedFiles);
            }

            function removeOneOccurrence(dataURL) {
              const index = uploadedFiles.indexOf(dataURL);
              if (index !== -1) {
                  uploadedFiles.splice(index, 1);
              }
            }

        }
    };
  </script>

<script>
  function previewImages() {
      var preview = document.getElementById('imagePreview');
      preview.innerHTML = '';

      var text = document.createElement('p');
            text.innerText = 'The new Image Preview:';
            preview.appendChild(text);
      var files = document.getElementById('main_image').files;

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