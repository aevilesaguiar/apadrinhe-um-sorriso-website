-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 09-Ago-2021 às 16:15
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
-- Estrutura da tabela `colaborador`
--

CREATE TABLE `colaborador` (
  `id_colaborador` int(11) DEFAULT NULL,
  `funcao` varchar(30) DEFAULT NULL,
  `desc_cargo` varchar(50) DEFAULT NULL,
  `fk_cnpj` varchar(18) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_crianca`
--

CREATE TABLE `dados_crianca` (
  `rg_crianca` varchar(12) NOT NULL,
  `nome_crianca` varchar(40) DEFAULT NULL,
  `sexo` enum('M','F') DEFAULT NULL,
  `nasc_crianca` date DEFAULT NULL,
  `tamanho_camiseta` enum('RN','1','2','4','6','8','10','12','14','16','P','M','G') DEFAULT NULL,
  `tamanho_sapato` enum('14','15','16','17.5','18.5','19','20','20.5','21','21.5','22','22.5','23','23.5','24','24.5','25','25.5','26','26.5','27','28','29','30','31','32','33','34','35','36','37','38','39','40','41','42','43','44','45') DEFAULT NULL,
  `tamanho_calca` enum('1','2','4','6','8','10','12','14','16','P','M','G') DEFAULT NULL,
  `fk_id_familia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_pf`
--

CREATE TABLE `dados_pf` (
  `cpf` varchar(15) NOT NULL,
  `rg` varchar(12) DEFAULT NULL,
  `nome` varchar(40) DEFAULT NULL,
  `fk_dados_gerais` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_pj`
--

CREATE TABLE `dados_pj` (
  `cnpj` varchar(18) NOT NULL,
  `nome_fantasia` varchar(30) DEFAULT NULL,
  `site` varchar(50) DEFAULT NULL,
  `tipo_pj` varchar(10) DEFAULT NULL,
  `fk_dados_gerais` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_responsavel`
--

CREATE TABLE `dados_responsavel` (
  `id_familia` int(11) NOT NULL,
  `cpf_resp` varchar(15) DEFAULT NULL,
  `nome_resp` varchar(40) DEFAULT NULL,
  `fk_dados_gerais` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `doacao`
--

CREATE TABLE `doacao` (
  `id_doacao` int(11) NOT NULL,
  `status_doacao` enum('S','N') DEFAULT NULL,
  `data_hora_entrega` datetime DEFAULT NULL,
  `data_hora_selecao` datetime DEFAULT NULL,
  `data_hora_recebimento` datetime DEFAULT NULL,
  `fk_rg_crianca` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fale_conosco`
--

CREATE TABLE `fale_conosco` (
  `id_fale_conosco` int(11) NOT NULL,
  `e_mail` varchar(30) DEFAULT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `telefone` varchar(14) DEFAULT NULL,
  `mensagem` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagem_sistema`
--

CREATE TABLE `mensagem_sistema` (
  `id_mensagem` int(11) NOT NULL,
  `status_sistema` enum('S','N') DEFAULT NULL,
  `mensagem` varchar(20) DEFAULT NULL,
  `fk_id_doacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `newsdetter`
--

CREATE TABLE `newsdetter` (
  `e_mail_newsdetter` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `id_cadastro` int(11) NOT NULL,
  `tipo_cadastro` varchar(45) DEFAULT NULL,
  `nivel_acesso` int(1) DEFAULT NULL,
  `status_cadastro` varchar(45) DEFAULT NULL,
  `telefone` varchar(10) DEFAULT NULL,
  `rede_social` varchar(30) DEFAULT NULL,
  `e_mail` varchar(40) DEFAULT NULL,
  `numendereço` varchar(5) DEFAULT NULL,
  `logradouro` varchar(30) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `estado` enum('AC','AL','AM','BA','CE','DF','ES','GO','MA','MT','MS','MG','PA','PB','PR','PE','PI','RR','RO','RJ','RN','RS','SC','SP','SE','TO') DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `bairro` varchar(30) DEFAULT NULL,
  `complemento` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `users` varchar(10) DEFAULT NULL,
  `senha` varchar(10) DEFAULT NULL,
  `fk_id_cadastro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `colaborador`
--
ALTER TABLE `colaborador`
  ADD KEY `fk_cnpj` (`fk_cnpj`);

--
-- Indexes for table `dados_crianca`
--
ALTER TABLE `dados_crianca`
  ADD PRIMARY KEY (`rg_crianca`),
  ADD KEY `fk_id_familia` (`fk_id_familia`);

--
-- Indexes for table `dados_pf`
--
ALTER TABLE `dados_pf`
  ADD PRIMARY KEY (`cpf`),
  ADD KEY `fk_dados_gerais` (`fk_dados_gerais`);

--
-- Indexes for table `dados_pj`
--
ALTER TABLE `dados_pj`
  ADD PRIMARY KEY (`cnpj`),
  ADD KEY `fk_dados_gerais` (`fk_dados_gerais`);

--
-- Indexes for table `dados_responsavel`
--
ALTER TABLE `dados_responsavel`
  ADD PRIMARY KEY (`id_familia`),
  ADD KEY `fk_dados_gerais` (`fk_dados_gerais`);

--
-- Indexes for table `doacao`
--
ALTER TABLE `doacao`
  ADD PRIMARY KEY (`id_doacao`),
  ADD KEY `fk_rg_crianca` (`fk_rg_crianca`);

--
-- Indexes for table `fale_conosco`
--
ALTER TABLE `fale_conosco`
  ADD PRIMARY KEY (`id_fale_conosco`);

--
-- Indexes for table `mensagem_sistema`
--
ALTER TABLE `mensagem_sistema`
  ADD PRIMARY KEY (`id_mensagem`),
  ADD KEY `fk_id_doacao` (`fk_id_doacao`);

--
-- Indexes for table `newsdetter`
--
ALTER TABLE `newsdetter`
  ADD PRIMARY KEY (`e_mail_newsdetter`);

--
-- Indexes for table `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_cadastro`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_id_cadastro` (`fk_id_cadastro`);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `colaborador`
--
ALTER TABLE `colaborador`
  ADD CONSTRAINT `colaborador_ibfk_1` FOREIGN KEY (`fk_cnpj`) REFERENCES `dados_pj` (`cnpj`);

--
-- Limitadores para a tabela `dados_crianca`
--
ALTER TABLE `dados_crianca`
  ADD CONSTRAINT `dados_crianca_ibfk_1` FOREIGN KEY (`fk_id_familia`) REFERENCES `dados_responsavel` (`id_familia`);

--
-- Limitadores para a tabela `dados_pf`
--
ALTER TABLE `dados_pf`
  ADD CONSTRAINT `dados_pf_ibfk_1` FOREIGN KEY (`fk_dados_gerais`) REFERENCES `perfil` (`id_cadastro`);

--
-- Limitadores para a tabela `dados_pj`
--
ALTER TABLE `dados_pj`
  ADD CONSTRAINT `dados_pj_ibfk_1` FOREIGN KEY (`fk_dados_gerais`) REFERENCES `perfil` (`id_cadastro`);

--
-- Limitadores para a tabela `dados_responsavel`
--
ALTER TABLE `dados_responsavel`
  ADD CONSTRAINT `dados_responsavel_ibfk_1` FOREIGN KEY (`fk_dados_gerais`) REFERENCES `perfil` (`id_cadastro`);

--
-- Limitadores para a tabela `doacao`
--
ALTER TABLE `doacao`
  ADD CONSTRAINT `doacao_ibfk_1` FOREIGN KEY (`fk_rg_crianca`) REFERENCES `dados_crianca` (`rg_crianca`);

--
-- Limitadores para a tabela `mensagem_sistema`
--
ALTER TABLE `mensagem_sistema`
  ADD CONSTRAINT `mensagem_sistema_ibfk_1` FOREIGN KEY (`fk_id_doacao`) REFERENCES `doacao` (`id_doacao`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`fk_id_cadastro`) REFERENCES `perfil` (`id_cadastro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
