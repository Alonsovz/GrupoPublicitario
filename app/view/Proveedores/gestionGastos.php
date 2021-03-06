<div id="app">
        <div class="ui grid">
        <div class="row">
                <div class="titulo">
               <font color="#848484" size="6px">
                <i class="users icon"></i> <i class="truck icon"></i>
                    Proveedores de Gastos de oficina </font><font color="black" size="20px">.</font>
                    <br><br>
                    <a class="ui red button" id="proPro" href="?1=ProveedoresController&2=gestion">Proveedores de productos</a>
                <a class="ui black button" id="proGas" href="?1=ProveedoresController&2=gestionGastos">Proveedores de Gastos</a>
                
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
                <table id="dtProveedor" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                    <thead>
                        <tr>
                        
                            <th style="background-color: #BDBDBD; color:black;">N°</th>
                            <th style="background-color: #BDBDBD; color:black;">Nombre</th>
                            <th style="background-color: #BDBDBD; color:black;">NRC</th>
                            <th style="background-color: #BDBDBD; color:black;">Departamento</th>
                            <th style="background-color: #BDBDBD; color:black;">Giro</th>
                            <th style="background-color: #BDBDBD; color:black;">Acciones</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="ui  modal" id="modalAgregarProveedor"  style="width:80%;">

<div class="header" style="background-color:#B40431; color:white;">
<i class="user plus icon"></i><i class="truck icon"></i> Agregar nuevo proveedor
</div>
<div class="content" class="ui equal width form" style="background-color:#F2F2F2; color:black;">
    <form  style="font-size:15px;" class="ui form" id="frmProveedor" method="POST" enctype="multipart/form-data"> 
       
    <div class="field">
            <div class="fields">
                    <div class="six wide field">
                        <label ><i class="user icon"></i>Nombre:</label>
                        <input type="text" name="nombre" placeholder="Nombre del proveedor" id="nombre">
                    </div>
                    <div class="five wide field">
                        <label><i class="address card icon"></i>NIT:</label>
                        <input type="text" name="nit"  id="nit" placeholder="NIT de proveedor">
                        

                        <div class="ui red pointing label"  id="labelNitEx"
                        style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                        Nit ya existe
                        </div>
                        
                    </div>
                    
                    <div class="five wide field">
                        <label><i class="address card outline icon"></i>NRC:</label>
                        <input type="text" name="nrc" placeholder="NRC de proveedor" id="nrc">
                    </div> 
            </div>
        </div>  
        
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
                            <textarea rows="3" name="giro" placeholder="Giro del proveedor" id="giro"></textarea>
                                    
                        </div>  
                        
                        </div>
                        
            </div>   
            <br><hr><br>
            <div class="field">
                        <div class="fields">
            <div class="eight wide field">
                            
                            <b><label><i class="book icon"></i>Gasto:</label></b>
                            <select id="gastos" name="gastos" class="ui search dropdown">
                                
                                <option value="Seleccione" set selected>Seleccione una opción</option>
>
                            </select> 
                           
                        </div>

                        
                </div>
                </div>
                <br><hr><br>
                <div class="field">
                        <div class="fields">
                        
                        <div class="eight wide field">
                            
                            <b><label><i class="user circle icon"></i>Categoría: </label></b>
                            <select id="categoria" name="categoria" class="ui dropdown">
                                <option value="Gran Contribuyente">Gran Contribuyente</option>
                                <option value="Mediano Contribuyente">Mediano Contribuyente</option>
                                <option value="Pequeño Contribuyente">Pequeño Contribuyente</option>
                                <option value="Otro Contribuyente">Otro Contribuyente</option>
                            </select> 
                           
                        </div>
                        
                       

                        <div class="eight wide field">
                            
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
                            <input type="text" id="contacto" name="contacto" placeholder="Contacto del proveedor">
                           
                        </div>

                        <div class="four wide field">
                            
                            <b><label><i class="envelope icon"></i>Correo:</label></b>
                            <input type="text" id="correo" name="correo" placeholder="Correo del proveedor">
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
        <button class="ui red button" id="btnGuardarProveedor" >
        Guardar
        </button>
    </div>
</div>


<div class="ui  modal" id="modalEditarProveedor"  style="width:80%;">

<div class="header" style="background-color:#B40431; color:white;">
<i class="users icon"></i><i class="truck icon"></i><i class="pencil icon"></i>
 Editar datos del proveedor: <a id="nameE" style="background-color:white; color:black; font-size:20px;"></a>
