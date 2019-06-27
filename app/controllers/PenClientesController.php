<?php

class PenClientesController extends ControladorBase {
    public static function granFormatoPendiente() {

       

        self::loadMain();
        
        require_once './app/view/PendientesCliente/granFormato.php';
    }

   


    public static function promocionalesPendiente() {
   

        self::loadMain();
        
        require_once './app/view/PendientesCliente/promocionales.php';
    }

    public static function impresionPendiente() {
       

        self::loadMain();
        
        require_once './app/view/PendientesCliente/impresionDigital.php';
    }


    public function mostrarPenClientesGR() {
        $dao = new DaoOrdenTrabajo();

        echo $dao->mostrarPenClientesGR();
    }

    public function mostrarPenClientesIP() {
        $dao = new DaoOrdenTrabajo();

        echo $dao->mostrarPenClientesIP();
    }

    public function mostrarPenClientesP() {
        $dao = new DaoOrdenTrabajo();

        echo $dao->mostrarPenClientesP();
    }
}
?>