-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 23 Apr 2014 pada 11.55
-- Versi Server: 5.5.34-MariaDB
-- PHP Version: 5.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `psb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `biodata_siswa`
--

CREATE TABLE IF NOT EXISTS `biodata_siswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_reg` varchar(20) NOT NULL,
  `kunci` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jkel` varchar(10) NOT NULL,
  `tem_lahir` varchar(25) NOT NULL,
  `tgl` int(11) NOT NULL,
  `bln` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `gol_drh` varchar(10) NOT NULL,
  `k_pos` varchar(7) NOT NULL,
  `tinggi` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `agama` varchar(25) NOT NULL,
  `asal_sek` varchar(100) NOT NULL,
  `alamat_sek` varchar(100) NOT NULL,
  `thn_lls` int(11) NOT NULL,
  `no_ijazah` varchar(25) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `jurusan1` varchar(30) NOT NULL,
  `nisn` varchar(30) NOT NULL,
  `bin` float NOT NULL,
  `big` float NOT NULL,
  `ipa` float NOT NULL,
  `mtk` float NOT NULL,
  `ayah` varchar(50) NOT NULL,
  `ibu` varchar(50) NOT NULL,
  `wali` varchar(50) NOT NULL,
  `alamat_wali` varchar(50) NOT NULL,
  `hp_wali` varchar(15) NOT NULL,
  `kerja_wali` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `no_reg` (`no_reg`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `biodata_siswa`
--

INSERT INTO `biodata_siswa` (`id`, `no_reg`, `kunci`, `nama`, `jkel`, `tem_lahir`, `tgl`, `bln`, `tahun`, `alamat`, `gol_drh`, `k_pos`, `tinggi`, `berat`, `agama`, `asal_sek`, `alamat_sek`, `thn_lls`, `no_ijazah`, `hp`, `email`, `jurusan1`, `nisn`, `bin`, `big`, `ipa`, `mtk`, `ayah`, `ibu`, `wali`, `alamat_wali`, `hp_wali`, `kerja_wali`) VALUES
(6, 'SMK071500000', 'asasas', 'Harry Setya Hadi', 'LAKI-LAKI', 'Lubuk Sikaping', 23, 7, 1990, 'Perumahan Tarok Indah Blok E/11 Kampung jua, Lubeg, Padang ', 'B', '25225', 175, 80, 'ISLAM', 'SMP N 8 Padang', 'Dr. Sutomo ', 2002, '08135965424121', '123123', 'xmoensen@gmail.com', '2', '0610115262023', 70, 80, 44, 70, 'Syamsul Bahri', 'Fatrilasmi', 'Syamsul Bahri', 'Perumahan Tarok Indah Blok E/11 Kampung jua, Lubeg', '06515615485', 'PNS'),
(7, 'SMK072815001', 'IQPcDU', 'Ratna Sari', 'PEREMPUAN', 'Solok', 17, 3, 1991, 'Jl. Lettu Amran , solok', 'A', '9000', 170, 50, 'ISLAM', 'SLTPN 1 Solok', 'Jl. Lettu Amran 2, Solok', 2009, 'J6509788', '085270792054', 'ratna_bkandung@yahoo.com', '1', '89999', 80, 67, 98, 90, 'Baharudin', 'Sumiati', '-', 'Jl. Lettu Amran , Solok', '083109876545', 'PNS'),
(8, 'SMK072828151', '4lXK04', 'Febri Hidayawati', 'PEREMPUAN', 'Talawi', 16, 3, 1998, 'Jl. Tapalawi, No. 30 Talawi', 'B', '27311', 150, 40, 'ISLAM', 'SLTPN 2  Talawi', 'Jl. Talawi no 9. Talawi', 2010, 'J8976', '087792422460', 'febri@gmail.com', '1', '8978900', 90, 87, 99, 89, 'Sukardi', 'Rahmawati', '-', 'Jl. Tapalawi, 2, Talawi', '087767897654', 'PNS'),
(9, 'SMK072928282', '4Z@s9S', 'Fuad', 'LAKI-LAKI', 'padang', 9, 12, 2000, 'Jl. Ngurahrai 32, padang', 'A', '27311', 150, 50, 'ISLAM', 'SLTPN 1 Padang', 'Jl. Cendrawasih, 23, Padang', 2011, 'J24908', '087792422460', 'fuad@yahoo.co.id', '2', '125121', 78, 87, 65, 90, 'Ahmadul Hadi, S.Pd', 'Susilawati', '-', 'Padang', '087767897654', 'PNS'),
(11, 'SMK112229283', 'hd9jG2', 'HARRY SETYA HADI', 'LAKI-LAKI', 'LUBUK SIKAPING', 2, 1, 1990, 'Jln Kampar no .3 Pasaman Barat', 'A', '63221', 50, 165, 'ISLAM', 'SMP N 1 Pasaman Barat', 'JLN KAMPAR', 2011, '5241114202125', '081933536231', 'harry@gmail.com', '1', '154225112', 75, 61, 85, 80, 'Ibrahim', 'Fatimah', 'Ibrahim', 'JLN Kampar', '-', 'PNS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `nama_sekolah` varchar(200) NOT NULL,
  `alamat_sekolah` varchar(200) NOT NULL,
  `lama_ujian` int(1) NOT NULL,
  `nama_sistem` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `config`
--

INSERT INTO `config` (`nama_sekolah`, `alamat_sekolah`, `lama_ujian`, `nama_sistem`) VALUES
('SMAN 1 PASAMAN BARAT', 'Jl. Cindua Mato, Pasaman Baru, Simpang Ampek, 12000, Indonesia. ', 5000, 'SISTEM INFORMASI REGISTRASI ONLINE SMAN 1 PASAMAN BARAT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE IF NOT EXISTS `jurusan` (
  `id_jurusan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jurusan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_jurusan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'IPA'),
(2, 'IPS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dari` varchar(20) NOT NULL,
  `kepada` varchar(20) NOT NULL,
  `isi_pesan` varchar(1000) NOT NULL,
  `dibaca` varchar(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id`, `dari`, `kepada`, `isi_pesan`, `dibaca`) VALUES
(57, 'SMK070815151', 'Panitia', 'asdadasd', '0'),
(58, 'admin', 'SMK070815151', 'apo lai yuang', '0'),
(63, 'SMK071500000', 'Panitia2', 'asdasdasd', '0'),
(65, 'SMK072815001', 'Panitia', 'kapan ujian?', '0'),
(66, 'SMK071500000', 'Panitia2', 'sdf', '0'),
(67, 'SMK112229283', 'Panitia', 'bagaimana kabar panitia', '0'),
(68, 'Panitia', 'SMK112229283', 'Baik', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sistem`
--

CREATE TABLE IF NOT EXISTS `sistem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `anoun` varchar(500) NOT NULL,
  `file_log` varchar(20) NOT NULL DEFAULT 'log.txt',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `sistem`
--

INSERT INTO `sistem` (`id`, `anoun`, `file_log`) VALUES
(1, 'REGISTRASI Online, adalah sebuah sistem yang dirancang untuk melakukan otomasi seleksi penerimaan siswa baru (PSB), mulai dari proses pendaftaran, proses seleksi hingga pengumuman hasil seleksi, yang dilakukan secara online dan berbasis waktu nyata (realtime).', 'log-22-Nov-2013.txt');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_reg` varchar(15) NOT NULL,
  `foto` varchar(50) NOT NULL DEFAULT 'img/default.jpg',
  `status` varchar(25) NOT NULL DEFAULT '1',
  `langkah` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `no_reg`, `foto`, `status`, `langkah`) VALUES
(5, 'SMK071500000', 'upload/SMK071500000.png', '4', 4),
(6, 'SMK072815001', 'upload/SMK072815001.jpg', '2', 4),
(7, 'SMK072828151', 'upload/SMK072828151.jpg', '2', 4),
(8, 'SMK072928282', 'upload/SMK072928282.jpg', '2', 6),
(9, 'SMK073029283', 'img/default.jpg', '1', 2),
(10, 'SMK112229283', 'upload/SMK112229283.jpg', '1', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabeluser`
--

CREATE TABLE IF NOT EXISTS `tabeluser` (
  `userid` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(15) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabeluser`
--

INSERT INTO `tabeluser` (`userid`, `password`, `level`) VALUES
('admin', '6d048310a3e801fc718c9ffd7b1d47c9', 'admin'),
('Kepsek', '8561863b55faf85b9ad67c52b3b851ac', 'kepsek'),
('Panitia', 'd32b1673837a6a45f795c13ea67ec79e', 'panitia'),
('Panitia2', '450b7b93e034d5e94269ea80cd5c7e19', 'panitia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kerja`
--

CREATE TABLE IF NOT EXISTS `tbl_kerja` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `ket` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `tbl_kerja`
--

INSERT INTO `tbl_kerja` (`id`, `ket`) VALUES
(1, 'PNS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tembok`
--

CREATE TABLE IF NOT EXISTS `tembok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oleh` varchar(25) NOT NULL,
  `pesan` longtext NOT NULL,
  `jawab` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `type_soal`
--

CREATE TABLE IF NOT EXISTS `type_soal` (
  `id_soal` int(1) NOT NULL AUTO_INCREMENT,
  `ket_soal` varchar(25) NOT NULL,
  PRIMARY KEY (`id_soal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `type_soal`
--

INSERT INTO `type_soal` (`id_soal`, `ket_soal`) VALUES
(1, 'Teknik Bangunan'),
(2, 'Teknik Ketenagalistrikan'),
(3, 'Teknik Mesin'),
(4, 'Teknik Otomotif'),
(5, 'Geologi Pertambangan');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
