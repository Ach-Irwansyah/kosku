-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.32 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5174
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for kosan
CREATE DATABASE IF NOT EXISTS `kosan` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `kosan`;

-- Dumping structure for table kosan.hak_akses
CREATE TABLE IF NOT EXISTS `hak_akses` (
  `id_akses` int(11) NOT NULL AUTO_INCREMENT,
  `nama_akses` char(10) NOT NULL,
  PRIMARY KEY (`id_akses`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table kosan.hak_akses: ~3 rows (approximately)
/*!40000 ALTER TABLE `hak_akses` DISABLE KEYS */;
INSERT INTO `hak_akses` (`id_akses`, `nama_akses`) VALUES
	(1, 'admin'),
	(2, 'anak kos'),
	(3, 'penjaga');
/*!40000 ALTER TABLE `hak_akses` ENABLE KEYS */;

-- Dumping structure for table kosan.kamar
CREATE TABLE IF NOT EXISTS `kamar` (
  `id_kamar` int(11) NOT NULL AUTO_INCREMENT,
  `nomer_kamar` varchar(50) NOT NULL,
  `kmr_mndi` varchar(50) NOT NULL,
  `lantai` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kamar`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Dumping data for table kosan.kamar: ~20 rows (approximately)
/*!40000 ALTER TABLE `kamar` DISABLE KEYS */;
INSERT INTO `kamar` (`id_kamar`, `nomer_kamar`, `kmr_mndi`, `lantai`, `harga`) VALUES
	(1, '1A', 'dalem', '1', '300000'),
	(2, '1B', 'dalam', '1', '300000'),
	(3, '1C', 'dalam', '1', '300000'),
	(4, '1D', 'dalam', '1', '300000'),
	(5, '1E', 'dalam', '1', '300000'),
	(6, '1F', 'luar', '1', '250000'),
	(7, '1G', 'luar', '1', '250000'),
	(8, '1H', 'luar', '1', '250000'),
	(9, '1I', 'luar', '1', '250000'),
	(10, '1J', 'luar', '1', '250000'),
	(11, '2A', 'dalam', '2', '300000'),
	(12, '2B', 'dalam', '2', '300000'),
	(13, '2C', 'dalam', '2', '300000'),
	(14, '2D', 'dalam', '2', '300000'),
	(15, '2E', 'dalam', '2', '300000'),
	(16, '2F', 'luar', '2', '250000'),
	(17, '2G', 'luar', '2', '250000'),
	(18, '2H', 'luar', '2', '250000'),
	(19, '2I', 'luar', '2', '250000'),
	(20, '2J', 'luar', '2', '250000');
/*!40000 ALTER TABLE `kamar` ENABLE KEYS */;

-- Dumping structure for table kosan.komplain
CREATE TABLE IF NOT EXISTS `komplain` (
  `id_komplain` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `tgl_komplain` date NOT NULL,
  `isi` varchar(50) NOT NULL,
  PRIMARY KEY (`id_komplain`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `komplain_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table kosan.komplain: ~0 rows (approximately)
/*!40000 ALTER TABLE `komplain` DISABLE KEYS */;
INSERT INTO `komplain` (`id_komplain`, `id_user`, `tgl_komplain`, `isi`) VALUES
	(1, 5, '2020-12-28', 'kamar mandi luar no 3 kotor'),
	(2, 4, '2020-12-20', 'lampu parkiran mati');
/*!40000 ALTER TABLE `komplain` ENABLE KEYS */;

-- Dumping structure for table kosan.sewa
CREATE TABLE IF NOT EXISTS `sewa` (
  `id_sewa` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `lama_kos` varchar(50) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `total` varchar(50) NOT NULL,
  PRIMARY KEY (`id_sewa`),
  KEY `id_user` (`id_user`),
  KEY `id_kamar` (`id_kamar`),
  CONSTRAINT `sewa_ibfk_1` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sewa_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table kosan.sewa: ~2 rows (approximately)
/*!40000 ALTER TABLE `sewa` DISABLE KEYS */;
INSERT INTO `sewa` (`id_sewa`, `id_user`, `id_kamar`, `lama_kos`, `tgl_masuk`, `total`) VALUES
	(3, 3, 2, '3', '2020-12-28', '900000'),
	(24, 4, 3, '8', '2020-12-28', '2400000'),
	(30, 4, 5, '6', '2020-12-29', '1800000');
/*!40000 ALTER TABLE `sewa` ENABLE KEYS */;

-- Dumping structure for table kosan.tagihan
CREATE TABLE IF NOT EXISTS `tagihan` (
  `id_tagihan` int(11) NOT NULL AUTO_INCREMENT,
  `id_sewa` int(11) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `nominal` varchar(50) NOT NULL,
  `bukti` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tagihan`),
  KEY `id_sewa` (`id_sewa`),
  CONSTRAINT `tagihan_ibfk_1` FOREIGN KEY (`id_sewa`) REFERENCES `sewa` (`id_sewa`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table kosan.tagihan: ~1 rows (approximately)
/*!40000 ALTER TABLE `tagihan` DISABLE KEYS */;
INSERT INTO `tagihan` (`id_tagihan`, `id_sewa`, `tgl_pembayaran`, `nominal`, `bukti`) VALUES
	(2, 3, '2020-12-28', '900000', ''),
	(88, 24, '2020-12-29', '2400000', '');
/*!40000 ALTER TABLE `tagihan` ENABLE KEYS */;

-- Dumping structure for table kosan.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` char(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_akses` int(11) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_akses` (`id_akses`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_akses`) REFERENCES `hak_akses` (`id_akses`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table kosan.user: ~5 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id_user`, `nama`, `alamat`, `email`, `telp`, `username`, `password`, `id_akses`) VALUES
	(1, 'admin irwan', 'bangkalan', 'admin@bangkalan.com', '085336492290', 'admin', 'admin', 1),
	(2, 'irwan', 'irwan', 'irwan', '08374', 'irwan', 'irwan', 3),
	(3, 'achmada', 'achmad', 'achmad', '091246', 'achmad', 'achmad', 2),
	(4, 'ivano alamsyah', 'Basem', 'ivanalamsyah@gmail.com', '081245153329', 'ivan', 'ivan', 2),
	(5, 'coba', 'coba', 'coba', '0924', 'coba', 'coba', 2),
	(12, 'poi', 'poi', 'poi', '098', 'poi', 'poi', 2),
	(18, 'bnm', 'bnm', 'bnm', '098', 'bnm', 'bnm', 2);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
