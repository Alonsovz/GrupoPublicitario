
<?php 
     $id=$_SESSION['codigoUsuario'];

?>
<script>
    $(document).ready(function() {
        // $('#nomUser').val(<?php echo "'".$_SESSION['nomUsuario']."'"; ?>);
        // $('#nom').val(<?php echo "'".$_SESSION['nombre']."'"; ?>);
        // $('#ape').val(<?php echo "'".$_SESSION['apellido']."'"; ?>);
        // $('#correo').val<?php echo "'".$_SESSION['email']."'"; ?>);
        // $('#dui').val<?php echo "'".$_SESSION['dui']."'"; ?>);
        // $('#telefono').val<?php echo "'".$_SESSION['telefono']."'"; ?>);
        // $('#direccion').val<?php echo "'".$_SESSION['direccion']."'"; ?>);
    });     
</script>

<!-- <input type="hidden" id="idUser" name="idUser" value=<?php echo '"'.$_SESSION['idUsuario'].'"'; ?> -->

<!-- modal de registro -->
<div class="ui tiny modal" id="modalCambiarNomUser">

    <div class="header">
    <i class="user icon"></i> Mi usuario<font color="#85BC22" size="20px">.</font>
    </div>
    <div class="content">
        <form class="ui form" id="frmCambiarNomUser">
            <div class="field">
                <label for="">Nombre de Usuario:</label>
                <input class="reqRegistrar" type="text" name="nomUser" id="nomUser" value=<?php echo '"'.$_SESSION['nomUsuario'].'"'; ?>>
                <div class="ui red pointing label" style="display: none;">
                </div>
            </div>
        </form>
    </div>
    <div class="actions">
        <button class="ui black deny button" id="btnCancelarRegistrar">
            Cancelar
        </button>
        <button class="ui red right button" id="btnGuardarNomUser">
            Guardar Cambios
        </button>
    </div>
</div>


<!-- modal de registro -->
<div class="ui tiny modal" id="modalCambiarNom">

    <div class="header">
    <i class="street view icon"></i> Datos Personales
    </div>
    <div class="content">
        <form class="ui form" id="frmCambiarNom">
            <div class="two fields">
                <div class="field">
                    <label for="">Nombres:</label>
                    <input class="reqRegistrar letras" type="text" name="nom" id="nom" value=<?php echo '"'.$_SESSION['nombre'].'"'; ?>>
                    <div class="ui red pointing label" style="display: none;">
                    </div>
                </div>
                <div class="field">
                    <label for="">Apellidos:</label>
                    <input class="reqRegistrar letras" type="text" name="ape" id="ape" value=<?php echo '"'.$_SESSION['apellido'].'"'; ?>>
                    <div class="ui red pointing label" style="display: none;">
                    </div>
                </div>
            </div>

            <div class="fields">
                <div class=" four wide field">
                    <label for="">DUI:</label>
                    <input class="reqRegistrar" type="text" name="dui" id="dui" value=<?php echo '"'.$_SESSION['dui'].'"'; ?>>
                    <div class="ui red pointing label" style="display: none;">
                    </div>
                </div>
                <div class="eight wide field">
                    <label for="">Correo:</label>
                    <input class="reqRegistrar" type="text" name="correo" id="correo" value=<?php echo '"'.$_SESSION['email'].'"'; ?>>
                    <div class="ui red pointing label" style="display: none;">
                    </div>
                </div>

                <div class="four wide field">
                    <label for="">Teléfono:</label>
                    <input class="reqRegistrar" type="text" name="telefono" id="telefono" value=<?php echo '"'.$_SESSION['telefono'].'"'; ?>>
                    <div class="ui red pointing label" style="display: none;">
                    </div>
                </div>
            </div>

            <div class="fields">
               

                <div class="sixteen wide field">
                    <label for="">Dirección:</label>
                    <input class="reqRegistrar" type="text" name="direccion" id="direccion" value=<?php echo '"'.$_SESSION['direccion'].'"'; ?>>
                    <div class="ui red pointing label" style="display: none;">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="actions">
        <button class="ui black deny button" id="btnCancelarRegistrar">
            Cancelar
        </button>
        <button class="ui red right button" id="btnGuardarNom">
            Guardar Cambios
        </button>
    </div>
</div>

