@extends('layouts.frontend.app')

@section('title', 'Descarga Lista')

@push('css')
    <link href="{{asset('assets/frontend/css/style4.css')}}" rel="stylesheet">
  
@endpush

@section('content')
<div class="row mx-0" >
  <section class="col-12 col-md-3">
    {!! Adsense::ads('responsive') !!}
  </section>

  <section id="gallery" class="gallery col-12 col-md-8 text-center py-5">
    <div class="container" data-aos="fade-up">

      @if($mostrar == true)

        <div class="section-title-descargas">
          <h2>Advertising counter</h2>
        </div>

        <div class="section-title-descargas">
          <h2 class="text-secondary shadow-sm">Thanks For The Download</h2>
        </div>

        <a id="descargar" class="disable" href="{{asset('storage/herramientas/render/')}}/{{$filefront}}" download="{{$filefront}}">
          Download Now
        </a>

      @elseif($mostrar == false)

        <div class="section-title-descargas">
          <h2>Try again, the file has not been generated</h2>
        </div>

        <div class="section-title-descargas">
          <p class="text-secondary">
            We suggest that when you try again,<br>
            If you try to use a tool where you must upload an svg file, try to make it:<br><br>
            <ol>* A flat svg,</ol>
            <ol>* Unicolor and / or single layer,</ol>
            <ol>* That does not have features such as:
              <ul>-Texts and / or</ul>
              <ul>-Images</ul>
              <ul>-And much less calls to external files</ul>
            </ol>
            <ol>* Remember that the uploaded svg will be taken as a vector path for operations like extrusion where the characteristics will be required before they are given.</ol>
          </p>
          <h2 class="">Example:</h2>
          <div class="d-flex align-items-center justify-content-center">
            <div class="img-fluid" style="height: 400px; width: 500px;">
              <img class="img-fluid" src="{{asset('assets/frontend/img/h1.svg')}}">
            </div>
          </div>
        </div>

      @else

        <div class="section-title-descargas">
          <h2>Try again, the file has not been generated</h2>
        </div>

      @endif
  

    </div>
    
  </section><!-- End Gallery Section -->
  <div class="section-title-descargas pb-0 mb-0">
    <h2 class="pb-0 mb-0">¡do not forget to follow us on our social networks!</h2>
  </div>
  <div class="social-links text-center text-md-right pt-0 pt-md-0 mt-2 mb-4">
      <a href="https://www.facebook.com/Theclub3D-107266711589358/" class="facebook"><i class="bx bxl-facebook"></i></a>
      <a href="https://instagram.com/theclub3d?utm_medium=copy_link" class="instagram"><i class="bx bxl-instagram"></i></a>
      <a href="https://www.youtube.com/channel/UC7C9yIhjTsD8Icroz1Rk2nA" class="Youtube"><i class="bx bxl-youtube"></i></a>
    </div>
</div>


<!-- ======= Footer ======= -->

@stop

@push('js')

<script src="{{asset('assets/frontend/js/principal.js')}}"></script>

<script>
window.onload = updateClock;

var totalTime = 10;

function updateClock() {
  var elemento = document.getElementById('descargar');
  elemento.innerHTML = totalTime;
  
  if(totalTime==0){
    elemento.innerHTML = "Download Now";
    elemento.className = "descargar";
    elemento.disabled = false;
    alert('You can now Download your .Stl');

  }else{
    elemento.className = "disable";
    elemento.disabled = true;
    totalTime-=1;
    setTimeout("updateClock()",1000);
  }
}
</script>

@endpush
