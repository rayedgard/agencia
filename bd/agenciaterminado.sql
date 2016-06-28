/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.1.9-MariaDB : Database - agencia
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`agencia` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `agencia`;

/*Table structure for table `archivos` */

DROP TABLE IF EXISTS `archivos`;

CREATE TABLE `archivos` (
  `id_archivos` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_archivos` int(11) DEFAULT NULL,
  `tipo_archivos` varchar(11) DEFAULT NULL,
  `id_tipo_archivos` int(11) DEFAULT NULL,
  `nombre_archivos` varchar(255) DEFAULT NULL,
  `archivo_archivos` varchar(255) DEFAULT NULL,
  `extension_archivos` varchar(255) DEFAULT NULL,
  `portada_archivos` int(11) DEFAULT NULL,
  `fecha_archivos` datetime DEFAULT NULL,
  PRIMARY KEY (`id_archivos`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `archivos` */

insert  into `archivos`(`id_archivos`,`categoria_archivos`,`tipo_archivos`,`id_tipo_archivos`,`nombre_archivos`,`archivo_archivos`,`extension_archivos`,`portada_archivos`,`fecha_archivos`) values (2,45,'tinymce',NULL,'sin-foto.png','20160601203907_0.png','png',NULL,'2016-06-01 20:39:07'),(3,45,'tinymce',NULL,'icpna5.jpg','20160608203311_0.jpg','jpg',NULL,'2016-06-08 20:33:10');

/*Table structure for table `banner` */

DROP TABLE IF EXISTS `banner`;

CREATE TABLE `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `detalle` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `subcategoria_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

/*Data for the table `banner` */

insert  into `banner`(`id`,`titulo`,`detalle`,`foto`,`subcategoria_id`) values (44,'titulo1','detalle1','icpna5.jpg',25),(43,'titulo1','detalle1','machu-picchu-2016.jpg',25),(45,'titulo1','detalle1','icpna5.jpg',25);

/*Table structure for table `bannerdestino` */

DROP TABLE IF EXISTS `bannerdestino`;

CREATE TABLE `bannerdestino` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `detalle` text,
  `foto` varchar(255) DEFAULT NULL,
  `destino_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `destino_id` (`destino_id`),
  CONSTRAINT `bannerdestino_ibfk_1` FOREIGN KEY (`destino_id`) REFERENCES `destino` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `bannerdestino` */

insert  into `bannerdestino`(`id`,`titulo`,`detalle`,`foto`,`destino_id`) values (9,'Titulo 01','Descripcion 01','machu_picchu_1.jpg',7);

/*Table structure for table `bannergeneral` */

DROP TABLE IF EXISTS `bannergeneral`;

CREATE TABLE `bannergeneral` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `detalle` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `idioma_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idioma_id` (`idioma_id`),
  CONSTRAINT `bannergeneral_ibfk_1` FOREIGN KEY (`idioma_id`) REFERENCES `idioma` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `bannergeneral` */

insert  into `bannergeneral`(`id`,`titulo`,`detalle`,`foto`,`idioma_id`) values (15,'titulo','detalle1','ausangate-Laguna-1.jpg',3),(16,'tirulo02','detalle 02','Caminata-Ausangate.jpg',3),(17,'inlges','inlges','ausangate-Laguna-1.jpg',2),(18,'titulos 03','detalle 03','vinicunca13.jpg',3),(19,'titulos 04','detalle 04','city-tours-cusco-1.jpg',3),(20,'titulos 05','detalle 05','paucartambo1.jpg',3),(21,'titulos 06','detalle 06','trescruces_paucartambo_cuzco_04-copy.jpg',3),(22,'titulos 07','detalle 07','tour-maras-moray-sal-mines-001.jpg',3),(23,'titulos 02','detalle 02','788x440.jpg',2);

/*Table structure for table `categoria` */

DROP TABLE IF EXISTS `categoria`;

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL COMMENT 'el tipo sirve para determinar si es tours, circuito, etc',
  `foto` varchar(255) DEFAULT NULL,
  `idioma_id` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idioma_id` (`idioma_id`),
  CONSTRAINT `categoria_ibfk_1` FOREIGN KEY (`idioma_id`) REFERENCES `idioma` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `categoria` */

insert  into `categoria`(`id`,`nombre`,`tipo`,`foto`,`idioma_id`,`estado`) values (1,'Viajes grupales',1,'viajes0.jpg',3,1),(2,'Viajes Individuales',0,'viajes1.jpeg',3,1),(3,'Viajes especiales',1,'viajes2.jpg',3,1),(6,'Individual trips',1,'viajes11.jpeg',2,1),(7,'Group travel',1,'viajes00.jpg',2,1),(8,'Special trips',1,'viajes22.jpg',2,1);

/*Table structure for table `categorias` */

DROP TABLE IF EXISTS `categorias`;

CREATE TABLE `categorias` (
  `cat_id_cat` int(3) NOT NULL AUTO_INCREMENT,
  `tipo_cat` varchar(11) DEFAULT '1',
  `nivel_cat` int(11) DEFAULT '1',
  `parent_id_cat` int(10) DEFAULT '0',
  `name_cat` varchar(255) CHARACTER SET latin1 DEFAULT '',
  `desc_cat` text CHARACTER SET latin1,
  `status_cat` int(11) DEFAULT '1',
  `image_cat` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `imagen_activa_cat` int(11) DEFAULT '1',
  `orden_cat` int(11) DEFAULT NULL,
  `default_cat` int(11) DEFAULT NULL,
  `fecha_cat` datetime DEFAULT NULL,
  `fecha_edit_cat` datetime DEFAULT NULL,
  `usu_cat` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `usu_edit_cat` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`cat_id_cat`),
  UNIQUE KEY `key1` (`name_cat`,`parent_id_cat`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

/*Data for the table `categorias` */

insert  into `categorias`(`cat_id_cat`,`tipo_cat`,`nivel_cat`,`parent_id_cat`,`name_cat`,`desc_cat`,`status_cat`,`image_cat`,`imagen_activa_cat`,`orden_cat`,`default_cat`,`fecha_cat`,`fecha_edit_cat`,`usu_cat`,`usu_edit_cat`) values (45,'5',1,0,'imagenes',NULL,1,NULL,1,NULL,NULL,'2013-07-29 01:04:15',NULL,NULL,NULL);

/*Table structure for table `controlestags` */

DROP TABLE IF EXISTS `controlestags`;

CREATE TABLE `controlestags` (
  `idControl` mediumint(9) NOT NULL AUTO_INCREMENT,
  `tipoTag` varchar(50) DEFAULT NULL,
  `nombre` text,
  `identificador` varchar(100) DEFAULT NULL,
  `idioma_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`idControl`),
  KEY `id` (`idioma_id`),
  CONSTRAINT `controlestags_ibfk_1` FOREIGN KEY (`idioma_id`) REFERENCES `idioma` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=167 DEFAULT CHARSET=latin1;

