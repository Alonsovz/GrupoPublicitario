<?php

class ClientesController extends ControladorBase {

    public static function gestion() {
        self::loadMain();
        
        require_once './app/view/Clientes/gestion.php';
    }

    public function mostrarClientes() {
        $dao = new DaoClientes();

        echo $dao->mostrarClientes();
    }

    public function mostrarClientesEstadoCuenta() {
        $dao = new DaoClientes();

        echo $dao->mostrarClientesEstadoCuenta();
    }

    public function eliminar() {
        $datos = $_REQUEST["idEliminar"];

        $dao = new DaoClientes();

        $dao->objeto->setIdCliente($datos);

        echo $dao->eliminar();
    }

    public function getNit()
    {
        $dao=new DaoClientes();
        $nit=$_REQUEST['nit'];
        $dao->objeto->setNit($nit);

        echo $dao->getNit();
    }

    public function getEmail()
    {
        $dao=new DaoClientes();
        $email=$_REQUEST['email'];
        $dao->objeto->setEmail($email);

        echo $dao->getEmail();
    }

    public function registrar() {
       
        $dao = new DaoClientes();

        $dao->objeto->setNombre($_REQUEST["nombre"]);
        $dao->objeto->setNit($_REQUEST["nit"]);
        $dao->objeto->setNrc($_REQUEST["nrc"]);
        $dao->objeto->setDireccion($_REQUEST["direccion"]);
        $dao->objeto->setDepartamento($_REQUEST["departamento"]);
        $dao->objeto->setGiro($_REQUEST["giro"]);
        $dao->objeto->setCategoria($_REQUEST["categoria"]);
        $dao->objeto->setTipoDoc($_REQUEST["tipoDocumento"]);
        $dao->objeto->setCondicion($_REQUEST["condicion"]);
        $dao->objeto->setTelefono($_REQUEST["telefono"]);
        $dao->objeto->setCelular($_REQUEST["celular"]);
        $dao->objeto->setContacto($_REQUEST["contacto"]);
        $dao->objeto->setEmail($_REQUEST["correo"]);


        echo $dao->registrar();

    }

    public function editar() {
       
        $dao = new DaoClientes();

        $dao->objeto->setNombre($_REQUEST["nombreE"]);
        $dao->objeto->setNit($_REQUEST["nitE"]);
        $dao->objeto->setNrc($_REQUEST["nrcE"]);
        $dao->objeto->setDireccion($_REQUEST["direccionE"]);
        $dao->objeto->setDepartamento($_REQUEST["departamentoE"]);
        $dao->objeto->setGiro($_REQUEST["giroE"]);
        $dao->objeto->setCategoria($_REQUEST["categoriaE"]);
        $dao->objeto->setTipoDoc($_REQUEST["tipoDocumentoE"]);
        $dao->objeto->setCondicion($_REQUEST["condicionE"]);
        $dao->objeto->setTelefono($_REQUEST["telefonoE"]);
        $dao->objeto->setCelular($_REQUEST["celularE"]);
        $dao->objeto->setContacto($_REQUEST["contactoE"]);
        $dao->objeto->setEmail($_REQUEST["correoE"]);
        $dao->objeto->setIdCliente($_REQUEST["idDetalle"]);

        echo $dao->editar();

    }


}


?>