<?php
spl_autoload_register(function ($clase) {

    $ruta ="../Modelo/";
    
    $ruta_completa = $ruta . $clase . ".php";

    if (file_exists($ruta_completa)) {
        include_once $ruta_completa;
    }
});