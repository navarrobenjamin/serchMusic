-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-09-2019 a las 21:16:45
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_cat` int(11) NOT NULL,
  `desc_cat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_cat`, `desc_cat`) VALUES
(1, 'CUERDAS'),
(2, 'VIENTO'),
(3, ' PERCUSION'),
(4, 'PIANOS Y TECLADOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `idComentario` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idInstrumento` int(11) NOT NULL,
  `texto` varchar(255) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`idComentario`, `idUsuario`, `idInstrumento`, `texto`, `fecha`) VALUES
(1, 1, 26, 'prueba 1 jakjsajskjsa', '2019-09-13 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comuna`
--

CREATE TABLE `comuna` (
  `id_comuna` int(11) NOT NULL,
  `nombre_comuna` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comuna`
--

INSERT INTO `comuna` (`id_comuna`, `nombre_comuna`) VALUES
(1, 'providencia'),
(2, 'republica'),
(3, 'puente alto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instrumento`
--

CREATE TABLE `instrumento` (
  `id_instru` int(11) NOT NULL,
  `nombre_instru` varchar(150) CHARACTER SET utf8 NOT NULL,
  `id_tienda` int(11) NOT NULL,
  `desc_instru` varchar(2500) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `precio_unitario` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `marca_instru` varchar(30) CHARACTER SET utf8 NOT NULL,
  `foto_instru` varchar(25) CHARACTER SET utf8 NOT NULL,
  `id_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `instrumento`
--

INSERT INTO `instrumento` (`id_instru`, `nombre_instru`, `id_tienda`, `desc_instru`, `precio_unitario`, `stock`, `marca_instru`, `foto_instru`, `id_cat`) VALUES
(1, 'BAJO ACTION BASS V PLUS TR', 1, 'Bajo Cort Action Bass V Plus TR. La Serie Action de Cort es el resultado de tantos años de construcciones de guitarras y bajos, siempre pensando en la mejora del producto y la satifacción del cliente. Es la línea más económica de Cort, y en ella podemos encontrar distintos modelos, con combinaciones de 4 y de 5 cuerdas', 196000, 90, 'CORT', 'images/bajo.jpg', 1),
(2, 'CORT BAJO ACTION BASS PLUS BM', 1, '', 185000, 100, 'CORT', 'images/bajo2.jpg', 1),
(3, 'CORT BAJO ACTION DLX VPLUS CRS', 1, '', 265000, 100, 'CORT', 'images/bajo3.jpg', 1),
(4, 'CORT BAJO ELEC. A4PLUS FMMH-OPBC', 1, '', 582000, 100, 'CORT', 'images/bajo4.jpg', 1),
(5, 'GRG150DX NM GUITARRA ELECTRICA IBANEZ', 2, 'El modelo GRG pertenece a la serie GIO de Ibanez, tiene muchas características del modelo RG, pero a un precio más accesible, un brazo rápido, cortes rectos, capsulas de gran respuesta y solido tremolo de doble traba hacen de la GRG la guitarra ideal para empezar con toda la calidad Ibanez.', 179890, 80, 'IBANEZ', 'images/gui.jpg', 1),
(6, 'M17 BK GUITARRA ELECTRICA LTD', 2, 'Como una de las guitarras eléctricas de 7 cuerdas más asequibles, la LTD M-17 es la mejor solución para los músicos principiantes que quieren tomar el rango extendido de una guitarra de 7 cuerdas, o una buena opción para los músicos más experimentados que necesitan añadir 7 cuerdas a su arsenal. La LTD M-17 ofrece un cómodo cuerpo de tilo, un cuello de arce. Disponible en acabado negro.', 455555, 120, 'LTD', 'images/gui2.jpg', 1),
(7, 'H101FM DBS GUITARRA ELECTRICA LTD', 2, 'La LH101FM ASB LTD es una guitarra eléctrica con cuerpo de baswood, posee 24 trastes y dos capsulas dobles ESP LH150. Guitarra versátil para cualquier estilo de música.', 249900, 56, 'LTD', 'images/gui3.jpg', 1),
(8, 'TI-LGY-120L2 TRIB LEGACY RW LH LBLT GUITARRA ELECTRICA G&L', 2, 'El legendario tono de alnico de una sola bobina con refinamientos modernos y excelente artesanía.', 439900, 70, 'G&L', 'images/gui4.jpg', 1),
(9, 'GD20NS NT GUITARRA ACUSTICA METAL TAKAMINE', 2, 'La Takamine GD20NS es una hermosa guitarra acústica de estilo dreadnought con una combinación especial de maderas tonales que ofrecen un nuevo sonido conservando el estilo de cuerpo clásico. Para los músicos que buscan un sonido diferente, la GD20NS combina una tapa de cedro solido con cuerpo de caoba para producir un tono cálido y detallado que funciona maravillosamente para una amplia gama de estilos musicales. El delgado cuello de caoba de acabado satinado y el diámetro con incrustaciones de punto pearloid proporcionan una gran sensación y comodidad.', 249900, 89, 'TAKAMINE', 'images/gui5.jpg', 1),
(10, 'LP1614 TIMBALETA STREET CAN RAW 14\" LP PERCUSION', 2, 'La LP1614 Street Can es una timbaleta de 14\" pulgadas construida en un tambor de acero de 1 mm. que ofrece un sonido corto, punzante y sin resonancia. Olvida todo lo que sabes acerca de la percusión, la serie RAW es el comienzo de una nueva generación de instrumentos que se extiende más allá de los límites tradicionales, para así llevar nuevos sonidos a nuevos músicos.', 137790, 79, 'LP PERCUSION', 'images/per.jpg', 3),
(11, 'LP1618 TIMBALETA TRASH SNARE RAW 18\" LP PERCUSION', 2, 'La LP1618 trash snare es una timbaleta de 18\" pulgadas construida en un tambor de acero de 1 mm.  que ofrece un sonido corto, punzante y sin resonancia. Olvida todo lo que sabes acerca de la percusión, la serie RAW es el comienzo de una nueva generación de instrumentos que se extiende más allá de los límites tradicionales, para así llevar nuevos sonidos a nuevos músicos.', 166590, 50, 'LP PERCUSION', 'images/per2.png', 3),
(12, 'HT530BC SILLIN BATERIA TAMA', 2, 'El diseño del HT530BC incorpora un par de \"cutaways\" delanteros que permiten un movimiento sin obstáculos para las piernas de los bateristas. Disponible con un asiento de tela suave de gran calidad y duración.', 144900, 78, 'TAMA', 'images/per3.jpg', 3),
(13, 'PD-125BK PAD CAJA ROLAND', 2, 'El PD-125 cuenta con tecnología avanzada de doble disparo que permite una detección uniforme y precisa entre el centro y el borde. El PD-125 permite el uso de cepillos no metálicos y el tambor de 12\" pulgadas con tecnología de doble disparo y tensión ajustable cuenta con una construcción salida y un disparo preciso. Compatible con la línea completa de módulos de percusión electrónica Roland TD.', 186990, 78, 'ROLAND', 'images/per4.jpg', 3),
(14, 'PDX-6 PAD TOM 6,5\" ROLAND', 2, 'PAD COMPACTO Y LIVIANO PARA BATERIOA ELECTRONICA Compacto y de peso ligero, este nuevo sensor con parche de malla de 6,5 pulgadas, también provee la opción de montaje dual para incrementar su versatilidad.', 127900, 67, 'ROLAND', 'images/per5.jpg', 3),
(15, 'TR650S SV TROMPETA V.BACH', 2, 'La trompeta Bach 650S de acabado plateado tiene la campana con un diámetro de 119mm, un tudel  dorado tipo ML con un diámetro de 11,66mm, Pistones de acero inoxidable, cubierta de alpaca y una boquilla original Vincent Bach 7C. La Bach 650S es una trompeta muy atractiva para estudiantes o amateurs que van a iniciarse en el mundo de la música. Bach es una marca mundialmente conocida en el viento de metal, con una larga tradición en trompetas y trombones profesionales. No obstante, además de ser usada por grandes orquestas, concertistas internacionales, profesores y alumnos avanzados, Bach también está disponible para principiantes, amateurs o aficionados al viento de metal. Incluye estuche ligero tipo mochila, aceite para pistones y una boquilla original Vincent Bach 7C.', 281900, 78, 'V.BACH', 'images/vie.jpg', 2),
(16, 'JEP710 LR EUFONIO CAMPANA CURVA JUPITER', 2, 'LEl Eufonio JEP710 cuenta con un acabado lacado, orificio de 0.57\" pulgadas más un diseño de campana frontal desmontable y tres válvulas de acción frontal que hace de este instrumento fácil de sostener y ejecutar.', 744900, 45, 'JUPITER', 'images/vie2.jpg', 2),
(17, 'FR-8X BK-230 ACORDEON V BK ROLAND', 2, 'Con el increíblemente nuevo acordeón FR-8x Tipo Piano, Roland ha perfeccionado la sinergia entre la ejecución del acordeón tradicional y el moderno poder digital. El más reciente buque insignia del V-Accordion tipo-piano está cargado con funciones y mejoras desarrolladas con las recomendaciones de los mejores intérpretes del mundo, brindando a los acordeonistas un nivel de expresión y versatilidad previamente difícil de conseguir.', 4499900, 40, 'ROLAND', 'images/vie3.jpg', 2),
(18, '16410-000-11 NIC ATRIL ARMONICA K&M', 2, 'Compatible con la mayoría de las armónicas existentes en el mercado. Marco para cuello cómodo y resistente. Soporte ajustable gracias a su sistema de tensión de resorte.', 12900, 34, 'K&M', 'images/vie4.jpg', 2),
(19, 'YAS-480S SAXO ALTO YAMAHA', 2, 'El saxofón YAS-480S va un paso más allá. Con un poco más de resistencia, tienen un sonido autoritario, además de una gran flexibilidad, con sus defensas independientes. Ergonomía, tocabilidad y afinación excelentes, tal como se espera de un instrumento Yamaha. Basado en el popular YAS/YTS-475, el nuevo YAS-480S ofrece una conexión Sib/Do grave mejorada, para un mejor ajuste. Además, su nuevo sistema de llave de octava (de la serie 62) permite el uso de tudeles Custom, alargando así la vida útil del instrumento. Un grabado realizado a mano en la campana, otorga al saxofón un toque de elegancia.', 2399890, 67, 'YAMAHA', 'images/vie5.jpg', 2),
(20, 'STAGEMAN 80 AMPLIFICADOR TECLADO KORG', 2, 'Contiene una enorme variedad de frases de batería grabadas en directo. Un ampli PA de alta calidad, multi-funcion y portátil. Necesitas ritmo para tus actuaciones solistas. Tienes una caja de ritmos, pero deseas que tu interpretación tenga más \"vida\". El STAGEMAN 80 es un amplificador PA portátil con múltiples funciones que cubren esas necesidades. Esta unidad contiene un gran número de patrones rítmicos de alta calidad, que incluso pueden responder al cambio de tempo de forma realista, gracias a la nueva tecnología \"Real Groove\" de Korg. STAGEMAN 80 puede convertirse en tu batería personal para tus interpretaciones en directo o en tus sesiones de practica; incluso puedes crear una estructura de ritmo que sea apropiada para tu propia canción, mientras usas un interruptor de pedal para controlarla en tiempo real. Con sus altavoces estéreo de alto rendimiento y alta calidad, también puede ser utilizado como un ampli PA para directo. Además proporciona un grabador y reproductor de audio, así como un mezclador muy completo. El STAGEMAN 80 te permite interpretar con un sonido óptimo junto con los ritmos más actuales', 279900, 56, 'KORG', 'images/pia.jpg', 4),
(21, 'A-01K TECLADO CONTROLADOR ROLAND', 2, 'El controlador MIDI es una parte vital de cualquier configuración de producción musical, pero elegir el adecuado puede ser un dilema. Quieres una unidad con la flexibilidad de manejo para todo tu equipamiento MIDI y análogo. Necesitas conectarlo a un inmenso rango de aplicaciones de creación musical para tablets y teléfonos inteligentes. Además como músico moderno en movimiento de evento en evento, necesitas ser capaz de trabajar en proyectos donde sea que te llegue la inspiración. El Roland A-01K cubre todos los requerimientos, ya sea que quieras practicar tras bambalinas, controlar cada elemento de una elaborada configuración de home studio o crear música original de raíz, este flexible controlador y potente generador de sonido es tu solución.', 359900, 56, 'ROLAND', 'images/pia2.jpg', 4),
(22, 'KROME-61 PT WORKSTATION KORG', 2, 'KROME, el estándar premium workstations KORG, ya está disponible en un nuevo y esperado color. Muestras perfectas para un sonido de piano espectacular, este nuevo teclado re-define tus expectativas para un instrumento de esta gama. Tomando su nombre de la palabra griega que significa -color-, KROME es el nuevo estándar de excelencia sonora en un teclado para interpretar en vivo, proporcionando una ilimitada paleta de sonidos para ofrecerte una vivida inspiración a tu música. Entre sus principales características encontramos: Ideal para cualquier estilo de interpretación de piano. Sonidos de piano y batería sin bucles derivados de KRONOS, más nuevos pianos eléctricos diseñados para brillar en el escenario. Pianos eléctricos con conmutación de velocidad de ocho niveles para un inigualable potencial expresivo. Control claro e intuitivo gracias a la pantalla táctil de 7 pulgadas en color TouchView, exclusiva de Korg. Las baterías ofrecen sonidos directos y ambientales mezclables por separado, para una perfecta calidad de estudio. La función Drum Track reproduce ritmos realistas e inspiradores con solo tocar un botón. Los sonidos más demandados, creados por expertos, incluyen 640 Programas y 288 Combinaciones. Potentes Efectos con 5 inserciones y 2 Master, más ecualizador para cada Pista/Timbre. Diseño distintivo en aluminio que proyecta calidad de construcción. Conexión USB para ordenador, mas ranura para tarjeta SD para almacenar datos. Puedes usar el editor de KROME para editar sonidos en tu ordenador.', 999900, 67, 'KORG', 'images/pia3.jpg', 4),
(23, 'RG652AHMFX-NGB GUITARRA ELECTRICA IBANEZ', 2, 'La RG es la guitarra más reconocible y distintiva en la línea de Ibanez. Tres décadas de metal han forjado esta máquina de alto rendimiento, rectificado por tanto la velocidad y la fuerza. Diseño de puente rígido (fijo) y sistema de trémolo de bloqueo líder en la industria, la RG es un instrumento de precisión', 1609990, 45, 'IBANEZ', 'images/gui6.jpg', 1),
(24, 'SR300E PW PW BAJO ELECTRICO 4 CUERDAS IBANEZ', 2, 'Durante 25 años la serie SR ha dado a los bajistas una alternativa moderna. Con su popularidad mantenida a lo largo de los años, Ibánez está constantemente procurando dar respuesta a las más amplias necesidades de gran variedad de bajistas y presupuestos. Pero sean cuales sean las especificaciones, el corazón de los bajos SR sigue emocionando con su peso ligero, su mástil suave y rápido, y su electrónica perfectamente acoplada con su construcción.', 299900, 45, 'IBANEZ', 'images/gui7.jpg', 1),
(25, 'TL6 BLK LH GUITARRA E/A ZURDA LTD', 2, 'La TL-6 LH (para zurdo) pertenece a una serie completamente nueva, posee transductores eléctricos que proporcionan increíbles tonos acústicos con la comodidad y la sensación de una guitarra eléctrica. Ofrece maderas y componentes de alta calidad. Si has estado buscando ese tono acústico de gran cuerpo y tonalidad para en tu próxima actuación, grabación o simplemente para tocar en la comodidad de tu hogar, entonces definitivamente querrás ver los nuevos modelos TL de LTD by ESP.', 557900, 45, 'LTD', 'images/gui6.jpg', 1),
(26, 'ASTCL GRNFLK MP GUITARRA ELECTRICA G&L', 2, 'Una vez que tocas una G&L Asat Classic, nunca volverás a mirar hacia atrás. La nueva G&L Asat Classic es la última palabra de Leo Fender en el tradicional diseño de corte único con eje atornillado. El puente de acero enmarcado en un cuerpo clásico y la cápsula de bobina simple con diseño de campo magnético en la posición del puente ofrecen un ataque crujiente con armónicos complejos, mientras las monturas individuales de metal ofrecen niveles de entonación modernos y refinados. La Asat Classic cuenta con cápsulas de bobina simple MFD que ofrecen una rica paleta tonal, desde limpios tonos jazz hasta arenosos y gruesos tonos blues. El espíritu de Leo Fender se encuentra en el diseño de la Asat Classic, una guitarra que diseñó para los músicos que comparten ese espíritu. Y ahora, está disponible a un precio al alcance de todos los músicos profesionales.', 1329900, 45, 'G&L', 'images/GUI9.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda`
--

CREATE TABLE `tienda` (
  `id_tienda` int(11) NOT NULL,
  `rut_tienda` varchar(30) NOT NULL,
  `nom_tienda` varchar(30) NOT NULL,
  `telefono_tienda` int(11) NOT NULL,
  `email_tienda` varchar(30) NOT NULL,
  `direccion_tienda` varchar(80) NOT NULL,
  `id_comuna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tienda`
--

INSERT INTO `tienda` (`id_tienda`, `rut_tienda`, `nom_tienda`, `telefono_tienda`, `email_tienda`, `direccion_tienda`, `id_comuna`) VALUES
(1, '34343-ñ', 'FAMA MUSIC LTDA.', 26641084, 'ventas@famamusic.cl', 'Av. Bernardo O\'Higgins 108 Galeria Crown Plaza, Locales 125 y 127', 1),
(2, '43434-k', 'AUDIOMUNDO', 26399766, 'santiago@audiomundo.cl	', 'Alameda Lib. Bernardo OHiggins 108, Local: 121', 1),
(3, '454545-9', 'music', 55656, 'fggf@fdf', 'fdfffd', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usu_id` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `usu_nombre` varchar(30) NOT NULL,
  `usu_apellido` varchar(30) NOT NULL,
  `paswd` varchar(255) NOT NULL,
  `usu_mail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usu_id`, `usuario`, `usu_nombre`, `usu_apellido`, `paswd`, `usu_mail`) VALUES
(1, 'benja1', 'Benjamin', 'Navarro', 'abc1', 'bnavarro3h@hotmail.com'),
(3, 'RaulFlores1', 'Raul', 'Flores', 'raul1', 'flores.abreque@gmail.com'),
(4, 'xlayera22', 'Ximena', 'Layera', 'x2223', 'xlayera22@gmail.com'),
(11, 'nacholol1', '', 'bastias', 'abc1', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`idComentario`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idInstrumento` (`idInstrumento`);

--
-- Indices de la tabla `comuna`
--
ALTER TABLE `comuna`
  ADD PRIMARY KEY (`id_comuna`);

--
-- Indices de la tabla `instrumento`
--
ALTER TABLE `instrumento`
  ADD PRIMARY KEY (`id_instru`),
  ADD KEY `id_cat` (`id_cat`),
  ADD KEY `id_tienda` (`id_tienda`);

--
-- Indices de la tabla `tienda`
--
ALTER TABLE `tienda`
  ADD PRIMARY KEY (`id_tienda`),
  ADD KEY `id_comuna` (`id_comuna`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `idComentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `comuna`
--
ALTER TABLE `comuna`
  MODIFY `id_comuna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `instrumento`
--
ALTER TABLE `instrumento`
  MODIFY `id_instru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `tienda`
--
ALTER TABLE `tienda`
  MODIFY `id_tienda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`usu_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`idInstrumento`) REFERENCES `instrumento` (`id_instru`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `instrumento`
--
ALTER TABLE `instrumento`
  ADD CONSTRAINT `instrumento_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categoria` (`id_cat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `instrumento_ibfk_2` FOREIGN KEY (`id_tienda`) REFERENCES `tienda` (`id_tienda`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tienda`
--
ALTER TABLE `tienda`
  ADD CONSTRAINT `tienda_ibfk_1` FOREIGN KEY (`id_comuna`) REFERENCES `comuna` (`id_comuna`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
