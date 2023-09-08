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