<?php 

class DaoOrdenTrabajo extends DaoBase {

    public function __construct() {
        parent::__construct();
        $this->objeto = new OrdenTrabajo();
    }

    public function guardarOTGR() {
        $_query = "insert into ordenTrabajoGR values(null,'".$this->objeto->getCorrelativo()."','".$this->objeto->getFechaOT()."'
        ,'".$this->objeto->getIdResponsable()."','".$this->objeto->getIdCliente()."','".$this->objeto->getFechaEn()."'
        ,'".$this->objeto->getIdClasificacion()."','".$this->objeto->getIdProductoFinal()."','".$this->objeto->getColor()."'
        ,'".$this->objeto->getAcabado()."','".$this->objeto->getCantidad()."','".$this->objeto->getAlto()."'
        ,'".$this->objeto->getAncho()."','".$this->objeto->getCuadrosImp()."','".$this->objeto->getUbicacion()."'
        ,'".$this->objeto->getDescripciones()."','".$this->objeto->getPrecio()."','',1,1)";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


    public function guardarOTIP() {
        $_query = "insert into ordenTrabajoIP values(null,'".$this->objeto->getCorrelativo()."','".$this->objeto->getFechaOT()."'
        ,'".$this->objeto->getIdResponsable()."','".$this->objeto->getIdCliente()."','".$this->objeto->getFechaEn()."'
        ,'".$this->objeto->getIdClasificacion()."','".$this->objeto->getIdProductoFinal()."','".$this->objeto->getColor()."'
        ,'".$this->objeto->getAcabado()."','".$this->objeto->getCantidad()."','".$this->objeto->getTipo()."'
        ,'".$this->objeto->getDescripciones()."','".$this->objeto->getPrecio()."','',1,1)";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function guardarOTP() {
        $_query = "insert into ordenTrabajoP values(null,'".$this->objeto->getCorrelativo()."','".$this->objeto->getFechaOT()."'
        ,'".$this->objeto->getIdResponsable()."','".$this->objeto->getIdCliente()."','".$this->objeto->getFechaEn()."'
        ,'".$this->objeto->getIdClasificacion()."','".$this->objeto->getIdProductoFinal()."','".$this->objeto->getColor()."'
        ,'".$this->objeto->getAcabado()."','".$this->objeto->getCantidad()."','".$this->objeto->getTipo()."'
        ,'".$this->objeto->getDescripciones()."','".$this->objeto->getPrecio()."','',1,1)";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function mostrarProduccionGR() {
        $_query = " select o.idOrden, o.correlativo,DATE_FORMAT(o.fechaOT, '%d/%m/%Y') as fechaOT,DATE_FORMAT(o.fechaEntrega, '%d/%m/%Y') as fechaEntrega,
        concat(u.nombre,' ', u.apellido) as nombre,
       c.nombre as nombreC, t.nombre as producto
       from ordenTrabajoGR o
       inner join usuario u on u.codigoUsuario = o.responsable
       inner join clientes c on c.idCliente = o.cliente
       inner join clasificacionProductos t on t.idProducto = o.idClasificacion
      where o.idEliminado=1 and o.estado=2 and o.correlativo>'OTGR00' order by fechaEntrega asc";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["idOrden"].'\" correlativo=\"'.$fila["correlativo"].'\" class=\"ui icon black small button\"   onclick=\"detalles(this)\"><i class=\"edit icon\"></i> Ver Detalles</button>';
            $btnEliminar = '<button id=\"'.$fila["idOrden"].'\" correlativo=\"'.$fila["correlativo"].'\"  class=\"ui btnEliminar icon negative small button\" onclick=\"eliminar(this)\"><i class=\"trash icon\"></i> Eliminar</button>';
            $btnFinalizar = '<button id=\"'.$fila["idOrden"].'\" correlativo=\"'.$fila["correlativo"].'\" class=\"ui  icon green small button\" onclick=\"finalizar(this)\"><i class=\"check icon\"></i> Finalizar</button>';

            $acciones = ', "Acciones": "'.$btnEditar.' '.$btnEliminar.' '.$btnFinalizar.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }

    public function mostrarProduccionIP() {
        $_query = "select o.idOrden, o.correlativo,DATE_FORMAT(o.fechaOT, '%d/%m/%Y') as fechaOT,DATE_FORMAT(o.fechaEntrega, '%d/%m/%Y') as fechaEntrega,
        concat(u.nombre,' ', u.apellido) as nombre,
       c.nombre as nombreC, t.nombre as producto
       from ordenTrabajoIP o
       inner join usuario u on u.codigoUsuario = o.responsable
       inner join clientes c on c.idCliente = o.cliente
       inner join clasificacionProductos t on t.idProducto = o.idClasificacion
      where o.idEliminado=1 and o.estado=2 and o.correlativo>'OTIP00' order by fechaEntrega asc";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["idOrden"].'\" correlativo=\"'.$fila["correlativo"].'\" class=\"ui icon black small button\"   onclick=\"detalles(this)\"><i class=\"edit icon\"></i> Ver Detalles</button>';
            $btnEliminar = '<button id=\"'.$fila["idOrden"].'\" correlativo=\"'.$fila["correlativo"].'\"  class=\"ui btnEliminar icon negative small button\" onclick=\"eliminar(this)\"><i class=\"trash icon\"></i> Eliminar</button>';
            $btnFinalizar = '<button id=\"'.$fila["idOrden"].'\" correlativo=\"'.$fila["correlativo"].'\" class=\"ui  icon green small button\" onclick=\"finalizar(this)\"><i class=\"check icon\"></i> Finalizar</button>';

            $acciones = ', "Acciones": "'.$btnEditar.' '.$btnEliminar.' '.$btnFinalizar.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }


    public function mostrarProduccionP() {
        $_query = "select o.idOrden, o.correlativo,DATE_FORMAT(o.fechaOT, '%d/%m/%Y') as fechaOT,DATE_FORMAT(o.fechaEntrega, '%d/%m/%Y') as fechaEntrega,
        concat(u.nombre,' ', u.apellido) as nombre,
       c.nombre as nombreC, t.nombre as producto
       from ordenTrabajoP o
       inner join usuario u on u.codigoUsuario = o.responsable
       inner join clientes c on c.idCliente = o.cliente
       inner join clasificacionProductos t on t.idProducto = o.idClasificacion
      where o.idEliminado=1 and o.estado=2 and o.correlativo>'OTPR00' order by fechaEntrega asc";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["idOrden"].'\" correlativo=\"'.$fila["correlativo"].'\" class=\"ui icon black small button\"   onclick=\"detalles(this)\"><i class=\"edit icon\"></i> Ver Detalles</button>';
            $btnEliminar = '<button id=\"'.$fila["idOrden"].'\" correlativo=\"'.$fila["correlativo"].'\"  class=\"ui btnEliminar icon negative small button\" onclick=\"eliminar(this)\"><i class=\"trash icon\"></i> Eliminar</button>';
            $btnFinalizar = '<button id=\"'.$fila["idOrden"].'\" correlativo=\"'.$fila["correlativo"].'\" class=\"ui  icon green small button\" onclick=\"finalizar(this)\"><i class=\"check icon\"></i> Finalizar</button>';

            $acciones = ', "Acciones": "'.$btnEditar.' '.$btnEliminar.' '.$btnFinalizar.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }

    public function cargarDatosGR() {

        $_query = "select o.*,o.idOrden, o.correlativo,DATE_FORMAT(o.fechaOT, '%d/%m/%Y') as fechaOT,DATE_FORMAT(o.fechaEntrega, '%d/%m/%Y') as fechaEntrega,
        concat(u.nombre,' ', u.apellido) as nombre,
       c.nombre as nombreC, t.nombre as producto, co.color as color, ac.acabado as acabado, tp.productoFinal as productoFinal,
       m.medida as medida
       from ordenTrabajoGR o
       inner join usuario u on u.codigoUsuario = o.responsable
       inner join clientes c on c.idCliente = o.cliente
       inner join clasificacionProductos t on t.idProducto = o.idClasificacion
       inner join productoFinal tp on tp.idProducto = t.idProducto
       inner join colores co on co.idColor = o.idColor
       inner join acabados ac on ac.idAcabado = o.idAcabado
       inner join productosMedidas pm on pm.idProductoFinal = tp.idProductoFinal
       inner join medidas m on m.idMedida = pm.idMedida
       where o.idOrden=".$this->objeto->getIdOrden()." group by idOrden ";

        $resultado = $this->con->ejecutar($_query);

        $json = json_encode($resultado->fetch_assoc());

        return $json;
    }

    public function cargarDatosIP() {

        $_query = "select o.*,o.idOrden, o.correlativo,DATE_FORMAT(o.fechaOT, '%d/%m/%Y') as fechaOT,DATE_FORMAT(o.fechaEntrega, '%d/%m/%Y') as fechaEntrega,
        concat(u.nombre,' ', u.apellido) as nombre,
       c.nombre as nombreC, t.nombre as producto, co.color as color, ac.acabado as acabado, tp.productoFinal as productoFinal,
       m.medida as medida
       from ordenTrabajoIP o
       inner join usuario u on u.codigoUsuario = o.responsable
       inner join clientes c on c.idCliente = o.cliente
       inner join clasificacionProductos t on t.idProducto = o.idClasificacion
       inner join productoFinal tp on tp.idProducto = t.idProducto
       inner join colores co on co.idColor = o.idColor
       inner join acabados ac on ac.idAcabado = o.idAcabado
       inner join productosMedidas pm on pm.idProductoFinal = tp.idProductoFinal
       inner join medidas m on m.idMedida = pm.idMedida
       where o.idOrden=".$this->objeto->getIdOrden()." group by idOrden ";

        $resultado = $this->con->ejecutar($_query);

        $json = json_encode($resultado->fetch_assoc());

        return $json;
    }

    public function cargarDatosP() {

        $_query = "select o.*,o.idOrden, o.correlativo,DATE_FORMAT(o.fechaOT, '%d/%m/%Y') as fechaOT,DATE_FORMAT(o.fechaEntrega, '%d/%m/%Y') as fechaEntrega,
        concat(u.nombre,' ', u.apellido) as nombre,
       c.nombre as nombreC, t.nombre as producto, co.color as color, ac.acabado as acabado, tp.productoFinal as productoFinal,
       m.medida as medida
       from ordenTrabajoP o
       inner join usuario u on u.codigoUsuario = o.responsable
       inner join clientes c on c.idCliente = o.cliente
       inner join clasificacionProductos t on t.idProducto = o.idClasificacion
       inner join productoFinal tp on tp.idProducto = t.idProducto
       inner join colores co on co.idColor = o.idColor
       inner join acabados ac on ac.idAcabado = o.idAcabado
       inner join productosMedidas pm on pm.idProductoFinal = tp.idProductoFinal
       inner join medidas m on m.idMedida = pm.idMedida
       where o.idOrden=".$this->objeto->getIdOrden()." group by idOrden ";

        $resultado = $this->con->ejecutar($_query);

        $json = json_encode($resultado->fetch_assoc());

        return $json;
    }


    public function mostrarFacturaGR() {
        $_query = " select o.idOrden, o.correlativo,DATE_FORMAT(o.fechaOT, '%d/%m/%Y') as fechaOT,DATE_FORMAT(o.fechaEntrega, '%d/%m/%Y') as fechaEntrega,
        concat(u.nombre,' ', u.apellido) as nombre,
       c.nombre as nombreC, t.nombre as producto
       from ordenTrabajoGR o
       inner join usuario u on u.codigoUsuario = o.responsable
       inner join clientes c on c.idCliente = o.cliente
       inner join clasificacionProductos t on t.idProducto = o.idClasificacion
      where o.idEliminado=1 and o.estado=3 and o.correlativo>'OTGR00' order by fechaEntrega asc";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);
            $btnEditar = '<button id=\"'.$fila["idOrden"].'\" correlativo=\"'.$fila["correlativo"].'\" class=\"ui icon black small button\"   onclick=\"detalles(this)\"><i class=\"edit icon\"></i> Ver Detalles</button>';
          $btnFinalizar = '<button id=\"'.$fila["idOrden"].'\" correlativo=\"'.$fila["correlativo"].'\"  class=\"ui  icon green small button\" onclick=\"factura(this)\"><i class=\"print icon\"></i> Facturar</button>';

            $acciones = ', "Acciones": "'.$btnEditar.''.$btnFinalizar.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }

    public function mostrarFacturaIP() {
        $_query = "select o.idOrden, o.correlativo,DATE_FORMAT(o.fechaOT, '%d/%m/%Y') as fechaOT,DATE_FORMAT(o.fechaEntrega, '%d/%m/%Y') as fechaEntrega,
        concat(u.nombre,' ', u.apellido) as nombre,
       c.nombre as nombreC, t.nombre as producto
       from ordenTrabajoIP o
       inner join usuario u on u.codigoUsuario = o.responsable
       inner join clientes c on c.idCliente = o.cliente
       inner join clasificacionProductos t on t.idProducto = o.idClasificacion
      where o.idEliminado=1 and o.estado=3 and o.correlativo>'OTIP00' order by fechaEntrega asc";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["idOrden"].'\" correlativo=\"'.$fila["correlativo"].'\" class=\"ui icon black small button\"   onclick=\"detalles(this)\"><i class=\"edit icon\"></i> Ver Detalles</button>';
            $btnFinalizar = '<button id=\"'.$fila["idOrden"].'\" correlativo=\"'.$fila["correlativo"].'\"  class=\"ui  icon green small button\" onclick=\"factura(this)\"><i class=\"print icon\"></i> Facturar</button>';
  
              $acciones = ', "Acciones": "'.$btnEditar.''.$btnFinalizar.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }


    public function mostrarFacturaP() {
        $_query = "select o.idOrden, o.correlativo,DATE_FORMAT(o.fechaOT, '%d/%m/%Y') as fechaOT,DATE_FORMAT(o.fechaEntrega, '%d/%m/%Y') as fechaEntrega,
        concat(u.nombre,' ', u.apellido) as nombre,
       c.nombre as nombreC, t.nombre as producto
       from ordenTrabajoP o
       inner join usuario u on u.codigoUsuario = o.responsable
       inner join clientes c on c.idCliente = o.cliente
       inner join clasificacionProductos t on t.idProducto = o.idClasificacion
      where o.idEliminado=1 and o.estado=3 and o.correlativo>'OTPR00' order by fechaEntrega asc";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["idOrden"].'\" correlativo=\"'.$fila["correlativo"].'\" class=\"ui icon black small button\"   onclick=\"detalles(this)\"><i class=\"edit icon\"></i> Ver Detalles</button>';
            $btnFinalizar = '<button id=\"'.$fila["idOrden"].'\" correlativo=\"'.$fila["correlativo"].'\"  class=\"ui  icon green small button\" onclick=\"factura(this)\"><i class=\"print icon\"></i> Facturar</button>';
  
              $acciones = ', "Acciones": "'.$btnEditar.''.$btnFinalizar.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }

    public function aprobarOrdenGR() {

        $_query = "update ordenTrabajoGR set estado=2 where idOrden=".$this->objeto->getIdOrden();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    public function aprobarOrdenIP() {

        $_query = "update ordenTrabajoIP set estado=2 where idOrden=".$this->objeto->getIdOrden();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    public function aprobarOrdenP() {

        $_query = "update ordenTrabajoP set estado=2 where idOrden=".$this->objeto->getIdOrden();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }


    public function finalizarOrdenGR() {

        $_query = "update ordenTrabajoGR set estado=3 where idOrden=".$this->objeto->getIdOrden();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    public function finalizarOrdenIP() {

        $_query = "update ordenTrabajoIP set estado=3 where idOrden=".$this->objeto->getIdOrden();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    public function finalizarOrdenP() {

        $_query = "update ordenTrabajoP set estado=3 where idOrden=".$this->objeto->getIdOrden();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    public function eliminarOrdenGR() {

        $_query = "update ordenTrabajoGR set idEliminado=2, descripcionesE ='".$this->objeto->getDescripciones()."'
         where idOrden=".$this->objeto->getIdOrden();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }


    public function eliminarOrdenIP() {

        $_query = "update ordenTrabajoIP set idEliminado=2, descripcionesE ='".$this->objeto->getDescripciones()."'
         where idOrden=".$this->objeto->getIdOrden();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    public function eliminarOrdenP() {

        $_query = "update ordenTrabajoP set idEliminado=2, descripcionesE ='".$this->objeto->getDescripciones()."'
         where idOrden=".$this->objeto->getIdOrden();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }



    public function mostrarEliminadaGR() {
        $_query = " select o.idOrden, o.correlativo,DATE_FORMAT(o.fechaOT, '%d/%m/%Y') as fechaOT,DATE_FORMAT(o.fechaEntrega, '%d/%m/%Y') as fechaEntrega,
        concat(u.nombre,' ', u.apellido) as nombre,
       c.nombre as nombreC, t.nombre as producto
       from ordenTrabajoGR o
       inner join usuario u on u.codigoUsuario = o.responsable
       inner join clientes c on c.idCliente = o.cliente
       inner join clasificacionProductos t on t.idProducto = o.idClasificacion
      where o.idEliminado=2 and o.correlativo>'OTGR00' order by fechaEntrega asc";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["idOrden"].'\" correlativo=\"'.$fila["correlativo"].'\" class=\"ui icon black small button\"   onclick=\"detalles(this)\"><i class=\"edit icon\"></i> Ver Detalles</button>';
            $btnEliminar = '<button id=\"'.$fila["idOrden"].'\" correlativo=\"'.$fila["correlativo"].'\"  class=\"ui btnEliminar icon negative small button\" onclick=\"eliminar(this)\"><i class=\"trash icon\"></i> Eliminar</button>';
            $btnFinalizar = '<button id=\"'.$fila["idOrden"].'\" correlativo=\"'.$fila["correlativo"].'\" class=\"ui  icon green small button\" onclick=\"finalizar(this)\"><i class=\"check icon\"></i> Finalizar</button>';

            $acciones = ', "Acciones": "'.$btnEditar.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }

    public function mostrarEliminadaIP() {
        $_query = "select o.idOrden, o.correlativo,DATE_FORMAT(o.fechaOT, '%d/%m/%Y') as fechaOT,DATE_FORMAT(o.fechaEntrega, '%d/%m/%Y') as fechaEntrega,
        concat(u.nombre,' ', u.apellido) as nombre,
       c.nombre as nombreC, t.nombre as producto
       from ordenTrabajoIP o
       inner join usuario u on u.codigoUsuario = o.responsable
       inner join clientes c on c.idCliente = o.cliente
       inner join clasificacionProductos t on t.idProducto = o.idClasificacion
      where o.idEliminado=2 and o.correlativo>'OTIP00' order by fechaEntrega asc";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["idOrden"].'\" correlativo=\"'.$fila["correlativo"].'\" class=\"ui icon black small button\"   onclick=\"detalles(this)\"><i class=\"edit icon\"></i> Ver Detalles</button>';
            $btnEliminar = '<button id=\"'.$fila["idOrden"].'\" correlativo=\"'.$fila["correlativo"].'\"  class=\"ui btnEliminar icon negative small button\" onclick=\"eliminar(this)\"><i class=\"trash icon\"></i> Eliminar</button>';
            $btnFinalizar = '<button id=\"'.$fila["idOrden"].'\" correlativo=\"'.$fila["correlativo"].'\" class=\"ui  icon green small button\" onclick=\"finalizar(this)\"><i class=\"check icon\"></i> Finalizar</button>';

            $acciones = ', "Acciones": "'.$btnEditar.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }


    public function mostrarEliminadaP() {
        $_query = "select o.idOrden, o.correlativo,DATE_FORMAT(o.fechaOT, '%d/%m/%Y') as fechaOT,DATE_FORMAT(o.fechaEntrega, '%d/%m/%Y') as fechaEntrega,
        concat(u.nombre,' ', u.apellido) as nombre,
       c.nombre as nombreC, t.nombre as producto
       from ordenTrabajoP o
       inner join usuario u on u.codigoUsuario = o.responsable
       inner join clientes c on c.idCliente = o.cliente
       inner join clasificacionProductos t on t.idProducto = o.idClasificacion
      where o.idEliminado=2 and o.correlativo>'OTPR00' order by fechaEntrega asc";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["idOrden"].'\" correlativo=\"'.$fila["correlativo"].'\" class=\"ui icon black small button\"   onclick=\"detalles(this)\"><i class=\"edit icon\"></i> Ver Detalles</button>';
            $btnEliminar = '<button id=\"'.$fila["idOrden"].'\" correlativo=\"'.$fila["correlativo"].'\"  class=\"ui btnEliminar icon negative small button\" onclick=\"eliminar(this)\"><i class=\"trash icon\"></i> Eliminar</button>';
            $btnFinalizar = '<button id=\"'.$fila["idOrden"].'\" correlativo=\"'.$fila["correlativo"].'\" class=\"ui  icon green small button\" onclick=\"finalizar(this)\"><i class=\"check icon\"></i> Finalizar</button>';

            $acciones = ', "Acciones": "'.$btnEditar.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }


    public function imprimirFacturaGR() {
        $query = " select o.*,o.idOrden, o.correlativo,DATE_FORMAT(o.fechaOT, '%d/%m/%Y') as fechaOT,DATE_FORMAT(o.fechaEntrega, '%d/%m/%Y') as fechaEntrega,
        concat(u.nombre,' ', u.apellido) as nombre,
       c.nombre as nombreC, t.nombre as producto, co.color as color, ac.acabado as acabado, tp.productoFinal as productoFinal,
       m.medida as medida,format(o.precio,2) as precio
       from ordenTrabajoGR o
       inner join usuario u on u.codigoUsuario = o.responsable
       inner join clientes c on c.idCliente = o.cliente
       inner join clasificacionProductos t on t.idProducto = o.idClasificacion
       inner join productoFinal tp on tp.idProducto = t.idProducto
       inner join colores co on co.idColor = o.idColor
       inner join acabados ac on ac.idAcabado = o.idAcabado
       inner join productosMedidas pm on pm.idProductoFinal = tp.idProductoFinal
       inner join medidas m on m.idMedida = pm.idMedida
       where o.idOrden = (select max(idOrden) from ordenTrabajoGR)";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function imprimirFacturaIP() {
        $query = " select o.*,o.idOrden, o.correlativo,DATE_FORMAT(o.fechaOT, '%d/%m/%Y') as fechaOT,DATE_FORMAT(o.fechaEntrega, '%d/%m/%Y') as fechaEntrega,
        concat(u.nombre,' ', u.apellido) as nombre,
       c.nombre as nombreC, t.nombre as producto, co.color as color, ac.acabado as acabado, tp.productoFinal as productoFinal,
       m.medida as medida,format(o.precio,2) as precio
       from ordenTrabajoIP o
       inner join usuario u on u.codigoUsuario = o.responsable
       inner join clientes c on c.idCliente = o.cliente
       inner join clasificacionProductos t on t.idProducto = o.idClasificacion
       inner join productoFinal tp on tp.idProducto = t.idProducto
       inner join colores co on co.idColor = o.idColor
       inner join acabados ac on ac.idAcabado = o.idAcabado
       inner join productosMedidas pm on pm.idProductoFinal = tp.idProductoFinal
       inner join medidas m on m.idMedida = pm.idMedida
       where o.idOrden = (select max(idOrden) from ordenTrabajoIP)";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function imprimirFacturaP() {
        $query = " select o.*,o.idOrden, o.correlativo,DATE_FORMAT(o.fechaOT, '%d/%m/%Y') as fechaOT,DATE_FORMAT(o.fechaEntrega, '%d/%m/%Y') as fechaEntrega,
        concat(u.nombre,' ', u.apellido) as nombre,
       c.nombre as nombreC, t.nombre as producto, co.color as color, ac.acabado as acabado, tp.productoFinal as productoFinal,
       m.medida as medida,format(o.precio,2) as precio
       from ordenTrabajoP o
       inner join usuario u on u.codigoUsuario = o.responsable
       inner join clientes c on c.idCliente = o.cliente
       inner join clasificacionProductos t on t.idProducto = o.idClasificacion
       inner join productoFinal tp on tp.idProducto = t.idProducto
       inner join colores co on co.idColor = o.idColor
       inner join acabados ac on ac.idAcabado = o.idAcabado
       inner join productosMedidas pm on pm.idProductoFinal = tp.idProductoFinal
       inner join medidas m on m.idMedida = pm.idMedida
       where o.idOrden = (select max(idOrden) from ordenTrabajoP)";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }



    public function mostrarPenClientesGR() {
        $_query = " select o.idOrden, o.correlativo,DATE_FORMAT(o.fechaOT, '%d/%m/%Y') as fechaOT,DATE_FORMAT(o.fechaEntrega, '%d/%m/%Y') as fechaEntrega,
        concat(u.nombre,' ', u.apellido) as nombre,
       c.nombre as nombreC, t.nombre as producto
       from ordenTrabajoGR o
       inner join usuario u on u.codigoUsuario = o.responsable
       inner join clientes c on c.idCliente = o.cliente
       inner join clasificacionProductos t on t.idProducto = o.idClasificacion
      where o.idEliminado=1 and o.estado=1 and o.correlativo>'OTGR00' order by fechaEntrega asc";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["idOrden"].'\" correlativo=\"'.$fila["correlativo"].'\" class=\"ui icon black small button\"   onclick=\"detalles(this)\"><i class=\"edit icon\"></i> Ver Detalles</button>';
            $btnEliminar = '<button id=\"'.$fila["idOrden"].'\" correlativo=\"'.$fila["correlativo"].'\"  class=\"ui btnEliminar icon negative small button\" onclick=\"eliminar(this)\"><i class=\"trash icon\"></i> Eliminar</button>';
            $btnFinalizar = '<button id=\"'.$fila["idOrden"].'\" correlativo=\"'.$fila["correlativo"].'\" class=\"ui  icon green small button\" onclick=\"finalizar(this)\"><i class=\"check icon\"></i> Aprobar</button>';

            $acciones = ', "Acciones": "'.$btnEditar.' '.$btnEliminar.' '.$btnFinalizar.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }

    public function mostrarPenClientesIP() {
        $_query = "select o.idOrden, o.correlativo,DATE_FORMAT(o.fechaOT, '%d/%m/%Y') as fechaOT,DATE_FORMAT(o.fechaEntrega, '%d/%m/%Y') as fechaEntrega,
        concat(u.nombre,' ', u.apellido) as nombre,
       c.nombre as nombreC, t.nombre as producto
       from ordenTrabajoIP o
       inner join usuario u on u.codigoUsuario = o.responsable
       inner join clientes c on c.idCliente = o.cliente
       inner join clasificacionProductos t on t.idProducto = o.idClasificacion
      where o.idEliminado=1 and o.estado=1 and o.correlativo>'OTIP00' order by fechaEntrega asc";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["idOrden"].'\" correlativo=\"'.$fila["correlativo"].'\" class=\"ui icon black small button\"   onclick=\"detalles(this)\"><i class=\"edit icon\"></i> Ver Detalles</button>';
            $btnEliminar = '<button id=\"'.$fila["idOrden"].'\" correlativo=\"'.$fila["correlativo"].'\"  class=\"ui btnEliminar icon negative small button\" onclick=\"eliminar(this)\"><i class=\"trash icon\"></i> Eliminar</button>';
            $btnFinalizar = '<button id=\"'.$fila["idOrden"].'\" correlativo=\"'.$fila["correlativo"].'\" class=\"ui  icon green small button\" onclick=\"finalizar(this)\"><i class=\"check icon\"></i> Aprobar</button>';

            $acciones = ', "Acciones": "'.$btnEditar.' '.$btnEliminar.' '.$btnFinalizar.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }


    public function mostrarPenClientesP() {
        $_query = "select o.idOrden, o.correlativo,DATE_FORMAT(o.fechaOT, '%d/%m/%Y') as fechaOT,DATE_FORMAT(o.fechaEntrega, '%d/%m/%Y') as fechaEntrega,
        concat(u.nombre,' ', u.apellido) as nombre,
       c.nombre as nombreC, t.nombre as producto
       from ordenTrabajoP o
       inner join usuario u on u.codigoUsuario = o.responsable
       inner join clientes c on c.idCliente = o.cliente
       inner join clasificacionProductos t on t.idProducto = o.idClasificacion
      where o.idEliminado=1 and o.estado=1 and o.correlativo>'OTPR00' order by fechaEntrega asc";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["idOrden"].'\" correlativo=\"'.$fila["correlativo"].'\" class=\"ui icon black small button\"   onclick=\"detalles(this)\"><i class=\"edit icon\"></i> Ver Detalles</button>';
            $btnEliminar = '<button id=\"'.$fila["idOrden"].'\" correlativo=\"'.$fila["correlativo"].'\"  class=\"ui btnEliminar icon negative small button\" onclick=\"eliminar(this)\"><i class=\"trash icon\"></i> Eliminar</button>';
            $btnFinalizar = '<button id=\"'.$fila["idOrden"].'\" correlativo=\"'.$fila["correlativo"].'\" class=\"ui  icon green small button\" onclick=\"finalizar(this)\"><i class=\"check icon\"></i> Aprobar</button>';

            $acciones = ', "Acciones": "'.$btnEditar.' '.$btnEliminar.' '.$btnFinalizar.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }


    

}

?>