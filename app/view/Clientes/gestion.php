<br><br><div id="app">
        <div class="ui grid">
        <div class="row">
                <div class="titulo">
                <font color="#B40431" size="6px">
                <i class="users icon"></i> <i class="shopping cart icon"></i>
                    Clientes </font><font color="black" size="20px">.</font>
                </div>
        </div>

        <div class="row title-bar">
            <div class="sixteen wide column">
                <button class="ui right floated black labeled icon button" id="btnModalRegistro">
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
                <table id="dtClientes" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                    <thead>
                        <tr>
                        
                            <th style="background-color: #B40431; color:white;">N°</th>
                            <th style="background-color: #B40431; color:white;">Nombre</th>
                            <th style="background-color: #B40431; color:white;">NRC</th>
                            <th style="background-color: #B40431; color:white;">Departamento</th>
                            <th style="background-color: #B40431; color:white;">Giro</th>
                            <th style="background-color: #B40431; color:white;">Acciones</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<div class="ui  modal" id="modalAgregarCliente"  style="width:80%;">

    <div class="header" style="background-color:#B40431; color:white;">
    <i class="user plus icon"></i><i class="shopping cart icon"></i> Agregar nuevo cliente
    </div>
    <div class="content" class="ui equal width form" style="background-color:#F2F2F2; color:black;">
        <form  style="font-size:15px;" class="ui form" id="frmCliente" method="POST" method="POST" enctype="multipart/form-data" action='?1=ClientesController&2=registrar'> 
        <br><hr><br>    
        <div class="field">
                <div class="fields">
                        <div class="six wide field">
                            <label ><i class="user icon"></i>Nombre:</label>
                            <input type="text" name="nombre" placeholder="Nombre del cliente" id="nombre">
                        </div>
                        <div class="five wide field">
                            <label><i class="address card icon"></i>NIT:</label>
                            <input type="text" name="nit"  id="nit" placeholder="NIT de Cliente">
                            

                            <div class="ui red pointing label"  id="labelNitEx"
                            style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                            Nit ya existe
                            </div>
                            
                        </div>
                        
                        <div class="five wide field">
                            <label><i class="address card outline icon"></i>NRC:</label>
                            <input type="text" name="nrc" placeholder="NRC de Cliente" id="nrc">
                        </div> 
                </div>
            </div>  
            <br><hr><br>
            <div class="field">
                <div class="fields">
                            <div class="six wide field">
                            <label><i class="map marker icon"></i>Dirección:</label>
                                <textarea rows="3" name="direccion" placeholder="Dirección" id="direccion"></textarea>
                                        
                            </div>   
                            <div class="five wide field">
                            <label><i class="map maker icon"></i>Departamento</label>
                            <select id="departamento" name="departamento" class="ui search dropdown">
                                    <option value="Santa Ana">Santa Ana</option>
                                    <option value="Ahuachapán">Ahuachapán</option>
                                    <option value="Sonsonate">Sonsonate</option>
                                    <option value="Chalatenango">Chalatenango</option>
                                    <option value="La Libertad">La Libertad</option>
                                    <option value="San Salvador">San Salvador</option>
                                    <option value="Cuscatlán">Cuscatlán</option>
                                    <option value="Cabañas">Cabañas</option>
                                    <option value="La Paz">La Paz</option>
                                    <option value="San Vicente">San Vicente</option>
                                    <option value="Usulután">Usulután</option>
                                    <option value="Morazán">Morazán</option>
                                    <option value="San Miguel">San Miguel</option>
                                    <option value="La Unión">La Unión</option>
                                </select>   
                            </div>  
                            
                            <div class="six wide field">
                            <label><i class="id badge outline icon"></i>Giro:</label>
                                <textarea rows="3" name="giro" placeholder="Giro del Cliente" id="giro"></textarea>
                                        
                            </div>  
                            
                            </div>
                            
                </div>   
                <br><hr><br>
                    <div class="field">
                            <div class="fields">
                            
                            <div class="six wide field">
                                
                                <b><label><i class="user circle icon"></i>Categoría: </label></b>
                                <select id="categoria" name="categoria" class="ui dropdown">
                                    <option value="Gran Contribuyente">Gran Contribuyente</option>
                                    <option value="Mediano Contribuyente">Mediano Contribuyente</option>
                                    <option value="Pequeño Contribuyente">Pequeño Contribuyente</option>
                                    <option value="Otro Contribuyente">Otro Contribuyente</option>
                                </select> 
                               
                            </div>
                            
                            <div class="six wide field">
                                
                                <b><label><i class="book icon"></i>Tipo de documento:</label></b>
                                <select id="tipoDocumento" name="tipoDocumento" class="ui dropdown">
                                    <option value="CCCF">CCCF</option>
                                    <option value="Factura">Factura</option>
                                    <option value="Factura de exportación">Factura de exportación</option>
                                    <option value="Nota de crédito">Nota de crédito</option>
                                    <option value="Nota de débito">Nota de débito</option>
                                    <option value="Otros">Otros</option>
                                </select> 
                               
                            </div>

                            <div class="six wide field">
                                
                                <b><label><i class="address book icon"></i>Condición de crédito:</label></b>
                                <select id="condicion" name="condicion" class="ui dropdown">
                                    <option value="Contado">Contado</option>
                                    <option value="Crédito 8 días">Crédito 8 días</option>
                                    <option value="Crédito 15 días">Crédito 15 días</option>
                                    <option value="Crédito 30 días">Crédito 30 días</option>
                                    
                                </select> 
                               
                            </div>
                        

                                
                            </div>
                    </div>
                    <br><hr><br>
                    <div class="field">
                            <div class="fields">

                            <div class="four wide field">
                                
                                <b><label><i class="phone icon"></i>Teléfono:</label></b>
                                <input type="text" id="telefono" name="telefono" placeholder="Teléfono">
                               
                            </div>

                            <div class="four wide field">
                                
                                <b><label><i class="calculator icon"></i>Celular:</label></b>
                                <input type="text" id="celular" name="celular" placeholder="Celular">
                               
                            </div>
                            
                            <div class="four wide field">
                                
                                <b><label><i class="calculator icon"></i>Contacto:</label></b>
                                <input type="text" id="contacto" name="contacto" placeholder="Contacto del Cliente">
                               
                            </div>

                            <div class="four wide field">
                                
                                <b><label><i class="envelope icon"></i>Correo:</label></b>
                                <input type="text" id="correo" name="correo" placeholder="Correo del Cliente">
                                <div class="ui red pointing label"  id="correoC"
                                    style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                                    Correo ya existe
                                    </div>
                            </div>
                        

                                
                            </div>
                    </div>
                    <br><hr><br>
            </div>
            
        </form>
        
        <div class="actions" style="background-color:#D8D8D8; color:black;">
            <button onclick="limpiar()" class="ui black button">
                Cancelar
            </button>
            <button class="ui red button" id="btnGuardarCliente" >
            Guardar
            </button>
        </div>
