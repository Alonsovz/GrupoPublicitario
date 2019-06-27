<?php

class ProduccionController extends ControladorBase {

    public static function granFormato() {
      
        
        self::loadMain();
        
        require_once './app/view/EnProduccion/granFormato.php';
    }

    public static function impresion() {

      
        self::loadMain();
        
        require_once './app/view/EnProduccion/impresionDigital.php';
    }

    public static function promocionales() {

    
        self::loadMain();
        
        require_once './app/view/EnProduccion/promocionales.php';
    }

    public function mostrarProduccionGR() {
        $dao = new DaoOrdenTrabajo();

        echo $dao->mostrarProduccionGR();
    }

    public function mostrarProduccionIP() {
        $dao = new DaoOrdenTrabajo();

        echo $dao->mostrarProduccionIP();
    }

    public function mostrarProduccionP() {
        $dao = new DaoOrdenTrabajo();

        echo $dao->mostrarProduccionP();
    }

    public function cargarDatosGR() {
        $id = $_REQUEST["id"];

        $dao = new DaoOrdenTrabajo();

        $dao->objeto->setIdOrden($id);

        echo $dao->cargarDatosGR();
    }

    public function cargarDatosIP() {
        $id = $_REQUEST["id"];

        $dao = new DaoOrdenTrabajo();

        $dao->objeto->setIdOrden($id);

        echo $dao->cargarDatosIP();
    }

    public function cargarDatosP() {
        $id = $_REQUEST["id"];

        $dao = new DaoOrdenTrabajo();

        $dao->objeto->setIdOrden($id);

        echo $dao->cargarDatosP();
    }
}

?>