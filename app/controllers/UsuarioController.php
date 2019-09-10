<?php

class UsuarioController extends ControladorBase {

    // Vistas
    public static function loginView() {
        self::loadHeadOnly();
        require_once './app/view/Usuario/login.php';
    }

    public static function registroForm() {
        self::loadHeadOnly();
        $dao = new DaoArea();
        $areas = $dao->mostrarAreas();
        require_once './app/view/Usuario/registro.php';
    }

    

    public static function dashboard() {
        self::loadMain();
      
        require_once './app/view/Usuario/dashboard.php';
    }

    public static function gestion() {
        self::loadMain();
        
        require_once './app/view/Usuario/gestion.php';
    }

    public static function contraOlvidada() {
        self::loadHeadOnly();
        require_once './app/view/Usuario/newPassword.php';
    }

    public static function resetPasswordView() {
        self::loadHeadOnly();
        require_once './app/view/Usuario/resetPassword.php';
    }

    public static function config() {
        self::loadMain();
        require_once './app/view/Usuario/config.php';
    }


    // Métodos

    public static function login() {
        $datos = $_REQUEST["datos"];

        $datos = json_decode($datos);


        $dao = new DaoUsuario();
        $dao->objeto->setNomUsuario($datos->user);
        $dao->objeto->setPass($datos->pass);

        echo $dao->login();
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        self::loadHeadOnly();
        require_once './app/view/Usuario/login.php';
    }

    public function encodeString() {
        $enc = new Encode();

        $encoded = $enc->encode('e', $_REQUEST["string"]);

        echo $encoded;
    }

    public function resetPassword() {

        $enc = new Encode();

        $datos = json_decode($_REQUEST["datos"]);
        $nomUser = $enc->encode('d', $_REQUEST["user"]);

        $dao = new DaoUsuario();

        $dao->objeto->setPass($datos->pass);
        $dao->objeto->setNomUsuario($nomUser);

        echo $dao->resetPassword($datos->code);
    }

    public function modificarPres(){
        $dao = new DaoUsuario();
        $dao->objeto->setSueldo($_REQUEST["monto"]);

        echo $dao->modificarPres();
    }
    public function registrar() {
       
        $dao = new DaoUsuario();

        $dao->objeto->setNombre($_REQUEST["nombre"]);
        $dao->objeto->setApellido($_REQUEST["apellido"]);
        $dao->objeto->setDui($_REQUEST["dui"]);
        $dao->objeto->setNit($_REQUEST["nit"]);
        $dao->objeto->setFechaNacimiento($_REQUEST["fechaNac"]);
        $dao->objeto->setTelefono($_REQUEST["telefono"]);
        $dao->objeto->setTelMovil($_REQUEST["celular"]);
        $dao->objeto->setEmail($_REQUEST["correo"]);
        $dao->objeto->setDireccion($_REQUEST["direccion"]);
        $dao->objeto->setMISS($_REQUEST["MISSS"]);
        $dao->objeto->setAfiliado($_REQUEST["afiliado"]);
        $dao->objeto->setMAFP($_REQUEST["MAFP"]);
        $dao->objeto->setEstadoFam($_REQUEST["estadoFam"]);

        if($_REQUEST["conyuge"] == ""){
            $dao->objeto->setConyuge($_REQUEST["conyuge"]);
        }else{
            $dao->objeto->setConyuge("No definido");
        }
       
        $dao->objeto->setHijos($_REQUEST["hijos"]);
        $dao->objeto->setNombrePadre($_REQUEST["padre"]);
        $dao->objeto->setNombreMadre($_REQUEST["madre"]);

        $dao->objeto->setContacto1($_REQUEST["emergencia"]);
        $dao->objeto->setContacto1Tel($_REQUEST["telefonoEme"]);
        $dao->objeto->setContacto1Tel2($_REQUEST["telefonoEme"]);

        $dao->objeto->setFechaIngreso($_REQUEST["fechaIng"]);
        $dao->objeto->setSueldo($_REQUEST["salario"]);

        $dao->objeto->setNomUsuario($_REQUEST["usuario"]);
        $dao->objeto->setPass(123);
        $dao->objeto->setCodigoRol($_REQUEST["codigoRol"]);


        echo $dao->registrar();

    }



