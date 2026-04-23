<?php   
    include "../includes/cargar_clases.php";

    $crudproducto = new CRUDProducto();

    if (isset($_POST["codprod"])) {
        $cod_prod = $_POST["codprod"];
        
        // 1. Guardamos el resultado de la función en una variable
        $rs_prod = $crudproducto->MostrarProductoPorCodigo($cod_prod);

        // 2. Convertimos el objeto/array a formato JSON y lo imprimimos
        // Esto es lo que recibirá el "success" de tu AJAX
        echo json_encode($rs_prod);
    }