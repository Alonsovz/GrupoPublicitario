<?php

class RequisicionController extends ControladorBase {
    public static function granFormato() {

        $daoP = new DaoProveedores();
        $proveedores = $daoP->mostrarProveedoresCmb();

        self::loadMain();
        
        require_once './app/view/Requisicion/granFormato.php';
    }


    public static function gastosOficina() {

        self::loadMain();
        
        require_once './app/view/Requisicion/gastosOficina.php';
    }

    public static function promocionales() {
       

        $daoP = new DaoProveedores();
        $proveedores = $daoP->mostrarProveedoresCmbP();
        self::loadMain();
        
        require_once './app/view/Requisicion/promocionales.php';
    }

    public static function impresion() {
     
        $daoP = new DaoProveedores();
        $proveedores = $daoP->mostrarProveedoresCmbI();
        self::loadMain();
        
        require_once './app/view/Requisicion/impresionDigital.php';
    }


    public static function pendAprobarGF() {
        self::loadMain();
        require_once './app/view/Requisicion/pendAprobarGF.php';
    }

    public static function pendAprobarP() {
        self::loadMain();
        
        require_once './app/view/Requisicion/pendAprobarP.php';
    }

    public static function pendAprobarIP() {
     
        self::loadMain();
        require_once './app/view/Requisicion/pendAprobarIP.php';
    }


    public static function pendRecibirGF() {
        self::loadMain();
        require_once './app/view/Requisicion/pendRecibirGF.php';
    }

    public static function pendRecibirP() {
        self::loadMain();
        
        require_once './app/view/Requisicion/pendRecibirP.php';
    }

    public static function pendRecibirIP() {
     
        self::loadMain();
        require_once './app/view/Requisicion/pendRecibirIP.php';
    }

    public static function rechazadasGF() {
        self::loadMain();
        require_once './app/view/Requisicion/rechazadasGF.php';
    }

    public static function rechazadasP() {
        self::loadMain();
        
        require_once './app/view/Requisicion/rechazadasP.php';
    }

    public static function rechazadasIP() {
     
        self::loadMain();
        require_once './app/view/Requisicion/rechazadasIP.php';
    }

    public function mostrarPenAprobarGF() {
        $dao = new DaoRequisicion();

        echo $dao->mostrarPenAprobarGF();
    }

    public function mostrarPenAprobarIP() {
        $dao = new DaoRequisicion();

        echo $dao->mostrarPenAprobarIP();
    }


    public function mostrarPenAprobarP() {
        $dao = new DaoRequisicion();

        echo $dao->mostrarPenAprobarP();
    }


    public function mostrarPenRecibirGF() {
        $dao = new DaoRequisicion();

        echo $dao->mostrarPenRecibirGF();
    }

    public function mostrarPenRecibirIP() {
        $dao = new DaoRequisicion();

        echo $dao->mostrarPenRecibirIP();
    }


    public function mostrarPenRecibirP() {
        $dao = new DaoRequisicion();

        echo $dao->mostrarPenRecibirP();
    }


    public function mostrarRechazadasGF() {
        $dao = new DaoRequisicion();

        echo $dao->mostrarRechazadasGF();
    }

    public function mostrarRechazadasIP() {
        $dao = new DaoRequisicion();

        echo $dao->mostrarRechazadasIP();
    }


    public function mostrarRechazadasP() {
        $dao = new DaoRequisicion();

        echo $dao->mostrarRechazadasP();
    }


    public function registrarEncabezado(){
        $dao = new DaoRequisicion();

        $dao->objeto->setFechaReq($_REQUEST["fechaRe"]);
        $dao->objeto->setIdResponsable($_REQUEST["idUser"]);
        $dao->objeto->setTipoCompra($_REQUEST["tipoCompra"]);
        $dao->objeto->setIdProveedor($_REQUEST["proveedor"]);
        $dao->objeto->setTipoDocumento($_REQUEST["tipoDocumento"]);
        $dao->objeto->setIdClasificacion($_REQUEST["idClasi"]);
        $dao->objeto->setFechaEn($_REQUEST["fechaEntrega"]);
        
        echo $dao->guardarReq();
    }

    public function guardarDetallesRequision(){
        $detalles = json_decode($_REQUEST["lista"]);

        $contador = 0;

        $dao = new DaoRequisicion();

        foreach($detalles as $detalle) {
            $dao->objeto->setIdProductoFinal($detalle->idProducto);
            $dao->objeto->setColor($detalle->idColor);
            $dao->objeto->setAcabado($detalle->idAcabado);
            $dao->objeto->setCantidad($detalle->cantidadRe);
            $dao->objeto->setMedidas($detalle->medidaRe);
            $dao->objeto->setDescripciones($detalle->descriRe);
            $dao->objeto->setPrecio($detalle->precioRe);

            if($dao->guardarDetallesReq()) {
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

    public function aprobarRequisicion(){
        $dao = new DaoRequisicion();

        $dao->objeto->setIdOrden($_REQUEST["id"]);
       
        
        echo $dao->aprobarRequisicion();
    }

    public function rechazarRequisicion(){
        $dao = new DaoRequisicion();

        $dao->objeto->setIdOrden($_REQUEST["id"]);
       
        
        echo $dao->rechazarRequisicion();
    }
    

}

?>