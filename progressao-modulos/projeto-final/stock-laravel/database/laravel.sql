-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 16/03/2024 às 22:28
-- Versão do servidor: 8.0.30
-- Versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `laravel`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` bigint UNSIGNED NOT NULL,
  `nome` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pagamento` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `admissao` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `demissao` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `nome`, `cargo`, `pagamento`, `admissao`, `demissao`, `ativo`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Jonas De Araújo Pereira', 'Admin', '550 / semanal', '16/03/2024', NULL, 1, NULL, '2024-03-16 11:07:09', '2024-03-16 22:17:53'),
(2, 'Francisca Maria Oliveira', 'Atendente', '800 / quinzenal', '08/07/2022', NULL, 1, NULL, '2024-03-16 11:34:47', '2024-03-16 20:47:17'),
(3, 'Maria Carneiro Rodrigues Da Silva', 'Gerente', '1200 / quinzenal', '16/03/2024', NULL, 1, NULL, '2024-03-16 22:08:29', '2024-03-16 22:15:59'),
(4, 'Joana D\'arc', 'Contadora', '1200 / quinzenal', '16/03/2024', NULL, 1, NULL, '2024-03-16 22:10:56', '2024-03-16 22:10:56'),
(5, 'Antônia Lourdes De Sousa', 'Atendente', '800 / quinzenal', '16/03/2024', NULL, 1, NULL, '2024-03-16 22:12:33', '2024-03-16 22:12:33'),
(6, 'Solange Da Costa Neto', 'Atendente', '800 / quinzenal', '16/03/2024', NULL, 1, NULL, '2024-03-16 22:16:40', '2024-03-16 22:16:40'),
(7, 'Roberto Carlos', 'Atendente', '800 / quinzenal', '16/03/2024', NULL, 1, NULL, '2024-03-16 22:19:40', '2024-03-16 22:19:40'),
(8, 'Leonardo Silva', 'Atendente', '800 / quinzenal', '16/03/2024', NULL, 1, NULL, '2024-03-16 22:20:38', '2024-03-16 22:20:38'),
(9, 'Luís Cláudio Campelo', 'Atendente', '400 / semanal', '16/03/2024', NULL, 1, NULL, '2024-03-16 22:21:38', '2024-03-16 22:21:38'),
(10, 'Ana Carla Cavalcante', 'Admin', '550 / semanal', '16/03/2024', NULL, 1, NULL, '2024-03-16 22:23:34', '2024-03-16 22:23:34');

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(11, '2024_03_11_052648_create_produtos_table', 3),
(13, '2014_10_12_100000_create_password_resets_table', 4),
(15, '2024_03_11_052648_create_funcionarios_table', 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` bigint UNSIGNED NOT NULL,
  `nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `codigo` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estoque` int NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `preco`, `codigo`, `estoque`, `ativo`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Café Kimimo 500g', 8.39, 'CF0000000000001', 400, 1, NULL, '2024-03-13 10:30:03', '2024-03-16 21:33:43'),
(2, 'Café Santa Clara 250g', 9.29, 'CFSC00000000001', 500, 1, NULL, '2024-03-14 03:09:09', '2024-03-16 20:59:59'),
(3, 'Açúcar Cristal 1kg', 4.99, 'AÇC000000000001', 450, 0, NULL, '2024-03-14 11:28:51', '2024-03-16 20:11:17'),
(4, 'Farinha', 6.49, 'FRH000000000001', 500, 0, NULL, '2024-03-14 11:33:36', '2024-03-16 21:01:03'),
(5, 'Biscoito Maizena', 4.79, 'BSCMZ0000000001', 250, 1, NULL, '2024-03-14 23:55:29', '2024-03-16 20:51:28'),
(6, 'Bolo Mole', 3.49, 'BLM000000000001', 320, 1, NULL, '2024-03-16 10:34:53', '2024-03-16 20:51:39'),
(7, 'Creme de leite - italac', 3.79, 'crlt00000000001', 150, 0, NULL, '2024-03-16 21:42:34', '2024-03-16 21:42:34'),
(8, 'Óleo soya 900ml', 8.49, 'ol0000000000001', 250, 1, NULL, '2024-03-16 21:44:12', '2024-03-16 21:44:12'),
(9, 'Leite Itambé 250g', 6.79, 'LT0000000000001', 150, 1, NULL, '2024-03-16 21:47:31', '2024-03-16 21:47:31'),
(10, 'Nascau 250g', 5.79, 'NSC000000000001', 150, 1, NULL, '2024-03-16 21:48:49', '2024-03-16 21:48:49'),
(11, 'Óleo Girassol 900ml', 17.39, 'OLGSL0000000001', 150, 1, NULL, '2024-03-16 21:49:31', '2024-03-16 21:49:31'),
(12, 'Óleo Hidratante 300ml', 5.89, 'OLHDT0000000001', 150, 1, NULL, '2024-03-16 21:51:28', '2024-03-16 21:51:28'),
(13, 'Macarrão 250g', 2.79, 'MCR000000000001', 150, 1, NULL, '2024-03-16 21:52:20', '2024-03-16 21:52:20'),
(14, 'Aveia em flocos fino 250g', 6.69, 'AVFF00000000001', 350, 1, NULL, '2024-03-16 21:58:06', '2024-03-16 21:58:06');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipoAcesso` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `tipoAcesso`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'jonas de araújo pereira', 'jp_araujoaraujo@hotmail.com', 'func', NULL, '$2y$12$76RTtCK5D.tmas1lZD6sOeQP76RuBLeMElxdArQR54MiToW6zltYW', NULL, '2024-03-13 20:18:55', '2024-03-13 20:18:55');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices de tabela `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Índices de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
