<?php

class FacturacionController extends ControladorBase {

    public static function granFormato() {
      
        
        self::loadMain();
        
        require_once './app/view/Facturacion/granFormato.php';
    }


    public static function baseCompras() {
      
        
        self::loadMain();
        
        require_once './app/view/Facturacion/baseCompras.php';
    }

    public static function estadosDeCuenta() {
      
        
        self::loadMain();
        
        require_once './app/view/Facturacion/estadoCuenta.php';
    }

    public static function baseComprasAd() {
      
        
        self::loadMain();
        
        require_once './app/view/Facturacion/baseComprasAd.php';
    }

    public static function baseComprasTodas() {
      
        
        self::loadMain();
        
        require_once './app/view/Facturacion/baseComprasTodas.php';
    }


    public static function libroConsumidor() {
      
        
        self::loadMain();
        
        require_once './app/view/Facturacion/libroConsumidor.php';
    }

    public static function libroVentasContri() {
      
        
        self::loadMain();
        
        require_once './app/view/Facturacion/libroVentasContri.php';
    }

    public static function reporteVentas() {
      
        
        self::loadMain();
        
        require_once './app/view/Facturacion/reporteVentas.php';
    }

    public static function cuentasPorCobrar() {
      
        
        self::loadMain();
        
        require_once './app/view/Facturacion/cuentasPorCobrar.php';
    }


    public static function notaCredito() {
      
        $dao = new DaoClientes();
        $clientes = $dao->mostrarClientesCmb();
        self::loadMain();
        
        require_once './app/view/Facturacion/notaCredito.php';
    }

    public static function impresion() {

      
        self::loadMain();
        
        require_once './app/view/Facturacion/impresionDigital.php';
    }

    public static function promocionales() {

    
        self::loadMain();
        
        require_once './app/view/Facturacion/promocionales.php';
    }

    public function mostrarFacturaGR() {
        $dao = new DaoOrdenTrabajo();

        echo $dao->mostrarFacturaGR();
    }

    public function mostrarFacturaIP() {
        $dao = new DaoOrdenTrabajo();

        echo $dao->mostrarFacturaIP();
    }

    public function mostrarFacturaP() {
        $dao = new DaoOrdenTrabajo();

        echo $dao->mostrarFacturaP();
    }




