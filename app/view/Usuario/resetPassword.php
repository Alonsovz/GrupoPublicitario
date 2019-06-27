<?php
if(isset($_REQUEST["3"])) {

    $enc = new Encode();

    $nomUser = $_REQUEST["3"];

} else {
    $nomUser = '';
}

?>

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
            <div class="cuadro" style="min-width: 350px; border: 5px solid black; border-radius:28px 28px 28px 28px;">
                <div class="cuadro-ins" style="border: 5px solid #B40431;border-radius:28px 28px 28px 28px;">
                    <img src="./res/img/logoOficial.png" alt="" id="logo-login">
                </div>
                <form id="frmNewPass" action="" method="POST" class="ui form">
                    <div class="field">
                        <label for="">Ingrese el código:</label>
                        <div class="ui input">

                            <input @keyup.enter="login" value="" @keyup="setTrue" type="text" class="requerido" name="code"
                                id="code">
                        </div>
                    </div>
                    <div class="field">
                        <label for="">Nueva contraseña:</label>
                        <div class="ui right labeled input">
                            <input type="password" class="requerido" name="pass" id="pass" @keyup.enter="login" @keyup="setTrue">
                            <div id="show-contra" class="ui basic label"><i style="margin: 0;" id="icon-contra" class="eye slash icon"></i></div>
                        </div>

                    </div>
                    <a id="label-error" style="display: none; margin: 0; text-align:center;" class="ui red fluid large label"
                        v-if="isError">Datos
                        Incorrectos</a>
                    <button style="margin-top: 15px;" class="ui black fluid button" name="btnEnviar" value="noloc"
                        @click="login" id="btnEnviar" type="button" @submit.prevent="">Enviar datos</button>


                </form>
                <div style="text-align:center; margin-top:15px;" class="field">
                    <a href="?1=UsuarioController&2=loginview" class="ui red bottom attached label" 
                    style="border-radius: 88px 88px;">Volver a inicio</a>
                </div>

            </div>
        </div>
    </div>
    <script>
        $(function () {
            $('#user').focus();
        });
    </script>

            <script>
        $(function () {
            $('#show-contra').mousedown(function () {
                $('#icon-contra').attr('class', 'eye icon');
                $('#pass').attr('type', 'text');
            });


            $('#show-contra').mouseup(function () {
                $('#icon-contra').attr('class', 'eye slash icon');
                $('#pass').attr('type', 'password');
            });

        });
    </script>


    <script>
        $(function () {
            $('#btnEnviar').click(function () {

                if (validarVacios('frmNewPass', '#btnEnviar') == 0) {

                    $('#frmNewPass').addClass('loading');

                    var gatos = {};

                    $('#frmNewPass').find(":input").each(function () {
                        gatos[this.name] = $(this).val();
                    });

                    gatos = JSON.stringify(gatos);

                    console.log(gatos);

                    $.ajax({
                        type: 'POST',
                        url: '?1=UsuarioController&2=resetPassword',
                        data: {
                            datos: gatos,
                            user: '<?php echo $nomUser?>'
                        },
                        success: function (r) {
                            if (r == 1) {
                                swal({
                                    title: 'Éxito',
                                    text: 'Su contraseña ha sido reestablecida',
                                    type: 'success'
                                }).then((result) => {
                                    if (result.value) {
                                        location.href = '?1=UsuarioController&2=loginView&3='+ '<?php echo $nomUser ?>';
                                    }
                                });
                            } else {
                                $('#frmNewPass').removeClass('loading');
                                $('#label-error').html('El código es incorrecto');
                                $('#label-error').css('display', 'inline-block');
                            }

                            $('#frmNewPass').removeClass('loading');
                        }
                    });

                } else {
                    $('#label-error').html('Complete todos los campos');
                    $('#label-error').css('display', 'inline-block');
                }

            });
        });
    </script>
    <script>
        $(function() {
            $('#code').focus(function() {
                $('#label-error').html('');
                $('#label-error').css('display', 'none');
            })
        });
    </script>
</body>