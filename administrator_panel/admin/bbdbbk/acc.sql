-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: localhost    Database: acc
-- ------------------------------------------------------
-- Server version	5.5.16-log

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
-- Table structure for table `acc_config`
--

DROP TABLE IF EXISTS `acc_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acc_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acc_title` varchar(200) NOT NULL,
  `acc_nm` varchar(14) NOT NULL,
  `tbl_nm` varchar(100) NOT NULL,
  `del` varchar(1) NOT NULL DEFAULT 'n',
  `dt` varchar(14) NOT NULL,
  `user` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acc_config`
--

LOCK TABLES `acc_config` WRITE;
/*!40000 ALTER TABLE `acc_config` DISABLE KEYS */;
INSERT INTO `acc_config` VALUES (1,'Cash In Hand','0001-0007-0011','acc_mast','n','','system'),(2,'Banks head','0014','acc_sub','n','','system'),(3,'Accounts Receiveable','0001','acc_sub','n','','system'),(4,'Accounts Payables','0016','acc_sub','n','','system'),(5,'Cash Customers','0001-0001-0065','acc_mast','n','','system');
/*!40000 ALTER TABLE `acc_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `acc_head`
--

DROP TABLE IF EXISTS `acc_head`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acc_head` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `acc_nm_h` varchar(4) NOT NULL,
  `sort` int(11) NOT NULL,
  `dt` varchar(14) NOT NULL,
  `user` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `acc_nm_h` (`acc_nm_h`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acc_head`
--

