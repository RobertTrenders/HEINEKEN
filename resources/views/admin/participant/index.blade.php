@extends('layouts.app')

@section('content')

<div class="content-wrapper">
  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="">Participantes</a>
      </li>
      <li class="breadcrumb-item active">Lista</li>
    </ol>

    <!-- Example DataTables Card-->
    <div class="card mb-3">

      <div class="card-header">
        <i class="fa fa-table"></i> Participantes
        <button type="button" id="export_btn" class="btn btn-success createButton ml-5">Descargar <i class="fas fa-file-excel"></i></button>
      </div>

      <div class="card-body">

        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable_participant" width="100%" cellspacing="0">

            <thead>
              <tr>
                <th class="dt-center">Id</th>
                <th class="dt-center">Nombre</th>
                <th class="dt-center">Email</th>
                <th class="dt-center">DNI</th>
                <th class="dt-center">Teléfono</th>
                <th class="dt-center">Equipo</th>
                <th class="dt-center">Fecha</th>
              </tr>
            </thead>

            <tfoot>
              <tr>
                <th class="dt-center">Id</th>
                <th class="dt-center">Nombre</th>
                <th class="dt-center">Email</th>
                <th class="dt-center">DNI</th>
                <th class="dt-center">Teléfono</th>
                <th class="dt-center">Equipo</th>
                <th class="dt-center">Fecha</th>
              </tr>
            </tfoot>

          </table>
        </div>

      </div>

      <div class="card-footer small text-muted">Click en las columnas para reordenar.</div>

    </div>
  </div>
  <!-- /.container-fluid-->

  <!-- /.content-wrapper-->
  <footer class="sticky-footer">
    <div class="container">
      <div class="text-center">
        <small>Heineken 2022</small>
      </div>
    </div>
  </footer>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
  </a>

  <div id="ajax-loader" class="ajax-loader"></div>

  @include('layouts.modals')

</div>

<script>
  const GET_PARTICIPANTS_URL = "{{ route('get_participants') }}";
  const EXPORT_URL = "{{ route('participant_export') }}";
</script>

<script src="{{ asset('/assets/js/admin/participant/datatables.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('/assets/js/admin/participant/index.js') }}" crossorigin="anonymous"></script>

@endsection