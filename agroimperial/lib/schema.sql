CREATE DATABASE loja;

USE loja;

CREATE TABLE produtos(
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(400) NOT NULL,
    estoque INT NOT NULL,
    cod INT NOT NULL,
    cat INT NOT NULL,
    valor DECIMAL NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE categorias(
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(400) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE login(
    id INT NOT NULL AUTO_INCREMENT,
    user VARCHAR(100) NOT NULL,
    pass VARCHAR(100) NOT NULL,
    PRIMARY KEY (id)
);