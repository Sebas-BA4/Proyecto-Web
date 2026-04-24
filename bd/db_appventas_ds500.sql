-- MySQL dump 10.13  Distrib 8.0.45, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bd_ventas_ds500
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tb_categoria`
--

DROP TABLE IF EXISTS `tb_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_categoria` (
  `codigo_categoria` char(5) NOT NULL,
  `categoria` varchar(30) NOT NULL,
  PRIMARY KEY (`codigo_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_categoria`
--

LOCK TABLES `tb_categoria` WRITE;
/*!40000 ALTER TABLE `tb_categoria` DISABLE KEYS */;
INSERT INTO `tb_categoria` VALUES ('C0001','Electrodomésticos'),('C0002','Equipo de cómputo'),('C0003','Celular');
/*!40000 ALTER TABLE `tb_categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_cliente`
--

DROP TABLE IF EXISTS `tb_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_cliente` (
  `codigo_cliente` char(5) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido_paterno` varchar(50) NOT NULL,
  `apellido_materno` varchar(50) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `correo_electronico` varchar(100) DEFAULT NULL,
  `codigo_distrito` char(5) NOT NULL,
  `codigo_provincia` char(5) DEFAULT NULL,
  `codigo_departamento` char(5) DEFAULT NULL,
  PRIMARY KEY (`codigo_cliente`),
  UNIQUE KEY `correo_electronico` (`correo_electronico`),
  KEY `fk_cliente_distrito` (`codigo_distrito`),
  CONSTRAINT `fk_cliente_distrito` FOREIGN KEY (`codigo_distrito`) REFERENCES `tb_distrito` (`codigo_distrito`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_cliente`
--

LOCK TABLES `tb_cliente` WRITE;
/*!40000 ALTER TABLE `tb_cliente` DISABLE KEYS */;
INSERT INTO `tb_cliente` VALUES ('C0001','Sebastian','García','López','2000-05-15','Av. Los Volcanes 123','sebastian.g@mail.com','DI001',NULL,NULL),('C0002','María','Fernández','Rojas','1995-08-22','Calle Mercaderes 456','m.fernandez@mail.com','DI002',NULL,NULL),('C0003','Ricardo','Pérez','Torres','1988-12-01','Urb. El Sol 789','r.perez@mail.com','DI003',NULL,NULL),('C0004','Ana','Sánchez','Vidal','2002-03-10','Jr. Pizarro 321','ana.sanchez@mail.com','DI004',NULL,NULL),('C0005','Luis','Mendoza','Castro','1993-07-25','Av. Guardia Civil 555','l.mendoza@mail.com','DI005',NULL,NULL);
/*!40000 ALTER TABLE `tb_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_departamento`
--

DROP TABLE IF EXISTS `tb_departamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_departamento` (
  `codigo_departamento` char(5) NOT NULL,
  `nombre_departamento` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo_departamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_departamento`
--

LOCK TABLES `tb_departamento` WRITE;
/*!40000 ALTER TABLE `tb_departamento` DISABLE KEYS */;
INSERT INTO `tb_departamento` VALUES ('D0001','Lima'),('D0002','Arequipa'),('D0003','Cusco'),('D0004','La Libertad'),('D0005','Piura');
/*!40000 ALTER TABLE `tb_departamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_distrito`
--

DROP TABLE IF EXISTS `tb_distrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_distrito` (
  `codigo_distrito` char(5) NOT NULL,
  `nombre_distrito` varchar(50) NOT NULL,
  `codigo_provincia` char(5) NOT NULL,
  PRIMARY KEY (`codigo_distrito`),
  KEY `codigo_provincia` (`codigo_provincia`),
  CONSTRAINT `tb_distrito_ibfk_1` FOREIGN KEY (`codigo_provincia`) REFERENCES `tb_provincia` (`codigo_provincia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_distrito`
--

LOCK TABLES `tb_distrito` WRITE;
/*!40000 ALTER TABLE `tb_distrito` DISABLE KEYS */;
INSERT INTO `tb_distrito` VALUES ('DI001','Santa Anita','P0001'),('DI002','Yanahuara','P0002'),('DI003','Wanchaq','P0003'),('DI004','Víctor Larco Herrera','P0004'),('DI005','Castilla','P0005');
/*!40000 ALTER TABLE `tb_distrito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_marca`
--

DROP TABLE IF EXISTS `tb_marca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_marca` (
  `codigo_marca` char(5) NOT NULL,
  `marca` varchar(30) NOT NULL,
  PRIMARY KEY (`codigo_marca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_marca`
--

LOCK TABLES `tb_marca` WRITE;
/*!40000 ALTER TABLE `tb_marca` DISABLE KEYS */;
INSERT INTO `tb_marca` VALUES ('M0001','Sony'),('M0002','LG'),('M0003','Acer');
/*!40000 ALTER TABLE `tb_marca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_producto`
--

DROP TABLE IF EXISTS `tb_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_producto` (
  `codigo_producto` char(5) NOT NULL,
  `producto` varchar(40) NOT NULL,
  `stock_disponible` int(11) DEFAULT NULL,
  `costo` float DEFAULT NULL,
  `ganancia` float DEFAULT NULL,
  `producto_codigo_marca` char(5) NOT NULL,
  `producto_codigo_categoria` char(5) NOT NULL,
  PRIMARY KEY (`codigo_producto`),
  KEY `producto_codigo_marca` (`producto_codigo_marca`),
  KEY `producto_codigo_categoria` (`producto_codigo_categoria`),
  CONSTRAINT `tb_producto_ibfk_1` FOREIGN KEY (`producto_codigo_marca`) REFERENCES `tb_marca` (`codigo_marca`),
  CONSTRAINT `tb_producto_ibfk_2` FOREIGN KEY (`producto_codigo_categoria`) REFERENCES `tb_categoria` (`codigo_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_producto`
--

LOCK TABLES `tb_producto` WRITE;
/*!40000 ALTER TABLE `tb_producto` DISABLE KEYS */;
INSERT INTO `tb_producto` VALUES ('P0001','Lavadora 13Kg',25,1111,0.22,'M0001','C0002'),('P0002','Laptop Core i3 8GB SSD 250 GB',54,1762.45,0.1635,'M0003','C0002');
/*!40000 ALTER TABLE `tb_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_provincia`
--

DROP TABLE IF EXISTS `tb_provincia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_provincia` (
  `codigo_provincia` char(5) NOT NULL,
  `nombre_provincia` varchar(50) NOT NULL,
  `codigo_departamento` char(5) NOT NULL,
  PRIMARY KEY (`codigo_provincia`),
  KEY `codigo_departamento` (`codigo_departamento`),
  CONSTRAINT `tb_provincia_ibfk_1` FOREIGN KEY (`codigo_departamento`) REFERENCES `tb_departamento` (`codigo_departamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_provincia`
--

LOCK TABLES `tb_provincia` WRITE;
/*!40000 ALTER TABLE `tb_provincia` DISABLE KEYS */;
INSERT INTO `tb_provincia` VALUES ('P0001','Lima','D0001'),('P0002','Arequipa','D0002'),('P0003','Cusco','D0003'),('P0004','Trujillo','D0004'),('P0005','Piura','D0005');
/*!40000 ALTER TABLE `tb_provincia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'bd_ventas_ds500'
--
/*!50003 DROP PROCEDURE IF EXISTS `sp_borrar_producto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_borrar_producto`(IN cod_prod CHAR(5))
BEGIN
    DELETE FROM tb_producto WHERE codigo_producto = cod_prod;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_buscar_cliente_por_codigo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buscar_cliente_por_codigo`(IN cod_cli CHAR(5))
BEGIN
    SELECT 
        c.codigo_cliente,
        -- Concatenamos nombre, paterno y materno en un solo campo llamado 'cliente'
        CONCAT(c.nombre, ' ', c.apellido_paterno, ' ', c.apellido_materno) AS cliente,
        c.fecha_nacimiento,
        c.direccion,
        c.correo_electronico,
        -- Ubicación
        d.nombre_distrito,
        p.nombre_provincia,
        dep.nombre_departamento
    FROM tb_cliente c
    INNER JOIN tb_distrito d ON c.codigo_distrito = d.codigo_distrito
    INNER JOIN tb_provincia p ON d.codigo_provincia = p.codigo_provincia
    INNER JOIN tb_departamento dep ON p.codigo_departamento = dep.codigo_departamento
    WHERE c.codigo_cliente = cod_cli;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_buscar_producto_por_codigo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buscar_producto_por_codigo`(in cod_prod char(5))
begin
    select 
        p.producto, 
        p.costo, 
        p.ganancia, 
        (p.costo / (1 - p.ganancia)) as precio,
        p.stock_disponible as stock, 
        ((p.costo / (1 - p.ganancia)) * p.stock_disponible) as total,
        c.categoria, 
        m.marca
    from tb_producto p
    inner join tb_marca m on p.producto_codigo_marca = m.codigo_marca
    inner join tb_categoria c on p.producto_codigo_categoria = c.codigo_categoria
    where p.codigo_producto = cod_prod;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_editar_producto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editar_producto`(
    in cod_prod char(5), in prod varchar(40), in stk int,
    in cst float, gnc float, cod_mar char(5), cod_cat char(5))
begin
    update tb_producto set producto = prod, stock_disponible = stk, costo = cst, ganancia = gnc,
                           producto_codigo_marca = cod_mar, producto_codigo_categoria = cod_cat
    where codigo_producto = cod_prod;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_filtrar_cliente_por_nombre` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_filtrar_cliente_por_nombre`(IN nom_busqueda VARCHAR(50))
BEGIN
    SELECT 
        c.codigo_cliente,
        CONCAT(c.nombre, ' ', c.apellido_paterno, ' ', c.apellido_materno) AS nombre_completo,
        c.fecha_nacimiento,
        c.direccion,
        c.correo_electronico,
        d.nombre_distrito,
        p.nombre_provincia,
        dep.nombre_departamento
    FROM tb_cliente c
    INNER JOIN tb_distrito d ON c.codigo_distrito = d.codigo_distrito
    INNER JOIN tb_provincia p ON d.codigo_provincia = p.codigo_provincia
    INNER JOIN tb_departamento dep ON p.codigo_departamento = dep.codigo_departamento
    WHERE c.nombre LIKE CONCAT('%', nom_busqueda, '%') 
       OR c.apellido_paterno LIKE CONCAT('%', nom_busqueda, '%')
       OR c.apellido_materno LIKE CONCAT('%', nom_busqueda, '%')
    ORDER BY c.apellido_paterno ASC;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_filtrar_producto_por_nombre` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_filtrar_producto_por_nombre`(IN nom_prod VARCHAR(100))
BEGIN
    SELECT 
        p.codigo_producto,
        p.producto,
        p.costo,
        p.ganancia,
        -- Cálculo de Precio de Venta Unitario (Margen real)
        (p.costo / (1 - p.ganancia)) AS precio,
        p.stock_disponible AS stock,
        -- Cálculo del Total (Precio * Stock)
        ((p.costo / (1 - p.ganancia)) * p.stock_disponible) AS total,
        c.categoria, -- Corregido: antes decía nombre_categoria
        m.marca     -- Corregido: antes decía nombre_marca
    FROM tb_producto p
    INNER JOIN tb_marca m ON p.producto_codigo_marca = m.codigo_marca
    INNER JOIN tb_categoria c ON p.producto_codigo_categoria = c.codigo_categoria
    WHERE p.producto LIKE CONCAT('%', nom_prod, '%')
    ORDER BY p.producto ASC;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_listar_categoria` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_categoria`()
begin
    select * from tb_categoria order by categoria asc;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_listar_cliente` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_cliente`()
BEGIN
    SELECT 
        c.codigo_cliente,
        CONCAT(c.nombre, ' ', c.apellido_paterno, ' ', c.apellido_materno) AS nombre_completo,
        c.fecha_nacimiento,
        c.direccion,
        c.correo_electronico,
        d.nombre_distrito,
        p.nombre_provincia,
        dep.nombre_departamento
    FROM tb_cliente c
    INNER JOIN tb_distrito d ON c.codigo_distrito = d.codigo_distrito
    INNER JOIN tb_provincia p ON d.codigo_provincia = p.codigo_provincia
    INNER JOIN tb_departamento dep ON p.codigo_departamento = dep.codigo_departamento
    ORDER BY c.codigo_cliente ASC;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_listar_marca` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_marca`()
begin
    select * from tb_marca order by marca asc;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_listar_producto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_producto`()
begin
    select * from tb_producto order by stock_disponible desc;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_mostrar_cliente_por_codigo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_mostrar_cliente_por_codigo`(IN cod_cli CHAR(5))
BEGIN
    SELECT 
        c.codigo_cliente,
        c.nombre,                -- Campo individual para el input 'Nombre'
        c.apellido_paterno,      -- Campo individual para el input 'Ape Paterno'
        c.apellido_materno,      -- Campo individual para el input 'Ape Materno'
        c.fecha_nacimiento,
        c.direccion,
        c.correo_electronico,
        -- Traemos los CÓDIGOS para que PHP pueda cargar los combos
        c.codigo_distrito,       
        p.codigo_provincia,      -- Requerido por tu vista línea 28
        dep.codigo_departamento  -- Requerido por tu vista línea 27
    FROM tb_cliente c
    INNER JOIN tb_distrito d ON c.codigo_distrito = d.codigo_distrito
    INNER JOIN tb_provincia p ON d.codigo_provincia = p.codigo_provincia
    INNER JOIN tb_departamento dep ON p.codigo_departamento = dep.codigo_departamento
    WHERE c.codigo_cliente = cod_cli;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_registrar_producto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrar_producto`(
    in cod_prod char(5), in prod varchar(40), in stk int,
    in cst float, gnc float, cod_mar char(5), cod_cat char(5))
begin
    insert into tb_producto values (cod_prod, prod, stk, cst, gnc, cod_mar, cod_cat);
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-04-23 20:10:59
