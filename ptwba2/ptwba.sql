-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 28 Jun 2024 pada 05.15
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ptwba`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `agama`
--

CREATE TABLE `agama` (
  `id` int NOT NULL,
  `ket_agama` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `agama`
--

INSERT INTO `agama` (`id`, `ket_agama`) VALUES
(1, 'Islam'),
(2, 'Kristen Protestan'),
(3, 'Katolik'),
(4, 'Hindu'),
(5, 'Buddha'),
(6, 'Konghucu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gada`
--

CREATE TABLE `gada` (
  `id` int NOT NULL,
  `gada` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `keterangan_gd` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `gada`
--

INSERT INTO `gada` (`id`, `gada`, `keterangan_gd`) VALUES
(1, 'GP', 'Gada Pratama'),
(2, 'GM', 'Gada Madya'),
(3, 'GU', 'Gada Utama'),
(4, '0', 'Belum Gada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int NOT NULL,
  `jabatan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id`, `jabatan`) VALUES
(1, 'Chief Satpam'),
(2, 'Danru'),
(3, 'Satpam'),
(7, 'Pamsus'),
(9, 'Staf'),
(10, 'Produksi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kelamin`
--

CREATE TABLE `jenis_kelamin` (
  `id` int NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `keterangan_jk` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`id`, `jenis_kelamin`, `keterangan_jk`) VALUES
(1, 'L', 'Laki-laki'),
(2, 'P', 'Perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int NOT NULL,
  `nama_karyawan` varchar(128) NOT NULL,
  `ttl` varchar(128) DEFAULT NULL,
  `no_telp` varchar(14) DEFAULT NULL,
  `alamat` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `nama_ibu` varchar(128) DEFAULT NULL,
  `tinggi_badan` int DEFAULT NULL,
  `berat_badan` int DEFAULT NULL,
  `no_kk` varchar(25) NOT NULL,
  `no_ktp` varchar(25) NOT NULL,
  `id_agama` int DEFAULT NULL,
  `id_jenis_kelamin` int DEFAULT NULL,
  `id_pendidikan` int DEFAULT NULL,
  `id_kawin` int DEFAULT NULL,
  `id_gada` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama_karyawan`, `ttl`, `no_telp`, `alamat`, `email`, `nama_ibu`, `tinggi_badan`, `berat_badan`, `no_kk`, `no_ktp`, `id_agama`, `id_jenis_kelamin`, `id_pendidikan`, `id_kawin`, `id_gada`) VALUES
(2, 'Ahmad Albar', 'Surabaya, 1 Februari 1993', '083812345678', 'Jl. Merak No. 13 RT.017/RW.033', 'ahmadalbar@gmail.com', 'Siti Susanti', 168, 55, '3020100102920003', '3020100102930003', 1, 1, 3, 3, 1),
(3, 'Michael Alexander', 'Gresik, 7 Agustus 1999', '081234567890', 'RT.005/RW.013 Ds. Mulung Kec. Driyorejo Kab. Gresik', 'michael.alex@gmail.com', 'Michelle Christianti', 170, 60, '3020100708990003', '3020100102970003', 3, 1, 3, 1, 1),
(6, 'Abraham Hariyanto', 'Jakarta, 12 Desember 1992', '089087654321', 'Jl. Gatot Subroto No. 15', 'abe@gmail.com', 'Regina Bella', 180, 70, '12345', '67890', 3, 1, 6, 3, 1),
(7, 'Antonio Banderas', 'Sidoarjo, 15 Mei 1995', '081398765432', 'Jl. Diponegoro No.17 RT.001/RW.013', 'antonioband@gmail.com', 'Afriani Setyani', 168, 60, '040506', '010203', 2, 1, 3, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kawin`
--

CREATE TABLE `kawin` (
  `id` int NOT NULL,
  `status_kawin` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `keterangan_kw` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `kawin`
--

INSERT INTO `kawin` (`id`, `status_kawin`, `keterangan_kw`) VALUES
(1, 'L', 'Lajang'),
(2, 'K1', 'Kawin Anak 1'),
(3, 'K2', 'Kawin Anak 2'),
(4, 'K3', 'Kawin Anak 3'),
(5, 'CH1', 'Cerai Hidup Anak 1'),
(6, 'CH2', 'Cerai Hidup Anak 2'),
(7, 'CH3', 'Cerai Hidup Anak 3'),
(8, 'CM1', 'Cerai Mati Anak 1'),
(9, 'CM2', 'Cerai Mati Anak 2'),
(10, 'CM3', 'Cerai Mati Anak 3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int NOT NULL,
  `nama_lokasi` varchar(128) NOT NULL,
  `alamat_lokasi` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id`, `nama_lokasi`, `alamat_lokasi`) VALUES
(1, 'Praxis Apartment', 'Jl. Sono Kembang No.4-6, Embong Kaliasin, Kec. Genteng, Surabaya, Jawa Timur'),
(2, 'Gressmall', 'Jl. Sumatra No.1-5, RT.07/RW.08, Gn. Malang, Randuagung, Kec. Kebomas, Kabupaten Gresik, Jawa Timur'),
(3, 'JMI Batang', 'Mangunsari, Kedawung, Kec. Banyuputih, Kab.Batang, Jawa Tengah'),
(4, 'PT. Pelita Gunatama Persada', 'Jl. Buntaran No.148, Manukan Wetan, Kec. Tandes, Surabaya, Jawa Timur 60184'),
(5, 'Kantor Pusat WBA', 'Permata Sukodona Raya A1/08 Sukono - Sidoarjo'),
(6, 'Kantor WBA Cabang Bali', 'Jl. Sidakarya GG Taman Melati No. 1 Denpasar'),
(7, 'Kantor WBA Cabang Banyuwangi', 'Klatak Banyuwangi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id` int NOT NULL,
  `pendidikan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `pendidikan`) VALUES
(1, 'SD'),
(2, 'SMP'),
(3, 'SMA/SMK'),
(4, 'D1'),
(5, 'D2'),
(6, 'D3'),
(7, 'D4'),
(8, 'S1'),
(9, 'S2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penempatan`
--

CREATE TABLE `penempatan` (
  `id` int NOT NULL,
  `id_lokasi` int NOT NULL,
  `id_karyawan` int NOT NULL,
  `id_jabatan` int NOT NULL,
  `nik` varchar(25) NOT NULL,
  `tmt` varchar(25) NOT NULL,
  `status_penempatan` int DEFAULT '0',
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `penempatan`
--

INSERT INTO `penempatan` (`id`, `id_lokasi`, `id_karyawan`, `id_jabatan`, `nik`, `tmt`, `status_penempatan`, `tgl_mulai`, `tgl_selesai`) VALUES
(1, 1, 6, 1, '2506240001', '25.06.2024', 1, '2024-06-25', '2024-12-25'),
(2, 4, 5, 3, '123', '456', 1, '2024-06-28', '2024-12-28'),
(3, 5, 3, 2, '789', '101112', 1, '2024-06-27', '2024-12-27'),
(4, 2, 2, 3, '123', '28.06.2024', 1, '2024-06-28', '2024-12-28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int NOT NULL DEFAULT '3',
  `date_created` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `role_id`, `date_created`) VALUES
(1, 'Indraswari', 'indraswarigading@gmail.com', '$2y$10$2Ro820S9.SlE2eHTiPRsNuH..17f5C3ugGavk7sh/1TNQeCKmlUUS', 1, 1718612125),
(2, 'Gisa', 'gadinggisa@gmail.com', '$2y$10$mrigHuo9JL6AC6ZjBJTcsule.BKOS/vvCqe5TGdqXGJJzsRFGoL2u', 2, 1718622276),
(4, 'Amazine Fera', 'amazingfearless@gmail.com', '$2y$10$5GkyRxYyxu9VGkbUsddliuHLaPjXJ4nrWQya8MqEgPV.uYEP2ibua', 3, 1718759016);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int NOT NULL,
  `role_id` int NOT NULL,
  `menu_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 2, 1),
(9, 2, 2),
(10, 2, 3),
(11, 2, 4),
(12, 2, 5),
(13, 2, 6),
(14, 3, 1),
(15, 3, 2),
(16, 3, 3),
(17, 3, 4),
(18, 3, 5),
(19, 3, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int NOT NULL,
  `menu` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `url`, `icon`) VALUES
(1, 'Beranda', 'admin', 'fas fa-home'),
(2, 'Data Karyawan', 'karyawan', 'fas fa-users'),
(3, 'Data Jabatan', 'jabatan', 'fas fa-id-badge'),
(4, 'Data Lokasi', 'lokasi', 'fas fa-map-marker-alt'),
(5, 'Data Penempatan', 'penempatan', 'fas fa-building'),
(6, 'Ekspor Data', 'ekspordata', 'fas fa-file-export'),
(7, 'Kelola Admin', 'kelolaadmin', 'fas fa-users-cog');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Super Administrator'),
(2, 'Administrator'),
(3, 'Operator');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gada`
--
ALTER TABLE `gada`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kawin`
--
ALTER TABLE `kawin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penempatan`
--
ALTER TABLE `penempatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `agama`
--
ALTER TABLE `agama`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `gada`
--
ALTER TABLE `gada`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kawin`
--
ALTER TABLE `kawin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `penempatan`
--
ALTER TABLE `penempatan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
