-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.25-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para sistema_inventario
CREATE DATABASE IF NOT EXISTS `sistema_inventario` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `sistema_inventario`;

-- Volcando estructura para tabla sistema_inventario.compras
CREATE TABLE IF NOT EXISTS `compras` (
  `id_compra` int(11) NOT NULL AUTO_INCREMENT,
  `id_proveedor` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `estado_compra` enum('Realizada','Pendiente','Anulada') NOT NULL,
  `fech_compra` date NOT NULL,
  `total_compra` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_compra`),
  KEY `FK_compra_proveedor_idx` (`id_proveedor`),
  KEY `FK_compra_usu_idx` (`id_usuario`),
  CONSTRAINT `FK_compras_Proveedores` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`),
  CONSTRAINT `FK_compras_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla sistema_inventario.compras: ~53 rows (aproximadamente)
INSERT INTO `compras` (`id_compra`, `id_proveedor`, `id_usuario`, `estado_compra`, `fech_compra`, `total_compra`) VALUES
	(1, 31, 1, 'Realizada', '2023-01-09', 121.00),
	(2, 31, 1, 'Realizada', '2023-01-09', 121.00),
	(3, 31, 1, 'Realizada', '2023-01-21', 12.00),
	(4, 31, 1, 'Realizada', '2023-01-21', 12.00),
	(5, 31, 1, 'Realizada', '2023-01-21', 12.00),
	(6, 31, 1, 'Realizada', '2023-01-21', 12.00),
	(7, 31, 1, 'Realizada', '2023-01-21', 12.00),
	(8, 31, 1, 'Pendiente', '2023-01-10', 1722.00),
	(9, 31, 1, 'Realizada', '2023-01-09', 20.00),
	(10, 31, 1, 'Realizada', '2023-01-09', 24.00),
	(11, 31, 1, 'Realizada', '2023-01-09', 155.00),
	(12, 31, 1, 'Realizada', '2023-01-09', 155.00),
	(13, 31, 1, 'Realizada', '2023-01-09', 155.00),
	(14, 31, 1, 'Realizada', '2023-01-09', 155.00),
	(15, 31, 1, 'Realizada', '2023-01-09', 155.00),
	(16, 31, 1, 'Realizada', '2023-01-09', 155.00),
	(17, 31, 1, 'Realizada', '2023-01-09', 155.00),
	(18, 31, 1, 'Pendiente', '2023-01-09', 3.00),
	(19, 31, 1, 'Pendiente', '2023-01-09', 3.00),
	(20, 31, 1, 'Pendiente', '2023-01-09', 3.00),
	(21, 31, 1, 'Realizada', '2023-01-09', 5.00),
	(22, 31, 1, 'Realizada', '2023-01-09', 15.00),
	(23, 31, 1, 'Realizada', '2023-01-10', 325.00),
	(24, 32, 1, 'Realizada', '2023-01-10', 430.00),
	(25, 32, 1, 'Realizada', '2023-01-11', 150.00),
	(26, 32, 1, 'Realizada', '2023-01-11', 150.00),
	(27, 32, 1, 'Realizada', '2023-01-11', 150.00),
	(28, 31, 1, 'Realizada', '2023-01-09', 34.00),
	(29, 31, 1, 'Realizada', '2023-01-09', 34.00),
	(30, 31, 1, 'Realizada', '2023-01-11', 100.00),
	(31, 31, 1, 'Realizada', '2023-01-17', 5.00),
	(32, 31, 1, 'Realizada', '2023-01-09', 12.00),
	(33, 33, 1, 'Realizada', '2023-01-04', 1.00),
	(34, 31, 1, 'Realizada', '2023-01-17', 1.00),
	(35, 32, 1, 'Realizada', '2023-01-10', 1.00),
	(36, 32, 1, 'Realizada', '2023-01-10', 12.00),
	(37, 33, 1, 'Pendiente', '2023-01-09', 12.00),
	(38, 32, 1, 'Realizada', '2023-01-27', 12.00),
	(39, 32, 1, 'Realizada', '2023-01-10', 12.00),
	(40, 32, 1, 'Realizada', '2023-01-10', 1.00),
	(41, 32, 1, 'Realizada', '2023-01-28', 12.00),
	(42, 32, 1, 'Realizada', '2023-01-11', 12.00),
	(43, 32, 1, 'Pendiente', '2023-01-10', 12.00),
	(44, 31, 1, 'Pendiente', '2023-01-09', 12.00),
	(45, 31, 1, 'Realizada', '2023-01-09', 10.00),
	(46, 32, 1, 'Realizada', '2023-01-10', 144.00),
	(47, 32, 4, 'Realizada', '2023-01-10', 12.00),
	(48, 32, 4, 'Realizada', '2023-01-10', 12.00),
	(49, 33, 4, 'Realizada', '2023-01-10', 1.00),
	(50, 33, 4, 'Realizada', '2023-01-10', 1.00),
	(51, 32, 4, 'Realizada', '2023-01-10', -1.00),
	(52, 32, 4, 'Realizada', '2023-01-10', -1.00),
	(53, 31, 4, 'Realizada', '2023-01-10', 12.00),
	(54, 31, 4, 'Realizada', '2023-01-10', 1.00),
	(55, 31, 4, 'Realizada', '2023-01-10', 1440.00),
	(56, 33, 4, 'Realizada', '2023-01-10', 1000.00),
	(57, 32, 4, 'Realizada', '2023-01-13', 3000.00),
	(58, 31, 4, 'Realizada', '2023-01-13', 12.00);

-- Volcando estructura para tabla sistema_inventario.detalle_compra
CREATE TABLE IF NOT EXISTS `detalle_compra` (
  `id_detalle_compra` int(11) NOT NULL AUTO_INCREMENT,
  `id_compra` int(11) NOT NULL,
  `id_insumo` int(11) NOT NULL,
  `cantidad_comprada` int(11) NOT NULL,
  `precio_costo` decimal(10,2) NOT NULL,
  `estado_compra` enum('Realizada','Pendiente','Anulada') DEFAULT NULL,
  PRIMARY KEY (`id_detalle_compra`),
  KEY `FK_detalle_compra_compras` (`id_compra`),
  KEY `FK_detalle_compra_insumos` (`id_insumo`),
  CONSTRAINT `FK_detalle_compra_compras` FOREIGN KEY (`id_compra`) REFERENCES `compras` (`id_compra`),
  CONSTRAINT `FK_detalle_compra_insumos` FOREIGN KEY (`id_insumo`) REFERENCES `insumos` (`id_insumo`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla sistema_inventario.detalle_compra: ~48 rows (aproximadamente)
INSERT INTO `detalle_compra` (`id_detalle_compra`, `id_compra`, `id_insumo`, `cantidad_comprada`, `precio_costo`, `estado_compra`) VALUES
	(1, 3, 1, 12, 1.00, NULL),
	(2, 8, 1, 123, 14.00, NULL),
	(3, 9, 1, 1, 2.00, NULL),
	(4, 10, 1, 12, 1.00, NULL),
	(5, 11, 1, 12, 12.00, NULL),
	(7, 11, 1, 12, 12.00, NULL),
	(9, 11, 1, 12, 12.00, NULL),
	(10, 18, 1, 1, 1.00, NULL),
	(11, 18, 2, 1, 2.00, NULL),
	(12, 18, 1, 1, 1.00, NULL),
	(13, 18, 2, 1, 2.00, NULL),
	(14, 21, 1, 1, 1.00, NULL),
	(15, 21, 2, 2, 2.00, NULL),
	(16, 22, 1, 10, 1.00, NULL),
	(17, 22, 2, 5, 1.00, NULL),
	(18, 23, 1, 10, 10.00, NULL),
	(19, 23, 2, 15, 15.00, NULL),
	(20, 24, 7, 20, 5.00, NULL),
	(21, 24, 6, 10, 25.00, NULL),
	(22, 25, 6, 10, 15.00, NULL),
	(24, 25, 6, 10, 15.00, NULL),
	(26, 25, 6, 10, 15.00, NULL),
	(28, 28, 2, 34, 1.00, NULL),
	(30, 28, 2, 34, 1.00, NULL),
	(31, 30, 1, 10, 10.00, NULL),
	(32, 31, 1, 1, 1.00, NULL),
	(33, 31, 2, 2, 2.00, NULL),
	(34, 32, 1, 12, 1.00, NULL),
	(35, 33, 1, 1, 1.00, NULL),
	(36, 34, 5, 1, 1.00, NULL),
	(37, 35, 6, 1, 1.00, NULL),
	(38, 36, 1, 12, 1.00, NULL),
	(39, 37, 7, 12, 1.00, NULL),
	(40, 38, 7, 12, 1.00, NULL),
	(41, 39, 1, 12, 1.00, NULL),
	(42, 40, 6, 1, 1.00, NULL),
	(43, 41, 6, 12, 1.00, NULL),
	(44, 42, 1, 12, 1.00, NULL),
	(45, 43, 2, 12, 1.00, NULL),
	(46, 44, 6, 12, 1.00, 'Pendiente'),
	(47, 44, 1, 10, 1.00, 'Realizada'),
	(48, 46, 2, 12, 12.00, 'Realizada'),
	(49, 47, 1, 12, 1.00, 'Realizada'),
	(50, 47, 1, 12, 1.00, 'Realizada'),
	(51, 49, 1, 1, 1.00, 'Realizada'),
	(52, 49, 1, 1, 1.00, 'Realizada'),
	(53, 51, 1, -1, 1.00, 'Realizada'),
	(54, 51, 1, -1, 1.00, 'Realizada'),
	(55, 53, 2, 12, 1.00, 'Realizada'),
	(56, 54, 4, 1, 1.00, 'Realizada'),
	(57, 55, 7, 120, 12.00, 'Realizada'),
	(58, 56, 8, 1000, 1.00, 'Realizada'),
	(59, 57, 8, 120, 25.00, 'Realizada'),
	(60, 58, 1, 1, 12.00, 'Realizada');

-- Volcando estructura para tabla sistema_inventario.insumos
CREATE TABLE IF NOT EXISTS `insumos` (
  `id_insumo` int(11) NOT NULL AUTO_INCREMENT,
  `nom_insumo` varchar(45) NOT NULL,
  `categoria` enum('Comestibles','Utensillos','Varios') NOT NULL,
  `cant_max` int(11) NOT NULL,
  `cant_min` int(11) NOT NULL,
  `unidad_medida` enum('LB','UN','L','GAL','BOLSAS') NOT NULL,
  PRIMARY KEY (`id_insumo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla sistema_inventario.insumos: ~6 rows (aproximadamente)
