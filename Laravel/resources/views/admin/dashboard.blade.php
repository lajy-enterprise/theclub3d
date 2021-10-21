@extends('layouts.backend.app')

@section('title', "AdminDashboard")

@push('css')

@endpush

@section('content')
  <div class="container-fluid">
    <div class="block-header">
      <h2>STATISTICS</h2>
    </div>

    <div class="block-header text-center">
      <h2>PUBLICATIONS</h2>
    </div>

    <div class="row clearfix">
      <!-- Visitors -->
      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="card">
          <div class="body bg-pink">
            <div class="m-b--35 font-bold">MOST VIEWED PUBLICATIONS OF THE DAY</div>
            <ul class="dashboard-stat-list">
              @foreach($resultadosDiaPosts as $clave => $valor)
                <li>
                  {{Str::upper($clave)}}
                  <span class="pull-right"><b>{{$valor}}</b> <small>Views</small></span>
                </li>
              @endforeach
              
            </ul>
          </div>
        </div>
      </div>
      <!-- #END# Visitors -->
      <!-- Latest Social Trends -->
      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="card">
          <div class="body bg-cyan">
            <div class="m-b--35 font-bold">MOST VIEWED PUBLICATIONS OF THE WEEK</div>
            <ul class="dashboard-stat-list">
              @foreach($resultadosSemanaPosts as $clave => $valor)
                <li>
                  {{Str::upper($clave)}}
                  <span class="pull-right"><b>{{$valor}}</b> <small>Views</small></span>
                </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
      <!-- #END# Latest Social Trends -->
      <!-- Answered Tickets -->
      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="card">
          <div class="body bg-teal">
            <div class="font-bold m-b--35">MOST VIEWED PUBLICATIONS OF THE MONTH</div>
            <ul class="dashboard-stat-list">
              @foreach($resultadosMesPosts as $clave => $valor)
                <li>
                  {{Str::upper($clave)}}
                  <span class="pull-right"><b>{{$valor}}</b> <small>Views</small></span>
                </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
      <!-- #END# Answered Tickets -->
    </div>

    <div class="block-header text-center">
      <h2>TOOLS</h2>
    </div>

    <div class="row clearfix">
      <!-- Visitors -->
      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="card">
          <div class="body bg-pink">
            <div class="m-b--35 font-bold">MOST USED TOOLS OF THE DAY</div>
            <ul class="dashboard-stat-list">
              @foreach($resultadosDia as $clave => $valor)
                <li>
                  {{Str::upper($clave)}}
                  <span class="pull-right"><b>{{$valor}}</b> <small>Used</small></span>
                </li>
              @endforeach
              
            </ul>
          </div>
        </div>
      </div>
      <!-- #END# Visitors -->
      <!-- Latest Social Trends -->
      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="card">
          <div class="body bg-cyan">
            <div class="m-b--35 font-bold">MOST USED TOOLS OF THE WEEK</div>
            <ul class="dashboard-stat-list">
              @foreach($resultadosSemana as $clave => $valor)
                <li>
                  {{Str::upper($clave)}}
                  <span class="pull-right"><b>{{$valor}}</b> <small>Used</small></span>
                </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
      <!-- #END# Latest Social Trends -->
      <!-- Answered Tickets -->
      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="card">
          <div class="body bg-teal">
            <div class="font-bold m-b--35">MOST USED TOOLS OF THE MONTH</div>
            <ul class="dashboard-stat-list">
              @foreach($resultadosMes as $clave => $valor)
                <li>
                  {{Str::upper($clave)}}
                  <span class="pull-right"><b>{{$valor}}</b> <small>Used</small></span>
                </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
      <!-- #END# Answered Tickets -->
    </div>

  </div>
@stop

@push('js')
  <!-- Jquery CountTo Plugin Js -->
  <script src="{{asset('assets/backend/plugins/jquery-countto/jquery.countTo.js')}}"></script>

  <!-- Morris Plugin Js -->
  <script src="{{asset('assets/backend/plugins/raphael/raphael.min.js')}}"></script>
  <script src="{{asset('assets/backend/plugins/morrisjs/morris.js')}}"></script>

  <!-- ChartJs -->
  <script src="{{asset('assets/backend/plugins/chartjs/Chart.bundle.js')}}"></script>

  <!-- Flot Charts Plugin Js -->
  <script src="{{asset('assets/backend/plugins/flot-charts/jquery.flot.js')}}"></script>
  <script src="{{asset('assets/backend/plugins/flot-charts/jquery.flot.resize.js')}}"></script>
  <script src="{{asset('assets/backend/plugins/flot-charts/jquery.flot.pie.js')}}"></script>
  <script src="{{asset('assets/backend/plugins/flot-charts/jquery.flot.categories.js')}}"></script>
  <script src="{{asset('assets/backend/plugins/flot-charts/jquery.flot.time.js')}}"></script>

  <!-- Sparkline Chart Plugin Js -->
  <script src="{{asset('assets/backend/plugins/jquery-sparkline/jquery.sparkline.js')}}"></script>

  <!-- Sparkline Chart Plugin Js -->
  <script src="{{asset('assets/backend/js/script.js')}}"></script>
@endpush
