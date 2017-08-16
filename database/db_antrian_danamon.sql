/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50532
Source Host           : localhost:3306
Source Database       : db_antrian_danamon

Target Server Type    : MYSQL
Target Server Version : 50532
File Encoding         : 65001

Date: 2016-09-30 02:31:37
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
  `ruang_id` int(11) DEFAULT NULL,
  `st_panggil` tinyint(255) DEFAULT '0',
  `st_layanan` varchar(255) DEFAULT NULL,
  `layanan_id` int(11) DEFAULT NULL,
  `st_upload` varchar(255) DEFAULT NULL,
  `prioritas` tinyint(255) DEFAULT '1' COMMENT '0=prioritas;1=normal',
  `status` tinyint(255) DEFAULT '0' COMMENT '0=belum dpat ruang;1=dapat Ruang;2=Skip ',
  `no_urut_panggil` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of antrian_harian
-- ----------------------------
INSERT INTO `antrian_harian` VALUES ('1', '1', 'B-001', 'B001', '2016-09-30', '2016-09-29 12:05:03', '2', '2016-09-29 05:23:00', '6', '1', '1', '0', '0', '1', '0', '0');
INSERT INTO `antrian_harian` VALUES ('2', '1', 'B-002', 'B002', '2016-09-30', '2016-09-29 12:05:06', '2', '2016-09-29 05:23:06', '6', '1', '1', '0', '0', '1', '0', '0');
INSERT INTO `antrian_harian` VALUES ('3', '1', 'B-003', 'B003', '2016-09-30', '2016-09-29 12:05:08', '2', '2016-09-29 05:23:10', '6', '1', '1', '0', '0', '1', '0', '0');
INSERT INTO `antrian_harian` VALUES ('4', '1', 'B-004', 'B004', '2016-09-30', '2016-09-29 12:05:12', '2', '2016-09-29 05:23:15', '6', '1', '1', '0', '0', '1', '0', '0');
INSERT INTO `antrian_harian` VALUES ('5', '1', 'B-005', 'B005', '2016-09-30', '2016-09-29 12:05:21', '2', '2016-09-29 05:23:20', '6', '1', '1', '0', '0', '1', '0', '8');
INSERT INTO `antrian_harian` VALUES ('6', '1', 'A-001', 'A001', '2016-09-30', '2016-09-29 12:05:22', '1', '2016-09-29 05:22:44', '2', '1', '1', '0', '0', '1', '0', '0');
INSERT INTO `antrian_harian` VALUES ('7', '1', 'A-002', 'A002', '2016-09-30', '2016-09-29 03:00:18', '1', '2016-09-29 05:22:53', '3', '1', '1', '0', '0', '1', '0', '0');
INSERT INTO `antrian_harian` VALUES ('8', '1', 'B-006', 'B006', '2016-09-30', '2016-09-29 03:00:21', '2', '2016-09-29 05:23:33', '6', '1', '1', '0', '0', '1', '0', '7');
INSERT INTO `antrian_harian` VALUES ('9', '1', 'A-003', 'A003', '2016-09-30', '2016-09-29 03:00:23', '1', '2016-09-29 05:23:38', '2', '1', '1', '0', '0', '1', '0', '6');
INSERT INTO `antrian_harian` VALUES ('10', '1', 'A-004', 'A004', '2016-09-30', '2016-09-29 03:00:34', '1', '2016-09-29 05:23:41', '2', '1', '1', '0', '0', '1', '0', '5');
INSERT INTO `antrian_harian` VALUES ('11', '1', 'A-005', 'A005', '2016-09-30', '2016-09-29 03:01:27', '1', '2016-09-29 03:01:27', '0', '1', '1', '0', '0', '1', '0', '0');
INSERT INTO `antrian_harian` VALUES ('12', '1', 'B-007', 'B007', '2016-09-30', '2016-09-29 03:01:30', '2', '2016-09-29 05:28:08', '9', '1', '1', '0', '0', '1', '0', '4');
INSERT INTO `antrian_harian` VALUES ('13', '1', 'B-008', 'B008', '2016-09-30', '2016-09-29 03:01:41', '2', '2016-09-29 03:01:41', '0', '0', '0', '0', '0', '1', '0', '0');
INSERT INTO `antrian_harian` VALUES ('14', '1', 'A-006', 'A006', '2016-09-30', '2016-09-29 03:01:59', '1', '2016-09-29 03:01:59', '0', '1', '1', '0', '0', '1', '0', '9');
INSERT INTO `antrian_harian` VALUES ('15', '1', 'B-009', 'B009', '2016-09-30', '2016-09-29 03:02:01', '2', '2016-09-29 03:02:01', '8', '1', '1', '0', '0', '1', '0', '10');
INSERT INTO `antrian_harian` VALUES ('16', '1', 'B-010', 'B010', '2016-09-30', '2016-09-29 03:02:10', '2', '2016-09-29 03:02:10', '0', '0', '0', '0', '0', '1', '0', '0');
INSERT INTO `antrian_harian` VALUES ('17', '1', 'A-007', 'A007', '2016-09-30', '2016-09-29 03:02:12', '1', '2016-09-29 03:02:12', '11', '1', '1', '0', '0', '1', '0', '0');
INSERT INTO `antrian_harian` VALUES ('18', '1', 'A-008', 'A008', '2016-09-30', '2016-09-29 03:02:24', '1', '2016-09-29 03:02:24', '0', '1', '1', '0', '0', '1', '0', '0');
INSERT INTO `antrian_harian` VALUES ('19', '1', 'B-011', 'B011', '2016-09-30', '2016-09-29 03:02:27', '2', '2016-09-29 03:02:27', '0', '0', '0', '0', '0', '1', '0', '0');
INSERT INTO `antrian_harian` VALUES ('20', '1', 'B-012', 'B012', '2016-09-30', '2016-09-29 03:35:29', '1', '2016-09-29 03:35:29', '1', '1', '1', '0', '0', '1', '0', '3');
INSERT INTO `antrian_harian` VALUES ('22', '1', 'B-101', 'B999', '2016-09-30', '2016-09-29 03:35:29', '1', '2016-09-29 03:35:29', '8', '1', '1', '0', '0', '1', '0', '2');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mlayanan
-- ----------------------------

