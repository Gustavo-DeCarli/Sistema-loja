CREATE DATABASE loja;

USE loja;

CREATE TABLE produtos(
    cod INT NOT NULL,
    nome VARCHAR(400) NOT NULL,
    estoque INT NOT NULL,
    cat INT NOT NULL,
    valor FLOAT NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE categorias(
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(400) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE vendas(
    id INT NOT NULL AUTO_INCREMENT,
    idprod INT NOT NULL,
    notafisc VARCHAR(200) NOT NULL,
    quantidade INT NOT NULL,
    valort FLOAT NOT NULL,
    data DATE NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (idprod) REFERENCES produtos(id)
);

CREATE TABLE login(
    id INT NOT NULL AUTO_INCREMENT,
    user VARCHAR(100) NOT NULL,
    pass VARCHAR(100) NOT NULL,
    PRIMARY KEY (id)
);