/*Data for the table `controlestags` */

insert  into `controlestags`(`idControl`,`tipoTag`,`nombre`,`identificador`,`idioma_id`) values (2,'linkMenu','Inicio','link_inicio',3),(3,'linkMenu','Home','link_inicio',2),(4,'linkMenu','Nosotros','link_nosotros',3),(5,'linkMenu','About','link_nosotros',2),(6,'linkMenu','Equipo','link_equipo',3),(7,'linkMenu','Team','link_equipo',2),(8,'linkMenu','Destinos','link_destinos',3),(9,'linkMenu','destinations','link_destinos',2),(10,'linkMenu','package','link_paquetes',2),(11,'linkMenu','Paquetes','link_paquetes',3),(12,'H2Lavel','NOSOTROS','h2_nosotros',3),(13,'H2Lavel','ABOUT US','h2_nosotros',2),(14,'H2Lavel','DESTINOS','h2_destinos',3),(15,'H2Lavel','DESTINATIONS','h2_destinos',2),(16,'H2Lavel','NUESTROS VIAJES','h2_paquetes',3),(17,'H2Lavel','OUT TRIPS','h2_paquetes',2),(18,'H2Lavel','EQUIPO','h2_equipo',3),(19,'H2Lavel','TEAM','h2_equipo',2),(20,'H2Lavel','GALERIA','h2_galeria',3),(21,'H2Lavel','GALLERY','h2_galeria',2),(22,'p_texto','nosotros...','p_textoAbout',3),(23,'BtnLavel','read more','btn_leerMas',2),(24,'BtnLavel','leer mas','btn_leerMas',3),(25,'H2Lavel','CONTACTANOS','h2_contactanos',3),(26,'H2Lavel','CONTACT US','h2_contactanos',2),(27,'form_lvl','FULL NAME','form_texto',2),(28,'form_lvl','NOMBRE COMPLETO','form_texto',3),(29,'form_lvl','EMAIL','form_email',2),(30,'form_lvl','CORREO','form_email',3),(31,'form_lvl','WHAT IS ON YOUR MIND','form_pensando',2),(32,'form_lvl','QUE PIENSAS','form_pensando',3),(33,'form_lvl','UBICACION','form_ubicacion',3),(34,'form_lvl','LOCATION','form_ubicacion',2),(35,'form_lvl','SEND IT','form_envio',2),(36,'form_lvl','ENVIAR','form_envio',3),(37,'form_lvl','RESET','form_resetear',2),(38,'form_lvl','RESETEAR','form_resetear',3),(39,'form_lvl','FOLLOW US','form_siguenos',2),(40,'form_lvl','SIGUENOS','form_siguenos',3),(41,'H2LavelDestinos','RESERVA','txt_reserva',3),(42,'H2LavelDestinos','RESERVATION','txt_reserva',2),(43,'H2LavelDestinos','NOMBRE','txt_nombre',3),(44,'H2LavelDestinos','NAME','txt_nombre',2),(45,'H2LavelDestinos','CORREO','txt_correo',3),(46,'H2LavelDestinos','EMAIL','txt_correo',2),(47,'H2LavelDestinos','PAIS','txt_pais',3),(48,'H2LavelDestinos','COUNTRY','txt_pais',2),(49,'H2LavelDestinos','TELEFONO','txt_telefono',3),(50,'H2LavelDestinos','PHONE NUMBER','txt_telefono',2),(51,'H2LavelDestinos','FECHA INICIO','txt_fechaInicio',3),(52,'H2LavelDestinos','START DATE','txt_fechaInicio',2),(53,'H2LavelDestinos','FECHA FIN','txt_fechaFin',3),(54,'H2LavelDestinos','END DATE','txt_fechaFin',2),(55,'H2LavelDestinos','ECONOMICO','txt_economico',3),(56,'H2LavelDestinos','ECONOMIC','txt_economico',2),(57,'H2LavelDestinos','MEDIO','txt_medio',3),(58,'H2LavelDestinos','MEDIUM','txt_medio',2),(59,'H2LavelDestinos','LUJOSO','txt_lujoso',3),(60,'H2LavelDestinos','LUXURIOUS','txt_lujoso',2),(61,'H2LavelDestinos','TESTIMONIOS','txt_testimonios',3),(62,'H2LavelDestinos','TESTIMONIALS','txt_testimonios',2),(63,'H2LavelDestinos','TYPE OF ACCOMMODATION','txt_alojamiento',2),(64,'H2LavelDestinos','TIPO DE ALOJAMIENTO','txt_alojamiento',3),(65,'H2LavelDestinos','GALERIA','txt_galeria',3),(66,'H2LavelDestinos','GALLERY','txt_galeria',2),(67,'H2LavelDestinos','CONTACTANOS','txt_contacto',3),(68,'H2LavelDestinos','CONTACT US','txt_contacto',2),(69,'p_texto','we are....','p_textoAbout',2),(70,'H3LavelViajes','VIAJES','txt_viajes',3),(71,'H3LavelViajes','TRAVEL','txt_viajes',2),(72,'H4LavelPaquetes','PAQUETES','txt_paquetes',3),(73,'H4LavelPaquetes','PACKAGE','txt_paquetes',2),(74,'H4LavelCategoria','AUTOR','txt_autor',3),(75,'H4LavelCategoria','AUTHOR','txt_autor',2),(76,'linkMenu','testimonios','link_testimonios',3),(77,'linkMenu','Testimonials','link_testimonios',2),(78,'linkMenu','Nous','link_nosotros',5),(79,'linkMenu','Equipe','link_equipo',5),(80,'linkMenu','Destinations','link_destinos',5),(81,'linkMenu','Paquets','link_paquetes',5),(82,'linkMenu','Accueil','link_inicio',5),(83,'linkMenu','tÃ©moignages','link_testimonios',5),(84,'H2Lavel','NOUS','h2_nosotros',5),(85,'H2Lavel','DESTINATIONS','h2_destinos',5),(87,'H2Lavel','NOS VOYAGES','h2_paquetes',5),(88,'H2Lavel','Ã‰QUIPE','h2_equipo',5),(89,'H2Lavel','GALERIE','h2_galeria',5),(90,'p_texto','nous......','p_textoAbout',5),(91,'BtnLavel','lire plus','btn_leerMas',5),(92,'H2Lavel','CONTACT','h2_contactanos',5),(93,'form_lvl','NOM COMPLET','form_texto',5),(94,'form_lvl','EMAIL','form_email',5),(95,'form_lvl','CE QUI SE PASSE DANS VOTRE ESPRIT','form_pensando',5),(96,'form_lvl','LOCATION','form_ubicacion',5),(97,'form_lvl','ENVOYER','form_envio',5),(98,'form_lvl','RAZ','form_resetear',5),(99,'form_lvl','FALLOW','form_siguenos',5),(100,'H2LavelDestinos','RESERVE','txt_reserva',5),(101,'H2LavelDestinos','NOM','txt_nombre',5),(102,'H2LavelDestinos','MAIL','txt_correo',5),(103,'H2LavelDestinos','PAYS','txt_pais',5),(104,'H2LavelDestinos','TÃ‰LÃ‰PHONE','txt_telefono',5),(105,'H2LavelDestinos','LA DATE DE DÃ‰BUT','txt_fechaInicio',5),(106,'H2LavelDestinos','DATE DE FIN','txt_fechaFin',5),(107,'H2LavelDestinos','Ã‰CONOMIQUE','txt_economico',5),(108,'H2LavelDestinos','MEDIUM','txt_medio',5),(109,'H2LavelDestinos','STANDING','txt_lujoso',5),(111,'H2LavelDestinos','TYPE DE LOGEMENT','txt_alojamiento',5),(112,'H2LavelDestinos','GALERIE','txt_galeria',5),(113,'H2LavelDestinos','CONTACT','txt_contacto',5),(114,'H3LavelViajes','TRAVEL','txt_viajes',5),(115,'H4LavelPaquetes','PAQUETS','txt_paquetes',5),(116,'H4LavelCategoria','AUTEUR','txt_autor',5),(118,'H2LavelDestinos','TÃ‰MOIGNAGE','txt_testimonios',5),(119,'H2LavelTestimonios','LISTE DES TEMOIGNAGES','txt_listaTestimonios',5),(120,'H2LavelTestimonios','LISTA DE TESTIMONIOS','txt_listaTestimonios',3),(121,'H2LavelTestimonios','LIST OF TESTIMONIALS','txt_listaTestimonios',2),(122,'H2LavelTestimonios','Programas','txt_listaTestPrograma',3),(123,'H2LavelTestimonios','Programs','txt_listaTestPrograma',2),(124,'H2LavelTestimonios','Programmes','txt_listaTestPrograma',5),(125,'H2LavelTestimonios','Tarifa','txt_listaTestTarifa',3),(126,'H2LavelTestimonios','Rate','txt_listaTestTarifa',2),(127,'H2LavelTestimonios','Taux','txt_listaTestTarifa',5),(128,'H2LavelTestimonios','Itinerario','txt_listaTestItinerario',3),(129,'H2LavelTestimonios','Itinerary','txt_listaTestItinerario',2),(130,'H2LavelTestimonios','ItinÃ©raire','txt_listaTestItinerario',5),(131,'H2LavelTestimonios','Cerrar','btn_close',3),(132,'H2LavelTestimonios','Close','btn_close',2),(133,'H2LavelTestimonios','Fermer','btn_close',5),(134,'H2LavelTestimonios','Inicio','cap_inicio',3),(135,'H2LavelTestimonios','Start','cap_inicio',2),(136,'H2LavelTestimonios','DÃ©but','cap_inicio',5),(137,'H2LavelTestimonios','Fin','cap_fin',3),(138,'H2LavelTestimonios','End','cap_fin',2),(139,'H2LavelTestimonios','Fin','cap_fin',5),(140,'H2LavelTestimonios','Disponibilidad','cap_disponibilidad',3),(141,'H2LavelTestimonios','availability','cap_disponibilidad',2),(142,'H2LavelTestimonios','disponibilitÃ©','cap_disponibilidad',5),(143,'H2LavelAll','Retorno','cap_retorno',3),(144,'H2LavelAll','Return','cap_retorno',2),(145,'H2LavelAll','Retour','cap_retorno',5),(146,'linkMenu','Contactanos','link_contactanos',3),(147,'linkMenu','Contact','link_contactanos',2),(148,'linkMenu','Contact','link_contactanos',5),(149,'Box_destinos','Clima','BoxDestinos_clima',3),(150,'Box_destinos','Weather','BoxDestinos_clima',2),(151,'Box_destinos','Temps','BoxDestinos_clima',5),(152,'Box_destinos','Como llegar','BoxDestinos_llegar',3),(153,'Box_destinos','How to get','BoxDestinos_llegar',2),(154,'Box_destinos','Comment arriver','BoxDestinos_llegar',5),(155,'Box_destinos','Servicios','BoxDestinos_servicios',3),(156,'Box_destinos','Services','BoxDestinos_servicios',2),(157,'Box_destinos','Services','BoxDestinos_servicios',5),(158,'Box_destinos','Incluye','BoxDestinos_incluye',3),(159,'Box_destinos','It includes','BoxDestinos_incluye',2),(160,'Box_destinos','elle comprend','BoxDestinos_incluye',5),(161,'Box_destinos','Hoteles','BoxDestinos_Hoteles',3),(162,'Box_destinos','Hotels','BoxDestinos_Hoteles',2),(163,'Box_destinos','hôtels','BoxDestinos_Hoteles',5),(164,'Box_destinos','Restaurantesss','BoxDestinos_Restaurantes',3),(165,'Box_destinos','Restaurants','BoxDestinos_Restaurantes',2),(166,'Box_destinos','Restaurants','BoxDestinos_Restaurantes',5);

