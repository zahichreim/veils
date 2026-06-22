@extends('/layout')
@section('header')
   <a href="{{ route('product.index') }}">
    <i class="fa fa-long-arrow-left"></i> <span>Back to all Products</span>
    
    </a> 
@endsection
@section('title', 'Create a new Product')


   
@section('content')

  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Create a new product</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" >

            @csrf

          <div class="box-body">
            <div class="form-group @error('title') has-error @enderror">
              <label for="title">Title</label>
              <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="title" placeholder="Enter a title">
            
              @error('title')
                <p class="text-red">{{$message}}</p>
              @enderror

            </div>



            
            <div class="form-group @error('description') has-error @enderror">
              <label for="description">Description</label>
              <textarea name="description" value="" class="form-control" id="editor1" placeholder="Enter the description">{{ old('description') }}</textarea>

              @error('description')
                <p class="text-red">{{$message}}</p>
              @enderror

            </div>

            <div class="form-group @error('additional_information') has-error @enderror">
              <label for="additional_information">Additional Infromation</label>
              <textarea name="additional_information" value="" class="form-control" id="editor2" placeholder="Enter additional information">{{ old('additional_information') }}</textarea>

              @error('additional_information')
                <p class="text-red">{{$message}}</p>
              @enderror

            </div>



            <div class="form-group @error('category_id') has-error @enderror">
              <label for="category_id">Choose a category: </label>
              <select name="category_id" class="form-control select2" id="category_id">
                <option value=""></option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if(old('category_id')==$category->id) selected @endif>{{ $category->title }}</option>
                @endforeach
              </select>

              @error('category_id')
                <p class="text-red">{{$message}}</p>
              @enderror

            </div>

            

            <div class="form-group @error('color') has-error @enderror">
              <label for="color">Choose a color: </label>
              <input type="color" name="color" value="{{ old('color') }}" class="" id="color">
            
              @error('color')
                <p class="text-red">{{$message}}</p>
              @enderror

            </div>

              <div class="form-group @error('price') has-error @enderror">
                <label for="price">Price</label>
                <input type="number" step="0.01" name="price" value="{{ old('price') }}" class="form-control" id="price" placeholder="Enter the price">
              
                @error('price')
                  <p class="text-red">{{$message}}</p>
                @enderror
  
              </div>

            

            <div class="form-group @error('discount')has-error @enderror">
              <label for="discount">Discount</label>
              <input type="number" name="discount" value="{{ old('discount') }}" class="form-control" id="discount" placeholder="Enter a discount">
            
              @error('discount')
                <p class="text-red">{{$message}}</p>
              @enderror

            </div>

            <div class="form-group">
              <label for="main_image">Choose a Main Image</label>
              <input type="file" name="main_image" id="main_image" class="form-control" onchange="previewImages()">

              <br>
              <div class="image-preview" id="imagePreview"></div>
              
              @error('main_image')
              <p class="text-red">{{$message}}</p>
              @enderror
            </div>

              <div class="form-group">
                <input type="checkbox" id="featured" name="is_featured" value="1">
                <label for="featured"> Featured</label>
                <p class="help-block" style="display:inline;"> (By Default the product is Unfeatured)</p>
                </div>


          </div><!-- /.box-body -->

          <input type="hidden" name="uploaded_images" id="uploaded_images" value="[]">
          <div class="dropzone" id="product-form"></div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Create</button>
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
            text.innerText = 'Image Preview:';
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