LOCK TABLES `acc_head` WRITE;
/*!40000 ALTER TABLE `acc_head` DISABLE KEYS */;
INSERT INTO `acc_head` VALUES (1,'Assets','0001',0,'02/18/2015','ornalet'),(2,'Laibility','0002',3,'02/18/2015',''),(4,'Operating Revenue','0004',5,'02/18/2015',''),(5,'Expenses','0005',2,'02/18/2015','ornalet'),(6,'Owner\'s Equity Accounts','0006',1,'02/18/2015','ornalet'),(7,'assets tayiba','0007',0,'09/01/2015','ornalet');
/*!40000 ALTER TABLE `acc_head` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `acc_mast`
--

DROP TABLE IF EXISTS `acc_mast`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acc_mast` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acc_nm_h` varchar(4) NOT NULL,
  `acc_nm_s` varchar(4) NOT NULL,
  `acc_nm` varchar(14) NOT NULL,
  `sort` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `cont_per` varchar(100) NOT NULL,
  `comp_nm` varchar(100) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `folio` int(11) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `cell` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `ntn` varchar(50) NOT NULL,
  `gst` varchar(50) NOT NULL,
  `dt` varchar(15) NOT NULL,
  `user` varchar(20) NOT NULL,
  `opbal` int(11) NOT NULL,
  `clbal` int(11) NOT NULL,
  `b_sheet` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `acc_nm` (`acc_nm`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acc_mast`
--

LOCK TABLES `acc_mast` WRITE;
/*!40000 ALTER TABLE `acc_mast` DISABLE KEYS */;
INSERT INTO `acc_mast` VALUES (1,'0001','0001','0001-0001-0001',0,'International Human Rights Commission','Dr Shahid Amin Khan','International Human Rights Commission Head Quarters ','PKR',0,'N/A','N/A','N/A','N/A','N/A','02/18/2015','ornalet',0,0,''),(2,'0004','0003','0004-0003-0002',0,'Web Designing','','Ornament Solutions','PKR',0,'','','','','','02/18/2015','',0,0,''),(3,'0004','0003','0004-0003-0003',0,'Web Modifications','','','PKR',0,'','','','','','02/18/2015','',0,0,''),(4,'0004','0003','0004-0003-0004',0,'Web Upgradation','','','PKR',0,'','','','','','02/18/2015','',0,0,''),(5,'0004','0003','0004-0003-0005',0,'Design and Development','','','PKR',0,'','','','','','02/18/2015','',0,0,''),(6,'0004','0006','0004-0006-0006',0,'Logo Designing','','','PKR',0,'','','','','','02/18/2015','',0,0,''),(7,'0004','0006','0004-0006-0007',0,'Branding','Yasir Mehboob','Ornament Solutions','PKR',221,'051-4410465','0346-5134970','yasir_u@yahoo.com','N/A','N/A','02/18/2015','',0,0,''),(8,'0004','0006','0004-0006-0008',0,'Misc Designing','','','PKR',0,'','','','','','02/18/2015','',0,0,''),(9,'0004','0004','0004-0004-0009',0,'Domain name','','','PKR',0,'','','','','','02/18/2015','',0,0,''),(10,'0004','0004','0004-0004-0010',0,'Hosting Charges','','','PKR',0,'','','','','','02/18/2015','',0,0,''),(11,'0001','0007','0001-0007-0011',0,'Cash In Hand','','ornament solutions','PKR',0,'','','','','','02/18/2015','',0,0,'asset'),(12,'0004','0003','0004-0003-0012',0,'Consultancy Charges','','','PKR',0,'','','','','','02/18/2015','',0,0,''),(13,'0005','0002','0005-0002-0013',0,'Discount ','','','PKR',0,'','','','','','02/18/2015','',0,0,''),(14,'0001','0001','0001-0001-0014',0,'Mirza Zaheer ahmed','Zaheer','kalsym technologies','PKR',0,'68768768','68768768','','n/a','n/a','02/28/2015','',-2000,0,''),(15,'0005','0002','0005-0002-0015',0,'Testing','89','ornament','PKR',89,'89','89','9','9','9','03/04/2015','',9,0,'9'),(16,'0001','0008','0001-0008-0016',0,'Goods Purchased','','','',0,'','','','','','03/11/2015','',0,0,''),(17,'0001','0008','0001-0008-0017',0,'Subassembly Inventory','','','',0,'','','','','','03/11/2015','',0,0,''),(18,'0001','0008','0001-0008-0018',0,'Product Inventory','','','',0,'','','','','','03/11/2015','',0,0,''),(19,'0001','0010','0001-0010-0019',0,'Insurance','','','',0,'','','','','','03/11/2015','',0,0,''),(20,'0005','0002','0005-0002-0020',0,'Traveling','Yasir','ornament','161',0,'9879879','8797987','yasir_u@yahoo.com','7987987','79879879','03/14/2015','ornalet',500,0,''),(21,'0001','0001','0001-0001-0021',0,'basit hameed','','bragntag','223',7878,'','','','','','05/13/2015','ornalet',1000,0,'liability'),(22,'0001','0014','0001-0014-0022',0,'Bank al falah islamic','','bigbook','161',0,'','','','','','08/31/2015','ornalet',0,0,'asset'),(23,'0001','0014','0001-0014-0023',0,'askari bank limited','','bigbook','',0,'','','','','','08/31/2015','ornalet',0,0,'asset'),(24,'0001','0014','0001-0014-0024',0,'summit bank','','bigbook','',0,'','','','','','08/31/2015','ornalet',0,0,''),(59,'0001','0001','0001-0001-0059',0,'Tayiba Steel Mills','N/A','N/A','PAK',0,'','','','','','09/06/2015','System',0,0,''),(60,'0001','0001','0001-0001-0060',0,'skycopter','N/A','N/A','PAK',0,'','','','','','09/06/2015','System',0,0,''),(63,'0001','0001','0001-0001-0063',0,'new vision','N/A','N/A','PAK',0,'','','','','','09/06/2015','System',0,0,''),(64,'0002','0016','0002-0016-0064',0,'new vision','N/A','N/A','PAK',0,'','','','','','09/06/2015','System',0,0,''),(65,'0001','0001','0001-0001-0065',0,'cash customer','','','',0,'','','','','','09/13/2015','ornalet',0,0,'asset');
/*!40000 ALTER TABLE `acc_mast` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `acc_sub`
--

DROP TABLE IF EXISTS `acc_sub`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acc_sub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `acc_nm_h` varchar(4) NOT NULL,
  `acc_nm_s` varchar(4) NOT NULL,
  `sort` int(11) NOT NULL,
  `dt` varchar(14) NOT NULL,
  `user` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `acc_nm_s` (`acc_nm_s`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acc_sub`
--

LOCK TABLES `acc_sub` WRITE;
/*!40000 ALTER TABLE `acc_sub` DISABLE KEYS */;
INSERT INTO `acc_sub` VALUES (1,'Accounts Receiveable','0001','0001',0,'02/18/2015','ornalet'),(2,'Operating Expense Accounts','0005','0002',0,'02/18/2015','ornalet'),(3,'Web Development Services','0004','0003',0,'02/18/2015',''),(5,'Domain and Hosting Services','0004','0004',0,'02/18/2015',''),(6,'Graphics','0004','0006',0,'02/18/2015',''),(7,'Liquid Asset','0001','0007',0,'02/18/2015',''),(8,'Inventories','0001','0008',0,'03/11/2015',''),(10,'Prepaid Expenses','0001','0010',0,'03/11/2015',''),(11,'Inventory','0001','0011',0,'04/30/2015','ornalet'),(12,'Sales','0004','0012',0,'04/30/2015','ornalet'),(13,'Services','0004','0013',0,'04/30/2015','ornalet'),(14,'banks','0001','0014',0,'08/31/2015','ornalet'),(15,'current asset','0007','0015',0,'09/01/2015','ornalet'),(16,'accounts payable','0002','0016',0,'09/06/2015','ornalet'),(17,'loans','0002','0017',0,'09/06/2015','ornalet'),(18,'prepaid insurance','0001','0018',0,'09/06/2015','ornalet');
/*!40000 ALTER TABLE `acc_sub` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `acc_trans`
--

DROP TABLE IF EXISTS `acc_trans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acc_trans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vnumb` varchar(6) NOT NULL,
  `vtype` varchar(2) NOT NULL,
  `vdate` varchar(15) NOT NULL,
  `sys_dt` varchar(14) NOT NULL,
  `acc_nm` varchar(14) NOT NULL,
  `debit` int(11) NOT NULL,
  `crdit` int(11) NOT NULL,
  `descp` text NOT NULL,
  `user` varchar(20) NOT NULL,
  `chq_no` varchar(30) NOT NULL,
  `chq_dt` varchar(16) NOT NULL,
  `pyee` varchar(300) NOT NULL,
  `del` varchar(1) NOT NULL DEFAULT 'n',
  `pnt` varchar(1) NOT NULL,
  `lst_upd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `acc_nm` (`acc_nm`)
) ENGINE=InnoDB AUTO_INCREMENT=611 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acc_trans`
--

LOCK TABLES `acc_trans` WRITE;
/*!40000 ALTER TABLE `acc_trans` DISABLE KEYS */;
INSERT INTO `acc_trans` VALUES (1,'000001','jv','2013-09-13','09/24/2015','0001-0001-0001',75000,0,'Website Development Services for www.ihrchq.org','ornalet','','','','N','','0000-00-00 00:00:00'),(2,'000001','jv','2013-09-13','09/24/2015','0004-0003-0005',0,75000,'Website Development Services for www.ihrchq.org','ornalet','','','','N','','0000-00-00 00:00:00'),(3,'000003','br','2013-10-05','02/18/2015','0001-0001-0001',0,15000,'Partial Payment against www.ihrchq.org','','','','','n','','2015-02-18 08:26:55'),(4,'000003','br','2013-10-05','02/18/2015','0001-0007-0011',15000,0,'Partial Payment against www.ihrchq.org','','','','','n','','2015-02-18 08:26:55'),(5,'000005','br','2013-11-20','02/18/2015','0001-0001-0001',0,15000,'Partial Payment against www.ihrchq.org','','','','','n','','2015-03-04 11:53:34'),(6,'000005','br','2013-11-20','02/18/2015','0001-0007-0011',15000,0,'Partial Payment against www.ihrchq.org','','','','','n','','2015-03-04 11:53:34'),(7,'000007','br','2013-12-05','02/18/2015','0001-0001-0001',0,5000,'Partial Payment against www.ihrchq.org','','','','','n','','2015-03-04 11:53:34'),(8,'000007','br','2013-12-05','02/18/2015','0001-0007-0011',5000,0,'Partial Payment against www.ihrchq.org','','','','','n','','2015-03-04 11:53:34'),(9,'000009','jv','2014-08-28','02/18/2015','0004-0003-0005',0,40000,'Website Development Services for MUPH.ORG','','','','','n','','2015-03-04 11:53:34'),(10,'000009','jv','2014-08-28','02/18/2015','0001-0001-0001',40000,0,'Website Development Services for MUPH.ORG','','','','','n','','2015-03-04 11:53:34'),(11,'000011','cr','2014-09-03','02/18/2015','0001-0001-0001',0,20000,'Cash Receiving against Advance payment for MUPH.ORG Development ','','','','','n','','2015-03-04 11:53:34'),(12,'000011','cr','2014-09-03','02/18/2015','0001-0007-0011',20000,0,'Cash Receiving against Advance payment for MUPH.ORG Development ','','','','','n','','2015-03-04 11:53:34'),(13,'000013','cr','2014-10-23','02/18/2015','0001-0001-0001',0,20000,'Cash Receiving against  IHRCHQ.ORG Outstandings','','','','','n','','2015-03-04 11:53:34'),(14,'000013','cr','2014-10-23','02/18/2015','0001-0007-0011',20000,0,'Cash Receiving against  IHRCHQ.ORG Outstandings','','','','','n','','2015-03-04 11:53:34'),(15,'000015','cr','2014-10-22','02/18/2015','0001-0001-0001',0,10000,'Cash Receiving against  MUPH.ORG Development','','','','','n','','2015-03-04 11:53:34'),(16,'000015','cr','2014-10-22','02/18/2015','0001-0007-0011',10000,0,'Cash Receiving against  MUPH.ORG Development','','','','','n','','2015-03-04 11:53:34'),(17,'000017','jv','2014-10-11','02/18/2015','0004-0003-0012',0,10000,'IHRC.org Monthly Consultancy dues for the month of Sep 2014','','','','','n','','2015-02-20 06:42:43'),(18,'000017','jv','2014-10-11','02/18/2015','0001-0001-0001',10000,0,'IHRC.org Monthly Consultancy dues for the month of Sep 2014','','','','','n','','2015-02-20 06:42:58'),(19,'000019','cr','2014-10-20','02/18/2015','0001-0001-0001',0,20000,'Cash Receiving against IHRCHQ.ORG Outstandings','','','','','n','','2015-03-04 11:53:34'),(20,'000019','cr','2014-10-20','02/18/2015','0001-0007-0011',20000,0,'Cash Receiving against IHRCHQ.ORG Outstandings','','','','','n','','2015-03-04 11:53:34'),(21,'000021','cr','2014-10-25','02/18/2015','0001-0001-0001',0,10000,'Cash Receiving against MUPH.ORG Development ','','','','','n','','2015-03-04 11:53:34'),(22,'000021','cr','2014-10-25','02/18/2015','0001-0007-0011',10000,0,'Cash Receiving against MUPH.ORG Development','','','','','n','','2015-03-04 11:53:34'),(23,'000023','jv','2014-11-12','02/18/2015','0004-0003-0004',0,20000,'MUPH.ORG Additional Features charges ','','','','','n','','2015-03-04 11:53:34'),(24,'000023','jv','2014-11-12','02/18/2015','0001-0001-0001',20000,0,'MUPH.ORG Additional Features charges ','','','','','n','','2015-03-04 11:53:34'),(25,'000025','jv','2014-11-11','02/18/2015','0001-0001-0001',10000,0,'IHRC.org Monthly Consultancy dues for the month of Oct-Nov 2014','','','','','n','','2015-03-04 11:53:34'),(26,'000025','jv','2014-11-11','02/18/2015','0004-0003-0012',0,10000,'IHRC.org Monthly Consultancy dues for the month of Oct-Nov 2014','','','','','n','','2015-03-04 11:53:34'),(27,'000027','jv','2014-12-11','02/18/2015','0001-0001-0001',10000,0,'IHRC.org Monthly Consultancy dues for the month of Nov-Dec 2014','','','','','n','','2015-03-04 11:53:34'),(28,'000027','jv','2014-12-11','02/18/2015','0004-0003-0012',0,10000,'IHRC.org Monthly Consultancy dues for the month of Nov-Dec 2014','','','','','n','','2015-03-04 11:53:34'),(29,'000029','cr','2015-01-27','02/18/2015','0001-0001-0001',0,15000,'Payment against MUPH.ORG Modification Partial Payment','','','','','n','','2015-03-04 11:53:34'),(30,'000029','cr','2015-01-27','02/18/2015','0001-0007-0011',15000,0,'Payment against MUPH.ORG Modification Partial Payment','','','','','n','','2015-03-04 11:53:34'),(31,'000031','jv','2015-02-01','02/18/2015','0005-0002-0013',5000,0,'Discount Given in Consultancy Ask by Mr Dr Shahid Amin Khan','','','','','n','','2015-03-04 11:53:34'),(32,'000031','jv','2015-02-01','02/18/2015','0001-0001-0001',0,5000,'Discount Given in Consultancy Ask by Mr Dr Shahid Amin Khan','','','','','n','','2015-03-04 11:53:34'),(39,'000039','jv','2015-01-11','03/04/2015','0001-0001-0001',10000,0,'IHRC.org Monthly Consultancy dues for the month of Dec-2014  Jan-2015','','','','','n','','2015-03-04 11:53:34'),(40,'000039','jv','2015-01-11','03/04/2015','0004-0003-0012',0,10000,'IHRC.org Monthly Consultancy dues for the month of Dec-2014  Jan-2015','','','','','n','','2015-03-04 11:53:34'),(41,'000041','jv','2015-02-11','03/04/2015','0001-0001-0001',10000,0,'IHRC.org Monthly Consultancy dues for the month of Jan- Feb-2015','','','','','n','','2015-03-04 11:53:34'),(42,'000041','jv','2015-02-11','03/04/2015','0004-0003-0012',0,10000,'IHRC.org Monthly Consultancy dues for the month of Jan- Feb-2015','','','','','n','','2015-03-04 11:53:34'),(178,'000178','jv','2015-03-11','03/12/2015','0001-0001-0001',10000,0,'IHRC.org Monthly Consultancy dues for the month of Feb- Mar-2015','','','','','N','N','0000-00-00 00:00:00'),(179,'000178','jv','2015-03-11','03/12/2015','0004-0003-0012',0,10000,'IHRC.org Monthly Consultancy dues for the month of Feb- Mar-2015','','','','','N','N','0000-00-00 00:00:00'),(180,'000180','cr','2015-04-28','04/28/2015','0001-0007-0011',20000,0,'cash received against consultancy dues','o','','','','N','N','0000-00-00 00:00:00'),(181,'000180','cr','2015-04-28','04/28/2015','0001-0001-0001',0,20000,'cash received against consultancy dues','o','','','','N','N','0000-00-00 00:00:00'),(182,'000182','jv','2015-04-11','04/28/2015','0004-0003-0012',10000,0,'consultancy for the month of march 2015','o','','','','y','N','2015-09-24 09:19:22'),(183,'000182','jv','2015-04-11','04/28/2015','0001-0001-0001',0,10000,'consultancy for the month of march 2015','o','','','','y','N','2015-09-24 09:19:22'),(184,'000184','jv','2015-05-11','09/24/2015','0001-0001-0001',10000,0,'IHRC.org Monthly Consultancy dues for the month of  apr- may-2015','ornalet','','','','N','N','0000-00-00 00:00:00'),(185,'000184','jv','2015-05-11','09/24/2015','0004-0003-0012',0,10000,'IHRC.ORG MONTHLY CONSULTANCY DUES FOR THE MONTH OF  APR- MAY-2015','ornalet','','','','N','N','0000-00-00 00:00:00'),(208,'000199','jv','2015-04-11','05/10/2015','0001-0001-0001',10000,0,'IHRC.org Monthly Consultancy dues for the month of Mar- Apr-2015','o','','','','N','N','0000-00-00 00:00:00'),(209,'000199','jv','2015-04-11','05/10/2015','0004-0003-0012',0,10000,'IHRC.org Monthly Consultancy dues for the month of Mar- Apr-2015','o','','','','N','N','0000-00-00 00:00:00'),(497,'000211','jv','2015-06-11','09/24/2015','0001-0001-0001',10000,0,'IHRC.org Monthly Consultancy dues for the month of may-jun-2015','o','','','','N','N','2015-09-24 11:36:30'),(498,'000211','jv','2015-06-11','09/24/2015','0004-0003-0012',0,10000,'IHRC.org Monthly Consultancy dues for the month of may-jun-2015','o','','','','N','N','2015-09-24 11:36:37'),(499,'000212','jv','2015-07-11','09/24/2015','0001-0001-0001',10000,0,'IHRC.org Monthly Consultancy dues for the month of jun-jul-2015','o','','','','N','N','2015-09-24 11:36:46'),(500,'000212','jv','2015-07-11','09/24/2015','0004-0003-0012',0,10000,'IHRC.org Monthly Consultancy dues for the month of jun-jul-2015','o','','','','N','N','2015-09-24 11:36:52'),(501,'000213','jv','2015-08-11','09/24/2015','0001-0001-0001',10000,0,'IHRC.ORG MONTHLY CONSULTANCY DUES FOR THE MONTH OF jul-aug-2015','o','','','','N','N','2015-09-24 11:36:59'),(502,'000213','jv','2015-08-11','09/24/2015','0004-0003-0012',0,10000,'IHRC.ORG MONTHLY CONSULTANCY DUES FOR THE MONTH OF jul-aug-2015','o','','','','N','N','2015-09-24 11:37:07'),(503,'000214','jv','2015-09-11','09/24/2015','0001-0001-0001',10000,0,'IHRC.ORG MONTHLY CONSULTANCY DUES FOR THE MONTH OF aug-sep-2015','o','','','','N','N','2015-09-24 11:37:19'),(504,'000214','jv','2015-09-11','09/24/2015','0004-0003-0012',0,10000,'IHRC.ORG MONTHLY CONSULTANCY DUES FOR THE MONTH OF aug-sep-2015','o','','','','N','N','2015-09-24 11:37:27'),(533,'000230','jv','2015-07-21','09/27/2015','0001-0001-0001',25000,0,'MUPH.ORG Modifications charges e.g new front layout, uploading and managing content, background of contestants, etc','ornalet','','','','N','N','0000-00-00 00:00:00'),(534,'000230','jv','2015-07-21','09/27/2015','0004-0003-0003',0,25000,'MUPH.ORG Modifications charges e.g new front layout, uploading and managing content, background of contestants, etc','ornalet','','','','N','N','0000-00-00 00:00:00'),(535,'000231','cr','2015-09-17','09/27/2015','0001-0001-0001',0,30000,'cash received against ihrc pending dues thr. dr shahid amin khan sb','ornalet','','','','N','N','0000-00-00 00:00:00'),(536,'000231','cr','2015-09-17','09/27/2015','0001-0007-0011',30000,0,'cash received against ihrc pending dues thr. dr shahid amin khan sb','ornalet','','','','N','N','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `acc_trans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `act`
--

DROP TABLE IF EXISTS `act`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `act` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `t_ref` varchar(20) NOT NULL,
  `r_ref` varchar(20) NOT NULL,
  `act` varchar(20) NOT NULL,
  `user` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `dt` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `act`
--

LOCK TABLES `act` WRITE;
/*!40000 ALTER TABLE `act` DISABLE KEYS */;
INSERT INTO `act` VALUES (1,'acc_mast','0001-0007-0011','update','','l','::1','10/01/2015 10:09:31'),(2,'acc_mast','0001-0007-0011','update','','l','::1','10/01/2015 10:09:38');
/*!40000 ALTER TABLE `act` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `albm`
--

DROP TABLE IF EXISTS `albm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `albm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `albm_nm` varchar(100) NOT NULL,
  `descp` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `albm`
--

LOCK TABLES `albm` WRITE;
/*!40000 ALTER TABLE `albm` DISABLE KEYS */;
/*!40000 ALTER TABLE `albm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `currency`
--

DROP TABLE IF EXISTS `currency`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `currency` (
  `id_countries` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `iso_alpha2` varchar(2) DEFAULT NULL,
  `iso_alpha3` varchar(3) DEFAULT NULL,
  `iso_numeric` int(11) DEFAULT NULL,
  `currency_code` char(3) DEFAULT NULL,
  `currency_name` varchar(32) DEFAULT NULL,
  `currrency_symbol` varchar(3) DEFAULT NULL,
  `flag` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id_countries`)
) ENGINE=MyISAM AUTO_INCREMENT=240 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `currency`
--

LOCK TABLES `currency` WRITE;
/*!40000 ALTER TABLE `currency` DISABLE KEYS */;
INSERT INTO `currency` VALUES (1,'Afghanistan','AF','AFG',4,'AFN','Afghani','؋','AF.png'),(2,'Albania','AL','ALB',8,'ALL','Lek','Lek','AL.png'),(3,'Algeria','DZ','DZA',12,'DZD','Dinar',NULL,'DZ.png'),(4,'American Samoa','AS','ASM',16,'USD','Dollar','$','AS.png'),(5,'Andorra','AD','AND',20,'EUR','Euro','€','AD.png'),(6,'Angola','AO','AGO',24,'AOA','Kwanza','Kz','AO.png'),(7,'Anguilla','AI','AIA',660,'XCD','Dollar','$','AI.png'),(8,'Antarctica','AQ','ATA',10,'','',NULL,'AQ.png'),(9,'Antigua and Barbuda','AG','ATG',28,'XCD','Dollar','$','AG.png'),(10,'Argentina','AR','ARG',32,'ARS','Peso','$','AR.png'),(11,'Armenia','AM','ARM',51,'AMD','Dram',NULL,'AM.png'),(12,'Aruba','AW','ABW',533,'AWG','Guilder','ƒ','AW.png'),(13,'Australia','AU','AUS',36,'AUD','Dollar','$','AU.png'),(14,'Austria','AT','AUT',40,'EUR','Euro','€','AT.png'),(15,'Azerbaijan','AZ','AZE',31,'AZN','Manat','ман','AZ.png'),(16,'Bahamas','BS','BHS',44,'BSD','Dollar','$','BS.png'),(17,'Bahrain','BH','BHR',48,'BHD','Dinar',NULL,'BH.png'),(18,'Bangladesh','BD','BGD',50,'BDT','Taka',NULL,'BD.png'),(19,'Barbados','BB','BRB',52,'BBD','Dollar','$','BB.png'),(20,'Belarus','BY','BLR',112,'BYR','Ruble','p.','BY.png'),(21,'Belgium','BE','BEL',56,'EUR','Euro','€','BE.png'),(22,'Belize','BZ','BLZ',84,'BZD','Dollar','BZ$','BZ.png'),(23,'Benin','BJ','BEN',204,'XOF','Franc',NULL,'BJ.png'),(24,'Bermuda','BM','BMU',60,'BMD','Dollar','$','BM.png'),(25,'Bhutan','BT','BTN',64,'BTN','Ngultrum',NULL,'BT.png'),(26,'Bolivia','BO','BOL',68,'BOB','Boliviano','$b','BO.png'),(27,'Bosnia and Herzegovina','BA','BIH',70,'BAM','Marka','KM','BA.png'),(28,'Botswana','BW','BWA',72,'BWP','Pula','P','BW.png'),(29,'Bouvet Island','BV','BVT',74,'NOK','Krone','kr','BV.png'),(30,'Brazil','BR','BRA',76,'BRL','Real','R$','BR.png'),(31,'British Indian Ocean Territory','IO','IOT',86,'USD','Dollar','$','IO.png'),(32,'British Virgin Islands','VG','VGB',92,'USD','Dollar','$','VG.png'),(33,'Brunei','BN','BRN',96,'BND','Dollar','$','BN.png'),(34,'Bulgaria','BG','BGR',100,'BGN','Lev','лв','BG.png'),(35,'Burkina Faso','BF','BFA',854,'XOF','Franc',NULL,'BF.png'),(36,'Burundi','BI','BDI',108,'BIF','Franc',NULL,'BI.png'),(37,'Cambodia','KH','KHM',116,'KHR','Riels','៛','KH.png'),(38,'Cameroon','CM','CMR',120,'XAF','Franc','FCF','CM.png'),(39,'Canada','CA','CAN',124,'CAD','Dollar','$','CA.png'),(40,'Cape Verde','CV','CPV',132,'CVE','Escudo',NULL,'CV.png'),(41,'Cayman Islands','KY','CYM',136,'KYD','Dollar','$','KY.png'),(42,'Central African Republic','CF','CAF',140,'XAF','Franc','FCF','CF.png'),(43,'Chad','TD','TCD',148,'XAF','Franc',NULL,'TD.png'),(44,'Chile','CL','CHL',152,'CLP','Peso',NULL,'CL.png'),(45,'China','CN','CHN',156,'CNY','Yuan Renminbi','¥','CN.png'),(46,'Christmas Island','CX','CXR',162,'AUD','Dollar','$','CX.png'),(47,'Cocos Islands','CC','CCK',166,'AUD','Dollar','$','CC.png'),(48,'Colombia','CO','COL',170,'COP','Peso','$','CO.png'),(49,'Comoros','KM','COM',174,'KMF','Franc',NULL,'KM.png'),(50,'Cook Islands','CK','COK',184,'NZD','Dollar','$','CK.png'),(51,'Costa Rica','CR','CRI',188,'CRC','Colon','₡','CR.png'),(52,'Croatia','HR','HRV',191,'HRK','Kuna','kn','HR.png'),(53,'Cuba','CU','CUB',192,'CUP','Peso','₱','CU.png'),(54,'Cyprus','CY','CYP',196,'CYP','Pound',NULL,'CY.png'),(55,'Czech Republic','CZ','CZE',203,'CZK','Koruna','Kč','CZ.png'),(56,'Democratic Republic of the Congo','CD','COD',180,'CDF','Franc',NULL,'CD.png'),(57,'Denmark','DK','DNK',208,'DKK','Krone','kr','DK.png'),(58,'Djibouti','DJ','DJI',262,'DJF','Franc',NULL,'DJ.png'),(59,'Dominica','DM','DMA',212,'XCD','Dollar','$','DM.png'),(60,'Dominican Republic','DO','DOM',214,'DOP','Peso','RD$','DO.png'),(61,'East Timor','TL','TLS',626,'USD','Dollar','$','TL.png'),(62,'Ecuador','EC','ECU',218,'USD','Dollar','$','EC.png'),(63,'Egypt','EG','EGY',818,'EGP','Pound','£','EG.png'),(64,'El Salvador','SV','SLV',222,'SVC','Colone','$','SV.png'),(65,'Equatorial Guinea','GQ','GNQ',226,'XAF','Franc','FCF','GQ.png'),(66,'Eritrea','ER','ERI',232,'ERN','Nakfa','Nfk','ER.png'),(67,'Estonia','EE','EST',233,'EEK','Kroon','kr','EE.png'),(68,'Ethiopia','ET','ETH',231,'ETB','Birr',NULL,'ET.png'),(69,'Falkland Islands','FK','FLK',238,'FKP','Pound','£','FK.png'),(70,'Faroe Islands','FO','FRO',234,'DKK','Krone','kr','FO.png'),(71,'Fiji','FJ','FJI',242,'FJD','Dollar','$','FJ.png'),(72,'Finland','FI','FIN',246,'EUR','Euro','€','FI.png'),(73,'France','FR','FRA',250,'EUR','Euro','€','FR.png'),(74,'French Guiana','GF','GUF',254,'EUR','Euro','€','GF.png'),(75,'French Polynesia','PF','PYF',258,'XPF','Franc',NULL,'PF.png'),(76,'French Southern Territories','TF','ATF',260,'EUR','Euro  ','€','TF.png'),(77,'Gabon','GA','GAB',266,'XAF','Franc','FCF','GA.png'),(78,'Gambia','GM','GMB',270,'GMD','Dalasi','D','GM.png'),(79,'Georgia','GE','GEO',268,'GEL','Lari',NULL,'GE.png'),(80,'Germany','DE','DEU',276,'EUR','Euro','€','DE.png'),(81,'Ghana','GH','GHA',288,'GHC','Cedi','¢','GH.png'),(82,'Gibraltar','GI','GIB',292,'GIP','Pound','£','GI.png'),(83,'Greece','GR','GRC',300,'EUR','Euro','€','GR.png'),(84,'Greenland','GL','GRL',304,'DKK','Krone','kr','GL.png'),(85,'Grenada','GD','GRD',308,'XCD','Dollar','$','GD.png'),(86,'Guadeloupe','GP','GLP',312,'EUR','Euro','€','GP.png'),(87,'Guam','GU','GUM',316,'USD','Dollar','$','GU.png'),(88,'Guatemala','GT','GTM',320,'GTQ','Quetzal','Q','GT.png'),(89,'Guinea','GN','GIN',324,'GNF','Franc',NULL,'GN.png'),(90,'Guinea-Bissau','GW','GNB',624,'XOF','Franc',NULL,'GW.png'),(91,'Guyana','GY','GUY',328,'GYD','Dollar','$','GY.png'),(92,'Haiti','HT','HTI',332,'HTG','Gourde','G','HT.png'),(93,'Heard Island and McDonald Islands','HM','HMD',334,'AUD','Dollar','$','HM.png'),(94,'Honduras','HN','HND',340,'HNL','Lempira','L','HN.png'),(95,'Hong Kong','HK','HKG',344,'HKD','Dollar','$','HK.png'),(96,'Hungary','HU','HUN',348,'HUF','Forint','Ft','HU.png'),(97,'Iceland','IS','ISL',352,'ISK','Krona','kr','IS.png'),(98,'India','IN','IND',356,'INR','Rupee','₹','IN.png'),(99,'Indonesia','ID','IDN',360,'IDR','Rupiah','Rp','ID.png'),(100,'Iran','IR','IRN',364,'IRR','Rial','﷼','IR.png'),(101,'Iraq','IQ','IRQ',368,'IQD','Dinar',NULL,'IQ.png'),(102,'Ireland','IE','IRL',372,'EUR','Euro','€','IE.png'),(103,'Israel','IL','ISR',376,'ILS','Shekel','₪','IL.png'),(104,'Italy','IT','ITA',380,'EUR','Euro','€','IT.png'),(105,'Ivory Coast','CI','CIV',384,'XOF','Franc',NULL,'CI.png'),(106,'Jamaica','JM','JAM',388,'JMD','Dollar','$','JM.png'),(107,'Japan','JP','JPN',392,'JPY','Yen','¥','JP.png'),(108,'Jordan','JO','JOR',400,'JOD','Dinar',NULL,'JO.png'),(109,'Kazakhstan','KZ','KAZ',398,'KZT','Tenge','лв','KZ.png'),(110,'Kenya','KE','KEN',404,'KES','Shilling',NULL,'KE.png'),(111,'Kiribati','KI','KIR',296,'AUD','Dollar','$','KI.png'),(112,'Kuwait','KW','KWT',414,'KWD','Dinar',NULL,'KW.png'),(113,'Kyrgyzstan','KG','KGZ',417,'KGS','Som','лв','KG.png'),(114,'Laos','LA','LAO',418,'LAK','Kip','₭','LA.png'),(115,'Latvia','LV','LVA',428,'LVL','Lat','Ls','LV.png'),(116,'Lebanon','LB','LBN',422,'LBP','Pound','£','LB.png'),(117,'Lesotho','LS','LSO',426,'LSL','Loti','L','LS.png'),(118,'Liberia','LR','LBR',430,'LRD','Dollar','$','LR.png'),(119,'Libya','LY','LBY',434,'LYD','Dinar',NULL,'LY.png'),(120,'Liechtenstein','LI','LIE',438,'CHF','Franc','CHF','LI.png'),(121,'Lithuania','LT','LTU',440,'LTL','Litas','Lt','LT.png'),(122,'Luxembourg','LU','LUX',442,'EUR','Euro','€','LU.png'),(123,'Macao','MO','MAC',446,'MOP','Pataca','MOP','MO.png'),(124,'Macedonia','MK','MKD',807,'MKD','Denar','ден','MK.png'),(125,'Madagascar','MG','MDG',450,'MGA','Ariary',NULL,'MG.png'),(126,'Malawi','MW','MWI',454,'MWK','Kwacha','MK','MW.png'),(127,'Malaysia','MY','MYS',458,'MYR','Ringgit','RM','MY.png'),(128,'Maldives','MV','MDV',462,'MVR','Rufiyaa','Rf','MV.png'),(129,'Mali','ML','MLI',466,'XOF','Franc',NULL,'ML.png'),(130,'Malta','MT','MLT',470,'MTL','Lira',NULL,'MT.png'),(131,'Marshall Islands','MH','MHL',584,'USD','Dollar','$','MH.png'),(132,'Martinique','MQ','MTQ',474,'EUR','Euro','€','MQ.png'),(133,'Mauritania','MR','MRT',478,'MRO','Ouguiya','UM','MR.png'),(134,'Mauritius','MU','MUS',480,'MUR','Rupee','₨','MU.png'),(135,'Mayotte','YT','MYT',175,'EUR','Euro','€','YT.png'),(136,'Mexico','MX','MEX',484,'MXN','Peso','$','MX.png'),(137,'Micronesia','FM','FSM',583,'USD','Dollar','$','FM.png'),(138,'Moldova','MD','MDA',498,'MDL','Leu',NULL,'MD.png'),(139,'Monaco','MC','MCO',492,'EUR','Euro','€','MC.png'),(140,'Mongolia','MN','MNG',496,'MNT','Tugrik','₮','MN.png'),(141,'Montserrat','MS','MSR',500,'XCD','Dollar','$','MS.png'),(142,'Morocco','MA','MAR',504,'MAD','Dirham',NULL,'MA.png'),(143,'Mozambique','MZ','MOZ',508,'MZN','Meticail','MT','MZ.png'),(144,'Myanmar','MM','MMR',104,'MMK','Kyat','K','MM.png'),(145,'Namibia','NA','NAM',516,'NAD','Dollar','$','NA.png'),(146,'Nauru','NR','NRU',520,'AUD','Dollar','$','NR.png'),(147,'Nepal','NP','NPL',524,'NPR','Rupee','₨','NP.png'),(148,'Netherlands','NL','NLD',528,'EUR','Euro','€','NL.png'),(149,'Netherlands Antilles','AN','ANT',530,'ANG','Guilder','ƒ','AN.png'),(150,'New Caledonia','NC','NCL',540,'XPF','Franc',NULL,'NC.png'),(151,'New Zealand','NZ','NZL',554,'NZD','Dollar','$','NZ.png'),(152,'Nicaragua','NI','NIC',558,'NIO','Cordoba','C$','NI.png'),(153,'Niger','NE','NER',562,'XOF','Franc',NULL,'NE.png'),(154,'Nigeria','NG','NGA',566,'NGN','Naira','₦','NG.png'),(155,'Niue','NU','NIU',570,'NZD','Dollar','$','NU.png'),(156,'Norfolk Island','NF','NFK',574,'AUD','Dollar','$','NF.png'),(157,'North Korea','KP','PRK',408,'KPW','Won','₩','KP.png'),(158,'Northern Mariana Islands','MP','MNP',580,'USD','Dollar','$','MP.png'),(159,'Norway','NO','NOR',578,'NOK','Krone','kr','NO.png'),(160,'Oman','OM','OMN',512,'OMR','Rial','﷼','OM.png'),(161,'Pakistan','PK','PAK',586,'PKR','Rupee','₨','PK.png'),(162,'Palau','PW','PLW',585,'USD','Dollar','$','PW.png'),(163,'Palestinian Territory','PS','PSE',275,'ILS','Shekel','₪','PS.png'),(164,'Panama','PA','PAN',591,'PAB','Balboa','B/.','PA.png'),(165,'Papua New Guinea','PG','PNG',598,'PGK','Kina',NULL,'PG.png'),(166,'Paraguay','PY','PRY',600,'PYG','Guarani','Gs','PY.png'),(167,'Peru','PE','PER',604,'PEN','Sol','S/.','PE.png'),(168,'Philippines','PH','PHL',608,'PHP','Peso','Php','PH.png'),(169,'Pitcairn','PN','PCN',612,'NZD','Dollar','$','PN.png'),(170,'Poland','PL','POL',616,'PLN','Zloty','zł','PL.png'),(171,'Portugal','PT','PRT',620,'EUR','Euro','€','PT.png'),(172,'Puerto Rico','PR','PRI',630,'USD','Dollar','$','PR.png'),(173,'Qatar','QA','QAT',634,'QAR','Rial','﷼','QA.png'),(174,'Republic of the Congo','CG','COG',178,'XAF','Franc','FCF','CG.png'),(175,'Reunion','RE','REU',638,'EUR','Euro','€','RE.png'),(176,'Romania','RO','ROU',642,'RON','Leu','lei','RO.png'),(177,'Russia','RU','RUS',643,'RUB','Ruble','руб','RU.png'),(178,'Rwanda','RW','RWA',646,'RWF','Franc',NULL,'RW.png'),(179,'Saint Helena','SH','SHN',654,'SHP','Pound','£','SH.png'),(180,'Saint Kitts and Nevis','KN','KNA',659,'XCD','Dollar','$','KN.png'),(181,'Saint Lucia','LC','LCA',662,'XCD','Dollar','$','LC.png'),(182,'Saint Pierre and Miquelon','PM','SPM',666,'EUR','Euro','€','PM.png'),(183,'Saint Vincent and the Grenadines','VC','VCT',670,'XCD','Dollar','$','VC.png'),(184,'Samoa','WS','WSM',882,'WST','Tala','WS$','WS.png'),(185,'San Marino','SM','SMR',674,'EUR','Euro','€','SM.png'),(186,'Sao Tome and Principe','ST','STP',678,'STD','Dobra','Db','ST.png'),(187,'Saudi Arabia','SA','SAU',682,'SAR','Rial','﷼','SA.png'),(188,'Senegal','SN','SEN',686,'XOF','Franc',NULL,'SN.png'),(189,'Serbia and Montenegro','CS','SCG',891,'RSD','Dinar','Дин','CS.png'),(190,'Seychelles','SC','SYC',690,'SCR','Rupee','₨','SC.png'),(191,'Sierra Leone','SL','SLE',694,'SLL','Leone','Le','SL.png'),(192,'Singapore','SG','SGP',702,'SGD','Dollar','$','SG.png'),(193,'Slovakia','SK','SVK',703,'SKK','Koruna','Sk','SK.png'),(194,'Slovenia','SI','SVN',705,'EUR','Euro','€','SI.png'),(195,'Solomon Islands','SB','SLB',90,'SBD','Dollar','$','SB.png'),(196,'Somalia','SO','SOM',706,'SOS','Shilling','S','SO.png'),(197,'South Africa','ZA','ZAF',710,'ZAR','Rand','R','ZA.png'),(198,'South Georgia and the South Sandwich Islands','GS','SGS',239,'GBP','Pound','£','GS.png'),(199,'South Korea','KR','KOR',410,'KRW','Won','₩','KR.png'),(200,'Spain','ES','ESP',724,'EUR','Euro','€','ES.png'),(201,'Sri Lanka','LK','LKA',144,'LKR','Rupee','₨','LK.png'),(202,'Sudan','SD','SDN',736,'SDD','Dinar',NULL,'SD.png'),(203,'Suriname','SR','SUR',740,'SRD','Dollar','$','SR.png'),(204,'Svalbard and Jan Mayen','SJ','SJM',744,'NOK','Krone','kr','SJ.png'),(205,'Swaziland','SZ','SWZ',748,'SZL','Lilangeni',NULL,'SZ.png'),(206,'Sweden','SE','SWE',752,'SEK','Krona','kr','SE.png'),(207,'Switzerland','CH','CHE',756,'CHF','Franc','CHF','CH.png'),(208,'Syria','SY','SYR',760,'SYP','Pound','£','SY.png'),(209,'Taiwan','TW','TWN',158,'TWD','Dollar','NT$','TW.png'),(210,'Tajikistan','TJ','TJK',762,'TJS','Somoni',NULL,'TJ.png'),(211,'Tanzania','TZ','TZA',834,'TZS','Shilling',NULL,'TZ.png'),(212,'Thailand','TH','THA',764,'THB','Baht','฿','TH.png'),(213,'Togo','TG','TGO',768,'XOF','Franc',NULL,'TG.png'),(214,'Tokelau','TK','TKL',772,'NZD','Dollar','$','TK.png'),(215,'Tonga','TO','TON',776,'TOP','Pa\'anga','T$','TO.png'),(216,'Trinidad and Tobago','TT','TTO',780,'TTD','Dollar','TT$','TT.png'),(217,'Tunisia','TN','TUN',788,'TND','Dinar',NULL,'TN.png'),(218,'Turkey','TR','TUR',792,'TRY','Lira','YTL','TR.png'),(219,'Turkmenistan','TM','TKM',795,'TMM','Manat','m','TM.png'),(220,'Turks and Caicos Islands','TC','TCA',796,'USD','Dollar','$','TC.png'),(221,'Tuvalu','TV','TUV',798,'AUD','Dollar','$','TV.png'),(222,'U.S. Virgin Islands','VI','VIR',850,'USD','Dollar','$','VI.png'),(223,'Uganda','UG','UGA',800,'UGX','Shilling',NULL,'UG.png'),(224,'Ukraine','UA','UKR',804,'UAH','Hryvnia','₴','UA.png'),(225,'United Arab Emirates','AE','ARE',784,'AED','Dirham',NULL,'AE.png'),(226,'United Kingdom','GB','GBR',826,'GBP','Pound','£','GB.png'),(227,'United States','US','USA',840,'USD','Dollar','$','US.png'),(228,'United States Minor Outlying Islands','UM','UMI',581,'USD','Dollar ','$','UM.png'),(229,'Uruguay','UY','URY',858,'UYU','Peso','$U','UY.png'),(230,'Uzbekistan','UZ','UZB',860,'UZS','Som','лв','UZ.png'),(231,'Vanuatu','VU','VUT',548,'VUV','Vatu','Vt','VU.png'),(232,'Vatican','VA','VAT',336,'EUR','Euro','€','VA.png'),(233,'Venezuela','VE','VEN',862,'VEF','Bolivar','Bs','VE.png'),(234,'Vietnam','VN','VNM',704,'VND','Dong','₫','VN.png'),(235,'Wallis and Futuna','WF','WLF',876,'XPF','Franc',NULL,'WF.png'),(236,'Western Sahara','EH','ESH',732,'MAD','Dirham',NULL,'EH.png'),(237,'Yemen','YE','YEM',887,'YER','Rial','﷼','YE.png'),(238,'Zambia','ZM','ZMB',894,'ZMK','Kwacha','ZK','ZM.png'),(239,'Zimbabwe','ZW','ZWE',716,'ZWD','Dollar','Z$','ZW.png');
/*!40000 ALTER TABLE `currency` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cust_sup`
--

DROP TABLE IF EXISTS `cust_sup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cust_sup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm` varchar(100) NOT NULL,
  `descp` text NOT NULL,
  `cell` varchar(20) NOT NULL,
  `eml` varchar(30) NOT NULL,
  `cty` varchar(10) NOT NULL,
  `adrs` text NOT NULL,
  `acc_nm` varchar(14) NOT NULL,
  `cust_type` varchar(6) NOT NULL DEFAULT 'credit',
  `dt` varbinary(16) NOT NULL,
  `del` varchar(1) NOT NULL,
  `user` varchar(30) NOT NULL,
  `type` varchar(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `acc_nm` (`acc_nm`),
  CONSTRAINT `cust_sup_ibfk_1` FOREIGN KEY (`acc_nm`) REFERENCES `acc_mast` (`acc_nm`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cust_sup`
--

LOCK TABLES `cust_sup` WRITE;
/*!40000 ALTER TABLE `cust_sup` DISABLE KEYS */;
INSERT INTO `cust_sup` VALUES (35,'Tayiba Steel Mills','Farrukh sb','n/a','n/a','islamabad','i-9/3 industrial area','0001-0001-0059','','09/06/2015','N','ornalet','cust'),(44,'new vision','shahzad','n/a','n/a','rawalpindi','f-7 islamabad','0001-0001-0063','','09/06/2015','N','ornalet','sup');
/*!40000 ALTER TABLE `cust_sup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(200) NOT NULL,
  `albm_id` int(11) NOT NULL,
  `descp` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery`
--

LOCK TABLES `gallery` WRITE;
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `img`
--

DROP TABLE IF EXISTS `img`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img_nm` varchar(50) NOT NULL,
  `tbl_ref` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `img`
--

LOCK TABLES `img` WRITE;
/*!40000 ALTER TABLE `img` DISABLE KEYS */;
/*!40000 ALTER TABLE `img` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lgf_log`
--

DROP TABLE IF EXISTS `lgf_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lgf_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `com_nm` varchar(100) NOT NULL,
  `dt` varchar(16) NOT NULL,
  `lxp` varchar(10) NOT NULL,
  `lcc` varchar(100) NOT NULL,
  `nou` int(11) NOT NULL,
  `dbinfo` varchar(200) NOT NULL,
  `ad_usr` varchar(100) NOT NULL,
  `ad_pass` varchar(300) NOT NULL,
  `ad_eml` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lgf_log`
--

LOCK TABLES `lgf_log` WRITE;
/*!40000 ALTER TABLE `lgf_log` DISABLE KEYS */;
INSERT INTO `lgf_log` VALUES (1,'Ornament','29-Mar-2015','','',0,'','','',''),(2,'Ornament','29-Mar-2015','','',0,'','','','');
/*!40000 ALTER TABLE `lgf_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `m_hd` varchar(200) NOT NULL,
  `s_hd` varchar(50) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `del_yn` varchar(2) NOT NULL,
  `news_detail` longtext NOT NULL,
  `news_short` varchar(150) NOT NULL,
  `post_by` varchar(200) NOT NULL,
  `img_sml` varchar(200) NOT NULL,
  `img_lrg` varchar(200) NOT NULL,
  `nws_position` varchar(1) NOT NULL,
  `img_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ornasys`
--

DROP TABLE IF EXISTS `ornasys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ornasys` (
  `id` int(11) NOT NULL DEFAULT '0',
  `user` varchar(100) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `domain` varchar(300) NOT NULL,
  `lxp` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ornasys`
--

LOCK TABLES `ornasys` WRITE;
/*!40000 ALTER TABLE `ornasys` DISABLE KEYS */;
INSERT INTO `ornasys` VALUES (1,'Ornament Solutions','logo.png','www.ornamentsolutions.com','81128145383936');
/*!40000 ALTER TABLE `ornasys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ornasys_mnu`
--

DROP TABLE IF EXISTS `ornasys_mnu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ornasys_mnu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_id` varchar(11) NOT NULL,
  `f_nm` varchar(30) NOT NULL,
  `f_lnk` varchar(50) NOT NULL,
  `user` varchar(10) NOT NULL,
  `dt` varchar(11) NOT NULL,
  `icon` varchar(20) NOT NULL,
  `cat` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ornasys_mnu`
--

LOCK TABLES `ornasys_mnu` WRITE;
/*!40000 ALTER TABLE `ornasys_mnu` DISABLE KEYS */;
INSERT INTO `ornasys_mnu` VALUES (9,'f24h2014','Manage Contents','ed_list','ornalet','10-Jul-2014','manage',''),(10,'f24h2014','Access Privillages','mnu','ornalet','10-Jul-2014','access',''),(11,'f24h2014','Power Control','ed_list-ornasys','ornalet','10-Jul-2014','power',''),(12,'f24h2014','Create User','user','ornalet','10-Jul-2014','users',''),(13,'f24h2014','Change Passwords','change-password','ornalet','10-Jul-2014','password',''),(14,'f24h2014','Support','http://www.ornamentsolutions.com/contact-us.html','all','10-Jul-2014','support',''),(15,'muph2014','Album','add-album','Ornalet','01-Sep-2014','album',''),(16,'muph2014','Image Gallery','image-gallery','Ornalet','01-Sep-2014','photo',''),(17,'f24h2014','CONTESTANTS','new-contest','Ornalet','01-Sep-2014','femail',''),(18,'muph2014','Judges','new-judg','Ornalet','01-Sep-2014','judges',''),(19,'muph2014','Sponsors','new-spons','Ornalet','01-Sep-2014','spons',''),(21,'muph2014','Management Team','new-manag','Ornalet','01-Sep-2014','management',''),(24,'muph2014','Inbox / Applications','application-que','Ornalet','14-Sep-2014','inbox',''),(25,'f24h2014','Inbox','application-que','drshahid ','15-Sep-2014','inbox',''),(26,'muph2014','Manage Images','ed_pic','ornalet','22-Sep-2014','img-manage',''),(27,'muph2014','News and Updates','post_news','ornalet','22-Sep-2014','news',''),(28,'f24h2014','Manage Contents','ed_list','admin','10-Jul-2014','manage',''),(29,'f24h2014','Create User','user','admin','10-Jul-2014','users',''),(30,'f24h2014','Change Passwords','change-password','admin','10-Jul-2014','password',''),(31,'muph2014','Album','add-album','admin','01-Sep-2014','album',''),(32,'muph2014','Image Gallery','image-gallery','admin','01-Sep-2014','photo',''),(33,'f24h2014','CONTESTANTS','new-contest','admin','01-Sep-2014','femail',''),(34,'muph2014','Judges','new-judg','admin','01-Sep-2014','judges',''),(35,'muph2014','Sponsors','new-spons','admin','01-Sep-2014','spons',''),(36,'muph2014','Management Team','new-manag','admin','01-Sep-2014','management',''),(37,'muph2014','Inbox / Applications','application-que','admin','14-Sep-2014','inbox',''),(38,'muph2014','Manage Images','ed_pic','admin','22-Sep-2014','img-manage',''),(39,'muph2014','News and Updates','post_news','admin','22-Sep-2014','news','');
/*!40000 ALTER TABLE `ornasys_mnu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ornasys_tbl`
--

DROP TABLE IF EXISTS `ornasys_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ornasys_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tname_db` varchar(20) NOT NULL,
  `display_name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ornasys_tbl`
--

LOCK TABLES `ornasys_tbl` WRITE;
/*!40000 ALTER TABLE `ornasys_tbl` DISABLE KEYS */;
INSERT INTO `ornasys_tbl` VALUES (1,'albm','Photo Album'),(2,'contest','Contestants'),(3,'gallery','Images and Photos'),(4,'judg','Judges'),(5,'manag','Management Team'),(6,'spons','Sponsors'),(7,'video','Video\'s Embed Links'),(8,'news','News and Updates');
/*!40000 ALTER TABLE `ornasys_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prod`
--

DROP TABLE IF EXISTS `prod`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prod` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm` varchar(500) NOT NULL,
  `descp` text NOT NULL,
  `pack_size` int(11) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `srate` int(11) NOT NULL,
  `prate` int(11) NOT NULL,
  `crate` int(11) NOT NULL,
  `min_lvl` int(11) NOT NULL,
  `files_1` varchar(200) NOT NULL,
  `sv_acc` varchar(14) NOT NULL,
  `pv_acc` varchar(14) NOT NULL,
  `exp_acc` varchar(14) NOT NULL,
  `opbal` int(11) NOT NULL,
  `del` varchar(1) NOT NULL,
  `dt` varchar(15) NOT NULL,
  `user` varchar(50) NOT NULL,
  `valid` varchar(15) NOT NULL,
  `stkhnd` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `grp_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `tax` varchar(1) NOT NULL,
  `tax_per` int(11) NOT NULL,
  `dis` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_id` (`cat_id`),
  KEY `grp_id` (`grp_id`),
  CONSTRAINT `prod_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `prod_cat` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `prod_ibfk_2` FOREIGN KEY (`grp_id`) REFERENCES `prod_grp` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prod`
--

LOCK TABLES `prod` WRITE;
/*!40000 ALTER TABLE `prod` DISABLE KEYS */;
INSERT INTO `prod` VALUES (1,'webstie','website webdevelopment',0,'1',1000,0,0,0,'','','','',0,'N','04/25/2015','ornalet','',0,1,7,'','',0,0),(2,'Domain Name','New Domain Registration ',1,'4',1500,1300,0,0,'','','','',0,'N','04/26/2015','ornalet','',0,3,10,'','',0,0),(4,'hosting / year','hosting charges',1,'4',1300,1200,0,0,'','','','',0,'N','04/29/2015','ornalet','',0,1,7,'','',0,0),(5,'earrings','gold',1,'1',678,667,0,100,'','','','',200,'N','04/30/2015','ornalet','',382,1,7,'','',0,0),(6,'goldplate','white gold',1,'1',989,575,0,122,'','','','',768,'N','04/30/2015','ornalet','',79895,3,10,'','',0,0),(8,'laptops','hp',1,'4',0,0,0,0,'','0004-0003-0002','0001-0008-0016','',0,'N','04/30/2015','ornalet','',0,1,7,'','',0,0),(9,'Mobiles','',0,'1',0,0,0,0,'','0004-0003-0004','','',0,'N','04/30/2015','ornalet','',0,1,7,'','',0,0),(10,'testing','this is testing description',1,'1',3000,28888,10000,200,'','0004-0003-0002','0001-0008-0017','0005-0002-0015',18888,'N','05/02/2015','ornalet','',80980980,1,7,'inv','y',17,1000),(11,'glass','crokery',1,'2',25,20,0,20,'','0004-0003-0002','0001-0008-0016','',200,'N','05/04/2015','ornalet','',0,1,10,'inv','n',0,10),(12,'Diamond polishing','Diamond Polishing',0,'4',10000,0,0,0,'','0004-0003-0002','','',0,'N','05/04/2015','ornalet','',0,5,10,'ser','n',0,10),(13,'Ring','Ring',1,'4',15000,13600,43,43,'0004-0003-0003','0004-0003-0003','0001-0008-0018','12',12,'N','','ornalet','',5,5,10,'inv','y',17,100),(14,'Necklace','Necklace',1,'4',2399,999,53,53,'0004-0003-0004','0004-0003-0004','0001-0008-0019','234',234,'N','','ornalet','',5,5,10,'inv','y',12,200),(15,'Brooch','Brooch',1,'4',2188,788,11,11,'0004-0003-0005','0004-0003-0005','0001-0008-0020','45',45,'N','','ornalet','',5,5,10,'inv','y',10,211),(16,'Rosary','Rosary',1,'4',30000,28600,10,10,'0004-0003-0006','0004-0003-0006','0001-0008-0021','78',78,'N','','ornalet','',5,5,10,'inv','y',0,2300),(17,'Gold Ring','Gold Ring',1,'4',76000,74600,21,21,'0004-0003-0007','0004-0003-0007','0001-0008-0022','54',54,'N','','ornalet','',5,5,10,'inv','y',17,2100),(18,'Flower Ring','Flower Ring',1,'4',57666,56266,20,20,'0004-0003-0008','0004-0003-0008','0001-0008-0023','12',12,'N','','ornalet','',5,5,10,'inv','y',12,1200),(19,'Safety Ring','Safety Ring',1,'4',43222,41822,4,4,'0004-0003-0009','0004-0003-0009','0001-0008-0024','56',56,'N','','ornalet','',5,5,10,'inv','y',20,1300),(20,'Celebrant\'s Mitten','Celebrant\'s Mitten',1,'4',13000,11600,5,5,'0004-0003-0010','0004-0003-0010','0001-0008-0025','867',867,'N','','ornalet','',5,5,10,'inv','y',10,3400),(21,'Bow Thimble','Bow Thimble',1,'4',34000,32600,7,7,'0004-0003-0011','0004-0003-0011','0001-0008-0026','23',23,'N','','ornalet','',5,5,10,'inv','y',5,120),(22,'Earring','Earring',1,'4',65000,63600,98,98,'0004-0003-0012','0004-0003-0012','0001-0008-0027','12',12,'N','','ornalet','',5,5,10,'inv','y',6,230),(23,'Glove','Glove',1,'4',43000,41600,90,90,'0004-0003-0013','0004-0003-0013','0001-0008-0028','65',65,'N','','ornalet','',5,5,10,'inv','y',7,340),(24,'Rosary','Rosary',1,'4',21000,19600,21,21,'0004-0003-0014','0004-0003-0014','0001-0008-0029','87',87,'N','','ornalet','',5,5,10,'inv','y',10,450),(25,'Novice Armlet','Novice Armlet',1,'4',98000,96600,32,32,'0004-0003-0015','0004-0003-0015','0001-0008-0030','54',54,'N','','ornalet','',5,5,10,'inv','y',17,540),(26,'Armor Charm','Armor Charm',1,'4',87000,85600,34,34,'0004-0003-0016','0004-0003-0016','0001-0008-0031','1334',1334,'N','','ornalet','',5,5,10,'inv','y',17,560),(27,'Vesper Core 01','Vesper Core 01',1,'4',10000,8600,45,45,'0004-0003-0017','0004-0003-0017','0001-0008-0032','45',45,'N','','ornalet','',5,5,10,'inv','y',0,760),(28,'Vesper Core 03','Vesper Core 03',1,'4',15000,13600,67,67,'0004-0003-0018','0004-0003-0018','0001-0008-0033','576',576,'N','','ornalet','',5,5,10,'inv','y',0,100),(29,'Bow Thimble','Bow Thimble',1,'4',2399,999,32,32,'0004-0003-0019','0004-0003-0019','0001-0008-0034','87',87,'N','','ornalet','',5,5,10,'inv','y',17,200),(30,'Lesser Elemental Ring','Lesser Elemental Ring',1,'4',2188,788,87,87,'0004-0003-0020','0004-0003-0020','0001-0008-0035','53',53,'N','','ornalet','',5,5,10,'inv','y',12,211),(31,'Orleans\'s Glove','Orleans\'s Glove',1,'4',30000,28600,34,34,'0004-0003-0021','0004-0003-0021','0001-0008-0036','23',23,'N','','ornalet','',5,5,10,'inv','y',10,2300),(32,'Librarian Glove','Librarian Glove',1,'4',76000,74600,12,12,'0004-0003-0022','0004-0003-0022','0001-0008-0037','57',57,'N','','ornalet','',5,5,10,'inv','y',0,2100),(33,'Lunatic Brooch','Lunatic Brooch',1,'4',57666,56266,56,56,'0004-0003-0023','0004-0003-0023','0001-0008-0038','43',43,'N','','ornalet','',5,5,10,'inv','y',17,1200),(34,'Earring','Earring',1,'4',43222,41822,8,8,'0004-0003-0024','0004-0003-0024','0001-0008-0039','67',67,'N','','ornalet','',5,5,10,'inv','y',12,1300),(35,'Glove','Glove',1,'4',13000,11600,43,43,'0004-0003-0025','0004-0003-0025','0001-0008-0040','87',87,'N','','ornalet','',5,5,10,'inv','y',20,3400),(36,'Clip','Clip',1,'4',34000,32600,12,12,'0004-0003-0026','0004-0003-0026','0001-0008-0041','45',45,'N','','ornalet','',5,5,10,'inv','y',10,120),(37,'Skull Ring','Skull Ring',1,'4',65000,63600,1,1,'0004-0003-0027','0004-0003-0027','0001-0008-0042','43',43,'N','','ornalet','',5,5,10,'inv','y',5,230),(38,'Silver Ring','Silver Ring',1,'4',43000,41600,45,45,'0004-0003-0028','0004-0003-0028','0001-0008-0043','12',12,'N','','ornalet','',5,5,10,'inv','y',6,340),(39,'Diamond Ring','Diamond Ring',1,'4',21000,19600,8,8,'0004-0003-0029','0004-0003-0029','0001-0008-0044','65',65,'N','','ornalet','',5,5,10,'inv','y',7,450),(40,'Critical Ring','Critical Ring',1,'4',98000,96600,12,12,'0004-0003-0030','0004-0003-0030','0001-0008-0045','67',67,'N','','ornalet','',5,5,10,'inv','y',10,540),(41,'Matyr\'s Leash','Matyr\'s Leash',1,'4',87000,85600,32,32,'0004-0003-0031','0004-0003-0031','0001-0008-0046','87',87,'N','','ornalet','',5,5,10,'inv','y',17,560),(42,'Ring','Ring',1,'4',10000,8600,65,65,'0004-0003-0032','0004-0003-0032','0001-0008-0047','35',35,'N','','ornalet','',5,5,10,'inv','y',17,760),(43,'Necklace','Necklace',1,'4',15000,13600,76,76,'0004-0003-0033','0004-0003-0033','0001-0008-0048','32',32,'N','','ornalet','',5,5,10,'inv','y',0,100),(44,'Brooch','Brooch',1,'4',2399,999,34,34,'0004-0003-0034','0004-0003-0034','0001-0008-0049','56',56,'N','','ornalet','',5,5,10,'inv','y',0,200),(45,'Belt','Belt',1,'4',2188,788,12,12,'0004-0003-0035','0004-0003-0035','0001-0008-0050','67',67,'N','','ornalet','',5,5,10,'inv','y',17,211),(46,'Shinobi Sash','Shinobi Sash',1,'4',30000,28600,54,54,'0004-0003-0036','0004-0003-0036','0001-0008-0051','54',54,'N','','ornalet','',5,5,10,'inv','y',12,2300),(47,'Nile Rose','Nile Rose',1,'4',76000,74600,8,8,'0004-0003-0037','0004-0003-0037','0001-0008-0052','2',2,'N','','ornalet','',5,5,10,'inv','y',10,2100),(48,'Vesper Core 02','Vesper Core 02',1,'4',57666,56266,32,32,'0004-0003-0038','0004-0003-0038','0001-0008-0053','45',45,'N','','ornalet','',5,5,10,'inv','y',0,1200),(49,'Vesper Core 04','Vesper Core 04',1,'4',43222,41822,65,65,'0004-0003-0039','0004-0003-0039','0001-0008-0054','56',56,'N','','ornalet','',5,5,10,'inv','y',17,1300),(50,'Spiritual Ring','Spiritual Ring',1,'4',13000,11600,76,76,'0004-0003-0040','0004-0003-0040','0001-0008-0055','7',7,'N','','ornalet','',5,5,10,'inv','y',12,3400),(51,'Red Silk Seal','Red Silk Seal',1,'4',34000,32600,34,34,'0004-0003-0041','0004-0003-0041','0001-0008-0056','76',76,'N','','ornalet','',5,5,10,'inv','y',20,120),(52,'Expert Ring','Expert Ring',1,'4',65000,63600,12,12,'0004-0003-0042','0004-0003-0042','0001-0008-0057','67',67,'N','','ornalet','',5,5,10,'inv','y',10,230),(53,'Pocket Watch','Pocket Watch',1,'4',43000,41600,54,54,'0004-0003-0043','0004-0003-0043','0001-0008-0058','87',87,'N','','ornalet','',5,5,10,'inv','y',5,340),(54,'Iron Wrist','Iron Wrist',1,'4',21000,19600,8,8,'0004-0003-0044','0004-0003-0044','0001-0008-0059','78',78,'N','','ornalet','',5,5,10,'inv','y',6,450),(55,'mobiles','nokia',1,'2',15000,10000,0,20,'','0004-0004-0010','0001-0008-0016','',2,'N','05/13/2015','ornalet','',0,3,8,'inv','y',0,100),(56,'name of product','description of product',123,'1',75000,123131,0,123,'','0004-0003-0003','0001-0008-0017','',12123,'N','08/29/2015','ornalet','',0,4,10,'inv','y',0,10);
/*!40000 ALTER TABLE `prod` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prod_cat`
--

DROP TABLE IF EXISTS `prod_cat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prod_cat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat` varchar(200) NOT NULL,
  `descp` varchar(100) NOT NULL,
  `del` varchar(1) NOT NULL,
  `dt` varchar(15) NOT NULL,
  `user` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prod_cat`
--

LOCK TABLES `prod_cat` WRITE;
/*!40000 ALTER TABLE `prod_cat` DISABLE KEYS */;
INSERT INTO `prod_cat` VALUES (1,'dry fruits','','','',''),(2,'meat','','','',''),(3,'dry','dry','N','04/21/2015','ornalet'),(4,'White Gold','','N','05/04/2015','ornalet'),(5,'Diamonds','','N','05/04/2015','ornalet');
/*!40000 ALTER TABLE `prod_cat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prod_grp`
--

DROP TABLE IF EXISTS `prod_grp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prod_grp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grp` varchar(200) NOT NULL,
  `descp` varchar(100) NOT NULL,
  `del` varchar(1) NOT NULL,
  `user` varchar(30) NOT NULL,
  `dt` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prod_grp`
--

LOCK TABLES `prod_grp` WRITE;
/*!40000 ALTER TABLE `prod_grp` DISABLE KEYS */;
INSERT INTO `prod_grp` VALUES (7,'frozen','','N','ornalet','04/21/2015'),(8,'dry','','N','ornalet','04/21/2015'),(9,'Wet','','N','ornalet','04/21/2015'),(10,'Gold','','N','ornalet','04/21/2015'),(11,'Gold','White Gold','N','ornalet','05/04/2015'),(12,'Gold','White Gold','N','ornalet','05/04/2015'),(13,'','','N','ornalet','05/11/2015'),(14,'','','N','ornalet','05/11/2015'),(15,'','','N','ornalet','05/11/2015'),(16,'','','N','ornalet','05/11/2015'),(17,'','','N','ornalet','05/11/2015'),(18,'','','N','ornalet','05/11/2015'),(19,'','','N','ornalet','05/11/2015');
/*!40000 ALTER TABLE `prod_grp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rec`
--

DROP TABLE IF EXISTS `rec`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rec` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rtype` varchar(10) NOT NULL,
  `rec_aga` varchar(10) NOT NULL,
  `sl_m_id` varchar(7) NOT NULL DEFAULT '000000',
  `bank_nm` varchar(100) NOT NULL,
  `chq_no` varchar(20) NOT NULL,
  `chq_dt` varchar(14) NOT NULL,
  `rdate` varchar(14) NOT NULL,
  `acc_nm` varchar(14) NOT NULL,
  `debit_acc_nm` varchar(14) NOT NULL,
  `amt` int(11) NOT NULL,
  `bal` int(11) NOT NULL,
  `vnumb` varchar(6) NOT NULL,
  `vtype` varchar(2) NOT NULL,
  `pyee` varchar(100) NOT NULL,
  `del` varchar(1) NOT NULL,
  `dt` varchar(14) NOT NULL,
  `user` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sl_m_id` (`sl_m_id`),
  CONSTRAINT `rec_ibfk_1` FOREIGN KEY (`sl_m_id`) REFERENCES `store_out_m` (`mast_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rec`
--

LOCK TABLES `rec` WRITE;
/*!40000 ALTER TABLE `rec` DISABLE KEYS */;
INSERT INTO `rec` VALUES (28,'cash','sale','000060','','','2015-10-01','2015-10-01','','0001-0007-0011',32322,31064,'','','farrukh','N','10/01/2015',''),(29,'cash','sale','000060','','','2015-10-01','2015-10-01','','0001-0007-0011',32322,31064,'','','farrukh','N','10/01/2015',''),(30,'cash','sale','000060','','','2015-10-01','2015-10-01','','0001-0007-0011',23232,40154,'','','frkh','N','10/01/2015',''),(31,'cash','sale','000060','','','2015-10-01','2015-10-01','','0001-0007-0011',2323,61063,'','','frkh','N','10/01/2015',''),(32,'bank','acc_rec','000000','alfalah','97879798','2015-10-01','2015-10-01','0001-0001-0001','0001-0014-0023',78787,16213,'','bp','dr shahid','N','10/01/2015',''),(33,'bank','sale','000060','alfalah','9787987','2015-10-01','2015-10-01','','0001-0014-0024',56766,6620,'','bp','farrukh','N','10/01/2015',''),(34,'cash','acc_rec','000000','','','2015-10-01','2015-10-01','0001-0001-0014','0001-0007-0011',1000,-3000,'','cp','mirza','N','10/01/2015',''),(35,'cash','acc_rec','000000','','','2015-10-01','2015-10-01','0001-0001-0014','0001-0007-0011',200,-2200,'','cp','zaheer','N','10/01/2015','');
/*!40000 ALTER TABLE `rec` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `store_in_m`
--

DROP TABLE IF EXISTS `store_in_m`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `store_in_m` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dep` int(11) NOT NULL,
  `cs_id` int(11) NOT NULL,
  `oth_char` int(11) NOT NULL,
  `ref` varchar(200) NOT NULL,
  `dlv_dt` varchar(16) NOT NULL,
  `total` int(11) NOT NULL,
  `paid` int(11) NOT NULL,
  `change` int(11) NOT NULL,
  `dis` int(11) NOT NULL,
  `del` varchar(1) NOT NULL,
  `user` varchar(50) NOT NULL,
  `dt` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `store_in_m`
--

LOCK TABLES `store_in_m` WRITE;
/*!40000 ALTER TABLE `store_in_m` DISABLE KEYS */;
/*!40000 ALTER TABLE `store_in_m` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `store_in_t`
--

DROP TABLE IF EXISTS `store_in_t`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `store_in_t` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mast_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `amt` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `desc` varchar(200) NOT NULL,
  `user` varchar(50) NOT NULL,
  `dt` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `store_in_t`
--

LOCK TABLES `store_in_t` WRITE;
/*!40000 ALTER TABLE `store_in_t` DISABLE KEYS */;
/*!40000 ALTER TABLE `store_in_t` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `store_out_m`
--

DROP TABLE IF EXISTS `store_out_m`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `store_out_m` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dep` int(11) NOT NULL,
  `cs_id` int(11) NOT NULL,
  `status` varchar(6) NOT NULL,
  `oth_char` int(11) NOT NULL,
  `ref` varchar(200) NOT NULL,
  `dlv_dt` varchar(16) NOT NULL,
  `inv_dt` varchar(16) NOT NULL,
  `gst_per` int(11) NOT NULL,
  `gst_amt` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `paid` int(11) NOT NULL,
  `rec` varchar(1) NOT NULL DEFAULT 'n',
  `chng` int(11) NOT NULL,
  `dis` int(11) NOT NULL,
  `del` varchar(1) NOT NULL,
  `user` varchar(50) NOT NULL,
  `dt` varchar(15) NOT NULL,
  `mast_id` varchar(7) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mast_id` (`mast_id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `store_out_m`
--

LOCK TABLES `store_out_m` WRITE;
/*!40000 ALTER TABLE `store_out_m` DISABLE KEYS */;
INSERT INTO `store_out_m` VALUES (58,0,0,'',0,'Empty_System_lock','','',0,0,0,0,'Y',0,0,'Y','ornalet','08/29/2015','000000'),(60,0,35,'credit',0,'','2015-10-01','2015-10-01',0,6920,63386,0,'N',0,1200,'N','ornalet','10/01/2015','000060');
/*!40000 ALTER TABLE `store_out_m` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `store_out_t`
--

DROP TABLE IF EXISTS `store_out_t`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `store_out_t` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mast_id` varchar(7) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `dis` int(11) NOT NULL,
  `tax_per` int(11) NOT NULL,
  `tax_amt` int(11) NOT NULL,
  `amt` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `descp` varchar(200) NOT NULL,
  `user` varchar(50) NOT NULL,
  `dt` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `prod_id` (`prod_id`),
  KEY `mast_id_2` (`mast_id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `store_out_t`
--

LOCK TABLES `store_out_t` WRITE;
/*!40000 ALTER TABLE `store_out_t` DISABLE KEYS */;
INSERT INTO `store_out_t` VALUES (74,'000060',18,57666,1200,12,6920,63386,1,'Flower Ring','ornalet','10/01/2015');
/*!40000 ALTER TABLE `store_out_t` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unt`
--

DROP TABLE IF EXISTS `unt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unt` varchar(50) NOT NULL,
  `del` varchar(1) NOT NULL,
  `user` varchar(30) NOT NULL,
  `dt` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unt`
--

LOCK TABLES `unt` WRITE;
/*!40000 ALTER TABLE `unt` DISABLE KEYS */;
INSERT INTO `unt` VALUES (1,'grm','','',''),(2,'pcs','','',''),(3,'Pages','','',''),(4,'Nos','','',''),(5,'services','n','',''),(6,'charges','n','','');
/*!40000 ALTER TABLE `unt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `status` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'ornalet','3267c8273860b22f541f4f76c860b581','');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `video`
--

DROP TABLE IF EXISTS `video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `head` varchar(200) NOT NULL,
  `detail` text NOT NULL,
  `pst_by` varchar(100) NOT NULL,
  `link` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video`
--

LOCK TABLES `video` WRITE;
/*!40000 ALTER TABLE `video` DISABLE KEYS */;
/*!40000 ALTER TABLE `video` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visitor_counter`
--

DROP TABLE IF EXISTS `visitor_counter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `visitor_counter` (
  `counts` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visitor_counter`
--

LOCK TABLES `visitor_counter` WRITE;
/*!40000 ALTER TABLE `visitor_counter` DISABLE KEYS */;
INSERT INTO `visitor_counter` VALUES (28545);
/*!40000 ALTER TABLE `visitor_counter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vnumb`
--

DROP TABLE IF EXISTS `vnumb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vnumb` (
  `vnumb` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`vnumb`)
) ENGINE=InnoDB AUTO_INCREMENT=253 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vnumb`
--

LOCK TABLES `vnumb` WRITE;
/*!40000 ALTER TABLE `vnumb` DISABLE KEYS */;
INSERT INTO `vnumb` VALUES (186),(187),(188),(189),(190),(191),(192),(193),(194),(195),(196),(197),(198),(199),(200),(201),(202),(203),(204),(205),(206),(207),(208),(209),(210),(211),(212),(213),(214),(215),(216),(217),(218),(219),(220),(221),(222),(223),(224),(225),(226),(227),(228),(229),(230),(231),(232),(233),(234),(235),(236),(237),(238),(239),(240),(241),(242),(243),(244),(245),(246),(247),(248),(249),(250),(251),(252);
/*!40000 ALTER TABLE `vnumb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vtyp`
--

DROP TABLE IF EXISTS `vtyp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vtyp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vtype` varchar(2) NOT NULL,
  `descp` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vtyp`
--

LOCK TABLES `vtyp` WRITE;
/*!40000 ALTER TABLE `vtyp` DISABLE KEYS */;
INSERT INTO `vtyp` VALUES (1,'cp','Cash Payment'),(2,'bp','Bank Payment'),(3,'cr','Cash Receiveing'),(4,'br','Bank Receiveing'),(5,'jv','Journal Voucher'),(6,'pv','Purchase Voucher'),(7,'sv','Sale Voucher'),(8,'sr','Sale Return'),(9,'pr','Purchase Return');
/*!40000 ALTER TABLE `vtyp` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-10-01 22:50:19
