-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 24-Set-2021 às 23:23
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `doe_um_sorriso`
--

DELIMITER $$
--
-- Procedimentos
--
DROP PROCEDURE IF EXISTS `lista_perfil`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `lista_perfil` (IN `tipo` VARCHAR(50))  begin
	select * from perfil where tipo_cadastro=tipo;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `email_admin` varchar(45) NOT NULL,
  `fk_user` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`email_admin`),
  KEY `fk_user` (`fk_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastra`
--

DROP TABLE IF EXISTS `cadastra`;
CREATE TABLE IF NOT EXISTS `cadastra` (
  `fk_rg_crianca` varchar(12) DEFAULT NULL,
  `fk_id_cadastro` int(11) DEFAULT NULL,
  KEY `fk_rg_crianca` (`fk_rg_crianca`),
  KEY `fk_id_cadastro` (`fk_id_cadastro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cadastra`
--

INSERT INTO `cadastra` (`fk_rg_crianca`, `fk_id_cadastro`) VALUES
('58.656.656-6', 41),
('66.658.695-9', 43),
('58.695.695-6', 43);

-- --------------------------------------------------------

--
-- Estrutura da tabela `colaborador`
--

DROP TABLE IF EXISTS `colaborador`;
CREATE TABLE IF NOT EXISTS `colaborador` (
  `id_colaborador` int(11) NOT NULL AUTO_INCREMENT,
  `funcao` varchar(30) DEFAULT NULL,
  `desc_cargo` varchar(50) DEFAULT NULL,
  `fk_id_cadastro` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_colaborador`),
  KEY `fk_id_cadastro` (`fk_id_cadastro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_crianca`
--

DROP TABLE IF EXISTS `dados_crianca`;
CREATE TABLE IF NOT EXISTS `dados_crianca` (
  `rg_crianca` varchar(12) NOT NULL,
  `nome_crianca` varchar(40) DEFAULT NULL,
  `sexo` enum('M','F') DEFAULT NULL,
  `nasc_crianca` date DEFAULT NULL,
  `tamanho_camiseta` enum('RN','1','2','4','6','8','10','12','14','16','P','M','G') DEFAULT NULL,
  `tamanho_sapato` enum('14','15','16','17.5','18.5','19','20','20.5','21','21.5','22','22.5','23','23.5','24','24.5','25','25.5','26','26.5','27','28','29','30','31','32','33','34','35','36','37','38','39','40','41','42','43','44','45') DEFAULT NULL,
  `tamanho_calca` enum('1','2','4','6','8','10','12','14','16','P','M','G') DEFAULT NULL,
  PRIMARY KEY (`rg_crianca`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `dados_crianca`
--

INSERT INTO `dados_crianca` (`rg_crianca`, `nome_crianca`, `sexo`, `nasc_crianca`, `tamanho_camiseta`, `tamanho_sapato`, `tamanho_calca`) VALUES
('58.656.656-6', 'Isaque', 'M', '2000-10-21', '16', '20.5', '8'),
('58.695.695-6', 'Jeison', 'M', '2000-10-31', '8', '16', '6'),
('66.658.695-9', 'Maria Francisca', 'F', '2001-06-23', '4', '14', '10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_pf`
--

DROP TABLE IF EXISTS `dados_pf`;
CREATE TABLE IF NOT EXISTS `dados_pf` (
  `cpf` varchar(15) NOT NULL,
  `rg` varchar(12) DEFAULT NULL,
  `fk_id_cadastro` int(11) DEFAULT NULL,
  PRIMARY KEY (`cpf`),
  KEY `fk_id_cadastro` (`fk_id_cadastro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `dados_pf`
--

INSERT INTO `dados_pf` (`cpf`, `rg`, `fk_id_cadastro`) VALUES
('256.625.652-69', '00000000', 43),
('256.695.659-96', '0000000', 45),
('458.515.454-54', '0000000000', 46),
('545.555.454-54', '0000000000', 48),
('555.454.454-54', '0000000000', 40),
('565.695.669-56', '0000000', 42);

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_pj`
--

DROP TABLE IF EXISTS `dados_pj`;
CREATE TABLE IF NOT EXISTS `dados_pj` (
  `cnpj` varchar(18) NOT NULL,
  `nome_fantasia` varchar(30) DEFAULT NULL,
  `site` varchar(50) DEFAULT NULL,
  `tipo_pj` varchar(10) DEFAULT NULL,
  `fk_id_cadastro` int(11) DEFAULT NULL,
  PRIMARY KEY (`cnpj`),
  KEY `fk_id_cadastro` (`fk_id_cadastro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `dados_pj`
--

INSERT INTO `dados_pj` (`cnpj`, `nome_fantasia`, `site`, `tipo_pj`, `fk_id_cadastro`) VALUES
('54.854.545/4544-54', 'rasons life', 'www.doeparavida.com.br', 'INDUSTRIA', 43),
('84.445.454/5454-45', 'sorriso', 'www.sorriso.com', 'COMERCIO', 41);

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_responsavel`
--

DROP TABLE IF EXISTS `dados_responsavel`;
CREATE TABLE IF NOT EXISTS `dados_responsavel` (
  `id_familia` int(11) NOT NULL AUTO_INCREMENT,
  `cpf_resp` varchar(15) DEFAULT NULL,
  `nome_resp` varchar(40) DEFAULT NULL,
  `fk_cpf` varchar(15) DEFAULT NULL,
  `fk_id_cadastro` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_familia`),
  KEY `fk_id_cadastro` (`fk_id_cadastro`),
  KEY `fk_cpf` (`fk_cpf`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `dados_responsavel`
--

INSERT INTO `dados_responsavel` (`id_familia`, `cpf_resp`, `nome_resp`, `fk_cpf`, `fk_id_cadastro`) VALUES
(1, '----------', '-----------', '565.695.669-56', 42),
(2, '----------', '-----------', '565.695.669-56', 43),
(3, NULL, NULL, '256.695.659-96', 45);

-- --------------------------------------------------------

--
-- Estrutura da tabela `doacao`
--

DROP TABLE IF EXISTS `doacao`;
CREATE TABLE IF NOT EXISTS `doacao` (
  `id_doacao` int(11) NOT NULL AUTO_INCREMENT,
  `status_doacao` varchar(10) DEFAULT NULL,
  `data_hora_entrega` datetime DEFAULT NULL,
  `data_hora_selecao` datetime DEFAULT NULL,
  `data_hora_recebimento` datetime DEFAULT NULL,
  `tipo_presente` varchar(45) DEFAULT NULL,
  `fk_rg_crianca` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id_doacao`),
  KEY `fk_rg_crianca` (`fk_rg_crianca`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `doacao`
--

INSERT INTO `doacao` (`id_doacao`, `status_doacao`, `data_hora_entrega`, `data_hora_selecao`, `data_hora_recebimento`, `tipo_presente`, `fk_rg_crianca`) VALUES
(52, 'FINALIZADO', '2021-09-20 12:09:58', '2021-09-21 12:09:58', '2021-09-21 12:09:58', 'KIT COMPLETO', '66.658.695-9'),
(53, 'PENDENTE', '2021-09-20 12:09:13', NULL, NULL, 'KIT SIMPLES', '58.656.656-6'),
(54, 'PENDENTE', NULL, '2021-09-23 14:09:58', NULL, 'KIT COMPLETO', '66.658.695-9'),
(55, 'PENDENTE', NULL, '2021-09-23 18:09:53', NULL, 'KIT SIMPLES', '66.658.695-9');

-- --------------------------------------------------------

--
-- Estrutura da tabela `doa_exibe`
--

DROP TABLE IF EXISTS `doa_exibe`;
CREATE TABLE IF NOT EXISTS `doa_exibe` (
  `fk_id_doacao` int(11) DEFAULT NULL,
  `fk_id_mensagem` int(11) DEFAULT NULL,
  KEY `fk_id_doacao` (`fk_id_doacao`),
  KEY `fk_id_mensagem` (`fk_id_mensagem`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `doa_exibe`
--

INSERT INTO `doa_exibe` (`fk_id_doacao`, `fk_id_mensagem`) VALUES
(53, 6),
(54, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fale_conosco`
--

DROP TABLE IF EXISTS `fale_conosco`;
CREATE TABLE IF NOT EXISTS `fale_conosco` (
  `e_mail_fale_conosco` varchar(45) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `mensagem` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`e_mail_fale_conosco`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fale_conosco`
--

INSERT INTO `fale_conosco` (`e_mail_fale_conosco`, `nome`, `telefone`, `mensagem`) VALUES
('josegfgfgmk8@hotmail.com', 'Jose', '(85) 4548-88888', ''),
('josemk8@hotmail.com', 'Jose', '(85) 4548-88888', ''),
('josemk8dfd@hotmail.com', 'Jose', '(85) 4548-88888', ''),
('josemksss8@hotmail.com', 'Jose', '(85) 4548-88888', ''),
('jrtrtosemk8@hotmail.com', 'Jose', '(45) 4545-45454', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `gerencia`
--

DROP TABLE IF EXISTS `gerencia`;
CREATE TABLE IF NOT EXISTS `gerencia` (
  `fk_id_doacao` int(11) DEFAULT NULL,
  `fk_id_cadastro` int(11) DEFAULT NULL,
  KEY `fk_id_doacao` (`fk_id_doacao`),
  KEY `fk_id_cadastro` (`fk_id_cadastro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `gerencia`
--

INSERT INTO `gerencia` (`fk_id_doacao`, `fk_id_cadastro`) VALUES
(52, 43),
(53, 41),
(54, 43),
(55, 43);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagem_sistema`
--

DROP TABLE IF EXISTS `mensagem_sistema`;
CREATE TABLE IF NOT EXISTS `mensagem_sistema` (
  `id_mensagem` int(11) NOT NULL AUTO_INCREMENT,
  `status_sistema` varchar(10) DEFAULT NULL,
  `mensagem` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_mensagem`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `mensagem_sistema`
--

INSERT INTO `mensagem_sistema` (`id_mensagem`, `status_sistema`, `mensagem`) VALUES
(5, 'PENDENTE', 'Consulta CPF Inexist'),
(6, 'FINALIZADO', 'Doação Reprovada'),
(7, 'FINALIZADO', 'Doação Incompleta');

-- --------------------------------------------------------

--
-- Estrutura da tabela `newsletter`
--

DROP TABLE IF EXISTS `newsletter`;
CREATE TABLE IF NOT EXISTS `newsletter` (
  `e_mail_newsletter` varchar(30) NOT NULL,
  PRIMARY KEY (`e_mail_newsletter`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

DROP TABLE IF EXISTS `perfil`;
CREATE TABLE IF NOT EXISTS `perfil` (
  `id_cadastro` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_cadastro` varchar(45) DEFAULT NULL,
  `nivel_acesso` int(1) DEFAULT NULL,
  `status_cadastro` varchar(45) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `rede_social` varchar(30) DEFAULT NULL,
  `e_mail` varchar(30) DEFAULT NULL,
  `numendereco` varchar(5) DEFAULT NULL,
  `logradouro` varchar(30) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `estado` enum('AC','AL','AM','BA','CE','DF','ES','GO','MA','MT','MS','MG','PA','PB','PR','PE','PI','RR','RO','RJ','RN','RS','SC','SP','SE','TO') DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `bairro` varchar(30) DEFAULT NULL,
  `complemento` varchar(30) DEFAULT NULL,
  `fk_user` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_cadastro`),
  KEY `fk_user` (`fk_user`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id_cadastro`, `tipo_cadastro`, `nivel_acesso`, `status_cadastro`, `nome`, `telefone`, `rede_social`, `e_mail`, `numendereco`, `logradouro`, `cidade`, `estado`, `cep`, `bairro`, `complemento`, `fk_user`) VALUES
(40, 'doador_pf', 0, 'RP', 'Jose', '(45) 8855-54444', 'facebook.com', 'ose@gmail.com', '454', 'Rua alameda', 'Mairinque', 'AC', '77775-555', 'Jardim Vitoria', 'Perto da Oficina de Motos', 'ose@gmail.com'),
(41, 'organizacao', 0, 'EA', 'Sorriso compartilhado com vocÃª Ltda', '(55) 5888-88888', 'sorriso.com', 'sorriDso@sorriso.com.br', '454', 'Rua alameda', 'Mairinque', 'AC', '77774-555', 'Jardim Vi.', 'Lado', 'sorriso@sorriso.com.br'),
(42, 'familia', 0, 'OK', 'Francisca da Silva Oliveira', '(25) 4556-6699', 'facebook.com/francisca58', 'francisca@gmail.com', '254', 'Av. São Paulo', 'São Paulo', 'AC', '12256-000', 'São Pedro', 'Ao lado Paço Municipal', NULL),
(43, 'organizacao', 0, 'EA', 'DOE PARA VIDA', '(54) 5454-54545', 'facebook.com/doeparaumaideia', 'doeparavida@doe.com', '58', 'Rua Francisco', 'SÃ£o Paulo', 'AC', '54454-488', 'Jardim floripa', 'Mosce', 'doeparavida@doe.com'),
(44, 'familia', 0, 'OK', 'Maria Aparecida', '(52) 5858-5656', 'facebook.com/mariasilva', 'mariasilva@hotmail.com', '458', 'Av. Fast Fool', 'Sorocaba', 'SP', '45869-695', 'Jardim tempio', 'Sobrado', NULL),
(45, 'familia', 0, 'OK', 'Selma House', '(15) 2565-2225', 'facebook.com.br/SelmaHouse', 'selmahouse@hotmail.com', '2536', 'Av. Fomseca', 'São Paulo', 'AC', '12598-696', 'Jardim Vitória', 'Ao lado da cisd', NULL),
(46, 'doador_pf', 0, 'EA', 'JoÃ£o Santos', '(54) 5221-28888', 'facebook.com/josao_santos', 'joao@gmail.com', '252', 'Ruas da veradices', 'SÃ£o Paulo', 'SP', '55485-455', 'jardim cruzeiro', '', 'joao@gmail.com'),
(48, 'doador_pf', 0, 'EA', 'JosÃ© Guilherme', '(54) 8148-88888', 'facebook.com/joseguilherme', 'jose.guilherme@hotmail.com', '1254', 'Rua Junior ', 'Mairinque', 'SP', '44825-236', 'Jardim Cruzeiro', 'Ao lado do Bom lugar', 'jose.guilherme@hotmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil_exibe`
--

DROP TABLE IF EXISTS `perfil_exibe`;
CREATE TABLE IF NOT EXISTS `perfil_exibe` (
  `fk_id_mensagem` int(11) DEFAULT NULL,
  `fk_id_cadastro` int(11) DEFAULT NULL,
  KEY `fk_id_mensagem` (`fk_id_mensagem`),
  KEY `fk_id_cadastro` (`fk_id_cadastro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `perfil_exibe`
--

INSERT INTO `perfil_exibe` (`fk_id_mensagem`, `fk_id_cadastro`) VALUES
(5, 40);

-- --------------------------------------------------------

--
-- Estrutura da tabela `possui_colab`
--

DROP TABLE IF EXISTS `possui_colab`;
CREATE TABLE IF NOT EXISTS `possui_colab` (
  `fk_cpf` varchar(15) DEFAULT NULL,
  `fk_cnpj` varchar(18) DEFAULT NULL,
  `fk_id_colaborador` int(11) DEFAULT NULL,
  KEY `fk_cpf` (`fk_cpf`),
  KEY `fk_cnpj` (`fk_cnpj`),
  KEY `fk_id_colaborador` (`fk_id_colaborador`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `possui_cri`
--

DROP TABLE IF EXISTS `possui_cri`;
CREATE TABLE IF NOT EXISTS `possui_cri` (
  `fk_rg_crianca` varchar(12) DEFAULT NULL,
  `fk_id_familia` int(11) DEFAULT NULL,
  KEY `fk_rg_crianca` (`fk_rg_crianca`),
  KEY `fk_id_familia` (`fk_id_familia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `possui_cri`
--

INSERT INTO `possui_cri` (`fk_rg_crianca`, `fk_id_familia`) VALUES
('58.656.656-6', 1),
('66.658.695-9', 2),
('58.695.695-6', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `realiza`
--

DROP TABLE IF EXISTS `realiza`;
CREATE TABLE IF NOT EXISTS `realiza` (
  `fk_id_doacao` int(11) DEFAULT NULL,
  `fk_id_cadastro` int(11) DEFAULT NULL,
  KEY `fk_id_doacao` (`fk_id_doacao`),
  KEY `fk_id_cadastro` (`fk_id_cadastro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `realiza`
--

INSERT INTO `realiza` (`fk_id_doacao`, `fk_id_cadastro`) VALUES
(52, 40),
(53, 40),
(54, 40),
(55, 48);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `user` varchar(30) NOT NULL,
  `senha` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`user`, `senha`) VALUES
('doeparavida@doe.com', '123456'),
('joao@gmail.com', '123456'),
('jose.guilherme@hotmail.com', '15987532'),
('ose@gmail.com', '123456'),
('sorriso@sorriso.com.br', '123456');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`fk_user`) REFERENCES `usuario` (`user`);

--
-- Limitadores para a tabela `cadastra`
--
ALTER TABLE `cadastra`
  ADD CONSTRAINT `cadastra_ibfk_1` FOREIGN KEY (`fk_rg_crianca`) REFERENCES `dados_crianca` (`rg_crianca`),
  ADD CONSTRAINT `cadastra_ibfk_2` FOREIGN KEY (`fk_id_cadastro`) REFERENCES `perfil` (`id_cadastro`);

--
-- Limitadores para a tabela `colaborador`
--
ALTER TABLE `colaborador`
  ADD CONSTRAINT `colaborador_ibfk_1` FOREIGN KEY (`fk_id_cadastro`) REFERENCES `perfil` (`id_cadastro`);

--
-- Limitadores para a tabela `dados_pf`
--
ALTER TABLE `dados_pf`
  ADD CONSTRAINT `dados_pf_ibfk_1` FOREIGN KEY (`fk_id_cadastro`) REFERENCES `perfil` (`id_cadastro`);

--
-- Limitadores para a tabela `dados_pj`
--
ALTER TABLE `dados_pj`
  ADD CONSTRAINT `dados_pj_ibfk_1` FOREIGN KEY (`fk_id_cadastro`) REFERENCES `perfil` (`id_cadastro`);

--
-- Limitadores para a tabela `dados_responsavel`
--
ALTER TABLE `dados_responsavel`
  ADD CONSTRAINT `dados_responsavel_ibfk_1` FOREIGN KEY (`fk_id_cadastro`) REFERENCES `perfil` (`id_cadastro`),
  ADD CONSTRAINT `dados_responsavel_ibfk_2` FOREIGN KEY (`fk_cpf`) REFERENCES `dados_pf` (`cpf`);

--
-- Limitadores para a tabela `doacao`
--
ALTER TABLE `doacao`
  ADD CONSTRAINT `doacao_ibfk_1` FOREIGN KEY (`fk_rg_crianca`) REFERENCES `dados_crianca` (`rg_crianca`);

--
-- Limitadores para a tabela `doa_exibe`
--
ALTER TABLE `doa_exibe`
  ADD CONSTRAINT `doa_exibe_ibfk_1` FOREIGN KEY (`fk_id_doacao`) REFERENCES `doacao` (`id_doacao`),
  ADD CONSTRAINT `doa_exibe_ibfk_2` FOREIGN KEY (`fk_id_mensagem`) REFERENCES `mensagem_sistema` (`id_mensagem`);

--
-- Limitadores para a tabela `gerencia`
--
ALTER TABLE `gerencia`
  ADD CONSTRAINT `gerencia_ibfk_1` FOREIGN KEY (`fk_id_doacao`) REFERENCES `doacao` (`id_doacao`),
  ADD CONSTRAINT `gerencia_ibfk_2` FOREIGN KEY (`fk_id_cadastro`) REFERENCES `perfil` (`id_cadastro`);

--
-- Limitadores para a tabela `perfil`
--
ALTER TABLE `perfil`
  ADD CONSTRAINT `perfil_ibfk_1` FOREIGN KEY (`fk_user`) REFERENCES `usuario` (`user`);

--
-- Limitadores para a tabela `perfil_exibe`
--
ALTER TABLE `perfil_exibe`
  ADD CONSTRAINT `perfil_exibe_ibfk_1` FOREIGN KEY (`fk_id_mensagem`) REFERENCES `mensagem_sistema` (`id_mensagem`),
  ADD CONSTRAINT `perfil_exibe_ibfk_2` FOREIGN KEY (`fk_id_cadastro`) REFERENCES `perfil` (`id_cadastro`);

--
-- Limitadores para a tabela `possui_colab`
--
ALTER TABLE `possui_colab`
  ADD CONSTRAINT `possui_colab_ibfk_1` FOREIGN KEY (`fk_cpf`) REFERENCES `dados_pf` (`cpf`),
  ADD CONSTRAINT `possui_colab_ibfk_2` FOREIGN KEY (`fk_cnpj`) REFERENCES `dados_pj` (`cnpj`),
  ADD CONSTRAINT `possui_colab_ibfk_3` FOREIGN KEY (`fk_id_colaborador`) REFERENCES `colaborador` (`id_colaborador`);

--
-- Limitadores para a tabela `possui_cri`
--
ALTER TABLE `possui_cri`
  ADD CONSTRAINT `possui_cri_ibfk_1` FOREIGN KEY (`fk_rg_crianca`) REFERENCES `dados_crianca` (`rg_crianca`),
  ADD CONSTRAINT `possui_cri_ibfk_2` FOREIGN KEY (`fk_id_familia`) REFERENCES `dados_responsavel` (`id_familia`);

--
-- Limitadores para a tabela `realiza`
--
ALTER TABLE `realiza`
  ADD CONSTRAINT `realiza_ibfk_1` FOREIGN KEY (`fk_id_doacao`) REFERENCES `doacao` (`id_doacao`),
  ADD CONSTRAINT `realiza_ibfk_2` FOREIGN KEY (`fk_id_cadastro`) REFERENCES `perfil` (`id_cadastro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
