-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 03, 2024 at 06:30 AM
-- Server version: 10.11.2-MariaDB-log
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `4people`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `nama`, `username`, `password`, `role`) VALUES
(1, 'Super Admin', 'superadmin123', '$2y$10$80FKgDHPrIrgAobMSZ.76.VmuqtqaiAeOeDunc0.J9bYVrHuaeSbe', 1),
(2, 'Karyawan', 'karyawan123', '$2y$10$P3r9e.g9u.muwxd4P924gOYz2oSoaKrJAe/MYWzz5j0pKsGAa96Tq', 2);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pembooking` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `tanggal_booking` date NOT NULL,
  `jam_booking` time NOT NULL,
  `id_service` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `pembooking`, `no_hp`, `tanggal_booking`, `jam_booking`, `id_service`, `created_at`, `updated_at`) VALUES
(2, 'Silvia Ranti', '08984287381', '2023-12-16', '10:00:00', 4, '2023-12-15 09:05:12', '2023-12-15 09:05:12'),
(3, 'Silvia Ranti', '120381023', '2024-01-03', '09:00:00', 2, '2024-01-02 11:47:23', '2024-01-02 11:47:23'),
(4, 'Silvia Ranti', '87578585757', '2024-01-03', '09:00:00', 2, '2024-01-02 11:48:16', '2024-01-02 11:48:16');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nama`, `deskripsi`) VALUES
(1, 'Newborn & Kids', 'Sambut kehadiran si kecil dengan kehangatan melalui paket fotografi Newborn & Kiddy kami. Kami memahami keindahan dan kepolosan momen-momen awal dalam kehidupan anak Anda, dan kami berkomitmen untuk mengabadikannya dengan penuh kasih sayang.'),
(2, 'Portrait & Graduation', 'Rasakan keindahan momen Anda dengan paket fotografi Portrait & Wisuda kami. Kami hadir untuk mengabadikan esensi kepribadian Anda dan kebahagiaan kelulusan dalam setiap bidikan kamera. Setiap foto adalah cerminan keunikan dan pencapaian Anda, diabadikan dengan keahlian dan kelembutan.'),
(3, 'Group & Couple', 'Rayakan momen istimewa Anda dengan paket fotografi Prewedding & Kelompok kami. Meresapi keajaiban cinta dan kebersamaan, yang terabadikan dengan sempurna oleh fotografer berbakat kami. Baik itu sesi pra-pernikahan yang romantis atau kumpul-kumpul tak terlupakan bersama teman dan keluarga, kami menjamin setiap momen diabadikan dengan sempurna.'),
(4, 'Family', 'Hari ini adalah tentang cinta, tawa, dan kenangan yang akan kita bawa bersama selamanya. Persembahkan keluarga Anda momen istimewa dalam paket foto keluarga kami yang dirancang khusus.'),
(5, 'Maternity', 'Antara keajaiban hidup dan harapan baru yang tumbuh dalam diri Anda, persembahkan momen kehamilan Anda dengan keindahan yang tak terlupakan. Paket foto maternity kami didesain khusus untuk merayakan kecantikan, kelembutan, dan kebahagiaan yang mengalir dalam setiap detik.');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hero`
--

CREATE TABLE `hero` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hero`
--

