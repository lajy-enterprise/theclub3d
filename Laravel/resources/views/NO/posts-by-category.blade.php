@extends('layouts.frontend.app')

@section('title', 'All Posts')

@push('css')
  <link href="{{asset('assets/frontend/css/category/styles.css')}}" rel="stylesheet">
  
@endpush

@section('content')
    <div class="slider display-table center-text">
      <h1 class="title display-table-cell">
        <b>{{$category->name}}</b>
      </h1>
    </div><!-- slider -->

    <section id="Ligas" class="container my-4">

      <div class="row delete-strong-0">
        <div class="col-md-12">
          <!-- tarjeta -->
          @forelse ($category->posts as $post)
            <div class="card card-color-ligas mb-3">
              <div class="row no-gutters delete-strong-125">
                <div class="col-md-4 col-sm-5 col-xs-6 d-flex justify-content-center align-items-center">
                    <div id="carousel{{$post->id}}" class="carousel slide p-3" data-ride="carousel">
  
                      @php ($imagenes = $post->image)
                      @php ($imageArray = explode(" | ", $imagenes))
                      @php ($count = count($imageArray))
                      
                      <ol class="carousel-indicators">
                        @for ($i = 0; $i < $count; $i++)
                          @if($i == 0)
                            <li data-target="#carousel{{$post->id}}" data-slide-to="{{$i}}" class="active"></li>
                          @else
                            <li data-target="#carousel{{$post->id}}" data-slide-to="{{$i}}"></li>
                          @endif
                        @endfor
                      </ol>
                      <div class="carousel-inner">
                        @for ($i = 0; $i < $count; $i++)
                          @if($i == 0)
                            <div class="carousel-item active">
                              <img src="{{asset('storage/post')}}/{{$imageArray[$i]}}" alt="{{$post->slug}}" class="carrouselligas">
                            </div>
                          @else
                            <div class="carousel-item">
                              <img src="{{asset('storage/post')}}/{{$imageArray[$i]}}" alt="{{$post->slug}}" class="carrouselligas">
                            </div>
                          @endif
                        @endfor
                      </div>
                      <a class="carousel-control-prev" href="#carousel{{$post->id}}" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carousel{{$post->id}}" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    
                    </div>
                </div>
                <div class="col-md-6 col-sm-7 col-xs-6">
                    
                  <div class="card-body text-center text-sm-center text-md-start">
                    <a class="card-title pb-0 mb-0" href="{{route('ligas.details', $post->slug)}}">
                      <h5><strong>{{$post->title}}<strong></h5>
                    </a>
                    <br>
                    <small class="text-muted" style="font-size:small">Publicado por:
                      <strong>
                        <a href="{{route('ligas.by.author', $post->user->id)}}" class="text-bold">
                        @if($post->user->show_name === true)
                        {{$post->user->name}}
                        @else
                        {{$post->user->username}}
                        @endif
                        </a>
                      </strong>
                      en {{$post->created_at->toFormattedDateString()}}
                    </small> | <small class="text-muted" style="font-size:small">
                      Edad: <strong>{{$post->edad}}</strong>Años.
                    </small>
  
                    <p class="card-text my-2">{!! str_limit(strip_tags($post->body), $limit = 50, $end = '...') !!}</p>
                    
                    @php ($badges = array(
                      'badge-primary',
                      'badge-secondary',
                      'badge-success',
                      'badge-info',
                      'badge-dark',
                      'badge-primary',
                      'badge-secondary',
                      'badge-success',
                      'badge-info',
                      'badge-dark',
                      ))
                      
                    
                    <div class="d-flex mt-2">
                      <div class="d-inline mr-1">
                        <h4><small style="font-size:small">Categorias:</small></h4>
                      </div>
                      <div class="d-inline">
                        @for ($i = 0; $i <= 20; $i++)
                          
                          @if(isset($post->categories[$i]))
                            <span class="badge p-0 {{ $badges[$i] }}">
                              <a class="badge my-1" href="{{route('ligas.by.category', $post->categories[$i]->slug)}}">{{ $post->categories[$i]->name }}</a>
                            </span>
                          @endif
  
                        @endfor
                      </div>
                    </div>
                      
                    <div class="d-flex m-0">
                      <div class="d-inline mr-1">
                        <h4><small style="font-size:small">Etiquetas:</small></h4>
                      </div>
                      <div class="d-inline">
                        @for ($i = 0; $i <= 20; $i++)
                          
                          @if(isset($post->tags[$i]))
                            <span class="badge {{ $badges[$i] }}">
                            <a href="{{route('ligas.by.tag', $post->tags[$i]->slug)}}">{{ $post->tags[$i]->name }}</a>
                            </span>
                          @endif
                          
                        @endfor
                      </div>
                    </div>
  
                  </div>
                
                </div>
                
                <div class="text-center mt-md-4 mt-sm-2 mt-xs-2">
                  <h4>Contactos</h4>
                  @php ($titulo = str_replace(" ", "%20", $post->title))
                  <a href="https://api.whatsapp.com/send?phone=+{{$post->telefono}}&text=Hola,%20Te%20escribo%20porque%20vi%20tu%20anuncio%20en%20Kokolizo.com%20->%20{{$titulo}}%20<-%20y%20quiero%20saber%20mas%20sobre%20lo%20que%20anuncias."
                    target="_blank"
                    class="btn btn-outline-success p-1 mb-md-2 text-white"
                    style="font-size: x-small">
                    whatsapp
                  </a>
                  <a
                    class="btn btn-outline-primary p-1 mb-md-2 text-white"
                    style="font-size: x-small"
                    data-toggle="collapse" href="#collapseTelefono{{$post->id}}" role="button" aria-expanded="false" aria-controls="collapseTelefono{{$post->id}}">
                    telefono:
                  </a>
                  <div class="collapse" id="collapseTelefono{{$post->id}}">
                    <div class="card card-body p-0 m-0">
                      <p style="font-size: x-small">{{$post->telefono}}</p>
                    </div>
                  </div>
                  
                </div>
                
                
              </div>
            </div>
            @empty
            <div class="col-12">
                
              <p class="pt-3 text-center">Aun no an publicado en la Categoria
              <b class"fw-bold">{{$category->name}}</b> se el primero</p>
  
              @guest
  
                <div class="text-center">
                
                  <p class="mb-2">Ingresa o Registrate para publicar tu anuncio</p>
  
                  <a href="{{route('login')}}" class="btn btn-color text-white mt-4">
                      Ingresar
                  </a>
                  
                  <a href="{{route('register')}}" class="btn btn-color text-white mt-4">
                      Registrarse
                  </a>
                  
                </div>
  
              @else
  
                <div class="text-center">
                  
                  <p class="mb-2">Ve al Panel de Usuario para publicar tu anuncio</p>
  
                  <a href="{{Auth::user()->role->id == 1 ? route('admin.dashboard') : route('author.dashboard')}}"
                    class="btn btn-color text-white mt-4">
                    Panel de Usuario
                  </a>
                                  
                </div>
  
              @endguest
            
            </div>
          @endforelse
          <!--/ tarjeta -->
  
          {{-- {{$tag->posts->links()}} --}}
  
        </div>
      </div>

  </section><!-- section -->

@stop

@push('js')
  <script src="{{asset('assets/frontend/js/swiper.js')}}"></script>
  <script src="{{asset('assets/frontend/js/scripts.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script>
      function fav() {
          Swal.fire({
              position: 'top-end',
              icon: 'info',
              title: 'Oops...',
              text: 'Please login to add as your Favourite!'
          })
      }

      function submitFavouriteForm(id) {
          event.preventDefault();
          $(`#favourite-form-${id}`).submit();
      }
  </script>
@endpush