</div>
<div class="content" class="ui equal width form" style="background-color:#F2F2F2; color:black;">
    <form  style="font-size:15px;" class="ui form" id="frmEditarProveedor" method="POST" method="POST" enctype="multipart/form-data" action='?1=ClienteController&2=registrar'> 
        
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
                    <div class="eight wide field">
                            
                            <b><label><i class="book icon"></i>Gasto:</label></b>
                            <select id="gastosE" name="gastosE" class="ui search dropdown">
                                
                                <option value="Seleccione" set selected>Seleccione una opción</option>
>
                            </select> 
                           
                        </div>
                    

                            
                        </div>
                </div>
                <br><hr><br>
                <div class="field">
                        <div class="fields">
                        
                        <div class="eight wide field">
                            
                            <b><label><i class="user circle icon"></i>Categoría: </label></b>
                            <select id="categoriaE" name="categoriaE">
                                <option value="Gran Contribuyente">Gran Contribuyente</option>
                                <option value="Mediano Contribuyente">Mediano Contribuyente</option>
                                <option value="Pequeño Contribuyente">Pequeño Contribuyente</option>
                                <option value="Otro Contribuyente">Otro Contribuyente</option>
                            </select> 
                           
                        </div>
                        
                       

                        <div class="eight wide field">
                            
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
                
        </div>
        
    </form>

    <div class="actions" style="background-color:#D8D8D8; color:black;">
        <button  id="btnCerrarE" class="ui black button">
            Cancelar
        </button>
        <button class="ui red button" id="btnEditarProveedor">
        Guardar
        </button>
    </div>
    
    
</div>


<div class="ui tiny modal" id="modalEliminar">

            <div class="header" style="background-color:#B40431; color:white;">
                <i class="trash icon"></i>Eliminar proveedor
            </div>
            <div class="content">
                <h4>¿Desea eliminar al proveedor: <a id="name" style="color:black;"></a>?</h4>
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




<script src="./res/tablas/tablaProveedoresGastos.js"></script>

<script>
$(document).ready(function(){
$("#proGas").removeClass("ui black button");
$("#proGas").addClass("ui black basic button");


$(function() {
        

        var option = '';
        var gasto = '<?php echo $gastos?>';

        $.each(JSON.parse(gasto), function() {
            option = `<option value="${this.idGasto}">${this.nombre}</option>`;

            $('#gastos').append(option);
        });


        var option1 = '';
        var gastosE = '<?php echo $gastos?>';

        $.each(JSON.parse(gastosE), function() {
            option1 = `<option value="${this.idGasto}">${this.nombre}</option>`;

            $('#gastosE').append(option1);
        });
    });

    });



$('#nit').mask("9999-999999-999-9");
$('#telefono').mask("9999-9999");
$('#celular').mask("9999-9999");
$('#nitE').mask("9999-999999-999-9");
$('#telefonoE').mask("9999-9999");
$('#celularE').mask("9999-9999");
$('#editarPro').hide();
$('#validar').val(1);
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
            $('#modalAgregarProveedor').modal('hide');
            $("#btnGuardarProveedor").attr("disabled", false);
            $("#correoC").css("display","none");
        }

$(function(){


$('#btnCerrarE').click(function() {    
            $('#modalEditarProveedor').modal('hide');
            $("#btnEditarProveedor").attr("disabled", false);
            $("#labelNitExE").css("display","none");
            
            $('#editarPro').hide();
            $("#correoCE").css("display","none");
        });
       
    });

$('#btnModalRegistro').click(function() {
$('#modalAgregarProveedor').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
});

    $(document).on("click", ".btnEliminar", function () {
        $('#modalEliminar').modal('setting', 'closable', false).modal('show');
        $('#idEliminar').val($(this).attr("id"));
        $('#name').text($(this).attr("nombre"));
    });
var editarProveedor=(ele)=>{
$('#modalEditarProveedor').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
$('#idDetalle').val($(ele).attr("id"));
$('#telefonoE').val($(ele).attr("telefono"));
$('#correoE').val($(ele).attr("correo"));
$('#direccionE').val($(ele).attr("direccion"));
$('#nitE').val($(ele).attr("nit"));
$('#nrcE').val($(ele).attr("nrc"));
$('#giroE').val($(ele).attr("giro"));
$('#nombreE').val($(ele).attr("nombre"));
$('#celularE').val($(ele).attr("celular"));
$('#gastosE').dropdown('set selected', $(ele).attr("idGasto"));
$('#condicionE').dropdown('set selected', $(ele).attr("condicion"));;
$('#categoriaE').dropdown('set selected', $(ele).attr("categoria"));
$('#contactoE').val($(ele).attr("contacto"));
$('#departamentoE').dropdown('set selected', $(ele).attr("departamento"));
$('#nameE').text($(ele).attr("nombre")+"--Gasto:"+$(ele).attr("gasto"));
    }


