/*
SQLyog Community v12.2.2 (64 bit)
MySQL - 10.1.13-MariaDB : Database - dbinformes
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbinformes` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dbinformes`;

/*Table structure for table `tbladvertencia` */

DROP TABLE IF EXISTS `tbladvertencia`;

CREATE TABLE `tbladvertencia` (
  `intIdAdvertencia` int(11) NOT NULL AUTO_INCREMENT,
  `intIdVendedor` int(11) NOT NULL,
  `intIdVisita` int(11) NOT NULL,
  `dtFecha` date DEFAULT NULL,
  `dtHora` time DEFAULT NULL,
  PRIMARY KEY (`intIdAdvertencia`),
  KEY `intIdVendedor` (`intIdVendedor`),
  KEY `intIdVisita` (`intIdVisita`),
  CONSTRAINT `tbladvertencia_ibfk_1` FOREIGN KEY (`intIdVendedor`) REFERENCES `tblusuario` (`intIdUsuario`),
  CONSTRAINT `tbladvertencia_ibfk_2` FOREIGN KEY (`intIdVisita`) REFERENCES `tblvisita` (`intIdVisita`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbladvertencia` */

/*Table structure for table `tblcliente` */

DROP TABLE IF EXISTS `tblcliente`;

CREATE TABLE `tblcliente` (
  `intIdCliente` int(11) NOT NULL AUTO_INCREMENT,
  `vchEmpresa` varchar(200) DEFAULT NULL,
  `vchRFC` varchar(20) DEFAULT NULL,
  `vchDireccion` varchar(500) DEFAULT NULL,
  `vchTel` varchar(50) DEFAULT NULL,
  `vchCorreo` varchar(50) DEFAULT NULL,
  `intVisible` int(50) DEFAULT '1',
  `vchLatitud` varchar(50) DEFAULT NULL,
  `vchLongitud` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`intIdCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tblcliente` */

insert  into `tblcliente`(`intIdCliente`,`vchEmpresa`,`vchRFC`,`vchDireccion`,`vchTel`,`vchCorreo`,`intVisible`,`vchLatitud`,`vchLongitud`) values 
(1,'SAT','SAT5218gdb','Centro, Mty,Nl','81262625162','sat@gob.mx',0,NULL,NULL),
(2,'Gravitar','REAO941223T91','San Jeronimo Mty,N.L.','8120682508','omar94.olr@gmail.com',1,'25.677907832948264','-100.36800384521484'),
(3,'Omar','REAO941223T91','JOSE SANTOS CHOCANO 3715#','8120682508','omar94.olr@gmail.com',1,'25.687232658861397','-100.27693773572082'),
(4,'Norte SA de CV.','NORTE9393','Conocido','54154151','norte@mail.com',1,NULL,NULL),
(5,'Tarjetas del Noreste','TASh378788','Matamoros 408, centro, Monterrey, N.l.','8415145415','sat@gob.mx',1,'25.669125116407088','-100.31246953571775');

/*Table structure for table `tblusuario` */

DROP TABLE IF EXISTS `tblusuario`;

CREATE TABLE `tblusuario` (
  `intIdUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `vchUsuario` varchar(50) NOT NULL,
  `vchPass` varchar(50) NOT NULL,
  `vchCorreo` varchar(50) NOT NULL,
  `intEstatus` int(11) DEFAULT '1',
  `vchImagen` varchar(200) DEFAULT NULL,
  `vchNombre` varchar(50) DEFAULT NULL,
  `intPrivilegio` int(11) DEFAULT NULL,
  `intVisible` int(11) DEFAULT '1',
  PRIMARY KEY (`intIdUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `tblusuario` */

insert  into `tblusuario`(`intIdUsuario`,`vchUsuario`,`vchPass`,`vchCorreo`,`intEstatus`,`vchImagen`,`vchNombre`,`intPrivilegio`,`intVisible`) values 
(1,'oswaldo','Admin','Admin@dd',1,'img.jpg','Oswaldo',1,1),
(2,'Lenin','Admin','Admin',0,'img.jpg','Administrador del Sistema',1,1),
(3,'Admin','Admin','Admin',1,'img.jpg','Administrador del Sistema',0,1),
(4,'Admin3','Admin','Admin',1,'picture2.jpg','Administrador del Sistema',NULL,1),
(5,'Admin','Admin','Admin',0,'img.jpg','Administrador del Sistema',0,0),
(6,'Admin66','Admin','Admin@mail.com',0,'img.jpg','Administrador del Sistema',0,1),
(7,'Admin','Admin','Admin',1,'img.jpg','Administrador del Sistema',NULL,1),
(8,'Admin','Admin','Admin',1,'img.jpg','Juan Perez',0,0),
(9,'Admin','Admin','Admin',0,'img.jpg','Administrador del Sistema',NULL,1),
(10,'Admin','Admin','Admin',1,'img.jpg','Administrador del Sistema',NULL,1),
(11,'Admin','Admin','Admin',0,'picture.jpg','Administrador del Sistema',NULL,1),
(12,'Admin','Admin','Admin',1,'img.jpg','Administrador del Sistema',NULL,1),
(13,'Admin','Admin','Admin',1,'img.jpg','Administrador del Sistema',NULL,1),
(14,'Admin','Admin','Admin',1,'img.jpg','Administrador del Sistema',NULL,1),
(15,'Admin','Admin','Admin',1,'img.jpg','Administrador del Sistema',NULL,1),
(16,'Admin','Admin','Admin',1,'img.jpg','Administrador del Sistema',NULL,1),
(17,'Admin','Admin','Admin',1,'img.jpg','Administrador del Sistema',NULL,1),
(18,'Admin','Admin','Admin',1,'img.jpg','Administrador del Sistema',NULL,1),
(19,'Admin','Admin','Admin',1,'img.jpg','Administrador del Sistema',NULL,1),
(20,'Admin','Admin','Admin',1,'img.jpg','Administrador del Sistema',NULL,1),
(21,'Admin','Admin','Admin',1,'img.jpg','Administrador del Sistema',NULL,1),
(22,'Admin','Admin','Admin',1,'img.jpg','Administrador del Sistema',NULL,1),
(23,'Admin','Admin','Admin',1,'img.jpg','Administrador del Sistema',NULL,1),
(24,'','','',1,NULL,'',1,0);

/*Table structure for table `tblvisita` */

DROP TABLE IF EXISTS `tblvisita`;

CREATE TABLE `tblvisita` (
  `intIdVisita` int(11) NOT NULL AUTO_INCREMENT,
  `intIdVendedor` int(11) NOT NULL,
  `intIdCliente` int(11) NOT NULL,
  `vchUbicacion` varchar(200) DEFAULT NULL,
  `vchLatitud` varchar(100) DEFAULT NULL,
  `vchLongitud` varchar(100) DEFAULT NULL,
  `txtComentario` text,
  `dtFecha` date DEFAULT NULL,
  `dtHoraLlegada` time DEFAULT NULL,
  `dtHoraSalida` time DEFAULT NULL,
  `intConcluido` int(11) DEFAULT NULL,
  PRIMARY KEY (`intIdVisita`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

/*Data for the table `tblvisita` */

insert  into `tblvisita`(`intIdVisita`,`intIdVendedor`,`intIdCliente`,`vchUbicacion`,`vchLatitud`,`vchLongitud`,`txtComentario`,`dtFecha`,`dtHoraLlegada`,`dtHoraSalida`,`intConcluido`) values 
(1,3,2,'Monterrey','25.680211','-100.280113','Somos una empresa 100% mexicana que fue creada por la creciente necesidad de la industria  de atención personalizada y precios competitivos.\r\n\r\nNuestra Misión, es ofrecer a nuestros clientes las mejores soluciones en sus necesidades de soldadura, gases, abrasivos, herramientas, máquinas de soldadura y plasma y equipos de oxi-corte, reparación y mantenimiento de motores y máquinas de soldar, con un extenso surtido de productos de alta calidad y mano de obra calificada para que usted desarrolle sus labores con seguridad y eficiencia.\r\n\r\nGracias a nuestro extenso surtido y un inventario siempre actualizado, aseguramos un excelente servicio a nuestros clientes a precios competitivos, con artículos de alta calidad y entregas a domicilio sin costo adicional dentro del área metropolitana de Monterrey.','2016-05-25','15:00:00','16:00:00',1),
(2,1,1,'Guadalupe','25.677156','-100.259156',NULL,'2016-05-26','15:20:00','16:10:00',1),
(16,3,2,'José Santos Chocano 3715, Madero, Monterrey, México','25.6872517','-100.2769608',NULL,'2016-05-29','06:50:23',NULL,0),
(17,3,4,'José Santos Chocano 3715, Madero, Monterrey, México','25.6872412','-100.2769625',NULL,'2016-05-29','06:51:42',NULL,1),
(18,3,3,'José Santos Chocano 3715, Madero, Monterrey, México','25.6872412','-100.2769625',NULL,'2016-05-28','23:53:05',NULL,0),
(19,3,3,'José Santos Chocano 3715, Madero, Monterrey, México','25.6872525','-100.2769588',NULL,'2016-05-29','20:10:10',NULL,0),
(20,3,5,'Calle Matamoros 403a, Centro, Monterrey, México','25.6691975','-100.3122317',NULL,'2016-06-02','10:38:30',NULL,0),
(21,3,5,'Calle Matamoros 403a, Centro, Monterrey, México','25.6691963','-100.3122494',NULL,'2016-06-02','10:46:23',NULL,0),
(22,3,5,'Calle Matamoros 403a, Centro, Monterrey, México','25.6691964','-100.3122249',NULL,'2016-06-02','10:50:17',NULL,0),
(23,3,5,'Calle Matamoros 403a, Centro, Monterrey, México','25.6691974','-100.3122324',NULL,'2016-06-02','10:56:59',NULL,0),
(24,1,5,'Calle Matamoros 403a, Centro, Monterrey, México','25.6691928','-100.3122951',NULL,'2016-06-02','11:00:44',NULL,0),
(25,1,5,'Calle Matamoros 403a, Centro, Monterrey, México','25.6691964','-100.3122237',NULL,'2016-06-02','12:27:00',NULL,0),
(26,1,5,'Calle Matamoros 403a, Centro, Monterrey, México','25.6691981','-100.3122093',NULL,'2016-06-02','12:56:54',NULL,0),
(27,1,5,'Calle Matamoros 403a, Centro, Monterrey, México','25.6691986','-100.3122387',NULL,'2016-06-02','13:02:18',NULL,0),
(28,1,5,'Calle Matamoros 403a, Centro, Monterrey, México','25.6691994','-100.3122243',NULL,'2016-06-02','13:06:43',NULL,0),
(29,1,5,'Calle Matamoros 403a, Centro, Monterrey, México','25.6691998','-100.3122308',NULL,'2016-06-02','13:09:00',NULL,0),
(30,1,5,'Calle Matamoros 403a, Centro, Monterrey, México','25.6691994','-100.3122303',NULL,'2016-06-02','13:18:18',NULL,0),
(31,1,5,'Calle Matamoros 403a, Centro, Monterrey, México','25.6691941','-100.3122996',NULL,'2016-06-02','13:22:47',NULL,0),
(32,1,5,'Calle Matamoros 403a, Centro, Monterrey, México','25.6691967','-100.3122325',NULL,'2016-06-02','13:33:04',NULL,0),
(33,1,5,'Calle Matamoros 403a, Centro, Monterrey, México','25.6691964','-100.3122337',NULL,'2016-06-02','13:34:33',NULL,0),
(34,1,5,'Calle Matamoros 403a, Centro, Monterrey, México','25.6691969','-100.3122278',NULL,'2016-06-02','13:49:33',NULL,0),
(35,1,5,'Calle Matamoros 403a, Centro, Monterrey, México','25.6691962','-100.3122242',NULL,'2016-06-02','13:55:06',NULL,0),
(36,1,5,'Calle Matamoros 403a, Centro, Monterrey, México','25.6691981','-100.3122358',NULL,'2016-06-02','14:05:32',NULL,0),
(37,1,5,'Calle Matamoros 403a, Centro, Monterrey, México','25.6691978','-100.3122386',NULL,'2016-06-02','14:18:28',NULL,0),
(38,1,5,'Calle Matamoros 403a, Centro, Monterrey, México','25.6691985','-100.3122387',NULL,'2016-06-02','14:20:26',NULL,0),
(39,1,5,'Calle Matamoros 403a, Centro, Monterrey, México','25.6691981','-100.3122252',NULL,'2016-06-02','14:22:20',NULL,0),
(40,1,5,'Calle Matamoros 403a, Centro, Monterrey, México','25.6691972','-100.3122384',NULL,'2016-06-02','14:34:06',NULL,0),
(41,1,5,'Calle Matamoros 413, Monterrey Antiguo, Centro, Monterrey, México','25.6691872','-100.3123532',NULL,'2016-06-02','14:34:59',NULL,0),
(42,1,5,'Calle Matamoros 403a, Centro, Monterrey, México','25.6691981','-100.3122203',NULL,'2016-06-02','14:36:30',NULL,0),
(43,1,5,'Calle Matamoros 415, Monterrey Antiguo, Centro, Monterrey, México','25.669197','-100.3122043',NULL,'2016-06-02','14:39:16',NULL,0),
(44,1,5,'Calle Matamoros 403a, Centro, Monterrey, México','25.6691971','-100.3122161',NULL,'2016-06-02','14:41:18',NULL,0),
(45,1,5,'Calle Matamoros 403a, Centro, Monterrey, México','25.6691934','-100.3122983',NULL,'2016-06-02','14:43:03',NULL,0),
(46,1,5,'Calle Matamoros 403a, Centro, Monterrey, México','25.6691967','-100.3122067',NULL,'2016-06-02','14:48:11',NULL,0),
(47,1,5,'Calle Matamoros 403a, Centro, Monterrey, México','25.6691967','-100.3122067',NULL,'2016-06-02','14:49:43',NULL,0),
(48,1,5,'Calle Matamoros 403a, Centro, Monterrey, México','25.6691988','-100.312227',NULL,'2016-06-02','14:51:52',NULL,0),
(49,1,5,'Calle Matamoros 403a, Centro, Monterrey, México','25.6691958','-100.312232',NULL,'2016-06-02','15:01:36',NULL,0),
(50,1,5,'Calle Matamoros 403a, Centro, Monterrey, México','25.6691992','-100.3122236',NULL,'2016-06-02','16:24:34',NULL,0),
(51,1,5,'Calle Matamoros 403a, Centro, Monterrey, México','25.6691963','-100.3122103',NULL,'2016-06-02','16:34:11',NULL,0),
(52,1,5,'Calle Matamoros 403a, Centro, Monterrey, México','25.6691963','-100.3122152',NULL,'2016-06-02','16:36:41',NULL,0),
(53,1,5,'Calle Matamoros 403a, Centro, Monterrey, México','25.6691992','-100.3122141',NULL,'2016-06-02','16:45:55',NULL,0),
(54,1,5,'Calle Matamoros 403a, Centro, Monterrey, México','25.6691976','-100.3122446',NULL,'2016-06-02','16:46:53',NULL,0),
(55,1,5,'Calle Matamoros 403a, Centro, Monterrey, México','25.6691993','-100.3122108',NULL,'2016-06-02','16:48:30',NULL,0),
(56,1,5,'Calle Matamoros 403a, Centro, Monterrey, México','25.6691965','-100.3122219',NULL,'2016-06-02','16:51:01',NULL,0),
(57,1,5,'Calle Matamoros 403a, Centro, Monterrey, México','25.6691962','-100.3122244',NULL,'2016-06-02','16:52:29',NULL,0),
(58,1,5,'Calle Matamoros 403a, Centro, Monterrey, México','25.6691964','-100.3122133',NULL,'2016-06-02','16:53:55',NULL,0),
(59,1,5,'Calle Matamoros 403a, Centro, Monterrey, México','25.6691968','-100.3122182',NULL,'2016-06-02','16:57:32',NULL,0),
(60,3,5,'Calle Matamoros 401, Centro, Monterrey, México','25.6692074','-100.3123112',NULL,'2016-06-02','17:08:17',NULL,0),
(61,1,5,'Calle Matamoros 403a, Centro, Monterrey, México','25.6691981','-100.3122357',NULL,'2016-06-02','17:10:13',NULL,0),
(62,1,5,'Calle Matamoros 403a, Centro, Monterrey, México','25.6691965','-100.3122229',NULL,'2016-06-02','17:11:15',NULL,0),
(63,1,5,'Calle Matamoros 403a, Centro, Monterrey, México','25.6691981','-100.3122307',NULL,'2016-06-02','17:16:07',NULL,0),
(64,1,5,'Calle Matamoros 403a, Centro, Monterrey, México','25.669197','-100.3122251',NULL,'2016-06-02','17:23:26',NULL,0),
(65,3,5,'Calle Carlos Salazar 452, Centro, Monterrey, México','25.68166666666667','-100.31',NULL,'2016-06-02','17:40:45',NULL,0);

/*Table structure for table `view_acceso` */

DROP TABLE IF EXISTS `view_acceso`;

/*!50001 DROP VIEW IF EXISTS `view_acceso` */;
/*!50001 DROP TABLE IF EXISTS `view_acceso` */;

/*!50001 CREATE TABLE  `view_acceso`(
 `intIdUsuario` int(11) ,
 `vchUsuario` varchar(50) ,
 `vchPass` varchar(50) ,
 `vchNombre` varchar(50) ,
 `vchCorreo` varchar(50) ,
 `vchImagen` varchar(200) 
)*/;

/*Table structure for table `view_acceso_movil` */

DROP TABLE IF EXISTS `view_acceso_movil`;

/*!50001 DROP VIEW IF EXISTS `view_acceso_movil` */;
/*!50001 DROP TABLE IF EXISTS `view_acceso_movil` */;

/*!50001 CREATE TABLE  `view_acceso_movil`(
 `intIdUsuario` int(11) ,
 `vchUsuario` varchar(50) ,
 `vchPass` varchar(50) ,
 `vchNombre` varchar(50) ,
 `vchCorreo` varchar(50) ,
 `vchImagen` varchar(200) 
)*/;

/*Table structure for table `view_cliente` */

DROP TABLE IF EXISTS `view_cliente`;

/*!50001 DROP VIEW IF EXISTS `view_cliente` */;
/*!50001 DROP TABLE IF EXISTS `view_cliente` */;

/*!50001 CREATE TABLE  `view_cliente`(
 `intIdCliente` int(11) ,
 `vchEmpresa` varchar(200) ,
 `vchRFC` varchar(20) ,
 `vchDireccion` varchar(500) ,
 `vchTel` varchar(50) ,
 `vchCorreo` varchar(50) ,
 `intVisible` int(50) ,
 `vchLatitud` varchar(50) ,
 `vchLongitud` varchar(50) 
)*/;

/*Table structure for table `view_vendedor` */

DROP TABLE IF EXISTS `view_vendedor`;

/*!50001 DROP VIEW IF EXISTS `view_vendedor` */;
/*!50001 DROP TABLE IF EXISTS `view_vendedor` */;

/*!50001 CREATE TABLE  `view_vendedor`(
 `intIdUsuario` int(11) ,
 `vchUsuario` varchar(50) ,
 `vchPass` varchar(50) ,
 `vchCorreo` varchar(50) ,
 `intEstatus` int(11) ,
 `vchImagen` varchar(200) ,
 `vchNombre` varchar(50) ,
 `intPrivilegio` int(11) ,
 `intVisible` int(11) 
)*/;

/*Table structure for table `view_visita` */

DROP TABLE IF EXISTS `view_visita`;

/*!50001 DROP VIEW IF EXISTS `view_visita` */;
/*!50001 DROP TABLE IF EXISTS `view_visita` */;

/*!50001 CREATE TABLE  `view_visita`(
 `intIdVisita` int(11) ,
 `vchVendedor` varchar(50) ,
 `vchCliente` varchar(200) ,
 `vchUbicacion` varchar(200) ,
 `vchLatitud` varchar(100) ,
 `vchLongitud` varchar(100) ,
 `txtComentario` text ,
 `dtFecha` date ,
 `tmHoraE` time ,
 `tmHoraS` time ,
 `intConcluido` int(11) 
)*/;

/*View structure for view view_acceso */

/*!50001 DROP TABLE IF EXISTS `view_acceso` */;
/*!50001 DROP VIEW IF EXISTS `view_acceso` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_acceso` AS select `tblusuario`.`intIdUsuario` AS `intIdUsuario`,`tblusuario`.`vchUsuario` AS `vchUsuario`,`tblusuario`.`vchPass` AS `vchPass`,`tblusuario`.`vchNombre` AS `vchNombre`,`tblusuario`.`vchCorreo` AS `vchCorreo`,`tblusuario`.`vchImagen` AS `vchImagen` from `tblusuario` where (`tblusuario`.`intEstatus` = 1) */;

/*View structure for view view_acceso_movil */

/*!50001 DROP TABLE IF EXISTS `view_acceso_movil` */;
/*!50001 DROP VIEW IF EXISTS `view_acceso_movil` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_acceso_movil` AS select `tblusuario`.`intIdUsuario` AS `intIdUsuario`,`tblusuario`.`vchUsuario` AS `vchUsuario`,`tblusuario`.`vchPass` AS `vchPass`,`tblusuario`.`vchNombre` AS `vchNombre`,`tblusuario`.`vchCorreo` AS `vchCorreo`,`tblusuario`.`vchImagen` AS `vchImagen` from `tblusuario` where ((`tblusuario`.`intEstatus` = 1) and (`tblusuario`.`intPrivilegio` = 0)) */;

/*View structure for view view_cliente */

/*!50001 DROP TABLE IF EXISTS `view_cliente` */;
/*!50001 DROP VIEW IF EXISTS `view_cliente` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_cliente` AS select `tblcliente`.`intIdCliente` AS `intIdCliente`,`tblcliente`.`vchEmpresa` AS `vchEmpresa`,`tblcliente`.`vchRFC` AS `vchRFC`,`tblcliente`.`vchDireccion` AS `vchDireccion`,`tblcliente`.`vchTel` AS `vchTel`,`tblcliente`.`vchCorreo` AS `vchCorreo`,`tblcliente`.`intVisible` AS `intVisible`,`tblcliente`.`vchLatitud` AS `vchLatitud`,`tblcliente`.`vchLongitud` AS `vchLongitud` from `tblcliente` where (`tblcliente`.`intVisible` = 1) */;

/*View structure for view view_vendedor */

/*!50001 DROP TABLE IF EXISTS `view_vendedor` */;
/*!50001 DROP VIEW IF EXISTS `view_vendedor` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_vendedor` AS select `tblusuario`.`intIdUsuario` AS `intIdUsuario`,`tblusuario`.`vchUsuario` AS `vchUsuario`,`tblusuario`.`vchPass` AS `vchPass`,`tblusuario`.`vchCorreo` AS `vchCorreo`,`tblusuario`.`intEstatus` AS `intEstatus`,`tblusuario`.`vchImagen` AS `vchImagen`,`tblusuario`.`vchNombre` AS `vchNombre`,`tblusuario`.`intPrivilegio` AS `intPrivilegio`,`tblusuario`.`intVisible` AS `intVisible` from `tblusuario` where (`tblusuario`.`intVisible` = 1) */;

/*View structure for view view_visita */

/*!50001 DROP TABLE IF EXISTS `view_visita` */;
/*!50001 DROP VIEW IF EXISTS `view_visita` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_visita` AS select `v`.`intIdVisita` AS `intIdVisita`,`u`.`vchNombre` AS `vchVendedor`,`c`.`vchEmpresa` AS `vchCliente`,`v`.`vchUbicacion` AS `vchUbicacion`,`v`.`vchLatitud` AS `vchLatitud`,`v`.`vchLongitud` AS `vchLongitud`,`v`.`txtComentario` AS `txtComentario`,`v`.`dtFecha` AS `dtFecha`,`v`.`dtHoraLlegada` AS `tmHoraE`,`v`.`dtHoraSalida` AS `tmHoraS`,`v`.`intConcluido` AS `intConcluido` from ((`tblvisita` `v` join `tblcliente` `c` on((`c`.`intIdCliente` = `v`.`intIdCliente`))) join `tblusuario` `u` on((`u`.`intIdUsuario` = `v`.`intIdVendedor`))) order by `v`.`intIdVisita` desc */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
