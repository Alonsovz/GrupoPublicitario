<?php 

class DaoClientes extends DaoBase {

    public function __construct() {
        parent::__construct();
        $this->objeto = new Clientes();
    }


    public function mostrarClientes() {
        $_query = "select *  from clientes
        where idEliminado=1;";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["idCliente"].'\" nombre=\"'.$fila["nombre"].'\"   telefono=\"'.$fila["telefono"].'\" correo=\"'.$fila["correo"].'\" direccion=\"'.$fila["direccion"].'\" nit=\"'.$fila["nit"].'\" nrc=\"'.$fila["nrc"].'\" giro=\"'.$fila["giro"].'\" celular=\"'.$fila["celular"].'\" categoria=\"'.$fila["categoria"].'\" condicion=\"'.$fila["condicionCredito"].'\" tipoDoc=\"'.$fila["tipoDoc"].'\" categoria=\"'.$fila["categoria"].'\" contacto=\"'.$fila["contacto"].'\" departamento=\"'.$fila["departamento"].'\" class=\"ui btnEditar icon black small button\" onclick=\"editarCliente(this)\"><i class=\"edit icon\"></i> Ver Detalles</button>';
            $btnEliminar = '<button id=\"'.$fila["idCliente"].'\" nombre=\"'.$fila["nombre"].'\" class=\"ui btnEliminar icon negative small button\"><i class=\"trash icon\"></i> Eliminar</button>';

            $acciones = ', "Acciones": "'.$btnEditar.' '.$btnEliminar.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }


    public function mostrarClientesEstadoCuenta() {
        $_query = "select *, DATE_FORMAT(curdate(), '%d/%m/%Y') as fecha from clientes
        where idEliminado=1;";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["idCliente"].'\" fecha=\"'.$fila["fecha"].'\"  nombre=\"'.$fila["nombre"].'\"  telefono=\"'.$fila["telefono"].'\" correo=\"'.$fila["correo"].'\" direccion=\"'.$fila["direccion"].'\" nit=\"'.$fila["nit"].'\" nrc=\"'.$fila["nrc"].'\" giro=\"'.$fila["giro"].'\" celular=\"'.$fila["celular"].'\" categoria=\"'.$fila["categoria"].'\" condicion=\"'.$fila["condicionCredito"].'\" tipoDoc=\"'.$fila["tipoDoc"].'\" categoria=\"'.$fila["categoria"].'\" contacto=\"'.$fila["contacto"].'\" departamento=\"'.$fila["departamento"].'\" class=\"ui btnEditar icon green small button\" onclick=\"verEstado(this)\"><i class=\"dollar icon\"></i> Ver Estado</button>';
          
            $acciones = ', "Acciones": "'.$btnEditar.' "';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }

    public function eliminar() {
        $_query = "update clientes set idEliminado=2 where idCliente = ".$this->objeto->getIdCliente();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function getNit()
    {

        $_query="select nit from clientes WHERE nit='".$this->objeto->getNit()."'";
       

        $resultado=$this->con->ejecutar($_query)->fetch_assoc();
        if($resultado['nit']!=null)
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

        $_query="select correo from clientes WHERE correo='".$this->objeto->getEmail()."'";
       

        $resultado=$this->con->ejecutar($_query)->fetch_assoc();
        if($resultado['correo']!=null)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    
    }


    public function registrar() {
        $_query = "insert into clientes values(null,'".$this->objeto->getNombre()."', '".$this->objeto->getNit()."',
        '".$this->objeto->getNrc()."', '".$this->objeto->getDireccion()."', '".$this->objeto->getDepartamento()."',
        '".$this->objeto->getGiro()."','".$this->objeto->getCategoria()."','".$this->objeto->getTipoDoc()."',
        '".$this->objeto->getCondicion()."','".$this->objeto->getTelefono()."','".$this->objeto->getCelular()."',
        '".$this->objeto->getContacto()."','".$this->objeto->getEmail()."',1)";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


    public function editar() {
        $_query = "update clientes set nombre='".$this->objeto->getNombre()."',
        nit= '".$this->objeto->getNit()."',
        nrc='".$this->objeto->getNrc()."',
        direccion='".$this->objeto->getDireccion()."',
        departamento='".$this->objeto->getDepartamento()."',
        giro='".$this->objeto->getGiro()."',
        categoria='".$this->objeto->getCategoria()."',
        tipoDoc='".$this->objeto->getTipoDoc()."',
        condicionCredito='".$this->objeto->getCondicion()."',
        telefono='".$this->objeto->getTelefono()."',
        celular='".$this->objeto->getCelular()."',
        contacto='".$this->objeto->getContacto()."',
        correo='".$this->objeto->getEmail()."' where idCliente=".$this->objeto->getIdCliente();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


    public function mostrarClientesCmb() {

        $_query = "select * from clientes where idEliminado=1";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= json_encode($fila).',';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }

}

?>