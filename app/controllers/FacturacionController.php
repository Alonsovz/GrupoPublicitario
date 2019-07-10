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

    public static function baseComprasAd() {
      
        
        self::loadMain();
        
        require_once './app/view/Facturacion/baseComprasAd.php';
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
        $ventasEx = $dao->ventasExentas();
     
        
        $reporte->notaCredito($resultado,$resultado1,$ventasNo,$ventasGr,$ventasEx);
    }


}
?>