<!-- ======= Header ======= -->
<header id="header">
  <div class="container d-flex align-items-center justify-content-between">

    <div class="logo">
     <!-- <h1><a href="index.html">Bocor<span>.</span></a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="{{route('mainlanding')}}"><img src="{{asset('assets/frontend/img/Logo.png')}}" alt="Logo" class="img-fluid"></a>
    </div>

    <nav id="navbar" class="navbar">
     


      <ul>
    @if ( Route::currentRouteName() !== "mainlanding" )
      @if ( Route::currentRouteName() !== "login" )
        @if ( Route::currentRouteName() !== "register" )

        @if ( Route::currentRouteName() !== "home.index" )

        <li>
          <a class="register"
          href="{{route('home.index')}}"
          aria-current="page"
          >Home</a>
        </li>

        @endif

        @if ( Route::currentRouteName() !== "news.index" )

        <li>
          <a class="register"
          href="{{route('news.index')}}"
          aria-current="page"
          >News</a>
        </li>

        @endif
          

        @if ( Route::currentRouteName() !== "herra.index" )

        <li>
          <a class="register"
          href="{{route('herra.index')}}"
          aria-current="page"
          >Tools</a>
        </li>
        
        @endif

      @endif
    @endif
  @endif

        @guest

          @if ( Route::currentRouteName() !== "login" )
          <li><a class="register" href="{{route('login')}}" >Log in</a></li>
          @endif

          @if ( Route::currentRouteName() !== "register" )
          <li><a class="register" href="{{route('register')}}" >Sign up</a></li>
          @endif

        @else
        
        <li><a href="{{route('logout')}}" class="register">
          Logout
        </a></li>
        
        @endguest
                
      </ul>

      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

  </div>
</header><!-- End Header -->