-- MariaDB dump 10.19  Distrib 10.4.18-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: Modulo1
-- ------------------------------------------------------
-- Server version	10.4.18-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `autor`
--

DROP TABLE IF EXISTS `autor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `autor` (
  `id_autor` tinyint(4) NOT NULL AUTO_INCREMENT,
  `autor` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_autor`),
  UNIQUE KEY `autor` (`autor`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autor`
--

LOCK TABLES `autor` WRITE;
/*!40000 ALTER TABLE `autor` DISABLE KEYS */;
INSERT INTO `autor` VALUES (4,'Antonio Manchado'),(17,'Carlos Fuentes'),(5,'Carlos Ruiz Zafon'),(15,'Edwin A.Abbott'),(19,'Erich Fromm'),(13,'Erich Maria Remarque'),(2,'Federico Garcia Lorca'),(7,'George Orwell'),(11,'H. G. Wells '),(12,'H.G. Wells'),(10,'Homero'),(9,'Jack London'),(16,'Jane Austen'),(6,'Juan Ramon Jimenez'),(22,'Juan Rulfo'),(20,'Julio Verne'),(8,'Ken Follett'),(21,'Michael Guillen'),(14,'Ray Bradburry'),(18,'Sandra Cisneros'),(23,'Thomas Hobbes');
/*!40000 ALTER TABLE `autor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `editorial`
--

DROP TABLE IF EXISTS `editorial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `editorial` (
  `id_editorial` tinyint(4) NOT NULL AUTO_INCREMENT,
  `editorial` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_editorial`),
  UNIQUE KEY `editorial` (`editorial`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `editorial`
--

LOCK TABLES `editorial` WRITE;
/*!40000 ALTER TABLE `editorial` DISABLE KEYS */;
INSERT INTO `editorial` VALUES (2,'akai Literaturas'),(17,'Biblioteca Era'),(5,'Booket'),(7,'DEBOLSILLO'),(23,'Ediciones Libertador'),(14,'Ediciones Perdidas'),(11,'Epoca'),(18,'Fondo de Cultura Economica'),(20,'GRANDES'),(10,'Gredos'),(6,'Juventud'),(4,'Literanda Clasicos'),(9,'Nomadas del tiempo'),(19,'PAIDOS'),(13,'Porrua'),(22,'RM'),(15,'Torre de Viento');
/*!40000 ALTER TABLE `editorial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genero`
--

DROP TABLE IF EXISTS `genero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genero` (
  `id_genero` tinyint(4) NOT NULL AUTO_INCREMENT,
  `genero` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_genero`),
  UNIQUE KEY `genero` (`genero`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genero`
--

LOCK TABLES `genero` WRITE;
/*!40000 ALTER TABLE `genero` DISABLE KEYS */;
INSERT INTO `genero` VALUES (32,' Novela'),(10,'Biografía'),(9,'Ciencia ficción'),(35,'Divulgacion'),(6,'Ficción adulto joven'),(11,'Ficción política'),(33,'Filosofia'),(7,'Horror'),(37,'Literatura contemporanea'),(15,'Literatura infantil'),(5,'Misterio'),(31,'Narrativa'),(12,'Novela'),(18,'Novela bélica'),(19,'Novela científica'),(24,'novela en clave'),(34,'Novela fantastica'),(27,'novela filosofica'),(22,'Novela historica'),(29,'Novela romantica'),(2,'Poesia'),(8,'Poesia Lirica'),(13,'Suspenso'),(38,'Tratado');
/*!40000 ALTER TABLE `genero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `libro`
--

DROP TABLE IF EXISTS `libro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `libro` (
  `id_libro` tinyint(4) NOT NULL AUTO_INCREMENT,
  `id_autor` tinyint(4) DEFAULT NULL,
  `id_editorial` tinyint(4) DEFAULT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `año` int(11) DEFAULT NULL,
  `rutaPDF` varchar(50) DEFAULT NULL,
  `linkImagen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_libro`),
  UNIQUE KEY `titulo` (`titulo`),
  UNIQUE KEY `descripcion` (`descripcion`),
  UNIQUE KEY `rutaPDF` (`rutaPDF`),
  KEY `id_autor` (`id_autor`),
  KEY `id_editorial` (`id_editorial`),
  CONSTRAINT `libro_ibfk_1` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id_autor`),
  CONSTRAINT `libro_ibfk_2` FOREIGN KEY (`id_editorial`) REFERENCES `editorial` (`id_editorial`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libro`
--

LOCK TABLES `libro` WRITE;
/*!40000 ALTER TABLE `libro` DISABLE KEYS */;
INSERT INTO `libro` VALUES (3,2,2,'Romancero Gitano','El Romancero gitano es una obra poética de Federico García Lorca, publicada en 1928. Está compuesta por dieciocho romances con temas como la noche, la muerte, el cielo, la luna. Todos los poemas tienen algo en común, tratan de la cultura gitana.',1928,'./statics/libros/libro3.pdf','./statics/imagenes/imagen3.jpg'),(5,4,4,'Campos de Castilla','Campos de Castilla es una obra escrita entre 1907 y 1917, cuya primera edición corresponde a 1912. Supone el alejamiento de Machado del Modernismo de Soledades. Es un espacio que supone que el hombre se relaciona con otras entidades no antropológicas de l',1912,'./statics/libros/libro5.pdf','./statics/imagenes/imagen5.png'),(6,5,5,'El Principe de la Niebla','El príncipe de la niebla es una novela juvenil de Carlos Ruiz Zafón publicada el año 1993. La trama transcurre en 1943, en un pueblo a las orillas del Atlántico, durante la Segunda Guerra Mundial. Fue catalogada como una de las mejores novelas juveniles d',1993,'./statics/libros/libro6.pdf','./statics/imagenes/imagen6.jpg'),(7,6,6,'Platero y yo','Platero y yo es una obra lírica escrita por el escritor y Premio Nobel de Literatura español Juan Ramón Jiménez,  que recrea poéticamente la vida del asno Platero, su inseparable amigo de niñez y juventud',1914,'./statics/libros/libro7.pdf','./statics/imagenes/imagen7.jpg'),(8,7,7,'1984','1984 es una novela política de ficción distópica, escrita por George Orwell entre 1947 y 1948 y publicada el 8 de junio de 1949.',1949,'./statics/libros/libro8.pdf','./statics/imagenes/imagen8.jpg'),(9,8,7,'El Hombre de San Petesburgo','El libro narra antecedentes de la Primera Guerra Mundial a partir de hechos históricos entre naciones y de relaciones humanas de personajes situados principalmente en Inglaterra y Rusia.',1982,'./statics/libros/libro9.pdf','./statics/imagenes/imagen9.jpg'),(10,9,9,'Colmillo Blanco','En las frías tierras del extremo norte de América, un cachorro de lobo da sus primeros pasos en el bosque, donde aprende las leyes de la vida salvaje. Pero el encuentro con los humanos cambiará para siempre su vida',1906,'./statics/libros/libro10.pdf','./statics/imagenes/imagen10.jpg'),(11,10,10,'Los viajes de Ulises','Ulises era el rey de Ítaca, partió de allí para participar en la guerra de Troya. Tras su decisiva intervención en esta guerra Ulises y sus hombres parten en doce barcos con destino a Ítaca, su hogar',2017,'./statics/libros/libro11.pdf','./statics/imagenes/imagen11.jpg'),(13,12,11,'La guerra de los mundos','La guerra de dos mundos es una novela de ciencia ficción escrita por H. G. Wells y publicada por primera vez en 1898, que describe una invasión marciana a la Tierra',2000,'./statics/libros/libro13.pdf','./statics/imagenes/imagen13.jpg'),(14,13,13,'Sin novedad en el frente','Sin novedad en el frente muestra los horrores de la guerra desde el punto de vista de un joven soldado. La obra suele categorizarse como de literatura antibelicista, aunque el mismo Remarque la calificó de apolítica.',2018,'./statics/libros/libro14.pdf','./statics/imagenes/imagen14.jpg'),(15,14,14,'Fahrenheit451','Montag pertenece a una extraña brigada de bomberos cuya mision es provocar incendios para quemar libros. Este libro denuncia los peligros de una civilizacion mecanizada que condena la vida del espiritu.',1953,'./statics/libros/libro15.pdf','./statics/imagenes/imagen15.jpg'),(16,15,15,'Planilandia','Novela de una aventura conmovedora de matemáticas puras, una fantasía de espacios extraños poblados por figuras geométricas; figuras geométricas que piensan y hablan y tienen todas las emociones humanas.',1992,'./statics/libros/libro16.pdf','./statics/imagenes/imagen16.jpg'),(17,16,7,'Sentido y Sensibilidad','Sus protagonistas las jóvenes hermanas Dashwood, quienes, desde caracteres contrapuestos, comparten el mismo afán por la búsqueda de la felicidad. ',1811,'./statics/libros/libro17.pdf','./statics/imagenes/imagen17.png'),(18,17,17,'Aura','La novela está situada en el año 1961 en la Ciudad de México, obra maestra del autor, quien logra con excelente narrativa y sentido del humor negro, dar un toque de excelencia a su gran técnica literaria',1962,'./statics/libros/libro18.PDF','./statics/imagenes/imagen18.jpg'),(19,18,18,'La casa en Mango Street','La casa en Mango Street es la extraordinaria historia de Esperanza Cordero, una niña latina que crece en un barrio de Chicago, inventando por sí misma en qué y en quién se convertirá',1984,'./statics/libros/libro19.pdf','./statics/imagenes/imagen19.jpg'),(20,19,19,'Del tener al ser','Erich Fromm nos propone en este bello lilbro un \"arte de vivir\" cuyos pilares son el amor, la razón y la actividad productiva.',1989,'./statics/libros/libro20.pdf','./statics/imagenes/imagen20.jpg'),(21,20,20,'Veinte mil leguas de viaje submarino','La obra novela fantástica, es narrada en primera persona por el profesor francés Pierre Aronnax, notable biólogo que es hecho prisionero por el Capitán Nemo y es conducido por los océanos a bordo del submarino Nautilus',1869,'./statics/libros/libro21.pdf','./statics/imagenes/imagen21.jpg'),(22,21,7,'Cinco ecuaciones que cambiaron al mundo','El autor nos revela el mundo secreto de las matemáticas a través de las sorprendentes historias de las personas que llegaron a descubrimientos claves para que la humanidad haya llegado a la electricidad, a volar en avión o construir la bomba atómica.',2014,'./statics/libros/libro22.pdf','./statics/imagenes/imagen22.png'),(23,22,22,'Pedro Paramo','a novela cuenta cómo el protagonista, Juan Preciado, va en busca de su padre, Pedro Páramo, hasta el pueblo mexicano de Comala, un lugar vacio, misterioso, sin vida. Estamos, pues, ante una novela misteriosa y fantástica cuya atmósfera envuelve al lector ',2004,'./statics/libros/libro23.pdf','./statics/imagenes/imagen23.jpg'),(24,23,23,'Leviatan','Escrito en un tiempo convulso, durante la guerra civil inglesa, expone con crudeza la naturaleza del ser humano: egoísta, competitiva y siempre temerosa del mayor de los males, la muerte violenta.',1651,'./statics/libros/libro24.PDF','./statics/imagenes/imagen24.jpg');
/*!40000 ALTER TABLE `libro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `librohasgenero`
--

DROP TABLE IF EXISTS `librohasgenero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `librohasgenero` (
  `id_lhg` tinyint(4) NOT NULL AUTO_INCREMENT,
  `id_libro` tinyint(4) DEFAULT NULL,
  `id_genero` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_lhg`),
  KEY `id_libro` (`id_libro`),
  KEY `id_genero` (`id_genero`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `librohasgenero`
--

LOCK TABLES `librohasgenero` WRITE;
/*!40000 ALTER TABLE `librohasgenero` DISABLE KEYS */;
INSERT INTO `librohasgenero` VALUES (2,3,2),(3,3,2),(4,5,2),(5,6,5),(6,6,6),(7,6,7),(8,7,8),(9,8,9),(10,8,10),(11,8,11),(12,9,12),(13,9,13),(14,10,12),(15,11,15),(16,13,12),(17,13,9),(18,14,22),(19,14,18),(20,14,24),(21,15,12),(22,15,9),(23,15,27),(24,16,12),(25,17,29),(26,18,12),(27,19,31),(28,19,32),(29,20,33),(30,21,34),(31,22,35),(32,23,12),(33,23,37),(34,24,38),(35,24,33);
/*!40000 ALTER TABLE `librohasgenero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo`
--

DROP TABLE IF EXISTS `tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo` (
  `id_tipoUsuario` tinyint(4) NOT NULL AUTO_INCREMENT,
  `tipoUsuario` enum('L','B','A') DEFAULT NULL,
  PRIMARY KEY (`id_tipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo`
--

LOCK TABLES `tipo` WRITE;
/*!40000 ALTER TABLE `tipo` DISABLE KEYS */;
INSERT INTO `tipo` VALUES (1,'L'),(2,'B'),(3,'A');
/*!40000 ALTER TABLE `tipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `rfc_num_cuenta` varchar(10) NOT NULL,
  `id_tipoUsuario` tinyint(4) DEFAULT NULL,
  `nombre_usuario` varchar(50) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `contraseña` varchar(50) DEFAULT NULL,
  `fechaNacimiento` varchar(20) DEFAULT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `apellido` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`rfc_num_cuenta`),
  KEY `id_tipoUsuario` (`id_tipoUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('320198223',1,'alxa','320198223@alumno.enp.unam.mx','4444112','2004-02-29','Alexa','Flores Medero Campos');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuariohaslibro`
--

DROP TABLE IF EXISTS `usuariohaslibro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuariohaslibro` (
  `id_uhl` tinyint(4) NOT NULL AUTO_INCREMENT,
  `rfc_num_cuenta` varchar(10) DEFAULT NULL,
  `id_libro` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_uhl`),
  KEY `rfc_num_cuenta` (`rfc_num_cuenta`),
  KEY `id_libro` (`id_libro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuariohaslibro`
--

LOCK TABLES `usuariohaslibro` WRITE;
/*!40000 ALTER TABLE `usuariohaslibro` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuariohaslibro` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-12 23:36:37