</div>


<div class="ui  modal" id="modalEditarCliente"  style="width:80%;">

    <div class="header" style="background-color:#B40431; color:white;">
    <i class="users icon"></i><i class="shopping cart icon"></i><i class="pencil icon"></i>
     Editar datos del cliente: <a id="nameE" style="background-color:white; color:black; font-size:20px; border-radius:5%;"></a>
    </div>
    <div class="content" class="ui equal width form" style="background-color:#F2F2F2; color:black;">
        <form  style="font-size:15px;" class="ui form" id="frmEditarCliente" method="POST" method="POST" enctype="multipart/form-data" action='?1=ClienteController&2=registrar'> 
        <br><hr><br>    
        <div class="field">
                <div class="fields">
                        <div class="six wide field">
                            <label ><i class="user icon"></i>Nombre:</label>
                            <input type="text" name="nombreE" placeholder="Nombre del cliente" id="nombreE">
                            <input type="hidden" name="idDetalle" id="idDetalle">
                        </div>
                        <div class="five wide field">
                            <label><i class="address card icon"></i>NIT:</label>
                            <input type="text" name="nitE"  id="nitE" placeholder="NIT de Cliente">


                            <div class="ui red pointing label"  id="labelNitExE"
                            style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                            Nit ya existe
                            </div>

                        </div>  
                        
                        <div class="five wide field">
                            <label><i class="address card outline icon"></i>NRC:</label>
                            <input type="text" name="nrcE" placeholder="NRC de Cliente" id="nrcE">
                </div>
            </div>  
            </div>
            <br><hr><br>
            <div class="field">
                <div class="fields">
                            <div class="six wide field">
                            <label><i class="map marker icon"></i>Dirección:</label>
                                <textarea rows="3" name="direccionE" placeholder="Dirección" id="direccionE"></textarea>
                                        
                            </div>   
                            <div class="five wide field">
                            <label><i class="map maker icon"></i>Departamento</label>
                            <select id="departamentoE" name="departamentoE">
                                    <option value="Santa Ana">Santa Ana</option>
                                    <option value="Ahuachapán">Ahuachapán</option>
                                    <option value="Sonsonate">Sonsonate</option>
                                    <option value="Chalatenango">Chalatenango</option>
                                    <option value="La Libertad">La Libertad</option>
                                    <option value="San Salvador">San Salvador</option>
                                    <option value="Cuscatlán">Cuscatlán</option>
                                    <option value="Cabañas">Cabañas</option>
                                    <option value="La Paz">La Paz</option>
                                    <option value="San Vicente">San Vicente</option>
                                    <option value="Usulután">Usulután</option>
                                    <option value="Morazán">Morazán</option>
                                    <option value="San Miguel">San Miguel</option>
                                    <option value="La Unión">La Unión</option>
                                </select>   
                            </div>  
                            
                            <div class="six wide field">
                            <label><i class="id badge outline icon"></i>Giro:</label>
                                <textarea rows="3" name="giroE" placeholder="Giro del Cliente" id="giroE"></textarea>
                                        
                            </div>  
                            
                            </div>
                            
                </div>   
                <br><hr><br>
                    <div class="field">
                            <div class="fields">
                            
                            <div class="six wide field">
                                
                                <b><label><i class="user circle icon"></i>Categoría: </label></b>
                                <select id="categoriaE" name="categoriaE">
                                    <option value="Gran Contribuyente">Gran Contribuyente</option>
                                    <option value="Mediano Contribuyente">Mediano Contribuyente</option>
                                    <option value="Pequeño Contribuyente">Pequeño Contribuyente</option>
                                    <option value="Otro Contribuyente">Otro Contribuyente</option>
                                </select> 
                               
                            </div>
                            
                            <div class="six wide field">
                                
                                <b><label><i class="book icon"></i>Tipo de documento:</label></b>
                                <select id="tipoDocumentoE" name="tipoDocumentoE">
                                    <option value="CCCF">CCCF</option>
                                    <option value="Factura">Factura</option>
                                    <option value="Factura de exportación">Factura de exportación</option>
                                    <option value="Nota de crédito">Nota de crédito</option>
                                    <option value="Nota de débito">Nota de débito</option>
                                    <option value="Otros">Otros</option>
                                </select> 
                               
                            </div>

                            <div class="six wide field">
                                
                                <b><label><i class="address book icon"></i>Condición de crédito:</label></b>
                                <select id="condicionE" name="condicionE">
                                    <option value="Contado">Contado</option>
                                    <option value="Crédito 8 días">Crédito 8 días</option>
                                    <option value="Crédito 15 días">Crédito 15 días</option>
                                    <option value="Crédito 30 días">Crédito 30 días</option>
                                    
                                </select> 
                               
                            </div>
                        

                                
                            </div>
                    </div>
                    <br><hr><br>
                    <div class="field">
                            <div class="fields">

                            <div class="four wide field">
                                
                                <b><label><i class="phone icon"></i>Teléfono:</label></b>
                                <input type="text" id="telefonoE" name="telefonoE" placeholder="Teléfono">
                               
                            </div>

                            <div class="four wide field">
                                
                                <b><label><i class="calculator icon"></i>Celular:</label></b>
                                <input type="text" id="celularE" name="celularE" placeholder="Celular">
                               
                            </div>
                            
                            <div class="four wide field">
                                
                                <b><label><i class="calculator icon"></i>Contacto:</label></b>
                                <input type="text" id="contactoE" name="contactoE" placeholder="Contacto del Cliente">
                               
                            </div>

                            <div class="four wide field">
                                
                                <b><label><i class="envelope icon"></i>Correo:</label></b>
                                <input type="text" id="correoE" name="correoE" placeholder="Correo del Cliente">
                                <div class="ui red pointing label"  id="correoCE"
                                    style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                                    Correo ya existe
                                    </div>
                               
                            </div>
                        

                                
                            </div>
                    </div>
                    <br><hr><br>
            </div>
            
        </form>
        
        <div class="actions" style="background-color:#D8D8D8; color:black;">
            <button id="btnCerrarE" class="ui black button">
                Cancelar
            </button>
            <button class="ui red button" id="btnEditarCliente" >
            Guardar
            </button>
        </div>
