<?php 
    include "./page/includes/cargar_clases.php";


    $crudproducto = new CRUDProducto();

    IF (isset($_GET["cod_prod"])) {
        $cod_prod = $_GET["cod_prod"];

        $crudproducto->BorrarProducto($cod_prod);

        header("location: ../view/listar_producto.php");
    }