-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Apr 2023 pada 06.01
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webpilketos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `admin_dbid` int(11) NOT NULL,
  `admin_id` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`admin_dbid`, `admin_id`, `password`) VALUES
(0, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kandidat`
--

CREATE TABLE `kandidat` (
  `dbid` int(11) NOT NULL,
  `kandidat_id` int(11) NOT NULL,
  `ketua` varchar(32) NOT NULL,
  `wakil` varchar(32) NOT NULL,
  `motto` varchar(1000) NOT NULL,
  `visimisi` varchar(1000) NOT NULL,
  `gambar` varchar(32) NOT NULL,
  `video` varchar(32) NOT NULL,
  `userid` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kandidat`
--

INSERT INTO `kandidat` (`dbid`, `kandidat_id`, `ketua`, `wakil`, `motto`, `visimisi`, `gambar`, `video`, `userid`, `password`) VALUES
(2, 1, 'Muh. Reynald Saman', 'Wakil Ketua Osis 1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque ullam similique veritatis temporibus quibusdam tempora odit distinctio libero blanditiis voluptas, fuga quas architecto animi. Natus quia officiis dolorem. Ipsa, aliquam?\r\n', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque ullam similique veritatis temporibus quibusdam tempora odit distinctio libero blanditiis voluptas, fuga quas architecto animi. Natus quia officiis dolorem. Ipsa, aliquam?\r\n', '63732f2a399ea.jpeg', '63732f2a3a1a6.mp4', 'kandidat_1', 'password'),
(3, 2, 'M. Hasan Fauzan Mbuinga', 'Wakil Ketua Osis 2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque ullam similique veritatis temporibus quibusdam tempora odit distinctio libero blanditiis voluptas, fuga quas architecto animi. Natus quia officiis dolorem. Ipsa, aliquam?\r\n', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque ullam similique veritatis temporibus quibusdam tempora odit distinctio libero blanditiis voluptas, fuga quas architecto animi. Natus quia officiis dolorem. Ipsa, aliquam?\r\n', '63732f481f5d5.jpeg', '63732f481fa62.mp4', 'kandidat_2', 'password'),
(4, 3, 'Rado Musa', 'Wakil Ketua Osis 3', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque ullam similique veritatis temporibus quibusdam tempora odit distinctio libero blanditiis voluptas, fuga quas architecto animi. Natus quia officiis dolorem. Ipsa, aliquam?\r\n', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque ullam similique veritatis temporibus quibusdam tempora odit distinctio libero blanditiis voluptas, fuga quas architecto animi. Natus quia officiis dolorem. Ipsa, aliquam?\r\n', '63732f6d405c4.jpeg', '63732f6d40a52.mp4', 'kandidat_3', 'password');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `users_dbid` int(11) NOT NULL,
  `userid` varchar(32) NOT NULL,
  `is_vote` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `vote`
--

CREATE TABLE `vote` (
  `vote_id` int(11) NOT NULL,
  `kandidat_id` varchar(32) NOT NULL,
  `pesan` varchar(1000) NOT NULL DEFAULT 'Pengguna ini tidak memberikan saran'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_dbid`);

--
-- Indeks untuk tabel `kandidat`
--
ALTER TABLE `kandidat`
  ADD PRIMARY KEY (`dbid`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_dbid`);

--
-- Indeks untuk tabel `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`vote_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_dbid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kandidat`
--
ALTER TABLE `kandidat`
  MODIFY `dbid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `users_dbid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `vote`
--
ALTER TABLE `vote`
  MODIFY `vote_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
