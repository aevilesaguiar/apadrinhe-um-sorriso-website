-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 30-Out-2021 às 00:54
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `email_admin` varchar(50) NOT NULL,
  `fk_user` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`email_admin`),
  KEY `admin_ibfk_1` (`fk_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cadastra`
--

INSERT INTO `cadastra` (`fk_rg_crianca`, `fk_id_cadastro`) VALUES
('44.444.545-4', 1),
('44.878.787-8', 1),
('58.999.989-9', 1),
('44.444.444-4', 55),
('54.545.545-5', 1),
('25.256.236-3', 55),
('25.665.869-5', 79),
('55.265.554-5', 79),
('44.444.444-4', 56),
('69.313.645-8', 79);

-- --------------------------------------------------------

--
-- Estrutura da tabela `colaborador`
--

DROP TABLE IF EXISTS `colaborador`;
CREATE TABLE IF NOT EXISTS `colaborador` (
  `id_colaborador` int(11) NOT NULL AUTO_INCREMENT,
  `funcao` enum('Gerente','Analista de Cadastro','Recebedor','Entregador') DEFAULT NULL,
  `fk_id_cadastro` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_colaborador`),
  KEY `fk_id_cadastro` (`fk_id_cadastro`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `colaborador`
--

INSERT INTO `colaborador` (`id_colaborador`, `funcao`, `fk_id_cadastro`) VALUES
(13, 'Gerente', 70),
(14, 'Gerente', 74),
(15, 'Entregador', 75),
(16, 'Analista de Cadastro', 76),
(17, 'Gerente', 82);

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_crianca`
--

DROP TABLE IF EXISTS `dados_crianca`;
CREATE TABLE IF NOT EXISTS `dados_crianca` (
  `rg_crianca` varchar(12) NOT NULL,
  `nome_crianca` varchar(80) DEFAULT NULL,
  `sexo` enum('M','F') DEFAULT NULL,
  `nasc_crianca` date DEFAULT NULL,
  `tamanho_camiseta` enum('RN','1','2','4','6','8','10','12','14','16','P','M','G') DEFAULT NULL,
  `tamanho_sapato` enum('14','15','16','17.5','18.5','19','20','20.5','21','21.5','22','22.5','23','23.5','24','24.5','25','25.5','26','26.5','27','28','29','30','31','32','33','34','35','36','37','38','39','40','41','42','43','44','45') DEFAULT NULL,
  `tamanho_calca` enum('1','2','4','6','8','10','12','14','16','P','M','G') DEFAULT NULL,
  `brinquedo` varchar(140) DEFAULT NULL,
  `term_arq` varchar(150) DEFAULT NULL,
  `observacao` varchar(140) DEFAULT NULL,
  PRIMARY KEY (`rg_crianca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `dados_crianca`
--

INSERT INTO `dados_crianca` (`rg_crianca`, `nome_crianca`, `sexo`, `nasc_crianca`, `tamanho_camiseta`, `tamanho_sapato`, `tamanho_calca`, `brinquedo`, `term_arq`, `observacao`) VALUES
('25.256.236-3', 'Fernanda', 'F', '2000-02-20', 'M', '26.5', '14', 'Boneca', '2-ptcc_ag11.pdf', 'dfd'),
('25.665.869-5', 'Eloisa', 'F', '2010-02-10', 'M', '28', 'G', 'Kit Maquiagem', '5-ptcc_agenda05.pdf', 'sdsd'),
('44.444.444-4', 'Jiulia', 'F', '2021-05-10', '14', '26', '16', 'Boneca', 'mundos paralelos.odt', 'sdsd'),
('44.444.545-4', 'Jessica', 'F', '2010-05-10', '8', '25.5', '10', 'Tenis', '1-programacao_aplicativos_mobile_li__agenda_1_mergulhando.pdf', 'gfg'),
('44.878.787-8', 'Orlando', 'M', '2015-03-10', '16', '26', '14', 'Carrinho de controle remoto', '1-agenda_09_ds_2.pdf', 'uuiu'),
('54.545.545-5', 'Cintia', 'F', '2021-02-10', '12', '16', '10', 'tenis', '1-ptcc_ag11.pdf', 'dsdsd'),
('55.265.554-5', 'Layan', 'M', '2015-05-10', '8', '24.5', '12', 'dfdf', 'jose_guilherme_ag5_recup_ti_iii.pdf', 'fggfh'),
('58.999.989-9', 'Josuel', 'F', '2021-11-05', '14', '26.5', '16', 'Super Man', '5-ptcc_agenda05.pdf', 'lkl'),
('69.313.645-8', 'Samuel', 'M', '2015-06-02', 'M', '15', 'M', 'Tenis', 'jose_guilherme_ag5_recup_ti_iii.pdf', 'sds');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `dados_pf`
--

INSERT INTO `dados_pf` (`cpf`, `rg`, `fk_id_cadastro`) VALUES
('278.272.777-77', '0000000000', 82),
('525.699.999-99', '0000000000', 75),
('526.969.556-99', '0000000000', 84),
('544.545.454-54', '0000000000', 77),
('544.545.455-82', '0000000000', 70),
('545.445.454-54', '0000000000', 57),
('545.454.545-44', '0000000000', 71),
('545.454.545-45', '0000000000', 52),
('545.699.999-99', '0000000000', 76),
('552.225.588-88', '0000000000', 74),
('565-656-659-95', '0000000', 2),
('565.455.455-55', '0000000000', 78),
('585.288.855-55', '0000000000', 83),
('848.487.887-87', '0000000000', 51),
('858.595.445-85', '0000000000', 73),
('888.787.878-78', '0000000000', 50);

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_pj`
--

DROP TABLE IF EXISTS `dados_pj`;
CREATE TABLE IF NOT EXISTS `dados_pj` (
  `cnpj` varchar(18) NOT NULL,
  `nome_fantasia` varchar(80) DEFAULT NULL,
  `site` varchar(50) DEFAULT NULL,
  `tipo_pj` varchar(50) DEFAULT NULL,
  `inf_recebimento` time DEFAULT NULL,
  `fk_id_cadastro` int(11) DEFAULT NULL,
  PRIMARY KEY (`cnpj`),
  KEY `fk_id_cadastro` (`fk_id_cadastro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `dados_pj`
--

INSERT INTO `dados_pj` (`cnpj`, `nome_fantasia`, `site`, `tipo_pj`, `inf_recebimento`, `fk_id_cadastro`) VALUES
('25.454.545/4545-45', 'Doe&Viva', 'www.doeparavida.com.br', 'OUTROS', '20:43:11', 55),
('51.154.454/5454-53', 'CARGIL LTDA', 'www.cargil.com.br', 'INDUSTRIA', '41:02:42', 54),
('51.154.454/5454-54', 'DSM', 'www.dsm.com.br', 'PRODUTOR RURAL', '20:43:11', 53),
('54.545.445/5454-54', 'RUMO', 'www.rumo.com.br', 'TRANSPORTE', '20:43:11', 81),
('58.484.488/4848-88', 'MDL', 'www.mdl-brasil.com.br', 'INDUSTRIA', '20:43:11', 1),
('85.858.585/6222-22', 'Nova Vida', 'www.novavida.com', 'COMUNICAÃ‡ÃƒO', '20:43:11', 79);

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_responsavel`
--

DROP TABLE IF EXISTS `dados_responsavel`;
CREATE TABLE IF NOT EXISTS `dados_responsavel` (
  `id_familia` int(11) NOT NULL AUTO_INCREMENT,
  `cpf_resp` varchar(15) DEFAULT NULL,
  `nome_resp` varchar(80) DEFAULT NULL,
  `fk_id_cadastro` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_familia`),
  KEY `fk_id_cadastro` (`fk_id_cadastro`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `dados_responsavel`
--

INSERT INTO `dados_responsavel` (`id_familia`, `cpf_resp`, `nome_resp`, `fk_id_cadastro`) VALUES
(39, '444.545.454-54', 'JosÃ©', 50),
(40, '887.848.484-88', 'JosÃ©', 51),
(41, '444.545.454-54', 'Manoel', 52),
(42, '544.545.588-78', 'Joao MAnoel', 56),
(43, '554.548.885-8', 'Augusto', 77),
(44, '526.363.636-33', 'Ramuel', 78),
(45, '256.585.445-85', 'Raimundo', 83),
(46, '639.645.896-64', 'Afonso', 84);

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
  `doc_confirmacao` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_doacao`),
  KEY `fk_rg_crianca` (`fk_rg_crianca`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `doacao`
--

INSERT INTO `doacao` (`id_doacao`, `status_doacao`, `data_hora_entrega`, `data_hora_selecao`, `data_hora_recebimento`, `tipo_presente`, `fk_rg_crianca`, `doc_confirmacao`) VALUES
(22, 'PENDENTE', NULL, '2021-10-22 20:10:30', '2021-10-25 00:10:14', 'KIT COMPLETO', '25.665.869-5', NULL),
(23, 'PENDENTE', NULL, '2021-10-22 20:10:25', '2021-10-24 22:10:45', 'KIT SIMPLES', '58.999.989-9', NULL),
(24, 'PENDENTE', NULL, '2021-10-22 20:10:22', '2021-10-25 00:10:21', 'KIT SIMPLES', '25.665.869-5', NULL),
(25, 'PENDENTE', NULL, '2021-10-22 20:10:56', '2021-10-24 22:10:51', 'KIT SIMPLES', '58.999.989-9', NULL),
(26, 'PENDENTE', NULL, '2021-10-22 21:10:42', '2021-10-24 22:10:03', 'KIT SIMPLES', '44.444.545-4', NULL),
(27, 'PENDENTE', NULL, '2021-10-22 21:10:16', '2021-10-25 00:10:24', 'KIT SIMPLES', '25.665.869-5', NULL),
(28, 'PENDENTE', NULL, '2021-10-24 21:10:03', '2021-10-25 00:10:41', 'KIT COMPLETO', '25.665.869-5', NULL),
(29, 'PENDENTE', NULL, '2021-10-24 22:10:07', '2021-10-24 22:10:32', 'KIT COMPLETO', '44.444.545-4', NULL),
(30, 'PENDENTE', NULL, '2021-10-24 22:10:05', '2021-10-25 00:10:46', 'KIT SIMPLES', '25.665.869-5', NULL),
(31, 'PENDENTE', NULL, '2021-10-24 22:10:32', '2021-10-24 22:10:38', 'KIT SIMPLES', '44.444.545-4', NULL),
(32, 'PENDENTE', NULL, '2021-10-24 22:10:52', '2021-10-25 23:10:18', 'KIT SIMPLES', '44.444.545-4', NULL),
(33, 'PENDENTE', NULL, '2021-10-25 00:10:55', '2021-10-25 00:10:59', 'KIT SIMPLES', '25.665.869-5', NULL),
(34, 'PENDENTE', NULL, '2021-10-25 00:10:19', '2021-10-25 00:10:49', 'KIT COMPLETO', '55.265.554-5', NULL),
(35, 'PENDENTE', NULL, '2021-10-25 23:10:20', '2021-10-25 23:10:29', 'KIT COMPLETO', '44.878.787-8', NULL),
(36, 'PENDENTE', NULL, '2021-10-25 23:10:08', '2021-10-25 23:10:58', 'KIT SIMPLES', '69.313.645-8', NULL),
(37, 'REPROVADO', NULL, '2021-10-25 23:10:58', NULL, 'KIT SIMPLES', '69.313.645-8', NULL),
(38, 'PENDENTE', NULL, '2021-10-25 23:10:00', NULL, 'KIT SIMPLES', '54.545.545-5', NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `doa_exibe`
--

INSERT INTO `doa_exibe` (`fk_id_doacao`, `fk_id_mensagem`) VALUES
(28, 58),
(28, 59),
(28, 60),
(22, 61),
(30, 62),
(22, 65),
(22, 66),
(22, 67),
(22, 68),
(22, 69),
(27, 70),
(27, 71),
(37, 73);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fale_conosco`
--

DROP TABLE IF EXISTS `fale_conosco`;
CREATE TABLE IF NOT EXISTS `fale_conosco` (
  `id_fale_conosco` int(10) NOT NULL,
  `e_mail_fale_conosco` varchar(50) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `mensagem` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_fale_conosco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `gerencia`
--

INSERT INTO `gerencia` (`fk_id_doacao`, `fk_id_cadastro`) VALUES
(22, 79),
(23, 1),
(24, 79),
(25, 1),
(26, 1),
(27, 79),
(28, 79),
(29, 1),
(30, 79),
(31, 1),
(32, 1),
(33, 79),
(34, 79),
(35, 1),
(36, 79),
(37, 79),
(38, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `mensagem_sistema`
--

INSERT INTO `mensagem_sistema` (`id_mensagem`, `status_sistema`, `mensagem`) VALUES
(16, 'FINALIZADO', 'CNPJ Inexistente\r\n'),
(17, 'FINALIZADO', 'CNPJ Inexistente'),
(18, 'FINALIZADO', 'kkj'),
(19, 'FINALIZADO', 'k\r\n'),
(20, 'FINALIZADO', 'lmklmk'),
(21, 'FINALIZADO', 'kjhjhj'),
(22, 'FINALIZADO', 'kl'),
(23, 'FINALIZADO', 'tghh'),
(24, 'FINALIZADO', 'kkj]\r\n'),
(25, 'FINALIZADO', 'fgfgfg'),
(26, 'FINALIZADO', 'ghhgh'),
(27, 'FINALIZADO', 'okjji'),
(28, 'FINALIZADO', 'erer'),
(29, 'FINALIZADO', 'wewe'),
(30, 'FINALIZADO', 'sdsd'),
(31, 'FINALIZADO', 'CNPJ Inexistente'),
(32, 'FINALIZADO', 'CNPJ INVÃLIDO\r\n'),
(33, 'FINALIZADO', 'sdsd'),
(34, 'FINALIZADO', 'SDSD'),
(35, 'FINALIZADO', 'dfdf'),
(36, 'FINALIZADO', 'dfdfdfdf'),
(37, 'FINALIZADO', 'sdsd'),
(38, 'FINALIZADO', 'sdsd'),
(39, 'FINALIZADO', 'sdsd'),
(40, 'FINALIZADO', 'qwewqe'),
(41, 'FINALIZADO', 'dsdsd'),
(42, 'FINALIZADO', 'sdsd'),
(43, 'FINALIZADO', 'adad'),
(44, 'FINALIZADO', 'dsd'),
(45, 'FINALIZADO', 'GHGH'),
(46, 'FINALIZADO', 'GHGH'),
(47, 'FINALIZADO', 'SDSD'),
(48, 'FINALIZADO', 'GFGFG'),
(49, 'FINALIZADO', 'CPF Inexistente\r\n'),
(50, 'FINALIZADO', 'tyty'),
(51, 'FINALIZADO', 'tyty'),
(52, 'FINALIZADO', 'tyty'),
(53, 'FINALIZADO', 'tyty'),
(54, 'FINALIZADO', 'ghfh'),
(55, 'FINALIZADO', 'SDSD'),
(56, 'FINALIZADO', 'wrewerterere'),
(57, 'PENDENTE', 'rtrt'),
(58, 'FINALIZADO', 'Roupa Inadequada\r\n'),
(59, 'FINALIZADO', 'sddsdsd'),
(60, 'FINALIZADO', 'sddsdsd'),
(61, 'FINALIZADO', 'xcxcxc'),
(62, 'FINALIZADO', 'sdsd'),
(63, 'FINALIZADO', 'dfdf'),
(64, 'FINALIZADO', 'xcxc'),
(65, 'FINALIZADO', 'dcsfsf'),
(66, 'FINALIZADO', 'DFDF'),
(67, 'FINALIZADO', 'dfdf'),
(68, 'FINALIZADO', 'sdsds'),
(69, 'FINALIZADO', 'sdsd'),
(70, 'FINALIZADO', 'dgdfg'),
(71, 'FINALIZADO', 'dfgdf'),
(72, 'PENDENTE', 'sfsf'),
(73, 'PENDENTE', 'Faltou o Tenis');

-- --------------------------------------------------------

--
-- Estrutura da tabela `newsletter`
--

DROP TABLE IF EXISTS `newsletter`;
CREATE TABLE IF NOT EXISTS `newsletter` (
  `e_mail_newsletter` varchar(50) NOT NULL,
  PRIMARY KEY (`e_mail_newsletter`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

DROP TABLE IF EXISTS `perfil`;
CREATE TABLE IF NOT EXISTS `perfil` (
  `id_cadastro` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_cadastro` varchar(45) DEFAULT NULL,
  `nivel_acesso` int(1) DEFAULT NULL,
  `status_cadastro` varchar(10) DEFAULT NULL,
  `nome` varchar(80) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `rede_social` varchar(100) DEFAULT NULL,
  `e_mail` varchar(50) DEFAULT NULL,
  `numendereco` varchar(5) DEFAULT NULL,
  `logradouro` varchar(30) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `estado` enum('AC','AL','AM','BA','CE','DF','ES','GO','MA','MT','MS','MG','PA','PB','PR','PE','PI','RR','RO','RJ','RN','RS','SC','SP','SE','TO') DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `bairro` varchar(30) DEFAULT NULL,
  `complemento` varchar(30) DEFAULT NULL,
  `fk_user` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_cadastro`),
  KEY `perfil_ibfk_1` (`fk_user`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id_cadastro`, `tipo_cadastro`, `nivel_acesso`, `status_cadastro`, `nome`, `telefone`, `rede_social`, `e_mail`, `numendereco`, `logradouro`, `cidade`, `estado`, `cep`, `bairro`, `complemento`, `fk_user`) VALUES
(1, 'organizacao', 0, 'OK', 'MDL LTDA', '(11) 2515-5455', 'linkdln/mdl', 'mdl@mdlbrasil.com.br', '454', 'Av. Prink', 'SÃ£o Paulo', 'SP', '44487-878', 'Distrito Industrial', 'Ao lado da faber', 'mdl@mdlbrasil.com.br'),
(2, 'doador_pf', 0, 'OK', 'JosÃ© Guilherme', '(54) 5887-87878', '', 'jose.guilherme@outlook.com.br', '545', 'Rua Hunger Sabaro', 'Sorocaba', 'SP', '54584-887', 'Jardim da Jufis', 'Ao lado ', 'jose.guilherme@outlook.com.br'),
(50, 'familia', 0, 'OK', 'Maria', '(45) 4444-54545', '', 'maria@hotmail.com', '55', 'Rua Natal', 'Salvador', 'BA', '18120-000', 'SertÃ£ozinho', 'Voud', 'familia@familia.com'),
(51, 'familia', 0, 'OK', 'Marina', '(54) 5454-55454', '', 'marina@hotmail.com', '545', 'Orion viaro', 'SÃ£o Paulo', 'SP', '54454-545', 'Jardim da Jufis', 'wsddsd', 'familia@familia.com'),
(52, 'familia', 0, 'OK', 'Marialva', '(54) 5454-54545', '', 'marialva@hotmail.com', '54545', 'Rua das fiqueiras', 'SÃ£o Paulo', 'SP', '45454-544', 'Sertao zinho 2', 'Aeroporto', 'familia@familia.com'),
(53, 'doador_pj', 0, 'OK', 'DSM LTDA', '(54) 5454-54545', 'facebook.com/dsm', 'dsm@hotmail.com', '448', 'Estrada Cefri', 'Mairique', 'SP', '54545-454', 'Cefri', 'perto da cefri', 'dsm@hotmail.com'),
(54, 'doador_pj', 0, 'OK', 'CARGIL LTDA', '(54) 5445-4545', 'facebook.com/cargil', 'cargil@cargil.com.br', '545', 'Rua da Silva', 'Sorocaba', 'SP', '54454-454', 'Sorocaba', 'Ao lado da faber', 'cargil@cargil.com.br'),
(55, 'doador_pj', 0, 'OK', 'Doe para Vida LTDA', '(25) 4545-45454', 'facebook.com/doeparavida', 'doeparavida@hotmail.com', '5445', 'Rua Orion Viario', 'Sorocaba', 'SP', '54545-454', 'SÃ£o paulo', 'Sorocaba', 'doeparavida@hotmail.com'),
(56, 'familia', 0, 'OK', 'Jessica', '(45) 4545-45454', '', 'jessica@gmail.com', '4545', 'Rua da flores', 'Sorocaba', 'SP', '54545-454', 'JAbuticabal', 'sss', 'familia@familia.com'),
(57, 'doador_pf', 0, 'OK', 'joao', '(45) 4545-45454', 'facebook.com/joao', 'joao@hotmail.com', '545', 'Rua das alamedas', 'Sorocaba', 'SP', '54545-454', 'Jardim vitÃ³ria', 'ksk', 'joao@hotmail.com'),
(70, 'colaborador', 0, 'OK', '', '54545454445', '', 'ko@gmail.com', '56', '56', 'sao paulo', 'PR', '54545-454', 'Jardim vitÃ³ria', 'ksk', 'ko@gmail.com'),
(71, 'colaborador', 0, 'OK', '', '(54) 5454-55545', '', 'asasa', '44', '44', 'sao paulo', 'PR', '54554-545', 'asa', 'sasas', 'asas@gmail.com'),
(72, 'colaborador', 0, 'OK', 'asasa', '(54) 5454-55545', '', 'asas@gmail.com', '44', '44', 'sao paulo', 'PR', '54554-545', 'asa', 'sasas', 'asas@gmail.com'),
(73, 'colaborador', 0, 'OK', 'asasa', '(54) 5454-55545', '', 'asjjas@gmail.com', '44', '44', 'sao paulo', 'PR', '54554-545', 'asa', 'sasas', 'asjjas@gmail.com'),
(74, 'colaborador', 0, 'OK', 'asasa', '(54) 5454-55545', '', 'a855sjjas@gmail.com', '44', '44', 'sao paulo', 'PR', '54554-545', 'asa', 'sasas', 'a855sjjas@gmail.com'),
(75, 'colaborador', 0, 'OK', 'jose', '(44) 4444-44444', '', 'ko@gmail.com', '4', '4', 'sao paulo', 'PR', '54545-454', 'Jardim vitÃ³ria', 'ksk', 'ko@gmail.com'),
(76, 'colaborador', 0, 'OK', 'jose', '(44) 4444-44444', '', 'kdo@gmail.com', '4', '4', 'sao paulo', 'PR', '54545-454', 'Jardim vitÃ³ria', 'ksk', 'kdo@gmail.com'),
(77, 'familia', 0, 'OK', 'Joana', '(54) 5455-5555', '', 'joana@hotmail.com', '42', 'Jasmin', 'Sorocaba', 'BA', '12525-525', 'TrÃªs LAgoas', 'sss', 'familia@familia.com'),
(78, 'familia', 0, 'OK', 'Amanda', '(54) 5454-4141', '', 'fernanda@gmail.com', '42', 'Jasmin', 'SÃ£o Paulo', 'PA', '12525-525', 'SÃ£o luis', '656', 'familia@familia.com'),
(79, 'organizacao', 0, 'EA', 'Nova Vida LTDA', '(54) 5454-4141', 'facebook.com/nova vida', 'novavida@hotmail.com', '42', 'Jasmin', 'SÃ£o Paulo', 'PA', '12525-525', 'SÃ£o luis', '656', 'novavida@hotmail.com'),
(81, 'doador_pj', 0, 'OK', 'RUMO LTDA', '(54) 5454-54545', 'facebook.com/rumo', 'rumo@rumo.com.br', '415', 'Rua das alamedas', 'Sorocaba', 'AL', '15454-545', 'SÃ£o Roque', 'Perto do centro', 'rumo@rumo.com.br'),
(82, 'colaborador', 0, 'OK', 'Welligton', '(15) 5445-45454', '', 'well@gmail.com', '455', '455', 'SOrocaba', 'SP', '54545-454', 'ss', 'ss', 'well@gmail.com'),
(83, 'familia', 0, 'OK', 'Maria', '(25) 5695-99698', '', 'maria@hotmail.com', '525', 'Silva', 'Sorocaba', 'SP', '85458-965', 'Das', 'dd', 'familia@familia.com'),
(84, 'familia', 0, 'OK', 'DÃ©bora', '(42) 1522-55666', '', 'debora@hotmail.com', '2536', 'Rua da silva', 'Sorocaba', 'SP', '63632-211', 'SÃ£o Miguel', 'Ao lado da via soa', 'familia@familia.com');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `perfil_exibe`
--

INSERT INTO `perfil_exibe` (`fk_id_mensagem`, `fk_id_cadastro`) VALUES
(16, 53),
(17, 53),
(18, 53),
(19, 53),
(20, 53),
(21, 53),
(22, 53),
(23, 53),
(24, 53),
(25, 53),
(26, 53),
(27, 53),
(28, 53),
(29, 53),
(30, 53),
(31, 53),
(32, 53),
(33, 53),
(34, 53),
(35, 53),
(36, 53),
(37, 53),
(38, 53),
(39, 53),
(40, 53),
(41, 53),
(42, 53),
(43, 2),
(44, 2),
(45, 2),
(46, 2),
(47, 2),
(48, 2),
(49, 57),
(50, 55),
(51, 55),
(52, 55),
(53, 55),
(54, 55),
(55, 54),
(56, 2),
(63, 81),
(64, 2),
(72, 2);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `possui_cri`
--

INSERT INTO `possui_cri` (`fk_rg_crianca`, `fk_id_familia`) VALUES
('44.444.545-4', 39),
('44.878.787-8', 40),
('58.999.989-9', 41),
('44.444.444-4', 42),
('54.545.545-5', 43),
('25.256.236-3', 44),
('55.265.554-5', 45),
('69.313.645-8', 46);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `realiza`
--

INSERT INTO `realiza` (`fk_id_doacao`, `fk_id_cadastro`) VALUES
(22, 57),
(23, 57),
(24, 81),
(25, 81),
(26, 57),
(27, 57),
(28, 2),
(29, 57),
(30, 57),
(31, 57),
(32, 57),
(33, 55),
(34, 81),
(35, 57),
(36, 57),
(37, 54),
(38, 57);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `user` varchar(50) NOT NULL,
  `senha` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`user`, `senha`) VALUES
('a855sjjas@gmail.com', '44'),
('asas@gmail.com', 'asa'),
('asjjas@gmail.com', '54545'),
('cargil@cargil.com.br', '123456'),
('colaborador@colaborador.com', '123456'),
('doeparavida@hotmail.com', '123456'),
('dsm@hotmail.com', '123456'),
('familia@familia.com', '123456'),
('joao@hotmail.com', '123456'),
('jose.guilherme@outlook.com.br', '123456'),
('kdo@gmail.com', ''),
('ko@gmail.com', '44444'),
('mdl@mdlbrasil.com.br', '123456'),
('novavida@hotmail.com', '123456'),
('rumo@rumo.com.br', '123456'),
('well@gmail.com', '123456');

--
-- Restrições para despejos de tabelas
--

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
  ADD CONSTRAINT `dados_responsavel_ibfk_1` FOREIGN KEY (`fk_id_cadastro`) REFERENCES `perfil` (`id_cadastro`);

--
-- Limitadores para a tabela `doacao`
--
ALTER TABLE `doacao`
  ADD CONSTRAINT `doacao_ibfk_1` FOREIGN KEY (`fk_rg_crianca`) REFERENCES `dados_crianca` (`rg_crianca`);

--
-- Limitadores para a tabela `perfil`
--
ALTER TABLE `perfil`
  ADD CONSTRAINT `perfil_ibfk_1` FOREIGN KEY (`fk_user`) REFERENCES `usuario` (`user`);

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
