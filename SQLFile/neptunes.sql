-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2026 at 03:49 AM
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
-- Database: `neptunes`
--

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
(1, '2026_03_17_051253_create_su_user_logs_table', 1),
(2, '2026_03_17_055453_create_su_admin_2fa_tokens_table', 2),
(3, '2026_03_17_061610_create_contact_messages_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `su_admin_2fa_tokens`
--

CREATE TABLE `su_admin_2fa_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `expires_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `su_admin_2fa_tokens`
--

INSERT INTO `su_admin_2fa_tokens` (`id`, `user_id`, `code`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 6, '662901', '2026-03-18 09:23:54', '2026-03-18 09:18:54', '2026-03-18 09:18:54'),
(2, 3, '520643', '2026-04-15 04:48:13', '2026-04-15 04:38:03', '2026-04-15 04:43:13');

-- --------------------------------------------------------

--
-- Table structure for table `su_blogs`
--

CREATE TABLE `su_blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `author_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `content` longtext NOT NULL,
  `status` enum('draft','published') DEFAULT 'draft',
  `published_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `su_blogs`
--

INSERT INTO `su_blogs` (`id`, `category_id`, `author_id`, `title`, `slug`, `featured_image`, `content`, `status`, `published_at`, `created_at`, `updated_at`) VALUES
(15, 1, 3, 'Ultimate Guide to Stress-Free House Moving', 'ultimate-guide-to-stress-free-house-moving', '1776407005_office-rearrangment-image.jpg', '<p>Moving to a new home can be overwhelming. In this guide, we share expert tips to help you plan, pack, and move efficiently without stress.</p>', 'published', '2026-04-17 09:18:38', '2026-04-17 06:18:38', '2026-04-17 03:23:25'),
(16, 1, 3, 'How to Plan a Smooth Office Relocation', 'how-to-plan-a-smooth-office-relocation', '1776407016_people-loading-track.jpg', '<p>Office relocation requires proper coordination. Learn how to minimize downtime and ensure a seamless transition for your business.</p>', 'published', '2026-04-17 09:18:38', '2026-04-17 06:18:38', '2026-04-17 03:23:36'),
(17, 1, 3, 'Tips for Safe Inter-County Moving', 'tips-for-safe-inter-county-moving', '1776407030_team-wrapping-office-equipment.jpg', '<p>Long-distance moving comes with challenges. Discover how to protect your belongings during inter-county moves.</p>', 'published', '2026-04-17 09:18:38', '2026-04-17 06:18:38', '2026-04-17 03:23:50'),
(18, 1, 3, 'Why Professional TV Mounting Matters', 'why-professional-tv-mounting-matters', '1776407050_holding-a-small-package.jpg', '<p>Mounting your TV correctly enhances safety and viewing experience. Here’s why you should trust professionals.</p>', 'published', '2026-04-17 09:18:38', '2026-04-17 06:18:38', '2026-04-17 03:24:10'),
(20, 1, 3, 'Benefits of Professional Cleaning and Fumigation', 'benefits-of-professional-cleaning-and-fumigation', '1776407063_person-pushing-luggage.jpg', '<p>Keep your home or office safe and hygienic with professional cleaning and fumigation services.</p>', 'published', '2026-04-17 09:18:38', '2026-04-17 06:18:38', '2026-04-17 03:24:23');

-- --------------------------------------------------------

--
-- Table structure for table `su_blog_categories`
--

CREATE TABLE `su_blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `su_blog_categories`
--

INSERT INTO `su_blog_categories` (`id`, `name`, `slug`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Relocation', 'relocation', 'Articles about relocation', '71066cf1-481d-4f86-a896-1169589e288f.jpg', '2026-03-15 04:31:56', '2026-03-15 02:38:23');

-- --------------------------------------------------------

--
-- Table structure for table `su_bookings`
--

CREATE TABLE `su_bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quotation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `booking_reference` varchar(100) DEFAULT NULL,
  `scheduled_date` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `total_cost` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `su_booking_orders`
--

CREATE TABLE `su_booking_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(100) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'pending',
  `notes` text DEFAULT NULL,
  `scheduled_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `assigned_to` bigint(20) UNSIGNED DEFAULT NULL,
  `vehicle_id` bigint(20) UNSIGNED DEFAULT NULL,
  `dispatch_status` varchar(50) DEFAULT 'pending',
  `started_at` datetime DEFAULT NULL,
  `completed_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `su_condition_reports`
--

CREATE TABLE `su_condition_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `report_number` varchar(100) DEFAULT NULL,
  `condition_notes` text DEFAULT NULL,
  `status` varchar(50) DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `su_documents`
--

CREATE TABLE `su_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `booking_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reference_type` varchar(50) DEFAULT NULL,
  `reference_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `file_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `su_failed_jobs`
--

CREATE TABLE `su_failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `su_files`
--

CREATE TABLE `su_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) NOT NULL,
  `file_type` varchar(50) DEFAULT NULL,
  `mime_type` varchar(100) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `uploaded_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `su_invoices`
--

CREATE TABLE `su_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quotation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `subtotal` decimal(10,2) DEFAULT 0.00,
  `tax` decimal(10,2) DEFAULT 0.00,
  `total` decimal(10,2) NOT NULL,
  `status` enum('pending','paid','cancelled') DEFAULT 'pending',
  `issued_at` datetime DEFAULT NULL,
  `due_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `su_jobs`
--

CREATE TABLE `su_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(11) DEFAULT NULL,
  `available_at` int(11) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `su_moves`
--

CREATE TABLE `su_moves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `move_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `su_move_reports`
--

CREATE TABLE `su_move_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `move_id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED DEFAULT NULL,
  `report_number` varchar(100) DEFAULT NULL,
  `summary` text DEFAULT NULL,
  `issues` text DEFAULT NULL,
  `completed_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `su_notifications`
--

CREATE TABLE `su_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `su_notifications`
--

INSERT INTO `su_notifications` (`id`, `user_id`, `title`, `message`, `is_read`, `created_at`) VALUES
(1, 2, 'Payment Successful', 'Your payment has been received.', 0, '2026-03-15 04:35:02'),
(2, 2, 'Live Stream Reminder', 'Your stream starts in 1 hour.', 0, '2026-03-15 04:35:02');

-- --------------------------------------------------------

--
-- Table structure for table `su_pages`
--

CREATE TABLE `su_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` longtext DEFAULT NULL,
  `status` enum('draft','published') DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `su_pages`
--

INSERT INTO `su_pages` (`id`, `title`, `slug`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 'About Us', 'about-us', 'About Elite Hub Bootcamp...', 'published', '2026-03-15 04:35:02', '2026-03-15 04:35:02'),
(2, 'Terms and Conditions', 'terms-and-conditions', 'Terms of service...', 'published', '2026-03-15 04:35:02', '2026-03-15 04:35:02'),
(3, 'Privacy Policy', 'privacy-policy', 'Privacy policy content...', 'published', '2026-03-15 04:35:02', '2026-03-15 04:35:02');

-- --------------------------------------------------------

--
-- Table structure for table `su_password_reset_tokens`
--

CREATE TABLE `su_password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `su_password_reset_tokens`
--

INSERT INTO `su_password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('info@elitehubcamp.com', '$2y$12$VpE7rhoMuElSi5bWaUblb.hhWyeKoslcozOJE85yJdUUDXM94BDUK', '2026-03-14 11:26:26'),
('sifuna.godfreyw@gmail.com', '$2y$12$xeC1VJCwNJE3dFTaGg/opeOrnk6hQn/1Ttd52ElaKmeiiIBMzPZ5W', '2026-03-17 04:19:45');

-- --------------------------------------------------------

--
-- Table structure for table `su_personal_access_tokens`
--

CREATE TABLE `su_personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `su_quotations`
--

CREATE TABLE `su_quotations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pickup_location` varchar(255) DEFAULT NULL,
  `dropoff_location` varchar(255) DEFAULT NULL,
  `move_date` date DEFAULT NULL,
  `move_type` varchar(100) DEFAULT NULL,
  `urgency` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `estimated_cost` decimal(10,2) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `su_quotations`
--

INSERT INTO `su_quotations` (`id`, `user_id`, `first_name`, `last_name`, `phone_number`, `email`, `pickup_location`, `dropoff_location`, `move_date`, `move_type`, `urgency`, `description`, `estimated_cost`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Godfrey', 'Sifuna', '+254706006230', 'sifuna.godfreyw@gmail.com', 'ss', 'ss', NULL, 'House Move', 'Flexible', 'sass', NULL, 'pending', '2026-04-20 05:55:10', '2026-04-20 05:55:10'),
(2, NULL, 'Godfrey', 'Sifuna', '+254706006230', 'sifuna.godfreyw@gmail.com', 'Juja Farm', 'ss', NULL, 'House Move', 'Within 7 days', 'jhjhhggh', NULL, 'pending', '2026-04-20 06:06:58', '2026-04-20 06:06:58'),
(3, NULL, 'Godfrey', 'Sifuna', '+254706006230', 'sifuna.godfreyw@gmail.com', 'Ongata Rongai', 'q', NULL, 'House Move', 'Within 7 days', 'wq', NULL, 'pending', '2026-04-20 06:11:18', '2026-04-20 06:11:18');

-- --------------------------------------------------------

--
-- Table structure for table `su_receipts`
--

CREATE TABLE `su_receipts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `receipt_number` varchar(100) NOT NULL,
  `amount_paid` decimal(10,2) NOT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `paid_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `su_reviews`
--

CREATE TABLE `su_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `booking_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `su_routes`
--

CREATE TABLE `su_routes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `move_id` bigint(20) UNSIGNED DEFAULT NULL,
  `start_location` varchar(255) DEFAULT NULL,
  `end_location` varchar(255) DEFAULT NULL,
  `distance` decimal(10,2) DEFAULT NULL,
  `estimated_duration` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `su_routes`
--

INSERT INTO `su_routes` (`id`, `move_id`, `start_location`, `end_location`, `distance`, `estimated_duration`, `created_at`) VALUES
(1, NULL, 'Nairobi', 'Ongata Rongai', NULL, '2 Hours', '2026-04-16 08:10:23');

-- --------------------------------------------------------

--
-- Table structure for table `su_route_tracking`
--

CREATE TABLE `su_route_tracking` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `route_id` bigint(20) UNSIGNED DEFAULT NULL,
  `latitude` decimal(10,7) DEFAULT NULL,
  `longitude` decimal(10,7) DEFAULT NULL,
  `recorded_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `su_services`
--

CREATE TABLE `su_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `su_services`
--

INSERT INTO `su_services` (`id`, `title`, `slug`, `description`, `icon`, `image`, `status`, `created_at`, `updated_at`) VALUES
(10, 'House Moving', 'house-moving', 'Professional and stress-free house moving services tailored to your needs.', NULL, '1776406785_packing-to-relocate-one-bedroom-house.jpg', 1, '2026-04-17 06:14:18', '2026-04-17 03:19:45'),
(11, 'Office Relocation', 'office-relocation', 'Efficient office moving solutions to minimize downtime and disruption.', NULL, '1776406794_boxing-computers-for-relocation.jpg', 1, '2026-04-17 06:14:18', '2026-04-17 03:19:54'),
(12, 'Inter-County Moves', 'inter-county-moves', 'Reliable long-distance moving services across counties.', NULL, '1776406817_a-person-loading-a-van.jpg', 1, '2026-04-17 06:14:18', '2026-04-17 03:20:17'),
(13, 'TV Mounting & DSTV Installation', 'tv-mounting-dstv-installation', 'Expert TV mounting and DSTV installation services for your home or office.', NULL, '1776406847_holding-a-small-package.jpg', 1, '2026-04-17 06:14:18', '2026-04-17 03:20:47'),
(15, 'Home Decluttering', 'home-decluttering', 'Organize and declutter your space for a cleaner, more comfortable home.', NULL, '1776406901_picking-something-from-bag.jpg', 1, '2026-04-17 06:14:18', '2026-04-17 03:21:41'),
(17, 'Secure Storage', 'secure-storage', 'Safe and secure storage solutions for your belongings.', NULL, '1776406883_luggage-with-white-background.jpg', 1, '2026-04-17 06:14:18', '2026-04-17 03:21:23'),
(18, 'Errands & Deliveries', 'errands-deliveries', 'Fast and reliable errands and delivery services.', NULL, '1776406869_package-ready-for-shipping.jpg', 1, '2026-04-17 06:14:18', '2026-04-17 03:21:09');

-- --------------------------------------------------------

--
-- Table structure for table `su_sessions`
--

CREATE TABLE `su_sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `su_settings`
--

CREATE TABLE `su_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(255) DEFAULT NULL,
  `site_email` varchar(150) DEFAULT NULL,
  `support_email` varchar(150) DEFAULT NULL,
  `support_phone` varchar(50) DEFAULT NULL,
  `whatsapp_number` varchar(50) DEFAULT NULL,
  `alternative_phone` varchar(50) DEFAULT NULL,
  `business_location` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `tiktok` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `su_settings`
--

INSERT INTO `su_settings` (`id`, `site_name`, `site_email`, `support_email`, `support_phone`, `whatsapp_number`, `alternative_phone`, `business_location`, `facebook`, `instagram`, `linkedin`, `tiktok`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 'Neptune Movers & Relocation', 'info@neptunesmovers.com', 'info@neptunesmovers.com', '+254111675793', '+254111675793', NULL, 'Parklands - Nairobi, Kenya', '#', '#', NULL, '#', '#', NULL, '2026-04-16 04:12:01');

-- --------------------------------------------------------

--
-- Table structure for table `su_users`
--

CREATE TABLE `su_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','suspended','pending') DEFAULT 'active',
  `has_active_subscription` tinyint(1) DEFAULT 0,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `su_users`
--

INSERT INTO `su_users` (`id`, `role_id`, `first_name`, `last_name`, `email`, `phone`, `password`, `avatar`, `email_verified_at`, `status`, `has_active_subscription`, `last_login_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 1, 'Godfrey', 'Sifuna', 'sifuna.godfreyw@gmail.com', NULL, '$2y$12$RRIn7YctjjwNkwNk/1waxOEAi3.62M34fNY84xqwBYNbQKr5DKqE2', NULL, NULL, 'active', 0, NULL, NULL, '2026-03-14 11:29:11', '2026-03-14 11:29:11');

