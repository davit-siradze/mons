-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- ჰოსტი: localhost:3306
-- გენერაციის დრო: ივნ 10, 2025, 03:25 PM
-- სერვერის ვერსია: 10.6.22-MariaDB-0ubuntu0.22.04.1
-- PHP-ის ვერსია: 8.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- მონაცემთა ბაზა: `business_eagles`
--

-- --------------------------------------------------------

--
-- Table structure for table `festivals`
--

CREATE TABLE `festivals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `keyword` varchar(191) DEFAULT NULL,
  `description` varchar(191) DEFAULT NULL,
  `short_desc` text DEFAULT NULL,
  `overview` text DEFAULT NULL,
  `outline` text DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `form_id` int(11) DEFAULT NULL,
  `cover` varchar(191) DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `video` varchar(191) DEFAULT NULL,
  `pdf` varchar(191) DEFAULT NULL,
  `file` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `festivals`
--

INSERT INTO `festivals` (`id`, `title`, `keyword`, `description`, `short_desc`, `overview`, `outline`, `category_id`, `form_id`, `cover`, `image`, `video`, `pdf`, `file`, `created_at`, `updated_at`, `location_id`) VALUES
(9, 'test festival', 'fest', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. </p>', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. </p>', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. </p>', 1, NULL, NULL, 'public/upload/image-png/2023-08-31/Coures -1_397d221132bfc6d2a04f1a41f13c7b57.png', NULL, NULL, NULL, '2025-05-17 13:06:28', '2025-05-17 13:06:28', 1),
(10, 'test festival', 'fest', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>', 1, NULL, 'public/upload/image-jpeg/2023-07-29/PP logo_5d70712cf127472edda324889ca4262d.jpg', 'public/upload/image-png/2023-08-31/Online Course_dc13608515fbe20274e533674cf55a48.png', NULL, NULL, NULL, '2025-05-28 13:25:23', '2025-05-28 13:25:23', 1);

--
-- ინდექსები გამოტანილი ცხრილებისთვის
--

--
-- ინდექსები ცხრილისთვის `festivals`
--
ALTER TABLE `festivals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT ცხრილისთვის `festivals`
--
ALTER TABLE `festivals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
