-- --------------------------------------------------------
-- Anfitrião:                    127.0.0.1
-- Versão do servidor:           10.6.3-MariaDB - mariadb.org binary distribution
-- SO do servidor:               Win64
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- A despejar estrutura da base de dados para restaurante
CREATE DATABASE IF NOT EXISTS `restaurante` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `restaurante`;

-- A despejar estrutura para tabela restaurante.backenduser
CREATE TABLE IF NOT EXISTS `backenduser` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(10) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `username` varchar(35) DEFAULT NULL,
  `password` varchar(35) DEFAULT NULL,
  `cargo` enum('gerente','funcionario','cozinheiro') DEFAULT 'funcionario',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- A despejar dados para tabela restaurante.backenduser: ~5 rows (aproximadamente)
DELETE FROM `backenduser`;
/*!40000 ALTER TABLE `backenduser` DISABLE KEYS */;
INSERT INTO `backenduser` (`id`, `firstname`, `lastname`, `username`, `password`, `cargo`) VALUES
	(1, 'João', 'Pires', 'admin', 'admin', 'gerente'),
	(2, 'Manuel', 'G.', 'cozinheiro', 'cozinheiro', 'cozinheiro'),
	(3, 'Pedro', 'S.', 'funcionario', 'funcionario', 'funcionario'),
	(7, 'Manel', 'Joq', 'cliente', '', 'gerente'),
	(8, '', '', '', '', 'gerente');
/*!40000 ALTER TABLE `backenduser` ENABLE KEYS */;

-- A despejar estrutura para tabela restaurante.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(1) NOT NULL AUTO_INCREMENT,
  `prinome` varchar(20) DEFAULT NULL,
  `ultnome` varchar(20) DEFAULT NULL,
  `nif` bigint(20) DEFAULT 0,
  `rua` varchar(50) DEFAULT NULL,
  `nporta` int(20) DEFAULT NULL,
  `codpostal` varchar(10) NOT NULL,
  `telefone` int(11) DEFAULT 0,
  `email` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `FK_cliente_codpostal` (`codpostal`),
  CONSTRAINT `FK_cliente_codpostal` FOREIGN KEY (`codpostal`) REFERENCES `codpostal` (`codpostal`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3;

-- A despejar dados para tabela restaurante.cliente: ~3 rows (aproximadamente)
DELETE FROM `cliente`;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`id_cliente`, `prinome`, `ultnome`, `nif`, `rua`, `nporta`, `codpostal`, `telefone`, `email`) VALUES
	(1, 'Joaquim', ' Alberto', 1111111111, 'Rua do S. João Bosco', 130, '4100-450', 915919438, 'j.pires@ipvc.pt'),
	(2, 'Fernando', 'Rodrigues', 2222222222, 'Rua de Cinel', 1, '1333-133', 910000000, 'fernas@gmail.com'),
	(3, 'G.', 'Q.', 3333333333, 'Rua de trás', 69, '?', 919999999, '?');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- A despejar estrutura para tabela restaurante.codpostal
