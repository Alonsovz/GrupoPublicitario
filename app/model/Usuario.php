<?php 

class Usuario extends ModeloBase{
    private $codigoUsuario;
    private $nombre;
    private $apellido;
    private $dui;
    private $nit;
    private $fechaNacimiento;
    private $telefono;
    private $telMovil;
    private $email;
    private $direccion;
    private $MISS;
    private $afiliado;
    private $MAFP;
    private $estadoFam;
    private $conyuge;
    private $hijos;
    private $nombreHijo;
    private $nombrePadre;
    private $nombreMadre;
    private $contacto1;
    private $contacto1Tel;
    private $contacto1Tel2;
    private $fechaIngreso;
    private $sueldo;
    private $codigoRol;
    private $nomUsuario;  
    private $pass;
    
    
   
    
    

    public function __construct() {

    }

    /**
     * Get the value of codigoUsuario
     */ 
    public function getCodigoUsuario()
    {
        return $this->codigoUsuario;
    }

    /**
     * Set the value of codigoUsuario
     *
     * @return  self
     */ 
    public function setCodigoUsuario($codigoUsuario)
    {
        $this->codigoUsuario = $codigoUsuario;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
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

    /**
     * Get the value of apellido
     */ 
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get the value of nomUsuario
     */ 
    public function getNomUsuario()
    {
        return $this->nomUsuario;
    }

    /**
     * Set the value of nomUsuario
     *
     * @return  self
     */ 
    public function setNomUsuario($nomUsuario)
    {
        $this->nomUsuario = $nomUsuario;

        return $this;
    }

    /**
     * Get the value of pass
     */ 
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Set the value of pass
     *
     * @return  self
     */ 
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

    /**
     * Get the value of codigoRol
     */ 
    public function getCodigoRol()
    {
        return $this->codigoRol;
    }

    /**
     * Set the value of codigoRol
     *
     * @return  self
     */ 
    public function setCodigoRol($codigoRol)
    {
        $this->codigoRol = $codigoRol;

        return $this;
    }

    /**
     * Get the value of email
     */ 
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
    public function getTelMovil()
    {
        return $this->telMovil;
    }

    
    public function setTelMovil($telMovil)
    {
        $this->telMovil = $telMovil;

        return $this;
    }

    public function getDui()
    {
        return $this->dui;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setDui($dui)
    {
        $this->dui = $dui;

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

    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    public function getMISS()
    {
        return $this->MISS;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setMISS($MISS)
    {
        $this->MISS = $MISS;

        return $this;
    }

    public function getAfiliado()
    {
        return $this->afiliado;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setAfiliado($afiliado)
    {
        $this->afiliado = $afiliado;

        return $this;
    }

    public function getMAFP()
    {
        return $this->MAFP;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setMAFP($MAFP)
    {
        $this->MAFP = $MAFP;

        return $this;
    }


    public function getEstadoFam()
    {
        return $this->estadoFam;
    }

  
    public function setEstadoFam($estadoFam)
    {
        $this->estadoFam = $estadoFam;

        return $this;
    }


    public function getConyuge()
    {
        return $this->conyuge;
    }

  
    public function setConyuge($conyuge)
    {
        $this->conyuge = $conyuge;

        return $this;
    }

    public function getHijos()
    {
        return $this->hijos;
    }

  
    public function setHijos($hijos)
    {
        $this->hijos = $hijos;

        return $this;
    }

    public function getNombreHijo()
    {
        return $this->nombreHijo;
    }

  
    public function setNombreHijo($nombreHijo)
    {
        $this->nombreHijo = $nombreHijo;

        return $this;
    }

    public function getNombreMadre()
    {
        return $this->nombreMadre;
    }

   
    public function setNombreMadre($nombreMadre)
    {
        $this->nombreMadre = $nombreMadre;

        return $this;
    }


    public function getNombrePadre()
    {
        return $this->nombrePadre;
    }

   
    public function setNombrePadre($nombrePadre)
    {
        $this->nombrePadre = $nombrePadre;

        return $this;
    }

    public function getContacto1()
    {
        return $this->contacto1;
    }

    

   
    public function setContacto1($contacto1)
    {
        $this->contacto1 = $contacto1;

        return $this;
    }

    public function getContacto1Tel()
    {
        return $this->contacto1Tel;
    }

   
    public function setContacto1Tel($contacto1Tel)
    {
        $this->contacto1Tel = $contacto1Tel;

        return $this;
    }

    public function getContacto1Tel2()
    {
        return $this->contacto1Tel2;
    }

   
    public function setContacto1Tel2($contacto1Tel2)
    {
        $this->contacto1Tel2 = $contacto1Tel2;

        return $this;
    }


    public function getFechaIngreso()
    {
        return $this->fechaIngreso;
    }

    
    public function setFechaIngreso($fechaIngreso)
    {
        $this->fechaIngreso = $fechaIngreso;

        return $this;
    }

    public function getSueldo()
    {
        return $this->sueldo;
    }

    public function setSueldo($sueldo)
    {
        $this->sueldo = $sueldo;

        return $this;
    }






  
}