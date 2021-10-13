@extends('layouts.frontend.app')

@section('title', 'All Posts')

@push('css')
  <link href="{{asset('assets/frontend/css/news.css')}}" rel="stylesheet">
  <link href="{{asset('assets/frontend/css/style4.css')}}" rel="stylesheet">

@endpush

@section('content')

<section id="features" class="features">
  <div class="container">

    <div class="section-title" data-aos="fade-up">
      <h2>news</h2>
      <p>Fantastic! Since you are here, take the opportunity to find out about the most relevant 3D modeling</p>
    </div>

    <div class="row">
      @foreach ($posts as $post)

        <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up">
          <div class="card pt-3" style="background-image: url({{asset('storage/post')}}/{{$post->image}});">
            <div class="card-body">
            {{-- 
              <div class="img-fluid">
                <img src="{{asset('storage/post')}}/{{$post->image}}" alt="{{$post->slug}}" class="img-fluid">
              </div> --}}

              <h5 class="card-title"><a href="{{route('news.details', $post->slug)}}">{{$post->title}}</a></h5>
              <p class="card-text">{!! str_limit(strip_tags($post->body), $limit = 50, $end = '...') !!}</p>
              <div class="read-more"><a href="{{route('news.details', $post->slug)}}"><i class="bi bi-arrow-right"></i>Read More</a></div>
            </div>
          </div>
        </div>

      @endforeach

      {{$posts->links()}}

    </div>

  </div>
</section><!-- End Features Section -->

<!-- ======= Footer ======= -->

@stop

@push('js')

<script src="{{asset('assets/frontend/js/principal.js')}}"></script>
  
@endpush
