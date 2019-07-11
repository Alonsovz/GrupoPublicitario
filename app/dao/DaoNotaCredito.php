<?php 

class DaoNotaCredito extends DaoBase {

    public function __construct() {
        parent::__construct();
        $this->objeto = new NotaCredito();
    }


    public function guardarNota() {
        $_query = "insert into notaCredito values(null,'".$this->objeto->getIdCliente()."','".$this->objeto->getFecha()."'
        ,'".$this->objeto->getNCFF()."','".$this->objeto->getNRE()."','".$this->objeto->getVentaCuenta()."',
        '".$this->objeto->getCondAn()."','".$this->objeto->getNNotaAn()."','".$this->objeto->getFechaEmAn()."')";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function guardarDetalleNota() {

        $corr= "(select max(idNota) as id from notaCredito)";

        $resultado1 = $this->con->ejecutar($corr);

        $fila = $resultado1->fetch_assoc();
        $idReq = $fila['id'];



        $_query = "insert into detalleNota values(null,'.$idReq.','".$this->objeto->getCantidad()."'
        ,'".$this->objeto->getDescripciones()."','".$this->objeto->getPrecio()."','".$this->objeto->getVentasNo()."',
        '".$this->objeto->getVentasEx()."','".$this->objeto->getVentasGra()."')";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


    public function imprimirEncabezadoNota() {
        $query = " 
        select o.*,DATE_FORMAT(o.fechaNota, '%d/%m/%Y') as fecha,DATE_FORMAT(o.fechaNotaAn, '%d/%m/%Y') as fechaNotaAn,
                c.*
               from notaCredito o
               inner join clientes c on c.idCliente = o.idCliente
               where o.idNota = (select max(idNota) from notaCredito)";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function imprimirDetalleNota(){
        $query = "select d.*,format(d.precioUni,2) as precioUnit,
        format(d.ventasNo,2) as ventasNoS, format(d.ventasGra,2) as ventasGrav,format(d.ventasEx,2) as ventasExe  from detalleNota d
        inner join notaCredito n on n.idNota = d.idNota
        where n.idNota=(select max(idNota) from notaCredito)";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function ventasNoSujetas(){
        $query = "select format(SUM(d.ventasNo),2) as ventasNoSu  from detalleNota  d
        inner join notaCredito n on n.idNota = d.idNota
        where n.idNota=(select max(idNota) from notaCredito)";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function ventasExentas(){
        $query = "select format(SUM(d.ventasEx),2) as ventasExen  from detalleNota  d
        inner join notaCredito n on n.idNota = d.idNota
        where n.idNota=(select max(idNota) from notaCredito)";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function ventasGravadas(){
        $query = "select format(SUM(d.ventasGra),2) as ventasGrava  from detalleNota  d
        inner join notaCredito n on n.idNota = d.idNota
        where n.idNota=(select max(idNota) from notaCredito)";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }


    public function facturaConsumidorImp() {
        $_query = "update ordenTrabajoIP set estado=6 where idOrden=".$this->objeto->getIdOrden();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function CFFImp() {
        $_query = "update ordenTrabajoIP set estado=7 where idOrden=".$this->objeto->getIdOrden();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


    public function notaCreImp() {
        $_query = "update ordenTrabajoIP set estado=8 where idOrden=".$this->objeto->getIdOrden();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


    public function facturaConsumidorP() {
        $_query = "update ordenTrabajoP set estado=6 where idOrden=".$this->objeto->getIdOrden();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function CFFP() {
        $_query = "update ordenTrabajoP set estado=7 where idOrden=".$this->objeto->getIdOrden();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


    public function notaCreP() {
        $_query = "update ordenTrabajoP set estado=8 where idOrden=".$this->objeto->getIdOrden();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


    public function facturaConsumidorGR() {
        $_query = "update ordenTrabajoGR set estado=6 where idOrden=".$this->objeto->getIdOrden();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function CFFGR() {
        $_query = "update ordenTrabajoGR set estado=7 where idOrden=".$this->objeto->getIdOrden();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


    public function notaCreGR() {
        $_query = "update ordenTrabajoGR set estado=8 where idOrden=".$this->objeto->getIdOrden();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


    
    public function fechaCobroGR() {
        $_query = "update detalleOrdenGR set fechaFactura=curdate(), estado=2 where idOrden=".$this->objeto->getIdOrden();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function fechaCobroIP() {
        $_query = "update detalleOrdenIP set fechaFactura=curdate(), estado=2 where idOrden=".$this->objeto->getIdOrden();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function fechaCobroP() {
        $_query = "update detalleOrdenP set fechaFactura=curdate(), estado=2 where idOrden=".$this->objeto->getIdOrden();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    




}


?>