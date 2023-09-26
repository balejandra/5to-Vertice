$(document).ready(function () {
    $('.confirmation').on('click', function (event) {
        event.preventDefault();
        var button = $(this);
        accion = button.data('action');
        bootbox.confirm({
            title: "Confirmación",
            message: "Está seguro que desea " + accion + " esta solicitud?",
            centerVertical: true,
            animate: true,
            buttons: {
                confirm: {
                    label: 'Si',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'No',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
                if (result) {
                    window.location = button.data('route')
                }
            }
        });
    })

    $('.modal-form').on('submit', function (e) {
        e.preventDefault();

        let form1 = e.target;
        var data = $(this).parent().find('.btn-primary').attr('data-action');

        bootbox.confirm({
            title: "Confirmación",
            message: "Está seguro que desea " + data + " esta solicitud?",
            animate: true,
            buttons: {
                confirm: {
                    label: 'Si',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'No',
                    className: 'btn-danger'
                }
            },
            callback: function (result1) {
                if (result1) {
                    form1.submit();
                }
            },
        });
    })

    /*CONFIRMACION ELIMINAR REGISTRO*/
    $('.delete-form').on('submit', function (e) {
        e.preventDefault();
        let form = e.target;
        var data = $(this).parent().find('#eliminar').attr('data-mensaje');

        bootbox.confirm({
            title: "Confirmación",
            message: "Está seguro que desea ELIMINAR " + data + "?",
            animate: true,
            buttons: {
                confirm: {
                    label: 'Si',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'No',
                    className: 'btn-danger'
                }
            },
            callback: function (result1) {
                if (result1) {
                    form.submit();
                }
            },
        });
    })
});

/*OTRAS CONFIRMACIONES RESTAURAR,*/
$('.confirmation_other').on('click', function (event) {
    event.preventDefault();
    var button = $(this);
    accion = button.data('action');
    bootbox.confirm({
        title: "Confirmación",
        message: "Está seguro que desea " + accion + " este registro?",
        centerVertical: true,
        animate: true,
        buttons: {
            confirm: {
                label: 'Si',
                className: 'btn-success'
            },
            cancel: {
                label: 'No',
                className: 'btn-danger'
            }
        },
        callback: function (result) {
            if (result) {
                window.location = button.data('route')
            }
        }
    });
})

function cambiar() {
    password1 = document.getElementById('password-div')
    if ($("#password_change").is(':checked')) {
        password1.style.display = 'block';
    } else {
        password1.style.display = 'none';
    }
}

function modalDevolverRevisor(id, solicitud) {
    var soli = document.getElementById('nro_planilla');
    soli.textContent = solicitud
    let frm1 = document.getElementById('devolver_proyecto');
    frm1.setAttribute('action', route('proyectos.updateStatus', {id: id, estatus: 'devolver-revisor'}));
}

function modalDevolverAprobador(id, solicitud) {
    var soli = document.getElementById('nro_planilla');
    soli.textContent = solicitud
    let frm1 = document.getElementById('devolver_proyecto');
    frm1.setAttribute('action', route('proyectos.updateStatus', {id: id, estatus: 'devolver-aprobador'}));
}

function motivoDevolucion() {
    $motivo = $("#motivo1 option:selected").text();
    if ($motivo == 'Observaciones en los documentos') {
        table = document.getElementById("inputmotivo");
        table.style.display = 'block';
        $("#motivo1").attr("name", "motivofalso");
        $("#motivo2").attr("name", "motivo");
        document.querySelector('#motivo2').required = true;

    } else {
        table = document.getElementById("inputmotivo");
        table.style.display = 'none';
        $("#motivo1").attr("name", "motivo");
        $("#motivo2").attr("name", "motivofalso");
        document.querySelector('#motivo2').required = false;
    }
}