<?php

class OTController extends ControladorBase {

    public static function granFormato() {

        $dao = new DaoClientes();
        $clientes = $dao->mostrarClientesCmb();

        $daoP = new DaoProductos();
        $productos = $daoP->mostrarGranFormatoCmb();

        self::loadMain();
        
        require_once './app/view/OT/granFormato.php';
    }

   


    public static function promocionales() {
        $dao = new DaoClientes();
        $clientes = $dao->mostrarClientesCmb();

        $daoP = new DaoProductos();
        $productos = $daoP->mostrarProCmb();

        self::loadMain();
        
        require_once './app/view/OT/promocionales.php';
    }

    public static function impresion() {
        $dao = new DaoClientes();
        $clientes = $dao->mostrarClientesCmb();

        $daoP = new DaoProductos();
        $productos = $daoP->mostrarImpDCmb();

        self::loadMain();
        
        require_once './app/view/OT/impresionDigital.php';
    }


    public static function granFormatoEliminadas() {

        self::loadMain();
        
        require_once './app/view/Eliminadas/granFormato.php';
    }

   


    public static function promocionalesEliminadas() {
       
        self::loadMain();
        
        require_once './app/view/Eliminadas/promocionales.php';
    }

    public static function impresionEliminadas() {
        

        self::loadMain();
        
        require_once './app/view/Eliminadas/impresionDigital.php';
    }


    

    public function guardarOTGR(){
        $dao = new DaoOrdenTrabajo();

        $dao->objeto->setCorrelativo($_REQUEST["correlativo"]);
        $dao->objeto->setFechaOT($_REQUEST["fechaOT"]);
        $dao->objeto->setIdResponsable($_REQUEST["idUser"]);
        $dao->objeto->setIdCliente($_REQUEST["cliente"]);
        $dao->objeto->setFechaEn($_REQUEST["fechaEOT"]);
       


        echo $dao->guardarOTGR();
    }


