<?php

class ProductosController extends ControladorBase {

    public static function granFormato() {
        $daoP = new DaoProductos();
        $colores = $daoP->mostrarColoresGR();
        $acabados = $daoP->mostrarAcabadosGR();
        $medidas = $daoP->mostrarUnidadMedidaGR();
        
        self::loadMain();
        
        require_once './app/view/TiposProducto/granFormato.php';
    }

    public static function impresion() {

        $daoP = new DaoProductos();
        $colores = $daoP->mostrarColoresI();
        $acabados = $daoP->mostrarAcabadosI();
        $medidas = $daoP->mostrarUnidadMedidaI();
        self::loadMain();
        
        require_once './app/view/TiposProducto/impresionDigital.php';
    }

    public static function promocionales() {

        $daoP = new DaoProductos();
        $colores = $daoP->mostrarColoresP();
        $acabados = $daoP->mostrarAcabadosP();
        $medidas = $daoP->mostrarUnidadMedidaP();
        self::loadMain();
        
        require_once './app/view/TiposProducto/promocionales.php';
    }


    public function mostrarGranFormato() {
        $dao = new DaoProductos();

        echo $dao->mostrarGranFormato();
    }

    public function mostrarImpresion() {
        $dao = new DaoProductos();

        echo $dao->mostrarImpresion();
    }

    public function mostrarPromocionales() {
        $dao = new DaoProductos();

        echo $dao->mostrarPromocionales();
    }

    public function cargarDatos() {
        $id = $_REQUEST["id"];

        $dao = new DaoProductos();

        $dao->objeto->setIdProducto($id);

        echo $dao->cargarDatos();
    }

    public function eliminar() {
        $datos = $_REQUEST["id"];

        $dao = new DaoProductos();

        $dao->objeto->setIdProducto($datos);

        echo $dao->eliminar();
    }

    public function editar() {
        $datos = $_REQUEST["datos"];

        $datos = json_decode($datos);

        $dao = new DaoProductos();

        $dao->objeto->setNombre($datos->nombre);
       // $dao->objeto->setUnidadMedida($datos->medida);
        $dao->objeto->setIdProducto($datos->idDetalle);

        echo $dao->editar();
    }

    public function registrarG() {
        $datos = $_REQUEST["datos"];

        $datos = json_decode($datos);

        $dao = new DaoProductos();

        $dao->objeto->setNombre($datos->nombre);
        $dao->objeto->setIdClasificacion(1);
       // $dao->objeto->setUnidadMedida($datos->medida);

        echo $dao->registrar();
    }


    public function registrarI() {
        $datos = $_REQUEST["datos"];

        $datos = json_decode($datos);

        $dao = new DaoProductos();

        $dao->objeto->setNombre($datos->nombre);
        $dao->objeto->setIdClasificacion(2);
      //  $dao->objeto->setUnidadMedida($datos->medida);

        echo $dao->registrar();
    }

    public function registrarP() {
        $datos = $_REQUEST["datos"];

        $datos = json_decode($datos);

        $dao = new DaoProductos();

        $dao->objeto->setNombre($datos->nombre);
        $dao->objeto->setIdClasificacion(3);
      //  $dao->objeto->setUnidadMedida($datos->medida);
        echo $dao->registrar();
    }


    public function nuevoNombre() {
        $id = $_REQUEST["idProducto"];
        $newN = $_REQUEST["newN"];
    

        $dao = new DaoProductos();

        $dao->objeto->setNombre($newN);
        $dao->objeto->setIdProducto($id);
     
        echo $dao->cambiarNombre();
    }

    public function nuevoPrecio() {
        $id = $_REQUEST["idProducto"];
        $newP = $_REQUEST["newN"];
    

        $dao = new DaoProductos();

        $dao->objeto->setPrecio($newP);
        $dao->objeto->setIdProducto($id);
     
        echo $dao->cambiarPrecio();
    }


