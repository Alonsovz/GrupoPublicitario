<?php

require_once './app/composer/vendor/autoload.php';

use ElephantIO\Client;
use ElephantIO\Engine\SocketIO\Version1X;

class Notif {
    public function __construct() {

    }


    public function envioRealizado() {
        $version = new Version1X("http://localhost:3008");
        $client = new Client($verion);


        $client->initialize();

        $client->emit("new_order", ["test" => "test", "test1" => "test1"]);

        $client->close();
    }
}