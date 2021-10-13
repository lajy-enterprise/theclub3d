<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')-{{ config('app.name', 'The.CLUD.3D - Home') }}</title>

    {{-- ------------------- --}}
      <!-- Favicons -->
    <link href="{{asset('assets/frontend/img/favicon-16x16.png')}}" rel="icon">
    <link href="{{asset('assets/frontend/img/apple-icon.png')}}" rel="apple-touch-icon">
     
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/frontend/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('assets/frontend/css/style.css')}}" rel="stylesheet">
  
    @stack('css')

</head>
<body class="bg-fondo">

    
    @include('layouts.frontend.partial._header')
    
    
    @yield('content')

    @include('layouts.frontend.partial._footer')

    
    
    {{-- ------------------------- --}}


    
    <!-- Vendor JS Files -->
    <script src="{{asset('assets/frontend/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/frontend/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('assets/frontend/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/frontend/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{asset('assets/frontend/vendor/swiper/swiper-bundle.min.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('assets/frontend/js/main.js')}}"></script>



    {{-- ------------------- --}}

    @stack('js')
    {!! Toastr::message() !!}
</body>
</html>