-- --------------------------------------------------------

--
-- Table structure for table `su_user_logs`
--

CREATE TABLE `su_user_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text DEFAULT NULL,
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`meta`)),
  `ip_address` varchar(255) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `status` enum('success','failed','pending') NOT NULL DEFAULT 'success',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `su_user_logs`
--

INSERT INTO `su_user_logs` (`id`, `user_id`, `type`, `title`, `message`, `meta`, `ip_address`, `user_agent`, `status`, `created_at`) VALUES
(1, NULL, 'email', 'Welcome Email Failed', 'Connection could not be established with host \"mail.elitehubcamp.com:587\": stream_socket_client(): Unable to connect to mail.elitehubcamp.com:587 (A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond)', '{\"email\":\"hopesifuna@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'failed', '2026-03-17 05:42:22'),
(2, NULL, 'email', 'Verification Email Failed', 'Connection could not be established with host \"mail.elitehubcamp.com:587\": stream_socket_client(): Unable to connect to mail.elitehubcamp.com:587 (A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond)', '{\"email\":\"hopesifuna@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'failed', '2026-03-17 05:42:43'),
(3, NULL, 'registration', 'User Registered', 'New user account created', '{\"email\":\"hopesifuna@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'success', '2026-03-17 05:42:43'),
(4, NULL, 'email', 'Password Reset Email Failed', 'Connection could not be established with host \"mail.elitehubcamp.com:587\": stream_socket_client(): Unable to connect to mail.elitehubcamp.com:587 (A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond)', '{\"email\":\"sifuna.godfreyw@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'failed', '2026-03-17 05:51:44'),
(5, NULL, 'password', 'Password Reset Requested', 'Reset email sent', '{\"email\":\"sifuna.godfreyw@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'success', '2026-03-17 05:51:44'),
(6, NULL, 'admin_login', 'Admin Login Failed', 'Invalid credentials', '{\"email\":\"sifuna.godfrey@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'failed', '2026-03-17 06:17:56'),
(7, NULL, 'admin_login', 'Admin Login Failed', 'Invalid credentials', '{\"email\":\"sifuna.godfrey@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'failed', '2026-03-17 06:18:03'),
(8, NULL, 'email', 'Welcome Email Failed', 'Connection could not be established with host \"mail.elitehubcamp.com:587\": stream_socket_client(): Unable to connect to mail.elitehubcamp.com:587 (A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond)', '{\"email\":\"sifuna.godfrey@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'failed', '2026-03-17 07:18:59'),
(9, NULL, 'email', 'Verification Email Failed', 'Connection could not be established with host \"mail.elitehubcamp.com:587\": stream_socket_client(): Unable to connect to mail.elitehubcamp.com:587 (A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond)', '{\"email\":\"sifuna.godfrey@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'failed', '2026-03-17 07:19:20'),
(10, NULL, 'registration', 'User Registered', 'New user account created', '{\"email\":\"sifuna.godfrey@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'success', '2026-03-17 07:19:20'),
(11, NULL, 'email', 'Password Reset Email Failed', 'Connection could not be established with host \"mail.elitehubcamp.com:587\": stream_socket_client(): Unable to connect to mail.elitehubcamp.com:587 (A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond)', '{\"email\":\"sifuna.godfreyw@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'failed', '2026-03-17 07:20:06'),
(12, NULL, 'password', 'Password Reset Requested', 'Reset email sent', '{\"email\":\"sifuna.godfreyw@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'success', '2026-03-17 07:20:06'),
(13, NULL, 'login', 'User Logged In', 'User logged in successfully', '{\"email\":\"sifuna.godfrey@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'success', '2026-03-17 10:12:43'),
(14, NULL, 'logout', 'User Logged Out', 'User logged out', '{\"email\":\"sifuna.godfrey@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'success', '2026-03-17 10:15:49'),
(15, 8, 'login', 'User Logged In', 'User logged in successfully', '{\"email\":\"hopesifuna@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'success', '2026-03-17 10:15:59'),
(16, 8, 'logout', 'User Logged Out', 'User logged out', '{\"email\":\"hopesifuna@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'success', '2026-03-17 10:16:39'),
(17, 8, 'login', 'User Logged In', 'User logged in successfully', '{\"email\":\"hopesifuna@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'success', '2026-03-17 10:16:55'),
(18, 8, 'logout', 'User Logged Out', 'User logged out', '{\"email\":\"hopesifuna@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'success', '2026-03-17 10:24:41'),
(19, 8, 'login', 'User Logged In', 'User logged in successfully', '{\"email\":\"hopesifuna@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'success', '2026-03-18 09:59:22'),
(20, 8, 'logout', 'User Logged Out', 'User logged out', '{\"email\":\"hopesifuna@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'success', '2026-03-18 10:00:14'),
(21, NULL, 'email', 'Verification Email Failed', 'Connection could not be established with host \"mail.elitehubcamp.com:587\": stream_socket_client(): Unable to connect to mail.elitehubcamp.com:587 (A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond)', '{\"email\":\"hopesifunaa@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'failed', '2026-03-18 10:02:57'),
(22, NULL, 'email', 'Welcome Email Failed', 'Connection could not be established with host \"mail.elitehubcamp.com:587\": stream_socket_client(): Unable to connect to mail.elitehubcamp.com:587 (A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond)', '{\"email\":\"hopesifunaa@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'failed', '2026-03-18 10:03:18'),
(23, NULL, 'registration', 'User Registered', 'New user account created', '{\"email\":\"hopesifunaa@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'success', '2026-03-18 10:03:18'),
(24, 10, 'logout', 'User Logged Out', 'User logged out', '{\"email\":\"hopesifunaa@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'success', '2026-03-18 10:03:30'),
(25, 10, 'login', 'User Logged In', 'User logged in successfully', '{\"email\":\"hopesifunaa@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'success', '2026-03-18 10:03:46'),
(26, 10, 'logout', 'User Logged Out', 'User logged out', '{\"email\":\"hopesifunaa@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'success', '2026-03-18 12:16:51'),
(27, 10, 'login', 'User Logged In', 'User logged in successfully', '{\"email\":\"hopesifunaa@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'success', '2026-03-18 12:17:47'),
(28, NULL, 'email', 'Verification Email Failed', 'Connection could not be established with host \"mail.elitehubcamp.com:587\": stream_socket_client(): Unable to connect to mail.elitehubcamp.com:587 (A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond)', '{\"email\":\"hopesifunaaa@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'failed', '2026-03-18 12:17:49'),
(29, 10, 'logout', 'User Logged Out', 'User logged out', '{\"email\":\"hopesifunaa@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'success', '2026-03-18 12:18:09'),
(30, NULL, 'email', 'Welcome Email Failed', 'Connection could not be established with host \"mail.elitehubcamp.com:587\": stream_socket_client(): Unable to connect to mail.elitehubcamp.com:587 (A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond)', '{\"email\":\"hopesifunaaa@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'failed', '2026-03-18 12:18:10'),
(31, NULL, 'registration', 'User Registered', 'New user account created', '{\"email\":\"hopesifunaaa@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'success', '2026-03-18 12:18:10'),
(32, NULL, 'admin_login', 'Unauthorized Admin Access', 'User attempted admin login', '{\"email\":\"hopesifunaa@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'failed', '2026-03-18 12:18:17'),
(33, 6, 'email', '2FA Email Failed', 'Connection could not be established with host \"mail.elitehubcamp.com:587\": stream_socket_client(): Unable to connect to mail.elitehubcamp.com:587 (A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond)', '{\"email\":\"info@elitehubcamp.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'failed', '2026-03-18 12:19:15'),
(34, NULL, 'admin_login', '2FA Code Sent', 'Admin login requires OTP', '{\"email\":\"info@elitehubcamp.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'success', '2026-03-18 12:19:15'),
(35, NULL, 'email', 'Verification Email Failed', 'Connection could not be established with host \"mail.elitehubcamp.com:587\": stream_socket_client(): Unable to connect to mail.elitehubcamp.com:587 (A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond)', '{\"email\":\"admin@elitehubcamp.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'failed', '2026-03-18 14:04:51'),
(36, NULL, 'email', 'Welcome Email Failed', 'Connection could not be established with host \"mail.elitehubcamp.com:587\": stream_socket_client(): Unable to connect to mail.elitehubcamp.com:587 (A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond)', '{\"email\":\"admin@elitehubcamp.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'failed', '2026-03-18 14:05:12'),
(37, NULL, 'registration', 'User Registered', 'New user account created', '{\"email\":\"admin@elitehubcamp.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'success', '2026-03-18 14:05:12'),
(38, NULL, 'admin_login', 'Unauthorized Admin Access', 'User attempted admin login', '{\"email\":\"sifuna.godfrey@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'failed', '2026-04-15 07:11:35'),
(39, NULL, 'admin_login', 'Unauthorized Admin Access', 'User attempted admin login', '{\"email\":\"sifuna.godfrey@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'failed', '2026-04-15 07:22:51'),
(40, NULL, 'admin_login', 'Unauthorized Admin Access', 'User attempted admin login', '{\"email\":\"sifuna.godfrey@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'failed', '2026-04-15 07:22:51'),
(41, NULL, 'admin_login', 'Unauthorized Admin Access', 'User attempted admin login', '{\"email\":\"sifuna.godfrey@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'failed', '2026-04-15 07:22:55'),
(42, NULL, 'admin_login', 'Unauthorized Admin Access', 'User attempted admin login', '{\"email\":\"sifuna.godfrey@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'failed', '2026-04-15 07:24:24'),
(43, NULL, 'admin_login', 'Admin Login Failed', 'Invalid credentials', '{\"email\":\"sifuna.godfrey@gsmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'failed', '2026-04-15 07:24:40'),
(44, NULL, 'admin_login', 'Admin Login Failed', 'Invalid credentials', '{\"email\":\"sifuna.godfrey@gsmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'failed', '2026-04-15 07:24:40'),
(45, NULL, 'admin_login', 'Unauthorized Admin Access', 'User attempted admin login', '{\"email\":\"sifuna.godfrey@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'failed', '2026-04-15 07:26:31'),
(46, NULL, 'admin_login', 'Admin Login Failed', 'Invalid credentials', '{\"email\":\"sifuna.godfrey@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'failed', '2026-04-15 07:34:22'),
(47, NULL, 'admin_login', 'Admin Login Failed', 'Invalid credentials', '{\"email\":\"sifuna.godfrey@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'failed', '2026-04-15 07:34:26'),
(48, 3, 'email', '2FA Email Failed', 'Connection could not be established with host \"mail.neptunesmovers.com:587\": stream_socket_client(): Unable to connect to mail.neptunesmovers.com:587 (A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond)', '{\"email\":\"sifuna.godfreyw@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'failed', '2026-04-15 07:38:25'),
(49, NULL, 'admin_login', '2FA Code Sent', 'Admin login requires OTP', '{\"email\":\"sifuna.godfreyw@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'success', '2026-04-15 07:38:25'),
(50, 3, 'email', '2FA Email Failed', 'Connection could not be established with host \"mail.neptunesmovers.com:587\": stream_socket_client(): Unable to connect to mail.neptunesmovers.com:587 (A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond)', '{\"email\":\"sifuna.godfreyw@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'failed', '2026-04-15 07:43:34'),
(51, NULL, 'admin_login', '2FA Code Sent', 'Admin login requires OTP', '{\"email\":\"sifuna.godfreyw@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'success', '2026-04-15 07:43:34'),
(52, 3, 'email', '2FA Email Failed', 'Connection could not be established with host \"mail.neptunesmovers.com:587\": stream_socket_client(): Unable to connect to mail.neptunesmovers.com:587 (A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond)', '{\"email\":\"sifuna.godfreyw@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'failed', '2026-04-15 07:43:34'),
(53, NULL, 'admin_login', '2FA Code Sent', 'Admin login requires OTP', '{\"email\":\"sifuna.godfreyw@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'success', '2026-04-15 07:43:34'),
(54, 3, 'admin_login', 'Admin Login Success', 'Admin logged in successfully', '{\"user_id\":3}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'success', '2026-04-15 07:47:32'),
(55, NULL, 'admin_login', 'Admin Login Failed', 'Invalid credentials', '{\"email\":\"sifuna.godfreyw@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'failed', '2026-04-16 06:17:08'),
(56, 3, 'admin_login', 'Admin Login Success', 'Admin logged in successfully', '{\"user_id\":3}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'success', '2026-04-16 06:17:13'),
(57, 3, 'admin_login', 'Admin Login Success', 'Admin logged in successfully', '{\"user_id\":3}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'success', '2026-04-16 06:17:13'),
(58, 3, 'logout', 'User Logged Out', 'User logged out', '{\"email\":\"sifuna.godfreyw@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'success', '2026-04-16 11:25:35'),
(59, 3, 'login', 'User Logged In', 'User logged in successfully', '{\"email\":\"sifuna.godfreyw@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'success', '2026-04-16 11:25:43'),
(60, 3, 'login', 'User Logged In', 'User logged in successfully', '{\"email\":\"sifuna.godfreyw@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'success', '2026-04-17 06:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `su_user_profiles`
--

CREATE TABLE `su_user_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `file_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `su_user_roles`
--

CREATE TABLE `su_user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `su_user_roles`
--

