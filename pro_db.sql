-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Mar 2021 pada 08.40
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pro_db`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `changeStatus` (IN `id_p` INT(11) UNSIGNED, IN `newStatus` VARCHAR(20) CHARSET utf8)  MODIFIES SQL DATA
BEGIN
     UPDATE pengaduan SET status = newStatus
     WHERE id = id_p;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `HapusAduan` (IN `ADN` INT)  MODIFIES SQL DATA
BEGIN
        DELETE FROM tanggapan WHERE id_pengaduan = ADN;
        DELETE FROM pengaduan WHERE id = ADN;
END$$

--
-- Fungsi
--
CREATE DEFINER=`root`@`localhost` FUNCTION `LaporanStatus` (`stats` VARCHAR(10) CHARSET utf8) RETURNS INT(11) NO SQL
    DETERMINISTIC
BEGIN
                DECLARE amount int;
                SELECT COUNT(*) AS statusLap INTO amount FROM pengaduan WHERE status = stats;
                RETURN amount;
            END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `aksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tabel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_lama1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_lama2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_baru1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_baru2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `logs`
--

INSERT INTO `logs` (`id`, `aksi`, `tabel`, `data_lama1`, `data_lama2`, `data_baru1`, `data_baru2`, `user`, `waktu`) VALUES
(1, 'INSERT', 'petugas', NULL, NULL, 'Erwin Rommel', NULL, 'admin', '2021-03-22 21:56:50'),
(2, 'INSERT', 'petugas', NULL, NULL, 'Fritz Christen', NULL, 'admin', '2021-03-22 21:56:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakat`
--

CREATE TABLE `masyarakat` (
  `nik` char(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `nama`, `email`, `password`, `telp`, `deleted_at`, `created_at`, `updated_at`) VALUES
('3271046504930002', 'Michael Witmann', 'michael@gmail.com', '$2y$10$gSqk3P3dFsmU5TM7NCy9puB.W0DLxTCVIExkTPMrVsgcukqYWZL5W', '+491635557102', NULL, NULL, NULL),
('3271046504930003', 'Hina Adachi', 'hina@gmail.com', '$2y$10$zBp2hiWlSUShtIigsDfUQeR/9xj4ZK8507YYe0csm5lEVczZifxhK', '+491635557152', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(69, '2014_10_12_000000_create_users_table', 1),
(648, '2014_10_12_100000_create_password_resets_table', 2),
(649, '2019_08_19_000000_create_failed_jobs_table', 2),
(650, '2021_03_04_114700_create_petugas_table', 2),
(651, '2021_03_04_114812_create_masyarakat_table', 2),
(652, '2021_03_04_115950_create_pengaduan_table', 2),
(653, '2021_03_04_132025_create_tanggapan_table', 2),
(654, '2021_03_05_134252_create_users_table', 2),
(655, '2021_03_20_072941_create_logs_table', 2),
(656, '2021_03_20_104124_create_trigger', 2),
(657, '2021_03_21_014653_create_function', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_pengaduan` date NOT NULL,
  `nik` char(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` enum('Aduan','Aspirasi') COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_laporan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Belum di tanggapi','Proses','Ditolak','Selesai') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id`, `tanggal_pengaduan`, `nik`, `kategori`, `isi_laporan`, `foto`, `status`, `created_at`, `updated_at`) VALUES
(1, '2021-03-22', '3271046504930002', 'Aduan', 'tes', NULL, 'Selesai', '2021-03-22 14:56:58', NULL),
(2, '2021-03-22', '3271046504930003', 'Aspirasi', 'test', NULL, 'Selesai', '2021-03-22 14:56:58', NULL);

--
-- Trigger `pengaduan`
--
DELIMITER $$
CREATE TRIGGER `DeletePengaduan` AFTER DELETE ON `pengaduan` FOR EACH ROW BEGIN
            INSERT INTO logs (aksi, tabel, data_lama1, data_lama2, user, waktu)
            VALUES ("Delete", "pengaduan", old.nik, old.kategori, "admin", now());
        END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_petugas` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` enum('admin','petugas') COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id`, `nama_petugas`, `email`, `password`, `telp`, `foto`, `level`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Erwin Rommel', 'desertfox@gmail.com', '$2y$10$ycSjmbyrA/sR5w8ZNVRo.eDrNEKqKbJ6o7gMXLWRc/T5Tr99XH.xK', '+491635557102', NULL, 'admin', NULL, NULL, NULL),
(2, 'Fritz Christen', 'fritz@gmail.com', '$2y$10$Ad/WqARshHgW1BGWFHjpXuzl13C0SB14ORMDFmsL9vOygq3sraHUG', '+491555555339', NULL, 'petugas', NULL, NULL, NULL);

--
-- Trigger `petugas`
--
DELIMITER $$
CREATE TRIGGER `InsertPetugas` AFTER INSERT ON `petugas` FOR EACH ROW BEGIN
        INSERT INTO logs (aksi, tabel, data_baru1, user, waktu) VALUES ("INSERT", "petugas", new.nama_petugas,"admin", now());
        END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `UpdatePetugas` AFTER UPDATE ON `petugas` FOR EACH ROW BEGIN
            INSERT INTO logs (aksi, tabel, data_lama1, data_lama2, data_baru1, data_baru2, user, waktu)
            VALUES ("Update", "petugas", old.nama_petugas, old.telp, new.nama_petugas, new.telp, "admin", now());
        END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pengaduan` bigint(20) UNSIGNED NOT NULL,
  `id_petugas` int(10) UNSIGNED NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tanggapan`
--

INSERT INTO `tanggapan` (`id`, `id_pengaduan`, `id_petugas`, `tgl_tanggapan`, `tanggapan`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2021-03-23', 'test', '2021-03-22 23:52:37', NULL),
(5, 2, 2, '2021-03-23', 'atefdasd', '2021-03-22 18:38:04', '2021-03-22 19:40:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nik` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_petugas` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','petugas','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nik`, `id_petugas`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'Erwin Rommel', 'desertfox@gmail.com', NULL, '$2y$10$3eYLAW2BTEgsK9N.t1txBusF.s2O2nlEM99sEtkSHmzQg271y66ry', 'admin', NULL, NULL, NULL),
(2, '3271046504930002', NULL, 'Michael Witmann', 'michael@gmail.com', NULL, '$2y$10$EmNHF0PHRF/lHTUWdMx5.OZpm2DDnDdoOw1jNeqT4bu8a5BoNDu3y', 'user', NULL, NULL, NULL),
(3, '3271046504930003', NULL, 'Hina Adachi', 'hina@gmail.com', NULL, '$2y$10$ilMmY.MJefcHT2lt6tEfvOA1frSP/k0Kkhj5nuI27W0stTFw5v7S.', 'user', NULL, NULL, NULL),
(4, NULL, 2, 'Fritz Christen', 'fritz@gmail.com', NULL, '$2y$10$layxm5OrnG5UvPs1t4ixYOSzbKate0Y795TBYdv1hofkcpDMbhtHe', 'petugas', NULL, NULL, NULL);

--
-- Trigger `users`
--
DELIMITER $$
CREATE TRIGGER `DeletePetugas` AFTER DELETE ON `users` FOR EACH ROW BEGIN
            INSERT INTO logs (aksi, tabel, data_lama1, user, waktu)
            VALUES ("Delete", "petugas", old.id_petugas, "admin", now());
        END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `DeleteUser` AFTER DELETE ON `users` FOR EACH ROW BEGIN
            INSERT INTO logs (aksi, tabel, data_lama1, user, waktu)
            VALUES ("Delete", "masyarakat", old.nik, "admin", now());
        END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_pengaduan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_pengaduan` (
`id` bigint(20) unsigned
,`tanggal_pengaduan` date
,`nik` char(16)
,`kategori` enum('Aduan','Aspirasi')
,`isi_laporan` text
,`foto` varchar(255)
,`status` enum('Belum di tanggapi','Proses','Ditolak','Selesai')
,`created_at` timestamp
,`updated_at` timestamp
,`tgl_tanggapan` date
,`tanggapan` text
,`nama_petugas` varchar(35)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_pengaduan`
--
DROP TABLE IF EXISTS `v_pengaduan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pengaduan`  AS SELECT `p`.`id` AS `id`, `p`.`tanggal_pengaduan` AS `tanggal_pengaduan`, `p`.`nik` AS `nik`, `p`.`kategori` AS `kategori`, `p`.`isi_laporan` AS `isi_laporan`, `p`.`foto` AS `foto`, `p`.`status` AS `status`, `p`.`created_at` AS `created_at`, `p`.`updated_at` AS `updated_at`, `t`.`tgl_tanggapan` AS `tgl_tanggapan`, `t`.`tanggapan` AS `tanggapan`, `o`.`nama_petugas` AS `nama_petugas` FROM ((`pengaduan` `p` left join `tanggapan` `t` on(`p`.`id` = `t`.`id_pengaduan`)) left join `petugas` `o` on(`t`.`id_petugas` = `o`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengaduan_nik_foreign` (`nik`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tanggapan_id_pengaduan_foreign` (`id_pengaduan`),
  ADD KEY `tanggapan_id_petugas_foreign` (`id_petugas`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_nik_foreign` (`nik`),
  ADD KEY `users_id_petugas_foreign` (`id_petugas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=658;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_nik_foreign` FOREIGN KEY (`nik`) REFERENCES `masyarakat` (`nik`);

--
-- Ketidakleluasaan untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD CONSTRAINT `tanggapan_id_pengaduan_foreign` FOREIGN KEY (`id_pengaduan`) REFERENCES `pengaduan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tanggapan_id_petugas_foreign` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_petugas_foreign` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id`),
  ADD CONSTRAINT `users_nik_foreign` FOREIGN KEY (`nik`) REFERENCES `masyarakat` (`nik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