-- ----------------------------
-- Table structure for mruang
-- ----------------------------
DROP TABLE IF EXISTS `mruang`;
CREATE TABLE `mruang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_id` varchar(255) DEFAULT NULL,
  `nama_ruang` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mruang
-- ----------------------------
INSERT INTO `mruang` VALUES ('1', '1', 'CS 1');
INSERT INTO `mruang` VALUES ('2', '1', 'CS 2');
INSERT INTO `mruang` VALUES ('3', '1', 'CS 3');
INSERT INTO `mruang` VALUES ('4', '1', 'CS 4');
INSERT INTO `mruang` VALUES ('5', '1', 'CS 5');
INSERT INTO `mruang` VALUES ('6', '2', 'Teller 1');
INSERT INTO `mruang` VALUES ('7', '2', 'Teller 2');
INSERT INTO `mruang` VALUES ('8', '2', 'Teller 3');
INSERT INTO `mruang` VALUES ('9', '2', 'Teller 4');
INSERT INTO `mruang` VALUES ('10', '2', 'Teller 5');
INSERT INTO `mruang` VALUES ('11', '2', 'Teller 6');
INSERT INTO `mruang` VALUES ('12', '2', 'Teller 7');
INSERT INTO `mruang` VALUES ('13', '2', 'Teller 8');
INSERT INTO `mruang` VALUES ('14', '2', 'Teller 9');
INSERT INTO `mruang` VALUES ('15', '2', 'Teller 10');
INSERT INTO `mruang` VALUES ('16', '2', 'Teller 11');
INSERT INTO `mruang` VALUES ('17', '2', 'Teller 12');

-- ----------------------------
-- Table structure for mruang_jenis
-- ----------------------------
DROP TABLE IF EXISTS `mruang_jenis`;
CREATE TABLE `mruang_jenis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_ruang` varchar(255) DEFAULT NULL,
  `kode_ruang` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mruang_jenis
-- ----------------------------
INSERT INTO `mruang_jenis` VALUES ('1', 'Customer Service', 'A');
INSERT INTO `mruang_jenis` VALUES ('2', 'Teller', 'B');

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
