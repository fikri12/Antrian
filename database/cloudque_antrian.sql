/*
Navicat MySQL Data Transfer

Source Server         : PC-INI
Source Server Version : 50616
Source Host           : localhost:3306
Source Database       : cloudque_antrian

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2017-04-25 15:57:32
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for antrian_harian
-- ----------------------------
DROP TABLE IF EXISTS `antrian_harian`;
CREATE TABLE `antrian_harian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cabang_id` int(11) DEFAULT NULL,
  `no_antrian` varchar(255) DEFAULT NULL,
  `no_panggilan` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `ambil_antrian` datetime DEFAULT NULL,
  `jenis_panggilan` tinyint(255) DEFAULT NULL COMMENT '1=CS;2=Teller',
  `dilayani` datetime DEFAULT NULL,
  `dilayani_selesai` datetime DEFAULT NULL,
  `ruang_id` int(11) DEFAULT NULL,
  `st_panggil` tinyint(4) DEFAULT NULL,
  `st_call` tinyint(255) DEFAULT NULL,
  `st_layanan` varchar(255) DEFAULT NULL,
  `layanan_id` int(11) DEFAULT NULL,
  `st_upload` varchar(255) DEFAULT NULL,
  `prioritas` tinyint(255) DEFAULT '1' COMMENT '0=prioritas;1=normal',
  `status` tinyint(255) DEFAULT '0' COMMENT '0=belum dpat ruang;1=dapat Ruang;2=Skip ',
  `no_urut_panggil` int(11) DEFAULT '0',
  `jenkel` char(1) NOT NULL DEFAULT '0' COMMENT '0',
  `tipe_customer` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=371 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of antrian_harian
-- ----------------------------

-- ----------------------------
-- Table structure for antrian_harian_copy
-- ----------------------------
DROP TABLE IF EXISTS `antrian_harian_copy`;
CREATE TABLE `antrian_harian_copy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cabang_id` int(11) DEFAULT NULL,
  `no_antrian` varchar(255) DEFAULT NULL,
  `no_panggilan` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `ambil_antrian` datetime DEFAULT NULL,
  `jenis_panggilan` tinyint(255) DEFAULT NULL COMMENT '1=CS;2=Teller',
  `dilayani` datetime DEFAULT NULL,
  `ruang_id` int(11) DEFAULT NULL,
  `st_panggil` tinyint(255) DEFAULT NULL,
  `st_layanan` varchar(255) DEFAULT NULL,
  `layanan_id` int(11) DEFAULT NULL,
  `st_upload` varchar(255) DEFAULT NULL,
  `prioritas` tinyint(255) DEFAULT '1' COMMENT '0=prioritas;1=normal',
  `status` tinyint(255) DEFAULT '0' COMMENT '0=belum dpat ruang;1=dapat Ruang;2=Skip ',
  `no_urut_panggil` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of antrian_harian_copy
-- ----------------------------
INSERT INTO `antrian_harian_copy` VALUES ('108', '1', 'B-001', 'B001', '2016-10-11', '2016-10-11 06:21:56', '2', '2016-10-11 06:22:20', '8', '1', '1', '0', '0', '1', '0', '2');
INSERT INTO `antrian_harian_copy` VALUES ('109', '1', 'A-001', 'A001', '2016-10-11', '2016-10-11 06:21:57', '1', '2016-10-11 08:31:37', '1', '1', '1', '0', '0', '1', '0', '15');
INSERT INTO `antrian_harian_copy` VALUES ('110', '1', 'B-002', 'B002', '2016-10-11', '2016-10-11 06:21:58', '2', '2016-10-11 06:23:24', '10', '1', '1', '0', '0', '1', '0', '4');
INSERT INTO `antrian_harian_copy` VALUES ('111', '1', 'A-002', 'A002', '2016-10-11', '2016-10-11 06:21:59', '1', '2016-10-11 06:32:27', '4', '1', '1', '0', '0', '1', '0', '11');
INSERT INTO `antrian_harian_copy` VALUES ('112', '1', 'B-003', 'B003', '2016-10-11', '2016-10-11 06:25:11', '2', '2016-10-11 06:27:51', '6', '0', '1', '0', '0', '1', '0', '8');
INSERT INTO `antrian_harian_copy` VALUES ('113', '1', 'B-004', 'B004', '2016-10-11', '2016-10-11 06:27:01', '2', '2016-10-11 06:27:39', '1', '1', '1', '0', '0', '1', '0', '7');
INSERT INTO `antrian_harian_copy` VALUES ('114', '1', 'A-003', 'A003', '2016-10-11', '2016-10-11 06:29:45', '1', '2016-10-11 08:33:02', '1', '1', '1', '0', '0', '1', '0', '16');
INSERT INTO `antrian_harian_copy` VALUES ('115', '1', 'B-005', 'B005', '2016-10-11', '2016-10-11 06:31:39', '2', '2016-10-11 06:31:44', '12', '1', '1', '0', '0', '1', '0', '10');

-- ----------------------------
-- Table structure for current_cabang
-- ----------------------------
DROP TABLE IF EXISTS `current_cabang`;
CREATE TABLE `current_cabang` (
  `cabang_id` int(11) NOT NULL,
  `nama_cabang` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cabang_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of current_cabang
-- ----------------------------

-- ----------------------------
-- Table structure for mcabang
-- ----------------------------
DROP TABLE IF EXISTS `mcabang`;
CREATE TABLE `mcabang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cabang_id` varchar(255) DEFAULT NULL,
  `nama_cabang` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `current_cabang` tinyint(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mcabang
-- ----------------------------

-- ----------------------------
-- Table structure for mlayanan
-- ----------------------------
DROP TABLE IF EXISTS `mlayanan`;
CREATE TABLE `mlayanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_layanan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mlayanan
-- ----------------------------
INSERT INTO `mlayanan` VALUES ('1', 'Tabungan');
INSERT INTO `mlayanan` VALUES ('2', 'Kartu Kredit');
INSERT INTO `mlayanan` VALUES ('3', 'Deposito');
INSERT INTO `mlayanan` VALUES ('4', 'Kliring');
INSERT INTO `mlayanan` VALUES ('5', 'Inkasio');
INSERT INTO `mlayanan` VALUES ('6', 'KPR');

-- ----------------------------
-- Table structure for mruang
-- ----------------------------
DROP TABLE IF EXISTS `mruang`;
CREATE TABLE `mruang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_id` varchar(255) DEFAULT NULL,
  `nama_ruang` varchar(255) DEFAULT NULL,
  `kode` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mruang
-- ----------------------------
INSERT INTO `mruang` VALUES ('1', '1', 'CS 1', '1');
INSERT INTO `mruang` VALUES ('2', '1', 'CS 2', '2');
INSERT INTO `mruang` VALUES ('3', '1', 'CS 3', '3');
INSERT INTO `mruang` VALUES ('4', '1', 'CS 4', '4');
INSERT INTO `mruang` VALUES ('5', '1', 'CS 5', '5');
INSERT INTO `mruang` VALUES ('6', '2', 'Teller 1', '1');
INSERT INTO `mruang` VALUES ('7', '2', 'Teller 2', '2');
INSERT INTO `mruang` VALUES ('8', '2', 'Teller 3', '3');
INSERT INTO `mruang` VALUES ('9', '2', 'Teller 4', '4');
INSERT INTO `mruang` VALUES ('10', '2', 'Teller 5', '5');
INSERT INTO `mruang` VALUES ('11', '2', 'Teller 6', '6');
INSERT INTO `mruang` VALUES ('12', '2', 'Teller 7', '7');
INSERT INTO `mruang` VALUES ('13', '2', 'Teller 8', '8');
INSERT INTO `mruang` VALUES ('14', '2', 'Teller 9', '9');
INSERT INTO `mruang` VALUES ('15', '2', 'Teller 10', '10');

-- ----------------------------
-- Table structure for mruang_jenis
-- ----------------------------
DROP TABLE IF EXISTS `mruang_jenis`;
CREATE TABLE `mruang_jenis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_ruang` varchar(255) DEFAULT NULL,
  `kode_ruang` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mruang_jenis
-- ----------------------------
INSERT INTO `mruang_jenis` VALUES ('1', 'Customer Service', 'A');
INSERT INTO `mruang_jenis` VALUES ('2', 'Teller', 'B');
INSERT INTO `mruang_jenis` VALUES ('3', 'Bayar Angsuran', 'C');

-- ----------------------------
-- Table structure for setting
-- ----------------------------
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
  `max_antrian` double(255,0) DEFAULT NULL,
  `start_antrian` double(255,0) DEFAULT NULL,
  `kode_start` tinyint(255) DEFAULT '1' COMMENT '1=Start Ulang beda Kode;2=Lanjut Kode'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of setting
-- ----------------------------
INSERT INTO `setting` VALUES ('999', '1', '1');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_depan` varchar(20) DEFAULT '0',
  `nama_belakang` varchar(40) DEFAULT '0',
  `jenkel` char(1) DEFAULT '0',
  `tgllahir` date DEFAULT NULL,
  `alamat` varchar(255) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'Iyan', 'Isyanto', '0', '2016-11-14', 'Padalarang');
INSERT INTO `user` VALUES ('2', 'Erna', 'Nindiyani', '1', '1997-12-10', 'Pasteur');

-- ----------------------------
-- Table structure for user_admin
-- ----------------------------
DROP TABLE IF EXISTS `user_admin`;
CREATE TABLE `user_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `nama` varchar(32) DEFAULT NULL,
  `kode_ruang` int(11) DEFAULT NULL,
  `avatar` char(32) DEFAULT NULL,
  `user_grup_id` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_admin
-- ----------------------------
INSERT INTO `user_admin` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'Admin', '0', 'images/photos/default.jpg', '0');
INSERT INTO `user_admin` VALUES ('2', 'teller1', 'e10adc3949ba59abbe56e057f20f883e', 'Teller 1', '1', 'images/photos/default.jpg', '2');
INSERT INTO `user_admin` VALUES ('3', 'teller2', 'e10adc3949ba59abbe56e057f20f883e', 'Teller 2', '2', 'images/photos/default.jpg', '2');
INSERT INTO `user_admin` VALUES ('4', 'cs1', 'e10adc3949ba59abbe56e057f20f883e', 'CS 1', '1', 'images/photos/default.jpg', '1');
INSERT INTO `user_admin` VALUES ('5', 'cs2', 'e10adc3949ba59abbe56e057f20f883e', 'CS 2', '2', 'images/photos/default.jpg', '1');

-- ----------------------------
-- Function structure for get_nomor_urut
-- ----------------------------
DROP FUNCTION IF EXISTS `get_nomor_urut`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `get_nomor_urut`() RETURNS int(11)
BEGIN
	DECLARE result INT(11);
	SELECT no_urut_panggil + 1 FROM antrian_harian WHERE tanggal = CURDATE() ORDER BY no_urut_panggil DESC LIMIT 1 INTO result;
	RETURN COALESCE(result,1);
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `update_nourut`;
DELIMITER ;;
CREATE TRIGGER `update_nourut` BEFORE UPDATE ON `antrian_harian` FOR EACH ROW BEGIN
IF (OLD.st_panggil = 0 AND NEW.st_panggil = 1) THEN
SET NEW.no_urut_panggil = get_nomor_urut();
END IF;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `update_nourut_copy`;
DELIMITER ;;
CREATE TRIGGER `update_nourut_copy` BEFORE UPDATE ON `antrian_harian_copy` FOR EACH ROW BEGIN
IF (OLD.st_panggil = 0 AND NEW.st_panggil = 1) THEN
SET NEW.no_urut_panggil = get_nomor_urut();
END IF;
END
;;
DELIMITER ;
