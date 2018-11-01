-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: localhost    Database: planificaciondb
-- ------------------------------------------------------
-- Server version	5.7.23-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Actividad`
--

DROP TABLE IF EXISTS `Actividad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Actividad` (
  `id_actividad` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` blob,
  `recursos` blob,
  `tipo_indicador` varchar(45) DEFAULT NULL,
  `id_competencia` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_actividad`),
  UNIQUE KEY `username_UNIQUE` (`id_actividad`),
  KEY `fk_Actividad_Competencia1_idx` (`id_competencia`),
  CONSTRAINT `fk_Actividad_Competencia1` FOREIGN KEY (`id_competencia`) REFERENCES `Competencia` (`id_competencia`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Actividad`
--

LOCK TABLES `Actividad` WRITE;
/*!40000 ALTER TABLE `Actividad` DISABLE KEYS */;
INSERT INTO `Actividad` VALUES (1,'Proyecto 1',_binary 'El proyecto 1 será entregado despues de la cuarta semana del curso, debe abarcar hasta el tema de SOA.',_binary 'Clases presenciales, video-tutorial de implementacion de SOA, bibliografia del curso.','1',1),(2,'Practica 1',_binary 'Desarrollo de una aplicación que ponga en práctica los conceptos de SOA utilizando servicios web y un bus de integración.',_binary 'Enunciado, ingeniería de requerimientos, correo electrónico, horario de laboratorio.',NULL,5),(3,'Tarea 1',_binary 'La tarea 1 debe consistir en investigar y realizar un cuadro comparativo entre los diferentes proveedores de la nube.',_binary 'Internet.',NULL,5),(4,'Exposición','','',NULL,6);
/*!40000 ALTER TABLE `Actividad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Competencia`
--

DROP TABLE IF EXISTS `Competencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Competencia` (
  `id_competencia` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` blob,
  `id_perfil` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_competencia`),
  UNIQUE KEY `username_UNIQUE` (`id_competencia`),
  KEY `fk_Competencia_Instancia1_idx` (`id_perfil`),
  CONSTRAINT `fk_Competencia_Perf1` FOREIGN KEY (`id_perfil`) REFERENCES `Perfil` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Competencia`
--

LOCK TABLES `Competencia` WRITE;
/*!40000 ALTER TABLE `Competencia` DISABLE KEYS */;
INSERT INTO `Competencia` VALUES (1,'Arquitecto de software',_binary 'Que los estudiantes aprendan y sepan implementar sus conocimientos al momento de diseñar una arquitectura de software.',1),(2,'Trabajo en equipo',_binary 'Realiza actividades conjuntas con un propósito común y con una contribución productiva donde se intercambia información, se asumen responsabilidades, se resuelven conflictos y se toman decisiones para lograr los resultados esperados.',2),(3,'Comunicativa',_binary ' Expresa con claridad y coherencia las ideas o argumentos a través de medios escritos, orales o gráficos de acuerdo con el propósito comunicativo, las normas del lenguaje y el respeto a los derechos de autor y comprender el significado y el sentido del mensaje textual, discursivo o gráfico conducente a lograr un proceso comunicativo efectivo, en español y en inglés.',2),(4,'Pensamiento sistémico',_binary 'Resuelve problemas que apoyan la toma de decisiones personales y profesionales, mediante la identificación del sistema, su contexto, sus partes, sus interrelaciones y su comportamiento dinámico, y la determinación de los elementos estructurales claves sobre los que se debe actuar para resolver el problema.',2),(5,'Proyectos',_binary 'Planea, organiza, implementa y evalúa proyectos de física considerando los aspectos técnicos, económicos así como los requerimientos, productos esperados y el correspondiente análisis de los impactos.',2),(6,'Hablar en público',_binary '...',1);
/*!40000 ALTER TABLE `Competencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Curso`
--

DROP TABLE IF EXISTS `Curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Curso` (
  `id_curso` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `curso` varchar(45) NOT NULL,
  PRIMARY KEY (`id_curso`),
  UNIQUE KEY `id_curso_UNIQUE` (`id_curso`)
) ENGINE=InnoDB AUTO_INCREMENT=781 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Curso`
--

LOCK TABLES `Curso` WRITE;
/*!40000 ALTER TABLE `Curso` DISABLE KEYS */;
INSERT INTO `Curso` VALUES (1,'Curso #1'),(780,'Software Avanzado');
/*!40000 ALTER TABLE `Curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Indicador`
--

DROP TABLE IF EXISTS `Indicador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Indicador` (
  `id_indicador` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_indicador` varchar(15) DEFAULT NULL,
  `evaluacion` int(11) DEFAULT NULL,
  `id_actividad` int(10) unsigned NOT NULL,
  `carnet` bigint(20) NOT NULL,
  PRIMARY KEY (`id_indicador`),
  UNIQUE KEY `username_UNIQUE` (`id_indicador`),
  KEY `fk_Indicador_Actividad1_idx` (`id_actividad`),
  KEY `fk_Indicador_estudiante1_idx` (`carnet`),
  CONSTRAINT `fk_Indicador_Actividad1` FOREIGN KEY (`id_actividad`) REFERENCES `Actividad` (`id_actividad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Indicador_estudiante1` FOREIGN KEY (`carnet`) REFERENCES `estudiante` (`carnet`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Indicador`
--

LOCK TABLES `Indicador` WRITE;
/*!40000 ALTER TABLE `Indicador` DISABLE KEYS */;
/*!40000 ALTER TABLE `Indicador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Inscribir_estudiante`
--

DROP TABLE IF EXISTS `Inscribir_estudiante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Inscribir_estudiante` (
  `id_instancia` int(10) unsigned NOT NULL,
  `carnet` bigint(20) NOT NULL,
  KEY `fk_Inscribir_estudiante_Instancia1_idx` (`id_instancia`),
  KEY `fk_Inscribir_estudiante_estudiante1_idx` (`carnet`),
  CONSTRAINT `fk_Inscribir_estudiante_Instancia1` FOREIGN KEY (`id_instancia`) REFERENCES `Instancia` (`id_instancia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Inscribir_estudiante_estudiante1` FOREIGN KEY (`carnet`) REFERENCES `estudiante` (`carnet`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Inscribir_estudiante`
--

LOCK TABLES `Inscribir_estudiante` WRITE;
/*!40000 ALTER TABLE `Inscribir_estudiante` DISABLE KEYS */;
/*!40000 ALTER TABLE `Inscribir_estudiante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Instancia`
--

DROP TABLE IF EXISTS `Instancia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Instancia` (
  `id_instancia` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `seccion` varchar(45) NOT NULL,
  `semestre` varchar(45) NOT NULL,
  `id_curso` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_instancia`),
  UNIQUE KEY `id_curso_UNIQUE` (`id_instancia`),
  KEY `fk_Instancia_Curso_idx` (`id_curso`),
  CONSTRAINT `fk_Instancia_Curso` FOREIGN KEY (`id_curso`) REFERENCES `Curso` (`id_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Instancia`
--

LOCK TABLES `Instancia` WRITE;
/*!40000 ALTER TABLE `Instancia` DISABLE KEYS */;
INSERT INTO `Instancia` VALUES (1,'A','1er. semestre',1),(2,'A','1er. semestre',780),(3,'A','1er. semestre 2019',780),(4,'C','Vacaciones diciembre 2018',780);
/*!40000 ALTER TABLE `Instancia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Perfil`
--

DROP TABLE IF EXISTS `Perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Perfil` (
  `id_perfil` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` blob,
  `id_instancia` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_perfil`),
  UNIQUE KEY `username_UNIQUE2` (`id_perfil`),
  KEY `fk_Actividad_Competencia2_idx` (`id_instancia`),
  CONSTRAINT `fk_Actividad_Competencia2` FOREIGN KEY (`id_instancia`) REFERENCES `Instancia` (`id_instancia`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Perfil`
--

LOCK TABLES `Perfil` WRITE;
/*!40000 ALTER TABLE `Perfil` DISABLE KEYS */;
INSERT INTO `Perfil` VALUES (1,'Perfil de estudiantes de SA',_binary 'Que el estudiante domine...',2),(2,'Perfil de SA 2',_binary 'El perfil profesional o de egreso está orientado hacia el desarrollo de competencias que determinan las capacidades del egresado como persona y como profesional, velando siempre por la excelencia académica y entendiendo la formación inicial como el punto de partida para una educación para la vida.  Esto está de acuerdo con la visión que inspiró la creación de la Universidad EIA “orientada a crear en los estudiantes una versatilidad mental y una capacidad para adquirir nuevos conocimientos, considerando que la formación profesional es un activo en perfecto desarrollo” (Proyeto Institucional EIA 2014). El plan curricular del programa de Física está diseñado para desarrollar las siguientes competencias genéricas personales:',1);
/*!40000 ALTER TABLE `Perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Usuario`
--

DROP TABLE IF EXISTS `Usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Usuario` (
  `username` varchar(20) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `tipo_usuario` int(10) unsigned NOT NULL DEFAULT '0',
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `correo_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Usuario`
--

LOCK TABLES `Usuario` WRITE;
/*!40000 ALTER TABLE `Usuario` DISABLE KEYS */;
INSERT INTO `Usuario` VALUES ('1','catedratico','1234',2,'catedratico@gmail.com'),('201403914','Juan Ruiz','jean11',1,'jruizg96.11@gmail.com'),('carnet','administrador','jean11',1,'admin@planificacion.usac.edu.gt'),('tutor_carnet','Tutor X','jean11',3,'tutor@planificacion.usac.edu.gt');
/*!40000 ALTER TABLE `Usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asignacion_usuario_curso`
--

DROP TABLE IF EXISTS `asignacion_usuario_curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asignacion_usuario_curso` (
  `username` varchar(20) NOT NULL,
  `id_curso` int(10) unsigned NOT NULL,
  PRIMARY KEY (`username`,`id_curso`),
  KEY `fk_asignacion_usuario_curso_Usuario1_idx` (`username`),
  KEY `fk_asignacion_usuario_curso_Curso1_idx` (`id_curso`),
  CONSTRAINT `fk_asignacion_usuario_curso_Curso1` FOREIGN KEY (`id_curso`) REFERENCES `Curso` (`id_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_asignacion_usuario_curso_Usuario1` FOREIGN KEY (`username`) REFERENCES `Usuario` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignacion_usuario_curso`
--

LOCK TABLES `asignacion_usuario_curso` WRITE;
/*!40000 ALTER TABLE `asignacion_usuario_curso` DISABLE KEYS */;
INSERT INTO `asignacion_usuario_curso` VALUES ('1',1),('201403914',1),('201403914',780),('carnet',780);
/*!40000 ALTER TABLE `asignacion_usuario_curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asignacion_usuario_instancia`
--

DROP TABLE IF EXISTS `asignacion_usuario_instancia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asignacion_usuario_instancia` (
  `username` varchar(20) NOT NULL,
  `id_instancia` int(10) unsigned NOT NULL,
  PRIMARY KEY (`username`,`id_instancia`),
  KEY `fk_asignacion_usuario_instancia_Usuario1_idx` (`username`),
  KEY `fk_asignacion_usuario_instancia_Curso1_idx` (`id_instancia`),
  CONSTRAINT `fk_asignacion_usuario_instancia_Instancia1` FOREIGN KEY (`id_instancia`) REFERENCES `Instancia` (`id_instancia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_asignacion_usuario_instancia_Usuario1` FOREIGN KEY (`username`) REFERENCES `Usuario` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignacion_usuario_instancia`
--

LOCK TABLES `asignacion_usuario_instancia` WRITE;
/*!40000 ALTER TABLE `asignacion_usuario_instancia` DISABLE KEYS */;
INSERT INTO `asignacion_usuario_instancia` VALUES ('tutor_carnet',1);
/*!40000 ALTER TABLE `asignacion_usuario_instancia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estudiante`
--

DROP TABLE IF EXISTS `estudiante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estudiante` (
  `carnet` bigint(20) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  PRIMARY KEY (`carnet`),
  UNIQUE KEY `username_UNIQUE` (`carnet`),
  UNIQUE KEY `correo_UNIQUE` (`correo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiante`
--

LOCK TABLES `estudiante` WRITE;
/*!40000 ALTER TABLE `estudiante` DISABLE KEYS */;
/*!40000 ALTER TABLE `estudiante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `tipo_usuario` int(10) unsigned NOT NULL DEFAULT '0',
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `correo_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-01  8:49:18
