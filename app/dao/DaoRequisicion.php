<?php 

class DaoRequisicion extends DaoBase {

    public function __construct() {
        parent::__construct();
        $this->objeto = new Requisicion();
    }

    public function guardarReq() {
        $_query = "insert into requisiciones values(null,'".$this->objeto->getFechaReq()."','".$this->objeto->getIdResponsable()."'
        ,'".$this->objeto->getTipoCompra()."','".$this->objeto->getIdProveedor()."','".$this->objeto->getTipoDocumento()."'
        ,'".$this->objeto->getIdClasificacion()."','".$this->objeto->getFechaEn()."',1,'',1)";

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
        ,'".$this->objeto->getMedidas()."','".$this->objeto->getDescripciones()."','".$this->objeto->getPrecio()."',
        '".$this->objeto->getPrecioTotal()."',1,1)";

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


    public function mostrarPenAprobarGastos() {
        $_query = "select g.*,DATE_FORMAT(g.fecha, '%d/%m/%Y') as fecha, CONCAT('$',format(g.precio,2)) as precio,
        go.nombre as gasto,p.nombre as proveedor,p.condicionCredito,concat(u.nombre,' ', u.apellido) as nombre from gastos g
               inner join gastosOficina go on go.idGasto = g.idGasto
               inner join proveedoresGastos p on p.idGasto = g.idGasto
               inner join usuario u on u.codigoUsuario = g.reponsable
                where g.estado=1 group by g.idGasto ";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["idDetalle"].'\" fecha=\"'.$fila["fecha"].'\" proveedor=\"'.$fila["proveedor"].'\" responsable=\"'.$fila["nombre"].'\" precio=\"'.$fila["precio"].'\" gasto=\"'.$fila["gasto"].'\" descripcion=\"'.$fila["descripcion"].'\"  class=\"ui icon black small button\" onclick=\"detalles(this)\"><i class=\"edit icon\"></i> Ver Detalles</button>';
            $btnEliminar = '<button id=\"'.$fila["idDetalle"].'\"  class=\"ui btnEliminar icon negative small button\"><i class=\"trash icon\"></i> Eliminar</button>';

            $acciones = ', "Acciones": "'.$btnEditar.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }

    public function mostrarGastosAprobados() {
        $_query = "select g.*,DATE_FORMAT(g.fecha, '%d/%m/%Y') as fecha, CONCAT('$',format(g.precio,2)) as precio,
        go.nombre as gasto,p.nombre as proveedor,p.condicionCredito,concat(u.nombre,' ', u.apellido) as nombre from gastos g
               inner join gastosOficina go on go.idGasto = g.idGasto
               inner join proveedoresGastos p on p.idGasto = g.idGasto
               inner join usuario u on u.codigoUsuario = g.reponsable
                where g.estado=2";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["idDetalle"].'\" fecha=\"'.$fila["fecha"].'\" proveedor=\"'.$fila["proveedor"].'\" tipoPago=\"'.$fila["tipoPago"].'\" responsable=\"'.$fila["nombre"].'\" precio=\"'.$fila["precio"].'\" gasto=\"'.$fila["gasto"].'\" descripcion=\"'.$fila["descripcion"].'\"  class=\"ui icon black small button\" onclick=\"detalles(this)\"><i class=\"edit icon\"></i> Ver Detalles</button>';
            $btnEliminar = '<button id=\"'.$fila["idDetalle"].'\"  class=\"ui  icon negative small button\" onclick=\"finalizar(this)\"><i class=\"dollar icon\"></i> Pagar</button>';

            if($fila["tipoPago"] == " "){
                $acciones = ', "Acciones": "'.$btnEditar.' '.$btnEliminar.'"';
            }else{
                $acciones = ', "Acciones": "'.$btnEditar.'"';
            }
           

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }

    public function mostrarGastosRechazados() {
        $_query = "select g.*,DATE_FORMAT(g.fecha, '%d/%m/%Y') as fecha, CONCAT('$',format(g.precio,2)) as precio,
        go.nombre as gasto,p.nombre as proveedor,p.condicionCredito,concat(u.nombre,' ', u.apellido) as nombre from gastos g
               inner join gastosOficina go on go.idGasto = g.idGasto
               inner join proveedoresGastos p on p.idGasto = g.idGasto
               inner join usuario u on u.codigoUsuario = g.reponsable
                where g.estado=3";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["idDetalle"].'\" fecha=\"'.$fila["fecha"].'\" proveedor=\"'.$fila["proveedor"].'\" responsable=\"'.$fila["nombre"].'\" precio=\"'.$fila["precio"].'\" gasto=\"'.$fila["gasto"].'\" descripcion=\"'.$fila["descripcion"].'\"  class=\"ui icon black small button\" onclick=\"detalles(this)\"><i class=\"edit icon\"></i> Ver Detalles</button>';
            $btnEliminar = '<button id=\"'.$fila["idDetalle"].'\"  class=\"ui btnEliminar icon negative small button\"><i class=\"trash icon\"></i> Eliminar</button>';

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
            $btnEliminar = '<button id=\"'.$fila["idRequisicion"].'\"  class=\"ui btnEliminar icon negative small button\" onclick=\"finalizar(this)\"><i class=\"check icon\"></i> Finalizar</button>';

            $acciones = ', "Acciones": "'.$btnEditar.' '.$btnEliminar.'"';

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
            $btnEliminar = '<button id=\"'.$fila["idRequisicion"].'\"  class=\"ui btnEliminar icon negative small button\" onclick=\"finalizar(this)\"><i class=\"check icon\"></i> Finalizar</button>';

            $acciones = ', "Acciones": "'.$btnEditar.' '.$btnEliminar.'"';

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
            $btnEliminar = '<button id=\"'.$fila["idRequisicion"].'\"  class=\"ui btnEliminar icon negative small button\" onclick=\"finalizar(this)\"><i class=\"check icon\"></i> Finalizar</button>';

            $acciones = ', "Acciones": "'.$btnEditar.' '.$btnEliminar.'"';

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



    public function mostrarFinalizadasGF() {
        $_query = "select r.*,DATE_FORMAT(r.fecha, '%d/%m/%Y') as fecha,DATE_FORMAT(r.fechaEntrega, '%d/%m/%Y') as fechaEntrega,
         p.nombre as proveedor,p.condicionCredito as condicionCredito, concat(u.nombre,' ', u.apellido) as nombre from requisiciones r
        inner join proveedores p on p.idProveedor = r.idProveedor
        inner join usuario u on u.codigoUsuario = r.responsable
         where r.idEliminado=1 and r.idClasificacion=1 and r.estado=5";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["idRequisicion"].'\" tipoPago=\"'.$fila["tipoPago"].'\" fecha=\"'.$fila["fecha"].'\" responsable=\"'.$fila["nombre"].'\" tipoCompra=\"'.$fila["tipoCompra"].'\" proveedor=\"'.$fila["proveedor"].'\" tipoDoc=\"'.$fila["tipoDoc"].'\" condicionCredito=\"'.$fila["condicionCredito"].'\" fechaEntrega=\"'.$fila["fechaEntrega"].'\"  class=\"ui icon black small button\" onclick=\"detalles(this)\"><i class=\"edit icon\"></i> Ver Detalles</button>';
            $btnEliminar = '<button id=\"'.$fila["idRequisicion"].'\"  class=\"ui btnEliminar icon negative small button\"><i class=\"trash icon\"></i> Eliminar</button>';

            $acciones = ', "Acciones": "'.$btnEditar.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }

    public function mostrarFinalizadasIP() {
        $_query = "select r.*,DATE_FORMAT(r.fecha, '%d/%m/%Y') as fecha,DATE_FORMAT(r.fechaEntrega, '%d/%m/%Y') as fechaEntrega,
        p.nombre as proveedor,p.condicionCredito as condicionCredito, concat(u.nombre,' ', u.apellido) as nombre from requisiciones r
       inner join proveedores p on p.idProveedor = r.idProveedor
       inner join usuario u on u.codigoUsuario = r.responsable
        where r.idEliminado=1 and r.idClasificacion=2 and r.estado=5";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["idRequisicion"].'\" tipoPago=\"'.$fila["tipoPago"].'\" fecha=\"'.$fila["fecha"].'\" responsable=\"'.$fila["nombre"].'\" tipoCompra=\"'.$fila["tipoCompra"].'\" proveedor=\"'.$fila["proveedor"].'\" tipoDoc=\"'.$fila["tipoDoc"].'\" condicionCredito=\"'.$fila["condicionCredito"].'\" fechaEntrega=\"'.$fila["fechaEntrega"].'\"  class=\"ui icon black small button\" onclick=\"detalles(this)\"><i class=\"edit icon\"></i> Ver Detalles</button>';
            $btnEliminar = '<button id=\"'.$fila["idRequisicion"].'\"  class=\"ui btnEliminar icon negative small button\"><i class=\"trash icon\"></i> Eliminar</button>';

            $acciones = ', "Acciones": "'.$btnEditar.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }

    public function mostrarFinalizadasP() {
        $_query = "select r.*,DATE_FORMAT(r.fecha, '%d/%m/%Y') as fecha,DATE_FORMAT(r.fechaEntrega, '%d/%m/%Y') as fechaEntrega,
        p.nombre as proveedor,p.condicionCredito as condicionCredito, concat(u.nombre,' ', u.apellido) as nombre from requisiciones r
       inner join proveedores p on p.idProveedor = r.idProveedor
       inner join usuario u on u.codigoUsuario = r.responsable
        where r.idEliminado=1 and r.idClasificacion=3 and r.estado=5";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["idRequisicion"].'\" tipoPago=\"'.$fila["tipoPago"].'\" fecha=\"'.$fila["fecha"].'\" responsable=\"'.$fila["nombre"].'\" tipoCompra=\"'.$fila["tipoCompra"].'\" proveedor=\"'.$fila["proveedor"].'\" tipoDoc=\"'.$fila["tipoDoc"].'\" condicionCredito=\"'.$fila["condicionCredito"].'\" fechaEntrega=\"'.$fila["fechaEntrega"].'\"  class=\"ui icon black small button\" onclick=\"detalles(this)\"><i class=\"edit icon\"></i> Ver Detalles</button>';
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


    public function agregarInventario() {
        $_query = "update inventario set cantidadExistencia = cantidadExistencia +".$this->objeto->getCantidad()."       
        where idProducto=".$this->objeto->getIdProductoFinal()." and idColor=".$this->objeto->getColor()." and
        idAcabado = ".$this->objeto->getAcabado();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


    public function recibir() {
        $_query = "update detalleRequisicion set estado=2         
        where idDetalle=".$this->objeto->getIdOrden();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


    public function aprobarGasto() {
        $_query = "update gastos set estado=2 where idDetalle=".$this->objeto->getIdOrden();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function finalizarRe() {
        $_query = "update requisiciones set estado=5, tipoPago = '".$this->objeto->getTipoDocumento()."'      
        where idRequisicion=".$this->objeto->getIdOrden();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function finalizarGasto() {
        $_query = "update gastos set tipoPago = '".$this->objeto->getTipoDocumento()."'      
        where idGasto=".$this->objeto->getIdOrden();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function rechazarGasto() {
        $_query = "update gastos set estado=3 where idDetalle=".$this->objeto->getIdOrden();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


    public function guardarGasto() {
        $_query = "insert into gastosOficina values(null,'".$this->objeto->getDescripciones()."',1)";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function gastos() {
        $_query = "insert into gastos values(null,'".$this->objeto->getIdResponsable()."',
        '".$this->objeto->getTipoCompra()."','".$this->objeto->getTipoDocumento()."',
        '".$this->objeto->getIdOrden()."','".$this->objeto->getDescripciones()."',
        '".$this->objeto->getPrecio()."','".$this->objeto->getFechaReq()."','',1)";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


    public function quitarGasto() {
        $_query = "update gastosOficina set idEliminado=2 where idGasto=".$this->objeto->getIdOrden();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


    public function mostrarGastosCMB() {

        $_query = "select * from gastosOficina where  idEliminado=1";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= json_encode($fila).',';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }

    public function cobrarIP() {
        $_query = "update detalleOrdenIP set totalCobro=totalCobro + ".$this->objeto->getPrecio()." where idDetalle=".$this->objeto->getIdOrden();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function cobrarP() {
        $_query = "update detalleOrdenP set totalCobro=totalCobro + ".$this->objeto->getPrecio()." where idDetalle=".$this->objeto->getIdOrden();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function cobrarGF() {
        $_query = "update detalleOrdenGR set totalCobro=totalCobro + ".$this->objeto->getPrecio()." where idDetalle=".$this->objeto->getIdOrden();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }



    public function enviarLibroIP() {
        $_query = "update detalleOrdenIP set estadoCobro= ".$this->objeto->getLibro()." where idDetalle=".$this->objeto->getIdOrden();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function enviarLibroP() {
        $_query = "update detalleOrdenP set estadoCobro= ".$this->objeto->getLibro()." where idDetalle=".$this->objeto->getIdOrden();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function enviarLibroGF() {
        $_query = "update detalleOrdenGR set estadoCobro= ".$this->objeto->getLibro()." where idDetalle=".$this->objeto->getIdOrden();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function registrarPagoGF(){
        date_default_timezone_set("America/el_salvador");

        $fecha= date("Y-m-d");
        $_query = "insert into pagos values(null, 1, ".$this->objeto->getIdOrden().",".$this->objeto->getPrecio().",
        '".$this->objeto->getTipoDocumento()."','$fecha' )";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function registrarPagoIP(){
        date_default_timezone_set("America/el_salvador");

        $fecha= date("Y-m-d");
        $_query = "insert into pagos values(null, 2, ".$this->objeto->getIdOrden().",".$this->objeto->getPrecio().",
        '".$this->objeto->getTipoDocumento()."','$fecha' )";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function banco(){
        date_default_timezone_set("America/el_salvador");

        $fecha= date("Y-m-d");
        $_query = "insert into banco values(null,".$this->objeto->getPrecio().",
        '".$this->objeto->getTipoDocumento()."','$fecha' )";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function registrarPagoP(){
        date_default_timezone_set("America/el_salvador");

        $fecha= date("Y-m-d");

        $_query = "insert into pagos values(null, 3, ".$this->objeto->getIdOrden().",".$this->objeto->getPrecio().",
        '".$this->objeto->getTipoDocumento()."', '$fecha' )";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function efectivo(){
        $_query = "insert into remanente values(null, ".$this->objeto->getPrecioTotal().", 1 )";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function bancoEfectivo(){
        $_query = "insert into remanente values(null, ".$this->objeto->getPrecio().", 2 )";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


    public function mostrarBanco() {
        $_query = "select *, CONCAT('$', format(monto,2) ) as montoF,  DATE_FORMAT(fecha, '%d/%m/%Y') as fechaF from banco";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

           
            $acciones = ', "Acciones": ""';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }



}

?>