<?php

class EgresosController extends ControladorBase {

    public static function Egresos()
    {
        self::loadMain();
        $dao = new DaoEgresos();
        

        $chequerasCMB = $dao->mostrarChequerasCMB();
        $chequeCMB = $dao->mostrarChequeCmb();
        require_once './app/view/Egresos/Egresos.php';
    }

    public static function chequeras()
    {
        self::loadMain();

       

        require_once './app/view/Egresos/gestionChequeras.php';
    }

    public static function convertir()
    {
        //self::loadMain();
        require_once './app/view/Egresos/ajax.php';
    }

    public static function cajaChicaGeneral()
    {
        self::loadMain();
        $dao = new DaoCajaChica();
        $monto = $dao->montoEnCajaG();

        $montoActual = $dao->montoEnCajaActualG();
        require_once './app/view/Egresos/CajaChicaGeneral.php';
    }

    public static function reintegroCajaA()
    {
        self::loadMain();
        $dao = new DaoCajaChica();
        $monto = $dao->montoEnCajaA();
        $montoActual = $dao->montoEnCajaActualA();

        $daoE = new DaoEgresos();
        $chequeras = $daoE->mostrarCheque();
        require_once './app/view/Egresos/reintegroCajaChicaA.php';
    }

    public static function reintegroCajaG()
    {
        self::loadMain();
        $dao = new DaoCajaChica();
        $monto = $dao->montoEnCajaG();

        $montoActual = $dao->montoEnCajaActualG();

        $daoE = new DaoEgresos();
        $chequeras = $daoE->mostrarCheque();
        require_once './app/view/Egresos/reintegroCajaChicaG.php';
    }


    public static function cajaChicaAderel()
    {
        self::loadMain();
        $dao = new DaoCajaChica();
        $monto = $dao->montoEnCajaA();

        $montoActual = $dao->montoEnCajaActualA();
        require_once './app/view/Egresos/CajaChicaAderel.php';
    }

    public function mostrarEgresos() {
        $dao = new DaoEgresos();

        echo $dao->mostrarEgresos();
    }

    public function mostrarEgresosE() {
        $dao = new DaoEgresos();

        echo $dao->mostrarEgresosE();
    }

    public function mostrarChequeras() {
        $dao = new DaoEgresos();

        echo $dao->mostrarChequeras();
    }


    public function cargarDatosEgresos() {
        $id = $_REQUEST["id"];

        $dao = new DaoEgresos();

        $dao->objeto->setIdEgreso($id);

        echo $dao->cargarDatosEgresos();
    }

    public function cargarDatosChequeras() {
        $id = $_REQUEST["id"];

        $dao = new DaoEgresos();

        $dao->objeto->setIdEgreso($id);

        echo $dao->cargarDatosChequeras();
    }

    public function cargarDatosRemesas() {
        $id = $_REQUEST["id"];

        $dao = new DaoRemesasCargos();

        $dao->objeto->setIdCheque($id);

        echo $dao->cargarDatosRemesas();
    }

    public function cargarDatosCargos() {
        $id = $_REQUEST["id"];

        $dao = new DaoRemesasCargos();

        $dao->objeto->setIdCheque($id);

        echo $dao->cargarDatosCargos();
    }

    public function editarChequera() {

      //  $datos = $_REQUEST["datos"];

        //$datos = json_decode($datos);

        $dao = new DaoEgresos();

    
        $dao->objeto->setConceptoEgreso($_REQUEST["chequera"]);
        $dao->objeto->setNumeroCuenta($_REQUEST["numeroCuenta"]);
        
        $dao->objeto->setIdEgreso($_REQUEST["idDetalle"]);

        echo $dao->editarChequera();
    }

    public function registrarChequera()
    {
        $datos = $_REQUEST["datos"];

        $datos = json_decode($datos);

        $dao = new DaoEgresos();

        //$chequera = $_REQUEST["chequera"];
     
        
        
        $dao->objeto->setConceptoEgreso($datos->chequera);
        $dao->objeto->setNumeroCuenta($datos->numeroCuenta);
        $dao->objeto->setCantidad($datos->monto);



        echo $dao->registrarChequera();
    }

    public function eliminarChequera() {
        $datos = $_REQUEST["id"];

        $dao = new DaoEgresos();

        $dao->objeto->setIdChequera($datos);

        echo $dao->eliminarChequera();
    }


    public function verPorMes() {
        $dao = new DaoEgresos();
      
        $anioE = $_REQUEST["anio"];
        $mesE = $_REQUEST["mes"];
       $dao->objeto->setMes($mesE);
        $dao->objeto->setAnio($anioE);

        echo $dao->mostrarTotal();        
    }

   

