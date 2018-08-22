-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 09, 2018 at 01:22 AM
-- Server version: 5.7.13-log
-- PHP Version: 5.6.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rojas`
--

-- --------------------------------------------------------

--
-- Table structure for table `canales`
--

CREATE TABLE `canales` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `canales`
--

INSERT INTO `canales` (`id`, `nombre`) VALUES
(1, 'Ferias'),
(2, 'Locales'),
(3, 'Nosotras'),
(4, 'Particular'),
(5, 'Regalos'),
(6, 'Tienda'),
(7, 'Showroom');

-- --------------------------------------------------------

--
-- Table structure for table `colores`
--

CREATE TABLE `colores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `colores`
--

INSERT INTO `colores` (`id`, `nombre`) VALUES
(1, 'Amarillo'),
(2, 'Azul'),
(3, 'Bordo'),
(4, 'ByN'),
(5, 'Camel'),
(6, 'Canela'),
(7, 'Negro'),
(8, 'Nude'),
(9, 'Plata'),
(10, 'Rojo'),
(11, 'Verde'),
(12, 'Fantasía'),
(13, 'Tabaco'),
(14, 'All Black');

-- --------------------------------------------------------

--
-- Table structure for table `descuentos`
--

CREATE TABLE `descuentos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `porcentaje` int(11) NOT NULL,
  `comentarios` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `descuentos`
--

INSERT INTO `descuentos` (`id`, `nombre`, `porcentaje`, `comentarios`) VALUES
(1, 'Mayorista', 10, ''),
(2, 'Revendedora', 10, ''),
(3, 'Socias', 10, ''),
(4, 'Familia', 10, ''),
(5, 'Efectivo', 10, ''),
(6, 'Dos zapatos', 10, '');

-- --------------------------------------------------------

--
-- Table structure for table `enviado`
--

CREATE TABLE `enviado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `enviado`
--

