<!DOCTYPE html>
<html lang="es">
<head>
    <?php 
        $ruta = "../..";
        $titulo = "Aplicación de Ventas - Información del Productos";
        include("../includes/cabezera.php");  
    ?>
    <link rel="stylesheet" href="../../css/vistas/editar_producto.css">
    
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
        if (!empty($rs_prod)) {
            $crudmarca = new CRUDMarca();
            $crudcategoria = new CRUDCategoria();

            $rs_mar = $crudmarca->ListarMarca();
            $rs_cat = $crudcategoria->ListarCategoria();
        } else {
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
            <h1><i class="fas fa-list-alt"></i> Editar Producto</h1>
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
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form id="frm_editar_prod" name="frm_editar_prod" method="post" action="../controller/ctr_grabar_prod.php" autocomplete="off">
                                <input type="hidden" id="txt_tipo" name="txt_tipo" value="e" />

                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="txt_cod_prod" class="form-label">Código</label>
                                        <input type="text" class="form-control" id="txt_cod_prod" name="txt_cod_prod" placeholder="Código" maxlength="5" readonly value="<?= $codprod ?>"/>
                                    </div>

                                    <div class="col-md-8">
                                        <label for="txt_prod" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="txt_prod" name="txt_prod" placeholder="Nombre del producto" maxlength="40" value="<?= $rs_prod->producto ?>"/>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="txt_stk" class="form-label">Stock disponible</label>
                                        <input type="number" class="form-control" id="txt_stk" name="txt_stk" placeholder="Stock" min="1" max="9999" value="<?= $rs_prod->stock ?> " />
                                    </div>

                                    <div class="col-md-4">
                                        <label for="txt_cst" class="form-label">Costo</label>
                                        <input type="text" class="form-control" id="txt_cst" name="txt_cst" placeholder="Costo" maxlength="8" value="<?= $rs_prod->costo ?>" />
                                    </div>

                                    <div class="col-md-4">
                                        <label for="txt_gnc" class="form-label">% Ganancia</label>
                                        <input type="number" class="form-control" id="txt_gnc" name="txt_gnc" placeholder="Ganancia" min="1" max="100" step="0.01" value="<?= $rs_prod->ganancia * 100 ?>" />
                                    </div>

                                    <div class="col-md-6">
                                        <label for="cbo_cod_mar" class="form-label">Marca</label>
                                        <select class="form-select" id="cbo_cod_mar" name="cbo_cod_mar">
                                            <option value="" selected disabled>Seleccione Marca...</option>
                                            <?php 
                                                foreach ($rs_mar as $mar) {
                                            ?>
                                                <option value="<?= $mar->codigo_marca ?>"><?= $mar->marca ?></option>
                                            <?php 
                                                }
                                            ?>
                                            </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="cbo_cod_cat" class="form-label">Categoría</label>
                                        <select class="form-select form-select-lg mb-3" id="cbo_cod_cat" name="cbo_cod_cat">
                                            <option value="" selected disabled>Seleccione Categoría...</option>
                                            <?php 
                                                foreach ($rs_cat as $cat) {
                                            ?>
                                                <option value="<?= $cat->codigo_categoria ?>"><?= $cat->categoria ?></option>
                                            <?php 
                                                }
                                            ?>
                                            </select>
                                    </div>

                                    <div class="col-12 text-center mt-4">
                                        <button type="submit" class="btn btn-primary" id="btn_registrar_prod" name="btn_registrar_prod">
                                            <i class="fas fa-save"></i> Actualizar Información
                                        </button>
                                    </div>
                                </div>
                            </form>
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