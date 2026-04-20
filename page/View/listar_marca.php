<!DOCTYPE html>
<html lang="es">
    <?php 
        $ruta = "../..";
        $titulo = "Aplicación de Ventas - Lista de Marcas";
        // Agregado punto y coma al final
        include("../includes/cabezera.php");  
    ?>
<body>
    <?php 
        include("../includes/menu.php");
        include("../includes/cargar_clases.php");

        // 1. Instanciamos la clase
        $crudmarca = new CRUDMarca();
        
        // 2. Llamamos al método (Asegúrate que en tu clase se llame ListaMarca o ListarMarca)
        $rs_marca = $crudmarca->ListarMarca(); 
    ?>

    <div class="container mt-3">
        <header>
            <h1><i class="fas fa-list-alt"></i> Lista de Marcas</h1>
            <hr/>
        </header>
        
        <section>
            <article>
                <div class="row justify-content-center mt-3">
                    <table class="table table-hover table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">N°</th>
                                <th scope="col">Código</th>
                                <th scope="col">Marca</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 0;
                                // CORRECCIÓN: Usamos la misma variable $rs_marca definida arriba
                                if (!empty($rs_marca)) {
                                    foreach($rs_marca as $mar) {
                                        $i++; 
                            ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $mar->id_marca ?? $mar->codigo_marca ?? 'N/A' ?></td>
                                <td><?= $mar->des_mar ?? $mar->marca ?? 'Sin nombre' ?></td>
                            </tr>
                            <?php 
                                    } 
                                } else {
                                    echo "<tr><td colspan='3' class='text-center'>No hay marcas registradas o error en conexión</td></tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </article>
        </section>

        <?php 
            // Agregado punto y coma
            include("../includes/pie.php"); 
        ?>
    </div>
</body>
</html>