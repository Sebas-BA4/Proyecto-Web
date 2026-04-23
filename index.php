<!DOCTYPE html>
<html lang="es">
    <?php 
        $ruta = ".";
        $titulo = "Aplicacion de Ventas";
        include("./page/includes/cabezera.php")    
    ?>

    <body>
        <?php 
            include("./page/includes/menu.php")
        ?>
        <div class="container mt-3">
            
            <header>
                <h1>
                    <i class="fas fa university"><?=$titulo?></i>
                </h1>
                <hr/>
            </header>

            <section>
                <article>
                    <?php
                        // 1. Configuración de la carpeta
                        $dir = "./image/"; // Asegúrate de que esta sea la ruta correcta a tus fotos
                        $imagenes = glob($dir . "{*.jpg,*.jpeg,*.png,*.webp}", GLOB_BRACE);
                    ?>
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <?php foreach($imagenes as $indice => $img): ?>
                            <button type="button" data-bs-target="#carouselExampleIndicators" 
                                data-bs-slide-to="<?= $indice ?>" class="<?= $indice === 0 ? 'active' : '' ?>" 
                                aria-current="<?= $indice === 0 ? 'true' : 'false' ?>" aria-label="Slide <?= $indice + 1 ?>">
                            </button>
                            <?php endforeach; ?>
                        </div>
                        <div class="carousel-inner" >
                            <?php if (count($imagenes) > 0): ?>
                                <?php foreach($imagenes as $indice => $img): ?>
                            <div class="carousel-item <?= $indice === 0 ? 'active' : '' ?>">
                            <img src="<?=  $img ?>" class="d-block w-100" alt="..." style="max-height: 100vh; object-fit: cover; padding: 20px">
                            </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                        </div>
                        <div class="carousel-item active">
                                <p class="text-center">No se encontraron imágenes en la carpeta.</p>
                        </div>
                        <?php endif; ?>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </article>
            </section>

        </div>
    </body>
    
    <?php 
        include './page/includes/pie.php'
    ?>

</html>