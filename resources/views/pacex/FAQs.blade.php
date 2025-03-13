@extends('pacex.layout')
@section('title','PaceX | FAQs')
@section('info-active','class=active-menu')
@section('class','class=header-v4')
@section('content')
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('pacex/images/bg-01.jpg') }}');">
    <h2 class="ltext-105 cl0 txt-center">
        FAQs
    </h2>
</section>	
<div class="accordion w-100" id="basicAccordion">
     @foreach ($faqs as $faq)
    <div class="accordion-item border-top">
        
      <h2 class="accordion-header" id="heading{{ $faq->id }}">
        <button data-mdb-button-init  data-mdb-collapse-init class="accordion-button collapsed bg-info text-white" type="button"
          data-mdb-target="#basicAccordionCollapse{{ $faq->id }}" aria-expanded="false" aria-controls="collapse{{ $faq->id }}">
          {{ $faq->question }}
        </button>
      </h2>
      <div id="basicAccordionCollapse{{ $faq->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $faq->id }}"
        data-mdb-parent="#basicAccordion" style="">
        <div class="accordion-body bg-secondary text-light border-top">
            {!! $faq->answer !!}
        </div>
      </div>
      @endforeach
    </div>
    
   
  </div>
    
@endsection