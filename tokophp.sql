-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2025 at 02:24 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokophp`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Elektronik', 'elektronik', 'Produk elektronik dan gadget terbaru', '2025-12-09 04:09:39', '2025-12-09 04:09:39'),
(2, 'Fashion', 'fashion', 'Pakaian dan aksesori fashion', '2025-12-09 04:09:39', '2025-12-09 04:09:39'),
(3, 'Makanan & Minuman', 'makanan-minuman', 'Makanan dan minuman berkualitas', '2025-12-09 04:09:40', '2025-12-09 04:09:40'),
(4, 'Olahraga', 'olahraga', 'Peralatan dan perlengkapan olahraga', '2025-12-09 04:09:40', '2025-12-09 04:09:40'),
(5, 'Buku', 'buku', 'Buku dan alat tulis', '2025-12-09 04:09:40', '2025-12-09 04:09:40'),
(6, 'Kesehatan', 'kesehatan', 'Produk kesehatan dan kecantikan', '2025-12-09 04:09:40', '2025-12-09 04:09:40');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_12_08_170721_create_categories_table', 1),
(5, '2025_12_08_170742_create_products_table', 1),
(6, '2025_12_08_170757_create_carts_table', 1),
(7, '2025_12_08_170816_create_orders_table', 1),
(8, '2025_12_08_170838_create_order_details_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `payment_method` varchar(255) NOT NULL,
  `shipping_address` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_number`, `total`, `status`, `payment_method`, `shipping_address`, `created_at`, `updated_at`) VALUES
