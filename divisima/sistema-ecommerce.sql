-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 25-11-2019 a las 13:15:48
-- Versión del servidor: 5.7.21
-- Versión de PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema-ecommerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `IdCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `NombreCategoria` varchar(256) NOT NULL,
  PRIMARY KEY (`IdCategoria`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`IdCategoria`, `NombreCategoria`) VALUES
(1, 'Celular'),
(2, 'Computadora'),
(3, 'Auricular');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcimagenslider`
--

DROP TABLE IF EXISTS `direcimagenslider`;
CREATE TABLE IF NOT EXISTS `direcimagenslider` (
  `IdDireccionImagenSlider` int(11) NOT NULL AUTO_INCREMENT,
  `IdSlider` int(11) NOT NULL,
  `DireccionImagen` varchar(256) NOT NULL,
  PRIMARY KEY (`IdDireccionImagenSlider`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `direcimagenslider`
--

INSERT INTO `direcimagenslider` (`IdDireccionImagenSlider`, `IdSlider`, `DireccionImagen`) VALUES
(1, 1, 'Slider1'),
(2, 1, 'Slider2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `IdProducto` int(11) NOT NULL AUTO_INCREMENT,
  `NombreProducto` varchar(256) NOT NULL,
  `CodigoProducto` varchar(256) NOT NULL,
  `Precio` float NOT NULL,
  `Descuento` int(11) NOT NULL,
  `StockMinimo` int(11) NOT NULL,
  `StockActual` int(11) NOT NULL,
  `IdCategoria` int(11) NOT NULL,
  `NombreFoto` varchar(256) NOT NULL,
  `DireccionFoto` varchar(256) NOT NULL,
  `NombreVideo` varchar(256) DEFAULT NULL,
  `DireccionVideo` varchar(256) DEFAULT NULL,
  `DescripcionCorta` varchar(256) DEFAULT NULL,
  `DescripcionLarga` varchar(256) DEFAULT NULL,
  `Destacado` tinyint(1) NOT NULL,
  `OnSale` tinyint(1) NOT NULL,
  `MostrarHome` tinyint(1) NOT NULL,
  PRIMARY KEY (`IdProducto`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`IdProducto`, `NombreProducto`, `CodigoProducto`, `Precio`, `Descuento`, `StockMinimo`, `StockActual`, `IdCategoria`, `NombreFoto`, `DireccionFoto`, `NombreVideo`, `DireccionVideo`, `DescripcionCorta`, `DescripcionLarga`, `Destacado`, `OnSale`, `MostrarHome`) VALUES
(1, 'A9', '#TA9-2019', 399.99, 100, 10, 20, 1, 'fotoA9', 'img/product/a9.jpg', NULL, NULL, 'Algo', 'muchos algos', 0, 1, 1),
(2, 'VIVO XI+', '#TVXI-2019', 299.99, 100, 8, 21, 1, 'fotoVivoXI', 'img/product/bluvivoxiplus.jpg', NULL, NULL, NULL, NULL, 0, 1, 1),
(4, 'A 70', '#TA70', 299, 100, 10, 12, 1, 'a70', 'img/product/a70.jpg', NULL, NULL, 'Celular samsung', NULL, 0, 0, 1),
(5, 'iPhone 11', '#TiPhone11', 399, 100, 10, 12, 1, 'iPhone11', 'img/product/iPhone11.jpg', NULL, NULL, 'iPhone', NULL, 0, 0, 1),
(6, 'S 10', '#TS10', 299, 100, 13, 4, 1, 's10', 'img/product/s10.jpg', NULL, NULL, 'samsung', NULL, 0, 0, 1),
(7, 'Mc Bookpro', '#Cmcbookpro', 1500, 100, 3, 14, 2, 'mcbookpro', 'img/product/mcbookpro', NULL, NULL, 'mcbookpro', NULL, 1, 0, 1),
(8, 'Samsung Rocket', '#Csamsungrocket', 2000, 100, 3, 14, 2, 'samsungrocket', 'img/product/samsungrocket', NULL, NULL, 'samsungrocket', NULL, 1, 0, 1),
(9, 'Samsung Buds', '#Asamsungbuds', 150, 100, 20, 40, 3, 'samsungbuds', 'img/product/samsungbuds.jfif', NULL, NULL, 'Auriculares samsung', NULL, 0, 1, 1),
(10, 'Sound Peats', '#Asoundpeats', 100, 100, 20, 40, 3, 'soundpeats', 'img/product/soundpeats.jpg', NULL, NULL, 'Auriculares SoundPeats', NULL, 0, 1, 1),
(11, 'iPhone Buds', '#Aiphonebuds', 150, 100, 20, 40, 3, 'iphonebuds', 'img/product/iphonebuds.jpg', NULL, NULL, 'Auriculares iPhone', NULL, 0, 1, 1),
(12, 'Razer Headphones', '#Arazerheadphones', 200, 100, 20, 40, 3, 'razerheadphones', 'img/product/razerheadphones.jpg', NULL, NULL, 'Auriculares Razer', NULL, 0, 1, 1),
(13, 'JBLHeadphones', '#Ajblheadphones', 250, 100, 20, 40, 3, 'jblheadphones', 'img/product/jblheadphones.jpg', NULL, NULL, 'Auriculares JBL', NULL, 0, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider` (
  `IdSlider` int(11) NOT NULL AUTO_INCREMENT,
  `NombreSlider` varchar(255) NOT NULL,
  `FotoSlider` varchar(255) NOT NULL,
  PRIMARY KEY (`IdSlider`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `IdUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `NombreUsuario` varchar(256) NOT NULL,
  `ApellidoUsuario` varchar(256) NOT NULL,
  `Mail` varchar(256) NOT NULL,
  `Contraseña` varchar(256) NOT NULL,
  PRIMARY KEY (`IdUsuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