INSERT INTO `su_user_roles` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', NULL, NULL, NULL),
(2, 'User', 'user', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `su_vehicles`
--

CREATE TABLE `su_vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_name` varchar(100) DEFAULT NULL,
  `plate_number` varchar(50) DEFAULT NULL,
  `capacity` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `su_vehicle_assignments`
--

CREATE TABLE `su_vehicle_assignments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `move_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vehicle_id` bigint(20) UNSIGNED DEFAULT NULL,
  `assigned_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `su_admin_2fa_tokens`
--
ALTER TABLE `su_admin_2fa_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `su_admin_2fa_tokens_user_id_foreign` (`user_id`);

--
-- Indexes for table `su_blogs`
--
ALTER TABLE `su_blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `su_blog_categories`
--
ALTER TABLE `su_blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `su_bookings`
--
ALTER TABLE `su_bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `quotation_id` (`quotation_id`);

--
-- Indexes for table `su_booking_orders`
--
ALTER TABLE `su_booking_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `su_condition_reports`
--
ALTER TABLE `su_condition_reports`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `report_number` (`report_number`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `su_documents`
--
ALTER TABLE `su_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `file_id` (`file_id`);

--
-- Indexes for table `su_failed_jobs`
--
ALTER TABLE `su_failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`);

