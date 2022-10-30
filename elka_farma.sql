-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2022 at 03:35 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elka_farma`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin 1', 'joyravelo@gmail.com', '2022-04-22 01:20:28', '$2y$10$RVcEnWA.d/P3oKmPq0Rq8uTNpP.ycMW1gC3NW2LkE7s1cb7H1CtFW', '93Rl4bRAQEU6O3FxfiQwHgB8Uu4w8AFiqzNLQ1MmSPG3gifIeNzfRjjrX8ap', '2022-04-22 01:20:29', '2022-04-22 01:20:29'),
(2, 'Super Admin 2', 'elka123@gmail.com', '2022-04-22 01:20:29', '$2y$10$18irQRfbA8DcDqDE2UjtSOkaReQgLadOJ4Wsq0qLs2bHv2gvqZMsm', '', '2022-10-09 20:08:30', '2022-10-09 20:08:30');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `sisa` int(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `harga` int(255) NOT NULL,
  `deskripsi` varchar(5000) NOT NULL,
  `minimal` int(255) NOT NULL,
  `maksimal` int(255) NOT NULL,
  `kadaluarsa` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `tanggal_tambah` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `tanggal_edit` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `sisa`, `kategori`, `harga`, `deskripsi`, `minimal`, `maksimal`, `kadaluarsa`, `image`, `slug`, `tanggal_tambah`, `tanggal_edit`) VALUES
(1, 'Paramex Obat Sakit Kepala', 41, 'Obat Kepala', 5000, '<p><strong>PARAMEX </strong></p><p><em>merupakan obat dengan kandungan Paracetamol, Propyphenazone, Caffeine, Dexchlorpheniramine maleate. Obat ini dapat digunakan untuk meringankan sakit kepala dan sakit gigi.</em></p><p><span style=\"font-family:Trebuchet MS,Helvetica,sans-serif;\">Berisi 4 tablet dalam 1 strip.</span></p><p><u><span style=\"font-size:16px;\">Indikasi Umum :</span></u></p><p>Meringankan sakit kepala dan sakit gigi.</p><p>INFORMASI PRODUK LEBIH LANJUTy</p><p><br />Komposisi</p><p>Paracetamol 250 mg, Propyphenazone 150 mg, Caffeine 50 mg, Dexchlorpheniramine maleate 1 mg</p><p>Dosis</p><p>Dewasa dan anak-anak diatas 12 tahun : 2-3 kali sehari 1 tablet.</p><p>Aturan Pakai</p><p>Sesudah makan</p><p>Perhatian</p><p>Hati-hati penggunaan pada penderita porphyria akut karena dapat menimbulkan porphyrinogenic Bila setelah 5 hari nyeri tidak hilang, segera hubungi dokter Obat ini dapat menyebabkan kantuk Penggunaan pada penderita yang mengkonsumsi alkohol dapat meningkatkan resiko kerusakan hati.</p>', 10, 50, '2022-10-23', 'paramex.jpg', 'paramex-obat-sakit-kepala', '2022-10-30 15:21:41', '2022-10-30 16:13:51'),
(2, 'Bodrexs', 54, 'Obat Nyeri', 8500, '<p>Obat sakit kepala yang dipercaya sejak 1970 sebagai Ahlinya Redakan Sakit Kepala. Dengan 5 OK-nya bodrex redakan sakit kepala, nyeri dan demam, formula yang dipercaya, dapat diminum sebelum makan, tanpa ngantuk, dipercaya sejak 1971.</p>', 16, 191, '2022-10-24', 'bodrex.png', 'bodrexs', '2022-10-30 15:21:41', '2022-10-30 16:14:06'),
(4, 'Minyak Kayu Putih', 81, 'Obat Perut', 12000, '<p>Minyak ini meredakan masuk angin</p>', 10, 100, '2022-11-05', 'kayu-putih.jpg', 'minyak-kayu-putih', '2022-10-30 15:21:41', '2022-10-30 16:15:45'),
(5, 'Kalpanax Krim 5 g', 20, 'Obat Kulit', 19000, '<p><span style=\"font-size:20px;\"><u><strong>Deskripsi</strong></u></span><button _ngcontent-halodoc-c137=\"\" type=\"button\"></button></p><p>KALPANAX K CREAM mengandung Miconazole yang merupakan obat anti jamur golongan imidazole, digunakan untuk mengobati penyakit kulit akibat infeksi jamur. Kerjanya yang sangat cepat, dingin di kulit, tidak membuat kulit terkelupas, aman digunakan pada daerah sensitif. Sangat aman digunakan untuk anak-anak, aroma bunga jasmine, dan tidak lengket di kulit.</p><p><span style=\"font-size:20px;\"><u><strong>Indikasi Umum</strong></u></span></p><p>Pitiriasis versikolor, dermatofitosis, dan mikosis kulit lain</p><p><u><strong><span style=\"font-size:20px;\">Komposisi</span></strong></u></p><p>Miconazole nitrate 2%</p><p><span style=\"font-size:20px;\"><u><strong>Dosis</strong></u></span></p><p>Oleskan 2 atau 3 kali sehari</p><p><span style=\"font-size:20px;\"><u><strong>Aturan Pakai</strong></u></span></p><p>oleskan pada kulit setiap selesai mandi dan sebelum tidur malam.</p><p><span style=\"font-size:20px;\"><u><strong>Perhatian</strong></u></span></p><p>Untuk pemakaian luar, Bila terjadi reaksi hipersensitivitas atau iritasi, obat harus dihentikan, Tidak boleh kontak dengan mukosa mata, Penggunaan topikal belum pernah dilaporkan diabsorbsi sistemik, namun hati-hati penggunaan pada wanita hamil.</p><p><span style=\"font-size:20px;\"><u><strong>Kontra Indikasi</strong></u></span></p><p>Penderita yang alergi terhadap Mikonazol atau bahan lainnya dalam krim Kalpanax K</p><p><span style=\"font-size:20px;\"><u><strong>Efek Samping</strong></u></span></p><p>reaksi alergi, reaksi hipersensitivitas</p><p><u><span style=\"font-size:20px;\"><strong>Segmentasi</strong></span></u></p><p>Obat Bebas Terbatas (Biru)</p><p>&nbsp;</p>', 10, 50, '2023-02-01', '353351_25-6-2021_13-26-48-1665779649.webp', 'kalpanax-krim-5-g', '2022-10-30 15:38:14', '2022-10-30 16:14:43'),
(6, 'Salep Hydrocortisone Cream 1 % 5 g', 30, 'Obat Kulit', 9000, '<p><u><strong>Deskripsi</strong></u></p><p>HYDROCORTISON CREAM adalah obat adrenokortikal steroid yang memiliki sifat anti-inflamasi, anti alergi dan anti pruritus pada jaringan kulit. Hydrocortison di gunakan untuk mengobati eksim, inflamasi, kemerahan,serta gatal-gatal pada kulit, beberapa jenis infeksi kulit yang dapat diobati contohnya dermatitis alergi, dermatitis kontak, dermatitis atopi, pruritus anogenital, neurodermatitis. Dalam penggunaan obat ini HARUS SESUAI DENGAN PETUNJUK DOKTER.</p><p><u><strong>Indikasi Umum</strong></u><br />INFORMASI OBAT INI HANYA UNTUK KALANGAN MEDIS. Dermatitis atopik dan kontak</p><p><u><strong>Komposisi</strong></u><br />Hydrocortisone acetate 1 %</p><p><br /><u><strong>Dosis</strong></u><br />PENGGUNAAN OBAT INI HARUS SESUAI DENGAN PETUNJUK DOKTER. Oleskan pada kulit yang bermasalah 1-2 kali per hari.</p><p><u><strong>Aturan Pakai</strong></u><br />oleskan tipis pada bagian yang membutuhkan</p><p><u><strong>Perhatian</strong></u></p><p>HARUS DENGAN RESEP DOKTER. Gunakan hati-hati pada pasien dengan diabetes, penyakit kardiovaskular, gangguan hati, infark miokard, miastenia gravis, osteoporosis, penyakit mata, gangguan ginjal, atau penyakit tiroid. Infeksi kulit. Hindari penggunaan jangka panjang. Hindari penggunaan pada mata, membran mukosa, kulit yang sensitif atau luka terbuka</p><p><br /><u><strong>Kontra Indikasi</strong></u><br />Hipersensitif, pengobatan dermatitis, penggunaan mata, infeksi mendasar</p><p><u><strong>Efek Samping</strong></u></p><p>Pemakaian obat umumnya memiliki efek samping tertentu dan sesuai dengan masing-masing individu. Jika terjadi efek samping yang berlebih dan berbahaya, harap konsultasikan kepada tenaga medis. Efek samping yang mungkin terjadi dalam penggunaan obat adalah: atrofi kulit, lesi, dermatitis perioral, folikulitis, gatal, perubahan pigmentasi, penekanan HPA (dengan potensi lebih tinggi yang digunakan &gt;2 minggu).</p><p><u><strong>Segmentasi</strong></u><br />Obat Keras (Merah)<br />&nbsp;</p>', 5, 100, '2025-02-17', 'salep.jpeg', 'salep-hydrocortisone-cream-1-5-g', '2022-10-30 20:07:04', '2022-10-30 20:07:04');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `gambar`, `slug`) VALUES
(4, 'Obat Kepala', 'head.png', 'obat-kepala'),
(5, 'Obat Nyeri', 'nyeri.png', 'obat-nyeri'),
(6, 'Obat Kulit', 'kulit.png', 'obat-kulit'),
(7, 'Obat Perut', 'perut.png', 'obat-perut');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2022_04_22_051719_create_admins_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('sinaga@gmail.com', '$2y$10$YMo04uHbZy2zeEa1KyYPL.A5qJ3kHYENxaUsHzAtcVtftpaPlfVwy', '2022-05-07 14:11:22');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
