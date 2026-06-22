@extends('pacex.layout')
@section('title','Velitique by Hawraa | FAQs')
@section('info-active','class=active-menu')
@section('class','class=header-v4')
@section('content')
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('storage/'.$header_image) }}');">
    <h2 class="ltext-105 cl0 txt-center">
        FAQs
    </h2>
</section>
<section style="padding-left: 10%; padding-right: 10%;padding-top:2%;padding-bottom:2%" >	
  <div class="accordion w-100" id="basicAccordion">
    @foreach ($faqs as $faq)
    <div  style="padding: 6px">
    <div class="accordion-item border-top">
        
      <h2 class="accordion-header" id="heading{{ $faq->id }}">
        <button data-mdb-button-init  data-mdb-collapse-init class="accordion-button collapsed bg-red text-black" type="button"
          data-mdb-target="#basicAccordionCollapse{{ $faq->id }}" aria-expanded="false" aria-controls="collapse{{ $faq->id }}" style="background-color: rgb(231, 231, 206)">
          {{ $faq->question }}
        </button>
      </h2>
      <div id="basicAccordionCollapse{{ $faq->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $faq->id }}"
        data-mdb-parent="#basicAccordion" style="">
        <div class="accordion-body bg-white text-black border-top">
            {!! $faq->answer !!}
        </div>
      </div>
    </div>
    </div>
    @endforeach
  </div>
    
   
</section>
@endsection