INSERT INTO `insumos` (`id_insumo`, `nom_insumo`, `categoria`, `cant_max`, `cant_min`, `unidad_medida`) VALUES
	(1, 'CAFE', 'Varios', 104, 37, 'LB'),
	(2, 'SILLA', 'Varios', 10, 1, 'UN'),
	(4, 'AZUCAR', 'Comestibles', 125, 30, 'LB'),
	(5, 'AZUCAR', 'Comestibles', 125, 30, 'LB'),
	(6, 'PAN', 'Comestibles', 100, 20, 'L'),
	(7, 'PLATOS', 'Utensillos', 500, 200, 'UN'),
	(8, 'OTRO', 'Varios', 10, 1, 'UN');

-- Volcando estructura para tabla sistema_inventario.inventario
CREATE TABLE IF NOT EXISTS `inventario` (
  `id_insumo` int(11) NOT NULL AUTO_INCREMENT,
  `cant_existencia` decimal(6,2) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_insumo`),
  CONSTRAINT `FK_inventario_insumos` FOREIGN KEY (`id_insumo`) REFERENCES `insumos` (`id_insumo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla sistema_inventario.inventario: ~6 rows (aproximadamente)
INSERT INTO `inventario` (`id_insumo`, `cant_existencia`) VALUES
	(1, 35.00),
	(2, 24.00),
	(4, 1.00),
	(5, 0.00),
	(6, 0.00),
	(7, 120.00),
	(8, 1120.00);

-- Volcando estructura para tabla sistema_inventario.mensajes
CREATE TABLE IF NOT EXISTS `mensajes` (
  `id_mensaje` int(11) NOT NULL AUTO_INCREMENT,
  `mensaje` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_mensaje`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla sistema_inventario.mensajes: ~2 rows (aproximadamente)
INSERT INTO `mensajes` (`id_mensaje`, `mensaje`) VALUES
	(1, 'que bendicioon'),
	(2, 'esa es mi novia carajo');

-- Volcando estructura para tabla sistema_inventario.movi_inventario
CREATE TABLE IF NOT EXISTS `movi_inventario` (
  `id_cardex` int(11) NOT NULL AUTO_INCREMENT,
  `id_insumo` int(11) DEFAULT NULL,
  `cant_movimiento` decimal(6,2) DEFAULT NULL,
  `tipo_movimiento` enum('Entrada','Salida') DEFAULT NULL,
  `fecha_movimiento` datetime DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `comentario` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_cardex`),
  KEY `FK_insumos_idx` (`id_insumo`),
  KEY `FK_usuario_idx` (`id_usuario`,`id_insumo`) USING BTREE,
  CONSTRAINT `FK_movi_inventario_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla sistema_inventario.movi_inventario: ~11 rows (aproximadamente)
INSERT INTO `movi_inventario` (`id_cardex`, `id_insumo`, `cant_movimiento`, `tipo_movimiento`, `fecha_movimiento`, `id_usuario`, `comentario`) VALUES
	(1, 1, 10.00, 'Entrada', '2023-01-09 23:33:23', 1, 'Entrada de insumos'),
	(2, 2, 12.00, 'Entrada', '2023-01-10 09:08:31', 1, 'Entrada de insumos'),
	(3, 1, 12.00, 'Entrada', '2023-01-10 21:35:09', 1, 'Entrada de insumos'),
	(4, 1, 12.00, 'Entrada', '2023-01-10 21:36:24', 1, 'Entrada de insumos'),
	(5, 1, 1.00, 'Entrada', '2023-01-10 21:38:03', 1, 'Entrada de insumos'),
	(6, 1, 1.00, 'Entrada', '2023-01-10 21:38:44', 1, 'Entrada de insumos'),
	(7, 1, -1.00, 'Entrada', '2023-01-10 21:45:18', 1, 'Entrada de insumos'),
	(8, 1, -1.00, 'Entrada', '2023-01-10 21:49:21', 1, 'Entrada de insumos'),
	(9, 2, 12.00, 'Entrada', '2023-01-10 21:57:19', 1, 'Entrada de insumos'),
	(10, 4, 1.00, 'Entrada', '2023-01-10 21:58:42', 1, 'Entrada de insumos'),
	(11, 7, 120.00, 'Entrada', '2023-01-10 22:48:41', 1, 'Entrada de insumos'),
	(12, 8, 1000.00, 'Entrada', '2023-01-10 22:51:04', 1, 'Entrada de insumos');

-- Volcando estructura para tabla sistema_inventario.objetos
CREATE TABLE IF NOT EXISTS `objetos` (
  `id_objeto` int(10) NOT NULL AUTO_INCREMENT,
  `objeto` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `tipo_objeto` enum('Home','Proveedores','Insumos','Compras','Configuracion') NOT NULL,
  `creado_por` varchar(50) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `modificado_por` varchar(50) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_objeto`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla sistema_inventario.objetos: ~1 rows (aproximadamente)
INSERT INTO `objetos` (`id_objeto`, `objeto`, `descripcion`, `tipo_objeto`, `creado_por`, `fecha_creacion`, `modificado_por`, `fecha_modificacion`) VALUES
	(1, 'HOME', 'Pantalla principal del sistema', 'Home', 'ADMIN', '2023-01-15 16:19:34', NULL, NULL);

-- Volcando estructura para tabla sistema_inventario.parametros
CREATE TABLE IF NOT EXISTS `parametros` (
  `id_parametro` int(11) NOT NULL AUTO_INCREMENT,
  `parametro` varchar(60) NOT NULL,
  `valor` varchar(100) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `creado_por` varchar(50) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `modificado_por` varchar(50) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_parametro`),
  KEY `FK_parametros_usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla sistema_inventario.parametros: ~0 rows (aproximadamente)
INSERT INTO `parametros` (`id_parametro`, `parametro`, `valor`, `id_usuario`, `creado_por`, `fecha_creacion`, `modificado_por`, `fecha_modificacion`) VALUES
	(1, 'ADMIN_INTENTOS_INVALIDOS', '3', 1, 'ADMIN', '2023-01-01 11:56:21', NULL, NULL);

-- Volcando estructura para tabla sistema_inventario.proveedores
CREATE TABLE IF NOT EXISTS `proveedores` (
  `id_proveedor` int(11) NOT NULL AUTO_INCREMENT,
  `nom_proveedor` varchar(45) NOT NULL,
  `rtn_proveedor` varchar(50) NOT NULL,
  `tel_proveedor` varchar(50) NOT NULL,
  `correo_proveedor` varchar(45) NOT NULL,
  `dir_proveedor` varchar(255) NOT NULL,
  PRIMARY KEY (`id_proveedor`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla sistema_inventario.proveedores: ~3 rows (aproximadamente)
INSERT INTO `proveedores` (`id_proveedor`, `nom_proveedor`, `rtn_proveedor`, `tel_proveedor`, `correo_proveedor`, `dir_proveedor`) VALUES
	(31, 'SULA', '97847', '894723789', 'sula@sula@gmail.com', 'sfjsdklf'),
	(32, 'MENDELS', '7897979', '9798798', 'mendels@as.com', 'hfjkshfjksdhjkf'),
	(33, 'CARRION', '9877897', '8789789798', 'hhjk@hdj.com', 'bjsbsdb');

-- Volcando estructura para tabla sistema_inventario.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `creado_por` varchar(50) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `modificado_por` varchar(50) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla sistema_inventario.roles: ~2 rows (aproximadamente)
INSERT INTO `roles` (`id_rol`, `rol`, `descripcion`, `creado_por`, `fecha_creacion`, `modificado_por`, `fecha_modificacion`) VALUES
	(1, 'ADMINISTRADOR SISTEMA', 'Administrador del sistema', 'ADMIN', '2023-01-01 10:20:16', NULL, NULL),
	(2, 'VENDEDOR', 'NOSE', 'ADMIN', '2023-01-11 11:23:46', NULL, NULL);

-- Volcando estructura para tabla sistema_inventario.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `estado_usuario` enum('Activo','Inactivo','Bloqueado') NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `fecha_ultima_conexion` datetime DEFAULT NULL,
  `correo_electronico` varchar(50) NOT NULL,
  `foto_usuario` varchar(400) DEFAULT NULL,
  `creado_por` varchar(30) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `modificado_por` varchar(30) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `FK_usuarios_roles` (`id_rol`),
  CONSTRAINT `FK_usuarios_roles` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla sistema_inventario.usuarios: ~6 rows (aproximadamente)
INSERT INTO `usuarios` (`id_usuario`, `usuario`, `nombre_usuario`, `estado_usuario`, `contrasena`, `id_rol`, `fecha_ultima_conexion`, `correo_electronico`, `foto_usuario`, `creado_por`, `fecha_creacion`, `modificado_por`, `fecha_modificacion`) VALUES
	(1, 'ADMIN', 'ADMIN', 'Bloqueado', '$2y$12$2TxJ/PNGZJgSD0V0vURf.OZbMwtO9oTWaO7W6kuLXVpSsYlQwuclO', 1, '2022-12-31 10:01:41', 'admin@gmail.com', '../vistas/assets/usuarios/f035c1176927bf83575fe7d1d1ecc249.jpg', 'ADMIN', '2022-12-31 10:01:41', 'ADMIN', '2023-01-14 11:45:39'),
	(2, 'AAAA', 'DADASDADA', 'Activo', '1234567', 1, NULL, 'jdash@fsdfs.co', '../vistas/assets/usuarios/', '', '0000-00-00 00:00:00', 'SHAMPOO', '2023-01-11 11:54:51'),
	(3, 'UKYO', 'KUONJI', 'Activo', '$2y$12$d9ZLQGv4lBE4Lcv2atFD2ODwdR7jwqQh3uXhTJ0jFeRWVucd6YXrG', 2, NULL, 'ukyo@gmail.com', '../vistas/assets/usuarios/b4d083527b1c58648da707b322ce1a0e.jpg', 'UUTTU', '2023-01-10 11:51:32', 'SHAMPOO', '2023-01-11 11:55:23'),
	(4, 'ASUKA', 'ASUKA SORYUU', 'Activo', '$2y$12$l4g9LfYtYXx3CpLWlG1//.53/XeOHjf9V.hqTTNw2.IXp8N/t2zlm', 1, NULL, 'asuka@nerv.es', '../vistas/assets/usuarios/asuka.jpg', 'ADMIN', '2023-01-10 11:55:33', 'ASUKA', '2023-01-16 18:39:33'),
	(5, 'SAOTOME', 'RANMA SAOTOME', 'Activo', '$2y$12$w57cjU5Kh9vkpiYS8oL4OOnIBozK36PG2tn3gAHRX7JGx1smU6gVa', 2, NULL, 'saotome@ranma.jp', '../vistas/assets/usuarios/3647638_640px.jpg', 'ASUKA', '2023-01-10 23:18:27', 'ADMIN', '2023-01-14 11:44:58'),
	(6, 'SHAMPOO', 'SHAMPOO', 'Activo', '$2y$12$GPcB9gYNMPutC/jI1R3gUO/YUpsMMx.z8OHDyCb11yHVVDNcMVp2a', 1, NULL, 'shampoo@shampoo.es', '../vistas/assets/usuarios/shampoo.png', 'ASUKA', '2023-01-11 10:57:54', NULL, NULL);

-- Volcando estructura para disparador sistema_inventario.detalle_compra_update_inventario
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `detalle_compra_update_inventario` BEFORE INSERT ON `detalle_compra` FOR EACH ROW BEGIN
if NEW.estado_compra=1 then
UPDATE inventario
  SET cant_existencia = cant_existencia + new.cantidad_comprada
  WHERE id_insumo = new.id_insumo; 
  END if;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
