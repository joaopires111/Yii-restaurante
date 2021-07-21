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
  `Cargo` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- A despejar dados para tabela restaurante.backenduser: ~4 rows (aproximadamente)
DELETE FROM `backenduser`;
/*!40000 ALTER TABLE `backenduser` DISABLE KEYS */;
INSERT INTO `backenduser` (`id`, `firstname`, `lastname`, `username`, `password`, `Cargo`) VALUES
	(1, 'João', 'Pires', 'admin', 'admin', 'gerente'),
	(2, 'Manuel', 'G.', 'cozinha', 'cozinha', 'cozinheiro'),
	(3, 'Pedro', 'S.', 'empregado', 'empregado', 'empregado'),
	(4, 'J.', 'Alberto', 'jocasalb', 'joc', 'cliente');
/*!40000 ALTER TABLE `backenduser` ENABLE KEYS */;

-- A despejar estrutura para tabela restaurante.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(1) NOT NULL,
  `prinome` varchar(100) DEFAULT NULL,
  `ultnome` varchar(100) DEFAULT NULL,
  `nif` bigint(20) DEFAULT 0,
  `rua` varchar(100) DEFAULT NULL,
  `nporta` int(20) DEFAULT NULL,
  `codpostal` varchar(10) DEFAULT NULL,
  `telefone` int(11) DEFAULT 0,
  `email` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `FK_cliente_codpostal` (`codpostal`),
  CONSTRAINT `FK_cliente_codpostal` FOREIGN KEY (`codpostal`) REFERENCES `codpostal` (`codpostal`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
  `id_fornecedor` int(10) NOT NULL,
  `nome` varchar(20) DEFAULT NULL,
  `rua` varchar(100) DEFAULT NULL,
  `nporta` int(10) DEFAULT NULL,
  `codpostal` varchar(10) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_fornecedor`) USING BTREE,
  KEY `FK_fornecedor_codpostal` (`codpostal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- A despejar dados para tabela restaurante.fornecedor: ~2 rows (aproximadamente)
DELETE FROM `fornecedor`;
/*!40000 ALTER TABLE `fornecedor` DISABLE KEYS */;
INSERT INTO `fornecedor` (`id_fornecedor`, `nome`, `rua`, `nporta`, `codpostal`, `telefone`) VALUES
	(1, 'Carnes lda', 'Rua do Fornecedor', 55, '4100-450', '965783452'),
	(2, 'Laticinios', 'Rua do Fornecedor2', 22, '4100-450', '961111222');
/*!40000 ALTER TABLE `fornecedor` ENABLE KEYS */;

-- A despejar estrutura para tabela restaurante.funcionario
CREATE TABLE IF NOT EXISTS `funcionario` (
  `id_funcionario` int(10) NOT NULL,
  `prinome` varchar(50) DEFAULT '0',
  `ultnome` varchar(50) DEFAULT '0',
  `nif` int(10) DEFAULT NULL,
  `rua` varchar(20) DEFAULT NULL,
  `nporta` varchar(20) DEFAULT NULL,
  `codpostal` varchar(10) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `salario` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_funcionario`),
  KEY `FK_funcionario_codpostal` (`codpostal`),
  CONSTRAINT `FK_funcionario_codpostal` FOREIGN KEY (`codpostal`) REFERENCES `codpostal` (`codpostal`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- A despejar dados para tabela restaurante.funcionario: ~2 rows (aproximadamente)
DELETE FROM `funcionario`;
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
INSERT INTO `funcionario` (`id_funcionario`, `prinome`, `ultnome`, `nif`, `rua`, `nporta`, `codpostal`, `telefone`, `email`, `salario`) VALUES
	(1, 'Gonçalo', 'Antunes', 2000000000, 'Rua da frente', '41', '4100-450', '961549203', 'gon@gmail.com', 2100),
	(2, 'Bianca', 'Branca', 1000000000, 'Rua do lado', '41', '4100-450', '961900876', 'bia@gmail.com', 300);
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;

-- A despejar estrutura para tabela restaurante.prato
CREATE TABLE IF NOT EXISTS `prato` (
  `id_prato` int(10) NOT NULL,
  `nome` varchar(20) DEFAULT NULL,
  `precocusto` varchar(20) DEFAULT NULL,
  `precovenda` varchar(20) DEFAULT NULL,
  `quantidade` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_prato`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- A despejar dados para tabela restaurante.prato: ~3 rows (aproximadamente)
DELETE FROM `prato`;
/*!40000 ALTER TABLE `prato` DISABLE KEYS */;
INSERT INTO `prato` (`id_prato`, `nome`, `precocusto`, `precovenda`, `quantidade`) VALUES
	(0, 'Lasagna', '15', '16.99', 30),
	(1, 'Almondegas', '12', '15', 10),
	(2, 'Arroz de cabidela', '8', '10', 20);
/*!40000 ALTER TABLE `prato` ENABLE KEYS */;

-- A despejar estrutura para tabela restaurante.stock
CREATE TABLE IF NOT EXISTS `stock` (
  `id_stock` int(5) NOT NULL,
  `nome` varchar(10) DEFAULT NULL,
  `quantidade` int(10) DEFAULT NULL,
  `preco` varchar(20) DEFAULT NULL,
  `validade` date DEFAULT NULL,
  `id_fornecedor` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_stock`) USING BTREE,
  KEY `FK_stock_fornecedor` (`id_fornecedor`),
  CONSTRAINT `FK_stock_fornecedor` FOREIGN KEY (`id_fornecedor`) REFERENCES `fornecedor` (`id_fornecedor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- A despejar dados para tabela restaurante.stock: ~3 rows (aproximadamente)
DELETE FROM `stock`;
/*!40000 ALTER TABLE `stock` DISABLE KEYS */;
INSERT INTO `stock` (`id_stock`, `nome`, `quantidade`, `preco`, `validade`, `id_fornecedor`) VALUES
	(1, 'Fiambre', 30, '0.20', '2021-12-02', 1),
	(2, 'Queijo', 22, '0.23', '2021-08-22', 2),
	(3, 'Massa', 55, '0.05', '2021-12-31', 2);
/*!40000 ALTER TABLE `stock` ENABLE KEYS */;

-- A despejar estrutura para tabela restaurante.stock_prato
CREATE TABLE IF NOT EXISTS `stock_prato` (
  `id_prato` int(10) DEFAULT NULL,
  `id_stock` int(10) DEFAULT NULL,
  KEY `FK_stock_prato_prato` (`id_prato`),
  KEY `FK_stock_prato_stock` (`id_stock`),
  CONSTRAINT `FK_stock_prato_prato` FOREIGN KEY (`id_prato`) REFERENCES `prato` (`id_prato`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_stock_prato_stock` FOREIGN KEY (`id_stock`) REFERENCES `stock` (`id_stock`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- A despejar dados para tabela restaurante.stock_prato: ~0 rows (aproximadamente)
DELETE FROM `stock_prato`;
/*!40000 ALTER TABLE `stock_prato` DISABLE KEYS */;
/*!40000 ALTER TABLE `stock_prato` ENABLE KEYS */;

-- A despejar estrutura para tabela restaurante.takeaway
CREATE TABLE IF NOT EXISTS `takeaway` (
  `id_takeaway` int(10) NOT NULL AUTO_INCREMENT,
  `valor` float DEFAULT NULL,
  `iva` float DEFAULT NULL,
  `valor(iva)` float DEFAULT NULL,
  `id_cliente` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_takeaway`) USING BTREE,
  KEY `FK_takeaway_cliente` (`id_cliente`),
  CONSTRAINT `FK_takeaway_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- A despejar dados para tabela restaurante.takeaway: ~2 rows (aproximadamente)
DELETE FROM `takeaway`;
/*!40000 ALTER TABLE `takeaway` DISABLE KEYS */;
INSERT INTO `takeaway` (`id_takeaway`, `valor`, `iva`, `valor(iva)`, `id_cliente`) VALUES
	(1, 25, 0.23, 27, 1),
	(2, 30, 0.23, 33, 3);
/*!40000 ALTER TABLE `takeaway` ENABLE KEYS */;

-- A despejar estrutura para tabela restaurante.takeaway_prato
CREATE TABLE IF NOT EXISTS `takeaway_prato` (
  `id_prato` int(10) DEFAULT NULL,
  `id_takeaway` int(10) DEFAULT NULL,
  KEY `FK_takeaway_prato_prato` (`id_prato`),
  KEY `FK_takeaway_prato_takeaway` (`id_takeaway`),
  CONSTRAINT `FK_takeaway_prato_prato` FOREIGN KEY (`id_prato`) REFERENCES `prato` (`id_prato`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_takeaway_prato_takeaway` FOREIGN KEY (`id_takeaway`) REFERENCES `takeaway` (`id_takeaway`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- A despejar dados para tabela restaurante.takeaway_prato: ~2 rows (aproximadamente)
DELETE FROM `takeaway_prato`;
/*!40000 ALTER TABLE `takeaway_prato` DISABLE KEYS */;
INSERT INTO `takeaway_prato` (`id_prato`, `id_takeaway`) VALUES
	(1, 1),
	(2, 2);
/*!40000 ALTER TABLE `takeaway_prato` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
