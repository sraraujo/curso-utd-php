-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 16/03/2024 às 02:05
-- Versão do servidor: 8.0.30
-- Versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistema`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int NOT NULL,
  `nome` varchar(60) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `endereço` varchar(40) DEFAULT NULL,
  `bairro` varchar(40) DEFAULT NULL,
  `dataNascimento` date DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT NULL,
  `cadastradoEm` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `email`, `cpf`, `endereço`, `bairro`, `dataNascimento`, `ativo`, `cadastradoEm`) VALUES
(1, 'Jonas de Araújo', 'jonas@email.com', '12345678901', '', 'Centro', '1990-10-06', 1, '2024-02-06 16:11:37'),
(2, 'Maria de Costa', 'maria@email.com', '52888850145', NULL, 'Planalto', '1994-02-16', 1, '2024-02-06 16:11:37'),
(3, 'Nando da Quantas', 'nando@email.com', '53298890194', NULL, 'Conjunto Novo', '1997-09-06', 1, '2024-02-06 16:11:37'),
(4, 'Bruno da Quantas', 'bruno@email.com', '56298890614', NULL, 'Matriz de Um', '1969-07-19', 1, '2024-02-06 16:11:37'),
(5, 'Xena da Quantas', 'xeno@email.com', '29273890111', NULL, 'Bola Quadrada', '2001-09-28', 1, '2024-02-06 16:11:37');

-- --------------------------------------------------------

--
-- Estrutura para tabela `itensvenda`
--

CREATE TABLE `itensvenda` (
  `id` int NOT NULL,
  `quantidade` int DEFAULT NULL,
  `idVEnda` int DEFAULT NULL,
  `idProduto` int DEFAULT NULL,
  `cadastradoEm` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `itensvenda`
--

INSERT INTO `itensvenda` (`id`, `quantidade`, `idVEnda`, `idProduto`, `cadastradoEm`) VALUES
(1, 2, 1, 1, '2024-02-06 16:22:03'),
(2, 2, 1, 2, '2024-02-06 16:22:03'),
(3, 3, 1, 6, '2024-02-06 16:22:03'),
(4, 2, 1, 8, '2024-02-06 16:22:03'),
(5, 3, 1, 15, '2024-02-06 16:22:03'),
(6, 10, 2, 1, '2024-02-06 16:32:00'),
(7, 2, 2, 2, '2024-02-06 16:32:00'),
(8, 4, 2, 6, '2024-02-06 16:32:00'),
(9, 2, 2, 8, '2024-02-06 16:32:00'),
(10, 8, 2, 15, '2024-02-06 16:32:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `log`
--

CREATE TABLE `log` (
  `id` int NOT NULL,
  `tipo` varchar(60) DEFAULT NULL,
  `conteudo` varchar(255) DEFAULT NULL,
  `criadoEm` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `log`
--

INSERT INTO `log` (`id`, `tipo`, `conteudo`, `criadoEm`) VALUES
(1, 'Alteração de Status', 'Produto com código: 000000000000002, foi marcado como ATIVO, pelo usuario XXXX.', '2024-02-14 11:10:05'),
(2, 'Alteração de Status', 'Produto com código: 000000000000001, foi marcado como INATIVO, pelo usuario XXXX.', '2024-02-14 11:10:06'),
(3, 'Alteração de Status', 'Produto com código: 000000000000001, foi marcado como ATIVO, pelo usuario XXXX.', '2024-02-14 11:11:48'),
(4, 'Alteração de Status', 'Produto com código: 000000000000003, foi marcado como ATIVO, pelo usuario XXXX.', '2024-02-14 11:11:50'),
(5, 'Alteração de Status', 'Produto com código: 000000000000005, foi marcado como ATIVO, pelo usuario XXXX.', '2024-02-14 11:32:20'),
(6, 'Alteração de Status', 'Produto com código: 000000000000009, foi marcado como ATIVO, pelo usuario XXXX.', '2024-02-14 11:32:33'),
(7, 'Alteração de Status', 'Produto com código: 000000000000002, foi marcado como INATIVO, pelo usuario XXXX.', '2024-02-14 17:26:03'),
(8, 'Alteração de Status', 'Produto com código: 000000000000003, foi marcado como INATIVO, pelo usuario XXXX.', '2024-02-14 17:26:05'),
(9, 'Alteração de Status', 'Produto com código: 000000000000002, foi marcado como ATIVO, pelo usuario XXXX.', '2024-02-14 17:26:08'),
(10, 'Alteração de Status', 'Produto com código: 000000000000003, foi marcado como ATIVO, pelo usuario XXXX.', '2024-02-14 17:26:10'),
(11, 'Alteração de Status', 'Produto com código: 000000000000001, foi marcado como INATIVO, pelo usuario XXXX.', '2024-02-14 18:30:52'),
(12, 'Inserção de Registro', 'O produto com ID: cn0000000000001 foi cadastrado pelo usuario XXXX.', '2024-02-15 09:37:15');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int NOT NULL,
  `nome` varchar(60) NOT NULL,
  `codigo` varchar(15) NOT NULL,
  `preco` float(5,2) NOT NULL,
  `estoque` varchar(5) NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  `isDeleted` varchar(1) NOT NULL,
  `cadastrado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `codigo`, `preco`, `estoque`, `ativo`, `isDeleted`, `cadastrado`) VALUES
