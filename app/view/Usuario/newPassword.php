<style>
    body {
        overflow: hidden;
    }
</style>
<!-- kiondaquepex -->

<body class="body-login">
    <div id="fondo-dot"></div>
    <div id="app">
        <div class="contenedor" style="margin-top:0; height: 100vh; background: none !important; display: flex;
        align-items: center;
        justify-content: center;">
             <div class="cuadro" style="border: 5px solid black; border-radius:28px 28px 28px 28px;min-width: 350px;">
                <div class="cuadro-ins"style="border: 5px solid #B40431;border-radius:28px 28px 28px 28px; min-width: 350px;">
                <img src="./res/img/logoOficial.png" alt="" id="logo-login">
                </div>
                <form id="frmNewPass" action="" method="POST" class="ui form">
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            <input @keyup.enter="" @blur="requestMail" @focus="borrarError" v-model="user.userName" value="" @keyup="" type="text" class="requerido" name="user"
                                id="user" placeholder="Usuario">
                        </div>
                    </div>
                    <div style="text-align: right;" class="field">
                        <div class="ui right labeled left icon input">
                            <i class="envelope icon"></i>
                            <input type="text" v-model="user.correo" class="requerido" name="correo" id="correo" readonly placeholder="Correo Electrónico"
                                @keyup.enter="" @keyup="">

                        </div>

                    </div>

                    <a id="label-error" style="margin: 0; text-align:center;" class="ui red fluid large label"
                        v-if="error.bandera">{{error.mensaje}}</a>

                    <button style="margin-top: 15px; width:100%;" class="ui black button"
                        @click="enviarCorreo" id="btnEnviar" type="button" @submit.prevent="">Enviar datos</button>


                </form>
                <div style="text-align:center; margin-top:15px; background-color:#81F7BE;">
                    <a href="?1=UsuarioController&2=loginview" class="ui red bottom attached label" 
                    style="border-radius: 88px 88px;">Volver a inicio</a>
                </div>

            </div>
        </div>
    </div>

</body>

<script>
    let app = new Vue({
        el: '#app',

        data: {

            user: {
                userName: '',
                correo: ''
            },

            error: {
                mensaje: '',
                bandera: false
            }
        },

        methods: {


            borrarError() {
                this.error.bandera = false;
                this.error.mensaje = '';
            },

            enviarCorreo() {

                $('#frmNewPass').addClass('loading');

                $.ajax({
                    type: 'POST',
                    url: '?1=UsuarioController&2=newPass',
                    data: {
                        datos: app.user
                    },
                    success: function (r) {
                        if (r == 1) {
                            swal({
                                title: 'Datos enviados',
                                text: 'Se ha enviado un código de recuperación a su correo',
                                type: 'success'
                            }).then((result) => {
                                if (result.value) {

                                    $.ajax({
                                        type: 'POST',
                                        url: '?1=UsuarioController&2=encodeString',
                                        data: {string: app.user.userName},
                                        success: function(r) {
                                            $('#frmNewPass').removeClass('loading');
                                            location.href = '?1=UsuarioController&2=resetPasswordView&3='+ r;
                                        }
                                    });
                                }
                            });
                        }
                    }
                });
            },

            requestMail() {

                if(this.user.userName.length > 4) {
                    $('#frmNewPass').addClass('loading');

                    $.ajax({
                        type: 'POST',
                        url: '?1=UsuarioController&2=cargarDatosNomUsuario',
                        data: {
                            userName: app.user.userName
                        },
                        success: function(data) {
                            let datos = JSON.parse(data);

                            if(data != 'null') {
                                app.user.correo = datos.email;
                                $('#btnEnviar').removeAttr('disabled');
                            } else {
                                $('#btnEnviar').attr('disabled', 'disabled');
                                app.error.bandera = true;
                                app.error.mensaje = 'Usuario no encontrado';
                            }
                            $('#frmNewPass').removeClass('loading');
                        }
                    });
                }

            }
        }
    });
</script>

<script>
$(function() {
    $('#user').focus();
    $('#btnEnviar').attr('disabled', 'disabled');
});
</script>