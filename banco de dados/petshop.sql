-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 20-Maio-2019 às 19:44
-- Versão do servidor: 10.1.35-MariaDB
-- versão do PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petshop`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `animal`
--

CREATE TABLE `animal` (
  `cod` int(11) NOT NULL,
  `nome` varchar(20) DEFAULT NULL,
  `raca` varchar(20) DEFAULT NULL,
  `idade` int(11) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `imagem` varchar(100) DEFAULT NULL,
  `cod_cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `animal`
--

INSERT INTO `animal` (`cod`, `nome`, `raca`, `idade`, `tipo`, `imagem`, `cod_cliente`) VALUES
(23, 'Dino', 'Ssauro', 18, 'Rato', 'b41430a02b16a467e0bb3ac9088cbaee.jpeg', 6),
(24, 'francis bacon', 'pitbul', 1, 'periquito', '161707b5ac9d2f88acd053bad3015b73.jpeg', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `cod` int(11) NOT NULL,
  `data_nasc` varchar(40) DEFAULT NULL,
  `nome` varchar(90) DEFAULT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `rua` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `numero_casa` int(11) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`cod`, `data_nasc`, `nome`, `login`, `senha`, `email`, `rua`, `estado`, `cidade`, `bairro`, `numero_casa`, `telefone`) VALUES
(3, '30/10/2002', 'iago', 'iaquino', '81dc9bdb52d04dc20036dbd8313ed055', '', 'largo do corcovado', 'ceara', 'morada nova', 'centro', 63, '999182850'),
(5, '30/10/2002', 'iago', 'iaquino11', '3ce5c41e0f0ec3e20409ca8505e47bfe', '', 'largo do corcovado', 'ceara', 'morada nova', 'centro', 63, '999182850'),
(6, '22-07-2002', 'Guilherme Girão Alves', 'guigirao', '13378175dc9e2ac58d87ff5d70ee7302', '', 'Mâncio Rodrigues', 'CE', 'MN', 'Centro', 318, '(88)99999999'),
(9, '12993', 'brad pitt', 'gustavo lindo', '81dc9bdb52d04dc20036dbd8313ed055', '', 'quinto dos inferno', 'ceara', 'morada nova', 'centro', 666, '8899999999'),
(10, '040168', 'neide', 'moradanova2019', 'a8c2ebc961016bc3bd4b9c021e24d39c', '', 'largo do corcovado', 'ceara', 'morada nova', 'centro', 89, ''),
(11, '30/10/2002', 'iago', 'iaquino1234', '81dc9bdb52d04dc20036dbd8313ed055', '', 'largo do corcovado', 'ceara', 'morada nova', 'centro', 63, '999182850'),
(12, '30/10/2002', 'iago', 'iaquino123456', '202cb962ac59075b964b07152d234b70', '', 'largo do corcovado', 'ceara', 'morada nova', 'centro', 9, '(99)91828-50');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente_produto`
--

CREATE TABLE `cliente_produto` (
  `data` varchar(20) DEFAULT NULL,
  `cod_produto` int(11) DEFAULT NULL,
  `cod_cliente` int(11) DEFAULT NULL,
  `cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente_produto`
--

INSERT INTO `cliente_produto` (`data`, `cod_produto`, `cod_cliente`, `cod`) VALUES
('30/10/2002', 40, 3, 22),
('30/10/2002', 40, 3, 24),
('30/10/2002', 40, 3, 28),
('30/10/2002', 40, 3, 29);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente_servico`
--