(1, 'Biscoito Recheado Amori Morango', '000000000000001', 3.39, ' 600', 0, '0', '2024-03-04 14:29:57'),
(2, 'Biscoito Recheado Amori Chocolate', '000000000000002', 3.79, '250', 1, '', '2024-03-04 14:29:57'),
(3, 'Biscoito Recheado Amori Escureto', '000000000000003', 2.99, '500', 1, '', '2024-03-04 14:29:57'),
(4, 'Biscoito Recheado Amori Flocos', '000000000000004', 2.99, '480', 1, '', '2024-03-04 14:29:57'),
(5, 'Refrigerante Lata 300ml Fanta Laranja ', '000000000000007', 2.99, '300', 1, '', '2024-03-04 14:29:57'),
(6, 'Refrigerante Lata 300ml Sprite ', '000000000000008', 3.19, ' 300 ', 1, '', '2024-03-04 14:29:57'),
(7, 'Refrigerante Lata 300ml Kuat ', '000000000000009', 2.49, '400', 1, '', '2024-03-04 14:29:57'),
(8, 'Salgadinho Cheets Lua Parmessão ', '000000000000010', 1.99, '500', 1, '', '2024-03-04 14:29:57'),
(9, 'Salgadinho Cheets Onda requeijão ', '000000000000011', 2.49, ' 480 ', 1, '', '2024-03-04 14:29:57'),
(10, 'Salgadinho Cheets Tubo Cheddar ', '000000000000012', 1.99, ' 480 ', 1, '', '2024-03-04 14:29:57'),
(11, 'Salgadinho Cheets Bola Mussarela ', '000000000000013', 1.99, ' 480 ', 1, '', '2024-03-04 14:29:57'),
(12, 'Chocolate Barra Diamante Negro 300g ', '000000000000014', 5.99, ' 480 ', 1, '0', '2024-03-04 14:29:57'),
(13, 'Chocolate barra lacta Laka Branco 300g ', '000000000000015', 5.99, ' 480 ', 1, '0', '2024-03-04 14:29:57'),
(14, 'Chocolate Barra Sonha de Valsa 300g ', '000000000000016', 5.99, ' 480 ', 1, '0', '2024-03-04 14:29:57'),
(15, 'Chocolate barra Nest Chokito 300g ', '000000000000017', 5.99, ' 480 ', 1, '', '2024-03-04 14:29:57'),
(16, 'Pastel de Frango 25cm ', 'PAS000000000001', 3.99, ' 100 ', 1, '', '2024-03-04 14:29:57'),
(17, 'Pastel de Carne 25cm ', 'PAS000000000002', 3.99, ' 150 ', 1, '0', '2024-03-04 14:29:57'),
(18, 'Pastel de Misto 25cm ', 'PAS000000000003', 3.99, ' 100 ', 1, '', '2024-03-04 14:29:57'),
(19, 'Pastel de Misto 25cm ', 'PAS000000000003', 3.99, ' 100 ', 1, '', '2024-03-04 14:29:57'),
(20, 'Pastel de Palmito 25cm ', 'PAS000000000004', 4.99, ' 50 ', 1, '', '2024-03-04 14:29:57'),
(21, 'Risole de Carne 25cm ', 'SGD000000000001', 3.99, ' 100 ', 1, '', '2024-03-04 14:29:57'),
(22, 'Risole De Frango 25cm ', 'SGD000000000002', 3.99, ' 120 ', 1, '', '2024-03-04 14:29:57'),
(23, 'Risole de Misto ', 'SGD000000000004', 3.99, ' 120 ', 1, '*', '2024-03-04 14:29:57'),
(24, 'Risole de Carne Moida ', 'SGD000000000005', 3.99, ' 80 ', 1, '', '2024-03-04 14:29:57'),
(25, 'Sujo de Cajú ', 'SC0000000000001', 1.99, ' 100 ', 1, '', '2024-03-04 14:29:57'),
(26, 'Bolo Mole', 'B00000000000001', 2.49, ' 100 ', 1, '', '2024-03-04 14:29:57'),
(27, 'Bolo de Milho', 'B00000000000002', 2.49, ' 100 ', 1, '', '2024-03-04 14:29:57'),
(28, 'Bolo de Chocolate ', 'B00000000000002', 2.49, ' 100 ', 1, '', '2024-03-04 14:29:57'),
(29, 'Bolo Fofo ', 'B00000000000003', 2.49, ' 100 ', 1, '', '2024-03-04 14:29:57'),
(30, 'Bolo de Cenoura ', 'B00000000000004', 2.99, ' 150 ', 1, '', '2024-03-04 14:29:57'),
(31, 'Caldo de Cana ', 'CN0000000000001', 2.99, ' 50 ', 1, '', '2024-03-04 14:29:57'),
(32, 'Sujo de Cajarana', 'SCJ000000000001', 3.99, '120', 0, '', '2024-03-04 14:29:57'),
(33, 'Bolacha Romana', 'BLC000000000001', 4.75, '85', 1, '', '2024-03-04 16:38:48'),
(34, 'Pastel de 4 Queijos 25cm', 'PTL000000000001', 4.49, '200', 1, '0', '2024-03-10 02:14:12'),
(37, 'Teste Codelgniter', 'CDL544564646545', 44.00, '10', 1, '', '2024-03-10 02:23:18'),
(38, 'Nescau 300g', 'NC0000000000001', 4.79, '100', 1, '0', '2024-03-15 18:08:03'),
(40, 'Caneta Bic - Azul', 'CNT000000000001', 1.50, '100', 0, '0', '2024-03-15 19:28:57');