INSERT INTO `hero` (`id`, `judul`, `deskripsi`, `gambar`) VALUES
(1, 'Capturing Timeless Moments', 'Cherish the joy, love, and laughter of friends moments that last a lifetime.', 'vZiX1UvXCO_2023-12-29__MG_9989edit.jpg'),
(2, 'Family Bonds, Forever Strong', 'Discover the beauty of togetherness and the strength found in family connections.', '61mFIx4qed_2023-12-29__MG_8254edit.jpg'),
(3, 'Celebrating Family Love', 'Capture the warmth and joy that family brings into every frame, creating lasting memories.', '85uiPWjsDl_2023-12-29__MG_0894edit-60x40cm.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `latest_work`
--

CREATE TABLE `latest_work` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `latest_work`
--

INSERT INTO `latest_work` (`id`, `gambar`) VALUES
(1, 'works1.jpeg'),
(2, 'works2.jpeg'),
(3, 'works3.jpeg'),
(4, 'works4.jpeg'),
(5, 'works5.jpeg'),
(6, 'works6.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_08_19_000000_create_failed_jobs_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_12_04_152118_admin', 1),
(4, '2023_12_05_170935_hero', 1),
(5, '2023_12_11_040819_latest_work', 1),
(6, '2023_12_11_141104_categories', 1),
(7, '2023_12_11_151818_services', 1),
(8, '2023_12_13_085549_booking', 1),
(9, '2023_12_15_075019_pembayaran', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_booking` bigint(20) UNSIGNED NOT NULL,
  `id_service` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `external_id` varchar(255) NOT NULL,
  `harga` decimal(15,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'PENDING',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `id_booking`, `id_service`, `nama`, `external_id`, `harga`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 4, 'Silvia Ranti', 'booking_2_20231215', 2800000.00, 'PAID', '2023-12-15 09:05:20', '2023-12-15 19:36:12'),
(3, 3, 2, 'Silvia Ranti', 'booking_3_20240102', 950000.00, 'PENDING', '2024-01-02 11:47:26', '2024-01-02 11:47:26'),
(4, 4, 2, 'Silvia Ranti', 'booking_4_20240102', 950000.00, 'PENDING', '2024-01-02 11:48:17', '2024-01-02 11:48:17');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `category_id`, `nama`, `harga`, `deskripsi`) VALUES
(1, 1, 'Newborn', 998000, '<p>2 background</p><p>5 edited file</p><p>All files small size</p><p>11R Print+Frame</p><p>4R print (5 photo)</p>'),
(2, 1, 'Baby Kiddy Basic', 950000, '<p>2 Background</p><p>50 Times Photo</p><p>5 edited file</p><p>All Files</p><p>16R Print + Frame</p><p>10R Photo Print&nbsp;</p>'),
(3, 2, 'Potrait of You', 650000, '<p>2 Background</p><p>20 Times Photo</p><p>5 Edited</p><p>All Files</p><p>10R Print + Frame (2)</p>'),
(4, 2, 'Graduation', 650000, '<p>2 Background</p><p>20 Times Photoshoot</p><p>5 Edited</p><p>All Files</p><p>10R &amp; 11R Print + Frame</p>'),
(6, 3, 'Group Basic', 300000, '<p>( 3 - 10 Person )<br>Pelajar &amp; Mahasiswa</p><p>2 Background</p><p>2 Edited</p><p>All Files Photo</p><p>2 4R Photo Print/Person</p>'),
(7, 3, 'Couple', 750000, '<p>2 Background</p><p>20 Times Photo</p><p>5 Edited File</p><p>All Files</p><p>10R Print + frame (2)</p>'),
(8, 4, 'Family Basic', 997000, '<p>Max 10 person</p><p>2 Background</p><p>20 Times Photo</p><p>5 Edited File</p><p>All Files small size</p><p>16R Print + Frame&nbsp;</p><p>10R Print</p>'),
(9, 1, 'Baby Kiddy Premium', 1050000, '<p>3 Background</p><p>50 Times Photo</p><p>5 Edited File</p><p>All Files</p><p>16R Print + Frame&nbsp;</p><p>10R Photo Print (2)</p>'),
(10, 5, 'Maternity', 750000, '<p>2 Background</p><p>20 Times Photo</p><p>5 Edited</p><p>All Files</p><p>11R print + frame</p><p>10R print + frame</p>'),
(11, 2, 'Photo Profile', 200000, '<p>1 simple background</p><p>10 Times Photo</p><p>3 Edited</p><p>All Files</p>'),
(12, 4, 'Family Premium', 1650000, '<p>Max 10 Person</p><p>2 Background</p><p>20 Times Photo</p><p>5 Edited File&nbsp;</p><p>All Files small size</p><p>60 x 40 Print + Frame</p><p>11R Print + Frame</p>'),
(13, 3, 'Group Fave Adult', 400000, '<p>&nbsp;( 3 - 10 Person )<br></p><p>2 Background</p><p>2 Edited</p><p>All Files Photo</p><p>2 4R Photo Print/Person</p>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_id_service_foreign` (`id_service`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hero`
--
ALTER TABLE `hero`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `latest_work`
--
ALTER TABLE `latest_work`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayaran_id_booking_foreign` (`id_booking`),
  ADD KEY `pembayaran_id_service_foreign` (`id_service`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_category_id_foreign` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hero`
--
ALTER TABLE `hero`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `latest_work`
--
ALTER TABLE `latest_work`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_id_service_foreign` FOREIGN KEY (`id_service`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_id_booking_foreign` FOREIGN KEY (`id_booking`) REFERENCES `booking` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pembayaran_id_service_foreign` FOREIGN KEY (`id_service`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
