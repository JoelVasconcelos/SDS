-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.24-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6566
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para casapropria
CREATE DATABASE IF NOT EXISTS `casapropria` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `casapropria`;

-- Copiando estrutura para tabela casapropria.casas
CREATE TABLE IF NOT EXISTS `casas` (
  `tamanhoCasa` text COLLATE utf8_bin NOT NULL,
  `valorVenda` text COLLATE utf8_bin NOT NULL,
  `sinalTotal` text COLLATE utf8_bin NOT NULL,
  `numeroPrestacoes` text COLLATE utf8_bin NOT NULL,
  `valorPrestacoes` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Copiando dados para a tabela casapropria.casas: ~1 rows (aproximadamente)
INSERT INTO `casas` (`tamanhoCasa`, `valorVenda`, `sinalTotal`, `numeroPrestacoes`, `valorPrestacoes`) VALUES
	('24', '20000', '200', '300', '300');

-- Copiando estrutura para tabela casapropria.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `senha` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela casapropria.usuarios: ~1 rows (aproximadamente)
INSERT INTO `usuarios` (`id`, `email`, `senha`) VALUES
	(4, 'joelvrf@gmail.com', '202cb962ac59075b964b07152d234b70');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
