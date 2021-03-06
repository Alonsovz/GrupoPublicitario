<br><div id="app">
        <div class="ui grid">
        <div class="row">
        <div class="titulo">
                <font color="black" size="6px">
                <i class="users icon"></i> <i class="computer icon"></i>
                    Usuarios </font><font color="#B40431" size="20px">.</font>
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
                            <th style="background-color: black; color:white;">Nombre</th>
                            <th style="background-color: black; color:white;">Apellidos</th>
                            <th style="background-color: black; color:white;">Usuario</th>
                            <th style="background-color: black; color:white;">Email</th>
                            <th style="background-color: black; color:white;">Rol</th>
                            <th style="background-color: black; color:white;">Acciones</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<div class="ui  fullscreen modal" id="modalAgregarUsuario" style="width:60%;">

    <div class="header" style="background-color:black; color:white;" id="headerAdd">
    <i class="users icon"></i><i class="plus icon"></i> Agregar nuevo usuario
    </div>
    <div class="header" style="background-color:black; color:white;display:none;" id="headerEd">
    <i class="users icon"></i><i class="pencil icon"></i>
    Datos del usuario: 
    <a id="nameE" style="color:black; background-color:white; font-size:20px;"></a>

    <br>
    </div>
    <div class="scrolling content" class="ui equal width form" style="background-color:#F2F2F2; color:black;">
        <form class="ui form" style="font-size:15px;"  id="frmUsuario" method="POST" method="POST" enctype="multipart/form-data" action='?1=UsuarioController&2=registrar'> 
        <a class="ui blue button" id="btnDatosPer">Datos Personales</a>
            <div class="field" style="display:none" id="datosPer">
                <div class="fields">
                        <div class="five wide field">
                        <input type="hidden" name="idDetalle" id="idDetalle">
                            <label><i class="user icon"></i>Nombre</label>
                            <input type="text" name="nombre" placeholder="Nombre del usuario" id="nombre">
                                
                                <div class="ui red pointing label"  id="labelNombre"
                                style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                                Completa este campo</div>
                        </div>
                        <div class="five wide field">
                            <label><i class="user icon"></i>Apellidos</label>
                            <input type="text" name="apellido" placeholder="Apellidos" id="apellido">
                            <div class="ui red pointing label"  id="labelApellido"
                            style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                            Completa este campo</div>
                        </div>     

                        <div class="five wide field">
                        <label><i class="address card icon"></i>NIT:</label>
                        <input type="text" name="nit"  id="nit" placeholder="NIT">
                        

                        <div class="ui red pointing label"  id="labelNitEx"
                        style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                        Nit ya existe
                        </div>
                        </div>

                        <div class="five wide field">
                            <label><i class="address card icon"></i>DUI</label>
                                <input type="text" name="dui" placeholder="DUI del usuario" id="dui">
                                        <div class="ui red pointing label"  id="labelDui"
                                        style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                                        Completa este campo
                                        </div>
                                        <div class="ui red pointing label"  id="duiC"
                                        style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                                        Dui ya existe
                                        </div>
                            </div>  
                </div>
            </div>  
            
            <div class="field" style="display:none" id="datosPer1">
                <div class="fields">
                            <div class="five wide field">
                                <label><i class="calendar icon"></i>Fecha de Nacimiento</label>
                                    <input type="date" id="fechaNac" name="fechaNac">
                                        <div class="ui red pointing label"  id="labelFecha"
                                            style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                                            Completa este campo</div>
                                </div>     
                           
                            
                            <div class="six wide field">
                                
                                <b><label><i class="phone icon"></i>Teléfono:</label></b>
                                <input type="text" id="telefono" name="telefono" placeholder="Tel. del usuario">
                                <div class="ui red pointing label"  id="labelTelefono"
                                        style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                                        Completa este campo
                                </div>
                            </div>
                            
                            <div class="six wide field">
                                
                                <b><label><i class="phone icon"></i>Celular:</label></b>
                                <input type="text" id="celular" name="celular" placeholder="Tel. del usuario">
                               
                            </div>
                            <div class="six wide field">
                                
                                <b><label><i class="mail icon"></i>Correo: </label></b>
                                <input type="text" id="correo" name="correo" placeholder="Correo electrónico">
                                <div class="ui red pointing label"  id="labelCorreo"
                                        style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                                        Completa este campo
                                        </div>
                                        <div class="ui red pointing label"  id="correoC"
                                    style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                                    Correo ya existe
                                    </div>
                            </div>
                            
                            <div class="six wide field">
                            <label><i class="address card icon"></i>Dirección:</label>
                                <textarea rows="3" name="direccion" placeholder="Dirección" id="direccion"></textarea>
                                        <div class="ui red pointing label"  id="labelDireccion"
                                        style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                                        Completa este campo
                                        </div>
                                        
                            </div>

                            </div>
                            
                </div>  

                <div class="ui divider"></div>
                <a class="ui green button" id="btnDatosAfp">Datos AFP-ISSS</a>
            <div class="field" style="display:none;" id="datosAFP">
            
                <div class="fields">
                            <div class="five wide field">
                                <label><i class="address card  icon"></i>N. ISSS</label>
                                    <input type="text" id="MISSS" name="MISSS" placeholder="N . ISSS">
                                        
                                </div>     
                           
                            
                            <div class="six wide field">
                                
                                <b><label><i class="address card icon"></i>Afiliado AFP:</label></b>
                                <select name="afiliado" id="afiliado" class="ui dropdown">
                                <option value="Seleccione" set selected>Seleccione una opción</option>
                                    <option value="AFP Crecer">AFP Crecer</option>
                                    <option value="AFP Confia">AFP Confia</option>
                                    
                                </select>
                             
                            </div>
                            
                            <div class="six wide field">
                                
                                <b><label><i class="address card  icon"></i>N.AFP:</label></b>
                                <input type="text" id="MAFP" name="MAFP" placeholder="N . AFP">
                               
                            </div>

                            </div>
                            
                </div> 


                <div class="ui divider"></div>
                <a class="ui grey button" id="btnDatosFam">Datos Familiares</a>
            <div class="field" style="display:none;" id="datosCiv">
                <div class="fields">
                <div class="five wide field">
                                <label><i class="heart icon"></i>Estado familiar:</label>
                                <select name="estadoFam" id="estadoFam" class="ui dropdown">
                                <option value="Seleccione" set selected>Seleccione una opción</option>
                                    <option value="Casado/a">Casado/a</option>
                                    <option value="Soltero/a">Soltero/a</option>
                                    <option value="Divoricado/a">Divoricado/a</option>
                                    <option value="Viudo/a">Viudo/a</option>
                                    
                                </select>
                            </div>  
                           
                            
                            <div class="five wide field">
                                
                                <b><label><i class="female card icon"></i>Nombre del conyugé:</label></b>
                                <input type="text" id="conyuge" name="conyuge" readonly placeholder="Nombre de conyugé">
                               
                            </div>
                            
                            <div class="two wide field">
                                
                                <b><label><i class="users card icon"></i>Número de hijos:</label></b>
                                <input type="text" id="hijos" name="hijos" placeholder="N° de hijos">
                                
                            </div>

                            <div class="six wide field"  id="idHijos">
                                
                                <b><label><i class="users card icon"></i>Nombre de los hijos:</label></b>
                                <form action="" class="ui form" id="frmHijos" >
                        <table class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                                <thead>
                                    <tr>
                                        <th style="background-color: #217CD1; color:white;"><i class="users icon"></i>Nombre Completo</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(hijo, index) in hijos">
                                    <td>  
                                    <input class="requerido" v-model="hijo.nombreHijo" name="nombreHijo" id="nombreHijo" type="text"
                                     placeholder="Nombre completo">
                                    </td>
                    </form>
                             
                            </tr>
                        </tbody>
                    </table>
                            </div>

                            </div>
                            
                </div>    

                <div class="ui divider"></div>
                <a class="ui red button" id="btnDatosEmer">Datos de Emergencia</a>
            <div class="field" style="display:none;" id="datosPadres">
                <div class="fields">
                            <div class="five wide field">
                               
                                    <input type="text" id="padre" name="padre" placeholder="Nombre del padre"><br><br>
                                    <input type="text" id="madre" name="madre" placeholder="Nombre de la madre">
                                     
                                </div>     
                           
                            
                            <div class="six wide field">
                                
                                <b><label><i class="address card icon"></i>En caso de emergencia llamar a:</label></b>
                                <input type="text" id="emergencia" name="emergencia" placeholder="Contacto de emergencia">
                                
                            </div>
                            
                            <div class="six wide field">
                                
                                <b><label><i class="phone icon"></i>Teléfono:</label></b>
                                <input type="text" id="telefonoEme" name="telefonoEme" placeholder="Tel. Casa">
                               
                            </div>
                            
                            <div class="six wide field">
                                
                                <b><label><i class="phone icon"></i>Celular:</label></b>
                                <input type="text" id="celularEme" name="celularEme" placeholder="Tel. Celular" >
                                
                            </div>

                            </div>
                            
                </div> 

                 

                <div class="ui divider"></div>
                <a class="ui black button" id="btnDatosU">Datos Finales</a>
                    <div class="field" style="display:none" id="datosUS">

                            <div class="fields">
                            
                            

                            <div class="six wide field">
                                <label><i class="calendar icon"></i>Fecha de Ingreso</label>
                                    <input type="date" id="fechaIng" name="fechaIng">
                                          
                            </div>

                            <?php if($_SESSION["descRol"] != 'Propietario') { ?>
                            
                            <div class="six wide field" style="display:none;">
                                
                                <b><label><i class="dollar icon"></i>Salario:</label></b>
                                <input type="text" id="salario" name="salario" placeholder="Salario" value="0.00">
                                
                            </div>
                        

                            <div class="six wide field" style="display:none;">
                                
                                <b><label><i class="user icon"></i>Rol: </label></b>
                                <select id="codigoRol" name="codigoRol" class="ui dropdown">
                                <option value="6" set selected>No definido</option>
                                    <option value="1">Administrador/a</option>
                                    <option value="2">Producción</option>
                                    <option value="3">Asistente</option>
                                    <option value="5">Administrador Sustituto</option>
                                </select>       
                            </div>
                            
                            <div class="five wide field" style="display:none;">
                                
                                <b><label><i class="user icon"></i>Usuario: </label></b>
                                <input type="text" id="usuario" name="usuario" placeholder="Usuario para inicio de sesión" value="No definido">
                                <div class="ui red pointing label"  id="labelUsuario"
                                        style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                                        Completa este campo
                                        </div>

                                        <div class="ui red pointing label"  id="labelUsuarioE"
                                        style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                                        Usuario ya existe
                                        </div>
                            </div>
                            <?php }else{?>
                                <div class="six wide field">
                                
                                <b><label><i class="dollar icon"></i>Salario:</label></b>
                                <input type="text" id="salario" name="salario" placeholder="Salario">
                                
                            </div>
                        

                            <div class="six wide field" >
                                
                                <b><label><i class="user icon"></i>Rol: </label></b>
                                <select id="codigoRol" name="codigoRol" class="ui dropdown">
                                <option value="6" set selected>No definido</option>
                                    <option value="1">Administrador/a</option>
                                    <option value="2">Producción</option>
                                    <option value="3">Asistente</option>
                                    <option value="4">Propietario</option>
                                    <option value="5">Administrador Sustituto</option>
                                </select>       
                            </div>
                            
                            <div class="five wide field">
                                
                                <b><label><i class="user icon"></i>Usuario: </label></b>
                                <input type="text" id="usuario" name="usuario" placeholder="Usuario para inicio de sesión">
                                <div class="ui red pointing label"  id="labelUsuario"
                                        style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                                        Completa este campo
                                        </div>

                                        <div class="ui red pointing label"  id="labelUsuarioE"
                                        style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                                        Usuario ya existe
                                        </div>
                            </div>

                            <?php   }  ?>
                            
                        

                                
                            </div>
                    </div>
                    
            </div>
        </form>

        <div class="actions" style="background-color:#D8D8D8; color:black;">
            <button onclick="limpiar()" class="ui red button">
                Cancelar
            </button>
            <button class="ui black button" id="btnGuardarUsuario">
            Guardar
            </button>

            <button class="ui black button" id="btnEditarUsuario" >
            Guardar Cambios
            </button>
        </div>