/*Table structure for table `destino` */

DROP TABLE IF EXISTS `destino`;

CREATE TABLE `destino` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `etiqueta` varchar(255) DEFAULT NULL,
  `detalle` text,
  `foto` varchar(255) DEFAULT NULL,
  `mapa` text,
  `clima` text,
  `comollegar` text,
  `servicios` text,
  `idioma_id` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idioma_id` (`idioma_id`),
  CONSTRAINT `destino_ibfk_1` FOREIGN KEY (`idioma_id`) REFERENCES `idioma` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `destino` */

insert  into `destino`(`id`,`nombre`,`etiqueta`,`detalle`,`foto`,`mapa`,`clima`,`comollegar`,`servicios`,`idioma_id`,`estado`) values (7,'Machu Picchu','El tesoro escondido de los Incas','<p style=\"text-align: justify;\"><span>visita obligada \"u&ntilde;as\" un viaje a Per&uacute;, Machu Picchu es un sitio realmente extraordinario.&nbsp;</span><span>Normalmente nos gusta abusar del uso de superlativos, pero esta vez la palabra no es robado.&nbsp;</span><span>Lo que lo hace tan especial, que es, sin duda, la adici&oacute;n (o multiplicaci&oacute;n?) La belleza de la zona arqueol&oacute;gica y el sitio natural, sino tambi&eacute;n los paisajes cruz&oacute; para llegar all&iacute;, ya sea en tren oa pie</span></p>','tour-machu-picchu-4.jpg','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1633.4317722398025!2d-72.5454139852311!3d-13.163826772517481!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x916d9a5f89555555%3A0x3a10370ea4a01a27!2sMachu+Picchu!5e0!3m2!1ses-419!2spe!4v1465922559799','<ul>\r\n<li>Altitud: 2450 m (Machu Picchu); 1850m (Aguas Calientes).</li>\r\n<li>Clima: H&uacute;medo, &eacute;poca de lluvias de noviembre a marzo. temperatura media anual: 16&ordm;C</li>\r\n</ul>','<p><strong>En tren:</strong></p>\r\n<ul style=\"list-style-type: circle;\">\r\n<li>desde Cuzco: 3:30</li>\r\n<li>desde Ollantaytambo 01:30</li>\r\n</ul>\r\n<p><strong>Por carretera:</strong></p>\r\n<ul style=\"list-style-type: circle;\">\r\n<li>desde Cuzco: cerca de 7 horas hasta que la planta hidroel&eacute;ctrica de Santa Teresa, luego 3 horas de caminata o &frac12; hora en tren a Aguas Calientes.</li>\r\n</ul>\r\n<p><strong>A pie:</strong></p>\r\n<ul style=\"list-style-type: circle;\">\r\n<li>4 d&iacute;as de caminata del camino Inca que va directamente a Machu Picchu.</li>\r\n<li>Trek Salkantay 5 d&iacute;as pasa a d&iacute;a por la noche Aguas Calientes 4. Visita de Machu Picchu en el d&iacute;a 5.</li>\r\n</ul>','<ul>\r\n<li>Presidente, 2 *</li>\r\n<li>Andina Luxury, nivel de 3 estrellas</li>\r\n<li>El Mapi por Inkaterra, 3 * Superior</li>\r\n<li>Tierra Viva, 4 *</li>\r\n<li>Belmond Sanctuary Lodge, 5 *</li>\r\n</ul>\r\n<p>Para obtener m&aacute;s informaci&oacute;n sobre estos hoteles, puede consultar la p&aacute;gina Hoteles en Machu Picchu .</p>',3,1),(8,'Kuelap','construida por los Chachapoya','En la cima de los andes amazónicos del norte de Perú, a 3.000 metros sobre el nivel del mar, se encuentra el imponente Complejo Arqueológico Kuélap, construida por los Chachapoya, cultura preínca que se desarrolló del año 800 d.C al 1470 d.C. Por su ubicación y estructura, el complejo estaba diseñado para defenderse de otros grupos étnicos, pero llegaron a ser conquistados por los Incas.\r\nEntre las verdes montañas, desde lejos se aprecia la gran muralla de piedras de 20 metros de altura que protege la ciudad y que cuenta solo con tres ingresos en forma de estrechos callejones amurallados. En el interior de Kuélap, se pueden admirar hasta 420 casas circulares de piedra con frisos en forma de rombos y zigzag.\r\nDesde lo alto, el verde paisaje nos muestra que la naturaleza privilegió este lugar. Llegar al complejo arqueológico es todo un viaje de aventura que vale la pena.','kuelap-issuu.jpg',NULL,NULL,'En la cima de los andes amazónicos del norte de Perú, a 3.000 metros sobre el nivel del mar, se encuentra el imponente Complejo Arqueológico Kuélap, construida por los Chachapoya, cultura preínca que se desarrolló del año 800 d.C al 1470 d.C. Por su ubicación y estructura, el complejo estaba diseñado para defenderse de otros grupos étnicos, pero llegaron a ser conquistados por los Incas.\r\nEntre las verdes montañas, desde lejos se aprecia la gran muralla de piedras de 20 metros de altura que protege la ciudad y que cuenta solo con tres ingresos en forma de estrechos callejones amurallados. En el interior de Kuélap, se pueden admirar hasta 420 casas circulares de piedra con frisos en forma de rombos y zigzag.\r\nDesde lo alto, el verde paisaje nos muestra que la naturaleza privilegió este lugar. Llegar al complejo arqueológico es todo un viaje de aventura que vale la pena.',NULL,3,1),(9,'Ruta Moche','excepcional cultura Moche','<p><span>En la costa norte del Per&uacute;, comprendiendo principalmente las Regiones de La Libertad y Lambayeque se encuentra La &ldquo;Ruta Moche,&rdquo; espacio geogr&aacute;fico donde floreci&oacute; la excepcional cultura Moche, entre los a&ntilde;os 100 y 800 d.C., cuyos descendientes y sus costumbres, persisten hasta los tiempos actuales.</span></p>','DESTINOS_Moche_m__1.jpg','','','','',3,1),(10,'Playas del Norte','Playas de Tumbes','<p><span>Si quiere escaparse de la vida citadina, nada como visitar las extensas playas en Per&uacute; de tibias aguas que ofrecen servicios tur&iacute;sticos completos, como las Playas de Tumbes, o conocidas playas, a nivel internacional, como M&aacute;ncora, para&iacute;so del surf y de aquellos que vienen buscando un ambiente m&aacute;s tranquilo y de relax.</span></p>','playas-norte_1.jpg','','','','',3,1),(11,'Paracas – Nasca','Una mezcla de misterio','<p><span>Una mezcla de misterio, naturaleza, aventura y cultura que permite al visitante relajarse en sus hermosas playas, explorar el desierto y contemplar una abundante fauna marina en su h&aacute;bitat natural.</span></p>','DESTINOS_Nazca_m_016100_1.jpg','','','','',3,1),(12,'Caballitos de Totora','Caballitos de Totora','<p><span>Embarcaciones artesanales&nbsp;de origen mochica, que todav&iacute;a son utilizadas por&nbsp;los pescadores locales como herramienta de trabajo&nbsp;o para correr olas en las playas de la costa norte.</span></p>','VIVAUNI_CABALLIT_006937.jpg','','','','',3,1);

/*Table structure for table `evento` */

DROP TABLE IF EXISTS `evento`;

CREATE TABLE `evento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `detalle` text,
  `mapa` text,
  `fechaEvento` date DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `idioma_id` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idioma_id` (`idioma_id`),
  CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`idioma_id`) REFERENCES `idioma` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `evento` */

insert  into `evento`(`id`,`nombre`,`detalle`,`mapa`,`fechaEvento`,`foto`,`idioma_id`,`estado`) values (2,'ssssssssss','<p>dfsdf</p>','<p>fsdfs</p>','2016-06-25','bnr1.jpg',2,1);

/*Table structure for table `galeria` */

DROP TABLE IF EXISTS `galeria`;

CREATE TABLE `galeria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT NULL,
  `subcategoria_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subcategoria_id` (`subcategoria_id`),
  CONSTRAINT `galeria_ibfk_1` FOREIGN KEY (`subcategoria_id`) REFERENCES `subcategoria` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `galeria` */

