-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: impulsart
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

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
-- Table structure for table `artista`
--

DROP TABLE IF EXISTS `artista`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artista` (
  `PkCod_Artista` int(11) NOT NULL AUTO_INCREMENT,
  `Fk_Identificacion` int(11) NOT NULL,
  `calificacion` int(11) NOT NULL,
  PRIMARY KEY (`PkCod_Artista`),
  KEY `Fk_Identificacion` (`Fk_Identificacion`),
  CONSTRAINT `artista_ibfk_1` FOREIGN KEY (`Fk_Identificacion`) REFERENCES `usuario` (`Pk_Identificacion`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=100005 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artista`
--

LOCK TABLES `artista` WRITE;
/*!40000 ALTER TABLE `artista` DISABLE KEYS */;
INSERT INTO `artista` VALUES (100003,123321123,9),(100004,123456789,6);
/*!40000 ALTER TABLE `artista` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `artistaobra`
--

DROP TABLE IF EXISTS `artistaobra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artistaobra` (
  `FkCod_Artista` int(11) NOT NULL,
  `FkCod_Producto` int(11) NOT NULL,
  KEY `FkCod_Artista` (`FkCod_Artista`),
  KEY `FkCod_Producto` (`FkCod_Producto`),
  CONSTRAINT `artistaobra_ibfk_1` FOREIGN KEY (`FkCod_Artista`) REFERENCES `artista` (`PkCod_Artista`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `artistaobra_ibfk_2` FOREIGN KEY (`FkCod_Producto`) REFERENCES `obra` (`PkCod_Producto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artistaobra`
--

LOCK TABLES `artistaobra` WRITE;
/*!40000 ALTER TABLE `artistaobra` DISABLE KEYS */;
INSERT INTO `artistaobra` VALUES (100003,1000005),(100003,1000006),(100004,1000007),(100004,1000008),(100004,1000009),(100004,1000010);
/*!40000 ALTER TABLE `artistaobra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `PkCod_Cliente` int(11) NOT NULL AUTO_INCREMENT,
  `TipoCliente` varchar(40) NOT NULL,
  `Fk_Identificacion` int(11) NOT NULL,
  `ComprasHechas` int(150) DEFAULT NULL,
  PRIMARY KEY (`PkCod_Cliente`),
  KEY `Fk_Identificacion` (`Fk_Identificacion`),
  CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`Fk_Identificacion`) REFERENCES `usuario` (`Pk_Identificacion`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=400005 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (400001,'cliente usual',234567890,1),(400002,'cliente inactivo',345678901,0),(400003,'cliente comprador',444555666,5),(400004,'cliente usual',456789012,5);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente_pqrs`
--

DROP TABLE IF EXISTS `cliente_pqrs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente_pqrs` (
  `fkcod_cliente` int(11) NOT NULL,
  `fkcod_PQRS` int(11) NOT NULL,
  KEY `fkcod_cliente` (`fkcod_cliente`),
  KEY `fkcod_PQRS` (`fkcod_PQRS`),
  CONSTRAINT `cliente_pqrs_ibfk_1` FOREIGN KEY (`fkcod_cliente`) REFERENCES `cliente` (`PkCod_Cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cliente_pqrs_ibfk_2` FOREIGN KEY (`fkcod_PQRS`) REFERENCES `pqrs` (`PkCod_PQRS`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente_pqrs`
--

LOCK TABLES `cliente_pqrs` WRITE;
/*!40000 ALTER TABLE `cliente_pqrs` DISABLE KEYS */;
INSERT INTO `cliente_pqrs` VALUES (400001,900001),(400003,900002),(400003,900003),(400004,900004),(400004,900005),(400003,900006),(400003,900007),(400003,900008);
/*!40000 ALTER TABLE `cliente_pqrs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clienteventa`
--

DROP TABLE IF EXISTS `clienteventa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clienteventa` (
  `FkCod_Cliente` int(11) NOT NULL,
  `FkCod_Venta` int(11) NOT NULL,
  KEY `FkCod_Cliente` (`FkCod_Cliente`),
  KEY `FkCod_Venta` (`FkCod_Venta`),
  CONSTRAINT `clienteventa_ibfk_1` FOREIGN KEY (`FkCod_Cliente`) REFERENCES `cliente` (`PkCod_Cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `clienteventa_ibfk_2` FOREIGN KEY (`FkCod_Venta`) REFERENCES `venta` (`PkCod_Venta`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clienteventa`
--

LOCK TABLES `clienteventa` WRITE;
/*!40000 ALTER TABLE `clienteventa` DISABLE KEYS */;
INSERT INTO `clienteventa` VALUES (400001,1300001),(400003,1300002),(400003,1300003),(400004,1300004),(400004,1300005),(400003,1300006),(400003,1300007),(400003,1300008),(400004,1300009),(400004,1300010),(400004,1300011);
/*!40000 ALTER TABLE `clienteventa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `despacho`
--

DROP TABLE IF EXISTS `despacho`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `despacho` (
  `PkCod_Domicilio` int(11) NOT NULL AUTO_INCREMENT,
  `Estado` varchar(50) NOT NULL,
  `Comprobante` varchar(50) NOT NULL,
  `FechaEntrega` date NOT NULL,
  `FkCod_venta` int(11) NOT NULL,
  PRIMARY KEY (`PkCod_Domicilio`),
  KEY `FkCod_venta` (`FkCod_venta`),
  CONSTRAINT `despacho_ibfk_1` FOREIGN KEY (`FkCod_venta`) REFERENCES `venta` (`PkCod_Venta`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=600012 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `despacho`
--

LOCK TABLES `despacho` WRITE;
/*!40000 ALTER TABLE `despacho` DISABLE KEYS */;
INSERT INTO `despacho` VALUES (600001,'En camino','','2023-09-12',1300001),(600002,'Recogido por el repartidor','','2023-09-13',1300002),(600003,'en camino','','2023-09-14',1300003),(600004,'Entregado','Producto: Pintura Abstracta entregado','2023-09-15',1300004),(600005,'En camino','','2023-03-05',1300005),(600006,'En camino','','2023-11-07',1300006),(600007,'Recogido por el repartidor','','2023-11-07',1300007),(600008,'En camino','','2023-01-25',1300008),(600009,'Entregado','Producto: Dibujo a tinta entregado','2023-09-15',1300009),(600010,'Recogido por el repartidor','','2023-03-07',1300010),(600011,'Recogido por el repartidor','','2023-03-07',1300011);
/*!40000 ALTER TABLE `despacho` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `devolucion`
--

DROP TABLE IF EXISTS `devolucion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `devolucion` (
  `PkCod_Devolucion` int(11) NOT NULL AUTO_INCREMENT,
  `FechaDevolucion` date NOT NULL,
  `TotalReembolso` int(11) NOT NULL,
  `ComprobanteReembolso` varchar(150) DEFAULT NULL,
  `TotalDevolver` int(11) NOT NULL,
  `FkCod_PQRS` int(11) NOT NULL,
  `FkCod_Venta` int(11) NOT NULL,
  PRIMARY KEY (`PkCod_Devolucion`),
  KEY `FkCod_PQRS` (`FkCod_PQRS`),
  KEY `FkCod_Venta` (`FkCod_Venta`),
  CONSTRAINT `devolucion_ibfk_1` FOREIGN KEY (`FkCod_PQRS`) REFERENCES `pqrs` (`PkCod_PQRS`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `devolucion_ibfk_2` FOREIGN KEY (`FkCod_Venta`) REFERENCES `venta` (`PkCod_Venta`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=500002 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `devolucion`
--

LOCK TABLES `devolucion` WRITE;
/*!40000 ALTER TABLE `devolucion` DISABLE KEYS */;
INSERT INTO `devolucion` VALUES (500001,'2023-09-14',120000,'Transferencia: 120000 a Diego Ramirez',3,900002,1300002);
/*!40000 ALTER TABLE `devolucion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `domiciliario`
--

DROP TABLE IF EXISTS `domiciliario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `domiciliario` (
  `PkCod_domiciliario` int(11) NOT NULL AUTO_INCREMENT,
  `Salario` int(30) NOT NULL,
  `Fk_identificacion` int(11) NOT NULL,
  `FkCod_cargo` int(11) NOT NULL,
  `EntregasPendientes` int(30) DEFAULT NULL,
  `fk_placa` varchar(8) NOT NULL,
  PRIMARY KEY (`PkCod_domiciliario`),
  KEY `Fk_identificacion` (`Fk_identificacion`),
  KEY `FkCod_cargo` (`FkCod_cargo`),
  KEY `Fk_placa` (`fk_placa`),
  CONSTRAINT `domiciliario_ibfk_1` FOREIGN KEY (`Fk_identificacion`) REFERENCES `usuario` (`Pk_Identificacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `domiciliario_ibfk_3` FOREIGN KEY (`fk_placa`) REFERENCES `vehiculo` (`pk_placa`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1500004 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `domiciliario`
--

LOCK TABLES `domiciliario` WRITE;
/*!40000 ALTER TABLE `domiciliario` DISABLE KEYS */;
INSERT INTO `domiciliario` VALUES (1500001,2400000,890123456,200002,7,'BNC001'),(1500002,2250000,987654321,200002,6,'CUM301'),(1500003,2500000,999888777,200002,6,'MET001');
/*!40000 ALTER TABLE `domiciliario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `domiciliario_despacho`
--

DROP TABLE IF EXISTS `domiciliario_despacho`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `domiciliario_despacho` (
  `FkCod_domicilio` int(11) NOT NULL,
  `FkCod_domiciliario` int(11) NOT NULL,
  KEY `FkCod_domiciliario` (`FkCod_domiciliario`),
  KEY `FkCod_domicilio` (`FkCod_domicilio`),
  CONSTRAINT `domiciliario_despacho_ibfk_1` FOREIGN KEY (`FkCod_domiciliario`) REFERENCES `domiciliario` (`PkCod_domiciliario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `domiciliario_despacho_ibfk_2` FOREIGN KEY (`FkCod_domicilio`) REFERENCES `despacho` (`PkCod_Domicilio`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `domiciliario_despacho`
--

LOCK TABLES `domiciliario_despacho` WRITE;
/*!40000 ALTER TABLE `domiciliario_despacho` DISABLE KEYS */;
INSERT INTO `domiciliario_despacho` VALUES (600001,1500001),(600002,1500001),(600003,1500001),(600004,1500001),(600005,1500002),(600006,1500002),(600007,1500003),(600008,1500003),(600009,1500003),(600010,1500001),(600011,1500002);
/*!40000 ALTER TABLE `domiciliario_despacho` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleado` (
  `PkCod_Empleado` int(11) NOT NULL AUTO_INCREMENT,
  `Salario` int(11) NOT NULL,
  `Fk_Identificacion` int(11) NOT NULL,
  `FkCod_Cargo` int(11) NOT NULL,
  `CasosPendientes` int(150) DEFAULT NULL,
  PRIMARY KEY (`PkCod_Empleado`),
  KEY `Fk_Identificacion` (`Fk_Identificacion`),
  KEY `FkCod_Cargo` (`FkCod_Cargo`),
  CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`Fk_Identificacion`) REFERENCES `usuario` (`Pk_Identificacion`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1400005 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleado`
--

LOCK TABLES `empleado` WRITE;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT INTO `empleado` VALUES (1400001,3500000,567890123,200001,1),(1400002,3200000,678901234,200001,0),(1400003,3800000,777888999,200001,4),(1400004,4000000,789012345,200001,2);
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `especialidad`
--

DROP TABLE IF EXISTS `especialidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `especialidad` (
  `pkCod_Especialidad` int(11) NOT NULL AUTO_INCREMENT,
  `NombreEspecialidad` varchar(150) DEFAULT NULL,
  `Descripcion` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`pkCod_Especialidad`)
) ENGINE=InnoDB AUTO_INCREMENT=1600005 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especialidad`
--

LOCK TABLES `especialidad` WRITE;
/*!40000 ALTER TABLE `especialidad` DISABLE KEYS */;
INSERT INTO `especialidad` VALUES (1600001,'Pintura','Es un tipo de arte que utiliza pigmentos líquidos para crear imágenes'),(1600002,'Ceramica','Es un tipo de arte que se realiza con arcilla y otros materiales cerámicos. Se modela, seca y luego se cuece en un horno para endurecerla.'),(1600003,'Escultura','Son figuras esculpidas con una variedad de materiales, como piedra, madera, metal, yeso o arcilla.'),(1600004,'Dibujo','Es la creación de imágenes visuales utilizando diversos medios, como lápices, carbón, tinta, pastel, acuarelas o medios digitales.');
/*!40000 ALTER TABLE `especialidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `especialidad_artista`
--

DROP TABLE IF EXISTS `especialidad_artista`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `especialidad_artista` (
  `Fkcod_artista` int(11) NOT NULL,
  `Fkcod_especialidad` int(11) NOT NULL,
  KEY `Fkcod_artista` (`Fkcod_artista`),
  KEY `Fkcod_especialidad` (`Fkcod_especialidad`),
  CONSTRAINT `especialidad_artista_ibfk_1` FOREIGN KEY (`Fkcod_artista`) REFERENCES `artista` (`PkCod_Artista`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `especialidad_artista_ibfk_2` FOREIGN KEY (`Fkcod_especialidad`) REFERENCES `especialidad` (`pkCod_Especialidad`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especialidad_artista`
--

LOCK TABLES `especialidad_artista` WRITE;
/*!40000 ALTER TABLE `especialidad_artista` DISABLE KEYS */;
INSERT INTO `especialidad_artista` VALUES (100003,1600003),(100003,1600001),(100004,1600004),(100004,1600003);
/*!40000 ALTER TABLE `especialidad_artista` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `garantia`
--

DROP TABLE IF EXISTS `garantia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `garantia` (
  `PkCod_Garantia` int(11) NOT NULL AUTO_INCREMENT,
  `durabilidad` varchar(50) DEFAULT NULL,
  `condiciones` varchar(150) DEFAULT NULL,
  `FkCod_Producto` int(11) NOT NULL,
  PRIMARY KEY (`PkCod_Garantia`),
  KEY `FkCod_Producto` (`FkCod_Producto`),
  CONSTRAINT `garantia_ibfk_1` FOREIGN KEY (`FkCod_Producto`) REFERENCES `obra` (`PkCod_Producto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=700012 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `garantia`
--

LOCK TABLES `garantia` WRITE;
/*!40000 ALTER TABLE `garantia` DISABLE KEYS */;
INSERT INTO `garantia` VALUES (700001,'2 A?os','Si el producto se daña por un manejo inadecuado no se le hace la garantia',1000001),(700002,'9 Meses','Las reparaciones deben realizarse a través de un servicio técnico autorizado por la empresa',1000010),(700003,'3 A?os','Puede ser necesario presentar la factura de compra original o comprobante de garantía al realizar una reclamación.',1000009),(700004,'1 A?o','El desgaste normal debido al uso regular no está cubierto por la garantía.',1000003),(700005,'2 A?os','Esta garantía no cubre daños causados por maltrato, manipulación indebida o exposición a condiciones ambientales extremas.',1000004),(700006,'11 Meses','Se proporcionará un certificado de autenticidad y garantía con la obra de arte. Este documento es necesario para hacer efectiva la garantía.',1000002),(700007,'9 Meses','Si se presenta un problema cubierto por esta garantía, nos comprometemos a reparar o reemplazar la obra de arte',1000005),(700008,'11 Meses','Se recomienda revisar los términos específicos proporcionados con la obra de arte, ya que pueden variar según el artista o la galería.',1000007),(700009,'1 A?o','Si la obra es una falsificación, ofreceremos un reemplazo o reembolso completo.',1000009),(700010,'9 Meses','Esta garantía no cubre daños causados por factores externos, como desastres naturales, accidentes o daños causados por terceros.',1000008),(700011,'2 A?os','Se espera que el propietario conserve la obra en condiciones óptimas y siga las recomendaciones de mantenimiento proporcionadas.',1000006);
/*!40000 ALTER TABLE `garantia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `obra`
--

DROP TABLE IF EXISTS `obra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `obra` (
  `PkCod_Producto` int(11) NOT NULL AUTO_INCREMENT,
  `NombreProducto` varchar(200) DEFAULT NULL,
  `Costo` int(11) NOT NULL,
  `stock` varchar(50) DEFAULT NULL,
  `Peso` varchar(10) NOT NULL,
  `Tamano` varchar(10) NOT NULL,
  `EstadoProducto` varchar(20) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `descripcion` varchar(155) NOT NULL,
  PRIMARY KEY (`PkCod_Producto`)
) ENGINE=InnoDB AUTO_INCREMENT=1000011 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obra`
--

LOCK TABLES `obra` WRITE;
/*!40000 ALTER TABLE `obra` DISABLE KEYS */;
INSERT INTO `obra` VALUES (1000001,'Pintura Abstracta',50000,'Disponible','0.5 kg','30x40 cm','Nuevo',15,'pintura','Pintura abstracta barata de buena calidad'),(1000002,'Pintura Decorativa',70000,'Disponible','1 kg','20x20 cm','Nuevo',10,'pintura','Pintura de decoracion bonita para cualquier hogar'),(1000003,'Ceramica de Bronce',10000,'Disponible','2 kg','15x15 cm','Nuevo',5,'ceramica','Ceramica de buena calidad'),(1000004,'Ceramica de arcoiris',53000,'Disponible','0.3 kg','25x35 cm','Nuevo',20,'ceramica','Ceramica colorido con colores agradables'),(1000005,'Escultura de madera',81000,'Disponible','1.2 kg','22x22 cm','Nuevo',12,'escultura','Escultura clasica hecha a mano'),(1000006,'Pintura de Mármol',21000,'Disponible','3 kg','18x18 cm','Nuevo',8,'pintura','Pintura de color particular'),(1000007,'Dibujo al Óleo',60000,'Disponible','0.4 kg','30x40 cm','Nuevo',18,'dibujo','Dibujo hecho a mano'),(1000008,'Dibujo estilo graffiti',70000,'Disponible','1.1 kg','20x20 cm','Nuevo',14,'dibujo','Dibujo basado en los estilos de los graffitis'),(1000009,'Escultura david',11000,'Disponible','2.5 kg','15x15 cm','Nuevo',6,'escultura','Escultura popular'),(1000010,'Dibujo a tinta',40000,'Disponible','0.4 kg','25x35 cm','Nuevo',22,'dibujo','Dibujo hecho con materiales clasicos');
/*!40000 ALTER TABLE `obra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oferta`
--

DROP TABLE IF EXISTS `oferta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oferta` (
  `PkCod_oferta` int(11) NOT NULL AUTO_INCREMENT,
  `Monto` int(255) NOT NULL,
  `FechaOferta` date DEFAULT NULL,
  `HoraOferta` time DEFAULT NULL,
  `fkcod_subasta` int(11) NOT NULL,
  `fkcod_cliente` int(11) NOT NULL,
  PRIMARY KEY (`PkCod_oferta`),
  KEY `fkcod_subasta` (`fkcod_subasta`),
  KEY `fkcod_cliente` (`fkcod_cliente`),
  CONSTRAINT `oferta_ibfk_1` FOREIGN KEY (`fkcod_subasta`) REFERENCES `subasta` (`pkCodSubasta`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `oferta_ibfk_2` FOREIGN KEY (`fkcod_cliente`) REFERENCES `cliente` (`PkCod_Cliente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1800007 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oferta`
--

LOCK TABLES `oferta` WRITE;
/*!40000 ALTER TABLE `oferta` DISABLE KEYS */;
INSERT INTO `oferta` VALUES (1800001,75000,'2023-09-15','14:55:00',1100001,400004),(1800002,85000,'2023-09-18','18:26:24',1100001,400003),(1800003,95000,'2023-11-18','10:05:00',1100002,400003),(1800004,105000,'2023-11-19','11:16:00',1100002,400004),(1800005,108000,'2023-01-13','15:00:00',1100003,400003),(1800006,115000,'2023-01-15','18:07:00',1100003,400004);
/*!40000 ALTER TABLE `oferta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido_artista`
--

DROP TABLE IF EXISTS `pedido_artista`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido_artista` (
  `FkCod_Artista` int(11) NOT NULL,
  `FkCod_pedido` int(11) NOT NULL,
  KEY `FkCod_Artista` (`FkCod_Artista`),
  KEY `FkCod_pedido` (`FkCod_pedido`),
  CONSTRAINT `pedido_artista_ibfk_1` FOREIGN KEY (`FkCod_Artista`) REFERENCES `artista` (`PkCod_Artista`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pedido_artista_ibfk_2` FOREIGN KEY (`FkCod_pedido`) REFERENCES `pedidopersonalizado` (`pkCodPedido`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido_artista`
--

LOCK TABLES `pedido_artista` WRITE;
/*!40000 ALTER TABLE `pedido_artista` DISABLE KEYS */;
INSERT INTO `pedido_artista` VALUES (100004,800003),(100004,800004);
/*!40000 ALTER TABLE `pedido_artista` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido_cliente`
--

DROP TABLE IF EXISTS `pedido_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido_cliente` (
  `fkCod_cliente` int(11) NOT NULL,
  `fkCod_pedido` int(11) NOT NULL,
  KEY `fkCod_pedido` (`fkCod_pedido`),
  KEY `fkCod_cliente` (`fkCod_cliente`),
  CONSTRAINT `pedido_cliente_ibfk_1` FOREIGN KEY (`fkCod_pedido`) REFERENCES `pedidopersonalizado` (`pkCodPedido`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pedido_cliente_ibfk_2` FOREIGN KEY (`fkCod_cliente`) REFERENCES `cliente` (`PkCod_Cliente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido_cliente`
--

LOCK TABLES `pedido_cliente` WRITE;
/*!40000 ALTER TABLE `pedido_cliente` DISABLE KEYS */;
INSERT INTO `pedido_cliente` VALUES (400001,800001),(400003,800002),(400003,800003),(400004,800004);
/*!40000 ALTER TABLE `pedido_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidopersonalizado`
--

DROP TABLE IF EXISTS `pedidopersonalizado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedidopersonalizado` (
  `pkCodPedido` int(11) NOT NULL AUTO_INCREMENT,
  `Color` varchar(50) DEFAULT NULL,
  `Materiales` varchar(155) DEFAULT NULL,
  `Contenido` varchar(250) NOT NULL,
  `Tamano` varchar(255) DEFAULT NULL,
  `EstadoPedido` varchar(80) NOT NULL,
  PRIMARY KEY (`pkCodPedido`)
) ENGINE=InnoDB AUTO_INCREMENT=800005 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidopersonalizado`
--

LOCK TABLES `pedidopersonalizado` WRITE;
/*!40000 ALTER TABLE `pedidopersonalizado` DISABLE KEYS */;
INSERT INTO `pedidopersonalizado` VALUES (800001,'Rojo, Azul, Verde','Lapices de colores','Paisaje con animales','195x97cm','Terminada'),(800002,'Amarillo, Naranja, Morado','Acuarelas','Señor sentado en el transmi','210x12cm','En proceso'),(800003,'Rojo, Azul, Verde','Oleos','Jesus curando con sus manos','160x80cm','Terminada'),(800004,'Rosa, Turquesa, Gris','Acuarelas','Flor marchitandose','170x80cm','En proceso');
/*!40000 ALTER TABLE `pedidopersonalizado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pqrs`
--

DROP TABLE IF EXISTS `pqrs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pqrs` (
  `PkCod_PQRS` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(150) NOT NULL,
  `Motivo` varchar(400) NOT NULL,
  `Respuesta` varchar(400) NOT NULL,
  `FechaPQRS` date NOT NULL,
  `FechaCierre` date NOT NULL,
  `Estado` varchar(50) NOT NULL,
  `FkCod_Venta` int(11) NOT NULL,
  `FkCod_Empleado` int(11) NOT NULL,
  `fkCod_TipoPQRS` int(11) NOT NULL,
  PRIMARY KEY (`PkCod_PQRS`),
  KEY `FkCod_Venta` (`FkCod_Venta`),
  KEY `FkCod_Empleado` (`FkCod_Empleado`),
  KEY `fkCod_TipoPQRS` (`fkCod_TipoPQRS`),
  CONSTRAINT `pqrs_ibfk_1` FOREIGN KEY (`FkCod_Venta`) REFERENCES `venta` (`PkCod_Venta`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pqrs_ibfk_2` FOREIGN KEY (`FkCod_Empleado`) REFERENCES `empleado` (`PkCod_Empleado`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pqrs_ibfk_3` FOREIGN KEY (`fkCod_TipoPQRS`) REFERENCES `tipopqrs` (`pkCod_TipoPQRS`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=900009 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pqrs`
--

LOCK TABLES `pqrs` WRITE;
/*!40000 ALTER TABLE `pqrs` DISABLE KEYS */;
INSERT INTO `pqrs` VALUES (900001,'El cliente se quejo que el producto vino dañado','estado producto','La devolucion se llevara a cabo','2023-09-13','2023-09-18','Terminado',1300001,1400001,200002),(900002,'A el cliente lo estafaron por lo que solicita devolucion','peticion de devolucion','Ya se le hizo la respectiva devolucion que tenga buen dia cliente','2023-09-12','2023-09-14','terminada',1300002,1400003,200003),(900003,'El producto que recibio el cliente vino dañado','estado producto','Queja recibida, pronto atendere su caso','2023-09-13','0000-00-00','pendiente',1300003,1400003,200003),(900004,'El cliente lo engañaron con el producto','peticion de devolucion','Caso de estafa recibida cliente','2023-09-14','0000-00-00','pendiente',1300004,1400003,200002),(900005,'Se ha demorado mas de lo estimado en la fecha de entrega','tiempos de entrega','Recibido, pronto atendere su caso','2023-09-06','0000-00-00','pendiente',1300005,1400003,200002),(900006,'El producto que recibio el cliente vino rayado','estado producto','Entendido, pronto atendere su caso','2023-11-06','0000-00-00','pendiente',1300007,1400003,200002),(900007,'El producto que recibio no es lo que decia el artista','peticion de devolucion','Vale, pronto atenderemos su caso','2023-01-24','0000-00-00','pendiente',1300008,1400004,200003),(900008,'Ha pasado un mes desde que compro el producto y no llega','tiempos de entrega','Vale, pronto atenderemos su caso','2023-09-14','0000-00-00','pendiente',1300009,1400004,200002);
/*!40000 ALTER TABLE `pqrs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registrodespachos`
--

DROP TABLE IF EXISTS `registrodespachos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registrodespachos` (
  `pkCod_Registro` int(11) NOT NULL AUTO_INCREMENT,
  `FechaSalida` date DEFAULT NULL,
  `FechaEntrega` date DEFAULT NULL,
  `HoraEntrega` varchar(150) DEFAULT NULL,
  `FkCod_Domicilio` int(11) NOT NULL,
  PRIMARY KEY (`pkCod_Registro`),
  KEY `FkCod_Domicilio` (`FkCod_Domicilio`),
  CONSTRAINT `registrodespachos_ibfk_1` FOREIGN KEY (`FkCod_Domicilio`) REFERENCES `despacho` (`PkCod_Domicilio`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1700003 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registrodespachos`
--

LOCK TABLES `registrodespachos` WRITE;
/*!40000 ALTER TABLE `registrodespachos` DISABLE KEYS */;
INSERT INTO `registrodespachos` VALUES (1700001,'2023-09-14','2023-09-15','2:30 PM',600004),(1700002,'2023-09-13','2023-09-15','10:30 AM',600009);
/*!40000 ALTER TABLE `registrodespachos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subasta`
--

DROP TABLE IF EXISTS `subasta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subasta` (
  `pkCodSubasta` int(11) NOT NULL AUTO_INCREMENT,
  `EstadoSubasta` varchar(50) NOT NULL,
  `Ganador` varchar(80) NOT NULL,
  `PrecioInicial` int(255) NOT NULL,
  `FechaInicio` date NOT NULL,
  `FechaFinalizacion` date NOT NULL,
  `DuracionSubasta` time DEFAULT NULL,
  `fkCodProducto` int(11) NOT NULL,
  `OfertaMax` int(150) DEFAULT NULL,
  PRIMARY KEY (`pkCodSubasta`),
  KEY `fkCodProducto` (`fkCodProducto`),
  CONSTRAINT `subasta_ibfk_1` FOREIGN KEY (`fkCodProducto`) REFERENCES `obra` (`PkCod_Producto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1100004 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subasta`
--

LOCK TABLES `subasta` WRITE;
/*!40000 ALTER TABLE `subasta` DISABLE KEYS */;
INSERT INTO `subasta` VALUES (1100001,'Finalizado','Diego',50000,'2023-09-15','2023-09-16','02:50:00',1000001,85000),(1100002,'Finalizado','Carlos',70000,'2023-11-18','2023-11-19','05:30:00',1000002,105000),(1100003,'En curso','Carlos',81000,'2023-01-12','0000-00-00','01:00:00',1000005,115000);
/*!40000 ALTER TABLE `subasta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipopqrs`
--

DROP TABLE IF EXISTS `tipopqrs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipopqrs` (
  `pkCod_TipoPQRS` int(11) NOT NULL AUTO_INCREMENT,
  `NombreTipo` varchar(80) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pkCod_TipoPQRS`)
) ENGINE=InnoDB AUTO_INCREMENT=200005 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipopqrs`
--

LOCK TABLES `tipopqrs` WRITE;
/*!40000 ALTER TABLE `tipopqrs` DISABLE KEYS */;
INSERT INTO `tipopqrs` VALUES (200001,'Peticion','Son solicitudes generales que los clientes o usuarios hacen lo cual pueden incluir solicitudes de información o cualquier otra solicitud'),(200002,'Quejas',' Las quejas son manifestaciones de insatisfacción expresadas por los clientes o usuarios en relación con productos o servicios.'),(200003,'Reclamaciones','Las reclamaciones son solicitudes de compensación o resolución de un problema específico. se consideran que han sufrido daños o pérdidas debido a un producto defectuoso o un servicio deficiente.'),(200004,'Sugerencias','Las sugerencias son ideas o recomendaciones que los clientes o usuarios proporcionan a la organización para mejorar productos, servicios o procesos.');
/*!40000 ALTER TABLE `tipopqrs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `Pk_Identificacion` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Apellidos` varchar(20) NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `Email` varchar(40) NOT NULL,
  `NumCelular` varchar(15) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `Contrasena` varchar(40) NOT NULL,
  PRIMARY KEY (`Pk_Identificacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (13123,'Camilo','Rojas','2023-01-10','angel@gmail.com','1230845968','calle5566567','adadasdasd'),(123321123,'Ana Maria','Gomez','1986-05-14','ana.gomez@gmail.com','3595456789','calle 901, Cartagena, Colombia','AnaMaria12340'),(123456789,'Juan','Perez','1985-03-15','juan.perez@gmail.com','3555123456','calle 123, Bogota D.C, Colombia','JuanPerez123'),(234567890,'Pedro','Gomez','1988-11-10','pedro.gomez@gmail.com','3553234567','calle 789, Cali, Colombia','PedroGomez67890'),(345678901,'Maria','Rodriguez','1995-04-25','maria.rodriguez@gmail.com','3534345678','calle 567, Barranquilla, Colombia','Maria23456'),(444555666,'Diego','Ramirez','1992-07-12','diego.ramirez@gmail.com','3544987654','calle 456, Medellín, Colombia','DiegoR54321'),(456789012,'Carlos','Fernandez','1980-09-08','carlos.fernandez@gmail.com','3595456789','calle 901, Cartagena, Colombia','C4rlosF12340'),(567890123,'Luisa','Lopez','1992-02-15','luisa.lopez@gmail.com','3511567890','calle 234, Pereira, Colombia','Luis@Lopez67891'),(678901234,'Andres','Garcia','1987-07-30','andres.garcia@gmail.com','3585678901','calle 678, Santa Marta, Colombia','Andres#G23450'),(777888999,'Valentina','Lopez','1991-03-18','valentina.lopez@gmail.com','3555234567','calle 789, Cali, Colombia','Valentina67890'),(789012345,'Laura','Perez','1998-12-05','laura.perez@gmail.com','3575789012','calle 345, Bucaramanga, Colombia','L@uraP12347'),(890123456,'Jose','Martinez','1986-05-18','jose.martinez@gmail.com','3590890123','calle 789, Ibague, Colombia','JoseM67894'),(987654321,'Ana','Lopez','1990-06-20','ana.lopez@gmail.com','3544987654','calle 456, Medellín, Colombia','AnaLopez54321'),(999888777,'Daniel','Martinez','1998-12-02','daniel.martinez@gmail.com','3534345678','calle 567, Barranquilla, Colombia','Daniel23456');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehiculo`
--

DROP TABLE IF EXISTS `vehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehiculo` (
  `pk_placa` varchar(8) NOT NULL,
  `marca` varchar(30) DEFAULT NULL,
  `TipoVehiculo` varchar(30) NOT NULL,
  `CantidadVehiculo` int(11) NOT NULL,
  `Modelo` varchar(30) NOT NULL,
  PRIMARY KEY (`pk_placa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiculo`
--

LOCK TABLES `vehiculo` WRITE;
/*!40000 ALTER TABLE `vehiculo` DISABLE KEYS */;
INSERT INTO `vehiculo` VALUES ('BNC001','Toyota','Camion',1,'mx-2019'),('CUM301','Toyota','Camioneta',2,'LI-09'),('MET001','Hyundai','Motocicleta',3,'MotoXpress 500');
/*!40000 ALTER TABLE `vehiculo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venta`
--

DROP TABLE IF EXISTS `venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venta` (
  `PkCod_Venta` int(11) NOT NULL AUTO_INCREMENT,
  `FechaVenta` date NOT NULL,
  `TotalPago` int(11) NOT NULL,
  `ReciboVenta` varchar(150) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `MetodoPago` varchar(50) NOT NULL,
  `FkCod_producto` int(11) NOT NULL,
  PRIMARY KEY (`PkCod_Venta`),
  KEY `FkCod_producto` (`FkCod_producto`),
  CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`FkCod_producto`) REFERENCES `obra` (`PkCod_Producto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1300012 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venta`
--

LOCK TABLES `venta` WRITE;
/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
INSERT INTO `venta` VALUES (1300001,'2023-09-10',250000,'Pedro Gomez, Producto: Pintura Abstracta, Transferencia: 250000',5,'Tarjeta de Cr?dito',1000001),(1300002,'2023-09-11',120000,'Diego Ramirez, Producto: Dibujo a tinta, Transferencia: 120000',3,'Transferencia Bancaria',1000010),(1300003,'2023-09-12',22000,'Diego Ramirez, Producto: Escultura david, Transferencia: 22000',2,'Tarjeta de D?bito',1000009),(1300004,'2023-09-13',40000,'Carlos Fernandez, Producto: Ceramica de bronce, Transferencia: 40000',4,'Transferencia Bancaria',1000003),(1300005,'2023-03-05',81000,'Carlos Fernandez, Producto: Ceramica de arcoiris, Transferencia: 81000',1,'Tarjeta credito',1000004),(1300006,'2023-11-05',140000,'Diego Ramirez, Producto: Pintura Decorativa, Transferencia: 140000',2,'Tarjeta credito',1000002),(1300007,'2023-11-05',81000,'Diego Ramirez, Producto: Escultura de madera, Transferencia: 81000',1,'Tarjeta de debito',1000005),(1300008,'2023-01-23',120000,'Diego Ramirez, Producto: Dibujo a tinta, Transferencia: 120000',3,'Transferencia bancaria',1000010),(1300009,'2023-09-13',60000,'Carlos Fernandez, Producto: Dibujo al oleo, Transferencia: 60000',2,'Transferencia Bancaria',1000007),(1300010,'2023-03-05',70000,'Carlos Fernandez, Producto: Dibujo estilo graffiti, Transferencia: 70000',1,'Tarjeta credito',1000008),(1300011,'2023-03-05',42000,'Carlos Fernandez, Producto: Pintura de mermol, Transferencia: 42000',2,'Tarjeta de debito',1000006);
/*!40000 ALTER TABLE `venta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-29 23:27:02