<!-- modal de registro -->
<div class="ui tiny modal" id="modalCambiarContra">

    <div class="header">
    <i class="cogs icon"></i> Cambiar Contraseña
    </div>
    <div class="content">
        <form class="ui form" id="frmCambiarContra">
            
                <label for="">Contraseña Actual:</label>
                <div class="two fields">
                <input type="password" name="antPass" id="antPass" class="requerido">
                <div id="show-contra" class="ui basic label show-contra"><i style="margin: 0;" id="icon-contra" class="eye slash icon"></i></div>
                <a id="label-error" style="display: none; margin: 0; text-align:center;" class="ui red fluid large label">Datos
                        Incorrectos</a>
                <div class="ui red pointing label" style="display: none;">
                </div>
            </div>
                <label for="">Nueva Contraseña:</label>
                <div class="two fields">
                <input  type="password" name="nuPass" id="nuPass" class="requerido">
                <div id="show-contra" class="ui basic label show-contra"><i style="margin: 0;" id="icon-contra" class="eye slash icon"></i></div>
                <div class="ui red pointing label" style="display: none;">
                </div>
            </div>
        </form>
    </div>
    <div class="actions">
        <button class="ui black deny button" id="btnCancelarModificar">
            Cancelar
        </button>
        <button class="ui red right button" id="btnGuardarContra">
            Guardar Cambios
        </button>
    </div>
</div>

<!-- modal de registro -->

        <div class="ui grid">
            <div class="row">
                <div class="sixteen wide column">
                    <div class="barra-titulo">
                        <p class="texto-barra-titulo">
                        <h1><i class="user icon"></i>
                Mi cuenta<font color="#B40431" size="20px"> .</font></h1><hr>
                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
        
                <div class="eight wide column">
                   <a style="font-weight:bold; font-size:19px; color:#B40431;"><i class="user outline icon"></i>Usuario:</a>
                    <b style="font-size:16px;">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php echo $_SESSION['nomUsuario'] ?></b>
                    <div class="ui divider"></div>
                    <a style="font-weight:bold; font-size:19px; color:#B40431;"><i class="street view  icon"></i>Nombre Completo: </a>
                    <b style="font-size:16px;">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php echo $_SESSION['nombre'].' '.$_SESSION['apellido']?></b>
                    <div class="ui divider"></div>
                    <a style="font-weight:bold; font-size:19px; color:#B40431;"> <i class="address card  icon"></i>Documento de identidad:</a>
                    <b style="font-size:16px;">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;
                    <?php echo $_SESSION['dui'] ?></b>
                    <div class="ui divider"></div>
                    <a style="font-weight:bold; font-size:19px; color:#B40431;"><i class="phone  icon"></i>N° Teléfono:</a>
                    <b style="font-size:16px;">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php echo $_SESSION['telefono']?></b>
                    <div class="ui divider"></div>
                    <a style="font-weight:bold; font-size:19px; color:#B40431;"> <i class="map marker  icon"></i>Dirección: </a>
                    <b style="font-size:16px;">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php echo $_SESSION['direccion']?></b>
                    <div class="ui divider"></div>
                    <a style="font-weight:bold; font-size:19px; color:#B40431;"> <i class="cog icon"></i>Permisos de la cuenta:</a>
                    <b style="font-size:16px;">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php echo $_SESSION['descRol'] ?></b>
                </div>

                 <div class="four wide column right floated">
                <center><h3><i class="cogs icon"></i> Opciones de configuración.</h3></center>
                    <div class="ui list">
                    <div class="item">
                            <button class="ui right floated fluid red button" id="btnCambiarNomUser" type="button"><i class="user icon"></i>Usuario</button>
                        </div>
                        <div class="item">
                            <button class="ui right floated fluid black  button" id="btnCambiarNom" type="button"><i class="street view icon"></i>Datos Personales</button>
                        </div>
                        <div class="item">
                            <button class="ui right floated fluid gray button" id="btnCambiarContra" type="button"><i class="lock icon"></i>Modificar contraseña</button>
                        </div>
                        

                        
                    </div>
                </div>

            </div>

        </div>
        <script>
        $(function () {
            $('#antPass').keyup(function () {
                $('#label-error').css('display', 'none');
            });
        });
    </script>
