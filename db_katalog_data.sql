/*
SQLyog Ultimate v12.09 (32 bit)
MySQL - 10.1.29-MariaDB : Database - db_katalog_data
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_katalog_data` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_katalog_data`;

/*Table structure for table `jenis_data` */

DROP TABLE IF EXISTS `jenis_data`;

CREATE TABLE `jenis_data` (
  `id_jenis` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_data` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_jenis`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `jenis_data` */

insert  into `jenis_data`(`id_jenis`,`jenis_data`) values (1,'Data Master'),(2,'Data Agregat'),(3,'Data Transaksi'),(4,'Log Data'),(5,'Data Laporan');

/*Table structure for table `level_penyajian_data_secara_geografis` */

DROP TABLE IF EXISTS `level_penyajian_data_secara_geografis`;

CREATE TABLE `level_penyajian_data_secara_geografis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level_penyajian` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `level_penyajian_data_secara_geografis` */

insert  into `level_penyajian_data_secara_geografis`(`id`,`level_penyajian`) values (1,'RT'),(2,'RW'),(3,'Kelurahan'),(4,'Kecamatan'),(5,'Kota');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `periode_kemunculan_data` */

DROP TABLE IF EXISTS `periode_kemunculan_data`;

CREATE TABLE `periode_kemunculan_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `periode_kemunculan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `periode_kemunculan_data` */

insert  into `periode_kemunculan_data`(`id`,`periode_kemunculan`) values (1,'Harian'),(2,'Mingguan'),(3,'Bulanan'),(4,'Triwulan'),(5,'Semesteran'),(6,'Tahunan'),(7,'Sewaktu-waktu');

/*Table structure for table `sektor_data` */

DROP TABLE IF EXISTS `sektor_data`;

CREATE TABLE `sektor_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_sektor` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Data for the table `sektor_data` */

insert  into `sektor_data`(`id`,`nama_sektor`) values (1,'Bidang Kesehatan'),(2,'Bidang Pekerjaan Umum Dan Penataan Ruang'),(3,'Bidang Perumahan Dan Kawasan Permukiman'),(4,'Bidang Ketenteraman Dan Ketertiban Umum Serta Perlindungan'),(5,'Bidang Sosial'),(6,'Bidang Tenaga Kerja'),(7,'Bidang Pemberdayaan Perempuan Dan Pelindungan Anak'),(8,'Bidang Pangan'),(9,'Bidang Pertanahan'),(10,'Bidang Lingkungan Hidup'),(11,'Bidang Administrasi Kependudukan Dan Pencatatan Sipil'),(12,'Bidang Pemberdayaan Masyarakat Dan Desa'),(13,'Bidang Pengendalian Penduduk Dan Keluarga Berencana'),(14,'Bidang Perhubungan'),(15,'Bidang Komunikasi Dan Informatika'),(16,'Bidang Koperasi, Usaha Kecil, Dan Menengah'),(17,'Bidang Penanaman Modal'),(18,'Bidang Kepemudaan dan Olahraga'),(19,'Bidang Statistik'),(20,'Bidang Persandian'),(21,'Bidang Kebudayaan'),(22,'Bidang Perpustakaan'),(23,'Bidang Kearsipan'),(24,'Bidang Pariwisata'),(25,'Bidang Pertanian'),(26,'Bidang Kehutanan'),(27,'Bidang Perdagangan'),(28,'Bidang Perindustrian'),(29,'Bidang Transmigrasi'),(30,'Bidang Otonomi Daerah, Pemerintahan Umum, Administrasi Keuangan Daerah, Perangkat Daerah, Kepegawaian, Persandian');

/*Table structure for table `tbl_cara_pengumpulan_data` */

DROP TABLE IF EXISTS `tbl_cara_pengumpulan_data`;

CREATE TABLE `tbl_cara_pengumpulan_data` (
  `id_cara_pengumpulan_data` int(11) NOT NULL AUTO_INCREMENT,
  `nama_sistem` varchar(255) DEFAULT NULL,
  `url_sistem` varchar(255) DEFAULT NULL,
  `pemilik_sistem` varchar(20) DEFAULT NULL,
  `lembaga_survey` varchar(255) DEFAULT NULL,
  `waktu_survey` date DEFAULT NULL,
  PRIMARY KEY (`id_cara_pengumpulan_data`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_cara_pengumpulan_data` */

insert  into `tbl_cara_pengumpulan_data`(`id_cara_pengumpulan_data`,`nama_sistem`,`url_sistem`,`pemilik_sistem`,`lembaga_survey`,`waktu_survey`) values (1,NULL,NULL,NULL,NULL,NULL),(2,NULL,NULL,NULL,NULL,NULL),(3,NULL,NULL,NULL,'Website','2018-10-20');

/*Table structure for table `tbl_data` */

DROP TABLE IF EXISTS `tbl_data`;

CREATE TABLE `tbl_data` (
  `id_data` int(11) NOT NULL AUTO_INCREMENT,
  `id_wali_data` int(11) DEFAULT NULL,
  `id_pengelola_data` int(11) DEFAULT NULL,
  `id_sumber_data` int(11) DEFAULT NULL,
  `id_cara_pengumpulan_data` varchar(11) DEFAULT NULL,
  `judul_data` varchar(255) DEFAULT NULL,
  `jenis_data` varchar(255) DEFAULT NULL,
  `data_dasar` varchar(255) DEFAULT NULL,
  `deskripsi_data` varchar(255) DEFAULT NULL,
  `sektor_data` varchar(255) DEFAULT NULL,
  `periode_kemunculan_data` varchar(255) DEFAULT NULL,
  `tahun_mulai_tersedia` year(4) DEFAULT NULL,
  `tipe_data` varchar(255) DEFAULT NULL,
  `level_penyajian_data` varchar(20) DEFAULT NULL,
  `penglevelan_kategori_lain` varchar(20) DEFAULT NULL,
  `penanggung_jawab_data` varchar(255) DEFAULT NULL,
  `kontak_penanggung_jawab` varchar(13) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_data`),
  KEY `id_fk_pengumpulan_data` (`id_cara_pengumpulan_data`),
  KEY `id_fk_wali_data` (`id_wali_data`),
  KEY `id_fk_pengelola_data` (`id_pengelola_data`),
  KEY `id_fk_sumber_data` (`id_sumber_data`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_data` */

insert  into `tbl_data`(`id_data`,`id_wali_data`,`id_pengelola_data`,`id_sumber_data`,`id_cara_pengumpulan_data`,`judul_data`,`jenis_data`,`data_dasar`,`deskripsi_data`,`sektor_data`,`periode_kemunculan_data`,`tahun_mulai_tersedia`,`tipe_data`,`level_penyajian_data`,`penglevelan_kategori_lain`,`penanggung_jawab_data`,`kontak_penanggung_jawab`,`created_at`,`updated_at`) values (1,1,1,1,'3','Laporan harian','Data Laporan','Dokumen','Dokumen sehari-hari','Bidang Statistik','Mingguan',2018,'Data yang Diperoleh Serta-merta','Kota',NULL,'Kepala UPT','0821738141781','2018-01-19 14:15:42','2018-01-19 14:17:36');

/*Table structure for table `tbl_kedinasan` */

DROP TABLE IF EXISTS `tbl_kedinasan`;

CREATE TABLE `tbl_kedinasan` (
  `id_nama_dinas` varchar(5) CHARACTER SET utf8mb4 DEFAULT NULL,
  `nama_dinas` varchar(255) DEFAULT NULL,
  `id_bidang_kedinasan` varchar(5) CHARACTER SET utf8mb4 DEFAULT NULL,
  `bidang_kedinasan` varchar(255) DEFAULT NULL,
  `id_seksi_kedinasan` varchar(5) CHARACTER SET utf8mb4 DEFAULT NULL,
  `seksi_kedinasan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_kedinasan` */

insert  into `tbl_kedinasan`(`id_nama_dinas`,`nama_dinas`,`id_bidang_kedinasan`,`bidang_kedinasan`,`id_seksi_kedinasan`,`seksi_kedinasan`) values ('EB088','Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu','EE3D0','Sekretariat DisPMPTSP','D6BB8','Sub Bagian Data, Informasi dan Evaluasi'),('EB088','Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu','EE3D0','Sekretariat DisPMPTSP','B71BC','Sub Bagian Keuangan dan Program'),('EB088','Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu','EE3D0','Sekretariat DisPMPTSP','29559','Sub Bagian Umum dan Kepegawaian'),('70017','Dinas Penataan Ruang','9DFF9','Bidang Pemanfaatan Ruang Kota','45D64','Seksi Elemen dan Dekorasi Kota'),('70017','Dinas Penataan Ruang','9DFF9','Bidang Pemanfaatan Ruang Kota','AA942','Seksi Penataan Bangunan dan Arsitektur Kota'),('70017','Dinas Penataan Ruang','9DFF9','Bidang Pemanfaatan Ruang Kota','F4B07','Seksi Pengelolaan Teknis Bangunan Negara'),('70017','Dinas Penataan Ruang','06743','Bidang Pengawasan dan Pengendalian Pemanfaatan Ruang','D73AC','Seksi Dokumentasi dan Evaluasi Tata Ruang dan Bangunan'),('70017','Dinas Penataan Ruang','06743','Bidang Pengawasan dan Pengendalian Pemanfaatan Ruang','4667D','Seksi Pengawasan Tata Ruang dan Bangunan'),('70017','Dinas Penataan Ruang','06743','Bidang Pengawasan dan Pengendalian Pemanfaatan Ruang','1C452','Seksi Pengusutan dan Penertiban Tata Ruang dan Bangunan'),('70017','Dinas Penataan Ruang','3FB63','Bidang Perencanaan Tata Ruang Kota','F4B37','Seksi Pengukuran dan Pemetaan'),('70017','Dinas Penataan Ruang','3FB63','Bidang Perencanaan Tata Ruang Kota','5B96A','Seksi Perencanaan dan Pengembangan Tata Ruang Kota'),('70017','Dinas Penataan Ruang','3FB63','Bidang Perencanaan Tata Ruang Kota','ECA7D','Seksi Perencanaan Prasarana Kota'),('70017','Dinas Penataan Ruang','BF5E3','Sekretariat Distaru','0FAA7','Sub Bagian Program dan Keuangan'),('70017','Dinas Penataan Ruang','BF5E3','Sekretariat Distaru','EE83C','Sub Bagian umum, Kepegawaian, Data dan Informasi'),('70017','Dinas Penataan Ruang','6CE2B','UPT','8BCF4','UPT Pengelolaan Pemakaman Wilayah I'),('70017','Dinas Penataan Ruang','6CE2B','UPT','0F0CF','UPT Pengelolaan Pemakaman Wilayah II'),('70017','Dinas Penataan Ruang','6CE2B','UPT','FE6A6','UPT Pengelolaan Pemakaman Wilayah III'),('70017','Dinas Penataan Ruang','6CE2B','UPT','27A6A','UPT Pengelolaan Pemakaman Wilayah IV'),('554D0','Dinas Pendidikan','2E342','Bidang Pembinaan dan Pengembangan PAUD dan Pendidikan Masyarakat','D215D','Seksi Kemitraan dan Kelembagaan'),('554D0','Dinas Pendidikan','2E342','Bidang Pembinaan dan Pengembangan PAUD dan Pendidikan Masyarakat','454CB','Seksi Pendidikan Anak Usia Dini'),('554D0','Dinas Pendidikan','2E342','Bidang Pembinaan dan Pengembangan PAUD dan Pendidikan Masyarakat','30CA9','Seksi Pendidikan Masyarakat'),('554D0','Dinas Pendidikan','B1CB0','Bidang Pembinaan dan Pengembangan Pendidik dan Tenaga Kependidikan','58FE7','Seksi Pendidik dan Tenaga Kependidikan PAUD dan Pendidikan Masyarakat'),('554D0','Dinas Pendidikan','B1CB0','Bidang Pembinaan dan Pengembangan Pendidik dan Tenaga Kependidikan','D8990','Seksi Pendidik dan Tenaga Kependidikan Sekolah Dasar'),('554D0','Dinas Pendidikan','B1CB0','Bidang Pembinaan dan Pengembangan Pendidik dan Tenaga Kependidikan','975D2','Seksi Pendidik Dan Tenaga Kependidikan Sekolah Menengah Pertama'),('554D0','Dinas Pendidikan','2DD0B','Bidang Pembinaan dan Pengembangan Sekolah Dasar','0DD90','Seksi Kelembagaan dan Peserta Didik SD'),('554D0','Dinas Pendidikan','2DD0B','Bidang Pembinaan dan Pengembangan Sekolah Dasar','8FBA1','Seksi Kurikulum SD'),('554D0','Dinas Pendidikan','2DD0B','Bidang Pembinaan dan Pengembangan Sekolah Dasar','F9B1D','Seksi Sarana dan Prasarana SD'),('554D0','Dinas Pendidikan','CF589','Bidang Pembinaan dan Pengembangan Sekolah Menengah Pertama','7B640','Seksi Kelembagaan dan Peserta Didik SMP'),('554D0','Dinas Pendidikan','CF589','Bidang Pembinaan dan Pengembangan Sekolah Menengah Pertama','09FE5','Seksi Kurikulum SMP'),('554D0','Dinas Pendidikan','CF589','Bidang Pembinaan dan Pengembangan Sekolah Menengah Pertama','BD943','Seksi Sarana dan Prasarana SMP'),('554D0','Dinas Pendidikan','44FD3','Sekretariat DISDIK','17E41','Sub Bagian Keuangan'),('554D0','Dinas Pendidikan','44FD3','Sekretariat DISDIK','CD320','Sub Bagian Program, Data dan Informasi'),('554D0','Dinas Pendidikan','44FD3','Sekretariat DISDIK','29559','Sub Bagian Umum dan Kepegawaian'),('554D0','Dinas Pendidikan','6CE2B','UPT','CC362','UPT Pengembangan Kegiatan Pendidikan Non Formal dan Informal (PK-PNFI) I'),('554D0','Dinas Pendidikan','6CE2B','UPT','41AF8','UPT Pengembangan Kegiatan Pendidikan Non Formal dan Informal (PK-PNFI) II'),('554D0','Dinas Pendidikan','6CE2B','UPT','1377F','UPT Pengembangan Kegiatan Pendidikan Non Formal dan Informal (PK-PNFI) III'),('554D0','Dinas Pendidikan','6CE2B','UPT','A0CA2','UPT Pengembangan Kegiatan Pendidikan Non Formal dan Informal (PK-PNFI) IV'),('554D0','Dinas Pendidikan','6CE2B','UPT','BD753','UPT Pengembangan Kegiatan Pendidikan Non Formal dan Informal (PK-PNFI) IX'),('554D0','Dinas Pendidikan','6CE2B','UPT','8F706','UPT Pengembangan Kegiatan Pendidikan Non Formal dan Informal (PK-PNFI) V'),('554D0','Dinas Pendidikan','6CE2B','UPT','3A3B7','UPT Pengembangan Kegiatan Pendidikan Non Formal dan Informal (PK-PNFI) VI'),('554D0','Dinas Pendidikan','6CE2B','UPT','41EEF','UPT Pengembangan Kegiatan Pendidikan Non Formal dan Informal (PK-PNFI) VII'),('554D0','Dinas Pendidikan','6CE2B','UPT','06C75','UPT Pengembangan Kegiatan Pendidikan Non Formal dan Informal (PK-PNFI) VIII'),('554D0','Dinas Pendidikan','6CE2B','UPT','35A17','UPT Pengembangan Kegiatan Pendidikan Non Formal dan Informal (PK-PNFI) X'),('554D0','Dinas Pendidikan','6CE2B','UPT','4972C','UPT Satuan Pendidikan Anak Usia Dini (PAUD) dan Pendidikan Masyarakat/Sanggar Kegiatan Belajar'),('F7D13','Dinas Pengendalian Penduduk dan Keluarga Berencana','D93AF','Bidang Keluarga Berencana','52271','Seksi Jaminan Pelayanan KB'),('F7D13','Dinas Pengendalian Penduduk dan Keluarga Berencana','D93AF','Bidang Keluarga Berencana','94E45','Seksi Pembinaan dan Peningkatan Kesertaan KB'),('F7D13','Dinas Pengendalian Penduduk dan Keluarga Berencana','D93AF','Bidang Keluarga Berencana','FF855','Seksi Pengendalian Distribusi Alat Obat Kontrasepsi'),('F7D13','Dinas Pengendalian Penduduk dan Keluarga Berencana','DF664','Bidang Ketahanan dan Kesejahteraan Keluarga','3DA3E','Seksi Bina Ketahanan Keluarga Balita, Anak dan Lansia'),('F7D13','Dinas Pengendalian Penduduk dan Keluarga Berencana','DF664','Bidang Ketahanan dan Kesejahteraan Keluarga','6DB18','Seksi Ketahanan Remaja'),('F7D13','Dinas Pengendalian Penduduk dan Keluarga Berencana','DF664','Bidang Ketahanan dan Kesejahteraan Keluarga','E1A7C','Seksi Pemberdayaan Keluarga Sejahtera'),('F7D13','Dinas Pengendalian Penduduk dan Keluarga Berencana','16FEE','Bidang Pengendalian Penduduk','38CE9','Seksi Informasi Penduduk dan Keluarga'),('F7D13','Dinas Pengendalian Penduduk dan Keluarga Berencana','16FEE','Bidang Pengendalian Penduduk','8D685','Seksi Pemaduan dan Sinkronisasi Kebijakan Kependudukan'),('F7D13','Dinas Pengendalian Penduduk dan Keluarga Berencana','16FEE','Bidang Pengendalian Penduduk','A9F1C','Seksi Perencanaan dan Perkiraan Pengendalian Penduduk'),('F7D13','Dinas Pengendalian Penduduk dan Keluarga Berencana','FF9EC','Bidang Penyuluhan dan Penggerakan','07167','Seksi Advokasi dan Penggerakan'),('F7D13','Dinas Pengendalian Penduduk dan Keluarga Berencana','FF9EC','Bidang Penyuluhan dan Penggerakan','73A32','Seksi Pendayagunaan Penyuluh dan Kader KB'),('F7D13','Dinas Pengendalian Penduduk dan Keluarga Berencana','FF9EC','Bidang Penyuluhan dan Penggerakan','4D810','Seksi Penyuluhan, Komunikasi, Informasi dan Edukasi'),('F7D13','Dinas Pengendalian Penduduk dan Keluarga Berencana','54137','Sekretariat DisdukKB','17E41','Sub Bagian Keuangan'),('F7D13','Dinas Pengendalian Penduduk dan Keluarga Berencana','54137','Sekretariat DisdukKB','CD320','Sub Bagian Program, Data dan Informasi'),('F7D13','Dinas Pengendalian Penduduk dan Keluarga Berencana','54137','Sekretariat DisdukKB','29559','Sub Bagian Umum dan Kepegawaian'),('2B8EA','Dinas Perdagangan dan Perindustrian','8A28B','Bidang Distribusi Perdagangan dan Pengembangan e-Commerce','E5354','Seksi Distribusi Perdagangan'),('2B8EA','Dinas Perdagangan dan Perindustrian','8A28B','Bidang Distribusi Perdagangan dan Pengembangan e-Commerce','3AF09','Seksi Pengadaan dan Penyaluran'),('2B8EA','Dinas Perdagangan dan Perindustrian','8A28B','Bidang Distribusi Perdagangan dan Pengembangan e-Commerce','60BFE','Seksi Pengembangan e-Commerce'),('2B8EA','Dinas Perdagangan dan Perindustrian','A3FCC','Bidang Perdagangan Regional dan Luar Negeri','FD24F','Seksi Ekspor Impor'),('2B8EA','Dinas Perdagangan dan Perindustrian','A3FCC','Bidang Perdagangan Regional dan Luar Negeri','DAEF8','Seksi Hubungan Kerjasama Perdagangan Luar Negeri'),('2B8EA','Dinas Perdagangan dan Perindustrian','A3FCC','Bidang Perdagangan Regional dan Luar Negeri','0D735','Seksi Pengembangan Ekspor'),('2B8EA','Dinas Perdagangan dan Perindustrian','5E52B','Bidang Perencanaan dan Pengembangan Industri','E458A','Seksi Pengembangan, Inovasi dan Teknologi'),('2B8EA','Dinas Perdagangan dan Perindustrian','5E52B','Bidang Perencanaan dan Pengembangan Industri','A34A8','Seksi Perencanaan Sentra Industri'),('2B8EA','Dinas Perdagangan dan Perindustrian','5E52B','Bidang Perencanaan dan Pengembangan Industri','3B152','Seksi Standardisasi Industri'),('2B8EA','Dinas Perdagangan dan Perindustrian','F44B5','Bidang Sumber Daya dan Promosi Industri','5C3B4','Seksi Promosi dan Kerjasama Industri'),('2B8EA','Dinas Perdagangan dan Perindustrian','F44B5','Bidang Sumber Daya dan Promosi Industri','EF0FB','Seksi Sistem Produksi dan Pembiayaan'),('2B8EA','Dinas Perdagangan dan Perindustrian','F44B5','Bidang Sumber Daya dan Promosi Industri','839A2','Seksi Sumber Daya dan Investasi Industri'),('2B8EA','Dinas Perdagangan dan Perindustrian','97D3A','Bidang Usaha dan Sarana Perdagangan','A0F40','Seksi Pelatihan dan Pembinaan Perdagangan'),('2B8EA','Dinas Perdagangan dan Perindustrian','97D3A','Bidang Usaha dan Sarana Perdagangan','6E59A','Seksi Pengembangan dan Promosi Perdagangan'),('2B8EA','Dinas Perdagangan dan Perindustrian','97D3A','Bidang Usaha dan Sarana Perdagangan','794C7','Seksi Sarana dan Pembiayaan Perdagangan'),('2B8EA','Dinas Perdagangan dan Perindustrian','2DAA7','Sekretariat Disperindag ','17E41','Sub Bagian Keuangan'),('2B8EA','Dinas Perdagangan dan Perindustrian','2DAA7','Sekretariat Disperindag ','CD320','Sub Bagian Program, Data dan Informasi'),('2B8EA','Dinas Perdagangan dan Perindustrian','2DAA7','Sekretariat Disperindag ','29559','Sub Bagian Umum dan Kepegawaian'),('2B8EA','Dinas Perdagangan dan Perindustrian','6CE2B','UPT','1C101','UPT Balai Industri dan Promosi'),('2B8EA','Dinas Perdagangan dan Perindustrian','6CE2B','UPT','CB6A7','UPT Metrologi Legal'),('5272B','Dinas Perhubungan','2591C','Bidang Manajemen Transportasi dan Parkir','ECF32','Seksi Manajemen Angkutan'),('5272B','Dinas Perhubungan','2591C','Bidang Manajemen Transportasi dan Parkir','97250','Seksi Manajemen Perparkiran'),('5272B','Dinas Perhubungan','2591C','Bidang Manajemen Transportasi dan Parkir','58A8D','Seksi Manajemen Transportasi'),('5272B','Dinas Perhubungan','44283','Bidang Pengendalian dan Ketertiban Transportasi','9B663','Seksi Ketertiban Transportasi'),('5272B','Dinas Perhubungan','44283','Bidang Pengendalian dan Ketertiban Transportasi','0AE49','Seksi Pengamanan dan Pengawasan'),('5272B','Dinas Perhubungan','44283','Bidang Pengendalian dan Ketertiban Transportasi','F72D3','Seksi Pengaturan Transportasi'),('5272B','Dinas Perhubungan','9FD3A','Bidang Perencanaan dan Pembinaan Transportasi','67D87','Seksi Bina Transportasi'),('5272B','Dinas Perhubungan','9FD3A','Bidang Perencanaan dan Pembinaan Transportasi','E6E9D','Seksi Kelaikan dan Keselamatan Transportasi'),('5272B','Dinas Perhubungan','9FD3A','Bidang Perencanaan dan Pembinaan Transportasi','72F58','Seksi Perencanaan dan Evaluasi Transportasi'),('5272B','Dinas Perhubungan','008AC','Bidang Sarana dan Prasarana Transportasi','E91C0','Seksi Perlengkapan Jalan'),('5272B','Dinas Perhubungan','008AC','Bidang Sarana dan Prasarana Transportasi','E7EFD','Seksi Prasarana'),('5272B','Dinas Perhubungan','008AC','Bidang Sarana dan Prasarana Transportasi','9A073','Seksi Sarana Angkutan'),('5272B','Dinas Perhubungan','C61A6','Sekretariat Dishub','17E41','Sub Bagian Keuangan'),('5272B','Dinas Perhubungan','C61A6','Sekretariat Dishub','CD320','Sub Bagian Program, Data dan Informasi'),('5272B','Dinas Perhubungan','C61A6','Sekretariat Dishub','29559','Sub Bagian Umum dan Kepegawaian'),('5272B','Dinas Perhubungan','6CE2B','UPT','0A428','UPT Angkutan'),('5272B','Dinas Perhubungan','6CE2B','UPT','A076A','UPT Pengelolaan Perparkiran'),('5272B','Dinas Perhubungan','6CE2B','UPT','7A39E','UPT Pengelolaan Terminal'),('A0DC3','Dinas Perpustakaan dan Kearsipan','8C027','Bidang Pengelolaan Kearsipan','0B341','Seksi Pelestarian dan Publikasi Kearsipan'),('A0DC3','Dinas Perpustakaan dan Kearsipan','8C027','Bidang Pengelolaan Kearsipan','9F958','Seksi Pengelolaan Arsip Dinamis'),('A0DC3','Dinas Perpustakaan dan Kearsipan','8C027','Bidang Pengelolaan Kearsipan','F6319','Seksi Pengelolaan Arsip Statis'),('A0DC3','Dinas Perpustakaan dan Kearsipan','147BD','Bidang Pengelolaan Perpustakaan','42006','Seksi Pelayanan Sirkulasi dan Referensi Perpustakaan'),('A0DC3','Dinas Perpustakaan dan Kearsipan','147BD','Bidang Pengelolaan Perpustakaan','5CAD4','Seksi Penyediaan dan Pengolahan Bahan Pustaka'),('A0DC3','Dinas Perpustakaan dan Kearsipan','147BD','Bidang Pengelolaan Perpustakaan','63065','Seksi Promosi dan Pembudayaan Minat Baca'),('A0DC3','Dinas Perpustakaan dan Kearsipan','1FC51','Bidang Pengembangan Perpustakaan dan Kearsipan','BC23F','Seksi Advokasi dan Kerjasama Perpustakaan'),('A0DC3','Dinas Perpustakaan dan Kearsipan','1FC51','Bidang Pengembangan Perpustakaan dan Kearsipan','13E22','Seksi Kerjasama Kearsipan'),('A0DC3','Dinas Perpustakaan dan Kearsipan','1FC51','Bidang Pengembangan Perpustakaan dan Kearsipan','442C8','Seksi Pengembangan Sumber Daya Perpustakaan dan Kearsipan'),('A0DC3','Dinas Perpustakaan dan Kearsipan','C9098','Bidang Sistem teknologi informasi perpustakaan Kearsipan','F7A66','Seksi Akuisisi dan Pengolahan Data Perpustakaan Kearsipan'),('A0DC3','Dinas Perpustakaan dan Kearsipan','C9098','Bidang Sistem teknologi informasi perpustakaan Kearsipan','50A2D','Seksi Operasional dan Pemeliharaan Sistem Informasi Perpustakaan Kearsipan'),('A0DC3','Dinas Perpustakaan dan Kearsipan','C9098','Bidang Sistem teknologi informasi perpustakaan Kearsipan','54AB7','Seksi Perencanaan, Pengembangan dan Evaluasi Sistem Teknologi Informasi Perpustakaan Kearsipan'),('A0DC3','Dinas Perpustakaan dan Kearsipan','726D2','Sekretariat DispurArsip','17E41','Sub Bagian Keuangan'),('A0DC3','Dinas Perpustakaan dan Kearsipan','726D2','Sekretariat DispurArsip','8D0EB','Sub Bagian Program'),('A0DC3','Dinas Perpustakaan dan Kearsipan','726D2','Sekretariat DispurArsip','29559','Sub Bagian Umum dan Kepegawaian'),('BF543','Dinas Perumahan dan Kawasan Permukiman, Pertanahan dan Pertamanan','E1185','Bidang Kawasan Permukiman','045CC','Seksi Pembangunan kawasan permukiman'),('BF543','Dinas Perumahan dan Kawasan Permukiman, Pertanahan dan Pertamanan','E1185','Bidang Kawasan Permukiman','A4A87','Seksi Pengawasan dan Pengendalian Kawasan Permukiman'),('BF543','Dinas Perumahan dan Kawasan Permukiman, Pertanahan dan Pertamanan','E1185','Bidang Kawasan Permukiman','6BACC','Seksi Pengembangan Kawasan Permukiman'),('BF543','Dinas Perumahan dan Kawasan Permukiman, Pertanahan dan Pertamanan','6BDBE','Bidang Pertamanan','EA232','Seksi Pembangunan Pertamanan'),('BF543','Dinas Perumahan dan Kawasan Permukiman, Pertanahan dan Pertamanan','6BDBE','Bidang Pertamanan','39E32','Seksi Pemeliharaan Pertamanan'),('BF543','Dinas Perumahan dan Kawasan Permukiman, Pertanahan dan Pertamanan','6BDBE','Bidang Pertamanan','AE6E4','Seksi Pengembangan Pertamanan'),('BF543','Dinas Perumahan dan Kawasan Permukiman, Pertanahan dan Pertamanan','000CA','Bidang Pertanahan','BA14B','Seksi Pemanfaatan Lahan'),('BF543','Dinas Perumahan dan Kawasan Permukiman, Pertanahan dan Pertamanan','000CA','Bidang Pertanahan','0BC19','Seksi Penanganan Sengketa'),('BF543','Dinas Perumahan dan Kawasan Permukiman, Pertanahan dan Pertamanan','000CA','Bidang Pertanahan','662DE','Seksi Perencanaan dan Pengadaan Lahan'),('BF543','Dinas Perumahan dan Kawasan Permukiman, Pertanahan dan Pertamanan','7A60E','Bidang Perumahan','E7A02','Seksi Pembangunan Perumahan'),('BF543','Dinas Perumahan dan Kawasan Permukiman, Pertanahan dan Pertamanan','7A60E','Bidang Perumahan','D143F','Seksi Pengawasan dan Pengendalian Perumahan'),('BF543','Dinas Perumahan dan Kawasan Permukiman, Pertanahan dan Pertamanan','7A60E','Bidang Perumahan','E266E','Seksi Pengembangan Perumahan'),('BF543','Dinas Perumahan dan Kawasan Permukiman, Pertanahan dan Pertamanan','0D993','Bidang Prasarana, Sarana dan Utilitas','AEB98','Seksi Elemen Estetika Kota'),('BF543','Dinas Perumahan dan Kawasan Permukiman, Pertanahan dan Pertamanan','0D993','Bidang Prasarana, Sarana dan Utilitas','7476B','Seksi Pengendalian dan Pengawasan Prasarana, Sarana dan Utilitas Permukiman'),('BF543','Dinas Perumahan dan Kawasan Permukiman, Pertanahan dan Pertamanan','0D993','Bidang Prasarana, Sarana dan Utilitas','0A163','Seksi Penyediaan dan Penyerahan Prasarana, Sarana dan Utilitas Perumahan'),('BF543','Dinas Perumahan dan Kawasan Permukiman, Pertanahan dan Pertamanan','302F3','Sekretariat Disperum','17E41','Sub Bagian Keuangan'),('BF543','Dinas Perumahan dan Kawasan Permukiman, Pertanahan dan Pertamanan','302F3','Sekretariat Disperum','CD320','Sub Bagian Program, Data dan Informasi'),('BF543','Dinas Perumahan dan Kawasan Permukiman, Pertanahan dan Pertamanan','302F3','Sekretariat Disperum','29559','Sub Bagian Umum dan Kepegawaian'),('BF543','Dinas Perumahan dan Kawasan Permukiman, Pertanahan dan Pertamanan','6CE2B','UPT','F5BE3','UPT Pembibitan'),('BF543','Dinas Perumahan dan Kawasan Permukiman, Pertanahan dan Pertamanan','6CE2B','UPT','3E9F6','UPT Penghijauan Pertamanan dan Pemeliharaan Pohon'),('BF543','Dinas Perumahan dan Kawasan Permukiman, Pertanahan dan Pertamanan','6CE2B','UPT','949A5','UPT Rusunawa'),('BF543','Dinas Perumahan dan Kawasan Permukiman, Pertanahan dan Pertamanan','6CE2B','UPT','9D5CE','UPT Sarana dan Prasarana'),('BF543','Dinas Perumahan dan Kawasan Permukiman, Pertanahan dan Pertamanan','6CE2B','UPT','332AC','UPT Tegallega'),('67896','Dinas Sosial dan Penanggulangan Kemiskinan','3492D','Bidang Penanggulangan Kemiskinan','18147','Seksi Informasi dan Pengaduan'),('67896','Dinas Sosial dan Penanggulangan Kemiskinan','3492D','Bidang Penanggulangan Kemiskinan','00FB7','Seksi Pelayanan Sosial'),('67896','Dinas Sosial dan Penanggulangan Kemiskinan','3492D','Bidang Penanggulangan Kemiskinan','20C75','Seksi Perlindungan dan Jaminan Sosial'),('67896','Dinas Sosial dan Penanggulangan Kemiskinan','48A09','Bidang Pengendalian, Data dan Evaluasi','674AF','Seksi Data dan Analisa'),('67896','Dinas Sosial dan Penanggulangan Kemiskinan','48A09','Bidang Pengendalian, Data dan Evaluasi','12ED1','Seksi Evaluasi dan Pelaporan'),('67896','Dinas Sosial dan Penanggulangan Kemiskinan','48A09','Bidang Pengendalian, Data dan Evaluasi','7B646','Seksi Pengendalian'),('67896','Dinas Sosial dan Penanggulangan Kemiskinan','C57F9','Bidang Perlindungan dan Pemberdayaan Sosial','FB1BD','Seksi Pemberdayaan PMKS'),('67896','Dinas Sosial dan Penanggulangan Kemiskinan','C57F9','Bidang Perlindungan dan Pemberdayaan Sosial','C6D5D','Seksi Pemberdayaan PSK dan Pengelolaan Sumber Sosial'),('67896','Dinas Sosial dan Penanggulangan Kemiskinan','C57F9','Bidang Perlindungan dan Pemberdayaan Sosial','4CC6E','Seksi Perlindungan Sosial Korban Bencana'),('67896','Dinas Sosial dan Penanggulangan Kemiskinan','85AB3','Bidang Rehabilitasi Sosial','E59E0','Seksi Rehabilitasi Sosial Anak dan Lanjut Usia'),('67896','Dinas Sosial dan Penanggulangan Kemiskinan','85AB3','Bidang Rehabilitasi Sosial','244D2','Seksi Rehabilitasi Sosial Penyandang Disabilitas'),('67896','Dinas Sosial dan Penanggulangan Kemiskinan','85AB3','Bidang Rehabilitasi Sosial','3EC18','Seksi Rehabilitasi Sosial Tuna Sosial, Korban Perdagangan Orang dan Tindak Kekerasan'),('67896','Dinas Sosial dan Penanggulangan Kemiskinan','DF238','Sekretariat Dinsos','17E41','Sub Bagian Keuangan'),('67896','Dinas Sosial dan Penanggulangan Kemiskinan','DF238','Sekretariat Dinsos','8D0EB','Sub Bagian Program'),('67896','Dinas Sosial dan Penanggulangan Kemiskinan','DF238','Sekretariat Dinsos','29559','Sub Bagian Umum dan Kepegawaian'),('67896','Dinas Sosial dan Penanggulangan Kemiskinan','6CE2B','UPT','214A6','UPT Pusat Pelayanan Kesejahteraan Sosial'),('E473F','Dinas Tenaga Kerja','F236F','Bidang Hubungan Industrial dan Persyaratan Kerja','FDBCE','Seksi Pembinaan Hubungan Industrial dan Kelembagaan Ketenagakerjaan'),('E473F','Dinas Tenaga Kerja','F236F','Bidang Hubungan Industrial dan Persyaratan Kerja','8C87A','Seksi Penyelesaian Perselisihan Hubungan Industrial'),('E473F','Dinas Tenaga Kerja','F236F','Bidang Hubungan Industrial dan Persyaratan Kerja','4A926','Seksi Persyaratan Kerja'),('E473F','Dinas Tenaga Kerja','B9216','Bidang Pelatihan dan Produktivitas Kerja','6E386','Seksi Pemagangan dan Kompetensi Kerja'),('E473F','Dinas Tenaga Kerja','B9216','Bidang Pelatihan dan Produktivitas Kerja','F005D','Seksi Pembinaan Kelembagaan dan Pelatihan Kerja'),('E473F','Dinas Tenaga Kerja','B9216','Bidang Pelatihan dan Produktivitas Kerja','BDC08','Seksi Produktivitas dan Kewirausahaan'),('E473F','Dinas Tenaga Kerja','6F71D','Bidang Pembinaan Norma Ketenagakerjaan dan Jaminan Sosial Tenaga Kerja','C5A46','Seksi Kesejahteraan Pekerja'),('E473F','Dinas Tenaga Kerja','6F71D','Bidang Pembinaan Norma Ketenagakerjaan dan Jaminan Sosial Tenaga Kerja','26E35','Seksi Pembinaan Norma Kerja dan Jaminan Sosial Tenaga Kerja'),('E473F','Dinas Tenaga Kerja','6F71D','Bidang Pembinaan Norma Ketenagakerjaan dan Jaminan Sosial Tenaga Kerja','0D35A','Seksi Pembinaan Norma Keselamatan dan Kesehatan Kerja'),('E473F','Dinas Tenaga Kerja','09A49','Bidang Penempatan Tenaga Kerja','FA692','Seksi Informasi Pasar Kerja'),('E473F','Dinas Tenaga Kerja','09A49','Bidang Penempatan Tenaga Kerja','BD3BF','Seksi Penempatan Tenaga Kerja dan Transmigrasi'),('E473F','Dinas Tenaga Kerja','09A49','Bidang Penempatan Tenaga Kerja','08FBF','Seksi Perluasan Kesempatan Kerja'),('E473F','Dinas Tenaga Kerja','E1FF1','Sekretariat Disnaker','17E41','Sub Bagian Keuangan'),('E473F','Dinas Tenaga Kerja','E1FF1','Sekretariat Disnaker','CD320','Sub Bagian Program, Data dan Informasi'),('E473F','Dinas Tenaga Kerja','E1FF1','Sekretariat Disnaker','29559','Sub Bagian Umum dan Kepegawaian'),('E473F','Dinas Tenaga Kerja','6CE2B','UPT','83C69','UPT Balai Latihan Kerja'),('9247D','Inspektorat','A8821','Sekretariat INSPEK','2DA8D','Sub Bagian Data Informasi, Evaluasi dan Pelaporan'),('9247D','Inspektorat','A8821','Sekretariat INSPEK','0FAA7','Sub Bagian Program dan Keuangan'),('9247D','Inspektorat','A8821','Sekretariat INSPEK','29559','Sub Bagian Umum dan Kepegawaian'),('572DE','Komisi Pemilihan Umum','57E1A','Sekretariat','89875','Sub Bagian Hukum'),('572DE','Komisi Pemilihan Umum','57E1A','Sekretariat','8D0EB','Sub Bagian Program'),('572DE','Komisi Pemilihan Umum','57E1A','Sekretariat','8CD3D','Sub Bagian Umum'),('A95ED','Rumah Sakit Umum Daerah','5C6C1','Bidang Pelayanan Medis dan Keperawatan','F5DC1','Seksi Pelayanan Keperawatan'),('A95ED','Rumah Sakit Umum Daerah','5C6C1','Bidang Pelayanan Medis dan Keperawatan','F565E','Seksi Pelayanan Medis'),('A95ED','Rumah Sakit Umum Daerah','8A8A2','Bidang Penunjang Medis','EE736','Seksi Pemeliharaan dan Pemulasaraan'),('A95ED','Rumah Sakit Umum Daerah','8A8A2','Bidang Penunjang Medis','8A1BE','Seksi Penunjang Diagnostik dan Terapi'),('A95ED','Rumah Sakit Umum Daerah','145F7','Bidang Program dan Pemasaran','FC424','Seksi Mutu dan Pemasaran'),('A95ED','Rumah Sakit Umum Daerah','145F7','Bidang Program dan Pemasaran','80CFC','Seksi Pengendalian Program'),('C7208','Satuan Polisi Pamong Praja','35F37','Bidang Ketentraman, Ketertiban Umum dan Dukungan Logistik','718B3','Seksi Fasilitasi Ketentraman dan Ketertiban Umum'),('C7208','Satuan Polisi Pamong Praja','35F37','Bidang Ketentraman, Ketertiban Umum dan Dukungan Logistik','2959C','Seksi Logistik Operasional'),('C7208','Satuan Polisi Pamong Praja','35F37','Bidang Ketentraman, Ketertiban Umum dan Dukungan Logistik','F47B7','Seksi Operasional'),('C7208','Satuan Polisi Pamong Praja','E55D6','Bidang Pembinaan Masyarakat dan Aparatur','E6183','Seksi Pembinaan dan Penyuluhan'),('C7208','Satuan Polisi Pamong Praja','E55D6','Bidang Pembinaan Masyarakat dan Aparatur','B835A','Seksi Pengelolaan dan Pemberdayaan PPNS'),('C7208','Satuan Polisi Pamong Praja','E55D6','Bidang Pembinaan Masyarakat dan Aparatur','87A2E','Seksi Pengembangan Kapasitas'),('C7208','Satuan Polisi Pamong Praja','873AC','Bidang Penegakan Produk Hukum Daerah','BCBDF','Seksi Edukasi dan Pencegahan'),('C7208','Satuan Polisi Pamong Praja','873AC','Bidang Penegakan Produk Hukum Daerah','C27A6','Seksi Pelayanan Pengaduan Masyarakat'),('C7208','Satuan Polisi Pamong Praja','873AC','Bidang Penegakan Produk Hukum Daerah','95F87','Seksi Penyidikan dan Penindakan'),('C7208','Satuan Polisi Pamong Praja','2BC1C','Bidang Perlindungan Masyarakat','6FC81','Seksi Bina Potensi'),('C7208','Satuan Polisi Pamong Praja','2BC1C','Bidang Perlindungan Masyarakat','DA83A','Seksi Mobilisasi'),('C7208','Satuan Polisi Pamong Praja','2BC1C','Bidang Perlindungan Masyarakat','B3066','Seksi Pelatihan'),('C7208','Satuan Polisi Pamong Praja','341A5','Sekretariat Satpo PP','17E41','Sub Bagian Keuangan'),('C7208','Satuan Polisi Pamong Praja','341A5','Sekretariat Satpo PP','CD320','Sub Bagian Program, Data dan Informasi'),('C7208','Satuan Polisi Pamong Praja','341A5','Sekretariat Satpo PP','29559','Sub Bagian Umum dan Kepegawaian');

/*Table structure for table `tbl_pengelola_data` */

DROP TABLE IF EXISTS `tbl_pengelola_data`;

CREATE TABLE `tbl_pengelola_data` (
  `id_pengelola_data` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dinas` varchar(255) DEFAULT NULL,
  `bidang_kedinasan` varchar(255) DEFAULT NULL,
  `seksi_kedinasan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_pengelola_data`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_pengelola_data` */

insert  into `tbl_pengelola_data`(`id_pengelola_data`,`nama_dinas`,`bidang_kedinasan`,`seksi_kedinasan`) values (1,'Dinas Tenaga Kerja','Sekretariat Disnaker','Sub Bagian Program, Data dan Informasi');

/*Table structure for table `tbl_sumber_data` */

DROP TABLE IF EXISTS `tbl_sumber_data`;

CREATE TABLE `tbl_sumber_data` (
  `id_sumber_data` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dinas` varchar(255) DEFAULT NULL,
  `bidang_kedinasan` varchar(255) DEFAULT NULL,
  `seksi_kedinasan` varchar(255) DEFAULT NULL,
  `cara_pengumpulan_data` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_sumber_data`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_sumber_data` */

insert  into `tbl_sumber_data`(`id_sumber_data`,`nama_dinas`,`bidang_kedinasan`,`seksi_kedinasan`,`cara_pengumpulan_data`) values (1,'Dinas Tenaga Kerja','UPT','UPT Sarana dan Prasarana',NULL);

/*Table structure for table `tbl_wali_data` */

DROP TABLE IF EXISTS `tbl_wali_data`;

CREATE TABLE `tbl_wali_data` (
  `id_wali_data` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dinas` varchar(255) DEFAULT NULL,
  `bidang_kedinasan` varchar(255) DEFAULT NULL,
  `seksi_kedinasan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_wali_data`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_wali_data` */

insert  into `tbl_wali_data`(`id_wali_data`,`nama_dinas`,`bidang_kedinasan`,`seksi_kedinasan`) values (1,'Dinas Tenaga Kerja','UPT','UPT Tegallega');

/*Table structure for table `tipe_data` */

DROP TABLE IF EXISTS `tipe_data`;

CREATE TABLE `tipe_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipe_data` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tipe_data` */

insert  into `tipe_data`(`id`,`tipe_data`) values (1,'Data yang Dikecualikan'),(2,'Data yang Diperoleh Serta-merta'),(3,'Data yang Diperoleh Berkala'),(4,'Data yang Diperoleh Sewaktu-waktu');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`remember_token`,`created_at`,`updated_at`) values (1,'Fahri','mzfahri620@gmail.com','$2y$10$PF67LTNGnvo5f2XXzCF3Y.iy5MElMnZba7hwIoOlHtwifF/73MmWG',NULL,'2018-01-19 06:02:05','2018-01-19 06:02:05'),(2,'Heru','heruherdiansyah21@gmail.com','$2y$10$v.G9bMAPcVy0gbHyHwoFEOlKApPobSlWU1IoOjsHwtlw1A6ok0ms.','1nQeRmJtK86VSGW72gHAo77MsCKk5qFioqE6V1pn1rG6lU5PByJ83ias7whc','2018-01-19 10:48:29','2018-01-19 10:48:29');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
