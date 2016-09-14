-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14-Set-2016 às 02:08
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `canaldeetica`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `attachment`
--

CREATE TABLE IF NOT EXISTS `attachment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `occurrence_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `attachment`
--

INSERT INTO `attachment` (`id`, `name`, `occurrence_id`) VALUES
(9, 'L9zGsLpoIHC8BgzzucClPfQ1PbtaD2Pp.jpg', 30),
(10, 'u_ZC0RszUqugSgvhv5vjDWEH0_VLg7h0.jpg', 30),
(11, 'yJjcHITzwsJakbeRkdu7AW3m6mtMmTyg.doc', 30),
(12, 'vwhXJ8xgfFVCiBQTlcI9lgNc5Ep8RSmm.pdf', 30);

-- --------------------------------------------------------

--
-- Estrutura da tabela `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1469903765),
('m150214_044831_init_user', 1469903772);

-- --------------------------------------------------------

--
-- Estrutura da tabela `occurrence`
--

CREATE TABLE IF NOT EXISTS `occurrence` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `protocol` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `subject` int(11) NOT NULL COMMENT 'Assunto',
  `location` int(11) DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Mensagem',
  `status` int(11) NOT NULL COMMENT 'Situação',
  `created` date NOT NULL COMMENT 'Data',
  `updated` date DEFAULT NULL COMMENT 'Alteração',
  `updated_by` int(11) DEFAULT NULL,
  `answer` text COLLATE utf8_unicode_ci,
  `reporter_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reporter_email` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reporter_phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reporter_celphone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Ocorrencias' AUTO_INCREMENT=35 ;

--
-- Extraindo dados da tabela `occurrence`
--

INSERT INTO `occurrence` (`id`, `protocol`, `subject`, `location`, `message`, `status`, `created`, `updated`, `updated_by`, `answer`, `reporter_name`, `reporter_email`, `reporter_phone`, `reporter_celphone`) VALUES
(30, '20166509', 0, 0, 'Teste Numero 1\r\nTeste Numero 1\r\nTeste Numero 1Teste Numero 1Teste Numero 1\r\nTeste Numero 1Teste Numero 1Teste Numero 1', 0, '2016-08-22', NULL, NULL, NULL, 'gustavo', 'gustavo@teste.com', '(33)99998-9898', '(33)99797-9797'),
(31, '20166529', 0, 2, 'teste denuncia', 0, '2016-09-11', NULL, NULL, NULL, '', '', '', ''),
(32, '20167093', 2, 0, 'teste elogio\r\nteste envio de email', 0, '2016-09-11', NULL, NULL, NULL, '', '', '', ''),
(33, '20167824', 4, 5, 'Outro teste...\r\nsegundo teste de email', 0, '2016-09-11', NULL, NULL, NULL, '', '', '', ''),
(34, '20167694', 1, 10, 'Teste de email numero 3', 0, '2016-09-11', NULL, NULL, NULL, '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timezone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profile_user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `profile`
--

INSERT INTO `profile` (`id`, `user_id`, `created_at`, `updated_at`, `full_name`, `timezone`) VALUES
(1, 1, '2016-07-30 21:36:12', '2016-08-08 02:51:04', 'Admin', 'Pacific/Midway');

-- --------------------------------------------------------

--
-- Estrutura da tabela `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `can_admin` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `role`
--

INSERT INTO `role` (`id`, `name`, `created_at`, `updated_at`, `can_admin`) VALUES
(1, 'Admin', '2016-07-30 21:36:12', NULL, 1),
(2, 'User', '2016-07-30 21:36:12', NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `status` smallint(6) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `access_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logged_in_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logged_in_at` timestamp NULL DEFAULT NULL,
  `created_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL,
  `banned_reason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_email` (`email`),
  UNIQUE KEY `user_username` (`username`),
  KEY `user_role_id` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `role_id`, `status`, `email`, `username`, `password`, `auth_key`, `access_token`, `logged_in_ip`, `logged_in_at`, `created_ip`, `created_at`, `updated_at`, `banned_at`, `banned_reason`) VALUES
(1, 1, 1, 'admin@admin.com', 'admin', '$2y$13$hayhZMLs8rUoYy8g15ClYOS4PclAWciY13b8HdpcFtDhjnJzZ34iG', '2lnf9ba3SSsJTKSKxiwW1-tJ5LN2Dlf0', '6VCiXXzdwcBwH05bgc-F81F_JPUv8sJM', '127.0.0.1', '2016-09-11 21:40:32', NULL, '2016-07-30 21:36:12', '2016-08-08 02:51:26', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_auth`
--

CREATE TABLE IF NOT EXISTS `user_auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_attributes` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_auth_provider_id` (`provider_id`),
  KEY `user_auth_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_token`
--

CREATE TABLE IF NOT EXISTS `user_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `type` smallint(6) NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `expired_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_token_token` (`token`),
  KEY `user_token_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Limitadores para a tabela `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Limitadores para a tabela `user_auth`
--
ALTER TABLE `user_auth`
  ADD CONSTRAINT `user_auth_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Limitadores para a tabela `user_token`
--
ALTER TABLE `user_token`
  ADD CONSTRAINT `user_token_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
