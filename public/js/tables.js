$(document).ready( function () {
    $('#generic-table').DataTable({
        responsive: true,
        autoWidth: true,
        language: {
            "url": "../public/assets/datatables/es_es.json"
        },
        dom: 'Blfrtp',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

    $('button[data-toggle="tab"]').on( 'shown.bs.tab', function (e) {
        $.fn.dataTable.tables( {visible: true, api: true} ).columns.adjust();
    } );
} );

