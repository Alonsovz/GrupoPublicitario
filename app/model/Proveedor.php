<?php 

class Proveedor extends ModeloBase{
    
    private $idProveedor;
    private $nombre;
    private $nit;
    private $nrc;
    private $direccion;
    private $departamento;
    private $giro;
    private $categoria;
    private $tipoSuministro;
    private $idClasificacion;
    private $condicion;
    private $telefono;
    private $celular;
    private $contacto;
    private $email;


    public function __construct() {

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

    public function getNit()
    {
        return $this->nit;
    }

    /**
     * Set the value of codigoUsuario
     *
     * @return  self
     */ 
    public function setNit($nit)
    {
        $this->nit = $nit;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    } 

    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    } 

    public function getContacto()
    {
        return $this->contacto;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setContacto($contacto)
    {
        $this->contacto = $contacto;

        return $this;
    } 

    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getNrc()
    {
        return $this->nrc;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNrc($nrc)
    {
        $this->nrc = $nrc;

        return $this;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getDepartamento()
    {
        return $this->departamento;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setDepartamento($departamento)
    {
        $this->departamento = $departamento;

        return $this;
    }

    public function getGiro()
    {
        return $this->giro;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setGiro($giro)
    {
        $this->giro = $giro;

        return $this;
    }
    
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    public function getCondicion()
    {
        return $this->condicion;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setCondicion($condicion)
    {
        $this->condicion = $condicion;

        return $this;
    }

    public function getTipoSuministro()
    {
        return $this->tipoSuministro;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setTipoSuministro($tipoSuministro)
    {
        $this->tipoSuministro = $tipoSuministro;

        return $this;
    }

    public function getIdClasificacion()
    {
        return $this->idClasificacion;
    }

    /**
     * Set the value of codigoUsuario
     *
     * @return  self
     */ 
    public function setIdClasificacion($idClasificacion)
    {
        $this->idClasificacion = $idClasificacion;

        return $this;
    }


  
}