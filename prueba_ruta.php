<?php
// 1. Cargamos el autoload
require_once "C:/xampp/htdocs/AppVentas/page/includes/cargar_clases.php";

// 2. Verificamos físicamente si los archivos existen antes de llamar a la clase
$rutaFisica = "C:/xampp/htdocs/AppVentas/page/Modelo/CRUDMarca.php";

if (!file_exists($rutaFisica)) {
    die("EL ARCHIVO NO ESTÁ EN: " . $rutaFisica);
}

try {
    // Si el archivo existe pero sale "Not found", es que el Autoload no lo incluyó
    $producto = new CRUDMarca();   
    $datos = $producto->ListarMarca();
    print_r($datos);
} catch (Throwable $e) {
    echo "Error real: " . $e->getMessage();
}