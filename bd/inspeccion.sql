-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-03-2018 a las 15:43:37
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inspeccion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inspeccion`
--

CREATE TABLE `inspeccion` (
  `id_inspeccion` int(10) NOT NULL,
  `fk_id_user_cliente` int(10) NOT NULL,
  `fk_id_user_inspector` int(10) NOT NULL,
  `date_inspeccion` datetime NOT NULL,
  `tipo_inspeccion` tinyint(1) NOT NULL COMMENT '1:CheckIn; 2:CheckOut',
  `fk_id_inspeccion` int(10) NOT NULL COMMENT 'Para los  checkout',
  `nevecon` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `televisor` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `lavadora` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `mueble` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `sofa` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `almohadas_sofa` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `licuadora` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `sandwichera` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `vajilla` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `vasos` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `copas` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `control_rojo` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `control_samsung` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `control_westinghouse` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `control_blanco` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `decodificadores` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `internet` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `router` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `sensor` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `camara` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `sirena` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `ollas` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `chocolatera` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `hoja_bedul` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `bandeja` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `colador` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `rayador` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `guante` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `limpiones` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `cucharones` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `cucharones2` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `descorchador` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `cuchillos` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `contenedores` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `microondas` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `arreglo` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `papelera` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `toalla` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `toalla_mano` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `toalla_grande` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `dispensador` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `adornos` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `nodos_single` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `cama_twin` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `cama_queen` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `cama_king` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `nidos_queen` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `almohadas_camas` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `sabanas` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `sala` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `mesa_centro` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `balde` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `escoba` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `recojedor` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `trapero` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `sombrilla` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `tapete` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `extintor` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `botiquin` tinyint(1) NOT NULL COMMENT '1:Ok; 2: Falta',
  `observaciones` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `param_rol`
--

CREATE TABLE `param_rol` (
  `id_rol` int(1) NOT NULL,
  `rol_name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `param_rol`
--

INSERT INTO `param_rol` (`id_rol`, `rol_name`, `description`) VALUES
(1, 'SUPER ADMIN', 'Con acceso a todo el sistema'),
(2, 'ADMIN', 'Acceso como administrador'),
(3, 'INSPECTOR', 'Encargado de hacer las inspecciones'),
(4, 'CLIENTE', 'Persona que reservo el apartamento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `log_user` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `fk_id_rol` int(1) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `movil` varchar(12) NOT NULL,
  `password` varchar(50) NOT NULL,
  `state` int(1) NOT NULL DEFAULT '0' COMMENT '0: newUser; 1:active; 2:inactive',
  `photo` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `first_name`, `last_name`, `log_user`, `email`, `fk_id_rol`, `birthdate`, `movil`, `password`, `state`, `photo`, `address`) VALUES
(1, 'BENJAMIN', 'MOTTA GONZALEZ', 'bmottag', 'benmotta@gmail.com', 1, '2018-03-19', '4033089921', '25f9e794323b453885f5181f1b624d0b', 1, '', ''),
(2, 'FABIAN', 'VILLAMIL', 'fvillamil', 'fabian@v-contracting.com', 4, '0000-00-00', '4033990160', 'e10adc3949ba59abbe56e057f20f883e', 1, '', ''),
(3, 'INSPECTOR', 'PRUEBAS', 'inspector', 'inspector@gmail.coom', 4, '2018-03-27', '3156953740', 'e10adc3949ba59abbe56e057f20f883e', 1, '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `inspeccion`
--
ALTER TABLE `inspeccion`
  ADD PRIMARY KEY (`id_inspeccion`),
  ADD KEY `fk_id_user_cliente` (`fk_id_user_cliente`),
  ADD KEY `fk_id_user_inspector` (`fk_id_user_inspector`),
  ADD KEY `tipo_inspeccion` (`tipo_inspeccion`),
  ADD KEY `fk_id_inspeccion` (`fk_id_inspeccion`);

--
-- Indices de la tabla `param_rol`
--
ALTER TABLE `param_rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `log_user` (`log_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_id_rol` (`fk_id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `inspeccion`
--
ALTER TABLE `inspeccion`
  MODIFY `id_inspeccion` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `param_rol`
--
ALTER TABLE `param_rol`
  MODIFY `id_rol` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
