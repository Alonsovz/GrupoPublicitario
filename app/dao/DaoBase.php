<?php 

class DaoBase {

    protected $con;
    public $objeto;

    public function __construct() {

        $this->con = new Conexion();
    }

}