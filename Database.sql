-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Inang: localhost
-- Waktu pembuatan: 21 Sep 2014 pada 20.50
-- Versi Server: 5.5.38-0ubuntu0.14.04.1
-- Versi PHP: 5.5.9-1ubuntu4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `sapu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen`
--

CREATE TABLE IF NOT EXISTS `absen` (
  `nis` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time DEFAULT NULL,
  PRIMARY KEY (`nis`,`tanggal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absen`
--

INSERT INTO `absen` (`nis`, `tanggal`, `waktu`) VALUES
('42041006', '2014-09-05', '08:55:24'),
('42041006', '2014-09-06', '08:20:46'),
('42041007', '2014-09-05', '08:55:31'),
('42041007', '2014-09-06', '08:20:55'),
('42041008', '2014-09-04', '08:55:52'),
('42041008', '2014-09-05', '08:55:37'),
('42041009', '2014-09-19', '14:49:16'),
('42041009', '2014-09-20', '22:32:21'),
('42041011', '2014-09-08', '00:01:37'),
('42041017', '2014-09-05', '22:24:56'),
('42041039', '2014-09-20', '23:41:54'),
('42041048', '2014-09-08', '00:02:06'),
('42041049', '2014-09-06', '08:21:04'),
('42041054', '2014-09-08', '00:01:55'),
('42041061', '2014-09-21', '00:02:23'),
('42041064', '2014-09-06', '08:21:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE IF NOT EXISTS `guru` (
  `nip` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `password` varchar(1024) NOT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`nip`, `nama`, `password`, `jenis_kelamin`) VALUES
('11520241053', 'Saiful Habib', 'qwerty', 'L');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `nis` varchar(20) NOT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `kelas` enum('X','XI','XII') DEFAULT NULL,
  `jurusan` enum('AK','AP','PM','RPL') DEFAULT NULL,
  `paralel` smallint(6) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT 'P',
  PRIMARY KEY (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `kelas`, `jurusan`, `paralel`, `jenis_kelamin`) VALUES
('42041006', 'Siswa1', 'X', 'AK', 1, 'L'),
('42041007', 'Siswa2', 'X', 'AK', 1, 'P'),
('42041008', 'Siswa3', 'X', 'AK', 2, 'L'),
('42041009', 'Siswa4', 'X', 'AK', 2, 'P'),
('42041010', 'Siswa5', 'X', 'AK', 3, 'L'),
('42041011', 'Siswa6', 'X', 'AK', 3, 'P'),
('42041012', 'Siswa7', 'X', 'PM', 1, 'L'),
('42041013', 'Siswa8', 'X', 'PM', 1, 'P'),
('42041014', 'Siswa9', 'X', 'PM', 2, 'L'),
('42041015', 'Siswa10', 'X', 'PM', 2, 'P'),
('42041016', 'Siswa11', 'X', 'PM', 3, 'L'),
('42041017', 'Siswa12', 'X', 'PM', 3, 'P'),
('42041018', 'Siswa13', 'X', 'AP', 1, 'L'),
('42041019', 'Siswa14', 'X', 'AP', 1, 'P'),
('42041020', 'Siswa15', 'X', 'AP', 2, 'L'),
('42041021', 'Siswa16', 'X', 'AP', 2, 'P'),
('42041022', 'Siswa17', 'X', 'AP', 3, 'L'),
('42041023', 'Siswa18', 'X', 'AP', 3, 'P'),
('42041024', 'Siswa19', 'X', 'RPL', 1, 'L'),
('42041025', 'Siswa20', 'X', 'RPL', 1, 'P'),
('42041026', 'Siswa21', 'XI', 'AK', 1, 'L'),
('42041027', 'Siswa22', 'XI', 'AK', 1, 'P'),
('42041028', 'Siswa23', 'XI', 'AK', 2, 'L'),
('42041029', 'Siswa24', 'XI', 'AK', 2, 'P'),
('42041030', 'Siswa25', 'XI', 'AK', 3, 'L'),
('42041031', 'Siswa26', 'XI', 'AK', 3, 'P'),
('42041032', 'Siswa27', 'XI', 'PM', 1, 'L'),
('42041033', 'Siswa28', 'XI', 'PM', 1, 'P'),
('42041034', 'Siswa29', 'XI', 'PM', 2, 'L'),
('42041035', 'Siswa30', 'XI', 'PM', 2, 'P'),
('42041036', 'Siswa31', 'XI', 'PM', 3, 'L'),
('42041037', 'Siswa32', 'XI', 'PM', 3, 'P'),
('42041038', 'Siswa33', 'XI', 'AP', 1, 'L'),
('42041039', 'Siswa34', 'XI', 'AP', 1, 'P'),
('42041040', 'Siswa35', 'XI', 'AP', 2, 'L'),
('42041041', 'Siswa36', 'XI', 'AP', 2, 'P'),
('42041042', 'Siswa37', 'XI', 'AP', 3, 'L'),
('42041043', 'Siswa38', 'XI', 'AP', 3, 'P'),
('42041044', 'Siswa39', 'XI', 'RPL', 1, 'L'),
('42041045', 'Siswa40', 'XI', 'RPL', 1, 'P'),
('42041046', 'Siswa41', 'XI', 'AK', 1, 'L'),
('42041047', 'Siswa42', 'XII', 'AK', 1, 'P'),
('42041048', 'Siswa43', 'XII', 'AK', 2, 'L'),
('42041049', 'Siswa44', 'XII', 'AK', 2, 'P'),
('42041050', 'Siswa45', 'XII', 'AK', 3, 'L'),
('42041051', 'Siswa46', 'XII', 'AK', 3, 'P'),
('42041052', 'Siswa47', 'XII', 'PM', 1, 'L'),
('42041053', 'Siswa48', 'XII', 'PM', 1, 'P'),
('42041054', 'Siswa49', 'XII', 'PM', 2, 'L'),
('42041055', 'Siswa50', 'XII', 'PM', 2, 'P'),
('42041056', 'Siswa51', 'XII', 'PM', 3, 'L'),
('42041057', 'Siswa52', 'XII', 'PM', 3, 'P'),
('42041058', 'Siswa53', 'XII', 'AP', 1, 'L'),
('42041059', 'Siswa54', 'XII', 'AP', 1, 'P'),
('42041060', 'Siswa55', 'XII', 'AP', 2, 'L'),
('42041061', 'Siswa56', 'XII', 'AP', 2, 'P'),
('42041062', 'Siswa57', 'XII', 'AP', 3, 'L'),
('42041063', 'Siswa58', 'XII', 'AP', 3, 'P'),
('42041064', 'Siswa59', 'XII', 'RPL', 1, 'L'),
('42041065', 'Siswa60', 'XII', 'RPL', 1, 'P');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absen`
--
ALTER TABLE `absen`
  ADD CONSTRAINT `fk_absen_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
