<?php 

class DaoProductos extends DaoBase {

    public function __construct() {
        parent::__construct();
        $this->objeto = new Productos();
    }


    public function mostrarGranFormato() {
        $_query = "select * from clasificacionProductos where idClasificacion = 1 and idEliminado=1 and idProducto>1;";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["idProducto"].'\"  class=\"ui btnEditar icon black small button\"><i class=\"edit icon\"></i> Editar</button>';
            $btnEliminar = '<button id=\"'.$fila["idProducto"].'\"  class=\"ui btnEliminar icon negative small button\"><i class=\"trash icon\"></i> Eliminar</button>';
            $btnDetalles = '<button id=\"'.$fila["idProducto"].'\" nombre=\"'.$fila["nombre"].'\"  class=\"ui icon blue small button\" onclick=\"detalles(this)\"><i class=\"list icon\"></i> Detalles</button>';

            $acciones = ', "Acciones": "'.$btnDetalles.''.$btnEditar.' '.$btnEliminar.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }

    public function mostrarImpresion() {
        $_query = "select * from clasificacionProductos where idClasificacion = 2 and idEliminado=1 and idProducto>2";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["idProducto"].'\"  class=\"ui btnEditar icon black small button\"><i class=\"edit icon\"></i> Editar</button>';
            $btnEliminar = '<button id=\"'.$fila["idProducto"].'\"  class=\"ui btnEliminar icon negative small button\"><i class=\"trash icon\"></i> Eliminar</button>';
            $btnDetalles = '<button id=\"'.$fila["idProducto"].'\" nombre=\"'.$fila["nombre"].'\"  class=\"ui icon blue small button\" onclick=\"detalles(this)\"><i class=\"list icon\"></i> Detalles</button>';

            $acciones = ', "Acciones": "'.$btnDetalles.''.$btnEditar.' '.$btnEliminar.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }


    public function mostrarPromocionales() {
        $_query = "select * from clasificacionProductos where idClasificacion = 3 and idEliminado=1 and idProducto>3;";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["idProducto"].'\"  class=\"ui btnEditar icon black small button\"><i class=\"edit icon\"></i> Editar</button>';
            $btnEliminar = '<button id=\"'.$fila["idProducto"].'\"  class=\"ui btnEliminar icon negative small button\"><i class=\"trash icon\"></i> Eliminar</button>';
            $btnDetalles = '<button id=\"'.$fila["idProducto"].'\" nombre=\"'.$fila["nombre"].'\" class=\"ui icon blue small button\" onclick=\"detalles(this)\"><i class=\"list icon\"></i> Detalles</button>';

            $acciones = ', "Acciones": "'.$btnDetalles.''.$btnEditar.' '.$btnEliminar.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }

    public function cargarDatos() {

        $_query = "select * from clasificacionProductos where idProducto =".$this->objeto->getIdProducto();

        $resultado = $this->con->ejecutar($_query);

        $json = json_encode($resultado->fetch_assoc());

        return $json;
    }

