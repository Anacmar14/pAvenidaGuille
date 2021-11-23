-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2021 a las 01:51:49
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `avenida`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajas`
--

CREATE TABLE `cajas` (
  `cjid` int(11) NOT NULL,
  `cjfecha` date NOT NULL DEFAULT current_timestamp(),
  `cjmontoincial` double NOT NULL,
  `cjcierre` int(11) NOT NULL,
  `cjsaldo` double NOT NULL,
  `cjtoting` double NOT NULL,
  `cjtotegr` double NOT NULL,
  `cjtotalingmov` double NOT NULL,
  `cjtotalegrmov` double NOT NULL,
  `cjfechahoracierre` datetime NOT NULL,
  `empid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cajas`
--

INSERT INTO `cajas` (`cjid`, `cjfecha`, `cjmontoincial`, `cjcierre`, `cjsaldo`, `cjtoting`, `cjtotegr`, `cjtotalingmov`, `cjtotalegrmov`, `cjfechahoracierre`, `empid`) VALUES
(0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', 1),
(1, '2021-11-01', 500, 0, 0, 0, 0, 0, 0, '2021-11-01 00:00:00', 2),
(33, '2021-10-10', 5000, 1, 432, 300, 200, 0, 0, '0000-00-00 00:00:00', 1),
(94, '2021-10-10', 1000, 1, 1350, 350, 693, 0, 0, '2021-11-15 07:22:00', 33),
(95, '2021-11-15', 5000, 1, 5600, 1200, 600, 100, 100, '2021-11-15 08:44:00', 33),
(96, '2021-11-16', 7000, 1, 4500, 1100, 3600, 100, 100, '2021-11-16 03:43:00', 33),
(98, '2021-11-17', 5000, 1, 1340, 640, 4000, 100, 400, '2021-11-17 04:40:00', 33),
(99, '2021-11-18', 5000, 1, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', 1),
(103, '2021-11-19', 5000, 1, 685, 1035, 8000, 2750, 100, '2021-11-19 11:17:00', 33),
(104, '2021-11-20', 7000, 1, 7000, 0, 0, 0, 0, '2021-11-20 11:15:00', 33),
(106, '2021-11-21', 7000, 0, 10850, 4950, 800, 100, 400, '2021-11-21 10:27:00', 33),
(107, '2021-11-22', 7000, 1, 7400, 2650, 4200, 2000, 50, '2021-11-22 09:38:00', 33);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `caid` int(11) NOT NULL,
  `canom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`caid`, `canom`) VALUES
(1, 'Bebida s/alcohol'),
(2, 'Bebida c/alcohol'),
(3, 'Comida al plato'),
(4, 'Comida Rapida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `clid` int(11) NOT NULL,
  `clnom` varchar(50) NOT NULL,
  `clemail` varchar(50) NOT NULL,
  `cldire` varchar(60) NOT NULL,
  `cltele` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`clid`, `clnom`, `clemail`, `cldire`, `cltele`) VALUES