CREATE TABLE IF NOT EXISTS `codpostal` (
  `codpostal` varchar(20) NOT NULL,
  `localidade` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`codpostal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- A despejar dados para tabela restaurante.codpostal: ~4 rows (aproximadamente)
DELETE FROM `codpostal`;
/*!40000 ALTER TABLE `codpostal` DISABLE KEYS */;
INSERT INTO `codpostal` (`codpostal`, `localidade`) VALUES
	('1333-133', 'Longe'),
	('2000-100', 'Viana'),
	('4100-450', 'Porto'),
	('?', '?');
/*!40000 ALTER TABLE `codpostal` ENABLE KEYS */;

-- A despejar estrutura para tabela restaurante.fornecedor
CREATE TABLE IF NOT EXISTS `fornecedor` (
  `id_fornecedor` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) DEFAULT NULL,
  `rua` varchar(100) DEFAULT NULL,
  `nporta` int(10) DEFAULT NULL,
  `codpostal` varchar(10) NOT NULL,
  `telefone` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_fornecedor`) USING BTREE,
  KEY `FK_fornecedor_codpostal` (`codpostal`),
  CONSTRAINT `FK_fornecedor_codpostal` FOREIGN KEY (`codpostal`) REFERENCES `codpostal` (`codpostal`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- A despejar dados para tabela restaurante.fornecedor: ~1 rows (aproximadamente)
DELETE FROM `fornecedor`;
/*!40000 ALTER TABLE `fornecedor` DISABLE KEYS */;
INSERT INTO `fornecedor` (`id_fornecedor`, `nome`, `rua`, `nporta`, `codpostal`, `telefone`) VALUES
	(1, 'Talho do lima', 'Rua do lima', 72, '4100-450', 910000000);
/*!40000 ALTER TABLE `fornecedor` ENABLE KEYS */;

-- A despejar estrutura para tabela restaurante.funcionario
CREATE TABLE IF NOT EXISTS `funcionario` (
  `id_funcionario` int(10) NOT NULL AUTO_INCREMENT,
  `prinome` varchar(50) DEFAULT '0',
  `ultnome` varchar(50) DEFAULT '0',
  `nif` int(10) DEFAULT NULL,
  `rua` varchar(20) DEFAULT NULL,
  `nporta` int(11) DEFAULT NULL,
  `codpostal` varchar(10) NOT NULL,
  `telefone` int(11) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `salario` float DEFAULT NULL,
  PRIMARY KEY (`id_funcionario`),
  KEY `FK_funcionario_codpostal` (`codpostal`),
  CONSTRAINT `FK_funcionario_codpostal` FOREIGN KEY (`codpostal`) REFERENCES `codpostal` (`codpostal`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

-- A despejar dados para tabela restaurante.funcionario: ~2 rows (aproximadamente)
DELETE FROM `funcionario`;
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
INSERT INTO `funcionario` (`id_funcionario`, `prinome`, `ultnome`, `nif`, `rua`, `nporta`, `codpostal`, `telefone`, `email`, `salario`) VALUES
	(1, 'Gonçalo', 'Antunes', 2000000000, 'Rua da frente', 41, '4100-450', 910000000, 'gon@gmail.com', 2100),
	(2, 'Bianca', 'Branca', 1000000000, 'Rua do lado', 41, '4100-450', 101111111, 'bia@gmail.com', 300);
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;

-- A despejar estrutura para tabela restaurante.mesa
CREATE TABLE IF NOT EXISTS `mesa` (
  `id_mesa` int(10) NOT NULL AUTO_INCREMENT,
  `capacidade` smallint(6) DEFAULT 4,
  `status` enum('reservado','ocupado','livre') NOT NULL DEFAULT 'livre',
  PRIMARY KEY (`id_mesa`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- A despejar dados para tabela restaurante.mesa: ~8 rows (aproximadamente)
DELETE FROM `mesa`;
/*!40000 ALTER TABLE `mesa` DISABLE KEYS */;
INSERT INTO `mesa` (`id_mesa`, `capacidade`, `status`) VALUES
	(1, 4, 'reservado'),
	(2, 2, 'livre'),
	(3, 4, 'livre'),
	(4, 4, 'livre'),
	(5, 4, 'ocupado'),
	(6, 4, 'livre'),
	(7, 4, 'livre'),
	(8, 4, 'livre');
/*!40000 ALTER TABLE `mesa` ENABLE KEYS */;

-- A despejar estrutura para tabela restaurante.prato
CREATE TABLE IF NOT EXISTS `prato` (
  `id_prato` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) DEFAULT NULL,
  `precocusto` float DEFAULT NULL,
  `precovenda` float DEFAULT NULL,
  `image` tinytext DEFAULT NULL,
  PRIMARY KEY (`id_prato`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

-- A despejar dados para tabela restaurante.prato: ~4 rows (aproximadamente)
DELETE FROM `prato`;
/*!40000 ALTER TABLE `prato` DISABLE KEYS */;
INSERT INTO `prato` (`id_prato`, `nome`, `precocusto`, `precovenda`, `image`) VALUES
	(1, 'Almondegas', 12, 20, 'https://t2.rg.ltmcdn.com/pt/images/7/9/9/img_almondegas_com_farinha_integral_4997_orig.jpg'),
	(2, 'Arroz de cabidela', 8, 10, 'https://www.petiscos.com/wp-content/uploads/2020/04/113cc66c849c5b1f028704d20a9e62ad6_cabidela_galinha-678x470.jpg'),
	(3, 'Lasagna', 15, 50, 'https://hips.hearstapps.com/vidthumb/images/180820-bookazine-delish-01280-1536610916.jpg?crop=1.00xw%3A0.846xh%3B0.00160xw%2C0.154xh&resize=480%3A270'),
	(4, 'Bacalhau com natas', 10, 20, 'https://www.vaqueiro.pt/-/media/project/upfield/whitelabels/vaqueiro-pt/assets/recipes/sync-images/289bc81e-7743-49f3-a13a-56481c563d3d.jpg?w=1200');
/*!40000 ALTER TABLE `prato` ENABLE KEYS */;

-- A despejar estrutura para tabela restaurante.reserva
CREATE TABLE IF NOT EXISTS `reserva` (
  `id_reserva` int(10) NOT NULL AUTO_INCREMENT,
  `num_pessoas` smallint(6) DEFAULT NULL,
  `id_cliente` int(10) NOT NULL,
  `id_mesa` int(11) NOT NULL,
  `hora` date NOT NULL DEFAULT '1111-11-11',
  PRIMARY KEY (`id_reserva`),
  KEY `FK_reserva_cliente` (`id_cliente`),
  KEY `FK_reserva_mesa` (`id_mesa`),
  CONSTRAINT `FK_reserva_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_reserva_mesa` FOREIGN KEY (`id_mesa`) REFERENCES `mesa` (`id_mesa`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- A despejar dados para tabela restaurante.reserva: ~5 rows (aproximadamente)
DELETE FROM `reserva`;
/*!40000 ALTER TABLE `reserva` DISABLE KEYS */;
INSERT INTO `reserva` (`id_reserva`, `num_pessoas`, `id_cliente`, `id_mesa`, `hora`) VALUES
	(1, 6, 2, 5, '1111-11-11'),
	(2, 44, 2, 6, '1111-11-11'),
	(3, 8, 3, 5, '1111-11-11'),
	(4, NULL, 1, 1, '1111-11-11'),
	(5, NULL, 1, 1, '1111-11-11');
/*!40000 ALTER TABLE `reserva` ENABLE KEYS */;

-- A despejar estrutura para tabela restaurante.stock
CREATE TABLE IF NOT EXISTS `stock` (
  `id_stock` int(5) NOT NULL AUTO_INCREMENT,
  `nome` varchar(10) DEFAULT NULL,
  `quantidade` int(10) DEFAULT NULL,
  `preco` float DEFAULT NULL,
  `validade` date NOT NULL DEFAULT '1111-11-11',
  `id_fornecedor` int(10) NOT NULL,
  PRIMARY KEY (`id_stock`) USING BTREE,
  KEY `FK_stock_fornecedor` (`id_fornecedor`),
  CONSTRAINT `FK_stock_fornecedor` FOREIGN KEY (`id_fornecedor`) REFERENCES `fornecedor` (`id_fornecedor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- A despejar dados para tabela restaurante.stock: ~2 rows (aproximadamente)
DELETE FROM `stock`;
/*!40000 ALTER TABLE `stock` DISABLE KEYS */;
INSERT INTO `stock` (`id_stock`, `nome`, `quantidade`, `preco`, `validade`, `id_fornecedor`) VALUES
	(1, 'Fiambre', 30, 0.2, '2021-12-02', 1),
	(2, 'Manteiga', 100, 1.2, '2021-09-06', 1);
/*!40000 ALTER TABLE `stock` ENABLE KEYS */;

-- A despejar estrutura para tabela restaurante.takeaway
CREATE TABLE IF NOT EXISTS `takeaway` (
  `id_takeaway` int(10) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(10) NOT NULL,
  `id_prato` int(10) NOT NULL,
  PRIMARY KEY (`id_takeaway`) USING BTREE,
  KEY `FK_takeaway_cliente` (`id_cliente`),
  KEY `FK_takeaway_prato` (`id_prato`),
  CONSTRAINT `FK_takeaway_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_takeaway_prato` FOREIGN KEY (`id_prato`) REFERENCES `prato` (`id_prato`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

-- A despejar dados para tabela restaurante.takeaway: ~3 rows (aproximadamente)
DELETE FROM `takeaway`;
/*!40000 ALTER TABLE `takeaway` DISABLE KEYS */;
INSERT INTO `takeaway` (`id_takeaway`, `id_cliente`, `id_prato`) VALUES
	(1, 1, 2),
	(2, 3, 3),
	(7, 2, 2);
/*!40000 ALTER TABLE `takeaway` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
