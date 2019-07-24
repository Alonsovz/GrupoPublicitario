<?php

class VendedoresController extends ControladorBase {

    public static function gestion() {
        self::loadMain();
        
        require_once './app/view/Vendedores/gestion.php';
    }


    public function mostrarVendedores() {
        $dao = new DaoUsuario();

        echo $dao->mostrarVendedores();
    }

    public function registrarVendedor() {
       
        $dao = new DaoUsuario();

        $dao->objeto->setNombre($_REQUEST["nombre"]);
        


        echo $dao->registrarVendedor();

    }

    public function editarVendedor() {
       
        $dao = new DaoUsuario();

        $dao->objeto->setNombre($_REQUEST["nombre"]);
        $dao->objeto->setCodigoUsuario($_REQUEST["id"]);
        


        echo $dao->editarVendedor();

    }

    public function eliminar() {
       
        $dao = new DaoUsuario();

        
        $dao->objeto->setCodigoUsuario($_REQUEST["idEliminar"]);
        


        echo $dao->eliminarVendedor();

    }
} 

?>