    public function editar() {
       
        $dao = new DaoUsuario();

        $dao->objeto->setNombre($_REQUEST["nombre"]);
        $dao->objeto->setApellido($_REQUEST["apellido"]);
        $dao->objeto->setDui($_REQUEST["dui"]);
        $dao->objeto->setNit($_REQUEST["nit"]);
        $dao->objeto->setFechaNacimiento($_REQUEST["fechaNac"]);
        $dao->objeto->setTelefono($_REQUEST["telefono"]);
        $dao->objeto->setTelMovil($_REQUEST["celular"]);
        $dao->objeto->setEmail($_REQUEST["correo"]);
        $dao->objeto->setDireccion($_REQUEST["direccion"]);
        $dao->objeto->setMISS($_REQUEST["MISSS"]);
        $dao->objeto->setAfiliado($_REQUEST["afiliado"]);
        $dao->objeto->setMAFP($_REQUEST["MAFP"]);
        $dao->objeto->setEstadoFam($_REQUEST["estadoFam"]);

            $dao->objeto->setConyuge($_REQUEST["conyuge"]);
        
       
        $dao->objeto->setHijos($_REQUEST["hijos"]);
        $dao->objeto->setNombrePadre($_REQUEST["padre"]);
        $dao->objeto->setNombreMadre($_REQUEST["madre"]);

        $dao->objeto->setContacto1($_REQUEST["emergencia"]);
        $dao->objeto->setContacto1Tel($_REQUEST["telefonoEme"]);
        $dao->objeto->setContacto1Tel2($_REQUEST["telefonoEme"]);

        $dao->objeto->setFechaIngreso($_REQUEST["fechaIng"]);
        $dao->objeto->setSueldo($_REQUEST["salario"]);

        $dao->objeto->setNomUsuario($_REQUEST["usuario"]);
       
        $dao->objeto->setCodigoRol($_REQUEST["codigoRol"]);
        $dao->objeto->setCodigoUsuario($_REQUEST["idDetalle"]);

        echo $dao->editarU();

    }

    public function guardarHijos(){
        $detalles = json_decode($_REQUEST["lista"]);

        $contador = 0;

        $dao = new DaoUsuario();

        foreach($detalles as $detalle) {
            $dao->objeto->setNombreHijo($detalle->nombreHijo);
    

            if($dao->registrarHijos()) {
                $contador++;
            } else {
                echo 'nell';
            }
        }

        if($contador == count($detalles)) {
            echo 1;
        } else {
            echo 2;
        }
    }

    public function cargarDatosNomUsuario() {
        $nom = $_REQUEST["userName"];

        $dao = new DaoUsuario();
        $dao->objeto->setNomUsuario($nom);

        $datosUsuario = $dao->datosNomUsuario();

        echo json_encode($datosUsuario);
    }

    public function newPass() {
        //Generador de contraseñas aleatorias
        $psswd = substr( md5(microtime()), 1, 8);

        $dao = new DaoUsuario();

        require './app/mail/Mail.php';
        $mail = new Mail();

        $datos = $_REQUEST["datos"];

        $id = $datos["userName"];
        $email = $datos["correo"];



        $dao->objeto->setNomUsuario($id);
        $dao->objeto->setEmail($email);

        

        if(!$mail->composeRestorePassMail($email, $id, $psswd)) {
            echo "El correo no fue enviado Correctamente";
        }

        echo $dao->reestablecer($psswd);
    }

    public function registrarExterno() {

    }

    public function editarNom()
    {
        $dao = new DaoUsuario();

        $id = $_REQUEST["id"];
        $user = $_REQUEST["user"];

        $dao->objeto->setCodigoUsuario($id);
        $dao->objeto->setNomUsuario($user);
        echo $dao->editarUser();
    }


