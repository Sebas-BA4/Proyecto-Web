<!DOCTYPE html>
<html lang="es">
<head>
    <?php 
        $ruta = "../..";
        $titulo = "Aplicación de Ventas - Lista de Clientes";
        include("../includes/cabezera.php");  
    ?>
</head>
<body>

    <?php 
        include("../includes/menu.php");
        include("../includes/cargar_clases.php");

        $crudcliente = new CRUDCliente();
        $rs_cli = $crudcliente->ListarCliente();
    ?>
    
     <div class="container mt-3">
        <header>
            <h1><i class="fas fa-users"></i> Lista de Clientes</h1>
            <hr/>
        </header>
        
        <section>
            <article>
                <div class="row justify-content-center mt-3">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">Código</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido</th>
                                    <th scope="col">DNI</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Correo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 0;
                                    if (!empty($rs_cli)) {
                                        foreach($rs_cli as $cli) {
                                            $i++; 
                                ?>
                                <tr class="reg_cliente">
                                    <td><?= $i ?></td>
                                    <td><?= $cli->codigo_cliente ?></td>
                                    <td><?= $cli->nombre ?></td>
                                    <td><?= $cli->apellido ?></td>
                                    <td><?= $cli->dni ?></td>
                                    <td><?= $cli->telefono ?></td>
                                    <td><?= $cli->correo ?></td>
                                </tr>
                                <?php 
                                        } 
                                    } else {
                                        echo "<tr><td colspan='7' class='text-center'>No hay clientes registrados</td></tr>";
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
</body>
</html>
