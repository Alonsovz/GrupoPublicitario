<?php

class ProveedoresController extends ControladorBase {

    public static function gestion() {
        self::loadMain();
        
        require_once './app/view/Proveedores/gestion.php';
    }

    public function mostrarProveedores() {
        $dao = new DaoProveedores();

        echo $dao->mostrarProveedores();
    }

    public function registrar() {
       
        $dao = new DaoProveedores();

        $dao->objeto->setNombre($_REQUEST["nombre"]);
        $dao->objeto->setNit($_REQUEST["nit"]);
        $dao->objeto->setNrc($_REQUEST["nrc"]);
        $dao->objeto->setDireccion($_REQUEST["direccion"]);
        $dao->objeto->setDepartamento($_REQUEST["departamento"]);
        $dao->objeto->setGiro($_REQUEST["giro"]);
        $dao->objeto->setCategoria($_REQUEST["categoria"]);
        $dao->objeto->setCondicion($_REQUEST["condicion"]);
        $dao->objeto->setTelefono($_REQUEST["telefono"]);
        $dao->objeto->setCelular($_REQUEST["celular"]);
        $dao->objeto->setContacto($_REQUEST["contacto"]);
        $dao->objeto->setEmail($_REQUEST["correo"]);
        $dao->objeto->setTipoSuministro($_REQUEST["tipoSuministro"]);
        $dao->objeto->setIdClasificacion($_REQUEST["clasificacion"]);
        //$dao->objeto->setTipoDocumento($_REQUEST["tipoDoc"]);


        echo $dao->registrar();

    }

    public function editar() {
       
        $dao = new DaoProveedores();

        if($_REQUEST["validar"]==2){

            $dao->objeto->setNombre($_REQUEST["nombreE"]);
        $dao->objeto->setNit($_REQUEST["nitE"]);
        $dao->objeto->setNrc($_REQUEST["nrcE"]);
        $dao->objeto->setDireccion($_REQUEST["direccionE"]);
        $dao->objeto->setDepartamento($_REQUEST["departamentoE"]);
        $dao->objeto->setGiro($_REQUEST["giroE"]);
        $dao->objeto->setCategoria($_REQUEST["categoriaE"]);
        $dao->objeto->setCondicion($_REQUEST["condicionE"]);
        $dao->objeto->setTelefono($_REQUEST["telefonoE"]);
        $dao->objeto->setCelular($_REQUEST["celularE"]);
        $dao->objeto->setContacto($_REQUEST["contactoE"]);
        $dao->objeto->setEmail($_REQUEST["correoE"]);
        $dao->objeto->setTipoSuministro($_REQUEST["tipoSuministroE"]);
        $dao->objeto->setIdClasificacion($_REQUEST["clasificacionE"]);
        $dao->objeto->setIdProveedor($_REQUEST["idDetalle"]);

        }else{
        $dao->objeto->setNombre($_REQUEST["nombreE"]);
        $dao->objeto->setNit($_REQUEST["nitE"]);
        $dao->objeto->setNrc($_REQUEST["nrcE"]);
        $dao->objeto->setDireccion($_REQUEST["direccionE"]);
        $dao->objeto->setDepartamento($_REQUEST["departamentoE"]);
        $dao->objeto->setGiro($_REQUEST["giroE"]);
        $dao->objeto->setCategoria($_REQUEST["categoriaE"]);
        $dao->objeto->setCondicion($_REQUEST["condicionE"]);
        $dao->objeto->setTelefono($_REQUEST["telefonoE"]);
        $dao->objeto->setCelular($_REQUEST["celularE"]);
        $dao->objeto->setContacto($_REQUEST["contactoE"]);
        $dao->objeto->setEmail($_REQUEST["correoE"]);
        $dao->objeto->setTipoSuministro($_REQUEST["sumi"]);
        $dao->objeto->setIdClasificacion($_REQUEST["clasi"]);
        $dao->objeto->setIdProveedor($_REQUEST["idDetalle"]);
        }

        echo $dao->editar();

    }

    public function eliminar() {
        $datos = $_REQUEST["idEliminar"];

        $dao = new DaoProveedores();

        $dao->objeto->setIdProveedor($datos);

        echo $dao->eliminar();
    }

    public function getNit()
    {
        $dao=new DaoProveedores();
        $nit=$_REQUEST['nit'];
        $dao->objeto->setNit($nit);

        echo $dao->getNit();
    }

    public function getEmail()
    {
        $dao=new DaoProveedores();
        $email=$_REQUEST['email'];
        $dao->objeto->setEmail($email);

        echo $dao->getEmail();
    }

}


?>