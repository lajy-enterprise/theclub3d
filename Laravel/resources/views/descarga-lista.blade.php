@extends('layouts.frontend.app')

@section('title', 'Descarga Lista')

@push('css')
  <link href="{{asset('assets/frontend/css/news.css')}}" rel="stylesheet">
  <link href="{{asset('assets/frontend/css/style4.css')}}" rel="stylesheet">

@endpush

@section('content')

<section id="gallery" class="gallery">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Tu descarga esta lista</h2>
      
    </div>


    <a class="cta-btn" href="{{asset('storage/herramientas/render')}}/{{$filenameSal}}">
      Descargar Ahora
    </a>
  
  </div>
  
</section><!-- End Gallery Section -->


<!-- ======= Footer ======= -->

@stop

@push('js')

<script src="{{asset('assets/frontend/js/principal.js')}}"></script>
  
@endpush
