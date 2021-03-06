@extends('layouts.backend.app')

@section('title', "AdminDashboard")

@push('css')

@endpush

@section('content')
  <div class="container-fluid">
    <!-- Tabs With Icon Title -->
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
            <h2>
              PROFILE SETTINGS
            </h2>
          </div>

          <div class="body">
            <form
              class="form-horizontal"
              method="POST"
              action="{{route('user.profile.update')}}"
              enctype="multipart/form-data"
              >
              @csrf
              @method('PUT')

              <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                  <label for="username">Nombre de Usuario</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                  <div class="form-group">
                    <div class="form-line">
                      <input
                        type="text"
                        id="username"
                        name="username"
                        class="form-control"
                        placeholder="Enter your username"
                        value="{{Auth::user()->username}}"
                      >
                    </div>
                  </div>
                </div>
              </div>

              <div class="row clearfix mb-3">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                  <label for="name">Name</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                  <div class="form-group">
                    <div class="form-line">
                      <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control"
                        placeholder="Enter your name"
                        value="{{Auth::user()->name}}"
                      >
                    </div>
                  </div>
                </div>
              </div>

              <div class="row my-4 d-flex flex-row text-center justify-content-center">
                  
                <div class="my-4">
                  <input
                    type="checkbox"
                    id="show_name"
                    name="show_name"
                    class="filled-in"
                    value="1"
                    {{Auth::user()->show_name ? 'checked' : ''}}
                  >
                  <label for="show_name">Mostrar nombre en lugar de Usuario</label>
                  
                </div>
                  
              </div>

              <div class="row clearfix mt-3">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                  <label for="email">Email</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                  <div class="form-group">
                    <div class="form-line">
                      <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control"
                        placeholder="Enter your email address"
                        value="{{Auth::user()->email}}"
                      >
                    </div>
                  </div>
                </div>
              </div>

              <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                  <label for="image">Profile Image</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                  <div class="form-group">
                    <input
                      type="file"
                      id="image"
                      name="image"
                      class="form-control"
                    >
                  </div>
                </div>
              </div>

              <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                  <label for="about">About Me</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                  <div class="form-group">
                    <div class="form-line">
                      <textarea
                        class="form-control"
                        id="about"
                        name="about"
                        rows="5"
                        cols="10"
                      >
                        {{Auth::user()->about}}
                      </textarea>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                  <label for="pais">Pais</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                  <div class="form-group">
                    <div class="form-line">
                      <input
                        type="text"
                        id="pais"
                        name="pais"
                        class="form-control"
                        placeholder="Enter your pais"
                        value="{{Auth::user()->pais}}"
                      >
                    </div>
                  </div>
                </div>
              </div>

              <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                  <label for="estado">Estado</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                  <div class="form-group">
                    <div class="form-line">
                      <input
                        type="text"
                        id="estado"
                        name="estado"
                        class="form-control"
                        placeholder="Enter your estado"
                        value="{{Auth::user()->estado}}"
                      >
                    </div>
                  </div>
                </div>
              </div>

              <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                  <label for="ciudad">Ciudad</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                  <div class="form-group">
                    <div class="form-line">
                      <input
                        type="text"
                        id="ciudad"
                        name="ciudad"
                        class="form-control"
                        placeholder="Enter your ciudad"
                        value="{{Auth::user()->ciudad}}"
                      >
                    </div>
                  </div>
                </div>
              </div>

              <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                  <label for="direccion">Direccion</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                  <div class="form-group">
                    <div class="form-line">
                      <input
                        type="text"
                        id="direccion"
                        name="direccion"
                        class="form-control"
                        placeholder="Enter your direccion"
                        value="{{Auth::user()->direccion}}"
                      >
                    </div>
                  </div>
                </div>
              </div>

              <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                  <label for="telefono">Telefono</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                  <div class="form-group">
                    <div class="form-line">
                      <input
                        type="number"
                        id="telefono"
                        name="telefono"
                        class="form-control"
                        placeholder="Enter your telefono"
                        value="{{Auth::user()->telefono}}"
                      >
                    </div>
                  </div>
                </div>
              </div>

              <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                  <label for="edad">Edad</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                  <div class="form-group">
                    <div class="form-line">
                      <input
                        type="number"
                        id="edad"
                        name="edad"
                        class="form-control"
                        placeholder="Enter your edad"
                        value="{{Auth::user()->edad}}"
                      >
                    </div>
                  </div>
                </div>
              </div>

              <div class="row clearfix">
                <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                  <button
                    type="submit"
                    class="btn btn-primary m-t-15 waves-effect"
                  >
                    UPDATE
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- #END# Tabs With Icon Title -->
  </div>
@stop

@push('js')

@endpush
