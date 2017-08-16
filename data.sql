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
  `alamat` varchar(50) NOT NULL,
  PRIMARY KEY (`rekening`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table donasi.transaksi
CREATE TABLE IF NOT EXISTS `transaksi` (
  `idtrans` int(11) NOT NULL AUTO_INCREMENT,
  `nohp` varchar(50) DEFAULT '0',
  `rekening` varchar(50) DEFAULT '0',
  `resi` varchar(50) DEFAULT '0',
  `aprove` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idtrans`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table donasi.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin` varchar(25) DEFAULT '0',
  `pass` varchar(25) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
