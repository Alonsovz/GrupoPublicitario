<?php 

class NotaCredito extends ModeloBase{
    private $idCliente;
    private $fecha;
    private $nCFF;
    private $nRe;
    private $ventaCuenta;
    private $condAn;
    private $nNotaAn;
    private $fechaEmAn;

    private $cantidad;
   
    private $descripciones;
    private $precio;
    private $ventasNo;
    private $ventasEx;
    private $ventasGra;
    private $idOrden;
    
    public function __construct() {

    }
    public function getIdOrden()
    {
        return $this->idOrden;
    }

    
    public function setIdOrden($idOrden)
    {
        $this->idOrden = $idOrden;

        return $this;
    }

    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /**
     * Set the value of codigoUsuario
     *
     * @return  self
     */ 
    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;

        return $this;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getNCFF()
    {
        return $this->nCFF;
    }

    
    public function setNCFF($nCFF)
    {
        $this->nCFF = $nCFF;

        return $this;
    }

    public function getNRE()
    {
        return $this->nRe;
    }

    
    public function setNRE($nRe)
    {
        $this->nRe = $nRe;

        return $this;
    }

    public function getVentaCuenta()
    {
        return $this->ventaCuenta;
    }

    
    public function setVentaCuenta($ventaCuenta)
    {
        $this->ventaCuenta = $ventaCuenta;

        return $this;
    }


    public function getCondAn()
    {
        return $this->condAn;
    }

    
    public function setCondAn($condAn)
    {
        $this->condAn = $condAn;

        return $this;
    }

    public function getNNotaAn()
    {
        return $this->nNotaAn;
    }

    
    public function setNNotaAn($nNotaAn)
    {
        $this->nNotaAn = $nNotaAn;

        return $this;
    }

    public function getFechaEmAn()
    {
        return $this->fechaEmAn;
    }

    
    public function setFechaEmAn($fechaEmAn)
    {
        $this->fechaEmAn = $fechaEmAn;

        return $this;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    public function getDescripciones()
    {
        return $this->descripciones;
    }

    
    public function setDescripciones($descripciones)
    {
        $this->descripciones = $descripciones;

        return $this;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    public function getVentasNo()
    {
        return $this->ventasNo;
    }

    
    public function setVentasNo($ventasNo)
    {
        $this->ventasNo = $ventasNo;

        return $this;
    }


    public function getVentasEx()
    {
        return $this->ventasEx;
    }

    
    public function setVentasEx($ventasEx)
    {
        $this->ventasEx = $ventasEx;

        return $this;
    }


    public function getVentasGra()
    {
        return $this->ventasGra;
    }

    
    public function setVentasGra($ventasGra)
    {
        $this->ventasGra = $ventasGra;

        return $this;
    }
   
}

?>