    public function guardarDetallesOT(){
        $detalles = json_decode($_REQUEST["lista"]);

        $contador = 0;

        $dao = new DaoOrdenTrabajo();

        foreach($detalles as $detalle) {
            $dao->objeto->setIdProductoFinal($detalle->idProducto);
            $dao->objeto->setColor($detalle->idColor);
            $dao->objeto->setAcabado($detalle->idAcabado);
            $dao->objeto->setCantidad($detalle->cantidadRe);
            $dao->objeto->setAltura($detalle->alturaRe);
            $dao->objeto->setBase($detalle->baseRe);
            $dao->objeto->setCuadrosImp($detalle->cuadrosImpr);
            $dao->objeto->setUbicacion($detalle->ubicRe);
            $dao->objeto->setAncho($detalle->anchoRe);
            $dao->objeto->setLongitud($detalle->longitudRe);
            $dao->objeto->setAnchoMat($detalle->anchoMatRe);
            $dao->objeto->setCopias($detalle->copiasRe);
            $dao->objeto->setMts2($detalle->mtsDes);
            $dao->objeto->setDesperdicio($detalle->despRe);
            $dao->objeto->setDescripciones($detalle->descriRe);
            $dao->objeto->setPrecio($detalle->precioRe);

            if($dao->guardarDetalleOTGR()) {
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

    public function guardarOTIP(){
        $dao = new DaoOrdenTrabajo();

        $dao->objeto->setCorrelativo($_REQUEST["correlativo"]);
        $dao->objeto->setFechaOT($_REQUEST["fechaOT"]);
        $dao->objeto->setIdResponsable($_REQUEST["idUser"]);
        $dao->objeto->setIdCliente($_REQUEST["cliente"]);
        $dao->objeto->setFechaEn($_REQUEST["fechaEOT"]);


        echo $dao->guardarOTIP();
    }


    public function guardarDetallesOTIP(){
        $detalles = json_decode($_REQUEST["lista"]);

        $contador = 0;

        $dao = new DaoOrdenTrabajo();

        foreach($detalles as $detalle) {
            $dao->objeto->setIdProductoFinal($detalle->idProducto);
            $dao->objeto->setColor($detalle->idColor);
            $dao->objeto->setAcabado($detalle->idAcabado);
            $dao->objeto->setCantidad($detalle->cantidadRe);
            $dao->objeto->setTipo($detalle->tipoRe);
            $dao->objeto->setDescripciones($detalle->descriRe);
            $dao->objeto->setPrecio($detalle->precioRe);

            if($dao->guardarDetalleOTIP()) {
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

    public function guardarOTP(){
        $dao = new DaoOrdenTrabajo();

        $dao->objeto->setCorrelativo($_REQUEST["correlativo"]);
        $dao->objeto->setFechaOT($_REQUEST["fechaOT"]);
        $dao->objeto->setIdResponsable($_REQUEST["idUser"]);
        $dao->objeto->setIdCliente($_REQUEST["cliente"]);
        $dao->objeto->setFechaEn($_REQUEST["fechaEOT"]);


        echo $dao->guardarOTP();
    }


    public function guardarDetallesOTP(){
        $detalles = json_decode($_REQUEST["lista"]);

        $contador = 0;

        $dao = new DaoOrdenTrabajo();

        foreach($detalles as $detalle) {
            $dao->objeto->setIdProductoFinal($detalle->idProducto);
            $dao->objeto->setColor($detalle->idColor);
            $dao->objeto->setAcabado($detalle->idAcabado);
            $dao->objeto->setCantidad($detalle->cantidadRe);
            $dao->objeto->setTipo($detalle->tipoRe);
            $dao->objeto->setDescripciones($detalle->descriRe);
            $dao->objeto->setPrecio($detalle->precioRe);

            if($dao->guardarDetalleOTP()) {
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

    public function finalizarOrdenGR(){
        $dao = new DaoOrdenTrabajo();

        $dao->objeto->setIdOrden($_REQUEST["id"]);
        


        echo $dao->finalizarOrdenGR();
    }


    public function finalizarOrdenIP(){
        $dao = new DaoOrdenTrabajo();

        $dao->objeto->setIdOrden($_REQUEST["id"]);
        


        echo $dao->finalizarOrdenIP();
    }

    public function finalizarOrdenP(){
        $dao = new DaoOrdenTrabajo();

        $dao->objeto->setIdOrden($_REQUEST["id"]);
        


        echo $dao->finalizarOrdenP();
    }


    public function aprobarOrdenGR(){
        $dao = new DaoOrdenTrabajo();

        $dao->objeto->setIdOrden($_REQUEST["id"]);
        


        echo $dao->aprobarOrdenGR();
    }


    public function aprobarOrdenIP(){
        $dao = new DaoOrdenTrabajo();

        $dao->objeto->setIdOrden($_REQUEST["id"]);
        


        echo $dao->aprobarOrdenIP();
    }

    public function aprobarOrdenP(){
        $dao = new DaoOrdenTrabajo();

        $dao->objeto->setIdOrden($_REQUEST["id"]);
        


        echo $dao->aprobarOrdenP();
    }


    


    public function eliminarOrdenGR(){
        $dao = new DaoOrdenTrabajo();

        $dao->objeto->setIdOrden($_REQUEST["id"]);
        $dao->objeto->setDescripciones($_REQUEST["descripciones"]);


        echo $dao->eliminarOrdenGR();
    }

    public function eliminarOrdenIP(){
        $dao = new DaoOrdenTrabajo();

        $dao->objeto->setIdOrden($_REQUEST["id"]);
        $dao->objeto->setDescripciones($_REQUEST["descripciones"]);


        echo $dao->eliminarOrdenIP();
    }

    public function eliminarOrdenP(){
        $dao = new DaoOrdenTrabajo();

        $dao->objeto->setIdOrden($_REQUEST["id"]);
        $dao->objeto->setDescripciones($_REQUEST["descripciones"]);


        echo $dao->eliminarOrdenP();
    }


    public function mostrarEliminadaGR() {
        $dao = new DaoOrdenTrabajo();

        echo $dao->mostrarEliminadaGR();
    }

    public function mostrarEliminadaIP() {
        $dao = new DaoOrdenTrabajo();

        echo $dao->mostrarEliminadaIP();
    }

    public function mostrarEliminadaP() {
        $dao = new DaoOrdenTrabajo();

        echo $dao->mostrarEliminadaP();
    }


    public function ImprimirFacturaGR()
    {
        $dao = new DaoOrdenTrabajo();
        
        
        require_once './app/reportes/imprimirFactura.php';

        $reporte = new Reporte();
    
        $resultado = $dao->imprimirEncabezadoOTGR();
        $resultado1 = $dao->imprimirDetalleOTGR();
        
        $reporte->imprimirFactura($resultado,$resultado1);
    }

  

    public function imprimirFacturaIPP()
    {
        $dao = new DaoOrdenTrabajo();
        
        
        require_once './app/reportes/imprimirFacturaIPP.php';

        $reporte = new Reporte();
    
        $resultado = $dao->imprimirEncabezadoOTIP();
        $resultado1 = $dao->imprimirDetalleOTIP();
        
        $reporte->imprimirFacturaIPP($resultado,$resultado1);
    }


    public function imprimirFacturaP()
    {
        $dao = new DaoOrdenTrabajo();
        
        
        require_once './app/reportes/imprimirFacturaP.php';

        $reporte = new Reporte();
    
        $resultado = $dao->imprimirEncabezadoOTP();
        $resultado1 = $dao->imprimirDetalleOTP();
        
        $reporte->imprimirFacturaP($resultado,$resultado1);
    }


   
}


?>