-- --------------------------------------------------------

--
-- Estrutura para tabela `titulosentrada`
--

CREATE TABLE `titulosentrada` (
  `id` int NOT NULL,
  `valor` float(10,2) NOT NULL,
  `historico` int NOT NULL,
  `condicaoPagamento` varchar(30) NOT NULL,
  `isDeleted` int NOT NULL,
  `criado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `titulosentrada`
--

INSERT INTO `titulosentrada` (`id`, `valor`, `historico`, `condicaoPagamento`, `isDeleted`, `criado`) VALUES
(1, 200.00, 1, 'À vista', 0, '2024-03-15 19:48:20'),
(2, 300.00, 2, 'À vista', 0, '2024-03-15 20:55:23');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nome` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  `tipoAcesso` varchar(5) NOT NULL,
  `isDeleted` varchar(1) NOT NULL,
  `loginAtual` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `loginFim` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cadastrado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `ativo`, `tipoAcesso`, `isDeleted`, `loginAtual`, `loginFim`, `cadastrado`) VALUES
(1, 'Administrador', 'admin@email.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, 'admin', '0', '2024-03-04 18:52:35', '2024-03-04 18:52:35', '2024-03-04 18:52:35'),
(2, 'Jonas de Araújo Pereira', 'jonas@email.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 'func', '', '2024-03-04 19:23:01', '2024-03-04 18:52:35', '2024-03-04 18:52:35'),
(3, 'Maria Da Silva', 'maria@email.com', '51eac6b471a284d3341d8c0c63d0f1a286262a18', 1, 'func', '', '2024-03-04 22:01:44', '2024-03-04 22:01:44', '2024-03-04 22:01:44'),
(4, 'Renato Costa Brandão', 'renato@email.com', '123', 1, 'func', '0', '2024-03-15 22:37:13', '2024-03-15 22:37:13', '2024-03-15 22:37:13'),
(5, 'Jona D\'arc Montana', 'jonadn@email.com', '12', 1, 'func', '0', '2024-03-16 00:28:30', '2024-03-16 00:28:30', '2024-03-16 00:28:30'),
(6, 'Adrian Israel', 'adrian@email.com', '456', 1, 'func', '0', '2024-03-16 01:01:41', '2024-03-16 01:01:41', '2024-03-16 01:01:41');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Índices de tabela `itensvenda`
--
ALTER TABLE `itensvenda`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `titulosentrada`
--
ALTER TABLE `titulosentrada`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `itensvenda`
--
ALTER TABLE `itensvenda`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `log`
--
ALTER TABLE `log`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `titulosentrada`
--
ALTER TABLE `titulosentrada`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
