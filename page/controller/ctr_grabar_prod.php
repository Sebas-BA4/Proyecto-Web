<?php
    include "../includes/cargar_clases.php";

    $crudproducto = new CRUDProducto();

    if(isset($_POST["btn_registrar_prod"])) {
        $producto = new Producto();

        $producto->codigo_producto = $_POST["txt_cod_prod"];
        $producto->producto = $_POST["txt_prod"];
        $producto->stock_disponible = $_POST["txt_stk"];
        $producto->costo = $_POST["txt_cst"];
        $producto->ganancia = $_POST["txt_gnc"] / 100;
        $producto->producto_codigo_marca = $_POST["cbo_cod_mar"];
        $producto->producto_codigo_categoria = $_POST["cbo_cod_cat"];

        // CORRECCIÓN 1: Sintaxis de variable correcta
        $tipo = $_POST["txt_tipo"]; 

        if ($tipo == "r") {
            $crudproducto->RegistrarProducto($producto);
        } else if ($tipo == "e") {
            $crudproducto->EditarProducto($producto);
        }

        // CORRECCIÓN 2: Falta el ":" y la ruta debe ser exacta
        header("Location: ../view/listar_producto.php");
        exit; // Siempre usa exit después de redireccionar
    }
?>