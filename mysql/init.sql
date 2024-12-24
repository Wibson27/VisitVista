-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2024 at 05:44 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `visitvista`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `content_full` text DEFAULT NULL,
  `image_url` varchar(255) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `content_full`, `image_url`, `category`, `location`, `created_at`) VALUES
(1, 'Pesona Candi Borobudur: Warisan Budaya Dunia di Jantung Jawa', 'Candi Borobudur, warisan budaya UNESCO yang megah, menawarkan pengalaman spiritual dan budaya yang tak terlupakan. Dengan arsitektur yang menakjubkan dan relief yang detail, candi ini menjadi bukti kejayaan peradaban Jawa kuno.', 'Candi Borobudur adalah candi Buddha terbesar di dunia yang dibangun pada abad ke-8 Masehi. Terletak di Magelang, Jawa Tengah, candi ini merupakan warisan budaya dunia UNESCO yang menarik jutaan wisatawan setiap tahunnya.\r\n\r\nSejarah Candi Borobudur\r\nDibangun pada masa kejayaan Dinasti Syailendra, Borobudur merupakan representasi dari kosmologi Buddha. Struktur bangunan berbentuk mandala yang terdiri dari 10 tingkat melambangkan perjalanan pencerahan Sidharta Gautama.\r\n\r\nArsitektur yang Menakjubkan\r\n- 2.672 panel relief\r\n- 504 arca Buddha\r\n- 72 stupa berlubang\r\n- 1 stupa utama di puncak\r\n- Menggunakan teknik interlocking tanpa perekat\r\n\r\nWaktu Terbaik Mengunjungi\r\n- Sunrise (04.30 - 06.00): Menikmati matahari terbit\r\n- Sore hari (15.00 - 17.30): Suasana lebih sejuk\r\n- Hindari musim liburan untuk menghindari keramaian\r\n\r\nTips Berkunjung\r\n1. Beli tiket online untuk menghindari antrian\r\n2. Gunakan jasa guide untuk penjelasan detail sejarah\r\n3. Pakai alas kaki yang nyaman\r\n4. Bawa air minum dan payung/topi\r\n5. Hormati area sakral dengan berpakaian sopan', 'images/borobudur.jpg', 'Cultural', 'Magelang, Jawa Tengah', '2024-12-19 11:50:55'),
(2, 'Jelajahi Malioboro: Jantung Kehidupan Yogyakarta', 'Jalan Malioboro, pusat keramaian kota Yogyakarta, menawarkan pengalaman berbelanja dan kuliner yang autentik. Dari batik hingga makanan tradisional, semua dapat ditemukan di sepanjang jalan legendaris ini.', 'Jalan Malioboro adalah ikon Yogyakarta yang telah menjadi saksi sejarah dan perkembangan kota ini selama berabad-abad. Stretching sepanjang 1,6 kilometer, jalan ini adalah pusat aktivitas ekonomi dan budaya yang tak pernah tidur.\r\n\r\nSejarah Malioboro\r\nNama Malioboro berasal dari nama Jenderal Inggris Marlborough yang pernah bertugas di Yogyakarta. Jalan ini telah menjadi pusat perdagangan sejak era kesultanan hingga sekarang.\r\n\r\nYang Dapat Ditemukan di Malioboro\r\n- Pasar Beringharjo: Pasar tradisional terbesar\r\n- Toko batik dan kerajinan tangan\r\n- Angkringan dan kuliner tradisional\r\n- Pertunjukan seniman jalanan\r\n- Hotel dan penginapan berbagai kelas\r\n\r\nKuliner Khas\r\n1. Gudeg Yu Djum\r\n2. Bakpia Pathok\r\n3. Sate Klathak\r\n4. Es Teler Malioboro\r\n5. Kopi Joss\r\n\r\nTips Berkunjung\r\n- Kunjungi pagi hari untuk belanja di Beringharjo\r\n- Sore hingga malam untuk suasana yang lebih hidup\r\n- Gunakan transportasi umum untuk menghindari masalah parkir\r\n- Jangan lupa tawar-menawar saat berbelanja\r\n- Coba kuliner khas di sepanjang jalan', 'images/malioboro.jpg', 'Shopping', 'Yogyakarta', '2024-12-19 11:50:55'),
(3, 'Keraton Yogyakarta: Kemegahan Warisan Mataram Islam', 'Keraton Yogyakarta, istana Sultan yang masih berfungsi hingga kini, menjadi saksi bisu sejarah dan budaya Jawa. Arsitektur megah dan tradisi kerajaan yang masih terjaga menjadikannya destinasi wisata budaya yang tak boleh dilewatkan.', 'Keraton Yogyakarta atau Kraton Ngayogyakarta Hadiningrat adalah istana resmi Kesultanan Yogyakarta yang didirikan oleh Sultan Hamengku Buwono I pada tahun 1755. Kompleks keraton ini tidak hanya berfungsi sebagai tempat tinggal raja, tetapi juga sebagai pusat kebudayaan Jawa.\r\n\r\nArsitektur dan Filosofi\r\n- Bangunan menghadap ke utara\r\n- Terdiri dari 7 kompleks utama\r\n- Setiap ornamen memiliki makna filosofis\r\n- Mencerminkan perpaduan budaya Jawa, Islam, dan Eropa\r\n\r\nKoleksi Museum\r\n1. Pusaka kerajaan\r\n2. Kereta kencana\r\n3. Gamelan kuno\r\n4. Foto-foto bersejarah\r\n5. Pakaian kebesaran Sultan\r\n\r\nPertunjukan Budaya\r\n- Tari klasik setiap hari Minggu\r\n- Gamelan setiap hari Selasa\r\n- Wayang kulit pada acara khusus\r\n\r\nTips Kunjungan\r\n- Datang pagi hari untuk menghindari panas\r\n- Gunakan pakaian sopan\r\n- Sewa guide untuk penjelasan detail\r\n- Hormati aturan foto yang berlaku\r\n- Kunjungi saat ada upacara adat untuk pengalaman lebih lengkap', 'images/keraton.jpg', 'Cultural', 'Yogyakarta', '2024-12-19 11:50:55'),
(4, 'Pantai Parangtritis: Pesona Selatan Yogyakarta', 'Pantai Parangtritis merupakan pantai yang paling terkenal di Yogyakarta. Dengan hamparan pasir hitam yang luas dan ombak yang besar...', 'Pantai Parangtritis adalah salah satu destinasi wisata pantai paling populer di Yogyakarta. Terletak sekitar 27 km dari pusat kota, pantai ini menawarkan pemandangan spektakuler dengan gundukan pasir (gumuk) dan ombak yang besar dari Samudera Hindia.\n\nSelain keindahan alamnya, Parangtritis juga kental dengan nilai budaya dan mistis dalam kepercayaan masyarakat Jawa. Pengunjung dapat menikmati sunset yang memukau, mencoba olahraga paralayang di bukit sekitar, atau sekadar bersantai di warung-warung pinggir pantai.\n\nFasilitas yang tersedia:\n- Area parkir luas\n- Penginapan dan hotel\n- Warung makan\n- Penyewaan ATV dan motor trail\n- Spot paralayang', 'images/parangtritis.jpg', 'Nature', 'Bantul, Yogyakarta', '2024-12-19 11:50:55'),
(5, 'Taman Sari: Pesona Istana Air Keraton Yogyakarta', 'Taman Sari atau Water Castle adalah kompleks taman rekreasi keluarga kerajaan yang dibangun pada masa Sultan Hamengku Buwono I...', 'Taman Sari atau yang juga dikenal sebagai Water Castle adalah kompleks taman rekreasi keluarga Keraton Yogyakarta. Dibangun pada tahun 1758, kompleks ini dulunya merupakan taman rekreasi pribadi Sultan dan keluarganya yang dilengkapi dengan kolam pemandian, kanal air, dan berbagai bangunan megah.\n\nArsitektur Taman Sari menggabungkan gaya Jawa dengan pengaruh Portugis, Belanda, dan Cina. Kompleks ini terdiri dari beberapa bagian utama:\n- Umbul Binangun (kolam pemandian)\n- Gapura Agung\n- Sumur Gumuling\n- Pulo Kenanga\n\nSejarah dan Arsitektur:\n- Dibangun tahun 1758-1765\n- Luas area sekitar 12.000 m2\n- Memiliki sistem pengairan canggih\n- Dinding tebal untuk pertahanan', 'images/tamansari.jpg', 'Cultural', 'Yogyakarta', '2024-12-19 11:50:55'),
(6, 'Gunung Merapi: Keagungan Vulkanik Jawa Tengah', 'Gunung Merapi, salah satu gunung berapi paling aktif di Indonesia, menawarkan pengalaman pendakian menantang dan pemandangan alam yang memukau...', 'Gunung Merapi, dengan ketinggian 2.968 mdpl, adalah salah satu gunung berapi paling aktif di Indonesia. Terletak di perbatasan Yogyakarta dan Jawa Tengah, gunung ini tidak hanya menjadi landmark alam yang megah tetapi juga memiliki nilai spiritual bagi masyarakat sekitar.\n\nJalur Pendakian:\n- Jalur Selo (New Selo)\n- Jalur Kaliadem\n- Jalur Babadan\n\nTips Mendaki:\n- Waktu terbaik: Musim kemarau (April-Oktober)\n- Durasi pendakian: 4-7 jam\n- Wajib dengan guide resmi\n- Membawa perlengkapan standar\n\nAtraksi sekitar:\n- Lava Tour\n- Museum Gunung Merapi\n- Bunker Kaliadem\n- Desa wisata sekitar', 'images/merapi.jpg', 'Adventure', 'Sleman, Yogyakarta', '2024-12-19 11:50:55'),
(7, 'Pasar Beringharjo: Pusat Belanja Tradisional Yogyakarta', 'Pasar Beringharjo, pasar tradisional tertua di Yogyakarta, menawarkan berbagai produk tradisional dari batik hingga jamu...', 'Pasar Beringharjo adalah pasar tradisional tertua dan terbesar di Yogyakarta. Didirikan pada masa Sri Sultan Hamengku Buwono I tahun 1758, pasar ini menjadi pusat kegiatan ekonomi yang vital bagi Yogyakarta.\n\nProduk yang dijual:\n- Batik tradisional dan modern\n- Bahan rempah dan jamu\n- Makanan tradisional\n- Kerajinan tangan\n- Bahan sandang\n\nTips Berbelanja:\n- Datang pagi untuk suasana terbaik\n- Jangan lupa tawar\n- Bawa tas belanja sendiri\n- Kenali kualitas batik\n\nAkses dan Fasilitas:\n- Dekat Malioboro\n- Area parkir tersedia\n- ATM dan toilet umum\n- Food court traditional', 'images/beringharjo.jpg', 'Shopping', 'Yogyakarta', '2024-12-19 11:50:55'),
(8, 'Candi Prambanan: Kemegahan Arsitektur Hindu Jawa', 'Candi Prambanan, kompleks candi Hindu terbesar di Indonesia, menampilkan keindahan arsitektur dan relief yang menakjubkan...', 'Candi Prambanan adalah kompleks candi Hindu terbesar di Indonesia dan salah satu yang terindah di Asia Tenggara. Dibangun pada abad ke-9, kompleks candi ini didedikasikan untuk Trimurti: Shiva, Vishnu, dan Brahma.\n\nArsitektur dan Struktur:\n- 8 candi utama dan 8 candi kecil\n- Tinggi candi utama 47 meter\n- Relief Ramayana dan Krishnayana\n- Teknologi konstruksi canggih\n\nSejarah Singkat:\n- Dibangun sekitar tahun 850 M\n- Ditinggalkan pada abad ke-10\n- Ditemukan kembali 1733\n- Status UNESCO sejak 1991\n\nAtraksi tambahan:\n- Sendratari Ramayana\n- Museum Prambanan\n- Taman sekitar candi\n- Paket wisata gabungan dengan Borobudur', 'images/prambanan.jpg', 'Cultural', 'Sleman, Yogyakarta', '2024-12-19 11:50:55'),
(9, 'Hutan Pinus Mangunan Tempat Foto Instagramable', 'Hutan Pinus Mangunan adalah destinasi wisata alam yang menyajikan pemandangan indah dan spot foto menarik', 'Hutan Pinus Mangunan terletak di Kabupaten Bantul, Yogyakarta. Tempat ini terkenal sebagai lokasi foto yang populer berkat deretan pohon pinus yang tinggi dan suasana alam yang sejuk.\n\nFasilitas:\n- Area foto dengan properti unik\n- Spot panggung seni outdoor\n- Warung makan sederhana\n\nTips kunjungan:\n- Datang pagi untuk pencahayaan foto terbaik\n- Gunakan sepatu nyaman untuk berjalan di medan tanah', 'images/pinus.jpg', 'Nature', 'Bantul, Yogyakarta', '2024-12-19 11:50:55'),
(10, 'Petualangan Caving Spektakuler di Goa Jomblang', 'Goa Jomblang menawarkan pengalaman caving unik dengan sinar \"cahaya surga\" yang terkenal', 'Goa Jomblang adalah goa vertikal yang terletak di Kabupaten Gunungkidul, Yogyakarta. Goa ini terkenal dengan fenomena \"cahaya surga\" yang terjadi ketika sinar matahari masuk melalui celah goa.\n\nPengalaman utama:\n- Caving dengan alat keselamatan\n- Menyaksikan \"cahaya surga\" sekitar pukul 10.00-12.00\n- Trekking di hutan purba sekitar goa\n\nTips kunjungan:\n- Pesan tiket sebelumnya karena kuota terbatas\n- Pakai pakaian nyaman dan tidak mudah kotor\n- Ikuti instruksi pemandu dengan cermat', 'images/jomblang.jpg', 'Adventure', 'Gunungkidul, Yogyakarta', '2024-12-19 11:50:55'),
(11, 'Pantai Timang Tempat Wisata Ekstrem dan Kuliner Lobster', 'Pantai Timang terkenal dengan jembatan gantungnya yang memacu adrenalin dan lobster segarnya', 'Pantai Timang terletak di Gunungkidul, Yogyakarta. Pantai ini menawarkan pengalaman wisata yang unik dengan jembatan gantung menuju pulau karang dan kuliner lobster segar.\n\nAtraksi utama:\n- Jembatan gantung tradisional\n- Gondola kayu untuk menuju Pulau Timang\n- Wisata kuliner lobster\n\nTips kunjungan:\n- Gunakan alas kaki yang nyaman\n- Bawa uang tunai untuk menyewa gondola\n- Jangan lupa mencoba lobster segar di warung sekitar', 'images/timang.jpg', 'Adventure', 'Gunungkidul, Yogyakarta', '2024-12-19 11:50:55'),
(12, 'Panorama Alam dengan Sentuhan Seni di Tebing Breksi', 'Tebing Breksi adalah destinasi wisata baru yang menggabungkan panorama alam dan seni ukir pada tebing batu kapur', 'Tebing Breksi terletak di Kabupaten Sleman, Yogyakarta. Tempat ini dulunya adalah lokasi penambangan batu kapur yang kemudian diubah menjadi destinasi wisata dengan tambahan ukiran-ukiran seni.\n\nFasilitas:\n- Spot foto Instagramable\n- Panggung seni outdoor\n- Warung makan dan kios oleh-oleh\n\nTips kunjungan:\n- Datang sore untuk menikmati sunset\n- Bawa kamera untuk foto-foto\n- Pakai pakaian nyaman', 'images/tebingbreksi.jpg', 'Nature', 'Sleman, Yogyakarta', '2024-12-19 11:50:55'),
(13, 'Kaliurang: Wisata Alam dan Edukasi Gunung Merapi', 'Kaliurang adalah kawasan wisata di lereng Gunung Merapi yang menawarkan udara sejuk dan atraksi edukatif', 'Kaliurang terletak di Kabupaten Sleman, Yogyakarta. Kawasan ini merupakan tempat ideal untuk rekreasi keluarga dengan pemandangan alam pegunungan dan berbagai atraksi edukasi.\n\nAtraksi utama:\n- Museum Merapi\n- Gardu pandang Merapi\n- Taman rekreasi keluarga\n- Jeep tour lava Merapi\n\nFasilitas:\n- Penginapan keluarga\n- Restoran\n- Tempat bermain anak', 'images/kaliurang.jpg', 'Nature', 'Sleman, Yogyakarta', '2024-12-19 11:50:55');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `place_id` varchar(255) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_price` decimal(10,2) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Triggers `bookings`
--
DELIMITER $$
CREATE TRIGGER `before_booking_insert` BEFORE INSERT ON `bookings` FOR EACH ROW BEGIN
    DECLARE next_id INT;
    SET next_id = (SELECT COALESCE(MAX(CAST(SUBSTRING(id, 3) AS UNSIGNED)), 0) + 1
                   FROM bookings);
    SET NEW.id = CONCAT('BK', LPAD(next_id, 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bookingstatus`