    public function registrarEgreso()
    {
        $dao = new DaoEgresos();

        $chequeP = $_REQUEST["cheque"];
        $conceptoEgresoP = $_REQUEST["conceptoEgreso"];
        $cantidadP = $_REQUEST["cantidad"];
        $retencionP = $_REQUEST["retencionMonto"];
        $pagadoP = $_REQUEST["pagado"];
        $meses = $_REQUEST["mes"];
        $anios = $_REQUEST["anio"];
        $chequera = $_REQUEST["chequera"];
        
        
        $dao->objeto->setChNo($chequeP);
        $dao->objeto->setConceptoEgreso($conceptoEgresoP);
        $dao->objeto->setCantidad($cantidadP);
        $dao->objeto->setRetencion($retencionP);
        $dao->objeto->setPagado($pagadoP);
        $dao->objeto->setMes($meses);
        $dao->objeto->setAnio($anios);
        $dao->objeto->setIdCheque($chequera);

        $daoR = new DaoRemesasCargos();
        $daoR->objeto->setCantidad($pagadoP);
        $daoR->objeto->setIdCheque($chequera);

        echo $dao->registrar();
        echo $daoR->restarCargo();
    }


    public function reintegroCajaGe()
    {
        $dao = new DaoEgresos();

        $chequeP = $_REQUEST["cheque"];
        $chequera = $_REQUEST["chequera"];
        $cantidadP = $_REQUEST["cantidad"];
        //$retencionP = $_REQUEST["retencionMonto"];
       // $pagadoP = $_REQUEST["pagado"];
        $meses = $_REQUEST["mes"];
        $anios = $_REQUEST["anio"];
        
        
        $dao->objeto->setChNo($chequeP);
        $dao->objeto->setConceptoEgreso('Reintegro Caja Chica General');
        $dao->objeto->setCantidad($cantidadP);
        $dao->objeto->setRetencion(0);
        $dao->objeto->setPagado($cantidadP);
        $dao->objeto->setMes($meses);
        $dao->objeto->setAnio($anios);
        $dao->objeto->setIdCheque($chequera);
        
        $daoC = new DaoCajaChica();
        $daoC->objeto->setCantidad($cantidadP);

        $daoR = new DaoRemesasCargos();
        $daoR->objeto->setCantidad($cantidadP);
        $daoR->objeto->setIdCheque($chequera);

        echo $daoC->reintegroCajaG();
        echo $daoR->restarCargo();
        echo $dao->registrar();
    }

    public function reintegroCajaAA()
    {
        $dao = new DaoEgresos();

        $chequeP = $_REQUEST["cheque"];
        $chequera = $_REQUEST["chequera"];
        $cantidadP = $_REQUEST["cantidad"];
        //$retencionP = $_REQUEST["retencionMonto"];
       // $pagadoP = $_REQUEST["pagado"];
        $meses = $_REQUEST["mes"];
        $anios = $_REQUEST["anio"];
        
        
        $dao->objeto->setChNo($chequeP);
        $dao->objeto->setConceptoEgreso('Reintegro Caja Chica Aderel');
        $dao->objeto->setCantidad($cantidadP);
        $dao->objeto->setRetencion(0);
        $dao->objeto->setPagado($cantidadP);
        $dao->objeto->setMes($meses);
        $dao->objeto->setAnio($anios);
        $dao->objeto->setAnio($anios);
        $dao->objeto->setIdCheque($chequera);

        $daoC = new DaoCajaChica();
        $daoC->objeto->setCantidad($cantidadP);

        $daoR = new DaoRemesasCargos();
        $daoR->objeto->setCantidad($cantidadP);
        $daoR->objeto->setIdCheque($chequera);

        echo $daoC->reintegroCajaA();
        echo $daoR->restarCargo();
        echo $dao->registrar();
    }


    public function editar() {
//
      //  $datos = json_decode($datos);

        $dao = new DaoEgresos();

        $dao->objeto->setChNo($_REQUEST["chNo"]);
        $dao->objeto->setConceptoEgreso($_REQUEST["conceptoEgreso"]);
        $dao->objeto->setCantidad($_REQUEST["cantidad"]);
         $dao->objeto->setRetencion($_REQUEST["retencion"]);
     $dao->objeto->setPagado($_REQUEST["pagado"]);
       $dao->objeto->setIdCheque($_REQUEST["selectChequera"]);

        $dao->objeto->setIdEgreso($_REQUEST["idDetalle"]);

        echo $dao->editar();
    }

