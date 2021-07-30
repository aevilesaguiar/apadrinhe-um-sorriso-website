-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 30-Jul-2021 às 17:12
-- Versão do servidor: 5.6.34
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doe_um_sorriso`
--
CREATE DATABASE IF NOT EXISTS `doe_um_sorriso` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `doe_um_sorriso`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro_familia`
--

CREATE TABLE `cadastro_familia` (
  `id_familia` int(11) NOT NULL,
  `cpf_mae` int(11) NOT NULL,
  `nome_mae` varchar(30) NOT NULL,
  `cpf_pai` int(11) DEFAULT NULL,
  `nome_crianca` varchar(30) NOT NULL,
  `rg_crianca` int(9) NOT NULL,
  `data_de_aniversario` date DEFAULT NULL,
  `sexo_crianca` char(1) DEFAULT NULL,
  `e_mail_familia` varchar(30) DEFAULT NULL,
  `telefone_familia` int(11) NOT NULL,
  `endereco_familia` varchar(50) DEFAULT NULL,
  `cep_familia` int(8) DEFAULT NULL,
  `numero_familia` int(5) DEFAULT NULL,
  `cidade_familia` varchar(30) DEFAULT NULL,
  `estado_familia` int(2) DEFAULT NULL,
  `bairro_familia` varchar(15) DEFAULT NULL,
  `complemento_familia` varchar(10) DEFAULT NULL,
  `tamanho_calca_familia` int(11) DEFAULT NULL,
  `tamanho_camiseta_familia` int(11) DEFAULT NULL,
  `tamanho_calcado_familia` int(11) DEFAULT NULL,
  `observacao_familia` varchar(40) DEFAULT NULL,
  `org_familia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro_org`
--

CREATE TABLE `cadastro_org` (
  `id_org` int(11) NOT NULL,
  `cnpj_org` int(12) NOT NULL,
  `razao_social_org` varchar(30) NOT NULL,
  `email_org` varchar(50) DEFAULT NULL,
  `telefone_org` int(11) DEFAULT NULL,
  `cep_org` int(8) DEFAULT NULL,
  `endereço_org` varchar(50) DEFAULT NULL,
  `numero_org` int(5) DEFAULT NULL,
  `cidade_org` varchar(30) DEFAULT NULL,
  `estado_org` int(2) DEFAULT NULL,
  `bairro_org` varchar(15) DEFAULT NULL,
  `complemento_org` varchar(10) DEFAULT NULL,
  `redesocial_org` varchar(40) DEFAULT NULL,
  `tipo_de_org` varchar(40) DEFAULT NULL,
  `obs_org` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro_pf`
--

CREATE TABLE `cadastro_pf` (
  `id_pf` int(11) NOT NULL,
  `cpf_pf` int(11) NOT NULL,
  `nome_pf` varchar(30) DEFAULT NULL,
  `email_pf` varchar(50) DEFAULT NULL,
  `telefone_pf` int(11) DEFAULT NULL,
  `cep_pf` int(8) DEFAULT NULL,
  `endereço_pf` varchar(50) DEFAULT NULL,
  `numero_pf` int(5) DEFAULT NULL,
  `estado_pf` int(2) DEFAULT NULL,
  `bairro_pf` varchar(15) DEFAULT NULL,
  `complemento_pf` varchar(10) DEFAULT NULL,
  `redesocial_pf` varchar(40) DEFAULT NULL,
  `selecionar_crianca_pf` int(11) DEFAULT NULL,
  `selecione_ong_pf` int(11) DEFAULT NULL,
  `usuario_pf` varchar(30) DEFAULT NULL,
  `senha_pf` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro_pj`
--

CREATE TABLE `cadastro_pj` (
  `id_pj` int(11) NOT NULL,
  `cnpj_pj` int(12) NOT NULL,
  `razao_social_pj` varchar(30) DEFAULT NULL,
  `email_pj` varchar(50) DEFAULT NULL,
  `telefone_pj` int(11) DEFAULT NULL,
  `cep_pj` int(8) DEFAULT NULL,
  `endereço_pj` varchar(50) DEFAULT NULL,
  `numero_pj` int(5) DEFAULT NULL,
  `cidade_pj` varchar(30) DEFAULT NULL,
  `estado_pj` int(2) DEFAULT NULL,
  `bairro_pj` varchar(15) DEFAULT NULL,
  `complemento_pj` varchar(10) DEFAULT NULL,
  `site_pj` varchar(40) DEFAULT NULL,
  `redesocial_pj` varchar(40) DEFAULT NULL,
  `selecione_ong_pj` int(11) DEFAULT NULL,
  `selecionar_crianca_pj` int(11) DEFAULT NULL,
  `usuario_pj` varchar(30) DEFAULT NULL,
  `senha_pj` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `confirmacao_da_entrega`
--

CREATE TABLE `confirmacao_da_entrega` (
  `id_confirmacao` int(11) NOT NULL,
  `nome_doador_entrega` int(11) NOT NULL,
  `dados_familia_entrega` int(11) DEFAULT NULL,
  `status_entrega` char(1) DEFAULT NULL,
  `data_hora` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_doacao`
--

CREATE TABLE `dados_doacao` (
  `id_doacao` int(11) NOT NULL,
  `organizacao_doacao` int(11) DEFAULT NULL,
  `nome_doacao` int(11) DEFAULT NULL,
  `tipo_kit_doacao` int(11) DEFAULT NULL,
  `aprovacao_doacao` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `esqueceu_senha`
--

CREATE TABLE `esqueceu_senha` (
  `id_email` int(11) NOT NULL,
  `email_usuario` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

CREATE TABLE `estados` (
  `id_estado` int(2) NOT NULL,
  `estado` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fale_conosco`
--

CREATE TABLE `fale_conosco` (
  `id_mensagem` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefone` int(11) DEFAULT NULL,
  `mensagem` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lista_de_recebimento_doações`
--

CREATE TABLE `lista_de_recebimento_doações` (
  `id_doacao` int(11) NOT NULL,
  `doador` int(11) DEFAULT NULL,
  `nome_crianca` int(11) DEFAULT NULL,
  `status_de_recebimento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tamanho_calca`
--

CREATE TABLE `tamanho_calca` (
  `id_calca` int(11) NOT NULL,
  `tamanho_de_calca` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tamanho_calcado`
--

CREATE TABLE `tamanho_calcado` (
  `id_calcado` int(11) NOT NULL,
  `tamanho_de_calcado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tamanho_camiseta`
--

CREATE TABLE `tamanho_camiseta` (
  `id_camiseta` int(11) NOT NULL,
  `tamanho_de_camiseta` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_de_kit`
--

CREATE TABLE `tipo_de_kit` (
  `id_kit` int(11) NOT NULL,
  `tipo` char(1) NOT NULL,
  `produto` varchar(45) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `senha` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cadastro_familia`
--
ALTER TABLE `cadastro_familia`
  ADD PRIMARY KEY (`id_familia`),
  ADD KEY `tamanho_calca_familia` (`tamanho_calca_familia`),
  ADD KEY `tamanho_camiseta_familia` (`tamanho_camiseta_familia`),
  ADD KEY `tamanho_calcado_familia` (`tamanho_calcado_familia`),
  ADD KEY `org_familia` (`org_familia`),
  ADD KEY `estado_familia` (`estado_familia`);

--
-- Indexes for table `cadastro_org`
--
ALTER TABLE `cadastro_org`
  ADD PRIMARY KEY (`id_org`),
  ADD KEY `estado_org` (`estado_org`);

--
-- Indexes for table `cadastro_pf`
--
ALTER TABLE `cadastro_pf`
  ADD PRIMARY KEY (`id_pf`),
  ADD KEY `estado_pf` (`estado_pf`),
  ADD KEY `selecione_ong_pf` (`selecione_ong_pf`),
  ADD KEY `selecionar_crianca_pf` (`selecionar_crianca_pf`);

--
-- Indexes for table `cadastro_pj`
--
ALTER TABLE `cadastro_pj`
  ADD PRIMARY KEY (`id_pj`),
  ADD KEY `estado_pj` (`estado_pj`),
  ADD KEY `selecione_ong_pj` (`selecione_ong_pj`),
  ADD KEY `selecionar_crianca_pj` (`selecionar_crianca_pj`);

--
-- Indexes for table `confirmacao_da_entrega`
--
ALTER TABLE `confirmacao_da_entrega`
  ADD PRIMARY KEY (`id_confirmacao`),
  ADD KEY `dados_familia_entrega` (`dados_familia_entrega`),
  ADD KEY `nome_doador_entrega` (`nome_doador_entrega`);

--
-- Indexes for table `dados_doacao`
--
ALTER TABLE `dados_doacao`
  ADD PRIMARY KEY (`id_doacao`),
  ADD KEY `tipo_kit_doacao` (`tipo_kit_doacao`),
  ADD KEY `organizacao_doacao` (`organizacao_doacao`),
  ADD KEY `nome_doacao` (`nome_doacao`);

--
-- Indexes for table `esqueceu_senha`
--
ALTER TABLE `esqueceu_senha`
  ADD PRIMARY KEY (`id_email`);

--
-- Indexes for table `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indexes for table `fale_conosco`
--
ALTER TABLE `fale_conosco`
  ADD PRIMARY KEY (`id_mensagem`);

--
-- Indexes for table `lista_de_recebimento_doações`
--
ALTER TABLE `lista_de_recebimento_doações`
  ADD PRIMARY KEY (`id_doacao`),
  ADD KEY `doador` (`doador`),
  ADD KEY `nome_crianca` (`nome_crianca`),
  ADD KEY `status_de_recebimento` (`status_de_recebimento`);

--
-- Indexes for table `tamanho_calca`
--
ALTER TABLE `tamanho_calca`
  ADD PRIMARY KEY (`id_calca`);

--
-- Indexes for table `tamanho_calcado`
--
ALTER TABLE `tamanho_calcado`
  ADD PRIMARY KEY (`id_calcado`);

--
-- Indexes for table `tamanho_camiseta`
--
ALTER TABLE `tamanho_camiseta`
  ADD PRIMARY KEY (`id_camiseta`);

--
-- Indexes for table `tipo_de_kit`
--
ALTER TABLE `tipo_de_kit`
  ADD PRIMARY KEY (`id_kit`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cadastro_org`
--
ALTER TABLE `cadastro_org`
  MODIFY `id_org` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cadastro_pf`
--
ALTER TABLE `cadastro_pf`
  MODIFY `id_pf` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cadastro_pj`
--
ALTER TABLE `cadastro_pj`
  MODIFY `id_pj` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fale_conosco`
--
ALTER TABLE `fale_conosco`
  MODIFY `id_mensagem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tamanho_calca`
--
ALTER TABLE `tamanho_calca`
  MODIFY `id_calca` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tamanho_calcado`
--
ALTER TABLE `tamanho_calcado`
  MODIFY `id_calcado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tamanho_camiseta`
--
ALTER TABLE `tamanho_camiseta`
  MODIFY `id_camiseta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cadastro_familia`
--
ALTER TABLE `cadastro_familia`
  ADD CONSTRAINT `estado_familia` FOREIGN KEY (`estado_familia`) REFERENCES `estados` (`id_estado`),
  ADD CONSTRAINT `org_familia` FOREIGN KEY (`org_familia`) REFERENCES `cadastro_org` (`id_org`),
  ADD CONSTRAINT `tamanho_calca_familia` FOREIGN KEY (`tamanho_calca_familia`) REFERENCES `tamanho_calca` (`id_calca`),
  ADD CONSTRAINT `tamanho_calcado_familia` FOREIGN KEY (`tamanho_calcado_familia`) REFERENCES `tamanho_calcado` (`id_calcado`),
  ADD CONSTRAINT `tamanho_camiseta_familia` FOREIGN KEY (`tamanho_camiseta_familia`) REFERENCES `tamanho_camiseta` (`id_camiseta`);

--
-- Limitadores para a tabela `cadastro_org`
--
ALTER TABLE `cadastro_org`
  ADD CONSTRAINT `cadastro_org_ibfk_1` FOREIGN KEY (`estado_org`) REFERENCES `estados` (`id_estado`);

--
-- Limitadores para a tabela `cadastro_pf`
--
ALTER TABLE `cadastro_pf`
  ADD CONSTRAINT `cadastro_pf_ibfk_1` FOREIGN KEY (`estado_pf`) REFERENCES `estados` (`id_estado`),
  ADD CONSTRAINT `cadastro_pf_ibfk_2` FOREIGN KEY (`selecione_ong_pf`) REFERENCES `cadastro_org` (`id_org`),
  ADD CONSTRAINT `selecionar_crianca_pf` FOREIGN KEY (`selecionar_crianca_pf`) REFERENCES `cadastro_familia` (`id_familia`);

--
-- Limitadores para a tabela `cadastro_pj`
--
ALTER TABLE `cadastro_pj`
  ADD CONSTRAINT `cadastro_pj_ibfk_1` FOREIGN KEY (`estado_pj`) REFERENCES `estados` (`id_estado`),
  ADD CONSTRAINT `cadastro_pj_ibfk_2` FOREIGN KEY (`selecione_ong_pj`) REFERENCES `cadastro_org` (`id_org`),
  ADD CONSTRAINT `selecionar_crianca_pj` FOREIGN KEY (`selecionar_crianca_pj`) REFERENCES `cadastro_familia` (`id_familia`);

--
-- Limitadores para a tabela `confirmacao_da_entrega`
--
ALTER TABLE `confirmacao_da_entrega`
  ADD CONSTRAINT `dados_familia_entrega` FOREIGN KEY (`dados_familia_entrega`) REFERENCES `cadastro_familia` (`id_familia`),
  ADD CONSTRAINT `nome_doador_entrega` FOREIGN KEY (`nome_doador_entrega`) REFERENCES `usuarios` (`id_usuario`);

--
-- Limitadores para a tabela `dados_doacao`
--
ALTER TABLE `dados_doacao`
  ADD CONSTRAINT `nome_doacao` FOREIGN KEY (`nome_doacao`) REFERENCES `cadastro_familia` (`id_familia`);

--
-- Limitadores para a tabela `lista_de_recebimento_doações`
--
ALTER TABLE `lista_de_recebimento_doações`
  ADD CONSTRAINT `doador` FOREIGN KEY (`doador`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `nome_crianca` FOREIGN KEY (`nome_crianca`) REFERENCES `cadastro_familia` (`id_familia`),
  ADD CONSTRAINT `status_de_recebimento` FOREIGN KEY (`status_de_recebimento`) REFERENCES `confirmacao_da_entrega` (`id_confirmacao`);
--
-- Database: `pwii`
--
CREATE DATABASE IF NOT EXISTS `pwii` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pwii`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `amigo`
--

CREATE TABLE `amigo` (
  `idamigo` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `apelido` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `amigo`
--

INSERT INTO `amigo` (`idamigo`, `nome`, `apelido`, `email`) VALUES
(1, 'gabi', 'gabizinha', 'gabizinha@etec.com.br');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL DEFAULT '0',
  `nome` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nome`, `senha`) VALUES
(0, 'gabi', 'gabi123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amigo`
--
ALTER TABLE `amigo`
  ADD PRIMARY KEY (`idamigo`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amigo`
--
ALTER TABLE `amigo`
  MODIFY `idamigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
