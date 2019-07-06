<?php 

class Productos extends ModeloBase{
    
    private $idProducto;
    private $nombre;
    private $idClasificacion;
    private $unidadMedida;
    private $color;
    private $acabado;
    private $precio;
    private $existencia;
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

    public function getIdProducto()
    {
        return $this->idProducto;
    }

    
    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;

        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

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


    public function getUnidadMedida()
    {
        return $this->unidadMedida;
    }

    
    public function setUnidadMedida($unidadMedida)
    {
        $this->unidadMedida = $unidadMedida;

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

    public function getPrecio()
    {
        return $this->precio;
    }

    
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    public function getExistencia()
    {
        return $this->existencia;
    }

    
    public function setExistencia($existencia)
    {
        $this->existencia = $existencia;

        return $this;
    }
}

?>