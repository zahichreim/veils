@extends('/layout')
@section('header')
   <a href="{{ route('faqs.index') }}">
    <i class="fa fa-long-arrow-left"></i> <span>Back to all FAQs</span>
    
    </a> 
@endsection
@section('title', 'Update '. $faq->question. ' question')


   
@section('content')

  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Update {{ $faq->question }} question</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{ route('faqs.update',$faq->id) }}" method="POST" enctype="multipart/form-data" >

            @csrf
            @method('PUT')

          <div class="box-body">
            <div class="form-group @error('question') has-error @enderror">
              <label for="question">Question</label>
              <input type="text" name="question" value="{{ $faq->question }}" class="form-control" id="question">
            
              @error('question')
                <p class="text-red">{{$message}}</p>
              @enderror

            </div>

              <div class="form-group @error('answer') has-error @enderror">
              <label for="answer">Answer</label>
              <textarea name="answer" value="" class="form-control" id="editor2" placeholder="Enter additional information">{{ $faq->answer }}</textarea>

              @error('answer')
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