<?php 


class Exec {

    private $controller;
    private $method;
    private $parameter;

    # Constructor

    public function __construct() {
        $this->setController();
        $this->setMethod();
        //$this->setParameter();
    }

    # Getters y Setters
    /**
     * Get the value of controller
     */ 
    public function getController()
    {
        return $this->controller;
    }

    /**
     * Set the value of controller
     *
     * @return  self
     */ 
    public function setController()
    {
        $this->controller = !empty($_GET["1"]) ? $_GET["1"] : 'UsuarioController';

        return $this;
    }

    /**
     * Get the value of method
     */ 
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Set the value of method
     *
     * @return  self
     */ 
    public function setMethod()
    {
        $this->method = !empty($_GET["2"]) ? $_GET["2"] : 'loginView';

        return $this;
    }

    /**
     * Get the value of parameter
     */ 
    public function getParameter()
    {
        return $this->parameter;
    }

    /**
     * Set the value of parameter
     *
     * @return  self
     */ 
    public function setParameter()
    {
        $this->parameter = !empty($this->fullUrl[4]) ? $this->fullUrl[4] : '';

        return $this;
    }

    # Métodos 

    public function callMethod($controller, $method)
    {
        $controller = new $controller();
        $controller->$method();
    }


}