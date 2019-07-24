<br><div id="app">
    <div class="ui grid">
        <div class="row">
        <div class="titulo">
                <font color="black" size="6px">
                <i class="users icon"></i> <i class="dollar icon"></i>
                    Vendedores </font><font color="#B40431" size="20px">.</font>
                </div>
        </div>

        <div class="row title-bar">
            <div class="sixteen wide column">
                <button class="ui right floated red labeled icon button" id="btnModalRegistro">
                    <i class="plus icon"></i>
                    Agregar
                </button>
            </div>
        </div>

        <div class="row title-bar">
            <div class="sixteen wide column">
                <div class="ui divider"></div>
            </div>
        </div>


        <div class="row">
            <div class="sixteen wide column">
                <table id="dtUsuarios" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                    <thead>
                        <tr>
                        
                            <th style="background-color: black; color:white;">N°</th>
                            <th style="background-color: black; color:white;width:50%;">Nombre</th>
                            <th style="background-color: black; color:white;">Acciones</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    
    </div>

<div id="modalVendedor" class="ui tiny modal">
    <div class="header" style="background-color:black; color:white;" id="headerAdd">
    <i class="users icon"></i><i class="plus icon"></i> Agregar nuevo vendedor
    </div>
    <div class="content">
        <form class="ui form">
            <label><i class="user icon"></i>Nombre del vendedor</label>
            <input type="text" name="vendedor" id="vendedor" placeholder="Nombre del Vendedor">
        </form>
    </div>
    <div class="actions">
        <button class="ui red deny button">Cancelar</button>
        <button class="ui black button" id="guardar">Guardar</button>
    </div>
</div>

<div id="modalEditarVendedor" class="ui tiny modal">
    <div class="header" style="background-color:black; color:white;" id="headerAdd">
    <i class="users icon"></i><i class="plus icon"></i> Editar Vendedor
    </div>
    <div class="content">
        <form class="ui form">
            <label><i class="user icon"></i>Nombre del vendedor</label>
            <input type="text" name="vendedorE" id="vendedorE" placeholder="Nombre del Vendedor">
            <input type="hidden" name="idDetalle" id="idDetalle">
        </form>
    </div>
    <div class="actions">
        <button class="ui red deny button">Cancelar</button>
        <button class="ui black button" id="guardarE">Guardar</button>
    </div>
</div>

<div id="modalEliminar" class="ui tiny modal">
    <div class="header" style="background-color:black; color:white;" id="headerAdd">
    <i class="users icon"></i><i class="plus icon"></i> Eliminar Vendedor : <a id="name" style="color:yellow;"></a>
    </div>
    <div class="content">
                    <h3>¿Desea eliminar al vendedor?</h3>
                    <input type="hidden"  id="idEliminar">
                </div>
                <div class="actions" style="background-color:#D8D8D8; color:black;">
                    <button class="ui black deny button">
                        Cancelar
                    </button>
                    <button class="ui right red button" id="btnEliminar">
                        Eliminar
                    </button>
                </div>
</div>

</div>
</div>
<script src="./res/tablas/tablaVendedores.js"></script>
<script>
    $('#btnModalRegistro').click(function() {
$('#modalVendedor').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');

});

$(document).on("click", ".btnEditar", function () {
 $('#modalEditarVendedor').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
 $('#idDetalle').val($(this).attr("id"));
 $('#vendedorE').val($(this).attr("nombre"));
 
        });

        $(document).on("click", ".btnEliminar", function () {
            $('#modalEliminar').modal('setting', 'closable', false).modal('show');
            $('#idEliminar').val($(this).attr("id"));
            $('#name').text($(this).attr("nombre"));
        });


$("#guardar").click(function(){
    var nombre = $("#vendedor").val();
    $.ajax({
               
                type: 'POST',
                url: '?1=VendedoresController&2=registrarVendedor',
                data: {
                    nombre:nombre,
                },
                success: function(r) {
                    if(r == 1) {
                        $('#modalVendedor').modal('hide');
                        
                        swal({
                            title: 'Registrado',
                            text: 'Guardado con éxito',
                            type: 'success',
                            showConfirmButton: true,
                            }).then((result) => {
                                if (result.value) {
                            
                                    $('#dtUsuarios').DataTable().ajax.reload();
                               
                            }
                        }); 
                        
                    } 
                }
            });
});

$("#guardarE").click(function(){
    var nombre = $("#vendedorE").val();
    var id = $("#idDetalle").val();
    $.ajax({
               
                type: 'POST',
                url: '?1=VendedoresController&2=editarVendedor',
                data: {
                    nombre:nombre,
                    id: id,
                },
                success: function(r) {
                    if(r == 1) {
                        $('#modalEditarVendedor').modal('hide');
                        
                        swal({
                            title: 'Modificado',
                            text: 'Guardado con éxito',
                            type: 'success',
                            showConfirmButton: true,
                            }).then((result) => {
                                if (result.value) {
                            
                                    $('#dtUsuarios').DataTable().ajax.reload();
                               
                            }
                        }); 
                        
                    } 
                }
            });
});

$("#btnEliminar").click(function(){
            var idEliminar=$("#idEliminar").val();
            $.ajax({
               
                type: 'POST',
                url: '?1=VendedoresController&2=eliminar',
                data: {idEliminar},
                success: function(r) {
                    if(r == 1) {
                        $('#modalEliminar').modal('hide');
                        swal({
                            title: 'Eliminado',
                            text: 'Eliminado con éxito',
                            type: 'success',
                            showConfirmButton: true,

                        }).then((result) => {
                            if (result.value) {
                                $('#dtUsuarios').DataTable().ajax.reload();
                            }
                        }); 
                        
                    } 
                }
            });

        });
    </script>