<?php 

class Conexion {

    public static $host = "localhost";
    public static $dbUser = "root";
    public static $dbPass = "";
    public static $dbName = "grupoPublicitario";

    public static function conectar() {
        $con = new mysqli(self::$host, self::$dbUser, self::$dbPass, self::$dbName);

        $con->set_charset("utf8");

        if($con)
            return $con;
    }

    public function ejecutar($query) {
        
        try {
            $resultado = self::conectar()->query($query);
        } catch (mysqli_sql_exception $e) {
            throw $e;
            die();
        }

        return $resultado;
    }

}