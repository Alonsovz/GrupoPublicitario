<?php
if(isset($_REQUEST["3"])) {

    $enc = new Encode();

    $nomUser = $enc->encode('d', $_REQUEST["3"]);

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
             <div class="cuadro" style="border: 5px solid black; border-radius:28px 28px 28px 28px;">
                <div class="cuadro-ins" style="border: 5px solid #B40431;border-radius:28px 28px 28px 28px;">
                    <img src="./res/img/logoOficial.png" alt="" id="logo-login">
                </div>
                <form id="frmLogin" action="" method="POST" class="ui form">
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            <input @keyup.enter="login" value="<?php echo $nomUser?>" @keyup="setTrue" type="text"
                                class="requerido" name="user" id="user" placeholder="Usuario">
                        </div>
                    </div>
                    <div style="text-align: right;" class="field">
                        <div class="ui right labeled left icon input">
                            <i class="lock icon"></i>
                            <input type="password" class="requerido" name="pass" id="pass" placeholder="Contraseña"
                                @keyup.enter="login" @keyup="setTrue">
                            <div id="show-contra" class="ui basic label"><i style="margin: 0;" id="icon-contra" class="eye slash icon"></i></div>
                        </div>
                        <a href="?1=UsuarioController&2=contraOlvidada"><small>Olvidé mi contraseña</small></a>
                    </div>
                    <a id="label-error" style="display: none; margin: 0; text-align:center;" class="ui red fluid large label">Datos
                        Incorrectos</a>
                    <button style="margin-top: 15px; width:100%;" class="ui black button" 
                        value="noloc" @click="login" id="btnLogin" type="button" @submit.prevent="">
                        <i class="user icon"></i>Ingresar</button>

                </form>
                

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
            $('#frmLogin :input').keyup(function () {
                $('#label-error').css('display', 'none');
            });
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
            $('#btnLogin').click(function () {
                login();
            });

            $("#user, #pass").on('keyup', function (e) {
                if (e.keyCode == 13) {
                    login();
                }
            });
        });


        function login() {
            if (validarVacios('frmLogin', '#btnLogin') == 0) {

                $('#label-error').css('display', 'none');
                $('#label-error').html('');

                var gatos = {};
                $('#frmLogin').addClass('loading');

                $('#frmLogin').find(":input").each(function () {
                    gatos[this.name] = $(this).val();
                });

                gatos = JSON.stringify(gatos);

                $.ajax({
                    type: 'POST',
                    url: '?1=UsuarioController&2=login',
                    data: {
                        datos: gatos
                    },
                    success: function (r) {
                        $('#frmLogin').removeClass('loading');
                        if (r == 1) {
                            location.href = '?1=UsuarioController&2=dashboard';
                        } else if ((r == 2) || (r == 3)) {
                            $('#label-error').html('Su cuenta no está autorizada');
                            $('#label-error').css('display', 'inline-block');
                        }
                        else {
                            $('#label-error').html('Datos Incorrectos');
                            $('#label-error').css('display', 'inline-block');
                        }
                    }
                });

            } else {
                $('#label-error').html('Complete todos los campos');
                $('#label-error').css('display', 'inline-block');
            }
        }
    </script>

</body>