@extends('layouts.frontend.app')

@section('title')
  {{$post->title}}
@stop

@push('css')
  <link href="{{asset('assets/frontend/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('assets/frontend/css/subtools.css')}}" rel="stylesheet">
@endpush

@section('content')
  {{--
  <section class="bg-fondo p-0">
    
     <div class="container">


      <h3 class="title mt-4 text-center">
        
        <b>Herrramienta: {{$post->title}}</b>
        <div class="container new">
          <div class="row">
            <div class="my-5 col-12">
              {!! $post->body !!}
            </div>
          </div>
        </div>
        
      </h3>
    </div>    <!-- container -->
  </section> --}} <!-- post-area -->

  <section id="about" class="about">
    <div class="container">

      <div class="row">
        <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left">
          <div class="img-fluid">
            <img src="{{asset('storage/herramientas')}}/{{$post->image}}" alt="{{$post->slug}}" class="img-fluid">
          </div>

          <br><br>
  
          <div class="text-center">
            <button class="cta-btn" type="submit" form="form" >Download</button>
          </div>

        </div>
        
        <div class="col-lg-5 parameter p-5">
            <form
                action="{{route('mainconvert', $post->slug)}}"
                method="post"
                id="form"
                
                enctype="multipart/form-data"
              >
                @csrf
                
              <div class="row">
                  <h1>Change parameter</h1>

                <div class="col-md-8 form-group align-items-center">
                  @foreach($post->tags as $tag)

                    @if($tag->tipo == 'text')

                      {{$tag->name}}: <input type="text" name="{{$tag->name}}" class="form-control" id="{{$tag->name}}" placeholder="{{$tag->descripcion}}" required>

                    @endif

                    @if($tag->tipo == 'number')

                      {{$tag->name}}: <input type="number" name="{{$tag->name}}" class="form-control" id="{{$tag->name}}" placeholder="{{$tag->descripcion}}" required>

                    @endif

                    @if($tag->tipo == 'select' && $tag->name == 'font')

                      <label class="mb-0 pb-0"> {{$tag->name}} - {{$tag->descripcion}}: </label>

                      <select class="select mt-0 pt-0" name="{{$tag->name}}" id="{{$tag->name}}" required>
                        <option selected>select the font</option>
                        <option value="AbsoluteEmpire">AbsoluteEmpire</option>
                        <option value="AbrilFatface-Regular">AbrilFatface-Regular</option>
                        <option value="Aclonica-Regular">Aclonica-Regular</option>
                        <option value="AvrileSansUI-Regular">AvrileSansUI-Regular</option>
                        <option value="BigShouldersStencilDisplay-SemiBold">BigShouldersStencilDisplay-SemiBold</option>
                        <option value="Bungee-Regular">Bungee-Regular</option>
                        <option value="Caveat-VariableFont_wght">Caveat-VariableFont_wght</option>
                        <option value="Chomsky">Chomsky</option>
                        <option value="Courgette-Regular">Courgette-Regular</option>
                        <option value="CoveredByYourGrace-Regular">CoveredByYourGrace-Regular</option>
                        <option value="DancingScript-VariableFont_wght">DancingScript-VariableFont_wght</option>
                        <option value="FredokaOne-Regular">FredokaOne-Regular</option>
                        <option value="Gothica-Bold">Gothica-Bold</option>
                        <option value="HammersmithOne-Regular">HammersmithOne-Regular</option>
                        <option value="Kalam-Regular">Kalam-Regular</option>
                        <option value="KronaOne-Regular">KronaOne-Regular</option>
                        <option value="LaBelleAurore-Regular">LaBelleAurore-Regular</option>
                        <option value="Limelight-Regular">Limelight-Regular</option>
                        <option value="miamanueva">miamanueva</option>
                        <option value="Minecraftia">Minecraftia</option>
                        <option value="NeomatrixCode">NeomatrixCode</option>
                        <option value="New Telegraph">New Telegraph</option>
                        <option value="NothingYouCouldDo-Regular">NothingYouCouldDo-Regular</option>
                        <option value="Oi-Regular">Oi-Regular</option>
                        <option value="Orbitron-VariableFont_wght">Orbitron-VariableFont_wght</option>
                        <option value="Pacifico-Regular">Pacifico-Regular</option>
                        <option value="RacingSansOne-Regular">RacingSansOne-Regular</option>
                        <option value="StintUltraCondensed-Regular">StintUltraCondensed-Regular</option>
                        <option value="Walter">Walter</option>
                      </select>

                    @endif

                    @if($tag->tipo == 'file')

                      <label class="mb-0 pb-0"> {{$tag->name}} - {{$tag->descripcion}}: </label>

                      <input type="file" name="{{$tag->name}}" id="{{$tag->name}}" required>

                    @endif

                  @endforeach 
                  
                </div>
              </div>
            </form>
          </div>
        
      </div>
    </div>
  </section>

  

@stop

@push('js')
  
  <script src="{{asset('assets/frontend/js/main.js')}}"></script>
  
@endpush