CREATE TABLE `cliente_servico` (
  `cod_cliente` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `cod_servico` int(11) DEFAULT NULL,
  `cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `config`
--

CREATE TABLE `config` (
  `nome` varchar(50) NOT NULL,
  `cod` int(11) NOT NULL,
  `frase` varchar(400) DEFAULT NULL,
  `informacoes_sobre_site` varchar(300) NOT NULL,
  `sobre_equipe` varchar(300) NOT NULL,
  `como_nos_sentimos` varchar(300) NOT NULL,
  `dica` varchar(1000) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `foto2` varchar(20) NOT NULL,
  `foto3` varchar(20) NOT NULL,
  `texto_rodape` varchar(100) DEFAULT NULL,
  `numero` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `facebook` varchar(50) DEFAULT NULL,
  `twitter` varchar(50) DEFAULT NULL,
  `instagram` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `config`
--

INSERT INTO `config` (`nome`, `cod`, `frase`, `informacoes_sobre_site`, `sobre_equipe`, `como_nos_sentimos`, `dica`, `foto`, `foto2`, `foto3`, `texto_rodape`, `numero`, `email`, `facebook`, `twitter`, `instagram`) VALUES
('petShop', 1, 'Nós cuidamos do seu pet', 'Nesse site você poderá encontrar produtos para o seu animal de estimação, produtos como abrinquedos, acessorios, serviços e medicamentos para os mesmo pois se forem bem cuidado eles poderam chegar a vida adulta algo que nem todos eles chegam', 'Nossa equipe busca o conforto e a confiabilidade que um dono possa ter ao deixar seu animal de estimação em outras mãos garantimos o alto cuidado e a garantia de uma entrega excepcional, se quiser saber mais da nossa empresa clique aqui para saber mais sobre nós', 'Estamos fezlizes com nosso trabalho e também por sua busca sobre os nossos serviços sempre vamos procurar mostrar a melhor opção quando o assunto é cuidar de animais e você pode ter bons cuidados com seus pets seguindo as dicas deixadas ao clicar aqui.', 'iuytrfdes', 'foto_parallax1.jpeg', 'foto_parallax2.jpeg', 'foto_parallax3.jpeg', 'contate-nos', '4002-8922', 'petshop@gmail.com', 'www.petshop.com.br', 'twitter', '@petShop');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `cnpj` varchar(20) NOT NULL,
  `nome` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores_produto`
--

CREATE TABLE `fornecedores_produto` (
  `data` varchar(20) DEFAULT NULL,
  `cod_produto` int(11) DEFAULT NULL,
  `cnpj_empresa` varchar(12) DEFAULT NULL,
  `cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `cod` int(11) NOT NULL,
  `nome` varchar(20) DEFAULT NULL,
  `especificacoes` varchar(500) NOT NULL,
  `preco` varchar(100) DEFAULT NULL,
  `promocao` int(11) DEFAULT NULL,
  `estoque` int(11) DEFAULT NULL,
  `imagem` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`cod`, `nome`, `especificacoes`, `preco`, `promocao`, `estoque`, `imagem`) VALUES
(40, 'coleira', 'usada para dar mais estilo a seu cachorro ', '20,00', 0, 1, 'ea803681c59d65db1c66803cbbd4106b.jpeg'),
(41, 'coleira roxa', 'coleira do scooby para os fans desse desenho e que procuram dar um estilo a seus cachorroro', '100,00', 0, 1, 'e6e2f14cc0171d62d8489e77d1bad57d.jpeg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `cod` int(11) NOT NULL,
  `promocao` int(11) DEFAULT NULL,
  `nome` varchar(20) DEFAULT NULL,
  `observacoes` varchar(500) DEFAULT NULL,
  `preco` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`cod`, `promocao`, `nome`, `observacoes`, `preco`) VALUES
(7, 10, 'banho', 'não a razão para ser dado a peixes', '100,00'),
(8, 0, 'toza', 'apara os pelos do seu cachorro ', '10,00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `login` varchar(40) DEFAULT NULL,
  `cod` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `senha` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`login`, `cod`, `nome`, `tipo`, `senha`) VALUES
('iagodeaquino', 11, 'tomas turbano', 'administrador', 'e19e72ea82d647132b126c2c9b9124c4'),
('iaquino', 30, 'iago de aquino', 'cliente', '827ccb0eea8a706c4c34a16891f84e7b'),
('iaquinogame', 33, 'iago', 'funcionario', '827ccb0eea8a706c4c34a16891f84e7b'),
('iaquino123', 39, 'iago', 'administrador', '81dc9bdb52d04dc20036dbd8313ed055'),
('1234', 40, 'iaquino', 'funcionario', '81dc9bdb52d04dc20036dbd8313ed055'),
('iaquino', 41, 'iago de aquino', 'funcionario', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `cod_cliente` (`cod_cliente`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cod`);

--
-- Indexes for table `cliente_produto`
--
ALTER TABLE `cliente_produto`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `cod_produto` (`cod_produto`),
  ADD KEY `cod_cliente` (`cod_cliente`);

--
-- Indexes for table `cliente_servico`
--
ALTER TABLE `cliente_servico`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `cod_cliente` (`cod_cliente`),
  ADD KEY `cod_servico` (`cod_servico`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`cod`);

--
-- Indexes for table `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`cnpj`);

--
-- Indexes for table `fornecedores_produto`
--
ALTER TABLE `fornecedores_produto`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `cod_produto` (`cod_produto`),
  ADD KEY `cnpj_empresa` (`cnpj_empresa`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`cod`);

--
-- Indexes for table `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`cod`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cod`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animal`
--
ALTER TABLE `animal`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cliente_produto`
--
ALTER TABLE `cliente_produto`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `cliente_servico`
--
ALTER TABLE `cliente_servico`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fornecedores_produto`
--
ALTER TABLE `fornecedores_produto`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `servico`
--
ALTER TABLE `servico`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `animal_ibfk_1` FOREIGN KEY (`cod_cliente`) REFERENCES `cliente` (`cod`);

--
-- Limitadores para a tabela `cliente_produto`
--
ALTER TABLE `cliente_produto`
  ADD CONSTRAINT `cliente_produto_ibfk_1` FOREIGN KEY (`cod_produto`) REFERENCES `produto` (`cod`),
  ADD CONSTRAINT `cliente_produto_ibfk_2` FOREIGN KEY (`cod_cliente`) REFERENCES `cliente` (`cod`);

--
-- Limitadores para a tabela `cliente_servico`
--
ALTER TABLE `cliente_servico`
  ADD CONSTRAINT `cliente_servico_ibfk_1` FOREIGN KEY (`cod_cliente`) REFERENCES `cliente` (`cod`),
  ADD CONSTRAINT `cliente_servico_ibfk_2` FOREIGN KEY (`cod_servico`) REFERENCES `servico` (`cod`);

--
-- Limitadores para a tabela `fornecedores_produto`
--
ALTER TABLE `fornecedores_produto`
  ADD CONSTRAINT `fornecedores_produto_ibfk_1` FOREIGN KEY (`cod_produto`) REFERENCES `produto` (`cod`),
  ADD CONSTRAINT `fornecedores_produto_ibfk_2` FOREIGN KEY (`cnpj_empresa`) REFERENCES `fornecedores` (`cnpj`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