</div>


<div class="ui tiny modal" id="modalEliminar">

                <div class="header" style="background-color:#B40431; color:white;">
                    <i class="trash icon"></i>Eliminar Cliente
                </div>
                <div class="content">
                    <h4>¿Desea eliminar al cliente: <a id="name" style="color:black;"></a>?</h4>
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




<script src="./res/tablas/tablaClientes.js"></script>

<script>
    $('#nit').mask("9999-999999-999-9");
    $('#telefono').mask("9999-9999");
    $('#celular').mask("9999-9999");
    $('#nitE').mask("9999-999999-999-9");
    $('#telefonoE').mask("9999-9999");
    $('#celularE').mask("9999-9999");
function limpiar() {    
                $('#nombre').val(''); 
                $('#correo').val('');
                $('#nit').val('');
                $('#nrc').val('');
                $("#giro").val('');
                $("#categoria").val('');
               $("#tipoDocumento").val('');
               $("#condicion").val('');
                $("#telefono").val('');
                $('#direccion').val('');
                $("#celular").val('');
                $("#contacto").val('');                
                $("#btnGuardarCliente").attr("disabled", false);
                $("#labelNitEx").css("display","none");
                $('#modalAgregarCliente').modal('hide');
                $("#btnGuardarCliente").attr("disabled", false);
                $("#correoC").css("display","none");
            }

