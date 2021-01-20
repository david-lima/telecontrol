-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.13-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para site
CREATE DATABASE IF NOT EXISTS `site` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `site`;

-- Copiando estrutura para tabela site.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `sobrenome` varchar(200) NOT NULL,
  `nome_social` varchar(200) NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `id_layout` varchar(200) NOT NULL,
  `valor` float NOT NULL,
  `descricao` text NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `estado` varchar(200) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `bairro` varchar(200) NOT NULL,
  `referencia` varchar(200) NOT NULL,
  `cep` varchar(200) NOT NULL,
  `numero` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `celular` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela site.cliente: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
REPLACE INTO `cliente` (`id`, `nome`, `sobrenome`, `nome_social`, `cnpj`, `cpf`, `id_layout`, `valor`, `descricao`, `cidade`, `estado`, `endereco`, `bairro`, `referencia`, `cep`, `numero`, `email`, `telefone`, `celular`) VALUES
	(4, 'Noemia', 'Aparecida', 'Lojas Noemia', '67.387.802/0001-77', '145.227.240-98', '1', 21000, 'Criar site layout 1', 'Bauru', 'AC', 'Rodovia Raposo Tavares', 'Aldeota', '', '68911-138', '6432', 'Noemia@gmail.com', '15 3425-1835', '15 99876-8658'),
	(5, 'Fernando', 'Henrique', 'Lojas Fernando', '75.114.568/0001-32', '802.998.430-84', '1', 21640, 'Criar site layout 1', 'Duartina', 'SP', 'Rua Arlindo Nogueira', 'Guriri Norte', '', '79034-000', '142', 'Fernando@gmail.com', '15 3425-1835', '15 99876-8658'),
	(7, 'Miriam', 'Lima', 'Lojas Miria', '81.124.285/0001-74', '989.859.960-02', '2', 17400, 'Criar Site Layout 2', 'São Paulo', 'SP', 'Rua Cristiano Olsen', 'Centro', '', '79010-192', '124', 'Miriam@gmail.com', '14 3425-1935', '14 99885-3445'),
	(8, 'Cauã', 'Lima', 'Lojas Cauã', '80.351.311/0001-34', '714.124.910-96', '3', 10000, 'Criar Site Layout 3', 'Rio de Janeiro', 'RJ', 'Rua Pereira Estéfano', 'Monte Castelo', '', '81070-380', '01', 'Caua@gmail.com', '14 3425-1935', '14 99885-3445'),
	(9, 'Sonia', 'Chussets', 'Lojas Sonia', '25.106.241/0001-40', '198.245.840-21', '3', 3000, 'Criar Site Layout 3', 'Pongai', 'SP', 'Travessa Antônio Ferreira', 'Parque Imperial', '', '68630-615', 'b4', 'Sonia@gmail.com', '14 3425-1935', '14 99885-3445');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Copiando estrutura para tabela site.funcao
CREATE TABLE IF NOT EXISTS `funcao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(200) DEFAULT NULL,
  `salario` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela site.funcao: ~11 rows (aproximadamente)
/*!40000 ALTER TABLE `funcao` DISABLE KEYS */;
REPLACE INTO `funcao` (`id`, `descricao`, `salario`) VALUES
	(1, 'Diretor', 10000),
	(2, 'Socio', 9000),
	(3, 'Tecnico', 8000);
/*!40000 ALTER TABLE `funcao` ENABLE KEYS */;

-- Copiando estrutura para tabela site.mao_de_obra
CREATE TABLE IF NOT EXISTS `mao_de_obra` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `descricao` varchar(120) NOT NULL DEFAULT '',
  `valor` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela site.mao_de_obra: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `mao_de_obra` DISABLE KEYS */;
REPLACE INTO `mao_de_obra` (`id`, `descricao`, `valor`) VALUES
	(1, 'Instalação de Chuveiro', 2000),
	(2, 'Instalação de Tomada', 200),
	(5, 'Instalação da Rede Eletrica', 100);
/*!40000 ALTER TABLE `mao_de_obra` ENABLE KEYS */;

-- Copiando estrutura para tabela site.pecas_compradas
CREATE TABLE IF NOT EXISTS `pecas_compradas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(120) NOT NULL,
  `nota_fiscal` varchar(50) NOT NULL,
  `data_compra` date NOT NULL,
  `tensao` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela site.pecas_compradas: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `pecas_compradas` DISABLE KEYS */;
REPLACE INTO `pecas_compradas` (`id`, `descricao`, `nota_fiscal`, `data_compra`, `tensao`) VALUES
	(5, 'Chave de fenda', '151500', '2021-01-13', '115 '),
	(6, 'Lanterna ', '151500', '2021-01-19', '127'),
	(7, 'Furadeira', '151500', '2021-01-20', '220');
