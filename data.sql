-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.19-0ubuntu0.16.04.1 - (Ubuntu)
-- Server OS:                    Linux
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for donasi
CREATE DATABASE IF NOT EXISTS `donasi` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `donasi`;

-- Dumping structure for table donasi.baitullah
CREATE TABLE IF NOT EXISTS `baitullah` (
  `rekening` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `takmir` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `nominal` varchar(50) NOT NULL,
  `lat` float DEFAULT NULL,
  `lng` float DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `tipe` enum('pasca','pra') DEFAULT NULL,
  PRIMARY KEY (`rekening`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for view donasi.hasil
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `hasil` (
	`nohp` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`resi` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`aprove` ENUM('Y','N') NULL COLLATE 'latin1_swedish_ci',
	`rekening` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`nama` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`takmir` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`nominal` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`tipe` ENUM('pasca','pra') NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for table donasi.transaksi
CREATE TABLE IF NOT EXISTS `transaksi` (
  `idtrans` int(11) NOT NULL AUTO_INCREMENT,
  `nohp` varchar(50) DEFAULT '0',
  `rekening` varchar(50) DEFAULT '0',
  `resi` varchar(50) DEFAULT '0',
  `bukti` varchar(100) DEFAULT NULL,
  `aprove` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idtrans`),
  KEY `FK_transaksi_baitullah` (`rekening`),
  CONSTRAINT `FK_transaksi_baitullah` FOREIGN KEY (`rekening`) REFERENCES `baitullah` (`rekening`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table donasi.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) DEFAULT '0',
  `pass` varchar(25) DEFAULT '0',
  `nohp` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for view donasi.hasil
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `hasil`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `hasil` AS select `t`.`nohp` AS `nohp`,`t`.`resi` AS `resi`,`t`.`aprove` AS `aprove`,`b`.`rekening` AS `rekening`,`b`.`nama` AS `nama`,`b`.`takmir` AS `takmir`,`b`.`nominal` AS `nominal`,`b`.`tipe` AS `tipe` from (`transaksi` `t` left join `baitullah` `b` on((`t`.`rekening` = `b`.`rekening`)));

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