--
-- Indexes for table `su_files`
--
ALTER TABLE `su_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uploaded_by` (`uploaded_by`);

--
-- Indexes for table `su_invoices`
--
ALTER TABLE `su_invoices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoice_number` (`invoice_number`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `quotation_id` (`quotation_id`);

--
-- Indexes for table `su_jobs`
--
ALTER TABLE `su_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `su_moves`
--
ALTER TABLE `su_moves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `su_move_reports`
--
ALTER TABLE `su_move_reports`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `report_number` (`report_number`),
  ADD KEY `move_id` (`move_id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `su_notifications`
--
ALTER TABLE `su_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `su_pages`
--
ALTER TABLE `su_pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `su_password_reset_tokens`
--
ALTER TABLE `su_password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `su_personal_access_tokens`
--
ALTER TABLE `su_personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `su_quotations`
--
ALTER TABLE `su_quotations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `su_receipts`
--
ALTER TABLE `su_receipts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `receipt_number` (`receipt_number`),
  ADD KEY `invoice_id` (`invoice_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `su_reviews`
--
ALTER TABLE `su_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `su_routes`
--
ALTER TABLE `su_routes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `move_id` (`move_id`);

--
-- Indexes for table `su_route_tracking`
--
ALTER TABLE `su_route_tracking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `route_id` (`route_id`);

--
-- Indexes for table `su_services`
--
ALTER TABLE `su_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `su_sessions`
--
ALTER TABLE `su_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `su_settings`
--
ALTER TABLE `su_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `su_users`
--
ALTER TABLE `su_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_users_role` (`role_id`);

--
-- Indexes for table `su_user_logs`
--
ALTER TABLE `su_user_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `su_user_logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `su_user_profiles`
--
ALTER TABLE `su_user_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `file_id` (`file_id`);

--
-- Indexes for table `su_user_roles`
--
ALTER TABLE `su_user_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `su_vehicles`
--
ALTER TABLE `su_vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `su_vehicle_assignments`
--
ALTER TABLE `su_vehicle_assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `move_id` (`move_id`),
  ADD KEY `vehicle_id` (`vehicle_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `su_admin_2fa_tokens`
--
ALTER TABLE `su_admin_2fa_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `su_blogs`
--
ALTER TABLE `su_blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `su_blog_categories`
--
ALTER TABLE `su_blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `su_bookings`
--
ALTER TABLE `su_bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `su_booking_orders`
--
ALTER TABLE `su_booking_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `su_condition_reports`
--
ALTER TABLE `su_condition_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `su_documents`
--
ALTER TABLE `su_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `su_failed_jobs`
--
ALTER TABLE `su_failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `su_files`
--
ALTER TABLE `su_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `su_invoices`
--
ALTER TABLE `su_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `su_jobs`
--
ALTER TABLE `su_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `su_moves`
--
ALTER TABLE `su_moves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `su_move_reports`
--
ALTER TABLE `su_move_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `su_notifications`
--
ALTER TABLE `su_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `su_pages`
--
ALTER TABLE `su_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `su_personal_access_tokens`
--
ALTER TABLE `su_personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `su_quotations`
--
ALTER TABLE `su_quotations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `su_receipts`
--
ALTER TABLE `su_receipts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `su_reviews`
--
ALTER TABLE `su_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `su_routes`
--
ALTER TABLE `su_routes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `su_route_tracking`
--
ALTER TABLE `su_route_tracking`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `su_services`
--
ALTER TABLE `su_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `su_settings`
--
ALTER TABLE `su_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `su_users`
--
ALTER TABLE `su_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `su_user_logs`
--
ALTER TABLE `su_user_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `su_user_profiles`
--
ALTER TABLE `su_user_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `su_user_roles`
--
ALTER TABLE `su_user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `su_vehicles`
--
ALTER TABLE `su_vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `su_vehicle_assignments`
--
ALTER TABLE `su_vehicle_assignments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `su_admin_2fa_tokens`
--
ALTER TABLE `su_admin_2fa_tokens`
  ADD CONSTRAINT `su_admin_2fa_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `su_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `su_blogs`
--
ALTER TABLE `su_blogs`
  ADD CONSTRAINT `su_blogs_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `su_blog_categories` (`id`),
  ADD CONSTRAINT `su_blogs_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `su_users` (`id`);

--
-- Constraints for table `su_bookings`
--
ALTER TABLE `su_bookings`
  ADD CONSTRAINT `su_bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `su_users` (`id`),
  ADD CONSTRAINT `su_bookings_ibfk_2` FOREIGN KEY (`quotation_id`) REFERENCES `su_quotations` (`id`);

--
-- Constraints for table `su_booking_orders`
--
ALTER TABLE `su_booking_orders`
  ADD CONSTRAINT `su_booking_orders_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `su_bookings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `su_condition_reports`
--
ALTER TABLE `su_condition_reports`
  ADD CONSTRAINT `fk_condition_booking` FOREIGN KEY (`booking_id`) REFERENCES `su_bookings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_condition_user` FOREIGN KEY (`user_id`) REFERENCES `su_users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `su_documents`
--
ALTER TABLE `su_documents`
  ADD CONSTRAINT `su_documents_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `su_users` (`id`),
  ADD CONSTRAINT `su_documents_ibfk_2` FOREIGN KEY (`booking_id`) REFERENCES `su_bookings` (`id`),
  ADD CONSTRAINT `su_documents_ibfk_3` FOREIGN KEY (`file_id`) REFERENCES `su_files` (`id`);

--
-- Constraints for table `su_files`
--
ALTER TABLE `su_files`
  ADD CONSTRAINT `su_files_ibfk_1` FOREIGN KEY (`uploaded_by`) REFERENCES `su_users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `su_invoices`
--
ALTER TABLE `su_invoices`
  ADD CONSTRAINT `fk_invoice_booking` FOREIGN KEY (`booking_id`) REFERENCES `su_bookings` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_invoice_quotation` FOREIGN KEY (`quotation_id`) REFERENCES `su_quotations` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_invoice_user` FOREIGN KEY (`user_id`) REFERENCES `su_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `su_moves`
--
ALTER TABLE `su_moves`
  ADD CONSTRAINT `su_moves_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `su_bookings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `su_move_reports`
--
ALTER TABLE `su_move_reports`
  ADD CONSTRAINT `fk_move_report_booking` FOREIGN KEY (`booking_id`) REFERENCES `su_bookings` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_move_report_move` FOREIGN KEY (`move_id`) REFERENCES `su_moves` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `su_notifications`
--
ALTER TABLE `su_notifications`
  ADD CONSTRAINT `su_notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `su_users` (`id`);

--
-- Constraints for table `su_quotations`
--
ALTER TABLE `su_quotations`
  ADD CONSTRAINT `su_quotations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `su_users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `su_receipts`
--
ALTER TABLE `su_receipts`
  ADD CONSTRAINT `fk_receipt_invoice` FOREIGN KEY (`invoice_id`) REFERENCES `su_invoices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_receipt_user` FOREIGN KEY (`user_id`) REFERENCES `su_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `su_reviews`
--
ALTER TABLE `su_reviews`
  ADD CONSTRAINT `su_reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `su_users` (`id`),
  ADD CONSTRAINT `su_reviews_ibfk_2` FOREIGN KEY (`booking_id`) REFERENCES `su_bookings` (`id`);

--
-- Constraints for table `su_routes`
--
ALTER TABLE `su_routes`
  ADD CONSTRAINT `su_routes_ibfk_1` FOREIGN KEY (`move_id`) REFERENCES `su_moves` (`id`);

--
-- Constraints for table `su_route_tracking`
--
ALTER TABLE `su_route_tracking`
  ADD CONSTRAINT `su_route_tracking_ibfk_1` FOREIGN KEY (`route_id`) REFERENCES `su_routes` (`id`);

--
-- Constraints for table `su_users`
--
ALTER TABLE `su_users`
  ADD CONSTRAINT `fk_users_role` FOREIGN KEY (`role_id`) REFERENCES `su_user_roles` (`id`);

--
-- Constraints for table `su_user_logs`
--
ALTER TABLE `su_user_logs`
  ADD CONSTRAINT `su_user_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `su_users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `su_user_profiles`
--
ALTER TABLE `su_user_profiles`
  ADD CONSTRAINT `su_user_profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `su_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `su_user_profiles_ibfk_2` FOREIGN KEY (`file_id`) REFERENCES `su_files` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `su_vehicle_assignments`
--
ALTER TABLE `su_vehicle_assignments`
  ADD CONSTRAINT `su_vehicle_assignments_ibfk_1` FOREIGN KEY (`move_id`) REFERENCES `su_moves` (`id`),
  ADD CONSTRAINT `su_vehicle_assignments_ibfk_2` FOREIGN KEY (`vehicle_id`) REFERENCES `su_vehicles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