    public function getPass()
    {
            $pass=$_REQUEST['pass'];
            $dao= new DaoUsuario();
            $id=$_REQUEST['idU'];

            $dao->objeto->setCodigoUsuario($id);
            $contra=$dao->getPass();
            $passEncript=sha1($pass);
            $datos = array('pass' =>"$contra" ,'passEnc'=>"$passEncript" );
            $resp=json_encode($datos);
             echo $resp;

    }

    public function getUserName()
    {
        $dao=new DaoUsuario();
        $user=$_REQUEST['user'];
        $dao->objeto->setNomUsuario($user);

        echo $dao->getUserName();
    }
    public function getEmail(){
        $dao=new DaoUsuario();
        $email=$_REQUEST['email'];
        $user=$_REQUEST['user'];

        $dao->objeto->setEmail($email);
        $dao->objeto->setNomUsuario($user);
        echo $dao->getEmail();
    }


    public function reestablecerContra()
    {
        $dao = new DaoUsuario();

        $id = $_REQUEST["id"];
        $nuPass = $_REQUEST["nuPass"];

        $dao->objeto->setPass($nuPass);
        $dao->objeto->setCodigoUsuario($id);
        echo $dao->restablecerContraConfig();
    }

    public function actualizarDatosPersonales()
    {
        $dao = new DaoUsuario();

        $id = $_REQUEST["id"];
        $nomUser = $_REQUEST["nom"];
        $ape = $_REQUEST["ape"];

        $dao->objeto->setNombre($nomUser);
        $dao->objeto->setApellido($ape);
        $dao->objeto->setDui($_REQUEST["dui"]);
       
        $dao->objeto->setTelefono($_REQUEST["telefono"]);
       
        $dao->objeto->setEmail($_REQUEST["email"]);
        $dao->objeto->setDireccion($_REQUEST["direccion"]);
        $dao->objeto->setCodigoUsuario($id);
        echo $dao->cambiarDatos();
    }

    public function eliminarCuenta() {
        $dao = new DaoUsuario();

        $id = $_REQUEST["id"];
        $dao->objeto->setCodigoUsuario($id);
        echo $dao->eliminarCuenta();
    }

    

    public function autorizar() {

        $dao = new DaoUsuario();

        require './app/mail/Mail.php';
        $mail = new Mail();

        $id = $_REQUEST["id"];
        $estado = $_REQUEST["estado"];

        $estadoCuenta = $estado == 1 ? 'Autorizada' : 'Restringida';

        $dao->objeto->setCodigoUsuario($id);

        $datosUsuario = json_decode($dao->cargarDatosUsuario());

        if(!$mail->composeAuthMail($datosUsuario, $estadoCuenta)) {
            echo "El correo no fue enviado Correctamente";
        }

        echo $dao->autorizar($estado);
    }

    public function cuentasAdministrador() {
        $dao = new DaoUsuario();

        var_dump($dao->cuentasAdministrador());
    }

    public function cargarDatosUsuario() {
        $id = $_REQUEST["id"];

        $dao = new DaoUsuario();

        $dao->objeto->setCodigoUsuario($id);

        echo $dao->cargarDatosUsuario();
    }

    public function eliminar() {
        $datos = $_REQUEST["idEliminar"];

        $dao = new DaoUsuario();

        $dao->objeto->setCodigoUsuario($datos);

        echo $dao->eliminar();
    }

    public function mostrarUsuarios() {
        $dao = new DaoUsuario();

        echo $dao->mostrarUsuarios();
    }

    // Reportes


    public function reporteArea() {
        $daoArea = new DaoArea();

        require_once './app/reportes/ReporteArea.php';

        $idArea = $_REQUEST["area"];

        $reporte = new Reporte();


        $daoArea->objeto->setCodigoArea($idArea);
        $resultado = $daoArea->reporteArea();
        $resultado1 = $daoArea->reporteArea();

        $reporte->reporteArea($idArea, $resultado, $resultado1);
    }


