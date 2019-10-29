-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 29-Out-2019 às 20:35
-- Versão do servidor: 5.7.26
-- versão do PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agroverde`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `de` int(11) DEFAULT '0',
  `para` int(11) DEFAULT '0',
  `msg` text COLLATE utf8_unicode_ci,
  `status` enum('V','NV') COLLATE utf8_unicode_ci DEFAULT 'NV',
  `updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `Index 2` (`de`),
  KEY `Index 3` (`para`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE IF NOT EXISTS `comentarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` text COLLATE utf8_unicode_ci,
  `id_post` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `data_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `data_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `Index 2` (`id_post`),
  KEY `Index 3` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT '0',
  `curtiu` enum('SIM','NAO') COLLATE utf8_unicode_ci DEFAULT 'NAO',
  `id_post` int(11) DEFAULT '0',
  `data_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `data_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_curtidas_post` (`id_usuario`,`id_post`),
  KEY `Index 2` (`id_usuario`,`id_post`),
  KEY `FK_curtidas_posts` (`id_post`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `likes`
--

INSERT INTO `likes` (`id`, `id_usuario`, `curtiu`, `id_post`, `data_created`, `data_update`) VALUES
(18, 6, 'NAO', 31, '2019-10-29 17:26:35', '2019-10-29 17:27:43');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(250) COLLATE utf8_unicode_ci DEFAULT '0',
  `legenda` text COLLATE utf8_unicode_ci,
  `id_usuario` int(11) DEFAULT '0',
  `data_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `data_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `Index 2` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `img`, `legenda`, `id_usuario`, `data_created`, `data_update`) VALUES
(31, 'Cloudinary_-_Official_logo.svg.png', 'fgfdghdfh', 6, '2019-10-29 17:26:27', '2019-10-29 17:26:27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `seguidores`
--

DROP TABLE IF EXISTS `seguidores`;
CREATE TABLE IF NOT EXISTS `seguidores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL DEFAULT '0',
  `id_seguindo` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefone` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `senha` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo` enum('V','C') COLLATE utf8_unicode_ci DEFAULT NULL,
  `descricao` text COLLATE utf8_unicode_ci,
  `sexo` enum('M','F') COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `data_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `avatar`, `telefone`, `email`, `senha`, `tipo`, `descricao`, `sexo`, `data_created`, `data_update`) VALUES
(6, 'Teste', 'Dr. Adriano AraÃºjo.jpg', 'User', 'teste@gmail.com', 'MTIzbXVkYXI=', 'V', NULL, 'M', '2019-10-29 17:24:33', '2019-10-29 17:25:21'),
(7, 'JHONY LUCAS CAVALCANTE DA SILVA', NULL, '84996878769', 'jhonyjl37@gmail.com', 'c2Rz', 'C', NULL, 'M', '2019-10-29 19:52:10', '2019-10-29 19:52:10'),
(8, 'JHONY LUCAS CAVALCANTE DA SILVA', NULL, '84996878769', 'jhonyjl37@gmail.com', 'ZHNkc2Q=', 'C', NULL, 'F', '2019-10-29 20:08:59', '2019-10-29 20:08:59'),
(9, 'Rilton Campos', NULL, '84994056962', 'camposrilton@gmail.com', 'ZHNkcw==', 'C', NULL, 'M', '2019-10-29 20:09:32', '2019-10-29 20:09:32'),
(10, 'Campos', NULL, '84994056962', 'camposrilton@gmail.com', 'ZmRzZmRz', 'C', NULL, 'F', '2019-10-29 20:12:02', '2019-10-29 20:12:02'),
(11, 'Rilton Campos', NULL, '84994056962', 'camposrilton@gmail.com', 'ZHNkcw==', 'C', 'dsdsdsds', NULL, '2019-10-29 20:15:37', '2019-10-29 20:15:37'),
(12, 'Rilton Campos', NULL, '84994056962', 'camposrilton@gmail.com', 'ZmRzZmRz', 'C', NULL, 'M', '2019-10-29 20:22:09', '2019-10-29 20:22:09'),
(13, 'Rilton Campos', NULL, '84994056962', 'camposrilton@gmail.com', 'ZHNkcw==', 'C', NULL, 'M', '2019-10-29 20:25:51', '2019-10-29 20:25:51'),
(14, 'Rilton Campos', NULL, '84994056962', 'camposrilton@gmail.com', 'ZHNkcw==', 'C', 'dsds', NULL, '2019-10-29 20:27:33', '2019-10-29 20:27:33'),
(15, 'Rilton Campos', NULL, '84994056962', 'camposrilton@gmail.com', 'ZmRzZmRz', 'C', 'sdfds', NULL, '2019-10-29 20:31:39', '2019-10-29 20:31:39');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `FK_chat_usuarios` FOREIGN KEY (`de`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `FK_chat_usuarios_2` FOREIGN KEY (`para`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `FK_comentarios_posts` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `FK_comentarios_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `FK_curtidas_posts` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `FK_curtidas_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK__usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
