<?php
    require_once 'config/config.php';
    require_once 'config/global_functions.php';
    require_once 'helpers/url_helper.php';

    spl_autoload_register(function($className){
        require_once 'libraries/'.$className.'.php';
    });
    //Ve este cambio stupida