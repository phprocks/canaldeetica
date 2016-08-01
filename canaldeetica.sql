-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01-Ago-2016 às 02:26
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
  `type` int(11) NOT NULL COMMENT 'Tipo',
  `returntype` int(11) NOT NULL COMMENT 'Retorno por',
  `subject` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Assunto',
  `message` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Mensagem',
  `status` int(11) NOT NULL COMMENT 'Situação',
  `created` date NOT NULL COMMENT 'Data',
  `updated` date DEFAULT NULL COMMENT 'Alteração',
  `user_id` int(11) NOT NULL COMMENT 'User',
  `updated_by` int(11) DEFAULT NULL,
  `answer` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Ocorrencias' AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `occurrence`
--

INSERT INTO `occurrence` (`id`, `protocol`, `type`, `returntype`, `subject`, `message`, `status`, `created`, `updated`, `user_id`, `updated_by`, `answer`) VALUES
(7, '20167468', 3, 1, 'teste um', 'testeum', 0, '2016-08-01', NULL, 17, NULL, NULL),
(8, '20167908', 4, 2, 'teste um dois', 'teste um dois', 0, '2016-08-01', NULL, 18, NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Extraindo dados da tabela `profile`
--

INSERT INTO `profile` (`id`, `user_id`, `created_at`, `updated_at`, `full_name`, `timezone`) VALUES
(1, 1, '2016-07-30 21:36:12', NULL, 'the one', NULL),
(2, 2, '2016-07-31 03:33:15', '2016-07-31 03:33:15', NULL, NULL),
(3, 3, '2016-07-31 03:39:38', '2016-07-31 03:39:38', NULL, NULL),
(4, 4, '2016-07-31 03:50:19', '2016-07-31 03:50:19', NULL, NULL),
(5, 5, '2016-07-31 21:31:23', '2016-07-31 21:31:23', NULL, NULL),
(6, 6, '2016-07-31 21:43:58', '2016-07-31 21:43:58', NULL, NULL),
(7, 7, '2016-07-31 21:44:23', '2016-07-31 21:44:23', NULL, NULL),
(8, 8, '2016-07-31 21:45:55', '2016-07-31 21:45:55', NULL, NULL),
(9, 9, '2016-07-31 21:50:11', '2016-07-31 21:50:11', NULL, NULL),
(10, 10, '2016-07-31 21:52:29', '2016-07-31 21:52:29', NULL, NULL),
(11, 11, '2016-07-31 21:53:31', '2016-07-31 21:53:31', NULL, NULL),
(12, 12, '2016-07-31 21:54:40', '2016-07-31 21:54:40', NULL, NULL),
(13, 13, '2016-07-31 22:02:31', '2016-07-31 22:02:31', NULL, NULL),
(14, 14, '2016-07-31 22:24:57', '2016-07-31 22:24:57', NULL, NULL),
(15, 15, '2016-07-31 22:37:05', '2016-07-31 22:37:05', NULL, NULL),
(16, 16, '2016-08-01 00:12:29', '2016-08-01 00:12:29', NULL, NULL),
(17, 17, '2016-08-01 01:32:33', '2016-08-01 01:32:33', NULL, NULL),
(18, 18, '2016-08-01 01:34:03', '2016-08-01 01:34:03', NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `role_id`, `status`, `email`, `username`, `password`, `auth_key`, `access_token`, `logged_in_ip`, `logged_in_at`, `created_ip`, `created_at`, `updated_at`, `banned_at`, `banned_reason`) VALUES
(1, 1, 1, 'neo@neo.com', 'neo', '$2y$13$dyVw4WkZGkABf2UrGWrhHO4ZmVBv.K4puhOL59Y9jQhIdj63TlV.O', '2lnf9ba3SSsJTKSKxiwW1-tJ5LN2Dlf0', '6VCiXXzdwcBwH05bgc-F81F_JPUv8sJM', '::1', '2016-07-31 22:45:29', NULL, '2016-07-30 21:36:12', NULL, NULL, NULL),
(2, 2, 0, 'gugoan@hotmail.com', NULL, '$2y$13$F.ekFrctrylT.xzO64pmQOPWludLYo933TBRgPZiR1B2GsdCezgVy', 'MpDaZrH6-h2LmB3EgykjUb5Md3Z76BMY', 'kVetn72-eDANsDehqS52liXwsZcIjysC', NULL, NULL, '127.0.0.1', '2016-07-31 03:33:15', '2016-07-31 03:33:15', NULL, NULL),
(3, 2, 1, 'gugoan@gmail.com', NULL, '$2y$13$RTi.jJb98WPlDQ0V7dVqdeH4Eu2mrXzODp/SMEGpuRkn0GE8W/B1y', 'asoN_CtYBQQywypxiEDOtinwnT0nmFfU', 'JZZqhBcd1vchhLOJnp65syI9H52-B7JN', '127.0.0.1', '2016-07-31 03:39:38', '127.0.0.1', '2016-07-31 03:39:38', '2016-07-31 03:39:38', NULL, NULL),
(4, 2, 1, 'gugoan@uol.com.br', NULL, '$2y$13$HeYODzwEigqzpHlHmtWwW.8OqRctwuTwcxliNMA9udgZyyGtWZDSy', 'wXZUor5bNzoJ-svwjClZG1mrXeaqPpNv', 'hr4kBnGlbQPzzF9koyyv6eSLEuDhPneZ', '127.0.0.1', '2016-07-31 04:23:45', '127.0.0.1', '2016-07-31 03:50:19', '2016-07-31 03:50:19', NULL, NULL),
(5, 2, 1, 'gugoan@yahoo.com.br', NULL, '$2y$13$N3LSDb/DGYhoR/t.SMPdC.Kn4L51/.VUO4OKC.FvxuUVhu.oRtnNm', 'o-OyKnCBEPnaGtgUwLWFyyku5AgUzrFh', 'v530qvilV0FHq9QRQTLlJO1XdWrgZjjM', '127.0.0.1', '2016-07-31 21:31:23', '127.0.0.1', '2016-07-31 21:31:23', '2016-07-31 21:31:23', NULL, NULL),
(6, 2, 1, 'death@gmail.com', NULL, '$2y$13$5ZpBlGQEwNSLY.nO/DLMgeqf1TV/vwsr5VFhfEB2dEJ7zp0vJ/qyu', 'D5NDF7xpc1pMIFPF8U1btTWG10-ZMmiC', '1ACzF2hqhQWHUgTA76ti50jN_moQRB_C', '127.0.0.1', '2016-07-31 21:43:58', '127.0.0.1', '2016-07-31 21:43:58', '2016-07-31 21:43:58', NULL, NULL),
(7, 2, 1, 'death2@gmail.com', NULL, '$2y$13$9FN3reeia2JFMQXWAW.Zhu7mt2aGzqgJr/BgS5Fx4JxNdYRNlD0AK', '8IxvAH-bLg7Bay8rhXEXTOPfuwvw4i_0', 'LJWZ_32GYS2jL_c5ldLcT8lXt2Kedvm7', '127.0.0.1', '2016-07-31 21:44:23', '127.0.0.1', '2016-07-31 21:44:23', '2016-07-31 21:44:23', NULL, NULL),
(8, 2, 1, 'death3@gmail.com', NULL, '$2y$13$9w3e3QXWVMG1.KnmVDhKu.QcoKiI9Xbl37DETVGseLs4RuV83B4yS', 'v0xdGR70wGiYCAZv75dlmDMuLMDmuQe9', '5W1Y8uPYvGjHCRGLKWfg3QVIISvFVz41', '127.0.0.1', '2016-07-31 21:45:55', '127.0.0.1', '2016-07-31 21:45:54', '2016-07-31 21:45:54', NULL, NULL),
(9, 2, 1, 'death4@gmail.com', NULL, '$2y$13$7RoKnjA2oF3gtXGgEboQle4OnlmNgPBeQ7w/zxmicF7WybsUsoERm', 'RWiOWYrhu_Icu3W7l04esz0uZTsfCNZ_', 'rowcwie04hzpDHxlHKeHsAcT4-MTnzlp', '127.0.0.1', '2016-07-31 21:50:11', '127.0.0.1', '2016-07-31 21:50:11', '2016-07-31 21:50:11', NULL, NULL),
(10, 2, 1, 'death5@gmail.com', NULL, '$2y$13$1T7gPgvmfWSjmKK81Fs6vOEfHIivW4ezvMvlH404eQXBVyElinpsa', 'S_XeJqvRmo9RzqVK_z723lk1MgDFfY9p', 'K6cPpLh_yc9FOAcoH-qLg9q_o66kAJnA', '127.0.0.1', '2016-07-31 21:52:29', '127.0.0.1', '2016-07-31 21:52:29', '2016-07-31 21:52:29', NULL, NULL),
(11, 2, 1, 'death6@gmail.com', NULL, '$2y$13$48YCN7Mj6CLN8u/o.5KQ/OfeFdrb8zY7gc.uF2dYXmWS.OZak1XOu', 'LF0a_JFI3QStLnHSZhwxV5kj9aP8q9yU', 'Y7Z_JPNHNkITNtsizs-Z9F_UCZJkc9sl', '127.0.0.1', '2016-07-31 21:53:31', '127.0.0.1', '2016-07-31 21:53:31', '2016-07-31 21:53:31', NULL, NULL),
(12, 2, 1, 'death7@gmail.com', NULL, '$2y$13$G7udC4.NYIYlxEVw1b1viOHueLLsdeYoWGFH88tLefOTT6JlGlCgG', 'N4T-W_QV6cdzNTJ4OYoXu8oeecyKh70r', '5_WjWkIiThnEf5WbVYtyPQFdSZO2VIFZ', '127.0.0.1', '2016-07-31 21:54:40', '127.0.0.1', '2016-07-31 21:54:40', '2016-07-31 21:54:40', NULL, NULL),
(13, 2, 1, 'death8@gmail.com', NULL, '$2y$13$5D5GC4h4NZm4W5krv2ulyuko1VT4g6rEdNd2//roFjdefpqRLHfNO', 'tcbftRE7Iee0iHbXW1AYND6Nv0IxuwLS', 'CW4901emT33-yqjX5LBwJAH9EBvcuTIS', '127.0.0.1', '2016-07-31 22:02:31', '127.0.0.1', '2016-07-31 22:02:31', '2016-07-31 22:02:31', NULL, NULL),
(14, 2, 1, 'death9@gmail.com', NULL, '$2y$13$U1e48RuU3z1x1igwhX/zXe8xNXkUVKa9RBp.4jx54Xrqj7PYlhimC', 'Z2KIyS8m6OGOoykjxp5Wu_LVd0KAHVFo', 'M6zyhx-NhMtVL-XhxqY1F8ck7T1WzCOd', '127.0.0.1', '2016-07-31 22:59:48', '127.0.0.1', '2016-07-31 22:24:57', '2016-07-31 22:24:57', NULL, NULL),
(15, 2, 1, 'death10@gmail.com', NULL, '$2y$13$jUxqPDMV3WzDJ1o/9yhH/O/fES2F5rTpeul1JzZn54l2kMCfKkrdq', 'qFyXhNSzO03FrD7zaPzx0V_wNB_b4MUP', 'xFMVylXTnox8MvRQ6gaZPo5B8jQC9FFE', '127.0.0.1', '2016-07-31 22:37:05', '127.0.0.1', '2016-07-31 22:37:05', '2016-07-31 22:37:05', NULL, NULL),
(16, 2, 1, 'rand@gmail.com', NULL, '$2y$13$ZVXC9dipdtS1vbccfgkh5eAZNgtlfC8SYc9vYaNjAbyFR/aMrL0Bq', '1GB4zHGs5T1z-fv5BnkceJFmTW_KS1Hd', 'SG5gVXHCtCIaydPLu0OIj0JdVNMoQv6r', '127.0.0.1', '2016-08-01 00:12:29', '127.0.0.1', '2016-08-01 00:12:29', '2016-08-01 00:12:29', NULL, NULL),
(17, 2, 1, 'death0@gmail.com', NULL, '$2y$13$O0fUdjoE77lgENUEKCeRhOUGZN/vQL5/CYg6SGWfiq.ty2rQFz2T.', 'DCt4isUJKCDRznxXFxoP3T-PT37gh66o', '-1chjVHbg1sYVJTYWuK_KQCIkRclbX8t', '127.0.0.1', '2016-08-01 01:32:33', '127.0.0.1', '2016-08-01 01:32:33', '2016-08-01 01:32:33', NULL, NULL),
(18, 2, 1, 'visitatn@uol.com.br', NULL, '$2y$13$gTSLQIV.qOCDlJbBPzeN1OSPqEZe.ysi8g8MokIdD5rXqsH6bWg1e', 'GPVDMx5irTEfFmVDKRMWON5IemKKI4s2', 'b1mcz0J3MQYg0_LGFop4EtYlgaDyCtT1', '127.0.0.1', '2016-08-01 01:34:03', '127.0.0.1', '2016-08-01 01:34:03', '2016-08-01 01:34:03', NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `user_token`
--

INSERT INTO `user_token` (`id`, `user_id`, `type`, `token`, `data`, `created_at`, `expired_at`) VALUES
(1, 2, 1, 'gYChPDzp5Rley5f7zyTuETtA5vHiNZY4', NULL, '2016-07-31 03:33:15', NULL);

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