</div>




<div class="ui tiny modal" id="modalEliminar">

                <div class="header" style="background-color:black; color:white;">
                <i class="trash icon"></i>Eliminar usuario
                </div>
                <div class="content">
                    <h3>¿Desea eliminar del sistema a <a id="name" style="color:black;"></a>?</h3>
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

<script src="./res/tablas/tablaUsuarios.js"></script>




<script>
$(document).ready(function(){

app.eliminarDetalleHijos();
$('#dui').mask("99999999-9");
    $('#telefono').mask("9999-9999");
    $('#celular').mask("9999-9999");
    $('#duiE').mask("99999999-9");
    $('#telefonoE').mask("9999-9999");
    $('#nit').mask("9999-999999-999-9");
    $('#telefonoEme').mask("9999-9999");
    $('#celularEme').mask("9999-9999");
    $('#salario').mask("###0.00", {reverse: true});
});
var app = new Vue({
        el: "#app",
        data: {
            hijos: [{
                nombreHijo: '',
               
               
            }],
        },
        methods: {
            eliminarDetalleHijos() {
                this.hijos = [];
            },
            agregarDetalleHijos() {
                this.hijos.push({
                    nombreHijo: '',
            
                });
            
            },
            guardarHijos() {

            if (this.hijos.length) {

                $('#frmHijos').addClass('loading');
                $.ajax({
                    type: 'POST',
                    data: {
                        lista: JSON.stringify(this.hijos)
                    },
                    url: '?1=UsuarioController&2=guardarHijos',
                    success: function (r) {
                        $('#frmHijos').removeClass('loading');
                        if (r == 1) {
                            
                                    app.hijos = [{
                                        nombreHijo: '',
                                    }];

                                
                                        
                        }
                        
                    }
                });
            }

            },


        }
    });

    $("#hijos").keyup(function(){
        var cantidad = $(this).val();

        if(cantidad > 0){
        for (var i = 0; i < cantidad; i++) {
            app.agregarDetalleHijos();
        }
    }
    else{
        app.eliminarDetalleHijos();
    } 
    });


    

    $("#btnDatosAfp").click(function(){
        $("#datosAFP").show(1000);
        $("#datosCiv").hide(1000);
        $("#datosEmer").hide(1000);
        $("#datosPadres").hide(1000);
        $("#datosUS").hide(1000);
        $("#datosPer").hide(1000);
        $("#datosPer1").hide(1000);
    });

    $("#btnDatosFam").click(function(){
        $("#datosAFP").hide(1000);
        $("#datosCiv").show(1000);
        $("#datosEmer").hide(1000);
        $("#datosPadres").hide(1000);
        $("#datosUS").hide(1000);
    });

    $("#btnDatosEmer").click(function(){
        $("#datosAFP").hide(1000);
        $("#datosCiv").hide(1000);
        $("#datosEmer").hide(1000);
        $("#datosPadres").show(1000);
        $("#datosUS").hide(1000);
        $("#datosPer").hide(1000);
        $("#datosPer1").hide(1000);
    });


    $("#btnDatosU").click(function(){
        $("#datosAFP").hide(1000);
        $("#datosCiv").hide(1000);
        $("#datosEmer").hide(1000);
        $("#datosPadres").hide(1000);
        $("#datosUS").show(1000);
        $("#datosPer").hide(1000);
        $("#datosPer1").hide(1000);
    });

    $("#btnDatosPer").click(function(){
        $("#datosAFP").hide(1000);
        $("#datosCiv").hide(1000);
        $("#datosEmer").hide(1000);
        $("#datosPadres").hide(1000);
        $("#datosUS").hide(1000);
        $("#datosPer").show(1000);
        $("#datosPer1").show(1000);
    });

    $("#estadoFam").change(function(){
        var res = $(this).val();

        if(res ==  "Casado/a"){
            $("#conyuge").prop("readonly" , false);
        }
        else{
            $("#conyuge").prop("readonly",true);
            $("#conyuge").val('');
        }
    });
    
