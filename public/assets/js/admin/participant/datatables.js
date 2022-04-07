$(document).ready(function () {
  var oDataTable = $("#dataTable_participant").DataTable({
    processing: true,
    serverSide: true,
    ajax: GET_PARTICIPANTS_URL,
    columns: [
      { data: "id", class: "dt-center" },
      { data: "name", class: "dt-center" },
      { data: "email", class: "dt-center" },
      { data: "dni", class: "dt-center" },
      { data: "phone", class: "dt-center" },
      { data: "team", class: "dt-center" },
      { data: "created_at", class: "dt-center" },
    ],
    pageLength: 100,
    language: {
      lengthMenu: "Mostrar _MENU_ registros por pagina",
      zeroRecords: "No hay registros disponibles",
      info: "Mostrando pagina _PAGE_ de _PAGES_",
      infoEmpty: "No hay registros disponibles",
      infoFiltered: "(Filtrado de un total de _MAX_ registros)",
      search: "Buscar:",
      paginate: {
        first: "Primera",
        last: "Ultima",
        next: "Siguiente",
        previous: "Previa",
      },
      loadingRecords: "Cargando...",
      processing: "Procesando...",
    },
  });

  $("#dataTable_participant_filter input").unbind();

  $("#dataTable_participant_filter input").bind("keyup", function (e) {
    if (e.keyCode == 13) {
      oDataTable.search(this.value).draw();
    }
  });
});

$("#dataTable_participant").on(
  "processing.dt",
  function (e, settings, processing) {
    if (processing) {
      $("#ajax-loader").show();
    } else {
      $("#ajax-loader").hide();
    }
  }
);
