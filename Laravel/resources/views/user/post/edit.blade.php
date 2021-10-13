@extends('layouts.backend.app')

@section('title', "Edit User Post")

@push('css')
  <link
    href="{{asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css')}}"
    rel="stylesheet"
  />
@endpush

@section('content')
  @if ($errors->any())
    @foreach ($errors->all() as $error)
      <div class="alert alert-danger">
        {{$error}}
      </div>
    @endforeach
  @endif
  <div class="container-fluid">
    <form
      action="{{route('user.post.update', $post->id)}}"
      method="POST"
      enctype="multipart/form-data"
    >
    @csrf
    @method('PUT')
    <!-- Vertical Layout | With Floating Label -->
      <div class="row clearfix">
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>
                EDIT POST
              </h2>

              @if ($errors->any())
                @foreach ($errors->all() as $error)
                  <div class="alert alert-danger">
                    {{$error}}
                  </div>
                @endforeach
              @endif

            </div>
            <div class="body">
              <div class="form-group form-float">
                <div class="form-line">
                  <input
                    type="text"
                    id="post_title"
                    class="form-control"
                    name="post_title"
                    value="{{$post->title}}"
                  >
                  <label class="form-label">Post Title</label>
                </div>
              </div>

              <div class="form-group">
                <input
                  type="file"
                  id="post_image1"
                  class="form-control"
                  name="post_image1"
                >
              </div>

              <div class="form-group">
                <input
                  type="file"
                  id="post_image2"
                  class="form-control"
                  name="post_image2"
                >
              </div>

              <div class="form-group">
                <input
                  type="file"
                  id="post_image3"
                  class="form-control"
                  name="post_image3"
                >
              </div>

              <div class="form-group">
                <input
                  type="file"
                  id="post_image4"
                  class="form-control"
                  name="post_image4"
                >
              </div>

              <div class="form-group">
                <input
                  type="file"
                  id="post_image5"
                  class="form-control"
                  name="post_image5"
                >
              </div>

              <div class="form-group">
                <input
                  type="checkbox"
                  id="status"
                  name="status"
                  class="filled-in"
                  value="1"
                  {{$post->status ? 'checked' : ''}}
                >
                <label for="status">Published</label>
              </div>

            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>
                CATEGORIES AND TAGS
              </h2>

            </div>
            <div class="body">
              <div class="form-group form-float">
                <div class="form-line {{$errors->has('categories') ? 'focused error' : ''}}">
                  <label for="categories">Select Category</label>
                  <select
                    class="form-control show-tick"
                    name="categories[]"
                    id="categories"
                    {{--                    data-live-search="true"--}}
                    multiple
                  >
                    @foreach ($categories as $category)
                      <option
                        value="{{$category->id}}"
                        @foreach ($post->categories as $post_category)
                            {{$post_category->id == $category->id ? 'selected' : ''}}
                        @endforeach
                      >
                        {{$category->name}}
                      </option>
                    @endforeach
                  </select>
                </div>

                <div class="form-line {{$errors->has('tags') ? 'focused error' : ''}}">
                  <label for="tags">Select Tag</label>
                  <select
                    class="form-control show-tick"
                    name="tags[]"
                    id="tags"
                    multiple
                  >
                    @foreach ($tags as $tag)
                      <option
                        value="{{$tag->id}}"
                        @foreach ($post->tags as $post_tag)
                            {{$post_tag->id == $tag->id ? 'selected' : ''}}
                        @endforeach
                      >
                        {{$tag->name}}
                      </option>
                    @endforeach
                  </select>
                </div>
              </div>

              <a
                href="{{route('user.post.index')}}"
                class="btn btn-danger m-t-15 m-r-10 waves-effect"
              >
                BACK
              </a>
              <button type="submit" class="btn btn-primary m-t-15 waves-effect">
                SUBMIT
              </button>

            </div>
          </div>
        </div>
      </div>
      <!-- Vertical Layout | With Floating Label -->

       
        
      <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
            <h2>
              Datos de la Liga
            </h2>

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                      {{$error}}
                    </div>
                @endforeach
            @endif

          </div>
          
          <div class="body">
            <div class="form-group form-float">
              <div class="form-line">
                <label for="post_pais">Pais</label>
                <input
                  type="text"
                  id="post_pais"
                  class="form-control"
                  name="post_pais"
                  value="{{$post->pais}}"
                >
              </div>

              <div class="form-line">
                <label for="post_estado">Estado</label>
                <input
                  type="text"
                  id="post_estado"
                  class="form-control"
                  name="post_estado"
                  value="{{$post->estado}}"
                >
              </div>

              <div class="form-line">
                <label for="post_ciudad">Ciudad</label>
                <input
                  type="text"
                  id="post_ciudad"
                  class="form-control"
                  name="post_ciudad"
                  value="{{$post->ciudad}}"
                >
              </div>

              <div class="form-line">
                <label for="post_direccion">Direccion</label>
                <input
                  type="text"
                  id="post_direccion"
                  class="form-control"
                  name="post_direccion"
                  value="{{$post->direccion}}"
                >
              </div>

              <div class="form-line">
                <label for="post_telefono">Telefono</label>
                <input
                  type="number"
                  id="post_telefono"
                  class="form-control"
                  name="post_telefono"
                  value="{{$post->telefono}}"
                >
              </div>

              <div class="form-line">
                <label for="post_edad">Edad</label>
                <input
                  type="number"
                  id="post_edad"
                  class="form-control"
                  name="post_edad"
                  value="{{$post->edad}}"
                >
              </div>

            </div>

          </div>
        </div>
      </div>



      <!-- Vertical Layout | With Floating Label -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>
                POST BODY
              </h2>

            </div>
            <div class="body">
              <textarea id="tinymce" name="post_body">
                {{$post->body}}
              </textarea>
            </div>
          </div>
        </div>
      </div>
      <!-- Vertical Layout | With Floating Label -->
    </form>
  </div>
@stop

@push('js')
  <script src="{{asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
  <!-- TinyMCE -->
  <script src="{{asset('assets/backend/plugins/tinymce/tinymce.js')}}"></script>
  <script>
      $(function () {
          //TinyMCE
          tinymce.init({
              selector: "textarea#tinymce",
              theme: "modern",
              height: 300,
              plugins: [
                  'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                  'searchreplace wordcount visualblocks visualchars code fullscreen',
                  'insertdatetime media nonbreaking save table contextmenu directionality',
                  'emoticons template paste textcolor colorpicker textpattern imagetools'
              ],
              toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
              toolbar2: 'print preview media | forecolor backcolor emoticons',
              image_advtab: true
          });
          tinymce.suffix = ".min";
          tinyMCE.baseURL = '{{asset('assets/backend/plugins/tinymce')}}';
      });
  </script>
@endpush
