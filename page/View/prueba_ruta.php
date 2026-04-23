<!DOCTYPE html>
<html lang="es">
<head>
    <?php 
        $ruta = "../..";
        $titulo = "Aplicación de Ventas - Información del Productos";
        include("../includes/cabezera.php");  
    ?>
    <style>
        .debug-box { border: 2px solid #ccc; padding: 20px; border-radius: 10px; max-width: 400px; margin: 20px auto; font-family: sans-serif; }
        .result-item { margin: 10px 0; padding: 5px; background: #f0f0f0; border-radius: 5px; }
        .label { font-weight: bold; color: #555; }
        .value { color: #007bff; font-weight: bold; }
    </style>
</head>
<body>

    <div class="debug-box">
        <h3>🔍 Probador de Producto</h3>
        
        <label for="txt_cod_prod">Ingresa Código (Ej: P0001):</label>
        <input type="text" id="txt_cod_prod" placeholder="Escribe y sal del campo" style="width: 100%; padding: 8px; margin-top: 5px;">

        <hr>

        <div class="result-item">
            <span class="label">Producto:</span> 
            <span class="value prod">---</span>
        </div>
        <div class="result-item">
            <span class="label">Stock:</span> 
            <span class="value stk">---</span>
        </div>
        <div class="result-item">
            <span class="label">Costo:</span> 
            <span class="value cst">---</span>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        console.log("Sistema de prueba listo.");

        $("#txt_cod_prod").focusout(function() {
            let cod = $(this).val().trim();
            console.log("Enviando código: " + cod);

            if (cod === "") {
                console.warn("Código vacío, no se enviará nada.");
                return;
            }

            $.ajax({
                // AJUSTA ESTA RUTA según donde esté tu controlador realmente
                url: "../controller/ctr_consultar_prod.php", 
                type: "POST",
                data: { codprod: cod },
                success: function(response) {
                    console.log("Respuesta recibida del PHP:", response);
                    
                    try {
                        let data = JSON.parse(response);
                        
                        if (data) {
                            // Cambia .producto, .stock, .costo por los nombres de tu tabla
                            $(".prod").text(data.producto || "No definido");
                            $(".stk").text(data.stock_disponible || data.stock || "0");
                            $(".cst").text("S/ " + (data.costo || "0.00"));
                            console.log("Datos cargados en el HTML.");
                        } else {
                            alert("El controlador devolvió 'false' (producto no encontrado).");
                            $(".value").text("---");
                        }
                    } catch (e) {
                        console.error("Error al procesar JSON. La respuesta no es válida.");
                        alert("Error: El servidor no envió un JSON. Mira la consola (F12).");
                    }
                },
                error: function(xhr) {
                    console.error("Error de conexión:", xhr.status, xhr.statusText);
                    alert("No se pudo conectar con el archivo PHP.");
                }
            });
        });
    });
    </script>

</body>
</html>