function limpiar() {    
                location.reload();
            }
$(function(){


$('#btnCerrarE').click(function() {    
                $('#modalEditarUsuario').modal('hide');
            });
           
        });

$('#btnModalRegistro').click(function() {
$('#modalAgregarUsuario').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
$("#headerAdd").show();
$("#headerEd").hide();
$("#btnEditarUsuario").hide();
$("#btnGuardarUsuario").show();
$("#idHijos").show();
});

        $(document).on("click", ".btnEliminar", function () {
            $('#modalEliminar').modal('setting', 'closable', false).modal('show');
            $('#idEliminar').val($(this).attr("id"));
            $('#name').text($(this).attr("nombre") +" "+$(this).attr("apellido"));
        });
$(document).on("click", ".btnEditar", function () {
 $('#modalAgregarUsuario').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
 $('#idDetalle').val($(this).attr("id"));
 $('#nombre').val($(this).attr("nombre"));
 $('#apellido').val($(this).attr("apellido"));
 $('#nit').val($(this).attr("nit"));
 $('#celular').val($(this).attr("celular"));
 $('#fechaNac').val($(this).attr("fechaNac"));
 $('#dui').val($(this).attr("dui"));
 $('#telefono').val($(this).attr("telefono"));
 $('#correo').val($(this).attr("correo"));
 $('#direccion').val($(this).attr("direccion"));

 $('#MISSS').val($(this).attr("MISSS"));
 $('#afiliado').dropdown('set selected', $(this).attr("afiliado"));
 $('#MAFP').val($(this).attr("MAFP"));

 $('#estadoFam').dropdown('set selected', $(this).attr("estadoCivil"));
 $('#conyuge').val($(this).attr("conyuge"));
 $('#hijos').val($(this).attr("hijos"));

 $('#padre').val($(this).attr("nomPadre"));
 $('#madre').val($(this).attr("nomMadre"));
 $('#emergencia').val($(this).attr("nomEmergencia"));
 $('#telefonoEme').val($(this).attr("telEmergencia"));
 $('#celularEme').val($(this).attr("celEmergenecia"));

 $('#fechaIng').val($(this).attr("fechaIngreso"));
 $('#salario').val($(this).attr("salario"));
 $('#usuario').val($(this).attr("usuario"));
 $('#codigoRol').dropdown('set selected', $(this).attr("rol"));

 $('#nameE').text("--- "+$(this).attr("nombre") +" "+$(this).attr("apellido") + "---" +$(this).attr("descRol")+"---");
 $("#headerAdd").hide();
$("#headerEd").show();
$("#btnEditarUsuario").show();
$("#btnGuardarUsuario").hide();
$("#idHijos").hide();
        });


