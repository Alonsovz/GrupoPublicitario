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
        $query = "select d.* from detalleNota d
        inner join notaCredito n on n.idNota = d.idNota
        where n.idNota=(select max(idNota) from notaCredito)";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function totalFactura(){
        $query = "select format(SUM(precio),2) as precio  from detalleOrdenGR 
        where idOrden= (select max(idOrden) from ordenTrabajoGR);";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }


}


?>