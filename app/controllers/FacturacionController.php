<?php

class FacturacionController extends ControladorBase {

    public static function granFormato() {
      
        
        self::loadMain();
        
        require_once './app/view/Facturacion/granFormato.php';
    }


    public static function notaCredito() {
      
        
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

}
?>