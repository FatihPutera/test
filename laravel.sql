-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jun 2021 pada 09.17
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `Id` int(10) NOT NULL,
  `Nama_barang` varchar(200) NOT NULL,
  `Kode_barang` varchar(50) NOT NULL,
  `Tanggal` date NOT NULL,
  `Jumlah_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`Id`, `Nama_barang`, `Kode_barang`, `Tanggal`, `Jumlah_barang`) VALUES
(123, 'botol kecap', '1233213123', '2021-06-15', 12),
(124, 'wer', 'wer', '2021-06-18', 34),
(125, 'oke', 'okaaaay', '2021-06-26', 243234),
(126, 'das', 'de', '2021-06-18', 32),
(127, 'das', 'de', '2021-06-18', 32),
(128, 'das', 'de', '2021-06-18', 32),
(129, 'rwe', '34', '2021-06-11', 4),
(130, 'de', 'e', '2021-06-18', 23),
(131, 'das', 'das', '2021-06-11', 32),
(132, 'botol kecap2', '21', '2021-06-02', 31),
(133, 'botol kecap2', '21', '2021-06-02', 31),
(134, 'dsa', '324', '2021-06-16', 42),
(135, 'dsa', '324', '2021-06-16', 42),
(136, 'rew', '43', '2021-06-11', 53);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