</script>


<script>
$("#editarSum").click(function(){
    $('#editarPro').show('2000');
});
$("#nit").keyup(function(){

   var nit=$("#nit").val();

        $.ajax({
        type: 'POST',
        url: '?1=ProveedoresController&2=getNit',
        data:{nit},
        success: function(r) {

                if(r==1)
                {
                    
                  //  $("#btnGuardarProveedor").attr("disabled", true);
                    $("#labelNitEx").css("display","block");
                }    
                else{

                    $("#btnGuardarProveedor").attr("disabled", false);
                }  
        }
            });

});

$("#nit").keyup(function(){

    $("#btnGuardarProveedor").attr("disabled", false);
     $("#labelNitEx").css("display","none");
});


$("#nitE").keyup(function(){

var nit=$("#nitE").val();

 $.ajax({
 type: 'POST',
 url: '?1=ProveedoresController&2=getNit',
 data:{nit},
 success: function(r) {

         if(r==1)
         {
             
           //  $("#btnEditarProveedor").attr("disabled", true);
             $("#labelNitExE").css("display","block");
         }    
         else{

             $("#btnEditarProveedor").attr("disabled", false);
         }  
 }
     });

});

$("#nitE").keyup(function(){

$("#btnGuardarProveedor").attr("disabled", false);
$("#labelNitExE").css("display","none");
});




$("#correo").keyup(function(){

var email=$("#correo").val();

 $.ajax({
 type: 'POST',
 url: '?1=ProveedoresController&2=getEmail',
 data:{email},
 success: function(r) {

         if(r==1)
         {
             
          //   $("#btnGuardarProveedor").attr("disabled", true);
             $("#correoC").css("display","block");
         }    
         
 }
     });

});

$("#correo").keyup(function(){

$("#btnGuardarProveedor").attr("disabled", false);
$("#correoC").css("display","none");
});


$("#correoE").keyup(function(){

var email=$("#correoE").val();

 $.ajax({
 type: 'POST',
 url: '?1=ProveedoresController&2=getEmail',
 data:{email},
 success: function(r) {

         if(r==1)
         {
             
          //   $("#btnEditarProveedor").attr("disabled", true);
             $("#correoCE").css("display","block");
         }    
         
 }
     });

});

$("#correoE").keyup(function(){

$("#btnEditarProveedor").attr("disabled", false);
$("#correoCE").css("display","none");
});





        $('#btnGuardarProveedor').click(function() {

    alertify.confirm("¿Desea registrar al nuevo proveedor?",
        function(){
            
            const form = $('#frmProveedor');

            const datosFormulario = new FormData(form[0]);
     
    
        $.ajax({
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            cache: false,
            type: 'POST',
            url: '?1=ProveedoresController&2=registrarNP',
            data: datosFormulario,
            success: function(r) {
                if(r == 1) {
                    $('#modalAgregarProveedor').modal('hide');
                    swal({
                        title: 'Registrado',
                        text: 'Proveedor guardado con éxito',
                        type: 'success',
                        showConfirmButton: false,
                            timer: 1700

                    }).then((result) => {
                        if (result.value) {
                            location.href = '?';
                        }
                    }); 
                    $('#dtProveedor').DataTable().ajax.reload();
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
            url: '?1=ProveedoresController&2=eliminarNP',
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
                    $('#dtProveedor').DataTable().ajax.reload();
                    limpiar();
                } 
            }
        });

    });


  
        $('#btnEditarProveedor').click(function() {
            var nom = $("#nameE").text();
            alertify.confirm("¿Desea modificar los datos del proveedor?",
        function(){
           
            const form = $('#frmEditarProveedor');

            const datosFormulario = new FormData(form[0]);
     
    
        $.ajax({
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            cache: false,
            type: 'POST',
            url: '?1=ProveedoresController&2=editarNP',
            data: datosFormulario,
            success: function(r) {
                if(r == 1) {
                    $('#modalEditarProveedor').modal('hide');
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
                    $('#dtProveedor').DataTable().ajax.reload();
                    
                    $('#editarPro').hide();
                    $('#validar').val(1);
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
