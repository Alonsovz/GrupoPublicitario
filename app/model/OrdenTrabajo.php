<?php 

class OrdenTrabajo extends ModeloBase{

    private $correlativo;
    private $fechaOT;
    private $idResponsable;
    private $idCliente;
    private $fechaEn;
    private $idClasificacion;
    private $idProductoFinal;
    private $color;
    private $acabado;
    private $cantidad;
    private $cuadrosImp;
    private $ubicacion;
    private $descripciones;
    private $precio;
    private $tipo;
    private $idOrden;

    private $altura;
    private $base;
    private $longitud;
    private $ancho;
    private $anchoMat;
    private $copias;
    private $mts2;
    private $desperdicio;


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

    public function getCorrelativo()
    {
        return $this->correlativo;
    }

    
    public function setCorrelativo($correlativo)
    {
        $this->correlativo = $correlativo;

        return $this;
    }

    public function getFechaOT()
    {
        return $this->fechaOT;
    }

    
    public function setFechaOT($fechaOT)
    {
        $this->fechaOT = $fechaOT;

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

    public function getIdCliente()
    {
        return $this->idCliente;
    }

    
    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;

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

    


    public function getCuadrosImp()
    {
        return $this->cuadrosImp;
    }

    
    public function setCuadrosImp($cuadrosImp)
    {
        $this->cuadrosImp = $cuadrosImp;

        return $this;
    }

    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    
    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;

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

    public function getTipo()
    {
        return $this->tipo;
    }

    
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getAltura()
    {
        return $this->altura;
    }

    
    public function setAltura($altura)
    {
        $this->altura = $altura;

        return $this;
    }

    public function getBase()
    {
        return $this->base;
    }

    
    public function setBase($base)
    {
        $this->base = $base;

        return $this;
    }


    public function getLongitud()
    {
        return $this->longitud;
    }

    
    public function setLongitud($longitud)
    {
        $this->longitud = $longitud;

        return $this;
    }

    public function getAncho()
    {
        return $this->ancho;
    }

    
    public function setAncho($ancho)
    {
        $this->ancho = $ancho;

        return $this;
    }

    public function getAnchoMat()
    {
        return $this->anchoMat;
    }

    
    public function setAnchoMat($anchoMat)
    {
        $this->anchoMat = $anchoMat;

        return $this;
    }


    public function getCopias()
    {
        return $this->copias;
    }

    
    public function setCopias($copias)
    {
        $this->copias = $copias;

        return $this;
    }


    public function getMts2()
    {
        return $this->mts2;
    }

    
    public function setMts2($mts2)
    {
        $this->mts2 = $mts2;

        return $this;
    }


    public function getDesperdicio()
    {
        return $this->desperdicio;
    }

    
    public function setDesperdicio($desperdicio)
    {
        $this->desperdicio = $desperdicio;

        return $this;
    }
    
}


?>