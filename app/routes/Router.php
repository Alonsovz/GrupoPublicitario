<?php 

class Router {

    private $fullUrl;
    private $controller;
    private $method;
    private $parameter;
    # Constructor

    public function __construct() {
        $this->setFullUrl();
        $this->setController();
        $this->setMethod();
        $this->setParameter();
    }

    # Getters y Setters

    /**
     * Get the value of fullUrl
     */ 
    public function getFullUrl()
    {
        return $this->fullUrl;
    }

    /**
     * Set the value of fullUrl
     *
     * @return  self
     */ 
    public function setFullUrl()
    {
        /* if(strpos($_SERVER["REQUEST_URI"], 'res'))
        {
            echo $_SERVER["REQUEST_URI"];
            die();
        } */

        $this->fullUrl = explode('/', $_SERVER["REQUEST_URI"]);

        return $this;
    }

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
        $this->controller = !empty($this->fullUrl[2]) ? $this->fullUrl[2] : 'Login';

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
        $this->method = !empty($this->fullUrl[3]) ? $this->fullUrl[3] : 'loginView';

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