(0, 'S/C', '', '', ''),
(1, 'Macaulay Montero', 'macaulaymontero@hotmail.com', '657-7789 A Ave', '077-028-1518'),
(2, 'Cally Muñoz', 'callymuoz2564@hotmail.com', '1646 Urna. Rd.', '039-620-4052'),
(3, 'Lev Gallego', 'levgallego@yahoo.com', 'Ap #479-6408 Lectus Ave', '042-456-2931'),
(4, 'September Garrido', 'septembergarrido5737@hotmail.net', '5581 Dictum Ave', '008-887-6923'),
(5, 'Giacomo Castro', 'giacomocastro7880@hotmail.net', '866-6010 Nunc Ave', '053-181-2326'),
(6, 'Kareem Cano', 'kareemcano2815@gmail.com', 'P.O. Box 988, 7587 Congue Rd.', '018-581-2099'),
(7, 'Tana Santana', 'tanasantana8710@hotmail.net', '499-2415 Turpis St.', '054-522-5536'),
(8, 'Tad Diaz', 'taddiaz8344@hotmail.ar', '2104 Tellus Rd.', '067-855-1842'),
(9, 'Macey Gallego', 'maceygallego9605@yahoo.com', '743-3195 Erat St.', '060-525-0664'),
(10, 'Coby Lozano', 'cobylozano@outlook.net', '802-5007 Nisl. Rd.', '043-474-1757'),
(11, 'Howard Fernandez', 'howardfernandez6817@hotmail.ar', '450-1510 Convallis Road', '023-686-6286'),
(12, 'Maisie Miguel', 'maisiemiguel8459@outlook.ar', 'P.O. Box 142, 4603 Justo. Road', '097-453-0612'),
(13, 'Amela Rubio', 'amelarubio910@yahoo.net', '3848 Et Rd.', '086-876-6719'),
(14, 'Keegan Merino', 'keeganmerino@yahoo.ar', 'Ap #674-7800 Sem Road', '041-753-8866'),
(15, 'Brent Medina', 'brentmedina@outlook.ar', '1129 Ut St.', '011-442-8383'),
(16, 'Zeph Miguel', 'zephmiguel@hotmail.net', 'P.O. Box 392, 437 Nunc Avenue', '079-460-4252'),
(17, 'Geraldine Moreno', 'geraldinemoreno6971@gmail.net', 'Ap #862-9378 Velit St.', '041-835-8535'),
(18, 'Lionel Ramirez', 'lionelramirez6930@hotmail.ar', 'Ap #456-1881 At, St.', '018-493-2256'),
(19, 'Rhoda Velasco', 'rhodavelasco2409@gmail.net', '589-4993 Lorem St.', '023-782-1352'),
(20, 'Christine Santana', 'christinesantana@outlook.com', '275-4462 Cursus Avenue', '075-710-2282'),
(21, 'Illana Medina', 'illanamedina8380@yahoo.com', 'Ap #760-4767 Tellus St.', '005-184-1843'),
(22, 'Ginger Andres', 'gingerandres2077@hotmail.com', '747-7787 Eu Rd.', '056-808-5701'),
(23, 'Beatrice Cruz', 'beatricecruz@outlook.ar', '669-1054 A, Street', '087-516-3158'),
(24, 'Ryan Paez', 'ryanez@outlook.ar', '1978 Nullam Av.', '062-576-3859'),
(25, 'Mara Serrano', 'maraserrano115@hotmail.ar', '565-4764 Ante. Street', '046-869-3818'),
(26, 'Timon Ruiz', 'timonruiz8978@gmail.net', '6672 Placerat. Rd.', '027-005-1581'),
(27, 'Riley Arias', 'rileyarias@gmail.ar', '8938 Lobortis. St.', '047-659-3571'),
(28, 'Kristen Duran', 'kristenduran@outlook.net', 'Ap #958-7286 Sagittis. Road', '011-820-5298'),
(29, 'Madison Calvo', 'madisoncalvo@gmail.com', 'P.O. Box 632, 6290 Eget, St.', '031-665-9155'),
(30, 'Cyrus Serrano', 'cyrusserrano@hotmail.ar', 'Ap #410-9376 Risus. Road', '013-184-4446'),
(31, 'Randall Garrido', 'randallgarrido@outlook.ar', 'Ap #149-248 Mi. Ave', '028-643-3663'),
(32, 'Bernard Gil', 'bernardgil4761@gmail.ar', '8848 Magnis Av.', '030-901-3136'),
(33, 'Mari Iglesias', 'mariiglesias9656@hotmail.com', '9144 Ultrices Avenue', '022-753-4826'),
(34, 'Carissa Lopez', 'carissalopez3323@gmail.net', '9854 Duis St.', '019-083-3630'),
(35, 'Summer Cruz', 'summercruz6215@hotmail.ar', 'Ap #298-5610 Nulla. Avenue', '077-598-5640'),
(36, 'Noelle Nieto', 'noellenieto6873@yahoo.ar', 'Ap #854-8709 Placerat Road', '073-835-8135'),
(37, 'Roanna Garrido', 'roannagarrido3724@hotmail.com', '474-3623 Turpis Avenue', '033-586-2158'),
(38, 'Byron Cruz', 'byroncruz@gmail.net', '528-1981 Suspendisse St.', '005-568-5685'),
(39, 'Kennedy Cortes', 'kennedycortes2176@gmail.net', 'P.O. Box 372, 7911 Odio, St.', '022-912-1721'),
(40, 'Travis Torres', 'travistorres@gmail.com', 'Ap #277-1608 A St.', '015-352-8084'),
(41, 'Nicole Marin', 'nicolemarin9535@hotmail.ar', 'Ap #442-9825 Orci Rd.', '016-199-6721'),
(42, 'Roth Aguilar', 'rothaguilar2435@gmail.net', '3741 Metus St.', '006-357-4610'),
(43, 'Alan Crespo', 'alancrespo@yahoo.net', '973-998 Purus, Av.', '010-108-3878'),
(44, 'Aiko Cruz', 'aikocruz@hotmail.ar', 'P.O. Box 351, 2492 Ipsum Rd.', '045-841-2581'),
(45, 'Len Serrano', 'lenserrano@hotmail.com', 'Ap #811-1956 Volutpat. St.', '089-391-5338'),
(46, 'Clarke Mora', 'clarkemora4576@gmail.ar', '916 At, St.', '017-437-3041'),
(47, 'Inez Blanco', 'inezblanco@hotmail.ar', 'Ap #320-7863 Enim, St.', '072-836-4141'),
(48, 'Devin Arias', 'devinarias3273@gmail.net', 'Ap #453-2565 Urna. Av.', '058-303-5441'),
(49, 'Hasad Moya', 'hasadmoya@hotmail.com', 'P.O. Box 450, 5720 Ut Rd.', '036-126-7396');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cocina`
--

CREATE TABLE `cocina` (
  `mesaid` int(11) NOT NULL,
  `fvid` int(11) NOT NULL,
  `estadococina` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `delivery`
--

CREATE TABLE `delivery` (
  `fvid` int(11) NOT NULL,
  `deliverydireccion` varchar(60) NOT NULL,
  `empid` int(11) NOT NULL,
  `deliveryestado` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `delivery`
--

INSERT INTO `delivery` (`fvid`, `deliverydireccion`, `empid`, `deliveryestado`, `created_at`, `updated_at`) VALUES
(64, 'asdas', 29, 4, '2021-10-14 16:51:13', '2021-11-21 15:21:02'),
(65, 'asdasd', 9, 4, '2021-10-05 16:51:53', '2021-11-21 15:25:40'),
(70, 'asdasd', 29, 4, '2021-10-12 16:51:23', '2021-11-21 18:48:18'),
(71, 'asdasdsad', 9, 2, '2021-10-04 11:21:09', '2021-11-21 17:08:40'),
(72, 'asdasd', 9, 4, '2021-11-20 16:51:31', '2021-11-21 18:55:13'),
(73, 'ASDASDSADASDASD', 9, 4, '2021-11-21 15:12:30', '2021-11-21 15:20:49'),
(74, 'ASDASDSADSADSAD', 29, 4, '2021-11-21 15:17:00', '2021-11-21 15:20:57'),
(75, 'Contisuyo 13', 29, 4, '2021-11-20 16:48:15', '2021-11-21 18:55:55'),
(80, 'asdasdasd', 29, 4, '2021-11-21 21:42:53', '2021-11-21 21:51:48'),
(86, 'asdasd', 29, 4, '2021-12-12 13:40:38', '2021-11-21 21:53:45'),
(88, 'asdsadsad', 9, 4, '2021-11-21 19:02:41', '2021-11-21 19:02:45'),
(96, 'Contiyuso 12', 29, 4, '2021-11-21 20:02:05', '2021-11-21 20:03:19'),
(100, 'sadasdasd', 9, 4, '2021-11-21 21:38:00', '2021-11-21 21:57:02'),
(101, 'asdasdsa', 29, 4, '2021-11-21 21:39:51', '2021-11-21 22:16:51'),
(102, 'asdsadas', 9, 4, '2021-11-21 21:53:40', '2021-11-22 13:03:06'),
(105, 'asdsadsad', 9, 4, '2021-11-21 21:40:13', '2021-11-22 13:03:08'),
(111, 'Contisuyo 12', 29, 4, '2021-11-22 14:18:44', '2021-11-22 14:20:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deliverytiposestados`
--