INSERT INTO `enviado` (`id`, `nombre`) VALUES
(1, 'Si'),
(2, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `facturadora`
--

CREATE TABLE `facturadora` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `facturadora`
--

INSERT INTO `facturadora` (`id`, `nombre`) VALUES
(1, 'Milagros'),
(2, 'Juliana'),
(3, 'Fernanda'),
(4, 'Negra');

-- --------------------------------------------------------

--
-- Table structure for table `locales`
--

CREATE TABLE `locales` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `comision` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `locales`
--

INSERT INTO `locales` (`id`, `nombre`, `comision`) VALUES
(1, 'Belgrano', 25),
(2, 'Córdoba', 0),
(3, 'Ferni', 0),
(4, 'Hermana Fabián', 25),
(5, 'Juli', 0),
(6, 'Laguna del Sol', 25),
(7, 'Las caballerizas', 0),
(8, 'Mili', 0),
(9, 'No aplica', 0),
(10, 'Palermo', 0),
(11, 'Pau Marquillana', 25),
(12, 'Puro diseño', 0),
(13, 'Rosario', 0),
(14, 'Santa Idea', 20),
(15, 'Showroom', 0),
(16, 'RRSS', 0);

-- --------------------------------------------------------

--
-- Table structure for table `medios_de_pago`
--

CREATE TABLE `medios_de_pago` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `medios_de_pago`
--

INSERT INTO `medios_de_pago` (`id`, `nombre`) VALUES
(1, 'Efectivo'),
(2, 'Mercado Pago'),
(3, 'Posnet'),
(4, 'Transferencia'),
(5, 'Point'),
(6, 'QR');

-- --------------------------------------------------------

--
-- Table structure for table `modelos`
--

CREATE TABLE `modelos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `modelos`
--

INSERT INTO `modelos` (`id`, `nombre`) VALUES
(1, 'Aime'),
(2, 'Alfonsina'),
(3, 'Alicia'),
(4, 'Barceloneta'),
(5, 'Borcegos'),
(6, 'Charade'),
(7, 'Charly'),
(8, 'Chavela'),
(9, 'Estela'),
(10, 'Eva'),
(11, 'Gus Gamuza'),
(12, 'Gustavo'),
(13, 'Lloret'),
(14, 'Marbella'),
(15, 'Patricio'),
(16, 'Dorothy'),
(17, 'Vat');

-- --------------------------------------------------------

--
-- Table structure for table `pago`
--

CREATE TABLE `pago` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pago`
--

INSERT INTO `pago` (`id`, `nombre`) VALUES
(1, 'Si'),
(2, 'No'),
(3, 'Vendido');

-- --------------------------------------------------------

--
-- Table structure for table `proveedor`
--

CREATE TABLE `proveedor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `proveedor`
--

INSERT INTO `proveedor` (`id`, `nombre`) VALUES
(1, 'Oscar'),
(2, 'Al pie');

-- --------------------------------------------------------

--
-- Table structure for table `secciones`
--

CREATE TABLE `secciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sub` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `secciones`
--

INSERT INTO `secciones` (`id`, `nombre`, `sub`, `link`, `direccion`) VALUES
(1, 'Ingresar Zapatos', '', '#/ingresar/zapatos', ''),
(2, 'Stock Zapatos', '', '#/stock', ''),
(3, 'Asignar a locales', '', '#/locales', ''),
(4, 'Eliminar', '', '#/eliminar', ''),
(5, 'tablas', '', '#/tablas', ''),
(6, 'ventas', '', '#/ventas', '');

-- --------------------------------------------------------

--
-- Table structure for table `talles`
--

CREATE TABLE `talles` (
  `id` int(11) NOT NULL,
  `numero` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `talles`
--

INSERT INTO `talles` (`id`, `numero`) VALUES
(1, 35),
(2, 36),
(3, 37),
(4, 38),
(5, 39),
(6, 40),
(7, 41);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `pass`, `admin`) VALUES
(1, 'milagros', 'm1l4gr0s', 1),
(2, 'juliana', 'jul14n4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `zapato`
--

CREATE TABLE `zapato` (
  `id` int(11) NOT NULL,
  `modelo` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `talle` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `proveedor` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_de_compra` date NOT NULL,
  `precio_de_compra` int(11) NOT NULL,
  `fecha_de_venta` date NOT NULL,
  `precio_de_venta` int(11) NOT NULL,
  `local` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `descuentos` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `medios_de_pago` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `facturadora` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `pago` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `enviado` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `foto` text COLLATE utf8_unicode_ci NOT NULL,
  `remito` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `precio_final` int(11) NOT NULL,
  `canales` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `zapato`
--

INSERT INTO `zapato` (`id`, `modelo`, `color`, `talle`, `proveedor`, `fecha_de_compra`, `precio_de_compra`, `fecha_de_venta`, `precio_de_venta`, `local`, `descuentos`, `medios_de_pago`, `facturadora`, `pago`, `enviado`, `foto`, `remito`, `precio_final`, `canales`) VALUES
(9, 'Aime', 'Camel', '35', 'Al pie', '2018-05-28', 800, '0000-00-00', 1600, 'Juli', '', 'Efectivo', 'Milagros', 'Vendido', 'No', '', '67677', 0, 'Showroom'),
(10, 'Aime', 'Camel', '35', 'Al pie', '2018-05-28', 800, '0000-00-00', 1600, 'Juli', '', '', '', '', '', '', '67677', 0, ''),
(11, 'Aime', 'Camel', '35', 'Al pie', '2018-05-28', 800, '0000-00-00', 1600, 'Juli', '', '', '', '', '', '', '67677', 0, ''),
(12, 'Aime', 'Camel', '35', 'Al pie', '2018-05-28', 800, '0000-00-00', 1600, 'Juli', '', '', '', '', '', '', '67677', 0, ''),
(13, 'Aime', 'Camel', '35', 'Al pie', '2018-05-28', 800, '0000-00-00', 1600, 'Ferni', '', '', '', '', '', '', '67677', 0, ''),
(14, 'Aime', 'Camel', '35', 'Al pie', '2018-05-28', 800, '0000-00-00', 1600, 'Showroom', '', '', '', '', '', '', '67677', 0, ''),
(15, 'Aime', 'Camel', '35', 'Al pie', '2018-05-28', 800, '0000-00-00', 1600, 'Showroom', '', '', '', '', '', '', '67677', 0, ''),
(16, 'Aime', 'Camel', '35', 'Al pie', '2018-05-28', 800, '0000-00-00', 1600, 'Showroom', '', '', '', '', '', '', '67677', 0, ''),
(17, 'Aime', 'Camel', '35', 'Al pie', '2018-05-28', 800, '0000-00-00', 1600, 'Showroom', '', '', '', '', '', '', '67677', 0, ''),
(18, 'Aime', 'Camel', '35', 'Al pie', '2018-05-28', 800, '0000-00-00', 1600, 'Showroom', '', '', '', '', '', '', '67677', 0, ''),
(19, 'Aime', 'Camel', '35', 'Al pie', '2018-05-28', 800, '0000-00-00', 1600, 'Showroom', '', '', '', '', '', '', '67677', 0, ''),
(20, 'Aime', 'Camel', '35', 'Al pie', '2018-05-28', 800, '0000-00-00', 1600, 'Santa Idea', '', '', '', '', '', '', '67677', 0, ''),
(21, 'Aime', 'Camel', '35', 'Al pie', '2018-05-28', 800, '0000-00-00', 1600, 'Showroom', '', '', '', '', '', '', '67677', 0, ''),
(22, 'Aime', 'Camel', '35', 'Al pie', '2018-05-28', 800, '0000-00-00', 1600, 'Showroom', '', '', '', '', '', '', '67677', 0, ''),
(23, 'Aime', 'Camel', '35', 'Al pie', '2018-05-28', 800, '0000-00-00', 1600, 'Showroom', '', '', '', '', '', '', '67677', 0, ''),
(32, 'Borcegos', 'Azul', '38', 'Al pie', '2018-05-28', 800, '0000-00-00', 1798, 'Showroom', '', '', '', '', '', '', '456123', 0, ''),
(33, 'Borcegos', 'Azul', '38', 'Al pie', '2018-05-28', 800, '0000-00-00', 1798, 'Showroom', '', '', '', '', '', '', '456123', 0, ''),
(34, 'Borcegos', 'Azul', '38', 'Al pie', '2018-05-28', 800, '0000-00-00', 1798, 'Showroom', '', '', '', '', '', '', '456123', 0, ''),
(35, 'Borcegos', 'Azul', '38', 'Al pie', '2018-05-28', 800, '0000-00-00', 1798, 'Showroom', '', '', '', '', '', '', '456123', 0, ''),
(36, 'Borcegos', 'Azul', '38', 'Al pie', '2018-05-28', 800, '0000-00-00', 1798, 'Showroom', '', '', '', '', '', '', '456123', 0, ''),
(37, 'Borcegos', 'Azul', '38', 'Al pie', '2018-05-28', 800, '0000-00-00', 1798, 'Showroom', '', '', '', '', '', '', '456123', 0, ''),
(38, 'Borcegos', 'Azul', '38', 'Al pie', '2018-05-28', 800, '0000-00-00', 1798, 'Showroom', '', '', '', '', '', '', '456123', 0, ''),
(39, 'Borcegos', 'Azul', '38', 'Al pie', '2018-05-28', 800, '0000-00-00', 1798, 'Showroom', '', '', '', '', '', '', '456123', 0, ''),
(40, 'Alicia', 'Canela', '35', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(41, 'Alicia', 'Canela', '35', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(42, 'Alicia', 'Canela', '35', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(43, 'Alicia', 'Canela', '35', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(44, 'Alicia', 'Canela', '35', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(45, 'Alicia', 'Canela', '36', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(46, 'Alicia', 'Canela', '36', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(47, 'Alicia', 'Canela', '36', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(48, 'Alicia', 'Canela', '36', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(49, 'Alicia', 'Canela', '36', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(50, 'Alicia', 'Canela', '36', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(51, 'Alicia', 'Canela', '37', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(52, 'Alicia', 'Canela', '37', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(53, 'Alicia', 'Canela', '37', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(54, 'Alicia', 'Canela', '37', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(55, 'Alicia', 'Canela', '37', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(56, 'Alicia', 'Canela', '37', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(57, 'Alicia', 'Canela', '37', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(58, 'Alicia', 'Canela', '38', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(59, 'Alicia', 'Canela', '38', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(60, 'Alicia', 'Canela', '38', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(61, 'Alicia', 'Canela', '38', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(62, 'Alicia', 'Canela', '38', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(63, 'Alicia', 'Canela', '38', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(64, 'Alicia', 'Canela', '38', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(65, 'Alicia', 'Canela', '38', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(66, 'Alicia', 'Canela', '40', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(67, 'Alicia', 'Canela', '40', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(68, 'Alicia', 'Canela', '40', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(69, 'Alicia', 'Canela', '40', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(70, 'Alicia', 'Canela', '40', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(71, 'Alicia', 'Canela', '40', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(72, 'Alicia', 'Canela', '40', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(73, 'Alicia', 'Canela', '40', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(74, 'Alicia', 'Canela', '40', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(75, 'Alicia', 'Canela', '40', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(76, 'Alicia', 'Canela', '39', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(77, 'Alicia', 'Canela', '39', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(78, 'Alicia', 'Canela', '39', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(79, 'Alicia', 'Canela', '39', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(80, 'Alicia', 'Canela', '39', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(81, 'Alicia', 'Canela', '39', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(82, 'Alicia', 'Canela', '39', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(83, 'Alicia', 'Canela', '39', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(84, 'Alicia', 'Canela', '39', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(85, 'Alicia', 'Canela', '41', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(86, 'Alicia', 'Canela', '41', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(87, 'Alicia', 'Canela', '41', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(88, 'Alicia', 'Canela', '41', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(89, 'Alicia', 'Canela', '41', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(90, 'Alicia', 'Canela', '41', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(91, 'Alicia', 'Canela', '41', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(92, 'Alicia', 'Canela', '41', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(93, 'Alicia', 'Canela', '41', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(94, 'Alicia', 'Canela', '41', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(95, 'Alicia', 'Canela', '41', 'Oscar', '2018-06-08', 500, '0000-00-00', 1500, 'Showroom', '', '', '', 'NO', 'NO', '', '123456', 0, ''),
(96, 'Lloret', 'Tabaco', '35', 'Oscar', '2018-09-18', 800, '0000-00-00', 2000, 'Showroom', '', '', '', 'NO', 'NO', '', '741852963', 0, ''),
(97, 'Lloret', 'Tabaco', '35', 'Oscar', '2018-09-18', 800, '0000-00-00', 2000, 'Showroom', '', '', '', 'NO', 'NO', '', '741852963', 0, ''),
(98, 'Lloret', 'Tabaco', '36', 'Oscar', '2018-09-18', 800, '0000-00-00', 2000, 'Showroom', '', '', '', 'NO', 'NO', '', '741852963', 0, ''),
(99, 'Lloret', 'Tabaco', '36', 'Oscar', '2018-09-18', 800, '0000-00-00', 2000, 'Showroom', '', '', '', 'NO', 'NO', '', '741852963', 0, ''),
(100, 'Lloret', 'Tabaco', '36', 'Oscar', '2018-09-18', 800, '0000-00-00', 2000, 'Showroom', '', '', '', 'NO', 'NO', '', '741852963', 0, ''),
(101, 'Lloret', 'Tabaco', '36', 'Oscar', '2018-09-18', 800, '0000-00-00', 2000, 'Showroom', '', '', '', 'NO', 'NO', '', '741852963', 0, ''),
(102, 'Lloret', 'Tabaco', '37', 'Oscar', '2018-09-18', 800, '0000-00-00', 2000, 'Córdoba', '', '', '', 'NO', 'NO', '', '741852963', 0, ''),
(103, 'Lloret', 'Tabaco', '37', 'Oscar', '2018-09-18', 800, '0000-00-00', 2000, 'Córdoba', '', '', '', 'NO', 'NO', '', '741852963', 0, ''),
(104, 'Lloret', 'Tabaco', '37', 'Oscar', '2018-09-18', 800, '0000-00-00', 2000, 'Córdoba', '', '', '', 'NO', 'NO', '', '741852963', 0, ''),
(105, 'Lloret', 'Tabaco', '38', 'Oscar', '2018-09-18', 800, '0000-00-00', 2000, 'Showroom', '', '', '', 'NO', 'NO', '', '741852963', 0, ''),
(106, 'Lloret', 'Tabaco', '38', 'Oscar', '2018-09-18', 800, '0000-00-00', 2000, 'Showroom', '', '', '', 'NO', 'NO', '', '741852963', 0, ''),
(107, 'Lloret', 'Tabaco', '38', 'Oscar', '2018-09-18', 800, '0000-00-00', 2000, 'Showroom', '', '', '', 'NO', 'NO', '', '741852963', 0, ''),
(108, 'Lloret', 'Tabaco', '38', 'Oscar', '2018-09-18', 800, '0000-00-00', 2000, 'Showroom', '', '', '', 'NO', 'NO', '', '741852963', 0, ''),
(109, 'Lloret', 'Tabaco', '38', 'Oscar', '2018-09-18', 800, '0000-00-00', 2000, 'Showroom', '', '', '', 'NO', 'NO', '', '741852963', 0, ''),
(110, 'Lloret', 'Tabaco', '38', 'Oscar', '2018-09-18', 800, '0000-00-00', 2000, 'Showroom', '', '', '', 'NO', 'NO', '', '741852963', 0, ''),
(111, 'Lloret', 'Tabaco', '38', 'Oscar', '2018-09-18', 800, '0000-00-00', 2000, 'Showroom', '', '', '', 'NO', 'NO', '', '741852963', 0, ''),
(112, 'Lloret', 'Tabaco', '40', 'Oscar', '2018-09-18', 800, '2018-07-09', 3000, 'Belgrano', '', 'Efectivo', 'Fernanda', 'Si', 'Si', '', '741852963', 2500, 'Locales'),
(113, 'Lloret', 'Tabaco', '40', 'Oscar', '2018-09-18', 800, '0000-00-00', 2000, 'Showroom', '', '', '', 'NO', 'NO', '', '741852963', 0, ''),
(114, 'Lloret', 'Tabaco', '39', 'Oscar', '2018-09-18', 800, '0000-00-00', 2000, 'Showroom', '', '', '', 'NO', 'NO', '', '741852963', 0, ''),
(115, 'Lloret', 'Tabaco', '41', 'Oscar', '2018-09-18', 800, '0000-00-00', 2000, 'Showroom', '', '', '', 'NO', 'NO', '', '741852963', 0, ''),
(116, 'Lloret', 'Tabaco', '41', 'Oscar', '2018-09-18', 800, '0000-00-00', 2000, 'Showroom', '', '', '', 'NO', 'NO', '', '741852963', 0, ''),
(117, 'Aime', 'All Black', '35', 'Oscar', '2018-07-02', 500, '0000-00-00', 2499, 'Belgrano', '25', 'Efectivo', 'Juliana', 'No', 'No', '', '456789', 0, 'Locales'),
(118, 'Aime', 'All Black', '35', 'Oscar', '2018-07-02', 500, '0000-00-00', 2499, 'Belgrano', '25', 'Mercado Pago', 'Milagros', 'Vendido', 'No', '', '456789', 0, 'Locales'),
(119, 'Aime', 'All Black', '35', 'Oscar', '2018-07-02', 500, '0000-00-00', 2499, 'Belgrano', '25', 'QR', 'Milagros', 'Vendido', 'No', '', '456789', 0, 'Locales'),
(120, 'Aime', 'All Black', '35', 'Oscar', '2018-07-02', 500, '0000-00-00', 2499, 'Mili', '', 'Point', 'Fernanda', 'Vendido', 'No', '', '456789', 0, ''),
(121, 'Aime', 'All Black', '35', 'Oscar', '2018-07-02', 500, '0000-00-00', 2499, 'Mili', '', 'Transferencia', '', 'NO', 'NO', '', '456789', 0, ''),
(122, 'Aime', 'All Black', '35', 'Oscar', '2018-07-02', 500, '0000-00-00', 2499, 'Mili', '', '', '', 'NO', 'NO', '', '456789', 0, ''),
(123, 'Borcegos', 'Amarillo', '35', 'Oscar', '2018-07-02', 1500, '0000-00-00', 3200, 'Mili', '', '', '', 'NO', 'NO', '', '0010000', 0, ''),
(124, 'Borcegos', 'Amarillo', '36', 'Oscar', '2018-07-02', 1500, '0000-00-00', 3200, 'Mili', '', '', '', 'NO', 'NO', '', '0010000', 0, ''),
(125, 'Borcegos', 'Amarillo', '36', 'Oscar', '2018-07-02', 1500, '0000-00-00', 3200, 'Showroom', '', '', '', 'NO', 'NO', '', '0010000', 0, ''),
(126, 'Borcegos', 'Amarillo', '37', 'Oscar', '2018-07-02', 1500, '0000-00-00', 3200, 'Mili', '', '', '', 'NO', 'NO', '', '0010000', 0, ''),
(127, 'Borcegos', 'Amarillo', '37', 'Oscar', '2018-07-02', 1500, '0000-00-00', 3200, 'Showroom', '', '', '', 'NO', 'NO', '', '0010000', 0, ''),
(128, 'Borcegos', 'Amarillo', '38', 'Oscar', '2018-07-02', 1500, '0000-00-00', 3200, 'Mili', '', '', '', 'NO', 'NO', '', '0010000', 0, ''),
(129, 'Borcegos', 'Amarillo', '38', 'Oscar', '2018-07-02', 1500, '0000-00-00', 3200, 'Showroom', '', '', '', 'NO', 'NO', '', '0010000', 0, ''),
(130, 'Borcegos', 'Amarillo', '40', 'Oscar', '2018-07-02', 1500, '0000-00-00', 3200, 'Mili', '', '', '', 'NO', 'NO', '', '0010000', 0, ''),
(131, 'Borcegos', 'Amarillo', '40', 'Oscar', '2018-07-02', 1500, '0000-00-00', 3200, 'Showroom', '', '', '', 'NO', 'NO', '', '0010000', 0, ''),
(132, 'Borcegos', 'Amarillo', '39', 'Oscar', '2018-07-02', 1500, '0000-00-00', 3200, 'Mili', '', '', '', 'NO', 'NO', '', '0010000', 0, ''),
(133, 'Borcegos', 'Amarillo', '39', 'Oscar', '2018-07-02', 1500, '0000-00-00', 3200, 'Showroom', '', '', '', 'NO', 'NO', '', '0010000', 0, ''),
(134, 'Borcegos', 'Amarillo', '41', 'Oscar', '2018-07-02', 1500, '0000-00-00', 3200, 'Showroom', '', '', '', 'NO', 'NO', '', '0010000', 0, ''),
(135, 'Borcegos', 'Amarillo', '41', 'Oscar', '2018-07-02', 1500, '0000-00-00', 3200, 'Showroom', '', '', '', 'NO', 'NO', '', '0010000', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `canales`
--
ALTER TABLE `canales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colores`
--
ALTER TABLE `colores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `descuentos`
--
ALTER TABLE `descuentos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enviado`
--
ALTER TABLE `enviado`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facturadora`
--
ALTER TABLE `facturadora`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locales`
--
ALTER TABLE `locales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medios_de_pago`
--
ALTER TABLE `medios_de_pago`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modelos`
--
ALTER TABLE `modelos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `talles`
--
ALTER TABLE `talles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zapato`
--
ALTER TABLE `zapato`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `canales`
--
ALTER TABLE `canales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `colores`
--
ALTER TABLE `colores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `descuentos`
--
ALTER TABLE `descuentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `enviado`
--
ALTER TABLE `enviado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `facturadora`
--
ALTER TABLE `facturadora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `locales`
--
ALTER TABLE `locales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `medios_de_pago`
--
ALTER TABLE `medios_de_pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `modelos`
--
ALTER TABLE `modelos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `pago`
--
ALTER TABLE `pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `secciones`
--
ALTER TABLE `secciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `talles`
--
ALTER TABLE `talles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `zapato`
--
ALTER TABLE `zapato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