<script>
    $("#dui").mask('99999999-9');
    $("#telefono").mask('9999-9999');
 $(document).on("click", "#btnCambiarNomUser", function () {
            $('#modalCambiarNomUser').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
        });

        $(document).on("click", "#btnCambiarNom", function () {
            $('#modalCambiarNom').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
        });
        
        $(document).on("click", "#btnCambiarContra", function () {
            $('#modalCambiarContra').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
        });
        $(document).on("click", "#btnEliminarCuenta", function () {
            $('#modalEliminarCuenta').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
        });

        $(function() {
        $('#btnGuardarNom').click(function() {
            var idU=<?php echo $id ?>;
            var nombreUser = $('#nom').val();
            var apeUser = $('#ape').val();
            var dui = $('#dui').val();
            var telefono = $('#telefono').val();
            var email = $('#correo').val();
            var direccion = $('#direccion').val();

           $.ajax({
               type: 'POST',
               url: '?1=UsuarioController&2=actualizarDatosPersonales',
               data: {
                   id: idU,
                   nom: nombreUser,
                   ape:apeUser,
                   dui:dui,
                   telefono:telefono,
                   email:email,
                   direccion:direccion,
               },
               success: function(r) {
                $('#frmCambiarNom').removeClass('loading');
                   if(r == 1) {
                    swal({
                            title: 'Cambios realizados',
                            text: 'Para verificar sus cambios deberá iniciar sesión nuevamente',
                            type: 'success',
                            showConfirmButton: true
                        }).then((result) => {
                                        if (result.value) {
                                            location.href = '?';
                                        }
                                    }); 
                        
                        $('#modalCambiarNom').modal('hide');

                   }
               }
           });
        });
    });


    $(function() {
        $('#btnGuardarNomUser').click(function() {
            var idU=<?php echo $id ?>;
            var nombreUser = $('#nomUser').val();
           

           $.ajax({
               type: 'POST',
               url: '?1=UsuarioController&2=editarNom',
               data: {
                   id: idU,
                   user: nombreUser,
               },
               success: function(r) {
                $('#frmCambiarNomUser').removeClass('loading');
                   if(r == 1) {
                    swal({
                            title: 'Cambios realizados',
                            text: 'Para verificar sus cambios deberá iniciar sesión nuevamente',
                            type: 'success',
                            showConfirmButton: true
                        }).then((result) => {
                                        if (result.value) {
                                            location.href = '?';
                                        }
                                    }); 
                        
                        $('#modalCambiarNomUser').modal('hide');

                   }
               }
           });
        });
    });


    // Metodo para comprobar que la contraseña exista
    $("#antPass").change(function(){
        var idU=<?php echo $id ?>;
        var pass=$("#antPass").val();

            $.ajax({
               type: 'POST',
               url: '?1=UsuarioController&2=getPass',
               data:{idU,pass},
               success: function(r) {

                        var data=JSON.parse(r);
                        if(data['pass']!=data['passEnc'])
                        {
                            
                            $('#btnGuardarContra').hide();
                            $('#label-error').css('display','block');
                        }
                        else
                        {
                            $('#btnGuardarContra').show();
                           
                        }
               }
           });

       

    });

    



    $(function() {
        $('#btnGuardarContra').click(function() {
            var idU=<?php echo $id ?>;
            var contraAnterior = $('#antPass').val();
            var contraNueva = $('#nuPass').val();

           $.ajax({
               type: 'POST',
               url: '?1=UsuarioController&2=reestablecerContra',
               data: {
                   id: idU,
                   nuPass: contraNueva,
               },
               success: function(r) {
                $('#frmCambiarContra').removeClass('loading');
                   if(r == 1) {
                    swal({
                            title: 'Cambios realizados',
                            text: 'Al iniciar sesión nuevamente debe utilizar su nueva contraseña',
                            type: 'success',
                            showConfirmButton: true
                        }); 
                        
                        $('#modalCambiarContra').modal('hide');

                   }else{
                            $('#label-error').html('Datos Incorrectos');
                            $('#label-error').css('display', 'inline-block');
                        }
               }
           });
        });
    });


    $("#btnCancelarModificar").click(function(){

             $('#label-error').css('display', 'none');
             $('#antPass').val("");
             $('#nuPass').val("");
             $('#btnGuardarContra').show();

    });


    $(function() {
        $('#btnConfEliminarCuenta').click(function() {
            var idU=<?php echo $id ?>;

           $.ajax({
               type: 'POST',
               url: '?1=UsuarioController&2=eliminarCuenta',
               data: {
                   id: idU
               },
               success: function(r) {
                $('#frmEliminarCuenta').removeClass('loading');
                   if(r == 1) {
                    swal({
                            title: 'Aviso',
                            text: 'No podrás acceder nuevamente al sistema',
                            type: 'warning',
                            showConfirmButton: true
                        }).then((result) => {
                                        if (result.value) {
                                            location.href = '?';
                                        }
                                    }); 
                        
                        $('#modalEliminarCuenta').modal('hide');

                   }else{
                            $('#label-error').html('Datos Incorrectos');
                            $('#label-error').css('display', 'inline-block');
                        }
               }
           });
        });
    });
        ;
</script>
 <script>
        $(function () {
            $('.show-contra').mousedown(function () {
                $(this).children().attr('class', 'eye icon');
                $(this).siblings('input.requerido').attr('type', 'text');
            });


            $('.show-contra').mouseup(function () {
                $(this).children().attr('class', 'eye slash icon');
                $(this).siblings('input.requerido').attr('type', 'password');
            });

        });
    </script>

    