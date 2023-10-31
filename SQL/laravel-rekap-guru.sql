-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table laravel-rekap-guru.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-rekap-guru.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table laravel-rekap-guru.gurus
CREATE TABLE IF NOT EXISTS `gurus` (
  `guru_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `mapel_id` bigint(20) unsigned NOT NULL,
  `sekolah_id` bigint(20) unsigned NOT NULL,
  `user_jab_id` int(10) unsigned NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Aktif','Non Aktif') COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telpon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`guru_id`),
  KEY `gurus_mapel_id_foreign` (`mapel_id`),
  KEY `gurus_user_jab_id_foreign` (`user_jab_id`),
  KEY `gurus_sekolah_id_foreign` (`sekolah_id`),
  CONSTRAINT `gurus_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapels` (`mapel_id`) ON DELETE CASCADE,
  CONSTRAINT `gurus_sekolah_id_foreign` FOREIGN KEY (`sekolah_id`) REFERENCES `sekolahs` (`sekolah_id`) ON DELETE CASCADE,
  CONSTRAINT `gurus_user_jab_id_foreign` FOREIGN KEY (`user_jab_id`) REFERENCES `jabatans` (`jab_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-rekap-guru.gurus: ~10 rows (approximately)
/*!40000 ALTER TABLE `gurus` DISABLE KEYS */;
INSERT INTO `gurus` (`guru_id`, `mapel_id`, `sekolah_id`, `user_jab_id`, `nama`, `email`, `nip`, `alamat`, `status`, `no_telpon`, `jenis_kelamin`, `created_at`, `updated_at`) VALUES
	(1, 6, 10, 2, 'Kelley Abshire', 'orn.oran@example.com', '6888078073', 'Gg. Pasir Koja No. 94, Tanjung Pinang 98916, Sumut', 'Aktif', '954.864.4597', 'Laki-laki', '2023-10-03 03:09:03', '2023-10-03 03:09:03');
INSERT INTO `gurus` (`guru_id`, `mapel_id`, `sekolah_id`, `user_jab_id`, `nama`, `email`, `nip`, `alamat`, `status`, `no_telpon`, `jenis_kelamin`, `created_at`, `updated_at`) VALUES
	(2, 1, 1, 2, 'Dr. Jovany Brown Jr.', 'pgulgowski@example.net', '1120709483', 'Jr. Kalimantan No. 599, Kediri 31255, DKI', 'Aktif', '(936) 998-7163', 'Perempuan', '2023-10-03 03:09:03', '2023-10-03 03:09:03');
INSERT INTO `gurus` (`guru_id`, `mapel_id`, `sekolah_id`, `user_jab_id`, `nama`, `email`, `nip`, `alamat`, `status`, `no_telpon`, `jenis_kelamin`, `created_at`, `updated_at`) VALUES
	(3, 7, 2, 2, 'Margaret Fahey', 'greenholt.archibald@example.com', '7966670309', 'Jln. Abdul Rahmat No. 373, Pekanbaru 51386, Riau', 'Non Aktif', '+1.925.531.7642', 'Perempuan', '2023-10-03 03:09:03', '2023-10-03 03:09:03');
INSERT INTO `gurus` (`guru_id`, `mapel_id`, `sekolah_id`, `user_jab_id`, `nama`, `email`, `nip`, `alamat`, `status`, `no_telpon`, `jenis_kelamin`, `created_at`, `updated_at`) VALUES
	(4, 10, 1, 2, 'Gladyce Kirlin', 'lindgren.jayde@example.com', '9586555928', 'Kpg. Fajar No. 988, Mataram 46536, Jateng', 'Non Aktif', '1-520-374-7466', 'Perempuan', '2023-10-03 03:09:03', '2023-10-03 03:09:03');
INSERT INTO `gurus` (`guru_id`, `mapel_id`, `sekolah_id`, `user_jab_id`, `nama`, `email`, `nip`, `alamat`, `status`, `no_telpon`, `jenis_kelamin`, `created_at`, `updated_at`) VALUES
	(5, 6, 6, 2, 'Brigitte Bergnaum', 'laverna.larkin@example.org', '5345985295', 'Ds. Gremet No. 442, Jayapura 16945, Sulsel', 'Non Aktif', '+13148701131', 'Perempuan', '2023-10-03 03:09:03', '2023-10-03 03:09:03');
INSERT INTO `gurus` (`guru_id`, `mapel_id`, `sekolah_id`, `user_jab_id`, `nama`, `email`, `nip`, `alamat`, `status`, `no_telpon`, `jenis_kelamin`, `created_at`, `updated_at`) VALUES
	(6, 4, 1, 2, 'Dr. Stefan Bode Jr.', 'sgreen@example.net', '7739710846', 'Ds. Labu No. 478, Pekalongan 41598, Aceh', 'Non Aktif', '(703) 740-6652', 'Perempuan', '2023-10-03 03:09:03', '2023-10-03 03:09:03');
INSERT INTO `gurus` (`guru_id`, `mapel_id`, `sekolah_id`, `user_jab_id`, `nama`, `email`, `nip`, `alamat`, `status`, `no_telpon`, `jenis_kelamin`, `created_at`, `updated_at`) VALUES
	(7, 9, 2, 2, 'Caitlyn Beahan', 'smarvin@example.com', '2443339613', 'Psr. Surapati No. 492, Madiun 76508, Kaltim', 'Non Aktif', '1-947-836-0525', 'Laki-laki', '2023-10-03 03:09:03', '2023-10-03 03:09:03');
INSERT INTO `gurus` (`guru_id`, `mapel_id`, `sekolah_id`, `user_jab_id`, `nama`, `email`, `nip`, `alamat`, `status`, `no_telpon`, `jenis_kelamin`, `created_at`, `updated_at`) VALUES
	(8, 1, 8, 2, 'Samanta Hagenes', 'prosacco.bobbie@example.net', '9963174816', 'Kpg. B.Agam 1 No. 192, Denpasar 96342, Maluku', 'Non Aktif', '+15207022331', 'Laki-laki', '2023-10-03 03:09:03', '2023-10-03 03:09:03');
INSERT INTO `gurus` (`guru_id`, `mapel_id`, `sekolah_id`, `user_jab_id`, `nama`, `email`, `nip`, `alamat`, `status`, `no_telpon`, `jenis_kelamin`, `created_at`, `updated_at`) VALUES
	(9, 5, 5, 2, 'Prof. Jovani Botsford', 'emmerich.garth@example.net', '8509508173', 'Gg. Casablanca No. 840, Ternate 37452, Papua', 'Non Aktif', '(954) 713-7443', 'Perempuan', '2023-10-03 03:09:03', '2023-10-03 03:09:03');
INSERT INTO `gurus` (`guru_id`, `mapel_id`, `sekolah_id`, `user_jab_id`, `nama`, `email`, `nip`, `alamat`, `status`, `no_telpon`, `jenis_kelamin`, `created_at`, `updated_at`) VALUES
	(10, 6, 2, 2, 'Prof. Katrina Stoltenberg III', 'nicholas11@example.org', '1857431897', 'Ki. Warga No. 459, Singkawang 44419, Kalteng', 'Aktif', '201-910-4455', 'Laki-laki', '2023-10-03 03:09:03', '2023-10-03 03:09:03');
/*!40000 ALTER TABLE `gurus` ENABLE KEYS */;

-- Dumping structure for table laravel-rekap-guru.jabatans
CREATE TABLE IF NOT EXISTS `jabatans` (
  `jab_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `jab_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`jab_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-rekap-guru.jabatans: ~2 rows (approximately)
/*!40000 ALTER TABLE `jabatans` DISABLE KEYS */;
INSERT INTO `jabatans` (`jab_id`, `jab_nama`, `created_at`, `updated_at`) VALUES
	(1, 'admin', '2023-10-03 03:09:03', '2023-10-03 03:09:03');
INSERT INTO `jabatans` (`jab_id`, `jab_nama`, `created_at`, `updated_at`) VALUES
	(2, 'guru', '2023-10-03 03:09:03', '2023-10-03 03:09:03');
/*!40000 ALTER TABLE `jabatans` ENABLE KEYS */;

-- Dumping structure for table laravel-rekap-guru.mapels
CREATE TABLE IF NOT EXISTS `mapels` (
  `mapel_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_mapel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`mapel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-rekap-guru.mapels: ~10 rows (approximately)
/*!40000 ALTER TABLE `mapels` DISABLE KEYS */;
INSERT INTO `mapels` (`mapel_id`, `nama_mapel`, `created_at`, `updated_at`) VALUES
	(1, 'Bahasa Indonesia', '2023-10-03 03:09:03', '2023-10-03 03:09:03');
INSERT INTO `mapels` (`mapel_id`, `nama_mapel`, `created_at`, `updated_at`) VALUES
	(2, 'Biologi', '2023-10-03 03:09:03', '2023-10-03 03:09:03');
INSERT INTO `mapels` (`mapel_id`, `nama_mapel`, `created_at`, `updated_at`) VALUES
	(3, 'IPA', '2023-10-03 03:09:03', '2023-10-03 03:09:03');
INSERT INTO `mapels` (`mapel_id`, `nama_mapel`, `created_at`, `updated_at`) VALUES
	(4, 'Bahasa Inggris', '2023-10-03 03:09:03', '2023-10-03 03:09:03');
INSERT INTO `mapels` (`mapel_id`, `nama_mapel`, `created_at`, `updated_at`) VALUES
	(5, 'Matematika', '2023-10-03 03:09:03', '2023-10-03 03:09:03');
INSERT INTO `mapels` (`mapel_id`, `nama_mapel`, `created_at`, `updated_at`) VALUES
	(6, 'Kimia', '2023-10-03 03:09:03', '2023-10-03 03:09:03');
INSERT INTO `mapels` (`mapel_id`, `nama_mapel`, `created_at`, `updated_at`) VALUES
	(7, 'IPS', '2023-10-03 03:09:03', '2023-10-03 03:09:03');
INSERT INTO `mapels` (`mapel_id`, `nama_mapel`, `created_at`, `updated_at`) VALUES
	(8, 'Pancasila', '2023-10-03 03:09:03', '2023-10-03 03:09:03');
INSERT INTO `mapels` (`mapel_id`, `nama_mapel`, `created_at`, `updated_at`) VALUES
	(9, 'Fisika', '2023-10-03 03:09:03', '2023-10-03 03:09:03');
INSERT INTO `mapels` (`mapel_id`, `nama_mapel`, `created_at`, `updated_at`) VALUES
	(10, 'Sejarah', '2023-10-03 03:09:03', '2023-10-03 03:09:03');
/*!40000 ALTER TABLE `mapels` ENABLE KEYS */;

-- Dumping structure for table laravel-rekap-guru.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-rekap-guru.migrations: ~12 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(5, '2023_08_21_130959_create_jabatans_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(6, '2023_09_27_035857_add_field_to_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(7, '2023_10_02_140324_create_mapels_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(8, '2023_10_02_140709_create_sekolahs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(9, '2023_10_02_144742_create_gurus_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(10, '2023_10_02_145140_add_field_to_gurus_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(11, '2023_10_02_164908_create_penilaians_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(12, '2023_10_02_165007_add_field_to_penilaians_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table laravel-rekap-guru.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-rekap-guru.password_reset_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;

-- Dumping structure for table laravel-rekap-guru.penilaians
CREATE TABLE IF NOT EXISTS `penilaians` (
  `penilaian_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `guru_id` bigint(20) unsigned NOT NULL,
  `kekurangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelebihan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`penilaian_id`),
  KEY `penilaians_guru_id_foreign` (`guru_id`),
  CONSTRAINT `penilaians_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `gurus` (`guru_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-rekap-guru.penilaians: ~0 rows (approximately)
/*!40000 ALTER TABLE `penilaians` DISABLE KEYS */;
/*!40000 ALTER TABLE `penilaians` ENABLE KEYS */;

-- Dumping structure for table laravel-rekap-guru.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-rekap-guru.personal_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table laravel-rekap-guru.sekolahs
CREATE TABLE IF NOT EXISTS `sekolahs` (
  `sekolah_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`sekolah_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-rekap-guru.sekolahs: ~10 rows (approximately)
/*!40000 ALTER TABLE `sekolahs` DISABLE KEYS */;
INSERT INTO `sekolahs` (`sekolah_id`, `nama_sekolah`, `alamat`, `created_at`, `updated_at`) VALUES
	(1, 'SMP Negeri 1', 'Ds. Urip Sumoharjo No. 731, Administrasi Jakarta Barat 91719, Kalteng', '2023-10-03 03:09:03', '2023-10-03 03:09:03');
INSERT INTO `sekolahs` (`sekolah_id`, `nama_sekolah`, `alamat`, `created_at`, `updated_at`) VALUES
	(2, 'SMA Negeri 9', 'Gg. Abdul Muis No. 334, Medan 84651, Kalteng', '2023-10-03 03:09:03', '2023-10-03 03:09:03');
INSERT INTO `sekolahs` (`sekolah_id`, `nama_sekolah`, `alamat`, `created_at`, `updated_at`) VALUES
	(3, 'SMA Negeri 8', 'Ds. Labu No. 11, Makassar 65576, Aceh', '2023-10-03 03:09:03', '2023-10-03 03:09:03');
INSERT INTO `sekolahs` (`sekolah_id`, `nama_sekolah`, `alamat`, `created_at`, `updated_at`) VALUES
	(4, 'SMA Negeri 6', 'Psr. Ciwastra No. 520, Sungai Penuh 35071, DKI', '2023-10-03 03:09:03', '2023-10-03 03:09:03');
INSERT INTO `sekolahs` (`sekolah_id`, `nama_sekolah`, `alamat`, `created_at`, `updated_at`) VALUES
	(5, 'SMA Negeri 7', 'Psr. Juanda No. 66, Administrasi Jakarta Utara 31795, Maluku', '2023-10-03 03:09:03', '2023-10-03 03:09:03');
INSERT INTO `sekolahs` (`sekolah_id`, `nama_sekolah`, `alamat`, `created_at`, `updated_at`) VALUES
	(6, 'SMP Negeri 2', 'Gg. Achmad No. 700, Pematangsiantar 45493, Kalteng', '2023-10-03 03:09:03', '2023-10-03 03:09:03');
INSERT INTO `sekolahs` (`sekolah_id`, `nama_sekolah`, `alamat`, `created_at`, `updated_at`) VALUES
	(7, 'SMP Negeri 3', 'Gg. Gedebage Selatan No. 491, Surabaya 89975, Kalteng', '2023-10-03 03:09:03', '2023-10-03 03:09:03');
INSERT INTO `sekolahs` (`sekolah_id`, `nama_sekolah`, `alamat`, `created_at`, `updated_at`) VALUES
	(8, 'SMA Negeri 4', 'Psr. Bagis Utama No. 551, Mojokerto 37645, NTB', '2023-10-03 03:09:03', '2023-10-03 03:09:03');
INSERT INTO `sekolahs` (`sekolah_id`, `nama_sekolah`, `alamat`, `created_at`, `updated_at`) VALUES
	(9, 'SMA Negeri 10', 'Psr. Bara Tambar No. 2, Metro 62548, DIY', '2023-10-03 03:09:03', '2023-10-03 03:09:03');
INSERT INTO `sekolahs` (`sekolah_id`, `nama_sekolah`, `alamat`, `created_at`, `updated_at`) VALUES
	(10, 'SMA Negeri 5', 'Gg. Laksamana No. 197, Sungai Penuh 20216, Jabar', '2023-10-03 03:09:03', '2023-10-03 03:09:03');
/*!40000 ALTER TABLE `sekolahs` ENABLE KEYS */;

-- Dumping structure for table laravel-rekap-guru.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_jab_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_user_jab_id_foreign` (`user_jab_id`),
  CONSTRAINT `users_user_jab_id_foreign` FOREIGN KEY (`user_jab_id`) REFERENCES `jabatans` (`jab_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-rekap-guru.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`user_id`, `user_jab_id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Administrator', 'admin', 'admin@gmail.com', '2023-10-03 03:09:03', '$2y$10$sGHJo12c0LTjHl28x1I1t.ox00mIyY27nR0Ok0CvJN2ede4j/M0Tu', 'NquITPfaH1', '2023-10-03 03:09:03', '2023-10-03 03:09:03');
INSERT INTO `users` (`user_id`, `user_jab_id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(2, 2, 'Guru', 'guru', 'guru@gmail.com', '2023-10-03 03:09:03', '$2y$10$txihwtp1yYZRUjGTbynS3OzWQ7pRfkslU6d2PjXkwoGOA/E21c4Wi', 'C7XeMvkzP0F37ee33D3umYK9wWY3C9lfu081ZgsTU9eLEHOP9pXQHNZJ0mZ7', '2023-10-03 03:09:03', '2023-10-03 03:09:03');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