/*!40000 ALTER TABLE `pecas_compradas` ENABLE KEYS */;

-- Copiando estrutura para tabela site.pivot_mao_de_obra
CREATE TABLE IF NOT EXISTS `pivot_mao_de_obra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mdo` int(11) NOT NULL DEFAULT 0,
  `id_requisicao` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `id_mdo` (`id_mdo`),
  KEY `id_requisicao` (`id_requisicao`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela site.pivot_mao_de_obra: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `pivot_mao_de_obra` DISABLE KEYS */;
REPLACE INTO `pivot_mao_de_obra` (`id`, `id_mdo`, `id_requisicao`) VALUES
	(6, 1, 1),
	(7, 5, 1),
	(8, 5, 1),
	(9, 5, 2),
	(10, 5, 2);
/*!40000 ALTER TABLE `pivot_mao_de_obra` ENABLE KEYS */;

-- Copiando estrutura para tabela site.pivot_pecas_compradas
CREATE TABLE IF NOT EXISTS `pivot_pecas_compradas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pecas` int(11) NOT NULL,
  `id_requisicao` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pecas` (`id_pecas`),
  KEY `id_cliente` (`id_requisicao`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela site.pivot_pecas_compradas: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `pivot_pecas_compradas` DISABLE KEYS */;
REPLACE INTO `pivot_pecas_compradas` (`id`, `id_pecas`, `id_requisicao`) VALUES
	(8, 5, 1),
	(9, 7, 1);
/*!40000 ALTER TABLE `pivot_pecas_compradas` ENABLE KEYS */;

-- Copiando estrutura para tabela site.prioridade_requisicao
CREATE TABLE IF NOT EXISTS `prioridade_requisicao` (
  `id` int(11) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela site.prioridade_requisicao: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `prioridade_requisicao` DISABLE KEYS */;
REPLACE INTO `prioridade_requisicao` (`id`, `descricao`) VALUES
	(1, 'Urgente'),
	(2, 'Media'),
	(3, 'Leve');
/*!40000 ALTER TABLE `prioridade_requisicao` ENABLE KEYS */;

-- Copiando estrutura para tabela site.requisicao
CREATE TABLE IF NOT EXISTS `requisicao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` text DEFAULT NULL,
  `prazo` datetime DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `id_situacao` int(11) DEFAULT NULL,
  `id_prioridade` int(11) DEFAULT NULL,
  `id_responsavel` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_responsavel` (`id_responsavel`),
  KEY `id_prioridade` (`id_prioridade`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_situacao` (`id_situacao`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela site.requisicao: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `requisicao` DISABLE KEYS */;
REPLACE INTO `requisicao` (`id`, `descricao`, `prazo`, `data_cadastro`, `id_situacao`, `id_prioridade`, `id_responsavel`, `id_cliente`) VALUES
	(1, 'Realizar Site para o Cliente, Conforme solicitado', '2021-01-20 00:00:00', '2021-01-20 00:00:00', 1, 2, 4, 4),
	(2, 'O Cliente Esta com Problemas, Por gentileza, Ligar!', '2018-11-06 00:00:00', '2021-01-19 00:00:00', 2, 1, 4, 5);
/*!40000 ALTER TABLE `requisicao` ENABLE KEYS */;

-- Copiando estrutura para tabela site.setores
CREATE TABLE IF NOT EXISTS `setores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_setor` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela site.setores: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `setores` DISABLE KEYS */;
REPLACE INTO `setores` (`id`, `nome_setor`) VALUES
	(1, 'Técnico'),
	(2, 'Programador'),
	(3, 'Diretor');
/*!40000 ALTER TABLE `setores` ENABLE KEYS */;

-- Copiando estrutura para tabela site.situacao_requisicao
CREATE TABLE IF NOT EXISTS `situacao_requisicao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela site.situacao_requisicao: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `situacao_requisicao` DISABLE KEYS */;
REPLACE INTO `situacao_requisicao` (`id`, `descricao`) VALUES
	(1, 'Atendido'),
	(2, 'Em Atendimento'),
	(3, 'Aguardando');
/*!40000 ALTER TABLE `situacao_requisicao` ENABLE KEYS */;

-- Copiando estrutura para tabela site.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `sobrenome` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `setor` int(11) DEFAULT NULL,
  `funcao` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `setor` (`setor`),
  KEY `funcao` (`funcao`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela site.usuario: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
REPLACE INTO `usuario` (`id`, `nome`, `sobrenome`, `email`, `senha`, `setor`, `funcao`) VALUES
	(4, 'David', 'Vinicius', 'David@gmail.com', '123', 3, 1),
	(15, 'Gabriel', 'Lino', 'Gabriel@gmail.com', '123', 1, 3);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
