<!-- ======= Header ======= -->
<header id="header">
  <div class="container d-flex align-items-center justify-content-between">

    <div class="logo">
     <!-- <h1><a href="index.html">Bocor<span>.</span></a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="{{route('mainlanding')}}"><img src="{{asset('assets/frontend/img/Logo.png')}}" alt="Logo" class="img-fluid"></a>
    </div>

    <nav class="navbar navbar-expand-md">

      <div class="collapse navbar-collapse" id="navbar-coll">

      <ul class="navbar-nav mr-auto">
        @if ( Route::currentRouteName() !== "mainlanding" )
          @if ( Route::currentRouteName() !== "login" )
            @if ( Route::currentRouteName() !== "register" )
              @if ( Route::currentRouteName() !== "mainconvert" )

                @if ( Route::currentRouteName() !== "home.index" )

                  <li class="nav-item">
                    <a class="register"
                    href="{{route('home.index')}}"
                    aria-current="page"
                    >Home</a>
                  </li>

                @endif

                @if ( Route::currentRouteName() !== "news.index" )

                  <li class="nav-item">
                    <a class="register"
                    href="{{route('news.index')}}"
                    aria-current="page"
                    >News</a>
                  </li>

                @endif
                  

                @if ( Route::currentRouteName() !== "herra.index" )

                  <li class="nav-item">
                    <a class="register"
                    href="{{route('herra.index')}}"
                    aria-current="page"
                    >Tools</a>
                  </li>
                
                @endif
              @endif
            @endif
          @endif
        @endif

        @if ( Route::currentRouteName() == "mainconvert" )

          <li class="nav-item">
            <a class="register"
            href="{{route('home.index')}}"
            aria-current="page"
            >Home</a>
          </li>
        
        @endif

        @guest

          @if ( Route::currentRouteName() !== "login" )
          <li class="nav-item"><a class="register" href="{{route('login')}}" >Log in</a></li>
          @endif

          @if ( Route::currentRouteName() !== "register" )
          <li class="nav-item"><a class="register" href="{{route('register')}}" >Sign up</a></li>
          @endif

        @else
        
        <li class="nav-item"><a href="{{route('logout')}}" class="register">
          Logout
        </a></li>
        
        @endguest
                
      </ul>
      </div>


      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-coll" aria-controls="navbar-coll" aria-expanded="false" aria-label="Toggle navigation">
      <i class="bi bi-list"></i>
      </button>

      
    </nav><!-- .navbar -->

  </div>
</header><!-- End Header -->