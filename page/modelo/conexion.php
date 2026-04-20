<?php

    class Conexion {
        private $usuario = "root";
        private $password = "";
        private $servidor = "localhost";
        private $db = "bd_ventas_ds500";

        public function Conectar() {

            try{
                $cnx = new PDO("mysql:host=$this->servidor; dbname=$this->db;", $this->usuario, $this->password);
                $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                return $cnx;
            } catch (PDOException $ex) {
                echo "Hubo un error: ".$ex->getMessage();
            }
        }
        
    }
 

