<!DOCTYPE html>
<html lang="es">
<head>
    <?php 
        $ruta = "../..";
        $titulo = "Aplicación de Ventas - Lista de Productos";
        include("../includes/cabezera.php");  
    ?>
</head>
<body>

    <?php 
        include("../includes/menu.php");
        include("../includes/cargar_clases.php");

        $crudproducto = new CRUDProducto();
        $rs_prod = $crudproducto->ListarProducto();
    ?>
    
     <div class="container mt-3">
        <header>
            <h1><i class="fas fa-list-alt"></i> Lista de Productos</h1>
            <hr/>
        </header>

        <nav>
            <div class="btn-group col-md-5" role="group">
                <a href="registrar_producto.php" class="btn btn-outline-primary">
                    <i class="fas fa-plus-circle"> Registrar</i>
                </a>
                <a href="consultar_producto.php" class="btn btn-outline-primary">
                    <i class="fas fa-search"> Consultar</i>
                </a>
                <a href="filtrar_producto.php" class="btn btn-outline-primary">
                    <i class="fas fa-filter"> Filtrar</i>
                </a>

            </div>
        </nav>
        
        <section>
            <article>
                <div class="row justify-content-center mt-3">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">Código</th>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Stock Disponible</th>
                                    <th colspan="3" class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 0;
                                    if (!empty($rs_prod)) {
                                        foreach($rs_prod as $prod) {
                                            $i++; 
                                ?>
                                <tr class="reg_producto">
                                    <td><?= $i ?></td>
                                    <td class="codprod"><?= $prod->codigo_producto ?></td>
                                    <td class="prod"><?= $prod->producto ?></td>
                                    <td><?= $prod->stock_disponible ?></td>
                                    <td class="text-center">
                                        <a href="#" class="btn_mostrar btn btn-outline-primary btn-sm">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="btn_editar btn btn-outline-success btn-sm">
                                            <i class="fas fa-pen-square"></i>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="btn_borrar btn btn-outline-danger btn-sm">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php 
                                        } 
                                    } else {
                                        // Corregido colspan a 7 para cubrir toda la tabla
                                        echo "<tr><td colspan='7' class='text-center'>No hay productos registrados</td></tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </article>
        </section>

        <?php include("../includes/pie.php"); ?>
    </div>

    <div class="modal fade" id="md_borrar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-danger" id="staticBackdropLabel">
                        <i class="fas fa-trash-alt"></i> Borrar Producto
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <h5 class="card-title">¿Seguro de borrar el registro?</h5>
                    <p class="card-text">
                        <strong class="lbl_prod"></strong> <br>
                        (<span class="lbl_codprod"></span>)
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <a href="#" class="btn_borrar btn btn-danger">Eliminar permanentemente</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>