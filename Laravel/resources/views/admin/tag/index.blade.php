@extends('layouts.backend.app')

@section('title', "Tag")

@push('css')
  <link
    href="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}"
    rel="stylesheet"
  >
@endpush

@section('content')
  <div class="container-fluid">
    <div class="block-header">
      <a href="{{route('admin.tag.create')}}" class="btn btn-primary waves-effect">
        <i class="material-icons">add</i>
        <span>Add New Tag</span>
      </a>

    </div>
    <!-- Exportable Table -->
    <!-- Exportable Table -->
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
            <h2>
              ALL TAGS
              <span class="badge bg-pink">{{$tags->count()}}</span>
            </h2>
          </div>

          <div class="body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Tipe</th>
                    <th>Descripcion</th>
                    <th>Post Count</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Tipe</th>
                    <th>Descripcion</th>
                    <th>Post Count</th>
                    <th>Actions</th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach ($tags as $key => $tag)
                    <tr>
                      <td>{{$key + 1}}</td>
                      <td>{{$tag->name}}</td>
                      <td>{{$tag->tipo}}</td>
                      <td>{{$tag->descripcion}}</td>
                      <td>
                        <span class="badge bg-info">
                          {{$tag->posts->count()}}
                        </span>
                      </td>
                      <td class="text-center">
                        <a
                          href="{{route('admin.tag.edit', $tag->id)}}"
                          class="btn btn-info waves-effect m-r-10"
                        >
                          <i class="material-icons">edit</i>
                        </a>

                        <button
                          class="btn btn-danger waves-effect"
                          onclick="deleteTag({{$tag->id}})"
                        >
                          <i class="material-icons">delete</i>
                        </button>

                        <form
                          id="delete-tag-form-{{$tag->id}}"
                          action="{{route('admin.tag.destroy', $tag->id)}}"
                          method="POST"
                          class="d-none"
                        >
                          @csrf
                          @method('DELETE')
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- #END# Exportable Table -->
    <!-- #END# Exportable Table -->
  </div>
@stop

@push('js')
  <!-- Jquery DataTable Plugin Js -->
  <script src="{{ asset('assets/backend/plugins/jquery-datatable/jquery.dataTables.js') }}  "></script>
  <script
    src="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }} "></script>
  <script
    src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }} "></script>
  <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }} "></script>
  <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/jszip.min.js') }} "></script>
  <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }} "></script>
  <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }} "></script>
  <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }} "></script>
  <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }} "></script>

  <!-- Custom Js -->
  <script src="{{ asset('assets/backend/js/pages/tables/jquery-datatable.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script>
    function deleteTag(id) {
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      })

      swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
          event.preventDefault();
          document.getElementById(`delete-tag-form-${id}`).submit();
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your file is safe :)',
            'error'
          )
        }
      })
    }
  </script>
@endpush
