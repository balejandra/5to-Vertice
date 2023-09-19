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

    $.fn.dataTable.moment( 'DD-MM-YYYY' );
    $.fn.dataTable.render.datetime('YYYY-MM-DD H:mm:ss', 'DD-MM-YYYY')
    $('table.display').DataTable({
        responsive: true,
        fixedHeader: true,
        "order": [[ 1, "desc" ]],
        columnDefs: [
            {
                targets: 1,
                render: DataTable.render.datetime('DD-MM-YYYY')
            },
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 },

        ],
        language: {
            "url": "../assets/DataTables/es_es.json"
        },
        dom: 'Blfrtp',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });


} );

