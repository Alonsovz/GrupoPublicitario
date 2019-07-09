<?php 

class DaoProveedores extends DaoBase {

    public function __construct() {
        parent::__construct();
        $this->objeto = new Proveedor();
    }

    public function mostrarProveedores() {
        $_query = "
            select p.*,t.nombre as producto,c.clasificacion as clasificacion from proveedores p
            inner join  tipoProductos c on c.idClasificacion = p.tipoSuministro
            inner join clasificacionProductos t on t.idProducto = p.idClasificacion
            where p.idEliminado=1 group by p.idProveedor;";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["idProveedor"].'\" nombre=\"'.$fila["nombre"].'\" tipoSuministro=\"'.$fila["tipoSuministro"].'\" idClasificacion=\"'.$fila["idClasificacion"].'\"  telefono=\"'.$fila["telefono"].'\" correo=\"'.$fila["correo"].'\" direccion=\"'.$fila["direccion"].'\" nit=\"'.$fila["nit"].'\" nrc=\"'.$fila["nrc"].'\" giro=\"'.$fila["giro"].'\" celular=\"'.$fila["celular"].'\" categoria=\"'.$fila["categoria"].'\" condicion=\"'.$fila["condicionCredito"].'\" clasificacion=\"'.$fila["clasificacion"].'\" producto=\"'.$fila["producto"].'\" categoria=\"'.$fila["categoria"].'\" contacto=\"'.$fila["contacto"].'\" departamento=\"'.$fila["departamento"].'\" class=\"ui btnEditar icon black small button\" onclick=\"editarProveedor(this)\"><i class=\"edit icon\"></i> Ver Detalles</button>';
            $btnEliminar = '<button id=\"'.$fila["idProveedor"].'\" nombre=\"'.$fila["nombre"].'\" class=\"ui btnEliminar icon negative small button\"><i class=\"trash icon\"></i> Eliminar</button>';

            $acciones = ', "Acciones": "'.$btnEditar.' '.$btnEliminar.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }


    public function mostrarProveedoresGastos() {
        $_query = "
            select p.*,c.nombre as gasto from proveedoresGastos p
            inner join  gastosOficina c on c.idGasto = p.idGasto
           where p.idEliminado=1 group by p.idProveedor;";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["idProveedor"].'\" nombre=\"'.$fila["nombre"].'\" gasto=\"'.$fila["gasto"].'\" idGasto=\"'.$fila["idGasto"].'\"  telefono=\"'.$fila["telefono"].'\" correo=\"'.$fila["correo"].'\" direccion=\"'.$fila["direccion"].'\" nit=\"'.$fila["nit"].'\" nrc=\"'.$fila["nrc"].'\" giro=\"'.$fila["giro"].'\" celular=\"'.$fila["celular"].'\" categoria=\"'.$fila["categoria"].'\" condicion=\"'.$fila["condicionCredito"].'\"   categoria=\"'.$fila["categoria"].'\" contacto=\"'.$fila["contacto"].'\" departamento=\"'.$fila["departamento"].'\" class=\"ui btnEditar icon black small button\" onclick=\"editarProveedor(this)\"><i class=\"edit icon\"></i> Ver Detalles</button>';
            $btnEliminar = '<button id=\"'.$fila["idProveedor"].'\" nombre=\"'.$fila["nombre"].'\" class=\"ui btnEliminar icon negative small button\"><i class=\"trash icon\"></i> Eliminar</button>';

            $acciones = ', "Acciones": "'.$btnEditar.' '.$btnEliminar.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }

    public function registrar() {
        $_query = "insert into proveedores values(null,'".$this->objeto->getNombre()."', '".$this->objeto->getNit()."',
        '".$this->objeto->getNrc()."', '".$this->objeto->getDireccion()."', '".$this->objeto->getDepartamento()."',
        '".$this->objeto->getGiro()."','".$this->objeto->getCategoria()."','".$this->objeto->getTipoSuministro()."',
        '".$this->objeto->getIdClasificacion()."',
        '".$this->objeto->getCondicion()."','".$this->objeto->getTelefono()."','".$this->objeto->getCelular()."',
        '".$this->objeto->getContacto()."','".$this->objeto->getEmail()."',1)";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function registrarNP() {
        $_query = "insert into proveedoresGastos values(null,'".$this->objeto->getNombre()."', '".$this->objeto->getNit()."',
        '".$this->objeto->getNrc()."', '".$this->objeto->getDireccion()."', '".$this->objeto->getDepartamento()."',
        '".$this->objeto->getGiro()."','".$this->objeto->getCategoria()."','".$this->objeto->getTipoSuministro()."',
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
        $_query = "update proveedores set nombre='".$this->objeto->getNombre()."',
        nit= '".$this->objeto->getNit()."',
        nrc='".$this->objeto->getNrc()."',
        direccion='".$this->objeto->getDireccion()."',
        departamento='".$this->objeto->getDepartamento()."',
        giro='".$this->objeto->getGiro()."',
        categoria='".$this->objeto->getCategoria()."',
        condicionCredito='".$this->objeto->getCondicion()."',
        telefono='".$this->objeto->getTelefono()."',
        celular='".$this->objeto->getCelular()."',
        contacto='".$this->objeto->getContacto()."',
        tipoSuministro='".$this->objeto->getTipoSuministro()."',
        idClasificacion='".$this->objeto->getIdClasificacion()."',
        correo='".$this->objeto->getEmail()."' where idProveedor=".$this->objeto->getIdProveedor();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function editarNP() {
        $_query = "update proveedoresGastos set nombre='".$this->objeto->getNombre()."',
        nit= '".$this->objeto->getNit()."',
        nrc='".$this->objeto->getNrc()."',
        direccion='".$this->objeto->getDireccion()."',
        departamento='".$this->objeto->getDepartamento()."',
        giro='".$this->objeto->getGiro()."',
        categoria='".$this->objeto->getCategoria()."',
        condicionCredito='".$this->objeto->getCondicion()."',
        telefono='".$this->objeto->getTelefono()."',
        celular='".$this->objeto->getCelular()."',
        contacto='".$this->objeto->getContacto()."',
        idGasto='".$this->objeto->getTipoSuministro()."',
        correo='".$this->objeto->getEmail()."' where idProveedor=".$this->objeto->getIdProveedor();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function eliminarNP() {
        $_query = "update proveedoresGastos set idEliminado=2 where idProveedor = ".$this->objeto->getIdProveedor();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function eliminar() {
        $_query = "update proveedores set idEliminado=2 where idProveedor = ".$this->objeto->getIdProveedor();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function getNit()
    {

        $_query="select nit from proveedores WHERE nit='".$this->objeto->getNit()."'";
       

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

        $_query="select correo from proveedores WHERE correo='".$this->objeto->getEmail()."'";
       

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


    public function mostrarProveedoresCmb() {

        $_query = "select * from proveedores where tipoSuministro=1 and idEliminado=1";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= json_encode($fila).',';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }


    public function mostrarProveedoresCmbI() {

        $_query = "select * from proveedores where tipoSuministro=2 and idEliminado=1";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= json_encode($fila).',';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }

    public function mostrarProveedoresCmbG() {

        $_query = "select * from proveedores where idEliminado=1";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= json_encode($fila).',';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }

    public function mostrarProveedoresCmbP() {

        $_query = "select * from proveedores where tipoSuministro=3 and idEliminado=1";

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