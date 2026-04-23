<!DOCTYPE html>
<html lang="es">
<head>
    <?php 
        $ruta = "../..";
        $titulo = "Aplicación de Ventas - Información del Productos";
        include("../includes/cabezera.php");  
    ?>
    <link rel="stylesheet" href="../../css/vistas/mostrar_producto.css">
    
</head>
<body>

    <?php 
    include("../includes/menu.php");
    include("../includes/cargar_clases.php");

    if (isset($_GET["codprod"])) {
        $codprod = $_GET["codprod"];

        $crudproducto = new CRUDProducto();
        $rs_prod = $crudproducto->MostrarProductoPorCodigo($codprod);

        // Solo redirigimos si NO se encontró el producto
        if (empty($rs_prod)) {
            header("location: listar_producto.php");
            exit; // Siempre usa exit después de un header location
        } 

    } else {
        // Si ni siquiera viene el código en la URL, mejor regresamos
        header("location: listar_producto.php");
        exit;
    }
?>

<div class="container mt-3">    
    <div class="container mt-3">
        <header>
            <h1><i class="fas fa-list-alt"></i> Información del Productos</h1>
            <hr/>
        </header>
        
        <nav>
            <a href="listar_producto.php" class="btn btn-outline-secondary btn-sm">
                <i class="fas fa-arrow-circle-left"> Regresar</i>
            </a>
        </nav>
        <section>
            <article>
                <div class="row justify-content-center mt-3">
                    <div class="card col-md-6">
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <h5 class="card-title fw-bold">Código</h5>
                                        <p class="card-text text-muted"><?= $codprod ?></p>
                                    </div>
                                    <div class="col-md-8"></div>

                                    <div class="col-md-8 mb-3">
                                        <h5 class="card-title fw-bold">Producto</h5>
                                        <p class="card-text text-muted"><?= $rs_prod->producto ?></p>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <h5 class="card-title fw-bold">Stock disponible</h5>
                                        <p class="card-text text-muted"><?= $rs_prod->stock ?></p>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <h5 class="card-title fw-bold">Costo</h5>
                                        <p class="card-text text-muted">S/ <?= number_format($rs_prod->costo, 2) ?></p>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <h5 class="card-title fw-bold">% Ganancia</h5>
                                        <p class="card-text text-muted"><?= $rs_prod->ganancia * 100 ?>%</p>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <h5 class="card-title fw-bold">Precio</h5>
                                        <p class="card-text text-muted">S/ <?= number_format($rs_prod->precio, 2) ?></p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <h5 class="card-title fw-bold">Marca</h5>
                                        <p class="card-text text-muted"><?= $rs_prod->marca ?></p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <h5 class="card-title fw-bold">Categoría</h5>
                                        <p class="card-text text-muted"><?= $rs_prod->categoria ?></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </section>

        <?php include("../includes/pie.php"); ?>
    </div>
    
</body>
</html>