    public function eliminar() {
        $datos = $_REQUEST["id"];

        $dao = new DaoEgresos();

        $dao->objeto->setIdEgreso($datos);

        echo $dao->eliminar();
    }

    public function reestablecerEg() {
        $datos = $_REQUEST["id"];

        $dao = new DaoEgresos();

        $dao->objeto->setIdEgreso($datos);

        echo $dao->reestablecer();
    }

    public function getChNo()
    {
        $dao=new DaoEgresos();
        $cheque=$_REQUEST['cheque'];
        $dao->objeto->setChNo($cheque);

        echo $dao->getCheque();
    }

    public function llamaReporte()
    {
        $dao = new DaoEgresos();
        
        
        require_once './app/reportes/reporteDiarioEgreso.php';

        $reporte = new Reporte();
        $total = $dao->totaldia();
        $resultado1 = $dao->reporteDiarioEgresos();
        $mostrar = $dao->reporteDiarioEgresos();
        $cantidad = $dao->totalCantidadDia();
        $retencion = $dao->totalRetencionDia();
        $pagado = $dao->totalPagadoDia();

        $reporte->reporteDiario($total,$resultado1,$mostrar,$cantidad,$pagado,$retencion);
    }

    public function reportePorFechas() {
        $dao = new DaoEgresos();
        
        require_once './app/reportes/ReporteEgresos.php';
        
       // $idA= $_REQUEST["area"];
        $fecha1 = $_REQUEST["fecha"];
        $fecha2 = $_REQUEST["fecha2"];

        $reporte = new Reporte();

        //$dao->objeto->setCodigoArea($idA);
        $dao->objeto->setFecha($fecha1);
       $dao->objeto->setFecha2($fecha2);
        $resultado = $dao->reporteEgresoPorFechas();
        $resultado1 = $dao->reporteEgresoPorFechas();
        $cantidad = $dao->totalCantidadFechas();
        $retencion = $dao->totalRetencionFechas();
        $pagado = $dao->totalPagadoFechas();

        $reporte->reporteEgresoPorFechas($fecha1,$fecha2, $resultado, $resultado1,$cantidad,$retencion,$pagado);
    }

    public function reportePorMes() {
        $dao = new DaoEgresos();
        
        require_once './app/reportes/ReporteEgresosPorMes.php';
        
       // $idA= $_REQUEST["area"];
        $mes = $_REQUEST["mes"];
        $anio = $_REQUEST["anio"];

        $reporte = new Reporte();

        //$dao->objeto->setCodigoArea($idA);
        $dao->objeto->setMes($mes);
       $dao->objeto->setAnio($anio);
        $resultado = $dao->reporteEgresosPorMes();
        $resultado1 = $dao->reporteEgresosPorMes();
        $cantidad = $dao->totalCantidad();
        $retencion = $dao->totalRetencion();
        $pagado = $dao->totalPagado();

        $reporte->reporteEgresosPorMes($mes,$anio, $resultado, $resultado1,$cantidad,$retencion,$pagado);
    }

    public function rptCuentas() {
        $idCheque = $_REQUEST["cuentas"];
        
        $mes = $_REQUEST["mes"];
        $anio = $_REQUEST["anio"];

        require_once './app/reportes/rptCuentas.php';
        
        $daoRC = new DaoRemesasCargos();
        $dao = new DaoEgresos();

        $daoRC->objeto->setIdCheque($idCheque);
        $daoRC->objeto->setMes($mes);
       $daoRC->objeto->setAnio($anio);
       $dao->objeto->setMes($mes);
       $dao->objeto->setAnio($anio);
       $dao->objeto->setIdCheque($idCheque);

        $reporte = new Reporte();

        $remesas = $daoRC->reporteRemesasCuenta();
        $cargos = $daoRC->reporteCargosCuentas();
        //$cheques = $daoRC->cheques();


       
        $resultado = $dao->reporteEgresosPorMesCuentas();
        $resultado1 = $dao->reporteEgresosPorMesCuentas();
        $cuenta = $daoRC->reporteCantidadCuenta();
        $cantidad = $dao->totalCantidadCuentas();
        $retencion = $dao->totalRetencionCuentas();
        $pagado = $dao->totalPagadoCuentas();
        $total = $daoRC->reporteCantidadCuenta();


        $reporte->rptCuentas($remesas,$cargos, $resultado,$resultado1,$cantidad,$retencion,$pagado,$mes,$anio,$total,$cuenta);
    }
 }
