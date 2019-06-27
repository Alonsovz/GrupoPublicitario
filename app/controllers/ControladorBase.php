<?php 

class ControladorBase {

    public static function CreateView($view) {
        require_once "./app/view/$view.php";
    }

    public static function loadHeadOnly() {
        session_start();
        require_once "./app/view/Components/headLogin.php";
    }

    public static function loadMain() {
        session_start();
        self::validarSesion();
        require_once "./app/view/Components/head.php";
        require_once "./app/view/Components/menu.php";
        require_once "./app/view/Components/headerBar.php";
    }

    public function validarSesion() {
        if(empty($_SESSION["codigoUsuario"])) {
            header("location: ?");
        }
    }
}