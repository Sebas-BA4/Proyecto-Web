<?php
    class CRUDProducto extends Conexion {

        public function ListarProducto() {
            $arr_prod = null;
            $cn = $this->Conectar();
            $sql = "call sp_listar_producto()";
            $snt = $cn->prepare($sql);
            $snt->execute();
            $arr_prod = $snt->fetchAll(PDO::FETCH_OBJ);
            $cn = null;
            return $arr_prod;
        }

        public function ConsultarProductoPorCodigo($cod_prod){
            $arr_prod = null;
            $cn = $this->Conectar();
            $sql = "call sp_buscar_producto_por_codigo(:cod_prod)";
            $snt = $cn->prepare($sql);
            $snt->bindParam(":cod_prod", $cod_prod, PDO::PARAM_STR, 5);
            $snt->execute();
            $nr = $snt->rowCount();
            if ($nr > 0){
                $arr_prod = $snt->fetch(PDO::FETCH_OBJ);
            }
            $cn = null;
            return $arr_prod;
        }

        // public function MostrarProductoPorCodigo($cod_prod) {
        //     $arr_prod = null;
        //     $cn = $this->Conectar();
        //     $sql = "call sp_mostrar_producto_por_codigo(:cod_prod)";
        //     $snt = $cn->prepare($sql);
        //     $snt->bindParam(":cod_prod", $cod_prod, PDO::PARAM_STR, 5);
        //     $snt->execute();
        //     $nr = $snt->rowCount();
        //     if ($nr > 0){
        //         $arr_prod = $snt->fetch(PDO::FETCH_OBJ);
        //     }
        //     $cn = null;
        //     return $arr_prod;
        // }

        public function FiltrarProducto($valor) {
            $arr_prod = null;
            $cn = $this->Conectar();
            $sql = "call sp_filtrar_producto(:valor)";
            $snt = $cn->prepare($sql);
            $snt->bindParam(":valor", $valor, PDO::PARAM_STR, 40);
            $snt->execute();
            $arr_prod = $snt->fetchAll(PDO::FETCH_OBJ);
            $nr = $snt->rowCount();
            if ($nr > 0) {
                echo "<table class='table table-hover table-sm table-success table-striped'>";
                echo "<tr class='table-primary'>";
                echo "<th>N°</th>";
                echo "<th>Código</th>";
                echo "<th>Producto</th>";
                echo "<th>Stock Disponible</th>";
                echo "<th>Costo</th>";
                echo "<th>% Ganancia</th>";
                echo "<th>Precio</th>";
                echo "<th>Marca</th>";
                echo "<th>Categoria</th>";
                echo "</tr>";

                $i = 0; // Contador del número de registros

                foreach ($arr_prod as $prod) {
                    $i++;

                    echo "<tr>";
                    echo "<td>" . $i . "</td>";
                    echo "<td>" . $prod->codigo_producto . "</td>";
                    echo "<td>" . $prod->producto . "</td>";
                    echo "<td class='text-center'>" . $prod->stock_disponible . "</td>";
                    echo "<td>S/ " . $prod->costo . "</td>";
                    echo "<td class='text-center'>" . $prod->ganancia . "</td>";
                    echo "<td>S/ " . $prod->precio . "</td>";
                    echo "<td>" . $prod->marca . "</td>";
                    echo "<td>" . $prod->categoria . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
                echo "No existen registros.";
                echo "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                echo "</div>";
            }

            $cn = null;
            
        }

        public function RegistrarProducto (Producto $prdoucto){
            try{
                $cn = $this->Conectar();
                $sql = "call sp_registrar_producto(:cod_prod, :prod, :stk, :cst, :gnc, :cod_mar, :cod_cat)";
                $snt = $cn->prepare($sql);

                $snt->bindParam(":cod_prod", $prdoucto->codigo_producto);
                $snt->bindParam(":prod", $prdoucto->producto);
                $snt->bindParam(":stk", $prdoucto->stock_disponible);
                $snt->bindParam(":cst", $prdoucto->costo);
                $snt->bindParam(":gnc", $prdoucto->ganancia);
                $snt->bindParam(":cod_mar", $prdoucto->producto_codigo_marca);
                $snt->bindParam(":cod_cat", $prdoucto->producto_codigo_categoria);

                $snt->execute();
                $cn = null;
            } catch (PDOException $ex){
                die($ex->getMessage());
            }
        }


        public function EditarProducto(Producto $prdoucto) {
            try{
                $cn = $this->Conectar();
                $sql = "call sp_editar_producto(:cod_prod, :prod, :stk, :cst, :gnc, :cod_mar, :cod_cat)";
                $snt = $cn->prepare($sql);

                $snt->bindParam(":cod_prod", $prdoucto->codigo_producto);
                $snt->bindParam(":prod", $prdoucto->producto);
                $snt->bindParam(":stk", $prdoucto->stock_disponible);
                $snt->bindParam(":cst", $prdoucto->costo);
                $snt->bindParam(":gnc", $prdoucto->ganancia);
                $snt->bindParam(":cod_mar", $prdoucto->producto_codigo_marca);
                $snt->bindParam(":cod_cat", $prdoucto->producto_codigo_categoria);

                $snt->execute();
                $cn = null;
            } catch (PDOException $ex){
                die($ex->getMessage());
            }
        }

        public function BorrarProducto($cod_prod) {
            try{
                $cn = $this->Conectar();

                $sql = "call sp_borrar_producto(:cod_prod)";

                $snt = $cn->prepare($sql);
                $snt->bindParam(":cod_prod", $cod_prod);
                $snt->execute();
                $cn = null;
            } catch (PDOException $ex){
                die($ex->getMessage());
            }
        }
    }