@extends('layouts.frontend.app')

@section('title', 'All Posts')

@push('css')
  <link href="{{asset('assets/frontend/css/home.css')}}" rel="stylesheet">
  <link href="{{asset('assets/frontend/css/style4.css')}}" rel="stylesheet">

@endpush

@section('content')

<section id="gallery" class="gallery">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Tools for all tastes</h2>
      <p>We upload tools every month ready for you to print and build a world for yourself</p>
    </div>

    <div class="gallery-slider swiper-container">
      <div class="swiper-wrapper">
        @foreach ($herras as $herra)
        <div class="swiper-slide">
          <a class="" href="{{route('herra.index')}}">
            <img src="{{asset('storage/herramientas')}}/{{$herra->image}}" class="img-fluid" alt="{{$herra->slug}}">
          </a>
        </div>
        @endforeach
      </div>
      <div class="swiper-pagination"></div>
    </div>

  </div>
</section><!-- End Gallery Section -->

<!-- ======= */* Para mofificar cambiar titulo, descripcion e imagen ======= -->
  <section class="service-details">
    <div class="container">

      <div class="row">
        <div class="col-md-6 d-flex align-items-center" data-aos="fade-up">
          <div class="card">
            <div class="card-img">
              <img src="{{asset('assets/frontend/img/service details')}}/service-details-1.jpg" alt="...">
            </div>
            <div class="card-body">
              <h5 class="card-title"><a href="{{route('news.index')}}">Exclusive information</a></h5>
              <p class="card-text">Interesting news, technological advances, new trends, tips, ideas and more. A place where we inform you of the latest in the 3d world</p>
              <div class="read-more"><a href="{{route('news.index')}}"><i class="bi bi-arrow-right"></i> Read More</a></div>
            </div>
          </div>
        </div>

    </div>
  </section><!-- End News Details Section -->

<!-- ======= Footer ======= -->

@stop

@push('js')

<script src="{{asset('assets/frontend/js/principal.js')}}"></script>
  
@endpush