$(function(){


$('#btnCerrarE').click(function() {    
                $('#modalEditarCliente').modal('hide');
                $("#btnEditarCliente").attr("disabled", false);
                $("#labelNitExE").css("display","none");
                
                $("#btnEditarCliente").attr("disabled", false);
                $("#correoCE").css("display","none");
            });
           
        });

$('#btnModalRegistro').click(function() {
$('#modalAgregarCliente').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
});

        $(document).on("click", ".btnEliminar", function () {
            $('#modalEliminar').modal('setting', 'closable', false).modal('show');
            $('#idEliminar').val($(this).attr("id"));
            $('#name').text($(this).attr("nombre"));
        });
var editarCliente=(ele)=>{
 $('#modalEditarCliente').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
 $('#idDetalle').val($(ele).attr("id"));
 $('#telefonoE').val($(ele).attr("telefono"));
 $('#correoE').val($(ele).attr("correo"));
 $('#direccionE').val($(ele).attr("direccion"));
 $('#nitE').val($(ele).attr("nit"));
 $('#nrcE').val($(ele).attr("nrc"));
 $('#giroE').val($(ele).attr("giro"));
 $('#nombreE').val($(ele).attr("nombre"));
 $('#celularE').val($(ele).attr("celular"));
 $('#tipoDocumentoE').dropdown('set selected', $(ele).attr("tipoDoc"));
 $('#condicionE').dropdown('set selected', $(ele).attr("condicion"));;
 $('#categoriaE').dropdown('set selected', $(ele).attr("categoria"));
 $('#contactoE').val($(ele).attr("contacto"));
 $('#departamentoE').dropdown('set selected', $(ele).attr("departamento"));
 $('#nameE').text($(ele).attr("nombre"));
        }


</script>


<script>

    $("#nit").keyup(function(){

       var nit=$("#nit").val();

            $.ajax({
            type: 'POST',
            url: '?1=ClientesController&2=getNit',
            data:{nit},
            success: function(r) {

                    if(r==1)
                    {
                        
                        
                        $("#labelNitEx").css("display","block");
                    }    
                    else{

                        $("#btnGuardarCliente").attr("disabled", false);
                    }  
            }
                });

    });

    $("#nit").keyup(function(){

        $("#btnGuardarCliente").attr("disabled", false);
         $("#labelNitEx").css("display","none");
    });


