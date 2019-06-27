<?php 

class DaoRequisicion extends DaoBase {

    public function __construct() {
        parent::__construct();
        $this->objeto = new Requisicion();
    }

    public function guardarReq() {
        $_query = "insert into requisiciones values(null,'".$this->objeto->getFechaReq()."','".$this->objeto->getIdResponsable()."'
        ,'".$this->objeto->getTipoCompra()."','".$this->objeto->getIdProveedor()."','".$this->objeto->getTipoDocumento()."'
        ,'".$this->objeto->getIdClasificacion()."','".$this->objeto->getFechaEn()."',1,1)";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function guardarDetallesReq() {
        $corr= "(select max(idRequisicion) as id from requisiciones)";

        $resultado1 = $this->con->ejecutar($corr);

        $fila = $resultado1->fetch_assoc();
        $idReq = $fila['id'];

        $_query = "insert into detalleRequisicion values(null,'.$idReq.','".$this->objeto->getIdProductoFinal()."'
        ,'".$this->objeto->getColor()."','".$this->objeto->getAcabado()."','".$this->objeto->getCantidad()."'
        ,'".$this->objeto->getMedidas()."','".$this->objeto->getDescripciones()."','".$this->objeto->getPrecio()."',1)";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


    public function mostrarPenAprobarGF() {
        $_query = "select r.*,DATE_FORMAT(r.fecha, '%d/%m/%Y') as fecha,DATE_FORMAT(r.fechaEntrega, '%d/%m/%Y') as fechaEntrega,
         p.nombre as proveedor,p.condicionCredito as condicionCredito, concat(u.nombre,' ', u.apellido) as nombre from requisiciones r
        inner join proveedores p on p.idProveedor = r.idProveedor
        inner join usuario u on u.codigoUsuario = r.responsable
         where r.idEliminado=1 and r.idClasificacion=1 and r.estado=1";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["idRequisicion"].'\" fecha=\"'.$fila["fecha"].'\" responsable=\"'.$fila["nombre"].'\" tipoCompra=\"'.$fila["tipoCompra"].'\" proveedor=\"'.$fila["proveedor"].'\" tipoDoc=\"'.$fila["tipoDoc"].'\" condicionCredito=\"'.$fila["condicionCredito"].'\" fechaEntrega=\"'.$fila["fechaEntrega"].'\"  class=\"ui icon black small button\" onclick=\"detalles(this)\"><i class=\"edit icon\"></i> Ver Detalles</button>';
            $btnEliminar = '<button id=\"'.$fila["idRequisicion"].'\"  class=\"ui btnEliminar icon negative small button\"><i class=\"trash icon\"></i> Eliminar</button>';

            $acciones = ', "Acciones": "'.$btnEditar.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }

    public function mostrarPenAprobarIP() {
        $_query = "select r.*,DATE_FORMAT(r.fecha, '%d/%m/%Y') as fecha,DATE_FORMAT(r.fechaEntrega, '%d/%m/%Y') as fechaEntrega,
        p.nombre as proveedor,p.condicionCredito as condicionCredito, concat(u.nombre,' ', u.apellido) as nombre from requisiciones r
       inner join proveedores p on p.idProveedor = r.idProveedor
       inner join usuario u on u.codigoUsuario = r.responsable
        where r.idEliminado=1 and r.idClasificacion=2 and r.estado=1";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["idRequisicion"].'\" fecha=\"'.$fila["fecha"].'\" responsable=\"'.$fila["nombre"].'\" tipoCompra=\"'.$fila["tipoCompra"].'\" proveedor=\"'.$fila["proveedor"].'\" tipoDoc=\"'.$fila["tipoDoc"].'\" condicionCredito=\"'.$fila["condicionCredito"].'\" fechaEntrega=\"'.$fila["fechaEntrega"].'\"  class=\"ui icon black small button\" onclick=\"detalles(this)\"><i class=\"edit icon\"></i> Ver Detalles</button>';
            $btnEliminar = '<button id=\"'.$fila["idRequisicion"].'\"  class=\"ui btnEliminar icon negative small button\"><i class=\"trash icon\"></i> Eliminar</button>';

            $acciones = ', "Acciones": "'.$btnEditar.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }

    public function mostrarPenAprobarP() {
        $_query = "select r.*,DATE_FORMAT(r.fecha, '%d/%m/%Y') as fecha,DATE_FORMAT(r.fechaEntrega, '%d/%m/%Y') as fechaEntrega,
        p.nombre as proveedor,p.condicionCredito as condicionCredito, concat(u.nombre,' ', u.apellido) as nombre from requisiciones r
       inner join proveedores p on p.idProveedor = r.idProveedor
       inner join usuario u on u.codigoUsuario = r.responsable
        where r.idEliminado=1 and r.idClasificacion=3 and r.estado=1";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["idRequisicion"].'\" fecha=\"'.$fila["fecha"].'\" responsable=\"'.$fila["nombre"].'\" tipoCompra=\"'.$fila["tipoCompra"].'\" proveedor=\"'.$fila["proveedor"].'\" tipoDoc=\"'.$fila["tipoDoc"].'\" condicionCredito=\"'.$fila["condicionCredito"].'\" fechaEntrega=\"'.$fila["fechaEntrega"].'\"  class=\"ui icon black small button\" onclick=\"detalles(this)\"><i class=\"edit icon\"></i> Ver Detalles</button>';
            $btnEliminar = '<button id=\"'.$fila["idRequisicion"].'\"  class=\"ui btnEliminar icon negative small button\"><i class=\"trash icon\"></i> Eliminar</button>';

            $acciones = ', "Acciones": "'.$btnEditar.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }




    public function mostrarPenRecibirGF() {
        $_query = "select r.*,DATE_FORMAT(r.fecha, '%d/%m/%Y') as fecha,DATE_FORMAT(r.fechaEntrega, '%d/%m/%Y') as fechaEntrega,
         p.nombre as proveedor,p.condicionCredito as condicionCredito, concat(u.nombre,' ', u.apellido) as nombre from requisiciones r
        inner join proveedores p on p.idProveedor = r.idProveedor
        inner join usuario u on u.codigoUsuario = r.responsable
         where r.idEliminado=1 and r.idClasificacion=1 and r.estado=2";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["idRequisicion"].'\" fecha=\"'.$fila["fecha"].'\" responsable=\"'.$fila["nombre"].'\" tipoCompra=\"'.$fila["tipoCompra"].'\" proveedor=\"'.$fila["proveedor"].'\" tipoDoc=\"'.$fila["tipoDoc"].'\" condicionCredito=\"'.$fila["condicionCredito"].'\" fechaEntrega=\"'.$fila["fechaEntrega"].'\"  class=\"ui icon black small button\" onclick=\"detalles(this)\"><i class=\"edit icon\"></i> Ver Detalles</button>';
            $btnEliminar = '<button id=\"'.$fila["idRequisicion"].'\"  class=\"ui btnEliminar icon negative small button\"><i class=\"trash icon\"></i> Eliminar</button>';

            $acciones = ', "Acciones": "'.$btnEditar.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }

    public function mostrarPenRecibirIP() {
        $_query = "select r.*,DATE_FORMAT(r.fecha, '%d/%m/%Y') as fecha,DATE_FORMAT(r.fechaEntrega, '%d/%m/%Y') as fechaEntrega,
        p.nombre as proveedor,p.condicionCredito as condicionCredito, concat(u.nombre,' ', u.apellido) as nombre from requisiciones r
       inner join proveedores p on p.idProveedor = r.idProveedor
       inner join usuario u on u.codigoUsuario = r.responsable
        where r.idEliminado=1 and r.idClasificacion=2 and r.estado=2";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["idRequisicion"].'\" fecha=\"'.$fila["fecha"].'\" responsable=\"'.$fila["nombre"].'\" tipoCompra=\"'.$fila["tipoCompra"].'\" proveedor=\"'.$fila["proveedor"].'\" tipoDoc=\"'.$fila["tipoDoc"].'\" condicionCredito=\"'.$fila["condicionCredito"].'\" fechaEntrega=\"'.$fila["fechaEntrega"].'\"  class=\"ui icon black small button\" onclick=\"detalles(this)\"><i class=\"edit icon\"></i> Ver Detalles</button>';
            $btnEliminar = '<button id=\"'.$fila["idRequisicion"].'\"  class=\"ui btnEliminar icon negative small button\"><i class=\"trash icon\"></i> Eliminar</button>';

            $acciones = ', "Acciones": "'.$btnEditar.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }

    public function mostrarPenRecibirP() {
        $_query = "select r.*,DATE_FORMAT(r.fecha, '%d/%m/%Y') as fecha,DATE_FORMAT(r.fechaEntrega, '%d/%m/%Y') as fechaEntrega,
        p.nombre as proveedor,p.condicionCredito as condicionCredito, concat(u.nombre,' ', u.apellido) as nombre from requisiciones r
       inner join proveedores p on p.idProveedor = r.idProveedor
       inner join usuario u on u.codigoUsuario = r.responsable
        where r.idEliminado=1 and r.idClasificacion=3 and r.estado=2";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["idRequisicion"].'\" fecha=\"'.$fila["fecha"].'\" responsable=\"'.$fila["nombre"].'\" tipoCompra=\"'.$fila["tipoCompra"].'\" proveedor=\"'.$fila["proveedor"].'\" tipoDoc=\"'.$fila["tipoDoc"].'\" condicionCredito=\"'.$fila["condicionCredito"].'\" fechaEntrega=\"'.$fila["fechaEntrega"].'\"  class=\"ui icon black small button\" onclick=\"detalles(this)\"><i class=\"edit icon\"></i> Ver Detalles</button>';
            $btnEliminar = '<button id=\"'.$fila["idRequisicion"].'\"  class=\"ui btnEliminar icon negative small button\"><i class=\"trash icon\"></i> Eliminar</button>';

            $acciones = ', "Acciones": "'.$btnEditar.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }



    public function mostrarRechazadasGF() {
        $_query = "select r.*,DATE_FORMAT(r.fecha, '%d/%m/%Y') as fecha,DATE_FORMAT(r.fechaEntrega, '%d/%m/%Y') as fechaEntrega,
         p.nombre as proveedor,p.condicionCredito as condicionCredito, concat(u.nombre,' ', u.apellido) as nombre from requisiciones r
        inner join proveedores p on p.idProveedor = r.idProveedor
        inner join usuario u on u.codigoUsuario = r.responsable
         where r.idEliminado=1 and r.idClasificacion=1 and r.estado=3";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["idRequisicion"].'\" fecha=\"'.$fila["fecha"].'\" responsable=\"'.$fila["nombre"].'\" tipoCompra=\"'.$fila["tipoCompra"].'\" proveedor=\"'.$fila["proveedor"].'\" tipoDoc=\"'.$fila["tipoDoc"].'\" condicionCredito=\"'.$fila["condicionCredito"].'\" fechaEntrega=\"'.$fila["fechaEntrega"].'\"  class=\"ui icon black small button\" onclick=\"detalles(this)\"><i class=\"edit icon\"></i> Ver Detalles</button>';
            $btnEliminar = '<button id=\"'.$fila["idRequisicion"].'\"  class=\"ui btnEliminar icon negative small button\"><i class=\"trash icon\"></i> Eliminar</button>';

            $acciones = ', "Acciones": "'.$btnEditar.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }

    public function mostrarRechazadasIP() {
        $_query = "select r.*,DATE_FORMAT(r.fecha, '%d/%m/%Y') as fecha,DATE_FORMAT(r.fechaEntrega, '%d/%m/%Y') as fechaEntrega,
        p.nombre as proveedor,p.condicionCredito as condicionCredito, concat(u.nombre,' ', u.apellido) as nombre from requisiciones r
       inner join proveedores p on p.idProveedor = r.idProveedor
       inner join usuario u on u.codigoUsuario = r.responsable
        where r.idEliminado=1 and r.idClasificacion=2 and r.estado=3";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["idRequisicion"].'\" fecha=\"'.$fila["fecha"].'\" responsable=\"'.$fila["nombre"].'\" tipoCompra=\"'.$fila["tipoCompra"].'\" proveedor=\"'.$fila["proveedor"].'\" tipoDoc=\"'.$fila["tipoDoc"].'\" condicionCredito=\"'.$fila["condicionCredito"].'\" fechaEntrega=\"'.$fila["fechaEntrega"].'\"  class=\"ui icon black small button\" onclick=\"detalles(this)\"><i class=\"edit icon\"></i> Ver Detalles</button>';
            $btnEliminar = '<button id=\"'.$fila["idRequisicion"].'\"  class=\"ui btnEliminar icon negative small button\"><i class=\"trash icon\"></i> Eliminar</button>';

            $acciones = ', "Acciones": "'.$btnEditar.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }

    public function mostrarRechazadasP() {
        $_query = "select r.*,DATE_FORMAT(r.fecha, '%d/%m/%Y') as fecha,DATE_FORMAT(r.fechaEntrega, '%d/%m/%Y') as fechaEntrega,
        p.nombre as proveedor,p.condicionCredito as condicionCredito, concat(u.nombre,' ', u.apellido) as nombre from requisiciones r
       inner join proveedores p on p.idProveedor = r.idProveedor
       inner join usuario u on u.codigoUsuario = r.responsable
        where r.idEliminado=1 and r.idClasificacion=3 and r.estado=3";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["idRequisicion"].'\" fecha=\"'.$fila["fecha"].'\" responsable=\"'.$fila["nombre"].'\" tipoCompra=\"'.$fila["tipoCompra"].'\" proveedor=\"'.$fila["proveedor"].'\" tipoDoc=\"'.$fila["tipoDoc"].'\" condicionCredito=\"'.$fila["condicionCredito"].'\" fechaEntrega=\"'.$fila["fechaEntrega"].'\"  class=\"ui icon black small button\" onclick=\"detalles(this)\"><i class=\"edit icon\"></i> Ver Detalles</button>';
            $btnEliminar = '<button id=\"'.$fila["idRequisicion"].'\"  class=\"ui btnEliminar icon negative small button\"><i class=\"trash icon\"></i> Eliminar</button>';

            $acciones = ', "Acciones": "'.$btnEditar.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }


    public function aprobarRequisicion() {
        $_query = "update requisiciones set estado=2 where idRequisicion=".$this->objeto->getIdOrden();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function rechazarRequisicion() {
        $_query = "update requisiciones set estado=3 where idRequisicion=".$this->objeto->getIdOrden();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

}

?>