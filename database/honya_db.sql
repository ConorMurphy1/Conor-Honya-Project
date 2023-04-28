-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table honya_db.authors: ~0 rows (approximately)
INSERT INTO `authors` (`id`, `name`, `email`, `phone_no`, `address`, `photo`, `created_at`, `updated_at`) VALUES
	(1, 'Phoebe Gamble', 'qubove@mailinator.com', '+1 (915) 749-5905', 'Libero aliqua Optio', '644ba9b2268e7_images (2).jpg', '2023-04-28 04:40:42', '2023-04-28 04:40:42'),
	(2, 'Ali Walker', 'lebityto@mailinator.com', '+1 (212) 403-2466', 'Aut aute temporibus', '644ba9bdbae07_images (1).jpg', '2023-04-28 04:40:53', '2023-04-28 04:40:53');

-- Dumping data for table honya_db.books: ~0 rows (approximately)
INSERT INTO `books` (`id`, `name`, `image`, `author_id`, `publisher`, `year`, `total_chapters`, `price`, `quantity`, `description`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Captain Ameria', '644baa6312332_5e8ee1a7a9643765f7fbbe8079b5a691-800.jpg', 2, 'Mollitia sed praesen', '2020', 'Ut eos in sequi tem', 10000, 171, 'Aut expedita do repu', 'Instock', '2023-04-28 04:43:39', '2023-04-28 04:43:39'),
	(2, 'One Beautiful Spring Day', '644baa843d47d_download (1).jpg', 1, 'Harum dolor ea facil', '1998', 'Eos quae ad ratione', 913, 174, 'Ab iure dolores opti', 'Instock', '2023-04-28 04:44:12', '2023-04-28 04:44:12'),
	(3, 'Autum', '644bb239637a7_book1.jpg', 1, 'Jimmy', '2023', '5', 10000, 10, 'Lovely fantasy novel', 'Instock', '2023-04-28 05:17:05', '2023-04-28 05:17:05'),
	(4, 'Off The Grid', '644bb64949b9c_9784867529157.jpg', 2, 'Inventore illo nobis', '2023', '78', 60000, 23, 'Thrilling mystery', 'Instock', '2023-04-28 05:34:25', '2023-04-28 05:34:25');

-- Dumping data for table honya_db.book_categories: ~0 rows (approximately)
INSERT INTO `book_categories` (`id`, `book_id`, `category_id`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, '2023-04-28 04:43:39', '2023-04-28 04:43:39'),
	(2, 1, 4, '2023-04-28 04:43:39', '2023-04-28 04:43:39'),
	(3, 2, 3, '2023-04-28 04:44:12', '2023-04-28 04:44:12'),
	(4, 2, 6, '2023-04-28 04:44:12', '2023-04-28 04:44:12'),
	(5, 3, 2, '2023-04-28 05:17:05', '2023-04-28 05:17:05'),
	(6, 3, 3, '2023-04-28 05:17:05', '2023-04-28 05:17:05'),
	(7, 4, 5, '2023-04-28 05:34:25', '2023-04-28 05:34:25'),
	(8, 4, 6, '2023-04-28 05:34:25', '2023-04-28 05:34:25');

-- Dumping data for table honya_db.categories: ~0 rows (approximately)
INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Actions', '2023-04-28 04:42:03', '2023-04-28 05:18:30'),
	(2, 'Fantasy', '2023-04-28 04:42:12', '2023-04-28 04:42:12'),
	(3, 'Romance', '2023-04-28 04:42:17', '2023-04-28 04:42:17'),
	(4, 'Comic', '2023-04-28 04:42:22', '2023-04-28 04:42:22'),
	(5, 'Thriller', '2023-04-28 04:42:28', '2023-04-28 04:42:28'),
	(6, 'Mystery', '2023-04-28 04:42:33', '2023-04-28 04:42:33'),
	(7, 'Sci-Fi', '2023-04-28 05:33:19', '2023-04-28 05:33:32');

-- Dumping data for table honya_db.contact_us: ~0 rows (approximately)
INSERT INTO `contact_us` (`id`, `email`, `feedback`, `created_at`, `updated_at`) VALUES
	(1, 'supervisorMNG@kmdservice.com', 'This website needs more frontend ingenuity', '2023-04-28 04:47:33', '2023-04-28 04:47:33'),
	(2, 'johndoe@email.com', 'Too green', '2023-04-28 05:31:16', '2023-04-28 05:31:16');

-- Dumping data for table honya_db.contracts: ~0 rows (approximately)
INSERT INTO `contracts` (`id`, `author_id`, `contract_type_id`, `notes`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 'Will be under 1 year', '2023-04-28 04:41:15', '2023-04-28 04:41:15'),
	(2, 2, 2, 'Will be under 2 years', '2023-04-28 04:41:26', '2023-04-28 04:41:26');

-- Dumping data for table honya_db.contract_types: ~0 rows (approximately)
INSERT INTO `contract_types` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
	(1, '1 year', 'Under duration of 1 year', '2023-04-28 04:40:01', '2023-04-28 04:40:01'),
	(2, '2 Year', 'Under duration of 2 Years', '2023-04-28 04:40:13', '2023-04-28 04:40:13'),
	(3, '3 Years', 'Under duration of 3 years', '2023-04-28 04:40:25', '2023-04-28 04:40:25');

-- Dumping data for table honya_db.customers: ~0 rows (approximately)

-- Dumping data for table honya_db.customer_types: ~0 rows (approximately)

-- Dumping data for table honya_db.failed_jobs: ~0 rows (approximately)

-- Dumping data for table honya_db.migrations: ~0 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_04_24_050045_create_orders_table', 1),
	(6, '2023_04_24_050058_create_customers_table', 1),
	(7, '2023_04_24_050110_create_contact_us_table', 1),
	(8, '2023_04_24_050130_create_order_details_table', 1),
	(9, '2023_04_24_172142_create_roles_table', 1),
	(10, '2023_04_24_174321_create_customer_types_table', 1),
	(11, '2023_04_24_174403_create_categories_table', 1),
	(12, '2023_04_24_174433_create_book_categories_table', 1),
	(13, '2023_04_24_174447_create_authors_table', 1),
	(14, '2023_04_24_174457_create_contracts_table', 1),
	(15, '2023_04_24_174508_create_contract_types_table', 1),
	(16, '2023_04_24_174534_create_purchases_table', 1),
	(17, '2023_04_26_121234_create_books_table', 1);

-- Dumping data for table honya_db.orders: ~0 rows (approximately)
INSERT INTO `orders` (`id`, `customer_id`, `book_id`, `payment_type`, `card_no`, `amount`, `status`, `created_at`, `updated_at`) VALUES
	(1, 4, 1, 'credit', '093846353525', '10000', 'paid', '2023-04-28 04:54:54', '2023-04-28 04:55:31'),
	(3, 5, 1, 'visa', '96573899035', '10000', 'paid', '2023-04-28 04:57:58', '2023-04-28 04:58:34'),
	(5, 5, 1, 'visa', 'dsdfsda', '10000', 'paid', '2023-04-28 05:01:02', '2023-04-28 05:01:10'),
	(6, 5, 1, 'visa', '67898765', '10000', 'paid', '2023-04-28 05:04:01', '2023-04-28 05:04:08'),
	(7, 5, 1, 'visa', '35345', '10000', 'paid', '2023-04-28 05:07:02', '2023-04-28 05:07:07'),
	(8, 5, 1, 'visa', '54364', '10000', 'paid', '2023-04-28 05:08:31', '2023-04-28 05:08:34'),
	(9, 5, 1, 'visa', '23544354', '10000', 'paid', '2023-04-28 05:09:37', '2023-04-28 05:09:42'),
	(10, 5, 1, 'visa', '90o690987', '10000', 'paid', '2023-04-28 05:10:05', '2023-04-28 05:10:10'),
	(11, 5, 1, 'visa', '4654754', '10000', 'paid', '2023-04-28 05:11:38', '2023-04-28 05:11:42'),
	(13, 6, 2, 'visa', '464645', '913', 'paid', '2023-04-28 05:14:00', '2023-04-28 05:14:15'),
	(14, 7, 1, 'visa', '58738638686', '10913', 'paid', '2023-04-28 05:30:05', '2023-04-28 05:30:45'),
	(16, 7, 2, 'visa', '58738638686', '10913', 'paid', '2023-04-28 05:30:24', '2023-04-28 05:30:45');

-- Dumping data for table honya_db.order_details: ~0 rows (approximately)

-- Dumping data for table honya_db.password_reset_tokens: ~0 rows (approximately)

-- Dumping data for table honya_db.personal_access_tokens: ~0 rows (approximately)

-- Dumping data for table honya_db.purchases: ~0 rows (approximately)

-- Dumping data for table honya_db.roles: ~3 rows (approximately)
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Administrator', NULL, NULL),
	(2, 'Staff', NULL, NULL),
	(3, 'User', NULL, NULL);

-- Dumping data for table honya_db.users: ~0 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `address`, `role_id`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@email.com', NULL, '$2y$10$Aeblr/K9TLvdjLGAuJu1xOrRA5xSyuiHA2I1.Qh2KjAlHzhTuUQYu', '09847463434', 'Myanigone', 1, '644ba8fb2e620_images.jpg', NULL, '2023-04-28 04:37:39', '2023-04-28 04:37:39'),
	(2, 'Jim', 'staff@email.com', NULL, '$2y$10$TMcr9KuwQrFP0fp48kDPX.KxzEfH7hICFHE2jW8IJktopZ4eKvR3K', '+1 (406) 359-4085', 'Mandalay', 2, '644ba93981172_download (2).jpg', NULL, '2023-04-28 04:38:41', '2023-04-28 04:38:41'),
	(3, 'Phelan Glenn', 'user@email.com', NULL, '$2y$10$kIFkJns60qgHT6JsH2bLVuTja24T1SPu7wlhLqvMCT9nqXzWWsDxS', '+1 (932) 836-8039', 'Voluptate eiusmod au', 3, '644ba9558e8d6_download (3).jpg', NULL, '2023-04-28 04:39:09', '2023-04-28 04:39:09'),
	(4, 'Savannah Reyes', 'abc@mail.com', NULL, '$2y$10$3CFL0hKYpGLFTG0VYbRPiuApKhXFArHb87RBTJ0jx.iPRHE4xzTLO', '09847463434', 'Mandalay', 3, '644bace6204c5_download (2).jpg', NULL, '2023-04-28 04:54:22', '2023-04-28 04:54:22'),
	(5, 'Conor', 'conor@mail.com', NULL, '$2y$10$mORTao3rRdIViy.P.vTM5u6CascOWKCtGsst064NQsu.MykMFooIS', '+1 (799) 229-6252', 'Mandalay', 3, '644bada3762d0_images (1).jpg', NULL, '2023-04-28 04:57:31', '2023-04-28 04:57:31'),
	(6, 'Rono', 'rono@mail.com', NULL, '$2y$10$3D4EgaeeAIbChnm04YXrau6.WW.TD6nylFl89vk4fDaXsBHtsE0/O', '09847463434', 'Mandalay', 3, '644bb154c7e1e_download (2).jpg', NULL, '2023-04-28 05:13:16', '2023-04-28 05:13:16'),
	(7, 'Cust', 'cust@mail.com', NULL, '$2y$10$PIKFElYWaBOPF69cuLBDbuDFDGdSI.Fl9h8g9Ya0hFHnyk/Ce/I4q', '0966537858', 'Yangon', 3, '644bb51fbd8aa_download (3).jpg', NULL, '2023-04-28 05:29:27', '2023-04-28 05:29:27');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
