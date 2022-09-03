CREATE DATABASE loja;

USE loja;

CREATE TABLE produtos(
    cod INT NOT NULL,
    nome VARCHAR(400) NOT NULL,
    estoque INT NOT NULL,
    cat INT NOT NULL,
    valor FLOAT(255,2) NOT NULL,
    valorv FLOAT(255,2) NOT NULL,
    PRIMARY KEY (cod)
);

CREATE TABLE categorias(
    id INT NOT NULL AUTO_INCREMENT,
    nomec VARCHAR(400) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE vendas(
    id INT NOT NULL AUTO_INCREMENT,
    codprod INT NOT NULL,
    notafisc VARCHAR(200) NOT NULL,
    quantidade INT NOT NULL,
    valort FLOAT(255,2) NOT NULL,
    data DATE NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (codprod) REFERENCES produtos(cod)
);

CREATE TABLE login(
    id INT NOT NULL AUTO_INCREMENT,
    user VARCHAR(100) NOT NULL,
    pass VARCHAR(100) NOT NULL,
    PRIMARY KEY (id)
);