    public function reporteAreaDiario() {
        $daoArea = new DaoArea();

        require_once './app/reportes/ReporteArea.php';

        $idArea = $_REQUEST["area"];

        $reporte = new Reporte();


        $daoArea->objeto->setCodigoArea($idArea);
        $resultado = $daoArea->reporteAreaDiario();
        $resultado1 = $daoArea->reporteAreaDiario();

        $reporte->reporteAreaDiario($idArea, $resultado, $resultado1);
    }


    public function reporteAreaPorFechas() {
        $daoArea = new DaoArea();

        require_once './app/reportes/ReporteArea.php';

        $idA= $_REQUEST["area"];
        $fecha1Area = $_REQUEST["fecha"];
        $fecha2Area = $_REQUEST["fecha2"];

        $reporte = new Reporte();

        $daoArea->objeto->setCodigoArea($idA);
        $daoArea->objeto->setFecha($fecha1Area);
       $daoArea->objeto->setFecha2($fecha2Area);
        $resultado = $daoArea->reporteAreaPorFechas();
        $resultado1 = $daoArea->reporteAreaPorFechas();

        $reporte->reporteAreaPorFechas($fecha1Area,$fecha2Area, $resultado, $resultado1);
    }


    public function reporteUsuario() {
        $daoUsuario = new DaoUsuario();

        require_once './app/reportes/ReporteUsuario.php';

        $idUsuario = $_REQUEST["usuario"];

        $reporte = new Reporte();


        $daoUsuario->objeto->setCodigoUsuario($idUsuario);
        $resultado = $daoUsuario->reporteUsuario();
        $resultado1 = $daoUsuario->reporteUsuario();

        $reporte->reporteUsuario($idUsuario, $resultado, $resultado1);
    }

    public function reporteUsuarioDiario() {
        $daoUsuario = new DaoUsuario();

        require_once './app/reportes/ReporteUsuario.php';

        $idUsuario = $_REQUEST["usuario"];

        $reporte = new Reporte();


        $daoUsuario->objeto->setCodigoUsuario($idUsuario);
        $resultado = $daoUsuario->reporteUsuarioDiario();
        $resultado1 = $daoUsuario->reporteUsuarioDiario();

        $reporte->reporteUsuarioDiario($idUsuario, $resultado, $resultado1);
    }

    public function reporteUsuarioPorFechas() {
        $daoUsuario = new DaoUsuario();

        require_once './app/reportes/ReporteUsuario.php';

        $fecha1Usuario = $_REQUEST["fecha"];
        $fecha2Usuario = $_REQUEST["fecha2"];

        $idUsuario = $_REQUEST["usuario"];

        $reporte = new Reporte();


        $daoUsuario->objeto->setCodigoUsuario($idUsuario);
        $daoUsuario->objeto->setFecha($fecha1Usuario);
       $daoUsuario->objeto->setFecha2($fecha2Usuario);
        $resultado = $daoUsuario->reporteUsuarioPorFechas();
        $resultado1 = $daoUsuario->reporteUsuarioPorFechas();

        $reporte->reporteUsuarioPorFechas($fecha1Usuario,$fecha2Usuario, $resultado, $resultado1);
    }


    public function reporteFechas() {
        $daoEnvio = new DaoEnvio();

        require_once './app/reportes/ReporteFechas.php';

        $fecha = $_REQUEST["fecha"];
        $fecha2 = $_REQUEST["fecha2"];

        $reporte = new Reporte();


        $daoEnvio->objeto->setFecha($fecha);
       $daoEnvio->objeto->setFecha2($fecha2);
        $resultado = $daoEnvio->reporteFechas();
        $resultado1 = $daoEnvio->reporteFechas();

        $reporte->reporteFechas($fecha,$fecha2, $resultado, $resultado1);
    }

    public static function reporteria() {
        
        self::loadMain();    

        

        $daoC = new DaoEgresos();
        $chequerasCMB = $daoC->mostrarChequerasCMB();
       

     

        require_once './app/view/Usuario/reporteria.php';
    }


}
