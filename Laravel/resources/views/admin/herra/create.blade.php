@extends('layouts.backend.app')

@section('title', "Create Post")

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
      action="{{route('admin.tool.store')}}"
      method="POST"
      enctype="multipart/form-data"
    >
      @csrf
      <!-- Vertical Layout | With Floating Label -->
      <div class="row clearfix">
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>
                ADD NEW TOOL
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
                  >
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
                TAGS the Tools
              </h2>

            </div>
            <div class="body">
              <div class="form-group form-float">
                <div class="form-line {{$errors->has('categories') ? 'focused error' : ''}}">
                  
                <div class="form-line {{$errors->has('tags') ? 'focused error' : ''}}">
                  <label for="tags">Select Tag</label>
                  <select
                    class="form-control show-tick tags"
                    name="tags[]"
                    id="tags"
                    multiple
                  >
                    @foreach ($tags as $tag)
                      <option value="{{$tag->id}}">{{$tag->name}}</option>
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
              <textarea id="tinymce" name="post_body"></textarea>
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
  <script src="{{asset('assets/backend/js/script.js')}}"></script>
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
