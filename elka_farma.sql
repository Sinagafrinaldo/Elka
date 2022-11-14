-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 04:32 AM
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
(1, 'Paramex Obat Sakit Kepala', 0, 'Obat Kepala', 5000, '<p><strong>PARAMEX </strong></p><p><em>merupakan obat dengan kandungan Paracetamol, Propyphenazone, Caffeine, Dexchlorpheniramine maleate. Obat ini dapat digunakan untuk meringankan sakit kepala dan sakit gigi.</em></p><p><span style=\"font-family:Trebuchet MS,Helvetica,sans-serif;\">Berisi 4 tablet dalam 1 strip.</span></p><p><u><span style=\"font-size:16px;\">Indikasi Umum :</span></u></p><p>Meringankan sakit kepala dan sakit gigi.</p><p>INFORMASI PRODUK LEBIH LANJUTy</p><p><br />Komposisi</p><p>Paracetamol 250 mg, Propyphenazone 150 mg, Caffeine 50 mg, Dexchlorpheniramine maleate 1 mg</p><p>Dosis</p><p>Dewasa dan anak-anak diatas 12 tahun : 2-3 kali sehari 1 tablet.</p><p>Aturan Pakai</p><p>Sesudah makan</p><p>Perhatian</p><p>Hati-hati penggunaan pada penderita porphyria akut karena dapat menimbulkan porphyrinogenic Bila setelah 5 hari nyeri tidak hilang, segera hubungi dokter Obat ini dapat menyebabkan kantuk Penggunaan pada penderita yang mengkonsumsi alkohol dapat meningkatkan resiko kerusakan hati.</p>', 10, 50, '2022-10-23', 'paramex.jpg', 'paramex-obat-sakit-kepala', '2022-10-30 15:21:41', '2022-10-30 16:13:51'),
(2, 'Bodrexs', 44, 'Obat Nyeri', 8500, '<p>Obat sakit kepala yang dipercaya sejak 1970 sebagai Ahlinya Redakan Sakit Kepala. Dengan 5 OK-nya bodrex redakan sakit kepala, nyeri dan demam, formula yang dipercaya, dapat diminum sebelum makan, tanpa ngantuk, dipercaya sejak 1971.</p>', 16, 191, '2022-10-24', 'bodrex.png', 'bodrexs', '2022-10-30 15:21:41', '2022-11-04 14:04:09'),
(4, 'Minyak Kayu Putih', 80, 'Obat Perut', 12000, '<p>Minyak ini meredakan masuk angin</p>', 10, 100, '2022-11-05', 'kayu-putih.jpg', 'minyak-kayu-putih', '2022-10-30 15:21:41', '2022-11-04 13:55:03'),
(5, 'Kalpanax Krim 5 g', 5, 'Obat Kulit', 19000, '<p><span style=\"font-size:20px;\"><u><strong>Deskripsi</strong></u></span><button _ngcontent-halodoc-c137=\"\" type=\"button\"></button></p><p>KALPANAX K CREAM mengandung Miconazole yang merupakan obat anti jamur golongan imidazole, digunakan untuk mengobati penyakit kulit akibat infeksi jamur. Kerjanya yang sangat cepat, dingin di kulit, tidak membuat kulit terkelupas, aman digunakan pada daerah sensitif. Sangat aman digunakan untuk anak-anak, aroma bunga jasmine, dan tidak lengket di kulit.</p><p><span style=\"font-size:20px;\"><u><strong>Indikasi Umum</strong></u></span></p><p>Pitiriasis versikolor, dermatofitosis, dan mikosis kulit lain</p><p><u><strong><span style=\"font-size:20px;\">Komposisi</span></strong></u></p><p>Miconazole nitrate 2%</p><p><span style=\"font-size:20px;\"><u><strong>Dosis</strong></u></span></p><p>Oleskan 2 atau 3 kali sehari</p><p><span style=\"font-size:20px;\"><u><strong>Aturan Pakai</strong></u></span></p><p>oleskan pada kulit setiap selesai mandi dan sebelum tidur malam.</p><p><span style=\"font-size:20px;\"><u><strong>Perhatian</strong></u></span></p><p>Untuk pemakaian luar, Bila terjadi reaksi hipersensitivitas atau iritasi, obat harus dihentikan, Tidak boleh kontak dengan mukosa mata, Penggunaan topikal belum pernah dilaporkan diabsorbsi sistemik, namun hati-hati penggunaan pada wanita hamil.</p><p><span style=\"font-size:20px;\"><u><strong>Kontra Indikasi</strong></u></span></p><p>Penderita yang alergi terhadap Mikonazol atau bahan lainnya dalam krim Kalpanax K</p><p><span style=\"font-size:20px;\"><u><strong>Efek Samping</strong></u></span></p><p>reaksi alergi, reaksi hipersensitivitas</p><p><u><span style=\"font-size:20px;\"><strong>Segmentasi</strong></span></u></p><p>Obat Bebas Terbatas (Biru)</p><p>&nbsp;</p>', 10, 50, '2023-12-01', '353351_25-6-2021_13-26-48-1665779649.webp', 'kalpanax-krim-5-g', '2022-10-30 15:38:14', '2022-10-30 16:14:43'),
(6, 'Salep Hydrocortisone Cream 1 % 5 g', 25, 'Obat Kulit', 9000, '<p><u><strong>Deskripsi</strong></u></p><p>HYDROCORTISON CREAM adalah obat adrenokortikal steroid yang memiliki sifat anti-inflamasi, anti alergi dan anti pruritus pada jaringan kulit. Hydrocortison di gunakan untuk mengobati eksim, inflamasi, kemerahan,serta gatal-gatal pada kulit, beberapa jenis infeksi kulit yang dapat diobati contohnya dermatitis alergi, dermatitis kontak, dermatitis atopi, pruritus anogenital, neurodermatitis. Dalam penggunaan obat ini HARUS SESUAI DENGAN PETUNJUK DOKTER.</p><p><u><strong>Indikasi Umum</strong></u><br />INFORMASI OBAT INI HANYA UNTUK KALANGAN MEDIS. Dermatitis atopik dan kontak</p><p><u><strong>Komposisi</strong></u><br />Hydrocortisone acetate 1 %</p><p><br /><u><strong>Dosis</strong></u><br />PENGGUNAAN OBAT INI HARUS SESUAI DENGAN PETUNJUK DOKTER. Oleskan pada kulit yang bermasalah 1-2 kali per hari.</p><p><u><strong>Aturan Pakai</strong></u><br />oleskan tipis pada bagian yang membutuhkan</p><p><u><strong>Perhatian</strong></u></p><p>HARUS DENGAN RESEP DOKTER. Gunakan hati-hati pada pasien dengan diabetes, penyakit kardiovaskular, gangguan hati, infark miokard, miastenia gravis, osteoporosis, penyakit mata, gangguan ginjal, atau penyakit tiroid. Infeksi kulit. Hindari penggunaan jangka panjang. Hindari penggunaan pada mata, membran mukosa, kulit yang sensitif atau luka terbuka</p><p><br /><u><strong>Kontra Indikasi</strong></u><br />Hipersensitif, pengobatan dermatitis, penggunaan mata, infeksi mendasar</p><p><u><strong>Efek Samping</strong></u></p><p>Pemakaian obat umumnya memiliki efek samping tertentu dan sesuai dengan masing-masing individu. Jika terjadi efek samping yang berlebih dan berbahaya, harap konsultasikan kepada tenaga medis. Efek samping yang mungkin terjadi dalam penggunaan obat adalah: atrofi kulit, lesi, dermatitis perioral, folikulitis, gatal, perubahan pigmentasi, penekanan HPA (dengan potensi lebih tinggi yang digunakan &gt;2 minggu).</p><p><u><strong>Segmentasi</strong></u><br />Obat Keras (Merah)<br />&nbsp;</p>', 5, 100, '2025-12-17', 'salep.jpeg', 'salep-hydrocortisone-cream-1-5-g', '2022-10-30 20:07:04', '2022-11-04 13:54:42'),
(7, 'Insto Reguler Eye Drops 15 ml', 50, 'Obat Mata', 15000, '<p>Deskripsi</p><p><button _ngcontent-halodoc-c137=\"\" type=\"button\"></button></p><p>INSTO REGULAR EYE DROP mengandung zat aktif Tetrahidrozolin HCl dan Benzalkonium Klorida, digunakan untuk mengatasi mata merah dan rasa perih akibat iritasi mata ringan yang dapat disebabkan karena asap, debu dan lainnya.</p><p>Indikasi Umum</p><p>Meredakan iritasi &amp; kemerahan pada mata</p><p>Komposisi</p><p>Tetrahydrozoline HCl 0.05% w/v, Benzalkonium Cl 0.01% w/v</p><p>Dosis</p><p>3-4 x sehari 2-3 tetes</p><p>Aturan Pakai</p><p>Diteteskan pada mata yang merah/teriritasi</p><p>Perhatian</p><p><button _ngcontent-halodoc-c137=\"\" type=\"button\"></button></p><p>Jangan dipakai sesudah dibuka 1 bulan. Tidak boleh diberikan pada penderita glaukoma. Jangan digunakan secara rutin atau jangka panjang. Ketika digunakan, lepaskan lensa kontak. Lensa kontak boleh digunakan minimal 15 menit setelah obat diteteskan.</p><p>Kontra Indikasi</p><p>hipersensitif penderita glaukoma</p><p>Efek Samping</p><p>Mata terasa pedih, rasa terbakar dan reaksi hiperemia pada pemakaian yang berlebihan</p><p>Segmentasi</p><p>Obat Bebas Terbatas (Biru)</p><p>Kemasan</p><p>Dus, Botol @ 15 ml</p><p>Manufaktur</p><p>Sterling</p><p>No. Registrasi</p><p>BPOM: DTL1438202046A1</p>', 10, 255, '2022-11-23', 'insto.jpeg', 'insto-reguler-eye-drops-15-ml', '2022-11-07 15:44:56', '2022-11-07 15:44:56'),
(8, 'Rohto Cool Eye Drop 7 ml', 55, 'Obat Mata', 13000, '<p>Deskripsi</p><p><button _ngcontent-halodoc-c137=\"\" type=\"button\"></button></p><p>ROHTO COOL EYE DROP 7 ML merupakan cairan tetes mata yang digunakan untuk membantu meredakan sementara mata merah akibat iritasi ringan yang disebabkan debu, asap, angin, sengatan sinar matahari,pemakaian lensa kontak, alergi atau berenang.</p><p>Indikasi Umum</p><p><button _ngcontent-halodoc-c137=\"\" type=\"button\"></button></p><p>Meredakan sementara mata merah akibat iritasi ringan yang disebabkan debu, asap,angin, sengatan sinar matahari, pemakaian lensa kontak, alergi atau berenang</p><p>Komposisi</p><p>Nafazolin HCI 0.012%</p><p>Dosis</p><p>3 - 4 kali per hari teteskan 1 atau 2 tetes pada masing -masing mata.</p><p>Aturan Pakai</p><p>Diberikan dengan di teteskan pada mata yang terkena iritasi</p><p>Perhatian</p><p><button _ngcontent-halodoc-c137=\"\" type=\"button\"></button></p><p>Setelah kemasan dibuka, obat hanya dapat digunakan sampai 1 bulan. Hipersensitif pada komponen obat ini, penderita glaukoma. Lepaskan lensa kontak saat digunakan. Jangan digunakan rutin jangka panjang. Lensa kontak boleh digunakan minimal 15 (lima belas) menit setelah obat diteteskan.</p><p>Kontra Indikasi</p><p>Hipersensitif pada komponen obat ini, penderita glaukoma.</p><p>Efek Samping</p><p>Reaksi alergi</p><p>Segmentasi</p><p>Obat Bebas Terbatas (Biru)</p><p>Kemasan</p><p>Dus, Botol @ 7ml</p><p>Manufaktur</p><p>Rohto Laboratories Indonesia</p><p>No. Registrasi</p><p>BPOM: DTL1140000346A1</p>', 10, 100, '2022-11-24', 'rohto.jpg', 'rohto-cool-eye-drop-7-ml', '2022-11-07 15:48:17', '2022-11-07 16:23:50'),
(9, 'Redoxon Triple Action 10 Tablet - Paling Hemat', 60, 'Vitamin', 39000, '<p>Deskripsi</p><p><button _ngcontent-halodoc-c137=\"\" type=\"button\"></button></p><p>REDOXON TRIPLE ACTION EFFERVESCENT merupakan suplemen makanan yang mengandung Vitamin C dilengkapi dengan Vitamin D dan Zinc yang berfungsi untuk membantu menjaga daya tahan tubuh. Vitamin C bermanfaat membantu sistem imunitas tubuh. Vitamin D membantu menjaga fungsi daya tahan tubuh tetap normal. Zinc membantu kinerja vitamin C, sehingga menjadi lebih efektif dalam menjaga daya tahan tubuh, dan Zinc merupakan zat yang tidak diproduksi tubuh. Jika asupan dari makanan tidak mencukupi kebutuhan harian, bila perlu, dapat diberikan suplementasi.</p><p>Indikasi Umum</p><p>Suplementasi Vitamin C, D dan Zinc untuk membantu memelihara daya tahan tubuh</p><p>Komposisi</p><p>Vitamin C 1000 mg, Vitamin D 400 IU, Zinc 10 mg</p><p>Dosis</p><p>Dewasa dan anak-anak di atas 12 tahun: 1 tablet effervescent per hari.</p><p>Aturan Pakai</p><p>Larutkan dalam segelas air dan tunggu sampai benar-nemar larut</p><p>Perhatian</p><p><button _ngcontent-halodoc-c137=\"\" type=\"button\"></button></p><p>*Jumlah Stock untuk Produk ini terbatas. Jika tidak tersedia (not available), dapat diorder kembali tanpa dikombinasikan dengan produk lain. &quot;Produk ini mengandung acesulfame K dan sukrosa. Jangan melebihi dosis yag direkomendasikan. Konsultasikan dengan dokter jika sedanga kondisi hamil dan atau menyusui. Produk ini tidak cocok untuk individu dengan hemokromatosis (kelebihan zat besi dalam tubuh) dan gangguan ginjal. Produk ini tidak boleh digunakan oleh bayi dibawah 1 tahun. Jauhkan dari jangkauan anak-anak. Tutuplah tube dengan rapat dan simpan di tempat kering, di bawah suhu 30 C.&quot;</p><p>Kontra Indikasi</p><p>Produk ini tidak cocok untuk individu dengan hemokromatosis (kelebihan zat besi dalam tubuh) dan gangguan ginjal.</p><p>Efek Samping</p><p><button _ngcontent-halodoc-c137=\"\" type=\"button\"></button></p><p>Pemakaian obat umumnya memiliki efek samping tertentu dan sesuai dengan masing-masing individu. Jika terjadi efek samping yang berlebih dan berbahaya, harap konsultasikan kepada tenaga medis.</p><p>Segmentasi</p><p>Vitamin &amp; Suplemen</p><p>Kemasan</p><p>Dus, Tube @ 10 Tablet Effervescent</p><p>Manufaktur</p><p>Bayer Indonesia</p><p>No. Registrasi</p><p>BPOM: SD171551591</p>', 10, 150, '2023-12-07', 'redoxonn.jpg', 'redoxon-triple-action-10-tablet-paling-hemat', '2022-11-07 15:53:15', '2022-11-07 15:53:15'),
(10, 'Sagestam 0.1% Cream 10 g', 30, 'Obat Kulit', 16000, '<p>Deskripsi</p><p><button _ngcontent-halodoc-c137=\"\" type=\"button\"></button></p><p>SAGESTAM 0.1% CREAM merupakan sediaan topikal berbentuk cream yang digunakan untuk mengobati penyakit kulit akibat infeksi oleh bakteri yang peka. Sagestam mengandung Gentamicin yang termasuk golongan antibiotik aminoglikosida yang digunakan secara luas terutama untuk mengobati infeksi-infeksi yang disebabkan oleh bakteri gram negatif, seperti Pseudomonas, Proteus, Serratia, dan Staphylococcus. Gentamicin juga digunakan untuk septikemia (keracunan darah oleh bakteri patogenik dan atau zat-zat yang dihasilkan oleh bakteri tersebut), meningitis (radang selaput otak), infeksi saluran kemih, saluran pernafasan, saluran pencernaan, infeksi pada kulit, tulang, dan jaringan lunak. Dalam penggunaan obat ini HARUS SESUAI DENGAN PETUNJUK DOKTER.</p><p>Indikasi Umum</p><p><button _ngcontent-halodoc-c137=\"\" type=\"button\"></button></p><p>INFORMASI OBAT INI HANYA UNTUK KALANGAN MEDIS. Infeksi kulit primer seperti folikulitis superfisial, furunkulosis, impetigo kontagiosa, pioderma gangrenosa. Infeksi kulit sekunder seperti dermatitis eksematus infeksiosa, akne pustular, psoriasis pustular, dermatitis seboroik terinfeksi, dermatitis kontak.</p><p>Komposisi</p><p>Gentamicin 0.1%</p><p>Dosis</p><p><button _ngcontent-halodoc-c137=\"\" type=\"button\"></button></p><p>PENGGUNAAN OBAT INI HARUS SESUAI DENGAN PETUNJUK DOKTER. Oleskan 3-4 kali sehari. Pada impetigo contagiosa, krusta harus dibuang sebelum Sagestam dioleskan.</p><p>Aturan Pakai</p><p>Oleskan pada bagian yang dibutuhkan secara merata</p><p>Perhatian</p><p><button _ngcontent-halodoc-c137=\"\" type=\"button\"></button></p><p>HARUS DENGAN RESEP DOKTER. Jika terjadi iritasi pengobatan harus segera dihentikan. Tidak dianjurkan penggunaan secara terus menerus karena dapat menyebabkan resistensi. Hindari kontak dengan mata. Hati-hati penggunaan pada wanita hamil dan menyusui.</p><p>Kontra Indikasi</p><p>Hipersensitif terhadap Gentamisin atau antibiotik aminoglikosida lainnya</p><p>Efek Samping</p><p>Iritasi kulit, fotosensitisasi</p><p>Segmentasi</p><p>Obat Keras (Merah)</p><p>Kemasan</p><p>Dus, Tube @ 10 G</p><p>Manufaktur</p><p>Sanbe Farma</p><p>No. Registrasi</p><p>BPOM: DKL9322213529A1</p>', 8, 100, '2023-12-07', 'sages.jpg', 'sagestam-01-cream-10-g', '2022-11-07 15:54:43', '2022-11-07 15:54:43'),
(11, 'Scabimite 5% Cream 30 g', 40, 'Obat Kulit', 72000, '<p>Deskripsi</p><p><button _ngcontent-halodoc-c137=\"\" type=\"button\"></button></p><p>SCABIMITE CREAM adalah obat topikal yang mengandung Permethrin yang digunakan untuk mengobati infeksi kulit skabies yang disebabkan oleh Tungau (mite) Sarcoptes scabiei. Permethrin merupakan obat golongan Pyrethrin yang bekerja dengan cara membunuh tungai beserta telurnya. SCABIMITE CREAM digunakan dengan cara mengoleskan cream keseluruh tubuh termasuk wajah, leher, kulit kepala dan telinga. Setelah 8-24 jam, obat dibilas dengan cara dicuci menggunakan sabun. Pengobatan dapat diulangi setelah 1 minggu. Dalam penggunaan obat ini HARUS SESUAI DENGAN PETUNJUK DOKTER.</p><p>Indikasi Umum</p><p>INFORMASI OBAT INI HANYA UNTUK KALANGAN MEDIS. Scabies</p><p>Komposisi</p><p>Permethrin 5%</p><p>Dosis</p><p><button _ngcontent-halodoc-c137=\"\" type=\"button\"></button></p><p>PENGGUNAAN OBAT INI HARUS SESUAI DENGAN PETUNJUK DOKTER. Sekali pemakaian pada malam hari. Oleskan secara merata pada seluruh permukaan kulit dari kepala sampai ke jari-jari kaki, terutama daerah belakang telinga, lipatan bokong dan sela-sela jari. Biarkan selama 8-12 jam, lalu cuci sampai bersih pada keesokan harinya. Jika selama pemakaian tidak sengaja tercuci, cream harus dioleskan kembali.</p><p>Aturan Pakai</p><p><button _ngcontent-halodoc-c137=\"\" type=\"button\"></button></p><p>Oleskan cream keseluruh tubuh termasuk wajah, leher, kulit kepala dan telinga. Hindari kontak dengan mata. Setelah 8-24 jam, obat dibilas dengan cara dicuci menggunakan sabun. Pengobatan dapat diulangi setelah 1 minggu.</p><p>Perhatian</p><p>HARUS DENGAN RESEP DOKTER. Hati-hati menggunakan obat ini untuk bayi &lt; 2 bulan, wanita hamil, dan ibu menyusui. Hindari penggunaan pada mata.</p><p>Kontra Indikasi</p><p>Hipersensitif terhadap pyrethroid atau pyrethrin sintetik</p><p>Efek Samping</p><p>Rasa seperti terbakar dan tersengat yang ringan yang bersifat sementara, gatal, eritema, ruam kulit</p><p>Segmentasi</p><p>Obat Keras (Merah)</p><p>Kemasan</p><p>Dus, Tube @ 30 g</p><p>Manufaktur</p><p>Galenium</p><p>No. Registrasi</p><p>BPOM: DKL9427801529A1</p>', 5, 100, '2023-12-07', 'scabi.jpeg', 'scabimite-5-cream-30-g', '2022-11-07 15:56:00', '2022-11-07 15:56:00');

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
(7, 'Obat Perut', 'perut.png', 'obat-perut'),
(8, 'Obat Mata', 'mata.png', 'obat-mata'),
(9, 'Vitamin', 'vitamin.png', 'vitamin');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_barangmasuk`
--

CREATE TABLE `laporan_barangmasuk` (
  `id` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `jumlah` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan_barangmasuk`
