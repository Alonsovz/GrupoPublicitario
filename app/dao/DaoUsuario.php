<?php 

class DaoUsuario extends DaoBase {

    public function __construct() {
        parent::__construct();
        $this->objeto = new Usuario();
    }


    public function login() {
        $_query = "call login('".$this->objeto->getNomUsuario()."', '".sha1($this->objeto->getPass())."')";

        $resultado = $this->con->ejecutar($_query);

        if($resultado->num_rows == 1) {

            $fila = $resultado->fetch_assoc();

           
                session_start();
                $_SESSION["codigoUsuario"] = $fila["codigoUsuario"];
                $_SESSION["nombre"] = $fila["nombre"];
                $_SESSION["apellido"] = $fila["apellido"];
                $_SESSION["email"] = $fila["email"];
                $_SESSION["telefono"] = $fila["telefono"];
                $_SESSION["dui"] = $fila["dui"];
                $_SESSION["fechaNac"] = $fila["fechaNac"];
                $_SESSION["nomUsuario"] = $fila["nomUsuario"];
                $_SESSION["descRol"] = $fila["descRol"];
                $_SESSION["direccion"] = $fila["direccion"];
                
                
                return 1;
            
        } else {
            return 0;
        }
    }

    public function getCodigoUsuarioByPass($code) {
        $_query = "select codigoUsuario from usuario where pass = '".$code."' and nomUsuario = '".$this->objeto->getNomUsuario()."'";
        $resultado = $this->con->ejecutar($_query);

        $datos = $resultado->fetch_assoc();

        return $datos["codigoUsuario"];
    }

    public function cargarDatosUsuario() {

        $_query = "select u.*, r.descRol, a.descAuth
        from usuario u
        inner join rol r on r.codigoRol = u.codigoRol
        inner join authUsuario a on a.codigoAuth = u.codigoAuth
        inner join area ar on ar.codigoArea = u.codigoArea
        where u.codigoUsuario = ".$this->objeto->getCodigoUsuario();

        $resultado = $this->con->ejecutar($_query);

        $json = json_encode($resultado->fetch_assoc());

        return $json;
    }

    
    public function registrar() {
        $_query = "insert into usuario values(null,'".$this->objeto->getNombre()."', '".$this->objeto->getApellido()."',
        '".$this->objeto->getDui()."', '".$this->objeto->getNit()."', '".$this->objeto->getFechaNacimiento()."',
        '".$this->objeto->getTelefono()."', '".$this->objeto->getTelMovil()."', '".$this->objeto->getEmail()."',
        '".($this->objeto->getDireccion())."','".$this->objeto->getMISS()."','".$this->objeto->getAfiliado()."',
        '".$this->objeto->getMAFP()."','".$this->objeto->getEstadoFam()."','".$this->objeto->getConyuge()."',
        '".$this->objeto->getHijos()."','".$this->objeto->getNombrePadre()."','".$this->objeto->getNombreMadre()."',
        '".$this->objeto->getContacto1()."','".$this->objeto->getContacto1Tel()."','".$this->objeto->getContacto1Tel2()."',
        '".$this->objeto->getFechaIngreso()."','".$this->objeto->getSueldo()."','".$this->objeto->getCodigoRol()."',
        '".$this->objeto->getNomUsuario()."','".sha1($this->objeto->getPass())."',1)";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function registrarHijos(){
        $corr= "(select max(codigoUsuario) as id from usuario)";

        $resultado1 = $this->con->ejecutar($corr);

        $fila = $resultado1->fetch_assoc();
        $idExp = $fila['id'];