(1, 3, 'ORD-1765378452', 1104000.00, 'pending', 'COD', 'JLN.mangga', '2025-12-10 07:54:12', '2025-12-10 07:54:12'),
(2, 3, 'ORD-1765378986', 8971000.00, 'pending', 'Bank Transfer', 'L', '2025-12-10 08:03:06', '2025-12-10 08:03:06');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 1, 250000.00, '2025-12-10 07:54:12', '2025-12-10 07:54:12'),
(2, 1, 23, 1, 35000.00, '2025-12-10 07:54:12', '2025-12-10 07:54:12'),
(3, 1, 24, 1, 95000.00, '2025-12-10 07:54:12', '2025-12-10 07:54:12'),
(4, 1, 3, 1, 299000.00, '2025-12-10 07:54:12', '2025-12-10 07:54:12'),
(5, 1, 10, 1, 65000.00, '2025-12-10 07:54:12', '2025-12-10 07:54:12'),
(6, 1, 11, 3, 120000.00, '2025-12-10 07:54:12', '2025-12-10 07:54:12'),
(7, 2, 3, 3, 299000.00, '2025-12-10 08:03:06', '2025-12-10 08:03:06'),
(8, 2, 20, 1, 75000.00, '2025-12-10 08:03:06', '2025-12-10 08:03:06'),
(9, 2, 2, 1, 7999000.00, '2025-12-10 08:03:06', '2025-12-10 08:03:06');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `description`, `price`, `stock`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Smartphone Samsung Galaxy A54', 'smartphone-samsung-galaxy-a54', 'Smartphone dengan kamera 50MP, layar AMOLED 6.4 inch, dan baterai 5000mAh', 5499000.00, 15, NULL, '2025-12-09 04:09:40', '2025-12-09 04:09:40'),
(2, 1, 'Laptop ASUS VivoBook 14', 'laptop-asus-vivobook-14', 'Laptop ringan dengan prosesor Intel Core i5, RAM 8GB, SSD 512GB', 7999000.00, 9, NULL, '2025-12-09 04:09:41', '2025-12-10 08:03:06'),
(3, 1, 'Earbuds TWS Pro', 'earbuds-tws-pro', 'Earbuds wireless dengan noise cancelling dan kualitas suara premium', 299000.00, 46, NULL, '2025-12-09 04:09:41', '2025-12-10 08:03:06'),
(4, 1, 'Smart Watch X5', 'smart-watch-x5', 'Smartwatch dengan monitoring kesehatan, GPS, dan tahan air', 1299000.00, 25, NULL, '2025-12-09 04:09:41', '2025-12-09 04:09:41'),
(5, 2, 'Kaos Polos Cotton Premium', 'kaos-polos-cotton-premium', 'Kaos polos berbahan cotton combed 30s, nyaman dan adem', 75000.00, 100, NULL, '2025-12-09 04:09:41', '2025-12-09 04:09:41'),
(6, 2, 'Celana Jeans Slim Fit', 'celana-jeans-slim-fit', 'Celana jeans dengan potongan slim fit modern', 250000.00, 39, NULL, '2025-12-09 04:09:41', '2025-12-10 07:54:12'),
(7, 2, 'Jaket Hoodie Premium', 'jaket-hoodie-premium', 'Jaket hoodie tebal dan hangat untuk segala aktivitas', 185000.00, 30, NULL, '2025-12-09 04:09:41', '2025-12-09 04:09:41'),
(8, 2, 'Sepatu Sneakers Sport', 'sepatu-sneakers-sport', 'Sepatu sneakers ringan dan nyaman untuk olahraga', 450000.00, 20, NULL, '2025-12-09 04:09:41', '2025-12-09 04:09:41'),
(9, 3, 'Kopi Arabica Premium 200gr', 'kopi-arabica-premium-200gr', 'Kopi arabica pilihan dengan aroma dan rasa yang kaya', 85000.00, 60, NULL, '2025-12-09 04:09:41', '2025-12-09 04:09:41'),
(10, 3, 'Teh Hijau Organik 100gr', 'teh-hijau-organik-100gr', 'Teh hijau organik berkualitas tinggi untuk kesehatan', 65000.00, 44, NULL, '2025-12-09 04:09:41', '2025-12-10 07:54:12'),
(11, 3, 'Madu Murni 500ml', 'madu-murni-500ml', 'Madu murni 100% tanpa campuran', 120000.00, 32, NULL, '2025-12-09 04:09:41', '2025-12-10 07:54:12'),
(12, 3, 'Cokelat Dark Premium 100gr', 'cokelat-dark-premium-100gr', 'Cokelat dark dengan kandungan kakao 70%', 45000.00, 80, NULL, '2025-12-09 04:09:41', '2025-12-09 04:09:41'),
(13, 4, 'Matras Yoga Anti Slip', 'matras-yoga-anti-slip', 'Matras yoga dengan permukaan anti slip dan empuk', 150000.00, 25, NULL, '2025-12-09 04:09:41', '2025-12-09 04:09:41'),
(14, 4, 'Dumbbell Set 5kg', 'dumbbell-set-5kg', 'Set dumbbell 5kg untuk latihan di rumah', 180000.00, 15, NULL, '2025-12-09 04:09:41', '2025-12-09 04:09:41'),
(15, 4, 'Botol Minum Sport 1L', 'botol-minum-sport-1l', 'Botol minum sport dengan kapasitas 1 liter', 55000.00, 70, NULL, '2025-12-09 04:09:41', '2025-12-09 04:09:41'),
(16, 4, 'Resistance Band Set', 'resistance-band-set', 'Set resistance band dengan 5 level kekuatan', 95000.00, 40, NULL, '2025-12-09 04:09:41', '2025-12-09 04:09:41'),
(17, 5, 'Buku Novel Best Seller', 'buku-novel-best-seller', 'Novel best seller pilihan dengan cerita menarik', 85000.00, 50, NULL, '2025-12-09 04:09:41', '2025-12-09 04:09:41'),
(18, 5, 'Buku Motivasi & Pengembangan Diri', 'buku-motivasi-pengembangan-diri', 'Buku motivasi untuk meningkatkan kualitas hidup', 95000.00, 35, NULL, '2025-12-09 04:09:41', '2025-12-09 04:09:41'),
(19, 5, 'Set Alat Tulis Lengkap', 'set-alat-tulis-lengkap', 'Set alat tulis lengkap untuk sekolah atau kantor', 125000.00, 60, NULL, '2025-12-09 04:09:41', '2025-12-09 04:09:41'),
(20, 5, 'Buku Resep Masakan Nusantara', 'buku-resep-masakan-nusantara', 'Kumpulan resep masakan tradisional Indonesia', 75000.00, 29, NULL, '2025-12-09 04:09:42', '2025-12-10 08:03:06'),
(21, 6, 'Vitamin C 1000mg', 'vitamin-c-1000mg', 'Suplemen vitamin C untuk meningkatkan daya tahan tubuh', 85000.00, 100, NULL, '2025-12-09 04:09:42', '2025-12-09 04:09:42'),
(22, 6, 'Masker Wajah Sheet 10pcs', 'masker-wajah-sheet-10pcs', 'Masker wajah sheet dengan berbagai varian', 65000.00, 75, NULL, '2025-12-09 04:09:42', '2025-12-09 04:09:42'),
(23, 6, 'Hand Sanitizer 500ml', 'hand-sanitizer-500ml', 'Hand sanitizer dengan kandungan alkohol 70%', 35000.00, 119, NULL, '2025-12-09 04:09:42', '2025-12-10 07:54:12'),
(24, 6, 'Essential Oil Lavender 10ml', 'essential-oil-lavender-10ml', 'Essential oil lavender untuk relaksasi', 95000.00, 44, NULL, '2025-12-09 04:09:42', '2025-12-10 07:54:12');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5lT0hD4VC1EeJ0IfN2T3xoy7Om0bbH7fw0Kokatu', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidGtieHdPQlB1cHRrYUpjZFhDcDZPeWVncktEQjI3Tm5LRG54TVJ1bCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MztzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3NjU0MjIwNzg7fX0=', 1765422096),
('LPRNrDsY0BLuOFUL8PUIiSgXuzqzW93pszj4ThnN', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiajFybkl6SUtoWVZDalVlN0F5NkgzRHNhZFd4YVBVZnFodHBKYkRVVyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mzt9', 1765379574);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Toko', 'admin@toko.com', '2025-12-09 04:09:39', '$2y$12$oDR4eTOigtG8SQ2Zw9SHpOG51fYPZSc7KYLeN3.U1iQMQDk9D2jeO', NULL, '2025-12-09 04:09:39', '2025-12-09 04:09:39'),
(2, 'Customer Test', 'customer@toko.com', '2025-12-09 04:09:39', '$2y$12$2QpXLE5zLTIkf9G806.hSuxAB6VXb2c8vDxqLtjASiuFSjK1YIHrC', NULL, '2025-12-09 04:09:39', '2025-12-09 04:09:39'),
(3, 'Ayam', 'Ayam123@gmail.com', NULL, '$2y$12$N3ctlcVKXI.dBBOY2Ck89OW3MHlJzmWgiPTbWYmGdT0J9EjZkzk0O', 'sJwcku1xI58Rtkjug3gXfdYxxJA1h7PLOk9y2SWy0ku9HaSpL9OC5vaSfqjO', '2025-12-10 07:17:28', '2025-12-10 07:17:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_number_unique` (`order_number`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
