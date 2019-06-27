<?php

class InventarioController extends ControladorBase {


    public static function granFormato() {

        

        self::loadMain();
        
        require_once './app/view/Inventario/granFormato.php';
    }

   


    public static function promocionales() {
       

        self::loadMain();
        
        require_once './app/view/Inventario/promocionales.php';
    }

    public static function impresion() {
     

        self::loadMain();
        
        require_once './app/view/Inventario/impresionDigital.php';
    }

    public function mostrarGranFormato() {
        $dao = new DaoProductos();

        echo $dao->mostrarGranFormatoInventario();
    }

}

?>