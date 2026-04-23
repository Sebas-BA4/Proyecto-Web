<!DOCTYPE html>
<html lang="es">
<head>
     <?php 
        $ruta = "../..";
        $titulo = "Aplicación de Ventas - Información del Productos";
        include("../includes/cabezera.php");  
    ?>
</head>
<body>
    <?php 
        include("../includes/menu.php");
        include("../includes/cargar_clases.php");

        $crudMarca = new CRUDMarca();
        $crudCategoria = new CRUDCategoria();

        $rs_mar =$crudMarca->ListarMarca();
        $rs_cat = $crudCategoria->ListarCategoria();
    ?>

    <div class="container mt-3">
    <header>
        <h1 class="text-primary">
            <i class="fas fa-plus-circle"></i> Registrar Producto
        </h1>
        <hr/>
    </header>

    <nav>
        <a href="listar_producto.php" class="btn btn-outline-secondary btn-sm">
            <i class="fas fa-arrow-circle-left"></i> Regresar
        </a>
    </nav>

    <section>
        <article>
            <div class="row justify-content-center mt-3">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form id="frm_registrar_prod" name="frm_registrar_prod" method="post" action="../controller/ctr_grabar_prod.php" autocomplete="off">
                                <input type="hidden" id="txt_tipo" name="txt_tipo" value="r" />

                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="txt_cod_prod" class="form-label">Código</label>
                                        <input type="text" class="form-control" id="txt_cod_prod" name="txt_cod_prod" placeholder="Código" maxlength="5" autofocus required />
                                    </div>

                                    <div class="col-md-8">
                                        <label for="txt_prod" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="txt_prod" name="txt_prod" placeholder="Nombre del producto" maxlength="40" required />
                                    </div>

                                    <div class="col-md-4">
                                        <label for="txt_stk" class="form-label">Stock disponible</label>
                                        <input type="number" class="form-control" id="txt_stk" name="txt_stk" placeholder="Stock" min="1" max="9999" required />
                                    </div>

                                    <div class="col-md-4">
                                        <label for="txt_cst" class="form-label">Costo</label>
                                        <input type="text" class="form-control" id="txt_cst" name="txt_cst" placeholder="Costo" maxlength="8" required />
                                    </div>

                                    <div class="col-md-4">
                                        <label for="txt_gnc" class="form-label">% Ganancia</label>
                                        <input type="number" class="form-control" id="txt_gnc" name="txt_gnc" placeholder="Ganancia" min="1" max="100" step="0.01" required />
                                    </div>

                                    <div class="col-md-6">
                                        <label for="cbo_cod_mar" class="form-label">Marca</label>
                                        <select class="form-select" id="cbo_cod_mar" name="cbo_cod_mar" required>
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
                                        <select class="form-select" id="cbo_cod_cat" name="cbo_cod_cat" required>
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
                                            <i class="fas fa-save"></i> Guardar Información
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