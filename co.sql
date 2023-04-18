-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-04-2023 a las 20:23:47
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `co`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `idArea` int(11) NOT NULL,
  `nombreArea` varchar(150) NOT NULL,
  `nombreTitular` varchar(150) NOT NULL,
  `apellidoPaternoTitular` varchar(150) NOT NULL,
  `apellidoMaternoTitular` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`idArea`, `nombreArea`, `nombreTitular`, `apellidoPaternoTitular`, `apellidoMaternoTitular`) VALUES
(1, 'Secretaria de Medio Ambiente', 'Juan Carlos', 'Contreras', 'Bautista'),
(2, 'Secretaria Particular', 'Gabriela Guadalupe', 'Aguirre', 'Colorado'),
(3, 'Coordinación de Asesores', 'Andrés', 'De la Rosa', 'Portilla'),
(4, 'Unidad Administrativa', 'Esteban', 'Ramírez', 'Gómez'),
(5, 'Departamento de Recursos Financieros', 'Karina', 'Domínguez', 'Flores'),
(6, 'Departamento de Recursos Humanos', 'Andrea del Mar', 'Peña', 'Ramos'),
(7, 'Departamento de Recursos Materiales y Servicios Generales', 'Edwin Abraham', 'Mendoza', 'Cortés'),
(8, 'Dirección Jurídica', 'Marcelino', 'Pérez', 'Rodríguez'),
(9, 'Unidad de Transparencia', 'Emma Angelica', 'Franco', 'Alor'),
(10, 'Unidad de Género', 'Kenia', 'Martínez', 'Badillo'),
(11, 'Subsecretaria de Cambio Climático y Gestión Ambiental', 'Andrea K’arolina', 'Hernández', 'Ginés'),
(12, 'Dirección de Vinculación Social y Cultura Ambiental', 'Brenda', 'Joan', 'Soto'),
(13, 'Departamento de Proyectos de Educación Ambiental', 'Ariana', 'Baizabal', 'Rivera'),
(14, 'Departamento de Proyectos de Vinculación', 'Iván', 'Mézquita', 'Alonso'),
(15, 'Dirección de Cambio Climático', 'Fernando', 'Ramírez', 'Ramírez'),
(16, 'Consultoría de Adaptación y Mitigación Climática', 'Rogelio', 'Ibañez', 'Cortes'),
(17, 'Consultoría de Gestión y Acción Climática', 'Esteban', 'Francisco', 'Ventura'),
(18, 'Dirección de Recursos Naturales', 'Magdaleno', 'Mendoza', 'Hernández'),
(19, 'Departamento de Planeación Ambiental y Ordenamiento Ecológico Territorial', 'Elvira', 'Rodríguez', 'Marcos'),
(20, 'Departamento de Conservación y Restauración de Recursos Naturales', 'Yureli', 'García', 'De La Cruz'),
(21, 'Dirección de Control de la Contaminación y Evaluación Ambiental', 'Adriana', 'Reyes', 'Toledo'),
(22, 'Departamento de Impacto y Riesgo Ambiental', 'Rudy Santiago', 'Mendez', 'Alamilla'),
(23, 'Departamento de Verificación Vehicular Obligatoria', 'Teodoro', 'Bravo', 'Gabriel'),
(24, 'Departamento de Gestión Industrial', 'Osmar Emmanuel', 'Ayala', 'Chora'),
(25, 'Departamento de Gestión de Residuos', 'Jorge Antonio', 'Pérez', 'Hernández'),
(26, 'Dirección de Desarrollo Forestal', 'Carlos Augusto', 'Robles', 'Guadarrama'),
(27, 'Departamento de Regulación y Protección Forestal', 'Carlos Alberto', 'Martínez', 'Hernández'),
(28, 'Departamento de Producción y Desarrollo Forestal', 'Ascención Enrique', 'Trujillo', 'Rosas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `idEmpleado` int(11) NOT NULL,
  `nombreEmpleado` varchar(150) NOT NULL,
  `apellidoPaternoEmpleado` varchar(150) NOT NULL,
  `apellidoMaternoEmpleado` varchar(150) NOT NULL,
  `numeroEmpleado` int(11) NOT NULL,
  `userEmpleado` varchar(150) NOT NULL,
  `passEmpleado` varchar(150) NOT NULL,
  `idPuestoEmpleado` int(11) NOT NULL,
  `idArea` int(11) NOT NULL,
  `idTipoEmpleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`idEmpleado`, `nombreEmpleado`, `apellidoPaternoEmpleado`, `apellidoMaternoEmpleado`, `numeroEmpleado`, `userEmpleado`, `passEmpleado`, `idPuestoEmpleado`, `idArea`, `idTipoEmpleado`) VALUES
(1, 'Ulises Jalil', 'Rivadeneyra', 'Contreras', 12345, 'urivadeneyra', '-Rivadeneyra1', 1, 4, 1),
(2, 'Yendhi Jhoana', 'Kovac', 'Parroquin', 1, 'yendhikovac', '-Kovac94', 1, 4, 1),
(31, 'Janeth', 'Landa', 'Cortina', 123, 'jlanda', 'Landa', 1, 8, 2),
(32, 'Grecia', 'Barcenas', 'Landa', 12, 'gbarcenas', '-Barcenas1', 1, 9, 1),
(33, 'Raquel', 'Fentanes', 'Rodriguez', 956, 'rfentanes', 'Fenta', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus`
--

CREATE TABLE `estatus` (
  `idEstatus` int(11) NOT NULL,
  `tipoEstatus` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estatus`
--

INSERT INTO `estatus` (`idEstatus`, `tipoEstatus`) VALUES
(1, 'Contestado'),
(2, 'Pendiente'),
(3, 'Entregado'),
(4, 'Recibido'),
(5, 'Turnado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oficio`
--

CREATE TABLE `oficio` (
  `idOficio` int(11) NOT NULL,
  `folioOficio` varchar(150) NOT NULL,
  `fechaOficio` date NOT NULL,
  `fechaIngresoOficio` date NOT NULL,
  `fechaRegistroOficio` date NOT NULL,
  `folioOficioExterno` varchar(150) NOT NULL,
  `asuntoOficio` varchar(250) NOT NULL,
  `nombreEmpresa` varchar(150) NOT NULL,
  `nombrePromovente` varchar(150) NOT NULL,
  `apellidoPaternoPromovente` varchar(150) NOT NULL,
  `apellidoMaternoPromovente` varchar(150) NOT NULL,
  `anexoOficio` varchar(150) NOT NULL,
  `idTipoDocumento` int(11) NOT NULL,
  `idTipoPromovente` int(11) NOT NULL,
  `idEmpleado` int(11) NOT NULL,
  `idArea` int(11) NOT NULL,
  `idEstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `oficio`
--

INSERT INTO `oficio` (`idOficio`, `folioOficio`, `fechaOficio`, `fechaIngresoOficio`, `fechaRegistroOficio`, `folioOficioExterno`, `asuntoOficio`, `nombreEmpresa`, `nombrePromovente`, `apellidoPaternoPromovente`, `apellidoMaternoPromovente`, `anexoOficio`, `idTipoDocumento`, `idTipoPromovente`, `idEmpleado`, `idArea`, `idEstatus`) VALUES
(5, '2/2022', '2022-11-04', '2022-11-10', '2022-11-10', 'N/A', 'Solicitud de Plantas', 'Toyota Xalapa', 'Daniel', 'Hernandez', 'Hernandez', 'N/A', 5, 2, 1, 18, 2),
(16, '3/2022', '2022-11-10', '2022-11-10', '2022-11-10', 'N/A', 'Impacto Ambiental', 'Kov\'St Group', 'Yendhi Jhoana', 'Kovac', '', 'N/A', 5, 2, 1, 15, 1),
(19, '1/2022', '2022-11-14', '2022-11-14', '2022-11-14', 'NA', 'Solicitud de Plantas', 'NA', 'Daniel', 'Hernandez', '', 'NA', 2, 2, 2, 1, 1),
(23, 'SEDEMA-01/2023', '2023-04-18', '2023-04-18', '2023-04-18', 'H1-C34/2023', 'Solicitud de Impacto Ambiental', 'Organo Interno de Control', 'Yendhi Jhoana', 'Kovac', '', 'Escritura Publica', 2, 1, 31, 15, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puesto`
--

CREATE TABLE `puesto` (
  `idPuestoEmpleado` int(11) NOT NULL,
  `puestoEmpleado` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `puesto`
--

INSERT INTO `puesto` (`idPuestoEmpleado`, `puestoEmpleado`) VALUES
(1, 'Jefe de Oficina'),
(2, 'Tecnico Ambiental'),
(3, 'Analista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocumento`
--

CREATE TABLE `tipodocumento` (
  `idTipoDocumento` int(11) NOT NULL,
  `tipoDocumento` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipodocumento`
--

INSERT INTO `tipodocumento` (`idTipoDocumento`, `tipoDocumento`) VALUES
(1, 'Circular'),
(2, 'Impacto Ambiental'),
(3, 'Invitación'),
(4, 'Notificación'),
(5, 'Oficio'),
(6, 'Otro'),
(7, 'Paquete'),
(8, 'Sobre'),
(9, 'Tarjeta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoempleado`
--

CREATE TABLE `tipoempleado` (
  `idTipoEmpleado` int(11) NOT NULL,
  `tipoEmpleado` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipoempleado`
--

INSERT INTO `tipoempleado` (`idTipoEmpleado`, `tipoEmpleado`) VALUES
(1, 'A'),
(2, 'SP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopromovente`
--

CREATE TABLE `tipopromovente` (
  `idTipoPromovente` int(11) NOT NULL,
  `tipoPromovente` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipopromovente`
--

INSERT INTO `tipopromovente` (`idTipoPromovente`, `tipoPromovente`) VALUES
(1, 'Dependencia'),
(2, 'Empresa'),
(3, 'Particular');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`idArea`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`idEmpleado`),
  ADD KEY `idPuestoEmpleado` (`idPuestoEmpleado`),
  ADD KEY `idArea` (`idArea`),
  ADD KEY `idTipoEmpleado` (`idTipoEmpleado`);

--
-- Indices de la tabla `estatus`
--
ALTER TABLE `estatus`
  ADD PRIMARY KEY (`idEstatus`);

--
-- Indices de la tabla `oficio`
--
ALTER TABLE `oficio`
  ADD PRIMARY KEY (`idOficio`),
  ADD KEY `idTipoDocumento` (`idTipoDocumento`),
  ADD KEY `idTipoPromovente` (`idTipoPromovente`),
  ADD KEY `idEmpleado` (`idEmpleado`),
  ADD KEY `idAreaTurnar` (`idArea`),
  ADD KEY `idArea` (`idArea`),
  ADD KEY `idEstatus` (`idEstatus`);

--
-- Indices de la tabla `puesto`
--
ALTER TABLE `puesto`
  ADD PRIMARY KEY (`idPuestoEmpleado`);

--
-- Indices de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  ADD PRIMARY KEY (`idTipoDocumento`);

--
-- Indices de la tabla `tipoempleado`
--
ALTER TABLE `tipoempleado`
  ADD PRIMARY KEY (`idTipoEmpleado`);

--
-- Indices de la tabla `tipopromovente`
--
ALTER TABLE `tipopromovente`
  ADD PRIMARY KEY (`idTipoPromovente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `idArea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `idEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `estatus`
--
ALTER TABLE `estatus`
  MODIFY `idEstatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `oficio`
--
ALTER TABLE `oficio`
  MODIFY `idOficio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `puesto`
--
ALTER TABLE `puesto`
  MODIFY `idPuestoEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  MODIFY `idTipoDocumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tipoempleado`
--
ALTER TABLE `tipoempleado`
  MODIFY `idTipoEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipopromovente`
--
ALTER TABLE `tipopromovente`
  MODIFY `idTipoPromovente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_2` FOREIGN KEY (`idPuestoEmpleado`) REFERENCES `puesto` (`idPuestoEmpleado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empleados_ibfk_3` FOREIGN KEY (`idTipoEmpleado`) REFERENCES `tipoempleado` (`idTipoEmpleado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empleados_ibfk_4` FOREIGN KEY (`idArea`) REFERENCES `area` (`idArea`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `oficio`
--
ALTER TABLE `oficio`
  ADD CONSTRAINT `oficio_ibfk_1` FOREIGN KEY (`idTipoDocumento`) REFERENCES `tipodocumento` (`idTipoDocumento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `oficio_ibfk_3` FOREIGN KEY (`idTipoPromovente`) REFERENCES `tipopromovente` (`idTipoPromovente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `oficio_ibfk_4` FOREIGN KEY (`idEmpleado`) REFERENCES `empleados` (`idEmpleado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `oficio_ibfk_5` FOREIGN KEY (`idArea`) REFERENCES `area` (`idArea`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `oficio_ibfk_6` FOREIGN KEY (`idEstatus`) REFERENCES `estatus` (`idEstatus`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
