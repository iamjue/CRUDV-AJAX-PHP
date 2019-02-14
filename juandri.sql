-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Feb 2019 pada 09.15
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `juandri`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pet`
--

CREATE TABLE `pet` (
  `id` int(11) NOT NULL,
  `NAMA` varchar(20) NOT NULL,
  `OWNER` varchar(20) DEFAULT NULL,
  `SPECIES` varchar(20) DEFAULT NULL,
  `SEX` char(1) DEFAULT NULL,
  `BIRTH` date DEFAULT NULL,
  `DEATH` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pet`
--

INSERT INTO `pet` (`id`, `NAMA`, `OWNER`, `SPECIES`, `SEX`, `BIRTH`, `DEATH`) VALUES
(1, 'PUFFBALL', 'DIANA', 'HAMSTER', 'F', '1999-03-03', NULL),
(3, 'FLUFFY', 'HAROLD', 'CAT', 'F', '1993-02-04', NULL),
(5, 'ab', 'jue', 'cat', 'M', '2018-12-07', '2019-02-03'),
(10, '1www', 'juan', 'cat', 'm', '2019-02-03', '0000-00-00'),
(12, 'aaaaa', 'aaaaaaaaaa', 'cat', 'm', '0000-00-00', '0000-00-00'),
(19, 'bb', 'bb', 'DOG', 'M', '0000-00-00', '0000-00-00'),
(21, 'meong', 'jue', 'cat', 'M', '2018-12-03', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pet`
--
ALTER TABLE `pet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
