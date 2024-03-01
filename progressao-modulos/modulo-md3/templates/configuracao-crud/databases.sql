-- criando o banco do projeto
CREATE DATABASE `busca_preco`;

-- criando a tabela de produtos
CREATE TABLE `produtos`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `nome` VARCHAR(60),
    `codigo` VARCHAR(15),
    `preco` FLOAT(7, 2),
    `estoque` INT(4),
    `ativo` BOOLEAN,
    `isDeleted` VARCHAR(1),
    `cadastradoEm` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- criando a tabela de log  | que receberá as alterações no banco de dados
CREATE TABLE `log`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `tipo` VARCHAR(60),
    `conteudo` VARCHAR(255),
    `criadoEm` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- criando a tabela de usuarios
CREATE TABLE `usuarios`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `nome` VARCHAR(60),
    `email` VARCHAR(60),
    `senha` VARCHAR(40),
    `ativo` BOOLEAN,
    `isDeleted` VARCHAR(1),
    `loginAtual` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `loginFim` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `cadastradoEm` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
