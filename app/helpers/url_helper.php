<?php

    function redirectTo($page){
        header('location: '.RUTA_URL.$page);
    }