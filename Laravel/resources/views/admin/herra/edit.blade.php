@extends('layouts.backend.app')

@section('title', "Edit Post")

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
      action="{{route('admin.tool.update', $post->id)}}"
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
                  id="post_scad"
                  class="form-control"
                  name="post_scad"
                  onchange="return fileValidationScad()"
                >
                <label class="form-label">Archivo scad</label>
              </div>
              
              <div class="form-group">
                <input
                  type="file"
                  id="post_image"
                  class="form-control"
                  name="post_image"
                  onchange="return fileValidationImg()"
                >
                <label class="form-label">Imagen</label>
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
                
                <div class="form-line {{$errors->has('tags') ? 'focused error' : ''}}">
                  <label for="tags">Select Tag</label>
                  <select
                    class="form-control show-tick"
                    name="tags[]"
                    id="tags"
                    {{--                    data-live-search="true"--}}
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
                href="{{route('admin.tool.index')}}"
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
  <script>
    
    function fileValidationScad(){
    var fileInput = document.getElementById('post_scad');
    var filePath = fileInput.value;
    var allowedExtensions = /(.scad)$/i;
      if(!allowedExtensions.exec(filePath)){
        alert('Upload a file that has the correct extensions .scad');
        fileInput.value = '';
        return false;
      }
    }

    function fileValidationImg(){
    var fileInput = document.getElementById('post_image');
    var filePath = fileInput.value;
    var allowedExtensions = /(.jpg|.jpeg|.png|.gif)$/i;
      if(!allowedExtensions.exec(filePath)){
        alert('Upload a file that has the correct extensions .jpg, .jpeg, .png, .gif');
        fileInput.value = '';
        return false;
      }
    }

  </script>
@endpush
