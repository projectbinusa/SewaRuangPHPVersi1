/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.27-MariaDB : Database - sewa_ruang
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sewa_ruang` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `sewa_ruang`;

/*Table structure for table `pelanggan` */

DROP TABLE IF EXISTS `pelanggan`;

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pelanggan` */

insert  into `pelanggan`(`id`,`nama`,`phone`,`payment_method`) values 
(1,'Nizar Restu Aji','0852 2979 3379','Gopay'),
(2,'Andi Saputro','0812 2384 2918','Dana'),
(3,'Chandra','0812 2384 2918','OVO');

/*Table structure for table `peminjaman` */

DROP TABLE IF EXISTS `peminjaman`;

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_ruangan` int(11) DEFAULT NULL,
  `tanggal_booking` date DEFAULT NULL,
  `tanggal_berakhir` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `jumlah_orang` int(11) DEFAULT NULL,
  `kode_booking` varchar(255) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `peminjaman` */

insert  into `peminjaman`(`id`,`id_pelanggan`,`id_ruangan`,`tanggal_booking`,`tanggal_berakhir`,`status`,`jumlah_orang`,`kode_booking`,`total_harga`) values 
(1,1,1,'2023-11-11','2023-11-12','selesai',1,'GQRI1KMB',120000),
(4,2,1,'2023-11-14','2023-11-16','selesai',3,'0JWOLXAA',100000),
(5,1,1,'2023-11-17','2023-11-18','di tolak',2,'YOLD5H0Q',140000),
(9,1,0,'2023-12-02','2023-12-03','booking',3,'N0GN4PFI',0),
(10,3,2,'2023-11-16','2023-11-17','booking',2,'TP1TWZ3K',430000);

/*Table structure for table `peminjaman_tambahan` */

DROP TABLE IF EXISTS `peminjaman_tambahan`;

CREATE TABLE `peminjaman_tambahan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_peminjaman` int(11) DEFAULT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_tambahan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `peminjaman_tambahan` */

insert  into `peminjaman_tambahan`(`id`,`id_peminjaman`,`id_pelanggan`,`id_tambahan`) values 
(1,4,2,1),
(2,4,2,2),
(6,10,3,1),
(7,10,3,4);

/*Table structure for table `ruangan` */

DROP TABLE IF EXISTS `ruangan`;

CREATE TABLE `ruangan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_lantai` varchar(255) DEFAULT NULL,
  `no_ruang` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`deskripsi`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `ruangan` */

insert  into `ruangan`(`id`,`no_lantai`,`no_ruang`,`image`,`deskripsi`,`harga`) values 
(1,'01','01','169966542533_programmer.jpg','Cantik banget',100000),
(2,'01','02','170009729345_programmer.jpg','',200000);

/*Table structure for table `tambahan` */

DROP TABLE IF EXISTS `tambahan`;

CREATE TABLE `tambahan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `jenis` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tambahan` */

insert  into `tambahan`(`id`,`nama`,`deskripsi`,`harga`,`jenis`) values 
(1,'Modem','Moden 100 mbps',100000,'Alat'),
(2,'Proyektor','Proyektor port HDMI',200000,'Alat'),
(4,'Makan Siang','Makanannya random',15000,'Makanan'),
(5,'Teh Botol','    Seger banget cuy',5000,'Minuman');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `user` */

insert  into `user`(`id`,`email`,`username`,`password`,`role`) values 
(1,'supervisor@gmail.com','Supervisor','0192023a7bbd73250516f069df18b500','supervisor'),
(2,'operator@gmail.com','Operator','0192023a7bbd73250516f069df18b500','operator'),
(3,'nizarrestuaji18@gmail.com','Nizar Restu Aji','0192023a7bbd73250516f069df18b500','supervisor'),
(4,'nizar@gmail.com','Nizar','0192023a7bbd73250516f069df18b500','operator');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
