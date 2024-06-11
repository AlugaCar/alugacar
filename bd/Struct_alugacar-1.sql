/*
SQLyog Community v13.2.1 (64 bit)
MySQL - 10.4.32-MariaDB : Database - alugacar
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`alugacar` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `alugacar`;

/*Table structure for table `cliente` */

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `sexo` enum('M','F') NOT NULL,
  `datan` date NOT NULL,
  `cpf_cnpj` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `PASSWORD` varchar(128) NOT NULL,
  PRIMARY KEY (`id_cliente`),
  UNIQUE KEY `cpf_cnpj` (`cpf_cnpj`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `cliente` */

insert  into `cliente`(`id_cliente`,`nome`,`sexo`,`datan`,`cpf_cnpj`,`email`,`PASSWORD`) values 
(1,'Arligreicy Castro Silva','F','1991-11-20','XX.XXX.XXX/XXXX-X1','arligreicy@gmail.com','123'),
(2,'Zack Castro','M','2014-08-08','XX.XXX.XXX/XXXX-X2','zack@gmail.com','123');


/*Table structure for table `endereco` */

DROP TABLE IF EXISTS `endereco`;

CREATE TABLE `endereco` (
  `id_endereco` int(11) NOT NULL AUTO_INCREMENT,
  `cep` varchar(9) NOT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `id_cliente` int(11) NOT NULL,
  PRIMARY KEY (`id_endereco`),
  KEY `id_cliente` (`id_cliente`),
  CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `enderecos` */

insert  into `endereco`(`id_endereco`,`cep`,`numero`,`complemento`,`id_cliente`) values 
(1,'17211-220','6','Casa de esquina',2),
(2,'17211-220','8','Casa verde',1);


/*Table structure for table `forma_pagamento` */

DROP TABLE IF EXISTS `forma_pagamento`;

CREATE TABLE `forma_pagamento` (
  `id_fp` int(11) NOT NULL AUTO_INCREMENT,
  `descritivo` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_fp`),
  UNIQUE KEY `descritivo` (`descritivo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `forma_pagamento` */

insert  into `forma_pagamento`(`id_fp`,`descritivo`) values 
(2,'Avista'),
(1,'Parcelado');

DROP TABLE IF EXISTS `locacao`;

CREATE TABLE `locacao` (
  `id_locacao` int(11) NOT NULL AUTO_INCREMENT,
  `data_locacao` date DEFAULT curdate(),
  `status_locacao` VARCHAR(10) NOT NULL,
  `id_fp` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor_locacao` decimal(4,2) NOT NULL,
  PRIMARY KEY (`id_locacao`),
  KEY `id_fp` (`id_fp`),
  KEY `id_cliente` (`id_cliente`),
  CONSTRAINT `locacao_ibfk_1` FOREIGN KEY (`id_fp`) REFERENCES `forma_pagamento` (`id_fp`),
  CONSTRAINT `locacao_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `locacao` */

insert  into `locacao`(`id_locacao`,`data_locacao`,`status_locacao`,`id_fp`,`id_cliente`,`quantidade`,`valor_locacao`) values 
(1,'2024-06-01','disponivel',2,1,1,250.0),
(2,'2024-06-05','indisponivel',2,1,1,250.0);


/*Table structure for table `telefones` */

DROP TABLE IF EXISTS `telefone`;

CREATE TABLE `telefone` (
  `id_telefone` int(11) NOT NULL AUTO_INCREMENT,
  `ddd` int(3) NOT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `id_cliente` int(11) NOT NULL,
  PRIMARY KEY (`id_telefone`),
  UNIQUE KEY `numero` (`numero`),
  CONSTRAINT `telefone_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `telefones` */

insert  into `telefone`(`id_telefone`,`ddd`,`numero`,`id_cliente`) values 
(1,14,'XXXX-XXX1',1),
(2,12,'XXXX-XXX2',2);


/*Table structure for table `carros` */

DROP TABLE IF EXISTS `carro`;

CREATE TABLE `carro` (
  `id_carro` int(11) NOT NULL AUTO_INCREMENT,
  `descritivo` varchar(40) NOT NULL,
  `marca` varchar(40) NOT NULL,
  `modelo` varchar(40) NOT NULL,
  `img` varchar(100) NOT NULL,
  `preco_dia` decimal(4,2) NOT NULL,
  `id_locacao` int(11) NOT NULL,
  PRIMARY KEY (`id_carro`),
  KEY `id_locacao` (`id_locacao`),
  CONSTRAINT `carro_ibfk_2` FOREIGN KEY (`id_locacao`) REFERENCES `locacao` (`id_locacao`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `carro` */

insert  into `carro`(`id_carro`,`descritivo`,`marca`,`modelo`,`img`,`preco_dia`,`id_locacao`) values 
(1,'carro de passeio','Volkswagen','Gol','sedan.jpg',50.00,1),
(2,'carro de passeio','Hundai','HB20','suv.jpg',50.00,2),
(3,'carro de passeio','Chevrolet','Onix','compacto.png',50.00,1),
(4,'carro de passeio','Fiat','Mobi','sedan.jpg',50.00,2),
(5,'carro de viagem','Volkswagen','Gol','suv.jpg',50.00,1),
(6,'carro de viagem','Hundai','HB20','compacto.png',50.00,2),
(7,'carro de viagem','Chevrolet','Onix','sedan.jpg',50.00,1),
(8,'carro de viagem','Fiat','Mobi','suv.jpg',50.00,2),
(9,'carro para um dia','Volkswagen','Gol','compacto.png',50.00,1),
(10,'carro para um dia','Hundai','HB20','sedan.jpg',50.00,2),
(11,'carro para um dia','Chevrolet','Onix','suv.jpg',50.00,1),
(12,'carro para um dia','Fiat','Mobi','compacto.png',50.00,2);


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;