-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 05 Mei 2025 pada 12.11
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris_asset`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price` decimal(15,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `price`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Mobil BMW Hitam', 'ini mobil bmw', '5000000000.00', 2, '2025-05-05 11:34:33', '2025-05-05 11:37:07'),
(2, 'Mobil BMW Putih', 'ini mobil bmw', '4500000000.00', 2, '2025-05-05 11:57:15', '2025-05-05 11:57:15'),
(3, 'Mobil Porche Hitam', 'ini mobil porche', '6000000000.00', 3, '2025-05-05 12:03:58', '2025-05-05 12:03:58'),
(4, 'Mobil Porche Putih', 'ini mobil porche', '4000000000.00', 3, '2025-05-05 12:04:43', '2025-05-05 12:04:43'),
(5, 'Mobil BMW Hitam', 'ini mobil bmw', '5000000000.00', 2, '2025-05-05 11:34:33', '2025-05-05 11:37:07'),
(6, 'Mobil BMW Putih', 'ini mobil bmw', '4500000000.00', 2, '2025-05-05 11:57:15', '2025-05-05 11:57:15'),
(7, 'Mobil Porche Hitam', 'ini mobil porche', '6000000000.00', 3, '2025-05-05 12:03:58', '2025-05-05 12:03:58'),
(8, 'Mobil Porche Putih', 'ini mobil porche', '4000000000.00', 3, '2025-05-05 12:04:43', '2025-05-05 12:04:43'),
(9, 'Mobil BMW Hitam', 'ini mobil bmw', '5000000000.00', 2, '2025-05-05 11:34:33', '2025-05-05 11:37:07'),
(10, 'Mobil BMW Putih', 'ini mobil bmw', '4500000000.00', 2, '2025-05-05 11:57:15', '2025-05-05 11:57:15'),
(11, 'Mobil Porche Hitam', 'ini mobil porche', '6000000000.00', 3, '2025-05-05 12:03:58', '2025-05-05 12:03:58'),
(12, 'Mobil Porche Putih', 'ini mobil porche', '4000000000.00', 3, '2025-05-05 12:04:43', '2025-05-05 12:04:43'),
(13, 'Mobil BMW Hitam', 'ini mobil bmw', '5000000000.00', 2, '2025-05-05 11:34:33', '2025-05-05 11:37:07'),
(14, 'Mobil BMW Putih', 'ini mobil bmw', '4500000000.00', 2, '2025-05-05 11:57:15', '2025-05-05 11:57:15'),
(15, 'Mobil Porche Hitam', 'ini mobil porche', '6000000000.00', 3, '2025-05-05 12:03:58', '2025-05-05 12:03:58'),
(16, 'Mobil Porche Putih', 'ini mobil porche', '4000000000.00', 3, '2025-05-05 12:04:43', '2025-05-05 12:04:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(2, 'filza', 'filza@filza.com', '$2y$10$NNjdM1mWGpVYY.YGfFlq4.htuO8Mg2ecvZ9n3tLOgJjrRh1rqWBki', '2025-05-05 11:09:55', '2025-05-05 11:09:55'),
(3, 'raghib', 'raghib@raghib.com', '$2y$10$qtaYkHQTUk8.qQCf986VcubucO22hbdomC4RuSQXNTwzbLBOZPnNS', '2025-05-05 12:03:16', '2025-05-05 12:03:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