</script>


<script>


    $("#usuario").keyup(function(){

       var user=$("#usuario").val();

            $.ajax({
            type: 'POST',
            url: '?1=UsuarioController&2=getUserName',
            data:{user},
            success: function(r) {

                    if(r==1)
                    {
                        
                        $("#btnGuardarUsuario").attr("disabled", true);
                        $("#labelUsuarioE").css("display","block");
                    }    
                    else{

                        $("#btnRegistrar").attr("disabled", false);
                    }  
            }
                });

    });

    $("#usuario").keyup(function(){

        $("#btnGuardarUsuario").attr("disabled", false);
         $("#labelUsuarioE").css("display","none");
    });


$("#dui").keyup(function(){

var dui=$("#dui").val();

     $.ajax({
     type: 'POST',
     url: '?1=UsuarioController&2=getDui',
     data:{dui},
     success: function(r) {

             if(r==1)
             {
                 
                 $("#btnGuardarUsuario").attr("disabled", true);
                 $("#duiC").css("display","block");
             }    
             else{

                 $("#btnRegistrar").attr("disabled", false);
             }  
     }
         });

});

$("#correo").keyup(function(){

 $("#btnGuardarUsuario").attr("disabled", false);
  $("#correoC").css("display","none");
});

$("#correo").keyup(function(){

var email=$("#correo").val();

     $.ajax({
     type: 'POST',
     url: '?1=UsuarioController&2=getEmail',
     data:{email},
     success: function(r) {

             if(r==1)
             {
                 
                 $("#btnGuardarUsuario").attr("disabled", true);
                 $("#correoC").css("display","block");
             }    
             
     }
         });

});






