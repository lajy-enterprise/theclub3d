@extends('layouts.frontend.app')

@section('title', 'All Posts')

@push('css')
  <link href="{{asset('assets/frontend/css/category/styles.css')}}" rel="stylesheet">
  
@endpush

@section('content')
  <div class="">

    <div class="contenedorMDE">
      <h4 class="Mde text-center mb-1">
        Comienza a Divertirte. . . . .
        <span>&#160;</span>
      </h4>
    </div>
    
    <hr class="my-5" />


  <!--Section: ligas-->
  <section id="Ligas" class="container">
    <div class="row">
      <div class="col-md-12">
        <!-- tarjeta Andrea -->
        @foreach ($posts as $post)
          <div class="card card-color-ligas mb-3">
            <div class="row no-gutters">
              <div class="col-md-4 col-sm-5 col-xs-6 d-flex justify-content-center align-items-center">
                  <div id="carouselAndrea" class="carousel slide p-3" data-ride="carousel">

                    @php ($imagenes = $post->image)
                    @php ($imageArray = explode(" | ", $imagenes))
                    @php ($count = count($imageArray))
                    
                    <ol class="carousel-indicators">
                      @for ($i = 0; $i < $count; $i++)
                        @if($i == 0)
                          <li data-target="#carouselAndrea" data-slide-to="{{$i}}" class="active"></li>
                        @else
                          <li data-target="#carouselAndrea" data-slide-to="{{$i}}"></li>
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
                    <a class="carousel-control-prev" href="#carouselAndrea" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselAndrea" role="button" data-slide="next">
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
                  <small class="text-muted" style="font-size:small">Publicado por: <strong><a href="{{route('ligas.by.author', $post->user->id)}}">{{$post->user->name}}</a></strong>
                    en {{$post->created_at->toFormattedDateString()}} </small> | <small class="text-muted" style="font-size:small">
                    Edad: <strong>{{$post->edad}}</strong>Años.
                  </small>

                  <p class="card-text my-2">{!! str_limit(strip_tags($post->body), $limit = 50, $end = '...') !!}</p>
                  
                  @php ($badges = array(
                    'badge-primary',
                    'badge-secondary',
                    'badge-success',
                    'badge-danger',
                    'badge-warning',
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
                <a href="https://api.whatsapp.com/send?phone=+{{$post->telefono}}&text=Hola,%20Te%20escribo%20porque%20te%20e%20visto%20en%20Kokolizo.com%20->%20{{$titulo}}%20<-%20y%20quiero%20saber%20mas%20sobre%20tu%20anuncio."
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
        @endforeach
        <!--/ tarjeta Andrea -->

        {{$posts->links()}}

        <!-- tarjeta Juana -->
        <div class="card card-color-ligas mb-3">
          <div class="row no-gutters">
            <div class="col-md-4 col-sm-4 col-xs-6 d-flex justify-content-center align-items-center">
                <div id="carouselJuana" class="carousel slide p-3" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselJuana" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselJuana" data-slide-to="1"></li>
                    <li data-target="#carouselJuana" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="{{asset('assets/frontend/img/carrouselligas/1.jpg')}}" class="carrouselligas" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="{{asset('assets/frontend/img/carrouselligas/2.jpg')}}" class="carrouselligas" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="{{asset('assets/frontend/img/carrouselligas/3.jpg')}}" class="carrouselligas" alt="...">
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselJuana" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselJuana" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                <a href="#" class="badge badge-primary">Primary</a>
                <a href="#" class="badge badge-secondary">Secondary</a>
                <a href="#" class="badge badge-success">Success</a>
                <a href="#" class="badge badge-danger">Danger</a>
                <a href="#" class="badge badge-warning">Warning</a>
                <a href="#" class="badge badge-info">Info</a>
                <a href="#" class="badge badge-light">Light</a>
                <a href="#" class="badge badge-dark">Dark</a>
              </div>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-6">
              <div class="card-body">
                <a href="#!" >whatsapp</a>
                <a href="#!" >telefono</a>
              </div>
            </div>
          </div>
        </div>
        <!--/ tarjeta Juana -->

      </div>
    </div>

  </section>
  <!--Section: ligas-->

  <hr class="my-5" />

  <!--Section: Categorias-->
  <section id="Categorias" class="container text-center">

    <h4 class="mb-5"><strong>Elige una Categoria</strong></h4>

    <div class="row">
      <!-- Casual Card -->
      <div class="col-lg-4 col-md-4 mu-5 mb-5">
        <div class="card bg-transparent d-flex align-items-center justify-content-center text-center">
          <div
            class="hover-overlay ripple"
            data-mdb-ripple-color="light"
          >
            <img src="{{asset('assets/frontend/img/Ilustraciones/Casual.svg')}}" class="img-fluid imgCategorias" />
            <a href="#!">
              <div
                class="mask"
                style="background-color: rgba(251, 251, 251, 0.15)"
              ></div>
            </a>
            <a class="text-dark card-title d-block" href="#!"><strong>Encuentro Casual</strong></a>
          </div>
          
        </div>
      </div>          
      <!--/ Casual Card -->
      
      <!-- Escorts Card -->
      <div class="col-lg-4 col-md-4 mu-5 mb-5">
        <div class="card bg-transparent d-flex align-items-center justify-content-center text-center">
          <div
            class="hover-overlay ripple"
            data-mdb-ripple-color="light"
          >
            <img src="{{asset('assets/frontend/img/Ilustraciones/Escorts.svg')}}" class="img-fluid imgCategorias" />
            <a href="#!">
              <div
                class="mask"
                style="background-color: rgba(251, 251, 251, 0.15)"
              ></div>
            </a>
            <a class="text-dark card-title d-block" href="#!"><strong>Escorts</strong></a>
          </div>
          
        </div>
      </div>          
      <!--/ Escorts Card -->

      <!-- Masajes Card -->
      <div class="col-lg-4 col-md-4 mu-5 mb-5">
        <div class="card bg-transparent d-flex align-items-center justify-content-center text-center">
          <div
            class="hover-overlay ripple"
            data-mdb-ripple-color="light"
          >
            <img src="{{asset('assets/frontend/img/Ilustraciones/masaje.svg')}}" class="img-fluid imgCategorias" />
            <a href="#!">
              <div
                class="mask"
                style="background-color: rgba(251, 251, 251, 0.15)"
              ></div>
            </a>
            <a class="text-dark card-title d-block" href="#!"><strong>Masajes Eroticos</strong></a>
          </div>
          
        </div>
      </div>          
      <!--/ Masajes Card -->
      
      <!-- trans Card -->
      <div class="col-lg-4 col-md-4 mu-5 mb-5">
        <div class="card bg-transparent d-flex align-items-center justify-content-center text-center">
          <div
            class="hover-overlay ripple"
            data-mdb-ripple-color="light"
          >
            <img src="{{asset('assets/frontend/img/Ilustraciones/travesti.svg')}}" class="img-fluid imgCategorias" />
            <a href="#!">
              <div
                class="mask"
                style="background-color: rgba(251, 251, 251, 0.15)"
              ></div>
            </a>
            <a class="text-dark card-title d-block" href="#!"><strong>trans y travestis</strong></a>
          </div>
          
        </div>
      </div>          
      <!--/ trans Card -->
      
      <!-- Chaperos Card -->
      <div class="col-lg-4 col-md-4 mu-5 mb-5">
        <div class="card bg-transparent d-flex align-items-center justify-content-center text-center">
          <div
            class="hover-overlay ripple"
            data-mdb-ripple-color="light"
          >
            <img src="{{asset('assets/frontend/img/Ilustraciones/chapero2.svg')}}" class="img-fluid imgCategorias" />
            <a href="#!">
              <div
                class="mask"
                style="background-color: rgba(251, 251, 251, 0.15)"
              ></div>
            </a>
            <a class="text-dark card-title d-block" href="#!"><strong>Chaperos</strong></a>
          </div>
          
        </div>
      </div>          
      <!--/ Chaperos Card -->

      <!-- gigolos Card -->
      <div class="col-lg-4 col-md-4 mu-5 mb-5">
        <div class="card bg-transparent d-flex align-items-center justify-content-center text-center">
          <div
            class="hover-overlay ripple"
            data-mdb-ripple-color="light"
          >
            <img src="{{asset('assets/frontend/img/Ilustraciones/gigolo.svg')}}" class="img-fluid imgCategorias" />
            <a href="#!">
              <div
                class="mask"
                style="background-color: rgba(251, 251, 251, 0.15)"
              ></div>
            </a>
            <a class="text-dark card-title d-block" href="#!"><strong>Gigolos</strong></a>
          </div>
          
        </div>
      </div>          
      <!--/ gigolos Card -->

      <!-- Contactos Card -->
      <div class="col-lg-4 col-md-4 mu-5 mb-5">
        <div class="card bg-transparent d-flex align-items-center justify-content-center text-center">
          <div class="hover-overlay ripple" data-mdb-ripple-color="light" >
            <img src="{{asset('assets/frontend/img/Ilustraciones/contactos.svg')}}" class="img-fluid imgCategorias" />
            <a href="#!">
              <div
                class="mask"
                style="background-color: rgba(251, 251, 251, 0.15)"
              ></div>
            </a>
            <a class="text-dark card-title d-block" href="#!"><strong>Contactos</strong></a>
          </div>
          
        </div>
      </div>          
      <!--/ Contactos Card -->

      <!-- Milefans Card -->
      <div class="col-lg-4 col-md-4 mu-5 mb-5">
        <div class="card bg-transparent d-flex align-items-center justify-content-center text-center">
          <div
            class="hover-overlay ripple"
            data-mdb-ripple-color="light"
          >
            <img src="{{asset('assets/frontend/img/Ilustraciones/milefans.svg')}}" class="img-fluid imgCategorias" />
            <a href="#!">
              <div
                class="mask"
                style="background-color: rgba(251, 251, 251, 0.15)"
              ></div>
            </a>
            <a class="text-dark card-title d-block" href="#!"><strong>Milefans</strong></a>
          </div>
          
        </div>
      </div>          
      <!--/ Milefans Card -->

      <!-- Geys Card -->
      <div class="col-lg-4 col-md-4 mu-5 mb-5">
        <div class="card bg-transparent d-flex align-items-center justify-content-center text-center">
          <div
            class="hover-overlay ripple"
            data-mdb-ripple-color="light"
          >
            <img src="{{asset('assets/frontend/img/Ilustraciones/Geys.svg')}}" class="img-fluid imgCategorias" />
            <a href="#!">
              <div
                class="mask"
                style="background-color: rgba(251, 251, 251, 0.15)"
              ></div>
            </a>
            <a class="text-dark card-title d-block" href="#!"><strong>Geys</strong></a>
          </div>
          
        </div>
      </div>          
      <!--/ Geys Card -->

      <!-- Habitaciones Card -->
      <div class="col-lg-4 col-md-4 mu-5 mb-5">
        <div class="card bg-transparent d-flex align-items-center justify-content-center text-center">
          <div
            class="hover-overlay ripple"
            data-mdb-ripple-color="light"
          >
            <img src="{{asset('assets/frontend/img/Ilustraciones/habitaciones.svg')}}" class="img-fluid imgCategorias" />
            <a href="#!">
              <div
                class="mask"
                style="background-color: rgba(251, 251, 251, 0.15)"
              ></div>
            </a>
            <a class="text-dark card-title d-block" href="#!"><strong>Habitaciones y Plazas</strong></a>
          </div>
          
        </div>
      </div>          
      <!--/ Habitaciones Card -->

      <!-- Virtuales Card -->
      <div class="col-lg-4 col-md-4 mu-5 mb-5">
        <div class="card bg-transparent d-flex align-items-center justify-content-center text-center">
          <div
            class="hover-overlay ripple"
            data-mdb-ripple-color="light"
          >
            <img src="{{asset('assets/frontend/img/Ilustraciones/ServiciosVirtuales.svg')}}" class="img-fluid imgCategorias" />
            <a href="#!">
              <div
                class="mask"
                style="background-color: rgba(251, 251, 251, 0.15)"
              ></div>
            </a>
            <a class="text-dark card-title d-block" href="#!"><strong>Servicios Virtuales</strong></a>
          </div>
          
        </div>
      </div>          
      <!--/ Virtuales Card -->

      <!-- shop Card -->
      <div class="col-lg-4 col-md-4 mu-5 mb-5">
        <div class="card bg-transparent d-flex align-items-center justify-content-center text-center">
          <div
            class="hover-overlay ripple"
            data-mdb-ripple-color="light"
          >
            <img src="{{asset('assets/frontend/img/Ilustraciones/SexShop.svg')}}" class="img-fluid imgCategorias" />
            <a href="#!">
              <div
                class="mask"
                style="background-color: rgba(251, 251, 251, 0.15)"
              ></div>
            </a>
            <a class="text-dark card-title d-block" href="#!"><strong>Sex Shop</strong></a>
          </div>
          
        </div>
      </div>          
      <!--/ shop Card -->
      
    </div>

  </section>
  <!--Section: Categorias-->

  <hr class="my-5" />

</div>

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