    public function guardarNota(){
        $dao = new DaoNotaCredito();

        $dao->objeto->setIdCliente($_REQUEST["cliente"]);
        $dao->objeto->setFecha($_REQUEST["fecha"]);
        $dao->objeto->setNCFF($_REQUEST["nuCorre"]);
        $dao->objeto->setNRE($_REQUEST["registro"]);
        $dao->objeto->setVentaCuenta($_REQUEST["venta"]);
        $dao->objeto->setCondAn($_REQUEST["condAn"]);
        $dao->objeto->setNNotaAn($_REQUEST["notaAnterior"]);
        $dao->objeto->setFechaEmAn($_REQUEST["fechaNotaAn"]);
       
        

        echo $dao->guardarNota();
    }


    
    public function guardarDetalleNota(){
        $detalles = json_decode($_REQUEST["detalles"]);

        $contador = 0;

        $dao = new DaoNotaCredito();

        foreach($detalles as $detalle) {
            $dao->objeto->setCantidad($detalle->cantidadRe);
            $dao->objeto->setDescripciones($detalle->descripcionRe);
            $dao->objeto->setPrecio($detalle->precioUnitarioRe);
            $dao->objeto->setVentasNo($detalle->ventasNoSujetas);
            $dao->objeto->setVentasEx($detalle->ventasExentas);
            $dao->objeto->setventasGra($detalle->ventasGravadas);
   

            if($dao->guardarDetalleNota()) {
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

    public function imprimirNota()
    {
        $dao = new DaoNotaCredito();
        
        
        require_once './app/reportes/notaCredito.php';

        $reporte = new Reporte();
    
        $resultado = $dao->imprimirEncabezadoNota();
        $resultado1 = $dao->imprimirDetalleNota();
        $ventasNo = $dao->ventasNoSujetas();
        $ventasGr = $dao->ventasGravadas();
        $ventasGrGR = $dao->ventasGravadasGR();
        $ventasEx = $dao->ventasExentas();
        $tipoCliente = $dao->tipoCliente();
        $descGR = $dao->descGR();
     
        
        $reporte->notaCredito($resultado,$resultado1,$ventasNo,$ventasGr,$ventasGrGR,$ventasEx,$tipoCliente,$descGR);
    }

    public function facturaConsumidorImp(){
        $dao = new DaoNotaCredito();

        $dao->objeto->setIdOrden($_REQUEST["idOT"]);
        $dao->objeto->setNRE($_REQUEST["nDoc"]);
        
        echo $dao->facturaConsumidorImp();
        echo $dao->fechaCobroIP();
    }

    public function CFFImp(){
        $dao = new DaoNotaCredito();

        $dao->objeto->setIdOrden($_REQUEST["idOT"]);
        $dao->objeto->setNRE($_REQUEST["nDoc"]);
        
        echo $dao->CFFImp();
        echo $dao->fechaCobroIP();
    }

    public function notaCreImp(){
        $dao = new DaoNotaCredito();

        $dao->objeto->setIdOrden($_REQUEST["idOT"]);
        $dao->objeto->setNRE($_REQUEST["nDoc"]);
        
        echo $dao->notaCreImp();
        echo $dao->fechaCobroIP();
    }

    public function facturaConsumidorP(){
        $dao = new DaoNotaCredito();

        $dao->objeto->setIdOrden($_REQUEST["idOT"]);
        $dao->objeto->setNRE($_REQUEST["nDoc"]);
        
        echo $dao->facturaConsumidorP();
        echo $dao->fechaCobroP();
    }

    public function CFFP(){
        $dao = new DaoNotaCredito();

        $dao->objeto->setIdOrden($_REQUEST["idOT"]);
        $dao->objeto->setNRE($_REQUEST["nDoc"]);
        
        echo $dao->CFFP();
        echo $dao->fechaCobroP();
    }

    public function notaCreP(){
        $dao = new DaoNotaCredito();

        $dao->objeto->setIdOrden($_REQUEST["idOT"]);
        $dao->objeto->setNRE($_REQUEST["nDoc"]);
        
        echo $dao->notaCreP();
        echo $dao->fechaCobroP();
    }

    public function facturaConsumidorGR(){
        $dao = new DaoNotaCredito();

        $dao->objeto->setIdOrden($_REQUEST["idOT"]);
        $dao->objeto->setNRE($_REQUEST["nDoc"]);
        
        echo $dao->facturaConsumidorGR();
        echo $dao->fechaCobroGR();
    }

    public function CFFGR(){
        $dao = new DaoNotaCredito();

        $dao->objeto->setIdOrden($_REQUEST["idOT"]);
        $dao->objeto->setNRE($_REQUEST["nDoc"]);
        
        echo $dao->CFFGR();
        echo $dao->fechaCobroGR();
    }

    public function notaCreGR(){
        $dao = new DaoNotaCredito();

        $dao->objeto->setIdOrden($_REQUEST["idOT"]);
        $dao->objeto->setNRE($_REQUEST["nDoc"]);
        
        echo $dao->notaCreGR();
        echo $dao->fechaCobroGR();
    }

    public function otroGR(){
        $dao = new DaoNotaCredito();

        $dao->objeto->setIdOrden($_REQUEST["idOT"]);
        $dao->objeto->setNRE($_REQUEST["nDoc"]);
        
        echo $dao->otroGR();
        echo $dao->fechaCobroGR();
    }

    public function otroIP(){
        $dao = new DaoNotaCredito();

        $dao->objeto->setIdOrden($_REQUEST["idOT"]);
        $dao->objeto->setNRE($_REQUEST["nDoc"]);
        
        echo $dao->otroIP();
        echo $dao->fechaCobroIP();
    }

    public function otroP(){
        $dao = new DaoNotaCredito();

        $dao->objeto->setIdOrden($_REQUEST["idOT"]);
        $dao->objeto->setNRE($_REQUEST["nDoc"]);
        
        echo $dao->otroP();
        echo $dao->fechaCobroP();
    }


}
?>