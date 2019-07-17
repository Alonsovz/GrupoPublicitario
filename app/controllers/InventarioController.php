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

    public function mostrarImpresion() {
        $dao = new DaoProductos();

        echo $dao->mostrarImpresionInventario();
    }

    public function mostrarPromocional() {
        $dao = new DaoProductos();

        echo $dao->mostrarPromocionalInventario();
    }


    public function definirExistencia(){
        $dao = new DaoProductos();

        $dao->objeto->setIdProducto($_REQUEST["id"]);
        $dao->objeto->setColor($_REQUEST["idColor"]);
        $dao->objeto->setAcabado($_REQUEST["idAcabado"]);
        $dao->objeto->setExistencia($_REQUEST["exis"]);
        
        echo $dao->definirExistencia();
    }

    public function definirPrecio(){
        $dao = new DaoProductos();

        $dao->objeto->setIdProducto($_REQUEST["id"]);
        $dao->objeto->setColor($_REQUEST["idColor"]);
        $dao->objeto->setAcabado($_REQUEST["idAcabado"]);
        $dao->objeto->setPrecio($_REQUEST["precio"]);
        
        echo $dao->definirPrecio();
    }

    public function definirPrecioDes(){
        $dao = new DaoProductos();

        $dao->objeto->setIdProducto($_REQUEST["id"]);
        $dao->objeto->setColor($_REQUEST["idColor"]);
        $dao->objeto->setAcabado($_REQUEST["idAcabado"]);
        $dao->objeto->setPrecio($_REQUEST["precio"]);
        
        echo $dao->definirPrecioDes();
    }

    public function definirPrecioSug(){
        $dao = new DaoProductos();

        $dao->objeto->setIdProducto($_REQUEST["id"]);
        $dao->objeto->setColor($_REQUEST["idColor"]);
        $dao->objeto->setAcabado($_REQUEST["idAcabado"]);
        $dao->objeto->setPrecio($_REQUEST["precio"]);
        
        echo $dao->definirPrecioSug();
    }

    public function restarProductoIP(){
        $dao = new DaoProductos();

        $dao->objeto->setIdProducto($_REQUEST["idPr"]);
        $dao->objeto->setColor($_REQUEST["idColor"]);
        $dao->objeto->setAcabado($_REQUEST["idAcabado"]);
        $dao->objeto->setExistencia($_REQUEST["cantidad"]);
        $dao->objeto->setIdOrden($_REQUEST["idDetalle"]);
        
        echo $dao->restarProducto();
        echo $dao->cambiarEstadoIP();
    }

    public function restarProductoP(){
        $dao = new DaoProductos();

        $dao->objeto->setIdProducto($_REQUEST["idPr"]);
        $dao->objeto->setColor($_REQUEST["idColor"]);
        $dao->objeto->setAcabado($_REQUEST["idAcabado"]);
        $dao->objeto->setExistencia($_REQUEST["cantidad"]);
        $dao->objeto->setIdOrden($_REQUEST["idDetalle"]);
        
        echo $dao->restarProducto();
        echo $dao->cambiarEstadoP();
    }

    public function restarProductoGR(){
        $dao = new DaoProductos();

        $dao->objeto->setIdProducto($_REQUEST["idPr"]);
        $dao->objeto->setColor($_REQUEST["idColor"]);
        $dao->objeto->setAcabado($_REQUEST["idAcabado"]);
        $dao->objeto->setExistencia($_REQUEST["cantidad"]);
        $dao->objeto->setIdOrden($_REQUEST["idDetalle"]);
        
        echo $dao->restarProductoGR();
        echo $dao->cambiarEstadoGR();
    }

}

?>