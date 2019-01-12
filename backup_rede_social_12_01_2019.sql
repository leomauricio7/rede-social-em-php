-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           10.3.10-MariaDB-log - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura para tabela redesocial.chat
CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `de` int(11) DEFAULT 0,
  `para` int(11) DEFAULT 0,
  `msg` text COLLATE utf8_unicode_ci DEFAULT '0',
  `status` enum('V','NV') COLLATE utf8_unicode_ci DEFAULT 'NV',
  `updated` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `Index 2` (`de`),
  KEY `Index 3` (`para`),
  CONSTRAINT `FK_chat_usuarios` FOREIGN KEY (`de`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `FK_chat_usuarios_2` FOREIGN KEY (`para`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela redesocial.chat: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `chat` DISABLE KEYS */;
INSERT INTO `chat` (`id`, `de`, `para`, `msg`, `status`, `updated`, `created`) VALUES
	(1, 4, 2, 'teste chat', 'NV', '2018-12-29 02:12:25', '2018-12-29 02:12:22'),
	(3, 2, 2, 'viado', 'NV', '2019-01-11 02:04:13', '2019-01-11 02:04:13'),
	(4, 2, 3, 'dsfsdf', 'NV', '2019-01-11 02:05:47', '2019-01-11 02:05:47'),
	(5, 2, 3, 'gay\r\n', 'NV', '2019-01-11 02:05:54', '2019-01-11 02:05:54'),
	(6, 2, 3, 'gay 2\r\n', 'NV', '2019-01-11 02:06:05', '2019-01-11 02:06:05');
/*!40000 ALTER TABLE `chat` ENABLE KEYS */;

-- Copiando estrutura para tabela redesocial.comentarios
CREATE TABLE IF NOT EXISTS `comentarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_post` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `data_created` timestamp NULL DEFAULT current_timestamp(),
  `data_update` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `Index 2` (`id_post`),
  KEY `Index 3` (`id_usuario`),
  CONSTRAINT `FK_comentarios_posts` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id`),
  CONSTRAINT `FK_comentarios_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela redesocial.comentarios: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `comentarios` DISABLE KEYS */;
INSERT INTO `comentarios` (`id`, `comentario`, `id_post`, `id_usuario`, `data_created`, `data_update`) VALUES
	(90, 'Teste comentario ', 26, 2, '2018-12-29 00:10:22', '2018-12-29 00:10:22'),
	(91, 'teste2', 25, 2, '2018-12-29 00:12:54', '2018-12-29 00:12:54'),
	(92, 'teste 3', 23, 2, '2018-12-29 00:13:29', '2018-12-29 00:13:29'),
	(93, 'TESTE DE NOVO!!!!!!!!!!!!', 23, 2, '2018-12-29 01:56:48', '2018-12-29 01:56:48'),
	(94, 'yuytuyt', 23, 2, '2018-12-29 02:42:02', '2018-12-29 02:42:02'),
	(95, 'valeu billllllllllllllllllllllll', 26, 2, '2018-12-29 02:42:11', '2018-12-29 02:42:11'),
	(96, 'qual o preÃ§o?', 27, 4, '2018-12-29 02:44:26', '2018-12-29 02:44:26'),
	(97, 'R$ 45.90', 27, 2, '2018-12-29 02:45:04', '2018-12-29 02:45:04'),
	(98, 'ta legal', 26, 2, '2019-01-10 19:26:44', '2019-01-10 19:26:44'),
	(99, 'fsdfsd', 27, 2, '2019-01-11 01:43:30', '2019-01-11 01:43:30'),
	(100, 'se declara logo................', 28, 2, '2019-01-11 01:44:38', '2019-01-11 01:44:38'),
	(101, 'ele Ã© um gay msm', 28, 4, '2019-01-12 09:55:34', '2019-01-12 09:55:34'),
	(102, 'nÃ£o entendi o que vc falou ?', 27, 4, '2019-01-12 09:56:07', '2019-01-12 09:56:07'),
	(103, 'valeu meu filho!!!!!!!! :)', 26, 4, '2019-01-12 09:56:31', '2019-01-12 09:56:31');
/*!40000 ALTER TABLE `comentarios` ENABLE KEYS */;

-- Copiando estrutura para tabela redesocial.likes
CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT 0,
  `curtiu` enum('SIM','NAO') COLLATE utf8_unicode_ci DEFAULT 'NAO',
  `id_post` int(11) DEFAULT 0,
  `data_created` timestamp NULL DEFAULT current_timestamp(),
  `data_update` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_curtidas_post` (`id_usuario`,`id_post`),
  KEY `Index 2` (`id_usuario`,`id_post`),
  KEY `FK_curtidas_posts` (`id_post`),
  CONSTRAINT `FK_curtidas_posts` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id`),
  CONSTRAINT `FK_curtidas_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela redesocial.likes: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` (`id`, `id_usuario`, `curtiu`, `id_post`, `data_created`, `data_update`) VALUES
	(1, 2, 'SIM', 27, '2019-01-03 21:53:48', '2019-01-11 01:42:15'),
	(7, 2, 'SIM', 25, '2019-01-03 22:49:15', '2019-01-03 23:08:35'),
	(8, 2, 'SIM', 26, '2019-01-03 22:49:26', '2019-01-03 23:08:30'),
	(9, 4, 'NAO', 26, '2019-01-03 22:57:24', '2019-01-03 23:04:13'),
	(10, 4, 'SIM', 27, '2019-01-03 23:01:39', '2019-01-03 23:06:32'),
	(11, 4, 'SIM', 23, '2019-01-03 23:06:38', '2019-01-03 23:06:38'),
	(12, 4, 'SIM', 25, '2019-01-03 23:08:06', '2019-01-03 23:08:06'),
	(13, 2, 'SIM', 23, '2019-01-03 23:08:41', '2019-01-03 23:08:41'),
	(14, 4, 'SIM', 28, '2019-01-12 09:55:09', '2019-01-12 09:55:09');
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;

-- Copiando estrutura para tabela redesocial.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(250) COLLATE utf8_unicode_ci DEFAULT '0',
  `legenda` text COLLATE utf8_unicode_ci DEFAULT '0',
  `id_usuario` int(11) DEFAULT 0,
  `data_created` timestamp NULL DEFAULT current_timestamp(),
  `data_update` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `Index 2` (`id_usuario`),
  CONSTRAINT `FK__usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela redesocial.posts: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `img`, `legenda`, `id_usuario`, `data_created`, `data_update`) VALUES
	(23, 'f1.jpg', 'outro teste de publicaÃ§Ã£o ', 2, '2018-12-28 19:20:44', '2018-12-28 19:20:44'),
	(25, 'f5.jpg', 'Vendo peÃ§as para agricultor! mas informaÃ§Ãµes chamar no bate papo....', 2, '2018-12-28 19:27:22', '2018-12-28 19:27:22'),
	(26, 'download.jpg', 'William Henry Gates III mais conhecido como Bill Gates, Ã© um magnata, empresÃ¡rio, diretor executivo, investidor, filantropo e autor americano, que ficou conhecido por fundar junto com Paul Allen a Microsoft, a maior e mais conhecida empresa de software do mundo em termos de valor de mercado', 4, '2018-12-28 23:07:45', '2018-12-28 23:07:45'),
	(27, 'f2.jpg', 'vende-se!!', 2, '2018-12-29 02:43:55', '2018-12-29 02:43:55'),
	(28, '44855458_1048558812014831_4518748526779301888_n.jpg', 'Elias Ã© uma bixa incubada!!!!!!!!!!!!!', 2, '2019-01-11 01:44:18', '2019-01-11 01:44:18');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

-- Copiando estrutura para tabela redesocial.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefone` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `senha` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo` enum('V','C') COLLATE utf8_unicode_ci DEFAULT NULL,
  `sexo` enum('M','F') COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_created` timestamp NULL DEFAULT current_timestamp(),
  `data_update` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela redesocial.usuarios: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `nome`, `avatar`, `telefone`, `email`, `senha`, `tipo`, `sexo`, `data_created`, `data_update`) VALUES
	(2, 'Leonardo Mauricio', '0.jpg', '(84)99430-2191', 'leomauricio7@gmail.com', 'bG1zMjAxMDE=', 'V', 'M', '2018-12-28 15:07:06', '2018-12-29 00:19:39'),
	(3, 'Elias Anderson', '44855458_1048558812014831_4518748526779301888_n.jpg', '4545646546546', 'elias@gmail.com', 'MTIzNDU2', 'V', 'M', '2018-12-28 17:59:24', '2019-01-10 19:36:39'),
	(4, 'Bill Gates', 'download.jpg', '8499452684', 'bil@gmail.com', 'MTIzNA==', 'V', 'M', '2018-12-28 23:06:15', '2018-12-28 23:06:48');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
