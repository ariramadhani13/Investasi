-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 06. Desember 2013 jam 00:08
-- Versi Server: 5.1.41
-- Versi PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nurhadi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
  `id_berita` int(5) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `counter` int(5) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_berita`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `user_id`, `judul`, `isi`, `gambar`, `counter`, `tanggal`) VALUES
(1, 'admin', 'Berita Pertama', 'Gunung Sinabung (bahasa Karo: Deleng Sinabung) adalah gunung api di \r\nDataran Tinggi Karo, Kabupaten Karo, Sumatera Utara, Indonesia. Sinabung bersama Gunung Sibayak di \r\ndekatnya adalah dua gunung berapi aktif di Sumatera Utara dan menjadi puncak tertinggi di provinsi itu. \r\nKetinggian gunung ini adalah 2.460 meter.\r\nGunung ini tidak pernah tercatat meletus sejak tahun 1600[3] \r\ntetapi mendadak aktif kembali dengan meletus pada tahun 2010.\r\nSejak 27 Agustus 2010, gunung ini mengeluarkan \r\nasap dan abu vulkanis.[4] Pada tanggal 29 Agustus 2010 dini hari sekitar pukul 00.15 WIB (28 Agustus 2010, 17.15 UTC), \r\ngunung Sinabung mengeluarkan lava.[5][6][7]\r\nStatus gunung ini dinaikkan menjadi "Awas".[4] Dua belas ribu warga disekitarnya \r\ndievakuasi dan ditampung di 8 lokasi.[8][9] Abu Gunung Sinabung cenderung meluncur dari arah barat daya menuju timur laut.[10] \r\nSebagian Kota Medan juga terselimuti abu dari Gunung Sinabung.[10]\r\nBandar Udara Polonia di Kota Medan dilaporkan tidak \r\nmengalami gangguan perjalanan udara.[11]\r\nSatu orang dilaporkan meninggal dunia karena gangguan pernapasan ketika mengungsi \r\ndari rumahnya.[12]', 'sinabung.jpg', 61, '2013-11-28'),
(2, 'admin', 'Berita Kedua', 'Gunung Sinabung (bahasa Karo: Deleng Sinabung) adalah gunung api di \r\nDataran Tinggi Karo, Kabupaten Karo, Sumatera Utara, Indonesia. Sinabung bersama Gunung Sibayak di \r\ndekatnya adalah dua gunung berapi aktif di Sumatera Utara dan menjadi puncak tertinggi di provinsi itu. \r\nKetinggian gunung ini adalah 2.460 meter.\r\nGunung ini tidak pernah tercatat meletus sejak tahun 1600[3] \r\ntetapi mendadak aktif kembali dengan meletus pada tahun 2010.\r\nSejak 27 Agustus 2010, gunung ini mengeluarkan \r\nasap dan abu vulkanis.[4] Pada tanggal 29 Agustus 2010 dini hari sekitar pukul 00.15 WIB (28 Agustus 2010, 17.15 UTC), \r\ngunung Sinabung mengeluarkan lava.[5][6][7]\r\nStatus gunung ini dinaikkan menjadi "Awas".[4] Dua belas ribu warga disekitarnya \r\ndievakuasi dan ditampung di 8 lokasi.[8][9] Abu Gunung Sinabung cenderung meluncur dari arah barat daya menuju timur laut.[10] \r\nSebagian Kota Medan juga terselimuti abu dari Gunung Sinabung.[10]\r\nBandar Udara Polonia di Kota Medan dilaporkan tidak \r\nmengalami gangguan perjalanan udara.[11]\r\nSatu orang dilaporkan meninggal dunia karena gangguan pernapasan ketika mengungsi \r\ndari rumahnya.[12]', 'sinabung.jpg', 22, '2009-02-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE IF NOT EXISTS `profil` (
  `id_prof` int(11) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY (`id_prof`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`id_prof`, `isi`, `gambar`) VALUES
(1, 'Semua tentang profil Investasi Akhirat', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblfeedback`
--

CREATE TABLE IF NOT EXISTS `tblfeedback` (
  `f_id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `message` varchar(250) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`f_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data untuk tabel `tblfeedback`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `tblusers`
--

CREATE TABLE IF NOT EXISTS `tblusers` (
  `user_id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data untuk tabel `tblusers`
--

INSERT INTO `tblusers` (`user_id`, `name`, `username`, `password`) VALUES
(1, 'Investasi Akhirat', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblvotes`
--

CREATE TABLE IF NOT EXISTS `tblvotes` (
  `vid` int(10) NOT NULL AUTO_INCREMENT,
  `vname` varchar(50) NOT NULL,
  `vpoints` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`vid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `tblvotes`
--

INSERT INTO `tblvotes` (`vid`, `vname`, `vpoints`) VALUES
(7, 'Sangat Bagus', 15),
(6, 'Bagus', 51),
(5, 'Kurang Bagus', 35),
(8, 'Tidak Penting', 40);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
