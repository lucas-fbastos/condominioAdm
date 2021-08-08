-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Jun-2021 às 21:31
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `condominio_adm`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `balancetes`
--

CREATE TABLE `balancetes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `balancetes`
--

INSERT INTO `balancetes` (`id`, `created_at`, `updated_at`, `titulo`, `path`, `users_id`, `descricao`) VALUES
(3, '2021-05-25 16:28:38', '2021-05-25 16:28:38', 'teste 2', 'balancetes/cYtAF3x0a8J5AUI6GaAdZ0WhvcgQeLRvABs3uf0E.png', 1, '2 teste 2'),
(4, '2021-05-25 16:28:52', '2021-05-25 16:28:52', 'teste 3', 'balancetes/8zcalNjmJZHjnArOpri6luB6l2NMiGIDw56gvKk9.png', 1, 'teste 3'),
(5, '2021-05-25 16:29:18', '2021-05-25 16:29:18', 'teste 4', 'balancetes/QXGSyzzsygB4uBBnAFS5q7d3sKfKp33u1J2chMzQ.pdf', 1, '444444'),
(6, '2021-05-25 16:29:41', '2021-05-25 20:12:26', 'Balancete teste', 'balancetes/PSAKDsTcJmbmfSMuijeibtCmD5VVuzNq9UMAAI52.pdf', 1, 'teste teste teste'),
(7, '2021-05-25 16:29:52', '2021-05-26 01:38:45', 'Balancete maio - 2021', 'balancetes/c1WOV9akSiNoAK6md5R98iOhNMEtLPdE8RG9Sbws.pdf', 1, 'teste atualizado'),
(8, '2021-05-25 16:30:14', '2021-05-25 20:11:35', 'Balancete Nov - 2020', 'balancetes/cgkeXBzIHDPoA3ysPLnfTIfidzxmuaRPrBqbdZqP.pdf', 1, 'informações financeiras referentes ao mês de novembro do ano de 2020');

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2021_04_19_020103_create_balancetes_table', 1),
(13, '2021_04_25_210305_create_tipo_ocorrencias_table', 1),
(14, '2021_04_25_210315_create_ocorrencias_table', 1),
(15, '2021_05_25_142751_add_data_to_ocorrencias_table', 2),
(16, '2021_05_25_150705_add_icon_to_tipo_ocorrencias_table', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ocorrencias`
--

CREATE TABLE `ocorrencias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `tipo_ocorrencias_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `data_ocorrencia` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `ocorrencias`
--

INSERT INTO `ocorrencias` (`id`, `descricao`, `users_id`, `tipo_ocorrencias_id`, `created_at`, `updated_at`, `data_ocorrencia`) VALUES
(1, 'teste', 1, 1, '2021-05-25 17:41:52', '2021-05-25 17:41:52', '2021-05-25 11:15:00'),
(2, 'manutenção realizada por parte da equipe da CEB', 1, 4, '2021-05-25 18:24:38', '2021-05-25 18:24:38', '2021-05-18 12:24:00'),
(3, 'Reclamação do morador da unidade 2 sobre o som alto na unidade 10  após as 22h', 1, 6, '2021-05-25 18:31:47', '2021-05-25 18:31:47', '2021-05-24 12:30:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_ocorrencias`
--

CREATE TABLE `tipo_ocorrencias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descricao_tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tipo_ocorrencias`
--

INSERT INTO `tipo_ocorrencias` (`id`, `descricao_tipo`, `icon`) VALUES
(1, 'Entrega', 'fas fa-box-open'),
(4, 'Manutenção na rede Elétrica', 'fas fa-bolt'),
(5, 'Manutenção Hidraulica', 'fas fa-tint-slash'),
(6, 'Reclamação', 'fas fa-comment');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perfil` int(10) UNSIGNED NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `perfil`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'lucas felix bastos', 'felixbastos.lucas@gmail.com', 1, NULL, '$2y$10$nas1PGgtp10Zm0.D/VDmJOx6Tyyo3kF9FvdPJumf/CRvgJKfnb95W', NULL, NULL, NULL),
(3, 'teste', 'teste@a.com', 1, NULL, '$2y$10$xZjeN69hWNbDH8Zwii1qjOJpsVGlqBqjrddOHhYEKqZsvsLjE.lD.', NULL, '2021-05-25 18:41:12', '2021-05-25 18:41:12'),
(4, 'teste2', 'teste2@a.com', 4, NULL, '$2y$10$9vVHTPkD0aUcL28WB8fTaO9lZijLYs5AF6.HKAi5RY3N2BbqP7Yba', NULL, '2021-05-25 18:42:49', '2021-05-25 18:42:49'),
(5, 'teste 3', 'teste3@a.com', 2, NULL, '$2y$10$.CT6XvCygOcQgY.8hmBxh.h647GTEOE.twobi65S3m4Mz81CG5Z52', NULL, '2021-05-25 18:52:46', '2021-05-25 18:52:46');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `balancetes`
--
ALTER TABLE `balancetes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `balancetes_nome_unique` (`titulo`),
  ADD KEY `balancetes_users_id_foreign` (`users_id`);

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `ocorrencias`
--
ALTER TABLE `ocorrencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ocorrencias_users_id_foreign` (`users_id`),
  ADD KEY `ocorrencias_tipo_ocorrencias_id_foreign` (`tipo_ocorrencias_id`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices para tabela `tipo_ocorrencias`
--
ALTER TABLE `tipo_ocorrencias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `balancetes`
--
ALTER TABLE `balancetes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `ocorrencias`
--
ALTER TABLE `ocorrencias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tipo_ocorrencias`
--
ALTER TABLE `tipo_ocorrencias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `balancetes`
--
ALTER TABLE `balancetes`
  ADD CONSTRAINT `balancetes_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `ocorrencias`
--
ALTER TABLE `ocorrencias`
  ADD CONSTRAINT `ocorrencias_tipo_ocorrencias_id_foreign` FOREIGN KEY (`tipo_ocorrencias_id`) REFERENCES `tipo_ocorrencias` (`id`),
  ADD CONSTRAINT `ocorrencias_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
