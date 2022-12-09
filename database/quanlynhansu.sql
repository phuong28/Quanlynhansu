-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 09, 2022 lúc 09:15 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlynhansu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `later`
--

CREATE TABLE `later` (
  `id` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `requestlate` int(11) DEFAULT NULL,
  `datebreak` int(11) DEFAULT NULL,
  `users_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reason_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `delete` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `later`
--

INSERT INTO `later` (`id`, `category`, `reason`, `date`, `requestlate`, `datebreak`, `users_id`, `reason_id`, `status`, `delete`, `created_at`, `updated_at`) VALUES
(19, 'ốm', 'bị sốt covid', '2022-12-08', 0, 0, 29, 2, 3, 0, '2022-12-06 00:01:59', '2022-12-09 00:01:52'),
(22, 'việc gia đình', 'con còn nhỏ', '2022-12-08', 0, 1, 29, 2, 2, 0, '2022-12-06 00:10:32', '2022-12-09 00:01:46'),
(23, 'ốm', 'bị sốt covid', '2022-12-08', 0, 0, 3, 2, 1, 0, '2022-12-06 00:10:52', '2022-12-06 00:34:18'),
(24, 'ốm', 'bị sốt covid', '2022-12-19', 0, 0, 29, 2, 0, 0, '2022-12-06 00:11:58', '2022-12-06 00:11:58'),
(25, 'ốm', 'bị sốt covid', '2022-12-22', 1, 0, 29, 2, 2, 0, '2022-12-07 20:53:54', '2022-12-09 00:02:55'),
(26, 'ốm', 'bị sốt covid', '2022-12-23', 0, 2, 29, 2, 2, 0, '2022-12-07 20:54:11', '2022-12-07 21:29:47'),
(27, 'ốm', 'bị sốt covid', '2022-12-08', 0, 1, 29, 2, 1, 0, '2022-12-07 20:58:37', '2022-12-09 00:57:41'),
(28, 'xin đến muộn nửa buổi', 'có việc cần phải giải quyết', '2022-12-14', 1, 0, 29, 6, 2, 0, '2022-12-07 21:53:08', '2022-12-09 00:03:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_12_01_062849_create_reasons_table', 2),
(6, '2022_12_01_080030_reasons', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reasons`
--

CREATE TABLE `reasons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `reasons`
--

INSERT INTO `reasons` (`id`, `category`, `note`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'ốm', 'có dấu hiệu mệt mỏi và nghỉ ngắn hạn trong vài ngày', NULL, NULL, '2022-12-02 00:02:56', '2022-12-02 00:02:56'),
(3, 'xin đến muộn', 'thường là xin đến muộn trong 30 phút do tắc đường , hoặc có con nhỏ .....', NULL, NULL, '2022-12-07 21:34:06', '2022-12-07 21:34:06'),
(4, 'việc gia đình', 'nhà có việc lớn như đám cưới,hoặc ăn giỗ,....', NULL, NULL, '2022-12-07 21:50:38', '2022-12-07 21:50:38'),
(5, 'việc bận', 'có việc riêng tư cần giải quyết không liên quan đến việc gia đình', NULL, NULL, '2022-12-07 21:51:32', '2022-12-07 21:51:32'),
(6, 'xin đến muộn nửa buổi', 'có việc riêng tư nhưng có thể không cần phải nghỉ 1 buổi', NULL, NULL, '2022-12-07 21:52:24', '2022-12-07 21:52:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `salarymounth` double NOT NULL DEFAULT 1500000,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `salary`
--

INSERT INTO `salary` (`id`, `name`, `email`, `username`, `salarymounth`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Ninh Thị Phượng', 'ninhphuongnghia@gmail.com', 'ninhphuong', 1500000, '2022-12-07', '2022-12-09', 1),
(2, 'Ninh Thị Phượng', 'ninhphuongnghia@gmail.com', 'ninhphuong', 1500000, '2022-12-07', '2022-12-09', 1),
(3, 'Ninh Thị Phượng', 'ninhphuongnghia@gmail.com', 'ninhphuong', 1500000, '2022-12-09', '2022-12-09', 1),
(4, 'Ninh Thị Phượng', 'ninhphuongnghia@gmail.com', 'ninhphuong', 1500000, '2022-12-09', '2022-12-09', 1),
(5, 'Ninh Thị Phượng', 'ninhphuongnghia@gmail.com', 'ninhphuong', 1500000, '2022-12-09', '2022-12-09', 1),
(6, 'Phượng', 'ninhphuong', 'lueilwitz.melody@example.net', 1500000, '2022-12-09', '2022-12-09', 1),
(7, 'Ninh Ngọc Anh', 'quynhanh', 'ninhphuongnghia@gmail.com', 1500000, '2022-12-09', '2022-12-09', 1),
(8, 'Phượng', 'ninhphuong', 'lueilwitz.melody@example.net', 1500000, '2022-12-09', '2022-12-09', 1),
(9, 'Ninh Ngọc Anh', 'quynhanh', 'ninhphuongnghia@gmail.com', 1500000, '2022-12-09', '2022-12-09', 1),
(10, 'Phượng', 'lueilwitz.melody@example.net', 'ninhphuong', 1500000, '2022-12-09', '2022-12-09', 1),
(11, 'Ninh Ngọc Anh', 'ninhphuongnghia@gmail.com', 'quynhanh', 1500000, '2022-12-09', '2022-12-09', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `general_password_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `check_validate_password` int(11) NOT NULL DEFAULT 0,
  `follow` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `date`, `image`, `username`, `password`, `email`, `email_verified_at`, `level`, `status`, `role`, `remember_token`, `created_at`, `updated_at`, `general_password_token`, `check_validate_password`, `follow`) VALUES
