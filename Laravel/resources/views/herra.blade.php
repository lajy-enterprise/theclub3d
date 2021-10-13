@extends('layouts.frontend.app')

@section('title', 'All Posts')

@push('css')
    <link href="{{asset('assets/frontend/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/css/tools.css')}}" rel="stylesheet">

@endpush

@section('content')

   <!-- ======= Tools Section ======= -->
  <section id="portfolio" class="section-bg">
    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h1 class="section-title">Our Tools</h1>
      </header>

      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class=" col-lg-12">
          <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">All</li>
          </ul>
        </div>
      </div>

      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
      @foreach ($herras as $herra)
        <div class="col-lg-3 col-md-6 portfolio-item filter-app">
          <div>
            
            <figure class="">

              <img src="{{asset('storage/herramientas')}}/{{$herra->image}}" class="img-fluid" alt="{{$herra->slug}}">
              <a href="{{route('herra.details', $herra->slug)}}" class="link-details" title="More Details"><i class="bi bi-link"></i></a>
            </figure>
      
          </div>
        </div>
      @endforeach
      </div>
    </div>
  </section>


<!-- ======= Footer ======= -->

@stop

@push('js')

<script src="{{asset('assets/frontend/js/principal.js')}}"></script>
  
@endpush