        $_query = "insert into hijosEmp values(".$idExp.",'".$this->objeto->getNombreHijo()."');
        ";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function autorizar($estado) {
        $_query = "update usuario set codigoAuth = {$estado} where codigoUsuario = ".$this->objeto->getCodigoUsuario();
        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function restablecerContraConfig()
    {
        $_query = "update usuario set pass = '".sha1($this->objeto->getPass())."' where codigoUsuario = ".$this->objeto->getCodigoUsuario();
        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function cuentasAdministrador() {
        $_query = "call cuentasAdministrador()";
        $resultado = $this->con->ejecutar($_query);

        $array = [];

        while($fila = $resultado->fetch_object()) {
            array_push($array, $fila);
        }

        return $array;
    }

    public function cambiarDatos() {
        $_query = "update usuario set nombre = '".$this->objeto->getNombre()."', apellido='".$this->objeto->getApellido()."' where codigoUsuario = ".$this->objeto->getCodigoUsuario();
        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function eliminarCuenta() {
        $_query = "update usuario set codigoAuth = 4 where codigoUsuario = ".$this->objeto->getCodigoUsuario();
        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    //verificar si el usuario y el correo existen por seguridad
    public function enviarDatos()
    {


    }

    public function resetPassword($code) {

        $codigoUsuario = $this->getCodigoUsuarioByPass($code);

        $_query = "update usuario set pass = '".sha1($this->objeto->getPass())."' where codigoUsuario = ".$codigoUsuario;
        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    //Actualizar con el generador de codigo
    public function reestablecer($psswd)
    {
        $_query = "update usuario set pass = '{$psswd}' where nomUsuario = '".$this->objeto->getNomUsuario()."' and email ='".$this->objeto->getEmail()."'";
        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function editar() {
        $_query = "call editarUsuario('".$this->objeto->getNombre()."', '".$this->objeto->getApellido()."','".$this->objeto->getNomUsuario()."', '".$this->objeto->getEmail()."', ".$this->objeto->getCodigoRol().", ".$this->objeto->getCodigoArea().", ".$this->objeto->getCodigoUsuario().")";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function editarUser() {
        $_query = "update usuario set nomUsuario='".$this->objeto->getNomUsuario()."' where codigoUsuario = ".$this->objeto->getCodigoUsuario();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function eliminar() {
        $_query = "update usuario set idEliminado=2 where codigoUsuario = ".$this->objeto->getCodigoUsuario();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function datosNomUsuario(){

        $_query = "call datosNomUsuario('{$this->objeto->getNomUsuario()}')";

        $resultado = $this->con->ejecutar($_query);

        $datos = $resultado->fetch_object();

        return $datos;
    }

    public function mostrarUsuarios() {
        $_query = "select u.*, r.descRol
        from usuario u
        inner join rol r on r.codigoRol = u.codigoRol
        where u.idEliminado=1 and u.codigoRol!=4;";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["codigoUsuario"].'\" nombre=\"'.$fila["nombre"].'\" apellido=\"'.$fila["apellido"].'\" fechaNac=\"'.$fila["fechaNac"].'\" dui=\"'.$fila["dui"].'\" telefono=\"'.$fila["telefono"].'\" correo=\"'.$fila["email"].'\" direccion=\"'.$fila["direccion"].'\" descRol=\"'.$fila["descRol"].'\"  class=\"ui btnEditar icon black small button\"><i class=\"edit icon\"></i> Ver Detalles</button>';
            $btnEliminar = '<button id=\"'.$fila["codigoUsuario"].'\" nombre=\"'.$fila["nombre"].'\" apellido=\"'.$fila["apellido"].'\" class=\"ui btnEliminar icon negative small button\"><i class=\"trash icon\"></i> Eliminar</button>';

            $acciones = ', "Acciones": "'.$btnEditar.' '.$btnEliminar.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }

    

    public function reporteUsuario() {
        $query = "call reporteUsuario({$this->objeto->getCodigoUsuario()})";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }


    public function reporteUsuarioDiario() {
        $query = "call reporteUsuarioDiario({$this->objeto->getCodigoUsuario()})";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }


    public function reporteUsuarioPorFechas() {
        $query = "call reporteUsuarioPorFechas({$this->objeto->getCodigoUsuario()},'{$this->objeto->getFecha()}','{$this->objeto->getFecha2()}')";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function getPass(){

        $_query="select pass from usuario WHERE codigoUsuario=".$this->objeto->getCodigoUsuario();

        $resultado=$this->con->ejecutar($_query)->fetch_assoc();
        
        return $resultado['pass'];
    }


    public function getUserName()
    {

        $_query="select nomUsuario from usuario WHERE nomUsuario='".$this->objeto->getNomUsuario()."'";
       

        $resultado=$this->con->ejecutar($_query)->fetch_assoc();
        if($resultado['nomUsuario']!=null)
        {
            return 1;
        }
        else
        {
            return 0;
        }
        
        

    }

    public function getEmail()
    {
        $_query="select count(email) as email from usuario where email='".$this->objeto->getEmail()."' and nomUsuario='".$this->objeto->getNomUsuario()."' ";
       

        $resultado=$this->con->ejecutar($_query)->fetch_assoc();
        return $resultado['email'];

    }

    public function mostrarMaestrosCmb(){
        $_query = "select u.*, r.descRol
        from usuario u
        inner join rol r on r.codigoRol = u.codigoRol
        where u.idEliminado=1 and u.codigoRol=2;";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= json_encode($fila).',';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }

}