$("#nitE").keyup(function(){

    var nit=$("#nitE").val();

        $.ajax({
        type: 'POST',
        url: '?1=ClientesController&2=getNit',
        data:{nit},
        success: function(r) {

                if(r==1)
                {
                    
                   
                    $("#labelNitExE").css("display","block");
                }    
                else{

                    $("#btnEditarCliente").attr("disabled", false);
                }  
        }
            });

    });

    $("#nitE").keyup(function(){

    $("#btnEditarCliente").attr("disabled", false);
    $("#labelNitExE").css("display","none");
    });




$("#correo").keyup(function(){

var email=$("#correo").val();

     $.ajax({
     type: 'POST',
     url: '?1=ClientesController&2=getEmail',
     data:{email},
     success: function(r) {

             if(r==1)
             {
                 
                 
                 $("#correoC").css("display","block");
             }    
             
     }
         });

});

$("#correo").keyup(function(){

$("#btnGuardarCliente").attr("disabled", false);
 $("#correoC").css("display","none");
});


$("#correoE").keyup(function(){

var email=$("#correoE").val();

     $.ajax({
     type: 'POST',
     url: '?1=ClientesController&2=getEmail',
     data:{email},
     success: function(r) {

             if(r==1)
             {
                 
                 
                 $("#correoCE").css("display","block");
             }    
             
     }
         });

});

$("#correoE").keyup(function(){

$("#btnEditarCliente").attr("disabled", false);
 $("#correoCE").css("display","none");
});





            $('#btnGuardarCliente').click(function() {

        alertify.confirm("¿Desea registrar al nuevo cliente",
            function(){
                
                const form = $('#frmCliente');

                const datosFormulario = new FormData(form[0]);
         
        
            $.ajax({
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                cache: false,
                type: 'POST',
                url: '?1=ClientesController&2=registrar',
                data: datosFormulario,
                success: function(r) {
                    if(r == 1) {
                        $('#modalAgregarCliente').modal('hide');
                        swal({
                            title: 'Registrado',
                            text: 'Cliente guardado con éxito',
                            type: 'success',
                            showConfirmButton: false,
                                timer: 1700

                        }).then((result) => {
                            if (result.value) {
                                location.href = '?';
                            }
                        }); 
                        $('#dtClientes').DataTable().ajax.reload();
                        limpiar();
                    } 
                }
            });
        },
            function(){
                //$("#modalCalendar").modal('toggle');
                alertify.error('Cancelado');
                
            }); 
        
            });
    



        $("#btnEliminar").click(function(){
            var idEliminar=$("#idEliminar").val();
            $.ajax({
               
                type: 'POST',
                url: '?1=ClientesController&2=eliminar',
                data: {idEliminar},
                success: function(r) {
                    if(r == 1) {
                        $('#modalEliminar').modal('hide');
                        swal({
                            title: 'Eliminado',
                            text: 'Eliminado con éxito',
                            type: 'success',
                            showConfirmButton: false,
                                timer: 1700

                        }).then((result) => {
                            if (result.value) {
                                location.href = '?';
                            }
                        }); 
                        $('#dtClientes').DataTable().ajax.reload();
                        limpiar();
                    } 
                }
            });

        });


      
            $('#btnEditarCliente').click(function() {
                var nom = $("#nameE").text();
                alertify.confirm("¿Desea modificar los datos del cliente: "+nom+"?",
            function(){
               
                const form = $('#frmEditarCliente');

                const datosFormulario = new FormData(form[0]);
         
        
            $.ajax({
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                cache: false,
                type: 'POST',
                url: '?1=ClientesController&2=editar',
                data: datosFormulario,
                success: function(r) {
                    if(r == 1) {
                        $('#modalEditarCliente').modal('hide');
                        swal({
                            title: 'Editado',
                            text: 'Datos guardados con éxito',
                            type: 'success',
                            showConfirmButton: false,
                                timer: 1700

                        }).then((result) => {
                            if (result.value) {
                                location.href = '?';
                            }
                        }); 
                        $('#dtClientes').DataTable().ajax.reload();
                        
                    } 
                }
            });
        },
            function(){
                //$("#modalCalendar").modal('toggle');
                alertify.error('Cancelado');
                
            }); 
        
            });
      

</script>
     