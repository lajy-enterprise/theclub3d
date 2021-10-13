@extends('layouts.frontend.app')

@section('title', 'Register')

@push('css')
   <link href="{{asset('assets/frontend/css/styles2.css')}}" rel="stylesheet">
@endpush

@section('content')
    
    <!-- ======= Form ======= -->

  <section>
    <div class="container me-md-auto text-center">

        <div class="me-md-auto text-center" >
          <h1 class= "titulo" >Sign up free</h1>
        </div>
          
        <div class="me-md-auto text-center">
             <h6 class="info">Enter your details and discover a new adventure</h6>
            <p class="info">Data with an asterisk (*) are required </p>
        </div>

      
          <form method="POST" action="{{ route('register') }}">
            @csrf
              <div class="row">
                  <div class="form-group col-md-3">
                      <label class="titulo" for="username">{{ __('Usuario') }}</label>
                      <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                  </div>

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  
                 
                  <div class="form-group col-md-3">
                      <label class="titulo" for="fecha_nacimiento">*Date of birth</label>
                      <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="" required >
                  </div>

                  @error('fecha_nacimiento')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                  
      
                  <div class="form-group col-md-3">
                      <label for="email" class="titulo">{{ __('Correo') }}</label>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                  </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  
                   <div class="form-group col-md-3" >
                        <label for="password" class="titulo">{{ __('Password') }}</label><br>
                        <input 
                            id="password"
                            type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            name="password"
                            required
                            autocomplete="password">
                   </div>
                    @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror

              </div>
                    <br>
              <div class="row">
              
                <div class="form-group col-md-5">

                  <label class="col-form-label titulo" for="gender">Gender:</label>

                </div> 
                    

                <div class="form-check form-check-inline col-2">
                  <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="1">
                  <label class="form-check-label" for="inlineRadio1">Male</label>
                </div>
                <div class="form-check form-check-inline col-2">
                  <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="2">
                  <label class="form-check-label" for="inlineRadio2">Female</label>
                </div>
                <div class="form-check form-check-inline col-2">
                  <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="3">
                  <label class="form-check-label" for="inlineRadio3">Other</label>
                </div>

                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
            </div>

            <br>

      
              <div class="form-group col-md-11 me-md-auto text-center align-items-center" >
                  <input class="boton" type="submit" name="submit" value="Sign in">
              </div>
      
          </form>
          
        </div>
    
  </section>

  
 
<!-- ======= FormEnd ======= -->

@endsection

@push('js')
    <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endpush
