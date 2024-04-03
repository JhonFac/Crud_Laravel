-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2024 at 11:07 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crudlaravel`
--
CREATE DATABASE IF NOT EXISTS `crudlaravel` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `crudlaravel`;

-- --------------------------------------------------------

--
-- Table structure for table `challenges`
--

CREATE TABLE `challenges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `difficulty` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `challenges`
--

INSERT INTO `challenges` (`id`, `title`, `description`, `difficulty`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Challenge 1', 'Description of Challenge 1', 1, 1, '2024-04-03 17:51:15', '2024-04-03 17:51:15'),
(2, 'Challenge 2', 'Description of Challenge 2', 2, 2, '2024-04-03 17:51:15', '2024-04-03 17:51:15'),
(3, 'Challenge 3', 'Description of Challenge 3', 3, 3, '2024-04-03 17:51:15', '2024-04-03 17:51:15'),
(4, 'Challenge 4', 'Description of Challenge 4', 1, 4, '2024-04-03 17:51:15', '2024-04-03 17:51:15'),
(5, 'Challenge 5', 'Description of Challenge 5', 2, 5, '2024-04-03 17:51:15', '2024-04-03 17:51:15'),
(6, 'Challenge 6', 'Description of Challenge 6', 3, 6, '2024-04-03 17:51:15', '2024-04-03 17:51:15'),
(7, 'Challenge 7', 'Description of Challenge 7', 1, 7, '2024-04-03 17:51:15', '2024-04-03 17:51:15'),
(8, 'Challenge 8', 'Description of Challenge 8', 2, 8, '2024-04-03 17:51:15', '2024-04-03 17:51:15'),
(9, 'Challenge 9', 'Description of Challenge 9', 3, 9, '2024-04-03 17:51:15', '2024-04-03 17:51:15'),
(10, 'Challenge 10', 'Description of Challenge 10', 1, 10, '2024-04-03 17:51:15', '2024-04-03 17:51:15');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `industry` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `image_path`, `location`, `industry`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'ABC Company', 'images/abc.jpg', 'New York', 'Technology', 1, '2024-04-03 17:51:15', '2024-04-03 17:51:15'),
(2, 'XYZ Corporation', 'images/xyz.jpg', 'Los Angeles', 'Finance', 2, '2024-04-03 17:51:15', '2024-04-03 17:51:15'),
(3, 'Smith & Co.', 'images/smith.jpg', 'Chicago', 'Manufacturing', 3, '2024-04-03 17:51:15', '2024-04-03 17:51:15'),
(4, 'Johnson Enterprises', 'images/johnson.jpg', 'Houston', 'Healthcare', 4, '2024-04-03 17:51:15', '2024-04-03 17:51:15'),
(5, 'Green Industries', 'images/green.jpg', 'San Francisco', 'Energy', 5, '2024-04-03 17:51:15', '2024-04-03 17:51:15'),
(6, 'Taylor Group', 'images/taylor.jpg', 'Boston', 'Consulting', 6, '2024-04-03 17:51:15', '2024-04-03 17:51:15'),
(7, 'White Innovations', 'images/white.jpg', 'Seattle', 'Engineering', 7, '2024-04-03 17:51:15', '2024-04-03 17:51:15'),
(8, 'Brown Solutions', 'images/brown.jpg', 'Miami', 'Retail', 8, '2024-04-03 17:51:15', '2024-04-03 17:51:15'),
(9, 'Wilson & Sons', 'images/wilson.jpg', 'Dallas', 'Construction', 9, '2024-04-03 17:51:15', '2024-04-03 17:51:15'),
(10, 'Martinez Enterprises', 'images/martinez.jpg', 'Atlanta', 'Hospitality', 10, '2024-04-03 17:51:15', '2024-04-03 17:51:15');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(14, '2024_04_03_025046_create_users_table', 1),
(15, '2024_04_03_055742_create_challenges_table', 1),
(16, '2024_04_03_170918_create_companies_table', 1),
(17, '2024_04_03_171723_create_programs_table', 1),
(18, '2024_04_03_171809_create_program_participants_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `title`, `description`, `start_date`, `end_date`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Program 1', 'Description of Program 1', '2024-01-01', '2024-01-30', 1, '2024-04-03 17:51:15', '2024-04-03 17:51:15'),
(2, 'Program 2', 'Description of Program 2', '2024-02-01', '2024-02-28', 2, '2024-04-03 17:51:15', '2024-04-03 17:51:15'),
(3, 'Program 3', 'Description of Program 3', '2024-03-01', '2024-03-31', 3, '2024-04-03 17:51:15', '2024-04-03 17:51:15'),
(4, 'Program 4', 'Description of Program 4', '2024-04-01', '2024-04-30', 4, '2024-04-03 17:51:15', '2024-04-03 17:51:15'),
(5, 'Program 5', 'Description of Program 5', '2024-05-01', '2024-05-31', 5, '2024-04-03 17:51:15', '2024-04-03 17:51:15'),
(6, 'Program 6', 'Description of Program 6', '2024-06-01', '2024-06-30', 6, '2024-04-03 17:51:15', '2024-04-03 17:51:15'),
(7, 'Program 7', 'Description of Program 7', '2024-07-01', '2024-07-31', 7, '2024-04-03 17:51:15', '2024-04-03 17:51:15'),
(8, 'Program 8', 'Description of Program 8', '2024-08-01', '2024-08-31', 8, '2024-04-03 17:51:15', '2024-04-03 17:51:15'),
(9, 'Program 9', 'Description of Program 9', '2024-09-01', '2024-09-30', 9, '2024-04-03 17:51:15', '2024-04-03 17:51:15'),
(10, 'Program 10', 'Description of Program 10', '2024-10-01', '2024-10-31', 10, '2024-04-03 17:51:15', '2024-04-03 17:51:15');

