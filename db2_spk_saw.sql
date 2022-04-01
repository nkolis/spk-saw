-- MariaDB dump 10.19  Distrib 10.4.18-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: spk_saw
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
-- Table structure for table `alternatif`
--

DROP TABLE IF EXISTS `alternatif`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(20) NOT NULL,
  `nama_alternatif` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_alternatif`),
  KEY `fk_nik_penduduk` (`nik`),
  CONSTRAINT `fk_nik_penduduk` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alternatif`
--

LOCK TABLES `alternatif` WRITE;
/*!40000 ALTER TABLE `alternatif` DISABLE KEYS */;
INSERT INTO `alternatif` VALUES (1,'12989281298229','adi','2022-03-29 07:59:03',NULL),(8,'12989281298221','Eko','2022-03-30 02:57:20',NULL);
/*!40000 ALTER TABLE `alternatif` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_alternatif`
--

DROP TABLE IF EXISTS `data_alternatif`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_alternatif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` varchar(10) NOT NULL,
  `id_subkriteria` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kriteria` (`id_kriteria`),
  KEY `fk_id_alternatif` (`id_alternatif`),
  KEY `fk_id_subkriteria` (`id_subkriteria`),
  CONSTRAINT `data_alternatif_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`),
  CONSTRAINT `fk_id_alternatif` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`),
  CONSTRAINT `fk_id_subkriteria` FOREIGN KEY (`id_subkriteria`) REFERENCES `subkriteria` (`id_subkriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_alternatif`
--

LOCK TABLES `data_alternatif` WRITE;
/*!40000 ALTER TABLE `data_alternatif` DISABLE KEYS */;
INSERT INTO `data_alternatif` VALUES (19,8,'C1',3),(22,1,'C1',6),(23,8,'C2',7),(24,1,'C2',10);
/*!40000 ALTER TABLE `data_alternatif` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kriteria`
--

DROP TABLE IF EXISTS `kriteria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kriteria` varchar(10) NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL,
  `bobot` int(11) NOT NULL,
  `tipe` enum('cost','benefit') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_kriteria` (`id_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kriteria`
--

LOCK TABLES `kriteria` WRITE;
/*!40000 ALTER TABLE `kriteria` DISABLE KEYS */;
INSERT INTO `kriteria` VALUES (24,'C1','Pendidikan',6,'benefit'),(25,'C2','Jarak',3,'cost'),(26,'C3','ABC',2,'cost');
/*!40000 ALTER TABLE `kriteria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penduduk`
--

DROP TABLE IF EXISTS `penduduk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penduduk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenkel` enum('l','p') NOT NULL,
  `alamat` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_nik` (`nik`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penduduk`
--

LOCK TABLES `penduduk` WRITE;
/*!40000 ALTER TABLE `penduduk` DISABLE KEYS */;
INSERT INTO `penduduk` VALUES (7,'12989281298229','Adi','l','Q1 Tambah Asri'),(8,'12989281298221','Eko','l','Mataram'),(9,'12989281398229','Bayu','l','Dwijaya');
/*!40000 ALTER TABLE `penduduk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengguna`
--

DROP TABLE IF EXISTS `pengguna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengguna`
--

LOCK TABLES `pengguna` WRITE;
/*!40000 ALTER TABLE `pengguna` DISABLE KEYS */;
/*!40000 ALTER TABLE `pengguna` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subkriteria`
--

DROP TABLE IF EXISTS `subkriteria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subkriteria` (
  `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT,
  `id_kriteria` varchar(10) NOT NULL,
  `nama_subkriteria` varchar(50) NOT NULL,
  `bobot` int(11) NOT NULL,
  PRIMARY KEY (`id_subkriteria`),
  KEY `fk_id_kriteria` (`id_kriteria`),
  CONSTRAINT `fk_id_kriteria` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subkriteria`
--

LOCK TABLES `subkriteria` WRITE;
/*!40000 ALTER TABLE `subkriteria` DISABLE KEYS */;
INSERT INTO `subkriteria` VALUES (3,'C1','SD',1),(4,'C1','SMP',2),(5,'C1','SMA',3),(6,'C1','S1',4),(7,'C2','<= 1 KM',1),(8,'C2','<= 2 KM',2),(9,'C2','<= 3 KM',3),(10,'C2','> 3 KM',4);
/*!40000 ALTER TABLE `subkriteria` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-01 23:59:15
