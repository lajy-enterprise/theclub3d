@extends('layouts.frontend.app')

@section('title', 'Principal')

@push('css')
  <link href="{{asset('assets/frontend/css/paises/style.css')}}" rel="stylesheet">
@endpush

@section('content')

  <!--Section: Paises-->
  <section id="Paises" class="text-center container">

    <h1 class="display-4 font-weight-bold" style="color: #ab4967ff"><strong>Welcome</strong></h1>
    <h4 class="my-4 h4 font-weight-bold" style="color: #ab4967ff"><strong>Choose your country</strong></h4>

    <div class="row my-3">

      <!-- Colombia Card -->
      <div class="col-lg-2 col-md-3 col-sm-4 col-xs-4 col-4 mb-4">
        <div class="card card-color shadow-2-strong d-flex align-items-center justify-content-center text-center">
          <div
            class="bg-image-card hover-overlay ripple"
            data-mdb-ripple-color="light"
          >
            <img src="{{asset('assets/frontend/img/banderas/colombia.png')}}" class="img-fluid" />
            <a href="#!" data-toggle="modal" data-target="#ColombiaModal">
              <div
                class="mask"
                style="background-color: rgba(251, 251, 251, 0.15)"
              ></div>
            </a>
          </div>
          <div class="card-body">
            <h5 class="card-title">Colombia</h5>
            
            <button type="button" class="btn btn-color text-white p-1" data-toggle="modal" data-target="#ColombiaModal">
              Seleccionar
            </button>
            
            
          </div>
        </div>
      </div>          
      <!--/ Colombia Card -->
      <!-- Colombia Modal -->
      <div class="modal fade" id="ColombiaModal" tabindex="-1000" role="dialog" aria-labelledby="ColombiaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered card-estados" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-center" id="ColombiaModalLabel">Selecciona una Provincia</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="card-text">
                <div class="row">
                  <div class="col-3">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item  "><a class="text-dark" href="{{route('liga.index')}}">Amazonas</a></li>
                      <li class="list-group-item  "><a class="text-dark" href="{{route('liga.index')}}">Antioquia</a></li>
                      <li class="list-group-item  "><a class="text-dark" href="{{route('liga.index')}}">Arauca</a></li>
                      <li class="list-group-item  "><a class="text-dark" href="{{route('liga.index')}}">Atlántico</a></li>
                      <li class="list-group-item  "><a class="text-dark" href="{{route('liga.index')}}">Bogotá</a></li>
                      <li class="list-group-item  "><a class="text-dark" href="{{route('liga.index')}}">Bolívar</a></li>
                      <li class="list-group-item  "><a class="text-dark" href="{{route('liga.index')}}">Boyacá</a></li>
                      <li class="list-group-item  "><a class="text-dark" href="{{route('liga.index')}}">Caldas</a></li>
                      
                    </ul>
                  </div>
                  <div class="col-3">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item  "><a class="text-dark" href="{{route('liga.index')}}">Caquetá</a></li>
                      <li class="list-group-item  "><a class="text-dark" href="{{route('liga.index')}}">Casanare</a></li>
                      <li class="list-group-item  "><a class="text-dark" href="{{route('liga.index')}}">Cauca</a></li>
                      <li class="list-group-item  "><a class="text-dark" href="{{route('liga.index')}}">Cesar</a></li>
                      <li class="list-group-item  "><a class="text-dark" href="{{route('liga.index')}}">Chocó</a></li>
                      <li class="list-group-item  "><a class="text-dark" href="{{route('liga.index')}}">Córdoba</a></li>
                      <li class="list-group-item  "><a class="text-dark" href="{{route('liga.index')}}">Cundinamarca</a></li>
                      <li class="list-group-item  "><a class="text-dark" href="{{route('liga.index')}}">Guainía</a></li>
                      <li class="list-group-item  "><a class="text-dark" href="{{route('liga.index')}}">Guaviare</a></li>
                      
                    </ul>
                  </div>
                  <div class="col-3">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item  "><a class="text-dark" href="{{route('liga.index')}}">Huila</a></li>
                      <li class="list-group-item  "><a class="text-dark" href="{{route('liga.index')}}">La Guajira</a></li>
                      <li class="list-group-item  "><a class="text-dark" href="{{route('liga.index')}}">Magdalena</a></li>
                      <li class="list-group-item  "><a class="text-dark" href="{{route('liga.index')}}">Meta</a></li>
                      <li class="list-group-item  "><a class="text-dark" href="{{route('liga.index')}}">Nariño</a></li>
                      <li class="list-group-item  "><a class="text-dark" href="{{route('liga.index')}}">Norte de Santander</a></li>
                      <li class="list-group-item  "><a class="text-dark" href="{{route('liga.index')}}">Putumayo</a></li>
                      <li class="list-group-item  "><a class="text-dark" href="{{route('liga.index')}}">Quindío</a></li>
                      <li class="list-group-item  "><a class="text-dark" href="{{route('liga.index')}}">Risaralda</a></li>
                      
                    </ul>
                  </div>
                  <div class="col-3">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item  "><a class="text-dark" href="{{route('liga.index')}}">San Andrés y Providencia</a></li>
                      <li class="list-group-item  "><a class="text-dark" href="{{route('liga.index')}}">Santander</a></li>
                      <li class="list-group-item  "><a class="text-dark" href="{{route('liga.index')}}">Sucre</a></li>
                      <li class="list-group-item  "><a class="text-dark" href="{{route('liga.index')}}">Tolima</a></li>
                      <li class="list-group-item  "><a class="text-dark" href="{{route('liga.index')}}">Valle del Cauca</a></li>
                      <li class="list-group-item  "><a class="text-dark" href="{{route('liga.index')}}">Vaupés</a></li>
                      <li class="list-group-item  "><a class="text-dark" href="{{route('liga.index')}}">Vichada</a></li>
                      <li class="list-group-item  "><a class="text-dark" href="{{route('liga.index')}}">Colombia</a></li>
                    </ul>
                  </div>
                  
                </div>                
                
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
      <!--/ Colombia Modal -->