insert  into `galeria`(`id`,`nombre`,`subcategoria_id`) values (12,'icpna6.jpg',25);

/*Table structure for table `galeriadestino` */

DROP TABLE IF EXISTS `galeriadestino`;

CREATE TABLE `galeriadestino` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT NULL,
  `destino_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `destino_id` (`destino_id`),
  CONSTRAINT `galeriadestino_ibfk_1` FOREIGN KEY (`destino_id`) REFERENCES `destino` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `galeriadestino` */

insert  into `galeriadestino`(`id`,`nombre`,`destino_id`) values (13,'MACHUPICCHU.jpg',7),(14,'machu_picchu_1.jpg',7);

/*Table structure for table `galeriageneral` */

DROP TABLE IF EXISTS `galeriageneral`;

CREATE TABLE `galeriageneral` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `galeriageneral` */

insert  into `galeriageneral`(`id`,`nombre`) values (1,'machu-picchu-2016.jpg'),(3,'bnr1.jpg');

/*Table structure for table `guia` */

DROP TABLE IF EXISTS `guia`;

CREATE TABLE `guia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `detalle` text,
  `cargo` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `idioma_id` int(11) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idioma_id` (`idioma_id`),
  CONSTRAINT `guia_ibfk_1` FOREIGN KEY (`idioma_id`) REFERENCES `idioma` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `guia` */

/*Table structure for table `idioma` */

DROP TABLE IF EXISTS `idioma`;

CREATE TABLE `idioma` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `icono` varchar(255) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `idioma` */

insert  into `idioma`(`id`,`nombre`,`icono`,`estado`) values (2,'Ingles','en-dd9e149e.png',1),(3,'Español','es-a88880bf.png',1),(4,'Aleman','MACHUPICCHU.jpg',1),(5,'Frances','fr-0f67f12d.png',1);

/*Table structure for table `itinerario` */

DROP TABLE IF EXISTS `itinerario`;

CREATE TABLE `itinerario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT NULL,
  `detalle` text,
  `subcategoria_id` int(11) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subcategoria_id` (`subcategoria_id`),
  CONSTRAINT `itinerario_ibfk_1` FOREIGN KEY (`subcategoria_id`) REFERENCES `subcategoria` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `itinerario` */

insert  into `itinerario`(`id`,`nombre`,`detalle`,`subcategoria_id`,`estado`) values (2,'Dia 1: LIMA','<p style=\"text-align: justify;\">A la llegada, traslado al aeropuerto de Lima al distrito de Miraflores y al hotel Britania. Alojamiento en el hotel. <br />No hay actividad en este primer d&iacute;a de viaje a Per&uacute;, para vuelos internacionales llegan generalmente por la noche. Si su vuelo llega temprano por la ma&ntilde;ana excursi&oacute;n a las Islas Palomino se podr&iacute;a hacer desde el primer d&iacute;a.</p>',25,1),(3,'Dia 2: LIMA','<p style=\"text-align: justify;\">Por la ma&ntilde;ana traslado al puerto del Callao donde se embarca a las Islas Palomino, hogar de una poblaci&oacute;n de varios miles de lobos marinos y cantidad de aves marinas (pel&iacute;canos, piqueros, golondrinas de mar, ping&uuml;inos de Humboldt, ...). Se puede nadar entre los leones de mar (con una combinaci&oacute;n debido a que el agua es fresca del Pac&iacute;fico Per&uacute;), una experiencia inolvidable. Regreso al puerto temprano en la tarde. Regreso a su hotel en Lima por la tarde y al final del d&iacute;a libre. Alojamiento en el hotel.</p>',25,1),(4,'Dia 3: LIMA - AREQUIPA','<p style=\"text-align: justify;\">En la ma&ntilde;ana vuelo a Arequipa donde se hospede en el hotel Casa Andina Classic.</p>\r\n<p style=\"text-align: justify;\"><br />Conocida como la Ciudad Blanca, Arequipa es la segunda ciudad de Per&uacute;. Se trata de una altitud media de la ciudad colonial, que goza de un clima soleado casi todo el a&ntilde;o. Una etapa agradable de su viaje. Por la tarde, se har&aacute; un recorrido por la ciudad, desde el punto de vista de Carmen Alto, que ofrece vistas de los volcanes que lo rodean, con el centro hist&oacute;rico a trav&eacute;s del distrito colonial de Yanahuara. En el centro se visita, en particular, el convento de Santa Catalina, uno de los m&aacute;s bellos edificios religiosos en Per&uacute;. Alojamiento en el hotel.</p>',25,1),(5,'DIa 4: AREQUIPA - VALLE DE MAJES','<p style=\"text-align: justify;\">Por la ma&ntilde;ana salida hacia el Valle de Majes. En el camino descubrir&aacute; los paisajes ins&oacute;litos de la costa des&eacute;rtica del Per&uacute; y sus valles oasis. Despu&eacute;s de aproximadamente 2 horas y media de viaje, la meseta del desierto de repente se abre al inmenso valle de Majes, profundas casi 1000 metros. Visita el sitio arqueol&oacute;gico de Toro Muerto, donde miles de figuras est&aacute;n talladas en piedra desde tiempos prehisp&aacute;nicos.</p>\r\n<p style=\"text-align: justify;\"><br />Por la tarde, puede hacer que las actividades opcionales tales como ir a las piscinas naturales de Chancharay, un paseo en el valle a pie, en bicicleta de monta&ntilde;a oa caballo, o por el rafting. Una gran manera de experimentar la vida rural del valle, lejos de las rutas tur&iacute;sticas tradicionales. La noche en una caba&ntilde;a acogedora y confortable.</p>',25,1),(6,'DÃ­a 5: VALLE DE MAJES - AREQUIPA','<p style=\"text-align: justify;\">Por la ma&ntilde;ana, se puede completar las actividades ya mencionadas para el d&iacute;a anterior. <br />Por la tarde las visitas in situ restos paleontol&oacute;gicos de dinosaurios y pinturas rupestres Querullpa y una bodega donde se destila el pisco, la alcohol nacional de Per&uacute;. Retorno a Arequipa por la tarde. Alojamiento en el hotel Casa Andina Classic.</p>',25,1),(7,'DÃ­a 6: AREQUIPA','<p style=\"text-align: justify;\">&iquest;Qu&eacute; hay mejor en un viaje para descubrir la cocina local? Y mejor a&uacute;n, aprender a preparar platos. En las instalaciones del restaurante Arthur, se aprende a realizar dos platos emblem&aacute;ticos de la cocina peruana: ceviche de pescado y \"lomo saltado\". Luego que el sabor de los platos que hemos preparado. Tarde libre para disfrutar el encanto de Arequipa . Alojamiento en el hotel.</p>',25,1),(8,'DÃ­a 7: AREQUIPA - COLCA','<p style=\"text-align: justify;\">Por la ma&ntilde;ana salida en bus tur&iacute;stico entre 7,30 y 8,00 para el Ca&ntilde;&oacute;n del Colca . En el camino, se le har&aacute; paradas para observar la fauna del altiplano, que vive a 4000 metros y m&aacute;s: llamas, vicu&ntilde;as y alpacas principalmente. A continuaci&oacute;n, pasar por el punto m&aacute;s alto de su viaje a Per&uacute; en 4900 metros m&aacute;s alto que el Mont Blanc, antes de descender al Valle del Colca. Al llegar al pueblo de Coporaque, la presentaci&oacute;n de sus instalaciones hogar y la familia. Despu&eacute;s del almuerzo, su familia se visitar&aacute; la zona del pueblo y de los alrededores y ofrecer&aacute; diferentes actividades. Cena y alojamiento familiar durante la noche.</p>',25,1),(9,'DÃ­a 8: COLCA - PUNO','<p style=\"text-align: justify;\">Salida a primera hora por veh&iacute;culo por una carretera que ofrece unas magn&iacute;ficas vistas al valle del Colca, que se ensancha gradualmente hasta convertirse en un verdadero ca&ntilde;&oacute;n de m&aacute;s de 1000 metros de profundidad. Aqu&iacute; es donde se pueden observar c&oacute;ndores que anidan en los acantilados y vuela sobre el valle en la ma&ntilde;ana para el deleite de los turistas.</p>\r\n<p style=\"text-align: justify;\"><br />Por la tarde, continuar&aacute; su traves&iacute;a del altiplano a la ciudad Puno, donde se llega al final del d&iacute;a. Puno se encuentra en el l&iacute;mite del gran lago Titicaca , que se encuentra entre Per&uacute; y Bolivia. A 3800 metros sobre el nivel del mar, es el m&aacute;s alto de la ciudad-etapa de su gira en Per&uacute;. Alojamiento en el hotel Hacienda Plaza.</p>',25,1);

/*Table structure for table `noticia` */

DROP TABLE IF EXISTS `noticia`;

CREATE TABLE `noticia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `detalle` text,
  `link` text,
  `fecha` date DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `idioma_id` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idioma_id` (`idioma_id`),
  CONSTRAINT `noticia_ibfk_1` FOREIGN KEY (`idioma_id`) REFERENCES `idioma` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `noticia` */

/*Table structure for table `perfil` */

DROP TABLE IF EXISTS `perfil`;

CREATE TABLE `perfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `cargo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `foto` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `detalle` text CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  `idioma_id` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `perfil` */

insert  into `perfil`(`id`,`nombre`,`cargo`,`telefono`,`correo`,`foto`,`detalle`,`idioma_id`,`estado`) values (2,'Edy','Gerente General','953766078','edy@huaynapicchucusco.com','person1.jpg','<p>Nac&iacute; en la provincia de Anta (Huarocondo &ndash; Cusco). Tengo 28 A&ntilde;os y soy gu&iacute;a Oficial de Turismo, egresado del Instituto Superior Tecnol&oacute;gico Antonio Lorena de Cusco. Como gu&iacute;a oficial de turismo me especializo en lo que es: aventuras, trekkins, turismo cl&aacute;sico y vivencial y durante el tiempo de mi trabajo tuve mucha experiencia en la calidad de servicio en los diferentes lugares del Per&uacute;.<br />Seg&uacute;n nuestro prop&oacute;sito en el a&ntilde;o de 2008 empesamos con el proyecto de Huaynapicchu travel, con algunas investigaciones y nuestra familia tambi&eacute;n ha ido creciendo y ahora tenemos una hermosa hija Emily Maricel que tiene 3 a&ntilde;os.</p>',3,1),(3,'Luis Manuel Estrada Ponce','Administrador12','985745211','luis@hotmail.com','person1.jpg','<p>s&ntilde;ldkaslkd asdlad&ntilde;la daskdjam dsakda sda</p>',3,1);

/*Table structure for table `programa` */

DROP TABLE IF EXISTS `programa`;

CREATE TABLE `programa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fechainicio` date DEFAULT NULL,
  `fechafin` date DEFAULT NULL,
  `disponible` char(20) DEFAULT NULL,
  `subcategoria_id` int(11) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subcategoria_id` (`subcategoria_id`),
  CONSTRAINT `programa_ibfk_1` FOREIGN KEY (`subcategoria_id`) REFERENCES `subcategoria` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `programa` */

