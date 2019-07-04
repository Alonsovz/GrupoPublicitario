<?php

class RequisicionController extends ControladorBase {
    public static function granFormato() {

        $daoP = new DaoProveedores();
        $proveedores = $daoP->mostrarProveedoresCmb();

        self::loadMain();
        
        require_once './app/view/Requisicion/granFormato.php';
    }


    public static function gastosOficina() {
        $daoP = new DaoRequisicion();
        $gastos = $daoP->mostrarGastosCMB();

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

    public static function pendAprobarGastos() {
        self::loadMain();
        require_once './app/view/Requisicion/pendAprobarGastos.php';
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

    public static function gastosRechazados() {
        self::loadMain();
        
        require_once './app/view/Requisicion/gastosRechazados.php';
    }

    public static function gastosAprobados() {
        self::loadMain();
        
        require_once './app/view/Requisicion/gastosAprobados.php';
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

    public function mostrarPenAprobarGastos() {
        $dao = new DaoRequisicion();

        echo $dao->mostrarPenAprobarGastos();
    }

    public function mostrarGastosAprobados() {
        $dao = new DaoRequisicion();

        echo $dao->mostrarGastosAprobados();
    }

    public function mostrarGastosRechazados() {
        $dao = new DaoRequisicion();

        echo $dao->mostrarGastosRechazados();
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
            $dao->objeto->setPrecioTotal($detalle->precioTotalRe);

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


    public function aprobarGasto(){
        $dao = new DaoRequisicion();

        $dao->objeto->setIdOrden($_REQUEST["id"]);
       
        
        echo $dao->aprobarGasto();
    }

    public function rechazarGasto(){
        $dao = new DaoRequisicion();

        $dao->objeto->setIdOrden($_REQUEST["id"]);
       
        
        echo $dao->rechazarGasto();
    }

    public function guardarGasto(){
        $dao = new DaoRequisicion();

        $dao->objeto->setDescripciones($_REQUEST["gasto"]);
       
        
        echo $dao->guardarGasto();
    }

    public function quitarGasto(){
        $dao = new DaoRequisicion();

        $dao->objeto->setIdOrden($_REQUEST["idGasto"]);
       
        
        echo $dao->quitarGasto();
    }

    public function guardarGastoReq(){
        $dao = new DaoRequisicion();

        $dao->objeto->setIdOrden($_REQUEST["gastosCmb"]);
        $dao->objeto->setDescripciones($_REQUEST["descripcion"]);
        $dao->objeto->setPrecio($_REQUEST["precio"]);
        $dao->objeto->setFechaReq($_REQUEST["fecha"]);
       
        
        echo $dao->gastos();
    }

    public function recibir(){
        $dao = new DaoRequisicion();

        $dao->objeto->setIdOrden($_REQUEST["idD"]);
        $dao->objeto->setIdProductoFinal($_REQUEST["idP"]);
        $dao->objeto->setColor($_REQUEST["color"]);
        $dao->objeto->setAcabado($_REQUEST["acabado"]);
        $dao->objeto->setCantidad($_REQUEST["cantidad"]);
        $dao->objeto->setPrecio($_REQUEST["precio"]);
       
        
        echo $dao->recibir();
        echo $dao->agregarInventario();
    }


    public function finalizarRe(){
        $dao = new DaoRequisicion();

        $dao->objeto->setIdOrden($_REQUEST["idRe"]);
       
        
        echo $dao->finalizarRe();
    }
    

}

?>