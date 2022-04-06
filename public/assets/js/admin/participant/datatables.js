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
