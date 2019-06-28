var tablaProduccionP;

$(function() {
    if($('#dtProduccionP').length) {
        tablaProduccionP = $('#dtProduccionP').DataTable({
            "ajax": {
                "url": "?1=ProduccionController&2=mostrarProduccionP",
                "type": "POST"
            },
            "columns": [{
                    "data": "idOrden"
                },
                {
                    "data": "correlativo"
                },
                {
                    "data": "fechaOT"
                },
                {
                    "data": "fechaEntrega"             
                },
                {
                    "data": "nombre"             
                },
                
                {
                    "data": "nombreC"             
                },


                
                {
                    "data": "Acciones"             
                }
            ],
            "order": [
                [4, "asc"]
            ],
            "language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });

         // Ocultar columna de id de Usuario
         tablaProduccionP.column(0).visible(false);
    }
});