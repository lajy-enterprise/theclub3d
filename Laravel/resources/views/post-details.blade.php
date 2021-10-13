@extends('layouts.frontend.app')

@section('title')
  {{$post->title}}
@stop

@push('css')
  <link href="{{asset('assets/frontend/css/styles.css')}}" rel="stylesheet">
  <link href="{{asset('assets/frontend/css/subtools.css')}}" rel="stylesheet">
@endpush

@section('content')
  
  <section id="about" class="about pt-3">

    <div class="post-info">

      <div class="">

        <p class="name d-inline m-4"><b>Posted on:</b></p>
        <h6 class="date d-inline">
          {{$post->created_at->toFormattedDateString()}}
        </h6>

        <br>

        <p class="name d-inline m-4"><b>Category:</b></p>
        <h6 class="date d-inline">
          {{$post->categories[0]->name}}
        </h6>

        <br>

        <h3 class="title mt-4 text-center">
          <b>{{$post->title}}</b>
        </h3>

      </div>

    </div><!-- post-info -->

    <div class="container new">
      <div class="row">
        <div class="my-3 col-12">
          {!! $post->body !!}
        </div>
      </div>

      <div class="col-10 col-sm-10 col-md-10 d-flex justify-content-center align-items-center">
        
          <div class="img-fluid">
            <img src="{{asset('storage/post')}}/{{$post->image}}" alt="{{$post->slug}}" class="img-fluid">
          </div>
              
      </div>

    </div>

  </section>


@stop

@push('js')
  
  <script src="{{asset('assets/frontend/js/scripts.js')}}"></script>
  
@endpush