insert  into `programa`(`id`,`fechainicio`,`fechafin`,`disponible`,`subcategoria_id`,`estado`) values (5,'2016-06-01','2016-06-30','41',25,1);

/*Table structure for table `subcategoria` */

DROP TABLE IF EXISTS `subcategoria`;

CREATE TABLE `subcategoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `detalle` text,
  `foto` varchar(255) DEFAULT NULL,
  `mapa` text,
  `video` text,
  `tarifa` text,
  `incluye` text,
  `hoteles` text,
  `restaurante` text,
  `perfil_id` int(11) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categoria_id` (`categoria_id`),
  KEY `perfil_id` (`perfil_id`),
  CONSTRAINT `subcategoria_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`),
  CONSTRAINT `subcategoria_ibfk_2` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `subcategoria` */

insert  into `subcategoria`(`id`,`nombre`,`detalle`,`foto`,`mapa`,`video`,`tarifa`,`incluye`,`hoteles`,`restaurante`,`perfil_id`,`categoria_id`,`estado`) values (25,'Perú inusual 18 dias','<p style=\"text-align: justify;\"><strong>Itinerario: Lima - Arequipa - Valle de Majes - Ca&ntilde;&oacute;n del Colca - Lago Titicaca - Tambo Queque Norte - Cusco - Valle Sagrado de los Incas - Machu Picchu - Lima.</strong></p>\r\n<p style=\"text-align: justify;\"><span>Descubre Per&uacute; fuera de lo com&uacute;n!&nbsp;</span><span>Sin perder inevitable (Machupicchu, Cusco, Lago Titicaca), este viaje incluye excursiones alternativas que te llevan en contacto con el Per&uacute; rural (Valle de Majes), alojamiento (Ca&ntilde;&oacute;n del Colca, la isla de Amantani, Tambo Queque Norte ) y actividades originales y divertidos (nadando en el Pac&iacute;fico con leones marinos, clases de cocina peruana, tienda de chocolate).</span></p>','Paquete-Turistico-Peru-10-dias-09-noches.jpg','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1939.6517496806084!2d-71.97972591547527!3d-13.516956938378383!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x916dd6739cd7f175%3A0x27c9a9082fc6343!2sPlaza+de+Armas!5e0!3m2!1ses-419!2spe!4v1465917809922','w0B3Ltqkjgo ','<p style=\"text-align: center;\">Precio por persona desde<br />2 * hoteles en: US $ 2,475<br />En 3 estrellas Hoteles de normas: US $ 2595<br />3 * hoteles en la parte superior de US $ 2.740<br />En 4 *: US $ 3200<br />En los hoteles de 5 *: $ 4335 de EE.UU.<br />En base a 2 personas en habitaci&oacute;n doble / doble. El precio es orientativo. El precio real puede variar dependiendo de la temporada.</p>','<p><strong>El precio incluye:</strong></p>\r\n<ul>\r\n<li>2 vuelos dom&eacute;sticos Lima-Cusco-Lima y Arequipa con tasas de aeropuertos.</li>\r\n<li>Transporte en veh&iacute;culo privado o un autob&uacute;s superior, como se menciona en el programa.</li>\r\n<li>traslados al aeropuerto o estaci&oacute;n / hotel y viceversa en un veh&iacute;culo privado.</li>\r\n<li>Las noches de alojamiento con desayuno.</li>\r\n<li>Excursiones y visitas mencionadas en el programa con el ingreso a Machupicchu.</li>\r\n</ul>\r\n<p><br /><strong>El precio no incluye:</strong></p>\r\n<ul>\r\n<li>vuelo internacional.</li>\r\n<li>Las comidas, excepto el almuerzo durante las clases de cocina en Arequipa, comidas Casa de familia en Colca y Amantani y picnic durante la caminata Moray y Maras.</li>\r\n<li>Las entradas en algunos sitios en la estaci&oacute;n (para 1 adulto, US $ 87 para todo el circuito).</li>\r\n<li>El seguro de cancelaci&oacute;n / repatriaci&oacute;n.</li>\r\n<li>Tanto los gastos de transacci&oacute;n bancaria.</li>\r\n</ul>','<p>Los hoteles mencionados en el programa son est&aacute;ndar de la categor&iacute;a 3 *. Como un viaje privado, puede elegir los hoteles de categor&iacute;a o incluso cada hotel de forma individual. Por favor, visite nuestros hoteles para obtener m&aacute;s informaci&oacute;n sobre los hoteles con los que trabajamos.</p>','<p>restaurants:</p>\r\n<p>...</p>\r\n<p>&nbsp;</p>',3,3,1);

/*Table structure for table `testimonio` */

DROP TABLE IF EXISTS `testimonio`;

CREATE TABLE `testimonio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `detalle` text,
  `foto` varchar(255) DEFAULT NULL,
  `idioma_id` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idioma_id` (`idioma_id`),
  CONSTRAINT `testimonio_ibfk_1` FOREIGN KEY (`idioma_id`) REFERENCES `idioma` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `testimonio` */

insert  into `testimonio`(`id`,`nombre`,`correo`,`fecha`,`detalle`,`foto`,`idioma_id`,`estado`) values (2,'Carmen omeonte','carmen@hotmail','2016-06-05','<p>sssssssssssss</p>','icpna6.jpg',2,1),(3,'delfina NN','defi@hotmail.com','2016-06-08','<p>c vsd sdfsd fsdsd</p>','sin-foto.png',2,0);

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `usuario` */

insert  into `usuario`(`id`,`nombre`,`pass`,`correo`,`estado`) values (1,'admin','21232f297a57a5a743894a0e4a801fc3','rayedgard@gmail.com',1),(2,'edgard','202cb962ac59075b964b07152d234b70','rayedgard@hotmail.com',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
