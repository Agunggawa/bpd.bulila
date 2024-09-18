-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Bulan Mei 2024 pada 13.26
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bpd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `role` enum('admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`, `role`) VALUES
('admin', '12345', 'admin'),
('pengguna1', 'test', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `masa_jabatan` varchar(25) NOT NULL,
  `nomor_telpon` int(11) NOT NULL,
  `NIP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama`, `jabatan`, `masa_jabatan`, `nomor_telpon`, `NIP`) VALUES
(1, 'GOLFRED ALEX KOJONGKAM, S', 'Ketua', '5 Tahun', 0, 0),
(2, 'BARENS HINTA, SH', 'Wakil Ketua', '5 Tahun', 0, 0),
(3, 'ASNI LAWANI, S.AP', 'Sekretaris', '5 Tahun', 0, 0),
(4, 'HASAN DUDE', 'Ketua Bidang Penyelenggaraan P', '5 Tahun', 0, 0),
(5, 'TAJUDDIN ABDILLAH, M.SI', 'Ketua Bidang Pembangunan Desa ', '5 Tahun', 0, 0),
(6, 'SUMARNI ANTULE, S.SOS', 'Anggota Bidang Penyelenggaraan', '5 Tahun', 0, 0),
(7, 'NATSIR RAHMAN, S.KOM', 'Anggota Bidang Pembangunan Des', '5 Tahun', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bagan`
--

CREATE TABLE `bagan` (
  `foto_bagan` varchar(255) NOT NULL,
  `id_bagan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bagan`
--

INSERT INTO `bagan` (`foto_bagan`, `id_bagan`) VALUES
('STRUKTUR/strukturbpd.png', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `NIK` int(20) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `NIK`, `foto`, `nama`, `isi`) VALUES
(9, 1233456, '', 'contoh nama', 'contoh isi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peraturan_desa`
--

CREATE TABLE `peraturan_desa` (
  `id_peraturan` int(11) NOT NULL,
  `judul_peraturan` varchar(50) NOT NULL,
  `isi_peraturan` varchar(50) NOT NULL,
  `nomor_peraturan` varchar(25) NOT NULL,
  `penetapan` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peraturan_desa`
--

INSERT INTO `peraturan_desa` (`id_peraturan`, `judul_peraturan`, `isi_peraturan`, `nomor_peraturan`, `penetapan`) VALUES
(18, 'Rencana Kerja Pemerintah Desa Tahun 2024', 'peraturan_desa.pdf', 'Nomor 4 Tahun 2023', '2023'),
(23, 'test', 'COVER TUGAS MAKLAH AGAMA.docx', 'tes', '2024');

-- --------------------------------------------------------

--
-- Struktur dari tabel `postingan`
--

CREATE TABLE `postingan` (
  `id_postingan` int(10) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `postingan`
--

INSERT INTO `postingan` (`id_postingan`, `judul`, `isi`, `gambar`, `tanggal`) VALUES
(20, 'Musyawarah Desa Khusus Pengganti Penerima Bantuan Langsung Tunai Dana Desa tahun 2024 ', 'Musyawarah Desa Khusus Pengganti Penerima Bantuan Langsung Tunai Dana Desa tahun 2024 menjadi momen penting di Desa Bulila. Bertempat di Kantor Desa Bulila dan dihadiri oleh aparatur desa serta sebagian masyarakat sebagai penerima bantuan, acara ini tidak hanya menjadi wadah untuk mendiskusikan kebijakan dan program bantuan, tetapi juga sebagai bentuk partisipasi aktif masyarakat dalam pembangunan desa.\r\n\r\nMusyawarah ini menjadi contoh nyata bagaimana partisipasi masyarakat dalam proses pengambilan keputusan dapat menghasilkan langkah-langkah yang lebih efektif dan berdampak positif bagi pembangunan desa. Dengan demikian, bukan hanya penerima bantuan yang diuntungkan, tetapi juga keseluruhan masyarakat desa Bulila.\r\n\r\nInilah bukti nyata bahwa pembangunan yang berkelanjutan hanya dapat tercapai melalui keterlibatan aktif dan kolaborasi antara pemerintah desa dan masyarakat. Semoga hasil musyawarah ini menjadi langkah awal yang menginspirasi untuk membangun desa yang lebih', 'uploads/dokumentasi rapat musyawarah.jpg', '2024-03-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rapat`
--

CREATE TABLE `rapat` (
  `id_rapat` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `topik` varchar(100) NOT NULL,
  `hasil_rapat` int(11) NOT NULL,
  `waktu` time NOT NULL DEFAULT current_timestamp(),
  `status` enum('Selesai','Belum Selesai') NOT NULL,
  `nomor_rapat` varchar(50) NOT NULL,
  `tempat_rapat` varchar(255) NOT NULL,
  `lampiran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rapat`
--

INSERT INTO `rapat` (`id_rapat`, `nama`, `tanggal`, `topik`, `hasil_rapat`, `waktu`, `status`, `nomor_rapat`, `tempat_rapat`, `lampiran`) VALUES
(5, 'contoh nama rapat', '2024-01-09', 'contoh topik rapat', 0, '11:04:00', 'Belum Selesai', '12345', 'desa bulila', 'contoh lampiran');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `bagan`
--
ALTER TABLE `bagan`
  ADD PRIMARY KEY (`id_bagan`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indeks untuk tabel `peraturan_desa`
--
ALTER TABLE `peraturan_desa`
  ADD PRIMARY KEY (`id_peraturan`);

--
-- Indeks untuk tabel `postingan`
--
ALTER TABLE `postingan`
  ADD PRIMARY KEY (`id_postingan`);

--
-- Indeks untuk tabel `rapat`
--
ALTER TABLE `rapat`
  ADD PRIMARY KEY (`id_rapat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `bagan`
--
ALTER TABLE `bagan`
  MODIFY `id_bagan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `peraturan_desa`
--
ALTER TABLE `peraturan_desa`
  MODIFY `id_peraturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `postingan`
--
ALTER TABLE `postingan`
  MODIFY `id_postingan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `rapat`
--
ALTER TABLE `rapat`
  MODIFY `id_rapat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
