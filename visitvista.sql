-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2024 at 07:41 AM
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
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `place_id` varchar(255) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `visit_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `number_of_tickets` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `verification_status` varchar(50) NOT NULL DEFAULT 'PENDING',
  `document_url` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_profiles`
--

INSERT INTO `business_profiles` (`id`, `user_id`, `business_name`, `address`, `city`, `description`, `verification_status`, `document_url`, `created_at`) VALUES
('BP003', 'B003', 'Jogja Heritage Tours', 'Jl. Malioboro No. 45', 'Yogyakarta', 'Specializing in cultural and historical tours around Yogyakarta', 'VERIFIED', NULL, '2024-11-22 16:25:09'),
('BP004', 'B004', 'Bandung Adventure Tours', 'Jl. Dago No. 123', 'Bandung', 'Adventure and nature tours in and around Bandung', 'VERIFIED', NULL, '2024-11-22 16:25:09'),
('BP005', 'B005', 'Raja Ampat Diving Center', 'Jl. Waisai Raya No. 7', 'Raja Ampat', 'Premier diving experience in Raja Ampat', 'VERIFIED', NULL, '2024-11-22 16:25:09'),
('BP006', 'B006', 'Toraja Cultural Experience', 'Jl. Poros Makale No. 88', 'Toraja', 'Authentic Toraja cultural experiences and tours', 'VERIFIED', NULL, '2024-11-22 16:25:09');

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
('P004', 'BP003', 'Borobudur Sunrise Tour', 'Experience the magical sunrise at the world\'s largest Buddhist temple. Includes hotel pickup, traditional breakfast, and guided tour.', 'Borobudur Temple, Yogyakarta', 'Yogyakarta', 75.00, 25, 'Cultural', 4.90, '2024-11-22 16:25:09', '2024-11-22 16:25:09'),
('P005', 'BP003', 'Prambanan Temple Evening Tour', 'Visit the magnificent Hindu temple complex during sunset, followed by the spectacular Ramayana Ballet performance.', 'Prambanan Temple, Yogyakarta', 'Yogyakarta', 60.00, 30, 'Cultural', 4.80, '2024-11-22 16:25:09', '2024-11-22 16:25:09'),
('P006', 'BP003', 'Kraton & Malioboro Walking Tour', 'Explore the Sultan\'s Palace and vibrant Malioboro street. Experience traditional Javanese culture and modern city life.', 'Kraton Area, Yogyakarta', 'Yogyakarta', 25.00, 15, 'Cultural', 4.70, '2024-11-22 16:25:09', '2024-11-22 16:25:09'),
('P007', 'BP004', 'Tangkuban Perahu Volcano Tour', 'Visit the famous volcano crater, enjoy the natural hot springs, and learn about local geology.', 'Tangkuban Perahu, Bandung', 'Bandung', 45.00, 20, 'Nature', 4.60, '2024-11-22 16:25:09', '2024-11-22 16:25:09'),
('P008', 'BP004', 'Kawah Putih Day Trip', 'Explore the stunning white crater lake, surrounded by misty mountains and lush forests.', 'Kawah Putih, Bandung', 'Bandung', 55.00, 15, 'Nature', 4.80, '2024-11-22 16:25:09', '2024-11-22 16:25:09'),
('P009', 'BP004', 'Dago Tea House Experience', 'Visit a historic tea plantation, learn about tea processing, and enjoy high tea with city views.', 'Dago, Bandung', 'Bandung', 35.00, 25, 'Cultural', 4.50, '2024-11-22 16:25:09', '2024-11-22 16:25:09'),
('P010', 'BP005', 'Wayag Island Hopping', 'Explore the iconic limestone karst islands, snorkel in pristine waters, and climb for panoramic views.', 'Wayag, Raja Ampat', 'Raja Ampat', 150.00, 10, 'Adventure', 5.00, '2024-11-22 16:25:09', '2024-11-22 16:25:09'),
('P011', 'BP005', 'Diving at Melissa\'s Garden', 'Discover one of the world\'s most beautiful coral reefs with experienced diving instructors.', 'Melissa\'s Garden, Raja Ampat', 'Raja Ampat', 200.00, 8, 'Adventure', 4.90, '2024-11-22 16:25:09', '2024-11-22 16:25:09'),
('P012', 'BP005', 'Arborek Village Cultural Visit', 'Experience local Papuan culture, learn traditional dances, and try handicraft making.', 'Arborek, Raja Ampat', 'Raja Ampat', 85.00, 12, 'Cultural', 4.70, '2024-11-22 16:25:09', '2024-11-22 16:25:09'),
('P013', 'BP006', 'Tana Toraja Heritage Tour', 'Explore traditional villages, visit ancient burial sites, and witness unique architectural heritage.', 'Tana Toraja', 'Toraja', 65.00, 15, 'Cultural', 4.80, '2024-11-22 16:25:09', '2024-11-22 16:25:09'),
('P014', 'BP006', 'Toraja Coffee Experience', 'Visit coffee plantations, learn about traditional coffee processing, and taste authentic Toraja coffee.', 'Toraja Highland', 'Toraja', 40.00, 20, 'Cultural', 4.60, '2024-11-22 16:25:09', '2024-11-22 16:25:09'),
('P015', 'BP006', 'Ke\'te\' Kesu Village Tour', 'Visit one of the most beautiful and well-preserved traditional villages in Toraja.', 'Ke\'te\' Kesu, Toraja', 'Toraja', 35.00, 20, 'Cultural', 4.70, '2024-11-22 16:25:09', '2024-11-22 16:25:09');

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

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `place_id` varchar(255) NOT NULL,
  `booking_id` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ;

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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `phone`, `role`, `created_at`, `updated_at`) VALUES
('B003', 'jogja.heritage@example.com', '$2y$10$abcdefghijklmnopqrstuv', 'Jogja Heritage', '+6281234567895', 'BUSINESS', '2024-11-22 16:25:09', '2024-11-22 16:25:09'),
('B004', 'bandung.adventure@example.com', '$2y$10$abcdefghijklmnopqrstuv', 'Bandung Adventure', '+6281234567896', 'BUSINESS', '2024-11-22 16:25:09', '2024-11-22 16:25:09'),
('B005', 'raja.ampat@example.com', '$2y$10$abcdefghijklmnopqrstuv', 'Raja Ampat Diving', '+6281234567897', 'BUSINESS', '2024-11-22 16:25:09', '2024-11-22 16:25:09'),
('B006', 'toraja.cultural@example.com', '$2y$10$abcdefghijklmnopqrstuv', 'Toraja Cultural Tours', '+6281234567898', 'BUSINESS', '2024-11-22 16:25:09', '2024-11-22 16:25:09');

--
-- Indexes for dumped tables
--

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
-- Constraints for table `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `places_ibfk_1` FOREIGN KEY (`business_id`) REFERENCES `business_profiles` (`id`);

--
-- Constraints for table `place_images`
--
ALTER TABLE `place_images`
  ADD CONSTRAINT `place_images_ibfk_1` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`),
  ADD CONSTRAINT `reviews_ibfk_3` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `userrole` (`role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