CREATE TABLE `deliverytiposestados` (
  `deliverytipo` int(11) NOT NULL,
  `deliverydescripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `deliverytiposestados`
--

INSERT INTO `deliverytiposestados` (`deliverytipo`, `deliverydescripcion`) VALUES
(1, 'Asignado'),
(2, 'Entregado a Delivery'),
(3, 'En Camino'),
(4, 'Finalizado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallescompras`
--

CREATE TABLE `detallescompras` (
  `dcorden` int(11) NOT NULL,
  `fcid` int(11) NOT NULL,
  `proid` int(11) NOT NULL,
  `dccantidad` int(11) NOT NULL,
  `dcpreciounitario` double NOT NULL,
  `dcpreciototal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detallescompras`
--

INSERT INTO `detallescompras` (`dcorden`, `fcid`, `proid`, `dccantidad`, `dcpreciounitario`, `dcpreciototal`) VALUES
(1, 1, 26, 1, 333, 333),
(1, 4, 62, 1, 200, 200),
(1, 5, 62, 10, 200, 2000),
(1, 6, 53, 20, 100, 2000),
(1, 7, 1, 10, 400, 4000),
(1, 8, 1, 1, 400, 400),
(1, 9, 62, 1, 200, 200),
(1, 10, 62, 3, 200, 600),
(1, 11, 1, 5, 400, 2000),
(1, 12, 62, 20, 200, 4000),
(1, 13, 1, 1, 400, 400),
(1, 14, 2, 1, 400, 400),
(1, 15, 17, 20, 400, 8000),
(1, 16, 1, 1, 400, 400),
(1, 17, 5, 12, 350, 4200),
(2, 2, 36, 1, 150, 150),
(2, 11, 2, 3, 400, 1200),
(2, 14, 1, 1, 400, 400),
(2, 16, 2, 1, 400, 400),
(3, 11, 3, 1, 400, 400);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallesventas`
--

CREATE TABLE `detallesventas` (
  `dvorden` int(11) NOT NULL,
  `fvid` int(11) NOT NULL,
  `proid` int(11) NOT NULL,
  `dvcantidad` int(11) NOT NULL,
  `dvpreciounitario` double NOT NULL,
  `dcpreciototal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detallesventas`
--

INSERT INTO `detallesventas` (`dvorden`, `fvid`, `proid`, `dvcantidad`, `dvpreciounitario`, `dcpreciototal`) VALUES
(1, 53, 1, 1, 400, 400),
(1, 54, 1, 5, 400, 2000),
(1, 55, 21, 1, 350, 350),
(1, 56, 1, 1, 400, 400),
(1, 57, 1, 10, 400, 4000),
(1, 58, 1, 5, 400, 2000),
(1, 59, 1, 1, 400, 400),
(1, 60, 1, 1, 400, 400),
(1, 61, 1, 2, 400, 800),
(1, 62, 1, 4, 400, 1600),
(1, 63, 1, 4, 400, 1600),
(1, 64, 1, 1, 400, 400),
(1, 65, 2, 1, 400, 400),
(1, 70, 13, 1, 400, 400),
(1, 71, 18, 1, 280, 280),
(1, 72, 1, 1, 400, 400),
(1, 73, 1, 1, 400, 400),
(1, 74, 1, 1, 400, 400),
(1, 75, 2, 1, 400, 400),
(1, 76, 5, 1, 350, 350),
(1, 77, 1, 3, 400, 1200),
(1, 78, 4, 1, 350, 350),
(1, 79, 1, 1, 400, 400),
(1, 80, 1, 1, 400, 400),
(1, 81, 1, 1, 400, 400),
(1, 84, 4, 1, 350, 350),
(1, 85, 4, 1, 350, 350),
(1, 86, 1, 2, 400, 800),
(1, 87, 1, 1, 400, 400),
(1, 88, 4, 1, 350, 350),
(1, 89, 13, 1, 400, 400),
(1, 90, 22, 1, 400, 400),
(1, 91, 1, 2, 400, 800),
(1, 92, 1, 1, 400, 400),
(1, 93, 1, 1, 400, 400),
(1, 94, 17, 1, 400, 400),
(1, 95, 62, 1, 200, 200),
(1, 96, 3, 1, 400, 400),
(1, 97, 2, 1, 400, 400),
(1, 98, 2, 1, 400, 400),
(1, 99, 1, 1, 400, 400),
(1, 100, 1, 1, 400, 400),
(1, 101, 2, 1, 400, 400),
(1, 102, 4, 1, 350, 350),
(1, 103, 4, 1, 350, 350),
(1, 104, 1, 1, 400, 400),
(1, 105, 18, 1, 280, 280),
(1, 106, 22, 1, 400, 400),
(1, 107, 1, 1, 400, 400),
(1, 108, 4, 1, 350, 350),
(1, 109, 4, 1, 350, 350),
(1, 110, 4, 1, 350, 350),
(1, 111, 4, 1, 350, 350),
(1, 112, 1, 1, 400, 400),
(1, 113, 1, 1, 400, 400),
(1, 114, 1, 1, 400, 400),
(1, 115, 1, 1, 400, 400),
(1, 116, 1, 1, 400, 400),
(1, 117, 48, 1, 100, 100),
(1, 118, 48, 1, 100, 100),
(1, 119, 48, 1, 100, 100),
(1, 120, 48, 1, 100, 100),
(2, 53, 2, 1, 400, 400),
(2, 54, 2, 7, 400, 2800),
(2, 55, 22, 1, 400, 400),
(2, 60, 2, 1, 400, 400),
(2, 61, 2, 2, 400, 800),
(2, 78, 5, 1, 350, 350),
(2, 79, 2, 1, 400, 400),
(2, 81, 2, 1, 400, 400),
(2, 85, 3, 1, 400, 400),
(2, 86, 4, 1, 350, 350),
(2, 92, 2, 1, 400, 400),
(2, 101, 3, 1, 400, 400),
(2, 102, 3, 1, 400, 400),
(2, 103, 5, 1, 350, 350),
(2, 104, 2, 1, 400, 400),
(2, 105, 19, 1, 300, 300),
(2, 106, 23, 1, 400, 400),
(2, 117, 49, 1, 100, 100),
(2, 118, 49, 1, 100, 100),
(2, 119, 49, 1, 100, 100),
(3, 54, 3, 9, 400, 3600),
(3, 55, 23, 1, 400, 400),
(3, 60, 3, 1, 400, 400),
(3, 78, 3, 1, 400, 400),
(3, 106, 24, 1, 400, 400),
(3, 117, 50, 1, 100, 100),
(3, 118, 50, 1, 100, 100),
(3, 119, 50, 1, 100, 100),
(4, 54, 4, 9, 350, 3150),
(4, 55, 24, 1, 400, 400),
(4, 60, 4, 1, 350, 350),
(5, 54, 5, 9, 350, 3150),
(5, 55, 25, 1, 400, 400),
(5, 60, 5, 1, 350, 350);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `empid` int(11) NOT NULL,
  `empnom` varchar(50) NOT NULL,
  `empemail` varchar(50) NOT NULL,
  `emptag` varchar(50) NOT NULL,
  `empkey` varchar(50) NOT NULL,
  `emprol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`empid`, `empnom`, `empemail`, `emptag`, `empkey`, `emprol`) VALUES
(0, '', '', '', '', 4),
(1, 'Dalton Aguilar', 'daltonaguilar3128@protonmail.com', 'DaltonA', '2e99bf4e42962410038bc6fa4ce40d97', 1),
(2, 'Amos Gimenez', 'amosgimenez@icloud.net', 'AmosG', '30ed55b89373c25492993b3d004440ff', 13),
(3, 'Kyla Crespo', 'kylacrespo7098@icloud.org', 'KylaC', 'ec6a6536ca304edf844d1d248a4f08dc', 2),
(4, 'Lucy Castro', 'lucycastro@yahoo.org', 'LucyC', 'ec6a6536ca304edf844d1d248a4f08dc', 2),
(5, 'Nico', 'niconiconico@google.ca', 'Nico', '202cb962ac59075b964b07152d234b70', 13),
(6, 'Meli', 'melimeli@aol.ca', 'Meli', '202cb962ac59075b964b07152d234b70', 12),
(9, 'Ber', 'berberber@hotmail.ca', 'Ber', '7363a0d0604902af7b70b271a0b96480', 8),
(29, 'Nacho', 'nacho@gmail.com', 'Nacho', '7363a0d0604902af7b70b271a0b96480', 8),
(33, 'admin', 'admin@admin.gmail', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(50, 'Matias', 'matias@gmail.com', 'Mati', '202cb962ac59075b964b07152d234b70', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturascompras`
--

CREATE TABLE `facturascompras` (
  `fcid` int(11) NOT NULL,
  `provid` int(11) NOT NULL,
  `cjid` int(11) NOT NULL,
  `fcfechahora` timestamp NOT NULL DEFAULT current_timestamp(),
  `fctotal` double NOT NULL,
  `is_delete` int(11) NOT NULL,
  `is_check` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `facturascompras`
--

INSERT INTO `facturascompras` (`fcid`, `provid`, `cjid`, `fcfechahora`, `fctotal`, `is_delete`, `is_check`) VALUES
(1, 1, 33, '2021-11-06 20:53:21', 333, 0, 1),
(2, 2, 33, '2021-11-06 21:00:36', 150, 1, 1),
(3, 1, 1, '2021-11-09 17:01:31', 2000, 1, 0),
(4, 1, 1, '2021-11-09 17:12:42', 200, 1, 0),
(5, 1, 1, '2021-11-09 17:13:59', 2000, 0, 1),
(6, 4, 1, '2021-11-09 17:53:33', 2000, 0, 1),
(7, 0, 1, '2021-11-11 19:57:49', 4000, 0, 1),
(8, 0, 1, '2021-11-11 20:10:42', 400, 0, 1),
(9, 1, 94, '2021-11-15 22:58:36', 200, 0, 1),
(10, 1, 95, '2021-11-15 23:00:48', 600, 0, 1),
(11, 0, 96, '2021-11-16 14:55:27', 3600, 1, 0),
(12, 1, 98, '2021-11-17 19:33:29', 4000, 0, 1),
(15, 0, 103, '2021-11-20 00:55:05', 8000, 0, 1),
(16, 0, 106, '2021-11-21 22:01:08', 800, 0, 1),
(17, 0, 107, '2021-11-22 16:04:21', 4200, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturasventas`
--

CREATE TABLE `facturasventas` (
  `fvid` int(11) NOT NULL,
  `clid` int(11) NOT NULL,
  `cjid` int(11) NOT NULL,
  `fvfechahora` datetime NOT NULL,
  `fvdescuento` int(11) NOT NULL,
  `fvsubtotal` double NOT NULL,
  `fvtotal` double NOT NULL,
  `tipo` int(11) NOT NULL,
  `empid` int(11) NOT NULL,
  `is_delete` int(11) NOT NULL,
  `is_check` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `facturasventas`
--

INSERT INTO `facturasventas` (`fvid`, `clid`, `cjid`, `fvfechahora`, `fvdescuento`, `fvsubtotal`, `fvtotal`, `tipo`, `empid`, `is_delete`, `is_check`) VALUES
(53, 1, 1, '2021-08-01 21:28:59', 0, 800, 800, 0, 0, 0, 1),
(54, 0, 1, '2021-08-02 21:29:03', 0, 14700, 14700, 0, 0, 0, 1),
(55, 0, 1, '2021-09-03 21:28:54', 0, 1950, 1950, 0, 0, 1, 0),
(56, 0, 1, '2021-09-04 21:29:11', 0, 400, 400, 0, 0, 1, 0),
(57, 41, 1, '2021-09-11 21:29:19', 10, 4000, 3600, 0, 0, 1, 1),
(58, 0, 1, '2021-10-10 21:29:24', 15, 2000, 2000, 0, 0, 0, 1),
(59, 0, 1, '2021-10-11 21:29:28', 0, 400, 400, 0, 0, 0, 1),
(60, 47, 1, '2021-10-14 19:35:37', 10, 1900, 1710, 0, 0, 0, 1),
(61, 0, 1, '2021-10-15 18:02:15', 0, 1600, 1600, 0, 0, 0, 1),
(62, 2, 1, '2021-11-13 18:44:48', 0, 1600, 1600, 0, 0, 0, 1),
(63, 16, 1, '2021-11-13 19:51:29', 20, 1600, 1600, 2, 9, 0, 1),
(64, 0, 33, '2021-11-15 09:56:54', 0, 400, 400, 2, 29, 0, 1),
(65, 0, 33, '2021-11-15 09:56:59', 0, 400, 400, 2, 9, 0, 1),
(70, 0, 1, '2021-11-15 12:23:04', 0, 400, 400, 2, 29, 0, 1),
(71, 0, 1, '2021-11-15 12:27:02', 0, 280, 280, 2, 9, 0, 1),
(72, 0, 0, '2021-12-01 19:46:10', 0, 400, 400, 2, 9, 0, 1),
(73, 1, 0, '2021-11-15 19:48:07', 0, 400, 400, 2, 9, 0, 1),
(74, 0, 0, '2021-11-15 19:50:42', 0, 400, 400, 2, 29, 0, 1),
(75, 3, 0, '2021-11-15 19:51:46', 0, 400, 400, 2, 29, 0, 1),
(76, 22, 94, '2021-11-15 19:54:49', 0, 350, 350, 1, 6, 0, 0),
(77, 0, 95, '2021-11-15 20:00:32', 0, 1200, 1200, 0, 5, 0, 1),
(78, 0, 96, '2021-11-16 11:54:43', 0, 1100, 1100, 1, 5, 0, 0),
(79, 0, 98, '2021-11-17 16:31:42', 20, 800, 640, 0, 0, 0, 1),
(80, 0, 98, '2021-11-17 16:41:53', 0, 400, 400, 2, 29, 0, 1),
(81, 0, 98, '2021-11-17 19:16:06', 0, 800, 800, 0, 0, 1, 0),
(86, 0, 103, '2021-11-19 21:54:12', 10, 1150, 1035, 2, 29, 0, 1),
(87, 0, 106, '2021-11-21 19:00:34', 0, 400, 400, 0, 0, 0, 1),
(88, 0, 106, '2021-11-21 19:02:27', 0, 350, 350, 2, 9, 0, 1),
(89, 0, 106, '2021-11-21 19:03:10', 0, 400, 400, 1, 5, 0, 0),
(90, 0, 106, '2021-11-21 19:14:36', 0, 400, 400, 1, 5, 0, 1),
(91, 0, 106, '2021-11-21 19:16:12', 0, 800, 800, 1, 6, 0, 1),
(92, 0, 106, '2021-11-21 19:22:24', 0, 800, 800, 1, 5, 0, 1),
(93, 0, 106, '2021-11-21 19:34:08', 0, 400, 400, 1, 6, 0, 1),
(94, 0, 106, '2021-11-21 19:57:59', 0, 400, 400, 0, 0, 1, 0),
(95, 0, 106, '2021-11-21 19:58:46', 0, 200, 200, 0, 0, 0, 1),
(96, 0, 106, '2021-11-21 20:01:27', 0, 400, 400, 2, 29, 0, 1),
(97, 0, 106, '2021-11-21 20:04:19', 0, 400, 400, 1, 5, 0, 1),
(98, 0, 106, '2021-11-21 20:08:49', 0, 400, 400, 1, 6, 0, 0),
(99, 0, 106, '2021-11-21 20:13:33', 0, 400, 400, 0, 0, 0, 1),
(100, 0, 106, '2021-11-21 21:37:29', 0, 400, 400, 2, 9, 0, 1),
(101, 0, 106, '2021-11-21 21:38:50', 0, 800, 800, 2, 29, 0, 1),
(102, 0, 106, '2021-11-21 21:38:55', 0, 750, 750, 2, 9, 0, 1),
(103, 0, 106, '2021-11-21 21:38:59', 0, 700, 700, 1, 5, 0, 1),
(104, 0, 106, '2021-11-21 21:39:12', 0, 800, 800, 1, 5, 0, 1),
(105, 0, 106, '2021-11-21 21:39:16', 0, 580, 580, 2, 9, 0, 1),
(106, 0, 106, '2021-11-21 21:39:23', 20, 1200, 960, 1, 5, 0, 1),
(107, 0, 106, '2021-11-21 21:53:14', 0, 400, 400, 0, 0, 0, 1),
(108, 0, 107, '2021-11-22 13:05:18', 0, 350, 350, 0, 0, 0, 1),
(109, 0, 107, '2021-11-22 13:06:22', 0, 350, 350, 1, 5, 0, 0),
(110, 0, 107, '2021-11-22 14:17:35', 0, 350, 350, 0, 0, 0, 1),
(111, 0, 107, '2021-11-22 14:18:22', 0, 350, 350, 2, 29, 0, 1),
(112, 0, 107, '2021-11-22 14:21:27', 0, 400, 400, 1, 5, 0, 1),
(113, 0, 107, '2021-11-22 14:23:57', 0, 400, 400, 1, 5, 0, 1),
(114, 0, 107, '2021-11-22 16:39:05', 0, 400, 400, 0, 0, 0, 1),
(115, 0, 107, '2021-11-22 19:07:24', 0, 400, 400, 0, 0, 0, 1),
(116, 0, 107, '2021-11-22 19:38:25', 0, 400, 400, 0, 0, 1, 0),
(117, 0, 107, '2021-11-22 21:46:09', 0, 300, 300, 0, 0, 1, 0),
(118, 0, 107, '2021-11-22 21:46:34', 0, 300, 300, 0, 0, 1, 0),
(119, 0, 107, '2021-11-22 21:49:00', 0, 300, 300, 0, 0, 1, 0),
(120, 0, 107, '2021-11-22 21:49:55', 0, 100, 100, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

CREATE TABLE `mesas` (
  `mesaid` int(11) NOT NULL,
  `fvid` int(11) NOT NULL,
  `empid` int(11) NOT NULL,
  `mesaestado` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mesas`
--

INSERT INTO `mesas` (`mesaid`, `fvid`, `empid`, `mesaestado`, `created_at`, `updated_at`) VALUES
(1, 53, 0, 1, '2021-11-22 16:04:20', '2021-11-22 17:41:37'),
(2, 53, 0, 1, '2021-11-22 16:04:31', '2021-11-22 16:04:31'),
(3, 53, 0, 1, '2021-11-21 22:34:49', '2021-11-22 14:22:01'),
(4, 53, 0, 1, '2021-11-22 16:04:44', '2021-11-22 16:04:44'),
(5, 53, 0, 1, '2021-11-21 22:35:01', '2021-11-22 16:07:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `movid` int(11) NOT NULL,
  `movtipo` int(11) NOT NULL,
  `movdinero` double NOT NULL,
  `movdesc` varchar(100) NOT NULL,
  `cjid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `movimientos`
--

INSERT INTO `movimientos` (`movid`, `movtipo`, `movdinero`, `movdesc`, `cjid`) VALUES
(75, 1, 100, 'El cadete se deja el aginaldo', 95),
(76, 0, 100, 'El cadete se roba el aginaldo', 95),
(77, 1, 100, '100 pesos para la coca', 96),
(78, 0, 100, 'retirada de esos 100 pesos', 96),
(79, 1, 100, 'pesitos', 98),
(80, 0, 400, 'wsad', 98),
(85, 1, 100, 'no andas?', 103),
(86, 1, 2000, 'asd', 103),
(87, 1, 100, 'asd', 103),
(88, 1, 500, 'asd', 103),
(89, 1, 50, 'asdasd', 103),
(90, 0, 100, 'no andas?', 103),
(92, 1, 100, 'asdas', 106),
(93, 0, 100, 'asdasdasd', 106),
(94, 0, 100, 'no andas?', 106),
(95, 0, 100, 'asdasd', 106),
(96, 0, 100, 'asdasd', 106),
(98, 1, 2000, 'asd', 107),
(99, 0, 50, 'asd', 107);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `proid` int(11) NOT NULL,
  `procodigo` varchar(50) NOT NULL,
  `pronombre` varchar(50) NOT NULL,
  `caid` int(11) NOT NULL,
  `prostockactual` int(11) NOT NULL,
  `proprecio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`proid`, `procodigo`, `pronombre`, `caid`, `prostockactual`, `proprecio`) VALUES
(1, '', 'Lomo', 4, 50, 400),
(2, '', 'Lomo de Cerdo', 4, 34, 400),
(3, '', 'Lomo de Pollo', 4, 58, 400),
(4, '', 'Mila', 4, 173, 350),
(5, '', 'Mila de Cerdo', 4, 10, 350),
(6, '', 'Mila de Pollo', 4, 20, 350),
(7, '', 'Hamburguesa Super', 4, 20, 370),
(8, '', 'Hamburguesa Super Doble', 4, 20, 400),
(9, '', 'Hamburguesa Casera', 4, 20, 370),
(10, '', 'Hamburguesa Casera Doble', 4, 20, 400),
(11, '', 'Hamburguesa de Pollo', 4, 20, 370),
(12, '', 'Hamburguesa de Cerdo', 4, 20, 370),
(13, '', 'Matambre', 4, 78, 400),
(14, '', 'Matambre de Cerdo', 4, 20, 400),
(15, '', 'Bondiola de Cerdo', 4, 20, 400),
(16, '', 'Paty de Carne', 4, 20, 400),
(17, '', 'Paty de Pollo', 4, 40, 400),
(18, '', 'Pizza Muzza', 4, 18, 280),
(19, '', 'Pizza Especial', 4, 20, 300),
(20, '', 'Pizza Napolitana', 4, 20, 300),
(21, '', 'Pizza Fugazzeta', 4, 19, 350),
(22, '', 'Pizza Anchoas', 4, 18, 400),
(23, '', 'Pizza Provenzal', 4, 19, 400),
(24, '', 'Pizza Calabresa', 4, 19, 400),
(25, '', 'Pizza Roquefort', 4, 19, 400),
(26, '', 'Pizza Margarita', 4, 21, 400),
(27, '', 'Pizza Napolitana', 4, 20, 400),
(28, '', 'Pizza 4 Quesos', 4, 20, 400),
(29, '', 'Pizza Rucula y Jamon Crudo', 4, 20, 400),
(30, '', 'Milanesa c/papas', 3, 20, 400),
(31, '', 'Milanesa c/ensalada', 3, 20, 400),
(32, '', 'Milanesa c/arroz', 3, 20, 400),
(33, '', 'Milanesa napo c/papas', 3, 20, 400),
(34, '', 'Milanesa napo c/ensalada', 3, 20, 400),
(35, '', 'Milanesa napo c/arroz', 3, 20, 400),
(36, '', 'Milanesa de Pollo c/papas', 3, 21, 400),
(37, '', 'Milanesa de Pollo c/ensalada', 3, 20, 400),
(38, '', 'Milanesa de Pollo c/arroz', 3, 20, 400),
(39, '', 'Milanesa de Pollo napo c/papas', 3, 20, 400),
(40, '', 'Milanesa de Pollo napo c/ensalada', 3, 20, 400),
(41, '', 'Milanesa de Pollo napo c/arroz', 3, 20, 400),
(42, '', 'Milanesa de Cerdo c/papas', 3, 20, 400),
(43, '', 'Milanesa de Cerdo c/ensalada', 3, 20, 400),
(44, '', 'Milanesa de Cerdo c/arroz', 3, 20, 400),
(45, '', 'Milanesa de Cerdo napo c/papas', 3, 20, 400),
(46, '', 'Milanesa de Cerdo napo c/ensalada', 3, 20, 400),
(47, '', 'Milanesa de Cerdo napo c/arroz', 3, 20, 400),
(48, '', 'Coca-Cola 500ml', 1, 25, 100),
(49, '', 'Fanta 500ml', 1, 20, 100),
(50, '', 'Sprite 500ml', 1, 20, 100),
(51, '', 'Aquarius 500ml', 1, 20, 100),
(52, '', 'Agua s/gas 500ml', 1, 20, 100),
(53, '', 'Agua c/gas 500ml', 1, 40, 100),
(54, '', 'Coca-Cola 1lt', 1, 20, 200),
(55, '', 'Fanta 1lt', 1, 20, 200),
(56, '', 'Sprite 1lt', 1, 20, 200),
(57, '', 'Aquarius 1lt', 1, 20, 180),
(58, '', 'Agua s/gas 1lt', 1, 20, 180),
(59, '', 'Agua c/gas 1lt', 1, 20, 180),
(60, '', 'Cerveza Quilmes 375ml', 2, 20, 100),
(61, '', 'Cerveza Salta 375ml', 2, 20, 100),
(62, '', 'Cerveza Quilmes 1lt', 2, 62, 200),
(63, '', 'Cerveza Salta 1lt', 2, 20, 200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productosxproveedores`
--

CREATE TABLE `productosxproveedores` (
  `proid` int(11) NOT NULL,
  `provid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productosxproveedores`
--

INSERT INTO `productosxproveedores` (`proid`, `provid`) VALUES
(1, 0),
(2, 0),
(3, 0),
(4, 0),
(5, 0),
(6, 0),
(7, 0),
(8, 0),
(9, 0),
(10, 0),
(11, 0),
(12, 0),
(13, 0),
(14, 0),
(15, 0),
(16, 0),
(17, 0),
(18, 0),
(19, 0),
(20, 0),
(21, 0),
(22, 0),
(23, 0),
(24, 0),
(25, 0),
(26, 0),
(27, 0),
(28, 0),
(29, 0),
(30, 0),
(31, 0),
(32, 0),
(33, 0),
(34, 0),
(35, 0),
(36, 0),
(37, 0),
(38, 0),
(39, 0),
(40, 0),
(41, 0),
(42, 0),
(43, 0),
(44, 0),
(45, 0),
(46, 0),
(47, 0),
(48, 3),
(49, 3),
(50, 3),
(51, 3),
(52, 4),
(53, 4),
(54, 3),
(55, 3),
(56, 3),
(57, 3),
(58, 4),
(59, 4),
(60, 1),
(62, 1),
(61, 2),
(63, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `provid` int(11) NOT NULL,
  `provnom` varchar(50) NOT NULL,
  `provemail` varchar(50) NOT NULL,
  `provdire` varchar(50) NOT NULL,
  `provtele` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`provid`, `provnom`, `provemail`, `provdire`, `provtele`) VALUES
(0, 'S/P', '', '', ''),
(1, 'Abel Perez', 'abelperez3756@outlook.ar', 'Ap #677-6926 Pede. St.', '011-478-8872'),
(2, 'Gail Sanz', 'gailsanz6823@hotmail.ar', '2811 Orci Rd.', '088-674-1237'),
(3, 'Claire Cabrera', 'clairecabrera@yahoo.net', 'Ap #901-9526 Lorem Road', '073-910-1514'),
(4, 'Regan Arias', 'reganarias@hotmail.net', 'Ap #247-4778 Placerat, Avenue', '039-488-2374'),
(5, 'Abbot Marin', 'abbotmarin66@yahoo.com', 'Ap #294-514 Etiam Street', '030-427-9371'),
(6, 'Natalie Izquierdo', 'natalieizquierdo@gmail.ar', '385-8946 Donec Avenue', '089-444-8375'),
(7, 'Jerry Alvarez', 'jerryalvarez@hotmail.ar', 'Ap #391-6079 Urna Rd.', '055-031-7126'),
(8, 'Jescie Mora', 'jesciemora@outlook.net', 'Ap #404-6697 Libero. Av.', '089-073-3350'),
(9, 'Isaiah Perez', 'isaiahperez6047@hotmail.net', '708-6712 Magnis Street', '057-380-8281'),
(10, 'Addison Ortiz', 'addisonortiz@yahoo.com', 'Ap #365-6913 Gravida. Rd.', '018-414-9836'),
(11, 'Kelsie Gutierrez', 'kelsiegutierrez6539@hotmail.net', 'P.O. Box 315, 8045 Dui St.', '014-846-6877'),
(12, 'Shad Mora', 'shadmora9514@hotmail.net', '5510 Molestie St.', '062-332-6548'),
(13, 'Kaye Nuñez', 'kayenuez@outlook.net', 'P.O. Box 707, 6561 Mauris St.', '086-389-7633'),
(14, 'Sydney Ibañez', 'sydneyibaez@outlook.com', '626-2299 Massa Ave', '077-188-4736'),
(15, 'Whitney Velasco', 'whitneyvelasco@hotmail.ar', '974-9110 Ipsum Ave', '053-278-6584'),
(16, 'Kevyn Arias', 'kevynarias446@yahoo.com', 'P.O. Box 527, 5834 Molestie Rd.', '091-945-1825'),
(17, 'Jorden Rubio', 'jordenrubio@gmail.ar', '724-7794 Varius Av.', '042-546-0460'),
(18, 'Kay Duran', 'kayduran4110@yahoo.com', '782-8216 Tortor, Ave', '042-527-4238'),
(19, 'Brittany Marquez', 'brittanymarquez@outlook.net', 'P.O. Box 480, 763 Eros Rd.', '022-507-4047'),
(20, 'Hedy Marquez', 'hedymarquez@hotmail.net', 'Ap #896-4139 Libero Road', '013-021-8217'),
(21, 'Shay Gutierrez', 'shaygutierrez4555@gmail.net', '972-7222 In, Av.', '050-352-5670'),
(22, 'Callie Morales', 'calliemorales8090@hotmail.net', 'Ap #961-3998 Aliquam Road', '055-115-9300'),
(23, 'Benedict Santana', 'benedictsantana7427@outlook.com', '391-6971 Dapibus Street', '082-656-1633'),
(24, 'Ralph Herrero', 'ralphherrero@hotmail.com', '861-4613 Eget Av.', '011-198-4141'),
(25, 'Cooper Flores', 'cooperflores1706@hotmail.ar', '740-4935 Litora St.', '025-878-3517'),
(26, 'Lucius Medina', 'luciusmedina@gmail.com', '332-8437 Morbi Ave', '075-960-3747'),
(27, 'Kameko Vidal', 'kamekovidal@gmail.ar', '356-6686 Orci. St.', '061-108-5415'),
(28, 'Robert Gimenez', 'robertgimenez4076@hotmail.com', '2836 Sapien St.', '019-648-6726'),
(29, 'Ignatius Martin', 'ignatiusmartin@gmail.ar', '414-4048 Aliquam Avenue', '088-656-7985'),
(30, 'Sage Delgado', 'sagedelgado7108@outlook.net', 'Ap #369-3898 Amet Road', '065-505-6746'),
(31, 'Hiram Moreno', 'hirammoreno4770@hotmail.ar', 'Ap #349-2956 Sed Av.', '063-482-3531'),
(32, 'Carol Suarez', 'carolsuarez@hotmail.ar', '750-7345 Eu Rd.', '016-468-3609'),
(33, 'Alyssa Aguilar', 'alyssaaguilar6147@gmail.net', '499-4659 Risus, Road', '031-141-1239'),
(34, 'Andrew Castro', 'andrewcastro833@hotmail.ar', '1124 Phasellus Road', '036-773-8164'),
(35, 'Edward Castillo', 'edwardcastillo@gmail.com', 'Ap #214-4050 Nunc Ave', '076-147-3426'),
(36, 'Rana Fernandez', 'ranafernandez@outlook.ar', '726-4095 Luctus Rd.', '099-466-6127'),
(37, 'Solomon Crespo', 'solomoncrespo@gmail.com', 'P.O. Box 870, 688 Montes, Rd.', '086-413-5324'),
(38, 'Phelan Nuñez', 'phelannuez@outlook.ar', 'P.O. Box 582, 3343 Ut Av.', '061-108-7228'),
(39, 'Bradley Esteban', 'bradleyesteban@yahoo.ar', 'P.O. Box 585, 9029 Arcu. Avenue', '037-576-4662'),
(40, 'Samson Crespo', 'samsoncrespo@gmail.net', 'Ap #853-1021 Condimentum St.', '077-064-5831'),
(41, 'Erasmus Morales', 'erasmusmorales@outlook.com', 'Ap #572-9253 Natoque Road', '084-308-4190'),
(42, 'Shelby Ramirez', 'shelbyramirez@hotmail.ar', 'P.O. Box 472, 593 Non, St.', '044-423-6535'),
(43, 'Zenaida Marquez', 'zenaidamarquez8789@hotmail.com', 'P.O. Box 623, 5002 Aliquet. St.', '048-334-9839'),
(44, 'Jerry Carrasco', 'jerrycarrasco6947@yahoo.net', 'Ap #405-2504 Elit, Ave', '083-475-2568'),
(45, 'Elijah Carmona', 'elijahcarmona7379@gmail.com', 'Ap #394-4694 Erat. St.', '096-442-0819'),
(46, 'Mara Diez', 'maradiez@gmail.net', '982-7683 Lorem, St.', '024-027-4225'),
(47, 'Desiree Velasco', 'desireevelasco7493@hotmail.com', '435-975 Gravida Avenue', '063-817-0558'),
(48, 'Wesley Diez', 'wesleydiez@outlook.com', 'Ap #345-710 Curabitur Av.', '066-589-9738'),
(49, 'Ivana Prieto', 'ivanaprieto1819@gmail.ar', '524-2402 Orci Rd.', '042-257-1713'),
(50, 'Nell Saez', 'nellsaez@gmail.ar', 'P.O. Box 373, 3765 Aliquam Rd.', '061-212-0632');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `rolid` int(11) NOT NULL,
  `rolnom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`rolid`, `rolnom`) VALUES
(1, 'Administrador'),
(2, 'Cajero'),
(4, ' '),
(8, 'Delivery'),
(12, 'Cliente'),
(13, 'Mozo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocaja`
--

CREATE TABLE `tipocaja` (
  `tipocajaid` int(11) NOT NULL,
  `tipocajadesc` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipocaja`
--

INSERT INTO `tipocaja` (`tipocajaid`, `tipocajadesc`) VALUES
(0, 'Abierta'),
(1, 'Cerrada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipococinaestado`
--

CREATE TABLE `tipococinaestado` (
  `cocinatipoid` int(11) NOT NULL,
  `cocinadescripcion` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipomesaestados`
--

CREATE TABLE `tipomesaestados` (
  `mesatipoid` int(11) NOT NULL,
  `mesadescripcion` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipomesaestados`
--

INSERT INTO `tipomesaestados` (`mesatipoid`, `mesadescripcion`) VALUES
(1, 'Libre'),
(2, 'Ocupado'),
(3, 'Ocupado Pagado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipomovimiento`
--

CREATE TABLE `tipomovimiento` (
  `movtipo` int(11) NOT NULL,
  `movnombre` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipomovimiento`
--

INSERT INTO `tipomovimiento` (`movtipo`, `movnombre`) VALUES
(0, 'Egreso'),
(1, 'Ingreso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoventa`
--

CREATE TABLE `tipoventa` (
  `ventaid` int(11) NOT NULL,
  `ventadesc` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipoventa`
--

INSERT INTO `tipoventa` (`ventaid`, `ventadesc`) VALUES
(0, ''),
(1, 'Mesa'),
(2, 'Delivery');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cajas`
--
ALTER TABLE `cajas`
  ADD PRIMARY KEY (`cjid`,`cjfecha`),
  ADD KEY `idEmpleado` (`empid`),
  ADD KEY `cjcierre` (`cjcierre`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`caid`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`clid`);

--
-- Indices de la tabla `cocina`
--
ALTER TABLE `cocina`
  ADD PRIMARY KEY (`mesaid`),
  ADD KEY `estadococina` (`estadococina`),
  ADD KEY `fvid` (`fvid`);

--
-- Indices de la tabla `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`fvid`) USING BTREE,
  ADD KEY `deliveryestado` (`deliveryestado`),
  ADD KEY `empid` (`empid`);

--
-- Indices de la tabla `deliverytiposestados`
--
ALTER TABLE `deliverytiposestados`
  ADD PRIMARY KEY (`deliverytipo`);

--
-- Indices de la tabla `detallescompras`
--
ALTER TABLE `detallescompras`
  ADD PRIMARY KEY (`dcorden`,`fcid`) USING BTREE,
  ADD KEY `idFacturaCompras` (`fcid`),
  ADD KEY `idProductos` (`proid`);

--
-- Indices de la tabla `detallesventas`
--
ALTER TABLE `detallesventas`
  ADD PRIMARY KEY (`dvorden`,`fvid`),
  ADD KEY `idFacturaVentas` (`fvid`),
  ADD KEY `idProductos` (`proid`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`empid`),
  ADD KEY `fk_roles` (`emprol`);

--
-- Indices de la tabla `facturascompras`
--
ALTER TABLE `facturascompras`
  ADD PRIMARY KEY (`fcid`),
  ADD KEY `idProveedor` (`provid`),
  ADD KEY `fk_cajascompras` (`cjid`);

--
-- Indices de la tabla `facturasventas`
--
ALTER TABLE `facturasventas`
  ADD PRIMARY KEY (`fvid`),
  ADD KEY `idUsuario` (`clid`),
  ADD KEY `fk_cajasventas` (`cjid`),
  ADD KEY `fk_tipoventa` (`tipo`);

--
-- Indices de la tabla `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`mesaid`),
  ADD KEY `empid` (`empid`),
  ADD KEY `mesaestado` (`mesaestado`),
  ADD KEY `fvid` (`fvid`);

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`movid`),
  ADD KEY `fk_cajasmov` (`cjid`),
  ADD KEY `movtipo` (`movtipo`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`proid`),
  ADD KEY `caid` (`caid`);

--
-- Indices de la tabla `productosxproveedores`
--
ALTER TABLE `productosxproveedores`
  ADD KEY `idProductos` (`proid`),
  ADD KEY `idProveedores` (`provid`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`provid`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`rolid`);

--
-- Indices de la tabla `tipocaja`
--
ALTER TABLE `tipocaja`
  ADD PRIMARY KEY (`tipocajaid`);

--
-- Indices de la tabla `tipococinaestado`
--
ALTER TABLE `tipococinaestado`
  ADD PRIMARY KEY (`cocinatipoid`);

--
-- Indices de la tabla `tipomesaestados`
--
ALTER TABLE `tipomesaestados`
  ADD PRIMARY KEY (`mesatipoid`);

--
-- Indices de la tabla `tipomovimiento`
--
ALTER TABLE `tipomovimiento`
  ADD PRIMARY KEY (`movtipo`);

--
-- Indices de la tabla `tipoventa`
--
ALTER TABLE `tipoventa`
  ADD PRIMARY KEY (`ventaid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cajas`
--
ALTER TABLE `cajas`
  MODIFY `cjid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `caid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `clid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `detallescompras`
--
ALTER TABLE `detallescompras`
  MODIFY `dcorden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `empid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `facturascompras`
--
ALTER TABLE `facturascompras`
  MODIFY `fcid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `facturasventas`
--
ALTER TABLE `facturasventas`
  MODIFY `fvid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `movid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `proid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `provid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `rolid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cajas`
--
ALTER TABLE `cajas`
  ADD CONSTRAINT `cajas_ibfk_1` FOREIGN KEY (`empid`) REFERENCES `empleados` (`empid`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `cajas_ibfk_2` FOREIGN KEY (`cjcierre`) REFERENCES `tipocaja` (`tipocajaid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cocina`
--
ALTER TABLE `cocina`
  ADD CONSTRAINT `cocina_ibfk_1` FOREIGN KEY (`estadococina`) REFERENCES `tipococinaestado` (`cocinatipoid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cocina_ibfk_3` FOREIGN KEY (`fvid`) REFERENCES `facturasventas` (`fvid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`deliveryestado`) REFERENCES `deliverytiposestados` (`deliverytipo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `delivery_ibfk_2` FOREIGN KEY (`empid`) REFERENCES `empleados` (`empid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `delivery_ibfk_3` FOREIGN KEY (`fvid`) REFERENCES `facturasventas` (`fvid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detallescompras`
--
ALTER TABLE `detallescompras`
  ADD CONSTRAINT `detallesCompras_ibfk_1` FOREIGN KEY (`fcid`) REFERENCES `facturascompras` (`fcid`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `detallesCompras_ibfk_2` FOREIGN KEY (`proid`) REFERENCES `productos` (`proid`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `detallesventas`
--
ALTER TABLE `detallesventas`
  ADD CONSTRAINT `detallesVentas_ibfk_1` FOREIGN KEY (`fvid`) REFERENCES `facturasventas` (`fvid`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `detallesVentas_ibfk_2` FOREIGN KEY (`proid`) REFERENCES `productos` (`proid`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `fk_roles` FOREIGN KEY (`emprol`) REFERENCES `roles` (`rolid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `facturascompras`
--
ALTER TABLE `facturascompras`
  ADD CONSTRAINT `facturasCompras_ibfk_1` FOREIGN KEY (`provid`) REFERENCES `proveedores` (`provid`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cajascompras` FOREIGN KEY (`cjid`) REFERENCES `cajas` (`cjid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `facturasventas`
--
ALTER TABLE `facturasventas`
  ADD CONSTRAINT `facturasVentas_ibfk_1` FOREIGN KEY (`clid`) REFERENCES `clientes` (`clid`),
  ADD CONSTRAINT `fk_cajasventas` FOREIGN KEY (`cjid`) REFERENCES `cajas` (`cjid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tipoventa` FOREIGN KEY (`tipo`) REFERENCES `tipoventa` (`ventaid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mesas`
--
ALTER TABLE `mesas`
  ADD CONSTRAINT `mesas_ibfk_2` FOREIGN KEY (`empid`) REFERENCES `empleados` (`empid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mesas_ibfk_3` FOREIGN KEY (`mesaestado`) REFERENCES `tipomesaestados` (`mesatipoid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mesas_ibfk_4` FOREIGN KEY (`fvid`) REFERENCES `facturasventas` (`fvid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD CONSTRAINT `fk_cajasmov` FOREIGN KEY (`cjid`) REFERENCES `cajas` (`cjid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movimientos_ibfk_1` FOREIGN KEY (`movtipo`) REFERENCES `tipomovimiento` (`movtipo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`caid`) REFERENCES `categorias` (`caid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productosxproveedores`
--
ALTER TABLE `productosxproveedores`
  ADD CONSTRAINT `productosXproveedores_ibfk_1` FOREIGN KEY (`proid`) REFERENCES `productos` (`proid`),
  ADD CONSTRAINT `productosXproveedores_ibfk_2` FOREIGN KEY (`provid`) REFERENCES `proveedores` (`provid`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