    public function guardarNuevoProducto(){

        $detalles = json_decode($_REQUEST["detallesPro"]);
        $nombreP = $_REQUEST["nombreP"];
      //  $precio = $_REQUEST["precioU"];

        $contador = 0;

        $dao = new DaoProductos();

        foreach($detalles as $detalle) {
            $dao->objeto->setNombre($detalle->productoFinal);
            $dao->objeto->setIdProducto($nombreP);
          

            if($dao->guardarProductoFinal()) {
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


    public function guardarPrecio(){

        $detalles = json_decode($_REQUEST["detallesPro"]);
      //  $nombreP = $_REQUEST["nombreP"];
      //  $precio = $_REQUEST["precioU"];

        $contador = 0;

        $dao = new DaoProductos();

        foreach($detalles as $detalle) {
            $dao->objeto->setPrecio($detalle->precioUnitario);
          //  $dao->objeto->setIdProducto($nombreP);
          

            if($dao->guardarPrecio()) {
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




    public function guardarAcabado(){

        $detalles = json_decode($_REQUEST["detallesPro"]);

        $contador = 0;

        $dao = new DaoProductos();

        foreach($detalles as $detalle) {
            $dao->objeto->setAcabado($detalle->acabado);
            $dao->objeto->setColor($detalle->colorN);
            $dao->objeto->setUnidadMedida($detalle->unidad);

            if($dao->guardarDetalleProducto()) {
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

   


    public function guardarInventario(){

        
        $detalles = json_decode($_REQUEST["detallesPro"]);

        $contador = 0;

        $dao = new DaoProductos();

        foreach($detalles as $detalle) {
            $dao->objeto->setAcabado($detalle->acabado);
            $dao->objeto->setColor($detalle->colorN);
            $dao->objeto->setPrecio($detalle->precioSugerido);
           

            if($dao->guardarInventario()) {
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
    

    public function guardarColorNew() {

        $color = $_REQUEST["color"];
        $idCla = $_REQUEST["idClas"];

        $dao = new DaoProductos();

        $dao->objeto->setColor($color);
        $dao->objeto->setIdClasificacion($idCla);
     

        echo $dao->guardarColorNew();
    }

    public function guardarAcabadoNew() {

        $acabado = $_REQUEST["acabado"];
        $idCla = $_REQUEST["idClas"];

        $dao = new DaoProductos();

        $dao->objeto->setAcabado($acabado);
        $dao->objeto->setIdClasificacion($idCla);
     

        echo $dao->guardarAcabadoNew();
    }


    public function guardarMedidaNew() {

        $medida = $_REQUEST["medida"];
        $idCla = $_REQUEST["idClas"];

        $dao = new DaoProductos();

        $dao->objeto->setUnidadMedida($medida);
        $dao->objeto->setIdClasificacion($idCla);
     

        echo $dao->guardarMedidaNew();
    }

    public function eliminarAcabado(){
        $dao = new DaoProductos();

        $dao->objeto->setIdProducto($_REQUEST["idProducto"]);
        $dao->objeto->setAcabado($_REQUEST["idAcabado"]);


        echo $dao->eliminarAcabado();
    }

    public function eliminarMedida(){
        $dao = new DaoProductos();

        $dao->objeto->setIdProducto($_REQUEST["idProducto"]);
        $dao->objeto->setAcabado($_REQUEST["idMedida"]);


        echo $dao->eliminarMedida();
    }


    public function eliminarColor(){
        $dao = new DaoProductos();

        $dao->objeto->setIdProducto($_REQUEST["idProducto"]);
        $dao->objeto->setColor($_REQUEST["idColor"]);


        echo $dao->eliminarColor();
    }


    public function eliminarMedidaPaleta(){
        $dao = new DaoProductos();

        $dao->objeto->setUnidadMedida($_REQUEST["idMedida"]);


        echo $dao->eliminarMedidaPaleta();
    }

    public function eliminarAcabadoPaleta(){
        $dao = new DaoProductos();

        $dao->objeto->setAcabado($_REQUEST["idAcabado"]);


        echo $dao->eliminarAcabadoPaleta();
    }

    public function eliminarColorPaleta(){
        $dao = new DaoProductos();

        $dao->objeto->setColor($_REQUEST["idColor"]);


        echo $dao->eliminarColorPaleta();
    }


    public function agregarNuevoDetallePro(){
        $dao = new DaoProductos();

        $dao->objeto->setIdProducto($_REQUEST["idProducto"]);
        $dao->objeto->setColor($_REQUEST["idColor"]);
        $dao->objeto->setAcabado($_REQUEST["idAcabado"]);
        $dao->objeto->setPrecio($_REQUEST["precio"]);
        $dao->objeto->setUnidadMedida($_REQUEST["idMedida"]);

        echo $dao->agregarNuevoDetallePro();
        echo $dao->guardarInventarioPro();
    }

    public function eliminarProducto(){
        $dao = new DaoProductos();

        $dao->objeto->setAcabado($_REQUEST["idAcabado"]);
        $dao->objeto->setIdProducto($_REQUEST["idProducto"]);
        $dao->objeto->setColor($_REQUEST["idColor"]);

        echo $dao->eliminarProducto();
        echo $dao->eliminarProductoInventario();
    }


    

}


?>