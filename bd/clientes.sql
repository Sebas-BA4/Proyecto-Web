CREATE TABLE IF NOT EXISTS `tb_cliente` (
  `codigo_cliente` char(5) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `dni` char(8) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codigo_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tb_cliente` (`codigo_cliente`, `nombre`, `apellido`, `dni`, `telefono`, `correo`) VALUES 
('CL001', 'Juan', 'Perez', '12345678', '987654321', 'juan.perez@email.com'),
('CL002', 'Maria', 'Gomez', '87654321', '912345678', 'maria.gomez@email.com'),
('CL003', 'William', 'Villamizar', '71238475', '991238475', 'william@gmail.com'),
('CL004', 'Pedro', 'Babilonia', '45829103', '945829103', 'pedro@gmail.com'),
('CL005', 'Kevin', 'Timoteo', '76918274', '956918274', 'kevin@gmail.com'),
('CL006', 'Piero', 'Quispe', '70293847', '970293847', 'piero@gmail.com');

DELIMITER $$
CREATE PROCEDURE `sp_listar_cliente`()
BEGIN
    SELECT * FROM tb_cliente ORDER BY apellido ASC, nombre ASC;
END$$
DELIMITER ;
