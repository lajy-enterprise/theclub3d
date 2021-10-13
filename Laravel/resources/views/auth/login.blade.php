@extends('layouts.frontend.app')

@section('title', 'Login')

@push('css')
    <link href="{{asset('assets/frontend/css/styles2.css')}}" rel="stylesheet">
@endpush

@section('content')
    
    <section>
        
        <div class="container me-md-auto text-center">

            <div class="me-md-auto text-center" >
              <h1 class= "titulo" >Log in</h1>
            </div>
              
            <div class="me-md-auto text-center">
                 <h6 class="info">Enter your details and discover a new adventure</h6>
                <p class="info">Data with an asterisk (*) are required </p>
            </div> 


            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="row">
                  
                  <div class="form-group col-md-6">
                      <label for="email" class="titulo">{{ __('Correo') }} (*)</label>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                  </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  
                   <div class="form-group col-md-6" >
                        <label for="password" class="titulo">{{ __('Password') }} (*)</label><br>
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

                
                <div class="form-group row my-3">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input p-0 m-0" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label p-0 m-0" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                {{-- ------------- --}}

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-2">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Olvidaste Tu Contraseña') }}
                            </a>
                        @endif
                    </div>
                </div>
                
            </form>
                    </div><!-- post-wrapper -->
                </div><!-- col-sm-8 col-sm-offset-2 -->
            </div><!-- row -->

        </div><!-- container -->
    </section><!-- section -->
@endsection

