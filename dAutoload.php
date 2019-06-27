<?php

function __autoload($clase) {

    if(file_exists('./app/model/'.$clase.'.php')) {
        require_once('./app/model/'.$clase.'.php');
    } 

    else if(file_exists('./app/controllers/'.$clase.'.php')) {
        require_once('./app/controllers/'.$clase.'.php');
    } 
    
    else if(file_exists('./app/dao/'.$clase.'.php')) {
        require_once('./app/dao/'.$clase.'.php');
    } 

    else if(file_exists('./app/routes/'.$clase.'.php')) {
        require_once('./app/routes/'.$clase.'.php');
    }
    
    else if(file_exists('./app/encode/'.$clase.'.php')) {
        require_once('./app/encode/'.$clase.'.php');
    }
    
}