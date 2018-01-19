-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 19, 2018 at 04:09 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `berita_ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_session`
--

CREATE TABLE `api_session` (
  `api_session_id` varchar(32) NOT NULL,
  `user_id` int(11) NOT NULL,
  `device_token` varchar(256) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `expired` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `api_session`
--

INSERT INTO `api_session` (`api_session_id`, `user_id`, `device_token`, `created`, `expired`) VALUES
('a79349bba9fa087a453fe92bca51e5e2', 1, '', '2017-12-09 08:14:16', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `idberita` int(11) NOT NULL,
  `idpenulis` int(11) NOT NULL,
  `idjenisberita` int(11) NOT NULL,
  `judulberita` varchar(256) NOT NULL,
  `seolink` varchar(256) NOT NULL,
  `isiberita` text NOT NULL,
  `image` varchar(256) NOT NULL,
  `baca` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `__createdby` varchar(256) NOT NULL DEFAULT 'SYS_ADMIN',
  `__createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `__updatedby` varchar(256) NOT NULL,
  `__updateddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`idberita`, `idpenulis`, `idjenisberita`, `judulberita`, `seolink`, `isiberita`, `image`, `baca`, `status`, `__createdby`, `__createddate`, `__updatedby`, `__updateddate`) VALUES
(2, 3, 1, 'hamka Hamzah Ajak Suporter PSM Memadati Stadion AMM', 'hamka-hamzah-ajak-suporter-psm-memadati-stadion-amm', '<p><strong>Bola.com, Makassar -</strong> Hamka Hamzah, kapten <a href=\"http://www.bola.com/indonesia/read/3157556/laga-kontra-bali-united-ricuh-psm-dapat-sanksi-berat-dari-komdis\"><strong>PSM Makassar</strong></a>, mengajak suporter PSM memadati Stadion Andi Mattalatta Mattoangin, Makassar, saat tim Juku Eja menjamu Madura United pada pekan ke-34 atau pekan terakhir Liga 1 2017, Minggu (12/11/2017).</p>\r\n\r\n<p>\"<a href=\"http://www.bola.com/indonesia/read/3156050/gagal-musim-ini-psm-tetap-patok-target-juara-musim-depan\"><strong>PSM</strong></a> memang sudah kehilangan peluang juara. Tapi, semua pemain sudah bertekad tampil dengan kemampuan terbaik untuk menghibur suporter setia PSM,\" kata Hamkah pada jumpa media di Hotel Same, Makassar, Sabtu (10/11/2017).</p>\r\n\r\n<p>Hamkah Hamzah dkk. mematok tiga poin atas Madura United sekaligus membalas kekalahan pada pertemuan pertama. \"Kami akan bermain dengan karakter khas PSM meski tampil di pengujung Liga 1 yang tidak lagi menentukan,\" tegas Hamka.</p>\r\n', '20171111084357_014751500_1497890783_20170515nh_psm_makassar_013.jpg', 0, 1, 'admin', '2017-11-11 07:43:57', 'admin', '2017-12-27 04:21:11'),
(3, 3, 1, 'Masa Depan Vic Hermans di Timnas Futsal Indonesia Belum Jelas', 'masa-depan-vic-hermans-di-timnas-futsal-indonesia-belum-jelas', '<p><strong>Bola.com, Jakarta -</strong> Vic Hermans mengaku belum tahu perihal kelanjutan masa depannya bersama <a href=\"http://www.bola.com/indonesia/read/3144698/vic-hermans-ungkap-penyebab-kegagalan-timnas-futsal-indonesia\"><strong>Timnas Futsal Indonesia</strong></a> setelah gagal lolos ke Kejuaraan Futsal AFC 2018 karena gagal di Piala AFF Futsal 2017. Pelatih kepala Timnas Futsal Indonesia itu hanya bisa menunggu keputusan dari Federasi Futsal Indonesia (FFI) terkait kelanjutannya bersama Timnas Futsal Indonesia.</p>\r\n\r\n<p>Tak hanya gagal lolos ke Kejuaraan Futsal AFC 2018, <a href=\"http://www.bola.com/indonesia/read/3144509/timnas-futsal-indonesia-tersingkir-dari-piala-aff-2017\"><strong>Timnas Futsal Indonesia</strong></a> juga gagal tampil mengesankan di SEA Games 2017. Meski sebelumnya Timnas Futsal Indonesia U-20 berhasil melaju hingga perempat final Kejuaraan Futsal U-20 AFC 2017, masa depan Vic Hermans belum bisa dipastikan.</p>\r\n', '20171111084518_010816800_1494492915_pelatih_futsal_u_20_02.jpg', 0, 1, 'admin', '2017-11-11 07:45:18', '', '0000-00-00 00:00:00'),
(4, 3, 5, 'test', 'test', '<p>test</p>\r\n', '20171112103731_014751500_1497890783_20170515nh_psm_makassar_013.jpg', 0, 1, 'admin', '2017-11-12 09:37:31', '', '0000-00-00 00:00:00'),
(5, 3, 1, 'a', 'a', '<p>a</p>\r\n', '20171130201412_screenshot_from_2017_10_23_18_31_20.png', 0, 1, 'admin', '2017-11-30 19:14:12', '', '0000-00-00 00:00:00'),
(6, 3, 1, 'testing', 'testing', '<p>Ashdah la lkhaslkdh asklhd alksh sajhdk lahs dkash</p>\r\n', '20171208143209_screenshot_from_2017_10_23_18_31_08.png', 0, 1, 'admin', '2017-12-08 13:32:09', '', '0000-00-00 00:00:00'),
(7, 3, 1, 'asd', 'asd', '<p>asda asdas asd asd sad as</p>\r\n', '20171208143333_screenshot_from_2017_10_23_18_31_20.png', 0, 1, 'admin', '2017-12-08 13:33:33', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `jeniserita`
--

CREATE TABLE `jeniserita` (
  `idjenisberita` int(11) NOT NULL,
  `jenisberita` varchar(256) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `__createdby` varchar(256) NOT NULL DEFAULT 'SYS_ADMIN',
  `__createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `__updatedby` varchar(256) NOT NULL,
  `__updateddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jeniserita`
--

INSERT INTO `jeniserita` (`idjenisberita`, `jenisberita`, `status`, `__createdby`, `__createddate`, `__updatedby`, `__updateddate`) VALUES
(1, 'Indonesia', 1, 'admin', '2017-11-11 07:36:26', 'admin', '2017-11-11 08:36:33'),
(2, 'Inggris', 0, 'admin', '2017-11-11 07:36:45', 'admin', '2017-11-21 08:00:46'),
(3, 'Spanyol', 1, 'admin', '2017-11-11 07:36:55', '', '0000-00-00 00:00:00'),
(4, 'Dunia', 1, 'admin', '2017-11-11 07:37:07', '', '0000-00-00 00:00:00'),
(5, 'MotoGP', 1, 'admin', '2017-11-11 07:37:15', '', '0000-00-00 00:00:00'),
(6, 'F1', 1, 'admin', '2017-11-11 07:37:25', '', '0000-00-00 00:00:00'),
(7, 'NBA', 1, 'admin', '2017-11-11 07:37:32', '', '0000-00-00 00:00:00'),
(8, 'Live', 1, 'admin', '2017-11-11 07:37:44', '', '0000-00-00 00:00:00'),
(9, 'Ragam', 1, 'admin', '2017-11-11 07:37:52', '', '0000-00-00 00:00:00'),
(10, 'Video', 1, 'admin', '2017-11-11 07:37:59', '', '0000-00-00 00:00:00'),
(11, 'Test', 1, 'admin', '2017-12-09 08:55:38', '', '0000-00-00 00:00:00'),
(12, 'Balap Motor', 1, 'admin', '2017-12-09 09:02:23', '', '0000-00-00 00:00:00'),
(13, 'Politik', 1, 'admin', '2017-12-10 13:49:53', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `idkomentar` int(11) NOT NULL,
  `komen` text NOT NULL,
  `email` varchar(256) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`idkomentar`, `komen`, `email`, `nama`, `tanggal`) VALUES
(1, 'test', 'anjaswicaksana122@gmail.com', 'anjas wicaksana', '2017-12-10 21:27:11'),
(2, 'test2', 'anjas2@gmail.com', 'wicaksana', '2017-12-10 21:28:04');

-- --------------------------------------------------------

--
-- Table structure for table `penulis`
--

CREATE TABLE `penulis` (
  `idpenulis` int(11) NOT NULL,
  `namapenulis` varchar(256) NOT NULL,
  `tentangpenulis` text NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `__createdby` varchar(256) NOT NULL DEFAULT 'SYS_ADMIN',
  `__createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `__updatedby` varchar(256) NOT NULL,
  `__updateddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penulis`
--

INSERT INTO `penulis` (`idpenulis`, `namapenulis`, `tentangpenulis`, `status`, `__createdby`, `__createddate`, `__updatedby`, `__updateddate`) VALUES
(3, 'Anjas Wicaksana', '', 1, 'admin', '2017-10-28 08:30:49', 'admin', '2017-11-01 21:28:26'),
(4, 'www', '', 1, 'admin', '2017-10-30 03:10:51', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `idslider` int(11) NOT NULL,
  `judul` text NOT NULL,
  `image` varchar(256) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `__createdby` varchar(256) NOT NULL,
  `__createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `__updatedby` varchar(256) NOT NULL,
  `__updateddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`idslider`, `judul`, `image`, `status`, `__createdby`, `__createddate`, `__updatedby`, `__updateddate`) VALUES
(1, 'Pertama', '20171111111811_014751500_1497890783_20170515nh_psm_makassar_013.jpg', 1, 'admin', '2017-11-01 10:29:13', 'admin', '2017-12-29 02:47:48'),
(2, 'Kedua', '20171111111804_010816800_1494492915_pelatih_futsal_u_20_02.jpg', 1, 'admin', '2017-11-11 10:18:04', '', '0000-00-00 00:00:00'),
(3, 'Ketiga', '20171111111826_023373900_1505746360_20170918iq_ps_tni_vs_madura_united_07.jpg', 1, 'admin', '2017-11-11 10:18:26', '', '0000-00-00 00:00:00'),
(13, 'asd', '20171130195504_1.png', 0, 'admin', '2017-11-30 18:55:04', '', '0000-00-00 00:00:00'),
(14, '1', '20171130200454_screenshot_from_2017_10_23_18_31_13.png', 1, 'admin', '2017-11-30 19:04:54', '', '0000-00-00 00:00:00'),
(15, 'Test', '20171229024812_tokyo_ghoul_tokyo_ghoul_39622255_500_324.jpg', 1, 'admin', '2017-12-29 01:48:12', 'admin', '2017-12-29 02:48:21');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `idstatus` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`idstatus`, `status`) VALUES
(0, 'Tidak Aktif'),
(1, 'Aktif'),
(99, 'Deleted');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` enum('ADMIN','USER') NOT NULL DEFAULT 'USER',
  `__createdby` varchar(256) NOT NULL,
  `__createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `__updatedby` varchar(256) NOT NULL,
  `__updateddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `name`, `email`, `password`, `level`, `__createdby`, `__createddate`, `__updatedby`, `__updateddate`) VALUES
(1, 'admin', 'Adminustrator', 'anjaswicaksana122@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'ADMIN', 'SYS_ADMIN', '2017-09-09 06:48:31', '', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_session`
--
ALTER TABLE `api_session`
  ADD PRIMARY KEY (`api_session_id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`idberita`),
  ADD KEY `idpenulis` (`idpenulis`),
  ADD KEY `idjenisberita` (`idjenisberita`);

--
-- Indexes for table `jeniserita`
--
ALTER TABLE `jeniserita`
  ADD PRIMARY KEY (`idjenisberita`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`idkomentar`);

--
-- Indexes for table `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`idpenulis`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`idslider`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`idstatus`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `idberita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jeniserita`
--
ALTER TABLE `jeniserita`
  MODIFY `idjenisberita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `idkomentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penulis`
--
ALTER TABLE `penulis`
  MODIFY `idpenulis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `idslider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`idpenulis`) REFERENCES `penulis` (`idpenulis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `berita_ibfk_2` FOREIGN KEY (`idjenisberita`) REFERENCES `jeniserita` (`idjenisberita`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
