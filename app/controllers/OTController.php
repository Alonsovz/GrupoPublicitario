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
        $dao->objeto->setIdClasificacion($_REQUEST["clasificacionCmb"]);
        $dao->objeto->setIdProductoFinal($_REQUEST["proFinalCmb"]);
        $dao->objeto->setColor($_REQUEST["colorCmb"]);
        $dao->objeto->setAcabado($_REQUEST["acabadoCmb"]);
        $dao->objeto->setCantidad($_REQUEST["cantidad"]);
        $dao->objeto->setAlto($_REQUEST["alto"]);
        $dao->objeto->setAncho($_REQUEST["ancho"]);
        $dao->objeto->setCuadrosImp($_REQUEST["cuadrosImp"]);
        $dao->objeto->setUbicacion($_REQUEST["ubicacion"]);
        $dao->objeto->setDescripciones($_REQUEST["descripciones"]);
        $dao->objeto->setPrecio($_REQUEST["precio"]);


        echo $dao->guardarOTGR();
    }

    public function guardarOTIP(){
        $dao = new DaoOrdenTrabajo();

        $dao->objeto->setCorrelativo($_REQUEST["correlativo"]);
        $dao->objeto->setFechaOT($_REQUEST["fechaOT"]);
        $dao->objeto->setIdResponsable($_REQUEST["idUser"]);
        $dao->objeto->setIdCliente($_REQUEST["cliente"]);
        $dao->objeto->setFechaEn($_REQUEST["fechaEOT"]);
        $dao->objeto->setIdClasificacion($_REQUEST["clasificacionCmb"]);
        $dao->objeto->setIdProductoFinal($_REQUEST["proFinalCmb"]);
        $dao->objeto->setColor($_REQUEST["colorCmb"]);
        $dao->objeto->setAcabado($_REQUEST["acabadoCmb"]);
        $dao->objeto->setCantidad($_REQUEST["cantidad"]);
        $dao->objeto->setTipo($_REQUEST["tipo"]);
       
        $dao->objeto->setDescripciones($_REQUEST["descripciones"]);
        $dao->objeto->setPrecio($_REQUEST["precio"]);


        echo $dao->guardarOTIP();
    }

    public function guardarOTP(){
        $dao = new DaoOrdenTrabajo();

        $dao->objeto->setCorrelativo($_REQUEST["correlativo"]);
        $dao->objeto->setFechaOT($_REQUEST["fechaOT"]);
        $dao->objeto->setIdResponsable($_REQUEST["idUser"]);
        $dao->objeto->setIdCliente($_REQUEST["cliente"]);
        $dao->objeto->setFechaEn($_REQUEST["fechaEOT"]);
        $dao->objeto->setIdClasificacion($_REQUEST["clasificacionCmb"]);
        $dao->objeto->setIdProductoFinal($_REQUEST["proFinalCmb"]);
        $dao->objeto->setColor($_REQUEST["colorCmb"]);
        $dao->objeto->setAcabado($_REQUEST["acabadoCmb"]);
        $dao->objeto->setCantidad($_REQUEST["cantidad"]);
        $dao->objeto->setTipo($_REQUEST["tipo"]);
       
        $dao->objeto->setDescripciones($_REQUEST["descripciones"]);
        $dao->objeto->setPrecio($_REQUEST["precio"]);


        echo $dao->guardarOTP();
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
    
        $resultado = $dao->imprimirFacturaGR();
        
        $reporte->imprimirFactura($resultado);
    }

    public function ImprimirFacturaIP()
    {
        $dao = new DaoOrdenTrabajo();
        
        
        require_once './app/reportes/imprimirFacturaIPP.php';

        $reporte = new Reporte();
    
        $resultado = $dao->imprimirFacturaIP();
        
        $reporte->imprimirFactura($resultado);
    }

    public function ImprimirFacturaP()
    {
        $dao = new DaoOrdenTrabajo();
        
        
        require_once './app/reportes/imprimirFacturaIPP.php';

        $reporte = new Reporte();
    
        $resultado = $dao->imprimirFacturaP();
        
        $reporte->imprimirFactura($resultado);
    }


   
}


?>