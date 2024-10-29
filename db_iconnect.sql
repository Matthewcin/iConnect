-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-10-2024 a las 21:22:27
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_iconnect`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`) VALUES
(1, 'Alta'),
(2, 'Media'),
(3, 'Baja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonos`
--

CREATE TABLE `telefonos` (
  `id` int(11) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` int(15) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `img` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `telefonos`
--

INSERT INTO `telefonos` (`id`, `modelo`, `descripcion`, `precio`, `categoria_id`, `img`) VALUES
(1, 'Xiaomi Redmi 13C', 'PANTALLA LCD 6,74\" HD+ 90 Hz\r\nDIMENSIONES Y PESO 168 x 78 x 8,09 mm. 192 g.\r\nPROCESADOR Helio G85\r\nRAM 8 GB\r\nALMACENAMIENTO 256 GB\r\nCÁMARA FRONTAL 8 MP f/2.0\r\nCÁMARA TRASERA 50 MP f/1.8 2 MP f/2.4 macro Lente auxiliar por determinar\r\nBATERÍA 5.000mAh Carga rápida 18W\r\nSISTEMA OPERATIVO MIUI 14 Android 13\r\nCONECTIVIDAD LTE Wi-Fi ac Bluetooth 5.3 Radio FM Minijack USB-C\r\nOTROS Lector de huellas en el lateral', 260000, 3, 'https://github.com/Matthewcin/iConnect/blob/main/imagenes_Telefonos/xiaomi%2013c.jpg?raw=true'),
(2, 'Xiaomi Note 13 Pro', 'PANTALLA Panel AMOLED de 6,67 pulgadas Resolución de 2.712 x 1.220 píxeles Refresco de 120 Hz PWM de 1.920 Hz 1.800 nits de pico de brillo DIMENSIONES Y PESO 161,4 x 74,2 x 8,9 mm 199 gramos PROCESADOR MediaTek Dimensity 7200 Ultra RAM 12 GB LPDDR5X ALMACENAMIENTO 512 GB UFS 3.1 CÁMARA FRONTAL 16 Mpx f/2,4 CÁMARA TRASERA Principal de 200 Mpx f/1,7, OIS Gran angular de 8 Mpx f/2,2 Macro de 2 Mpx f/2,4 BATERÍA 5.000 mAh Carga de 120 W Cargador en la caja SISTEMA OPERATIVO Android 13 + MIUI 14 CONECTIVIDAD 5G WiFi 6 GPS Bluetooth 5.3 OTROS Sensor óptico en pantalla Certificación IP68 Gorilla Glass Victus', 700000, 2, 'https://github.com/Matthewcin/iConnect/blob/main/imagenes_Telefonos/xiaomi%20note%2013%20pro.jpg?raw=true'),
(3, 'Xiaomi Redmi Note 11', 'Fotografía profesional en tu bolsillo\r\nDescubrí infinitas posibilidades para tus fotos con las 4 cámaras principales de tu equipo.\r\nPoné a prueba tu creatividad y jugá con la iluminación, diferentes planos y efectos para obtener grandes resultados.\r\nExperiencia visual increíble Mirá tus series y películas favoritas con la mejor definición a través de su pantalla AMOLED de 6.43\'\'.\r\nDisfrutá de colores brillantes y detalles precisos en todos tus contenidos. Mayor rendimiento Su memoria RAM de 4 GB permite que tu smartphone funcione de manera fluida y sin demoras al realizar distintas tareas, jugar o navegar. Desbloqueo facial y dactilar Máxima seguridad para que solo vos puedas acceder al equipo. Podrás elegir entre el sensor de huella dactilar para habilitar el teléfono en un toque, o el reconocimiento facial que permite un desbloqueo hasta un 30% más rápido.\r\nBatería de duración superior ¡Desenchufate! Con la súper batería de 5000 mAh tendrás energía por mucho más tiempo para jugar, ver series o trabajar sin necesidad de realizar recargas. Peso y dimensiones Peso: 179 g Altura x Ancho x Profundidad 159.87 mm x 73.87 mm x 8.09 mm', 150000, 2, 'https://github.com/Matthewcin/iConnect/blob/main/imagenes_Telefonos/xiaomi%20redmi%2011.jpg?raw=true'),
(4, 'Xiaomi Redmi A3', 'PANTALLA LCD 6,71\" HD+ 90 Hz Corning Gorilla Glass 3\r\nDIMENSIONES Y PESO 168,3 x 76,3 x 8,32 mm. 199 g.\r\nPROCESADOR Helio G36\r\nRAM 3 GB\r\nALMACENAMIENTO 64 GB MicroSD hasta 1 TB\r\nCÁMARA FRONTAL 5 MP\r\nCÁMARA TRASERA 8 MP Lente adicional\r\nBATERÍA 5.000 mAh Carga 10W\r\nSISTEMA OPERATIVO Android 14 CONECTIVIDAD LTE Wi-Fi 5 Bluetooth 5.3 Minijack OTROS Lector de huellas en el lateral', 90000, 3, 'https://github.com/Matthewcin/iConnect/blob/main/imagenes_Telefonos/Xiaomi%20Redmi%20A3.jpg?raw=true'),
(5, 'Xiaomi Poco X6', 'PANTALLA AMOLED 6,67\" 1080 x 2400 pixels\r\n120 Hz 1.260 Hz respuesta táctil\r\nPROCESADOR Snapdragon 7s Gen 2 RAM 8 GB\r\nALMACENAMIENTO 256 GB CÁMARA FRONTAL\r\n16 MP CÁMARAS TRASERAS Principal: 64 MP OIS Ultra gran angular: 8 MP Macro: 2 MP\r\nBATERÍA 5.100 mAh Carga rápida 67W\r\nSISTEMA OPERATIVO MIUI 14 con Android 13\r\nCONECTIVIDAD 5G Wi-Fi ac Bluetooth 5.2\r\nNFC IR Blaster OTROS Lector de huellas en la pantalla IP54 Altavoces estéreo', 400000, 1, 'https://github.com/Matthewcin/iConnect/blob/main/imagenes_Telefonos/xiaomi%20poco%20x6.jpg?raw=true'),
(6, 'Xiaomi Poco F6 Pro', 'PANTALLA 6,67\" Flow AMOLED WQHD+ con Dolby Vision y HDR10+ 3.200 x 1.440 px (2K) 120 Hz Hasta 4.000 nits (pico)\r\n3.840 Hz PWM dimming DCI-P3 wide color gamut PROCESADOR Snapdragon 8 Gen 2\r\nMEMORIA 16 GB ALMACENAMIENTO 1 TB\r\nUFS 4.0 BATERÍA 5.000 mAh Carga rápida a 120W (cargador incluido) CÁMARAS TRASERAS Principal: 50MP,  f/1.6, OIS\r\nMacro: 2MP, f/2.4 Gran angular: 8 MP, f/2.2 Modo Ráfaga 2.0 CÁMARA FRONTAL\r\n16 MP SISTEMA OPERATIVO HyperOS basado en Android 14 SONIDO Altavoces duales estéreo CONECTIVIDAD Wi-Fi 7\r\nBluetooth 5.3 GPS, GLONASS, Galileo, QZSS, Beidou NFC Infrarrojos USB Type-C 2.0 OTROS Sensor de huellas integrado en pantalla', 1100000, 1, 'https://github.com/Matthewcin/iConnect/blob/main/imagenes_Telefonos/xiaomi%20f6%20pro.jpg?raw=true'),
(7, 'Xiaomi Mi 14', 'PANTALLA AMOLED LTPO de 6,36 pulgadas\r\nResolución 2.670 x 1.200 píxeles\r\nFormato 20:9 460 ppp Tasa de refresco: 1-120 Hz Tasa de muestreo táctil: 240 Hz\r\nBrillo típico: 1.000 nits Brillo pico: 3.000 nits Pro HDR, Dolby Vision, HDR10+, HDR10, HLG Gorilla Glass Victus\r\nPROCESADOR Snapdragon 8 Gen 3 GPU Adreno\r\nMEMORIA RAM 12 GB LPDDR5x ALMACENAMIENTO INTERNO 512 GB UFS 4.0 CÁMARA TRASERA\r\nAngular 50 MP, OIS, f/1.6 Gran angular 50 MP, f/2.2, 115º FOV Telefoto 50 MP, f/2.0 CÁMARA DELANTERA 32 MP f/2.0 BATERÍA 4.610 mAh Carga rápida 90W\r\nCarga rápida inalámbrica 50W\r\nSISTEMA OPERATIVO HyperOS CONECTIVIDAD 5G SA/NSA Dual nanoSIM WiFi 7 NFC\r\nBluetooth 5.4 Puerto infrarrojos\r\nOTRO Lector de huellas en pantalla\r\nResistencia IP68 Altavoces estéreo\r\n4x micrófonos', 1200000, 1, 'https://github.com/Matthewcin/iConnect/blob/main/imagenes_Telefonos/xiaomi%2014.jpg?raw=true'),
(8, 'Xiaomi Redmi 14C', 'Pantalla LCD 6,88\" HD+ 120 Hz 240 Hz respuesta táctil Dimensiones y peso\r\n171,88 x 77,8 x 8,22 mm De 207 a 211 gramos según acabado procesador\r\nHelio G81 ram 4 GB almacenamiento\r\n128 GB cámara frontal 13 MP f/2.0\r\nCámara trasera 50 MP f/1.8 Lente auxiliar Batería 5.160 mAh Carga rápida 18W Sistema operativo HyperOS Conectividad LTE Bluetooth 5.4 WiFi ac Radio FM Minijack\r\nUSB-C Otros Lector de huellas en el lateral', 280000, 3, 'https://github.com/Matthewcin/iConnect/blob/main/imagenes_Telefonos/xiaomi%2014c.jpg?raw=true'),
(9, 'Xiaomi Poco F5 Pro', 'PANTALLA 6,67 pulgadas OLED 120 Hz tasa de refresco 480 Hz muestreo táctil\r\n1920 Hz PWM Dimming Quad HD+\r\nDolby Vision HDR10 Pico máximo de 1.400 nits (típico de 500 nits) PROCESADOR\r\nQualcomm Snapdragon 8+ Gen 1 MEMORIAS\r\n12 + 512 GB CÁMARA 64 MP f/1.8 OIS\r\n8 MP ultra gran angular 2 MP macro\r\nCÁMARA PRINCIPAL 16 MP BATERÍA 5.160mAh\r\n67W 30W carga inalámbrica SOFTWARE\r\nAndroid 13 MIUI 14 OTROS Lector de huellas bajo la pantalla Doble altavoz\r\nInfrarrojos Resistencia IP53 CONECTIVIDAD 5G SA/NSA WiFi Dual\r\nBluetooth 5.3 USB Tipo-C 2.0', 800000, 1, 'https://github.com/Matthewcin/iConnect/blob/main/imagenes_Telefonos/xiaomi%20f5%20pro.jpg?raw=true');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`) VALUES
(1, 'webadmin', '$2y$10$kFQrQCEOnb7F36hXY.eU.eNBcA3.3AmVnujtEAlR8EbqqT7Wse.Pi');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
