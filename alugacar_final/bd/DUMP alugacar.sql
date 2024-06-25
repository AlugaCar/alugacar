/*
SQLyog Enterprise - MySQL GUI v8.12 
MySQL - 5.5.27 : Database - locadora
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

CREATE TABLE telefone (
id_telefone VARCHAR(10) PRIMARY KEY,
numero VARCHAR(10),
dd VARCHAR(10),
id_ususario VARCHAR(10)
)

CREATE TABLE locacao  (
data_locacao VARCHAR(10),
status_locacao VARCHAR(10),
id_locacao VARCHAR(10) PRIMARY KEY,
id_fp VARCHAR(10),
id_ususario VARCHAR(10),
qtd VARCHAR(10),
valor_locacao VARCHAR(10)
)

CREATE TABLE carro (
id_carros VARCHAR(10) PRIMARY KEY,
marca VARCHAR(10),
img VARCHAR(10),
modelo VARCHAR(10),
preco_dia VARCHAR(10),
descritivo VARCHAR(10),
id_locacao VARCHAR(10),
FOREIGN KEY(id_locacao) REFERENCES locacao  (id_locacao)
)

CREATE TABLE cliente (
id_ususario VARCHAR(10) PRIMARY KEY,
nome VARCHAR(10),
sexo VARCHAR(10),
datan VARCHAR(10),
cpf_cnpj VARCHAR(10),
email VARCHAR(10),
password VARCHAR(10)
)

CREATE TABLE forma_pagamento (
descritivo VARCHAR(10),
id_fp VARCHAR(10) PRIMARY KEY
)

CREATE TABLE endereco (
numero VARCHAR(10),
cep VARCHAR(10),
id_endereco VARCHAR(10) PRIMARY KEY,
complemento VARCHAR(10),
id_ususario VARCHAR(10),
FOREIGN KEY(id_ususario) REFERENCES cliente (id_ususario)
)

ALTER TABLE telefone ADD FOREIGN KEY(id_ususario) REFERENCES cliente (id_ususario)
ALTER TABLE locacao  ADD FOREIGN KEY(id_fp) REFERENCES forma_pagamento (id_fp)
ALTER TABLE locacao  ADD FOREIGN KEY(id_ususario) REFERENCES cliente (id_ususario)