-- --------------------------------------------------------

--
-- Table structure for table `program_participants`
--

CREATE TABLE `program_participants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_id` bigint(20) UNSIGNED NOT NULL,
  `entity_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entity_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program_participants`
--

INSERT INTO `program_participants` (`id`, `program_id`, `entity_type`, `entity_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'users', 1, NULL, NULL),
(2, 1, 'users', 2, NULL, NULL),
(3, 1, 'users', 3, NULL, NULL),
(4, 2, 'users', 4, NULL, NULL),
(5, 2, 'users', 5, NULL, NULL),
(6, 2, 'users', 6, NULL, NULL),
(7, 3, 'users', 7, NULL, NULL),
(8, 3, 'users', 8, NULL, NULL),
(9, 3, 'users', 9, NULL, NULL),
(10, 4, 'users', 10, NULL, NULL),
(11, 1, 'challenges', 1, NULL, NULL),
(12, 1, 'challenges', 2, NULL, NULL),
(13, 2, 'challenges', 3, NULL, NULL),
(14, 2, 'challenges', 4, NULL, NULL),
(15, 3, 'challenges', 5, NULL, NULL),
(16, 3, 'challenges', 6, NULL, NULL),
(17, 4, 'challenges', 7, NULL, NULL),
(18, 4, 'challenges', 8, NULL, NULL),
(19, 5, 'challenges', 9, NULL, NULL),
(20, 5, 'challenges', 10, NULL, NULL),
(21, 1, 'companies', 1, NULL, NULL),
(22, 2, 'companies', 2, NULL, NULL),
(23, 3, 'companies', 3, NULL, NULL),
(24, 4, 'companies', 4, NULL, NULL),
(25, 5, 'companies', 5, NULL, NULL),
(26, 6, 'companies', 6, NULL, NULL),
(27, 7, 'companies', 7, NULL, NULL),
(28, 8, 'companies', 8, NULL, NULL),
(29, 9, 'companies', 9, NULL, NULL),
(30, 10, 'companies', 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 'Juan Perez', 'juanperez@example.com', 'juanperez.jpg', '2024-04-03 17:47:19', '2024-04-03 17:47:19'),
(2, 'María García', 'mariagarcia@example.com', 'mariagarcia.jpg', '2024-04-03 17:47:19', '2024-04-03 17:47:19'),
(3, 'Carlos Rodriguez', 'carlosrodriguez@example.com', 'carlosrodriguez.jpg', '2024-04-03 17:47:19', '2024-04-03 17:47:19'),
(4, 'Ana Martínez', 'anamartinez@example.com', 'anamartinez.jpg', '2024-04-03 17:47:19', '2024-04-03 17:47:19'),
(5, 'José González', 'josegonzalez@example.com', 'josegonzalez.jpg', '2024-04-03 17:47:19', '2024-04-03 17:47:19'),
(6, 'Laura López', 'lauralopez@example.com', 'lauralopez.jpg', '2024-04-03 17:47:19', '2024-04-03 17:47:19'),
(7, 'Pedro Sánchez', 'pedrosanchez@example.com', 'pedrosanchez.jpg', '2024-04-03 17:47:19', '2024-04-03 17:47:19'),
(8, 'Rosa Fernández', 'rosafernandez@example.com', 'rosafernandez.jpg', '2024-04-03 17:47:19', '2024-04-03 17:47:19'),
(9, 'David Pérez', 'davidperez@example.com', 'davidperez.jpg', '2024-04-03 17:47:19', '2024-04-03 17:47:19'),
(10, 'Julia González', 'juliagonzalez@example.com', 'juliagonzalez.jpg', '2024-04-03 17:47:19', '2024-04-03 17:47:19'),
(11, 'Miguel Martínez', 'miguelmartinez@example.com', 'miguelmartinez.jpg', '2024-04-03 17:47:19', '2024-04-03 17:47:19'),
(12, 'Cristina Rodríguez', 'cristinarodriguez@example.com', 'cristinarodriguez.jpg', '2024-04-03 17:47:19', '2024-04-03 17:47:19'),
(13, 'Sergio Sánchez', 'sergiosanchez@example.com', 'sergiosanchez.jpg', '2024-04-03 17:47:19', '2024-04-03 17:47:19'),
(14, 'Paula López', 'paulalopez@example.com', 'paulalopez.jpg', '2024-04-03 17:47:19', '2024-04-03 17:47:19'),
(15, 'Luisa Pérez', 'luisaperez@example.com', 'luisaperez.jpg', '2024-04-03 17:47:19', '2024-04-03 17:47:19'),
(16, 'Juan Carlos Fernández', 'juancarlosfernandez@example.com', 'juancarlosfernandez.jpg', '2024-04-03 17:47:19', '2024-04-03 17:47:19'),
(17, 'Marta Martínez', 'martamartinez@example.com', 'martamartinez.jpg', '2024-04-03 17:47:19', '2024-04-03 17:47:19'),
(18, 'Pablo Rodríguez', 'pablorodriguez@example.com', 'pablorodriguez.jpg', '2024-04-03 17:47:19', '2024-04-03 17:47:19'),
(19, 'Andrea Sánchez', 'andreasanchez@example.com', 'andreasanchez.jpg', '2024-04-03 17:47:19', '2024-04-03 17:47:19'),
(20, 'Javier García', 'javiergarcia@example.com', 'javiergarcia.jpg', '2024-04-03 17:47:19', '2024-04-03 17:47:19'),
(21, 'María José Pérez', 'mariajoseperez@example.com', 'mariajoseperez.jpg', '2024-04-03 17:47:19', '2024-04-03 17:47:19'),
(22, 'Diego González', 'diegogonzalez@example.com', 'diegogonzalez.jpg', '2024-04-03 17:47:19', '2024-04-03 17:47:19'),
(23, 'Elena Martínez', 'elenamartinez@example.com', 'elenamartinez.jpg', '2024-04-03 17:47:19', '2024-04-03 17:47:19'),
(24, 'Juan Antonio Rodríguez', 'juanantoniorodriguez@example.com', 'juanantoniorodriguez.jpg', '2024-04-03 17:47:19', '2024-04-03 17:47:19'),
(25, 'Carmen Sánchez', 'carmensanchez@example.com', 'carmensanchez.jpg', '2024-04-03 17:47:19', '2024-04-03 17:47:19'),
(26, 'Raúl López', 'raullopez@example.com', 'raullopez.jpg', '2024-04-03 17:47:19', '2024-04-03 17:47:19'),
(27, 'Martina Pérez', 'martinaperez@example.com', 'martinaperez.jpg', '2024-04-03 17:47:19', '2024-04-03 17:47:19'),
(28, 'Antonio Fernández', 'antoniofernandez@example.com', 'antoniofernandez.jpg', '2024-04-03 17:47:19', '2024-04-03 17:47:19'),
(29, 'Lucía García', 'luciagarcia@example.com', 'luciagarcia.jpg', '2024-04-03 17:47:19', '2024-04-03 17:47:19'),
(30, 'Alejandro Martínez', 'alejandromartinez@example.com', 'alejandromartinez.jpg', '2024-04-03 17:47:19', '2024-04-03 17:47:19'),
(31, 'Isabel Rodríguez', 'isabelrodriguez@example.com', 'isabelrodriguez.jpg', '2024-04-03 17:47:19', '2024-04-03 17:47:19'),
(32, 'Ángela Sánchez', 'angelasanchez@example.com', 'angelasanchez.jpg', '2024-04-03 17:47:19', '2024-04-03 17:47:19'),
(33, 'José Luis Pérez', 'joseluisperez@example.com', 'joseluisperez.jpg', '2024-04-03 17:47:19', '2024-04-03 17:47:19'),
(34, 'Patricia Fernández', 'patriciafernandez@example.com', 'patriciafernandez.jpg', '2024-04-03 17:47:19', '2024-04-03 17:47:19'),
(35, 'Sergio García', 'sergiogarcia@example.com', 'sergiogarcia.jpg', '2024-04-03 17:47:19', '2024-04-03 17:47:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `challenges`
--
ALTER TABLE `challenges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `challenges_user_id_foreign` (`user_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companies_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `programs_user_id_foreign` (`user_id`);

--
-- Indexes for table `program_participants`
--
ALTER TABLE `program_participants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `program_participants_program_id_foreign` (`program_id`),
  ADD KEY `program_participants_entity_id_foreign` (`entity_id`);

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
-- AUTO_INCREMENT for table `challenges`
--
ALTER TABLE `challenges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `program_participants`
--
ALTER TABLE `program_participants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `challenges`
--
ALTER TABLE `challenges`
  ADD CONSTRAINT `challenges_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `programs`
--
ALTER TABLE `programs`
  ADD CONSTRAINT `programs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `program_participants`
--
ALTER TABLE `program_participants`
  ADD CONSTRAINT `program_participants_entity_id_foreign` FOREIGN KEY (`entity_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `program_participants_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