--

INSERT INTO `laporan_barangmasuk` (`id`, `nama`, `kategori`, `tanggal`, `jumlah`) VALUES
(2, 'Salep Hydrocortisone Cream 1 % 5 g', 'Obat Kulit', '2022-11-04 13:54:42', 1),
(3, 'Minyak Kayu Putih', 'Obat Perut', '2022-11-02 13:55:03', 3),
(4, 'Bodrexs', 'Obat Nyeri', '2022-11-01 14:03:59', 5),
(5, 'Bodrexs', 'Obat Nyeri', '2022-11-04 14:04:09', 11),
(6, 'Rohto Cool Eye Drop 7 ml', 'Obat Mata', '2022-11-07 16:23:50', 6);

-- --------------------------------------------------------

--
-- Table structure for table `laporan_pemasukan`
--

CREATE TABLE `laporan_pemasukan` (
  `id` int(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `total` int(255) NOT NULL,
  `periode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan_pemasukan`
--

INSERT INTO `laporan_pemasukan` (`id`, `tanggal`, `total`, `periode`) VALUES
(2, '2022-11-03', 13500, 'November 2022'),
(3, '2022-11-01', 50000, 'November 2022'),
(4, '2022-11-04', 48500, 'November 2022'),
(5, '2022-11-05', 39000, 'November 2022'),
(6, '2022-11-02', 76000, 'November 2022'),
(7, '2022-03-06', 12000, 'March 2022'),
(8, '2022-11-07', 259500, 'November 2022'),
(9, '2022-11-13', 39000, 'November 2022');

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `title` varchar(250) NOT NULL,
  `desc` varchar(15000) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`title`, `desc`, `image`) VALUES
('Cek Asam Urat', 'Cek asam urat merupakan pemeriksaan yang dilakukan untuk mengetahui kadar asam urat di dalam darah atau urine. Sebelumnya perlu diketahui, asam urat adalah senyawa alami yang diproduksi tubuh dan terbentuk dari penguraian zat purin dari makanan atau minuman.', 'cek-asam-urat.png'),
('Cek Gula Darah', 'Sesuai namanya, tes gula darah adalah pemeriksaan untuk mengetahui kadar gula (glukosa) dalam darah. Ada macam-macam tes gula darah, dan tujuannya bukan hanya untuk mendiagnosis penyakit diabetes, tapi juga untuk mengevaluasi apakah kadar gula darah penderita diabetes terkontrol dengan baik.', 'cek-gula-darah.png'),
('Cek Kolesterol', 'Tes kolesterol yang disebut juga dengan panel lipid atau profil lipid adalah pemeriksaan untuk mengukur jumlah kolesterol dan trigliserida dalam darah. Pemeriksaan lengkap mencakup perhitungan keempat jenis lemak ini: Jumlah kandungan kolesterol total dalam darah.', 'cek-kolesterol.png'),
('Cek Tensi Darah', 'Pemeriksaan tekanan darah atau cek tensi merupakan prosedur untuk mengukur seberapa kuatnya tekanan darah di arteri saat jantung dipompa. Prosedur ini umumnya dilakukan dengan sphygmomanometer atau tensimeter baik yang pompa (manual) atau mesin otomatis.', 'cek-tensi-darah.png');

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

-- --------------------------------------------------------

--
-- Table structure for table `struk`
--

CREATE TABLE `struk` (
  `id` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jumlah` int(255) NOT NULL,
  `harga` int(255) NOT NULL,
  `harga_total` int(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `struk`
--

INSERT INTO `struk` (`id`, `nama`, `jumlah`, `harga`, `harga_total`, `tanggal`) VALUES
(8, 'Bodrexs', 1, 8500, 8500, '2022-11-01 10:26:57'),
(9, 'Minyak Kayu Putih', 1, 12000, 12000, '2022-11-02 10:26:57'),
(10, 'Kalpanax Krim 5 g', 1, 19000, 19000, '2022-11-03 10:26:58'),
(11, 'Salep Hydrocortisone Cream 1 % 5 g', 1, 9000, 9000, '2022-11-04 10:26:58'),
(12, 'Paramex Obat Sakit Kepala', 1, 5000, 5000, '2022-11-05 10:26:58'),
(13, 'Paramex Obat Sakit Kepala', 1, 5000, 5000, '2022-11-04 11:22:28'),
(14, 'Paramex Obat Sakit Kepala', 1, 5000, 5000, '2022-11-04 11:22:39'),
(15, 'Bodrexs', 1, 8500, 8500, '2022-11-04 11:24:33'),
(16, 'Minyak Kayu Putih', 1, 12000, 12000, '2022-11-04 11:25:35'),
(17, 'Minyak Kayu Putih', 1, 12000, 12000, '2022-11-04 11:26:32'),
(18, 'Bodrexs', 1, 8500, 8500, '2022-11-04 11:29:04'),
(19, 'Bodrexs', 1, 8500, 8500, '2022-11-04 11:31:00'),
(20, 'Paramex Obat Sakit Kepala', 1, 5000, 5000, '2022-11-04 11:31:28'),
(21, 'Kalpanax Krim 5 g', 1, 19000, 19000, '2022-11-04 11:32:11'),
(22, 'Kalpanax Krim 5 g', 1, 19000, 19000, '2022-11-04 11:32:38'),
(23, 'Minyak Kayu Putih', 1, 12000, 12000, '2022-11-04 11:32:38'),
(24, 'Kalpanax Krim 5 g', 1, 19000, 19000, '2022-11-04 11:40:40'),
(25, 'Salep Hydrocortisone Cream 1 % 5 g', 1, 9000, 9000, '2022-11-04 14:18:11'),
(26, 'Bodrexs', 1, 8500, 8500, '2022-11-04 14:20:31'),
(27, 'Minyak Kayu Putih', 1, 12000, 12000, '2022-11-04 14:20:31'),
(28, 'Minyak Kayu Putih', 1, 12000, 12000, '2022-11-05 10:34:39'),
(29, 'Salep Hydrocortisone Cream 1 % 5 g', 3, 9000, 27000, '2022-11-05 10:34:39'),
(30, 'Kalpanax Krim 5 g', 4, 19000, 76000, '2022-11-06 09:45:21'),
(31, 'Minyak Kayu Putih', 1, 12000, 12000, '2022-03-06 09:47:02'),
(32, 'Minyak Kayu Putih', 1, 12000, 12000, '2022-11-07 13:43:12'),
(33, 'Salep Hydrocortisone Cream 1 % 5 g', 1, 9000, 9000, '2022-11-07 13:43:12'),
(34, 'Bodrexs', 20, 8500, 170000, '2022-11-07 15:01:30'),
(35, 'Paramex Obat Sakit Kepala', 1, 5000, 5000, '2022-11-07 15:14:27'),
(36, 'Paramex Obat Sakit Kepala', 1, 5000, 5000, '2022-11-07 15:14:30'),
(37, 'Paramex Obat Sakit Kepala', 1, 5000, 5000, '2022-11-07 15:15:54'),
(38, 'Salep Hydrocortisone Cream 1 % 5 g', 1, 9000, 9000, '2022-11-07 15:16:55'),
(39, 'Paramex Obat Sakit Kepala', 1, 5000, 5000, '2022-11-07 15:17:09'),
(40, 'Bodrexs', 1, 8500, 8500, '2022-11-07 15:24:15'),
(41, 'Salep Hydrocortisone Cream 1 % 5 g', 2, 9000, 18000, '2022-11-07 16:15:35'),
(42, 'Rohto Cool Eye Drop 7 ml', 1, 13000, 13000, '2022-11-07 16:15:35'),
(43, 'Bodrexs', 4, 8500, 34000, '2022-11-13 15:47:32'),
(44, 'Paramex Obat Sakit Kepala', 1, 5000, 5000, '2022-11-13 15:47:32');

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
-- Indexes for table `laporan_barangmasuk`
--
ALTER TABLE `laporan_barangmasuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_pemasukan`
--
ALTER TABLE `laporan_pemasukan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`title`);

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
-- Indexes for table `struk`
--
ALTER TABLE `struk`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `laporan_barangmasuk`
--
ALTER TABLE `laporan_barangmasuk`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `laporan_pemasukan`
--
ALTER TABLE `laporan_pemasukan`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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

--
-- AUTO_INCREMENT for table `struk`
--
ALTER TABLE `struk`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