<!--/ ------------------------------- -->


      <!-- venezuela Card -->
      <div class="col-lg-2 col-md-3 col-sm-4 col-xs-4 col-4 mb-4">
        <div class="card card-color shadow-2-strong d-flex align-items-center justify-content-center text-center">
          <div
            class="bg-image-card hover-overlay ripple"
            data-mdb-ripple-color="light"
          >
            <img src="{{asset('assets/frontend/img/banderas/venezuela.png')}}" class="img-fluid" />
            <a href="#!" data-toggle="modal" data-target="#venezuelaModal">
              <div
                class="mask"
                style="background-color: rgba(251, 251, 251, 0.15)"
              ></div>
            </a>
          </div>
          <div class="card-body">
            <h5 class="card-title">Venezuela</h5>
            <a href="#!" class="btn btn-color text-white p-1" data-toggle="modal" data-target="#venezuelaModal">
              Seleccionar
            </a>
          </div>
        </div>
      </div>
      <!--/ venezuela Card -->
      <!-- venezuela Modal -->
      <div class="modal fade" id="venezuelaModal" tabindex="-1000" role="dialog" aria-labelledby="venezuelaModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-center" id="venezuelaModalLabel">estados o provincias de Venezuela</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                                  
              <p class="card-text">
                estados o provincias de Venezuela
              </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
      <!--/ venezuela Modal -->

      <!-- dominicana Card -->
      <div class="col-lg-2 col-md-3 col-sm-4 col-xs-4 col-4 mb-4">
        <div class="card card-color shadow-2-strong d-flex align-items-center justify-content-center text-center">
          <div
            class="bg-image-card hover-overlay ripple"
            data-mdb-ripple-color="light"
          >
            <img src="{{asset('assets/frontend/img/banderas/dominicana.png')}}" class="img-fluid" />
            <a href="#!" data-toggle="modal" data-target="#dominicanaModal">
              <div
                class="mask"
                style="background-color: rgba(251, 251, 251, 0.15)"
              ></div>
            </a>
          </div>
          <div class="card-body">
            <h5 class="card-title">Dominicana</h5>
            <a href="#!" class="btn btn-color text-white p-1" data-toggle="modal" data-target="#dominicanaModal">
              Seleccionar
            </a>
          </div>
        </div>
      </div>
      <!--/ dominicana Card -->
      <!-- dominicana Modal -->
      <div class="modal fade" id="dominicanaModal" tabindex="-1000" role="dialog" aria-labelledby="dominicanaModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-center" id="dominicanaModalLabel">estados o provincias de Republica Dominicana</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
              <p class="card-text">
                estados o provincias de Republica Dominicana.
              </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
      <!--/ dominicana Modal -->

      <!-- Brazil Card -->
      <div class="col-lg-2 col-md-3 col-sm-4 col-xs-4 col-4 mb-4">
        <div class="card card-color shadow-2-strong d-flex align-items-center justify-content-center text-center">
          <div
            class="bg-image-card hover-overlay ripple"
            data-mdb-ripple-color="light"
          >
            <img src="{{asset('assets/frontend/img/banderas/brazil.png')}}" class="img-fluid" />
            <a href="#!" data-toggle="modal" data-target="#BrazilModal">
              <div
                class="mask"
                style="background-color: rgba(251, 251, 251, 0.15)"
              ></div>
            </a>
          </div>
          <div class="card-body">
            <h5 class="card-title">Brazil</h5>
            <a href="#!" class="btn btn-color text-white p-1" data-toggle="modal" data-target="#BrazilModal">
              Seleccionar
            </a>
          </div>
        </div>
      </div>
      <!--/ Brazil Card -->
      <!-- Brazil Modal -->
      <div class="modal fade" id="BrazilModal" tabindex="-1000" role="dialog" aria-labelledby="BrazilModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-center" id="BrazilModalLabel">estados o provincias de brazil</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                                  
              <p class="card-text">
                estados o provincias de brazil.
              </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
      <!--/ Brazil Modal -->

      <!-- Brazil Card -->
      <div class="col-lg-2 col-md-3 col-sm-4 col-xs-4 col-4 mb-4">
        <div class="card card-color shadow-2-strong d-flex align-items-center justify-content-center text-center">
          <div
            class="bg-image-card hover-overlay ripple"
            data-mdb-ripple-color="light"
          >
            <img src="{{asset('assets/frontend/img/banderas/brazil.png')}}" class="img-fluid" />
            <a href="#!" data-toggle="modal" data-target="#BrazilModal">
              <div
                class="mask"
                style="background-color: rgba(251, 251, 251, 0.15)"
              ></div>
            </a>
          </div>
          <div class="card-body">
            <h5 class="card-title">Brazil</h5>
            <a href="#!" class="btn btn-color text-white p-1" data-toggle="modal" data-target="#BrazilModal">
              Seleccionar
            </a>
          </div>
        </div>
      </div>
      <!--/ Brazil Card -->
      <!-- Brazil Modal -->
      <div class="modal fade" id="BrazilModal" tabindex="-1000" role="dialog" aria-labelledby="BrazilModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-center" id="BrazilModalLabel">estados o provincias de brazil</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                                  
              <p class="card-text">
                estados o provincias de brazil.
              </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
      <!--/ Brazil Modal -->

      <!-- Brazil Card -->
      <div class="col-lg-2 col-md-3 col-sm-4 col-xs-4 col-4 mb-4">
        <div class="card card-color shadow-2-strong d-flex align-items-center justify-content-center text-center">
          <div
            class="bg-image-card hover-overlay ripple"
            data-mdb-ripple-color="light"
          >
            <img src="{{asset('assets/frontend/img/banderas/brazil.png')}}" class="img-fluid" />
            <a href="#!" data-toggle="modal" data-target="#BrazilModal">
              <div
                class="mask"
                style="background-color: rgba(251, 251, 251, 0.15)"
              ></div>
            </a>
          </div>
          <div class="card-body">
            <h5 class="card-title">Brazil</h5>
            <a href="#!" class="btn btn-color text-white p-1" data-toggle="modal" data-target="#BrazilModal">
              Seleccionar
            </a>
          </div>
        </div>
      </div>
      <!--/ Brazil Card -->
      <!-- Brazil Modal -->
      <div class="modal fade" id="BrazilModal" tabindex="-1000" role="dialog" aria-labelledby="BrazilModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-center" id="BrazilModalLabel">estados o provincias de brazil</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                                  
              <p class="card-text">
                estados o provincias de brazil.
              </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
      <!--/ Brazil Modal -->
      

    </div>

  </section>
    <!--Section: Paises-->
    
  
@stop

@push('js')
  
  <script src="{{asset('assets/frontend/js/paises/script.js')}}"></script>
  
@endpush

