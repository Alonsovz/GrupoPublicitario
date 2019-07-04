<?php 

class Requisicion extends ModeloBase{
    private $idOrden;
    private $fechaReq;
    private $idResponsable;
    private $tipoCompra;
    private $idProveedor;
    private $tipoDocumento;
    private $idProductoFinal;
    private $color;
    private $acabado;
    private $cantidad;
    private $medidas;
    private $descripciones;
    private $precio;
    private $precioTotal;
    private $fechaEn;
    private $idClasificacion;

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

    public function getFechaReq()
    {
        return $this->fechaReq;
    }

    
    public function setFechaReq($fechaReq)
    {
        $this->fechaReq = $fechaReq;

        return $this;
    }

    public function getIdResponsable()
    {
        return $this->idResponsable;
    }

    
    public function setIdResponsable($idResponsable)
    {
        $this->idResponsable = $idResponsable;

        return $this;
    }

    public function getTipoCompra()
    {
        return $this->tipoCompra;
    }

    
    public function setTipoCompra($tipoCompra)
    {
        $this->tipoCompra = $tipoCompra;

        return $this;
    }

    public function getIdProveedor()
    {
        return $this->idProveedor;
    }

    /**
     * Set the value of codigoUsuario
     *
     * @return  self
     */ 
    public function setIdProveedor($idProveedor)
    {
        $this->idProveedor = $idProveedor;

        return $this;
    }

    public function getTipoDocumento()
    {
        return $this->tipoDocumento;
    }

    
    public function setTipoDocumento($tipoDocumento)
    {
        $this->tipoDocumento = $tipoDocumento;

        return $this;
    }

    public function getIdProductoFinal()
    {
        return $this->idProductoFinal;
    }

    
    public function setIdProductoFinal($idProductoFinal)
    {
        $this->idProductoFinal = $idProductoFinal;

        return $this;
    }

    public function getColor()
    {
        return $this->color;
    }

    
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    public function getAcabado()
    {
        return $this->acabado;
    }

    
    public function setAcabado($acabado)
    {
        $this->acabado = $acabado;

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

    public function getMedidas()
    {
        return $this->medidas;
    }

    
    public function setMedidas($medidas)
    {
        $this->medidas = $medidas;

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



    public function getPrecioTotal()
    {
        return $this->precioTotal;
    }

    
    public function setPrecioTotal($precioTotal)
    {
        $this->precioTotal = $precioTotal;

        return $this;
    }

    public function getFechaEn()
    {
        return $this->fechaEn;
    }

    
    public function setFechaEn($fechaEn)
    {
        $this->fechaEn = $fechaEn;

        return $this;
    }

    public function getIdClasificacion()
    {
        return $this->idClasificacion;
    }

    
    public function setIdClasificacion($idClasificacion)
    {
        $this->idClasificacion = $idClasificacion;

        return $this;
    }
}

?>