    public function eliminar() {
        $_query = "update clasificacionProductos set idEliminado = 2 where idProducto = ".$this->objeto->getIdProducto();
        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function editar() {
        $_query = "update clasificacionProductos set nombre = '".$this->objeto->getNombre()."' where idProducto = ".$this->objeto->getIdProducto();
        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


    public function registrar() {
        $_query = "insert into clasificacionProductos values(null,'".$this->objeto->getNombre()."','".$this->objeto->getIdClasificacion()."',1)";
        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


    public function mostrarGranFormatoCmb() {

        $_query = "select * from clasificacionProductos where idEliminado=1 and idClasificacion=1";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= json_encode($fila).',';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }

    public function mostrarImpDCmb() {

        $_query = "select * from clasificacionProductos where idEliminado=1 and idClasificacion=2";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= json_encode($fila).',';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }


    public function mostrarProCmb() {

        $_query = "select * from clasificacionProductos where idEliminado=1 and idClasificacion=3";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= json_encode($fila).',';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }


    public function mostrarColoresGR() {

        $_query = " select * from colores where idClasificacion=1 and idEliminado=1 group by color order by idColor asc";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= json_encode($fila).',';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }

    public function mostrarAcabadosGR() {

        $_query = "select * from acabados where idClasificacion=1 and idEliminado=1 group by acabado order by idAcabado asc";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= json_encode($fila).',';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }

    public function mostrarUnidadMedidaGR() {

        $_query = "select * from medidas where idClasificacion=1 and idEliminado=1 group by medida order by idMedida asc";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= json_encode($fila).',';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }




    public function mostrarColoresI() {

        $_query = "select * from colores where idClasificacion=2 and idEliminado=1 group by color order by idColor asc";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= json_encode($fila).',';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }

    public function mostrarAcabadosI() {

        $_query = "select * from acabados where idClasificacion=2 and idEliminado=1 group by acabado order by idAcabado asc";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= json_encode($fila).',';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }

    public function mostrarUnidadMedidaI() {

        $_query = "select * from medidas where idClasificacion=2 and idEliminado=1 group by medida order by idMedida asc";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= json_encode($fila).',';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }




    public function mostrarColoresP() {

        $_query = "select * from colores where idClasificacion=3 and idEliminado=1 group by color order by idColor asc";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= json_encode($fila).',';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }

    public function mostrarAcabadosP() {

        $_query = "select * from acabados where idClasificacion=3 and idEliminado=1 group by acabado order by idAcabado asc";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= json_encode($fila).',';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }

    public function mostrarUnidadMedidaP() {

        $_query = "select * from medidas where idClasificacion=3 and idEliminado=1 group by medida order by idMedida asc";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= json_encode($fila).',';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }


    public function guardarProductoFinal(){
        $_query = "insert into productoFinal values(null,'".$this->objeto->getNombre()."', '".$this->objeto->getIdProducto()."')";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function guardarColor(){

        $corr= "(select max(idProductoFinal) as id from productoFinal)";

        $resultado1 = $this->con->ejecutar($corr);

        $fila = $resultado1->fetch_assoc();
        $idExp = $fila['id'];

        $_query = "insert into productosColores values(".$idExp.", '".$this->objeto->getColor()."')";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function guardarAcabado(){

        $corr= "(select max(idProductoFinal) as id from productoFinal)";

        $resultado1 = $this->con->ejecutar($corr);

        $fila = $resultado1->fetch_assoc();
        $idExp = $fila['id'];

        $_query = "insert into productosAcabados values(".$idExp.", '".$this->objeto->getAcabado()."')";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function guardarMedida(){

        $corr= "(select max(idProductoFinal) as id from productoFinal)";

        $resultado1 = $this->con->ejecutar($corr);

        $fila = $resultado1->fetch_assoc();
        $idExp = $fila['id'];

        $_query = "insert into productosMedidas values(".$idExp.", '".$this->objeto->getUnidadMedida()."')";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


    public function guardarColorNew() {
        $_query = "insert into colores values(null,'".$this->objeto->getColor()."','".$this->objeto->getIdClasificacion()."',1)";
        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


    public function guardarAcabadoNew() {
        $_query = "insert into acabados values(null,'".$this->objeto->getAcabado()."','".$this->objeto->getIdClasificacion()."',1)";
        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function guardarMedidaNew() {
        $_query = "insert into medidas values(null,'".$this->objeto->getUnidadMedida()."','".$this->objeto->getIdClasificacion()."',1)";
        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function eliminarAcabado() {

        $_query = "delete from productosAcabados where idProductoFinal=".$this->objeto->getIdProducto()." 
        and idAcabado=".$this->objeto->getAcabado();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    public function eliminarMedida() {

        $_query = "delete from productosMedidas where idProductoFinal=".$this->objeto->getIdProducto()." 
        and idMedida=".$this->objeto->getAcabado();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    public function eliminarColor() {

        $_query = "delete from productosColores where idProductoFinal=".$this->objeto->getIdProducto()." 
        and idColor=".$this->objeto->getColor();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }


    public function eliminarMedidaPaleta() {

        $_query = "update medidas set idEliminado=2 where idMedida=".$this->objeto->getUnidadMedida();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
        
    }

    public function eliminarAcabadoPaleta() {

        $_query = "update acabados set idEliminado=2 where idAcabado=".$this->objeto->getAcabado();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
        
    }

    public function eliminarColorPaleta() {

        $_query = "update colores set idEliminado=2 where idColor=".$this->objeto->getColor();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
        
    }

    public function agregarColorPro() {
        $_query = "insert into productosColores values('".$this->objeto->getIdProducto()."','".$this->objeto->getColor()."')";
        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function agregarMedidaPro() {
        $_query = "insert into productosMedidas values('".$this->objeto->getIdProducto()."','".$this->objeto->getUnidadMedida()."')";
        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function agregarAcabadoPro() {
        $_query = "insert into productosAcabados values('".$this->objeto->getIdProducto()."','".$this->objeto->getAcabado()."')";
        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


    public function mostrarGranFormatoInventario() {
        $_query = "select * from clasificacionProductos where idClasificacion = 1 and idEliminado=1 and idProducto>1";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

           $btnDetalles = '<button id=\"'.$fila["idProducto"].'\" nombre=\"'.$fila["nombre"].'\"  class=\"ui icon blue small button\" onclick=\"detalles(this)\"><i class=\"list icon\"></i> Detalles</button>';

            $acciones = ', "Acciones": "'.$btnDetalles.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }




}
?>