(3, 'Phượng', '0868195800', '28/10/2001', NULL, 'ninhphuong', '$2y$10$JUUyjOt4mk8canAURR7CkeWveLavOZXdzbNrUDZmUDVj9mpUVqrX6', 'lueilwitz.melody@example.net', '2022-11-30 04:00:02', 'nhân viên', 'đang làm', 1, 'nYPhhk6QHMaqYg67ZUn7lrdmWvt6EijxBFQQIDS7TzPefeEtPWxHFvRYxYiR', '2022-11-30 04:00:02', '2022-11-30 04:00:02', '', 0, 0),
(20, 'Ninh Thị Phượng', '077333766912', '2022-12-10', '/storage/images/1669869343_2022-09-06.png', 'quynh1', '$2y$10$TRi5yeuQnCoongfmE4OQEO1CbolNfPHFEjoecu9oEphMrUeGrVofK', 'ninhphuongnghia@gmail.com', NULL, 'Giám đốc', 'Đã nghỉ việc', 0, NULL, '2022-11-30 10:33:35', '2022-12-08 07:43:22', '', 0, 1),
(25, 'Ninh Thị Phượng', '0773337669', '2022-12-10', '/storage/images/1670085199_6.png', 'admin11', '$2y$10$PmlNJDsT98grtHUm.gI6o.MiMe7T9AQ5eILI0JZpm6ACW7vGJJ7O6', 'ninhphuongnghia@gmail.com', NULL, 'Giám đốc', 'Đã nghỉ việc', 0, NULL, '2022-12-03 09:33:19', '2022-12-08 07:43:28', NULL, 0, 1),
(26, 'Phượng', '0773337669123', '2022-12-14', '/storage/images/1670085555_6.png', 'B19DCCN183', '$2y$10$opVuAbWpe6eh0f2nws6Y0emZ6ZwxnUia0uBYV2TCsI9EWmSSTbXTi', 'ninhphuongnghia@gmail.com', NULL, 'Trưởng Phòng', 'Đã nghỉ việc', 0, NULL, '2022-12-03 09:39:16', '2022-12-08 07:44:31', NULL, 0, 1),
(27, 'Ninh Thị Phượng', '0773337669134', '2022-12-16', '/storage/images/1670085735_6.png', 'ninhphuongnghia@gmail.com', '$2y$10$BCE6FaqfM5Fgt32GIabISuJJREcmGf4MiCqbiUv1bXl0gVT1w5MIG', 'ninhphuongnghia@gmail.com', NULL, 'Giám đốc', 'Đã nghỉ việc', 0, NULL, '2022-12-03 09:42:15', '2022-12-08 07:44:36', NULL, 0, 1),
(28, 'lợn', '077333766912345', '2022-12-07', '/storage/images/1670085853_6.png', 'ninhphuongab', '$2y$10$FKEyX.a.yvmuYnu2tWlAVOuUGeDx/CUcownOgeUE.5qFmd8K9Uzmm', 'ninhphuongnghia@gmail.com', NULL, 'Giám đốc', 'Đã nghỉ việc', 0, NULL, '2022-12-03 09:44:13', '2022-12-08 23:40:31', 'bmluaHBodW9uZ25naGlhQGdtYWlsLmNvbTVPc0JXRUNSd2RpUHU5bFdJQkM5OUFyWUFwcGRlbk91', 0, 1),
(29, 'Ninh Thị Phượng', '07733', '2022-12-21', '/storage/images/1670112189_6.png', 'B19DCCN18312', '$2y$10$srkTvAbnYb3eosN3h4frGuLcvQHyEilbjD.Lr.kjV56na2oxg498S', 'ninhphuongnghia@gmail.com', NULL, 'Giám đốc', 'Đã nghỉ việc', 0, NULL, '2022-12-03 17:03:09', '2022-12-06 21:54:11', 'bmluaHBodW9uZ25naGlhQGdtYWlsLmNvbWRLZFVNSVY1bkxOejkxbVF2S0RvclFMY0NuTmFaR3Q5', 1, 0),
(30, 'Ninh Ngọc Anh', '0868195802', '2022-12-13', '/storage/images/1670567900_WIN_20221117_22_32_24_Pro.jpg', 'quynhanh', '$2y$10$Vf6OiWP63JKkC7HeJvIDMu0BHxoVjVF3p6J0ZWbJfO8crrEvoK.aO', 'ninhphuongnghia@gmail.com', NULL, 'Nhân viên', 'Đang làm', 0, NULL, '2022-12-08 23:38:20', '2022-12-08 23:38:20', 'bmluaHBodW9uZ25naGlhQGdtYWlsLmNvbUVKNFo2SXhWc3draUZ3TWVwT25iTUZXZDhZVkFSTXJr', 0, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `later`
--
ALTER TABLE `later`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`,`reason_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `reasons`
--
ALTER TABLE `reasons`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `later`
--
ALTER TABLE `later`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `reasons`
--
ALTER TABLE `reasons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
