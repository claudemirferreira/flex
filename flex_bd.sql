-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.7.21-log


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema flex
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ flex;
USE flex;

--
-- Table structure for table `flex`.`aluno`
--

DROP TABLE IF EXISTS `aluno`;
CREATE TABLE `aluno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL DEFAULT '',
  `data_nascimento` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `logradouro` varchar(60) NOT NULL DEFAULT '',
  `numero` varchar(10) NOT NULL DEFAULT '',
  `bairro` varchar(60) NOT NULL DEFAULT '',
  `cidade` varchar(60) NOT NULL DEFAULT '',
  `estado` varchar(2) NOT NULL DEFAULT '',
  `data_criacao` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `cep` varchar(8) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `flex`.`aluno`
--

/*!40000 ALTER TABLE `aluno` DISABLE KEYS */;
INSERT INTO `aluno` (`id`,`nome`,`data_nascimento`,`logradouro`,`numero`,`bairro`,`cidade`,`estado`,`data_criacao`,`cep`) VALUES 
 (5,'clau','2018-03-29 02:35:50','Praça da Sé','89','Sé','São Paulo','SP','2018-03-29 02:35:50','01001000'),
 (6,'rildson','2018-03-29 02:37:26','Praça da Sé','43242','Sé','São Paulo','SP','2018-03-29 02:37:26','01001000'),
 (7,'claufffff','2018-03-29 05:15:24','Praça da Sé','89','Sé','São Paulo','SP','2018-03-29 05:15:24','01001000'),
 (8,'claufffff','2018-03-29 05:15:41','Praça da Sé','89','Sé','São Paulo','SP','2018-03-29 05:15:41','01001000'),
 (9,'claudemir ferreira','2018-03-29 05:16:06','Praça da Sé','89','Sé','São Paulo','SP','2018-03-29 05:16:06','01001000');
/*!40000 ALTER TABLE `aluno` ENABLE KEYS */;


--
-- Table structure for table `flex`.`curso`
--

DROP TABLE IF EXISTS `curso`;
CREATE TABLE `curso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL DEFAULT '',
  `data_criacao` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `flex`.`curso`
--

/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
INSERT INTO `curso` (`id`,`nome`,`data_criacao`) VALUES 
 (1,'Sistema de Informação','2008-05-15 13:00:29'),
 (2,'Engenharia d Computação','2008-05-15 13:00:29'),
 (6,'rrrrr','2018-03-26 03:43:10'),
 (7,'rrrrr','2018-03-26 03:44:13'),
 (8,'trtrtrt','2018-03-26 03:44:26'),
 (22,'fffffffff','2018-03-26 09:02:51'),
 (28,'wqqwwqeqw','2018-03-28 03:53:06'),
 (29,'wwwwwww','2018-03-29 02:14:40'),
 (30,'666666','2018-03-29 02:15:40'),
 (31,'eweqwewq','2018-03-29 05:24:38');
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;


--
-- Table structure for table `flex`.`professor`
--

DROP TABLE IF EXISTS `professor`;
CREATE TABLE `professor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL DEFAULT '',
  `data_nascimento` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `data_criacao` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `flex`.`professor`
--

/*!40000 ALTER TABLE `professor` DISABLE KEYS */;
INSERT INTO `professor` (`id`,`nome`,`data_nascimento`,`data_criacao`) VALUES 
 (1,'Sergio Moro','2018-03-26 03:43:10','2018-03-26 03:43:10');
/*!40000 ALTER TABLE `professor` ENABLE KEYS */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