$(function(){
               


            $('#btnGuardarUsuario').click(function() {
                
                const form = $('#frmUsuario');

                const datosFormulario = new FormData(form[0]);
         
        
            $.ajax({
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                cache: false,
                type: 'POST',
                url: '?1=UsuarioController&2=registrar',
                data: datosFormulario,
                success: function(r) {
                    if(r == 1) {
                        $('#modalAgregarUsuario').modal('hide');
                        app.guardarHijos();
                        swal({
                            title: 'Registrado',
                            text: 'La Contraseña por defecto para usuario es 123, puede ser modificada...',
                            type: 'success',
                            showConfirmButton: true,
                            }).then((result) => {
                                if (result.value) {
                            
                               location.reload();
                               
                            }
                        }); 
                        
                    } 
                }
            });
        
            });
        });


        $('#btnEditarUsuario').click(function() {
            const form = $('#frmUsuario');

                const datosFormulario = new FormData(form[0]);


                $.ajax({
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                cache: false,
                type: 'POST',
                url: '?1=UsuarioController&2=editar',
                data: datosFormulario,
                success: function(r) {
                    if(r == 1) {
                        $('#modalAgregarUsuario').modal('hide');
                        
                        swal({
                            title: 'Modificado',
                            text: 'Guardado con éxito',
                            type: 'success',
                            showConfirmButton: true,
                            }).then((result) => {
                                if (result.value) {
                            
                            location.reload();
                            
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
                url: '?1=UsuarioController&2=eliminar',
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
                        $('#dtUsuarios').DataTable().ajax.reload();
                        limpiar();
                    } 
                }
            });

        });


      

           
</script>
     