--

CREATE TABLE `bookingstatus` (
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookingstatus`
--

INSERT INTO `bookingstatus` (`status`) VALUES
('CANCELLED'),
('COMPLETED'),
('PAID'),
('PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `business_profiles`
--

CREATE TABLE `business_profiles` (
  `id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `verification_status` varchar(50) NOT NULL DEFAULT 'PENDING',
  `document_url` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_profiles`
--

INSERT INTO `business_profiles` (`id`, `user_id`, `business_name`, `city`, `description`, `verification_status`, `document_url`, `created_at`) VALUES
('B001', 'B009', 'Kaliurang Adventure Tours', 'Yogyakarta', 'bbbbbbbbbbbbbbbbbbbbbbbbbbbb', 'PENDING', NULL, '2024-12-21 16:36:19'),
('B002', 'B010', 'Parangtritis Beach Adventures', 'Yogyakarta', 'ccccccccccccccccccccccccccccccccccc', 'PENDING', NULL, '2024-12-21 17:12:01'),
('B003', 'B011', 'Goa Pindul Tubing', 'Yogyakarta', 'aaaaaaaaaaaaaaaaaaaaaaa', 'PENDING', NULL, '2024-12-21 17:40:24'),
('BP003', 'B003', 'Jogja Heritage Tours', 'Yogyakarta', 'Specializing in cultural and historical tours around Yogyakarta', 'VERIFIED', NULL, '2024-11-22 16:25:09'),
('BP004', 'B004', 'Merapi Adventure Tours', 'Yogyakarta', 'Adventure and nature tours in and around Bandung', 'VERIFIED', NULL, '2024-11-22 16:25:09'),
('BP005', 'B005', 'Prambanan Cultural Tours', 'Yogyakarta', 'Premier diving experience in Raja Ampat', 'VERIFIED', NULL, '2024-11-22 16:25:09'),
('BP006', 'B006', 'Malioboro Walking Tours', 'Yogyakarta', 'Authentic Toraja cultural experiences and tours', 'VERIFIED', NULL, '2024-11-22 16:25:09');

--
-- Triggers `business_profiles`
--
DELIMITER $$
CREATE TRIGGER `before_business_profile_insert` BEFORE INSERT ON `business_profiles` FOR EACH ROW BEGIN
    DECLARE next_id INT;
    SET next_id = (SELECT COALESCE(MAX(CAST(SUBSTRING(id, 2) AS UNSIGNED)), 0) + 1
                   FROM business_profiles);
    SET NEW.id = CONCAT('B', LPAD(next_id, 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customer_profiles`
--

CREATE TABLE `customer_profiles` (
  `id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `bio` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_profiles`
--

INSERT INTO `customer_profiles` (`id`, `user_id`, `date_of_birth`, `gender`, `bio`) VALUES
('C001', 'C001', '2024-12-11', 'male', 'qaaaaaaaaaaaaaa'),
('C002', 'C002', '2024-12-11', 'male', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'),
('C003', 'C003', '2024-12-10', 'male', 'bbbbbbbbbbbbbbbbbbbbbbbbbbbb'),
('C004', 'C004', '2024-12-04', 'male', 'bbbbbbbbbbbbbbbbbbbbbbbbbbbb'),
('C005', 'C005', '2024-12-18', 'male', 'zzzzzzzzzzzzzzzzzzz'),
('C006', 'C006', '2024-12-31', 'male', 'zzzzzzzzzzzzzzzzzzz'),
('C007', 'C007', '2025-01-08', 'male', 'ddddddddddddddddddddd');

--
-- Triggers `customer_profiles`
--
DELIMITER $$
CREATE TRIGGER `before_customer_profile_insert` BEFORE INSERT ON `customer_profiles` FOR EACH ROW BEGIN
    DECLARE next_id INT;
    SET next_id = (SELECT COALESCE(MAX(CAST(SUBSTRING(id, 2) AS UNSIGNED)), 0) + 1
                   FROM customer_profiles);
    SET NEW.id = CONCAT('C', LPAD(next_id, 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` varchar(255) NOT NULL,
  `business_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `location` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `capacity` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `average_rating` decimal(3,2) DEFAULT 0.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `business_id`, `name`, `description`, `location`, `city`, `price`, `capacity`, `category`, `average_rating`, `created_at`, `updated_at`) VALUES
('P004', 'BP003', 'Borobudur Sunrise Tour', 'Experience the magical sunrise at the world\'s largest Buddhist temple. Includes hotel pickup, traditional breakfast, and guided tour.', 'Borobudur Temple, Magelang', 'Yogyakarta', 50000.00, 25, 'Cultural', 3.92, '2024-11-22 16:25:09', '2024-12-23 05:04:21'),
('P005', 'BP003', 'Prambanan Temple Evening Tour', 'Visit the magnificent Hindu temple complex during sunset, followed by the spectacular Ramayana Ballet performance.', 'Prambanan Temple, Sleman', 'Yogyakarta', 35000.00, 30, 'Cultural', 4.08, '2024-11-22 16:25:09', '2024-12-23 05:04:21'),
('P006', 'BP003', 'Kraton & Malioboro Walking Tour', 'Explore the Sultan\'s Palace and vibrant Malioboro street. Experience traditional Javanese culture and modern city life.', 'Jl. Malioboro, Yogyakarta', 'Yogyakarta', 15000.00, 15, 'Cultural', 4.00, '2024-11-22 16:25:09', '2024-12-23 05:04:21'),
('P007', 'BP004', 'Mount Merapi Trekking', 'Visit the famous volcano crater, enjoy the natural hot springs, and learn about local geology.', 'Kaliurang, Sleman', 'Yogyakarta', 25000.00, 20, 'Nature', 3.91, '2024-11-22 16:25:09', '2024-12-23 05:04:21'),
('P008', 'BP004', 'Tebing Breksi Exploration', 'Explore the stunning white crater lake, surrounded by misty mountains and lush forests.', 'Tebing Breksi, Sleman', 'Yogyakarta', 25000.00, 15, 'Nature', 4.18, '2024-11-22 16:25:09', '2024-12-23 05:04:21'),
('P009', 'BP004', 'Keraton Cultural Tour', 'Visit a historic tea plantation, learn about tea processing, and enjoy high tea with city views.', 'Keraton Yogyakarta', 'Yogyakarta', 20000.00, 25, 'Cultural', 3.55, '2024-11-22 16:25:09', '2024-12-23 05:04:21'),
('P010', 'BP005', 'Parangtritis Beach Adventure', 'Explore the iconic limestone karst islands, snorkel in pristine waters, and climb for panoramic views.', 'Parangtritis Beach, Bantul', 'Yogyakarta', 75000.00, 10, 'Adventure', 4.36, '2024-11-22 16:25:09', '2024-12-23 05:04:21'),
('P011', 'BP005', 'Goa Pindul Cave Tubing', 'Discover one of the world\'s most beautiful coral reefs with experienced diving instructors.', 'Goa Pindul, Gunungkidul', 'Yogyakarta', 100000.00, 8, 'Adventure', 3.80, '2024-11-22 16:25:09', '2024-12-23 05:04:21'),
('P012', 'BP005', 'Mangunan Pine Forest Visit', 'Experience local Papuan culture, learn traditional dances, and try handicraft making.', 'Hutan Pinus Mangunan, Bantul', 'Yogyakarta', 25000.00, 12, 'Cultural', 0.00, '2024-11-22 16:25:09', '2024-12-23 05:04:21'),
('P013', 'BP006', 'Taman Sari Water Castle Tour', 'Explore traditional villages, visit ancient burial sites, and witness unique architectural heritage.', 'Taman Sari, Yogyakarta', 'Yogyakarta', 30000.00, 15, 'Cultural', 0.00, '2024-11-22 16:25:09', '2024-12-23 05:04:21'),
('P014', 'BP006', 'Malioboro Shopping Tour', 'Visit coffee plantations, learn about traditional coffee processing, and taste authentic Toraja coffee.', 'Malioboro, Yogyakarta', 'Yogyakarta', 35000.00, 20, 'Cultural', 0.00, '2024-11-22 16:25:09', '2024-12-23 05:04:21'),
('P015', 'BP006', 'Yogyakarta City Night Tour', 'Visit one of the most beautiful and well-preserved traditional villages in Toraja.', 'Alun-alun Kidul, Yogyakarta', 'Yogyakarta', 20000.00, 20, 'Cultural', 0.00, '2024-11-22 16:25:09', '2024-12-23 05:04:21');

--
-- Triggers `places`
--
DELIMITER $$
CREATE TRIGGER `before_place_insert` BEFORE INSERT ON `places` FOR EACH ROW BEGIN
    DECLARE next_id INT;
    SET next_id = (SELECT COALESCE(MAX(CAST(SUBSTRING(id, 2) AS UNSIGNED)), 0) + 1
                   FROM places);
    SET NEW.id = CONCAT('P', LPAD(next_id, 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `place_images`
--

CREATE TABLE `place_images` (
  `id` varchar(255) NOT NULL,
  `place_id` varchar(255) NOT NULL,
  `image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `place_images`
--

INSERT INTO `place_images` (`id`, `place_id`, `image_url`) VALUES
('IMG010', 'P004', 'images/0001.jpeg'),
('IMG011', 'P005', 'images/0002.jpeg'),
('IMG012', 'P006', 'images/0003.jpeg'),
('IMG013', 'P007', 'images/0004.jpeg'),
('IMG014', 'P008', 'images/0005.jpeg'),
('IMG015', 'P009', 'images/0006.jpeg'),
('IMG016', 'P010', 'images/0007.jpeg'),
('IMG017', 'P011', 'images/0008.jpeg'),
('IMG018', 'P012', 'images/0009.jpeg'),
('IMG019', 'P013', 'images/0010.jpeg'),
('IMG020', 'P014', 'images/0011.jpeg'),
('IMG021', 'P015', 'images/0012.jpeg');

--
-- Triggers `place_images`
--
DELIMITER $$
CREATE TRIGGER `before_place_image_insert` BEFORE INSERT ON `place_images` FOR EACH ROW BEGIN
    DECLARE next_id INT;
    SET next_id = (SELECT COALESCE(MAX(CAST(SUBSTRING(id, 4) AS UNSIGNED)), 0) + 1
                   FROM place_images);
    SET NEW.id = CONCAT('IMG', LPAD(next_id, 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` varchar(255) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `place_id` varchar(255) DEFAULT NULL,
  `booking_id` varchar(255) DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `place_id`, `booking_id`, `rating`, `comment`, `created_at`) VALUES
('R001', 'C001', 'P004', 'BK001', 5, 'This place was amazing! The views were breathtaking, and the staff was friendly and knowledgeable. Highly recommend visiting if you\'re in the area!', '2024-11-25 01:30:00'),
('R002', 'C002', 'P004', 'BK002', 4, 'I had an unforgettable experience here. The tour guide was very informative, and the activities were both fun and educational. A must-visit!', '2024-11-26 02:15:00'),
('R003', 'C003', 'P004', 'BK003', 5, 'Beautiful location with lots of history. It was a bit crowded, but the experience was still worth it. Would love to come back in the off-season.', '2024-11-27 03:00:00'),
('R004', 'C001', 'P005', 'BK004', 5, 'This place was amazing! The views were breathtaking, and the staff was friendly and knowledgeable. Highly recommend visiting if you\'re in the area!', '2024-11-28 04:45:00'),
('R005', 'C002', 'P005', 'BK005', 4, 'I had an unforgettable experience here. The tour guide was very informative, and the activities were both fun and educational. A must-visit!', '2024-11-29 07:20:00'),
('R006', 'C003', 'P006', 'BK006', 4, 'Beautiful location with lots of history. It was a bit crowded, but the experience was still worth it. Would love to come back in the off-season.', '2024-11-30 09:00:00'),
('R007', 'C001', 'P007', 'BK007', 5, 'This place was amazing! The views were breathtaking, and the staff was friendly and knowledgeable. Highly recommend visiting if you\'re in the area!', '2024-12-01 02:30:00'),
('R008', 'C002', 'P008', 'BK008', 5, 'I had an unforgettable experience here. The tour guide was very informative, and the activities were both fun and educational. A must-visit!', '2024-12-02 03:45:00'),
('R009', 'C003', 'P009', 'BK009', 4, 'Beautiful location with lots of history. It was a bit crowded, but the experience was still worth it. Would love to come back in the off-season.', '2024-12-03 06:15:00'),
('R010', 'C001', 'P010', 'BK010', 5, 'This place was amazing! The views were breathtaking, and the staff was friendly and knowledgeable. Highly recommend visiting if you\'re in the area!', '2024-12-04 08:30:00'),
('R011', 'C001', 'P004', 'BK011', 4, 'I had an unforgettable experience here. The tour guide was very informative, and the activities were both fun and educational. A must-visit!', '2024-12-04 09:30:00'),
('R012', 'C001', 'P005', 'BK012', 3, 'Beautiful location with lots of history. It was a bit crowded, but the experience was still worth it. Would love to come back in the off-season.', '2024-12-04 10:30:00'),
('R013', 'C001', 'P006', 'BK013', 3, 'This place was amazing! The views were breathtaking, and the staff was friendly and knowledgeable. Highly recommend visiting if you\'re in the area!', '2024-12-04 11:30:00'),
('R014', 'C001', 'P007', 'BK014', 3, 'I had an unforgettable experience here. The tour guide was very informative, and the activities were both fun and educational. A must-visit!', '2024-12-04 12:30:00'),
('R015', 'C001', 'P008', 'BK015', 5, 'Beautiful location with lots of history. It was a bit crowded, but the experience was still worth it. Would love to come back in the off-season.', '2024-12-04 13:30:00'),
('R016', 'C001', 'P009', 'BK016', 4, 'This place was amazing! The views were breathtaking, and the staff was friendly and knowledgeable. Highly recommend visiting if you\'re in the area!', '2024-12-04 14:30:00'),
('R017', 'C001', 'P010', 'BK017', 5, 'I had an unforgettable experience here. The tour guide was very informative, and the activities were both fun and educational. A must-visit!', '2024-12-04 15:30:00'),
('R018', 'C001', 'P011', 'BK018', 4, 'Beautiful location with lots of history. It was a bit crowded, but the experience was still worth it. Would love to come back in the off-season.', '2024-12-04 16:30:00'),
('R019', 'C002', 'P004', 'BK019', 3, 'This place was amazing! The views were breathtaking, and the staff was friendly and knowledgeable. Highly recommend visiting if you\'re in the area!', '2024-12-04 17:30:00'),
('R020', 'C002', 'P005', 'BK020', 5, 'I had an unforgettable experience here. The tour guide was very informative, and the activities were both fun and educational. A must-visit!', '2024-12-04 18:30:00'),
('R021', 'C002', 'P006', 'BK021', 4, 'Beautiful location with lots of history. It was a bit crowded, but the experience was still worth it. Would love to come back in the off-season.', '2024-12-04 19:30:00'),
('R022', 'C002', 'P007', 'BK022', 4, 'This place was amazing! The views were breathtaking, and the staff was friendly and knowledgeable. Highly recommend visiting if you\'re in the area!', '2024-12-04 20:30:00'),
('R023', 'C002', 'P008', 'BK023', 4, 'I had an unforgettable experience here. The tour guide was very informative, and the activities were both fun and educational. A must-visit!', '2024-12-04 21:30:00'),
('R024', 'C002', 'P009', 'BK024', 3, 'Beautiful location with lots of history. It was a bit crowded, but the experience was still worth it. Would love to come back in the off-season.', '2024-12-04 22:30:00'),
('R025', 'C002', 'P010', 'BK025', 4, 'This place was amazing! The views were breathtaking, and the staff was friendly and knowledgeable. Highly recommend visiting if you\'re in the area!', '2024-12-04 23:30:00'),
('R026', 'C002', 'P011', 'BK026', 4, 'I had an unforgettable experience here. The tour guide was very informative, and the activities were both fun and educational. A must-visit!', '2024-12-05 00:30:00'),
('R027', 'C003', 'P004', 'BK027', 4, 'Beautiful location with lots of history. It was a bit crowded, but the experience was still worth it. Would love to come back in the off-season.', '2024-12-05 01:30:00'),
('R028', 'C003', 'P005', 'BK028', 5, 'This place was amazing! The views were breathtaking, and the staff was friendly and knowledgeable. Highly recommend visiting if you\'re in the area!', '2024-12-05 02:30:00'),
('R029', 'C003', 'P006', 'BK029', 5, 'I had an unforgettable experience here. The tour guide was very informative, and the activities were both fun and educational. A must-visit!', '2024-12-05 03:30:00'),
('R030', 'C003', 'P007', 'BK030', 4, 'Beautiful location with lots of history. It was a bit crowded, but the experience was still worth it. Would love to come back in the off-season.', '2024-12-05 04:30:00'),
('R031', 'C003', 'P008', 'BK031', 4, 'This place was amazing! The views were breathtaking, and the staff was friendly and knowledgeable. Highly recommend visiting if you\'re in the area!', '2024-12-05 05:30:00'),
('R032', 'C003', 'P009', 'BK032', 3, 'I had an unforgettable experience here. The tour guide was very informative, and the activities were both fun and educational. A must-visit!', '2024-12-05 06:30:00'),
('R033', 'C003', 'P010', 'BK033', 5, 'Beautiful location with lots of history. It was a bit crowded, but the experience was still worth it. Would love to come back in the off-season.', '2024-12-05 07:30:00'),
('R034', 'C003', 'P011', 'BK034', 4, 'This place was amazing! The views were breathtaking, and the staff was friendly and knowledgeable. Highly recommend visiting if you\'re in the area!', '2024-12-05 08:30:00'),
('R035', 'C001', 'P004', 'BK035', 3, 'I had an unforgettable experience here. The tour guide was very informative, and the activities were both fun and educational. A must-visit!', '2024-12-05 09:30:00'),
('R036', 'C001', 'P005', 'BK036', 4, 'Beautiful location with lots of history. It was a bit crowded, but the experience was still worth it. Would love to come back in the off-season.', '2024-12-05 10:30:00'),
('R037', 'C001', 'P006', 'BK037', 3, 'This place was amazing! The views were breathtaking, and the staff was friendly and knowledgeable. Highly recommend visiting if you\'re in the area!', '2024-12-05 11:30:00'),
('R038', 'C001', 'P007', 'BK038', 4, 'I had an unforgettable experience here. The tour guide was very informative, and the activities were both fun and educational. A must-visit!', '2024-12-05 12:30:00'),
('R039', 'C001', 'P008', 'BK039', 4, 'Beautiful location with lots of history. It was a bit crowded, but the experience was still worth it. Would love to come back in the off-season.', '2024-12-05 13:30:00'),
('R040', 'C001', 'P009', 'BK040', 3, 'This place was amazing! The views were breathtaking, and the staff was friendly and knowledgeable. Highly recommend visiting if you\'re in the area!', '2024-12-05 14:30:00'),
('R041', 'C001', 'P010', 'BK041', 5, 'I had an unforgettable experience here. The tour guide was very informative, and the activities were both fun and educational. A must-visit!', '2024-12-05 15:30:00'),
('R042', 'C001', 'P011', 'BK042', 5, 'Beautiful location with lots of history. It was a bit crowded, but the experience was still worth it. Would love to come back in the off-season.', '2024-12-05 16:30:00'),
('R043', 'C002', 'P004', 'BK043', 3, 'This place was amazing! The views were breathtaking, and the staff was friendly and knowledgeable. Highly recommend visiting if you\'re in the area!', '2024-12-05 17:30:00'),
('R044', 'C002', 'P005', 'BK044', 4, 'I had an unforgettable experience here. The tour guide was very informative, and the activities were both fun and educational. A must-visit!', '2024-12-05 18:30:00'),
('R045', 'C002', 'P006', 'BK045', 4, 'Beautiful location with lots of history. It was a bit crowded, but the experience was still worth it. Would love to come back in the off-season.', '2024-12-05 19:30:00'),
('R046', 'C002', 'P007', 'BK046', 3, 'This place was amazing! The views were breathtaking, and the staff was friendly and knowledgeable. Highly recommend visiting if you\'re in the area!', '2024-12-05 20:30:00'),
('R047', 'C002', 'P008', 'BK047', 5, 'I had an unforgettable experience here. The tour guide was very informative, and the activities were both fun and educational. A must-visit!', '2024-12-05 21:30:00'),
('R048', 'C002', 'P009', 'BK048', 4, 'Beautiful location with lots of history. It was a bit crowded, but the experience was still worth it. Would love to come back in the off-season.', '2024-12-05 22:30:00'),
('R049', 'C002', 'P010', 'BK049', 3, 'This place was amazing! The views were breathtaking, and the staff was friendly and knowledgeable. Highly recommend visiting if you\'re in the area!', '2024-12-05 23:30:00'),
('R050', 'C002', 'P011', 'BK050', 4, 'I had an unforgettable experience here. The tour guide was very informative, and the activities were both fun and educational. A must-visit!', '2024-12-06 00:30:00'),
('R051', 'C003', 'P004', 'BK051', 3, 'Beautiful location with lots of history. It was a bit crowded, but the experience was still worth it. Would love to come back in the off-season.', '2024-12-06 01:30:00'),
('R052', 'C003', 'P005', 'BK052', 4, 'This place was amazing! The views were breathtaking, and the staff was friendly and knowledgeable. Highly recommend visiting if you\'re in the area!', '2024-12-06 02:30:00'),
('R053', 'C003', 'P006', 'BK053', 4, 'I had an unforgettable experience here. The tour guide was very informative, and the activities were both fun and educational. A must-visit!', '2024-12-06 03:30:00'),
('R054', 'C003', 'P007', 'BK054', 5, 'Beautiful location with lots of history. It was a bit crowded, but the experience was still worth it. Would love to come back in the off-season.', '2024-12-06 04:30:00'),
('R055', 'C003', 'P008', 'BK055', 4, 'This place was amazing! The views were breathtaking, and the staff was friendly and knowledgeable. Highly recommend visiting if you\'re in the area!', '2024-12-06 05:30:00'),
('R056', 'C003', 'P009', 'BK056', 4, 'I had an unforgettable experience here. The tour guide was very informative, and the activities were both fun and educational. A must-visit!', '2024-12-06 06:30:00'),
('R057', 'C003', 'P010', 'BK057', 4, 'Beautiful location with lots of history. It was a bit crowded, but the experience was still worth it. Would love to come back in the off-season.', '2024-12-06 07:30:00'),
('R058', 'C003', 'P011', 'BK058', 3, 'This place was amazing! The views were breathtaking, and the staff was friendly and knowledgeable. Highly recommend visiting if you\'re in the area!', '2024-12-06 08:30:00'),
('R059', 'C001', 'P004', 'BK059', 4, 'I had an unforgettable experience here. The tour guide was very informative, and the activities were both fun and educational. A must-visit!', '2024-12-06 09:30:00'),
('R060', 'C001', 'P005', 'BK060', 3, 'Beautiful location with lots of history. It was a bit crowded, but the experience was still worth it. Would love to come back in the off-season.', '2024-12-06 10:30:00'),
('R061', 'C001', 'P006', 'BK061', 4, 'This place was amazing! The views were breathtaking, and the staff was friendly and knowledgeable. Highly recommend visiting if you\'re in the area!', '2024-12-06 11:30:00'),
('R062', 'C001', 'P007', 'BK062', 4, 'I had an unforgettable experience here. The tour guide was very informative, and the activities were both fun and educational. A must-visit!', '2024-12-06 12:30:00'),
('R063', 'C001', 'P008', 'BK063', 3, 'Beautiful location with lots of history. It was a bit crowded, but the experience was still worth it. Would love to come back in the off-season.', '2024-12-06 13:30:00'),
('R064', 'C001', 'P009', 'BK064', 3, 'This place was amazing! The views were breathtaking, and the staff was friendly and knowledgeable. Highly recommend visiting if you\'re in the area!', '2024-12-06 14:30:00'),
('R065', 'C001', 'P010', 'BK065', 5, 'I had an unforgettable experience here. The tour guide was very informative, and the activities were both fun and educational. A must-visit!', '2024-12-06 15:30:00'),
('R066', 'C001', 'P011', 'BK066', 3, 'Beautiful location with lots of history. It was a bit crowded, but the experience was still worth it. Would love to come back in the off-season.', '2024-12-06 16:30:00'),
('R067', 'C002', 'P004', 'BK067', 5, 'This place was amazing! The views were breathtaking, and the staff was friendly and knowledgeable. Highly recommend visiting if you\'re in the area!', '2024-12-06 17:30:00'),
('R068', 'C002', 'P005', 'BK068', 3, 'I had an unforgettable experience here. The tour guide was very informative, and the activities were both fun and educational. A must-visit!', '2024-12-06 18:30:00'),
('R069', 'C002', 'P006', 'BK069', 4, 'Beautiful location with lots of history. It was a bit crowded, but the experience was still worth it. Would love to come back in the off-season.', '2024-12-06 19:30:00'),
('R070', 'C002', 'P007', 'BK070', 4, 'This place was amazing! The views were breathtaking, and the staff was friendly and knowledgeable. Highly recommend visiting if you\'re in the area!', '2024-12-06 20:30:00'),
('R071', 'C002', 'P008', 'BK071', 4, 'I had an unforgettable experience here. The tour guide was very informative, and the activities were both fun and educational. A must-visit!', '2024-12-06 21:30:00'),
('R072', 'C002', 'P009', 'BK072', 4, 'Beautiful location with lots of history. It was a bit crowded, but the experience was still worth it. Would love to come back in the off-season.', '2024-12-06 22:30:00'),
('R073', 'C002', 'P010', 'BK073', 3, 'This place was amazing! The views were breathtaking, and the staff was friendly and knowledgeable. Highly recommend visiting if you\'re in the area!', '2024-12-06 23:30:00'),
('R074', 'C002', 'P011', 'BK074', 3, 'I had an unforgettable experience here. The tour guide was very informative, and the activities were both fun and educational. A must-visit!', '2024-12-07 00:30:00'),
('R075', 'C003', 'P004', 'BK075', 4, 'Beautiful location with lots of history. It was a bit crowded, but the experience was still worth it. Would love to come back in the off-season.', '2024-12-07 01:30:00'),
('R076', 'C003', 'P005', 'BK076', 4, 'This place was amazing! The views were breathtaking, and the staff was friendly and knowledgeable. Highly recommend visiting if you\'re in the area!', '2024-12-07 02:30:00'),
('R077', 'C003', 'P006', 'BK077', 5, 'I had an unforgettable experience here. The tour guide was very informative, and the activities were both fun and educational. A must-visit!', '2024-12-07 03:30:00'),
('R078', 'C003', 'P007', 'BK078', 3, 'Beautiful location with lots of history. It was a bit crowded, but the experience was still worth it. Would love to come back in the off-season.', '2024-12-07 04:30:00'),
('R079', 'C003', 'P008', 'BK079', 5, 'This place was amazing! The views were breathtaking, and the staff was friendly and knowledgeable. Highly recommend visiting if you\'re in the area!', '2024-12-07 05:30:00'),
('R080', 'C003', 'P009', 'BK080', 3, 'I had an unforgettable experience here. The tour guide was very informative, and the activities were both fun and educational. A must-visit!', '2024-12-07 06:30:00'),
('R081', 'C003', 'P010', 'BK081', 4, 'Beautiful location with lots of history. It was a bit crowded, but the experience was still worth it. Would love to come back in the off-season.', '2024-12-07 07:30:00'),
('R082', 'C003', 'P011', 'BK082', 5, 'This place was amazing! The views were breathtaking, and the staff was friendly and knowledgeable. Highly recommend visiting if you\'re in the area!', '2024-12-07 08:30:00'),
('R083', 'C001', 'P004', 'BK083', 4, 'I had an unforgettable experience here. The tour guide was very informative, and the activities were both fun and educational. A must-visit!', '2024-12-07 09:30:00'),
('R084', 'C001', 'P005', 'BK084', 5, 'Beautiful location with lots of history. It was a bit crowded, but the experience was still worth it. Would love to come back in the off-season.', '2024-12-07 10:30:00'),
('R085', 'C001', 'P006', 'BK085', 4, 'This place was amazing! The views were breathtaking, and the staff was friendly and knowledgeable. Highly recommend visiting if you\'re in the area!', '2024-12-07 11:30:00'),
('R086', 'C001', 'P007', 'BK086', 4, 'I had an unforgettable experience here. The tour guide was very informative, and the activities were both fun and educational. A must-visit!', '2024-12-07 12:30:00'),
('R087', 'C001', 'P008', 'BK087', 3, 'Beautiful location with lots of history. It was a bit crowded, but the experience was still worth it. Would love to come back in the off-season.', '2024-12-07 13:30:00'),
('R088', 'C001', 'P009', 'BK088', 4, 'This place was amazing! The views were breathtaking, and the staff was friendly and knowledgeable. Highly recommend visiting if you\'re in the area!', '2024-12-07 14:30:00'),
('R089', 'C001', 'P010', 'BK089', 5, 'I had an unforgettable experience here. The tour guide was very informative, and the activities were both fun and educational. A must-visit!', '2024-12-07 15:30:00'),
('R090', 'C001', 'P011', 'BK090', 3, 'Beautiful location with lots of history. It was a bit crowded, but the experience was still worth it. Would love to come back in the off-season.', '2024-12-07 16:30:00');

--
-- Triggers `reviews`
--
DELIMITER $$
CREATE TRIGGER `after_review_delete` AFTER DELETE ON `reviews` FOR EACH ROW BEGIN
    UPDATE places
    SET average_rating = COALESCE(
        (SELECT ROUND(AVG(rating), 2)
         FROM reviews
         WHERE place_id = OLD.place_id),
        0.00
    )
    WHERE id = OLD.place_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_review_insert` AFTER INSERT ON `reviews` FOR EACH ROW BEGIN
    UPDATE places
    SET average_rating = (
        SELECT ROUND(AVG(rating), 2)
        FROM reviews
        WHERE place_id = NEW.place_id
    )
    WHERE id = NEW.place_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_review_update` AFTER UPDATE ON `reviews` FOR EACH ROW BEGIN
    UPDATE places
    SET average_rating = (
        SELECT ROUND(AVG(rating), 2)
        FROM reviews
        WHERE place_id = NEW.place_id
    )
    WHERE id = NEW.place_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_review_insert` BEFORE INSERT ON `reviews` FOR EACH ROW BEGIN
    DECLARE next_id INT;
    SET next_id = (SELECT COALESCE(MAX(CAST(SUBSTRING(id, 2) AS UNSIGNED)), 0) + 1
                   FROM reviews);
    SET NEW.id = CONCAT('R', LPAD(next_id, 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tourism_statistics`
--

CREATE TABLE `tourism_statistics` (
  `id` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `local_visitors` int(11) NOT NULL,
  `foreign_visitors` int(11) NOT NULL,
  `hotel_occupancy_rate` decimal(5,2) DEFAULT NULL,
  `average_stay_duration` decimal(5,2) DEFAULT NULL,
  `flight_price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Triggers `tourism_statistics`
--
DELIMITER $$
CREATE TRIGGER `before_tourism_stat_insert` BEFORE INSERT ON `tourism_statistics` FOR EACH ROW BEGIN
    DECLARE next_id INT;
    SET next_id = (SELECT COALESCE(MAX(CAST(SUBSTRING(id, 3) AS UNSIGNED)), 0) + 1
                   FROM tourism_statistics);
    SET NEW.id = CONCAT('TS', LPAD(next_id, 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `userrole`
--

CREATE TABLE `userrole` (
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userrole`
--

INSERT INTO `userrole` (`role`) VALUES
('ADMIN'),
('BUSINESS'),
('CUSTOMER');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `role` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `profile_image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `phone`, `role`, `created_at`, `updated_at`, `profile_image_url`) VALUES
('B003', 'jogja.heritage@example.com', '$2y$10$abcdefghijklmnopqrstuv', 'Jogja Heritage', '+6281234567895', 'BUSINESS', '2024-11-22 16:25:09', '2024-11-22 16:25:09', NULL),
('B004', 'bandung.adventure@example.com', '$2y$10$abcdefghijklmnopqrstuv', 'Bandung Adventure', '+6281234567896', 'BUSINESS', '2024-11-22 16:25:09', '2024-11-22 16:25:09', NULL),
('B005', 'raja.ampat@example.com', '$2y$10$abcdefghijklmnopqrstuv', 'Raja Ampat Diving', '+6281234567897', 'BUSINESS', '2024-11-22 16:25:09', '2024-11-22 16:25:09', NULL),
('B006', 'toraja.cultural@example.com', '$2y$10$abcdefghijklmnopqrstuv', 'Toraja Cultural Tours', '+6281234567898', 'BUSINESS', '2024-11-22 16:25:09', '2024-11-22 16:25:09', NULL),
('B007', 'haihai@gmail.com', '$2y$10$xd8SXHHcrhMp72DPx2nYa.Q1x4RitaSKMM0hn.ZQ/pS7X5tUp.Toq', 'Ibnu', NULL, 'BUSINESS', '2024-12-21 16:19:49', '2024-12-23 15:20:29', NULL),
('B008', 'bobobo@gmail.com', '$2y$10$3/A1Uldc2/Df98HIoRDpB.8gvC7rduJLE.AfmZsL8wAWsaJVgQetu', 'Ibnu', NULL, 'BUSINESS', '2024-12-21 16:23:21', '2024-12-23 15:20:29', NULL),
('B009', 'patrick@gmail.com', '$2y$10$vOTtMLieSPqWA0CS1FlBhuf8lud8IoqrqTVtIsx4RzVmxZXRIxQL.', 'Ibnu', NULL, 'BUSINESS', '2024-12-21 16:36:19', '2024-12-23 15:20:29', NULL),
('B010', 'lintang@gmail.com', '$2y$10$O56Trnx.H.sfOpxpQkVP9OsFcxM.RxtFXQAmesvkJz88FkArxJxtW', 'Dimas', NULL, 'BUSINESS', '2024-12-21 17:12:01', NULL, NULL),
('B011', 'palqi@gmail.com', '$2y$10$FxC/KhM/XoXgEK9OG/BwUuitLZBiVLIkjxvcH9f2ZPkvF6ua1Hr2W', 'Ibnu', NULL, 'BUSINESS', '2024-12-21 17:40:24', '2024-12-23 15:20:29', NULL),
('C001', 'halohalo@gmail.com', '$2y$10$UVRV4eAUrRt/bbN5bs8FR.QGJgACIBKpzJByjjZ/yJRLNpTOLGAcC', 'Ibnu', NULL, 'CUSTOMER', '2024-12-21 16:21:18', '2024-12-23 15:20:29', NULL),
('C002', 'dadada@gmail.com', '$2y$10$wCVYSa/n4ZD6/QI.LMU0ZO0ZI3L9H96/9PGpft1LBjQhusfX5Xane', 'dadada', NULL, 'CUSTOMER', '2024-12-21 16:22:47', NULL, NULL),
('C003', 'cponbob@gmail.com', '$2y$10$WinByJ28gi45893ev9fATeP9PWAiOvRgaGyycedsIeM05s4p3T4ke', 'Ibnu', NULL, 'CUSTOMER', '2024-12-21 16:37:24', '2024-12-23 15:20:29', NULL),
('C004', 'sandycheeks@gmail.com', '$2y$10$zZlNPrDp4pNbeFtrhCDT7elYotiPtY7nnM2i6cqTKc0KPD/kKkRMO', 'Ibnu', NULL, 'CUSTOMER', '2024-12-21 17:11:26', '2024-12-23 15:20:29', NULL),
('C005', '12345@gmail.com', '$2y$10$2SuSx/8SnEPIyoBd4sA.7..h0AjlRTMIEvpGnmFghQhIE4v1fsPe.', 'Ibnu', NULL, 'CUSTOMER', '2024-12-21 17:42:55', '2024-12-23 15:20:29', NULL),
('C006', '45678@gmail.com', '$2y$10$5y4lLb6JwG/Q2m8zUF4bI.65R5bUZU2e5vTrO2nNDsh1boEd794U2', 'patrick', NULL, 'CUSTOMER', '2024-12-21 17:53:39', NULL, NULL),
('C007', 'bbbbbb@gmail.com', '$2y$10$HnwZhzU13lFGI5rI7zqvq.QwBW4nQIQNk7sRrWWmLdBgozOG1wa6K', 'haloooo', NULL, 'CUSTOMER', '2024-12-21 18:03:07', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`),
  ADD KEY `idx_bookings_user` (`user_id`),
  ADD KEY `idx_bookings_place` (`place_id`);

--
-- Indexes for table `bookingstatus`
--
ALTER TABLE `bookingstatus`
  ADD PRIMARY KEY (`status`);

--
-- Indexes for table `business_profiles`
--
ALTER TABLE `business_profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `customer_profiles`
--
ALTER TABLE `customer_profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_places_business` (`business_id`);

--
-- Indexes for table `place_images`
--
ALTER TABLE `place_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `place_id` (`place_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `idx_reviews_place` (`place_id`);

--
-- Indexes for table `tourism_statistics`
--
ALTER TABLE `tourism_statistics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_statistics_city_date` (`city`,`year`,`month`);

--
-- Indexes for table `userrole`
--
ALTER TABLE `userrole`
  ADD PRIMARY KEY (`role`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`),
  ADD CONSTRAINT `bookings_ibfk_3` FOREIGN KEY (`status`) REFERENCES `bookingstatus` (`status`);

--
-- Constraints for table `business_profiles`
--
ALTER TABLE `business_profiles`
  ADD CONSTRAINT `business_profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `customer_profiles`
--
ALTER TABLE `customer_profiles`
  ADD CONSTRAINT `customer_profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `places_ibfk_1` FOREIGN KEY (`business_id`) REFERENCES `business_profiles` (`id`);

--
-- Constraints for table `place_images`
--
ALTER TABLE `place_images`
  ADD CONSTRAINT `place_images_ibfk_1` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
