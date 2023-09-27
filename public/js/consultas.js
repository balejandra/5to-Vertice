function mostrarRangoFechas() {
    rangoFechaI = document.getElementById("rangoFechainicio-div");
    rangoFechaF = document.getElementById("rangoFechafin-div");
    fecha = document.getElementById("fecha_unica");
    filtro = document.getElementById("filtro_fecha");
    if ($("#rango_fecha").is(":checked")) {
        rangoFechaI.style.display = "block";
        rangoFechaF.style.display = "block";
        fecha.value = "";
        fecha.readOnly = true;
        $("#fecha_inicial").prop("required", true);
        $("#fecha_final").prop("required", true);
        $("#filtro_fecha").prop("required", true);
    } else {
        rangoFechaI.style.display = "none";
        rangoFechaF.style.display = "none";
        fecha.readOnly = false;
        $("#fecha_inicial").prop("required", false);
        $("#fecha_final").prop("required", false);
        $("#filtro_fecha").prop("required", false);
    }
}

function changeFiltro() {
    var filtro = $('select[name="filtro_fecha"] option:selected').text();
    console.log(filtro);
    $('input[name="filtro_name"]').val(filtro);
}

function changeFiltroFecha() {
    if ($('input[name="fecha_unica"]').val() == "") {
        console.log("emp");
        $("#filtro_fecha").removeAttr("required");
        $("#filtro_fecha").prop("required", false);
    }
    $("#filtro_fecha").prop("required", true);
}

function enviarBusqueda() {
    var formData = new FormData(document.getElementById("busquedaForm"));

    $.ajax({
        url: route("busqueda.queries"),
        data: formData,
        type: "POST",
        processData: false, // Importante: deshabilita el procesamiento automático de datos
        contentType: false,
        success: function (response) {
            $("#tablaBusqueda").html(response);
            $("#tablaBusqueda table").DataTable({
                responsive: true,
                fixedHeader: true,
                order: [[1, "desc"]],
                columnDefs: [
                    {
                        targets: 1,
                        render: $.fn.dataTable.render.datetime("DD-MM-YYYY"),
                    },
                    { responsivePriority: 1, targets: 0 },
                    { responsivePriority: 2, targets: -1 },
                ],
                language: {
                    url: "../assets/DataTables/es_es.json",
                },
                dom: "Blfrtp",
                buttons: ["copy", "csv", "excel", "pdf", "print"],
            });
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        },
    });
}
