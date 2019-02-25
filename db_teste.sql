CREATE DATABASE db_teste;

USE db_teste;

CREATE TABLE genero (
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(10) NOT NULL
) ENGINE = innodb;

CREATE TABLE cliente (
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(45) NOT NULL,
    telefone BIGINT(14),
    email VARCHAR(100) NOT NULL,
    data_nascimento DATE,
    genero_id INT,
	CONSTRAINT FK_CLIENTE FOREIGN KEY (genero_id) 
    REFERENCES genero (id) ON DELETE RESTRICT
) ENGINE = innodb;

CREATE TABLE produto (
	id INT AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(45) NOT NULL,
    valor DOUBLE(10,2) UNSIGNED NOT NULL
) ENGINE = innodb;

CREATE TABLE situacao (
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(15) NOT NULL
) ENGINE = innodb;

CREATE TABLE pedido (
	id INT AUTO_INCREMENT PRIMARY KEY,
    data_pedido DATE NOT NULL,
    total_itens INT UNSIGNED,
    valor_total DOUBLE(10,2) UNSIGNED,
    situacao_id INT NOT NULL,
    cliente_id INT NOT NULL,
    CONSTRAINT FK_PEDIDO_SITUACAO FOREIGN KEY (situacao_id) 
    REFERENCES situacao (id) ON DELETE RESTRICT,
    CONSTRAINT FK_PEDIDO_CLIENTE FOREIGN KEY (cliente_id) 
    REFERENCES cliente (id) ON DELETE RESTRICT
) ENGINE = innodb;

CREATE TABLE item_pedido (
	id INT AUTO_INCREMENT PRIMARY KEY,
    pedido_id INT NOT NULL,
    produto_id INT NOT NULL,
    quantidade_produto INT UNSIGNED,
    valor DOUBLE(10,2) UNSIGNED,
    valor_total DOUBLE(10,2) UNSIGNED,
    CONSTRAINT FK_ITEM_PEDIDO FOREIGN KEY (pedido_id) 
    REFERENCES pedido (id) ON DELETE RESTRICT,
    CONSTRAINT FK_ITEM_PRODUTO FOREIGN KEY (produto_id) 
    REFERENCES produto (id) ON DELETE RESTRICT
) ENGINE = innodb;